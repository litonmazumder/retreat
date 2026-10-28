<?php

namespace App\Http\Controllers;

use App\Models\CarnivalActivity;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CarnivalAssignmentController extends Controller
{

    public function index(Request $request)
    {
        $search = trim($request->query('search', ''));

        $participants = Participant::where('event_id', 1)
            ->whereNotIn('id', function ($query) {
                $query->select('participant_id')
                    ->from('carnival_activity_facilitator');
            })
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('first_name', 'like', "%{$search}%")
                        ->orWhere('last_name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->with('carnivalActivities')
            ->orderBy('first_name')
            ->paginate(15)
            ->withQueryString();

        $activities = CarnivalActivity::where('event_id', 1)
            ->where('is_active', true)
            ->withCount([
                'participants as assigned_participants_count' => function ($query) {
                    $query->where('participants.event_id', 1);
                },
            ])
            ->orderBy('name')
            ->get();

        return view('admin.carnival.assignments.index', compact(
            'participants',
            'activities',
            'search'
        ));
    }



    public function edit(Participant $participant)
    {
        abort_unless((int) $participant->event_id === 1, 404);

        $activities = CarnivalActivity::where('event_id', 1)
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $assignedByWave = $participant->carnivalActivities()
            ->get()
            ->mapWithKeys(function ($activity) {
                return [
                    $activity->pivot->wave => $activity->id,
                ];
            })
            ->all();

        return view('admin.carnival.assignments.edit', compact(
            'participant',
            'activities',
            'assignedByWave'
        ));
    }


    public function update(Request $request, Participant $participant)
    {
        abort_unless((int) $participant->event_id === 1, 404);

        $validated = $request->validate([
            'wave_1' => ['required', 'integer', 'different:wave_2'],
            'wave_2' => ['required', 'integer', 'different:wave_1'],
        ]);

        $activityIds = [
            (int) $validated['wave_1'],
            (int) $validated['wave_2'],
        ];

        $validCount = CarnivalActivity::where('event_id', 1)
            ->where('is_active', true)
            ->whereIn('id', $activityIds)
            ->count();

        if ($validCount !== 2) {
            throw ValidationException::withMessages([
                'wave_1' => 'Select two different active activities.',
            ]);
        }

        DB::transaction(function () use ($participant, $validated) {
            $participant->carnivalActivities()->sync([
                (int) $validated['wave_1'] => ['wave' => 'wave_1'],
                (int) $validated['wave_2'] => ['wave' => 'wave_2'],
            ]);
        });

        return redirect()
            ->route('carnival.assignments.index')
            ->with('success', 'Activity assignments saved successfully.');
    }

}
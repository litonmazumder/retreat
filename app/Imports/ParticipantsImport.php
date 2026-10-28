<?php

namespace App\Imports;

use App\Models\Participant;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;

class ParticipantsImport implements ToCollection
{
    public int $imported = 0;
    public int $skipped = 0;
    public array $errors = [];

    public function collection(Collection $rows): void
    {
        foreach ($rows as $index => $row) {
            $data = $row->values()->toArray();

            // Skip the header row
            if (
                strtolower(trim((string) ($data[1] ?? ''))) === 'name'
                || strtolower(trim((string) ($data[4] ?? ''))) === 'email'
            ) {
                continue;
            }

            $name = trim((string) ($data[1] ?? ''));
            $designation = trim((string) ($data[2] ?? ''));
            $project = trim((string) ($data[3] ?? ''));
            $email = strtolower(trim((string) ($data[4] ?? '')));

            if ($name === '' || $email === '') {
                $this->skipped++;
                $this->errors[] = 'Row ' . ($index + 1)
                    . ': Name or email is missing.';
                continue;
            }

            $validator = Validator::make(
                ['email' => $email],
                ['email' => 'required|email']
            );

            if ($validator->fails()) {
                $this->skipped++;
                $this->errors[] = 'Row ' . ($index + 1)
                    . ': Invalid email address: ' . $email;
                continue;
            }

            // if (Participant::where('email', $email)->exists()) {
            //     $this->skipped++;
            //     $this->errors[] = 'Row ' . ($index + 1)
            //         . ': Email already exists: ' . $email;
            //     continue;
            // }

            $existingParticipant = Participant::where('email', $email)->first();

            if ($existingParticipant) {
                $existingParticipant->project_name = $project ?: null;
                $existingParticipant->save();

                $this->skipped++;
                $this->errors[] = 'Row ' . ($index + 1)
                    . ': Existing participant updated: ' . $email;
                continue;
            }

            $nameParts = preg_split('/\s+/', $name, 2);

            Participant::create([
                'event_id' => 1,
                'uuid' => (string) Str::uuid(),
                'first_name' => $nameParts[0],
                'last_name' => $nameParts[1] ?? null,
                'email' => $email,
                'designation' => $designation ?: null,
                'project_name' => $project ?: null,
                'region' => null,
                'status' => 'Active',
                'profile_confirmed' => 0,
            ]);

            $this->imported++;
        }
    }
}

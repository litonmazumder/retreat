<?php

namespace App\Http\Controllers;

use App\Models\RetreatPushSubscription;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RetreatPushSubscriptionController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $participant = $request->attributes->get('participant');

        if (! $participant || $participant->status !== 'Active') {
            return response()->json([
                'message' => 'Please log in with an active participant account.',
            ], 401);
        }

        $validator = Validator::make($request->all(), [
            'endpoint' => ['required', 'url', 'max:4096'],
            'keys.p256dh' => ['required', 'string', 'max:255'],
            'keys.auth' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid push subscription.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();
        $endpoint = $data['endpoint'];

        if (parse_url($endpoint, PHP_URL_SCHEME) !== 'https') {
            return response()->json([
                'message' => 'The push endpoint must use HTTPS.',
            ], 422);
        }

        $endpointHash = hash('sha256', $endpoint);

        $subscription = RetreatPushSubscription::updateOrCreate(
            ['endpoint_hash' => $endpointHash],
            [
                'participant_id' => $participant->id,
                'endpoint' => $endpoint,
                'public_key' => $data['keys']['p256dh'],
                'auth_token' => $data['keys']['auth'],
                'content_encoding' => 'aes128gcm',
                'disabled_at' => null,
                'last_used_at' => now(),
            ]
        );

        return response()->json([
            'message' => 'Push notifications enabled.',
            'subscription_id' => $subscription->id,
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $participant = $request->attributes->get('participant');

        if (! $participant) {
            return response()->json([
                'message' => 'Please log in.',
            ], 401);
        }

        $endpoint = $request->input('endpoint');

        if (! is_string($endpoint) || $endpoint === '') {
            return response()->json([
                'message' => 'Subscription endpoint is required.',
            ], 422);
        }

        $subscription = RetreatPushSubscription::where(
            'participant_id',
            $participant->id
        )->where('endpoint_hash', hash('sha256', $endpoint))->first();

        if ($subscription) {
            $subscription->update(['disabled_at' => now()]);
        }

        return response()->json([
            'message' => 'Push subscription disabled.',
        ]);
    }
}

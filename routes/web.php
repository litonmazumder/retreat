<?php

    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\CarnivalController;
    use App\Http\Controllers\RegistrationController;
    use App\Http\Controllers\ParticipantController;
    use App\Http\Controllers\AttendanceController;
    use App\Http\Controllers\PresentationController;
    use App\Http\Controllers\EventSessionController;
    use App\Http\Controllers\FeedbackController;
    use App\Http\Controllers\FeedbackPresentationController;
    use App\Http\Controllers\CarnivalAssignmentController;
    use App\Http\Controllers\RetreatRechargeController;
    use App\Http\Controllers\RetreatPushSubscriptionController;
    
Route::get('/', function () {

    if (session()->has('participant_uuid')) {
        return redirect()->route('dashboard');
    }

    return redirect()->route('auth.login');

});

Route::middleware('participant.guest')->group(function () {

    Route::get('/login', [AuthController::class, 'login'])
        ->name('auth.login');

    Route::post('/login', [AuthController::class, 'authenticate'])
        ->name('auth.authenticate');

    Route::get('/verify/participant/{participant}', [AuthController::class, 'showVerifyForm'])
        ->name('auth.verify');

    Route::post('/verify/participant/{uuid}', [AuthController::class, 'verifyOtp'])
        ->name('auth.verify.submit');

    Route::post('/login/resend-otp/{participant}', [AuthController::class, 'resendOtp'])
        ->name('auth.resend.otp');
});  

Route::middleware('participant.auth')
    ->group(function () {
       
        Route::get('/', [HomeController::class, 'dashboard'])
            ->name('dashboard');

        Route::get('/participant/details', [AuthController::class, 'infoDetails'])
            ->name('participant.details');

        Route::post('/participant/confirm', [AuthController::class, 'confirmProfile'])
            ->name('participant.confirm');

        Route::get('/info', [HomeController::class, 'info'])
            ->name('info');

        Route::get('/carnival', [HomeController::class, 'index'])
            ->name('carnival');
        
        Route::post('/carnival/{activity}/confirm-attendance',
            [CarnivalController::class, 'confirmAttendance']
        )->name('carnival.confirm');

        Route::get('/feedback', [FeedbackController::class, 'form']
        )->name('feedback');

        // Live state
        Route::get(
            '/feedback/{feedback}/live-state',
            [FeedbackPresentationController::class, 'liveState']
        )->name('feedback.live.state');

        Route::post(
            '/feedback/{feedback}/submit',
            [FeedbackController::class, 'store']
        )->name('feedback.submit');

        Route::get(
            '/feedback/thank-you',
            function () {
                return view('dashboard.feedback.thank-you');
            }
        )->name('feedback.thank-you');

        Route::post('/attendance', [AttendanceController::class, 'store'])
            ->name('attendance.store');

        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('logout');

        Route::prefix('info')
            ->group(function () {

                Route::view('/emergency-contacts', 'dashboard.information.emergency-contacts')
                    ->name('emergency-contacts');
                Route::view('/lsp', 'dashboard.information.lsp')
                    ->name('lsp');
                 Route::view('/rooms', 'dashboard.information.rooms')
                    ->name('rooms');
                Route::get('/lsp/pdf', function () {
                        return response()->file(public_path('documents/lsp.pdf'));
                    })->name('lsp.pdf');
                Route::get('/rooms/pdf', function () {
                        return response()->file(public_path('documents/Asia_Seminar_Rooms.pdf'));
                    })->name('rooms.pdf');         
            });

            Route::prefix('carnival')
            ->group(function () {

            Route::get('/activities/{activity}', [CarnivalController::class, 'show'])
                ->name('carnival.show');
                });
    });

    Route::get('/admin/dashboard', [AdminController::class, 'index'])
    ->name('admin.index');

    Route::get('/participants/create', [AdminController::class, 'createParticipant'])
    ->name('admin.participants.create');

    Route::post('/participants/store', [AdminController::class, 'storeParticipant'])
    ->name('admin.participants.store');

    Route::get('/participants/list', [AdminController::class, 'participants'])
    ->name('admin.participants.index');

    Route::get('/participants/attendance', [AdminController::class, 'attendance'])
    ->name('admin.attendance.index'); 

    Route::get(
        'feedback/day/{feedback}/results/{question}',
        [FeedbackPresentationController::class, 'presentation']
    )->name('admin.feedback.presentation');

    Route::get(
    '/admin/attendance/export',
    [AttendanceController::class, 'export']
)->name('admin.attendance.export');


Route::prefix('carnival/assignments')
    ->name('carnival.assignments.')
    ->controller(CarnivalAssignmentController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{participant}/edit', 'edit')->name('edit');
        Route::put('/{participant}', 'update')->name('update');
    });

    Route::post(
    '/recharge/{scheduleId}/claim',
    [RetreatRechargeController::class, 'claim']
    )
    ->middleware('participant.auth')
    ->whereNumber('scheduleId')
    ->name('recharge.claim');

    Route::middleware('participant.auth')->group(function () {
    Route::post(
        '/push-subscriptions',
        [RetreatPushSubscriptionController::class, 'store']
    )->name('push-subscriptions.store');

    Route::delete(
        '/push-subscriptions',
        [RetreatPushSubscriptionController::class, 'destroy']
    )->name('push-subscriptions.destroy');
});
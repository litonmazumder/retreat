<?php

    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\KioskController;
    use App\Http\Controllers\RegistrationController;
    use App\Http\Controllers\ParticipantController;
    use App\Http\Controllers\AttendanceController;
    use App\Http\Controllers\PresentationController;
    use App\Http\Controllers\EventSessionController;
    use App\Http\Controllers\FeedbackController;
    use App\Http\Controllers\FeedbackPresentationController;

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

        Route::get('/experience', [HomeController::class, 'experience'])
            ->name('experience');

         // Participant live page
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

                Route::view('/immigration', 'dashboard.information.immigration')
                    ->name('immigration');

                Route::view('/airport', 'dashboard.information.airport')
                    ->name('airport');

                Route::view('/sim-card', 'dashboard.information.sim')
                    ->name('sim');

                Route::view('/moneyexchange', 'dashboard.information.moneyexchange')
                    ->name('moneyexchange');
                Route::view('/hotel', 'dashboard.information.hotel')
                    ->name('hotel');
                Route::view('/mobileapp', 'dashboard.information.mobileapp')
                    ->name('mobileapp');
                Route::view('/allowance', 'dashboard.information.allowance')
                    ->name('allowance');
                Route::view('/hospitals', 'dashboard.information.hospitals')
                    ->name('hospitals');
                Route::view('/lsp', 'dashboard.information.lsp')
                    ->name('lsp');
                Route::get('/lsp/pdf', function () {
                        return response()->file(public_path('documents/lsp.pdf'));
                    })->name('lsp.pdf');
                Route::view('/groups', 'dashboard.information.groups')
                    ->name('groups');
                Route::get('/groups/pdf', function () {
                        return response()->file(public_path('documents/Asia_Seminar_Group.pdf'));
                    })->name('group.pdf');         
            });

            Route::prefix('experience')
            ->group(function () {

                // Six Senses
                Route::view('/taste', 'dashboard.experience.taste')->name('taste');
                Route::view('/touch', 'dashboard.experience.touch')->name('touch');
                Route::view('/sight', 'dashboard.experience.sight')->name('sight');
                Route::view('/hear', 'dashboard.experience.hear')->name('hear');
                Route::view('/smell', 'dashboard.experience.smell')->name('smell');
                Route::view('/feel', 'dashboard.experience.feel')->name('feel');

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

    Route::get('participant/attendance', [AttendanceController::class, 'index'])
        ->name('attendance');

    Route::post('/attendance/search', [AttendanceController::class, 'search'])
        ->name('attendance.search');

    Route::get('/attendance/confirm/{participant}', [AttendanceController::class, 'confirm'])
        ->name('attendance.confirm');

    Route::post('/attendance/checkin/{participant}', [AttendanceController::class, 'checkIn'])
        ->name('attendance.checkin');

    Route::get('/participant/resend', [AttendanceController::class, 'resend'])
        ->name('participant.resend');
    Route::post('/participant/resend-email', [ParticipantController::class, 'resendEmail'])
        ->name('participant.resend-email');    

    Route::get(
        '/attendance/success/{participant}',
        [AttendanceController::class, 'success']
    )->name('attendance.success');

    Route::get('participant/register', [RegistrationController::class, 'create'])
        ->name('participant.register');

    Route::post('participant/register', [RegistrationController::class, 'store'])
        ->name('participant.register.store');

    Route::get('/registration/verify/{uuid}', [RegistrationController::class, 'showVerifyForm'])
    ->name('registration.verify');

    Route::post('/registration/verify/{uuid}', [RegistrationController::class, 'verifyOtp'])
    ->name('registration.verify.submit');

    Route::get('participant/register/success/{participant}', [RegistrationController::class, 'success'])
        ->name('participant.register.success');

    Route::get('/verify/{uuid}', [AuthController::class, 'showVerifyForm'])
    ->name('verification.show');    

Route::prefix('presentations')->group(function () {

    Route::get('/', [PresentationController::class, 'index'])
        ->name('presentations.index');

    Route::get('/create', [PresentationController::class, 'create'])
        ->name('presentations.create');

    Route::post('/', [PresentationController::class, 'store'])
        ->name('presentations.store');

    Route::get('/{presentation}', [PresentationController::class, 'show'])
    ->name('presentations.show');

});

    Route::prefix('admin/feedback')
        ->group(function () {

            Route::get(
                '/{feedback}/control',
                [FeedbackPresentationController::class, 'control']
            )->name('control');

            Route::post(
                '/{feedback}/start',
                [FeedbackPresentationController::class, 'start']
            )->name('start');

            Route::post(
                '/{feedback}/next',
                [FeedbackPresentationController::class, 'next']
            )->name('next');

            Route::post(
                '/{feedback}/previous',
                [FeedbackPresentationController::class, 'previous']
            )->name('previous');

            Route::post(
                '/{feedback}/results',
                [FeedbackPresentationController::class, 'showResults']
            )->name('results');

            Route::post(
                '/{feedback}/finish',
                [FeedbackPresentationController::class, 'finish']
            )->name('finish');

            Route::get(
                '/{feedback}/results/{question}',
                [FeedbackPresentationController::class, 'results']
            )->name('admin.feedback.results');

    });

    // Big screen
    // Route::get(
    //     '/feedback/{feedback}/presentation',
    //     [FeedbackPresentationController::class, 'presentation']
    // )->name('feedback.presentation');

    Route::get(
        'feedback/day/{feedback}/results/{question}',
        [FeedbackPresentationController::class, 'presentation']
    )->name('admin.feedback.presentation');

    // Submit answer
    Route::post(
        '/feedback/{feedback}/answer',
        [FeedbackPresentationController::class, 'answer']
    )->name('feedback.answer');

// Route::resource('event-sessions', EventSessionController::class);

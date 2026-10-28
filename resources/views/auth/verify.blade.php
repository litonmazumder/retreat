@extends('layouts.register')

@section('title', 'Verify OTP')

@section('content')

<div class="w-full">

    <div class="rounded-3xl bg-white p-7 shadow-lg">

        <div class="text-center">

            <h1 class="text-3xl font-bold text-slate-900">
                Verify Your Email
            </h1>

            <p class="mt-3 text-sm leading-6 text-slate-500">
                Enter the 4-digit verification code sent to your email address.
            </p>

        </div>

        <form
            action="{{ route('auth.verify.submit', $participant->uuid) }}"
            method="POST"
            class="mt-8">

            @csrf

            @if($errors->has('otp'))

                <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4">

                    <p class="font-semibold text-red-800">
                        Verification Failed
                    </p>

                    <p class="mt-1 text-sm text-red-700">
                        {{ $errors->first('otp') }}
                    </p>

                </div>

            @endif

            <div class="flex justify-center gap-3">

                @for($i=1;$i<=4;$i++)

                    <input
                        type="text"
                        maxlength="1"
                        inputmode="numeric"
                        autocomplete="one-time-code"
                        class="otp-input h-16 w-16 rounded-2xl border border-slate-300 text-center text-2xl font-bold focus:border-[#00477A] focus:outline-none focus:ring-4 focus:ring-[#00477A]/10">

                @endfor

            </div>

            <input
                type="hidden"
                name="otp"
                id="otp">

            <button
                type="submit"
                class="mt-8 w-full rounded-2xl bg-[#00477A] py-4 font-semibold text-white transition hover:bg-[#00588F]">

                Verify & Continue

            </button>

        </form>

        <div class="mt-8 text-center">

            <p class="text-sm text-slate-500">
                Didn't receive the code?
            </p>

            <form
                action="{{ route('auth.resend.otp', $participant->uuid) }}"
                method="POST"
                id="resend-form"
                class="mt-3">

                @csrf

                <button
                    id="resend-btn"
                    type="submit"
                    class="font-semibold text-[#00477A] transition hover:underline disabled:cursor-not-allowed disabled:text-slate-400">

                    Resend Code

                </button>

            </form>

            <p
                id="timer"
                class="mt-3 hidden text-sm text-slate-400">

                Resend available in
                <span id="timer-count">60</span>s

            </p>

        </div>

    </div>

</div>
<script>
document.addEventListener('DOMContentLoaded', () => {

    const form = document.getElementById('resend-form');
    const button = document.getElementById('resend-btn');

    form.addEventListener('submit', () => {
        button.disabled = true;
        button.textContent = 'Sending...';
    });

    @if(session('success'))
        startResendTimer(60);
    @endif

    function startResendTimer(seconds) {

        const button = document.getElementById('resend-btn');
        const timer = document.getElementById('timer');
        const count = document.getElementById('timer-count');

        button.disabled = true;
        timer.classList.remove('hidden');

        let remaining = seconds;
        count.textContent = remaining;

        const interval = setInterval(() => {

            remaining--;

            count.textContent = remaining;

            if (remaining <= 0) {

                clearInterval(interval);

                button.disabled = false;
                timer.classList.add('hidden');

            }

        }, 1000);
    }

});
</script>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const inputs = document.querySelectorAll('.otp-input');
    const hiddenOtp = document.getElementById('otp');

    function updateHiddenOtp() {
        hiddenOtp.value = [...inputs].map(input => input.value).join('');
    }

    inputs.forEach((input, index) => {

        input.addEventListener('input', (e) => {

            // Keep only digits
            let value = e.target.value.replace(/\D/g, '');

            // Handle pasting or autofill of multiple digits
            if (value.length > 1) {

                value.split('').slice(0, inputs.length).forEach((digit, i) => {
                    inputs[i].value = digit;
                });

                const next = Math.min(value.length, inputs.length) - 1;
                inputs[next].focus();

                updateHiddenOtp();
                return;
            }

            input.value = value;

            if (value && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }

            updateHiddenOtp();

        });

        input.addEventListener('keydown', (e) => {

            if (e.key === 'Backspace' && !input.value && index > 0) {
                inputs[index - 1].focus();
            }

            if (e.key === 'ArrowLeft' && index > 0) {
                inputs[index - 1].focus();
            }

            if (e.key === 'ArrowRight' && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }

        });

    });

    // Paste support
    document.addEventListener('paste', (e) => {

        const pasted = (e.clipboardData || window.clipboardData)
            .getData('text')
            .replace(/\D/g, '')
            .slice(0, 4);

        if (!pasted) return;

        e.preventDefault();

        pasted.split('').forEach((digit, i) => {
            inputs[i].value = digit;
        });

        inputs[Math.min(pasted.length - 1, 3)].focus();

        updateHiddenOtp();

    });

});
</script>

@endsection
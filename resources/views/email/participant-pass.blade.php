<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>
    Asia Seminar 2026 -
    {{ $isResend ? 'Participant ID Reminder' : 'Registration Confirmed' }}
</title>
</head>

<body style="margin:0;padding:40px;background:#F4F7FB;font-family:Arial,Helvetica,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0">

<tr>

<td align="center">

<table width="640" cellpadding="0" cellspacing="0"
style="background:#ffffff;border-radius:18px;overflow:hidden;box-shadow:0 10px 30px rgba(0,0,0,.08);">

<!-- Header -->

<tr>

<td align="center"
style="background:#00477A;padding:50px 40px;">

<h1 style="margin:0;font-size:34px;color:#ffffff;font-weight:bold;">

Asia Seminar 2026

</h1>

<p style="margin:14px 0 0;color:#D7ECFF;font-size:18px;">

{{ $isResend ? 'Participant ID Reminder' : 'Registration Successful' }}

</p>

</td>

</tr>

<!-- Body -->

<tr>

<td style="padding:45px;">

<h2 style="margin:0;color:#00477A;font-size:28px;">

Hello {{ $participant->first_name }},

</h2>

@if($isResend)

<p style="margin-top:25px;color:#555;font-size:16px;line-height:30px;">

As requested, here is another copy of your
<strong>Asia Seminar 2026</strong>
registration confirmation.

Your Participant ID is provided below for your convenience.
Please keep it available for seminar check-in.

</p>

@else

<p style="margin-top:25px;color:#555;font-size:16px;line-height:30px;">

Thank you for registering for
<strong>Asia Seminar 2026</strong>.

Your registration has been successfully confirmed.

Please keep your Participant ID for seminar check-in.

</p>

@endif

<!-- Participant ID -->

<table width="100%"
style="margin:40px 0;background:#EEF6FC;border:2px solid #00477A;border-radius:14px;">

<tr>

<td align="center" style="padding:35px;">

<p style="margin:0;font-size:14px;color:#666;text-transform:uppercase;letter-spacing:2px;">

Participant ID

</p>

<div style="margin-top:15px;font-size:34px;font-weight:bold;color:#00477A;letter-spacing:2px;">

{{ $participant->participant_id }}

</div>

<p style="margin-top:18px;color:#666;font-size:14px;">

Please keep this ID available during the seminar.

</p>

</td>

</tr>

</table>

<!-- Button -->

<div style="text-align:center;margin:45px 0;">

<a href="{{ route('schedule') }}"
style="background:#00477A;color:#ffffff;text-decoration:none;padding:18px 40px;border-radius:10px;font-size:18px;font-weight:bold;display:inline-block;">

View Seminar Information

</a>

</div>

<!-- Information -->

<div style="background:#F8FAFC;border-left:4px solid #00477A;padding:24px;border-radius:10px;">

<h3 style="margin-top:0;color:#00477A;">

On the Seminar Day

</h3>

<ul style="margin:15px 0 0;padding-left:20px;color:#555;line-height:28px;">

<li>Keep your Participant ID available, as it will be required to confirm your attendance during the seminar.</li>

<li>Use the Self Check-in page on your phone or at the registration kiosk.</li>

<li>Search using your Participant ID.</li>

<li>Confirm your information to record your attendance.</li>

<li>No printed pass is required.</li>

</ul>

</div>

@if(!$isResend)

<p style="margin-top:35px;color:#666;font-size:15px;line-height:28px;">

If you cannot locate this email later, simply visit the seminar website and select
<strong>Resend Registration Email</strong>.

Enter your registered email address and we'll send another copy of your confirmation email containing your Participant ID.

</p>

@else

<p style="margin-top:35px;color:#666;font-size:15px;line-height:28px;">

This email was sent in response to your request to retrieve your Participant ID.

If you continue experiencing issues, please contact the seminar registration desk for assistance.

</p>

@endif

<p style="margin-top:35px;color:#555;font-size:16px;">

We look forward to welcoming you to
<strong>Asia Seminar 2026.</strong>

</p>

<p style="margin-top:35px;color:#555;">

Kind regards,<br>

<strong>Asia Seminar 2026 Organizing Team</strong>

</p>

</td>

</tr>

<!-- Footer -->

<tr>

<td align="center"
style="background:#F8FAFC;padding:30px;">

<p style="margin:0;font-size:14px;color:#777;">

Swisscontact Bangladesh

</p>

<p style="margin:10px 0;">

<a href="{{ route('home') }}"
style="color:#00477A;text-decoration:none;font-weight:bold;">

Visit Event Website

</a>

</p>

<p style="margin:18px 0 0;font-size:12px;color:#999;line-height:20px;">

This is an automated email from Asia Seminar 2026.<br>

Please do not reply to this message.

</p>

</td>

</tr>

</table>

</td>

</tr>

</table>

</body>

</html>
<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Asia Seminar 2026 - Registration Confirmation</title>

</head>

<body style="margin:0;padding:40px;background:#f4f7fb;font-family:Arial,Helvetica,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0">

<tr>

<td align="center">

<table width="650" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:18px;overflow:hidden;box-shadow:0 8px 30px rgba(0,0,0,.08);">

<!-- Header -->

<tr>

<td style="background:#00477A;padding:45px;text-align:center;">

<h1 style="margin:0;color:white;font-size:34px;">

Asia Seminar 2026

</h1>

<p style="margin-top:15px;color:#d8ecff;font-size:18px;">

Registration Confirmed

</p>

</td>

</tr>

<!-- Body -->

<tr>

<td style="padding:45px;">

<h2 style="margin-top:0;color:#00477A;">

Hello {{ $participant->first_name }},

</h2>

<p style="font-size:16px;color:#555;line-height:30px;">

Thank you for registering for <strong>Asia Seminar 2026</strong>.

Your registration has been successfully confirmed.

</p>

<!-- Participant Information -->

<table width="100%" style="margin:35px 0;background:#f8fafc;border-radius:12px;padding:25px;">

<tr>

<td>

<strong>Participant</strong>

</td>

<td align="right">

{{ $participant->first_name }} {{ $participant->last_name }}

</td>

</tr>

<tr>

<td style="padding-top:15px;">

<strong>Participant ID</strong>

</td>

<td align="right" style="padding-top:15px;font-size:20px;font-weight:bold;color:#00477A;">

{{ $participant->participant_id }}

</td>

</tr>

<tr>

<td style="padding-top:15px;">

<strong>Email</strong>

</td>

<td align="right" style="padding-top:15px;">

{{ $participant->email }}

</td>

</tr>

@if($participant->designation)

<tr>

<td style="padding-top:15px;">

<strong>Designation</strong>

</td>

<td align="right" style="padding-top:15px;">

{{ $participant->designation }}

</td>

</tr>

@endif

@if($participant->project_name)

<tr>

<td style="padding-top:15px;">

<strong>Project</strong>

</td>

<td align="right" style="padding-top:15px;">

{{ $participant->project_name }}

</td>

</tr>

@endif

</table>

<!-- Retrieve Pass -->

<div style="text-align:center;margin:40px 0;">

<a href="{{ route('participant.retrieve') }}"
style="background:#00477A;color:white;padding:18px 40px;border-radius:10px;text-decoration:none;font-size:18px;font-weight:bold;display:inline-block;">

Retrieve My Event Pass

</a>

</div>

<!-- Check-in -->

<div style="background:#eef7ff;padding:25px;border-radius:12px;">

<h3 style="margin-top:0;color:#00477A;">

On the day of the seminar

</h3>

<ul style="color:#555;line-height:28px;padding-left:20px;">

<li>Bring your <strong>Participant ID</strong> or access your digital event pass on your phone.</li>

<li>At the venue, use the Self Check-in Kiosk or your mobile device to confirm your attendance.</li>

<li>Search using your <strong>Participant ID</strong>.</li>

<li>Review your information and confirm your attendance.</li>

<li>No printed pass is required.</li>

</ul>

</div>

<p style="margin-top:35px;color:#555;line-height:28px;">

If you cannot find this email later, don't worry.

You can visit the seminar website at any time and select
<strong>Retrieve My Event Pass</strong>
using your registered email address.

</p>

<p style="margin-top:25px;color:#555;line-height:28px;">

We look forward to welcoming you to
<strong>Asia Seminar 2026</strong>.

</p>

</td>

</tr>

<!-- Footer -->

<tr>

<td style="background:#f8fafc;padding:30px;text-align:center;">

<p style="margin:0;font-size:13px;color:#666;">

Asia Seminar 2026

</p>

<p style="margin:8px 0;font-size:13px;color:#666;">

Swisscontact Bangladesh

</p>

<p style="margin:12px 0;">

<a href="{{ route('home') }}"
style="color:#00477A;text-decoration:none;">

Visit Event Website

</a>

</p>

<p style="margin-top:20px;font-size:12px;color:#999;line-height:20px;">

This is an automated email. Please do not reply directly to this message.

</p>

</td>

</tr>

</table>

</td>

</tr>

</table>

</body>

</html>
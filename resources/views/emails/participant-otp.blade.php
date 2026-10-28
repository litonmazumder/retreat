<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>
</head>

<body style="margin:0;padding:0;background:#f1f5f9;font-family:Arial,Helvetica,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 15px;">
        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0"
                    style="max-width:600px;background:#ffffff;border-radius:12px;overflow:hidden;">

                    {{-- Header --}}
                    <tr>
                        <td align="center"
                            style="background:#00477A;padding:35px 30px;color:#ffffff;">

                            <h1 style="margin:0;font-size:28px;font-weight:bold;color:#FFFFFF;">
                                Asia Seminar 2026
                            </h1>

                            <!-- <p style="margin:10px 0 0;font-size:16px;opacity:.9;">
                                Participant Email Verification
                            </p> -->

                        </td>
                    </tr>

                    {{-- Body --}}
                    <tr>
                        <td style="padding:40px;color:#334155;">

                            <p style="margin-top:0;font-size:18px;">
                                Dear <strong>{{ $participant->first_name }} {{ $participant->last_name }}</strong>,
                            </p>

                            <p style="font-size:16px;line-height:1.8;">
                                Welcome to the <strong>Asia Seminar 2026 Participant Portal</strong>.
                            </p>

                            <p style="font-size:16px;line-height:1.8;">
                                To verify your email address and securely access your participant dashboard,
                                please enter the One-Time Password (OTP) below.
                            </p>

                            {{-- OTP --}}
                            <div style="
                                margin:35px 0;
                                background:#f8fafc;
                                border:2px dashed #00477A;
                                border-radius:12px;
                                padding:25px;
                                text-align:center;">

                                <p style="margin:0 0 10px;font-size:14px;color:#64748b;">
                                    Your Verification Code
                                </p>

                                <div style="
                                    font-size:38px;
                                    font-weight:bold;
                                    letter-spacing:10px;
                                    color:#00477A;">

                                    {{ $otp }}

                                </div>

                            </div>

                            <p style="font-size:15px;line-height:1.7;color:#475569;">
                                This verification code is valid for
                                <strong>10 minutes</strong>.
                            </p>

                            <!-- <p style="font-size:15px;line-height:1.7;color:#475569;">
                                After successful verification, you will be able to:
                            </p>

                            <ul style="padding-left:20px;color:#475569;line-height:1.8;">
                                <li>Confirm your personal information</li>
                                <li>Access the Asia Seminar 2026 participant dashboard</li>
                                <li>View the seminar schedule and important information</li>
                                <li>Receive event updates and submit feedback</li>
                            </ul> -->

                            <p style="font-size:15px;line-height:1.7;color:#475569;">
                                If you did not request this verification, you can safely ignore this email.
                                No changes will be made to your participant account.
                            </p>

                            <hr style="border:none;border-top:1px solid #e2e8f0;margin:35px 0;">

                            <p style="margin:0;font-size:15px;">
                                We look forward to welcoming you to the seminar.
                            </p>

                            <p style="margin-top:10px;font-weight:bold;color:#00477A;font-size:16px;">
                                Asia Seminar 2026 Organizing Team
                            </p>

                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td align="center"
                            style="padding:20px;background:#f8fafc;border-top:1px solid #e2e8f0;">

                            <p style="margin:0;font-size:13px;color:#64748b;">
                                This is an automated email. Please do not reply to this message.
                            </p>

                            <p style="margin:8px 0 0;font-size:13px;color:#94a3b8;">
                                © {{ date('Y') }} Asia Seminar 2026. All rights reserved.
                            </p>

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>
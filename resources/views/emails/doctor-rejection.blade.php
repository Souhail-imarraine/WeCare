<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .content {
            margin-bottom: 30px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4F46E5;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>WeCare - Application Status</h1>
    </div>

    <div class="content">
        <p>Dear Dr. {{ $doctor->user->first_name }} {{ $doctor->user->last_name }},</p>

        <p>We regret to inform you that your application to join WeCare as a doctor has been rejected.</p>

        <p>We appreciate your interest in joining our platform and encourage you to review our requirements and consider applying again in the future.</p>

        <p>If you have any questions or would like to discuss this decision further, please don't hesitate to contact our support team.</p>

        <p>Thank you for your understanding.</p>

        <p>Best regards,<br>
        The WeCare Team</p>
    </div>

    <div class="footer">
        <p>Thanks,<br>
        {{ config('app.name') }}</p>
    </div>
</body>
</html>

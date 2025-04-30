<!DOCTYPE html>
<html>
<head>
    <title>Doctor Account Request Approved</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
            background-color: #f9f9f9;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Congratulations!</h1>
        </div>
        <div class="content">
            <p>Dear Dr. {{ $doctorName }},</p>

            <p>We are pleased to inform you that your doctor account request has been approved. You can now access your doctor space on our platform.</p>

            <p>To log in, use the following credentials:</p>
            <ul>
                <li>Email: {{ $email }}</li>
            </ul>

            <p>We recommend that you:</p>
            <ol>
                <li>Complete your medical profile</li>
                <li>Set your availability</li>
            </ol>

            <p>If you have any questions or need assistance, please do not hesitate to contact us.</p>

            <p>Best regards,<br>The WeCare Team</p>
        </div>
        <div class="footer">
            <p>This is an automated email, please do not reply.</p>
        </div>
    </div>
</body>
</html>

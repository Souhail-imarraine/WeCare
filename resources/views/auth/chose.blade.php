<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Your Role - WeCare</title>
    <link rel="stylesheet" href="{{ asset('css/chose.css') }}">
</head>
<body>
    <div class="container">
        <!-- Logo -->
        <div class="logo">
            <h1>
                <span>W</span><span class="cyan">e</span>
                <span>Car</span><span class="cyan">e</span>
            </h1>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h2>What brings you to We care?</h2>

            <!-- Role Selection Cards -->
            <div class="role-grid">
                <!-- Doctor Link -->
                <a href="{{ route('register.doctor') }}" class="role-card">
                    <div class="image-container">
                        <img src="{{ asset('img/doctor.svg') }}" alt="Doctor">
                    </div>
                    <h2>I'm a doctor</h2>
                    <p>Stay informed about your patients' status anytime, anywhere.</p>
                </a>

                <!-- Patient Link -->
                <a href="{{ route('patient.register.form') }}" class="role-card">
                    <div class="image-container">
                        <img src="{{ asset('img/patient.svg') }}" alt="Patient">
                    </div>
                    <h2>I'm a patient</h2>
                    <p>The most complete solution in your hands</p>
                </a>
            </div>

            <!-- Sign In Link -->
            <div class="sign-in">
                <p>
                    Already using Contra?
                    <a href="/login">Sign in</a>
                </p>
            </div>

            <!-- Terms and Privacy -->
            <div class="terms">
                <p>
                    By continuing, you agree to Wecare
                    <a href="/terms">Terms of Use</a>
                    and confirm that you have read Contra's
                    <a href="/privacy">Privacy Policy</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>

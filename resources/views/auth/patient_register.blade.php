<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration - WeCare</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <div class="register-container">
        <div class="form-section">
            <!-- Logo -->
            <div class="logo">
                <h1>
                    <span>W</span><span class="cyan">e</span>
                    <span>Car</span><span class="cyan">e</span>
                </h1>
            </div>

            <!-- Form Container -->
            <div class="form-wrapper">
                <div class="form-header">
                    <h2>Create your Account</h2>
                    <p>
                        Already using WeCare?
                        <a href="/login">Login</a>
                    </p>
                </div>

                <!-- Registration Form -->
                <form action="/patient-register" method="POST">
                    @csrf
                    <!-- Name Fields Row -->
                    <div class="form-grid">
                        <!-- First Name -->
                        <div class="form-group">
                            <label for="first_name">First name</label>
                            <input type="text" id="first_name" name="first_name"
                                placeholder="e.g John">
                        </div>
                        <!-- Last Name -->
                        <div class="form-group">
                            <label for="last_name">Last name</label>
                            <input type="text" id="last_name" name="last_name"
                                placeholder="e.g Doe">
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" id="email" name="email"
                            placeholder="e.g jhondo@gmail.com">
                    </div>

                    <!-- Display Name -->
                    <div class="form-group">
                        <label for="display_name">Display Name</label>
                        <input type="text" id="display_name" name="display_name"
                            placeholder="e.g Bonnie">
                    </div>

                    <!-- Gender Selection -->
                    <div class="form-group">
                        <label>Gender</label>
                        <div class="gender-buttons">
                            <button type="button" class="gender-btn" onclick="setGender('male')">
                                <input type="radio" name="gender" value="male">
                                Male
                            </button>
                            <button type="button" class="gender-btn" onclick="setGender('female')">
                                <input type="radio" name="gender" value="female">
                                Female
                            </button>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password"
                            placeholder="••••••••">
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            placeholder="••••••••">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="submit-btn">
                        Create an account
                    </button>
                </form>
            </div>
        </div>

        <!-- Right Side - Image -->
        <div class="image-section">
            <img src="{{ asset('img/register.svg') }}"
                alt="Medical illustration">
        </div>
    </div>

    <script>
        function setGender(gender) {
            // Set the radio button
            document.querySelector(`input[value="${gender}"]`).checked = true;

            // Update button styles
            const buttons = document.querySelectorAll('.gender-btn');
            buttons.forEach(button => {
                button.classList.remove('active');
            });

            // Add active style to selected button
            event.currentTarget.classList.add('active');
        }
    </script>
</body>
</html>

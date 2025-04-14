<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Registration - WeCare</title>
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
                <form action="{{ route('register.doctor.submit') }}" method="POST">
                    @csrf
                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                        <div class="error-message">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-grid">
                        <!-- First Name -->
                        <div class="form-group">
                            <label for="first_name">First name</label>
                            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                                placeholder="e.g John" required>
                        </div>
                        <!-- Last Name -->
                        <div class="form-group">
                            <label for="last_name">Last name</label>
                            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                                placeholder="e.g Doe" required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            placeholder="doctor@example.com" required>
                    </div>

                    <!-- Specialty -->
                    <div class="form-group">
                        <label for="specialty">Specialty</label>
                        <input type="text" id="specialty" name="specialty" value="{{ old('specialty') }}"
                            placeholder="e.g Cardiology" required>
                    </div>

                    <!-- License Number -->
                    <div class="form-group">
                        <label for="license_number">License Number</label>
                        <input type="text" id="license_number" name="license_number" value="{{ old('license_number') }}"
                            placeholder="e.g MD123456" required>
                    </div>

                    <!-- Consultation Price -->
                    <div class="form-group">
                        <label for="consultation_price">Consultation Price ($)</label>
                        <input type="number" id="consultation_price" name="consultation_price" value="{{ old('consultation_price') }}"
                            placeholder="e.g 100" min="0" step="0.01" required>
                    </div>

                    <!-- Years of Experience -->
                    <div class="form-group">
                        <label for="years_experience">Years of Experience</label>
                        <input type="number" id="years_experience" name="years_experience" value="{{ old('years_experience') }}"
                            placeholder="e.g 5" min="0" required>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password"
                            placeholder="••••••••" required>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            placeholder="••••••••" required>
                    </div>

                    <!-- City -->
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" value="{{ old('city') }}"
                            placeholder="e.g New York" required>
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
                alt="Doctor using tablet">
        </div>
    </div>
</body>
</html>

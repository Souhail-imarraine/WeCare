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
                    <h2>Create your Doctor Account</h2>
                    <p>
                        Already using WeCare?
                        <a href="/login">Login</a>
                    </p>
                </div>
                <!-- Registration Form -->
                <form action="{{ route('register.doctor.submit') }}" method="POST">
                    @csrf
                    <!-- Name Fields Row -->
                    <div class="form-grid">
                        <!-- First Name -->
                        <div class="form-group @error('first_name') has-error @enderror">
                            <label for="first_name">First name</label>
                            <input type="text" id="first_name" name="first_name"
                                placeholder="e.g John" required value="{{ old('first_name') }}">
                            @error('first_name')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Last Name -->
                        <div class="form-group @error('last_name') has-error @enderror">
                            <label for="last_name">Last name</label>
                            <input type="text" id="last_name" name="last_name"
                                placeholder="e.g Doe" required value="{{ old('last_name') }}">
                            @error('last_name')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group @error('email') has-error @enderror">
                        <label for="email">Email address</label>
                        <input type="email" id="email" name="email"
                            placeholder="e.g jhondo@gmail.com" required value="{{ old('email') }}">
                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Specialty -->
                    <div class="form-group @error('specialty') has-error @enderror">
                        <label for="specialty">Specialty</label>
                        <select id="specialty" name="specialty" required>
                            <option value="">Select your specialty</option>
                            <option value="Cardiology" @if(old('specialty') == 'Cardiology') selected @endif>Cardiology</option>
                            <option value="Dermatology" @if(old('specialty') == 'Dermatology') selected @endif>Dermatology</option>
                            <option value="Neurology" @if(old('specialty') == 'Neurology') selected @endif>Neurology</option>
                            <option value="Pediatrics" @if(old('specialty') == 'Pediatrics') selected @endif>Pediatrics</option>
                            <option value="Psychiatry" @if(old('specialty') == 'Psychiatry') selected @endif>Psychiatry</option>
                        </select>
                        @error('specialty')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Consultation Price -->
                    <div class="form-group @error('consultation_price') has-error @enderror">
                        <label for="consultation_price">Consultation Price (DH)</label>
                        <input type="number" id="consultation_price" name="consultation_price"
                            placeholder="e.g 200" min="0" required value="{{ old('consultation_price') }}">
                        @error('consultation_price')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Years of Experience -->
                    <div class="form-group @error('years_experience') has-error @enderror">
                        <label for="years_experience">Years of Experience</label>
                        <input type="number" id="years_experience" name="years_experience"
                            placeholder="e.g 5" min="0" max="50" required value="{{ old('years_experience') }}">
                        @error('years_experience')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- License Number -->
                    <div class="form-group @error('license_number') has-error @enderror">
                        <label for="license_number">License Number</label>
                        <input type="text" id="license_number" name="license_number"
                            placeholder="e.g MD12345" required value="{{ old('license_number') }}">
                        @error('license_number')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- City -->
                    <div class="form-group @error('city') has-error @enderror">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city"
                            placeholder="e.g Casablanca" required value="{{ old('city') }}">
                        @error('city')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group @error('password') has-error @enderror">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password"
                            placeholder="••••••••" required>
                        @error('password')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group @error('password_confirmation') has-error @enderror">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            placeholder="••••••••" required>
                        @error('password_confirmation')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

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
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - WeCare</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-container">
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
                    <h2>Welcome Back</h2>
                    <p>
                        Don't have an account?
                        <a href="{{ route('chose') }}">Register</a>
                    </p>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Login Form -->
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <!-- Role Selection -->
                    <div class="form-group @error('role') has-error @enderror">
                        <label for="role">I am a</label>
                        <select id="role" name="role" required>
                            <option value="">Select your role</option>
                            <option value="doctor" @if(old('role') == 'doctor') selected @endif>Doctor</option>
                            <option value="patient" @if(old('role') == 'patient') selected @endif>Patient</option>
                        </select>
                        @error('role')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group @error('email') has-error @enderror">
                        <label for="email">Email address</label>
                        <input type="email" id="email" name="email"
                            placeholder="e.g john@example.com" required value="{{ old('email') }}">
                        @error('email')
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

                    <!-- Remember Me -->
                    <div class="form-group">
                        <label class="checkbox-container">
                            <input type="checkbox" name="remember" id="remember">
                            <span class="checkmark"></span>
                            Remember me
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="submit-btn">
                        Sign In
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

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
        <!-- Left Side - Form -->
        <div class="form-section">
            <!-- Logo -->
            <div class="logo">
                <h1>
                    <span>W</span>
                    <span class="cyan">e</span>
                    <span class="ml-1">Car</span>
                    <span class="cyan">e</span>
                </h1>
            </div>

            <!-- Form Container -->
            <div class="form-wrapper">
                <div class="form-header">
                    <h2>Login to your account</h2>
                    <p>
                        Don't have account?
                        <a href="/register">Sign up</a>
                    </p>
                </div>

                <!-- Login Form -->
                <form action="/login" method="POST">
                    @csrf
                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email"
                            id="email"
                            name="email"
                            placeholder="••••••••••">
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"
                            id="password"
                            name="password"
                            placeholder="••••••••">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="submit-btn">
                        Login
                    </button>
                </form>
            </div>
        </div>

        <!-- Right Side - Image -->
        <div class="image-section">
            <img src="{{ asset('img/register.svg') }}"
                alt="Login illustration">
        </div>
    </div>
</body>
</html>

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
                <form action="{{ route('patient.register') }}" method="POST">
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
                    <!-- Gender Selection -->
                    <div class="form-group @error('gender') has-error @enderror">
                        <label>Gender</label>
                        <div class="gender-buttons">
                            <button type="button" class="gender-btn @if(old('gender') == 'male') active @endif" onclick="setGender('male')">
                                <input type="radio" name="gender" value="male" @if(old('gender') == 'male') checked @endif>
                                Male
                            </button>
                            <button type="button" class="gender-btn @if(old('gender') == 'female') active @endif" onclick="setGender('female')">
                                <input type="radio" name="gender" value="female" @if(old('gender') == 'female') checked @endif>
                                Female
                            </button>
                        </div>
                        @error('gender')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Physical Information -->
                    <div class="form-grid">
                        <!-- Height -->
                        <div class="form-group @error('height') has-error @enderror">
                            <label for="height">Height (cm) <span class="text-cyan-500 text-sm">(Enter 0 if unknown)</span></label>
                            <input type="number" id="height" name="height"
                                placeholder="e.g 175" min="0" max="250" value="{{ old('height') }}">
                            @error('height')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Weight -->
                        <div class="form-group @error('weight') has-error @enderror">
                            <label for="weight">Weight (kg) <span class="text-cyan-500 text-sm">(Enter 0 if unknown)</span></label>
                            <input type="number" id="weight" name="weight"
                                placeholder="e.g 70" min="0" max="300" value="{{ old('weight') }}">
                            @error('weight')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Birthday -->
                    <div class="form-group @error('birthday') has-error @enderror">
                        <label for="birthday">Birthday</label>
                        <input type="date" id="birthday" name="birthday"
                            max="{{ date('Y-m-d') }}" value="{{ old('birthday') }}">
                        @error('birthday')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Blood Type -->
                    <div class="form-group @error('blood_type') has-error @enderror">
                        <label>Blood Type</label>
                        <div class="blood-type-section">
                            <div class="blood-type-grid">
                                @php
                                    $bloodTypes = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-', 'other', 'unknown'];
                                @endphp
                                @foreach($bloodTypes as $type)
                                    <button type="button" class="blood-type-btn @if(old('blood_type') == $type) active @endif" onclick="setBloodType('{{ $type }}')">
                                        <input type="radio" name="blood_type" value="{{ $type }}" @if(old('blood_type') == $type) checked @endif>
                                        {{ $type }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                        @error('blood_type')
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

        function setBloodType(type) {
            // Set the radio button
            document.querySelector(`input[value="${type}"]`).checked = true;

            // Update button styles
            const buttons = document.querySelectorAll('.blood-type-btn');
            buttons.forEach(button => {
                button.classList.remove('active');
            });

            // Add active style to selected button
            event.currentTarget.classList.add('active');
        }
    </script>
</body>
</html>

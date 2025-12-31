@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="background-shape"></div>
    <div class="secondary-shape"></div>

    <!-- LOGIN -->
    <div class="credentials-panel signin">
        <h2 class="slide-element">Login</h2>

        <form method="POST" action="/login">
            @csrf

            <div class="field-wrapper slide-element">
                <input type="email" name="email" required>
                <label>Email</label>
                <i class="fa-solid fa-user"></i>
            </div>

            <div class="field-wrapper slide-element">
                <input type="password" name="password" required>
                <label>Password</label>
                <i class="fa-solid fa-lock"></i>
            </div>

            <div class="field-wrapper slide-element">
                <button class="submit-button">Login</button>
            </div>

            <div class="switch-link slide-element">
                <p>Don't have an account?<br>
                    <a href="#" class="register-trigger">Sign Up</a>
                </p>
            </div>
        </form>
    </div>

    <div class="welcome-section signin">
        <h2 class="slide-element">WELCOME BACK!</h2>
    </div>

    <!-- REGISTER -->
    <div class="credentials-panel signup">
        <h2 class="slide-element">Register</h2>

        <form method="POST" action="/register">
            @csrf

            <div class="field-wrapper slide-element">
                <input type="text" name="name" required>
                <label>Username</label>
                <i class="fa-solid fa-user"></i>
            </div>

            <div class="field-wrapper slide-element">
                <input type="email" name="email" required>
                <label>Email</label>
                <i class="fa-solid fa-envelope"></i>
            </div>

            <div class="field-wrapper slide-element">
                <input type="password" name="password" required>
                <label>Password</label>
                <i class="fa-solid fa-lock"></i>
            </div>

            <div class="field-wrapper slide-element">
                <button class="submit-button">Register</button>
            </div>

            <div class="switch-link slide-element">
                <p>Already have an account?<br>
                    <a href="#" class="login-trigger">Sign In</a>
                </p>
            </div>
        </form>
    </div>

    <div class="welcome-section signup">
        <h2 class="slide-element">WELCOME!</h2>
    </div>
</div>

<div class="footer">
    <p>Made with ❤️ by <a href="#">charvi</a></p>
</div>
@endsection

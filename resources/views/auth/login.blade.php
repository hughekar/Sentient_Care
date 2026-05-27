<div class="login-wrapper">
    <div class="login-card">
        <div class="logo-section">
            <link rel="stylesheet" href="/css/login.css">
            <img src="/images/sentientcare-logo.png" class="logo" alt="Sentient Care Logo">
            <h1>Welcome to Sentient Care</h1>
            <p class="subtitle">Supporting compassionate digital healthcare</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="email" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="forgot">
                <a href="{{ route('password.request') }}">Forgot password?</a>
            </div>

            <button type="submit" class="login-btn">Log in</button>

            <div class="help-link">
                <a href="#">Need help?</a>
            </div>
        </form>
    </div>
</div>

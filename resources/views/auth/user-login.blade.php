<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login - Blood Bank</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body {
            margin: 0;
            background: linear-gradient(to bottom, #7b1e1e, #2d0606);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            display: flex;
            width: 900px;
            height: 520px;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        .left-side {
            flex: 1;
            background: linear-gradient(to bottom, #8b0000, #b22222);
            color: white;
            padding: 50px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }
        .left-side h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }
        .left-side p {
            font-size: 15px;
            max-width: 300px;
        }
        .left-side::before,
        .left-side::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            opacity: 0.3;
        }
        .left-side::before {
            width: 200px;
            height: 200px;
            bottom: -50px;
            left: -50px;
        }
        .left-side::after {
            width: 150px;
            height: 150px;
            top: 50%;
            right: -75px;
            transform: translateY(-50%);
        }
        .right-side {
            flex: 1;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .right-side h2 {
            margin-bottom: 25px;
            color: #6a0f0f;
        }
        .input-group {
            margin-bottom: 15px;
            position: relative;
        }
        .input-group input {
            width: 100%;
            padding: 12px 40px 12px 40px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        .input-group i {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #888;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #a52a2a;
            font-size: 13px;
        }
        .options {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .options label {
            display: flex;
            align-items: center;
        }
        .options input {
            margin-right: 5px;
        }
        .btn-primary {
            background: #6a0f0f;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn-primary:hover {
            background: #a10f0f;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
            font-size: 14px;
        }
        
    .signup-link {
      margin-top: 20px;
      text-align: center;
      font-size: 14px;
    }

    .signup-link a {
      color: #0056b3;
      text-decoration: none;
      font-weight: bold;
    }
    </style>
</head>
<body>
<div class="login-container">
    <div class="left-side">
        <h1>WELCOME</h1>
        <p>Secure access to the Blood Bank system. Manage donors, blood units, and hospital requests with confidence.</p>
    </div>
    <div class="right-side">
        <h2>Login</h2>

        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif
        <form method="POST" action="{{ route('user.login') }}">
            @csrf
            <div class="input-group">
                <i>👤</i>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <i>🔒</i>
                <input type="password" name="password" id="passwordInput" placeholder="Password" required>
                <span class="toggle-password" onclick="togglePassword()">SHOW</span>
            </div>
            <div class="options">
                <label><input type="checkbox" name="remember"> Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" class="btn-primary">Login</button>
        </form>
        <div class="signup-link">
        Hospital Manager, Don't have an account? <a href="/hospital-request">Sign Up</a>
      </div>
    </div>
</div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('passwordInput');
        const toggle = document.querySelector('.toggle-password');
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggle.textContent = "HIDE";
        } else {
            passwordInput.type = "password";
            toggle.textContent = "SHOW";
        }
    }
</script>
</body>
</html>
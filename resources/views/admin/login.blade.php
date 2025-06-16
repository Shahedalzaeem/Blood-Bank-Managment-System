<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            margin: 0;
            height: 100vh;
            background: radial-gradient(circle at top left, #0a0f3c, #020615);
            background-image: url('/images/background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .login-box {
            background: rgba(0, 170, 255, 0.1);
            padding: 40px 30px;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            box-shadow: 0 0 25px rgba(0, 255, 255, 0.2);
            width: 350px;
            position: relative;
        }

        .login-box .shield-icon {
            width: 60px;
            margin: 0 auto 20px;
            display: block;
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: none;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            font-size: 16px;
        }

        input::placeholder {
            color: #ddd;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #00c2ff;
            color: black;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #00aadd;
        }

        .error {
            color: #ff8080;
            background: rgba(255, 0, 0, 0.1);
            border-left: 4px solid red;
            padding: 8px;
            font-size: 14px;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <img src="/images/icon4.png" alt="shield" class="shield-icon" />
        <h2>Admin Login</h2>

        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
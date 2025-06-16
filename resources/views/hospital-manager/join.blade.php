<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hospital Join Request</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body {
            margin: 0;
            background: linear-gradient(to bottom, #384e8c, #2f343d);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 900px;
            height: 520px;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            display: flex;
        }
        .left {
            flex: 1;
            background: linear-gradient(to bottom, #384e8c, #2f343d);
            color: white;
            padding: 50px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }
        .left h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }
        .left p {
            font-size: 15px;
            max-width: 300px;
        }
        .left::before,
        .left::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            opacity: 0.3;
        }
        .left::before {
            width: 200px;
            height: 200px;
            bottom: -50px;
            left: -50px;
        }
        .left::after {
            width: 150px;
            height: 150px;
            top: 50%;
            right: -75px;
            transform: translateY(-50%);
        }
        .right {
            flex: 1;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .right h2 {
            margin-bottom: 25px;
            color: #2f343d;
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        .btn-submit {
            background: #384e8c;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn-submit:hover {
            background: #2a3a70;
        }
        .success {
            color: green;
            text-align: center;
            margin-bottom: 10px;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
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
    <div class="container">
        <div class="left">
            <h1>WELCOME</h1>
            <p>Request to join the Blood Bank system as a Hospital Manager. Submit your details for verification.</p>
        </div>
        <div class="right">
            <h2>Hospital Join Request</h2>

            @if(session('success'))
                <div class="success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="error">
                    <ul style="padding: 0; list-style: none;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('hospital-manager.submit') }}">
                @csrf
                <div class="input-group">
                    <input type="text" name="hospital_name" placeholder="Hospital Name" required>
                    </div>
                <div class="input-group">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn-submit">Submit Request</button>
            </form>
            <div class="signup-link">
                Already have an account? <a href="/login">Log in</a>
            </div>
        </div>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background-image: url('/images/waves.png');
            background-size: 100%;
            color: #333;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 50px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .logo {
            font-size: 30px;
            font-weight: bold;
            color: #9f181a;
        }

        .nav-links a {
            margin: 0 15px;
            text-decoration: none;
            color: #444;
            font-weight: 500;
        }

        .sub-header {
            height: 8px;
            background-color: #000000;
            width: 100%;
        }

        .auth-buttons button {
            margin-left: 10px;
            padding: 10px 18px;
            border: none;
            background-color: #891522;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .main {
            padding: 60px 20px;
            text-align: center;
        }

        .main h2 {
            font-size: 36px;
            margin-bottom: 40px;
        }

        .services-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            align-items: flex-start;
            gap: 60px;
        }

        .service-col {
            display: flex;
            flex-direction: column;
            gap: 40px;
        }

        .service-box {
            max-width: 260px;
            min-height: 200px;
            text-align: left;
            padding: 10px;
        }

        .service-box h4 {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #222;
        }

        .service-box p {
            color: #555;
            font-size: 18px;
            line-height: 1.6;
        }

        .center-image img {
            width: 300px;
            height: 300px;
            border-radius: 70%;
            object-fit: cover;
        }

        @media (max-width: 768px) {
            .services-container {
                flex-direction: column;
            }

            .service-col {
                align-items: center;
                text-align: center;
            }

            .service-box {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="sub-header"></div>
    <header class="navbar">
        <div class="logo">
            <span style="font-size: 40px;">💉</span>
            <span style="font-size: 30px;">Blood Bank</span>
        </div>
        <nav class="nav-links">
            <a href="/home">Home</a>
            <a href="/about-us">About us</a>
            <a href="/our-services">Our Services</a>
            <a href="#">Contact</a>
        </nav>
        <div class="auth-buttons">
        <div class="auth-buttons">
            <a href="/hospital-request"><button class="signup">SIGN UP</button></a>
            <a href="/login"><button class="login">LOGIN</button></a>
        </div>
    </header>
    <div class="sub-header"></div>

    <!-- Main Section -->
    <section class="main">
        <h2>Our services</h2>
        <div class="services-container">
            <!-- Left side services -->
            <div class="service-col">
                <div class="service-box">
                    <h4>Security</h4>
                    <p>The system provides an interface for submitting a formal membership application to be processed by a specialist.</p>
                </div>
                <div class="service-box">
                    <h4>Status tracking</h4>
                    <p>You can view all submitted requests with the status of each request.</p>
                </div>
            </div>

            <!-- Center image -->
            <div class="center-image">
                <img src="/images/picpic2.png" alt="Doctor">
            </div>

            <!-- Right side services -->
            <div class="service-col">
                <div class="service-box">
                    <h4>Safety</h4>
                    <p>Our system ensures the highest safety standards by carefully inspecting all blood units before they are accepted into stock.</p>
                </div>
                <div class="service-box">
                    <h4>Receiving requests</h4>
                    <p>You can fill out the form to determine your need for blood units.</p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

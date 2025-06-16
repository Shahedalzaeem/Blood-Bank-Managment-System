<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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
    height: 8px; /* سماكة الخط */
    background-color: #000000;
    width: 100%;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: white;
    box-shadow: 0px 8px 16px rgba(0,0,0,0.1);
    z-index: 1;
    margin-top: 10px;
}

.dropdown-content a {
    padding: 10px 20px;
    display: block;
    color: #333;
    text-decoration: none;
}

.dropdown:hover .dropdown-content {
    display: block;
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

.auth-buttons .signup {
    background-color: #891522;
}

.main {
    display: flex;
    align-items: center;
    padding: 80px;
    gap: 60px;
}

.main .left img {
    width: 400px;
    max-width: 100%;
}

.main .right {
    max-width: 700px;
}

.main .right h2 {
    font-size: 35px;
    margin-bottom: 20px;
}

.main .right p {
    font-size: 20px;
    color: #666;
    margin-bottom: 25px;
}

.learn-more {
    padding: 10px 20px;
    background-color: #891522;
    color: white;
    border: none;
    border-radius: 8px;
    margin-bottom: 50px;
}

.icons {
    display: flex;
    gap: 60px;
}

.icon-box {
    text-align: center;
}

.icon-box img {
    width: 48px;
    margin-bottom: 8px;
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
            <a href="/hospital-request"><button class="signup">SIGN UP</button></a>
            <a href="/login"><button class="login">LOGIN</button></a>
        </div>
    </header>
    <div class="sub-header"></div>

    <!-- Main Section -->
    <section class="main">
        <div class="left">
            <img src="/images/picpic3.png" alt="Medical Graphic" />
        </div>
        <div class="right">
            <h2>About us</h2>
            <p>
                The Blood Bank Management System is a comprehensive platform designed to manage blood donations, testing, processing, and inventory with high efficiency.
                It enables seamless communication between hospitals and blood banks, ensuring that safe and compatible blood components are available whenever needed.
            </p>
            <button class="learn-more">LEARN MORE</button>
            <div class="icons">
                <div class="icon-box">
                    <img src="/images/icon1.png" alt="Emergency">
                    <p>Emergency</p>
                </div>
                <div class="icon-box">
                    <img src="/images/icon2.png" alt="Appointment">
                    <p>Safety</p>
                </div>
                <div class="icon-box">
                    <img src="/images/icon3.png" alt="Qualified">
                    <p>Qualified</p>
                </div>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html>
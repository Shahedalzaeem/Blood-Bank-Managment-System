<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
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
           display: flex;
           align-items: center;
           padding: 75px;
           gap: 60px;
           flex-direction: row-reverse;
       }

       .main .right img {
           width: 450px;
           height: 500px;
           max-width: 100%;
       }

       .main .left {
           max-width: 750px;
       }

       .main .left h2 {
           font-size: 40px;
           margin-bottom: 20px;
       }

       .main .left p {
           font-size: 22px;
           color: #666;
           margin-bottom: 25px;
       }

       .join-btn {
           padding: 10px 20px;
           background-color: #891522;
           color: white;
           border: none;
           border-radius: 8px;
           margin-bottom: 50px;
           cursor: pointer;
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
        <div class="right">
            <img src="/images/picpic.png" alt="Doctors Team" />
        </div>
        <div class="left">
            <h2>Welcome</h2>
            <p>
                Join our mission to save lives by becoming a part of a well-organized and reliable blood bank system. 
                Together, we make a difference by ensuring safe and timely blood delivery to those in need.
            </p>
            <button class="join-btn">JOIN WITH US</button>
            <div class="icons">
                <div class="icon-box">
                    <img src="/images/icon1.png" alt="Emergency">
                    <p>Emergency</p>
                </div>
                <div class="icon-box">
                    <img src="/images/icon2.png" alt="Safety">
                    <p>Safety</p>
                </div>
                <div class="icon-box">
                    <img src="/images/icon3.png" alt="Qualified">
                    <p>Qualified</p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
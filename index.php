<?php
    // Function to get the client IP address
    function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bocicone css link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <!-- favicon icon -->
    <link rel="icon" type="image/png" href="./favicon/favicon-48x48.png" sizes="48x48" />
    <link rel="icon" type="image/svg+xml" href="./favicon/favicon.svg" />
    <link rel="shortcut icon" href="./favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-touch-icon.png" />
    <link rel="manifest" href="./favicon/site.webmanifest" />


    <!-- style sheet link -->
    <link rel="stylesheet" href="./css/index_style.css">
    <title>Shahidul Kabir</title>
</head>

<body>
    <header class="container">
        <div class="page-header">
            <div class="logo">
                <a href="index.php">SK</a>
            </div>
            <input type="checkbox" id="click">

            <label for="click" class="mainicon">
                <div class="menu">
                    <i class='bx bx-menu'></i>
                </div>
            </label>
            <ul>
                <li><a href="#" class="active" style="--navAni:1">Home</a></li>
                <li><a href="#" style="--navAni:2">About</a></li>
                <li><a href="#" style="--navAni:3">Skills</a></li>
                <li><a href="#" style="--navAni:4">Portfolio</a></li>
                <li><a href="#" style="--navAni:5">Contact</a></li>
                <li><a href="login_expense/index.php" style="--navAni:5">Login</a></li>
            </ul>
            <label class="mode">
                <input type="checkbox" id="darkModeToggle">
                <i class='bx bxs-moon'></i>
            </label>
        </div>
    </header>

    <div id="particles-js"></div>

    <section class="container">
        <div class="main">
            <div class="detail">
                <h3>Hi, It's Me</h3>
                <h1>I'm <span style="color:#f9532d;">Shahidul</span> Kabir</h1>
                <p>I'm a professional Web Developer. Our Main Goal to help & Satisficed the Local & Global Clients by
                    web development solutions
                </p>
                <div class="social">
                    <a href="#" style="--socialAni:1"><i class='bx bxl-linkedin'></i></a>
                    <a href="https://www.instagram.com/shahidulkabir419/" style="--socialAni:2"><i class='bx bxl-instagram'></i></a>
                    <a href="https://www.facebook.com/skabir419" style="--socialAni:4"><i class='bx bxl-facebook-circle'></i></a>
                </div>
            </div>
            <div class="img-sec">
                <div class="images">
                    <img src="favicon_p/butter_fly_blue.jpg"
                        alt="" class="img-w">
                </div>
            </div>
        </div>

        <footer>
            <div class="footer-bottom">
                &copy; Shahidul Kabir<?php echo date("Y") ?>
                <p> <?php echo "Your IP address is : " . get_client_ip(); ?></p>
            </div>
        </footer>

    </section>

    <script src="./js/index_script.js"></script>
    <script type="text/javascript" src="./js/particles.js"></script>
    <script type="text/javascript" src="./js/app.js"></script>

</body>

</html>

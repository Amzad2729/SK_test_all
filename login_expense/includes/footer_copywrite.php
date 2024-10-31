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




<br>

<footer class="text-center text-lg-start shadow-sm text-black px-md-3 px-2 rounded text-light myfooterdes">
    <div class="text-center p-1">
        <div class="text-center p-2 text-light">
            <div class="text-center text-light">
                Your IP address <span><?php echo get_client_ip(); ?></span>
            </div>
            &copy Copyright : <?php echo date("Y") ; ?>   |  
            Power by : <?php echo isset($_SESSION['name']) ? ucfirst($_SESSION['name']) : 'SK'; ?>
            <p>Developer : <a class="link-dark text-light" href="https://amzad.epizy.com/">Amzad Hossain</a></p>
        </div>
    </div>
</footer>


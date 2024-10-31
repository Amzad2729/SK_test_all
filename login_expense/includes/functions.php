<?php

// Alart massage 
function my_alert($color, $msg)
{
    ?>

    <div style="position: absolute; right: 20px; top: 70px; " 
    class="alert alert-<?php echo $color ?> alert-dismissible fade show" role="alert">
        <?php echo $msg ?>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
     </button>
    </div>
    <?php
}




// Check User
function check_user(){
    if(!isset($_SESSION['is_login']) == true){
        header("Location: login_user.php");
    }
}




// customize date
function customize_date($date){
    $php_date = strtotime($date);
    $formatted_date = date("d-m-Y",$php_date);
    echo $formatted_date;
}

?>





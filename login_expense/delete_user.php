<?php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");



if(isset($_REQUEST['delete_id'])){

    $delete_id = $_REQUEST['delete_id'];

    $del_query = "DELETE FROM reg_users WHERE reg_id = $delete_id";
    $run_del_query = mysqli_query($conn, $del_query);

    if($run_del_query){
        my_alert("success", "User deleted successfully.");
        // header("Location: ./display_reg.php");
    }else{
        my_alert("danger", "Something went wrong! While deleting the user.");
    }

    mysqli_close($conn);
}

?>


<?php
include("./includes/footer.php");
?>
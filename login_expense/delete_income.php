


<?php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");



if(isset($_REQUEST['del_income_id'])){

    $del_income_id = $_REQUEST['del_income_id'];

    $del_query = "DELETE FROM income_info WHERE item_id = $del_income_id";
    $run_del_query = mysqli_query($conn, $del_query);

    if($run_del_query){
        my_alert("success", "Deleted successfully.");
        // header("Location: ./all_income.php");
    }else{
        my_alert("danger", "Something went wrong! While deleting the income.");
    }

    mysqli_close($conn);
}

?>


<?php
include("./includes/footer.php");
?>



<?php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");



if(isset($_REQUEST['del_salary_id'])){

    $del_salary_id = $_REQUEST['del_salary_id'];

    $del_query = "DELETE FROM salary WHERE item_id = $del_salary_id";
    $run_del_query = mysqli_query($conn, $del_query);

    if($run_del_query){
        my_alert("success", "Deleted successfully.");
        // header("Location: ./all_lone.php");
    }else{
        my_alert("danger", "Something went wrong! While deleting the lone.");
    }

    mysqli_close($conn);
}

?>


<?php
include("./includes/footer.php");
?>
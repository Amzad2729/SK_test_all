


<?php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");



if(isset($_REQUEST['del_expense_id'])){

    $del_expense_id = $_REQUEST['del_expense_id'];

    $del_query = "DELETE FROM expenses_info WHERE item_id = $del_expense_id";
    $run_del_query = mysqli_query($conn, $del_query);

    if($run_del_query){
        // my_alert("success", "Deleted successfully.");
        // header("Location: ./all_expenses.php");
        
        echo "<script>alert('Delete expense successfully'); window.location.href='./all_expenses.php';</script>";
        exit;
    }else{
        my_alert("danger", "Something went wrong! While deleting the expense.");
    }

    mysqli_close($conn);
}


?>


<?php
include("./includes/footer.php");
?>
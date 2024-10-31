<?php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");

check_user();

$edit_salary_id = null;
$db_item_name = null;
$db_item_price = null;
$db_item_date = null;

// fetching data from database - table expense_info
if(isset($_REQUEST['edit_salary_id'])){

    $edit_salary_id = $_REQUEST['edit_salary_id'];

    $fetch_query = "SELECT * FROM salary WHERE item_id = $edit_salary_id";
    $run_fetch_query = mysqli_query($conn, $fetch_query);

    $row = mysqli_fetch_assoc($run_fetch_query);
    $db_item_name = $row['item_name'];
    $db_item_price = $row['item_price'];
    $db_item_date = $row['item_date'];

    
}

// uploading expense_info table columm values
if(isset($_REQUEST['update_item'])){
    $update_item_name = $_REQUEST['update_item_name'];
    $update_item_price = $_REQUEST['update_item_price'];
    $update_item_date = $_REQUEST['update_item_date'];
    

    $update_query = "UPDATE `salary` SET `item_name`='$update_item_name',`item_price`='$update_item_price',`item_date`='$update_item_date' WHERE item_id =$edit_salary_id ";
    $run_update_query = mysqli_query($conn,$update_query);

    if($run_update_query){
        my_alert("success", "salary updated successfully");
    }else{
        my_alert("danger", "Something wrong!, salary not update");
    }
}


    mysqli_close($conn);

?>


<div class="container">
    <div class="card" id="my-card">
        <!-- <h2 class="text-center display-4 py-3 fw-semibold">Add Expense</h2> -->
        <div class="card-header bg-secondary text-white text-center display-6 fw-semibold">
            Preview Salary
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                        <form method="POST">
                            <div class="row">
                            <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">Date</label>
                                    <input type="date" class="form-control" name="update_item_date" value="<?php echo $db_item_date ?>" disabled>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" class="form-control"  name="update_item_name" value="<?php echo $db_item_name ?>"disabled >
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">Price</label>
                                    <input type="number" class="form-control"  name="update_item_price" value="<?php echo $db_item_price ?>" disabled>
                                </div>

                            </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>




<?php
include("./includes/footer.php");
?>
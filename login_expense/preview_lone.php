<?php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");

check_user();

$edit_inicome_id = null;
$db_item_name = null;
$db_item_price = null;
$db_item_date = null;
$db_item_details = null;

// fetching data from database - table expense_info
if(isset($_REQUEST['edit_lone_id'])){

    $edit_lone_id = $_REQUEST['edit_lone_id'];

    $fetch_query = "SELECT * FROM lone_info WHERE item_id = $edit_lone_id";
    $run_fetch_query = mysqli_query($conn, $fetch_query);

    $row = mysqli_fetch_assoc($run_fetch_query);
    $db_item_name = $row['item_name'];
    $db_item_price = $row['item_price'];
    $db_item_date = $row['item_date'];
    $db_item_details = $row['item_details'];

    
}

// uploading expense_info table columm values
if(isset($_REQUEST['update_item'])){
    $update_item_name = $_REQUEST['update_item_name'];
    $update_item_price = $_REQUEST['update_item_price'];
    $update_item_date = $_REQUEST['update_item_date'];
    $update_item_details = $_REQUEST['update_item_details'];
    

    $update_query = "UPDATE `lone_info` SET `item_name`='$update_item_name',`item_price`='$update_item_price',`item_date`='$update_item_date',`item_details`='$update_item_details' WHERE item_id =$edit_lone_id ";
    $run_update_query = mysqli_query($conn,$update_query);

    if($run_update_query){
        my_alert("success", "lone updated successfully");
    }else{
        my_alert("danger", "Something wrong!, lone not update");
    }
}


    mysqli_close($conn);

?>


<div class="container">
    <div class="card" id="my-card">
        <!-- <h2 class="text-center display-4 py-3 fw-semibold">Add Expense</h2> -->
        <div class="card-header bg-secondary text-white text-center display-6 fw-semibold">
            Preview lone
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
                                    <input type="text" class="form-control" placeholder="Item Name" name="update_item_name" value="<?php echo $db_item_name ?>"disabled >
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">Price</label>
                                    <input type="number" class="form-control" placeholder="Amount" name="update_item_price" value="<?php echo $db_item_price ?>" disabled>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">Discraption</label>
                                    <input type="text" class="form-control" placeholder="Input details" name="update_item_details" value="<?php echo $db_item_details ?>" disabled>
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
<?php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");

$update_pass_id = null;
$db_user_name = null;

// fetching data from database
if(isset($_REQUEST['update_pass_id'])){

    $update_pass_id = $_REQUEST['update_pass_id'];

    $fetch_query = "SELECT user_name FROM reg_users WHERE reg_id = $update_pass_id";
    $run_fetch_query = mysqli_query($conn, $fetch_query);

    $row = mysqli_fetch_assoc($run_fetch_query);
    $db_user_name = $row['user_name'];
    
}

// uploading user password in database
if(isset($_REQUEST['update_pass'])){
    $update_user_pass = $_REQUEST['update_user_pass'];
    $enc_password = password_hash($update_user_pass, PASSWORD_BCRYPT);

    $update_query = "UPDATE reg_users SET user_pass = '$enc_password' WHERE  reg_id=$update_pass_id";
    $run_update_query = mysqli_query($conn,$update_query);

    if($run_update_query){
        my_alert("success", "Password updated successfully");
    }else{
        my_alert("danger", "Something wrong!, password not update");
    }
}


    mysqli_close($conn);

?>



<div class="container">
    <div class="card"id="my-card">
        <div class="card-header bg-primary text-white text-center">
            Set New Password
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="" class="form-lable">User Name</label>
                            <input type="text" class="form-control disabled" value="<?php echo $db_user_name ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-lable">User Password</label>
                            <input type="password" class="form-control" name="update_user_pass" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="update_pass" class="btn btn-primary w-100">Update Password</button>
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
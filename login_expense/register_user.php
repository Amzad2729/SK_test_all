<?php
include("./includes/header.php");
include("./includes/functions.php");




if(isset($_REQUEST['register'])){
    include("./includes/db_conn.php");

    // getting input values from html form
    $user_name = $_REQUEST['user_name'];
    $user_email = $_REQUEST['user_email'];
    $user_pass = $_REQUEST['user_pass'];

    // Encrypted password
    $enc_pass = password_hash($user_pass,PASSWORD_BCRYPT);
    

    //inserting data into database
    $sql = "INSERT INTO reg_users (user_name,user_email, user_pass)
    VALUES ('$user_name', '$user_email', '$enc_pass')";

        if (mysqli_query($conn, $sql)) {
            my_alert("success", "New record created successfully");
        } else {
            my_alert("danger", "Error while inserting the record");
        }

        mysqli_close($conn);
    }
?>

<div class="container">
    <div class="card" id="my-card">
        <div class="card-header bg-primary text-white text-center display-6 fw-semibold">
            Register User
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="" class="form-lable">User Name</label>
                            <input type="text" class="form-control" name="user_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-lable">User Email</label>
                            <input type="email" class="form-control" name="user_email" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-lable">User Password</label>
                            <input type="password" class="form-control" name="user_pass" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
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
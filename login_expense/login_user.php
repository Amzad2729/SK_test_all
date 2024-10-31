<?php
include("./includes/header.php");
include("./includes/functions.php");



if(isset($_REQUEST['login'])){
    include("./includes/db_conn.php");

    // getting input values from html form
    $user_name = $_REQUEST['user_name'];
    $user_pass = $_REQUEST['user_pass'];

    $login_query = "SELECT * FROM reg_users WHERE user_name = '$user_name' ";
    $result_login_query = mysqli_query($conn,$login_query);

    if(mysqli_num_rows($result_login_query) == 1){
        $row = mysqli_fetch_assoc($result_login_query);
        $db_user_name = $row['user_name'];
        $db_user_pass = $row['user_pass'];
        $db_user_pic = $row['user_pic'];

        if(password_verify($user_pass,$db_user_pass)){
            $_SESSION['name'] = $db_user_name;
            $_SESSION['picture'] = $db_user_pic;
            $_SESSION['is_login'] = true;
            my_alert("success", "Login successfull.");
            header("Location: index.php");
        } else {
            my_alert("danger", "Incrrect user name and password.");

        }
    } else {
        // echo "user dosn't exist";
        my_alert("danger", "User not found!!");
    }
    



        mysqli_close($conn);
    }
?>

<div class="container">
    <div class="card" id="my-card">
        <div class="card-header bg-primary text-white text-center">
            Login Form
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
                            <label for="" class="form-lable">User Password</label>
                            <input type="password" class="form-control" id="passwordInput" name="user_pass" required>
                            <div class="form-text">
                                <input type="checkbox" id="showPasswordCheckbox" onclick="togglePasswordVisibility()">
                                Show password
                            </div><br>
                        <div class="mb-3">
                            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
function togglePasswordVisibility() {
    var passwordInput = document.getElementById("passwordInput");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}
</script>

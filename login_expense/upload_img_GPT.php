<?php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");

$user_id = null;

if (isset($_REQUEST['user_id'])) {
    $user_id = intval($_REQUEST['user_id']);
} else {
    echo "User ID is not set.";
    exit; // Stop the script if user_id is not set.
}

if (isset($_REQUEST['submit'])) {
    $user_pic = $_FILES['user_pic'];
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    
    $img_name = $user_pic['name'];
    $img_tmp_name = $user_pic['tmp_name'];

    $img_extension = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));

    if (in_array($img_extension, $allowed_extensions)) {
        $new_img_name = round(microtime(true)) . "." . $img_extension; //img name .jpg
        $img_path = "./images/user_image/" . $new_img_name; // folder location

        $img_upload_result = move_uploaded_file($img_tmp_name, $img_path);

        if ($img_upload_result) {
            $stmt = $conn->prepare("UPDATE reg_users SET user_pic= ? WHERE reg_id = ?");
            $stmt->bind_param("si", $new_img_name, $user_id);
            $run_query_result = $stmt->execute();

            if ($run_query_result) {
                echo "Image name uploaded successfully in database";
            } else {
                echo "Error while uploading in database";
            }
        } else {
            echo "Something went wrong while uploading the image on the server";
        }
    } else {
        echo "Invalid file type! Only JPG, JPEG, PNG, and GIF are allowed.";
    }
}
?>

<div class="container">
    <div class="row py-5">
        <h1 class="text-center py-3">Upload user Image</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="col-md-6 mb-3 mx-auto">
                <input type="file" class="form-control" name="user_pic" required>
            </div>
            <div class="col-6 md-3 mx-auto">
                <button class="btn btn-primary w-100" type="submit" name="submit">Upload Picture</button>
            </div>
        </form>
    </div>
</div>

<?php
include("./includes/footer.php");
?>

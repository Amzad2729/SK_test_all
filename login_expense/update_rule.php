<?php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");

$rule_id = $_GET['rule_id'];

// Fetch rule details
$fetch_rule = "SELECT * FROM user_rules WHERE rule_id = $rule_id";
$run_fetch_rule = mysqli_query($conn, $fetch_rule);
$rule_row = mysqli_fetch_assoc($run_fetch_rule);

if (isset($_POST['submit'])) {
    $rule_name = $_POST['rule_name'];
    $rule_description = $_POST['rule_description'];

    $update_rule = "UPDATE user_rules SET rule_name = '$rule_name', rule_description = '$rule_description' WHERE rule_id = $rule_id";
    $run_update_rule = mysqli_query($conn, $update_rule);

    if ($run_update_rule) {
        echo "<script>alert('Rule updated successfully'); window.location.href='user_rule.php?user_rule_id=" . $rule_row['reg_id'] . "';</script>";
    } else {
        echo "<script>alert('Error updating rule');</script>";
    }
}

?>
<div class="container">
    <div class="row">
        <div class="col-12 py-5">
            <h1 class="text-center">Update Rule ID <?php echo $rule_id; ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="rule_name" class="form-label">Rule Name</label>
                    <input type="text" class="form-control" id="rule_name" name="rule_name" value="<?php echo $rule_row['rule_name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="rule_description" class="form-label">Rule Description</label>
                    <textarea class="form-control" id="rule_description" name="rule_description" rows="3" required><?php echo $rule_row['rule_description']; ?></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Update Rule</button>
            </form>
        </div>
    </div>
</div>
<?php
include("./includes/footer_copywrite.php");
include("./includes/footer.php");
?>
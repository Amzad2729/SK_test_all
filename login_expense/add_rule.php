<?php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");

$user_id = $_GET['user_id'];

if (isset($_POST['submit'])) {
    $rule_name = $_POST['rule_name'];
    $rule_description = $_POST['rule_description'];

    $insert_rule = "INSERT INTO user_rules (reg_id, rule_name, rule_description) VALUES ($user_id, '$rule_name', '$rule_description')";
    $run_insert_rule = mysqli_query($conn, $insert_rule);

    if ($run_insert_rule) {
        echo "<script>alert('Rule added successfully'); window.location.href='user_rule.php?user_rule_id=$user_id';</script>";
    } else {
        echo "<script>alert('Error adding rule');</script>";
    }
}

?>
<div class="container">
    <div class="row">
        <div class="col-12 py-5 ">
            <h1 class="text-center margin_yy">Add Rule for User ID <?php echo $user_id; ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="rule_name" class="form-label">Rule Name</label>
                    <input type="text" class="form-control" id="rule_name" name="rule_name" required>
                </div>
                <div class="mb-3">
                    <label for="rule_description" class="form-label">Rule Description</label>
                    <textarea class="form-control" id="rule_description" name="rule_description" rows="3" required></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Add Rule</button>
            </form>
        </div>
    </div>
</div>
<?php
include("./includes/footer_copywrite.php");
include("./includes/footer.php");
?>
<?php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");

$user_id = $_GET['user_rule_id'];

// Fetch user details
$fetch_user = "SELECT user_name FROM reg_users WHERE reg_id = $user_id";
$run_fetch_user = mysqli_query($conn, $fetch_user);
$user_row = mysqli_fetch_assoc($run_fetch_user);

// Fetch user rules
$fetch_rules = "SELECT * FROM user_rules WHERE reg_id = $user_id";
$run_fetch_rules = mysqli_query($conn, $fetch_rules);

?>
<div class="container">
    <div class="row">
        <div class="col-12 py-5">
            <h1 class="text-center margin_yy hh1">Manage Rules for <?php echo $user_row['user_name']; ?></h1>
        </div>
        <div class="col-12 mb-3">
            <a href="./add_rule.php?user_id=<?php echo $user_id; ?>" class="btn btn-primary"><i class="bi bi-plus-circle-fill me-2"></i><span>Add Rule</span></a>
        </div>
    </div>
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Rule Name</th>
                <th scope="col">Rule Description</th>
                <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($run_fetch_rules) > 0) {
                while ($row = mysqli_fetch_assoc($run_fetch_rules)) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $row['rule_id']; ?></th>
                        <td><?php echo $row['rule_name']; ?></td>
                        <td><?php echo $row['rule_description']; ?></td>
                        <td>
                            <a class="me-4 btn btn-warning btn-sm" href="./update_rule.php?rule_id=<?php echo $row['rule_id']; ?>"><i class="bi bi-pencil-square me-2"></i><span>Edit</span></a>
                            <a class="btn btn-danger btn-sm" href="./delete_rule.php?rule_id=<?php echo $row['rule_id']; ?>"><i class="bi bi-trash me-2"></i><span>Delete</span></a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="4">
                        <h3 class="text-danger text-center">No rules found for this user</h3>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include("./includes/footer_copywrite.php");
include("./includes/footer.php");
?>
<?php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");

$rule_id = $_GET['rule_id'];

$delete_rule = "DELETE FROM user_rules WHERE rule_id = $rule_id";
$run_delete_rule = mysqli_query($conn, $delete_rule);

if ($run_delete_rule) {
    echo "<script>alert('Rule deleted successfully'); window.location.href='user_rule.php?user_rule_id=" . $_GET['user_id'] . "';</script>";
} else {
    echo "<script>alert('Error deleting rule');</script>";
}

?>
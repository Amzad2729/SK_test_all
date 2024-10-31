<?php
include("./includes/header.php");
include("./includes/functions.php");

check_user();

if (isset($_REQUEST['add_item'])) {
    include("./includes/db_conn.php");

    // getting input values from html form
    $item_name = $_REQUEST['item_name'];
    $item_price = $_REQUEST['item_price'];
    $item_date = $_REQUEST['item_date'];
    $item_details = $_REQUEST['item_details'];

    // inserting data into database with prepared statements
    $sql = "INSERT INTO expenses_info (item_name, item_price, item_date, item_details) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sdss", $item_name, $item_price, $item_date, $item_details); // "s" for string, "d" for double/float
        if (mysqli_stmt_execute($stmt)) {
            my_alert("success", "New record created successfully");
        } else {
            my_alert("danger", "Error while inserting the record");
        }
        mysqli_stmt_close($stmt);
    } else {
        my_alert("danger", "Error preparing the statement");
    }

    mysqli_close($conn);
}
?>

<div class="container">
    <div class="card" id="my-card">
        <div class="card-header bg-primary text-white text-center display-6 fw-semibold">
            Add New Expense
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label">Date</label>
                                <input type="date" class="form-control" name="item_date" value="<?php echo date("Y-m-d"); ?>" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" placeholder="Item Name" name="item_name" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label">Price</label>
                                <input type="number" class="form-control" placeholder="Amount" name="item_price" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label">Description</label>
                                <input type="text" class="form-control" placeholder="Input details" name="item_details" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary w-100" name="add_item">Add Expense</button>
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

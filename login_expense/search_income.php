<?php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");

check_user()

?>

<div class="container">
    <form>
        <div class="row">
            <div class="col-md-12 margin_yy">
                <h2 class="text-center display-6 fw-bold py-3 hh1">Income Report</h2>
            </div>
            <div class="col-md-5 mb-3">
                <label for="" class="form-lable hh1">From</label>
                <input type="date" class="form-control" name="from_date" max="<?php echo date("Y-m-d"); ?>" id="from_date" onchange="get_day()">
            </div>
            <div class="col-md-5 mb-3">
                <label for="" class="form-lable hh1">To</label>
                <input type="date" class="form-control" name="to_date" max="<?php echo date("Y-m-d"); ?>" id="to_date">
            </div>
            <div class="col-md-2 mb-3 align-self-end">
                <button type="submit" class="btn btn-primary w-100" name="search">Search</button>
            </div>
        </div>
    </form>
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Date</th>
                <th scope="col">Income Details</th>
                <th scope="col">Operation</th>
            </tr>
        </thead>
    <tbody>
        <?php
            if(isset($_REQUEST['search'])){
                $from_date = $_REQUEST['from_date'];
                $to_date = $_REQUEST['to_date'];

                $search_income = "SELECT * FROM income_info WHERE item_date BETWEEN '$from_date' AND '$to_date' ";
                $run_search_income = mysqli_query($conn,$search_income);

                $income_counter = 1;
                $total = 0;

                if(mysqli_num_rows($run_search_income) > 0){
                    while($row = mysqli_fetch_assoc($run_search_income)){
                        ?>
                            <tr>
                                <td> <?php echo $income_counter; ?> </td>
                                <td> <?php echo $row['item_name']; ?> </td>
                                <td> <?php echo $row['item_price']; ?> </td>
                                <td> <?php customize_date($row['item_date']); ?> </td>
                                <td> <?php echo $row['item_details']; ?> </td>
                                <td>
                                <a class="btn btn-info btn-sm me-3" href="./preview_expense.php?edit_expense_id=<?php echo $row['item_id']; ?>"><i class="bi bi-eye me-2"></i><span>Preview</span></a> 
                                
                                <!-- <a class="btn btn-warning btn-sm me-3" href="./edit_expense.php?edit_expense_id=<?php echo $row['item_id']; ?>"><i class="bi bi-pencil-square me-2"></i><span>Edit</span></a>  -->
    
                                <!-- <a class="btn btn-danger btn-sm" href="./delete_expense.php?del_expense_id=<?php echo $row['item_id']; ?>"><i class="bi bi-x-square me-2"></i><span>Delete</span></a>  -->
                                </td>
                            </tr>
                        <?php
                        $income_counter++;
                        $total = $total + $row['item_price'];
                    }
                    ?>
                        <tr>
                            <th class="text-center" colspan="2">Total Amount</th>
                            <th><?php echo number_format($total); ?></th>
                        </tr>
                    <?php
            }else{
                ?>
                    <tr>
                        <td colspan="6">
                            <h3 class="text-danger text-center">No income record found in database!</h3>
                        </td>
                    </tr>
                <?php
            }
        }
            ?>
    </tbody>
</table>
</div>











<?php
include("./includes/footer_copywrite.php");
include("./includes/footer.php");
?>
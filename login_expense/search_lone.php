<?php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");

check_user()

?>

<div class="container">
    <form>
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center display-6 fw-bold py-3 margin_yy hh1">Lone Report</h2>
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
                <th scope="col">Lone Details</th>
            </tr>
        </thead>
    <tbody>
        <?php
            if(isset($_REQUEST['search'])){
                $from_date = $_REQUEST['from_date'];
                $to_date = $_REQUEST['to_date'];

                $search_lone = "SELECT * FROM lone_info WHERE item_date BETWEEN '$from_date' AND '$to_date' ";
                $run_search_lone = mysqli_query($conn,$search_lone);

                $lone_counter = 1;
                $total = 0;

                if(mysqli_num_rows($run_search_lone) > 0){
                    while($row = mysqli_fetch_assoc($run_search_lone)){
                        ?>
                            <tr>
                                <td> <?php echo $lone_counter; ?> </td>
                                <td> <?php echo $row['item_name']; ?> </td>
                                <td> <?php echo $row['item_price']; ?> </td>
                                <td> <?php customize_date($row['item_date']); ?> </td>
                                <td> <?php echo $row['item_details']; ?> </td>
                            </tr>
                        <?php
                        $lone_counter++;
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
                            <h3 class="text-danger text-center">No lone record found in database!</h3>
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
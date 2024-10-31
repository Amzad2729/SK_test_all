<?php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");

?>
<div class="container">
    <div class="row">
        <div class="col-12 py-5">
            <h1 class="text-center margin_yy hh1">All Salary</h1>
        </div>
        <div class="col-12 mb-3">
            <a href="./add_salary.php" class="btn btn-primary"><i class="bi bi-plus-square me-2"></i><span>Add Salary</span></a>
        </div>
    </div>
    <table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
        <tr class="rounded">
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Tk</th>
            <th scope="col">Date</th>
            <th scope="col">Operation</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $fetch_lone = "SELECT * FROM salary ORDER BY item_date DESC";
        $lone_counter = 1;
        $total = 0;
        $run_fetch_lone = mysqli_query($conn,$fetch_lone);
        if(mysqli_num_rows($run_fetch_lone) > 0){
                while($row = mysqli_fetch_assoc($run_fetch_lone)){
                    ?>
                        <tr>
                            <td> <?php echo $lone_counter; ?> </td>
                            <td> <?php echo $row['item_name']; ?> </td>
                            <td> <?php echo number_format($row['item_price']); ?> </td>
                            <td> <?php customize_date($row['item_date']); ?> </td>
                            <td>

                            <a class="btn btn-info btn-sm me-3" href="./preview_salary.php?edit_salary_id=<?php echo $row['item_id']; ?>"><i class="bi bi-eye me-2"></i><span>Preview</span></a>
                            
                            <a class="btn btn-warning btn-sm me-3" href="./edit_salary.php?edit_salary_id=<?php echo $row['item_id']; ?>"><i class="bi bi-pencil-square me-2"></i><span>Edit</span></a> 

                            <a class="btn btn-danger btn-sm" href="./delete_salary.php?del_salary_id=<?php echo $row['item_id']; ?>"><i class="bi bi-x-square me-2"></i><span>Delete</span></a> 
                            </td>
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
        ?>
    </tbody>
</table>
</div>



<?php
include("./includes/footer_copywrite.php");
include("./includes/footer.php");
?>
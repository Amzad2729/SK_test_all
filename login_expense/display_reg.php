<?php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");

?>
<div class="container">
    <div class="row">
        <div class="col-12 py-5">
            <h1 class="text-center margin_yy hh1">Registered Users</h1>
        </div>
        <div class="col-12 mb-3">
            <a href="./register_user.php" class="btn btn-primary"><i class="bi bi-person-plus-fill me-2"></i><span>Add User</span></a>
        </div>
    </div>
    <table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>

            <!-- if want to see user photo -->
            <th scope="col">User Photo</th>
            <th scope="col">Oprations</th>

            <!-- if want to manage user rules -->
            <!-- <th scope="col">Manage Rules</th> -->
            
        </tr>
    </thead>
    <tbody>




        <?php
        // gat all data in database
        // $fetch_data = "SELECT * FROM reg_users";

        // gat only user id name and password 
        $fetch_data = "SELECT reg_id, user_name, user_email, user_pass, user_pic FROM reg_users";
        $run_fetch_data = mysqli_query($conn, $fetch_data);

        $user_counter = 1;

        if (mysqli_num_rows($run_fetch_data) > 0) {
           while ($row =  mysqli_fetch_assoc($run_fetch_data)){
            ?>
                <tr>
                    <th scope="row"> <?php echo $user_counter;?> </th>
                    <td> <?php echo $row['user_name']; ?> </td>
                    <td> <?php echo $row['user_email']; ?> </td>

                    <!-- if want to see user photo  -->
                    <td>
                        <a href="upload_img.php?user_id?=<?php echo $row['reg_id']; ?>">
                            <?php 
                                if($row['user_pic'] == NULL){
                                    ?>
                                        <img width="40px" src="./images/user_image/dmy-img.png" alt="dummy image">
                                    <?php
                                }else{
                                    ?>
                                        <img width="40px" src="./images/user_image/ <?php ['user_pic']; ?>" alt="user image">
                                    <?php
                                }
                            ?>
                        </a>
                    </td>
                    <td>
                    <a class="me-4 btn btn-warning btn-sm" href="./update_user_pass.php?update_pass_id=<?php echo $row['reg_id']; ?>"><i class="bi bi-eye-slash-fill me-2"></i><span>Update Password</span></a>

                            <!-- user rule management -->

                    <a class="me-4 btn btn-success btn-sm" href="./user_rule.php?user_rule_id=<?php echo $row['reg_id']; ?>"><i class="bi bi-eye-slash-fill me-2"></i><span>Manage</span></a>


                               
                    <a class="btn btn-danger btn-sm" href="./delete_user.php?delete_id=<?php echo $row['reg_id']; ?>"><i class="bi bi-person-x-fill me-2"></i><span>Delete</span> </a> 
                    </td>
                </tr>
                <?php
                $user_counter++; 
                ?>
            <?php
           }
        }else{
            ?>
                    <tr>
                         <td colspan="4">
                            <h3 class="text-danger text-center">No record found in database</h3>
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
<?php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");

check_user()


?>



<div class="container py-3">
    <h2 class="text-center display-6 fw-bold py-3 margin_yy hh1">Total Lone</h2>
    <div class="row px-3">


    <div class="col-xl-6 col-lg-6 scrollme">
        <a href="./paid_lone.php">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Paid Lone</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php

                                $fetch_today_total_lone = "SELECT SUM(item_price) AS total_price FROM lone_paid";

                                $run_fetch_today_total_lone = mysqli_query($conn, $fetch_today_total_lone);

                                $result = mysqli_fetch_assoc($run_fetch_today_total_lone);

                                echo number_format($result['total_price']);
                            ?>
                            </h2>
                        </div>
                        
                    </div>
                </div>
            </div>
            </a>
        </div>


        <div class="col-xl-6 col-lg-6 scrollme">
            <a href="./all_lone.php">
            <div class="card l-bg-fff-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Unpaid Lone</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php
                             
                                // ...
                                
                                // Fetch total lone sum
                                $fetch_total_lone = "SELECT SUM(item_price) AS total_price FROM lone_info";
                                
                                $run_fetch_total_lone = mysqli_query($conn, $fetch_total_lone);
                                
                                $result_total_lone = mysqli_fetch_assoc($run_fetch_total_lone);
                                
                                $total_lone_sum = $result_total_lone['total_price'];
                                
                                // Fetch total paid lone sum
                                $fetch_total_paid_lone = "SELECT SUM(item_price) AS total_price FROM lone_paid";
                                
                                $run_fetch_total_paid_lone = mysqli_query($conn, $fetch_total_paid_lone);
                                
                                $result_total_paid_lone = mysqli_fetch_assoc($run_fetch_total_paid_lone);
                                
                                $total_paid_lone_sum = $result_total_paid_lone['total_price'];
                                
                                // Calculate total lone to be paid
                                $total_lone_to_be_paid = $total_lone_sum - $total_paid_lone_sum;
                                
                                // ...

                                echo number_format($total_lone_to_be_paid);
                                


                            ?>
                            </h2>
                        </div>
                        
                    </div>
                </div>
            </div>
            </a>
        </div>


        <div class="col-xl-6 col-lg-6 scrollme">
        <a href="./all_lone.php">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Lone</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php

                                $fetch_today_total_lone = "SELECT SUM(item_price) AS total_price FROM lone_info ";

                                $run_fetch_today_total_lone = mysqli_query($conn, $fetch_today_total_lone);

                                $result = mysqli_fetch_assoc($run_fetch_today_total_lone);

                                echo number_format($result['total_price']);
                            ?>
                            </h2>
                        </div>
                    
                    </div>
                </div>
            </div>
            </a>
        </div>

        
        
        
       
    </div>
</div>








<?php
include("./includes/footer_copywrite.php");
include("./includes/footer.php");
?>
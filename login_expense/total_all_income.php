<?php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");

check_user()


?>



<div class="container py-3">
    <h2 class="text-center display-6 fw-bold py-3 margin_yy hh1">Date Wise Income</h2>
    <div class="row px-3">
        <div class="col-xl-6 col-lg-6 scrollme">
            <a href="./today_income.php">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Today Income</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php
                                // total work today
                                $today_date = date("Y-m-d");
                                $fetch_today_total_income = "SELECT SUM(item_price) AS total_price FROM income_info WHERE item_date = '$today_date'";

                                $run_fetch_today_total_income = mysqli_query($conn, $fetch_today_total_income);

                                $result = mysqli_fetch_assoc($run_fetch_today_total_income);

                                echo number_format($result['total_price']);
                            ?>
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span>
                                <h5>
                                <?php
                                    $today_date = date("Y-m-d");
                                    $fetch_today_income = "SELECT * FROM income_info WHERE item_date = '$today_date' ";
                                    $run_fetch_today_income = mysqli_query($conn,$fetch_today_income);
 
                                    echo mysqli_num_rows($run_fetch_today_income);
                                ?>
                                </h5>
                           </span>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-6 col-lg-6 scrollme">
            <a href="./yesterday_income.php">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Yesterday Income</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">

                            <?php
                                // total work yesterday
                                $today_date = date("Y-m-d", strtotime("-1 day"));
                                $fetch_yesterday_total_income = "SELECT SUM(item_price) AS total_price FROM income_info WHERE item_date = '$today_date'";

                                $run_fetch_yesterday_total_income = mysqli_query($conn, $fetch_yesterday_total_income);

                                $result = mysqli_fetch_assoc($run_fetch_yesterday_total_income);

                                echo number_format($result['total_price']);
                            ?>

                            
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span>
                                <h5>
                                <?php
                                    $yesterday_date = date('Y-m-d', strtotime("-1 days"));
                                    $fetch_yesterday_income = "SELECT * FROM income_info WHERE item_date = '$yesterday_date' ";
                                    $run_fetch_yesterday_income = mysqli_query($conn,$fetch_yesterday_income);
                                    
                                    echo mysqli_num_rows($run_fetch_yesterday_income);
                                ?>
                                </h5>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-xl-6 col-lg-6 scrollme">
            <a href="./seven_days_income.php">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Last Week Income</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">

                            <?php
                                // total work in the last week
                                $today_date = date("Y-m-d");
                                $previous_seven_day_date = date("Y-m-d", strtotime($today_date . "-1 week"));
                                $fetch_seven_day_total_income = "SELECT SUM(item_price) AS total_price FROM income_info WHERE item_date BETWEEN '$previous_seven_day_date' AND '$today_date'";

                                $run_fetch_seven_day_total_income = mysqli_query($conn, $fetch_seven_day_total_income);

                                $result = mysqli_fetch_assoc($run_fetch_seven_day_total_income);

                                echo number_format($result['total_price']);
                            ?>

                            
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span>
                                <h5>
                                <?php
                                    $today_date = date("Y-m-d");
                                    $previous_seven_day_date = date("Y-m-d",strtotime($today_date . "-1 week"));
                                    $fetch_seven_day_income = "SELECT * FROM income_info WHERE item_date BETWEEN '$previous_seven_day_date' AND '$today_date'";
                                    $run_fetch_seven_day_income = mysqli_query($conn,$fetch_seven_day_income);

                                    echo mysqli_num_rows($run_fetch_seven_day_income);
                                ?>
                                </h5>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-xl-6 col-lg-6 scrollme">
            <a href="./monthly_income.php">
            
            <div class="card l-bg-sky-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Last Month Income</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php
                                // total work in the last month
                                $today_date = date("Y-m-d");
                                $previous_month_date = date("Y-m-d", strtotime($today_date . "-1 month"));
                                $fetch_month_total_income = "SELECT SUM(item_price) AS total_price FROM income_info WHERE item_date BETWEEN '$previous_month_date' AND '$today_date'";

                                $run_fetch_month_total_income = mysqli_query($conn, $fetch_month_total_income);

                                $result = mysqli_fetch_assoc($run_fetch_month_total_income);

                                echo number_format($result['total_price']);
                            ?>
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span>
                                <h5>
                                <?php
                                    $today_date = date("Y-m-d");
                                    $previous_month_date = date("Y-m-d",strtotime($today_date . "-1 month"));
                            
                            
                                    $fetch_month_income = "SELECT * FROM income_info WHERE item_date BETWEEN '$previous_month_date' AND '$today_date' ORDER BY item_date ASC";
                            
                                    $run_fetch_month_income = mysqli_query($conn,$fetch_month_income);
                                    echo mysqli_num_rows($run_fetch_month_income);
                                ?>
                                </h5>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-6 col-lg-6 scrollme">
            <a href="./six_monthly_income.php">
            <div class="card l-bg-white-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Last Six Month Income</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php
                                // total work in the last six month
                                $today_date = date("Y-m-d");
                                $previous_six_month_date = date("Y-m-d", strtotime($today_date . "-6 month"));
                                $fetch_six_month_total_income = "SELECT SUM(item_price) AS total_price FROM income_info WHERE item_date BETWEEN '$previous_six_month_date' AND '$today_date'";
                                $run_fetch_six_month_total_income = mysqli_query($conn, $fetch_six_month_total_income);
                                $result = mysqli_fetch_assoc($run_fetch_six_month_total_income);

                                echo number_format($result['total_price']);
                            ?>
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span><h5>
                            <?php
                                    $today_date = date("Y-m-d");
                                    $previous_seven_day_date = date("Y-m-d",strtotime($today_date . "-6 month"));
                            
                            
                                    $fetch_income = "SELECT * FROM income_info WHERE item_date BETWEEN '$previous_seven_day_date' AND '$today_date' ORDER BY item_date ASC";
                            
                                    $run_fetch_income = mysqli_query($conn,$fetch_income);

                                    echo mysqli_num_rows($run_fetch_income);
                                ?>
                            </h5></span>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-6 col-lg-6 scrollme">
            <a href="./year_income.php">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Yearly Income</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php
                                // total work in the last year
                                $today_date = date("Y-m-d");
                                $previous_year_date = date("Y-m-d", strtotime($today_date . "-1 year"));
                                $fetch_year_total_income = "SELECT SUM(item_price) AS total_price FROM income_info WHERE item_date BETWEEN '$previous_year_date' AND '$today_date'";
                                $run_fetch_year_total_income = mysqli_query($conn, $fetch_year_total_income);
                                $result = mysqli_fetch_assoc($run_fetch_year_total_income);

                                echo number_format($result['total_price']);
                            ?>
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span><h5>
                            <?php
                            //  work in the last week
                                $today_date = date("Y-m-d");
                                $previous_year_date = date("Y-m-d",strtotime($today_date . "-1 year"));
                                $fetch_income = "SELECT * FROM income_info WHERE item_date BETWEEN '$previous_year_date' AND '$today_date' ORDER BY item_date ASC";
                                $run_fetch_income = mysqli_query($conn,$fetch_income);

                                echo mysqli_num_rows($run_fetch_income);
                                ?>
                            </h5></span>
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
<?php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");

$fetch_data = "SELECT reg_id, user_name, user_email, user_pass, user_pic FROM reg_users";
$run_fetch_data = mysqli_query($conn, $fetch_data);
$row =  mysqli_fetch_assoc($run_fetch_data);

?>

<section class="vh-95">
  <div class="container py-5 h-90">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-dark"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="./images/user_image/dmy-img.png"
                alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
              <h5 ><?php echo $row['user_name']; ?></h5>
              <p>Web Designer & Davloper</p>
            </div>

            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Information</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted"><?php echo $row['user_email']; ?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Phone</h6>
                    <p class="text-muted">--------</p>
                  </div>
                </div>
                <h6>Projects</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Recent</h6>
                    <p class="text-muted">-------</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Most Viewed</h6>
                    <p class="text-muted">------</p>
                  </div>
                </div>
                <div class="d-flex justify-content-start">
                  <a href="#"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                  <a href="#"><i class="fab fa-twitter fa-lg me-3"></i></a>
                  <a href="#"><i class="fab fa-instagram fa-lg"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include("./includes/footer_copywrite.php");
include("./includes/footer.php");
?>
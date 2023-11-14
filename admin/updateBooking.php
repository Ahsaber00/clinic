<?php
include "header.php";
require_once "../lib/bookings.php";
include_once "../core/functions.php";
session_start();
if (!isset($_SESSION['auth'])) {
    reDirect("auth/login.php");
}
$booking=new Booking();
$bookingData=$booking->getbookingById($_GET['id']);
?>
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Title</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
        <?php
            if(isset($_SESSION['sucsses'])):
              $succesMassege = $_SESSION["sucsses"];
            ?>
            <div class="alert alert-success" role="alert">
              <?php
                echo "$succesMassege"; 
                
              ?> 
            </div>
              
              <?php unset($_SESSION["sucsses"])?>
           
            <?php
              elseif(isset($_SESSION["errors"])):
                foreach($_SESSION["errors"] as $error):
            ?>
                  <div class="alert alert-danger" role="alert">
                    <?php echo $error?>
                  </div>
                  <?php
                    endforeach;
                    unset($_SESSION["errors"]);
                    endif;

                  ?>
            <form method="POST" action="../core/handelers/handelUpdateBooking.php" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Booking Status</label>
                        <input type="text" name="status" value="<?= $bookingData['status'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Major Name">
                    </div>
                    <div class="form-group">
                        <input type="hidden" value="<?= $_GET['id'] ?>" name="id">
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
<?php include "footer.php"; ?>
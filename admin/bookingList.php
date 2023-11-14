<?php 
  include "header.php"; 
  include_once "../core/functions.php";
  include_once "../lib/bookings.php";
  session_start();
  if(!isset($_SESSION['auth']))
  {
    reDirect("auth/login.php");
  }
  $bookings=new Booking;
  $bookingList=$bookings->getbookingList();
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
        <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>User_id</th>
                      <th>Doctor_id</th>
                      <th>Status</th>
                      <th>Progress</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($bookingList as $booking): ?>
                    <tr>
                      <td><?php echo $booking['id'] ?></td>
                      <td><?php echo $booking['user_id'] ?></td>
                      <td><?php echo $booking['doctor_id'] ?></td>
                      <td><?php echo $booking['status'] ?></td>
                      <td>
                        <div>
                            <a href="updateBooking.php?id=<?=$booking['id'];?>" class="btn btn-info" >Update</a>
                        </div>
                      </td>
                    </tr>
                    <?php endforeach;?>
                   
                  </tbody>
            </table>
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

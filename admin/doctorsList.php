<?php 
  include "header.php"; 
  include "../lib/doctor.php";
  include_once "../core/functions.php";
  session_start();
  if(!isset($_SESSION['auth']))
  {
    reDirect("auth/login.php");
  }
  $doctor=new Doctor;
  $doctorsList=$doctor->getDoctorList();
?>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
        <div>
            <a href="addDoctors.php" class="btn btn-success" >Add a Doctor</a>
        </div>
        

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
                      <th>Name</th>
                      <th>Image</th>
                      <th>BIo</th>
                      <th>Major_id</th>
                      <th>Progress</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($doctorsList as $doctor): ?>
                    <tr>
                      <td><?php echo $doctor['id'] ?></td>
                      <td><?php echo $doctor['name'] ?></td>
                      <td><?php echo $doctor['image'] ?></td>
                      <td><?php echo $doctor['bio'] ?></td>
                      <td><?php echo $doctor['major_id'] ?></td>
                      <td>
                        <div>
                            <a href="updateDoctor.php?id=<?= $doctor['id']; ?>" class="btn btn-info" >Update</a>
                            <a href="deleteDoctor.php?id=<?= $doctor['id']; ?>" class="btn btn-danger" >Delete</a>
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

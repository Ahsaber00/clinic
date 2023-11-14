<?php 
  include "header.php"; 
  require_once "../lib/majors.php";
  include_once "../core/functions.php";
  include_once "../lib/doctor.php";
  session_start();

  if(!isset($_SESSION['auth']))
  {
    reDirect("auth/login.php");
  }
  
  
  $majors=new Major();
  $majorsList=$majors->getMajorList();
  $doctor=new Doctor;
  $doctorData=$doctor->getDoctorById($_GET['id']);
  

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
            if(isset($_SESSION['sucsess'])):
              $succesMassege = $_SESSION["sucsess"];
            ?>
            <div class="alert alert-success" role="alert">
              <?php
                echo "$succesMassege"; 
                
              ?> 
            </div>
              
              <?php unset($_SESSION["sucsess"])?>
           
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
        <form method="POST" action="../core/handelers/handelUpdateDoctor.php" enctype="multipart/form-data" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" value="<?= $doctorData['name'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter The Doctor Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">BIO</label>
                    <input type="text" name="bio" value="<?= $doctorData['bio'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter The Doctor BIO">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Major</label>
                    <input type="text" name="major" value="<?= $doctorData['major_id'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter The Doctor Major">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" value="<?= $doctorData['image'] ?>" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose the doctor image</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>
                    <input type="hidden" value="<?=$_GET['id'] ?>" name="id" >
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

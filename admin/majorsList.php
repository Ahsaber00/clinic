<?php

include "header.php";
include "../lib/majors.php";
session_start();
include_once "../core/functions.php";
if(!isset($_SESSION['auth']))
{
    reDirect("auth/login.php");
}

$major=new Major();
$majors=$major->getMajorList();
?>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div>
            <a href="addMajors.php" class="btn btn-success" >Add Major</a>
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
                      <th>Major Nmae</th>
                      <th>Progress</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($majors as $major): ?>
                    <tr>
                      <td><?php echo $major['id'] ?></td>
                      <td><?php echo $major['name'] ?></td>
                      <td>
                        <div>
                            <a href="updateMajor.php?id=<?= $major['id']; ?>" class="btn btn-info" >Update</a>
                            <a href="deleteMajor.php?id=<?= $major['id']; ?>" class="btn btn-danger" >Delete</a>
                        </div>
                      </td>
                    </tr>
                    <?php endforeach;?>
                   
                  </tbody>
            </table>
     
        </div>
        <!-- /.card-body -->
       
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
    <?php include "footer.php"; ?>
  












































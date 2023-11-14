<?php 
  include "header.php"; 
  require_once "../lib/contact.php";
  include_once "../core/functions.php";
  session_start();
  if(!isset($_SESSION['auth']))
  {
    reDirect("auth/login.php");
  }
  $contact=new Contact;
  $contactData=$contact->getcontactList(); 
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
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Subject</th>
                      <th>Message</th>
                      <th>Progress</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($contactData as $contact): ?>
                    <tr>
                        <td><?php echo $contact['id'] ?></td>
                        <td><?php echo $contact['name'] ?></td>
                        <td><?php echo $contact['email'] ?></td>
                        <td><?php echo $contact['phone'] ?></td>
                        <td><?php echo $contact['subject'] ?></td>
                        <td><?php echo $contact['message'] ?></td>
                        <td>
                        <div>
                            <a href="deleteContact.php?id=<?= $contact['id']; ?>" class="btn btn-danger" >Delete</a>
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

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>View Attachmant </title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

</head>

<body>


  <div class="container mt-5">
    <div class="row">
      <div class="col-md-50">
        <div class="card">
          <div class="card-header bg-info">
            <h4 class="text-white" style="text-align: center;">View Attachmant</h4>
          </div>
          <div class="card-body">

            <?php
            if (isset($_SESSION['status']) && $_SESSION != '') {
            ?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> Hey! </strong> <?php echo $_SESSION['status']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

            <?php
              unset($_SESSION['status']);
            }
            ?>

            <?php

            $conn = mysqli_connect("localhost", "root", "", "upfetch");

            $query = "SELECT * FROM uploaded_files ORDER BY ID DESC";
            $query_run = mysqli_query($conn, $query);

            ?>

            <div class="table-responsive">
              <table id="image-find" class="table table-striped table-borderd" style="width: 100%;">
                <thead>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Room Code</th>
                  <th>Attachmant</th>
                  <th>View</th>
                  <th>Delete</th>
                </thead>
                <tbody>


                  <?php
                  if (mysqli_num_rows($query_run) > 0) //record is there is not
                  {
                    foreach ($query_run as $row) {
                  ?>

                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['uname']; ?></td>
                        <td><?php echo $row['rcode']; ?></td>
                        <td>
                          <img src="<?php echo "uploads/" . $row['new_name']; ?>" width="100px" alt="img">
                        </td>

                        <td>
                          <a href="<?php echo "uploads/" . $row['new_name']; ?>" class="btn btn-success">View</a>
                        </td>

                        <td>
                          <!-- Delete Button -->
                          <form action="scripts.php" method="POST" enctype="multipart/form-data" class="body">
                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                            <input type="hidden" name="del_new_name" value="<?php echo $row['new_name']; ?>">
                            <button type="submit" name="delete_new_name" class="btn btn-danger">Delete</button>

                          </form>
                        </td>
                      </tr>

                    <?php

                    }
                  } else {
                    ?>
                    <tr>
                      <td>No Image Found</td>
                    </tr>

                  <?php
                  }

                  ?>



                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>









  <!-- Option 2: Separate Popper and Bootstrap JS -->

  <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>

<script>
  $(document).ready(function() {
    $('#employee_data').DataTable();
  });
</script>
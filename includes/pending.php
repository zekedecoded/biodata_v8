<?php
require "../Person.php";
$data3 = $Person->getAllTemp();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pending Approvals</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <?php
  include_once "../libraries.php";
  include "../includes/header.php";
  ?>

  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold m-0 text-secondary">Pending Approvals</h2>
      <a href="../index.php" class="btn btn-outline-primary fw-bold px-4">Back to Dashboard</a>
    </div>

    <div class="table-responsive border border-2 rounded shadow-sm bg-white">
      <table class="table table-hover custom-table text-center mb-0" id="tempTable">
        <thead class="text-center bg-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Last Name</th>
            <th scope="col">First Name</th>
            <th scope="col">Middle Name</th>
            <th scope="col">Suffix</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Gender</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile No.</th>
            <th scope="col">Street</th>
            <th scope="col">Barangay</th>
            <th scope="col">City</th>
            <th scope="col">Province</th>
            <th scope="col">Religion</th>
            <th scope="col">Father's Full Name</th>
            <th scope="col">Marital Status</th>
            <th scope="col">Languages Known</th>
            <th scope="col">Hobbies</th>
            <th scope="col">Skills</th>
            <th scope="col" class="action-sticky bg-light">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $number = 0;
          foreach ($data3 as $row1) {
              $number++; ?>
            <tr>
              <td><?= $number ?></td>
              <td class="fw-bold"><?= strtoupper($row1["lastname"]) ?></td>
              <td><?= strtoupper($row1["firstname"]) ?></td>
              <td><?= strtoupper($row1["middlename"]) ?></td>
              <td><?= strtoupper($row1["suffix"]) ?></td>
              <td><?= strtoupper($row1["dob"]) ?></td>
              <td><?= strtoupper($row1["gender"]) ?></td>
              <td class="text-lowercase text-primary"><?= strtolower($row1["email"]) ?></td>
              <td><?= strtoupper($row1["mobile"]) ?></td>
              <td><?= strtoupper($row1["street"]) ?></td>
              <td><?= strtoupper($row1["barangay"]) ?></td>
              <td><?= strtoupper($row1["city"]) ?></td>
              <td><?= strtoupper($row1["province"]) ?></td>
              <td><?= strtoupper($row1["religion"]) ?></td>
              <td><?= strtoupper($row1["father_fullName"]) ?></td>
              <td><?= strtoupper($row1["marital_status"]) ?></td>
              <td><?= strtoupper($row1["lang_known"]) ?></td>
              <td><?= strtoupper($row1["hobbiesName"]) ?></td>
              <td><?= strtoupper($row1["skills"]) ?></td>
              <td class="action-sticky bg-white">
                <div class="btn-group btn-group-sm gap-1">
                  <a href="viewTemp.php?id=<?= $row1["personID"] ?>" class="btn btn-success">View</a>
                  <a href="../accept.php?personID=<?= $row1["personID"] ?>" class="btn btn-dark">Accept</a>
                  <a href="../decline.php?personID=<?= $row1["personID"] ?>" class="btn btn-danger">Decline</a>
                </div>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>
  <script>
    if ($('#tempTable').length) {
      new DataTable('#tempTable');
    }
  </script>
</body>
</html>

<?php
include_once 'libraries.php';

$data = $Record->getAllPerson();
$data1 = $Record->getAllEduc();
$data2 = $Record->getAllEmployment();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) { {
    $Record->delete((int) $_POST['delete']);
    header('Location: index.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biodata CRD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!-- header -->
  <section class="container-fluid row-cols-12 mt-4">
    <div class="container">
      <div class="container d-flex align-items-center">
        <img src="./imgs/icon_data.png" class="img-fluid" alt="Icon">
        <p class="h3 ps-1 fw-bold">Welcome to Biodata <br>CRD</p>
        <div class="container d-md-flex justify-content-md-end text-center d-none">
          <p class="h5"><b><span id="weekday"></span> <br><span id="date"></span> <br><span id="time"></span></b></p>
        </div>
      </div>
    </div>
    <!--  -->
    <div class="container mt-5 mb-4 gap-3">
      <!-- Nav tabs -->
      <ul class="nav nav-pills gap-1" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link border border-primary active" id="home-tab" data-bs-toggle="tab"
            data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Personal</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link border border-primary" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
            type="button" role="tab" aria-controls="profile" aria-selected="false">Education</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link border border-primary" id="messages-tab" data-bs-toggle="tab"
            data-bs-target="#messages" type="button" role="tab" aria-controls="messages"
            aria-selected="false">Employment</button>
        </li>
        <li class="nav ms-auto" role="presentation">
          <a href="./includes/add.php" class="btn btn-primary btn-sm">
            <img src="./imgs/plus.png" alt="Add" class="img-fluid" width="32px">
            Add Information
          </a>
        </li>
      </ul>
    </div>
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <!-- person table -->
        <div class="table-responsive border border-2 rounded shadow-sm">
          <table class="table table-hover custom-table text-center mb-0">
            <thead class="text-center">
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
                <th scope="col">Father's Last Name</th>
                <th scope="col">Father's First Name</th>
                <th scope="col">Father's Middle Name</th>
                <th scope="col">Father's Suffix</th>
                <th scope="col">Marital Status</th>
                <th scope="col">Languages Known</th>
                <th scope="col">Hobbies</th>
                <th scope="col">Skills</th>
                <th scope="col" class="action-sticky">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $number = 0;
              foreach ($data as $row1) {
                $number++;
                ?>
                <tr>
                  <td>
                    <?= $number ?>
                  </td>
                  <td class="fw-bold">
                    <?= strtoupper($row1['lastname']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['firstname']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['middlename']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['suffix']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['dob']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['gender']) ?>
                  </td>
                  <td class="text-lowercase text-primary">
                    <?= strtoupper($row1['email']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['mobile']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['street']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['barangay']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['city']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['province']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['religion']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['father_lastName']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['father_firstName']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['father_middleName']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['father_suffix']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['marital_status']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['lang_known']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['hobbiesName']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['skills']) ?>
                  </td>
                  <td class="action-sticky">
                    <div class="btn-group btn-group-sm gap-1">
                      <a href="./includes/view.php?id=<?= $row1['personID'] ?>" class="btn btn-success py-0 px-2">View</a>
                      <a href="#" class="btn btn-primary py-0 px-2">Edit</a>
                      <form method="POST"><button type="submit" class="btn btn-danger py-0 px-2" name="delete"
                          value="<?= $row1['personID'] ?>">Delete</button> </form>
                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <!--  -->
      </div>
      <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab"><!-- table -->
        <!-- education table -->
        <div class="table-responsive border border-2 rounded shadow-sm">
          <table class="table table-hover custom-table text-center mb-0">
            <thead class="text-center">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Person Name</th>
                <th scope="col">Company</th>
                <th scope="col">Position</th>
                <th scope="col">Date Joined</th>
                <th scope="col">Date Left</th>
                <th scope="col" class="action-sticky">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $number = 0;
              foreach ($data1 as $row1) {
                $number++;
                ?>
                <tr>
                  <td>
                    <?= $number ?>
                  </td>
                  <td class="fw-bold">
                    <?= strtoupper($row1['full_name']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['acadLevel']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['schoolName']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['yr_grad']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['course_name']) ?>
                  </td>
                  <td class="action-sticky">
                    <div class="btn-group btn-group-sm gap-1">
                      <a href="./includes/view.php?id=<?= $row1['educationID'] ?>"
                        class="btn btn-success py-0 px-2">View</a>
                      <a href="#" class="btn btn-primary py-0 px-2">Edit</a>
                      <form method="POST"><button type="submit" class="btn btn-danger py-0 px-2" name="delete"
                          value="<?= $row1['educationID'] ?>">Delete</button> </form>
                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <!--  -->
      </div>
      <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
        <!-- employment table -->
        <div class="table-responsive border border-2 rounded shadow-sm">
          <table class="table table-hover custom-table text-center mb-0">
            <thead class="text-center">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Person Name</th>
                <th scope="col">Company</th>
                <th scope="col">Position</th>
                <th scope="col">Date Joined</th>
                <th scope="col">Date Left</th>
                <th scope="col" class="action-sticky">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $number = 0;
              foreach ($data2 as $row1) {
                $number++;
                ?>
                <tr>
                  <td>
                    <?= $number ?>
                  </td>
                  <td class="fw-bold">
                    <?= strtoupper($row1['person_Name']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['company']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['position']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['date_joined']) ?>
                  </td>
                  <td>
                    <?= strtoupper($row1['date_exit']) ?>
                  </td>
                  <td class="action-sticky">
                    <div class="btn-group btn-group-sm gap-1">
                      <a href="./includes/view.php?id=<?= $row1['employmentID'] ?>"
                        class="btn btn-success py-0 px-2">View</a>
                      <a href="#" class="btn btn-primary py-0 px-2">Edit</a>
                      <form method="POST"><button type="submit" class="btn btn-danger py-0 px-2" name="delete"
                          value="<?= $row1['employmentID'] ?>">Delete</button> </form>
                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <!--  -->
      </div>
    </div>
    </div>
  </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="js/script.js"></script>

</html>
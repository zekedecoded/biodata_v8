<?php
include '../Record.php';
$Record = new Classes\Record($db);

if (isset($_GET['id'])) {
  $row1 = $Record->viewEmployment($_GET['id']);
} else {
  //redirect
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
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <section class="container">
    <!-- Employment forms -->
    <form method="POST" class="g-3 needs-validation border border-1 m-5 p-5" novalidate>
      <a href="../index.php"><img src="../imgs/return.png" class="img-fluid pe-2" width="24" alt="back"></a>
      <div class="container">
        <div class="display-4 mt-3 text-start fw-bold mb-5 d-none d-md-block">Employment Information</div>
        <div class="display-6 mt-3 text-center fw-bold mb-5 d-md-none d-block">Employment Information</div>
      </div>
      <hr>
      <div class="row">
        <div class="col col-md-6 h3 fw-bold">Employment Background</div>
        <div class="col col-md-6">
          <div class="col-12 position-relative mb-2">
            <label for="validationTooltip01" class="form-label">Company Name</label>
            <input type="text" class="form-control" id="validationTooltip01" name="company"
              value="<?= strtoupper($row1['company']) ?>" disabled>
          </div>
          <div class=" position-relative mb-2">
            <label for="validationTooltip02" class="form-label">Position</label>
            <input type="text" class="form-control" id="validationTooltip02" disabled
              value="<?= strtoupper($row1['position']) ?>" name=" position">

          </div>
          <div class="position-relative mb-2">
            <label for="validationTooltip03" class="form-label">Date Joined</label>
            <input type="date" class="form-control" id="validationTooltip03" disabled
              value="<?= strtoupper($row1['date_joined']) ?>" name=" date_joined">
            s
          </div>
          <div class="col-12 position-relative mb-2">
            <label for="validationTooltip04" class="form-label">Date Exit</label>
            <input type="date" class="form-control" id="validationTooltip04" disabled
              value="<?= strtoupper($row1['date_exit']) ?>" name=" date_exit">
          </div>
        </div>
      </div>
      </div>
      </div>
      <div class="row mt-3 g-0 gap-5 justify-content-center">
        <div class="col-12 col-md-5 btn btn-outline-primary">Edit Profile</div>
        <div class="col-12 col-md-5 btn btn-outline-danger">Delete Profile</div>
      </div>
    </form>
  </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="../js/script.js"></script>

</html>
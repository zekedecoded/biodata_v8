<?php
include '../Record.php';
$Record = new Classes\Record($db);
$Record->AddEmployment();
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
      <div class="container">
        <div class="display-4 mt-3 text-start fw-bold mb-1 d-none d-md-block">Employment Information</div>
        <div class="display-6 mt-3 text-center fw-bold mb-1 d-md-none d-block">Employment Information</div>
      </div>
      <hr>
      <div class="row">
        <div class="col col-md-6 h3 fw-bold">Employment Background</div>
        <div class="col col-md-6">
          <div class="col-12 position-relative mb-2">
            <label for="validationTooltip01" class="form-label">Company Name</label>
            <input type="text" class="form-control" id="validationTooltip01" name="company" required>
            <div class="invalid-feedback">
              Please provide a valid company ame.
            </div>
          </div>
          <div class="position-relative mb-2">
            <label for="validationTooltip02" class="form-label">Position</label>
            <input type="text" class="form-control" id="validationTooltip02" required name="position">
            <div class="invalid-feedback">
              Please enter a valid job position.
            </div>
          </div>
          <div class="position-relative mb-2">
            <label for="validationTooltip03" class="form-label">Date Joined</label>
            <input type="date" class="form-control" id="validationTooltip03" required name="date_joined">
            <div class="invalid-feedback">
              Please provide a valid joined date.
            </div>
          </div>
          <div class="col-12 position-relative mb-2">
            <label for="validationTooltip04" class="form-label">Date Exit</label>
            <input type="date" class="form-control" id="validationTooltip04" name="date_exit" required>
            <div class="invalid-feedback">
              Please provide a valid exit date.
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
      <div class="col-12 mt-4">
        <div class="row d-flex justify-content-center g-0 gap-0 gap-md-5">
          <button class="col-12 col-md-5 btn btn-outline-danger mb-2 mt-2" type="reset">Clear
            Form</button>
          <button class="col-12 col-md-5 btn btn-primary mb-2 mt-2" type="submit" name="AddEmployment">Submit
            form</button>
        </div>
      </div>
    </form>
  </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="../js/script.js"></script>

</html>
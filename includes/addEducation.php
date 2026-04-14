<?php
include '../Education.php';
$Education->AddEducation();
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
  <section class="container py-5">
    <form method="POST" class="g-3 needs-validation border border-1 m-2 px-4" novalidate>
      <div class="container">
        <div class="display-4 mt-3 text-start fw-bold mb-2 d-none d-md-block">Educational Information</div>
        <div class="display-6 mt-3 text-center fw-bold mb-1 d-md-none d-block">Educational Information</div>
      </div>
      <hr>

      <!-- School Details -->
      <div class="row">
        <div class="col-12 col-md-6 h3 fw-bold">School Details</div>
        <div class="col-12 col-md-6">
          <div class="position-relative mb-2">
            <label for="validationTooltip01" class="form-label">School Name</label>
            <input type="text" class="form-control" id="validationTooltip01" name="schoolName" required>
            <div class="invalid-feedback">Please provide a valid school name.</div>
          </div>
          <div class="position-relative mb-2">
            <label for="validationTooltip02" class="form-label">Academic Level</label>
            <input type="text" class="form-control" id="validationTooltip02" name="acadLevel" required>
            <div class="invalid-feedback">Please enter a valid academic level.</div>
          </div>
          <div class="position-relative mb-2">
            <label for="validationTooltip03" class="form-label">Course</label>
            <input type="text" class="form-control" id="validationTooltip03" name="course_name">
            <div class="invalid-feedback">Please provide a valid course.</div>
          </div>
          <div class="position-relative mb-2">
            <label for="validationTooltip04" class="form-label">Year Graduated</label>
            <input type="date" class="form-control" id="validationTooltip04" name="yr_grad">
            <div class="invalid-feedback">Please provide a valid graduated year.</div>
          </div>
        </div>
      </div>
      <div class="col-12 mt-3">
        <div class="row d-flex justify-content-center justify-content-md-between g-0 gap-1">
          <button class="col col-md-5 btn btn-outline-danger mb-3 mt-2" type="reset">Clear Form</button>
          <button class="col col-md-5 btn btn-primary mb-3 mt-2" type="submit" name="AddEducation">Submit form</button>
        </div>
      </div>
    </form>
  </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="../js/script.js"></script>

</html>
<?php
include '../Record.php';
$Record = new Classes\Record($db);
$data = $Record->getAll(); //fetch data
$Record->Add();
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
  <section class="container">
    <div class="container-fluid mt-4 d-flex justify-content-evenly">
      <div class="d-flex align-items-center">
        <div
          class="btn btn-primary rounded-circle disabled fw-bold d-md-flex align-items-center justify-content-center d-none">
          1</div>
        <div class="fw-bold ps-1 text-primary">Personal Details</div>
      </div>
      <div class="d-md-flex align-items-center d-none">
        <div
          class="btn btn-dark rounded-circle disabled fw-bold d-md-flex align-items-center justify-content-center d-none">
          2</div>
        <div class="fw-bold ps-1 text-dark">Education Details</div>
      </div>
      <div class="d-md-flex align-items-center d-none">
        <div class="btn btn-dark rounded-circle disabled fw-bold d-flex align-items-center justify-content-center">
          3</div>
        <div class="fw-bold ps-1 text-dark">Employment Details</div>
      </div>
    </div>

    <!-- Note: A custom script is used to activate validation:

var forms = document.querySelectorAll('.needs-validation')
Array.prototype.slice.call(forms)
  .forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
-->
    <!-- Personal forms -->
    <form method="POST" class="row g-3 needs-validation mt-5" novalidate="">
      <div class="col-md-4 position-relative">
        <label for="validationTooltip01" class="form-label">First name</label>
        <input type="text" class="form-control" id="validationTooltip01" required name="firstName">
        <div class="valid-tooltip">
          Looks good!
        </div>
      </div>
      <div class="col-md-4 position-relative">
        <label for="validationTooltip02" class="form-label">Middle name</label>
        <input type="text" class="form-control" id="validationTooltip02" value="Otto" required name="middleName">
        <div class="valid-tooltip">
          Looks good!
        </div>
      </div>
      <div class="col-md-4 position-relative">
        <label for="validationTooltip03" class="form-label">Last name</label>
        <input type="text" class="form-control" id="validationTooltip03" value="Otto" required="" name="lastName">
        <div class="valid-tooltip">
          Looks good!
        </div>
      </div>
      <div class="col-md-4 position-relative">
        <label for="validationTooltip04" class="form-label">Suffix</label>
        <input type="text" class="form-control" id="validationTooltip04" value="Jr." required="" name="suffix">
        <div class="valid-tooltip">
          Looks good!
        </div>
      </div>
      <div class="col-md-4 position-relative">
        <label for="validationTooltip01" class="form-label">Date of Birth</label>
        <input type="text" class="form-control" id="validationTooltip01" value="Mark" required="" name="date_of_birth">
        <div class="valid-tooltip">
          Looks good!
        </div>
      </div>
      <div class="col-md-4 position-relative">
        <label for="validationTooltip02" class="form-label">Gender</label>
        <input type="text" class="form-control" id="validationTooltip02" value="Otto" required="" name="gender">
        <div class="valid-tooltip">
          Looks good!
        </div>
      </div>
      <div class="col-md-4 position-relative">
        <label for="validationTooltipUsername" class="form-label">Email</label>
        <div class="input-group has-validation">
          <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
          <input type="text" class="form-control" id="validationTooltipUsername"
            aria-describedby="validationTooltipUsernamePrepend" required="" name="email">
          <div class="invalid-tooltip">
            Please choose a unique and valid username.
          </div>
        </div>
      </div>
      <div class="col-md-6 position-relative">
        <label for="validationTooltip03" class="form-label">Mobile No.</label>
        <input type="text" class="form-control" id="validationTooltip03" required="" name="mobile_no">
        <div class="invalid-tooltip">
          Please provide a valid mobile.
        </div>
      </div>
      <div class="col-md-3 position-relative">
        <label for="validationTooltip05" class="form-label">Street</label>
        <input type="text" class="form-control" id="validationTooltip05" required="" name="street">
        <div class="invalid-tooltip">
          Please provide a valid barangay.
        </div>
      </div>
      <div class="col-md-3 position-relative">
        <label for="validationTooltip05" class="form-label">Barangay</label>
        <input type="text" class="form-control" id="validationTooltip05" required="" name="barangay">
        <div class="invalid-tooltip">
          Please provide a valid barangay.
        </div>
      </div>
      <div class="col-md-3 position-relative">
        <label for="validationTooltip05" class="form-label">City</label>
        <input type="text" class="form-control" id="validationTooltip05" required="" name="city">
        <div class="invalid-tooltip">
          Please provide a valid city.
        </div>
      </div>
      <div class="col-md-3 position-relative">
        <label for="validationTooltip05" class="form-label">Province</label>
        <input type="text" class="form-control" id="validationTooltip05" required="" name="province">
        <div class="invalid-tooltip">
          Please provide a valid province.
        </div>
      </div>
      <div class="col-md-3 position-relative">
        <label for="validationTooltip05" class="form-label">Religion</label>
        <input type="text" class="form-control" id="validationTooltip05" required="" name="religion">
        <div class="invalid-tooltip">
          Please provide a valid religion.
        </div>
      </div>
      <div class="col-md-3 position-relative">
        <label for="validationTooltip05" class="form-label">Father's Name</label>
        <input type="text" class="form-control" id="validationTooltip05" required="" name="father_name">
        <div class="invalid-tooltip">
          Please provide a valid father's name.
        </div>
      </div>
      <div class="col-md-3 position-relative">
        <label for="validationTooltip05" class="form-label">Marital Status</label>
        <input type="text" class="form-control" id="validationTooltip05" required="" name="marital_stats">
        <div class="invalid-tooltip">
          Please provide a valid marital status.
        </div>
      </div>
      <div class="col-md-3 position-relative">
        <label for="validationTooltip05" class="form-label">Language Known</label>
        <input type="text" class="form-control" id="validationTooltip05" required="" name="lang_known">
        <div class="invalid-tooltip">
          Please provide a valid language known.
        </div>
      </div>
      <div class="col-md-3 position-relative">
        <label for="validationTooltip05" class="form-label">Hobbies</label>
        <input type="text" class="form-control" id="validationTooltip05" required="" name="hobbies">
        <div class="invalid-tooltip">
          Please provide a valid language known.
        </div>
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit" name="Add">Submit form</button>
      </div>
    </form>
  </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="js/script.js"></script>

</html>
<?php
include '../Record.php';
$Record = new Classes\Record($db);
$Record->AddPerson();
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
    <!-- Personal forms -->
    <form method="POST" class="g-3 needs-validation border border-1 m-5 p-5" novalidate>
      <div class="container">
        <div class="display-4 mt-3 text-start fw-bold mb-5 d-none d-md-block">Personal Information</div>
        <div class="display-6 mt-3 text-center fw-bold mb-5 d-md-none d-block">Personal Information</div>
      </div>
      <hr>
      <div class="row">
        <div class="col col-md-6 h3 fw-bold">Basic Details</div>
        <div class="col col-md-6">
          <div class="col-12 position-relative mb-2">
            <label for="validationTooltip01" class="form-label">First Name</label>
            <input type="text" class="form-control" id="validationTooltip01" name="firstname" required>
            <div class="invalid-feedback">
              Please provide a valid first name.
            </div>
          </div>
          <div class="position-relative mb-2">
            <label for="validationTooltip02" class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="validationTooltip02" required name="middlename">
            <div class="invalid-feedback">
              Please provide a valid middle name.
            </div>
          </div>
          <div class="position-relative mb-2">
            <label for="validationTooltip03" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="validationTooltip03" required name="lastname">
            <div class="invalid-feedback">
              Please provide a valid last name.
            </div>
          </div>
          <div class="col-12 position-relative mb-2">
            <label for="validationTooltip04" class="form-label">Suffix</label>
            <input type="text" class="form-control" id="validationTooltip04" name="suffix">
            <div class="invalid-feedback">
              Please provide a valid suffix.
            </div>
          </div>
          <div class="position-relative mb-2">
            <label for="validationTooltip05" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="validationTooltip05" required name="dob">
            <div class="invalid-feedback">
              Please provide a valid date of birth.
            </div>
          </div>
          <div class="position-relative mb-2">
            <label for="validationTooltip12" class="form-label">Religion</label>
            <input type="text" class="form-control" id="validationTooltip12" required name="religion">
            <div class="invalid-feedback">
              Please provide a valid religion.
            </div>
          </div>
          <div class="position-relative mb-2">
            <label for="validationTooltip17" class="form-label">Marital Status</label>
            <input type="text" class="form-control" id="validationTooltip17" required name="marital_status">
            <div class="invalid-feedback">
              Please provide a valid marital status.
            </div>
          </div>
          <div class="position-relative">
            <label for="validationTooltip18" class="form-label">Language Known</label>
            <input type="text" class="form-control" id="validationTooltip18" required name="lang_known">
            <div class="invalid-feedback">
              Please provide a valid language known.
            </div>
          </div>
          <div class="position-relative">
            <label for="validationTooltip19" class="form-label">Hobbies</label>
            <input type="text" class="form-control" id="validationTooltip19" required name="hobbiesName">
            <div class="invalid-feedback">
              Please provide a valid hobbies name.
            </div>
          </div>
          <div class="position-relative">
            <label for="validationTooltip20" class="form-label">Skills</label>
            <input type="text" class="form-control" id="validationTooltip20" required name="skills">
            <div class="invalid-feedback">
              Please provide a valid skills.
            </div>
            <!-- gender new -->
            <div class="col-12 position-relative">
              <label>Gender</label>
              <div class="row row-cols-md-auto mt-2">
                <div class="col">
                  <input type="radio" class="form-check-input" id="male" name="gender" value="Male" required>
                  <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="col">
                  <input type="radio" class="form-check-input" id="female" name="gender" value="Female" required>
                  <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="col">
                  <input type="radio" class="form-check-input" id="other" name="gender" value="Other" required>
                  <label class="form-check-label" for="other">Other</label>
                </div>
              </div>
            </div>
            <!--  -->
            <div class="col-12 position-relative">
              <label for="validationTooltip13" class="form-label">Father's First Name</label>
              <input type="text" class="form-control" id="validationTooltip13" required name="father_firstName">
              <div class="invalid-feedback">
                Please provide a valid father's name.
              </div>
            </div>
            <div class="col-12 position-relative">
              <label for="validationTooltip14" class="form-label">Father's Middle Name</label>
              <input type="text" class="form-control" id="validationTooltip14" required name="father_middleName">
              <div class="invalid-feedback">
                Please provide a valid father's name.
              </div>
            </div>
            <div class="col-12 position-relative">
              <label for="validationTooltip15" class="form-label">Father's Last Name</label>
              <input type="text" class="form-control" id="validationTooltip15" required name="father_lastName">
              <div class="invalid-feedback">
                Please provide a valid father's name.
              </div>
            </div>
            <div class="col-12 position-relative">
              <label for="validationTooltip16" class="form-label">Father's Suffix</label>
              <input type="text" class="form-control" id="validationTooltip16" name="father_suffix">
              <div class="invalid-feedback">
                Please provide a valid father's suffix.
              </div>
            </div>
          </div>
        </div>
        <hr class="mt-5">
        <div class="row mt-3">
          <div class="col col-md-6 h3 fw-bold">Contact Details</div>
          <div class="col col-md-6">
            <div class="col-12 col-md-6 position-relative">
              <label for="validationTooltipEmail" class="form-label">Email</label>
              <div class="input-group has-validation">
                <input type="email" class="form-control" id="validationTooltipEmail"
                  aria-describedby="validationTooltipEmailPrepend" required name="email">
                <div class="invalid-feedback">
                  Please provide a valid email address.
                </div>
              </div>
            </div>
            <div class="col col-md-6 position-relative">
              <label for="validationTooltip07" class="form-label">Mobile No.</label>
              <input type="tel" class="form-control" id="validationTooltip07" required name="mobile">
              <div class="invalid-feedback">
                Please provide a valid mobile.
              </div>
            </div>
          </div>
        </div>
        <hr class="mt-4">
        <div class="row">
          <div class="col col-md-6 h3 fw-bold">Address Details</div>
          <div class="col col-md-6">
            <div class="position-relative">
              <label for="validationTooltip08" class="form-label">Street</label>
              <input type="text" class="form-control" id="validationTooltip08" required name="street">
              <div class="invalid-feedback">
                Please provide a valid street.
              </div>
            </div>
            <div class="position-relative">
              <label for="validationTooltip09" class="form-label">Barangay</label>
              <input type="text" class="form-control" id="validationTooltip09" required name="barangay">
              <div class="invalid-feedback">
                Please provide a valid barangay.
              </div>
            </div>
            <div class="position-relative">
              <label for="validationTooltip10" class="form-label">City</label>
              <input type="text" class="form-control" id="validationTooltip10" required name="city">
              <div class="invalid-feedback">
                Please provide a valid city.
              </div>
            </div>
            <div class="position-relative">
              <label for="validationTooltip11" class="form-label">Province</label>
              <input type="text" class="form-control" id="validationTooltip11" required name="province">
              <div class="invalid-feedback">
                Please provide a valid province.
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      <div class="col-12 mt-3">
        <button class="btn btn-primary" type="submit" name="AddPerson">Submit form</button>
      </div>
    </form>
  </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="../js/script.js"></script>

</html>
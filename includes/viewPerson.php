<?php
include '../Record.php';
$Record = new Classes\Record($db);

if (isset($_GET['id'])) {
    $row1 = $Record->viewPerson($_GET['id']);
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
        <!-- Personal forms -->
        <form method="POST" class="g-3 needs-validation border border-1 m-5 p-5" novalidate>
            <!-- <button type="button" class=" d-flex align-items-center" onclick="history.back()">
                <img src="../imgs/return.png" class="img-fluid pe-2" width="24" alt="back">
            </button> -->
            <a href="../index.php"><img src="../imgs/return.png" class="img-fluid pe-2" width="24" alt="back"></a>
            <div class="container">
                <div class="display-4 mt-3 text-start fw-bold mb-5 d-none d-md-block">BIODATA</div>
                <div class="display-6 mt-3 text-center fw-bold mb-1 d-md-none d-block">BIODATA</div>
            </div>
            <hr>
            <div class="row">
                <div class="col col-md-4">
                    <div class="row">
                        <img src="../imgs/user.png" class="col-12 img-fluid" alt="profile">
                    </div>
                </div>
                <div class="col col-md-8">
                    <hr>
                    <div class="col h3 fw-bold d-md-flex d-none">Personal Information</div>
                    <div class="col h3 fw-bold d-md-none d-flex text-center">Personal Information</div>
                    <div class="col-12 position-relative mb-2">
                        <label for="validationTooltip01" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="validationTooltip01" name="firstname"
                            value="<?= strtoupper($row1['firstname']) ?>" disabled>
                        <div class="invalid-feedback">
                            Please provide a valid first name.
                        </div>
                    </div>
                    <div class="position-relative mb-2">
                        <label for="validationTooltip02" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="validationTooltip02"
                            value="<?= strtoupper($row1['middlename']) ?>" name="middlename" disabled>
                        <div class="invalid-feedback">
                            Please provide a valid middle name.
                        </div>
                    </div>
                    <div class="position-relative mb-2">
                        <label for="validationTooltip03" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="validationTooltip03" disabled
                            value="<?= strtoupper($row1['lastname']) ?>" name="lastname">
                        <div class="invalid-feedback">
                            Please provide a valid last name.
                        </div>
                    </div>
                    <div class="col-12 position-relative mb-2">
                        <label for="validationTooltip04" class="form-label">Suffix</label>
                        <input type="text" class="form-control" id="validationTooltip04" name="suffix" disabled
                            value="<?= strtoupper($row1['suffix']) ?>">
                        <div class="invalid-feedback">
                            Please provide a valid suffix.
                        </div>
                    </div>
                    <div class="position-relative mb-2">
                        <label for="validationTooltip05" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="validationTooltip05" disabled
                            value="<?= strtoupper($row1['dob']) ?>" name="dob">
                        <div class="invalid-feedback">
                            Please provide a valid date of birth.
                        </div>
                    </div>
                    <div class="position-relative mb-2">
                        <label for="validationTooltip12" class="form-label">Religion</label>
                        <input type="text" class="form-control" id="validationTooltip12" disabled name="religion"
                            value="<?= strtoupper($row1['religion']) ?>">
                        <div class="invalid-feedback">
                            Please provide a valid religion.
                        </div>
                    </div>
                    <div class="position-relative mb-2">
                        <label for="validationTooltip17" class="form-label">Marital Status</label>
                        <input type="text" class="form-control" id="validationTooltip17" disabled name="marital_status"
                            value="<?= strtoupper($row1['marital_status']) ?>">
                        <div class="invalid-feedback">
                            Please provide a valid marital status.
                        </div>
                    </div>
                    <div class="position-relative mb-2">
                        <label for="validationTooltip18" class="form-label">Language Known</label>
                        <input type="text" class="form-control" id="validationTooltip18" disabled name="lang_known"
                            value="<?= strtoupper($row1['lang_known']) ?>">
                        <div class="invalid-feedback">
                            Please provide a valid language known.
                        </div>
                    </div>
                    <div class="position-relative mb-2">
                        <label for="validationTooltip19" class="form-label">Hobbies</label>
                        <input type="text" class="form-control" id="validationTooltip19" disabled name="hobbiesName"
                            value="<?= strtoupper($row1['hobbiesName']) ?>">
                        <div class="invalid-feedback">
                            Please provide a valid hobbies name.
                        </div>
                    </div>
                    <div class="position-relative mb-2">
                        <label for="validationTooltip20" class="form-label">Skills</label>
                        <input type="text" class="form-control" id="validationTooltip20" disabled name="skills"
                            value="<?= strtoupper($row1['skills']) ?>">
                        <div class="invalid-feedback">
                            Please provide a valid skills.
                        </div>
                        <!-- gender new -->
                        <div class="col-12 position-relative mb-2">
                            <label>Gender</label>
                            <div class="row row-cols-md-auto mt-2">
                                <div class="col">
                                    <input type="radio" class="form-check-input" id="male" name="gender" value="Male"
                                        <?= ($row1['gender'] == 'Male') ? 'checked' : '' ?> disabled><label
                                        class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="col">
                                    <input type="radio" class="form-check-input" id="female" name="gender"
                                        value="Female" <?= ($row1['gender'] == 'Female') ? 'checked' : '' ?> disabled>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="col">
                                    <input type="radio" class="form-check-input" id="other" name="gender" value="Male"
                                        <?= ($row1['gender'] == 'Other') ? 'checked' : '' ?> disabled>
                                    <label class="form-check-label" for="other">Other</label>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                        <div class="col-12 position-relative mb-2">
                            <label for="validationTooltip13" class="form-label">Father's First Name</label>
                            <input type="text" class="form-control" id="validationTooltip13" disabled
                                value="<?= strtoupper($row1['father_firstName']) ?>" name="father_firstName">
                            <div class="invalid-feedback">
                                Please provide a valid father's name.
                            </div>
                        </div>
                        <div class="col-12 position-relative mb-2">
                            <label for="validationTooltip14" class="form-label">Father's Middle Name</label>
                            <input type="text" class="form-control" id="validationTooltip14" disabled
                                value="<?= strtoupper($row1['father_middleName']) ?>" name="father_middleName">
                            <div class="invalid-feedback">
                                Please provide a valid father's name.
                            </div>
                        </div>
                        <div class="col-12 position-relative mb-2">
                            <label for="validationTooltip15" class="form-label">Father's Last Name</label>
                            <input type="text" class="form-control" id="validationTooltip15" disabled
                                value="<?= strtoupper($row1['father_lastName']) ?>" name="father_lastName">
                        </div>
                        <div class="col-12 position-relative mb-2">
                            <label for="validationTooltip16" class="form-label">Father's Suffix</label>
                            <input type="text" class="form-control" id="validationTooltip16" name="father_suffix"
                                disabled value="<?= strtoupper($row1['father_suffix']) ?>">
                            <div class=" invalid-feedback">
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
                                    aria-describedby="validationTooltipEmailPrepend" disabled
                                    value="<?= strtoupper($row1['email']) ?>" name="email">
                                <div class="invalid-feedback">
                                    Please provide a valid email address.
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-6 position-relative">
                            <label for="validationTooltip07" class="form-label">Mobile No.</label>
                            <input type="text" class="form-control" id="validationTooltip07" disabled
                                value="<?= strtoupper($row1['mobile']) ?>" name="mobile">
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
                            <input type="text" class="form-control" id="validationTooltip08" disabled
                                value="<?= strtoupper($row1['street']) ?>" name="street">
                            <div class="invalid-feedback">
                                Please provide a valid street.
                            </div>
                        </div>
                        <div class="position-relative">
                            <label for="validationTooltip09" class="form-label">Barangay</label>
                            <input type="text" class="form-control" id="validationTooltip09" disabled
                                value="<?= strtoupper($row1['barangay']) ?>" name="barangay">
                            <div class="invalid-feedback">
                                Please provide a valid barangay.
                            </div>
                        </div>
                        <div class="position-relative">
                            <label for="validationTooltip10" class="form-label">City</label>
                            <input type="text" class="form-control" id="validationTooltip10" disabled
                                value="<?= strtoupper($row1['city']) ?>" name="city">
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="position-relative">
                            <label for="validationTooltip11" class="form-label">Province</label>
                            <input type="text" class="form-control" id="validationTooltip11" disabled
                                value="<?= strtoupper($row1['province']) ?>" name="province">
                            <div class="invalid-feedback">
                                Please provide a valid province.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 btn btn-outline-primary mt-3 mb-2">Edit Profile</div>
                <div class="col-12 btn btn-outline-danger mb-3">Delete Profile</div>
            </div>
            </div>
        </form>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
<script src="../js/script.js"></script>

</html>
<?php
include '../Record.php';
$Record = new Classes\Record($db);

if (isset($_GET['id'])) {
    $row1 = $Record->viewPerson($_GET['id']);
} else {
    header('Location: ../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata CRD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <section class="container my-4">
        <form method="POST" class="needs-validation border border-1 rounded p-4 p-md-5" novalidate>

            <a href="../index.php" class="d-inline-flex align-items-center mb-3 text-decoration-none">
                <img src="../imgs/return.png" class="img-fluid me-2" width="24" alt="back">
            </a>

            <div class="display-5 fw-bold mb-2">BIODATA</div>
            <hr>

            <div class="row g-4">

                <div class="col-12 col-md-4 text-center">
                    <img src="../imgs/user.png" class="img-fluid rounded" alt="profile" style="max-width: 220px;">
                </div>

                <div class="col-12 col-md-8">
                    <h3 class="fw-bold mb-3">Personal Information</h3>

                    <div class="row g-2">
                        <div class="col-12 col-md-6">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                value="<?= strtoupper($row1['firstname']) ?>" disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="middlename" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="middlename" name="middlename"
                                value="<?= strtoupper($row1['middlename']) ?>" disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname"
                                value="<?= strtoupper($row1['lastname']) ?>" disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="suffix" class="form-label">Suffix</label>
                            <input type="text" class="form-control" id="suffix" name="suffix"
                                value="<?= strtoupper($row1['suffix']) ?>" disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob"
                                value="<?= $row1['dob'] ?>" disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Gender</label>
                            <div class="d-flex gap-3 mt-1">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="male" name="gender" value="Male"
                                        <?= ($row1['gender'] == 'Male') ? 'checked' : '' ?> disabled>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="female" name="gender" value="Female"
                                        <?= ($row1['gender'] == 'Female') ? 'checked' : '' ?> disabled>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="other" name="gender" value="Other"
                                        <?= ($row1['gender'] == 'Other') ? 'checked' : '' ?> disabled>
                                    <label class="form-check-label" for="other">Other</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="religion" class="form-label">Religion</label>
                            <input type="text" class="form-control" id="religion" name="religion"
                                value="<?= strtoupper($row1['religion']) ?>" disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="marital_status" class="form-label">Marital Status</label>
                            <input type="text" class="form-control" id="marital_status" name="marital_status"
                                value="<?= strtoupper($row1['marital_status']) ?>" disabled>
                        </div>
                        <div class="col-12">
                            <label for="lang_known" class="form-label">Language Known</label>
                            <input type="text" class="form-control" id="lang_known" name="lang_known"
                                value="<?= strtoupper($row1['lang_known']) ?>" disabled>
                        </div>
                        <div class="col-12">
                            <label for="hobbiesName" class="form-label">Hobbies</label>
                            <input type="text" class="form-control" id="hobbiesName" name="hobbiesName"
                                value="<?= strtoupper($row1['hobbiesName']) ?>" disabled>
                        </div>
                        <div class="col-12">
                            <label for="skills" class="form-label">Skills</label>
                            <input type="text" class="form-control" id="skills" name="skills"
                                value="<?= strtoupper($row1['skills']) ?>" disabled>
                        </div>
                    </div>

                    <!-- Father's Information -->
                    <h5 class="fw-bold mt-4 mb-3">Father's Information</h5>
                    <div class="row g-2">
                        <div class="col-12 col-md-6">
                            <label for="father_firstName" class="form-label">Father's First Name</label>
                            <input type="text" class="form-control" id="father_firstName" name="father_firstName"
                                value="<?= strtoupper($row1['father_firstName']) ?>" disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="father_middleName" class="form-label">Father's Middle Name</label>
                            <input type="text" class="form-control" id="father_middleName" name="father_middleName"
                                value="<?= strtoupper($row1['father_middleName']) ?>" disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="father_lastName" class="form-label">Father's Last Name</label>
                            <input type="text" class="form-control" id="father_lastName" name="father_lastName"
                                value="<?= strtoupper($row1['father_lastName']) ?>" disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="father_suffix" class="form-label">Father's Suffix</label>
                            <input type="text" class="form-control" id="father_suffix" name="father_suffix"
                                value="<?= strtoupper($row1['father_suffix']) ?>" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-5">
            <div class="row g-4 mt-1">
                <div class="col-12 col-md-3">
                    <h3 class="fw-bold">Contact Details</h3>
                </div>
                <div class="col-12 col-md-9">
                    <div class="row g-2">
                        <div class="col-12 col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?= $row1['email'] ?>" disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="mobile" class="form-label">Mobile No.</label>
                            <input type="text" class="form-control" id="mobile" name="mobile"
                                value="<?= strtoupper($row1['mobile']) ?>" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-4">
            <div class="row g-4 mt-1">
                <div class="col-12 col-md-3">
                    <h3 class="fw-bold">Address Details</h3>
                </div>
                <div class="col-12 col-md-9">
                    <div class="row g-2">
                        <div class="col-12 col-md-6">
                            <label for="street" class="form-label">Street</label>
                            <input type="text" class="form-control" id="street" name="street"
                                value="<?= strtoupper($row1['street']) ?>" disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="barangay" class="form-label">Barangay</label>
                            <input type="text" class="form-control" id="barangay" name="barangay"
                                value="<?= strtoupper($row1['barangay']) ?>" disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city"
                                value="<?= strtoupper($row1['city']) ?>" disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="province" class="form-label">Province</label>
                            <input type="text" class="form-control" id="province" name="province"
                                value="<?= strtoupper($row1['province']) ?>" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5 g-2 justify-content-center">
                <div class="col-12 col-md-4">
                    <button type="button" class="btn btn-outline-primary w-100">Edit Profile</button>
                </div>
                <div class="col-12 col-md-4">
                    <button type="button" class="btn btn-outline-danger w-100">Delete Profile</button>
                </div>
            </div>

        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>
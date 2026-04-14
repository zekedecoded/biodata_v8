<?php
include '../Education.php';
if (isset($_GET['id'])) {
    $row1 = $Education->viewEducation($_GET['id']);
} else {
    //redirect
}
if (isset($_POST['editEducation'])) {
    $Education->editEducation($_GET['id']);
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
        <form method="POST" class="g-3 needs-validation border border-1 m-5 p-5" novalidate>
            <a href="../index.php"><img src="../imgs/return.png" class="img-fluid pe-2" width="24" alt="back"></a>
            <div class="container">
                <div class="display-4 mt-3 text-start fw-bold mb-3 d-none d-md-block">Educational Information</div>
                <div class="display-6 mt-3 text-center fw-bold mb-1 d-md-none d-block">Educational Information</div>
            </div>
            <hr>

            <!-- School Details -->
            <div class="row">
                <div class="col-12 col-md-6 h3 fw-bold">School Details</div>
                <div class="col-12 col-md-6">
                    <div class="col-12 position-relative mb-2">
                        <label for="validationTooltip01" class="form-label">School Name</label>
                        <input type="text" class="form-control" id="validationTooltip01" name="schoolName" required
                            value="<?= strtoupper($row1['schoolName']) ?>">
                    </div>
                    <div class="position-relative mb-2">
                        <label for="validationTooltip02" class="form-label">Academic Level</label>
                        <input type="text" class="form-control" id="validationTooltip02" name="acadLevel" required
                            value="<?= strtoupper($row1['acadLevel']) ?>">
                    </div>
                    <div class="position-relative mb-2">
                        <label for="validationTooltip03" class="form-label">Course</label>
                        <input type="text" class="form-control" id="validationTooltip03" name="course_name" required
                            value="<?= strtoupper($row1['course_name']) ?>">
                    </div>
                    <div class="col-12 position-relative mb-2">
                        <label for="validationTooltip04" class="form-label">Year Graduated</label>
                        <input type="text" class="form-control" id="validationTooltip04" name="yr_grad" required
                            value="<?= strtoupper($row1['yr_grad']) ?>">
                    </div>
                </div>
            </div>

            <div class="row mt-3 g-0 gap-md-5 gap-2 justify-content-center">
                <button class="col-12 col-md-5 btn btn-outline-danger" type="button">Delete Profile</button>
                <button class="col-12 col-md-5 btn btn-primary" type="submit" name="editEducation">Update
                    Education</button>
            </div>
        </form>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
<script src="../js/script.js"></script>

</html>
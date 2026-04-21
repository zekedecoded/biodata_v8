<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Biodata</title>
    </head>

    <body>
        <?php
        use Classes\Education;
        // PDO Connections
        // require 'Record.php';
        // require './connection/pdo_connection4.php'; //API
        require "Person.php";
        require "Education.php";
        require "Employment.php";
        // $Record = new Classes\Record($db);
        $data = $Person->getAllPerson(); //fetch data
        $data1 = $Education->getAllEduc();
        $data2 = $Employment->getAllEmployment();
        $data3 = $Person->getAllTemp();
        ?>

        <?php
        // Delete Function
        // person table
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["deletePerson"])) {
            $Person->deletePerson((int) $_POST["deletePerson"]);
            header("Location: index.php");
        }
        // education table
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["deleteEducation"])) {
            $Education->deleteEducation((int) $_POST["deleteEducation"]);
            header("Location: index.php");
        }
        // employment table
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["deleteEmployment"])) {
            $Employment->deleteEmployment((int) $_POST["deleteEmployment"]);
            header("Location: index.php");
        }
        // temp_person table (decline)
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["deleteTemp"])) {
            $Person->deleteTemp((int) $_POST["deleteTemp"]);
            header("Location: index.php");
        }
        ?>
        <?php
        include_once "libraries.php";
        include "./includes/header.php";
        include "./includes/data_chart.php";
        include "./includes/table.php";
        ?>

        <?php if (isset($_GET["duplicate"]) && isset($_SESSION["duplicate_error"])): ?>
            <?php
            $err = $_SESSION["duplicate_error"];
            $msg =
                "This record cannot be accepted because the " .
                $err["field"] .
                " already exists in the " .
                $err["source"] .
                ". ";
            unset($_SESSION["duplicate_error"]);
            ?>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    alert('<?= addslashes($msg) ?>');
                });
            </script>
        <?php endif; ?>
    </body>

    </html>
</body>
    <script src="./js/script.js"></script>

</html>
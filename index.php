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
        // PDO Connections
        require 'Record.php';
        require_once './connection/pdo_connection4.php'; //API 
        $Record = new Classes\Record($db);
        $data = $Record->getAllPerson(); //fetch data
        $data1 = $Record->getAllEduc();
        $data2 = $Record->getAllEmployment();
        ?>

        <?php
        // Delete Function
        // person table
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) { {
                $Record->deletePerson((int) $_POST['delete']);
                header('Location: index.php');
            }
        }
        // education table
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) { {
                $Record->deleteEducation((int) $_POST['delete']);
                header('Location: index.php');
            }
        }
        // employment table
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) { {
                $Record->deleteEmployment((int) $_POST['delete']);
                header('Location: index.php');
            }
        }
        ?>
        <?php
        include_once 'libraries.php';

        include './includes/table.php';
        ?>

    </body>

    </html>
</body>

</html>
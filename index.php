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
        $data = $Record->getAll(); //fetch data
        ?>

        <?php
        include_once 'libraries.php';

        // contents
        include './includes/table.php';
        // include './includes/view_table.php';
        // include './includes/add.php';
        ?>

    </body>

    </html>
</body>

</html>
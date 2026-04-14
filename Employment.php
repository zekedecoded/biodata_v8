<?php
namespace Classes;
// use pdo_connection4;
require_once "connection/pdo_connection4.php";
// require "connection/pdo_connection4.php";
class Employment
{
    public int $employmentID;
    public string $company;
    public string $position;
    public string $date_joined;
    public string $date_exit;
    private $con;
    private string $response;

    public function __construct($db)
    {
        $this->con = $db;
    }
    public function getPostEmployment()
    {
        if (!empty($_POST)) {
            $this->company = $_POST['company'];
            $this->position = $_POST['position'];
            $this->date_joined = $_POST['date_joined'];
            $this->date_exit = $_POST['date_exit'];

        }
    }
    // ADDING FUNCTION
    public function AddEmployment()
    {
        if (isset($_POST['AddEmployment'])) {
            $this->getPostEmployment();
            $stmt = $this->con->prepare("INSERT INTO employment(company,position,date_joined,date_exit)VALUES (?,?,?,?)");
            $stmt->execute([
                $this->company,
                $this->position,
                $this->date_joined,
                $this->date_exit,
            ]);
            $this->responseSQL($stmt);
            header("Location: ../index.php");
        }
    }
    // Delete Function
    public function deleteEmployment($employmentID)
    {
        $stmt = $this->con->prepare("DELETE FROM employment WHERE employmentID = ?");
        $stmt->execute([$employmentID]);
        return $stmt->rowCount() > 0;
    }

    //Edit Function
    public function editEmployment($employmentID)
    {
        $this->getPostEmployment();
        if (!empty($_POST)) {
            $stmt = $this->con->prepare("UPDATE employment SET company = ?, position = ?, date_joined = ?, date_exit = ? WHERE employmentID = ?");
            $stmt->execute([
                $this->company,
                $this->position,
                $this->date_joined,
                $this->date_exit,
                $employmentID
            ]);
            $this->responseSQL(($stmt));
            // header('Location: ../index.php ');
            header("Location: ../includes/editEmployment.php?id=$employmentID");
            // header('Location: view.php?id=' . $educationID . '');

        }
    }
    public function viewEmployment($employmentID)
    {
        if (!$employmentID)
            return 0;
        $stmt = $this->con->prepare("SELECT * FROM employment WHERE employmentID = ?");
        $stmt->execute([$employmentID]);
        return $stmt->rowCount() ? $stmt->fetch() : 0;
    }
    public function getAllEmployment()
    {
        $stmt = $this->con->prepare("SELECT * FROM employment");
        $stmt->execute();
        if (!$stmt->rowCount()) {
            return [];
        }
        return $stmt->fetchAll();
    }

    public function responseSQL($stmt)
    {
        if ($stmt->rowCount()) {
            $this->response = 'success';
        } else {
            $this->response = 'failed';
        }

    }

    public function getResponse()
    {
        return $this->response;
    }
}
$Employment = new Employment($db);

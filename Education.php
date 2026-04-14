<?php
namespace Classes;
// use pdo_connection4;
require_once "connection/pdo_connection4.php";
// require "connection/pdo_connection4.php";
class Education
{
    public int $educationID;
    public string $acadLevel;
    public string $schoolName;
    public string $yr_grad;
    public string $course_name;
    private $con;
    private string $response;

    // education table
    public function __construct($db)
    {
        $this->con = $db;
    }
    public function getPostEducation()
    {
        if (!empty($_POST)) {
            # code...
            // education table
            $this->schoolName = $_POST["schoolName"];
            $this->acadLevel = $_POST["acadLevel"];
            $this->yr_grad = $_POST["yr_grad"];
            $this->course_name = $_POST["course_name"];
        }
    }
    // Add Function
    public function AddEducation()
    {
        if (isset($_POST["AddEducation"])) {
            $this->getPostEducation();
            $stmt = $this->con->prepare(
                "INSERT INTO education(acadLevel,schoolName,yr_grad,course_name)VALUES (?,?,?,?)",
            );
            $stmt->execute([$this->acadLevel, $this->schoolName, $this->yr_grad, $this->course_name]);
            $this->responseSQL($stmt);
            header("Location: ../index.php");
        }
    }
    // Delete Function
    public function deleteEducation($educationID)
    {
        $stmt = $this->con->prepare("DELETE FROM education WHERE educationID = ?");
        $stmt->execute([$educationID]);
        return $stmt->rowCount() > 0;
    }
    // Update Function
    public function editEducation($educationID)
    {
        $this->getPostEducation();
        if (!empty($_POST)) {
            $stmt = $this->con->prepare(
                "UPDATE education SET acadLevel = ?, schoolName = ?, yr_grad = ?, course_name = ? WHERE educationID = ?",
            );
            $stmt->execute([$this->acadLevel, $this->schoolName, $this->yr_grad, $this->course_name, $educationID]);
            $this->responseSQL($stmt);
            // header('Location: ../index.php ');
            header("Location: ../includes/editEducation.php?id=$educationID");
        }
    }
    // View Function
    public function viewEducation($educationID)
    {
        if (!$educationID) {
            return 0;
        }
        $stmt = $this->con->prepare("SELECT * FROM education WHERE educationID = ?");
        $stmt->execute([$educationID]);
        return $stmt->rowCount() ? $stmt->fetch() : 0;
    }
    public function getAllEduc()
    {
        $stmt = $this->con->prepare("SELECT * FROM education");
        $stmt->execute();
        if (!$stmt->rowCount()) {
            return [];
        }
        return $stmt->fetchAll();
    }
    public function responseSQL($stmt)
    {
        if ($stmt->rowCount()) {
            $this->response = "success";
        } else {
            $this->response = "failed";
        }
    }

    public function getResponse()
    {
        return $this->response;
    }
}
$Education = new Education($db);

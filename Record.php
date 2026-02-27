<?php
namespace Classes;
require "connection/pdo_connection4.php";
class Record
{

    public int $person_ID;
    public string $lastName;
    public string $firstName;
    public string $middleName;
    public string $suffix;
    public int $mobile_no;
    public string $email;
    public string $street;
    public string $barangay;
    public string $city;
    public string $province;
    public string $date_of_birth;
    public string $gender;
    public string $father_name;
    public string $lang_known;
    public string $marital_stats;
    public string $religion;
    public string $hobbies;
    private $con;
    private string $response;

    public function __construct($db)
    {
        $this->con = $db;
    }



    public function getPost()
    {
        if (!empty($_POST)) {
            # code...
            $this->lastName = $_POST['lastName'];
            $this->firstName = $_POST['firstName'];
            $this->middleName = $_POST['middleName'];
            $this->suffix = $_POST['suffix'];
            $this->date_of_birth = $_POST['date_of_birth'];
            $this->gender = $_POST['gender'];
            $this->email = $_POST['email'];
            $this->mobile_no = $_POST['mobile_no'];
            $this->street = $_POST['street'];
            $this->barangay = $_POST['barangay'];
            $this->city = $_POST['city'];
            $this->province = $_POST['province'];
            $this->religion = $_POST['religion'];
            $this->father_name = $_POST['father_name'];
            $this->marital_stats = $_POST['marital_stats'];
            $this->lang_known = $_POST['lang_known'];
            $this->hobbies = $_POST['hobbies'];
        }
    }
    // ADDING FUNCTION
    public function Add()
    {
        if (isset($_POST['Add'])) {
            $this->getPost();
            $stmt = $this->con->prepare("INSERT INTO informations (lastName,firstName,middleName,suffix,date_of_birth,gender,email,mobile_no,street,barangay,city,province,religion,father_name,marital_stats,lang_known,hobbies)VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->execute([
                $this->lastName,
                $this->firstName,
                $this->middleName,
                $this->suffix,
                $this->date_of_birth,
                $this->gender,
                $this->email,
                $this->mobile_no,
                $this->street,
                $this->barangay,
                $this->city,
                $this->province,
                $this->religion,
                $this->father_name,
                $this->marital_stats,
                $this->lang_known,
                $this->hobbies,
            ]);
            $this->responseSQL($stmt);
            header("Location: ../index.php");
        }
    }


    public function delete($person_ID)
    {
        $stmt = $this->con->prepare("DELETE FROM informations WHERE person_ID = ?");
        $stmt->execute([$person_ID]);
        return $stmt->rowCount() > 0;
    }

    public function view($person_ID)
    {
        if (!$person_ID)
            return 0;
        $stmt = $this->con->prepare("SELECT * FROM informations WHERE person_ID = ?");
        $stmt->execute([$person_ID]);
        return $stmt->rowCount() ? $stmt->fetch() : 0;
    }
    public function getAll()
    {
        $stmt = $this->con->prepare("SELECT * FROM informations");
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
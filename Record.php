<?php
namespace Classes;
require "connection/pdo_connection4.php";
class Record
{

    public int $person_ID;
    public string $lastname;
    public string $firstname;
    public string $middlename;
    public string $suffix;
    public int $mobile;
    public string $dob;
    public string $email;
    public string $gender;
    public string $marital_status;
    public string $father_lastName;
    public string $father_firstName;
    public string $father_middleName;
    public string $father_suffix;
    public string $religion;
    public string $lang_known;
    public string $hobbiesName;
    public string $street;
    public string $barangay;
    public string $city;
    public string $province;
    public string $skills;
    private $con;
    private string $response;

    // education table
    public int $educationID;
    public string $full_name;
    public string $acadLevel;
    public string $schoolName;
    public string $yr_grad;
    public string $course_name;
    // employment table
    public int $employmentID;
    public string $person_Name;
    public string $company;
    public string $position;
    public string $date_joined;
    public string $date_exit;

    public function __construct($db)
    {
        $this->con = $db;
    }



    public function getPostPerson()
    {
        if (!empty($_POST)) {
            # code...
            $this->lastname = $_POST['lastname'];
            $this->firstname = $_POST['firstname'];
            $this->middlename = $_POST['middlename'];
            $this->suffix = $_POST['suffix'];
            $this->dob = $_POST['dob'];
            $this->gender = $_POST['gender'];
            $this->email = $_POST['email'];
            $this->mobile = $_POST['mobile'];
            $this->street = $_POST['street'];
            $this->barangay = $_POST['barangay'];
            $this->city = $_POST['city'];
            $this->province = $_POST['province'];
            $this->religion = $_POST['religion'];
            $this->father_lastName = $_POST['father_lastName'];
            $this->father_firstName = $_POST['father_firstName'];
            $this->father_middleName = $_POST['father_middleName'];
            $this->father_suffix = $_POST['father_suffix'];
            $this->marital_status = $_POST['marital_status'];
            $this->lang_known = $_POST['lang_known'];
            $this->hobbiesName = $_POST['hobbiesName'];
            $this->skills = $_POST['skills'];

        }
    }
    public function getPostEducation()
    {
        if (!empty($_POST)) {
            # code...
            // education table
            $this->full_name = $_POST['full_name'];
            $this->acadLevel = $_POST['acadLevel'];
            $this->schoolName = $_POST['schoolName'];
            $this->yr_grad = $_POST['yr_grad'];
            $this->course_name = $_POST['course_name'];
            // employment table
            $this->person_Name = $_POST['person_Name'];
            $this->company = $_POST['company'];
            $this->position = $_POST['position'];
            $this->date_joined = $_POST['date_joined'];
            $this->date_exit = $_POST['date_exit'];

        }
    }
    public function getPostEmployment()
    {
        if (!empty($_POST)) {
            $this->person_Name = $_POST['person_Name'];
            $this->company = $_POST['company'];
            $this->position = $_POST['position'];
            $this->date_joined = $_POST['date_joined'];
            $this->date_exit = $_POST['date_exit'];

        }
    }
    // ADDING FUNCTION
    public function AddPerson()
    {
        if (isset($_POST['AddPerson'])) {
            $this->getPostPerson();
            $stmt = $this->con->prepare("INSERT INTO person(lastname,firstname,middlename,suffix,dob,gender,email,mobile,street,barangay,city,province,religion,father_lastName,father_firstName,father_middleName,father_suffix,marital_status,lang_known,hobbiesName,skills)VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->execute([
                $this->lastname,
                $this->firstname,
                $this->middlename,
                $this->suffix,
                $this->dob,
                $this->gender,
                $this->email,
                $this->mobile,
                $this->street,
                $this->barangay,
                $this->city,
                $this->province,
                $this->religion,
                $this->father_lastName,
                $this->father_firstName,
                $this->father_middleName,
                $this->father_suffix,
                $this->marital_status,
                $this->lang_known,
                $this->hobbiesName,
                $this->skills,
            ]);
            $this->responseSQL($stmt);
            header("Location: ../index.php");
        }
    }
    public function AddEducation()
    {
        if (isset($_POST['AddEducation'])) {
            $this->getPostEducation();
            $stmt = $this->con->prepare("INSERT INTO education(full_name,acadLevel,schoolName,yr_grad,course_name)VALUES (?,?,?,?,?)");
            $stmt->execute([
                $this->full_name,
                $this->acadLevel,
                $this->schoolName,
                $this->yr_grad,
                $this->course_name,
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
        $stmt = $this->con->prepare("SELECT * FROM person WHERE personID = ?");
        $stmt->execute([$person_ID]);
        return $stmt->rowCount() ? $stmt->fetch() : 0;
    }
    public function getAllPerson()
    {
        $stmt = $this->con->prepare("SELECT * FROM person");
        $stmt->execute();
        if (!$stmt->rowCount()) {
            return [];
        }
        return $stmt->fetchAll();
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
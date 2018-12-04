<?php

function dd($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

class TransactionDemo {

    const DB_HOST = 'localhost';
    const DB_NAME = 'namastej_acco';
    const DB_USER = 'namastej_acco';
    const DB_PASSWORD = 'admin@123';

    private $conn = null;

//    private $message = '';
//
//    /**
//     * get message
//     * @return string the message of transferring process
//     */
//    public function getMessage() {
//        return $this->message;
//    }

    /**
     * Open the database connection
     */
    public function __construct() {
        // open database connection
        $connectionString = sprintf("mysql:host=%s;dbname=%s", TransactionDemo::DB_HOST, TransactionDemo::DB_NAME);
        try {
            $this->conn = new PDO($connectionString, TransactionDemo::DB_USER, TransactionDemo::DB_PASSWORD);
        } catch (PDOException $pe) {
            die($pe->getMessage());
        }
    }

    /**
     * close the database connection
     */
    public function getHtml($id) {
        $query = "SELECT * from latters WHERE id='$id' limit 1";
        $results = $this->conn->query($query);
        return $results->fetch(PDO::FETCH_ASSOC);
    }

    public function setHtml($type, $content,$typeBranch,$typeto,$typesubject) {

        $type = htmlspecialchars($type);
        
        require_once('bin/class.phpmailer.php');
require("bin/class.smtp.php"); 


   $mail = new PHPMailer();

$name1 = "info@namasteji.co.in";
$email = "info@namasteji.co.in";
$message = '';
$subject = 'From Namasteji';
$pdfimage = 'pdfimage';
$body = $content;
//$body = "Your Task Is ".$work;
$mail->IsSMTP(); 
$mail->SMTPSecure = "ssl";

$mail->addAttachment("images/".$nam);		
$mail->Host  = "server1.namasteji.co.in"; 
$mail->Port = 465;
//$mail->SMTPAuth = true; 
$mail->Username='info@namasteji.co.in';
$mail->Password='admin@123';
$mail->From  =$email;
$mail->AddAddress($typeto);

$mail->AddReplyTo($email);
$mail->Subject  = $subject;
$mail->Body     = $body;
$mail->WordWrap = 120;
$mail->Send();


        $query = "INSERT INTO latters(type,html,branch,send,subject,created_at) VALUES ('$type','$content','$typeBranch','$typeto','$typesubject',now())";
        $results = $this->conn->query($query);
        return $results;
        
        
        
        

        
        
        
        
        
        
        
        
        
//        return $results->fetch(PDO::FETCH_ASSOC);
    }
	
    public function updateHtml($id, $type, $content,$st) {
        $type = htmlspecialchars($type);

        $query = "UPDATE latters SET type='$type',html='$content',st='$st' WHERE id = '$id'";
        return $results = $this->conn->query($query);
//        return $results->fetch(PDO::FETCH_ASSOC);
    }

    public function getOptions() {

        $query = 'SELECT * FROM latters';
        $result = $this->conn->query($query);
        return $result->fetchAll();
    }

    public function getMobileNumber($id) {
        $query = "SELECT * from users WHERE id='$id' limit 1";
        $results = $this->conn->query($query);
        return $results->fetch(PDO::FETCH_ASSOC);
    }

}

$response = new TransactionDemo();


if ($_POST) {

   //echo json_encode($_POST);
   //exit();
   

    $action = $_POST['action'];
    unset($_POST['action']);



    if ($action == 'get') {
        $data = $response->getHtml($_POST['id']);
        echo json_encode(['status' => true, 'data' => $data]);
        exit();
    }

    if ($action == 'new') {

	
	
        if ($response->setHtml($_POST['type'], $_POST['content'],$_POST['typeBranch'],$_POST['typeto'],$_POST['typesubject'])) {
            echo json_encode(['status' => true]);
          
            exit();
        } else {
            echo json_encode(['status' => FALSE, 'error' => 'From New']);
           
            exit();
        }
    }


    if ($action == 'update') {
        if ($response->updateHtml($_POST['id'], $_POST['type'], $_POST['content'])) {
            echo json_encode(['status' => true]);
            exit();
        }
    }


    if ($action == 'mobile_number') {
        if ($response->getMobileNumber($_POST['id'])) {
            echo json_encode(['status' => true]);
            exit();
        }
    }

//    echo json_encode(['status' => false]);
//    exit();
} else {
    if (!isset($onpage))
        echo 'NOT ALLOWED';
}


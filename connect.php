<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender= $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];

    //Database connection
    $conn = new mysqli('localhost', 'root', '', 'first');
    if($conn->connect_error){
        die('connection failed : ' .$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number) values(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi",$firstName, $lastName, $gender, $email, $password, $number );
        $stmt->execute();
        echo "registration successful...";
        $stmt->close();
        $conn->close();
    }
?>
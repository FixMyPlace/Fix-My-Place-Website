<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fixmyplace";

    $con = mysqli_connect($servername, $username, $password, $dbname);
    
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $email = $_POST["regEmail"];

    $check_email = mysqli_query($con, "SELECT `user_email` FROM `user_register` WHERE `user_email` = '$email'");

    if (mysqli_num_rows($check_email) > 0) {
        $con -> close();
        echo "<script>
        alert('User Already Exists!');
        window.location.href='register.html';
        </script>";
    } else {
        $name = $_POST["regName"];
        $phone = $_POST["regPhone"];
        $address = $_POST["regAddress"];
        $pass = $_POST["regPassword"];

        $sql = "INSERT INTO user_register (`user_name`, `user_phone`, `user_email`, `user_address`, `user_password`) VALUES ('$name', '$phone', '$email', '$address', '$pass')";

        $result = mysqli_query($con, $sql);

        if ($result) {
            $con -> close();
            echo "<script>
            window.location.href='login.html';
            </script>";
        } else {
            echo "Error Faced" .mysqli_error($con);
            $con -> close();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>

    </script>
</body>
</html>
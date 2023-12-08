<?php
session_start();
// session_unset();
include("connection.php");

//Sign Up

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = $pdo->prepare('insert into users (Name,Email,Password)  values(:pn,:pe,:pp)');
    
    $query->bindParam("pn",$name); 
    $query->bindParam("pe",$email); 
    $query->bindParam("pp",$password); 
    $query->execute();

    echo "<script> alert('Sign Up Successfully....');
    location.assign('login.php') </script>"; 

}

//Sign In

if(isset($_POST["signin"])){

    $email = $_POST['email']; 
    $password = $_POST['password'];
    $query = $pdo->prepare("select * from users where Email = :pe && Password = :pp");
    $query->bindParam("pe",$email); 
    $query->bindParam("pp",$password);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);

    if($row){

        $_SESSION["UserId"]=$row["Id"];
        $_SESSION["UserName"]=$row["Name"];
        $_SESSION["UserEmail"]=$row["Email"];
        $_SESSION["UserPassword"]=$row["Password"];
        echo "<script> alert('Log In Successfully.....')
        location.assign('panel.php') </script>";
    }
}

//Update
if(isset($_POST["update"])){

    $uid = $_SESSION["UserId"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $query = $pdo->prepare("update users set Name=:pn, Email=:pe, Password=:pp where Id=:pid");

    $query->bindParam("pid",$uid);
    $query->bindParam("pn",$name);
    $query->bindParam("pe",$email);
    $query->bindParam("pp",$password);
    $query->execute();
    echo "<script> alert('Data Updated Successfully.....');
    location.assign('login.php') </script>";
}

?>


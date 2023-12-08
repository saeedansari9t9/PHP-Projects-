<?php
include("php/query.php");
include("../header.php");
if(!isset($_SESSION["UserEmail"])){
    echo "<script> location.assign('login.php') </script>";
}
?>

<div class="container d-flex">
    <div class="row col-6">
        <div class="col-lg-4">
            <h1>
                Dear! <br><br><?php echo $_SESSION["UserName"] ?><br><br>
                Welcome.......
            </h1>
            <a href="logout.php" class="btn btn-danger mt-2"> Log Out </a>
        </div>
    </div>


    <form class=" m-3 col-6" method="post">
    <div class="mb-3 col-4" >
        <label class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Enter Your Name" name="name" value="<?php echo $_SESSION['UserName'] ?>">
    </div>

    <div class="mb-3 col-4">
        <label class="form-label">Enter Your Email</label>
        <input type="Email" class="form-control" placeholder="Enter Your Email" name="email"value="<?php echo $_SESSION['UserEmail'] ?>">
    </div>

    <div class="mb-3 col-4">
        <label class="form-label">Enter Your Password</label>
        <input type="password" class="form-control" placeholder="Enter Your Password" name="password" value="<?php echo $_SESSION['UserPassword'] ?>">
    </div>

    <button type="submit" class="btn btn-primary" name="update">Update</button>
</form>
</div>



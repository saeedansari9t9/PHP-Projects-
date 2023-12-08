<?php
include("../header.php");
include("php/query.php")
?>

<form class=" m-3" method="post">

    <div class="mb-3 col-4">
        <label class="form-label">Enter Your Email</label>
        <input type="Email" class="form-control" placeholder="Enter Your Email" name="email">
    </div>

    <div class="mb-3 col-4">
        <label class="form-label">Enter Your Password</label>
        <input type="password" class="form-control" placeholder="Enter Your Password" name="password">
    </div>

    <button type="submit" class="btn btn-primary" name="signin">Log In</button>
</form>
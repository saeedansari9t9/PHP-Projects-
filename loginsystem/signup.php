<?php
include("../header.php");
include("php/query.php");
?>

<form class=" m-3" method="post">
    <div class="mb-3 col-4" >
        <label class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Enter Your Name" name="name">
    </div>

    <div class="mb-3 col-4">
        <label class="form-label">Enter Your Email</label>
        <input type="Email" class="form-control" placeholder="Enter Your Email" name="email">
    </div>

    <div class="mb-3 col-4">
        <label class="form-label">Enter Your Password</label>
        <input type="password" class="form-control" placeholder="Enter Your Password" name="password">
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
</form>
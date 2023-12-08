<?php
include("header.php");
include("connection.php");
if(isset($_GET["std_id"])){
  $uid = $_GET["std_id"];
  $query = $pdo->prepare("select * from marksheet where Id = :pid");
  $query->bindParam("pid", $uid);
  $query->execute();
  $row = $query->fetch(PDO::FETCH_ASSOC);
}
?>

<form class="row g-3 m-2" method="post">
  <input type="hidden" name="id" value="<?php echo $row['Id'] ?>">
  <div class="col-md-4">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Your Name" value="<?php echo $row['Name'] ?>">
  </div>


  <div class="col-md-4">
    <label class="form-label">English</label>
    <input type="number" class="form-control" placeholder="English Marks" name="eng" value="<?php echo $row['English'] ?>">
  </div>

  <div class="col-md-4">
    <label class="form-label">Urdu</label>
    <input type="number" class="form-control" placeholder="Urdu Marks" name="urdu" value="<?php echo $row['Urdu'] ?>">
  </div>

  <div class="col-md-4">
    <label class="form-label">Maths</label>
    <input type="number" class="form-control" placeholder="Maths Marks" name="maths" value="<?php echo $row['Maths'] ?>">
  </div>

  <div class="col-md-4">
    <label class="form-label">Chemistry</label>
    <input type="number" class="form-control" placeholder="Chemistry Marks" name="chem" value="<?php echo $row['Chemistry'] ?>">
  </div>

  <div class="col-md-4">
    <label class="form-label">Physics</label>
    <input type="number" class="form-control" placeholder="Physics Marks" name="phy" value="<?php echo $row['Physics'] ?>">
  </div>
  </div>
  <div class="col-12">
    <button type="submit" name="updatemarksheet" class="btn btn-primary" >Submit</button>
  </div>
</form>

<?php

if(isset($_POST['updatemarksheet'])){
  $uid = $_POST['id'];
  $name = $_POST['name'];
  $eng = $_POST['eng'];
  $urdu = $_POST['urdu'];
  $maths = $_POST['maths'];
  $phy = $_POST['phy'];
  $chem = $_POST['chem'];
  $obt_marks = $eng + $urdu + $maths + $phy + $chem;
  $total_marks = 500;
  $percentage = ($obt_marks/$total_marks) * 100;
  $grade;
  $remarks;
  if($percentage >= 80){
    $grade = "A+";
    $remarks = "Exellent";
}
else if($percentage >= 70){
    $grade = "A";
    $remarks = "Very Good";
} 
else if($percentage >= 60){
    $grade = "B";
    $remarks = "Good";
}
else if($percentage >= 50){
    $grade = "C";
    $remarks = "Fair";
}
else if($percentage >= 40){
  $grade = "D";
  $remarks = "Work Hard";
}
else {
    $grade = "F";
    $remarks = "Your are Failed Need Work Hard";
}
$query = $pdo->prepare("update marksheet set Name=:pn, English=:pe, Urdu=:pu, Maths=:pm, Physics=:pph, Chemistry=:pc, Total_Marks=:ptotalmarks, Obt_Marks=:pobtmarks, Percentage=:ppercentage, Grade=:pgrade, Remarks=:premarks where Id=:pid ");
$query->bindParam("pid",$uid);
$query->bindParam("pn",$name);
$query->bindParam("pe",$eng);
$query->bindParam("pu",$urdu);
$query->bindParam("pm",$maths);
$query->bindParam("pph",$phy);
$query->bindParam("pc",$chem);
$query->bindParam("ptotalmarks",$total_marks);
$query->bindParam("pobtmarks",$obt_marks);
$query->bindParam("ppercentage",$percentage);
$query->bindParam("pgrade",$grade);
$query->bindParam("premarks",$remarks);
$query->execute();
echo "<script> alert('Data Updated'); location.assign('msheetpage.php') </script>";
}


?>
<?php
include("footer.php");
?>
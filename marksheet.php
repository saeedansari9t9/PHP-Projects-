<?php
include("header.php");
include("connection.php");
?>

<form class="row g-3 m-2" method="post">
  <div class="col-md-4">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Your Name">
  </div>


  <div class="col-md-4">
    <label class="form-label">English</label>
    <input type="number" class="form-control" placeholder="English Marks" name="eng">
  </div>

  <div class="col-md-4">
    <label class="form-label">Urdu</label>
    <input type="number" class="form-control" placeholder="Urdu Marks" name="urdu" >
  </div>

  <div class="col-md-4">
    <label class="form-label">Maths</label>
    <input type="number" class="form-control" placeholder="Maths Marks" name="maths" >
  </div>

  <div class="col-md-4">
    <label class="form-label">Chemistry</label>
    <input type="number" class="form-control" placeholder="Chemistry Marks" name="chem">
  </div>

  <div class="col-md-4">
    <label class="form-label">Physics</label>
    <input type="number" class="form-control" placeholder="Physics Marks" name="phy">
  </div>
  </div>
  <div class="col-12">
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>
</form>

<?php

    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $eng = $_POST['eng'];
        $urdu = $_POST['urdu'];
        $maths = $_POST['maths'];
        $chem = $_POST['chem'];
        $phy = $_POST['phy'];
        
        $totalmarks = 500;
        $obt_marks = $eng + $urdu + $maths + $chem + $phy;
        $percentage = ($obt_marks / $totalmarks) * 100;

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


        $query = $pdo->prepare("insert into marksheet (English, Urdu, Maths, Chemistry, Physics, Obt_Marks, Total_Marks, Percentage, Grade, Remarks, Name) values(:pe,:pu, :pm, :pc, :pp, :pobtmrks, :ptotal, :ppercentage, :pgrade, :premarks, :pname)");

        $query->bindParam("pe",$eng);
        $query->bindParam("pu",$urdu);
        $query->bindParam("pm",$maths);
        $query->bindParam("pc",$chem);
        $query->bindParam("pp",$phy);
        $query->bindParam("pobtmrks",$obt_marks);
        $query->bindParam("ptotal",$totalmarks);
        $query->bindParam("ppercentage",$percentage);
        $query->bindParam("pgrade",$grade);
        $query->bindParam("premarks",$remarks);
        $query->bindParam("pname",$name);
        $query->execute();
        echo "<script>alert('Data Inserted')</script>";
    }

?>
<?php
include("footer.php");
?>
<?php
include("header.php");
include("connection.php");
?>

<table class="table">

    <h1 class=" text-center m-3">Marks Sheet</h1>
    <tbody>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>English</th>
                    <th>Urdu</th>
                    <th>Maths</th>
                    <th>Chemistry</th>
                    <th>Physics</th>
                    <th>Obt_Marks</th>
                    <th>Total</th>
                    <th>Percentage</th>
                    <th>Grade</th>
                    <th>Remarks</th>
                    <th colspan="2" >Action</th>
                </tr>
            </thead>
            
<?php
    $query = $pdo ->query("select * from marksheet");
    $row = $query ->fetchAll(PDO::FETCH_ASSOC);
    foreach($row as $value){
?>

    <tr>
        <th scope="row"><?php echo $value['Id'] ?></th>
        <td><?php echo $value['Name']?></td>
        <td><?php echo $value['English']?></td>
        <td><?php echo $value['Urdu']?></td>
        <td><?php echo $value['Maths']?></td>
        <td><?php echo $value['Chemistry']?></td>
        <td><?php echo $value['Physics']?></td>
        <td><?php echo $value['Obt_Marks']?></td>
        <td><?php echo $value['Total_Marks']?></td>
        <td><?php echo $value['Percentage']?></td>
        <td><?php echo $value['Grade']?></td>
        <td><?php echo $value['Remarks']?></td>

        <td> <a href="update.php?std_id=<?php echo $value ['Id'] ?>" class="btn btn-success">Edit</a></td>
        <td> <a href="?delete=<?php echo $value['Id'] ?>" class="btn btn-danger">Delete</a></td>

    </tr>

<?php

}
?>
</tbody>
</table>

<?php

    if(isset($_GET['delete'])){
        $delete = $_GET['delete'];
        $query = $pdo->prepare('delete from marksheet where Id = :pid');
        $query->bindParam('pid',$delete);
        $query->execute();
        echo "<script> alert('Data Deleted');
        location.assign('msheetpage.php');
        </script>";
        
    }

?>
<?php
include("footer.php");
?>
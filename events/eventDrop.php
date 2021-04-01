<?php
require_once "../login/includes/dbh.inc.php";
if(isset($_POST["id"]))
{
    $sql = "UPDATE events SET  title = ?, start_event = ? , end_event = ?  WHERE id = ? ;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "fail to connect to MySQL";
        exit();
    }
    mysqli_stmt_bind_param($stmt,"sssi",$_POST['title'],$_POST['start'],$_POST['end'],$_POST['id'] );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
}
 ?>

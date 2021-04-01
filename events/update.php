<?php
require_once "../login/includes/dbh.inc.php";
if(isset($_POST["submit_modify"]))
{   
echo $_POST["id"];
echo $_POST["title"];
echo $_POST["start_event"];
echo $_POST["end_event"];
$sql = "UPDATE events SET  title = ?,start_event = ? , end_event = ? , color = ?, description = ? WHERE id = ? ;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt,$sql)){
    echo "fail to connect to MySQL";
    exit();
}
mysqli_stmt_bind_param($stmt,"sssssi",$_POST['title'],$_POST['start_event'],$_POST['end_event'],$_POST['color'],$_POST['description'],$_POST['id'] );
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location: ../index.php?error=none");
}
else if(isset($_POST["submit_delete"])){
    echo $_POST["id"];
    echo $_POST["title"];
    echo $_POST["start_event"];
    echo $_POST["end_event"];
    $sql = "DELETE FROM events where id = ? ; ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "fail to connect to MySQL";
        exit();
    }
    mysqli_stmt_bind_param($stmt,"i",$_POST["id"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
}
 ?> 
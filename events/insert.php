<?php 
    session_start();
    require_once "../login/includes/dbh.inc.php";
    echo $_SESSION["useruid"];
    $sql = "SELECT * FROM users WHERE usersUid = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $_SESSION["useruid"]);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    foreach($resultData as $row){
        $usersNom = $row["usersName"];
        $usersId = $row["usersId"];
        $usersEmail = $row["usersEmail"];
    }
    $sql = "INSERT INTO events (title, start_event, end_event, color, description, usersUid, usersId) VALUES (?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssssi",$_POST['title_new'],$_POST['start_event_new'],$_POST['start_event_new'],$_POST['color_new'],$_POST['description_new'],$_SESSION["useruid"],$usersId );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
    exit();

?>
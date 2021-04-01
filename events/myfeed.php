<?php  

session_start();

require_once '../login/includes/dbh.inc.php';
$sql = "SELECT * FROM events WHERE usersUid = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $_SESSION["useruid"]);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    
    foreach($resultData as $row)
        {
        $data[] = array(
        'id'   => $row["id"],
        'title'   => $row["title"],
        'start'   => $row["start_event"],
        'end'   => $row["end_event"],
        'color'   => $row["color"],
        'description'   => $row["description"]


        );
        }
    echo json_encode($data);
    mysqli_stmt_close($stmt);

        
        


?>
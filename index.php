<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <link href='node_modules/fullcalendar/main.css' rel='stylesheet' />
    <link rel="stylesheet" href="css/style.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src='node_modules/fullcalendar/main.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <link rel="stylesheet" href="header/header.css" type  ="text/css">



  </head>
  <body>
    <?php include 'header/header.php';
    if (!isset($_SESSION["useruid"]))
    { header("location: login/login.php");
    }?>
    
    <div id='calendar'></div>
    <script src="js/scripts.js"></script>
    <script src="header/app.js"></script>

  </body>
</html>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <link href='node_modules/fullcalendar/main.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="header/header.css" type  ="text/css">  
    <link rel="stylesheet" href="css/style.css">


  </head>
  <body>
    <?php include 'header/header.php';
    if (!isset($_SESSION["useruid"]))
    { header("location: login/login.php");
    }?>
    <!-- left partie-->
    <div class="left">
        <div class="w3-left">
        <button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-margin-top w3-text-white" style="background-color:#8a1538;">Creat New Event</button>
        <div id="id02" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

          <div class="w3-center"><br>
            <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
            
          </div>

          <form class="w3-container" action="events/insert.php" method="POST">
            <div class="w3-section">
              <label><b>Title</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" name="title_new" id="title_new" required>
              <label><b>Start Event</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="datetime-local"  name="start_event_new" id="start_event_new"required>
              <label><b>End Event</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="datetime-local" placeholder="Start event" name="end_event_new" id="end_event_new" required>
              <label><b>Description</b></label><br>
              <textarea id="description_new" name="description_new" placeholder="Detail" rows="4" cols="75">
      </textarea><br>
      <label><b>Color</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="color" id="color_new" name="color_new">              
            </div>

          <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
            <button onclick="checkInput()" type="submit" class="w3-button w3-blue w3-right" name='submit_new'>Creat</button>
          </div>
          </form>

        </div>
        </div>      
      </div>
    </div>
    <!-- Modify event modal-->
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

          <div class="w3-center"><br>
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
            
          </div>

          <form class="w3-container" action="events/update.php" method="POST">
            <div class="w3-section">
              <label><b>Id</b></label><br>
              <input type="text" id="id" name="id" readonly><br>
              <label><b>Title</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" name="title"id="title" required>
              <label><b>Start Event</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="datetime-local"  name="start_event" id="start_event"required>
              <label><b>End Event</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="datetime-local" placeholder="Stat event" name="end_event" id="end_event" required>
              <label><b>Description</b></label><br>
              <textarea id="description" name="description" rows="4" cols="75" placeholder="Description">      </textarea><br>
      <label><b>Color</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="color" id="color" name="color" >           
            </div>
          <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
            <button onclick="document.getElementById('id01').style.display='none'" type="submit" name="submit_delete" class="w3-button w3-red">Supprimer</button>
            <button onclick="document.getElementById('id01').style.display='none'" type="submit"  name="submit_modify" class="w3-button w3-blue w3-right">Modifier</button>
          </div>
          </form>

        </div>
  </div>

      
    <div id='calendar'></div>
    <script src='node_modules/fullcalendar/main.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
    <script src="header/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
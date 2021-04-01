document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
  
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale: 'fr',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      height: 650,
      themeSystem: 'bootstrap',
      buttonText:{
          today:'Aujourd\'hui',
          month:'Mois',
          week: 'Semaine',
          day: 'Jour'
      },
      editable:true,
      droppable: true,
  eventClick: function(info) {
    document.getElementById('id01').style.display='block';
    document.getElementById("title").defaultValue = info.event.title;
    document.getElementById("start_event").defaultValue = moment(info.event.start).format('YYYY-MM-DDTHH:mm:ss');
    document.getElementById("color").defaultValue = info.event.backgroundColor;
    document.getElementById("description").defaultValue = info.event.extendedProps.description;
    document.getElementById("id").defaultValue = info.event.id;
    console.log(moment(info.event.end).format('YYYY-MM-DD HH:mm:ss'));
    if (moment(info.event.end).format('YYYY-MM-DD HH:mm:ss') =="Invalid date"){
      document.getElementById("end_event").defaultValue  = moment(info.event.start).format('YYYY-MM-DDTHH:mm:ss');
    }
    else{
      document.getElementById("end_event").defaultValue = moment(info.event.end).format('YYYY-MM-DDTHH:mm:ss');

    }
    console.log(document.getElementById("end_event").defaultValue );
  },
  
    eventDrop: function(info){
    var start=moment(info.event.start).format('Y-MM-DD HH:mm:ss');
    if ((moment(info.event.end).format('YYYY-MM-DD HH:mm:ss') =="Invalid date")){
      var end = moment(info.event.start).format('Y-MM-DD HH:mm:ss');
    }
    else{
      var end=moment(info.event.end).format('Y-MM-DD HH:mm:ss'); 
    }
    var title = info.event.title;
    var id = info.event.id;
    console.log(start +  "  "+ end+ "  " +title+"  "+id)
     $.ajax({
      url:"events/eventDrop.php",
      type:"POST",
  //$("#calendar").fullCalendar('refetchEvents');
      data: { title: title , start:start, end:end, id:id},
      success: function() { 
        $("#calendar").fullCalendar('refetchEvents');
        console.log("sucess");
      }
     });
},
    eventResize: function(info){
    var start=moment(info.event.start).format('Y-MM-DD HH:mm:ss'); 
    var end=moment(info.event.end).format('Y-MM-DD HH:mm:ss'); 
    var title = info.event.title;
    var id = info.event.id;
    console.log(end);
     $.ajax({
      url:"events/eventDrop.php",
      type:"POST",
  //$("#calendar").fullCalendar('refetchEvents');
      data: { title: title , start:start, end:end, id:id},
      success: function() { 
        $("#calendar").fullCalendar('refetchEvents');
        console.log("sucess");
      }
        
     });
    },
      eventSources: [

        // your event source
        {
          url: 'events/myfeed.php',
          type: 'POST',
          data: {
            custom_param1: 'something',
            custom_param2: 'somethingelse'
          },
          error: function() {
            alert('there was an error while fetching events!');
          },
           // a non-ajax option
        }
      ],     
    });
  
    calendar.render();
  });
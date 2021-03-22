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
      themeSystem: 'bootstrap',
      buttonText:{
          today:'Aujourd\'hui',
          month:'Mois',
          week: 'Semaine',
          day: 'Jour'
      },
      editable:true,
      droppable: true,
      eventReceive: function(info) {

        //get the bits of data we want to send into a simple object
        var eventData = {
          title: info.event.title,
          start: info.event.start,
          end: info.event.end
        };
        console.log(eventData);
        //send the data via an AJAX POST request, and log any response which comes from the server
        fetch('events/update.php', {
            method: 'POST',
            headers: {
              'Accept': 'application/json'
            },
            body: encodeFormData(eventData)
          })
          .then(response => console.log(response))
          .catch(error => console.log(error));
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
          color: 'yellow',   // a non-ajax option
          textColor: 'black',
           // a non-ajax option
        }
      ],
      events: [
        {
          title: 'My Event',
          start: "2021-03-15",
          description: 'This is a cool event'
        },
        {
          title: 'My Event 2',
          start: "2021-03-19",
          description: 'This is a cool event'
        }
        // more events here
      ],

      
    });
  
    calendar.render();
  });

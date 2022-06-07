    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            locale: 'es',
            events: [
                {
                    title: 'Pene',
                    start: '2022-06-07T12:30:0',
                    end: '2022-06-07T13:00:0'
                }
            ],
            allDaySlot: false,

            
            dateClick: function(info) {

                //Comprobar las media hora
                if((info.date.getHours() >= 9 && info.date.getHours() <= 13) || (info.date.getHours() >= 17 && info.date.getHours() <= 19)){
                    var fecha = info.date.getFullYear() + "-" + info.date.getMonth() + "-" + info.date.getDate() + " " + info.date.getHours() + ":" + info.date.getMinutes() + ":" + info.date.getSeconds();
                    window.location.hash = "formulario";
                    $('#lblFechacita').val(fecha);

                    var model = new bootstrap.Modal(document.getElementById('exampleModal'), {
                        keyboard: false
                    });
                    model.show();
                }else{
                    $( function() {
                        $( "#dialog-message" ).dialog({
                          modal: true,
                          buttons: {
                            Ok: function() {
                              $( this ).dialog( "close" );
                            }
                          }
                        });
                      } );

                }
                
                

              },
              
        
        });

        calendar.render();


    });


  
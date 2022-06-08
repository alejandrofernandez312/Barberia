    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            locale: 'es',
            events: '/Eventos/obtenerEventos.php',
            allDaySlot: false,

            
            dateClick: function(info) {

                //Comprobar las media hora
                if((info.date.getHours() >= 9 && info.date.getHours() <= 13) || (info.date.getHours() >= 17 && info.date.getHours() <= 19)){
                    var fecha = info.date.getFullYear() + "-" + (info.date.getMonth()+1) + "-" + info.date.getDate() + " " + info.date.getHours() + ":" + info.date.getMinutes() + ":" + info.date.getSeconds();
                    window.location.hash = "formulario";

                    //Cambiar formato fecha
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
              eventClick:function(info){
                  $titulo = info.event.title;
                  $f_start = info.event.start;

                  alert($titulo + "    " + $f_start);
              }
              
        
        });

        calendar.render();


    });


  
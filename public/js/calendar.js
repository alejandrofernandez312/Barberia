    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            locale: 'es',
            events: '/Ajax/obtenerEventos.php',
            allDaySlot: false,
            weekends: false,
            dateClick: function(info) {

              $('#lblNombre, #lblApellidos, #lblNumero, #lblCorreo').css('display', 'block');
              $('.admin').css('display', 'block');
              $("#slServicio option[value='0']").attr("selected",true);
              $("#slCliente option[value='0']").attr("selected",true);

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
                  var id = info.event.extendedProps.cita;
                  var titulo = info.event.title;
                  var fechacita = info.event.start;
                  var servicio = info.event.extendedProps.servicio;
                  var cliente = info.event.extendedProps.cliente;

                  var model = new bootstrap.Modal(document.getElementById('exampleModal'), {
                    keyboard: false
                });

                var fecha = fechacita.getDate() + "-" + (fechacita.getMonth()+1) + "-" +  fechacita.getFullYear() + " " + fechacita.getHours() + ":" + fechacita.getMinutes() + ":" + fechacita.getSeconds();
                window.location.hash = "formulario";
                //Cambiar formato fecha
                $('#lblFechacita').val(fecha);
                // alert(fechacita);

                $('#lblNombre, #lblApellidos, #lblNumero, #lblCorreo').css('display', 'none');
                $('.admin').css('display', 'none');
                $("#slServicio option[value='"+servicio+"']").attr("selected",true);
                $("#slCliente option[value='"+cliente+"']").attr("selected",true);

                model.show();

              }
              
        
        });

        calendar.render();

        

        


    });

    function cancelarCita(){
      alert("Entra a cancela asdasr");
    }


  
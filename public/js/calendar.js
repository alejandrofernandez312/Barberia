    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            locale: 'es',
            events: '/Ajax/obtenerEventos.php',
            allDaySlot: false,
            weekends: false,
            dateClick: function(info) {
              $('#lblFechacita, #fechaCita2').css('display', 'block');
              $('#lblFecha, #lblHora, #fechaCita, #horaCita').css('display', 'none');

              $('#lblNombre, #lblApellidos, #lblNumero, #lblCorreo').css('display', 'block');
              $('#lblNombre, #lblApellidos, #lblNumero, #lblCorreo').val('');
              $('.admin').css('display', 'block');
              $("#slServicio option[value='0']").attr("selected",true);
              $("#slCliente option[value='0']").attr("selected",true);

                //Comprobar las media hora
                if((info.date.getHours() >= 9 && info.date.getHours() <= 13) || (info.date.getHours() >= 17 && info.date.getHours() <= 19)){
                  var fecha =  info.date.getDate() + "-" + (info.date.getMonth()+1) + "-" +  info.date.getFullYear()+ " " + info.date.getHours() + ":" + info.date.getMinutes() + ":" + info.date.getSeconds();
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
                $('#lblFechacita, #fechaCita2').css('display', 'none');
                $('#lblFecha, #lblHora, #fechaCita, #horaCita').css('display', 'block');
  

                  var id = info.event.extendedProps.cita;
                  var titulo = info.event.title;
                  var fechacita = info.event.start;
                  var servicio = info.event.extendedProps.servicio;
                  var cliente = info.event.extendedProps.cliente;

                  var model = new bootstrap.Modal(document.getElementById('exampleModal'), {
                    keyboard: false
                });


                // comprobar si mes solo tiene 1 caracter
                var mes = "";
                if((fechacita.getMonth()+1) <= 9){
                  mes = "0" + (fechacita.getMonth()+1);
                }else{
                  mes = (fechacita.getMonth()+1);
                }

                // comprobar si dia solo tiene 1 caracter
                var dia = "";
                if(fechacita.getDate() <= 9){
                  dia = "0" + fechacita.getDate();
                } else{
                  dia = fechacita.getDate();
                }

                // comprobar si hora solo tiene 1 caracter
                var hora = "";
                if(fechacita.getHours() <= 9){
                  hora = "0" + fechacita.getHours();
                } else{
                  hora = fechacita.getHours();
                }
                // comprobar si minuto solo tiene 1 caracter
                var minuto = "";
                if(fechacita.getMinutes() <= 9){
                  minuto = "0" + fechacita.getMinutes();
                } else{
                  minuto = fechacita.getMinutes();
                }


                var fecha = fechacita.getFullYear() + "-" + mes + "-" + dia;
                var hora = hora + ":" + minuto;
                window.location.hash = "formulario";

                //Cambiar formato fecha
                $('#lblFecha').val(fecha);
                $('#lblHora').val(hora);

                $('#lblNombre, #lblApellidos, #lblNumero, #lblCorreo').css('display', 'none');
                $('.admin').css('display', 'none');
                $("#slServicio option[value='"+servicio+"']").attr("selected",true);
                $("#slCliente option[value='"+cliente+"']").attr("selected",true);
                $("#idCita").val(id);

                model.show();

              }
              
        
        });

        calendar.render();

        

        


    });

    function cancelarCita(){
      var id = $("#idCita").val();

      if(confirm("¿Seguro que desea cancelar la cita?")){
          $.ajax({
            url: "/Ajax/borrarCita.php",
            type:"POST",
            data:{
              id:id
            },
            dataType: "html",
            success: function(elemento){
                window.location.reload();
            }
          });
      }
    }

    function modificarCita(){
      
      var id = $("#idCita").val();

      var fecha = $("#lblFecha").val();
      var fechaCortada = fecha.split('-');
      var fechaOrdenada = fechaCortada[2] + "-" + fechaCortada[1] + "-" + fechaCortada[0];

      var hora = $("#lblHora").val();

      var fechaEntera = fecha + " " + hora + ":00";
      var servicio = $("#slServicio").val();
      var cliente = $("#slCliente").val();

      if((hora > '13:30' && hora < '17:00') || (hora > '00:00' && hora < '09:00') || (hora > '19:30' && hora < '23:59')){
        alert("Fuera de horario: escoja una fecha dentro del horario.");
        exit;
      }else{
        $.ajax({
          url: "/Ajax/modificarCita.php",
          type:"POST",
          data:{
            id:id,
            start: fechaEntera,
            servicio_id: servicio,
            cliente_id: cliente
            
            },
          dataType: "html",
          success: function(elemento){
              window.location.reload();
          }
        });
      } 
    }

    


  

/***********************************
/*  detectar scroll hacia abajo
***********************************/

var obj = $(document);          //objeto sobre el que quiero detectar scroll
var obj_top = obj.scrollTop()   //scroll vertical inicial del objeto

obj_top = calcScroll(obj_top);

$(window).resize(function() {
    obj_top = calcScroll(obj_top);
});

obj.scroll(function(){
    obj_top = obj.scrollTop()
    obj_top = calcScroll(obj_top)
});

function calcScroll () {
    var obj_act_top = $(this).scrollTop();  //obtener scroll top instantaneo
    if (obj_act_top > 50 ||  $( window ).width() < 1204) {
        document.getElementById('navbarHome').style.display = 'flex'
    } else {
        //scroll hacia arriba
        document.getElementById('navbarHome').style.display = 'none'
    }
    return obj_act_top; 
}

/*******
 *  ENVIO EMAIL
 * *****/

$( "form" ).on( "submit", function( event ) {
    event.preventDefault();

    var formData = $( this ).serialize();
    $.ajax({
        method: "POST",
        url: "./../mail.php",
        data: formData
      })
    .done(function( res ) {
        console.log(res)
       if (res.respuesta == 'ok') {
           $('#rta').html('mensaje enviado con éxito');
       } else {
            $('#rta').html('error, intentelo nuevamente');
       }
    })
    .fail(function (res) {
        $('#rta').html('error de servidor, intentelo nuevamente más tarde');
    });
  });




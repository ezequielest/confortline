
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
        $('#navbarHome').fadeIn('slow');
        document.getElementById('navbarHome').style.display = 'flex'
    } else {
        //scroll hacia arriba
        //document.getElementById('navbarHome').style.display = 'none'
        $('#navbarHome').fadeOut('slow');
    }
    return obj_act_top; 
}

/****
 *  ANCLA EFFECT
 ***/
$('nav a').click(function(e){	
    e.preventDefault();	
    el = this			
    effect(el);
});

$('.menu a').click(function(e){
    e.preventDefault();	
    el = this
    effect(el);
});

function effect(el) {
    var strAncla=$(el).attr('href'); //id del ancla
    $('body,html').stop(true,true).animate({				
        scrollTop: $(strAncla).offset().top - 40
    },1500);
}


/*******
 *  ENVIO EMAIL
 * *****/

$( "form" ).on( "submit", function( event ) {
    event.preventDefault();

    var formData = $( this ).serialize();
    $.ajax({
        method: "POST",
        url: "./../sendEmail.php",
        data: formData
      })
    .done(function( res ) {
        res = JSON.parse(res);
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



/***
 * EFFECT HOME
 */



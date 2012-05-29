/*
  * FlipClock for jQuery
  * http://www.hnkweb.com/2009/03/02/flipclock-tutorial-para-desarrollar-un-plugin-de-jquery/
  *
  * Copyright (c) 2009 Marcos Esperon [http://www.hnkweb.com]
  * Dual licensed under the MIT and GPL licenses:
  * http://www.opensource.org/licenses/mit-license.php
  * http://www.gnu.org/licenses/gpl.html
  *
  * $Version: 0.1 $
  * $Date: 2009-03-02 $
  *
  * Opciones:
  *   ampm: establece el formato corto (AM/PM) o largo (24H) del reloj (por defecto: false)
  *   dot:  muesta/oculta el punto de separacion entre hora y minutos (por defecto: false)
  *   msg:  establece el texto del mensaje que se muestra en la barra de opciones
  *
  --------------------------------------------------------------------
*/

(function($){
 $.fn.flipclock = function(options) {

  // definimos variables generales
  var obj, divclock, divopt, flip, curtime;

  // establecemos las opciones
  var options = $.extend({
    ampm: false,
    dot: false,
	dot2: false,
    msg: ''
  }, options);

  // funcion encargada de recuperar la hora y generar el HTML
  var setclock = function() {
    var gh, gm, hd, hh, md, mm, segundos, sd, su, html;
    html = '';

    // obtenemos la hora y los minutos
    gh = new Date().getHours();
    gm =  new Date().getMinutes();   
	segundos = new Date().getSeconds(); 
    // si usamos el formato de hora corta, modificamos la fecha y mostramos el AM/PM
    if (options.ampm) {
      html = '<span class="format">AM</span>';
      if (gh>12) {
        gh = gh - 12;
        html = '<span class="format">PM</span>';
      };
    };

    // desglosamos los digitos de la hora y minutos
    if (gh>9) {
      hd = gh.toString().substring(0,1);
      hh = gh.toString().substring(1);
    } else {
      hd = '0';
      hh = gh.toString();
    };
    if (gm>9) {
      md = gm.toString().substring(0,1);
      mm = gm.toString().substring(1);
    } else {
      md = '0';
      mm = gm.toString();
    };
    if (segundos>9) {
      sd = segundos.toString().substring(0,1);
      su = segundos.toString().substring(1);
    } else {
      sd = '0';
      su = segundos.toString();
    };
    // generamos el HTML
    html += '<img class="n'+hd+'" src="lib/img/login/blank.gif" alt="'+hd+'" /><img class="n'+hh+'" src="lib/img/login/blank.gif" alt="'+hh+'" />';
    if(options.dot) html += '<span class="dot"></span>';
    html += '<img class="n'+md+'" src="lib/img/login/blank.gif" alt="'+md+'" /><img class="n'+mm+'" src="lib/img/login/blank.gif" alt="'+mm+'" />';
	if(options.dot2) html += '<span class="dot2"></span>';
	html += '<img class="n'+sd+'" src="lib/img/login/blank.gif" alt="'+sd+'" /><img class="n'+su+'" src="lib/img/login/blank.gif" alt="'+su+'" />';
    // recargamos el reloj si la hora es distinta a la mostrada actualmente
    if(curtime!=gh.toString()+gm.toString()+segundos.toString()){
      curtime = gh.toString()+gm.toString()+segundos.toString();
      $(divclock).html(html);
    };

  };

  // funcion encargada de mostrar la barra de opciones (mensaje + cambio de formato de hora)
  var setopt = function() {

    // creamos el bloque de opciones
    divopt = document.createElement('div');    
    // asginamos su clase de estilo y su HTML
    divopt.className = 'opt';
    $(divopt).html(options.msg);

    // construimos un enlace para alternar entre los modos de formato de fecha
    ampm = document.createElement('a');
    ampm.className = 'mode';
    ampm.setAttribute('href', '#');
    ampm.innerHTML = (options.ampm) ? '' : '';
    
    // al pulsar sobre el enlace modificamos la opcion de formato y el texto del enlace
    $(ampm).click (function (evt) {
      evt.preventDefault();
      if (options.ampm) {
        ampm.innerHTML = '12h';
        options.ampm = false;
      } else {
        ampm.innerHTML = '24h';
        options.ampm = true;
      };
      return false;
    });

    // agregamos en enlace al bloque de opciones
    $(divopt).prepend(ampm);

    return false;

  };

  // llamada principal: construye el reloj en el elemento usado al llamar a flipclock
  return this.each(function() {

   obj = $(this);

   // creamos el bloque que va a contener al reloj
   divclock = document.createElement('div');
   // asginamos su clase de estilo
   divclock.className = 'clock';
   // creamos un intervalo de actualizacion del reloj
   flip = setInterval(setclock, 1000);

   // llamamos a la contruccion de la barra de opciones
   setopt();

   // agregamos el bloque del reloj y la barra de opciones al elemento principal
   $(obj).append(divclock);
   $(obj).prepend(divopt);

   return false;

  });
 };

})(jQuery);
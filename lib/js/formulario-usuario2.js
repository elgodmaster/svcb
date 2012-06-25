jQuery(document).ready(function(){
  var formBoxes= jQuery(".text");
  var txtNombreNuevo = jQuery("#txtNombreNuevo");
  var reqNombre = jQuery("#req-nombre");
  var txtApatNuevo = jQuery("#txtApatNuevo");
  var reqApat = jQuery("#req-apat");
  var txtAmatNuevo = jQuery("#txtAmatNuevo");
  var reqAmat = jQuery("#req-amat");
  
  //Validar Nombre
  function validarNombre(){
    if(txtNombreNuevo.val().length < 4){
      reqNombre.fadeIn('fast');
      reqNombre.removeClass("requisites");
      return false;
    }
    else if(!txtNombreNuevo.val().match(/^[a-zA-Z\s]+$/)){
      reqNombre.fadeIn('fast');
      reqNombre.removeClass("requisites");
      return false;
    }
    else{
      reqNombre.fadeOut('fast');
      reqNombre.addClass("requisites");
      return true;
    }
  }
  
  //Validar Apat
  function validarApat(){
    if(txtApatNuevo.val().length < 4){
      reqApat.fadeIn('fast');
      reqApat.removeClass("requisites");
      return false;
    }
    else if(!txtApatNuevo.val().match(/^[a-zA-Z\s]+$/)){
      reqApat.fadeIn('fast');
      reqApat.removeClass("requisites");
      return false;
    }
    else{
      reqApat.fadeOut('fast');
      reqApat.addClass("requisites");
      return true;
    }
  }
  
  //Validar Amat
  function validarAmat(){
    if(txtAmatNuevo.val().length < 4){
      reqAmat.fadeIn('fast');
      reqAmat.removeClass("requisites");
      return false;
    }
    else if(!txtAmatNuevo.val().match(/^[a-zA-Z\s]+$/)){
      reqAmat.fadeIn('fast');
      reqAmat.removeClass("requisites");
      return false;
    }
    else{
      reqAmat.fadeOut('fast');
      reqAmat.addClass("requisites");
      return true;
    }
  }    
  
  //controlamos la validacion en los distintos eventos
  // Perdida de foco  
  txtNombreNuevo.blur(validarNombre);
  txtApatNuevo.blur(validarApat);
  txtAmatNuevo.blur(validarAmat);
  // En cuanto el usuario esta pulsando teclas (escribiendo)
  txtNombreNuevo.keyup(validarNombre);
  txtApatNuevo.keyup(validarApat);
  txtAmatNuevo.keyup(validarAmat);
  
  // Envio de formulario
  jQuery("#btnConsultar").click(function(){
	  if(validarNombre() == true && validarApat() == true && validarAmat() == true)
    {
		get2();
    }	  
  });
  
  //controlamos el foco / perdida de foco para los input text
  formBoxes.focus(function(){
    jQuery(this).addClass("active");
  });
  formBoxes.blur(function(){
    jQuery(this).removeClass("active");  
  });
  
});
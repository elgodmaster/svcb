jQuery(document).ready(function(){
  var formBoxes= jQuery(".text");
  var txtNombreNuevo = jQuery("#txtNombreNuevo");  
  var reqNombre = jQuery("#req-nombre");
  
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
    
  
  //controlamos la validacion en los distintos eventos  
  // Perdida de foco
  txtNombreNuevo.blur(validarNombre);
  // En cuanto el usuario esta pulsando teclas (escribiendo)
  txtNombreNuevo.keyup(validarNombre);
  
  // Envio de formulario
  jQuery("#btnConsultar").click(function(){
	  if(validarNombre() == true)
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
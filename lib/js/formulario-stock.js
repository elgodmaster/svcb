jQuery(document).ready(function(){
  var formBoxes= jQuery(".text");
  var txtStockRNuevo = jQuery("#txtStockRNuevo");  
  var reqStockR = jQuery("#req-stockr");  
  var stock = parseInt(txtStockRNuevo.val());
  
  //Validar Stock
  function validarStockR(){
    if(txtStockRNuevo.val().length == 0){
      reqStockR.fadeIn('fast');
      reqStockR.removeClass("requisites");
      return false;
    }
	else if(parseInt(txtStockRNuevo.val()) <= stock){
      reqStockR.fadeIn('fast');
      reqStockR.removeClass("requisites");
      return false;
    }
    else if(!txtStockRNuevo.val().match(/^[0-9]+$/)){
      reqStockR.fadeIn('fast');
      reqStockR.removeClass("requisites");
      return false;
    }
    else{
      reqStockR.fadeOut('fast');
      reqStockR.addClass("requisites");
      return true;
    }
  }
  
  
  //controlamos la validacion en los distintos eventos  
  // Perdida de foco
  txtStockRNuevo.blur(validarStockR);
  // En cuanto el usuario esta pulsando teclas (escribiendo)
  txtStockRNuevo.keyup(validarStockR);
  
  // Envio de formulario
  jQuery("#btnConsultar").click(function(){
	if(validarStockR() == true)
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
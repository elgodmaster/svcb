jQuery(document).ready(function(){
  var formBoxes= jQuery(".text");  
  var txtNombreNuevo = jQuery("#txtNombreNuevo");  
  var reqNombre = jQuery("#req-nombre");  
  var txtDireccionNueva = jQuery("#txtDireccionNueva");
  var reqDireccion = jQuery("#req-direccion");  
  var cboRegion = jQuery("#cboRegion");
  var reqRegion = jQuery("#req-region");
  var cboProvincia = jQuery("#cboProvincia");
  var reqProvincia = jQuery("#req-provincia");
  var cboComuna = jQuery("#cboComuna");
  var reqComuna = jQuery("#req-comuna");
  var txtTelefonoNuevo = jQuery("#txtTelefonoNuevo");
  var reqTelefono = jQuery("#req-telefono");
  var txtEmailNuevo = jQuery("#txtEmailNuevo");
  var reqEmail = jQuery("#req-email");
  var txtGiroNuevo = jQuery("#txtGiroNuevo");
  var reqGiro = jQuery("#req-giro");
  
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
  
  //Validar Direccion
  function validarDireccion(){
	if(txtDireccionNueva.val().length < 4){
      reqDireccion.fadeIn('fast');
      reqDireccion.removeClass("requisites");
      return false;
    }
	else if(!txtDireccionNueva.val().match(/^[a-zA-Z#,.0-9°\s]+$/)){
      reqDireccion.fadeIn('fast');
      reqDireccion.removeClass("requisites");
      return false;
    }
    else{
      reqDireccion.fadeOut('fast');
      reqDireccion.addClass("requisites");
      return true;
    }
  }
  
  //Validar Region
  function validarRegion(){
	if(cboRegion.val() == 0){
      reqRegion.fadeIn('fast');
      reqRegion.removeClass("requisites");
      return false;
    }
    else{
      reqRegion.fadeOut('fast');
      reqRegion.addClass("requisites");
      return true;
    }
  }
  
  //Validar Provincia
  function validarProvincia(){
	if(cboProvincia.val() == 0){
      reqProvincia.fadeIn('fast');
      reqProvincia.removeClass("requisites");
      return false;
    }
    else{
      reqProvincia.fadeOut('fast');
      reqProvincia.addClass("requisites");
      return true;
    }
  }
  
  //Validar Comuna
  function validarComuna(){
	if(cboComuna.val() == 0){
      reqComuna.fadeIn('fast');
      reqComuna.removeClass("requisites");
      return false;
    }
    else{
      reqComuna.fadeOut('fast');
      reqComuna.addClass("requisites");
      return true;
    }
  }
  
  //Validar Telefono
  function validarTelefono(){
	if(txtTelefonoNuevo.val().length < 7){
      reqTelefono.fadeIn('fast');
      reqTelefono.removeClass("requisites");
      return false;
    }
	else if(!txtTelefonoNuevo.val().match(/^[0-9()-\s]+$/)){
      reqTelefono.fadeIn('fast');
      reqTelefono.removeClass("requisites");
      return false;
    }
    else{
      reqTelefono.fadeOut('fast');
      reqTelefono.addClass("requisites");
      return true;
    }
  }  
  
  //Validar Email
  function validarEmail(){
    if(txtEmailNuevo.val().length == 0){
      reqEmail.fadeIn('fast');
      reqEmail.removeClass("requisites");
      return false;
    }
    else if(!txtEmailNuevo.val().match(/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i)){
      reqEmail.fadeIn('fast');
      reqEmail.removeClass("requisites");
      return false;
    }
    else{
      reqEmail.fadeOut('fast');
      reqEmail.addClass("requisites");
      return true;
    }
  }
  
  //Validar Giro
  function validarGiro(){
    if(txtGiroNuevo.val().length == 0){
      reqGiro.fadeIn('fast');
      reqGiro.removeClass("requisites");
      return false;
    }
    else if(!txtGiroNuevo.val().match(/^[a-zA-Z.\s]+$/)){
      reqGiro.fadeIn('fast');
      reqGiro.removeClass("requisites");
      return false;
    }
    else{
      reqGiro.fadeOut('fast');
      reqGiro.addClass("requisites");
      return true;
    }
  }  
  
  //controlamos la validacion en los distintos eventos
  // Perdida de foco
  txtNombreNuevo.blur(validarNombre);
  txtDireccionNueva.blur(validarDireccion);
  cboRegion.blur(validarRegion);
  cboProvincia.blur(validarProvincia);
  cboComuna.blur(validarComuna);
  txtTelefonoNuevo.blur(validarTelefono);
  txtEmailNuevo.blur(validarEmail);  
  txtGiroNuevo.blur(validarGiro);  
  // En cuanto el usuario esta pulsando teclas (escribiendo)
  txtNombreNuevo.keyup(validarNombre);
  txtDireccionNueva.keyup(validarDireccion);
  txtTelefonoNuevo.keyup(validarTelefono);
  txtEmailNuevo.keyup(validarEmail);
  txtGiroNuevo.keyup(validarGiro);
  //En cuanto el usuario hace clic en los combobox
  cboRegion.click(validarRegion);
  cboProvincia.click(validarProvincia);
  cboComuna.click(validarComuna);
  
  // Envio de formulario
  jQuery("#btnConsultar").click(function(){
	  if(validarNombre() == true && validarDireccion() == true && validarRegion() == true && validarProvincia() == true && 
	validarComuna() == true && validarTelefono() == true && validarEmail() == true && validarGiro() == true)
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
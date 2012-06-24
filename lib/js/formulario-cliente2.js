jQuery(document).ready(function(){
  var formBoxes= jQuery(".text");  
  var txtNombre = jQuery("#txtNombre");  
  var reqNombre = jQuery("#req-nombre");  
  var txtDireccion = jQuery("#txtDireccion");
  var reqDireccion = jQuery("#req-direccion");  
  var cboRegion = jQuery("#cboRegion");
  var reqRegion = jQuery("#req-region");
  var cboProvincia = jQuery("#cboProvincia");
  var reqProvincia = jQuery("#req-provincia");
  var cboComuna = jQuery("#cboComuna");
  var reqComuna = jQuery("#req-comuna");
  var txtTelefono = jQuery("#txtTelefono");
  var reqTelefono = jQuery("#req-telefono");
  var txtEmail = jQuery("#txtEmail");
  var reqEmail = jQuery("#req-email");
  var txtGiro = jQuery("#txtGiro");
  var reqGiro = jQuery("#req-giro");
  
  //Validar Nombre
  function validarNombre(){
    if(txtNombre.val().length < 4){
      reqNombre.fadeIn('fast');
      reqNombre.removeClass("requisites");
      return false;
    }
    else if(!txtNombre.val().match(/^[a-zA-Z\s]+$/)){
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
	if(txtDireccion.val().length < 4){
      reqDireccion.fadeIn('fast');
      reqDireccion.removeClass("requisites");
      return false;
    }
	else if(!txtDireccion.val().match(/^[a-zA-Z#,.0-9°\s]+$/)){
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
	if(txtTelefono.val().length < 7){
      reqTelefono.fadeIn('fast');
      reqTelefono.removeClass("requisites");
      return false;
    }
	else if(!txtTelefono.val().match(/^[0-9()-\s]+$/)){
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
    if(txtEmail.val().length == 0){
      reqEmail.fadeIn('fast');
      reqEmail.removeClass("requisites");
      return false;
    }
    else if(!txtEmail.val().match(/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i)){
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
    if(txtGiro.val().length == 0){
      reqGiro.fadeIn('fast');
      reqGiro.removeClass("requisites");
      return false;
    }
    else if(!txtGiro.val().match(/^[a-zA-Z.\s]+$/)){
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
  txtNombre.blur(validarNombre);
  txtDireccion.blur(validarDireccion);
  cboRegion.blur(validarRegion);
  cboProvincia.blur(validarProvincia);
  cboComuna.blur(validarComuna);
  txtTelefono.blur(validarTelefono);
  txtEmail.blur(validarEmail);  
  txtGiro.blur(validarGiro);  
  // En cuanto el usuario esta pulsando teclas (escribiendo)
  txtNombre.keyup(validarNombre);
  txtDireccion.keyup(validarDireccion);
  txtTelefono.keyup(validarTelefono);
  txtEmail.keyup(validarEmail);
  txtGiro.keyup(validarGiro);
  //En cuanto el usuario hace clic en los combobox
  cboRegion.click(validarRegion);
  cboProvincia.click(validarProvincia);
  cboComuna.click(validarComuna);
  
  // Envio de formulario
  jQuery("#botonEnviar").click(function(){
	  if(validarNombre() == true && validarDireccion() == true && validarRegion() == true && validarProvincia() == true && 
	validarComuna() == true && validarTelefono() == true && validarEmail() == true && validarGiro() == true)
    {
		get();
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
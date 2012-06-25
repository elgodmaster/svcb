jQuery(document).ready(function(){
  var formBoxes= jQuery(".text");
  var txtRun = jQuery("#txtRUN");
  var reqRun = jQuery("#req-run");
  var txtPassword = jQuery("#txtPassword");
  var reqPassword = jQuery("#req-pass1");
  var txtPassword2 = jQuery("#txtPassword2");
  var reqPassword2 = jQuery("#req-pass2");
  var txtNombre = jQuery("#txtNombre");  
  var reqNombre = jQuery("#req-nombre");
  var txtApat = jQuery("#txtApat");
  var reqApat = jQuery("#req-apat");
  var txtAmat = jQuery("#txtAmat");
  var reqAmat = jQuery("#req-amat");
  var cboUsuario = jQuery("#cboUsuario");
  var reqUsuario = jQuery("#req-tipo");
  
  //Validar RUN
  function validarRun(){
	if(txtRun.val() == 0){
      reqRun.fadeIn('fast');
      reqRun.removeClass("requisites");
      return false;
    }
    else{
      reqRun.fadeOut('fast');
      reqRun.addClass("requisites");
      return true;
    }
  }
  
  //Validar Password
  function validarPassword(){
	if(txtPassword.val().length < 5){
      reqPassword.fadeIn('fast');
      reqPassword.removeClass("requisites");
      return false;
    }
    else{
      reqPassword.fadeOut('fast');
      reqPassword.addClass("requisites");
      return true;
    }
  }
  
  //Validar Password2
  function validarPassword2(){
	if(txtPassword2.val() != txtPassword.val()){
      reqPassword2.fadeIn('fast');
      reqPassword2.removeClass("requisites");
      return false;
    }
    else{
      reqPassword2.fadeOut('fast');
      reqPassword2.addClass("requisites");
      return true;
    }
  }
  
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
  
  //Validar Apat
  function validarApat(){
    if(txtApat.val().length < 4){
      reqApat.fadeIn('fast');
      reqApat.removeClass("requisites");
      return false;
    }
    else if(!txtApat.val().match(/^[a-zA-Z\s]+$/)){
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
    if(txtAmat.val().length < 4){
      reqAmat.fadeIn('fast');
      reqAmat.removeClass("requisites");
      return false;
    }
    else if(!txtAmat.val().match(/^[a-zA-Z\s]+$/)){
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
  
  //Validar Usuario
  function validarUsuario(){
	if(cboUsuario.val() == 0){
      reqUsuario.fadeIn('fast');
      reqUsuario.removeClass("requisites");
      return false;
    }
    else{
      reqUsuario.fadeOut('fast');
      reqUsuario.addClass("requisites");
      return true;
    }
  }
    
  
  //controlamos la validacion en los distintos eventos
  // Perdida de foco
  txtRun.blur(validarRun);
  txtPassword.blur(validarPassword);
  txtPassword2.blur(validarPassword2);
  txtNombre.blur(validarNombre);
  txtApat.blur(validarApat);
  txtAmat.blur(validarAmat);  
  cboUsuario.blur(validarUsuario);  
  // En cuanto el usuario esta pulsando teclas (escribiendo)
  txtRun.keyup(validarRun);
  txtPassword.keyup(validarPassword);
  txtPassword2.keyup(validarPassword2);
  txtNombre.keyup(validarNombre);
  txtApat.keyup(validarApat);
  txtAmat.keyup(validarAmat);
  //En cuanto el usuario hace clic en los combobox
  cboUsuario.click(validarUsuario);
  
  // Envio de formulario
  jQuery("#btnConsultar").click(function(){
	  if(validarRun() == true && validarPassword() == true && validarPassword2() == true && validarNombre() == true && 
	  validarApat() == true && validarAmat() == true && validarUsuario() == true)
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
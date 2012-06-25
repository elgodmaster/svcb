jQuery(document).ready(function(){
  var formBoxes= jQuery(".text");
  var cboCategoria = jQuery("#cboCategoriaNuevo");
  var reqCategoria = jQuery("#req-categoria");
  var txtNombre = jQuery("#txtNombreNuevo");
  var reqNombre = jQuery("#req-nombre");
  var txtaDescripcion = jQuery("#txtaDescripcionNuevo");
  var reqDescripcion = jQuery("#req-descripcion");
  var txtPrecio = jQuery("#txtPrecioNuevo");
  var reqPrecio = jQuery("#req-precio");
  var txtStockR = jQuery("#txtStockRNuevo");
  var reqStockR = jQuery("#req-stockr");
  var txtStockM = jQuery("#txtStockMNuevo");
  var reqStockM = jQuery("#req-stockm");
  
  //Validar Categoria
  function validarCategoria(){
	if(cboCategoria.val() == 0){
      reqCategoria.fadeIn('fast');
      reqCategoria.removeClass("requisites");
      return false;
    }
    else{
      reqCategoria.fadeOut('fast');
      reqCategoria.addClass("requisites");
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
  
  //Validar Descripcion
  function validarDescripcion(){
	if(txtaDescripcion.val().length < 4){
      reqDescripcion.fadeIn('fast');
      reqDescripcion.removeClass("requisites");
      return false;
    }
	else if(!txtaDescripcion.val().match(/^[a-zA-Z#,.0-9°-\s]+$/)){
      reqDescripcion.fadeIn('fast');
      reqDescripcion.removeClass("requisites");
      return false;
    }
    else{
      reqDescripcion.fadeOut('fast');
      reqDescripcion.addClass("requisites");
      return true;
    }
  } 
  
  //Validar Precio
  function validarPrecio(){
    if(txtPrecio.val().length == 0){
      reqPrecio.fadeIn('fast');
      reqPrecio.removeClass("requisites");
      return false;
    }
    else if(!txtPrecio.val().match(/^[0-9]+$/)){
      reqPrecio.fadeIn('fast');
      reqPrecio.removeClass("requisites");
      return false;
    }
    else{
      reqPrecio.fadeOut('fast');
      reqPrecio.addClass("requisites");
      return true;
    }
  }
  
  //Validar StockR
  function validarStockR(){
    if(txtStockR.val().length == 0){
      reqStockR.fadeIn('fast');
      reqStockR.removeClass("requisites");
      return false;
    }
    else if(!txtStockR.val().match(/^[0-9]+$/)){
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
  
  //Validar StockM
  function validarStockM(){
    if(txtStockM.val().length == 0){
      reqStockM.fadeIn('fast');
      reqStockM.removeClass("requisites");
      return false;
    }
    else if(!txtStockM.val().match(/^[0-9]+$/)){
      reqStockM.fadeIn('fast');
      reqStockM.removeClass("requisites");
      return false;
    }
    else{
      reqStockM.fadeOut('fast');
      reqStockM.addClass("requisites");
      return true;
    }
  }
  
  
  //controlamos la validacion en los distintos eventos
  // Perdida de foco
  cboCategoria.blur(validarCategoria);
  txtNombre.blur(validarNombre);
  txtaDescripcion.blur(validarDescripcion);
  txtPrecio.blur(validarPrecio);
  txtStockR.blur(validarStockR);
  txtStockM.blur(validarStockM);
  // En cuanto el usuario esta pulsando teclas (escribiendo)
  txtNombre.keyup(validarNombre);
  txtaDescripcion.keyup(validarDescripcion);
  txtPrecio.keyup(validarPrecio);
  txtStockR.keyup(validarStockR);
  txtStockM.keyup(validarStockM);
  //En cuanto el usuario hace clic en los combobox
  cboCategoria.click(validarCategoria);
  
  // Envio de formulario
  jQuery("#botonEnviar").click(function(){
	  if(validarCategoria() == true && validarNombre() == true && validarDescripcion() == true && validarPrecio() == true && 
	  validarStockR() == true && validarStockM() == true)
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
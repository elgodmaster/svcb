$(document).ready(function(){
	//Alerta de Cobros
	$('#tst a').click(function(){
		var pagetop = $(this).attr('href');
		if(pagetop!='#'){
		$('.seccion').empty().html('<center><img src="lib/img/ajax-loader.gif" /></center>');
		$('.seccion').load(''+ pagetop+'');
		return false;
		}
		else
		return false;
		});
	//Cerrar Sesion
	$('.sesion a').click(function(){
		var pagetop = $(this).attr('href');
		if(pagetop!='#'){
		$('.seccion').empty().html('<center><img src="lib/img/ajax-loader.gif" /></center>');
		$('.seccion').load(''+ pagetop+'');
		return false;
		}
		else
		return false;
		});
	//Menu top level
	$('ul.top-level li a').click(function(){
		var pagetop = $(this).attr('href');
		if(pagetop!='#'){
		$('.seccion').empty().html('<center><img src="lib/img/ajax-loader.gif" /></center>');
		$('.seccion').load(''+pagetop+'');
		return false;
		}
		else
		return false;
		});
	//Menu sub level
	$('ul.sub-level li a').click(function(){
		var pagesub = $(this).attr('href');
		if(pagesub!='#'){
		$('.seccion').empty().html('<center><img src="lib/img/ajax-loader.gif" /></center>');
		$('.seccion').load(''+pagetop+'');
		return false;
		}
		else
		return false;
		});
});
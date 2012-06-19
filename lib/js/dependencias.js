$(document).ready(function(){
	cargar_regiones();
	$("#cboRegion").change(function(){dependencia_provincia();});
	$("#cboProvincia").change(function(){dependencia_comuna();});
	$("#cboProvincia").attr("disabled",true);
	$("#cboComuna").attr("disabled",true);
});

function cargar_regiones()
{
	$.get("lib/ajax/cargar-region.php", function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$('#cboRegion').append(resultado);			
		}
	});	
}
function dependencia_provincia()
{
	var code = $("#cboRegion").val();
	$.get("lib/ajax/dependencia-provincia.php", { code: code },
		function(resultado)
		{
			if(resultado == false)
			{
				alert("Error");
			}
			else
			{
				$("#cboProvincia").attr("disabled",false);
				document.getElementById("cboProvincia").options.length=1;
				$('#cboProvincia').append(resultado);			
			}
		}

	);
}

function dependencia_comuna()
{
	var code = $("#cboProvincia").val();
	$.get("lib/ajax/dependencia-comuna.php?", { code: code }, function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$("#cboComuna").attr("disabled",false);
			document.getElementById("cboComuna").options.length=1;
			$('#cboComuna').append(resultado);			
		}
	});	
	
}
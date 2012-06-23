var cont=1;

$(document).ready(function(){
	cargar_regiones();
	$("#cboRegion").change(function(){dependencia_provincia();});
	$("#cboProvincia").change(function(){dependencia_comuna();});
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
		if(cont==1)
			dependencia_provincia();
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
				if(cont==1)
				{
					$('#cboProvincia').append(resultado);
					dependencia_comuna();
				}
				else
				{
					document.getElementById("cboProvincia").options.length=1;
					$('#cboProvincia').append(resultado);
				}
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
			if(cont==1)
			{
				$('#cboComuna').append(resultado);
				cont++;
			}
			else
			{
				document.getElementById("cboComuna").options.length=1;
				$('#cboComuna').append(resultado);
			}
		}
	});	
	
}
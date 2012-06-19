<?php
require("../../_modelo/Conexion.php");
 
 function cargarRegion()
 {
	 require("../../_modelo/Region.php");
	 
	 $region = new Region();	 
	 $regionx = $region->listarRegion();
	 
	 $regiones = array();
	 while($row = mysql_fetch_assoc($regionx))
	 {
		 $obj_region = new Region();
		 $obj_region->setIdRegion($row["id_region"]);
		 $obj_region->setNombreRegion(utf8_encode($row["nombre_region"]));
		 $regiones[]= $obj_region;
	 }
	 
	 foreach ($regiones as $obj_region)
	 {
		 echo "<option value=\"".$obj_region->getIdRegion()."\">".$obj_region->getNombreRegion()."</option>";
	 }	 
 }
 
 function cargarProvincia($codigo)
 {
	 require("../../_modelo/Provincia.php");
	 $provincia = new Provincia();	 
	 $provinciax = $provincia->listarProvincia($codigo);
	 
	 $provincias = array();
	 while($row = mysql_fetch_assoc($provinciax))
	 {
		 $obj_provincia = new Provincia();
		 $obj_provincia->setIdProvincia($row["id_provincia"]);
		 $obj_provincia->setNombreProvincia(utf8_encode($row["nombre_provincia"]));
		 $provincias[]= $obj_provincia;
	 }
	 
	 foreach ($provincias as $obj_provincia)
	 {
		 echo "<option value=\"".$obj_provincia->getIdProvincia()."\">".$obj_provincia->getNombreProvincia()."</option>";
	 }
 }
 
 function cargarComuna($codigo)
 {
	 require("../../_modelo/Comuna.php");
	 $comuna = new Comuna();
	 $comunax = $comuna->listarComuna($codigo);
	 
	 $comunas = array();
	 while($row = mysql_fetch_assoc($comunax))
	 {
		 $obj_comuna = new Comuna();
		 $obj_comuna->setIdComuna($row["id_comuna"]);
		 $obj_comuna->setNombreComuna(utf8_encode($row["nombre_comuna"]));
		 $comunas[]= $obj_comuna;
	 }
	 
	 foreach ($comunas as $obj_comuna)
	 {
		 echo "<option value=\"".$obj_comuna->getIdComuna()."\">".$obj_comuna->getNombreComuna()."</option>";
	 }
 }
 
?>
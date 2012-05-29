<?php
 include("Bodeguero.php");
 $bodeguero1 = new Bodeguero();
 $bodeguero1->setIdUsuario("16.749.481-1");
 $bodeguero1->setNombreUsuario("Sebastian Javier");
 $bodeguero1->setApatUsuario("Gamonal");
 $bodeguero1->setAmatUsuario("Arias");
 $id = $bodeguero1->getIdUsuario();
 $nombre = $bodeguero1->getNombreUsuario();
 $apat = $bodeguero1->getApatUsuario();
 $amat = $bodeguero1->getAmatUsuario();
 $tipo = $bodeguero1->getTipoUsuario();
 
 echo $id."<br>";
 echo $nombre." ".$apat." ".$amat."<br>";
 echo $tipo;
		 
?>
<?php
include "conectar.php";
	$vCveEsp=$_POST['cveEspecialidad'];
	$vNomEsp=$_POST['nomEspecialidad'];
	$vNomArea=$_POST['nombreArea'];
	$vBoton=$_POST['boton'];
	$resConectar=conectar();
	$sqlArea="SELECT cveArea FROM AREA WHERE nomArea='$vNomArea';";
	$sqlCveArea=mysql_query($sqlArea,$resConectar);
	$resulCveArea=mysql_fetch_array($sqlCveArea);
	$vCveArea=$resulCveArea["cveArea"];
	if($vBoton=="Guardar"){
		$sqlAltaEsp="INSERT INTO ESPECIALIDAD VALUES('$vCveEsp','$vNomEsp','$vCveArea');";
		$guarda=mysql_query($sqlAltaEsp,$resConectar);
		if(!$guarda){
			echo"<SCRIPT LANGUAGE='Javascript' TYPE='text/Javascript'>
			alert('Ocurrio un error... Posible clave repetida')
			Javascript:history.back(1) </SCRIPT>";
		}
		else{
			echo"<SCRIPT LANGUAGE='Javascript' TYPE='text/Javascript'>
			alert('Especialidad registrada')
			window.location='../index.html'</SCRIPT>";
		}
	}
	else{
		$sqlModeEsp="UPDATE ESPECIALIDAD SET nomEsp='$vNomEsp',cveArea='$vCveArea' WHERE cveEsp='$vCveEsp';";
		$modificar=mysql_query($sqlModeEsp,$resConectar);
		if(!$modificar){
			echo"<SCRIPT LANGUAGE='Javascript' TYPE='text/Javascript'>
			alert('Ocurrio un error...No se guardo el registro')
			Javascript:history.back(1) </SCRIPT>";
		}
		else{
			echo"<SCRIPT LANGUAGE='Javascript' TYPE='text/Javascript'>
			alert('Especialidad modificada')
			window.location='consultaEspecialidad.php'</SCRIPT>";
		}
	}
?>
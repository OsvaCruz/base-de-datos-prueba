<HTML XMLNS="http://www.w3.org/1999*xhtml">
<HEAD>
		<TITLE>Formniualarios de Altas de especialidades</TITLE>
		<LINK HREF="../estilos/estilosEspecialidad.css" REL="stylesheet" TYPE="text/css"/>
		<SCRIPT LANGUAGE="Javascript" TYPE="text/Javascript">
			function eliminar()
			{
				if(confirm('¿Confirma la baja?'))
					document.formsGestionEsp.submit()
			}
	</SCRIPT>
	</HEAD>
	<BODY>
	<FORM ID="formGestionEsp" NAME="formGestionEsp" METHOD="post" ACTION="gestionBase.php" ENCTYPE="multipart/form-data">
	<P CLASS="titulo">Gestion de especialidad</P>
	<BR/><BR/>
	<?php
			include"conectar.php";
			$vCveEsp=$_POST['cveEspe'];
			$resConectar=conectar();
			$sqlEspe="SELECT cveEsp, nomEsp, nomArea FROM ESPECIALIDAD, AREA WHERE cveEsp='$vCveEsp' AND ESPECIALIDAD.cveArea=AREA.cveArea;";
			$tablaEspe=mysql_query($sqlEspe);
			$numfilasEspe=mysql_num_rows($tablaEspe);
			if($numfilasEspe>0){
				$filaEspe=mysql_fetch_array($tablaEspe);
				echo'<LABEL FOR="clave">'."Clave:".'</LABEL>';
				echo'<INPUT NAME="cveEspecialidad" TYPE="text" ID="claveEspecialidad" READONLY="readonly" VALUE='.$filaEspe['cveEsp'].'><BR/>';
				
				echo'<LABEL FOR="nombre">'."Nombre:".'</LABEL>';
				echo'<INPUT NAME="nomEspecialidad" TYPE="text" ID="cnombreEspecialidad" READONLY="readonly" VALUE='.$filaEspe['nomEsp'].'><BR/>';
				
				echo'<LABEL FOR="area">'."Área:".'</LABEL>';
				echo'<INPUT NAME="nomArea" TYPE="text" ID="nombreArea" READONLY="readonly" VALUE='.$filaEspe['nomArea'].'><BR/>';
			}
			echo'<INPUT TYPE="button" NAME="botonG" ID="botonG" VALUE="Eliminar" ONCLICK="eliminar();"/>';
			echo'<INPUT TYPE="button" NAME="botonG" ID="botonG" VALUE="Eliminar" ONCLICK="eliminar();"/><BR/>';
		?>
		</FORM>
		<BR/>
		<IMG SRC="../imagEscuela/regresar.png" WIDTH="60" HEIGHT="40" ONCLICK="history.back()"/>
	</BODY>
</HTML>
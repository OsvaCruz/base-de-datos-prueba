<HTML XMLNS="http://www.w3.org/1999*xhtml">

	<HEAD>
	<META HTTP-EQUIV="conten-Type" CONTENT="texr/html; CHARSET=utf-8"/>
	<TITLE>Formulario de Modificasiones de Especialidades</TITLE>
		<LINK HREF="../estilos/estilosEspecialidad.css" REL="stylesheet" TYPE="text/css"/>
		<SCRIPT LANGUAGE="Javascript" TYPE="text/Javascript">
			function modificar()
			{
				if(confirm('¿Confirma los cambios?'))
					document.formCambios.submit()
			}
		</SCRIPT>
	</HEAD>

	<BODY>
	<?php
			include"conectar.php";
			$vCveEsp=$_POST['cveEspecialidad'];
			$vNomEsp=$_POST['nomEspecialidad'];
			$vNomArea=$_POST['nomArea'];
			$resConectar=conecta();
			if(isset($_POST['botonG'])=='Modificar'){
				echo'<FORM ID="formCambios" NAME="formCambios" METHOD="post" ACTION="actBase.php">';
				echo'<P CLASS="titulo">Cambios de especialidades:</P>
					<BR/><BR/>';
				
				echo'<LABEL FOR="Clave">'."Clave:".'</LABEL>';
				echo'<INPUT NAME="cveEspecialidad" TYPE="text" ID="claveEspecialidad" READONLY="readonly"><BR/>';
				
				echo'<LABEL FOR="nombre">'."Nombre:".'</LABEL>';
				echo'<INPUT NAME="nomEspecialidad" TYPE="text" ID="nombreEspecialidad" SIZE="100" MAXLENGTH="25" VALUE='.$vNomEsp.'><BR/>';
				
				echo'<LABEL FOR="area">'."Área:".'</LABEL>';
				echo'<INPUT NAME="nomArea" TYPE="text" ID="nombreArea">';
				
				$sqlArea="SELECT * FROMAREA";
				$tablaArea=mysql_query($sqlAreas);
				$numfilasAreas=mysql_num_rows($tablaArea);
				
				for($i=0; $i<$numfilasAreas;$i++){
				 $filaArea=mysql_fetch_array($tablaArea);
					if($filaArea['nomArea']==$vNomArea){
				echo'<OPTION SELECTED="selected">'.$filaArea['nomArea'].'</OPTION>';
				}
				else
					echo'<OPTION>'.$filaArea['nomArea'].'</OPTION>';
			}
			echo'</SELEC><BR/><BR/>';
		echo'<INPUT TYPE="button" NAME="boton" ID="botonModificar" VALUE="Modificar" ONCLICK="mofificar();"/>';
		echo'<INPUT TYPE="reset" NAME="botonCancelar" ID="botonCancelar" VALUE="Cancelar"/><BR/>';
		
		echo'</FORM>';
		echo'<IMG SRC="../imagEscuela/regresar.png" WIDTH="60" HEIGHT="40" ONCLICK="history.back()"/>';
		}
		else{
			$sqlElimEsp="DELETE FROM ESPECIALIDAD WHERE cveEsp='$vCveEsp'";
			$regEli=mysql_query($sqlElimEsp, $resConectar);
			
			if(!$regEli)
				echo"<SCRIPT LANGUAGE='Javascript' TYPE='text/Javascript'> alert('Especialidad borrada...') window.location='consultaEspecialidad.php'</SCRIPT>";
		}	
		?>
	</BODY>
</HTML>
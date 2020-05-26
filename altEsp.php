<HTML XMLNS="http://www.w3.org/1999*xhtml">
	<HEAD>
		<META HTTP-EQUIV="conten-Type" CONTENT="texr/html; CHARSET=utf-8"/>
		<TITLE>Formularios de Altas de especialidades</TITLE>
		<LINK HREF="../estilos/estilosEspecialidad.css" REL="stylesheet" TYPE="text/css"/>
	</HEAD>

	<BODY>
	<FORM ID="form1" NAME="form1" METHOD="post" ACTION="actBase.php">;
		<P CLASS="titulo">Altas de Especialidades</P>
		<BR/><BR/>
		<LABEL FOR="clave">Clave:</LABEL>
		<INPUT NAME="cveEspecialidad" TYPE="text" ID="claveEspecialidad" SIZE="100px" MAXLENGTH="6"/><BR/>

		<LABEL FOR="nombre">Nobre:</LABEL>
		<INPUT NAME="nomEspecialidad" TYPE="text" ID="nombreEspecialidad" SIZE="100px" MAXLENGTH="25"/><BR/>

		<LABEL FOR="area">Área:</LABEL>
		<SELECT NAME="nombreArea" ID="nombreArea">

		<?php
			include"conctar.php";
			$resConectar=conectar();
			$sqlAreas="SELECT*FROM AREA";
			$tablaArea=mysql_query($sqlAreas);
			$numfilasAreas=mysql_num_rows($tablaArea);
			for($i=0; $i<$numfilasAreas;$i++){
				$filaArea=mysql_fetch_array($tablaArea);
				echo'<OPTION>'.$filaArea['nomArea'].'</OPTION>';
			}
		?>
		</SELECT><BR/><BR/>
		<INPUT TYPE="submit" NAME="boton" ID="botonGuardar" VALUE="Guardar"/>
		<INPUT TYPE="reset" NAME="botonNuevo" ID="botonNuevo" VALUE="Nuevo"/><BR/>
		</FORM>
		<IMG SRC="../imagEscuela/regresar.png" WIDTH="60" HEIGHT="40" ONCLICK="history.back(1)"/>

	</BODY>
</HTML>

<HTML XMLNS="http://www.w3.org/1999*xhtml">
	<HEAD>
		<META HTTP-EQUIV="conten-Type" CONTENT="texr/html; CHARSET=utf-8"/>
		<TITLE>Formniualarios de Altas de especialidades</TITLE>
		<LINK HREF="../estilos/estilosEspecialidad.css" REL="stylesheet" TYPE="text/css"/>
	</HEAD>
	
	<BODY>
	<FORM ID="form1" NAME="form1" METHOD="post" ACTION="gestionEspecialidad.php">;
		<P CLASS="titulo">Seleccione la Especialidad</P>
		<BR/><BR/>
		<LABEL FOR="clave">Clave:</LABEL>
		<SELECT NAME="cveEspe" ID="cveEspecialidad">
		
		<?php
			include"conctar.php";
			$resConectar=conectar();
			$sqlEspe="SELECT*FROM ESPECIALIDAD";
			$tablaEspe=mysql_query($sqlEspe);
			$numfilasEspe=mysql_num_rows($tablaEspe);
			for($i=0; $i<$numfilasEspe;$i++){
				$filaEspe=mysql_fetch_array($tablaEspe);
				echo'<OPTION>'.$filaEspe['cveEsp'].'</OPTION>';
			}
		?>
		</SELECT><BR/><BR/>
		<INPUT TYPE="submit" NAME="btnConsultar" ID="botonConsultar" VALUE="Consultar"/><BR/><BR/>
		</FORM>
		<a href="Pagina%2520web%2520oficial/Animus.html"><IMG SRC="../imagEscuela/regresar.png" WIDTH="60" HEIGHT="40"/></a>
	</BODY>
</HTML>
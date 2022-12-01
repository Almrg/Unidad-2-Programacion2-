<!DOCTYPE html><head>
<title>Sistema de Tienda</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddaccordion.js"></script>
<link rel="stylesheet" type="text/css" href="css/mainstyle.css" />

<script type="text/javascript">


ddaccordion.init({
	headerclass: "expandable", //Shared CSS class name of headers group that are expandable
	contentclass: "categorylinks", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false
	defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})


</script>



 </head>

 <body>
 <header>
 <div id="cabe" align="center">		<img src="img/Header.png"  width="1000" height="200" align="middle" >
       </div>
 <table id="maintable" border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr>

                <td id="leftbar" valign="top">
            <!-- left bar for script category index pages -->
                        <div class="headers expandable">Inicio</div>
                        <ul class="categorylinks ">
  						<li><a href="menuInicio.php">Inicio</a></li>
  						<li><a href="loguin.php">Mision Vision Valores</a></li>
                        </ul>

                        <div class="headers expandable">Manejo de Provedores</div>
                        <ul class="categorylinks">
  						  <li><a href="altas_provedores.php">  Altas </a> </li>
						  <li><a href="bajas_provedores.php">  Bajas </a> </li>
  						  <li><a href="busca_cliente.php" >Modificaciones </a></li></li>
  						  <li><a href="B_imprime_cliente.php" >Imprime provedores
						   . .</a></li></li>
  						  <li><a href="listado_clientes.php"> Listado de provedores </a></li> </li>
						</ul>

            			<div class="headers expandable">Manejo de clientes</div>
                        <ul class="categorylinks">
						  <li> <a href="altas_cliente.php" >Altas usuarios </a></li>
   						 <li> <a href="cambio_clave.php" >Cambio de clave/ Privilegios </a></li>
                         <li> <a href="baja_empleados.php" >Baja empleados</a></li></ul>
                        </ul>

						<div class="headers expandable">Gestor de Tienda</div>
                        <ul class="categorylinks ">
                           <li><a href="opcion1.php"> opcion 1 del sistema </a></li>
                           <li><a href="opcion2.php"> opcion 2  del sistema </a></li>
                           <li><a href="opcion3.php"> opcion 3 del sistema</a></li>

                        </ul>

           			    <div class="headers expandable">Reportes</div>
                        <ul class="categorylinks ">
                         <?  if (strrpos($nivel,"T")) {?><li><a href="Reporte1.php"> Reporte 1</a></li>
        		         <?  if (strrpos($nivel,"V")) {?><li><a href="Reposrte2.php"> Reporte 2</a></li>
                		 <?  if (strrpos($nivel,"W")) {?><li> <a href="Reporte3.php">Reporte 3</a></li>
                          </ul>


                     <div class="headers expandable">Herramientas</div>
                        <ul class="categorylinks ">
                    	 <li><a href="respaldos.php">Respaldo</a></li>
                         <li><a href="Rec_respaldos.php"> Recuperación de respaldo</a></li>
                            </ul>


              <!-- <div class="headers" style="margin: 8px 0;">Sweet Ads</div> -->

              <div style="text-align:center">
               <td valign="top" id="contentarea" class="categoryarea"><p>&nbsp;</p>
                  <p align="left">
                <!--xxxxxxxxxxxxxxxxxxxxxxxxx-->
                   <!--- objeto formulario -->
</header>
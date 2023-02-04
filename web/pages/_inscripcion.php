<?php

//function
//$link = mysql_connect("localhost","root","") or die("<h2>No se encuentra el servidor");;{
//$db = mysql_selest_db("ligaargentina , $link") or die("<h2>Error de conexion");{

//$club = $_POST['Nombreusuario'];
//$direccion = $_POST['Direccion'];
//$telefono = $_POST['telefono'];
//$localidad = $_POST['localidad'];

//$rew = (strlen($nombre)*strlen($direccion)*strlen($telegon)*strlen($localidad)) or die("No sellenaron lo datos correctamente");

//mysql_query()

//}
//?>


<!-- inscripcion section-->  
<section class="bg-light" id="inscripcion">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                  <div class="col-lg-8">
                      <h2> INSCRIBITE PARA PARTICIPAR!!</h2>
                    <h2>FORMULARIO DE INSCRIPCIÓN</h2><br />
                   <form class="row g-3" method="GET" action="pages/conectar.php">
                    <fieldset>
                  <div class="col-md-12">
                    <label for="nombre" class="form-label">Club</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="ingrese nombre del club">
                  </div>                  
                  <div class="col-12">
                    <label for="zona" class="form-label">Zona</label>
                    <input type="text" name="zona"class="form-control" id="zona" placeholder="ingrese zona">
                  </div>
                  <div class="col-12">
                    <label for="direccion" class="form-label">Direccion</label>
                    <input type="text" name="direccion"class="form-control" id="direccion" placeholder="ingrese direccion del club">  
                  <div class="col-md-12">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="number" name="telefono"class="form-control" id="telefono"placeholder="ingrese numero de telefono">                    
                    <div class="col-md-12">
                      <label for="localidad" class="form-label">Localidad</label>
                      <input type="text" name="localidad"class="form-control" id="localidad" placeholder="ingrese la localidad">
                    </div>                 
                    </div>
                  <div class="col-12">
                    <div class="form-check">                      
                      <label class="form-check-label" for="clubes">                    
                      </label>
                    </div>
                    <div class="col-12">
                      <button type="submit" value="enviar" class="btn btn-primary"  onclick="return confirm('Está segura/o que desea inscribir este registro?');">Enviar</button>
                    </div>
                   </form>
                  </div>
                 </div>
            </div>
        </section>
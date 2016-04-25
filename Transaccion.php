<?php
$conex=mysql_connect("localhost","root","") or die ("No se realizo la conexion");
  mysql_select_db("pendiente",$conex) or die("Error con la base de Datos");
  session_start();
  if (!$_SESSION['nombre']){
    header("Location:Index.php");
  }
?>
<!DOCTYPE html>
<html lang ="en"> 
<head>
     <meta charset="utf-8">
     <link rel="stylesheet"  href="estilos_uno.css">
     <link rel="stylesheet"  href="css_prueba.css">
     <title>Ventas</title>
     <h1>Papeleria Marianela</h1>                  
</head>
<script language="javascript">
var total_completo=0;
function fAgrega()
{
var precio1, precio2 ,respuesta1;
var iva;
var subtotal=0;

precio1=parseFloat(document.getElementById("precio1").value);
precio2= parseFloat(document.getElementById("cantidad1").value);
respuesta1= parseFloat( precio1 * precio2);
document.getElementById("subtotal1").value=respuesta1;
subtotal +=respuesta1;
document.getElementById("subtotal").value=subtotal;
iva = Math.round( 0.12* subtotal)/100;
document.getElementById("iva").value=iva;
total_completo = subtotal+iva;
document.getElementById("total_completo").value=total_completo;


precio1=parseFloat(document.getElementById("precio2").value);
precio2= parseFloat(document.getElementById("cantidad2").value);
respuesta1= parseFloat( precio1 * precio2);
document.getElementById("subtotal2").value=respuesta1;
subtotal +=respuesta1;
document.getElementById("subtotal").value=subtotal;
iva = Math.round( 0.12* subtotal)/100;
document.getElementById("iva").value=iva;
total_completo = subtotal+iva;
document.getElementById("total_completo").value=total_completo;

precio1=parseFloat(document.getElementById("precio3").value);
precio2= parseFloat(document.getElementById("cantidad3").value);
respuesta1= parseFloat( precio1 * precio2);
document.getElementById("subtotal3").value=respuesta1;
subtotal +=respuesta1;
document.getElementById("subtotal").value=subtotal;
iva = Math.round( 0.12* subtotal)/100;
document.getElementById("iva").value=iva;
total_completo = subtotal+iva;
document.getElementById("total_completo").value=total_completo;

precio1=parseFloat(document.getElementById("precio4").value);
precio2= parseFloat(document.getElementById("cantidad4").value);
respuesta1= parseFloat( precio1 * precio2);
document.getElementById("subtotal4").value=respuesta1;
subtotal +=respuesta1;
document.getElementById("subtotal").value=subtotal;
iva = 0.12* subtotal;
document.getElementById("iva").value=iva;
total_completo = subtotal+iva;
document.getElementById("total_completo").value=total_completo;

precio1=parseFloat(document.getElementById("precio5").value);
precio2= parseFloat(document.getElementById("cantidad5").value);
respuesta1= parseFloat( precio1 * precio2);
document.getElementById("subtotal5").value=respuesta1;
subtotal +=respuesta1;
document.getElementById("subtotal").value=subtotal;
iva = 0.12* subtotal;
document.getElementById("iva").value=iva;
total_completo = subtotal+iva;
document.getElementById("total_completo").value=total_completo;

precio1=parseFloat(document.getElementById("precio6").value);
precio2= parseFloat(document.getElementById("cantidad6").value);
respuesta1= parseFloat( precio1 * precio2);
document.getElementById("subtotal6").value=respuesta1;
subtotal +=respuesta1;
document.getElementById("subtotal").value=subtotal;
iva = 0.12* subtotal;
document.getElementById("iva").value=iva;
total_completo = subtotal+iva;
document.getElementById("total_completo").value=total_completo;

precio1=parseFloat(document.getElementById("precio7").value);
precio2= parseFloat(document.getElementById("cantidad7").value);
respuesta1= parseFloat( precio1 * precio2);
document.getElementById("subtotal7").value=respuesta1;
subtotal +=respuesta1;
document.getElementById("subtotal").value=subtotal;
iva = 0.12* subtotal;
document.getElementById("iva").value=iva;
total_completo = subtotal+iva;
document.getElementById("total_completo").value=total_completo;

precio1=parseFloat(document.getElementById("precio8").value);
precio2= parseFloat(document.getElementById("cantidad8").value);
respuesta1= parseFloat( precio1 * precio2);
document.getElementById("subtotal8").value=respuesta1;
subtotal +=respuesta1;
document.getElementById("subtotal").value=subtotal;
iva = 0.12* subtotal;
document.getElementById("iva").value=iva;
total_completo = subtotal+iva;
document.getElementById("total_completo").value=total_completo;
}
function validarNumeros(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==110) return true; // punto
     if (tecla==9) return true; // tab
     if (tecla==8) return true; // delete
    if (e.ctrlKey && tecla==86) { return true}; //Ctrl v
    if (e.ctrlKey && tecla==67) { return true}; //Ctrl c
    if (e.ctrlKey && tecla==88) { return true}; //Ctrl x
    if (tecla>=96 && tecla<=105) { return true;} //numpad
 
    patron = /[0-9]/; // patron
 
    te = String.fromCharCode(tecla); 
    return patron.test(te); // prueba
}
</script>
<body>
  <div class="separa_3">
  </div>
  <div id="header">
        <ul class="nav">
            <li><a href="Inicio.php">Inicio</a></li>
            <li><a href="Productos.php">Productos</a></li>
            <li><a href="proveedores.php">Proveedores</a></li>
            <li><a href="Cliente.php">Clientes</a></li>
        </ul>
  </div>
  <div class="separa">
  </div>
  <form name="form" method="post" action="Transaccion.php">
<article>
  
      <table class="meta">
                             <div class="separar">
                             <th><span>Cliente:</span></th>
                                                <td>
                                                  <select name="cliente">
                                                                      <?php
                                                                      require_once("connect.php");
                                                                       $nueva='SELECT ID_CLIENTE, CONCAT(NOMBRE," ", APELLIDO) AS CLIENTE  FROM  cliente';
                                                                       $resultado = $connect->query($nueva);
                                                                       $fil=mysqli_fetch_assoc($resultado);
                                                                      do
                                                                      {
                                                                          echo "<option value='".$fil['ID_CLIENTE']."'>";
                                                                          echo($fil['CLIENTE']);
                                                                          echo"</option>";
                                                                      }
                                                                      while($fil=mysqli_fetch_assoc($resultado));
                                                                      ?>
                                                  </select>
                                              </td>
                          
                             <tbody>
                                
                                   <tr>
                                                <th><span>Numero Factura:</span></th>
                                                <td><input type= "text" name="nro_documento" onkeydown="return validarNumeros(event)" ></td>
                                   </tr>

                                    <tr>
                                                <th>Fecha</th>
                                                <td><input type="date" name="fecha" required></td>
                                   </tr>
                             </tbody>   
                          </div>                
      </table>

       <table class="inventory">
       <thead>
              <tr>
                     <th><span>Numero</span></th>
                     <th><span>Descripcion</span></th>
                     <th><span>Precio</span></th>
                     <th><span>Cantidad</span></th>
                     <th><span>Total</span></th>
              </tr>
       </thead>
       </table>
       <table>
       <tbody>
               <tr>
                            <td><input type="text" value="1" readonly ></td>
                             <td>
                                                  <select name="producto1">
                                                                      <?php
                                                                      require_once("connect.php");
                                                                       $nueva='SELECT ID_PRODUCTO, CONCAT(NOMBRE_PRO) AS PRODUCTO  FROM  producto';
                                                                       $resultado = $connect->query($nueva);
                                                                       $fil=mysqli_fetch_assoc($resultado);
                                                                      do
                                                                      {
                                                                          echo "<option value='".$fil['ID_PRODUCTO']."'>";
                                                                          echo($fil['PRODUCTO']);
                                                                          echo"</option>";
                                                                      }
                                                                      while($fil=mysqli_fetch_assoc($resultado));
                                                                      ?>
                                                  </select>
                             </td>
                            <td><input type="text" name="precio1"   id="precio1" value="0"   onkeydown="return validarNumeros(event)" ></td>
                            <td><input type="text" name="cantidad1" id="cantidad1" value="0" onkeydown="return validarNumeros(event)" ></td>
                            <td><input type="text" name="subtotal1" id="subtotal1" value="0" readonly onkeyup="fAgrega();"></td>
               </tr>
               <tr>
                            <td><input type="text" value="2" readonly ></td>
                            <td>
                                                  <select name="producto2">
                                                                      <?php
                                                                      require_once("connect.php");
                                                                       $nueva='SELECT ID_PRODUCTO, CONCAT(NOMBRE_PRO) AS PRODUCTO  FROM  producto';
                                                                       $resultado = $connect->query($nueva);
                                                                       $fil=mysqli_fetch_assoc($resultado);
                                                                      do
                                                                      {
                                                                          echo "<option value='".$fil['ID_PRODUCTO']."'>";
                                                                          echo($fil['PRODUCTO']);
                                                                          echo"</option>";
                                                                      }
                                                                      while($fil=mysqli_fetch_assoc($resultado));
                                                                      ?>
                                                  </select>
                              </td>
                            <td><input type="text" name="precio2"   id="precio2"   value="0"   onkeydown="return validarNumeros(event)"></span></td>
                            <td><input type="text" name="cantidad2" id="cantidad2" VALUE="0" onkeydown="return validarNumeros(event)"></td>
                            <td><input type="text" name="subtotal2" id="subtotal2" value="0" readonly onkeyup="fAgrega();"></td>
               </tr>
               <tr>
                            <td><input type="text" value="3" readonly></td>
                            <td>
                                                  <select name="producto3">
                                                                      <?php
                                                                      require_once("connect.php");
                                                                       $nueva='SELECT ID_PRODUCTO, CONCAT(NOMBRE_PRO) AS PRODUCTO  FROM  producto';
                                                                       $resultado = $connect->query($nueva);
                                                                       $fil=mysqli_fetch_assoc($resultado);
                                                                      do
                                                                      {
                                                                          echo "<option value='".$fil['ID_PRODUCTO']."'>";
                                                                          echo($fil['PRODUCTO']);
                                                                          echo"</option>";
                                                                      }
                                                                      while($fil=mysqli_fetch_assoc($resultado));
                                                                      ?>
                                                  </select>
                              </td>
                            <td><input type="text" name="precio3"   id="precio3" value="0"   onkeydown="return validarNumeros(event)"></span></td>
                            <td><input type="text" name="cantidad3" id="cantidad3" value="0" onkeydown="return validarNumeros(event)"></td>
                            <td><input type="text" name="subtotal3" id="subtotal3" value="0" readonly onkeyup="fAgrega();"></td>
               </tr>
               <tr>
                            <td><input type="text"value="4" readonly></td>
                            <td>
                                                  <select name="producto4">
                                                                      <?php
                                                                      require_once("connect.php");
                                                                       $nueva='SELECT ID_PRODUCTO, CONCAT(NOMBRE_PRO) AS PRODUCTO  FROM  producto';
                                                                       $resultado = $connect->query($nueva);
                                                                       $fil=mysqli_fetch_assoc($resultado);
                                                                      do
                                                                      {
                                                                          echo "<option value='".$fil['ID_PRODUCTO']."'>";
                                                                          echo($fil['PRODUCTO']);
                                                                          echo"</option>";
                                                                      }
                                                                      while($fil=mysqli_fetch_assoc($resultado));
                                                                      ?>
                                                  </select>
                              </td>
                            <td><input type="text" name="precio4"   id="precio4" value="0"    onkeydown="return validarNumeros(event)"></span></td>
                            <td><input type="text" name="cantidad4" id="cantidad4" value="0"  onkeydown="return validarNumeros(event)"></td>
                            <td><input type="text" name="subtotal4" id="subtotal4" value="0"readonly onkeyup="fAgrega();"></td>
               </tr>
               <tr>
                            <td><input type="text"value="5" readonly></td>
                            <td>
                                                  <select name="producto5">
                                                                      <?php
                                                                      require_once("connect.php");
                                                                       $nueva='SELECT ID_PRODUCTO, CONCAT(NOMBRE_PRO) AS PRODUCTO  FROM  producto';
                                                                       $resultado = $connect->query($nueva);
                                                                       $fil=mysqli_fetch_assoc($resultado);
                                                                      do
                                                                      {
                                                                          echo "<option value='".$fil['ID_PRODUCTO']."'>";
                                                                          echo($fil['PRODUCTO']);
                                                                          echo"</option>";
                                                                      }
                                                                      while($fil=mysqli_fetch_assoc($resultado));
                                                                      ?>
                                                  </select>
                              </td>
                            <td><input type="text" name="precio5"    id="precio5" value="0"   onkeydown="return validarNumeros(event)"></span></td>
                            <td><input type="text" name="cantidad5"  id="cantidad5" value="0" onkeydown="return validarNumeros(event)"></td>
                            <td><input type="text" name="subtotal5"  id="subtotal5" value="0" readonly onkeyup="fAgrega();"></td>
               </tr>
               <tr>
                            <td><input type="text" value="6" readonly></td>
                            <td>
                                                  <select name="producto6">
                                                                      <?php
                                                                      require_once("connect.php");
                                                                       $nueva='SELECT ID_PRODUCTO, CONCAT(NOMBRE_PRO) AS PRODUCTO  FROM  producto';
                                                                       $resultado = $connect->query($nueva);
                                                                       $fil=mysqli_fetch_assoc($resultado);
                                                                      do
                                                                      {
                                                                          echo "<option value='".$fil['ID_PRODUCTO']."'>";
                                                                          echo($fil['PRODUCTO']);
                                                                          echo"</option>";
                                                                      }
                                                                      while($fil=mysqli_fetch_assoc($resultado));
                                                                      ?>
                                                  </select>
                              </td>
                            <td><input type="text" name="precio6"    id="precio6" value="0"    onkeydown="return validarNumeros(event)"></td>
                            <td><input type="text" name="cantidad6"  id="cantidad6" value="0"  onkeydown="return validarNumeros(event)"></td>
                            <td><input type="text" name="subtotal6"  id="subtotal6" value="0" readonly onkeyup="fAgrega();"></td>
               </tr>
               <tr>
                            <td><input type="text"value="7" readonly></td>
                            <td>
                                                  <select name="producto7">
                                                                      <?php
                                                                      require_once("connect.php");
                                                                       $nueva='SELECT ID_PRODUCTO, CONCAT(NOMBRE_PRO) AS PRODUCTO  FROM  producto';
                                                                       $resultado = $connect->query($nueva);
                                                                       $fil=mysqli_fetch_assoc($resultado);
                                                                      do
                                                                      {
                                                                          echo "<option value='".$fil['ID_PRODUCTO']."'>";
                                                                          echo($fil['PRODUCTO']);
                                                                          echo"</option>";
                                                                      }
                                                                      while($fil=mysqli_fetch_assoc($resultado));
                                                                      ?>
                                                  </select>
                              </td>
                            <td><input type="text" name="precio7"   id="precio7" value="0"    onkeydown="return validarNumeros(event)"></td>
                            <td><input type="text" name="cantidad7" id="cantidad7" value="0"  onkeydown="return validarNumeros(event)"></td>
                            <td><input type="text" name="subtotal7" id="subtotal7" value="0" readonly onkeyup="fAgrega();"></td>
               </tr>
               <tr>
                            <td><input type="text" value="8" readonly ></td>
                            <td>
                                                  <select name="producto8">
                                                                      <?php
                                                                      require_once("connect.php");
                                                                       $nueva='SELECT ID_PRODUCTO, CONCAT(NOMBRE_PRO) AS PRODUCTO  FROM  producto';
                                                                       $resultado = $connect->query($nueva);
                                                                       $fil=mysqli_fetch_assoc($resultado);
                                                                      do
                                                                      {
                                                                          echo "<option value='".$fil['ID_PRODUCTO']."'>";
                                                                          echo($fil['PRODUCTO']);
                                                                          echo"</option>";
                                                                      }
                                                                      while($fil=mysqli_fetch_assoc($resultado));
                                                                      ?>
                                                  </select>
                              </td>
                            <td><input type="text" name="precio8"   id="precio8" value="0"    onkeydown="return validarNumeros(event)"></td>
                            <td><input type="text" name="cantidad8" id="cantidad8" value="0"  onkeydown="return validarNumeros(event)"></td>
                            <td><input type="text" name="subtotal8" id="subtotal8" value="0" readonly onkeyup="fAgrega();"></td>
               </tr>
       </tbody>
       </table>
       <div class="separa_2">
       </div>
       <table class="balance">
              <tbody>

                     <tr>
                                   <th><span>SubTotal:</span></th>
                                   <td><input type="text" readonly name="subtotal" id="subtotal" onKeyUp="prueba();"></td>
                     </tr>

                     <tr>
                                   <th><span>Iva:</span></th>
                                   <td><input type="text" readonly name="iva" id="iva" onKeyUp="prueba();"></td>
                     </tr>

                     <tr>
                                   <th><span>Total Completo:</span></th>
                                   <td><input type="text" readonly name="total_completo" id="total_completo" onKeyUp="prueba();"></td>
                     </tr>
              </tbody>
       </table>
</article>
<div class="guardar">
                                   <input type="submit" name="guardar" value="Guardar"> 
                                   <a class="enlace" href="Reporte_Transaccion.php"> Mostrar Reporte</a>
<?php
if (isset($_POST["cliente"])) 
{
             $id_cliente=$_POST["cliente"];
             $fecha=$_POST["fecha"];
             $fecha1=date("Y-m-d");
             $nro_documento=$_POST["nro_documento"];
             $iva=$_POST["iva"];
             $total_completo=$_POST["total_completo"];
             $transaccion=guardar_datos_transaccion($id_cliente,$fecha1,$nro_documento,$iva,$total_completo);  
        ////////////////Post Cantidades/////////////// 
         $baja_stock1=$_POST["cantidad1"];
         $baja_stock2=$_POST["cantidad2"];   
         $baja_stock3=$_POST["cantidad3"]; 
         $baja_stock4=$_POST["cantidad4"]; 
         $baja_stock5=$_POST["cantidad5"]; 
         $baja_stock6=$_POST["cantidad6"]; 
         $baja_stock7=$_POST["cantidad7"]; 
         $baja_stock8=$_POST["cantidad8"];  
        ////////////// Post id_producto///////////
        $id_producto1=$_POST["producto1"];
        $id_producto2=$_POST["producto2"];
        $id_producto3=$_POST["producto3"];
        $id_producto4=$_POST["producto4"];
        $id_producto5=$_POST["producto5"];
        $id_producto6=$_POST["producto6"];
        $id_producto7=$_POST["producto7"];
        $id_producto8=$_POST["producto8"];
        ///////// Multiples Consultas/////////////
        $transa=actualizar_stock_1($id_producto1,$baja_stock1);
        $transa=actualizar_stock_2($id_producto2,$baja_stock2);
        $transa=actualizar_stock_3($id_producto3,$baja_stock3);
        $transa=actualizar_stock_4($id_producto4,$baja_stock4);
        $transa=actualizar_stock_5($id_producto5,$baja_stock5);
        $transa=actualizar_stock_6($id_producto6,$baja_stock6);
        $transa=actualizar_stock_7($id_producto7,$baja_stock7);
        $transa=actualizar_stock_8($id_producto8,$baja_stock8);
/////////////// Cantidad Completa//////////////////
        $subtota=$_POST["subtotal"];
}
?>
</div>
</form>
</div>
</body>

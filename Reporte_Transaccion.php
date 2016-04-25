<?php
 require_once("connect.php");
 $meses= array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
 for ($i=1;$i<=12;$i=$i+1) 
 { 
     $dinero[$i] = 0;
 }
 $anio=date('Y');

$consulta = "SELECT * FROM transaccion";
$resultado = $connect->query($consulta);
$fila=mysqli_fetch_assoc($resultado);
 while($fila=mysqli_fetch_assoc($resultado)){
      $y=date("Y", strtotime($fila['FECHA_TRANSACCION']));
      $mes=(int)date("m",strtotime($fila['FECHA_TRANSACCION']));
        if($y==$anio)
        {
           $dinero[$mes]=$dinero[$mes]+$fila['TOTAL'];
        }
 }
 ?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Reporte Transaccion</title>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1.1", {packages:["bar"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Meses', 'Total'],

          <?php 
          for ($i=1; $i<=12;$i=$i+1) { ?>
          ['<?php echo $meses[$i];?>',<?php echo $dinero[$i];?>],
          <?php
      }
          ?>
        ]);

        var options = {
          chart: {
            title: 'Grafica de Reportes de Ingresos Anuales',
            subtitle: 'Ventas 2015',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>
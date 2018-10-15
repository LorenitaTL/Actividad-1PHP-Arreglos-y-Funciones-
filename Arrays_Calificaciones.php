<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Calificaciones PHP</title>
</head>
<body>
  <h1>Calificaciones</h1>
  <?php

  function array_push_assoc(array &$arrayDatos, array $values){
    $arrayDatos = array_merge($arrayDatos, $values);
}
  function prueba(){
    $clerk=array(
      'user'=>'Scott',
      'cuenta' =>'5598746',
      'phone'=>'02597878',
      'pass'=>'acvf45',
      'codigo'=>'XMWERT01'
    );
    //hago push de un solo dato
    array_push_assoc($clerk, array('edad'=>'24'));
    //hago push de multiples datos
    array_push_assoc($clerk, array('direccion'=>'123 FAKE ST.', 'otraclave'=>'otrovalor'));
    //veamos como quedo el array:
    echo '<pre>';
    print_r($clerk);
    echo '</pre>';
  }
  function promedioAlumno($v){
    $promedio = array();
    foreach ($v as $alumno=>$notas) {
      foreach($notas as $nota){
        $media = array_sum($notas)/count($notas);
      }
      array_push_assoc($promedio, array($alumno=>$media));
    }
    return $promedio;
  }

  function listaAlumnos($v){
    echo "<h2>Listado de alumnos</h2>";
    foreach ($v as $alumno=>$calificaciones) {
      echo $alumno.": ";
      foreach($calificaciones as $calif){
        echo "$calif | ";
        $media = array_sum($calificaciones)/count($calificaciones);
      }
      echo "<br>Promedio: ".$media;
      echo "<br />";
      echo "<br>";
    }
  }



  function promedioGrupal($v){
    $promedio =array_sum($v)/(count($v));
    echo "<br>Promedio Grupal: ".$promedio;
    echo "<br>";
    return $promedio;
  }
  function mostrarVector($v){
    foreach ($v as $dato) {
      echo "<br>".$dato;
    }
  }

  function mejorPromedio($v){
    echo "<h2>Mejor Promedio</h2>";
    echo "MEJORES PROMEDIOS: ";
    echo "<br>";
    array_multisort($v);
    $mayor = end($v);
    foreach ($v as $nombre => $calif) {
      if ($calif==$mayor) {
        echo $nombre.": ".$calif;
        echo "<br>";
      }
    }


  }
  function mostrarPromedios($promedio){
    array_multisort($promedio);
    foreach ($promedio as $nombre => $calificaciones) {
      echo $nombre.": ".$calificaciones;
      echo "<br>";
    }
  }
  function mejoresPromedios($promedios, $valor){
    echo "<h2>Promedios superiores al promedio general</h2>";
    $long = count($promedios);
    array_multisort($promedios);
    foreach ($promedios as $nombre => $calificaciones) {
      if ($calificaciones>=$valor) {
        echo $nombre.": ".$calificaciones;
        echo "<br>";
      }
    }
  }


  ?>
  <div style="border:1px solid red;">

    <?php
    $calificacionesSemestrales = array(
      "Lore"=>$calificaciones=array(100,90,85,90,93,85),
      "Luis"=>$calificaciones=array(70,71,72,80,87,85),
      "Deysi"=>$calificaciones=array(85,80,90,95,100,87),
      "Edgar"=>$calificaciones=array(70,71,72,80,87,85),
      "Leo"=>$calificaciones=array(85,95,87,93,77,97),
      "David"=>$calificaciones=array(95,91,90,80,83,85),
      "Gonzalo"=>$calificaciones=array(90,97,82,86,93,95),
      "Manuel"=>$calificaciones=array(100,97,85,80,77,93),
      "Liza"=>$calificaciones=array(90,91,87,85,93,75),
      "Esteban"=>$calificaciones=array(80,83,92,88,92,88));
      //var_dump($calificacionesSemestrales);

      //prueba();
      echo "<h2>Promedio por alumnos</h2>";
      mostrarPromedios(promedioAlumno($calificacionesSemestrales));
      //mostrarVector(ordenarVector($calificacionesSemestrales));
      echo "<h2>Promedio grupal</h2>";
      promedioGrupal(promedioAlumno($calificacionesSemestrales));
      mejorPromedio(promedioAlumno($calificacionesSemestrales));
      mejoresPromedios(promedioAlumno($calificacionesSemestrales),promedioGrupal(promedioAlumno($calificacionesSemestrales)));
      listaAlumnos($calificacionesSemestrales);
      ?>

    </div>

  </div>
</body>
</html>

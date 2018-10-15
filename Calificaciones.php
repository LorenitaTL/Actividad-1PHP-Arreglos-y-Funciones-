<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Calificaciones PHP</title>
</head>
<body>
  <h1>Calificaciones</h1>
  <?php
  function mostrarVector($v)
  {
    foreach ($v as $dato) {
      echo "<br>".$dato;
    }
    echo "<br>";
  }
  function ordenarVector($v)
  {
    sort($v);
    mostrarVector($v);
  }

  function promedio($v){
    echo "<h2>SUMA</h2>";
    $suma=array_sum($v);
    $media = array_sum($v)/count($v);
    echo "<br>".$media;

  }
  function promedioAlumno($listaAumnos){
    echo "<h2>Promedio por alumnos</h2>";
    foreach ($listaAumnos as $alumno=>$notas) {
      echo $alumno.": ";
      foreach($notas as $nota){
        $media = array_sum($notas)/count($notas);
      }

      echo "<br>Promedio".$media;
      echo "<br />";
      echo "<br>";
    }

    echo "<br /><br />";
  }
  function promedioGrupal($listaAumnos){
    echo "<h2>Promedio grupal</h2>";
    $promGeneral[]=array();
    foreach ($listaAumnos as $alumno=>$notas) {
      foreach($notas as $nota){
        $media = array_sum($notas)/count($notas);
      }
      array_push($promGeneral,$media);
    }

    $suma2 =array_sum($promGeneral)/(count($promGeneral)-1);
    echo "<br>Promedio Grupal".$suma2;

    echo "<br /><br />";
    return $suma2;
  }

  function promedioMaterias(){
    echo "<h2>Promedio por materias</h2>";
  }
  function promedioSuperior($promGeneral){
    echo "<h2>Promedios mayores al promedio general</h2>";
    $promedio = promedioGrupal($promGeneral);

  }
  function listado($listaAumnos){
    echo "<h2>Listado de alumnos</h2>";

    foreach ($listaAumnos as $alumno=>$notas) {
      echo $alumno.": ";
      foreach($notas as $nota){
        echo "$nota | ";
        $media = array_sum($notas)/count($notas);
      }

      echo "<br>Promedio".$media;
      echo "<br />";
      echo "<br>";
    }

    echo "<br /><br />";

  }

  ?>

  <div style="border:1px solid red;">
    Datos del vector
    <?php
    $calificacionesSemestrales = array("Lore"=>$calificaciones=array(100,90,85,90,93,85),
    "Luis"=>$calificaciones=array(70,71,72,80,87,85),
    "Deysi"=>$calificaciones=array(85,80,90,95,100,87),
    "Edgar"=>$calificaciones=array(70,71,72,80,87,85),
    "Leo"=>$calificaciones=array(85,95,87,93,77,97),
    "David"=>$calificaciones=array(95,91,90,80,83,85),
    "Gonzalo"=>$calificaciones=array(90,97,82,86,93,95),
    "Manuel"=>$calificaciones=array(100,97,85,80,77,93),
    "Liza"=>$calificaciones=array(90,91,87,85,93,75),
    "Esteban"=>$calificaciones=array(80,83,92,88,92,88));
    var_dump($calificacionesSemestrales);

    $array_notas = array (
      "Alumno 1"=>array (1, 7, 8),
      "Alumno 2"=>array (3, 5, 7),
    );




    $v = array(89,67,90,30,20);
    promedio($v);
    promedioAlumno($calificacionesSemestrales);
    promedioGrupal($calificacionesSemestrales);
    promedioMaterias();
    promedioSuperior($calificacionesSemestrales);
    listado($calificacionesSemestrales);
    //mostrarVector($v);
    ordenarVector($v);
    ?>

  </div>
</body>
</html>

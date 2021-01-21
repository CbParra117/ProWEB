<?php
header('Content-Type: application/json');
$pdo=new PDO("mysql:dbname=proweb;host=127.0.0.1","root","");


$accion=(isset($_GET['accion']))?$_GET['accion']:'leer';
switch ($accion){
    case 'agregar':
        //instruccion de agregado
       $sentenciaSQL= $pdo->prepare("INSERT INTO
       eventos(title,descripcion,color,textcolor,start,end)
       VALUES (:title:descripcion,:color,:textcolor,:start,:end)");

       $respuesta=$sentenciaSQL->execute(array(
          "title" =>$_POST['title'],
          "descripcion" =>$_POST['descripcion'],
           "color" => $_POST['color'],
           "textcolor" => $_POST['textColor'],
           "start" => $_POST['start'],
           "end" => $_POST['end']
       ));
       echo json_encode($respuesta);
        break;
    case 'eliminar':
        //intruccion de eliminar
        echo "Instruccion elminar";
        break;

    case 'modificar':
        //instruccion de mordificar
        echo "Instruccion de Modificar";
        break;

    default:
//selecionar eventos del calendario

$sentenciaSQL= $pdo->prepare("SELECT * FROM eventos");
$sentenciaSQL->execute();

$resultado= $sentenciaSQL->fetchALL(PDO::FETCH_ASSOC);
echo json_encode($resultado);
break;
}
?>
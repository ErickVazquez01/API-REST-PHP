<?php

header('Content-Type: application/json');

require_once "../config/conexion.php";
require_once "../models/Usuarios.php";

$categoria = new Usuarios();

//$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET['op']) {
    case 'GetAll'://get
        //http://localhost/APIREST-MYSQL/controller/categoria.php?op=GetAll
        $datos = $categoria->get_users();
        echo json_encode($datos);
        break;

    case 'GetById'://post
        //http://localhost/APIREST-MYSQL/controller/categoria.php?op=GetById&id=3
        $datos = $categoria->get_user_x_id($_GET['id']);
        echo json_encode($datos);
        break;
    
    case 'Insert'://post
        //http://localhost/APIREST-MYSQL/controller/categoria.php?op=Insert&catnom=taza&catobs=observacion-taza
        $datos = $categoria->insert_user($_GET['nickname'],$_GET['nomUsuario'],$_GET['fechaNacimiento'],$_GET['rutaFotoUsuario'],$_GET['idCalle'],$_GET['num'],$_GET['datosExtraDireccion'],$_GET['codigoPostal'],$_GET['flagState'],$_GET['aMaterno'],$_GET['aPaterno']);
        echo json_encode("Insertado correctamente");
        break;
    
    case 'Update'://post
        //http://localhost/APIREST-MYSQL/controller/categoria.php?op=Update&catid=3&catnom=taza&catobs=observacion-taza
        $datos = $categoria->update_user($_GET['nickname'],$_GET['nomUsuario'],$_GET['fechaNacimiento'],$_GET['rutaFotoUsuario'],$_GET['idCalle'],$_GET['num'],$_GET['datosExtraDireccion'],$_GET['codigoPostal'],$_GET['flagState'],$_GET['aMaterno'],$_GET['aPaterno'],$_GET['idUsuario']);
        echo json_encode("Actualizado correctamente");
        break;
    
    case 'Delete'://post
        //http://localhost/APIREST-MYSQL/controller/categoria.php?op=Delete&catid=7
        $datos = $categoria->delete_user($_GET['catid']);
        echo json_encode("Eliminado correctamente");
        break;
    
    default:
        # code...
        break;
}



/*
switch ($_GET['op']) {
    case 'GetAll'://get
        //http://localhost/APIREST-MYSQL/controller/categoria.php?op=GetAll
        $datos = $categoria->get_categoria();
        echo json_encode($datos);
        break;

    case 'GetById'://post
        //http://localhost/APIREST-MYSQL/controller/categoria.php?op=GetById&id=3
        $datos = $categoria->get_categoria_x_id($_GET['id']);
        echo json_encode($datos);
        break;
    
    case 'Insert'://post
        //http://localhost/APIREST-MYSQL/controller/categoria.php?op=Insert&catnom=taza&catobs=observacion-taza
        $datos = $categoria->insert_categoria($_GET['catnom'],$_GET['catobs']);
        echo json_encode("Insertado correctamente");
        break;
    
    case 'Update'://post
        //http://localhost/APIREST-MYSQL/controller/categoria.php?op=Update&catid=3&catnom=taza&catobs=observacion-taza
        $datos = $categoria->update_categoria($_GET['catid'],$_GET['catnom'],$_GET['catobs']);
        echo json_encode("Actualizado correctamente");
        break;
    
    case 'Delete'://post
        //http://localhost/APIREST-MYSQL/controller/categoria.php?op=Delete&catid=7
        $datos = $categoria->delete_categoria($_GET['catid']);
        echo json_encode("Eliminado correctamente");
        break;
    
    default:
        # code...
        break;
}
http://localhost/APIREST-MYSQL/controller/categoria.php?op=GetAll
http://localhost/APIREST-MYSQL/controller/categoria.php?op=GetById&id=2
*/
?>


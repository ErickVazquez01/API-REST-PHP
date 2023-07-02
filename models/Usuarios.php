<?php

class Usuarios extends Conectar{

    public function get_users(){
        $conectar=parent::conexion();
        parent::set_name();

        $sql="SELECT * FROM Usuarios limit 10";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_user_x_id($cat_id){
        $conectar=parent::conexion();
        parent::set_name();

        $sql="SELECT * FROM Usuarios WHERE idUsuario=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$cat_id);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_user($nickname,$nomUsuario,$fechaNacimiento,$rutaFotoUsuario,$idCalle,$num,$datosExtraDireccion,$codigoPostal,$flagState,$aMaterno,$aPaterno){
        $conectar=parent::conexion();
        parent::set_name();

        $sql="INSERT INTO Usuarios(idUsuario,nickname,nomUsuario,fechaNacimiento,rutaFotoUsuario,idCalle,num,datosExtraDireccion,codigoPostal,flagState,aMaterno,aPaterno) VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?)";
        //$sql="INSERT INTO tm_categoria(cat_id,cat_nombre,cat_obs,est) VALUES (NULL,?,?,1)";
        $sql=$conectar->prepare($sql);
        
        $sql->bindValue(1,$nickname);
        $sql->bindValue(2,$nomUsuario);
        $sql->bindValue(3,$fechaNacimiento);
        $sql->bindValue(4,$rutaFotoUsuario);
        $sql->bindValue(5,$idCalle);
        $sql->bindValue(6,$num);
        $sql->bindValue(7,$datosExtraDireccion);
        $sql->bindValue(8,$codigoPostal);
        $sql->bindValue(9,$flagState);
        $sql->bindValue(10,$aMaterno);
        $sql->bindValue(11,$aPaterno);
        
        
        
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_user($idUsuario,$nickname,$nomUsuario,$fechaNacimiento,$rutaFotoUsuario,$idCalle,$num,$datosExtraDireccion,$codigoPostal,$flagState,$aMaterno,$aPaterno){
        $conectar=parent::conexion();
        parent::set_name();

        $sql="UPDATE Usuarios SET nickname=?, nomUsuario=?, fechaNacimiento=?,
        rutaFotoUsuario=?,
        idCalle=?, num=?, datosExtraDireccion=?, codigoPostal=?, flagState=?,
        aMaterno=?, aPaterno=? WHERE idUsuario=?";
        $sql=$conectar->prepare($sql);
        
        $sql->bindValue(1,$nickname);
        $sql->bindValue(2,$nomUsuario);
        $sql->bindValue(3,$fechaNacimiento);
        $sql->bindValue(4,$rutaFotoUsuario);
        $sql->bindValue(5,$idCalle);
        $sql->bindValue(6,$num);
        $sql->bindValue(7,$datosExtraDireccion);
        $sql->bindValue(8,$codigoPostal);
        $sql->bindValue(9,$flagState);
        $sql->bindValue(10,$aMaterno);
        $sql->bindValue(11,$aPaterno);
        $sql->bindValue(12,$idUsuario);
        
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_user($idUsuario){
        $conectar=parent::conexion();
        parent::set_name();

        $sql="UPDATE Usuarios SET flagState=0 WHERE idUsuario=?";
        $sql=$conectar->prepare($sql);
        
        $sql->bindValue(1,$idUsuario);
        
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

}

/*
public function get_users(){
        $conectar=parent::conexion();
        parent::set_name();

        $sql="SELECT * FROM tm_categoria WHERE est=1";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_user_x_id($cat_id){
        $conectar=parent::conexion();
        parent::set_name();

        $sql="SELECT * FROM tm_categoria WHERE est=1 AND cat_id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$cat_id);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_user($cat_nom,$cat_obs){
        $conectar=parent::conexion();
        parent::set_name();

        $sql="INSERT INTO tm_categoria(cat_id,cat_nombre,cat_obs,est) VALUES (NULL,?,?,1)";
        $sql=$conectar->prepare($sql);
        
        $sql->bindValue(1,$cat_nom);
        $sql->bindValue(2,$cat_obs);
        
        
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_user($cat_id,$cat_nom,$cat_obs){
        $conectar=parent::conexion();
        parent::set_name();

        $sql="UPDATE tm_categoria SET cat_nombre=?,cat_obs=? WHERE cat_id=?";
        $sql=$conectar->prepare($sql);
        
        $sql->bindValue(1,$cat_nom);
        $sql->bindValue(2,$cat_obs);
        $sql->bindValue(3,$cat_id);
        
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_user($cat_id){
        $conectar=parent::conexion();
        parent::set_name();

        $sql="UPDATE tm_categoria SET est=0 WHERE cat_id=?";
        $sql=$conectar->prepare($sql);
        
        $sql->bindValue(1,$cat_id);
        
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
*/
?>
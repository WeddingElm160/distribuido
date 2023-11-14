<?php
    include("sql.php");
    include("usuario.php");

    $tipo = isset($_REQUEST["tipo"])?$_REQUEST["tipo"]:"";

    if($tipo == 'del')
    {
        $id = isset($_POST["id"])?$_POST["id"]:'';
        $u = new usuario();
        $u->delete($id);        
    }
    if($tipo == 'upd')
    {
        $id = isset($_POST["id"])?$_POST["id"]:'';
        $nom = isset($_POST["nom"])?$_POST["nom"]:'';
        $pas = isset($_POST["pass"])?$_POST["pass"]:'';
        $img = isset($_POST["img"])?$_POST["img"]:'';
        $tipo = isset($_POST["type"])?$_POST["type"]:'';
        $u = new usuario();
        $u->update($id, $nom, $pas,$img, $tipo);
    }
    if($tipo == 'ins')
    {
        $nom = isset($_POST["nom"])?$_POST["nom"]:'';
        $pas = isset($_POST["pass"])?$_POST["pass"]:'';
        $img = isset($_POST["img"])?$_POST["img"]:'';
        $tipo = isset($_POST["type"])?$_POST["type"]:'';
        $u = new usuario();
        $u->insert( $nom, $pas,$img, $tipo);
    }

    if($tipo == "sel")
    {
        $u = new usuario();
        $u->selest();
    }


?>
<?php

function borrarReservasAnteriores() {

    include "conectar.php";
    #conexion, seleccion de tabla y verificacion de errores
    $conectar = mysqli_connect($cfg_servidor, $cfg_usuario, $cfg_password, $nombre_bd);

    if (!$conectar) {
        echo "<br>No ha podido realizarse la conexion <br>";
        print "<i>Error numero</i>" . mysqli_connect_errno() . "<i>equivalente a:</i>" . mysqli_connect_error();
        exit();
    }
    $sentenciaMYSQL = "SELECT * FROM reserva";

    $sentencia = mysqli_query($conectar, $sentenciaMYSQL);
    if ($sentencia) {
        if (mysqli_affected_rows($conectar) > 0) {
            $totalReservas = mysqli_affected_rows($conectar);
            while (@$registro = mysqli_fetch_row($sentencia)) {
                $fecharegistro=$registro[2];
                $fechaacttotime=strtotime(date('Y-m-d'));
                $fecharegistrototime=strtotime($registro[2]);
                if ($fecharegistrototime < $fechaacttotime) {
                    $sentenciaMYSQL = "DELETE FROM reserva WHERE fecha= '".$fecharegistro."'";
                    $sentencia2 = mysqli_query($conectar, $sentenciaMYSQL);   
                }
                else{
                    //echo("<script>alert('entro');</script>");
                }
            }
        }
    }
}
?>
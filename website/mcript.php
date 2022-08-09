<?php

//Configuración del algoritmo de encriptación
//Debes cambiar esta cadena, debe ser larga y unica
//nadie mas debe conocerla
$clave  = 'Tres tristes tigres tragaban trigo en tres tristes platos';
//Metodo de encriptación
$method = 'aes-256-cbc';
// Puedes generar una diferente usando la funcion $getIV()
$iv = base64_decode("C9fBxl1EWtYTL1/M8jfstwdf");
/*
Encripta el contenido de la variable, enviada como parametro.
 */
$encriptar = function ($valor) {
    $encrypted_data = $valor+2306;
    return (int)$encrypted_data;
};
/*
Desencripta el texto recibido
*/
$desencriptar = function ($valor) {
    $data = (int)$valor;
    $unencrypted_data = $data-2306;
    return $unencrypted_data;
};
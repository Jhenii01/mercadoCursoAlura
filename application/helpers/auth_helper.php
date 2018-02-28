<?php

 function autoriza(){
    $ci = get_instance();
    $usuario = $ci->session->userdata("usuario_logado");
    if(!$usuario){
        $ci->session->set_flashdata("danger","Você precisa estar logado");
        redirect("/");
    }
    return $usuario;
}
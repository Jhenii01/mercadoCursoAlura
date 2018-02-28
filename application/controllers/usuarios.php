<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Usuarios
 *
 * @author Jhenifer Santos
 */
class Usuarios extends CI_Controller {

    //put your code here

    public function novo() {

        $usuario = array(
            "nome" => $this->input->post("nome"),
            "email" => $this->input->post("email"),
            "senha" => md5($this->input->post("senha"))
        );


        //carrega o model
        $this->load->model("usuarios_model");

        //utiliza a função salvar do model usuario
        $this->usuarios_model->salva($usuario);

        //redireciona para a view
        $this->load->template("usuarios/novo");
    }

}

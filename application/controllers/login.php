<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function autenticar() {

        //acessa a tabela de usuario
        $this->load->model("usuarios_model");
        $email = $this->input->post("email");
        $senha = md5($this->input->post("senha"));
        $usuario = $this->usuarios_model->buscaPorEmailESenha($email, $senha);
        if ($usuario) {
            $this->session->set_userdata("usuario_logado", $usuario);
            $this->session->set_flashdata("success", "Logado com sucesso");
        } else {
            $this->session->set_flashdata("danger", "Usuário ou senha inválida");
        }

        //$this->load->view('login/autenticar',$dados);
        //redireciona para o index.php
        //para usar precisa carrega o url no autoload na opção helper
        redirect("/");
    }

    public function logout() {
        $this->session->unset_userdata("usuario_logado");
        //$this->load->view('login/logout');
        $this->session->set_flashdata("success" ,"Deslogado com sucesso");
        redirect("/");
    }

}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuarios_model
 *
 * @author Jhenifer Santos
 */
class Usuarios_model extends CI_Model{
    //put your code here
    
    public function busca($id){
        $this->db->where("id", $id);
        return $this->db->get("usuarios")->row_array();
    }


    public function salva($usuario) {
        $this->db->insert("usuarios", $usuario);
    }
    
    public function buscaPorEmailESenha($email, $senha) {
    $this->db->where("email", $email);
    $this->db->where("senha", $senha);
    $usuario = $this->db->get("usuarios")->row_array();
    return $usuario;
}
}

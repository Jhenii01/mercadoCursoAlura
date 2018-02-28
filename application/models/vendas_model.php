<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vendas_model
 *
 * @author Jhenifer Santos
 */
class Vendas_model extends CI_Model{
    //put your code here
    
    public function salva($venda){
        $this->db->insert("vendas",$venda);
        $this->db->update("produtos",
                array("vendido"=>1),
                array("id"=>$venda["produto_id"]));
    }
}

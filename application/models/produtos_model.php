<?php

/**
 * Description of Produtos_model
 *
 * @author Jhenifer Santos
 */
class Produtos_model extends CI_Model {
    
    public function buscaVendidos($usuario){
        $id = $usuario["id"];
        $this->db->select("produtos.*,vendas.data_de_entrega");
        $this->db->from("produtos");
        $this->db->join("vendas","vendas.produto_id = produtos.id");
        $this->db->where("vendido", true);
        $this->db->where("usuario_id", $id);
        return $this->db->get()->result_array();
                
    }

    public function buscaTodos() {
        //retorna um array com todos os produtos que estão no banco e nao foram vendidos
        return $this->db->get_where("produtos",array(
            "vendido"=>false
        ))->result_array();
    }

    public function salva($produto) {
        $this->db->insert("produtos", $produto);
    }

    public function busca($id){
        return $this->db->get_where("produtos",array(
            "id"=>$id
        ))->row_array();
    }
}

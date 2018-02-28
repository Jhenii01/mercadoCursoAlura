<?php


/**
 * Description of Produtos
 *
 * @author Jhenifer Santos
 */
class Produtos extends CI_Controller {

    //put your code here

    public function index() {

        //carrega o modelo
        $this->load->model("produtos_model");

        //busca todos os produtos
        $produtos = $this->produtos_model->buscaTodos();

        $dados = array("produtos" => $produtos);

        //carrega o helper 
        $this->load->helper(array("currency"));

        //redireciona para a página index.php$produtos = array();
        $this->load->template("produtos/index.php", $dados);
        
    }

    public function formulario() {
        autoriza();
        $this->load->template("produtos/formulario");
    }

    public function novo() {

        autoriza();
        
        $this->load->library('form_validation');

        //nome, label,regra
        $this->form_validation->set_rules("nome","nome","required");
        $this->form_validation->set_rules("descricao", "descricao", "trim|required|min_length[10]");
        $this->form_validation->set_rules("preco", "preco", "required");

        $this->form_validation->set_error_delimiters("<p class='alert alert-danger', </p>");

        //verifica se a validação funcionou
        $sucesso = $this->form_validation->run();

        if ($sucesso) {
            $usuarioLogado = $this->session->userdata("usuario_logado");
            $produto = array(
                "nome" => $this->input->post("nome"),
                "descricao" => $this->input->post("descricao"),
                "preco" => $this->input->post("preco"),
                "usuario_id" => $usuarioLogado["id"]
            );
            $this->load->model("produtos_model");
            $this->produtos_model->salva($produto);
            $this->session->set_flashdata("success", "Produto salvo com sucesso");
            redirect("/");
        } else {
            $this->load->template("produtos/formulario");
        }
    }

    public function mostra($id) {
        $this->load->model("produtos_model");
        $produto = $this->produtos_model->busca($id);
        $dados = array(
            "produto" => $produto
        );
        $this->load->helper("typography");
        $this->load->template("produtos/mostra", $dados);
    }

    public function nao_tenha_a_palavra_melhor($nome){
        $posicao = strpos($nome, "melhor");
        if ($posicao) {    
            $this->form_validation->set_message("nao_tenha_a_palavra_melhor","O campo '%s' não pode conter a palavra melhor");
            return FALSE;
        }
        else {
            return TRUE;
        }
    }
}

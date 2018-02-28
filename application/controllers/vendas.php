<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Vendas
 *
 * @author Jhenifer Santos
 */
class Vendas extends CI_Controller {

    //put your code here

    public function nova() {

        $usuario = autoriza();

        $this->load->model(array("vendas_model", "produtos_model", "usuarios_model"));
        $venda = array(
            "produto_id" => $this->input->post("produto_id"),
            "comprador_id" => $usuario["id"],
            "data_de_entrega" =>
            dataPtBrParaMysql($this->input->post("data_de_entrega"))
        );
        $this->vendas_model->salva($venda);

        $this->load->library("email");
        $config["protocol"] = "smtp";
        $config["smtp_host"] = "ssl://smtp.gmail.com";
        $config["smtp_user"] = "aluracurso@gmail.com";
        $config["smtp_pass"] = "tvr09wruj";
        $config["charset"] = "utf-8";
        $config["mailtype"] = "html";
        $config["newline"] = "\r\n";
        $config["smtp_port"] = '465';
        $this->email->initialize($config);

        $produto = $this->produtos_model->busca($venda["produto_id"]);
        $vendedor = $this->usuarios_model->busca($produto["usuario_id"]);

        $this->email->from("aluracurso@gmail.com", "Mercado");
        $this->email->to($vendedor["email"]);
        $this->email->subject("Seu produto {$produto['nome']} foi vendido!");
        $dados = array("produto" => $produto);
        $conteudo = $this->load->view("vendas/email.php", $dados, TRUE);
        $this->email->message($conteudo);
        $this->email->send();

        $this->session->set_flashdata("success", "Pedido de compra efetuado com sucesso");
        redirect("/");
    }

    public function index() {
        autoriza();
        $usuario = $this->session->userdata("usuario_logado");
        $this->load->model("produtos_model");
        $produtosVendidos = $this->produtos_model->buscaVendidos($usuario);
        $dados = array("produtosVendidos" => $produtosVendidos);
        $this->load->template("vendas/index", $dados);
    }

}

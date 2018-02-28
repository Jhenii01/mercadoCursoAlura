<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of My_Loader
 *
 * @author Jhenifer Santos
 */
class My_Loader extends CI_Loader{
    //put your code here
    
    public function template($nome,$dados=array()){
        $this->view("cabecalho.php");
        $this->view($nome,$dados);
        $this->view("rodape.php");
    }
}

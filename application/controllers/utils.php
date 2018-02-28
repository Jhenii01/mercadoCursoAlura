<?php



/**
 * Description of Utils
 *
 * @author Jhenifer Santos
 */
class Utils extends CI_Controller {
    //put your code here
    
    public function migrate(){
        $this->load->library("migration");
        $sucesso = $this->migration->current();
        
         if($sucesso) {
            echo 'migrado';
        } else {
            show_error($this->migration->error_string());
        }
    }
}

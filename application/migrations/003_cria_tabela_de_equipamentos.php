<?php

class Migration_Cria_tabela_de_equipamentos extends CI_migration {
    
    public function up(){
        $this->dbforge->add_field(array(
            'id' => array(
                'type'=>'INT',
                'auto_increment'=>true
            ),
            'nome' => array (
                'type' => 'VARCHAR'
            ),
            'descricao'=>array(
                'type'=>'TEXT'
            )
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('equipamentos');
    }
    
    public function down(){
        $this->dbforge->drop_table('equipamentos');
    }
}
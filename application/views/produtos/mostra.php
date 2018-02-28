
            <h1><?= html_escape($produto["nome"]) ?><br></h1>
            <p>Preço: <?= $produto["preco"] ?><br></p>
            <p><?= auto_typography(html_escape($produto["descricao"])) ?><br></p>

            <h2>Compre agora mesmo!</h2>
            <?php
            echo form_open("vendas/nova");

            echo form_hidden("produto_id",$produto["id"]);
            echo form_label("Data de Entrega","data_de_entrega");
            echo form_input(array(
                "name"=>"data_de_entrega",
                "id"=>"data_de_entrega",
                "class"=>"form-control",
                "maxlenght"=>"255",
                "value"=>""
            ));

            echo form_button(array(
                "content"=>"Comprar",
                "class"=>"btn btn-primary",
                "type"=>"submit"
            ));
            echo form_close();
            ?>
  

            
            <h1 style="text-align: center"> Produtos </h1>
            <table class="table table-striped">
                <thead class="thead-inverse">
                    <tr>
                        <td><strong>Nome</strong></td>
                        <td><strong>Descrição</strong></td>
                        <td><strong>Preço</strong></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $prod): ?>
                        <tr>
                            <td><?= anchor("produtos/{$prod["id"]}", html_escape($prod["nome"]))?></td>
                            <td><?= character_limiter(html_escape($prod["descricao"]),10)?></td>
                            <td><?= numeroEmReais($prod["preco"]) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= anchor('equipamentos/index', 'Equipamento', array("class" => "btn btn-primary")) ?>
            <?php if ($this->session->userdata("usuario_logado")) : ?>
                <?= anchor('produtos/formulario', 'Novo Produto', array("class" => "btn btn-success")) ?>
                <?= anchor('login/logout', 'Logout', array("class" => "btn btn-primary")) ?>
            <?php else: ?>
                <h1 style="text-align: center">Login</h1>
                <?php
                echo form_open("login/autenticar");

                echo form_label("Email", "email");
                echo form_input(array(
                    "name" => "email",
                    "id" => "email",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));

                echo form_label("Senha", "senha");
                echo form_password(array(
                    "name" => "senha",
                    "id" => "senha",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));

                echo form_button(array(
                    "class" => "btn btn-primary",
                    "content" => "Login",
                    "type" => "submit"
                ));


                echo form_close();
                ?>

                <h1 style="text-align: center">Cadastro</h1>
                <?php
                //usuarios->controller
                //novo->função
                echo form_open("usuarios/novo");

                echo form_label("Nome", "nome");
                echo form_input(array(
                    "name" => "nome",
                    "id" => "nome",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));

                echo form_label("Email", "email");
                echo form_input(array(
                    "name" => "email",
                    "id" => "email",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));

                echo form_label("Senha", "senha");
                echo form_password(array(
                    "name" => "senha",
                    "id" => "senha",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));

                echo form_button(array(
                    "class" => "btn btn-primary",
                    "content" => "Cadastrar",
                    "type" => "submit"
                ));
                echo form_close();
                ?>
            <?php endif ?>
 
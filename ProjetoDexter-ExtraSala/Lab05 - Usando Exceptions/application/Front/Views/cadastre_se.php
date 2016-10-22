<!-- INÍCIO - BREADCRUMB -->
<div id="breadcrumb" itemprop="breadcrumb">
    <div class="conteudo_padrao">
        <a href="?q=index.html" title="Home">Home</a> > <a href="?q=cadastre_se.html" title="Cadastre-se">Cadastre-se</a>
    </div>
</div>
<!-- FIM - BREADCRUMB -->

<div id="corpo" class="conteudo_padrao">
    <h1 class="titulo_site">Cadastre-se</h1>
    
    <form method="post" action="" id="cadastro" onsubmit="return validaCadastro();">
        <fieldset>
            <div class="normal_2">
                <label for="nome"><small>*</small>Nome:</label>
                <input type="text" name="nome" id="nome" class="input_campo" />
            </div>
            <div class="normal_2">
                <label class="label_radio"><small>*</small>
                    <input type="radio" class="input_radio" name="cpf_cnpj" id="input_cpf" checked="checked" />CPF
                </label>
                <label class="label_radio">
                    <input type="radio" class="input_radio" name="cpf_cnpj" id="input_cnpj" />CPNJ:
                </label>
                <input type="text" name="cpf" id="cpf" class="input_campo" />
                <input type="text" name="cnpj" id="cnpj" class="input_campo" />
            </div>
            <div class="normal_1">
                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" id="telefone" class="input_campo" />
            </div>
            <div class="normal_1">
                <label for="celular"><small>*</small>Celular:</label>
                <input type="text" name="celular" id="celular" class="input_campo" />
            </div>
            <div class="normal_2">
                <label for="email"><small>*</small>E-mail:</label>
                <input type="text" name="email" id="email" class="input_campo" />
            </div>
            <div class="normal_1">
                <label for="cep"><small>*</small>CEP:</label>
                <input type="text" name="cep" id="cep" class="input_campo" />
            </div>
            <div class="normal_1">
                <label for="estado"><small>*</small>Estado:</label>
                <select name="estado" id="estado" class="input_campo">
                    <option value="">Selecione um Estado</option>
                    <?php
                    foreach ($this->estados as $estado) {
                    ?>
                        <option value="<?= $estado ?>"><?= $estado ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="normal_2">
                <label for="bairro"><small>*</small>Bairro:</label>
                <input type="text" name="bairro" id="bairro" class="input_campo" />
            </div>
            <div class="normal_4">
                <label for="endereco"><small>*</small>Endereço:</label>
                <input type="text" name="endereco" id="endereco" class="input_campo" />
            </div>
            <div class="normal_2">
                <label for="cidade"><small>*</small>Cidade:</label>
                <input type="text" name="cidade" id="cidade" class="input_campo" />
            </div>
            <div>
                <input type="submit" value="Cadastrar" class="input_submit" />
                <span id="mensagem_submit"><?= $this->msg ?></span>
            </div>
        </fieldset>
    </form>
</div>





<script src="assets/plugins/placeholder/jquery-placeholder.js"></script>
<script src="assets/plugins/maskedinput/jquery-maskedinput.js"></script>
<script src="assets/js/script.js"></script>
<script>
    $(document).ready(function () {
        if($("#input_cpf").is(":checked")){
            $("#cpf").css("display", "block");
            $("#cnpj").css("display", "none");
        }
        else{
            $("#cpf").css("display", "none");
            $("#cnpj").css("display", "block");
        }

        $("#input_cpf").click(function(){
            $("#cpf").css("display", "block");
            $("#cnpj").css("display", "none");
        });
        $("#input_cnpj").click(function(){
            $("#cnpj").css("display", "block");
            $("#cpf").css("display", "none");
        });

        $('#cpf').mask("999.999.999-99");
        $('#cnpj').mask("99.999.999/9999-99");
        $('#telefone').mask("(99) 9999-9999");

        $('#celular').focusout(function(){
            var phone, element;
            element = $(this);
            element.unmask();
            phone = element.val().replace(/\D/g, '');

            if(phone.length > 10) {
                element.mask("(99) 99999-999?9");
            } else {
                element.mask("(99) 9999-9999?9");
            }
        }).trigger('focusout'); 

        $('#cep').mask("99999-999");
    });
</script>

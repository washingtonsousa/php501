<!-- INÍCIO - BREADCRUMB -->
<div id="breadcrumb" itemprop="breadcrumb">
    <div class="conteudo_padrao">
        <a href="?q=index.html" title="Home">Home</a> > <a href="?q=contato.html" title="Contato">Contato</a>
    </div>
</div>
<!-- FIM - BREADCRUMB -->

<div id="corpo" class="conteudo_padrao">
    <h1 class="titulo_site">Contato</h1>
    
    <form method="post" action="" id="contato" onsubmit="return validaContato();">
        <fieldset>
            <div>
                <label for="nome"><small>*</small>Nome:</label>
                <input type="text" name="nome" id="nome" class="input_campo" placeholder="Digite o seu nome" />
            </div>
            <div>
                <label for="email"><small>*</small>E-mail:</label>
                <input type="text" name="email" id="email" class="input_campo" placeholder="Digite o seu e-mail" />
            </div>
            <div>
                <label for="assunto"><small>*</small>Assunto:</label>
                <input type="text" name="assunto" id="assunto" class="input_campo" placeholder="Digite o assunto" />
            </div>
            <div>
                <label for="mensagem"><small>*</small>Mensagem:</label>
                <textarea name="mensagem" id="mensagem" class="input_campo" placeholder="Digite a sua mensagem"></textarea>
                <div>Você ainda pode digitar <span id="counter"></span> caracteres.</div>
            </div>
            <div>
            <span id="mensagem_submit"><?= $this->msg ?></span>
                <input type="submit" value="Enviar" class="input_submit" />
            </div>
        </fieldset>
    </form>

    <!-- INÍCIO - INFORMAÇÕES PARA CONTATO E ENDEREÇO -->
    <div class="infos_end">
        <div>
            <h3>Endereço</h3>
            <p>Rua Vergueiro, 3057 - Vila Mariana</p>
            <p>São Paulo - SP</p>
            <p>04101-300, Brasil</p>
        </div>
        <div>
            <h3>Contatos</h3>
            <p>Telefone: (+5511) 3052-0705</p>
            <p><a href="mailto:sistema@dextercourier.com.br" title="sistema@dextercourier.com.br">sistema@dextercourier.com.br</a></p>
        </div>
    </div>
    <!-- FIM - INFORMAÇÕES PARA CONTATO E ENDEREÇO -->

    <!-- INÍCIO - MAPA -->
    <div id="mapa_contato">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14625.882598301936!2d-46.633515!3d-23.587448!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x55801ca572430f78!2s4linux+Software+e+Com%C3%A9rcio+de+Programas!5e0!3m2!1spt-BR!2sus!4v1422863121713" width="500" height="300" frameborder="0" style="border:0"></iframe>
    </div>
    <!-- FIM - MAPA -->
    <br class="clear" />
</div>


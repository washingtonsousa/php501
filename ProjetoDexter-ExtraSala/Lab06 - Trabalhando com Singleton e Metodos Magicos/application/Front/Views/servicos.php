<!-- INÍCIO - BREADCRUMB -->
<div id="breadcrumb" itemprop="breadcrumb">
    <div class="conteudo_padrao">
        <a href="?q=index.html" title="Home">Home</a> > 
        <a href="?q=servicos.html" title="Serviços">Serviços</a> > 
        <a href="?q=servicos.html" title="Nossos Serviços">Nossos Serviços</a>
    </div>
</div>
<!-- FIM - BREADCRUMB -->

<div id="corpo" class="conteudo_padrao">
    <h1 class="titulo_site">Nossos Serviços</h1>
    <h2 class="subtitulo_site">Não importa o tamanho da sua empresa, a Dexter tem a solução certa para você.</h2>

    <ul id="lista_servicos">
        <?php
        foreach ($this->servicos as $servico) {
        ?>
        <li>
        <img src="<?= $servico->getImagem() ?>" alt="" />
        <p><?= $servico->getTitulo() ?></p>
        <span><?= $servico->getDescricao() ?></span>
        </li>
        <?php
        }
        ?>
    </ul>
</div>


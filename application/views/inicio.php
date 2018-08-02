<?php $this->load->view('commons/cabecalho'); ?>

<div class="container">
    <div class="page-header-normal">
        <h1>Selecione uma opção</h1>
    </div>

    <div class="col-md-12">
        <a href="<?=base_url('abrirProdutos ')?>">
            <input value="Produtos" type="button" class="btn btn-padrao-grande"></input>
        </a>
    </div>

    <div class="col-md-12">
        <a href="<?=base_url('abrirProdutoCategoria')?>">
            <input value="Categorias de Produtos" type="button" class="btn btn-padrao-grande"></input>
        </a>
    </div>
</div>

<?php $this->load->view('commons/rodape'); ?>

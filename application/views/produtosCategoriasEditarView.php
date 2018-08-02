<?php $this->load->view('commons/cabecalho'); ?>

<div class="container">
	<div class="page-header-normal">
		<h1>Edição de Categoria de Produtos</h1>
	</div>

	<?php if ($this->session->flashdata('error') == TRUE): ?>
		<div class="alert alert-warning"><?php echo $this->session->flashdata('error'); ?></div>
	<?php endif; ?>
	<?php if ($this->session->flashdata('success') == TRUE): ?>
		<div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
	<?php endif; ?>

	<form method="post" action="<?=base_url('atualizarProdutoCategoria')?>" enctype="multipart/form-data">
		<div class="col-md-12">
			<div class="form-group">
				<label>Nome:</label>
				<input type="text" name="nome" class="form-control" value="<?=$produtos_categorias['nome']?>" required/>
			</div>
		</div>

		<div class="col-md-12">
			<input type="hidden" name="id" value="<?=$produtos_categorias['id']?>"/>
			<input type="submit" value="Salvar" class="btn btn-padrao" />
			<input onclick="history.go(-1);" value="Cancelar" class="btn btn-cancelar" />
		</div>
	</form>

</div>

<?php $this->load->view('commons/rodape'); ?>

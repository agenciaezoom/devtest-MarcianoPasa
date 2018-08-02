<?php $this->load->view('commons/cabecalho'); ?>

<div class="container">
	<div class="page-header-normal">
		<h1>Edição de Produto</h1>
	</div>

	<?php if ($this->session->flashdata('error') == TRUE): ?>
		<div class="alert alert-warning"><?php echo $this->session->flashdata('error'); ?></div>
	<?php endif; ?>
	<?php if ($this->session->flashdata('success') == TRUE): ?>
		<div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
	<?php endif; ?>

	<form method="post" action="<?=base_url('atualizarProduto')?>" enctype="multipart/form-data">

		<div class="col-md-6">
			<div class="form-group">
				<label>Nome:</label>
				<input type="text" name="nome" class="form-control" value="<?=$produto['nome']?>" required/>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label>Categoria do Produto:</label>
				<select id="categoria_id" name="categoria_id" class="form-control">
					<option value=""> Selecione </option>
					<?php foreach ($categorias as $row): ?>
						<?php if ($produto['categoria_id'] == $row['id']) { ?>
							<option selected value="<?php print $row['id']; ?>"> <?php print $row['nome']; ?> </option>
						<?php } else { ?>
							<option value="<?php print $row['id']; ?>"> <?php print $row['nome']; ?> </option>
						<?php } ?>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="col-md-12">
			<input type="hidden" name="id" value="<?=$produto['id']?>"/>
			<input type="submit" value="Salvar" class="btn btn-padrao" />

			<input onclick="history.go(-1);" value="Cancelar" class="btn btn-cancelar" />
		</div>
	</form>

</div>

<?php $this->load->view('commons/rodape'); ?>

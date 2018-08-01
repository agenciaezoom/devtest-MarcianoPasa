<?php $this->load->view('commons/cabecalho'); ?>

<div class="container">
	<div class="page-header">
		<h1>Produtos</h1>
	</div>

	<?php if ($this->session->flashdata('error') == TRUE): ?>
		<div class="alert alert-warning"><?php echo $this->session->flashdata('error'); ?></div>
	<?php endif; ?>
	<?php if ($this->session->flashdata('success') == TRUE): ?>
		<div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
	<?php endif; ?>

	<form method="post" action="<?=base_url('salvarProduto')?>" enctype="multipart/form-data">
		<div class="col-md-12">
			<div class="form-group">
				<label>Nome:</label>
				<input type="text" name="nome" class="form-control" value="<?=set_value('nome')?>" required/>
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group">
				<label>Categoria do Produto:</label>
				<select id="categoria_id" name="categoria_id" class="form-control" style="width:500px;">
					<option value=""> Selecione </option>
					<?php foreach ($categorias as $row): ?>
						<option value="<?php print $row['id']; ?>"> <?php print $row['nome']; ?> </option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="col-md-12">
			<input type="submit" value="Salvar" class="btn btn-success" />
		</div>
	</form>

	<div class="col-md-12">
		<table class="table table-striped table-hover table-bordered">
			<label>Produtos</label>
			<thead>
				<tr>
					<th>Nome</th>
					<th>Categoria</th>
					<th>Operações</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($produtos == FALSE): ?>
					<tr><td colspan="2">Nenhum produto encontrado</td></tr>
				<?php else: ?>
					<?php foreach ($produtos as $row): ?>
						<tr>
							<td><?= $row['nome'] ?></td>
							<td><?= $row['categoria_nome'] ?></td>
							<td class="text-center">
								<a href="<?= $row['editar_url'] ?>">[Editar]</a>
								<a href="<?= $row['excluir_url'] ?>">[Excluir]</a>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>

</div>

<?php $this->load->view('commons/rodape'); ?>

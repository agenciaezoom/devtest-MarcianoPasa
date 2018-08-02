<?php $this->load->view('commons/cabecalho'); ?>

<div class="container">
	<div class="page-header-normal">
		<h1>Produtos</h1>
	</div>

	<?php if ($this->session->flashdata('error') == TRUE): ?>
		<div class="alert alert-warning"><?php echo $this->session->flashdata('error'); ?></div>
	<?php endif; ?>
	<?php if ($this->session->flashdata('success') == TRUE): ?>
		<div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
	<?php endif; ?>

	<form method="post" action="<?=base_url('salvarProduto')?>" enctype="multipart/form-data">
		<div class="col-md-6">
			<div class="form-group">
				<label>Nome do novo produto:</label>
				<input type="text" name="nome" class="form-control" value="<?=set_value('nome')?>" required/>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label>Categoria do novo produto:</label>
				<select id="categoria_id" name="categoria_id" class="form-control">
					<option value=""> Selecione </option>
					<?php foreach ($categorias as $row): ?>
						<option value="<?php print $row['id']; ?>"> <?php print $row['nome']; ?> </option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="col-md-12">
			<input type="submit" value="Salvar" class="btn btn-padrao" />
		</div>
	</form>

	<div class="col-md-12">
		<table class="table table-striped table-hover table-bordered">
			<label>Produtos</label>
			<thead>
				<tr>
					<th style="width: 35%">Nome</th>
					<th style="width: 35%">Categoria</th>
					<th style="width: 30%">Operações</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($produtos == FALSE): ?>
					<tr><td colspan="2">Nenhum produto encontrado</td></tr>
				<?php else: ?>
					<?php foreach ($produtos as $row): ?>
						<tr>
							<td style="width: 35%"><?= $row['nome'] ?></td>
							<td style="width: 35%"><?= $row['categoria_nome'] ?></td>
							<td class="text-center" style="width: 30%">
								<a href="<?= $row['editar_url'] ?>">
									<input value="Editar" type="button" class="btn-editar"></input>
								</a>
								<a href="<?= $row['excluir_url'] ?>" onclick="return confirm('Deseja excluir este registro?');">
									<input value="Excluir" type="button" class="btn-excluir"></input>
								</a>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>

</div>

<?php $this->load->view('commons/rodape'); ?>
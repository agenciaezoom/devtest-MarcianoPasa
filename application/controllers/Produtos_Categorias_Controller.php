<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos_Categorias_Controller extends CI_Controller {

	public function Index()
	{
		$produtosCategorias = $this->produtos_categorias_model->GetAll('nome');
		$dados['produtos_categorias'] = $this->produtos_categorias_model->Formatar($produtosCategorias);
		$this->load->view('produtosCategoriasView', $dados);
	}

	public function SalvarProdutoCategoria() {
		$produtosCategorias = $this->produtos_categorias_model->GetAll('nome');
		$dados['produtos_categorias'] = $this->produtos_categorias_model->Formatar($produtosCategorias);
		$validacao = self::Validar();

		if ($validacao) {
			$produtoCategoria = $this->input->post();
			$status = $this->produtos_categorias_model->Inserir($produtoCategoria);

			if (!$status) {
				$this->session->set_flashdata('error', 'Não foi possível inserir o produto.');
			}
			else {
				$this->session->set_flashdata('success', 'Produto inserido com sucesso.');
			}
		}
		else {
			$this->session->set_flashdata('error', validation_errors('<p>','</p>'));
		}

		redirect(base_url('abrirProdutoCategoria'));
	}

	public function EditarProdutoCategoria() {
		$id = $this->uri->segment(2);

		if (is_null($id)) {
			redirect(base_url('abrirProdutoCategoria'));
		}

		$dados['produtos_categorias'] = $this->produtos_categorias_model->GetById($id);

		$this->load->view('produtosCategoriasEditarView', $dados);
	}

	public function AtualizarProdutoCategoria() {

		$validacao = self::Validar('update');

		if ($validacao) {
			$produtoCategoria = $this->input->post();
			$status = $this->produtos_categorias_model->Atualizar($produtoCategoria['id'], $produtoCategoria);

			if (!$status) {
				$dados['produtos_categorias'] = $this->produtos_categorias_model->GetById($produtoCategoria['id']);
				$this->session->set_flashdata('error', 'Não foi possível atualizar o produto.');
			}
			else {
				$this->session->set_flashdata('success', 'Produto atualizado com sucesso.');
			}
		}
		else {
			$this->session->set_flashdata('error', validation_errors());
		}

		redirect(base_url('abrirProdutoCategoria'));
	}

	public function ExcluirProdutoCategoria() {
		$id = $this->uri->segment(2);

		if (is_null($id)) {
			redirect(base_url('abrirProdutoCategoria'));
		}

		$categoiraUsada = $this->produtos_model->GetByField('categoria_id', $id);

		if (($categoiraUsada != null) && (count($categoiraUsada) > 0)) {
			$this->session->set_flashdata(
				'error',
				'<p>Não é possível excluir esta categoria pois ela esta sendo utilizada em outra parte do sistema.</p>'
			);

			$this->Index();
		}
		else {
			$status = $this->produtos_categorias_model->Excluir($id);

			if ($status) {
				$this->session->set_flashdata('success', '<p>Categoria excluída com sucesso.</p>');
			}
			else {
				$this->session->set_flashdata('error', '<p>Não foi possível excluir a categoria.</p>');
			}

			$this->Index();
		}
	}

	private function Validar($operacao = 'insert') {
		switch($operacao) {
			case 'insert':
				$rules['nome'] = array('trim', 'required', 'min_length[3]');
				break;
			case 'update':
				$rules['nome'] = array('trim', 'required', 'min_length[3]');
				break;
			default:
				$rules['nome'] = array('trim', 'required', 'min_length[3]');
				break;
		}

		$this->form_validation->set_rules('nome', 'Nome', $rules['nome']);

		return $this->form_validation->run();
	}
}

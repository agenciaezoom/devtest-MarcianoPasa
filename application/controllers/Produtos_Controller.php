<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos_Controller extends CI_Controller {

	public function Index()
	{
		$produtos = $this->produtos_model->GetAll('nome');
		$categorias = $this->produtos_categorias_model->GetAll();

		$dados['produtos'] = $this->produtos_model->Formatar($produtos);
		$dados['categorias'] = $categorias;

		$this->load->view('produtosView', $dados);
	}

	public function SalvarProduto() {
		$produtos = $this->produtos_model->GetAll('nome');
		$dados['produtos'] = $this->produtos_model->Formatar($produtos);
		$validacao = self::Validar();

		if ($validacao) {
			$produto = $this->input->post();

			if ($produto['categoria_id'] == ''){
				$produto['categoria_id'] = null;
			}

			$status = $this->produtos_model->Inserir($produto);

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

		redirect(base_url('abrirProdutos'));
	}

	public function EditarProduto() {
		$id = $this->uri->segment(2);

		if (is_null($id)) {
			redirect(base_url('abrirProdutos'));
		}

		$dados['produto'] = $this->produtos_model->GetById($id);
		$dados['categorias'] = $this->produtos_categorias_model->GetAll();

		$this->load->view('produtosEditarView', $dados);
	}

	public function AtualizarProduto(){

		$validacao = self::Validar('update');

		if ($validacao) {
			$produto = $this->input->post();

			if ($produto['categoria_id'] == '') {
				$produto['categoria_id'] = null;
			}

			$status = $this->produtos_model->Atualizar($produto['id'], $produto);

			if (!$status) {
				$dados['produto'] = $this->produtos_model->GetById($produto['id']);
				$this->session->set_flashdata('error', 'Não foi possível atualizar o produto.');
			}
			else {
				$this->session->set_flashdata('success', 'Produto atualizado com sucesso.');
			}
		}
		else {
			$this->session->set_flashdata('error', validation_errors());
		}

		redirect(base_url('abrirProdutos'));
	}

	public function ExcluirProduto(){
		$id = $this->uri->segment(2);

		if (is_null($id)) {
			redirect(base_url('abrirProdutos'));
		}

		$status = $this->produtos_model->Excluir($id);

		if ($status) {
			$this->session->set_flashdata('success', '<p>Produto excluído com sucesso.</p>');
		}
		else {
			$this->session->set_flashdata('error', '<p>Não foi possível excluir o produto.</p>');
		}

		redirect(base_url('abrirProdutos'));
	}

	private function Validar($operacao = 'insert'){
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

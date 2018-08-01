<?php

class Produtos_Model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->table = 'produtos';
    }

    function Formatar($produtos) {
        if ($produtos) {
            for ($i = 0; $i < count($produtos); $i++) {
                $produtos[$i]['categoria_nome'] =
                    $this->produtos_categorias_model->GetById($produtos[$i]['categoria_id'])['nome'];

                $produtos[$i]['editar_url'] = base_url('editarProduto')."/".$produtos[$i]['id'];
                $produtos[$i]['excluir_url'] = base_url('excluirProduto')."/".$produtos[$i]['id'];
            }

            return $produtos;
        }
        else {
            return false;
        }
    }
}

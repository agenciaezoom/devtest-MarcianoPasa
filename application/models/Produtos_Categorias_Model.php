<?php

class Produtos_Categorias_Model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->table = 'produtos_categorias';
    }

    function Formatar($produtos_categorias) {
        if ($produtos_categorias) {
            for ($i = 0; $i < count($produtos_categorias); $i++) {
                $produtos_categorias[$i]['editar_url'] =
                    base_url('editarProdutoCategoria')."/".$produtos_categorias[$i]['id'];

                $produtos_categorias[$i]['excluir_url'] =
                    base_url('excluirProdutoCategoria')."/".$produtos_categorias[$i]['id'];
            }

            return $produtos_categorias;
        }
        else {
            return false;
        }
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Inicio_Controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['abrirProdutos'] = "Produtos_Controller/Index";
$route['salvarProduto'] = "Produtos_Controller/SalvarProduto";
$route['editarProduto/(:num)'] = "Produtos_Controller/EditarProduto/$1";
$route['atualizarProduto'] = "Produtos_Controller/AtualizarProduto";
$route['excluirProduto/(:num)'] = "Produtos_Controller/ExcluirProduto/$1";

$route['abrirProdutoCategoria'] = "Produtos_Categorias_Controller/Index";
$route['salvarProdutoCategoria'] = "Produtos_Categorias_Controller/SalvarProdutoCategoria";
$route['editarProdutoCategoria/(:num)'] = "Produtos_Categorias_Controller/EditarProdutoCategoria/$1";
$route['atualizarProdutoCategoria'] = "Produtos_Categorias_Controller/AtualizarProdutoCategoria";
$route['excluirProdutoCategoria/(:num)'] = "Produtos_Categorias_Controller/ExcluirProdutoCategoria/$1";

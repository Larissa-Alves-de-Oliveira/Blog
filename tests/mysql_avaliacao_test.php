<?php
require_once '../includes/funcoes.php';
require_once '../core/conexao_mysql.php';
require_once '../core/sql.php';
require_once '../core/mysql.php';

insert_teste(10, 'kk', 1, 1);
buscar_teste();
update_teste(1, 6, 'uu');
buscar_teste();
delete_teste(2);
buscar_teste();

//Teste incerção banco de dados
function insert_teste($nota,$comentario ,$usuario_id, $post_id) : void
{
    $dados = ['nota' => $nota, 'comentario' => $comentario ,'usuario_id' => $usuario_id, 
    'post_id' => $post_id];
    insere('avaliacao', $dados);
}

//Teste select banco de dados
function buscar_teste() : void
{
    $avaliacoes = buscar('avaliacao', ['id', 'nota','comentario', 'usuario_id', 'post_id', 
    'data_criacao' ], [], '');
    print_r($avaliacoes);
}

//Teste update banco de dados
function update_teste($id ,$nota, $comentario) : void
{
    $dados = ['nota' => $nota, 'comentario' => $comentario];
    $criterio = [['id', '=', $id]];
    atualiza('avaliacao',$dados,$criterio);
}

function delete_teste($usuario_id) : void
{
    $criterio = [['usuario_id', '=', $usuario_id]];
    deleta('avaliacao', $criterio);
}
?>
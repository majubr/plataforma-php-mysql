<?php

include_once "conexao.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
//$id = "";
if(!empty($id)){
    $query_herpeto = "DELETE FROM herpetofauna WHERE id=:id";
    $result_herpeto = $conn->prepare($query_herpeto);
    $result_herpeto->bindParam(":id", $id, PDO::PARAM_INT);

    if($result_herpeto->execute()){
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Registro apagado com sucesso!</div>"];
    }else{
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Registro não apagado com sucesso!</div>"];
    }
}else{
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Registro não apagado com sucesso!</div>"];
}

echo json_encode($retorna);
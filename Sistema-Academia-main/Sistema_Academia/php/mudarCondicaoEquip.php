<?php
require_once 'connectionSQL.php';
require_once 'classQuerySQL.php';

$conn = (new connectionDB())->conectaDB();
$id = (new ConsultaDB($conn))->getIdByURL();
$condicao = (new ConsultaDB($conn))->getCondicaoEquipByURL();

$sql = "UPDATE tb_equipamentos
        SET Condicao_equip = $condicao
        WHERE ID_equipamento_pk = $id";

$result = $conn->query($sql);
if ($result){
    echo "Equipamento atualizado!";
} else {
    echo "Equipamento não atualizado!";
}

header('Location: ../pages/maquinas.php');
$conn->close();
exit();
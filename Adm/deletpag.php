<?php
    if($_GET){
        $id = $_GET['cod'];
                
        include '../conexao.php';

        try {

            $stmt = $conexao->prepare("DELETE FROM tbl_paginas WHERE Pag_id = ?;");
            $stmt->bindParam(1, $id); 
            
            if($stmt->execute()){
                if($stmt->rowCount()>0){
                    header('location: editpag.php');
                }else{
                    echo "Erro: Não foi possível executar a declaração sql";
                }
            }else{
                echo "Erro na execução do cadastro!";
            }            
        } catch (PDOException $erro) {
            echo "Erro na conexão:" . $erro->getMessage();
        }
    }
?>

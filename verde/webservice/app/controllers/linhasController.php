<?php
    class Linhas extends Controller{
        
            public function Index_action(){
                $linhas['mensagem'] = "NAO IMPLEMENTADO";
                header('Content-type: application/json');                
                echo json_encode($linhas, JSON_PRETTY_PRINT);
            }
            
            public function listar_todos(){                
                $oLinha = new LinhasModel();
                $linhas = $oLinha->getAll("", NULL, NULL, 'linha');
                header('Content-type: application/json');
                echo json_encode($linhas,  JSON_PRETTY_PRINT);
            }
           
           
    }
?>

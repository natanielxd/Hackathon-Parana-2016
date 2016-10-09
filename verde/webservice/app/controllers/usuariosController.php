<?php
    class Usuarios extends Controller{
        
            public function Index_action(){
                $usuarios['mensagem'] = "NAO IMPLEMENTADO";
                header('Content-type: application/json');                
                echo json_encode($usuarios, JSON_PRETTY_PRINT);
            }

            public function buscar(){                
                $oUsuario = new UsuariosModel();
                $usuarios = $oUsuario->getAll("situacao = 'A'", NULL, NULL, 'login');
                header('Content-type: application/json');
                echo json_encode($usuarios, JSON_PRETTY_PRINT);
            }
            
            public function listar_todos(){                
                $oUsuario = new UsuariosModel();
                $usuarios = $oUsuario->getAll("situacao = 'A'", NULL, NULL, 'login');
                header('Content-type: application/json');
                echo json_encode($usuarios,  JSON_PRETTY_PRINT);
            }
            
            
            public function salvar(){                
                $id = $this->getParam('id');
                if(!$id){
                    $id = null;
                }
                $oUsuario = new UsuariosModel();
                if($id){
                    $ret = $oUsuario->salvar(@$_POST['login'], @$_POST['senha'], $id);
                }else{
                    $ret = $oUsuario->salvar(@$_POST['login'], @$_POST['senha'], NULL);
                }                

                header('Content-type: application/json');
                echo json_encode($ret,  JSON_PRETTY_PRINT);

            }
            
            
           
    }
?>

<?php
    class Linha_geos extends Controller{
        
            public function Index_action(){
                $linha_geo['mensagem'] = "NAO IMPLEMENTADO";
                header('Content-type: application/json');                
                echo json_encode($linha_geo, JSON_PRETTY_PRINT);
            }


            public function listar_todos(){                
                $oLinhaGeo = new Linha_geosModel();
                $linha_geo = $oLinhaGeo->getAll("", NULL, NULL, 'cadastro');
                header('Content-type: application/json');
                echo json_encode($linha_geo,  JSON_PRETTY_PRINT);
            }
            
            public function listar_todos_nome(){                
                $oLinhaGeo = new Linha_geosModel();
                $linha_geo = $oLinhaGeo->query("SELECT g.idlinha_geo as id, l.linha, g.latitude, g.longitude, g.informacao 
                                            FROM linha_geo g
                                            INNER JOIN linha l ON l.idlinha = g.idlinha");
                $info_geo = $oLinhaGeo->fetchAll($linha_geo);
                header('Content-type: application/json');
                echo json_encode($info_geo,  JSON_PRETTY_PRINT);
            }
            
            
            public function salvar(){                
                $id = $this->getParam('id');
                if(!$id){
                    $id = null;
                }
                $oLinhaGeo = new Linha_geosModel();
                if($id){
                    $ret = $oLinhaGeo->salvar(@$_POST['linha'], @$_POST['latitude'], @$_POST['longitude'], $_POST['texto_situacao'], $id);
                }else{
                    $ret = $oLinhaGeo->salvar(@$_POST['linha'], @$_POST['latitude'], @$_POST['longitude'], $_POST['texto_situacao'], NULL);
                }                

                header('Content-type: application/json');
                echo json_encode($ret,  JSON_PRETTY_PRINT);

            }
            
            
           
    }
?>

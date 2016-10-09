<?php
    class Linha_geosModel extends Model{
        
            public $_tabela = "linha_geo";       
            
            public function get( $id ){
                return $this->read("idlinha_geo='{$id}'", "1");
            }
            
            public function getAll($where = null, $limit = null, $offset = null, $orderby = null){
                return $this->readAll($where, $limit, $offset, $orderby);
            }
			
            
            
            public function salvar($linha, $latitude, $longitude, $texto_situacao, $id = null){ 
                
                if(count(@$retorno) == 0){
                    $dados['idlinha'] = $linha;
                    $dados['latitude'] = $latitude;
                    $dados['longitude'] = $longitude;
                    $dados['informacao'] = $texto_situacao;
                    
                    if($id == null){
                        $this->insert($dados);
                        $this->_status = TRUE;
                        $retorno['mensagem'] = "Localização cadastrado com sucesso";
                        $retorno['status'] = TRUE;
                    }
                    else{
                        $this->update($dados, "idusuario = '{$id}'");
                        $this->_status = true;
                        $retorno['mensagem'] = "Localização alterado com sucesso";
                        $retorno['status'] = TRUE;
                    }
                    return $retorno;
                    
                }
                else{
                    return $retorno;
                }
            }
            
            
           
        }

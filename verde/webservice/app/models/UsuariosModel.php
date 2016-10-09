<?php
    class UsuariosModel extends Model{
        
            public $_tabela = "usuario";       
            
            public function get( $id ){
                return $this->read("idusuario='{$id}'", "1");
            }
            
            public function getAll($where = null, $limit = null, $offset = null, $orderby = null){
                return $this->readAll($where, $limit, $offset, $orderby);
            }
			
            
            
            public function salvar($login, $senha, $id = null){                
                           
                
                if(strlen($senha) < 6){
                    $retorno['mensagem'] = "A senha deve ter 6 digitos.";
                    $retorno['status'] = FALSE;
                    $this->_status = FALSE;
                } 
                
                if(strlen($login) == 0){
                    $retorno['mensagem'] = "Informe o login";
                    $retorno['status'] = FALSE;
                    $this->_status = FALSE;
                } 
                
                if($id == null){
                    $ret = $this->read("login='{$login}'");
                    if(count($ret) > 0 && $ret != FALSE){
                        $retorno['mensagem'] = "Login já existe.";
                        $retorno['status'] = FALSE;
                        $this->_status = FALSE;
                    }
                }               
                
                if(count(@$retorno) == 0){
                    $dados['login'] = $login;
                    $dados['senha'] = md5($senha);
                    if($id == null){
                        $this->insert($dados);
                        $this->_status = TRUE;
                        $retorno['mensagem'] = "Usuario cadastrado com sucesso";
                        $retorno['status'] = TRUE;
                    }
                    else{
                        $this->update($dados, "idusuario = '{$id}'");
                        $this->_status = true;
                        $retorno['mensagem'] = "Usuario alterado com sucesso";
                        $retorno['status'] = TRUE;
                    }
                    return $retorno;
                    
                }
                else{
                    return $retorno;
                }
            }
            
            
           
        }

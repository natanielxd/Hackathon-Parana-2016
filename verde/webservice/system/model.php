<?php
    class Model{
        protected $_db;
        public $_tabela;
        public $_lastId;
        public function  __construct(){
            $this->_db = new PDO('mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            $_lastId = null;
        }

        public function insert( Array $dados ){
            
            array_walk_recursive($dados, function(&$item, $key) {
                $item = addslashes($item);
            });
            
            $campos = implode(", ", array_keys($dados));
            $valores = "'".implode("','", array_values($dados))."'";
            $sqlt = " INSERT INTO `{$this->_tabela}` ({$campos}) VALUES ({$valores}) ";
            
                  
            
            $tmp = " INSERT INTO `{$this->_tabela}` ({$campos}) VALUES ({$valores}) ";
            $q = $this->_db->query(" INSERT INTO `{$this->_tabela}` ({$campos}) VALUES ({$valores}) ");
            if(DEBUG == 1){
                $this->log($tmp);
            }  
            $this->_lastId = $this->_db->lastInsertId();
            return $q;
        }

        public function read( $where = null, $limit = null, $offset = null, $orderby = null ){
            $where = ($where != null ? "WHERE {$where}" : "");
            $limit = ($limit != null ? "LIMIT {$limit}" : "");
            $offset = ($offset != null ? "OFFSET {$offset}" : "");
            $orderby = ($orderby != null ? "ORDER BY {$orderby}" : ""); 
            $tmp = " SELECT * FROM `{$this->_tabela}` {$where} {$orderby} {$limit} {$offset} ";
            
//             $sql_log_acao = "INSERT INTO  log_acao (idusuario, tipo, navegador, ip, tabela, campo, dado) "
//                          . "  VALUES (".$_SESSION['idusuario'].", 'Consulta', '".$_SERVER['HTTP_USER_AGENT']."', '".$_SERVER['REMOTE_ADDR']."', "
//                     . "'".$this->_tabela."', '".str_replace("'", "", $where)."', '-')";
//            
//            $retLog = $this->_db->query($sql_log_acao);
            
            $q = $this->_db->query(" SELECT * FROM `{$this->_tabela}` {$where} {$orderby} {$limit} {$offset} ");
            if(DEBUG == 1){
                $this->log($tmp);
            }  
            $q->setFetchMode(PDO::FETCH_ASSOC);            
            return $q->fetch();
        }
        
        public function readAll( $where = null, $limit = null, $offset = null, $orderby = null ){
            $where = ($where != null ? "WHERE {$where}" : "");
            $limit = ($limit != null ? "LIMIT {$limit}" : "");
            $offset = ($offset != null ? "OFFSET {$offset}" : "");
            $orderby = ($orderby != null ? "ORDER BY {$orderby}" : "");
            $tmp = " SELECT * FROM `{$this->_tabela}` {$where} {$orderby} {$limit} {$offset} ";
            $q = $this->_db->query(" SELECT * FROM `{$this->_tabela}` {$where} {$orderby} {$limit} {$offset} ");
            if(DEBUG == 1){
                $this->log($tmp);
            }            
            $q->setFetchMode(PDO::FETCH_ASSOC);
            return $q->fetchAll();
        }

        public function update( Array $dados, $where ){
            array_walk_recursive($dados, function(&$item, $key) {
                $item = addslashes($item);
            });
            
            
            foreach ( $dados as $ind => $val ){
                $campos[] = "{$ind} = '{$val}'";
            }
            $campos = implode(", ", $campos);
            
            $tmp = " UPDATE `{$this->_tabela}` SET {$campos} WHERE {$where} ";
            $q = $this->_db->query(" UPDATE `{$this->_tabela}` SET {$campos} WHERE {$where} ");
            
            $sql_log_acao = "INSERT INTO  log_acao (idusuario, tipo, navegador, ip, tabela, campo, dado) "
                          . "  VALUES (".$_SESSION['idusuario'].", 'Editar', '".$_SERVER['HTTP_USER_AGENT']."', '".$_SERVER['REMOTE_ADDR']."', '".$this->_tabela."', '".str_replace("'", "", $campos)."', '".str_replace("'", "", $where)."' )";
            
            $retLog = $this->_db->query($sql_log_acao);
            if(DEBUG == 1){
                $this->log($tmp);
            }   
            return $q;
        }

        public function delete( $where ){
            $tmp = " DELETE FROM `{$this->_tabela}` WHERE {$where} ";
            $q = $this->_db->query(" DELETE FROM `{$this->_tabela}` WHERE {$where} ");
            
            $sql_log_acao = "INSERT INTO  log_acao (idusuario, tipo, navegador, ip, tabela, campo, dado) "
                          . "  VALUES (".$_SESSION['idusuario'].", 'Excluir', '".$_SERVER['HTTP_USER_AGENT']."', '".$_SERVER['REMOTE_ADDR']."', '".$this->_tabela."', '', '".$where."') ";
            
            $retLog = $this->_db->query($sql_log_acao);
            
            if(DEBUG == 1){
                $this->log($tmp);
            }   
            return $q;
        }
        
        public function query( $sql ){
            if(DEBUG == 1){
                $this->log($sql);
            } 
            return $this->_db->query($sql);
        }
        
        public function fetchAll($res){
            $res->setFetchMode(PDO::FETCH_ASSOC);
            return $res->fetchAll();
        }
        
        protected function antiSqlInjection($sql){
            $sql = mysql_real_escape_string($sql);
            return $sql;
        }
        
        public function readCount( $where = null, $limit = null, $offset = null, $orderby = null ){
            $where = ($where != null ? "WHERE {$where}" : "");
            $limit = ($limit != null ? "LIMIT {$limit}" : "");
            $offset = ($offset != null ? "OFFSET {$offset}" : "");
            $orderby = ($orderby != null ? "ORDER BY {$orderby}" : "");
            $tmp = " SELECT count(*) as total FROM `{$this->_tabela}` {$where} {$orderby} {$limit} {$offset} ";
            $q = $this->_db->query(" SELECT count(*) as total FROM `{$this->_tabela}` {$where} {$orderby} {$limit} {$offset} ");
            if(DEBUG == 1){
                $this->log($tmp);
            }   
            $q->setFetchMode(PDO::FETCH_ASSOC);            
            return $q->fetch();
        }
        
        private function log($sql){
            //$path = $_SESSION['server1'];
            $name = "log/log_sql.txt";
            $arq = @fopen($name, "a+");
            if($arq != false){
                @$usuario = $_SESSION['idusuario'];
                if(!$usuario)
                    $usuario="SYSTEM";
                $linha = "Data:".date("d/m/Y h:i:s").";IP:".$_SERVER['REMOTE_ADDR'].";idusuario:".$usuario.";SQL:\n\n".$sql.";\n\n";
                fwrite($arq, $linha);
                fclose($arq);
            }            
        }
        
         

    }
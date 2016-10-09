<?php
    class LinhasModel extends Model{
        
            public $_tabela = "linha";       
            
            public function get( $id ){
                return $this->read("idlinha='{$id}'", "1");
            }
            
            public function getAll($where = null, $limit = null, $offset = null, $orderby = null){
                return $this->readAll($where, $limit, $offset, $orderby);
            }
            
            
            

            
            
           
        }

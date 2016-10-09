<?php
    class Index extends Controller{
        public function Index_action(){
           
            $datas = null;            
            $datas['error_login'] = "";
            $this->view('index', $datas);
        }
    }
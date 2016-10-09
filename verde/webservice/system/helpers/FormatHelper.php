<?php

    Class FormatHelper{
        
        public function dataHoraBdForDataHora($dataBd){
            $dados = explode(" ", $dataBd);
            $dataT = explode("-",$dados[0]); //2013-mm-dd
            return $dataT[2]."/".$dataT[1]."/".$dataT[0]. " às ".$dados[1];
        }
        
        public function dataBrForBd($databr){
            $dados = explode("/", $databr);
            return $dados[2]."-".$dados[1]."-".$dados[0];
        }
        
        public function dataBdForBr($dataBD){
            $dados = explode("-", $dataBD);
            return $dados[2]."/".$dados[1]."/".$dados[0];
        }
        
        public function decimalByMoney($decimal){
            $decimal = (double)$decimal;
            return number_format($decimal,2,",",".");
        }
        
        public function moneyByDecimal($money){
            $money = str_replace(".", "", $money);
            $money = str_replace(",", ".", $money);
            return $money;
        }
        
        public function arredondar_dois_decimal($valor) { 
            $float_arredondar=round($valor * 100) / 100; 
            return $float_arredondar; 
        } 
        
       
        
        public function clearString($a){
            $a = str_replace(".", "", $a);
            $a = str_replace("/", "", $a);
            $a = str_replace(",", "", $a);
            $a = str_replace("-", "", $a);
            $a = str_replace(")", "", $a);
            $a = str_replace("(", "", $a);
            $a = str_replace(" ", "", $a);
            return $a;
        }
        
        public function formatCPFCNPJ($string)
            {
                    $output = preg_replace("[' '-./ t]", '', $string);
                    $size = (strlen($output) -2);
                    if ($size != 9 && $size != 12) return false;
                    $mask = ($size == 9) 
                            ? '###.###.###-##' 
                            : '##.###.###/####-##'; 
                    $index = -1;
                    for ($i=0; $i < strlen($mask); $i++):
                            if ($mask[$i]=='#') $mask[$i] = $output[++$index];
                    endfor;
                    return $mask;
            }
            
            
           
            /*
             * String: "3438420000", Máscara: "(##)####-####", Resultado: "(34)3842-0000";
             * String: "12032010", Máscara: "##/##/##", Resultado: "12/03/2010";
             * String: "2236", Máscara: "##:##", Resultado: "22:36".
             */
            public function mascara_string($mascara,$string)
            {
               $string = str_replace(" ","",$string);
               if(strlen($string)==0 || $string == 0){
                   return "";
               }
               for($i=0;$i<strlen($string);$i++)
               {
                  $mascara[strpos($mascara,"#")] = $string[$i];
               }
               return $mascara;
            }
            
            public function MesBR($int){
                switch ($int){
                    case 1:
                        return "Janeiro";
                    break;
                    case 2:
                        return "Fevereiro";
                    break;
                    case 3:
                        return "Março";
                    break;
                    case 4:
                        return "Abril";
                    break;
                    case 5:
                        return "Maio";
                    break;
                    case 6:
                        return "Junho";
                    break;
                    case 7:
                        return "Julho";
                    break;
                    case 8:
                        return "Agosto";
                    break;
                    case 9:
                        return "Setembro";
                    break;
                    case 10:
                        return "Outubro";
                    break;
                    case 11:
                        return "Novembro";
                    break;
                    case 12:
                        return "Dezembro";
                    break;
                }
                
                
            }
        
    }

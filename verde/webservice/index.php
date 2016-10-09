<?php
    session_start();
    
    $_SESSION['server1'] = "http://localhost/cryogene";    
    //carega config.ini
    
    $configIni = parse_ini_file("config.ini", true);
    $ambiente = $configIni['run'];   
    define( 'DEBUG',$configIni[$ambiente]['debug'] );
    define( 'DB_HOST',$configIni[$ambiente]['db_host'] );
    define( 'DB_USER',$configIni[$ambiente]['db_user'] );
    define( 'DB_PASS',$configIni[$ambiente]['db_pass'] );
    define( 'DB_NAME',$configIni[$ambiente]['db_name'] );
    define( 'DB_PORT',$configIni[$ambiente]['db_port'] );
    
    define( 'CONTROLLERS','app/controllers/' );
    define( 'VIEWS','app/views/' );
    define( 'MODELS','app/models/' );
    define( 'HELPERS','system/helpers/' );

    require_once('system/system.php');
    require_once('system/controller.php');
    require_once('system/model.php');	
    
    function __autoload( $file ){
        if ( file_exists(MODELS . $file . '.php') )
            require_once( MODELS . $file . '.php' );
        else if ( file_exists(HELPERS . $file . '.php') )
            require_once( HELPERS . $file . '.php' );
        else
            {           
                die("Model ou Helper nao encontrado.");			
            }
    }

    $start = new System;
    $start->run();
<?php
    function getconnecion(){

        $server = "localhost";
        $username = "root";
        $password = '';
        $db_name = "database_projeto";
        $port = 3306;

        $conn = mysqli_connect($server, $username, $password, $db_name, $port);
        
        if(mysqli_connect_errno()){
            echo  "Erro ao conectar-se com o banco de dados: " . mysqli_connect_error();
            exit();
        }
        
        return $conn;
    
    }

    
?>
<?php

    require_once "conectar_db.php";

//savlar no banco de dados "pacientes" uma nova linha:

    function save($nome, $idade, $peso, $altura){
        
        $conn = getconnecion();

        if(!mysqli_query($conn, "INSERT INTO pacientes (nome, idade, peso, altura) VALUES ('$nome', '$idade', '$peso', '$altura' )")){
            echo "Erro ao inserir dados: " . mysqli_error($conn);
            mysqli_close($conn);
            return;
        }

        mysqli_close($conn);
    }

//savlar no banco de dados "usuarios" uma nova linha:

    function save_user($email, $senha){

        $conn = getconnecion();

        if(!mysqli_query($conn, "INSERT INTO usuarios (email, senha) VALUES ('$email', '$senha')")){
            echo "Erro ao cadastrar novo usuário: " . mysqli_error($conn);
            mysqli_close($conn);
            return;
        }

        mysqli_close($conn);
    }

//mapear as linhas da tabela "pacientes" em arrays:

    function findAllPacientes(){
        $conn = getconnecion();

        $pacientes = [];

        $result = mysqli_query($conn, "SELECT * FROM pacientes");

        while($row = mysqli_fetch_row($result)){
            $pacientes[] = [
                "id" => (int) $row[0],
                "nome" => $row[1],
                "idade" => (int) $row[2],
                "peso" => (float) $row[3],
                "altura" => (float) $row[4]
            ];
        }

        mysqli_free_result($result);
        mysqli_close($conn);

        return $pacientes;
    }

//mapear usuarios em array:

    function FindAllUsuarios(){
        $conn = getconnecion();

        $usuarios = [];

        $result = mysqli_query($conn, "SELECT * FROM usuarios");

        while($row = mysqli_fetch_row($result)){
            $usuarios[] = [
                "id" => (int) $row[0],
                "email" => $row[1],
                "senha" => $row[2]
            ];
        }

        mysqli_free_result($result);
        mysqli_close($conn);
    }
?>
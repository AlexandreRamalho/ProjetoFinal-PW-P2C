<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>CADASTRO DE PACIENTES</title>

        <style>
            #corpo{
                display: flex;
                flex-direction: row;
                justify-content: center;

                width: 100%;
                margin-top: 140px;
            }

            #corpo form{
                background-color: #ADD8E6;
                padding: 25px;

                width: 500px;
                display: flex;
                flex-direction: column;
                justify-content: center;

                border-radius: 6px;
                border-color: black;
                border-style: solid;
                border-width: 2px;
                border-spacing: 0px;

                box-shadow: 10px 10px 5px 3px #66666666;
            }
            #corpo form input{
                border-radius: 6px;
                border-color: black;
                padding: 5px;
            }

            #corpo form #enviar{
                width: 250px;
                margin-top: 20px;
                margin-left: 125px;

                cursor: pointer;
            }
            
            #corpo form .erro{
                font-size: 13px;
                text-align: right;
                margin: 0px;

                color: red;
            }
        </style>

    </head>

    <body>
        
        <?php include "header.php" ?>

        <div id="corpo">
            <?php
                    
                $MensagemDeErroNome = " ";
                $MensagemDeErroIdade = " ";
                $MensagemDeErroPeso = " ";
                $MensagemDeErroAltura = " ";

                if($_SERVER["REQUEST_METHOD"] == 'POST'){
                    if(empty(trim($_POST["nome"]))){
                        $MensagemDeErroNome = "Digite um nome";
                    }
                    elseif(empty(trim($_POST["idade"]))){
                        $MensagemDeErroIdade = "Digite uma idade";
                    }
                    elseif(!filter_var($_POST["idade"], FILTER_VALIDATE_INT)){
                        $MensagemDeErroIdade = "Digite uma idade valida";
                    }
                    elseif(empty(trim($_POST["peso"]))){
                        $MensagemDeErroPeso = "Digite um peso";
                    }
                    elseif(!filter_var($_POST["peso"], FILTER_VALIDATE_FLOAT)){
                        $MensagemDeErroPeso = "Digite um peso valido";
                    }
                    elseif(empty(trim($_POST["altura"]))){
                        $MensagemDeErroAltura = "Digite uma altura";
                    }
                    elseif(!filter_var($_POST["altura"], FILTER_VALIDATE_FLOAT)){
                        $MensagemDeErroAltura = "Digete uma altura valida";
                    }
                    else{
                        require_once "../funcoes_db/funcoes_db.php";

                        $nome = $_POST["nome"];
                        $idade = $_POST["idade"];
                        $peso = $_POST["peso"];
                        $altura = $_POST["altura"];

                        save($nome, $idade, $peso, $altura);

                        header('location: tabela.php');
                    }
                }

            ?>
            <form action="cadastropaciente.php" method="POST">

                <label for="nome">Nome:</label>
                <input type="text" name="nome" placeholder="Ex: Lucas Silva" id="nome" maxlength="50"><br>
                <p class="erro"> <?=$MensagemDeErroNome?></p>    

                <label for="idade">Idade:</label>
                <input type="int" name="idade" placeholder="Ex: 25" id="idade"><br>
                <p class="erro"> <?=$MensagemDeErroIdade?></p>

                <label for="peso">Peso:</label>
                <input type="float" name="peso" placeholder="Ex: 70.0" id="idade"><br>
                <p class="erro"> <?=$MensagemDeErroPeso?></p>

                <label for="altura">Altura:</label>
                <input type="float" name="altura" placeholder="Ex: 1.75" id="altura"><br>
                <p class="erro"> <?=$MensagemDeErroAltura?></p>

                <input type="submit" value="Cadastrar" id="enviar">

            </form>
        </div>
        <?php
        include "fotter.html";
        
        if(!isset($_COOKIE['usuario'])){
                echo '<script type="text/javascript" src="requerirlogin.js"></script>';
            }
        
        ?>
    </body>
</html>
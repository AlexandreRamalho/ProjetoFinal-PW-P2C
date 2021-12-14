<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>PACIENTES CADASTRADOS</title>

        <style>
            body{
                background-color: white;
                font-family: 'Mukta', sans-serif;
                margin: 0px;
            }

            div{
                display: flex;
                flex-direction: row;
                justify-content: center;
            }

            div table{
                width: 960px;
                margin-top: 140px;
                margin-bottom: 40px;

                text-align: center;
                background-color: #ADD8E6;
                box-shadow: 10px 10px 5px 3px #66666666;

                border-radius: 6px;
                border-color: black;
                border-style: solid;
                border-width: 2px;
                border-spacing: 0px;
            }

            div table th, td{
                padding: 10px;
                
                border-top: solid;
                border-color: black;
                border-width: 2px;
                border-spacing: 0px;
            }

            #cadastrar{
                display: flex;
                flex-direction: row;
                justify-content: center;

                margin-bottom: 80px;
            }

            #cadastrar a{
                color: black;
                font-size: 22px;
            }
        </style>
    </head>

    <body>

        <?php
            require_once "../funcoes_db/funcoes_db.php";
            include "header.php";
        ?>

        <div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome do Paciente</th>
                    <th>Idade</th>
                    <th>Peso</th>
                    <th>Altura</th>
                    <th>IMC</th>
                </tr>
                <?php 
                    $pacientes = findAllPacientes();

                    foreach($pacientes as $dados){
                        echo "<tr>" .
                                    "<th>" . $dados["id"] . "</th>" . 
                                    "<td>" . $dados["nome"] . "</td>" .
                                    "<td>" . $dados["idade"] . "</td>" . 
                                    "<td>" . number_format($dados["peso"], 1) . "</td>" . 
                                    "<td>" . number_format($dados["altura"], 2) . "</td>" . 
                                    "<td>" . number_format($dados["peso"]/($dados["altura"]*$dados["altura"]), 1) . "</td>" . 
                            "</tr>";
                    }
                ?>

            </table>

        </div>

        <p id="cadastrar"><a href="./cadastropaciente.php">cadastrar novo paciente</a></p>
        
        <?php include "fotter.html" ?>
    </body>
</html>
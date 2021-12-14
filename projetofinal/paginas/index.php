<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>SAÚDE.com</title>

        <style>
            #corpo{
                margin-top: 140px;

                display: flex;
                flex-direction: row;
                justify-content: center;

                width: 100%;    
            }
            #corpo #box{
                background-color: #ADD8E6;
                padding: 15px;

                width: 500px;

                background-color: #ADD8E6;
                padding: 35px;
                padding-left: 25px;

               
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

            #corpo h3{
                text-align: center;
            }

            #corpo form{
                width: 100%;
                padding: 0px;
            }

            #corpo form input{
                width: 100%;

                border-radius: 6px;
                border-color: black;
                padding: 5px;

                margin-bottom: 20px
            }

            #corpo form #login{
                width: 250px;
                margin-left: 125px;
                margin-top: 20px;

                cursor: pointer;
            }

            #corpo p {
                margin-top: 35px;
                text-align: center;
            }

            #corpo p a{
                color: black;
            }
        </style>
    </head>

    <body>
   
        <?php include "header.php" ?>

        <div id="corpo">
            <div id="box">
                <?php
                    if(!isset($_COOKIE['usuario'])){
                        echo '
                        <form action="logar.php" method="POST">
                            <label for="usuario">Usuário:</label>
                            <input type="email" name="email" id="email" placeholder="Email"><br>

                            <label for="senha">Senha:</label>
                            <input type="password" name="senha" id="senha" placeholder="Senha"><br>

                            <input type="submit" value="Login" id="login"><br>
                        </form>

                        <p id="cadstrar" id="enviar"><a href="./cadastrousuario.php">Cadastrar-se</a></p>';
                    }

                    else{
                        echo "<h3>Olá " . $_COOKIE["usuario"] . ", seja bem vindo(a)!";
                    }
                ?>

                <!--<h3><?=var_dump($_COOKIE)?></h3>-->
            </div>
        </div>

        <?php include "fotter.html"; ?>
    </body>
</html>
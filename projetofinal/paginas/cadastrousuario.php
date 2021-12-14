<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>CADASTRO DE USÁRIO</title>

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
        
        <?php 
            include "header.php"; 
            
            $MensagemDeErroEmail = "";
            $MensagemDeErroSenha = "";
            $MensagemDeErroSenhaDnv = "";
            
            if($_SERVER["REQUEST_METHOD"] == 'POST'){
                if(empty(trim($_POST["email"]))){
                    $MensagemDeErroEmail = "Digite um email";
                }
                elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                    $MensagemDeErroEmail = "Digite um email válido";
                }
                elseif(empty(trim($_POST["senha"]))){
                    $MensagemDeErroSenha = "Digite uma senha";
                }
                elseif(empty(trim($_POST["senha_dnv"]))){
                    $MensagemDeErroSenhaDnv = "Reescreva a senha";
                }
                elseif($_POST["senha"] != $_POST["senha_dnv"]){
                    $MensagemDeErroSenhaDnv = "As senhas devem estar iguais";
                }
                else{
                    $email = $_POST['email'];
                    $senha = $_POST['senha'];

                    require_once "../funcoes_db/funcoes_db.php";
                    require_once "../funcoes_db/login.php";

                    save_user($email, $senha);
                    
                    login();
                }
            }
        ?>

        <div id="corpo">
            <form action="./cadastrousuario.php" method="POST">
                <label for="email">Email: </label>
                <input type="email" name="email" id="email"><br>
                <p class="erro"><?php echo $MensagemDeErroEmail; ?></p>

                <label for="senha">Senha: </label>
                <input type="password" name="senha" id="senha"><br>
                <p class="erro"><?php echo $MensagemDeErroSenha; ?></p>

                <label for="senha_dnv">Reescrever senha: </label>
                <input type="password" name="senha_dnv" id="senha_dnv"><br>
                <p class="erro"><?php echo $MensagemDeErroSenhaDnv; ?></p>

                <input type="submit" value="Cadastrar" id="enviar">
            </form>
        </div>

        <?php include "fotter.html"; ?>
    </body>

</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    body{
        background-color: white;
        font-family: 'Mukta', sans-serif;
        margin: 0px;
        padding: 0px;
    }

    header{
        display: flex;
        flex-direction: row;
        justify-content: center;

        margin: 0px;
        width: 100%;
        position: fixed;
        top:0px;

        background-color: #ADD8E6;

        border-bottom: solid;
        border-width: 4px;
    }
    header h1{
        margin-right: 600px;
        font-size: 30px;
    }

    header ul{
        display: flex;
    }

    header ul li{
        padding: 10px;
        list-style-type: none;
        text-shadow: 3px 3px 1px 0px;
    }

    header ul li a{
        color: black;
    }
</style>
</head>
<body>
    <header>
        <div><ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./tabela.php">Tabela de Pacientes</a></li>
            <li>
                <?php
                    
                    if(!isset($_COOKIE['status']) && !isset($_COOKIE['usuario'])){
                        echo '<a href="./index.php">Login</a>';
                    }
                    elseif($_COOKIE["status"] == "logado"){
                        echo "Usuário:" . $_COOKIE["usuario"] . " " . '<a href="logout.php">Logout</a>';
                    }
                ?>
            </li>
        </ul>

        </div>
    </header>
</body>
</html>
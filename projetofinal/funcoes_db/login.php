<?php
    require_once "funcoes_db.php";

        function login(){
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            session_start();

            $conn = getconnecion();

            $usuario = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '$email' && senha = '$senha' LIMIT 1");
            $resultado = mysqli_fetch_assoc($usuario);

            if(isset($resultado)){
                $_SESSION['usuario'] = $resultado['email'];
                
                setcookie("usuario", $_SESSION['usuario'], (time() + 3600));
                setcookie("status", "logado", (time() + 3600));

                header('location: index.php');
            }
            else{
                echo "
                    <script>
                        alert('Usuário não encontrado.')

                        window.location.href = './index.php';
                    </script>";

                session_destroy();
            }
        }

        //login()
?>
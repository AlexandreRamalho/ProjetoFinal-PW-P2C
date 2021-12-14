<?php

    setcookie("status", "NaoLogado", (time() - 3600));
    setcookie("usuario", "Null", (time() - 3600));

    echo "
        <script>
            alert('Você se desconectou da sua conta.');

            window.location.href = './index.php';
        </script>
    "

?>
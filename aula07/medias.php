<?php require_once "validacao.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula07 - Boletim</title>
</head>
<body>
    <a href="index.php">Voltar à home</a><br>

    <?php
        $campos_com_erro;

        if (form_post_nao_enviado()) {
            echo "Requisito inválido. Acesse essa página pelo formulário.";
            die;
        }

        // Nenhum campo pode estar em branco
        if (count($campos_com_erro = campos_estao_em_branco()) != 0) {
            echo "Existem campos vazios no formulário enviado.";

            echo "<pre>";
            print_r($campos_com_erro);
            echo "</pre>";
            die;
        }

        // Todos os campos têm que ser numericos
        if (count($campos_com_erro = campos_nao_numericos()) != 0) {
            echo "Existem campos não numéricos entre as notas enviadas.";

            echo "<pre>";
            foreach ($campos_com_erro as $erro) print($erro);
            echo "</pre>";
            
            die;
        }
    ?>

</body>
</html>
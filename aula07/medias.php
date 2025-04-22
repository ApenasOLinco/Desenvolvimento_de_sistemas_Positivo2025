<?php require_once "validacao.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula07 - Boletim</title>
    <body></body>
</head>

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
        foreach ($campos_com_erro as $erro)
            echo $erro;
        echo "</pre>";

        die;
    }

    // Os campos de nota tem que ter um intervalo válido
    if(count($campos_com_erro = notas_fora_de_intervalo()) != 0) {
        
    }

    // Todas as entradas são válidas.
    $aluno = $_POST["Aluno"];
    $notas = get_notas();
    $media_bimestral = get_media($notas);
    [$menor_materia , $maior_materia] = get_maior_e_menor_notas($notas);
    $conceito_final = "";
    

    $media_bimestral = $soma_notas / count($notas);

    // Apresentar na tela:
    
    // Nome do aluno
    echo "Aluno: $aluno";

    // Array associativo contendo todas as notas informadas (mostrar índice e valores)
    echo "<pre>";
    print_r($notas);
    echo "</pre>";

    // Média bimestral
    echo "Média bimestral: $media_bimestral<br>";

    // Menor nota do bimestre
    echo "Menor nota: $menor_materia => " . $notas[$menor_materia] . "<br>";
    // Maior nota do bimestre
    echo "Maior nota: $maior_materia => " . $notas[$maior_materia] . "<br>";

    // Conceito final do aluno
    if ($media_bimestral <= 4) {
        $conceito_final = "E";
    } else if ($media_bimestral < 6) {
        $conceito_final = "D";
    } else if ($media_bimestral < 8) {
        $conceito_final = "C";
    } else if ($media_bimestral < 9) {
        $conceito_final = "B";
    } else if ($media_bimestral <= 10) {
        $conceito_final = "A";
    }

    echo "Conceito final: $conceito_final";

    function get_notas() {
        $notas = [];
        
        foreach ($_POST as $materia => $nota) {
            if ($materia == "Aluno")
                continue;
    
            // Armazenar notas em um array associativo
            $notas[$materia] = $nota;
        }

        return $notas;
    }

    function get_maior_e_menor_notas($notas) {
        $maior_e_menor_notas = [];
        $maior_materia = "";
        $menor_materia = "";

        foreach ($notas as $materia => $nota) {
            // Calcular maior e menor nota
            if (strlen($menor_materia) == 0) {
                $menor_materia = $materia;
            } else if ($nota < $notas[$menor_materia]) {
                $menor_materia = $materia;
            }
    
            if (strlen($maior_materia) == 0) {
                $maior_materia = $materia;
            } else if ($nota > $notas[$maior_materia]) {
                $maior_materia = $materia;
            }
        }
    }

    function get_media($notas) {
        $soma_notas = 0.0;
        
        foreach ($notas as $nota) {
            $soma_notas += $nota;
        }

        return $soma_notas / count($notas);
    }
    ?>

</body>

</html>
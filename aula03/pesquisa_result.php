<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Pesquisa</title>
</head>
<body>
    <a href="index.php">Voltar à página inicial</a>

    <h1>Resultado da Pesquisa</h1>

    <?php 
    
        if($_SERVER['REQUEST_METHOD'] == 'GET') {

            if(!empty($_GET['produto'])) {
                
                $produto = $_GET['produto'];
                
                $produtos = [
                    "Notebook Gamer",
                    "Sabonete",
                    "Camisa Chadrez",
                    "Pano de Prato",
                    "Jogo de pratos",
                    "Guitarra Gibson",
                    "Lava-Rápido Hot Wheels",
                    "Impressora HPeste",
                    "Poly Station 5",
                    "1kg de Vina"
                ];
                
                $encontrado_index = array_search($produto, $produtos);
                if($encontrado_index != false) {
                    echo '<h2>Encontrado produto: ' . $produtos[$encontrado_index] . ' no índice ' . $encontrado_index . '</h2>';
                } else {
                    echo '<h2></h2>'
                }
            } 

        } else {
            echo '<h3>Campo produto não pode estar em branco!</h3>';
        }
    
    ?>
</body>
</html>
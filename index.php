<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>As heroínas!</title>
</head>
<body>
    
    <h1>Multiplique as heroínas!</h1>
    <form method="post" action="">
        <label for="universo">Universo:</label>
        <select name="universo" id="universo">
            <option value="Marvel">Marvel</option>
            <option value="DC">DC</option>
        </select>
        <br><br>
        <label>Digite o nome da heroína:</label><br>
        <input type="text" name="heroina"><br><br>
        <label>Digite a quantidade de repetições que a imagem deve ter:</label><br>
        <input type="number" name="quantidade"><br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $universo = $_POST['universo'];
            $heroina = $_POST['heroina'];
            $quantidade = (int)$_POST['quantidade'];

            
            $herois = [
                "Marvel" => [
                    "Capitã Marvel" => "imgphp/capitama.jpg",
                    "Lince Negra" => "imgphp/kitty.jpg",
                    "Magik" => "imgphp/magik.jpg",
                    "Mulher Invisível" => "imgphp/mi.jpg"
                ],
                "DC" => [
                    "Mulher Maravilha" => "imgphp/mm.jpg",
                    "Zatanna" => "imgphp/zatanna.jpg",
                    "Supergirl" => "imgphp/supergirl.jpg",
                    "Mulher Gavião" => "imgphp/mulhergaviao.jpg"
                ]
            ];

            if (array_key_exists($universo, $herois) && array_key_exists($heroina, $herois[$universo])) {
                echo "Você escolheu uma heroína do universo $universo!<br>";
                $url_imagem = $herois[$universo][$heroina];
                for ($i = 0; $i < $quantidade; $i++) {
                    echo "<img src='$url_imagem' alt='$heroina'><br>";
                }
            } else {
                echo "Heróina não reconhecida.";
            }
        }
    ?>
</body>
</html>

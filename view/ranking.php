<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ranking</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<h3>Ranking da tabuada</h3>
<table>

    <tr>
        <td>
            Posição:
        <td>
            Nome:
        </td>
        <td>
            Pontuação:
        </td>
    </tr>
    <?php
    $contador = 1;
    foreach ($_SESSION['ranking'] as $ranking){
        ?>
        <tr>
                <td><?php echo $contador++; ?></td>
                <td><?php echo $ranking[0]; ?></td>
                <td><?php echo $ranking[1]; ?></td>
            </tr>
    <?php } ?>
    <tr>
        <td colspan="3">
            <button type="button" onclick="redirecionar('tabuada.php')">Voltar</button>
        </td>
    </tr>
</table>
</body>
</html>
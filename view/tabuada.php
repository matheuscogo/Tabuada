<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tabuada</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<?php echo "Bem vindo " . $_SESSION["nome"] . "!"; ?>
<button type="button" onclick="redirecionar('index.php')">Sair</button>

<h2>Tabuada</h2>
<form method="POST" action="../controller/tabuadaController.php">
    <input name="id" type="hidden" value="<?php echo $_SESSION["id"]; ?>">
    <input type="text" name="numero01" id="numero01" value="<?php echo rand(1, 10); ?>" readonly>
    x
    <input type="text" name="numero02" id="numero02" value="<?php echo rand(1, 10); ?>" readonly>
    =
    <input name="resultado" id="resultado" type="text">
    <input type="submit" value="Calcular" onclick="verificarCalcular()">
</form>
<br>
<?php
if (isset($_SESSION["resultado"]) && !empty($_SESSION["resultado"])) {
    ?>
			<table>
					<tr>
						<td>
								Resposta:
						</td>
						<td>
                            <?php echo $_SESSION["numero01"] .' x '. $_SESSION["numero02"] .' = '. ($_SESSION["numero01"] * $_SESSION["numero02"]); ?>
						</td>
					</tr>
					<tr>
						<td>
							Sua resposta:</td>
						<td>
							<?php echo $_SESSION["numero01"] . ' x ' . $_SESSION["numero02"] . ' = ' . $_SESSION["resultado"]; ?>
						</td>
					</tr>
					<tr>
						<td>
                            Acertos:
                        </td>
                        <td>
                            <?php echo $_SESSION["acertos"][0] ?>
                        </td>
					</tr>
				<tr>
					<td>
                        Erros:
					</td>
                    <td>
                        <?php echo $_SESSION["erros"][0] ?>
                    </td>
				</tr>
			</table>
        <?php } ?>
<br>
<form action="../controller/tabuadaController.php" method="POST">
    <button type="submit" name="ranking">Ranking</button>
</form>
</body>
</html>
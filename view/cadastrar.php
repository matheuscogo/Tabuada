<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar da tabuada</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<h2>Cadastrar da tabuada</h2>
<form method="POST" action="../controller/tabuadaController.php">
    <table>
        <tr>
            <td>
                Login:
            </td>
            <td>
                <input type="text" id="usuario" name="usuario">
            </td>
        </tr>
        <tr>
            <td>
                Senha:
            </td>
            <td>
                <input type="password" id="senha" name="senha">
            </td>
        </tr>
        <tr>
        <tr>
            <td>
                Confirmar Senha:
            </td>
            <td>
                <input type="password" id="confirmarSenha" name="confirmarSenha">
            </td>
        </tr>
        <tr>

            <td>
                <button type="button" onclick="redirecionar('tabuada.php')">Voltar</button>
            </td>
            <td>
                <input type="submit" name="cadastrar" value="Cadastrar" onclick="verificarCadastro()">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
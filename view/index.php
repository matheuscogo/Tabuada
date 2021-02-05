<!DOCTYPE html>
<html>
<head>
    <title>Login da tabuada</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script type="text/javascript" src="js/script.js"></script>

</head>
<body>
<h2>Login da tabuada</h2>
<form method="POST" action="../controller/tabuadaController.php">
    <table>
        <tr>
            <td>
                Usuário:
            </td>
            <td>
                <input type="text" name="usuario" id="usuario">
            </td>
        </tr>
        <tr>
            <td>
                Senha:
            </td>
            <td>
                <input type="password" name="senha" id="senha">
            </td>
        </tr>
        <tr>
            <td>
                <button type="button" id="solicitarCadastro" onclick="redirecionar('cadastrar.php')">Cadastrar</button>
            </td>
            <td>
                <input type="submit" name="login" value="Login">
            </td>
        </tr>
    </table>
</form>
<h2><?php session_start();
    if (isset($_SESSION['cadastradoSucesso'])) {
        echo $_SESSION['cadastradoSucesso'];
    }
    $_SESSION = array();
    session_destroy();
    ?></h2>
</body>
</html>
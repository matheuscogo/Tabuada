<?php

require_once __DIR__ . "/../model/Usuario.php";
require_once __DIR__ . "/../model/Ranking.php";
require_once __DIR__ . "/../controller/UsuarioDAO.php";
require_once __DIR__ . "/../controller/RankingDAO.php";


if (isset($_POST['cadastrar'])) {
    $usuarioDAO = new usuarioDAO();
    $rankingDAO = new rankingDAO();
    $usuario = new usuario();

    $usuario->setNome($_POST['usuario']);
    $usuario->setSenha(md5($_POST['senha']));

    if ($usuarioDAO->cadastrarUsuario($usuario)) {
        if ($rankingDAO->cadastrarRanking($usuario)) {
            session_start();
            $_SESSION['cadastradoSucesso'] = "Cadastrado com sucesso!";
            header("Location: ../view/index.php");
        } else {
            echo "Não cadastrado no ranking!";
        }
    } else {
        echo "Não cadastrado!";
    }


} else if (isset($_POST['login'])) {
    $usuarioDAO = new usuarioDAO();
    $usuario = new usuario();

    $usuario->setNome($_POST['usuario']);
    $usuario->setSenha($_POST['senha']);

    if ($usuarioDAO->verificarLogin($usuario)) {
        header("Location: ../view/tabuada.php");
    } else {
        header("Location: ../view/index.php");
    }
} else if (isset($_POST['resultado'])) {
    $rankingDAO = new rankingDAO();


    if ($_POST['numero01'] * $_POST['numero02'] == $_POST['resultado']) {
        $rankingDAO->verificarAcerto($_POST['id']);;
    } else {
        $rankingDAO->verificarErro($_POST['id']);
    }

    $acertos = $rankingDAO->retornarAcertos($_POST['id']);
    $erros = $rankingDAO->retornarErros($_POST['id']);


    session_start();
    $_SESSION['numero01'] = $_POST['numero01'];
    $_SESSION['numero02'] = $_POST['numero02'];
    $_SESSION['resultado'] = $_POST['resultado'];
    $_SESSION['acertos'] = $acertos;
    $_SESSION['erros'] = $erros;
    header("Location: ../view/tabuada.php");
} else if (isset($_POST['ranking'])){
    $rankingDAO = new rankingDAO();
    $ranking = $rankingDAO->retornarRanking();
    session_start();
    $_SESSION['ranking'] = $ranking;
    header("Location: ../view/ranking.php");
}

?>

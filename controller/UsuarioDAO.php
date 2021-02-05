<?php
require_once "ConexaoBanco.php";
require_once __DIR__ . "/../model/Usuario.php";
require_once __DIR__ . "/../model/Ranking.php";

class usuarioDAO
{
    private $instancia;

    function __construct()
    {
        $this->instancia = Conexao::getInstance();
    }

    public function cadastrarUsuario(Usuario $usuario)
    {
        try {
            $pstmt = $this->instancia->prepare("INSERT INTO usuario (usuario, senha) VALUES (?, ?)");
            $pstmt->bindValue(1, $usuario->getNome());
            $pstmt->bindValue(2, $usuario->getSenha());

            return $pstmt->execute();

        } catch (PDOException $e) {
            return false;
        }
    }

    public function verificarLogin(Usuario $usuario)
    {
        try {
            $nomeUsuario = $usuario->getNome();
            $senhaLogin = md5($usuario->getSenha());

            $pstmt = $this->instancia->prepare("SELECT id, usuario, senha FROM usuario WHERE usuario = :usuario AND senha = :senha");
            $pstmt->bindValue(':usuario', $nomeUsuario);
            $pstmt->bindValue(':senha', $senhaLogin);

            $pstmt->execute();
            $result = $pstmt->fetch();
            if (!empty($result)) {
                session_start();
                $_SESSION['id'] = $result[0];
                $_SESSION['nome'] = $nomeUsuario;
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
}
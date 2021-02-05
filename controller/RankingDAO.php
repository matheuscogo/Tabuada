<?php
require_once "ConexaoBanco.php";
require_once __DIR__ . "/../model/Ranking.php";
require_once __DIR__ . "/../model/Usuario.php";

class rankingDAO
{
    private $instancia;

    function __construct()
    {
        $this->instancia = Conexao::getInstance();
    }

    public function cadastrarRanking(Usuario $usuario)
    {
        try {
            $pstmt = $this->instancia->prepare("INSERT INTO ranking (idUsuario, acertos, erros) VALUES ((SELECT id FROM usuario WHERE usuario = :nome), 0, 0)");
            $pstmt->bindValue(":nome", $usuario->getNome());
            return $pstmt->execute();
        } catch (PDOException $e) {
            echo "ERRO: " . $e->getMessage();
            return false;
        }
    }

    public function retornarAcertos($idUsuario)
    {
        try {
            $pstmt = $this->instancia->prepare("SELECT acertos FROM ranking WHERE idUsuario = $idUsuario");
            $pstmt->execute();

            $acertos = $pstmt->fetch()[0];

            return $acertos;

        } catch (PDOException $e) {
            return false;
        }
    }

    public function retornarErros($idUsuario)
    {
        try {
            $pstmt = $this->instancia->prepare("SELECT erros FROM ranking WHERE idUsuario = $idUsuario");
            $pstmt->execute();

            $erros = $pstmt->fetch()[0];

            return $erros;

        } catch (PDOException $e) {
            return false;
        }
    }

    public function retornarRanking()
    {
        $pstmt = $this->instancia->prepare("SELECT u.usuario, (r.acertos - r.erros) AS pontuacao FROM usuario u, ranking r WHERE u.id = r.idUsuario ORDER BY pontuacao DESC;");
        $pstmt->execute();

        return $pstmt->fetchAll();
    }
    public function verificarAcerto($idUsuario){
        $pstmt = $this->instancia->prepare("UPDATE ranking SET acertos=(acertos+1) WHERE idUsuario = :idUsuario;");
        $pstmt->bindValue("idUsuario", $idUsuario);
        $pstmt->execute();
    }
    public function verificarErro($idUsuario){
        $pstmt = $this->instancia->prepare("UPDATE ranking SET erros=(erros+1) WHERE idUsuario = :idUsuario");
        $pstmt->bindValue("idUsuario", $idUsuario);
        $pstmt->execute();
    }

}
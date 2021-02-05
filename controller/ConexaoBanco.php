<?php
define('HOSTNAME', 'localhost');
define('DBNAME', 'tabuada');
define('USER', 'root');
define('PASS', '');

class Conexao {
    private static $instance;

    private function __construct() {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public static function getInstance() {
        try {
            if (!isset(self::$instance)) {
                self::$instance = new PDO("mysql:host=" . HOSTNAME . "; dbname=" . DBNAME . ";", USER, PASS);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$instance;
        } catch (PDOException $e) {
            header("location: /TCC_ReLeaSys/view/problemaConexao.php");
            return false;
        }
    }
}
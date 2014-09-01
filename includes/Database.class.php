<?php 
require_once('db_config.php'); 
class Database {
    private $_conexao = '';
    
    function __construct() {
        try{
            $this->conexao = new \PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
            $this->conexao->exec("set names utf8");
        }catch(\PDOException $e){
            die("Erro código:" . $e->getCode(). ": " . $e->getMessage());
        }
    }    
    public function getPage($page='index') {
        
        $sql = "Select content from pages where route=:page";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue("page", $page);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return($res);
        
    }
    public function searchPages($needle='') {
        
        $sql = "Select name, route from pages where content like CONCAT('%',:needle, '%')";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue("needle", $needle);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //echo('<pre>');
        //    print_r($res);
        //echo('<pre>');
	return($res);
    }

    
}

$teste = new Database;
$teste->getPage();

?>
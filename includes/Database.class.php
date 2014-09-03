<?php 
require_once('db_config.php'); 
class Database {
    private $_conexao = '';
    
    function __construct() {
        try{
            $this->conexao = new \PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);;
            $this->conexao->exec("set names utf8");
        }catch(\PDOException $e){
            die("Erro código:" . $e->getCode(). ": " . $e->getMessage());
        }
		//verifica existência de tabela, caso contrário roda procedimento de fixture
        $fixture= '';
        try {
            $fixture = $this->tableExists('pages');
            if(!$fixture){
               $this->creteTablePages();
            }
	    } catch (Exception $e) {
		
            die("Erro código:" . $e->getCode(). ": " . $e->getMessage());
	    }
    }    
	/**
	 * função para verificar a existência da tabela
	 *
	 * @param string $table a tabela a ser verificada.
	 * @return bool TRUE if table exists, FALSE if error
	 */
	private function tableExists( $table) {

	    // Try a select statement against the table
	    // Run it in try/catch in case PDO is in ERRMODE_EXCEPTION.
        $result='';
	    try {
            $result = $this->conexao->query("SELECT 1 FROM $table LIMIT 1");
	    } catch (Exception $e) {
            // tabela não encontrada
            return FALSE;
	    }

	    // O resultado pode ser um booleano false ou um objeto PDOStatement 
	    return $result !== FALSE;
	}
	/**
	 * função para criar a tabela
	 *
	 * @return bool TRUE if table exists, FALSE if error
	 */
	private function creteTablePages() {

	    // Try a select statement against the table
	    // Run it in try/catch in case PDO is in ERRMODE_EXCEPTION.
        $result=true;
	    try {
            $sql = "
                    CREATE TABLE IF NOT EXISTS `pages` (
                      `id` int(11) NOT NULL AUTO_INCREMENT,
                      `name` varchar(45) DEFAULT NULL,
                      `route` varchar(45) DEFAULT NULL,
                      `content` text,
                      PRIMARY KEY (`id`)
                    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
            "; 
            $this->conexao->query($sql);
            $sql = " INSERT INTO `pages` (`name`, `route`, `content`) VALUES(:name, :route, :content)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue("name", '404');
            $stmt->bindValue("route", '404');
            $stmt->bindValue("content", utf8_encode('<div class="row clearfix">    <div class="col-md-12 column">        <h2>            Ops!        </h2>        <p>            A página que você procura não existe!        </p>    </div></div>'));
            $result = $result && $stmt->execute();
            $sql = " INSERT INTO `pages` (`name`, `route`, `content`) VALUES(:name, :route, :content)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue("name", 'Empresa');
            $stmt->bindValue("route", 'empresa');
            $stmt->bindValue("content", utf8_encode('	<div class="row clearfix">		<div class="col-md-12 column">			<div class="alert alert-success alert-dismissable">				 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>				<h4>					Área reservada para informações da empresa!				</h4> 			</div>		</div>	</div>'));
            $result = $result && $stmt->execute();                
            $sql = " INSERT INTO `pages` (`name`, `route`, `content`) VALUES(:name, :route, :content)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue("name", 'Home');
            $stmt->bindValue("route", 'index');
            $stmt->bindValue("content", utf8_encode('	<div class="row clearfix">		<div class="col-md-12 column">			<div class="alert alert-success alert-dismissable">				 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>				<h4>					Olá!				</h4> <strong>Atenção!</strong> Esta é uma versão alfa de um site simples em PHP utilizando bootstrap. Aguarde novidades!			</div>			<div class="carousel slide" id="carousel-927846">				<ol class="carousel-indicators">					<li class="active" data-slide-to="0" data-target="#carousel-927846">					</li>					<li data-slide-to="1" data-target="#carousel-927846">					</li>					<li data-slide-to="2" data-target="#carousel-927846">					</li>				</ol>				<div class="carousel-inner">					<div class="item active">						<img alt="" src="http://lorempixel.com/1600/500/technics/3">						<div class="carousel-caption">							<h4>								First Thumbnail label							</h4>							<p>								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.							</p>						</div>					</div>					<div class="item">						<img alt="" src="http://lorempixel.com/1600/500/technics/5">						<div class="carousel-caption">							<h4>								Second Thumbnail label							</h4>							<p>								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.							</p>						</div>					</div>					<div class="item">						<img alt="" src="http://lorempixel.com/1600/500/technics/8">						<div class="carousel-caption">							<h4>								Third Thumbnail label							</h4>							<p>								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.							</p>						</div>					</div>				</div> <a class="left carousel-control" href="#carousel-927846" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-927846" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>			</div>		</div>	</div>		<div class="row clearfix">		<div class="col-md-3 column">			<h2>				Empresa			</h2>			<p>				Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.			</p>		</div>		<div class="col-md-3 column">			<h2>				Produtos			</h2>			<p>				Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.			</p>		</div>		<div class="col-md-3 column">			<h2>				Serviços			</h2>			<p>				Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.			</p>					</div>		<div class="col-md-3 column">			<h2>				Qualidade			</h2>			<p>				Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.			</p>		</div>	</div>'));
            $result = $result && $stmt->execute();                
            $sql = " INSERT INTO `pages` (`name`, `route`, `content`) VALUES(:name, :route, :content)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue("name", 'Produtos');
            $stmt->bindValue("route", 'produtos');
            $stmt->bindValue("content", utf8_encode('	<div class="row clearfix">		<div class="col-md-12 column">			<div class="alert alert-success alert-dismissable">				 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>				<h4>					Área reservada para informações dos produtos!				</h4> 			</div>		</div>	</div>'));
            $result = $result && $stmt->execute();                
            $sql = " INSERT INTO `pages` (`name`, `route`, `content`) VALUES(:name, :route, :content)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue("name", 'Serviços');
            $stmt->bindValue("route", 'servicos');
            $stmt->bindValue("content", utf8_encode('	<div class="row clearfix">		<div class="col-md-12 column">			<div class="alert alert-success alert-dismissable">				 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>				<h4>					Área reservada para informações dos serviços!				</h4> 			</div>		</div>	</div>'));
            $result = $result && $stmt->execute(); 
	    } catch (Exception $e) {
            // tabela não encontrada
            return FALSE;
	    }

	    // O resultado pode ser um booleano false ou um objeto PDOStatement 
	    return $result !== FALSE;
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
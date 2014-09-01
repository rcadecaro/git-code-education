-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `pdo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `route` varchar(45) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `pages`
--

INSERT INTO `pages` (`id`, `name`, `route`, `content`) VALUES
(1, '404', '404', '<div class="row clearfix">\r\n    <div class="col-md-12 column">\r\n        <h2>\r\n            Ops!\r\n        </h2>\r\n        <p>\r\n            A página que você procura não existe!\r\n        </p>\r\n    </div>\r\n</div>'),
(2, 'empresa', 'empresa', '	<div class="row clearfix">\r\n		<div class="col-md-12 column">\r\n			<div class="alert alert-success alert-dismissable">\r\n				 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\r\n				<h4>\r\n					Área reservada para informações da empresa!\r\n				</h4> \r\n			</div>\r\n\r\n		</div>\r\n	</div>\r\n'),
(3, 'index', 'index', '	<div class="row clearfix">\r\n		<div class="col-md-12 column">\r\n			<div class="alert alert-success alert-dismissable">\r\n				 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\r\n				<h4>\r\n					Olá!\r\n				</h4> <strong>Atenção!</strong> Esta é uma versão alfa de um site simples em PHP utilizando bootstrap. Aguarde novidades!\r\n			</div>\r\n			<div class="carousel slide" id="carousel-927846">\r\n				<ol class="carousel-indicators">\r\n					<li class="active" data-slide-to="0" data-target="#carousel-927846">\r\n					</li>\r\n					<li data-slide-to="1" data-target="#carousel-927846">\r\n					</li>\r\n					<li data-slide-to="2" data-target="#carousel-927846">\r\n					</li>\r\n				</ol>\r\n				<div class="carousel-inner">\r\n					<div class="item active">\r\n						<img alt="" src="http://lorempixel.com/1600/500/technics/3">\r\n						<div class="carousel-caption">\r\n							<h4>\r\n								First Thumbnail label\r\n							</h4>\r\n							<p>\r\n								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.\r\n							</p>\r\n						</div>\r\n					</div>\r\n					<div class="item">\r\n						<img alt="" src="http://lorempixel.com/1600/500/technics/5">\r\n						<div class="carousel-caption">\r\n							<h4>\r\n								Second Thumbnail label\r\n							</h4>\r\n							<p>\r\n								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.\r\n							</p>\r\n						</div>\r\n					</div>\r\n					<div class="item">\r\n						<img alt="" src="http://lorempixel.com/1600/500/technics/8">\r\n						<div class="carousel-caption">\r\n							<h4>\r\n								Third Thumbnail label\r\n							</h4>\r\n							<p>\r\n								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.\r\n							</p>\r\n						</div>\r\n					</div>\r\n				</div> <a class="left carousel-control" href="#carousel-927846" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-927846" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>\r\n			</div>\r\n		</div>\r\n	</div>\r\n	\r\n	<div class="row clearfix">\r\n		<div class="col-md-3 column">\r\n			<h2>\r\n				Empresa\r\n			</h2>\r\n			<p>\r\n				Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.\r\n			</p>\r\n\r\n		</div>\r\n		<div class="col-md-3 column">\r\n			<h2>\r\n				Produtos\r\n			</h2>\r\n			<p>\r\n				Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.\r\n			</p>\r\n\r\n		</div>\r\n		<div class="col-md-3 column">\r\n			<h2>\r\n				Serviços\r\n			</h2>\r\n			<p>\r\n				Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.\r\n			</p>\r\n			\r\n		</div>\r\n		<div class="col-md-3 column">\r\n			<h2>\r\n				Qualidade\r\n			</h2>\r\n			<p>\r\n				Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.\r\n			</p>\r\n\r\n		</div>\r\n	</div>\r\n\r\n'),
(4, 'produtos', 'produtos', '	<div class="row clearfix">\r\n		<div class="col-md-12 column">\r\n			<div class="alert alert-success alert-dismissable">\r\n				 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\r\n				<h4>\r\n					Área reservada para informações dos produtos!\r\n				</h4> \r\n			</div>\r\n\r\n		</div>\r\n	</div>\r\n'),
(5, 'servicos', 'servicos', '	<div class="row clearfix">\r\n		<div class="col-md-12 column">\r\n			<div class="alert alert-success alert-dismissable">\r\n				 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\r\n				<h4>\r\n					Área reservada para informações dos serviços!\r\n				</h4> \r\n			</div>\r\n\r\n		</div>\r\n	</div>\r\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

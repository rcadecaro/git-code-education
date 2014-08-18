<?php
class ProjectInfo {
    private $_version = '0.1.3';
    private $_name = 'Site Simples em PHP - SSP';
    
    public function getVersion() {
        return  $this->_version;
    }
    public function getName() {
        return  $this->_name;
    }    
    public function sayHello($usuario ='usuário') {
        return  'Olá '. $usuario .'!';
    }
    
}
?> 
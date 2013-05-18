<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');
App::uses('FormatacaoHelper', 'View/Helper');
App::uses('SiteURLHelper', 'View/Helper');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
        
        public $components = array(
        		'RequestHandler',
        		'Session',
        		'Auth' => array(
        				'loginRedirect' => array('controller' => 'imoveis', 'action' => 'pesquisar'),
        				'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'),
        				'authorize' => array('Controller')
        		)
        );
        
        public $helpers = array('Js' => array('Jquery'), 'Formatacao', 'SiteURL');
        
        public function beforeFilter() {
        	$this->Auth->allow( 'display', 'pesquisar');
        	if($this->Auth->loggedIn()){
        		$this->set("user_name", $this->Auth->user('nome'). ' ' . $this->Auth->user('sobrenome'));
        		$this->set("user_email", $this->Auth->user('email'));
        		$this->set("user_login", $this->Auth->user('username'));
        
        	}
        }
        
        public function loggedIn(){
        	return $this->Auth->loggedIn();
        }

}

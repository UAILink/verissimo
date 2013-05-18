<?php
App::uses('AppController', 'Controller');
/**
 * Cidades Controller
 *
 * @property Cidade $Cidade
 */
class AdministracaoController extends AppController {


	public function beforeFilter() {
		parent::beforeFilter();		
	}
	
	public function isAuthorized($user = null) {
	
		if (isset($user['role']) && $user['role'] === 'admin') {
			return true;
		}
			
		// Default deny
		return false;
	}

	
/**
 * index method
 *
 * @return void
 */
	public function index() {

	}


}

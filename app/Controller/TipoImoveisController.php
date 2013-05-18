<?php
App::uses('AppController', 'Controller');
/**
 * TipoImoveis Controller
 *
 * @property TipoImovel $TipoImovel
 */
class TipoImoveisController extends AppController {


	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('listar');
	}
	
	public function isAuthorized($user = null) {
	
		if (isset($user['role']) && $user['role'] === 'admin') {
			return true;
		}
		
		if (in_array($this->action, array('edit', 'delete', 'post', 'index', 'add'))) {
			// Only admins can access this functions
			// Admin can access every action
			if (isset($user['role']) && $user['role'] === 'admin') {
				return true;
			}
		}
	
		// Default deny
		return false;
	}
	
	public function listar(){
		return $this->index();
	}
	
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TipoImovel->recursive = 0;
		$tipos = $this->paginate();
		if ($this->request->is('requested')) {
		    return $this->TipoImovel->find('list');
		}else {
    		$this->set('tipoImoveis', $tipos);
    	}
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TipoImovel->id = $id;
		if (!$this->TipoImovel->exists()) {
			throw new NotFoundException(__('Tipo imovel inválido'));
		}
		$this->set('tipoImovel', $this->TipoImovel->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TipoImovel->create();
			if ($this->TipoImovel->save($this->request->data)) {
				$this->Session->setFlash(__('O tipo imovel foi salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O tipo imovel não pode ser salvo. Por favor, tente novamente.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->TipoImovel->id = $id;
		if (!$this->TipoImovel->exists()) {
			throw new NotFoundException(__('Tipo imovel inválido.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TipoImovel->save($this->request->data)) {
				$this->Session->setFlash(__('O tipo imovel foi salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O tipo imovel não pode ser salvo. Por favor, tente novamente.'));
			}
		} else {
			$this->request->data = $this->TipoImovel->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->TipoImovel->id = $id;
		if (!$this->TipoImovel->exists()) {
			throw new NotFoundException(__('tipo imovel inválido.'));
		}
		if ($this->TipoImovel->delete()) {
			$this->Session->setFlash(__('Tipo imovel excluído.'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Tipo imovel não pode ser excluído.'));
		$this->redirect(array('action' => 'index'));
	}
}

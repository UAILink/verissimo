<?php
App::uses('AppController', 'Controller');
/**
 * SituacaoImoveis Controller
 *
 * @property SituacaoImovel $SituacaoImovel
 */
class SituacaoImoveisController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('getSituacaoImoveis');
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
	
	public function getSituacaoImoveis(){
		$this->index();
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SituacaoImovel->recursive = 0;
		$situacoes = $this->paginate();
		if ($this->request->is('requested')) {
		    return $this->SituacaoImovel->find('list');
		}else{
    		$this->set('situacaoImoveis', $situacoes);
    	}
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->SituacaoImovel->id = $id;
		if (!$this->SituacaoImovel->exists()) {
			throw new NotFoundException(__('Situação imovel inválido'));
		}
		$this->set('situacaoImovel', $this->SituacaoImovel->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SituacaoImovel->create();
			if ($this->SituacaoImovel->save($this->request->data)) {
				$this->Session->setFlash(__('O situação imovel foi salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O situação imovel não pode ser salvo. Por favor, tente novamente.'));
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
		$this->SituacaoImovel->id = $id;
		if (!$this->SituacaoImovel->exists()) {
			throw new NotFoundException(__('Situação imovel inválido.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SituacaoImovel->save($this->request->data)) {
				$this->Session->setFlash(__('O situação imovel foi salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O situação imovel não pode ser salvo. Por favor, tente novamente.'));
			}
		} else {
			$this->request->data = $this->SituacaoImovel->read(null, $id);
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
		$this->SituacaoImovel->id = $id;
		if (!$this->SituacaoImovel->exists()) {
			throw new NotFoundException(__('situação imovel inválido.'));
		}
		if ($this->SituacaoImovel->delete()) {
			$this->Session->setFlash(__('Situação imovel excluído.'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Situação imovel não pode ser excluído.'));
		$this->redirect(array('action' => 'index'));
	}
}

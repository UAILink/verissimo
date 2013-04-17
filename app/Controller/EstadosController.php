<?php
App::uses('AppController', 'Controller');
/**
 * Estados Controller
 *
 * @property Estado $Estado
 */
class EstadosController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Estado->recursive = 0;
		if ($this->request->is('requested')) {
		    return $this->Estado->find('list');
		}else {
    		$this->set('estados', $this->paginate());
		}
	}
	
	public function getEstadoPadrao() {
		$this->Estado->recursive = 0;
		return $this->Estado->findByNomeEstado('Minas Gerais');
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Estado->id = $id;
		if (!$this->Estado->exists()) {
			throw new NotFoundException(__('Estado inválido'));
		}
		$this->set('estado', $this->Estado->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Estado->create();
			if ($this->Estado->save($this->request->data)) {
				$this->Session->setFlash(__('O estado foi salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O estado não pode ser salvo. Por favor, tente novamente.'));
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
		$this->Estado->id = $id;
		if (!$this->Estado->exists()) {
			throw new NotFoundException(__('Estado inválido.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Estado->save($this->request->data)) {
				$this->Session->setFlash(__('O estado foi salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O estado não pode ser salvo. Por favor, tente novamente.'));
			}
		} else {
			$this->request->data = $this->Estado->read(null, $id);
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
		$this->Estado->id = $id;
		if (!$this->Estado->exists()) {
			throw new NotFoundException(__('estado inválido.'));
		}
		if ($this->Estado->delete()) {
			$this->Session->setFlash(__('Estado excluído.'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Estado não pode ser excluído.'));
		$this->redirect(array('action' => 'index'));
	}
}

<?php
App::uses('AppController', 'Controller');
/**
 * Bairros Controller
 *
 * @property Bairro $Bairro
 */
class BairrosController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Bairro->recursive = 0;
		$bairros = $this->paginate();
		if ($this->request->is('requested')) {
            return $this->Bairro->find('list');
        }else if(isset($this->request->ext)){  //json ou xml
		   $cidade_id = $this->request->query['cidade_id'];		   
		   $this->set('bairros', $this->Bairro->findAllByCidadeId($cidade_id));		   
		   $this->set('_serialize', 'bairros');
		}else{
    		$this->set('bairros', $bairros );
    	}
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Bairro->id = $id;
		if (!$this->Bairro->exists()) {
			throw new NotFoundException(__('Bairro inválido'));
		}
		$this->set('bairro', $this->Bairro->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Bairro->create();
			if ($this->Bairro->save($this->request->data)) {
				$this->Session->setFlash(__('O bairro foi salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O bairro não pode ser salvo. Por favor, tente novamente.'));
			}
		}
		$cidades = $this->Bairro->Cidade->find('list');
		$this->set(compact('cidades'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Bairro->id = $id;
		if (!$this->Bairro->exists()) {
			throw new NotFoundException(__('Bairro inválido.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Bairro->save($this->request->data)) {
				$this->Session->setFlash(__('O bairro foi salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O bairro não pode ser salvo. Por favor, tente novamente.'));
			}
		} else {
			$this->request->data = $this->Bairro->read(null, $id);
		}
		$cidades = $this->Bairro->Cidade->find('list');
		$this->set(compact('cidades'));
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
		$this->Bairro->id = $id;
		if (!$this->Bairro->exists()) {
			throw new NotFoundException(__('bairro inválido.'));
		}
		if ($this->Bairro->delete()) {
			$this->Session->setFlash(__('Bairro excluído.'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Bairro não pode ser excluído.'));
		$this->redirect(array('action' => 'index'));
	}
}

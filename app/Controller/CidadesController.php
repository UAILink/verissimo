<?php
App::uses('AppController', 'Controller');
/**
 * Cidades Controller
 *
 * @property Cidade $Cidade
 */
class CidadesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Cidade->recursive = 0;
		if ($this->request->is('requested')) {
    		$estado_id = $this->request->query['estado_id'];		   
		    return $this->Cidade->find('list', array(
                'conditions' => array('Cidade.estado_id' => $estado_id)
            ));
		} else if(isset($this->request->ext)){  //json ou xml
		   $estado_id = $this->request->query['estado_id'];		   
		   $this->set('cidades', $this->Cidade->findAllByEstadoId($estado_id));		   
		   $this->set('_serialize', 'cidades');
		}else{
  		    $this->set('cidades', $this->paginate());
  	    }  	   
  	    /*
  	    $log = $this->Cidade->getDataSource()->getLog(false, false);
        debug($log);  	    
        */
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Cidade->id = $id;
		if (!$this->Cidade->exists()) {
			throw new NotFoundException(__('Cidade inválido'));
		}
		$this->set('cidade', $this->Cidade->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cidade->create();
			if ($this->Cidade->save($this->request->data)) {
				$this->Session->setFlash(__('O cidade foi salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O cidade não pode ser salvo. Por favor, tente novamente.'));
			}
		}
		$estados = $this->Cidade->Estado->find('list');
		$this->set(compact('estados'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Cidade->id = $id;
		if (!$this->Cidade->exists()) {
			throw new NotFoundException(__('Cidade inválido.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Cidade->save($this->request->data)) {
				$this->Session->setFlash(__('O cidade foi salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O cidade não pode ser salvo. Por favor, tente novamente.'));
			}
		} else {
			$this->request->data = $this->Cidade->read(null, $id);
		}
		$estados = $this->Cidade->Estado->find('list');
		$this->set(compact('estados'));
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
		$this->Cidade->id = $id;
		if (!$this->Cidade->exists()) {
			throw new NotFoundException(__('cidade inválido.'));
		}
		if ($this->Cidade->delete()) {
			$this->Session->setFlash(__('Cidade excluído.'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Cidade não pode ser excluído.'));
		$this->redirect(array('action' => 'index'));
	}
}

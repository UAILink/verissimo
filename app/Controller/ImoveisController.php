<?php
App::uses('AppController', 'Controller');   
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
/**
 * Imoveis Controller
 *
 * @property Imovel $Imovel
 */
class ImoveisController extends AppController {
	
	public $helpers = array('GoogleMap');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Imovel->recursive = 2;
		$imoveis = $this->paginate();
		if ($this->request->is('requested')) {
            return $imoveis;            
        }else{
    		$this->set('imoveis', $imoveis);
    	}
	}
	
	
	public function pesquisar() {		
		$this->Imovel->recursive = 2;
		
		/**
			@FIXE-ME
			Por algum problema o php ou cake esta trocando "ponto" por "undescore" nos nomes dos campos em request->data			
		 */
		$data = array();		
		foreach($this->request->data as $key => $value){			
			$data["Imovel.$key"] = $value;
		}			

		$conditions = array_intersect_key($data, array( 'Imovel.tipo_imovel_id'=>-1, 
													    'Imovel.situacao_imovel_id'=>-1,  
														'Imovel.estado_id'=>-1, 
														'Imovel.cidade_id'=>-1, 
														'Imovel.bairro_id'=>-1));				
		//removemos todos os itens -1												
	    array_unique($conditions);
		//if(sizeof($conditions) == 0) $conditions = array('Imovel.cidade_id'=>1);
		$imoveis = $this->paginate('Imovel', $conditions );
		
		if ($this->request->is('requested')) {
            return $imoveis;
            $this->set('imoveis', $imoveis);
        }else{
    		$this->set('imoveis', $imoveis);
    	}	
	}
	
	
/**
 * novidades method
 *
 * @return void
 */
	public function novidades() {
		$this->Imovel->recursive = 0;
		$this->set('imoveis', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
	    $this->Imovel->recursive = 2;
		$this->Imovel->id = $id;
		if (!$this->Imovel->exists()) {
			throw new NotFoundException(__('Imovel inválido'));
		}
		
		$dir = new Folder(WWW_ROOT . 'img/imoveis');
	    $fileName = "imovel".$id."-";
	    $files = $dir->find($fileName . ".*");	    
	    	    
        $this->set('files', $files);	    	 
		
		$this->set('imovel', $this->Imovel->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Imovel->create();
			if ($this->Imovel->save($this->request->data)) {
				$this->Session->setFlash(__('O imovel foi salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O imovel não pode ser salvo. Por favor, tente novamente.'));
			}
		}
		$tipoImoveis = $this->Imovel->TipoImovel->find('list');
		$situacaoImoveis = $this->Imovel->SituacaoImovel->find('list');
		$bairros = $this->Imovel->Bairro->find('list');
		$cidades = $this->Imovel->Cidade->find('list');
		$estados = $this->Imovel->Estado->find('list');
		$this->set(compact('tipoImoveis', 'situacaoImoveis', 'bairros', 'cidades', 'estados'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Imovel->id = $id;
		if (!$this->Imovel->exists()) {
			throw new NotFoundException(__('Imovel inválido.'));
		}		
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Imovel->save($this->request->data)) {
				$this->Session->setFlash(__('O imovel foi salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O imovel não pode ser salvo. Por favor, tente novamente.'));
			}
		} else {
			$this->request->data = $this->Imovel->read(null, $id);
		}
		$tipoImoveis = $this->Imovel->TipoImovel->find('list');
		$situacaoImoveis = $this->Imovel->SituacaoImovel->find('list');
		$bairros = $this->Imovel->Bairro->find('list');
		$cidades = $this->Imovel->Bairro->Cidade->find('list');
		$estados = $this->Imovel->Bairro->Cidade->Estado->find('list');
		$this->set(compact('tipoImoveis', 'situacaoImoveis', 'bairros', 'cidades', 'estados'));

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
		$this->Imovel->id = $id;
		if (!$this->Imovel->exists()) {
			throw new NotFoundException(__('imovel inválido.'));
		}
		if ($this->Imovel->delete()) {
			$this->Session->setFlash(__('Imovel excluído.'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Imovel não pode ser excluído.'));
		$this->redirect(array('action' => 'index'));
	}
	


	
	
	
}

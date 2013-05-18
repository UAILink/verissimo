<?php
App::uses('AppController', 'Controller');
/**
 * Useres Controller
 *
 * @property User $User
 */
class UsersController extends AppController {


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('addVisitante'); // Letting users register themselves
    }
    
    public function isAuthorized($user = null) {
    	// Any registered user can access public functions
    	if (empty($this->request->params['admin'])) {
    		return true;
    	}
    
    	// Only admins can access admin functions
    	if (isset($this->request->params['admin'])) {
    		return (bool)($user['role'] === 'admin');
    	}
    
    	// Default deny
    	return false;
    }


    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Invalid username or password, try again'));
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }



/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('useres', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('User inválido'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			$this->request->data['User']['role'] = 'VISITANTE';
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('O usuário foi salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O usuário não pode ser salvo. Por favor, tente novamente.'));
			}
		}
	}
	
	/**
	 * Método específico para o cadastro de visitantes. 
	 * O proprio usuário se cadastra pelo site a partir deste método.
	 * 
	 * Facilita a segurança.
	 * 
	 * Este método tambem retorna o Usuário adicionado via requestAction.
	 */
	public function addVisitante() {
		if ($this->request->is('post')) {
			$this->User->create();
			$this->request->data['User']['role'] = 'VISITANTE';
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('O usuário foi salvo.'));					
			} else {	
				$errors = $this->User->validationErrors	;
				$message = 'O usuário não pode ser salvo. ';			
				if(array_key_exists('username', $errors)) $message .= $errors['username'][0];	
				else if(array_key_exists('email', $errors)) $message .= $errors['email'][0];
				else if(array_key_exists('password', $errors)) $message .= $errors['password'][0];
				$this->Session->setFlash(__($message));
			}
			
		}
		$this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('User inválido.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('O user foi salvo.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O user não pode ser salvo. Por favor, tente novamente.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('user inválido.'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User excluído.'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User não pode ser excluído.'));
		$this->redirect(array('action' => 'index'));
	}
}

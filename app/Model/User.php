<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'users';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nome';
	
	
	public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }
	
/**
 *	 Validation Roles
 */
	
	public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            ),
        	'unique' => array(
        		'rule' => array('isUnique'),
        		'message' => 'Este usuário já existe'
        	),
        	'login' => array(
        			'rule'    => array('minLength', 6),
        			'message' => 'Usernames must be at least 6 characters long.'
        	)
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            ),
			'tamanho' => array(
					'rule'    => array('minLength', 6),
					'message' => 'O seu login deve ter pelo menos 6 caracteres.'
			)
        ),
		'email' => array(
			'unique' => array(
					'rule' => array('isUnique'),
					'message' => 'Email já cadastrado'
			),
			'valido' => array(
					'rule'    => array('email', true),
					'message' => 'Favor informar um email válido.'
			)
			),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('ADMIN', 'VISITANTE')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );
	
}

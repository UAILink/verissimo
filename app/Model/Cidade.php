<?php
App::uses('AppModel', 'Model');
/**
 * Cidade Model
 *
 * @property Estado $Estado
 * @property Bairro $Bairro
 */
class Cidade extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nome_cidade';

	// As associações abaixo foram criadas com todas as chaves possíveis, então é possível remover as que não são necessárias

/**
 * Associações belongsTo
 *
 * @var array
 */
	public $belongsTo = array(
		'Estado' => array(
			'className' => 'Estado',
			'foreignKey' => 'estado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * Associações hasMany
 *
 * @var array
 */
	public $hasMany = array(
		'Bairro' => array(
			'className' => 'Bairro',
			'foreignKey' => 'cidade_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
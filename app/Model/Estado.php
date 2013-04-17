<?php
App::uses('AppModel', 'Model');
/**
 * Estado Model
 *
 * @property Cidade $Cidade
 */
class Estado extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nome_estado';

	// As associações abaixo foram criadas com todas as chaves possíveis, então é possível remover as que não são necessárias

/**
 * Associações hasMany
 *
 * @var array
 */
	public $hasMany = array(
		'Cidade' => array(
			'className' => 'Cidade',
			'foreignKey' => 'estado_id',
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
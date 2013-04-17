<?php
App::uses('AppModel', 'Model');
/**
 * Bairro Model
 *
 * @property Cidade $Cidade
 */
class Bairro extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nome_bairro';

	// As associações abaixo foram criadas com todas as chaves possíveis, então é possível remover as que não são necessárias

/**
 * Associações belongsTo
 *
 * @var array
 */
	public $belongsTo = array(
		'Cidade' => array(
			'className' => 'Cidade',
			'foreignKey' => 'cidade_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>
<?php
/**
 * ImovelFixture
 *
 */
class ImovelFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'preco' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,4'),
		'quartos' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'tipo_imovel_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'situacao_imovel_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'suites' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'vagas_garagem' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'banheiros' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'area_construida' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,4'),
		'bairro_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'descricao' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'inativo' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'bairro_id' => array('column' => 'bairro_id', 'unique' => 0),
			'tipo_imovel_id' => array('column' => 'tipo_imovel_id', 'unique' => 0),
			'situacao_imovel_id' => array('column' => 'situacao_imovel_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'preco' => 1,
			'quartos' => 1,
			'tipo_imovel_id' => 1,
			'situacao_imovel_id' => 1,
			'suites' => 1,
			'vagas_garagem' => 1,
			'banheiros' => 1,
			'area_construida' => 1,
			'bairro_id' => 1,
			'descricao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'inativo' => 1
		),
	);
}
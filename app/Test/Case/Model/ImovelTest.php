<?php
App::uses('Imovel', 'Model');

/**
 * Imovel Test Case
 *
 */
class ImovelTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.imovel', 'app.tipo_imovel', 'app.situacao_imovel', 'app.bairro', 'app.cidade', 'app.estado', 'app.situacao', 'app.situacoes_imovel', 'app.tipo');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Imovel = ClassRegistry::init('Imovel');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Imovel);

		parent::tearDown();
	}

}
<?php
class TipoImovel extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'descricao';

    public $validate = array(
        'descricao' => array(
            'rule' => 'notEmpty'
        )
    );

}
?>

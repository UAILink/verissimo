<?php
/**
 * Helper para exibir urls do site
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @author        Juan Basso <jrbasso@gmail.com>
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */

/**
 * Estado Helper
 *
 * @link http://wiki.github.com/jrbasso/cake_ptbr/helper-estados
 */
class SiteURLHelper extends AppHelper {

/**
 * Helpers auxiliares
 *
 * @var array
 * @access public
 */
	//public $helpers = array('Form');

/**
 * Retorna a string com a url
 *
 * @param string $fieldName Nome do campo
 * @param string $selected Sigla do estado que deve ser selecionado
 * @param array $attributes Mesmos atributos do Form::select(). Também é possível passar o param
 *				'uf' para mostrar apenas as siglas, sem os nomes
 */
	public function home(){
    	return $this->Html->url(
            array(
                'controller'=>'/pages', 
                'action'=>'home'                                 
                )
            true 
            );
	}
	
	public function sobre(){
	    return $this->Html->url(
            array(
                'controller'=>'/pages', 
                'action'=>'sobre'                                 
                )
            true 
            );
	
	}
	
	public function imoveis(){
	    return $this->Html->url(
            array(
                'controller'=>'/pages', 
                'action'=>'pesquisar'                                 
                )
            true 
            );
	
	}
	
	public function contato(){
	    return $this->Html->url(
            array(
                'controller'=>'/pages', 
                'action'=>'contato'                                 
                )
            true 
            );
	
	}
	
	

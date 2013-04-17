<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
if ($action === 'add') {
	$actionTitulo = 'Incluir';
} elseif ($action === 'edit') {
	$actionTitulo = 'Editar';
} else {
	$actionTitulo = Inflector::humanize($action);
}
require_once dirname(dirname(__FILE__)) . DS . 'Inflexao.php';
?>

<div class="ym-column">
    <div class="ym-col1" >   
    
    
    <h4 class="ym-fbox-heading"><?php printf("<?php echo __('%s %s'); ?>", $actionTitulo, Inflexao::acentos($singularHumanName)); ?></h4>
    
            <div class="<?php echo $pluralVar;?> form ym-cbox">
        <div class="ym-form ym-inline">
        <?php echo "<?php echo \$this->Form->create('{$modelClass}', array(
        'inputDefaults' => array(     
            'div'   => 'ym-fbox-text',
            # define error defaults for the form
            'error' => array(
              'wrap'  => 'span',
              'class' => 'ym-error'
            )
        )
    ));?>\n";?>
	        
		        <h6 class="ym-fbox-heading"><?php printf("<?php echo __('%s %s'); ?>", 'Dados', Inflexao::acentos($singularHumanName)); ?></h6>
        <?php
		        echo "\t<?php\n";
		        foreach ($fields as $field) {
			        if (strpos($action, 'add') !== false && $field == $primaryKey) {
				        continue;
			        } elseif (!in_array($field, array('created', 'modified', 'updated', 'inativo'))) {
				        echo "\t\techo \$this->Form->input('{$field}');\n";
			        }
		        }
		        if (!empty($associations['hasAndBelongsToMany'])) {
			        foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
				        echo "\t\techo \$this->Form->input('{$assocName}');\n";
			        }
		        }
		        echo "\t?>\n";
        ?>
	    
	        <div class="ym-fbox-button">
              <input type="submit" class="ym-button" value="Enviar" id="submit" name="Enviar" />
              <input type="reset" class="ym-button" value="Limpar" id="reset" name="Limpar" />              
            </div>
	    
	    
        <?php
	            
	        
	        echo "<?php echo \$this->Form->end();?>\n";
        ?>
        </div>
        </div>
    
    
    </div>    
    <div class="ym-col3" >
    
        <div class="actions ym-cbox">
	        <h4><?php echo "<?php echo __('Ações'); ?>"; ?></h4>
	 

        <?php if (strpos($action, 'add') === false): ?>
		        <?php echo "<?php echo \$this->Form->postLink(__('Excluir'), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), array('class'=>'ym-button'), __('Você tem certeza que deseja excluir o # %s?', \$this->Form->value('{$modelClass}.{$primaryKey}'))); ?>";?>
        <?php endif;?>
		        <?php echo "<?php echo \$this->Html->link(__('Listar " . Inflexao::acentos($pluralHumanName) . "'), array('action' => 'index'), array('class'=>'ym-button'));?>";?>
        <?php
		        $done = array();
		        foreach ($associations as $type => $data) {
			        foreach ($data as $alias => $details) {
				        if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
					        echo "<?php echo __('<h6>" . Inflexao::acentos(Inflector::humanize($details['controller'])) . "</h6>'); ?>"; 
					        echo "\t\t<?php echo \$this->Html->link(__('Listar " . Inflexao::acentos(Inflector::humanize($details['controller'])) . "'), array('controller' => '{$details['controller']}', 'action' => 'index'), array('class'=>'ym-button')); ?> \n";
					        echo "\t\t<?php echo \$this->Html->link(__('Novo " . Inflexao::acentos(Inflector::humanize(Inflector::underscore($alias))) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'), array('class'=>'ym-button')); ?> \n";
					        $done[] = $details['controller'];
				        }
			        }
		        }
        ?>
	 
        </div>
    
    
    
    </div>
</div>








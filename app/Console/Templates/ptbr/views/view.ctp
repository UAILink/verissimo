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
require_once dirname(dirname(__FILE__)) . DS . 'Inflexao.php';
?>

<div class="ym-column">
  <div class="ym-col1" >
    <div class="<?php echo $pluralVar;?> view ym-cbox">
      <h2><?php echo "<?php  echo __('" . Inflexao::acentos($singularHumanName) . "');?>";?></h2>
      <table>
	     <thead>
	        <tr>
	          <td width="20%">Campo</td>
	          <td width="80%">Descrição</td>
	        </tr>
	      </thead>
	      <tbody>
	<?php
foreach ($fields as $field) {
    echo "\t\t<tr>";
	$isKey = false;
	if (!empty($associations['belongsTo'])) {
		foreach ($associations['belongsTo'] as $alias => $details) {
			if ($field === $details['foreignKey']) {
				$isKey = true;
				echo "\t\t\t<td><?php echo __('" . Inflexao::acentos(Inflector::humanize(Inflector::underscore($alias))) . "'); ?></td>\n";
				echo "\t\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t\t&nbsp;\n\t\t</td>\n";
				break;
			}
		}
	}
	if ($isKey !== true) {
		echo "\t\t\t<td><?php echo __('" . Inflexao::acentos(Inflector::humanize($field)) . "'); ?></td>\n";
		echo "\t\t\t<td>\n\t\t\t<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>\n\t\t\t&nbsp;\n\t\t</td>\n";
	}
	echo "\t\t</tr>";	
}
?>
        </tbody>	
	</table>	
</div>




<!-- inicio -->
<?php
if (!empty($associations['hasOne'])) :
	foreach ($associations['hasOne'] as $alias => $details): ?>
	<div class="related">
		<h3><?php echo "<?php echo __('" . Inflexao::acentos(Inflector::humanize($details['controller'])) . " relacionados');?>";?></h3>
	<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])):?>\n";?>
		<dl>
	<?php
			foreach ($details['fields'] as $field) {
				echo "\t\t<dt><?php echo __('" . Inflexao::acentos(Inflector::humanize($field)) . "');?></dt>\n";
				echo "\t\t<dd>\n\t<?php echo \${$singularVar}['{$alias}']['{$field}'];?>\n&nbsp;</dd>\n";
			}
	?>
		</dl>
	<?php echo "<?php endif; ?>\n";?>
		<div class="actions">
			<ul>
				<li><?php echo "<?php echo \$this->Html->link(__('Editar " . Inflexao::acentos(Inflector::humanize(Inflector::underscore($alias))) . "'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?></li>\n";?>
			</ul>
		</div>
	</div>
	<?php
	endforeach;
endif;

if (empty($associations['hasMany'])) {
	$associations['hasMany'] = array();
}
if (empty($associations['hasAndBelongsToMany'])) {
	$associations['hasAndBelongsToMany'] = array();
}

$relations = array_merge($associations['hasMany'], $associations['hasAndBelongsToMany']);
$i = 0;
foreach ($relations as $alias => $details):
	$otherSingularVar = Inflector::variable($alias);
	$otherPluralHumanName = Inflexao::acentos(Inflector::humanize($details['controller']));
	?>
	
    <div class="related ym-cbox">
	<h3><?php echo "<?php echo __('" . $otherPluralHumanName . " relacionados');?>";?></h3>
	<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])):?>\n";?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
<?php
			foreach ($details['fields'] as $field) {
			    if(in_array($field, array('created', 'modified', 'updated', 'inativo'))) { continue; }
				echo "\t\t<th><?php echo __('" . Inflexao::acentos(Inflector::humanize($field)) . "'); ?></th>\n";
			}
?>
		<th class="actions"><?php echo "<?php echo __('Ações');?>";?></th>
	</tr>
<?php
echo "\t<?php
		foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}): ?>\n";
		echo "\t\t<tr>\n";
				foreach ($details['fields'] as $field) {
				if(in_array($field, array('created', 'modified', 'updated', 'inativo'))) { continue; }
					echo "\t\t\t<td><?php echo \${$otherSingularVar}['{$field}'];?></td>\n";
				}

				echo "\t\t\t<td class=\"actions\">\n";
				echo "\t\t\t\t<?php echo \$this->Html->link(__('Ver'), array('controller' => '{$details['controller']}', 'action' => 'view', \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\n";
				echo "\t\t\t\t<?php echo \$this->Html->link(__('Editar'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\n";
				echo "\t\t\t\t<?php echo \$this->Form->postLink(__('Excluir'), array('controller' => '{$details['controller']}', 'action' => 'delete', \${$otherSingularVar}['{$details['primaryKey']}']), null, __('Você tem certeza que deseja excluir o # %s?', \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\n";
				echo "\t\t\t</td>\n";
			echo "\t\t</tr>\n";

echo "\t<?php endforeach; ?>\n";
?>
	</table>
	
	<?php echo "<?php echo \$this->Html->link(__('Novo " . Inflexao::acentos(Inflector::humanize(Inflector::underscore($alias))) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'), array('class'=>'ym-button'));?>";?> 
	
	<?php echo "<?php endif; ?>\n\n"; ?>
	
	</div>
	
	

<?php endforeach;?>
<!-- fim -->















</div>
<div class="ym-col3" >
    <div class="actions ym-cbox">    
      <h6><?php echo "<?php echo __('Ações'); ?>"; ?></h6>
	  
<?php
	echo "\t\t<?php echo \$this->Html->link(__('Editar " . Inflexao::acentos($singularHumanName) ."'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class'=>'ym-button')); ?> \n";
	echo "\t\t<?php echo \$this->Form->postLink(__('Excluir " . Inflexao::acentos($singularHumanName) . "'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class'=>'ym-button'), __('Você tem certeza que deseja excluir o # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?> \n";
	echo "\t\t<?php echo \$this->Html->link(__('Listar " . Inflexao::acentos($pluralHumanName) . "'), array('action' => 'index'), array('class'=>'ym-button')); ?> \n";
	echo "\t\t<?php echo \$this->Html->link(__('Novo " . Inflexao::acentos($singularHumanName) . "'), array('action' => 'add'), array('class'=>'ym-button')); ?> \n";

	$done = array();
	foreach ($associations as $type => $data) {
		foreach ($data as $alias => $details) {
			if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
			    echo "<?php echo __('<h6>" . Inflexao::acentos(Inflector::humanize($details['controller'])) . "</h6>'); ?>"; 
				echo "\t\t<?php echo \$this->Html->link(__('Listar " . Inflexao::acentos(Inflector::humanize($details['controller'])) . "'), array('controller' => '{$details['controller']}', 'action' => 'index'), array('class'=>'ym-button')); ?> \n";
				echo "\t\t<?php echo \$this->Html->link(__('Novo " .  Inflexao::acentos(Inflector::humanize(Inflector::underscore($alias))) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'), array('class'=>'ym-button')); ?> \n";
				$done[] = $details['controller'];
			}
		}
	}
?>
   </div>
</div>
</div>









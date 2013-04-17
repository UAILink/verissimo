<div class="ym-column">
    <div class="ym-col1" >
        <div class="imoveis index ym-cbox">
	        <h2><?php echo __('Imoveis');?></h2>
	        <table cellpadding="0" cellspacing="0">
	        <tr>
	        		        <th><?php echo $this->Paginator->sort('id');?></th>
	        		        <th><?php echo $this->Paginator->sort('preco');?></th>	        		        
	        		        <th><?php echo $this->Paginator->sort('tipo_imovel_id');?></th>
	        		        <th><?php echo $this->Paginator->sort('situacao_imovel_id');?></th>
	        		        <th><?php echo $this->Paginator->sort('quartos');?></th>
	        		        <th><?php echo $this->Paginator->sort('suites');?></th>	        		        
	        		        <th><?php echo $this->Paginator->sort('area_construida');?></th>
	        		        <th><?php echo $this->Paginator->sort('bairro_id');?></th>	        		        
	        		        <th class="actions"><?php echo __('Ações');?></th>
	        </tr>
	        <?php foreach ($imoveis as $imovel):  ?>
	<tr>
		<td><?php echo h($imovel['Imovel']['id']); ?>&nbsp;</td>
		<td><?php echo h($imovel['Imovel']['preco']); ?>&nbsp;</td>
		
		<td>
			<?php echo $this->Html->link($imovel['TipoImovel']['descricao'], array('controller' => 'tipo_imoveis', 'action' => 'view', $imovel['TipoImovel']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($imovel['SituacaoImovel']['descricao'], array('controller' => 'situacao_imoveis', 'action' => 'view', $imovel['SituacaoImovel']['id'])); ?>
		</td>
		<td><?php echo h($imovel['Imovel']['quartos']); ?>&nbsp;</td>
		<td><?php echo h($imovel['Imovel']['suites']); ?>&nbsp;</td>
		<td><?php echo h($imovel['Imovel']['area_construida']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($imovel['Bairro']['nome_bairro'], array('controller' => 'bairros', 'action' => 'view', $imovel['Bairro']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $imovel['Imovel']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $imovel['Imovel']['id'])); ?>
			<?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $imovel['Imovel']['id']), null, __('Você tem certeza que deseja excluir o # %s?', $imovel['Imovel']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	        </table>
	        <p>
	        <?php
	        echo $this->Paginator->counter(array(
	        'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count}, começando no registro {:start}, e terminando no {:end}')
	        ));
	        ?>	        </p>

	        <div class="paging">
	        <?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('próxima') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	        </div>
        </div>
    </div>
    <div class="ym-col3">
        <div class="actions ym-cbox">
	        <h3><?php echo __('Ações'); ?></h3>
	        
		        <?php echo $this->Html->link(__('Novo Imovel'), array('action' => 'add'), array('class'=>'ym-button')); ?>        		<?php echo $this->Html->link(__('Listar Tipo Imoveis'), array('controller' => 'tipo_imoveis', 'action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Tipo Imovel'), array('controller' => 'tipo_imoveis', 'action' => 'add'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Listar Situação Imoveis'), array('controller' => 'situacao_imoveis', 'action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Situação Imovel'), array('controller' => 'situacao_imoveis', 'action' => 'add'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Listar Bairros'), array('controller' => 'bairros', 'action' => 'index'), array('class'=>'ym-button')); ?> 
		<?php echo $this->Html->link(__('Novo Bairro'), array('controller' => 'bairros', 'action' => 'add'), array('class'=>'ym-button')); ?> 
	        </ul>
        </div>
    </div>
</div>

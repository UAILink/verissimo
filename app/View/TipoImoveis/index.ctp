<div class="ym-column">
    <div class="ym-col1" >
        <div class="tipoImoveis index ym-cbox">
	        <h2><?php echo __('Tipo Imoveis');?></h2>
	        <table cellpadding="0" cellspacing="0">
	        <tr>
	        		        <th><?php echo $this->Paginator->sort('id');?></th>
	        		        <th><?php echo $this->Paginator->sort('descricao');?></th>
	        		        <th><?php echo $this->Paginator->sort('inativo');?></th>
	        		        <th class="actions"><?php echo __('Ações');?></th>
	        </tr>
	        <?php foreach ($tipoImoveis as $tipoImovel): ?>
	<tr>
		<td><?php echo h($tipoImovel['TipoImovel']['id']); ?>&nbsp;</td>
		<td><?php echo h($tipoImovel['TipoImovel']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($tipoImovel['TipoImovel']['inativo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $tipoImovel['TipoImovel']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $tipoImovel['TipoImovel']['id'])); ?>
			<?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $tipoImovel['TipoImovel']['id']), null, __('Você tem certeza que deseja excluir o # %s?', $tipoImovel['TipoImovel']['id'])); ?>
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
	        
		        <?php echo $this->Html->link(__('Novo Tipo Imovel'), array('action' => 'add'), array('class'=>'ym-button')); ?>        	        </ul>
        </div>
    </div>
</div>

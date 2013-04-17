<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>



<div class="ym-grid">

    <div class="ym-g33 ym-gl" >
        <div class="actions ym-cbox">    
           <h5><?php echo $imovel['TipoImovel']['descricao'] .' <br/> '. $imovel['Bairro']['nome_bairro']. ', '. $imovel['Bairro']['Cidade']['nome_cidade'] ?> </h5>
           <span>Código do Imóvel: <?php echo $imovel['Imovel']['id'] ?></span>
           <div class="flexslider" >
              <ul class="slides">      
              <?php foreach($files as $value) {?>  
                <li data-thumb="<?php echo $this->request->webroot . 'img/imoveis/thumb_'.$value ?>">
                  <?php echo $this->Html->image('imoveis/'.$value) ?>
                </li>
              <?php }  ?>      
              </ul>
           </div>
           
           <h5>Mais Opções:</h5>
           
           <a href="#" class="ym-button ym-like" style="width: 15em">Gostei</a> <br/>
           <a href="#" class="ym-button ym-email" style="width: 15em">Enviar Por Email</a> <br/>
           
           <h5>Filtro Rápido:</h5>
           
           <a href="#" class="ym-button ym-add" style="width: 15em">Ver Imóveis Neste Bairro</a> <br/>
           <a href="#" class="ym-button ym-add" style="width: 15em">Ver Imóveis Nesta Cidade</a> <br/>
           <a href="#" class="ym-button ym-add" style="width: 15em">Ver Imóveis Iguais</a> <br/>
           <a href="#" class="ym-button ym-add" style="width: 15em">Ver Imóveis Próximo</a> <br/>
           
        </div>
    </div>


      <div class="ym-g33 ym-gl" >
        <div class="imoveis view ym-gbox">
        
        <div class="center">
            <h5><?php echo "Venda: " . $this->Formatacao->moeda($imovel['Imovel']['preco']); ?></h5>
            <span><?php echo "Area: " . $imovel['Imovel']['area_construida'] ?></span>
        </div>


          <table class="narrow">
	         <thead>
	            <tr>
	              <td width="37%">Campo</td>
	              <td width="63%">Descrição</td>
	            </tr>
	          </thead>
	          <tbody>
			    <tr>			<td><?php echo __('Id'); ?></td>
			    <td>
			    <?php echo h($imovel['Imovel']['id']); ?>
			    &nbsp;
		    </td>
		    </tr>		<tr>			<td><?php echo __('Preco'); ?></td>
			    <td>
			    <?php echo h($imovel['Imovel']['preco']); ?>
			    &nbsp;
		    </td>
		    </tr>		<tr>			<td><?php echo __('Quartos'); ?></td>
			    <td>
			    <?php echo h($imovel['Imovel']['quartos']);  ?>
			    &nbsp;
		    </td>
		    </tr>		<tr>			<td><?php echo __('Tipo Imovel'); ?></td>
			    <td>
			    <?php echo $this->Html->link($imovel['TipoImovel']['descricao'], array('controller' => 'tipo_imoveis', 'action' => 'view', $imovel['TipoImovel']['id'])); ?>
			    &nbsp;
		    </td>
		    </tr>		<tr>			<td><?php echo __('Situação Imovel'); ?></td>
			    <td>
			    <?php echo $this->Html->link($imovel['SituacaoImovel']['descricao'], array('controller' => 'situacao_imoveis', 'action' => 'view', $imovel['SituacaoImovel']['id'])); ?>
			    &nbsp;
		    </td>
		    </tr>		<tr>			<td><?php echo __('Suites'); ?></td>
			    <td>
			    <?php echo h($imovel['Imovel']['suites']); ?>
			    &nbsp;
		    </td>
		    </tr>		<tr>			<td><?php echo __('Vagas Garagem'); ?></td>
			    <td>
			    <?php echo h($imovel['Imovel']['vagas_garagem']); ?>
			    &nbsp;
		    </td>
		    </tr>		<tr>			<td><?php echo __('Banheiros'); ?></td>
			    <td>
			    <?php echo h($imovel['Imovel']['banheiros']); ?>
			    &nbsp;
		    </td>
		    </tr>		<tr>			<td><?php echo __('Area Construida'); ?></td>
			    <td>
			    <?php echo h($imovel['Imovel']['area_construida']); ?>
			    &nbsp;
		    </td>
		    </tr>		<tr>			<td><?php echo __('Bairro'); ?></td>
			    <td>
			    <?php echo $this->Html->link($imovel['Bairro']['nome_bairro'], array('controller' => 'bairros', 'action' => 'view', $imovel['Bairro']['id'])); ?>
			    &nbsp;
		    </td>
		    </tr>		
		    <tr>
		    <td  colspan="2">
    			<strong><?php echo __('Descrição'); ?></strong><br/>
			    <?php echo h($imovel['Imovel']['descricao']); ?>
			    &nbsp;
		    </td>
		    </tr>		   
		    </tbody>	
	    </table>	
	    <br/>
	    <iframe width="360" height="360" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.br/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=rua+bar%C3%A3o+homem+de+melo&amp;aq=&amp;sll=-18.577962,-45.451757&amp;sspn=9.46728,15.073242&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=R.+Bar%C3%A3o+Homem+de+Melo+-+Nova+Su%C3%ADssa,+Belo+Horizonte+-+Minas+Gerais,+30460-015&amp;ll=-19.935027,-43.973808&amp;spn=0.024206,0.025749&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com.br/maps?f=q&amp;source=embed&amp;hl=pt-BR&amp;geocode=&amp;q=rua+bar%C3%A3o+homem+de+melo&amp;aq=&amp;sll=-18.577962,-45.451757&amp;sspn=9.46728,15.073242&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=R.+Bar%C3%A3o+Homem+de+Melo+-+Nova+Su%C3%ADssa,+Belo+Horizonte+-+Minas+Gerais,+30460-015&amp;ll=-19.935027,-43.973808&amp;spn=0.024206,0.025749&amp;z=14&amp;iwloc=A" style="color:#0000FF;text-align:left">Exibir mapa ampliado</a></small>
           
    </div>
    </div>
    
    <div class="ym-g33 ym-gr" >
        <div class="imoveis view ym-gbox">
            
			<form name="frmCadastro" class="ym-form ym-full box ">
			    <h5>Entre em contato!</h5>
			    <div class="ym-fbox-text">
                  <label for="txtnome">Nome:</label>
                  <input type="text" name="nome" id="txtnome" size="20" />
                </div>
                <div class="ym-fbox-text">
                  <label for="txtemail">Email</label>
                  <input type="text" name="email" id="txtemail" size="20" />
                </div>
                <div class="ym-fbox-text">
                  <label for="txtemail">Telefone</label>
                  <input type="text" name="email" id="txtemail" size="20" />
                </div>
                <div class="ym-fbox-text">
                  <label for="txtemail">Mensagem</label>
                  <textarea name="your-id" id="your-id" cols="30" rows="7"></textarea>
                </div>
                <div class="ym-fbox-check">                              
                  <input type="checkbox" name="novidades" id="chknovidades" size="20" />
                  <label for="chknovidades">Quero receber novidades por email</label>
                </div>		
                <div class="ym-fbox-button">
                    <input type="button" class="ym-button ym-email" value="Entrar em Contato" id="submit" name="Contato" />          
                </div>				
			</form>
        
        </div>
    </div>

</div>
</div>











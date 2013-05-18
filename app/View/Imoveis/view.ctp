<?php 

$this->Html->script('http://maps.google.com/maps/api/js?key=AIzaSyBGT79kf9cJhBhqJGIZDHehUQ-3t7uH33g&sensor=true', false); 

$pesquisarUrl = $this->Html->url(
		array(
				'controller'=>'/imoveis',
				'action'=>'pesquisar'
		),
		true
);

$emailUrl = $this->Html->url(
		array(
				'controller'=>'/imoveis',
				'action'=>'sendEmail'
		),
		true
);

$likeUrl = $this->Html->url(
		array(
				'controller'=>'/imoveis',
				'action'=>'like'
		),
		true
);

$contatoUrl = $this->Html->url(
		array(
				'controller'=>'/imoveis',
				'action'=>'contato'
		),
		true
);

?>

<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });

  $('#linkFiltroBairro').on('click', function(){
	  $('#frmFiltroRapidoBairro').submit();
  });

  $('#linkFiltroCidade').on('click', function(){
	  $('#frmFiltroRapidoCidade').submit();
  });

  $('#linkFiltroIguais').on('click', function(){
	  $('#frmFiltroRapidoIguais').submit();
  });

  $('#linkFiltroProximo').on('click', function(){
	  $('#frmFiltroRapidoProximo').submit();
  });
  
  $('#btn-send-email').on('click', function(e){
      e.preventDefault();
      
	  $.ajax({
          type: "POST",
          url: "<?php echo $emailUrl ; ?>",
          data: { mailTo: $('#txt_mail_to').val(), mailName: $('#txt_mail_name').val(), fileName: "<?php echo $files[0]; ?>"}
            }).done(function( msg ) {
              
            });
     $('#myModal').closeModal();
  });
  
  
   $('#btn-send-like').on('click', function(e){
      e.preventDefault();
      
	  $.ajax({
          type: "POST",
          url: "<?php echo $likeUrl ; ?>",
          data: { imovelId: <?php echo $imovel['Imovel']['id']?>}
            }).done(function( msg ) {
              
            });
     $('#likeModal').closeModal();
  });
  
  $('#btnEnviarContato').on('click', function(e){
      e.preventDefault();
      $('#contatoModal').reveal();
	  $.ajax({
          type: "POST",
          url: "<?php echo $contatoUrl ; ?>",
          data: $('#frmContato').serialize()
          }).done(function( msg ) {
              
      });
      $('#frmContato')[0].reset();
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
              <?php foreach($files as $value) { ?>  
                <li data-thumb="<?php echo $this->request->webroot . 'img/imoveis/thumb_'.$value ?>">
                  <?php echo $this->Html->image('imoveis/'.$value) ?>
                </li>
              <?php }  ?>      
              </ul>
           </div>
           
           <h5>Mais Opções:</h5>
           
           <a href="#" data-reveal-id="likeModal" id="sendLike" class="ym-button ym-like" style="width: 15em">Gostei</a> <br/>
           <a href="#" data-reveal-id="myModal" id="sendEmail" class="ym-button ym-email" style="width: 15em">Enviar Por Email</a> <br/>
                      
           <h5>Filtro Rápido:</h5>
           <form id="frmFiltroRapidoBairro" action="<?php echo $pesquisarUrl; ?>" method="post">
           		<input type="hidden" name="bairro_id" value="<?php echo $imovel['Imovel']['bairro_id']; ?>" />
           		<a  id="linkFiltroBairro" href="#" class="ym-button ym-add" style="width: 15em">Ver Imóveis Neste Bairro</a> <br/>
           </form>
           <form id="frmFiltroRapidoCidade" action="<?php echo $pesquisarUrl; ?>" method="post">
           		<input type="hidden" name="cidade_id" value="<?php echo $imovel['Imovel']['cidade_id']?>" />
           		<a id="linkFiltroCidade" href="#" class="ym-button ym-add" style="width: 15em">Ver Imóveis Nesta Cidade</a> <br/>
           </form>
           <form id="frmFiltroRapidoIguais" action="<?php echo $pesquisarUrl; ?>" method="post">
           		<input type="hidden" name="cidade_id" value="<?php echo $imovel['Imovel']['cidade_id']?>" />
           		<input type="hidden" name="tipo_imovel_id" value="<?php echo $imovel['TipoImovel']['id']?>" />           		
           		<a id="linkFiltroIguais" href="#" class="ym-button ym-add" style="width: 15em">Ver Imóveis Iguais</a> <br/>
           </form>
           <form id="frmFiltroRapidoProximo" action="<?php echo $pesquisarUrl; ?>" method="post">
           		<input type="hidden" name="cidade_id" value="<?php echo $imovel['Imovel']['cidade_id']?>" />
           		<a id="linkFiltroProximo" href="#" class="ym-button ym-add" style="width: 15em">Ver Imóveis Próximo</a> <br/>
           </form>
           
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
		    </tr>		
		    <tr>			<td><?php echo __('Bairro'); ?></td>
			    <td>
			    <?php echo $this->Html->link($imovel['Bairro']['nome_bairro'], array('controller' => 'bairros', 'action' => 'view', $imovel['Bairro']['id'])); ?>
			    &nbsp;
		    </td>
		    </tr>		
		    <tr>
		    	<td><?php echo __('Logradouro'); ?></td>
			    <td>
			    <?php echo h($imovel['Imovel']['logradouro']); ?>
			    &nbsp;
		    </td>
		    <tr>
		    	<td><?php echo __('Numero'); ?></td>
			    <td>
			    <?php echo h($imovel['Imovel']['numero']); ?>
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
	    
	    <!-- GOOGLE MAPS -->       
	    <?PHP 
	    
	    // Override any of the following default options to customize your map
	    $map_options = array(
	    		'id' => 'map_canvas',
	    		'width' => '350px',
	    		'height' => '400px',
	    		'style' => '',
	    		'zoom' => 16,
	    		'type' => 'ROADMAP',
	    		'custom' => null,
	    		'localize' => false,	  
	    		'address' => $imovel['Imovel']['logradouro']. ' '. $imovel['Imovel']['numero']. ', '. $imovel['Bairro']['nome_bairro']. ', '. $imovel['Bairro']['Cidade']['nome_cidade'],
	    		'marker' => true,
	    		'markerTitle' => 'Clique para ver detalhes',
	    		'markerIcon' => 'http://google-maps-icons.googlecode.com/files/home.png',
	    		'markerShadow' => 'http://google-maps-icons.googlecode.com/files/shadow.png',
	    		'infoWindow' => true,
	    		'windowText' => '<strong>Endereço do Imóvel</strong>: ' . $imovel['Imovel']['logradouro']. ' '. $imovel['Imovel']['numero']. ', '. $imovel['Bairro']['nome_bairro']. ', '. $imovel['Bairro']['Cidade']['nome_cidade']
	    );
	    
	    echo $this->GoogleMap->map($map_options); 
	    ?>
	    
	               
    </div>
    </div>
    
    <div class="ym-g33 ym-gr" >
        <div class="imoveis view ym-gbox">
            
			<form name="frmContato" id="frmContato" class="ym-form ym-full box ">
			    <h5>Entre em contato!</h5>
			    <div class="ym-fbox-text">
                  <label for="txtnome">Nome:</label>
                  <input type="text" name="nome" id="txtnome" size="20" />
                </div>
                <div class="ym-fbox-text">
                  <label for="txtemail">Email</label>
                  <input type="text" name="email" id="txtemail" size="20" alt="email"/>
                </div>
                <div class="ym-fbox-text">
                  <label for="txtemail">Telefone</label>
                  <input type="text" name="telefone" id="txtemail" size="20" alt="phone" />
                </div>
                <div class="ym-fbox-text">
                  <label for="txtemail">Mensagem</label>
                  <textarea name="mensagem" id="txtMensagem" cols="30" rows="7"></textarea>
                </div>
                <div class="ym-fbox-check">                              
                  <input type="checkbox" name="newsletter" id="chknovidades" size="20" value="SIM" />
                  <label for="chknovidades">Quero receber novidades por email</label>
                </div>		
                <div class="ym-fbox-button">
                    <input type="button" data-reveal-id="contatoModal" class="ym-button ym-email" value="Entrar em Contato" id="btnEnviarContato" name="Contato" />          
                </div>				
			</form>
        
        </div>
    </div>

</div>
</div>

<div id="myModal" class="reveal-modal ym-form ym-full box">           
   <a class="close-reveal-modal">&#215;</a> 
    <h3>Enviar por email</h3>
    <p>Os dados deste imóvel serão enviados para o email abaixo:</p>                
    <div class="ym-fbox-text">
      <label for="txt-mail-name">Informe Seu Nome:</label>
      <input type="text" name="email-name" id="txt_mail_name" size="20" />
    </div>               	
   	<div class="ym-fbox-text">
      <label for="txtnome">Enviar para o Email:</label>
      <input type="text" name="email-to" id="txt_mail_to" size="20" />
    </div>               	
   	<div class="ym-fbox-button">
        <input type="button" class="ym-button ym-email" value="Enviar Email" id="btn-send-email" name="btnSendEmail" />          
    </div>	          
</div>

<div id="likeModal" class="reveal-modal ym-form ym-full box">           
   <a class="close-reveal-modal">&#215;</a> 
    <h3>Anotação realizada</h3>
    <p>Obrigado por nos informar sobre sua preferência.</p>                
    <p>Vamos usar essas informações para sugerir outros imóveis mais dentro do perfil dos imóveis que você gosta.</p>
    <p>Sempre que você ver um imóvel que ache interessante clique no botão 'Gostei'.</p>                                        
   	<div class="ym-fbox-button">
        <input type="button" class="ym-button ym-email" value="Enviar" id="btn-send-like" name="btnSendLike" />          
    </div>	          
</div>

<div id="contatoModal" class="reveal-modal ym-form ym-full box">           
   <a class="close-reveal-modal">&#215;</a> 
    <h3>Contato realizado</h3>
    <p>Obrigado pelo seu interesse.</p>                
    <p>Seu email foi enviado para o setor responsável e logo logo será respondido.</p>
    <p>Você tambem pode entrar em contato conosco sempre que desejar pelo email <a href="mailto:contato@imobiliariaverissimo.com.br">contato@imobiliariaverissimo.com.br</a></p>                                           	
</div>









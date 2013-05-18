<div class="ym-wbox">
<h3>Painel de Administração</h3>
<p>Usuário: <?php echo $user_name . " (". $user_email . ")";?></p>

</div>

<div class="ym-grid">
	<div class="ym-g20 ym-gl">
		<div class="ym-gbox">	
		<div class="box info">	
		<?php 
			echo $this->Html->image('home.png', array('alt' => 'Sua Casa', 'width' => '150px', 'height' => '150px')) ;
			echo $this->Html->link("Gerenciar Imóveis", $this->SiteURL->Imoveis(), array("class"=>"ym-button center"));
		?>
		</div>
		</div>
	</div>
	
	<div class="ym-g20 ym-gl">
		<div class="ym-gbox">
		<div class="box info">		
		<?php 
			echo $this->Html->image('maps.jpg', array('alt' => 'Sua Casa', 'width' => '150px', 'height' => '150px'));
			echo $this->Html->link("Gerenciar Bairros", $this->SiteURL->Bairros(), array("class"=>"ym-button center"));
		?>
		</div>
		</div>
	</div>
	
	<div class="ym-g20 ym-gl">
		<div class="ym-gbox">	
		<div class="box info">	
		<?php 
			echo $this->Html->image('home_blue.png', array('alt' => 'Sua Casa', 'width' => '150px', 'height' => '150px'));
			echo $this->Html->link("Gerenciar Tipos", $this->SiteURL->TipoImoveis(), array("class"=>"ym-button center"));
		?>
		</div>
		</div>
	</div>
	
	<div class="ym-g20 ym-gl">
		<div class="ym-gbox">
		<div class="box info">		
		<?php 
			echo $this->Html->image('status.png', array('alt' => 'Sua Casa', 'width' => '150px', 'height' => '150px'));
			echo $this->Html->link("Gerenciar Situações", $this->SiteURL->SituacaoImoveis(), array("class"=>"ym-button center"));
		?>
		</div>
		</div>
	</div>
	
	<div class="ym-g20 ym-gr">
		<div class="ym-gbox">	
		<div class="box info">
			<?php 
			echo $this->Html->image('user.png', array('alt' => 'Sua Casa', 'width' => '150px', 'height' => '150px'));
			echo $this->Html->link("Gerenciar Usuarios", $this->SiteURL->Usuarios(), array("class"=>"ym-button center"));
			?>
		</div>	
		</div>
	</div>

</div>




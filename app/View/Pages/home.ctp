<?php
$this->set('title_for_layout', 'Home');
?>

<section class="box info">
				<div class="ym-grid linearize-level-1">
					<div class="ym-g66 ym-gl">

						<div class="ym-grid linearize-level-2">
							<article class="ym-g50 ym-gl">
								<div class="ym-gbox-left">
									<h4>Como escolher um Imóvel</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
									<a class="ym-button ym-next" href="#">Leia mais</a> </div>
							</article>
							<article class="ym-g50 ym-gr">
								<div class="ym-gbox">
									<h4>Entenda a taxa de registro</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
									<a class="ym-button ym-next" href="#">Leia mais</a> </div>
							</article>
						</div>

					</div>
					<article class="ym-g33 ym-gr">
						<div class="ym-gbox-right secondary">
							<?php echo $this->Html->image('imobiliaria2.jpg', array('alt' => 'Sua Casa')) ?>
						</div>
					</article>
				</div>
			</section>

			<section class="ym-grid linearize-level-1">
				<div class="ym-g66 ym-gl content">
					<div class="ym-gbox-left ym-clearfix">
					
					    <?php 
					    
					    echo $this->element('euquero', array ( "titulo" => "Eu Quero!")); 
					    
					    echo $this->element('novidades', array ( "titulo" => "Novidades"));
					    
					    ?>					    			    
					      					
					</div>						
				</div>
				<aside class="ym-g33 ym-gr">
					<div class="ym-gbox-right ym-clearfix">
						
						<?php  if(isset($user_name))
							 echo $this->element('login_cadastro', compact('user_name', 'user_email', 'user_login'));
						     else echo $this->element('login_cadastro');
						?>
						
					</div>
				</aside>
			</section>

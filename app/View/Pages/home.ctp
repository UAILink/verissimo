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
						
						<h3>Fazer Login</h3>
						<p style="font-size: smaller">Já é um usuário cadastrado? Entre aqui e tenha acesso a área restrita.</p>
						<form name="frmLogin" class="ym-form ym-full box ">
						    <div class="ym-fbox-text">
                              <label for="txtusuario">Nome:</label>
                              <input type="text" name="usuario" id="txtusuario" size="20" />
                            </div>
                            <div class="ym-fbox-text">
                              <label for="txtpass">Email</label>
                              <input type="password" name="password" id="txtpass" size="20" />
                            </div>
                            <div class="ym-fbox-button">
                                <input type="button" class="ym-button" value="Entrar" id="submit" name="Entrar" />          
                            </div>					
						</form>
						
						<h3>Cadastre-se!</h3>
						<p style="font-size: smaller">Usuários cadastrados recebem em primeira mão novidades sobre novos imóveis a venda 1 semana antes de estarem disponíveis para usuários não cadastrados. Faça parte desse grupo, cadastre-se agora!</p>
						
						<form name="frmCadastro" class="ym-form ym-full box ">
						    <div class="ym-fbox-text">
                              <label for="txtnome">Nome:</label>
                              <input type="text" name="nome" id="txtnome" size="20" />
                            </div>
                            <div class="ym-fbox-text">
                              <label for="txtemail">Email</label>
                              <input type="text" name="email" id="txtemail" size="20" />
                            </div>
                            <div class="ym-fbox-check">                              
                              <input type="checkbox" name="novidades" id="chknovidades" size="20" />
                              <label for="chknovidades">Quero receber novidades por email</label>
                            </div>		
                            <div class="ym-fbox-button">
                                <input type="button" class="ym-button" value="Cadastrar" id="submit" name="Cadastrar" />          
                            </div>				
						</form>
						
					</div>
				</aside>
			</section>

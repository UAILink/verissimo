<?php if(!isset($user_name)):?>

<h3>Cadastre-se!</h3>
<p style="font-size: smaller">Usuários cadastrados recebem em primeira
	mão novidades sobre novos imóveis a venda 1 semana antes de estarem
	disponíveis para usuários não cadastrados. Faça parte desse grupo,
	cadastre-se agora!</p>

<form name="frmCadastro" class="ym-form ym-full box" method="post"
	action="<?php echo $this->SiteURL->userAdd()?>">

	<div class="ym-fbox-text">
		<label for="txtnome">Nome:</label> <input type="text"
			name="data[User][nome]" id="txtnome" size="20" />
	</div>
	<div class="ym-fbox-text">
		<label for="txtnome">Sobrenome:</label> <input type="text"
			name="data[User][sobrenome]" id="txtsobrenome" size="20" />
	</div>
	<div class="ym-fbox-text">
		<label for="txtusuario">Login:</label> <input type="text"
			name="data[User][username]" id="txtusuario" size="20" />
	</div>
	<div class="ym-fbox-text">
		<label for="txtpass">Senha</label> <input type="password"
			name="data[User][password]" id="txtpass" size="20" />
	</div>
	<div class="ym-fbox-text">
		<label for="txtemail">Email</label> <input type="text"
			name="data[User][email]" id="txtemail" size="20" />
	</div>
	<div class="ym-fbox-check">
		<input type="checkbox" name="data[User][novidades]" id="chknovidades"
			size="20" /> <label for="chknovidades">Quero receber novidades por
			email</label>
	</div>
	<div class="ym-fbox-button">
		<input type="submit" class="ym-button" value="Cadastrar" id="submit"
			name="Cadastrar" />
	</div>
</form>
<h3>Fazer Login</h3>
<p style="font-size: smaller">Já é um usuário cadastrado? Entre aqui e
	tenha acesso a área restrita.</p>
<form name="frmLogin" class="ym-form ym-full box " method="post"
	action="<?php echo $this->SiteURL->userLogin()?>">
	<div class="ym-fbox-text">
		<label for="txtusuario">Nome:</label> <input type="text"
			name="data[User][username]" id="txtusuario" size="20" />
	</div>
	<div class="ym-fbox-text">
		<label for="txtpass">Senha</label> <input type="password"
			name="data[User][password]" id="txtpass" size="20" />
	</div>
	<div class="ym-fbox-button">
		<input type="submit" class="ym-button" value="Entrar" id="submit"
			name="Entrar" />
	</div>
</form>

<?php else:?>

<h3>Você está logado! (<a href="<?php echo $this->SiteURL->userLogout()?>">Sair</a>)</h3>
<ul>
<li><strong>Usuário: </strong><?php echo $user_login;?></li>
<li><strong>Nome: </strong><?php echo $user_name;?></li>
<li><strong>Email: </strong><?php echo $user_email;?></li>
</ul>


<?php endif;?>



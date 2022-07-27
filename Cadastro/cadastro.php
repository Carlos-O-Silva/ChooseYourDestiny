<!DOCTYPE html>
<?php
include '../conexao.php';
?>
<html>

<head>
	<title>Cadastro</title>
	<link href="../cadastro/style.css" rel="stylesheet">
	<link href="../Login/fonts.css" rel="stylesheet">
	<link href="modal.css" rel="stylesheet">
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</head>

<body>
	<header>
		<div id="title">
			<a href="../Home/index.php">
				<h1>Choose Your <br> Destiny</h1>
			</a>
		</div>

		<ul>
			<a href="../home/index.php">
				<li>Início</li>
			</a>
			<a href="../sobre/index.php">
				<li>Sobre</li>
			</a>
			<a href="../Login/login.php" id="inscreva-se-btn">
				<li>Já tem uma conta?</li>
			</a>
		</ul>
	</header>
	<div class="wrapper">
		<div class="r_form_wrap">

			<div class="title">
				<p>Cadastrar</p>
			</div>

			<div class="r_form">
				<form action="cadastrar.php" method="post">
					<div class="input_wrap">
						<label for="yourname">Nome</label>
						<div class="input_item">
							<span class="icon">
								<ion-icon name="person-sharp"></ion-icon>
							</span>
							<input type="text" name="Usu_nickname" maxlength="45" class="input" id="Usu_nickname" required>
						</div>

						<label for="emailaddress">Email</label>
						<div class="input_item">
							<span class="icon">
								<ion-icon name="mail-sharp"></ion-icon>
							</span>
							<input type="text" name="Usu_email" maxlength="256" class="input" id="Usu_email" required>
						</div>

						<label for="Usu_senha">Senha</label>
						<div class="input_item">
							<span class="icon">
								<ion-icon name="key-sharp"></ion-icon>
							</span>
							<input type="password" name="Usu_senha" minlength="8" maxlength="45" class="input" id="Usu_senha" required>

						</div>

					</div>
					<div>
						<input type="checkbox" id="checkbox" name="checkbox" required>
						<label><strong>Eu li e concordo com os termos de uso </strong></label>
						<br><br>
					</div>
					<button type="submit">Registrar</button>
					<br><br>
					<a href="#modal_1" class="btn">Termos de Uso</a>
				</form>
			</div>
		</div>
	</div>
	<div id="modal_1" class="modal">
		<div class="modal__content">
			<h2 class="modal__title">Termos de Uso</h2>
			<p class="modal__description">
				<b>Modelo de Política de Privacidade da plataforma Choose Your Destiny</b>
				<br><br>
				Ao apertar em aceitar, você concorda que se infligir qualquer regra da nossa plataforma inserida em nossa plataforma, teremos todo e qualquer acesso para excluir o seu usuário se o mesmo não estiver de acordo com as regras da plataforma.
				<br><br>
				<b>1. Regras da Plataforma </b>
				<br><br>
				Proibido qualquer imagem de cunho pejorativo ou que venha a denegrir ou ofender qualquer usuário ou difame a plataforma nas páginas das histórias.
				<br> <br>
				Historias com cunho sexual ou pejorativo será excluída da plataforma
				<br> <br>
				Usuários com o avatar que cunho pejorativo ou não que não atenda as regras da plataforma será removido, após 3 avisos, o usuário será excluído.

			</p>
			<a href="#" class="modal__link">OK</a>
			<a href="termos.pdf" class="modal__link">Ver termos de uso completo</a>
		</div>
	</div>
	<!-- <div id="modal_2" class="modal modal--2">
        <div class="modal__content">
            <h2 class="modal__title">Termos de Uso</h2>
            <p class="modal__description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis id error accusamus pariatur quasi
                est amet maiores tempore, eum beatae expedita fugiat modi, ipsum commodi laborum voluptatem, assumenda
                et quod? lore
            </p>
            <a href="#" class="modal__link">OK</a>
			<a href="#" class="modal__link">Baixar termos de uso</a>
        </div>
    </div> -->
</body>

</html>
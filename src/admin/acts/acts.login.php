<?php
require_once("connect.php");

if(isset($_GET['act']) && !empty($_GET['act'])) {
	switch ($_GET['act']) {
	    case 'login':
			if(isset($_POST) && !empty($_POST) && $_POST["login"]) {
				$isValid = true;
				$errMsg = "";

				if(!isset($_POST["login"]) || empty($_POST["login"])) {
					$errMsg .= "Login";
					$isValid = false;
				}
				
				if(!isset($_POST["senha"]) || empty($_POST["senha"])) {
					if(!$isValid)
						$errMsg .= ", ";	
					
					$errMsg .= "Senha";
					$isValid = false;
				}

				if(!$isValid) {
					echo '{"succeed": false, "errno": 12001, "title": "Erro em um ou mais campos do formulário!", "erro": "Ocorreram erros nos seguintes campos do formulário: <b>' . $errMsg . '</b>"}';
				}
				else {
					try {
						$conn->autocommit(FALSE);

						$login = $_POST["login"];
						$senha = $_POST["senha"];
						$href = (isset($_POST["href"]) && !empty($_POST["href"])) ? $_POST["href"] : "";

						$usu_qry = $conn->query("SELECT id, usuario, senha, nivel FROM tbl_usuarios WHERE usuario = '" . $login . "'") 
										or trigger_error("12002 - " . $conn->error);

						if ($usu_qry) { 
						    if($usu_qry->num_rows === 0) {
								echo '{"succeed": false, "errno": 12003, "title": "Usuário não encontrado!", "erro": "O usuário digitado não se encontra na base de dados!"}';
								exit();
						    } else {
						        while($usuario = $usu_qry->fetch_object()) {
									$usu_id = $usuario->id;
									$usu_login = $usuario->usuario;
									$usu_senha = $usuario->senha;
									$usu_nivel = $usuario->nivel;
								}
								
								$usu_nome = $usu_login;

								$_SESSION["usu_id"] = $usu_id;
								$_SESSION["usu_login"] = $usu_login;
								$_SESSION["usu_nome"] = $usu_nome;
								$_SESSION["usu_nivel"] = $usu_nivel;								

								if(isset($_SESSION["usu_id"]) && !empty($_SESSION["usu_id"]) && 
								   isset($_SESSION["usu_login"]) && !empty($_SESSION["usu_login"]) && 
								   isset($_SESSION["usu_nivel"]) && !empty($_SESSION["usu_nivel"])) {
									echo '{"succeed": true, "href": "' . $href . '"}';

									if(isset($_POST["lembrar"]) && !empty($_POST["lembrar"]) && $_POST["lembrar"] == "on") {
										setcookie('usu_id', $_SESSION["usu_id"], (time() + (3 * 24 * 3600)), '/');
										setcookie('usu_login', $_SESSION["usu_login"], (time() + (3 * 24 * 3600)), '/');
										setcookie('usu_nome', $_SESSION["usu_nome"], (time() + (3 * 24 * 3600)), '/');
										setcookie('usu_nivel', $_SESSION["usu_nivel"], (time() + (3 * 24 * 3600)), '/');
										
									} else {
										unset($_COOKIE["usu_id"]);
										unset($_COOKIE["usu_login"]);
										unset($_COOKIE["usu_nome"]);
										unset($_COOKIE["usu_nivel"]);										
									}

									exit();
								}
								else {
									echo '{"succeed": false, "errno": 12009, "title": "Erro ao salvar sessão!", "erro": "Não foi possível salvar dados necessários para o sistema funcionar na sessão!"}';
									exit();
								}								
						    }
						}
					} catch(Exception $e) {
						$conn->rollback();

						echo '{"succeed": false, "errno": 12007, "title": "Erro ao salvar os dados!", "erro": "Ocorreu um erro ao salvar os dados: ' . $e->getMessage() . '"}';
					}
				}
			}
			else 
				echo '{"succeed": false, "errno": 12008, "title": "Erro ao fazer login!", "erro": "O formulário não foi preenchido, favor tentar novamente!"}';
	        break;
	    default:
	       echo '{"succeed": false, "errno": 12017, "title": "Ação não definida!", "erro": "Não foi definida a ação para a requisição. Favor contatar o administrador da página!"}';
	}
} else {
	echo '{"succeed": false, "errno": 12018, "title": "Ação não definida!", "erro": "Não foi definida a ação para a requisição. Favor contatar o administrador da página!"}';
}
?>



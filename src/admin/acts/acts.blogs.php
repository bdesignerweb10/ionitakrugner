<?php
	require_once("connect.php");
	if (!isset($_SESSION["usu_id"]) || empty($_SESSION["usu_id"]) || 
		!isset($_SESSION['usu_nivel']) || empty($_SESSION["usu_nivel"]) ||
		$_SESSION['usu_nivel'] == "3" || $_SESSION["usu_id"] == "0") die('29001 - Você não tem permissão para acessar essa página!');

	if(isset($_GET['act']) && !empty($_GET['act'])) {
		switch ($_GET['act']) {
			case 'showupd':
				try {
					if(!isset($_GET['id']) || empty($_GET['id'])) {
						echo '{"succeed": false, "errno": 27004, "title": "Parâmetro não encontrado!", "erro": "Parâmetro do ID do evento não enviado! Favor contatar o administrador mostrando o erro!"}';
						exit();
					}

					$id = $_GET['id']; // $_SESSION["fake_id"];

			    	$qry_blog = $conn->query("SELECT id_blog, nome,descricao,ativo, destaque, data_publicacao, id_cat FROM tbl_blog WHERE id_blog = $id") or trigger_error("27005 - " . $conn->error);

					if ($qry_blog && $qry_blog->num_rows > 0) {
						$dados = "";
		    			while($post = $qry_blog->fetch_object()) {
		    				$dados = '{"id" : "' . $post->id_blog . '", "nome" : "' . $post->nome . '", "descricao" : "'. $post->descricao .'"  ,"ativo" : "' . $post->ativo . '", "destaque" : "'. $post->destaque.'", "grupo" : "'. $post->id_cat.'"}';
		    			}

						echo '{"succeed": true, "dados": ' . $dados . '}';
						exit();
		    		}
		    		else {
		    			throw new Exception('Nenhum evento encontrado com o ID ' . $id . "!");
		    		}
				} catch(Exception $e) {
					echo '{"succeed": false, "errno": 24005, "title": "Erro ao carregar os dados!", "erro": "Ocorreu um erro ao carregar os dados: ' . $e->getMessage() . '"}';
					exit();
				}
		        break;

			case 'add':
				try {
					$conn->autocommit(FALSE);					
					if(isset($_POST) && !empty($_POST) && $_POST["nome"]) {
						$isValid = true;
						$errMsg = "";

						if(!isset($_POST["nome"]) || empty($_POST["nome"])) {
							$errMsg .= "Titulo do Post";
							$isValid = false;
						}
						

						if(!isset($_POST["descricao"]) || empty($_POST["descricao"])) {
							$errMsg .= "Descrição do post";
							$isValid = false;
						}						

						if(!$isValid) {
							echo '{"succeed": false, "errno": 27006, "title": "Erro em um ou mais campos do formulário!", "erro": "Ocorreram erros nos seguintes campos do formulário: <b>' . $errMsg . '</b>"}';
							$conn->rollback();
							exit();
						}
						else {

							if(isset($_FILES['img'])) {
								//Pegando extensão do arquivo								
								$ext = strtolower(substr($_FILES['img']['name'],-4)); 
								//Definindo um novo nome para o arquivo
							    $new_name = date("Y.m.d-H.i.s") . $ext; 
							    //Diretório para uploads 
							    $dir = '../../img/blog/'; 
							    //Fazer upload do arquivo
							    move_uploaded_file($_FILES['img']['tmp_name'], $dir.$new_name); 
							    //Permissão na pasta (Linux)
							    chmod("../../img/blog/" . $new_name, 644);
							}

							$imagem = $_FILES['img']['name'];
							$categoria = $_POST["grupo"];
							$nome = $_POST["nome"];
							$descricao= $_POST["descricao"];
							$ativo = (isset($_POST["ativo"]) && $_POST["ativo"] == "1" ? "1" : "0");
							$destaque = (isset($_POST["destaque"]) && $_POST["destaque"] == "1" ? "1" : "0");		
							$data_postagem = date('Y-m-d');

							$qry_blog = "INSERT INTO tbl_blog (nome, img ,descricao ,ativo, destaque, data_publicacao, id_cat) VALUES ('" . $nome . "', '" . $new_name . "' ,'" . $descricao . "', '". $ativo ."' ,'" . $destaque . "','".$data_postagem."','".$categoria."')";

							if ($conn->query($qry_blog) === TRUE) {
								$conn->commit();
								echo '{"succeed": true}';
							} else {
						        throw new Exception("Erro ao inserir o slide: " . $qry_blog . "<br>" . $conn->error);
							}							
						}
					}
					else {
						echo '{"succeed": false, "errno": 27008, "title": "Erro ao enviar o formulário!", "erro": "Ocorreu um erro ao tentar enviar seu formulário, favor recarregar a página e tentar novamente!"}';
						$conn->rollback();
						exit();
					}
				} catch(Exception $e) {
					$conn->rollback();

					echo '{"succeed": false, "errno": 27007, "title": "Erro ao salvar os dados!", "erro": "Ocorreu um erro ao salvar os dados: ' . $e->getMessage() . '"}';
				}
		        break;
	        case 'edit':
				try {
					$conn->autocommit(FALSE);

					if(!isset($_GET['id']) || empty($_GET['id'])) {
						echo '{"succeed": false, "errno": 27014, "title": "Parâmetro não encontrado!", "erro": "Parâmetro do ID do evento não enviado! Favor contatar o administrador mostrando o erro!"}';
						exit();
					}	

					$id = $_GET['id'];			

					if(isset($_POST) && !empty($_POST) && $_POST["nome"]) {
						$isValid = true;
						$errMsg = "";

						if(!isset($_POST["nome"]) || empty($_POST["nome"])) {
							$errMsg .= "Titulo do Post";
							$isValid = false;
						}					

						if(!isset($_POST["descricao"]) || empty($_POST["descricao"])) {
							$errMsg .= "Descrição do post";
							$isValid = false;
						}

						if(!$isValid) {
							echo '{"succeed": false, "errno": 27010, "title": "Erro em um ou mais campos do formulário!", "erro": "Ocorreram erros nos seguintes campos do formulário: <b>' . $errMsg . '</b>"}';
							$conn->rollback();
							exit();
						}
						else {		

							if(isset($_FILES['img'])) {
								//Pegando extensão do arquivo								
								$ext = strtolower(substr($_FILES['img']['name'],-4)); 
								//Definindo um novo nome para o arquivo
							    $new_name = date("Y.m.d-H.i.s") . $ext; 
							    //Diretório para uploads 
							    $dir = '../../img/blog/'; 
							    //Fazer upload do arquivo
							    move_uploaded_file($_FILES['img']['tmp_name'], $dir.$new_name); 
							    //Permissão na pasta (Linux)
							    chmod("../../img/blog/" . $new_name, 644);							   
							}

							$imagem = $_FILES['img']['name'];
							$categoria = $_POST["grupo"];
							$nome = $_POST["nome"];
							$descricao= $_POST["descricao"];
							$ativo = (isset($_POST["ativo"]) && $_POST["ativo"] == "1" ? "1" : "0");
							$destaque = (isset($_POST["destaque"]) && $_POST["destaque"] == "1" ? "1" : "0");	
							$data_postagem = date('d/m/y');
							

							$qry_blog = "UPDATE tbl_blog 
											  SET nome = '" . $nome . "',
											  	  img = '" . $new_name . "',
											      descricao = '" . $descricao . "',
											      ativo = " . $ativo . ",
											      destaque = " . $destaque . ",
											      data_publicacao = '" . $data_postagem . "',
											      id_cat = " . $categoria . "
											WHERE id_blog = $id";
							if ($conn->query($qry_blog) === TRUE) {
								$conn->commit();
								echo '{"succeed": true}';
							} else {
						        throw new Exception("Erro ao alterar o evento: " . $qry_blog . "<br>" . $conn->error);
							}
						}
					}
					else {
						echo '{"succeed": false, "errno": 27012, "title": "Erro ao enviar o formulário!", "erro": "Ocorreu um erro ao tentar enviar seu formulário, favor recarregar a página e tentar novamente!"}';
						$conn->rollback();
						exit();
					}
				} catch(Exception $e) {
					$conn->rollback();

					echo '{"succeed": false, "errno": 27013, "title": "Erro ao salvar os dados!", "erro": "Ocorreu um erro ao salvar os dados: ' . $e->getMessage() . '"}';
				}
		        break;
		    case 'del':
			try {
				$conn->autocommit(FALSE);

				if(!isset($_GET['id']) || empty($_GET['id'])) {
					echo '{"succeed": false, "errno": 27020, "title": "Parâmetro não encontrado!", "erro": "Parâmetro do ID do evento não enviado! Favor contatar o administrador mostrando o erro!"}';
					exit();
				}

				$id = $_GET['id']; // $_SESSION["fake_id"];

				$qrydel_blog = "DELETE FROM tbl_blog WHERE id_blog = $id";
				if ($conn->query($qrydel_blog) === TRUE) {
				
					$qrydelblog = "DELETE FROM tbl_blog WHERE id_blog = $id";
					if ($conn->query($qrydelblog) === TRUE) {
						$conn->commit();
						echo '{"succeed": true}';
					} else {
				        throw new Exception("Erro ao remover o evento: " . $qrydelblog . "<br>" . $conn->error);
					}
				} else {
			        throw new Exception("Erro ao remover os times do evento: " . $qrydel_blog . "<br>" . $conn->error);
				}
			} catch(Exception $e) {
				$conn->rollback();

				echo '{"succeed": false, "errno": 27021, "title": "Erro ao salvar os dados!", "erro": "Ocorreu um erro ao salvar os dados: ' . $e->getMessage() . '"}';
			}
	        break;
		}
	}
?>
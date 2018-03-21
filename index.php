<!DOCTYPE html>

<html lang="pt-BR">

	<head>
	
		<meta charset="UTF-8" />
		<title>Potifólio</title>
		<link href="css/css.css" type="text/css" rel="stylesheet" />
	
	</head>
	
	<body>
	
		<?php
		
			include"inc/padrao.inc";
			
			cabecalho();
			
			
		
			if (empty($_POST)){
		
		?>
		
		<form class="indexForm" action="index.php" method="post" enctype="multipart/form-data">
		
			<label>Nome da atividade:</label>
			<input type="text" name="name" /> <br />
			
			<label>Link:</label>
			<input type="text" name="link" /> <br />
			
			<label>Data:</label>
			<input type="date" name="data"/> <br />
			
			<label>Arquivo:</label>
			<input type="file" name="file" /> <br /> <br />
			
			<input type="submit" value="Enviar!" />
		
		</form>
		
		<?php 
		
			}
			else{
				
				$nome = $_POST["name"];
				$link = $_POST["link"];
				$data = $_POST["data"];
				
				include"inc/arquivo.inc";
				
				$destino = arq($nome);
				
				if ( !file_exists("xml/lista.xml") ){
					
					$xml="<?xml version='1.0' encoding='UTF-8' ?>
					
					
						<raiz>
						
							<arquivo>
							
								<nome>$nome</nome>
								<link>$link</link>
								<data>$data</data>
								<dest>$destino</dest>
							
							</arquivo>
						
						</raiz>
					
					";
					
					file_put_contents("xml/lista.xml", $xml);
					
				}else{
					
					$xml = simplexml_load_file("xml/lista.xml");
					
					$atividade = $xml->addChild('arquivo');
					
					$atividade->addChild("nome", $nome);
					$atividade->addChild("link", $link);
					$atividade->addChild("data", $data);
					$atividade->addChild("dest", $destino);
					
					file_put_contents("xml/lista.xml", $xml->asXML());
					
				}
				
			}
			
		?>
	
	</body>

</html>
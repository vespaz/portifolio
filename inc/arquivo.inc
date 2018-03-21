<?php

	function arq($nome){

		//verificar se foi enviado um arquivo
		
		if( isset( $_FILES["file"]["name"] ) ){
			
			//"file" é o nome do input.
			//Escrever frases para debug e informação
			
			echo "Você enviou o arquivo: <strong>" .		$_FILES["file"]["name"] . 		"</strong><br />";
			
			echo "Este arquivo é do tipo: <strong>" . 		$_FILES["file"]["type"] . 		"</strong><br />";
			
			echo "Está salvo temporariamente em: <strong>" . $_FILES["file"]["tmp_name"] . "</strong><br />";
			
			echo "Seu tamanho é de: <strong>" . 			$_FILES["file"]["size"] . 		"</strong><br />";
			
			$arquivo_temp = $_FILES["file"]["tmp_name"];
			$nomeArquivo = $_FILES["file"]["name"];
			
			// Pega a extensão
			$extensao = pathinfo ( $nomeArquivo, PATHINFO_EXTENSION ); //Informação do caminho
			
			// Converte a extensão para minúsculo
			$extensao = strtolower ( $extensao );
			
			// Somente arquivos em .zip;.rar
			// Aqui eu enfileiro as extensões permitidas e separo por ';'
			// Isso serve apenas para eu poder pesquisar dentro desta String
			
			
			
			/*if ( strstr ( '.zip;.rar', $extensao ) ) {               ESTÁ COM ERRO, NÃO FUNCIONOU
				
				// Cria um nome único para este arquivo
				// Evita que duplique as arquivos no servidor.
				// Evita nomes com acentos, espaços e caracteres não alfanuméricos*/
				
				
				
				
				$novoNome = $nome . '.' . $extensao;
				
				// Concatena a pasta com o nome
				$dest = 'compactados/';
				
				$destino = $dest.$novoNome;
				
				// tenta mover o arquivo para o destino
				
				move_uploaded_file ( $_FILES['file']['tmp_name'], $dest.$novoNome );
				
				echo "salvo em: " . $destino;
			
			/*}else{
				
				//echo 'Você poderá enviar apenas arquivos "*.zip;*.rar"<br />';
				
				echo '<a href="index.php">Voltar<a/>';
				
			}*/
			
		}else{
			
			echo "<div class='erro'>Você não enviou nenhum arquivo!</div> <br />";
			
			$destino = 0;
			
		}
		
		return $destino;
		
	}

?>
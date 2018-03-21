<!DOCTYPE html>

<html lang="pt-BR">

	<head>
	
		<meta charset="UTF-8" />
		<title>Potifólio - Lista</title>
		<link href="css/css.css" type="text/css" rel="stylesheet" />
	
	</head>
	
	<body>
	
		<?php
			
			include "inc/padrao.inc";
			
			cabecalho();
	
			if ( file_exists("xml/lista.xml") ){
	
		?>
	
		<table class="lista">
		
			<thead>
			
				<tr>
				
					<th>Atividade</th>
					<th>Data</th>
					<th>Download</th>
				
				</tr>
			
			</thead>
			
			<tbody>
			
				<?php
				
					$xml = simplexml_load_file("xml/lista.xml");
					
					foreach($xml->children() as $linha){
						
						echo "<tr>";
						
							echo "<td> <a href = 'http://$linha->link'>	$linha->nome	</a> </td>";
							echo "<td> $linha->data </td>";
							echo "<td> <a href = '$linha->dest' dowload> Baixar arquivo</a> </td>";
						
						echo "</tr>";
						
					}
				
				?>
			
			</tbody>
		
		</table>
		
		<?php
		
			}
			else{
				
				echo"<p class=\"erro\">Descupe, mas não há nenhuma atividade cadastrada no momento. Cadastre uma ou tente novamente mais tarde...</p>";
				
			}
		
		?>
	
	</body>

</html>
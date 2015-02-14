<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
	//O nome dentro do post representa o name que foi criado no input do html
	$dados = $_POST;
	
	$resultado = 0;

	foreach($dados as $name => $value) {
		switch ($name) {
			case 'calca':
				$resultado += 0.8 * $value;
				break;
			
			case 'camisa':
				$resultado += 0.4 * $value;
				break;
			
			case 'cueca':
				$resultado += 0.2 * $value;
				break;
			default:
				$resultado = 0;
				break;
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Calculo de peso de roupa
	</title>
</head>
<body>
	<form action="" method="POST">
		<label for="camisa">Camisa</label>
		<input type="number" name="camisa" id="camisa" />

		<label for="calca">Calça</label>
		<input type="number" name="calca" id="calca" />

		<label for="cueca">Cueca</label>
		<input type="number" name="cueca" id="cueca" />

		<input type="submit" value="Calcular" />
	</form>

	<?php if(isset($resultado)) { ?>
		Resultado: <?php echo $resultado; ?> Kg
	<?php } ?> 
</body>
</html>

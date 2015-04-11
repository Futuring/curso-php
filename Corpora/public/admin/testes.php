<?php
session_start();

require_once __DIR__."/../../autoload.php";

use App\DataBase\Db;
use App\Container\Di;

$di = new Di();
$pessoa = $di->getModel("Pessoa");
/*$pessoa->setNome("Breno Douglas")
	   ->setLogin("bdouglas")->setEmail("bdouglasans@gmail.com")
	   ->setPassword("123")
	   ->setIsAdmin(1)
	   ->save();
*/
print_r($pessoa->findAll());die;

$db = new Db();

$nome = "";

if(isset($_GET['id'])) {
	$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

	$teste = $db->find("teste", $id);

	if(isset($teste)) {
		$nome = $teste->nome;
	}
}

//È UM POST COM O NOME ?

if(isset($_POST['acao']) && $_POST['acao'] == "post") { 
	$name = filter_var($_POST['nome'], FILTER_SANITIZE_SPECIAL_CHARS);
	
	if($nome == "") {
		$retorno = $db->query("INSERT INTO teste (nome) VALUES ('{$name}')");
	} else {
		$retorno = $db->query("UPDATE teste SET nome = '{$name}' WHERE id = {$id}");	
	}

	if($retorno) {
		//SALVO COM SUCESSO
		echo "<script>alert('Salvo com sucesso!')</script>";
		echo "<script>window.location = 'testes.php'</script>";
	} else {
		//NAO SALVOU 
		echo "<script>alert('Erro ao salvar!')</script>";
	}
}

$dados = $db->findAll("teste");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Titulo</title>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>
					Ação
				</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($dados as $teste) { ?>
				<tr>
					<td>
						<?= $teste->id; ?>
					</td>
					<td>
						<?= $teste->nome; ?>
					</td>
					<td>
						<a href="testes.php?id=<?= $teste->id; ?>">Editar</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<br />
	<br />

	<form method="POST">
		<input type="text" name="nome" required="required" value="<?= $nome; ?>" />
		<input type="hidden" name="acao" value="post" />
		<input type="submit" value="Salvar" />
	</form>

</body>
</html>
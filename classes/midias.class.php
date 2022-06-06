<?php

class Midias
{
  public function addMidia($midias, $caminho, $id_usuario, $id_imovel)
	{
		global $pdo;
    $caminho = 'midias/imagens/';
		

		if (count($midias) > 0) {
			for ($i = 0; $i < count($midias['tmp_name']); $i++) {

				$tipo = $midias['type'][$i];

				if (in_array($tipo, array('image/jpeg', 'image/png'))) {
					$tmpname = md5(time() . rand(0, 8888)) . '.jpg';


					move_uploaded_file($midias['tmp_name'][$i], $caminho . $tmpname);

					$nomedoarquivo = $midias['name'][$i];

					list($width_orig, $height_orig) = getimagesize($caminho . $tmpname);

					$ratio = $width_orig / $height_orig;

					$width = 500;
					$height = 500;

					if ($width / $height > $ratio) {
						$width = $height * $ratio;
					} else {
						$height = $width / $ratio;
					}


					$img = imagecreatetruecolor($width, $height);

					if ($tipo == 'image/jpeg') {
						$origin = imagecreatefromjpeg($caminho . $tmpname);
					} else if ($tipo == 'image/png') {
						$origin = imagecreatefrompng($caminho . $tmpname);
					}

					imagecopyresampled($img, $origin, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

					imagejpeg($img, $caminho . $tmpname, 75);

					$sql = $pdo->prepare("INSERT into midias set ID_imovel = :id_imovel, ID_usuario = :id_usuario, nome_do_identificador = :nome_do_identificador, nome_temporario = :nome_temporario, tipo_do_arquivo = :tipo_do_arquivo, caminho_do_arquivo = :caminho_do_arquivo");
					$sql->bindValue(":id_imovel", $id_imovel);
					$sql->bindValue(":id_usuario", $id_usuario);
					$sql->bindValue(":nome_do_identificador", $nomedoarquivo);
					$sql->bindValue(":nome_temporario", $tmpname);
					$sql->bindValue(":tipo_do_arquivo", $tipo);
					$sql->bindValue(":caminho_do_arquivo", $caminho);
					$sql->execute();

					
				}

				if ($tipo == 'application/pdf') {

					$tmpname = md5(time() . rand(0, 8888)) . '.pdf';


					move_uploaded_file($midias['tmp_name'][$i], $caminho . $tmpname);

					$nomedoarquivo = $midias['name'][$i];


					$sql = $pdo->prepare("INSERT into midias set ID_imovel = :id_imovel, ID_usuario = :id_usuario, nome_do_identificador = :nome_do_identificador, nome_temporario = :nome_temporario, tipo_do_arquivo = :tipo_do_arquivo, caminho_do_arquivo = :caminho_do_arquivo");
					$sql->bindValue(":id_imovel", $id_imovel);
					$sql->bindValue(":id_usuario", $id_usuario);
					$sql->bindValue(":nome_do_identificador", $nomedoarquivo);
					$sql->bindValue(":nome_temporario", $tmpname);
					$sql->bindValue(":tipo_do_arquivo", $tipo);
					$sql->bindValue(":caminho_do_arquivo", $caminho);
					$sql->execute();

					
				}
			}
		}

		header("Location: documento_imovel_listar.php?msg=Parabéns Adicionou o arquivo");
		die();
	}

	public function getMidias($codigo_cad){
		global $pdo;

		$array = array();

		$sql = $pdo->prepare("SELECT * FROM midias where ID_usuario = :id_usuario");
		$sql->bindValue(':id_usuario', $codigo_cad);

		$sql->execute();

		if ($sql->rowCount() > 0)
			$array = $sql->fetchAll();

		return $array;

	}

}
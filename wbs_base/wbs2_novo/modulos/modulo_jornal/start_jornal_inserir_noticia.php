<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2005 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     start_jornal_inserir_noticia.php
|  template:    jornal_inserir_noticia.htm
+--------------------------------------------------------------
*/

require("fileupload-class.php");

switch ($Action)
{
    // Inserir Seção
    case "Inserir" :

        $db->connect_ipa();

        $datahoraatual = gmDate("Y-m-d H:i:s");
        $campo_noticia = htmlentities($noticia);
        $campo_secao = $_POST['secao'];
        $campo_titulo = $_POST['titulo'];
        $campo_subtitulo = $_POST['subtitulo'];
        $campo_edicao = $_POST['edicao'];
        $campo_ano = $_POST['ano'];
        $campo_destaque = $_POST['destaque'];
        $campo_status = $_POST['status'];
        $campo_public_ini = $_POST['public_ini'];
        $campo_public_fim = $_POST['public_fim'];

        #$db->$conn->debug = true;
        $rs_insert = $db->conn->Execute("INSERT INTO jornal_noticia (codnoticia, codsecao, titulo, subtitulo, edicao, ano, destaque, noticia, status, codeditor, datahoraadd, datahorapublic_ini, datahorapublic_fim) VALUES ('', '$campo_secao', '$campo_titulo', '$campo_subtitulo', '$campo_edicao', '$campo_ano', '$campo_destaque', '$campo_noticia', '$campo_status', '$codvend', '$datahoraatual', '$campo_public_ini', '$campo_public_fim')");
        $db->retorno_db($rs_insert, "S");
        $codgravado = $db->conn->Insert_ID();

		// INSERE FOTOS NO SISTEMA
		if ($form_data <> "")
		{
			//echo "FORM_DATA: $form_data";
			#$imgdata = addslashes(fread(fopen($form_data, "r"), filesize($form_data)));

			//DEFINICOES
			$path = "images_jornal/";
			$upload_file_name = "form_data";
			$acceptable_file_types = "image/gif|image/jpeg|image/pjpeg";
			$default_extension = "";

			// OPTIONS:
			//   1 = overwrite mode
			//   2 = create new with incremental extention
			//   3 = do nothing if exists, highest protection
			$mode = 4;

			// INSERIR IMAGENS
			// Create a new instance of the class
			$my_uploader = new uploader($_POST['language']); // for error messages in french, try: uploader('fr');

			// OPTIONAL: set the max filesize of uploadable files in bytes
			$my_uploader->max_filesize(50000);

			// OPTIONAL: if you're uploading images, you can set the max pixel dimensions
			$my_uploader->max_image_size(300, 300); // max_image_size($width, $height)

			// UPLOAD the file
			if ($my_uploader->upload($upload_file_name, $acceptable_file_types, $default_extension))
			{
				$my_uploader->save_file($path, $mode, $codgravado);
			}

			if ($my_uploader->error)
			{
				echo $my_uploader->error . "<br><br>\n";
			}
			
			$rs_update = $db->conn->Execute("UPDATE jornal_noticia SET img_name = '".$my_uploader->file['name']."', img_size = '".$my_uploader->file['size']."', img_type = '".$my_uploader->file['type']."', img_extention = '".$my_uploader->file['extention']."', img_height = '".$my_uploader->file['height']."', img_width = '".$my_uploader->file['width']."' WHERE codnoticia = '$codgravado'");
			$db->retorno_db($rs_update, "S");
		}

        $db->disconnect();

    break;
}

$db->connect_ipa();

#$db->$conn->debug = true;
$rs_secao = $db->conn->Execute("SELECT * FROM jornal_secao WHERE habilitado = 'S'");

$db->retorno_db($rs_secao, "N");

$db->disconnect();

include ("templates/jornal_inserir_noticia.htm");

?>
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
|  arquivo:     start_produtos_usados_admin_prod_index.php
|  template:    produtos_usados_admin_prod_index.htm
+--------------------------------------------------------------
*/

require("fileupload-class.php");

switch ($Action)
{
    // Pesquisar
	case "Pesquisar" :
        if ($pesqcod <> "") {
    		$condicaopesq = "codusado = '$pesqcod' AND ";
        }
        if ($pesqproduto <> "") {
            $condicaopesq .= "nome like '%$pesqproduto%' AND ";
        }
		break;
	
	// Excluir
	case "Excluir" :
		// Solicitações
		$prod->clear();
		$prod->delProd("produtos_usados_sol", "codusado = '$codusadoselect'");
		
		// Produtos
		$prod->clear();
		$prod->delProd("produtos_usados", "codusado = '$codusadoselect'");
		break;

	// Editar
	case "Editar" :
		$prod->clear();
		$prod->upProdU("produtos_usados", "nome = '$nome_novo', descricao = '$descricao_novo', ppu = '$ppu_novo'", "codusado = '$codusadoselect'");
		
		// INSERE FOTOS NO SISTEMA
		if ($form_data <> "")
		{
			echo "FORM_DATA: $form_data";
			#$imgdata = addslashes(fread(fopen($form_data, "r"), filesize($form_data)));
				
			//DEFINICOES
			$path = "images_prod_usados/";
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
			$my_uploader->max_filesize(40000);
		
			// OPTIONAL: if you're uploading images, you can set the max pixel dimensions 
			$my_uploader->max_image_size(640, 480); // max_image_size($width, $height)
		
			// UPLOAD the file
			if ($my_uploader->upload($upload_file_name, $acceptable_file_types, $default_extension))
			{
				$my_uploader->save_file($path, $mode, $codusadoselect);
			}
			
			if ($my_uploader->error)
			{
				echo $my_uploader->error . "<br><br>\n";
			}
		
			// ATUALIZA DADOS DA IMAGEM
			/*
			$prod->listProd("produtos_usados", "codusado = $codusadoselect");
			$prod->setcampo5($my_uploader->file['size']);
			$prod->setcampo6($my_uploader->file['type']);
			$prod->setcampo7($my_uploader->file['name']);
			$prod->setcampo8($my_uploader->file['extention']);
			$prod->setcampo9($my_uploader->file['height']); // altura
			$prod->setcampo10($my_uploader->file['width']); // largura
			$prod->upProd("produtos_usados", "codusado = $codusadoselect");
			*/
			//novo
			$prod->clear();
			$salva_tamanho = $my_uploader->file['size'];
			$salva_tipo = $my_uploader->file['type'];
			$salva_nome = $my_uploader->file['name'];
			$salva_ext = $my_uploader->file['extention'];
			$salva_altura = $my_uploader->file['height']; //altura
			$salva_largura = $my_uploader->file['width']; //largura
			$prod->upProdU("produtos_usados", "img_size = '$salva_tamanho', img_type = '$salva_tipo', img_name = '$salva_nome', img_extention = '$salva_ext', img_height = '$salva_altura', img_width = '$salva_largura'", "codusado = '$codusadoselect'");
		}
		
		break;

	// Adiciona Solicitação
	case "AddSol" :
		$datahoraatual = gmDate("Y-m-d H:i:s");
		
		$prod->clear();
		$prod->setcampo0("");
		$prod->setcampo1($codusadoselect);
		$prod->setcampo2($codvend);
		$prod->setcampo3($nomecliente);
		$prod->setcampo4($dddtel);
		$prod->setcampo5($tel);
		$prod->setcampo6($datahoraatual);
		$prod->setcampo7($obs);
		$prod->addProd("produtos_usados_sol", $uregcodsol);
		break;

	// Adiciona Produto
	case "AddProd" :
		$prod->clear();
		$prod->setcampo0("");
		$prod->setcampo1($nomeprod);
		$prod->setcampo2($descricao);
		$prod->setcampo3("N");
		$prod->setcampo4($ppu);
		$prod->addProd("produtos_usados", $uregcodprodusado);
		
		// INSERE FOTOS NO SISTEMA
		if ($form_data <> "")
		{
			echo "FORM_DATA: $form_data";
			#$imgdata = addslashes(fread(fopen($form_data, "r"), filesize($form_data)));
				
			//DEFINICOES
			$path = "images_prod_usados/";
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
			$my_uploader->max_filesize(40000);
		
			// OPTIONAL: if you're uploading images, you can set the max pixel dimensions 
			$my_uploader->max_image_size(640, 480); // max_image_size($width, $height)
		
			// UPLOAD the file
			if ($my_uploader->upload($upload_file_name, $acceptable_file_types, $default_extension))
			{
				$my_uploader->save_file($path, $mode, $uregcodprodusado);
			}
			
			if ($my_uploader->error)
			{
				echo $my_uploader->error . "<br><br>\n";
			}
		
			// ATUALIZA DADOS DA IMAGEM
			$prod->listProd("produtos_usados", "codusado = $uregcodprodusado");
			$prod->setcampo5($my_uploader->file['size']);
			$prod->setcampo6($my_uploader->file['type']);
			$prod->setcampo7($my_uploader->file['name']);
			$prod->setcampo8($my_uploader->file['extention']);
			$prod->setcampo9($my_uploader->file['height']); // altura
			$prod->setcampo10($my_uploader->file['width']); // largura
			$prod->upProd("produtos_usados", "codusado = $uregcodprodusado");
			#$prod->clear();
			#$prod->upProdU("produtos_usados", "nome = '$nome_novo', descricao = '$descricao_novo', ppu = '$ppu_novo'", "codusado = '$codusadoselect'");
		}
		break;
}

// Produtos
$prod->clear();
$prod->listProdSum("codusado, nome, descricao, ppu, img_height, img_width", "produtos_usados", "$condicaopesq hist = 'N'", $arrayx, $array_campox, "");

for($i = 0; $i < count($arrayx); $i++ )
{
	$prod->mostraProd( $arrayx, $array_campox, $i );
	
	$codusado_list[$i] = $prod->showcampo0();
	$nomeprod_list[$i] = $prod->showcampo1();
	$descricaoprod_list[$i] = $prod->showcampo2();
	$ppuprod_list[$i] = $prod->showcampo3();
	$imgaltura_list[$i] = $prod->showcampo4();
	$imglargura_list[$i] = $prod->showcampo5();
}

include ("templates/produtos_usados_admin_prod_index.htm");

?>
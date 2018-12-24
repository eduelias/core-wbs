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
|  arquivo:     start_assistencia_tecnica_admin_criar_pesquisa.php
|  template:    assistencia_tecnica_admin_criar_pesquisa.htm
+--------------------------------------------------------------
*/


 $db->connect_wbs();
 #$db->conn->debug = true;
 
 if ($Action == "Salva"){

#echo "<pre>";

#print_r($_POST);

		for($i = 0; $i < $_POST[count_prod]; $i++ ){
        
        #echo "<BR>".$_POST['idop_mod_prod'][$i]."<BR>";
        #echo $_POST['cod_new'][$i]."<BR>";
        #echo $_POST['li_new'][$i]."<BR>";
		
		$rs_produto = $db->query_db("SELECT COUNT(*) FROM produtos WHERE codprod = '".$_POST['cod_new'][$i]."'","SQL_NONE","N");
		
		
			if ($_POST['idop_mod_prod'][$i]){
				if($_POST['cod_new'][$i]){
				#echo "UPDATE";
					if ($rs_produto->fields[0] !=0){
					$rs_update_prod = $db->query_db("UPDATE op_mod_prod SET codprod = '".$_POST['cod_new'][$i]."' , lib_imp = '".$_POST['li_new'][$i]."'  WHERE idop_mod_prod = '".$_POST['idop_mod_prod'][$i]."' ","SQL_NONE","N");	
					}
				}else{
				#echo "DELETE";
					$rs_del_mod_prod = $db->query_db("DELETE FROM op_mod_prod WHERE idop_mod_prod = '".$_POST['idop_mod_prod'][$i]."'","SQL_NONE","N");
				}
			}else{
				if($_POST['cod_new'][$i]){
				#echo "INSERT";
					if ($rs_produto->fields[0] !=0){
					$rs_insert_mod_prod = $db->query_db("INSERT INTO op_mod_prod SET idop_mod = '$modelo_select' , codprod = '".$_POST['cod_new'][$i]."', lib_imp= '".$_POST['li_new'][$i]."' ","SQL_NONE","N");	
					}
				}
			}
             
		
        }//FOR
}
 

 $rs_lista = $db->query_db("SELECT  nomeprod, op_mod_prod.codprod, lib_imp, idop_mod_prod FROM op_mod_prod, produtos WHERE op_mod_prod.codprod = produtos.codprod and idop_mod = '$modelo_select' order by nomeprod","SQL_NONE","N");
 
 $rs_modelo = $db->query_db("SELECT idop_mod, codprod, descr  FROM op_mod WHERE  idop_mod = '$modelo_select'","SQL_NONE","N");

include ("templates/fabrica_relatorio_edit.htm");

?>
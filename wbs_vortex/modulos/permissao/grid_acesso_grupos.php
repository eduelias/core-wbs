
<?
	//Cria a página
	


	//Adiciona o cpanel no array $pagina->data
	//$pagina->addCpanel();
	
	$id = $_GET['id'];
	$codmenu = (isset($_GET['codmenu']))?$_GET['codmenu']:'1';
	$bdd = new bd();
	$grp = $bdd->gera_array('nomegrp','segurancagrp','codgrp = '.$id);
	//echo $bdd->get_sql();
	$men = $bdd->gera_array('menu,codmenu','seguranca_menu','true');
	
	$pagina = new pagina("listaAcesso","Lista de arquivos para o grupo '".$grp[0]['nomegrp']."'");
?>    
<script>
	WBS.pagina.idgeral = <?=$id?>;
	tabspan = document.getElementById('tlDetalhe: <?=$id?>');
	tabspan.innerHTML = 'GRP: <?=$grp[0]['nomegrp']?>&nbsp;&nbsp;&nbsp;';		
</script>
<? $html = 'Menu: <select name="codmenu" onchange="javascript:WBS.pagina.pesqByField(this, onscreen.myDataTablelistaAcesso['.$id.'],false);">';
	 foreach ($men as $k => $v){
		$html .= ' <option value="'.$v['codmenu'].'">'.$v['menu'].'</option>';
     }
	$html .= '</select>'; 
	
	$cond = "TRUE GROUP BY segurancaacesso.codacesso";

	$campos = "*,(select codgrp from segurancaacesso where segurancaacesso.codpg = seguranca.codpg and segurancaacesso.codgrp = ".$_GET['id'].") as checked, (select menu from seguranca_menu where codmenu = seguranca.codmenu) as menu";
	$tb = "seguranca";
	$cond = "codmenu = ".$codmenu;
	$pagina->addObj($html);
	$pagina->setGrid($campos,$tb,$cond,'CAPTION','codpg','segurancaacesso',$id);

	//Adiciona as colunas açoes e eventos 
	$pagina->grid->AddColuna("menu", "menu", "string", "40", "", 'false');
	$pagina->grid->AddColuna("codpg", "Cod", "string", "25", "", 'false');
	$pagina->grid->AddColuna("arquivo", "Página", "string", "250","");
	$pagina->grid->AddColuna("nomem", "Nome", "string", "250","");
	$pagina->grid->AddAcao("relacional2", "ajax_altera.php", array('modulo'=>'permissao', 'campo'=>'checked'));

	//Carrega o grid no array $pagina->data
	//$pagina->grid->setSorted('menu');
	$pagina->loadGrid('15');
	$pagina->imprime();
	//include("modulos/permissao/template/listaacessogrp.php");
?>
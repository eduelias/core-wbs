<h1>ENTRADA</h1>
<form action="<?=$php_self?>" method="POST">
	<select name="codemp">
		<option value="-1" <?=((!$_POST['codemp'])?'selected':'')?>>-- SELECIONE A EMPRESA --</option>
		<option value="14" <?=(($_POST['codemp']=='14')?'selected':'')?>>MAXXMICRO FABRICA</option>
		<option value="15" <?=(($_POST['codemp']=='15')?'selected':'')?>>MAXXMICRO LOJA FABRICA</option>
	</select>
	<input type="text" name="codprod" value="<?=$_POST['codprod']?>"></input>
	<select name="ano">
		<option value="-1" <?=((!$_POST['ano'])?'selected':'')?>>-- SELECIONE O ANO --</option>
		<option value="2007" <?=(($_POST['ano']=='2007')?'selected':'')?>>2007</option>
		<option value="2008" <?=(($_POST['ano']=='2008')?'selected':'')?>>2008</option>
		<option value="2009" <?=(($_POST['ano']=='2009')?'selected':'')?>>2009</option>
		<option value="2010" <?=(($_POST['ano']=='2010')?'selected':'')?>>2010</option>
	</select>
	<input type='Submit' value='Pesquisar'>
</form>

<?php
	
	if (isset($_POST['codprod'])) {

		$sql_head = 'select sum(ocp.qtderec) as qtde, p.nomeprod as produto, p.codprod as codprod, e.nome as empresa FROM ocprod as ocp, oc, empresa as e, produtos as p WHERE oc.codoc = ocp.codoc AND oc.codemp = e.codemp AND ocp.codprod = p.codprod AND ocp.codprod = "'.$_POST['codprod'].'" and oc.codemp = '.$_POST['codemp'].' and ocp.datanf like "'.$_POST['ano'].'-%" GROUP BY ocp.codprod';
		//echo $sql_head.'<br>';
		$sql_body = 'select ocp.datanf as dtnf, f.nome as fornecedor, ocp.qtderec as qtde, ocp.numnf as nf, oc.codoc as oc from ocprod as ocp, fornecedor as f, oc WHERE oc.codoc = ocp.codoc AND oc.codfor = f.codfor AND ocp.codprod = "'.$_POST['codprod'].'" and oc.codemp = '.$_POST['codemp'].' and ocp.datanf like "'.$_POST['ano'].'-%" order by ocp.datanf asc';
		//echo $sql_body.'<br>';
		mysql_connect('localhost','gerencia','@SEFCD!');
		mysql_select_db('sif_base');
		
		$h = mysql_query($sql_head);
		
		$b = mysql_query($sql_body);
		
		while ($u = mysql_fetch_assoc($h)){
			echo '<b>Empresa</b>: '.$u['empresa'].'<br>';
			echo '<b>Produto</b>: '.$u['codprod'].' - '.$u['produto'].'<br>';
			echo '<b>Total "'.$_POST['ano'].'"</b>: '.$u['qtde'].'<br>';
		}
		?>
			<table width='100%' border='1px'>
		<?php
			echo '<tr><td>DATA NF</td><td>N# NF</td><td>FORNECEDOR</td><td>QTDE REC</td><td>OC</td></tr>';
		while ($u = mysql_fetch_assoc($b)) {
			echo '<tr><td>'.$u['dtnf'].'</td><td>'.$u['nf'].'</td><td>'.$u['fornecedor'].'</td><td>'.$u['qtde'].'</td><td>'.$u['oc'].'</td></tr>';
		}
		?>
			</table>
		<?php

	}
	
?>
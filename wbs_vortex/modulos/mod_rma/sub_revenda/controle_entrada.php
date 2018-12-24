<script>
//registrando tab aberta;
WBS.modulo.submod = {name:'controle_entrada'};
</script>
<?
	//INCLUINDO O OBJETO QUE CONTROLA A ENTRADA DE CODIGOS DE BARRAS OU NFS
	//FORMATAR ESTE OBJETO MUITO RAPIDO
	

?>
<center><BR><fieldset class='pagina_obj'><form action='javascript: return false' style='text-align:center'>
<div class="center">
Entre com o <b>codigo de barras</b><br> 
CODBARRA: <input type="text" id="cbinput"/>
<br><BR>OU Com o <b>numero da nota fiscal</b> para produtos com codigo de barras compartilhado,<BR>
NF: <input type="text" tabindex="-1" id="inp_nf"/>

<div id="selecionador" style="display:none">
	<select name="tf" tabindex="10" id="tf"></select>
</div>

<br>
<br>OU ainda a 
<input type="button" onclick="javascript:WBS.modulo.insere_outros('<?=encode('modulos/formularios/act_gera.php')?>')" value="DESCRI&Ccedil;&Atilde;O"/> 
de um produto que n&atilde;o seja nosso. <br>
</div>

&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' value='Pesquisar' onclik='javascript:alert(this.value);' style='margin-left:20px;'></input></form></fieldset></center>
<?
	//INCLUINDO O GRID DE CONTROLE DE ENTRADA NO RMA;
	include($_SESSION['SUBMODIR'].'grid_rma_entrada.php');
?>


<?
	//INCLUINDO O GRID DE PRODUTOS A SEREM EMPACOTADOS;
	#include('modulos/mod_rma/sub_revenda/grid_rma_aberto.php');
	include('modulos/mod_rma/sub_revenda/grid_recebimento.php');
	#include($_SESSION['SUBMODIR'].'grid_rma_aberto.php');
?>
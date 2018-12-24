<style>
body {
	font-weight: bold;
	text-transform:uppercase;
	font-family:arial;
}
td{
	padding:10px;
}
</style>
<body>
<?

$bd = new bd();

$res = $bd->gera_array('clientenovo.nome,endereco,numero,complemento,bairro,cep,cidade,estado,nf_e from clientenovo,v_rma_pct where clientenovo.codcliente = v_rma_pct.short_desc and v_rma_pct.idrmapct = '.$_GET[id]);

$res = $res[0];

?>
<table width="800pt" border="1" cellpadding="0" cellspacing="0"	bordercolor="#000000" style="font-weight: bolder">
	<tr>
		<td style="font-size: 18px">
		<div onClick="change_text(this)" name='nome' id='nome'>DESTINO: <?=$res[nome]?></div>
		<div onClick="change_text(this)" name='endereco'>ENDERECO: <?=$res[endereco].', '.$res[numero].' '.$res[complemento]?></div>
		<div onClick="change_text(this)" name='endereco'>BAIRRO: <?=$res[bairro]?></div>
		<div onClick="change_text(this)" name='endereco'>CIDADE: <?=$res[cidade].' - '.$res[estado]?></div>
		<div onClick="change_text(this)" name='endereco'>CEP: <?=$res[cep]?></div>
		</td>
		<td width="246" align="center" valign="middle" id="endereco" style="font-size: 20px">
		<b>NF:
		<div onClick="change_text(this)" name='nf_e' style="display: inline; font-size:36px"><?=$res[nf_e]?></div>
		</b><br><br>
		RETORNO DE RMA<br>
		<?=$res[cidade]?> -
		<?=$res[estado]?>
		</td>
	</tr>
	<tr>
		<td width="542" height="91"  style="font-size: 14px" colspan=2>
		<p>REMETENTE: MAXXMICRO IND&Uacute;STRIA DE EQUIPAMENTOS DE INFORM&Aacute;TICA<br>
		ENDERE&Ccedil;O: Avenida Rio Branco, 870 - sl 5 - centro<br>
		CIDADE: Juiz de Fora - MG<br>
		CEP: 36035-000<br>
		TEL: (32) 2101-5930<BR>
		RESP: SEToR DE RMA
		</td>
	</tr>
</table>
<script>
var DBG;

var change_to_print = function(o) {

	var div = o.parentNode;
	
	var aux = o.value;
	
	div.innerHTML = aux;
	
	div.teste = true;

}

var change_text = function(o) {
	DBG = o;
	o.teste = o.teste || true;
	if (o.teste != 'NAO') {
		o.teste = 'NAO';

		var tamanho = o.firstChild.length+20;
		var str = "<input type='text' size='"+tamanho+"' onblur='change_to_print(this)' value='"+o.innerHTML+"'>";
		o.innerHTML = str;
	}
}
</script>
</body>

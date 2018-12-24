<style>
.conteudo {
	margin-left:35%;
}
label {
	font-size: 18px;
	float:left;
	padding:3px;
}
input[type="text"]{
	float:right;
	font-size:20px;
}
input[type="submit"] {
	border:thin solid #000000;
	clear:both;
	float:right;
	font-size:20px;
	height:30px;
	margin-top:0;
	width:50px;
}
.conteudo{
	background: #DDF;
	padding: 10px;
	width:400px;
	border: 1px solid #96C;
}
.descricao {
	width: 368px;
	background: #EEF;
	border: 1px solid #036;
	height: 90px;
	font-size:24px;
	text-align:center;
	padding: 15px;
}
.l_desc{
	margin-top: -20px;
}
.imagem{
	border: 1px solid #AAD;
	margin: 100px 20px 20px 50px;
	text-align:center;
	width: 300px;
}
</style>


<div class="conteudo">
	<?php include('modulos/ean13/_form.php'); ?>
</div>
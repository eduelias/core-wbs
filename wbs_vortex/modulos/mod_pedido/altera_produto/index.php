<link href="modulos/mod_pedido/pedido_rapido/form.css" type="text/css" rel="stylesheet">
<script src="modulos/libraries/cpf_cnpj.js" language="javascript"></script>
<style>
#principal {
	display:block !important;
}
#cadastro {
	height: 60px;
	width: 600px;
}
#mostrando {
	float: right;
	margin-top:-50px;
}
.produtos{
font-size:10px !important;
}
</style>
<script>
  VENDA = {};
  var pedido = {
    codped:0,
    produto_antigo:{
      nome:'',
      valor:0
    },
    produto_novo:{
      nome:'',
      valor:0
    },
    user_modificador:0,
  };
  
  var GET = function(id) {
    return document.getElementById(id);
  }    
  
  VENDA.addproduto = function(p) {
		
		VENDA.table.oDT.addRow(p);
		
	};
 
</script>
<h1>Troca de produtos no pedido</h1>
<div class="container">
  
    <div class="cliente">
    <div class="secao">DADOS DO PEDIDO</div>
        <div class="form">
        <?php include('modulos/mod_pedido/altera_produto/pedido.php');?>
        </div>
    </div>
    <br>
    <div class="produtos">
    <div class="secao">DADOS DOS PRODUTOS</div>
        <div class="form">
        <?php include('modulos/mod_pedido/altera_produto/produto.php');?>
        </div>
    </div>
    <br />
    
    
</div>
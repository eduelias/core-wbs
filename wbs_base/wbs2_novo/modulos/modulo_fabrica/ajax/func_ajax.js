


// FUNCAO DELETE 
function Del(base, param)
{
	var message = 'Você deseja deletar este registro?';
	if ( confirm(message) ) {

		var theURL = base + "";
		var nsedex = document.getElementById('nsedex').value;
		var revenda = document.getElementById('revenda').value;
		//alert("" + theURL + "");
		
		doit(theURL, 'lista', param+'&Action=DelSedex&lista=OK&menu_not=1&nsedex='+nsedex+'&revenda='+revenda+'', 'GET', '');
		ajax.onCompletion = function() {onFinish('msg_return', 'Registro Apagado');}
	} else {
		return false;
	}
}


function Cria(base, param)
{
	
		var theURL = base + "";
		var modelo = document.getElementById('modelo_select').value;
		var qtde = document.getElementById('qtde_lote_select').value;
		//alert("" + theURL + "");
		
		doit(theURL, 'lista', param+'&Action=CriaLote&lista=OK&menu_not=1&modelo='+modelo+'&qtde='+qtde+'', 'GET', '');
		ajax.onCompletion = function() {onFinish('msg_return', '');}
	
}


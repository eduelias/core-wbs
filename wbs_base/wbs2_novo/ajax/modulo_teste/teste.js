

function TesteDeleteSedex(base, param)
{
	var message = 'Você deseja deletar este registro?';
	if ( confirm(message) ) {
		var theURL = base + "";
		
		loadHTML(theURL, 'conteudo', param, 'GET');
		loadHTML(theURL, 'lista', param+'&Action=Pesquisar&lista=OK', 'GET');
		
	} else {
		return false;
	}
	
}

function PesquisaSedex(base, param)
{
		var theURL = base + "";
		var revenda = document.getElementById('nsedex');
		var nsedex = document.getElementById('revenda');
		
		loadHTML(theURL, 'lista', param+'&Action=&lista=OK&nsedex='+nsedex+'revenda='+revenda+'', 'GET');
	
}


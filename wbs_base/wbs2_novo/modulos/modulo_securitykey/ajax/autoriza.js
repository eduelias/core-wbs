function Autoriza(base, param)
{
		var theURL = base + "";
		var senhatoken = document.getElementById('senhatoken').value;
		var token_array = document.getElementById('token_array').value;
		
		if (document.autoriza.senhatoken.value.length < 4)
		{
			alert("Sr(a), a senha deve ser de no mínimo 4 dígitos.");
		}
		else
		{
			doit(theURL, 'retorno_ajax', param+'&token_array='+token_array+'&senhatoken='+senhatoken+'&menu_not=1', 'GET', 'retorno_ajax');
			ajax.onCompletion = function() { 
				if (ajax.response == 0){document.getElementById('retorno_ajax').innerHTML = '<span id=\"autoriza_no\">Status: Senha incorreta, tente novamente!</span>';} 
				if (ajax.response == 1){document.getElementById('retorno_ajax').innerHTML = '<span id=\"autoriza_ok\">Status: Autenticado com sucesso!</span>'; window.location.replace(theURL +"?"+ param);} 
			}
		}
}
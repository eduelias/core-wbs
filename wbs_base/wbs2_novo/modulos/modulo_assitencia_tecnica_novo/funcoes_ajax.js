

function BuscaSrvExec(base, param, codlaudo_select)
{
	var theURL = base + "";
	alert ('laudo'+ ajax.response+ '');
	//alert ('codlaudo_select: '+ajax.responseXML+' dataArray.length: '+dataArray.length+'');
	var codlaudo = codlaudo_select;
	doit(theURL, 'codsrvexec_save', param+'&Action=BuscaSrvExec&menu_not=1&codlaudo='+codlaudo+'', 'GET', 'opcoes');
	ajax.onCompletion = function() {
		var obj = ajax.responseXML;
		var dataArray = obj.getElementsByTagName("datareq");
		var html;
		//total de elementos contidos na tag cidade
		if(dataArray.length > 0)
		{
			//percorre o arquivo XML paara extrair os dados
			//document.getElementById('opcoes').innerHTML = "--Selecione uma das opções abaixo--";	
			for(var i = 0 ; i < dataArray.length ; i++)
			{
				var item = dataArray[i];
				//contéudo dos campos no arquivo XML
				var codsrv_exec = item.getElementsByTagName("codsrv_exec_select")[0].firstChild.nodeValue;
				var descricao = item.getElementsByTagName("descricao")[0].firstChild.nodeValue;
				//cria um novo option dinamicamente
				var novo = document.createElement("option");
				//atribui um ID a esse elemento
				novo.setAttribute("id", "opcoes");
				//atribui um valor
				novo.value = codsrv_exec;
				//atribui um texto
				novo.text = descricao;
				//finalmente adiciona o novo elemento
				//var formulariox = formulario+formulario_n;
				//alert(formulariox);
				//document.formulario+formulario_n.codsrvexec_save.options.add(novo);
				//document.ana1.codsrvexec_save.options.add(novo);
				//document.formulariox.codsrvexec_save.options.add(novo);
				//alert("codlaudo_select: "+codlaudo_select+" codsrv_exec: "+codsrv_exec+" descricao: "+descricao);
				document.ana1.codsrvexec_save.options.add(novo);
				//if(formulario_n == 1) { document.ana1.codsrvexec_save.options.add(novo); }
				//if(formulario_n == 2) { document.ana2.codsrvexec_save.options.add(novo); }
				//if(formulario_n == 3) { document.ana3.codsrvexec_save.options.add(novo); }
				//if(formulario_n == 4) { document.ana4.codsrvexec_save.options.add(novo); }
				//if(formulario_n == 5) { document.ana5.codsrvexec_save.options.add(novo); }
				//if(formulario_n == 6) { document.ana6.codsrvexec_save.options.add(novo); }
				//if(formulario_n == 7) { document.ana7.codsrvexec_save.options.add(novo); }
				//if(formulario_n == 8) { document.ana8.codsrvexec_save.options.add(novo); }
				//if(formulario_n == 9) { document.ana9.codsrvexec_save.options.add(novo); }
				//if(formulario_n == 10) { document.ana10.codsrvexec_save.options.add(novo); }
				//html += "i="+i+" codprod "+codprod+" nomeprod "+nomeprod+"</br>";
			}
				
		}
		else
		{
			//caso o XML volte vazio, printa a mensagem abaixo
			document.getElementById('opcoes').innerHTML = "Escolha primeiro o Laudo...";
		}
		//document.getElementById('opcoes').innerHTML = html;
		//MOSTRA MSG DE CONFIRMAÇÃO DA ACAO	
		//onFinish('msg_return', '');
	}
	//alert("aqui2 = "+ dataArray + "");
}
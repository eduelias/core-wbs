<head>
<!-- Dependency -->
<script src="http://yui.yahooapis.com/2.5.2/build/yahoo/yahoo-min.js"></script>

<!-- Used for Custom Events and event listener bindings -->
<script src="http://yui.yahooapis.com/2.5.2/build/event/event-min.js"></script>

<!-- Source file -->
<script src="http://yui.yahooapis.com/2.5.2/build/connection/connection-min.js"></script>

<script type="text/javascript">
	var AAA;
	_hande = {
		success: function(o){ 
			var arr;
			eval('arr = '+o.responseText);
			AAA = arr;
			if ((AAA[0].entrada)&&(!AAA[0].faixa)&&(!AAA[0].confianca)) {
				alert('FAVOR PROCURAR A CONTABILIDADE - MAGNO');
			} else {			
				alert('FUNCAO: ' + AAA[0].funcao + ' \r\nNOME: ' + AAA[0].Nomextenso + '\r\nHORARIO: ' + AAA[0].hora + '\r\nFAIXA: ' + AAA[0].faixa);
			}
		},
		failure: function(o){ }
	}
	
	a_submit = function(o) {
		o = o.elements[0];

		var url = 'act_ponto.php?id='+o.value;
		YAHOO.util.Connect.asyncRequest('GET',url, _hande, null);
		return false;
	}
</script>
</head>
<body>
    <form action="act_ponto.php" method="get" onSubmit="return a_submit(this);">
        <label for="id"> COD BARRA:
            <input type="text" name="id" onBlur="" maxlength="15">
        </label>
    </form>
</body>
<?
	$s = new v_saldo;

	$sarray = $s->getlista("posicao = 'MP'");

	foreach($sarray as $linha) {
		if ($idp != $linha->getcodprod()) {
			$saldo = 0;
			$customedio = 0;
			$idp = $linha->getcodprod();
		}

		$customedio = (($saldo*$customedio)+($linha->getentrada()*$linha->getpcu()))/($linha->getentrada()+$saldo);
		
		$saldo = $saldo+($linha->getentrada()-$linha->getsaida());

		$m = new modelo_maxxmicro;

		$m->getdadosfromid($linha->getid_mod());
		$m->setcustomedio($customedio);
		$m->altera();
	}

	$sarray = $s->getlista("posicao = 'PV'");

	foreach($sarray as $linha) {
		if ($idp != $linha->getcodprod()) {
			$saldo = 0;
			$customedio = 0;
			$idp = $linha->getcodprod();
		}

		$customedio = (($saldo*$customedio)+($linha->getentrada()*$linha->getpcu()))/($linha->getentrada()+$saldo);

		$saldo = $saldo+($linha->getentrada()-$linha->getsaida());

		$m = new modelo_maxxmicro;

		$m->getdadosfromid($linha->getid_mod());
		$m->setcustomedio($customedio);
		$m->altera();
	}


	$v = new v_custoOP;

	$varray = $v->getlista();

	foreach($varray as $linha) {
		$m = new modelo_maxxmicro;

		$mlista = $m->getlista("idop = '".$linha->getidop()."' AND posicao != 'MP' AND codficha = codprod");
		foreach($mlista as $mlinha) {
			$mlinha->setpcu_liq($linha->getcustomedio());
			$mlinha->altera();
		}
	}

	$sarray = $s->getlista("posicao = 'PA'");

	foreach($sarray as $linha) {
		if ($idp != $linha->getcodprod()) {
			$saldo = 0;
			$customedio = 0;
			$idp = $linha->getcodprod();
		}

		$customedio = (($saldo*$customedio)+($linha->getentrada()*$linha->getpcu()))/($linha->getentrada()+$saldo);

		$saldo = $saldo+($linha->getentrada()-$linha->getsaida());

		$m = new modelo_maxxmicro;

		$m->getdadosfromid($linha->getid_mod());
		$m->setcustomedio($customedio);
		$m->altera();
	}

?>
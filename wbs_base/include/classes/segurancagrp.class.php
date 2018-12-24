<? 

class segurancagrp {

	private $codgrp; //(int)
	private $nomegrp; //(string)
	private $obs; //(string)
	private $habilitado; //(string)
	private $hsenha; //(string)

	
	///////////////////////////////////////
	//Métodos SET
	///////////////////////////////////////


	//Método para setar valor do atributo codgrp
	function setcodgrp($codgrp) {

		$this->codgrp = (int) $codgrp;

	}

	//Método para setar valor do atributo nomegrp
	function setnomegrp($nomegrp) {

		$this->nomegrp = (string) $nomegrp;

	}

	//Método para setar valor do atributo obs
	function setobs($obs) {

		$this->obs = (string) $obs;

	}

	//Método para setar valor do atributo habilitado
	function sethabilitado($habilitado) {

		$this->habilitado = (string) $habilitado;

	}

	//Método para setar valor do atributo hsenha
	function sethsenha($hsenha) {

		$this->hsenha = (string) $hsenha;

	}

	///////////////////////////////////////
	//Métodos GET
	///////////////////////////////////////


		//Método para pegar valor do atributo codgrp
	function getcodgrp() {

		return (int) $this->codgrp;

	}
	//Método para pegar valor do atributo nomegrp
	function getnomegrp() {

		return (string) $this->nomegrp;

	}
	//Método para pegar valor do atributo obs
	function getobs() {

		return (string) $this->obs;

	}
	//Método para pegar valor do atributo habilitado
	function gethabilitado() {

		return (string) $this->habilitado;

	}
	//Método para pegar valor do atributo hsenha
	function gethsenha() {

		return (string) $this->hsenha;

	}

###############################################################################
# Métodos usuais da classe
###############################################################################

	//Metodo para setar os dados de um objeto a partir de um array
	function setdadosfromarray($array) {
		foreach($array as $chave=>$valor) {
			$this->$chave = strip_tags(addslashes($valor));
		}
	}

	//Metodo para pegar um objeto do banco de dados através do seu id
	function getdadosfromid($id = '') {
		if ($id) {
			$this->setcodgrp($id);
		}
		$q = mysql_query("SELECT * FROM segurancagrp WHERE codgrp = '".$this->getcodgrp()."'");
		$row = mysql_fetch_object($q);
		$vars = get_object_vars($row);
		foreach ( $vars as $key => $var ) {
		   $this->{$key} = stripslashes($var);
		}
	}

	//Metodo para pegar todos os registros do banco de dados
	function getlista($filtro = '1') {

		$q = mysql_query("SELECT codgrp FROM segurancagrp WHERE $filtro");

		for ($i = 0; $i < mysql_num_rows($q); $i++) {
			
			$ob = new segurancagrp;
			$ob->setcodgrp(mysql_result($q, $i, "codgrp"));
			$ob->getdadosfromid();

			$obarray[] = $ob;
		}
		return (array) $obarray; // array de objetos segurancagrp
	}

	//Metodo que insere um registro no banco
	function insere() {
		$q = mysql_query("INSERT INTO segurancagrp (nomegrp, obs, habilitado, hsenha) VALUES ('".$this->getnomegrp()."', '".$this->getobs()."', '".$this->gethabilitado()."', '".$this->gethsenha()."')");
		
	}

	//Metodo que altera um registro no banco
	function altera() {
		$q = mysql_query("UPDATE segurancagrp SET nomegrp = '".$this->getnomegrp()."', obs = '".$this->getobs()."', habilitado = '".$this->gethabilitado()."', hsenha = '".$this->gethsenha()."' WHERE codgrp = '".$this->getcodgrp()."'");
		
	}

	//Metodo que exclui um registro do banco
	function exclui() {
		$q = mysql_query("DELETE FROM segurancagrp WHERE codgrp = '".$this->getcodgrp()."'");
		
	}

}

?>
<? 
################################################################################
#								BelSys
#Feito por:				Nucleo Livre
#						Manoel Zaninetti (manoel@nucleolivre.com.br)
#						Gabriel Barbosa (gabriel.barbosa@nucleolivre.com.br)
#Data criação:			10/08/2005
################################################################################

################################################################################
# Nome:			login
# Descriação:	Aqui colocar uma descrição da classe
################################################################################


class login {

	private $tabela; //char

	private $campousuario; //char

	private $camposenha; //char

	private $campoid; //char

	private $usuario; //char

	private $senha; //char

	private $id; //int

###############################################################################
# Métodos para setar valores aos atributos
###############################################################################


	//Metodo para setar o valor ao atributo usuario
	function setusuario($usuario) {
	
		$this->usuario = (string) $usuario;
	
	}

	//Metodo para setar o valor ao atributo senha
	function setsenha($senha) {
	
		$this->senha = (string) $senha;
	
	}


###############################################################################
# Métodos para pegar os valores dos atributos
###############################################################################

	//Metodo para petar o valor do atributo usuario
	function getusuario() {
		return (string) $this->usuario;
	}

	//Metodo para petar o valor do atributo senha
	function getsenha() {
		return (string) $this->senha;
	}

	//Metodo para petar o valor do atributo tabela
	function gettabela() {
		return (string) $this->tabela;
	}

	//Metodo para petar o valor do atributo id
	function getid() {
		return (int) $this->id;
	}

	//Metodo para petar o valor do atributo id
	function getcampoid() {
		return (string) $this->campoid;
	}

###############################################################################
# Métodos usuais da classe
###############################################################################

	//Metodo para setar os dados de um objeto a partir de um array
	function login($array) {
		foreach($array as $chave=>$valor) {
			$this->$chave = $valor;
		}
	}

	function checklogin() {


		$sql = "SELECT ".$this->campoid." FROM ".$this->tabela." WHERE ".$this->campousuario." = '".$this->usuario."' AND ".$this->camposenha." = '".$this->senha."'";
		$q = @mysql_query($sql);



		if (@mysql_num_rows($q) > 0) {
			$this->id = mysql_result($q, 0, $this->campoid);
			$_SESSION["tabela"] = $this->tabela;
			$_SESSION["campousuario"] = $this->campousuario;
			$_SESSION["camposenha"] = $this->camposenha;
			$_SESSION["campoid"] = $this->campoid;
			$_SESSION["usuario"] = $this->usuario;
			$_SESSION["senha"] = $this->senha;
			$_SESSION["id"] = $this->id;
			$_SESSION["logado"] = 1;
			return true;
		}
		else {
			if (!$this->idsorteio) {
				echo"
				<script>
				window.location = 'index.php?errologin=1';
				</script>
				";
			}
			else {
				return false;
			}
		}
	}

	//Metodo para encriptar a senha no padrão MD5
	function encodesenha() {
		$this->setsenha(md5($this->getsenha()));
	}
	
}
?>
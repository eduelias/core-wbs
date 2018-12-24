<?
/** 
 * Efetua um login por sessão através de dados de uma tabela
 * A senha deve estar encriptada em MD5 para funcionar.
 * 
 * 
 * @category   
 * @package     login
 * @author      Kico Zaninetti <kicozaninetti@gmail.com>
 * @copyright   2005 Kico Zaninetti
 * @license     http://www.opensource.org/licenses/bsd-license.php
 */

/**  
 * Efetua um login por sessão através de dados de uma tabela
 *
 */
class login  extends conexao{
	
	
	/** 
	 * Nome da tabela no MySQL onde será feita a consulta do usuário e senha
	 */
	private $tb_user; //char

	/** 
	 * Nome do campo onde será checado o usuário a efetuar login
	 */
	private $campousuario; //char

	/** 
	 * Nome do campo onde será checada a senha do usuário
	 */
	private $camposenha; //char

	/** 
	 * Nome do campo de ID da tabela em questão
	 */
	private $campoid; //char

	/** 
	 * Usuário passado por formulário ou sessão
	 */
	private $usuario; //char

	/** 
	 * Senha passada por formulário ou sessão
	 */
	private $senha; //char

	/** 
	 * Valor do ID retornado se o login foi efetuado com sucesso
	 */
	private $id; //int
	
	var $conn;
	
		
		

###############################################################################
# Métodos para setar valores aos atributos
###############################################################################


	/** 
	 * Metodo para setar o valor ao atributo usuario
	 * 
	 * @param string $usuario
	 */
	function setusuario($usuario) {
	
		$this->usuario = (string) $usuario;
	
	}

	/** 
	 * Metodo para setar o valor ao atributo senha
	 * 
	 * @param string $senha
	 */
	function setsenha($senha) {
	
		$this->senha = (string) $senha;
	
	}


###############################################################################
# Métodos para pegar os valores dos atributos
###############################################################################

	/** 
	 * Metodo para pegar o valor do atributo usuario
	 *
	 * @return string usuario
	 */
	function getusuario() {
		return (string) $this->usuario;
	}

	/** 
	 * Metodo para pegar o valor do atributo senha
	 *
	 * @return string senha
	 */
	function getsenha() {
		return (string) $this->senha;
	}

	/** 
	 * Metodo para pegar o valor do atributo tabela
	 *
	 * @return string tabela
	 */
	function gettabela() {
		return (string) $this->tabela_user;
	}

	/** 
	 * Metodo para pegar o valor do atributo id
	 *
	 * @return int id
	 */
	function getid() {
		return (int) $this->id;
	}

	/** 
	 * Metodo para pegar o valor do atributo campoid
	 *
	 * @return string campoid
	 */
	function getcampoid() {
		return (string) $this->campoid;
	}

###############################################################################
# Métodos usuais da classe
###############################################################################

	/** 
	 * Metodo para setar os dados de um objeto a partir de um array
	 * @param array $array    Normalmente utilizado os arrays:
	 *  				      $_POST => para formulário
	 *        				  $_SESSION => para sessão já existente
	 *
	 */
	function login($array) {

		foreach($array as $chave=>$valor) {
			$chave = ($chave=='tabela')?'tabela_user':$chave;
			$this->$chave = $valor;
		}
		
	}

	/** 
	 * Faz a checagem se o usuário está permitido de logar no sistema
	 * 
	 * @return bool TRUE ou FALSE se o usuário está logado
	 *
	 */
	function checklogin() {
		$iplocal = $_SERVER['REMOTE_ADDR'];
		$id = "ky5d6";
		$id = md5($id);
		$restricao_user = false; // Restrinção de usuário para ID Remoto
		$servico = 0;  // 0 - Sistema em funcionamento 1 - Sistema em Manutençao
		
		$a_agora = getdate();
		$agora = $a_agora['year']."-".str_pad($a_agora['mon'],2,'0',STR_PAD_LEFT)."-".str_pad($a_agora['mday'],2,'0',STR_PAD_LEFT)." ".str_pad($a_agora['hours'],2,'0',STR_PAD_LEFT).":".str_pad($a_agora['minutes'],2,'0',STR_PAD_LEFT).":".str_pad($a_agora['seconds'],2,'0',STR_PAD_LEFT);
		
		@session_start();
		$session_time = (isset($_SESSION['BIRTH']))?$_SESSION['BIRTH']:$agora;
		
		
		parent::connect_wbs();
		//QUEM É VOCÊ USUARIO??
		
		$sql = "SELECT codvend,codgrp,nome,senha,(IF(CURRENT_TIMESTAMP()>ADDTIME('".$session_time."','0 05:00:00'),true,false)) as dead,MD5(CONCAT(nome,senha)) as ukey,block,(select nomegrp from segurancagrp where segurancagrp.codgrp = ".TB_USUARIO.".codgrp) as grp FROM ".TB_USUARIO." HAVING ( nome = '".$this->usuario."' AND senha = '".base64_encode($this->senha)."') OR (nome='".$this->usuario."' AND senha = MD5('".$this->senha."')) OR (ukey = '".$this->sessionkey."')";
		$result = parent::query_db($sql);
		$sql2 = $sql;
		//pre($result);
		//exit();
		$dead = $result->fields[4];
		$block = $result->fields[6];
		$codgrp = $result->fields[1];
		$grp = $result->fields[7];
		loga('LOGIN_CHECK >SQL> '.$sql);

		parent::disconnect();
		$debug = array();
		//TESTANDO SE USUARIO ESTA NA IPASOFT
		$sql = "SELECT count(*) FROM idremoto_ips WHERE ip = '$iplocal'";
		$ip_autorizado = parent::query_db($sql)->fields[0];
		//echo $sql;
		$debug['ip_auth'] = $ip_autorizado;
		//TESTANDO SE O GRUPO ACESSA REMOTO
		$sql = "SELECT count(*) FROM idremoto_grps WHERE codgrp = '$codgrp'";
		//echo $sql;
		$grupo_autorizado = parent::query_db($sql)->fields[0];
	
		$debug['gp_auth'] = $grupo_autorizado;
		//TESTANDO SE EXISTE O COOKIE COM A INFORMAÇÃO CERTA
		$debug['ck_auth'] = ($_COOKIE['idremoto']==$id)?1:0;
		
	//	pre($debug);
		
		
		if (($ip_autorizado)||($grupo_autorizado)||($debug['ck_auth'])) {
				
				$restricao_user = true;	
				
		} 
		//echo $restricao_user;
		
		//pre($result);
		//echo $dead;
		//echo method_exists($result,'RecordCount').'<br>'.$restricao_user.'<br>'.$dead.'<br>'.$block;
		//exit();
		if (method_exists($result,'RecordCount') && $restricao_user && !$dead && ($block!='Y')) {
			//echo 'ENTROU';
			if ($result->RecordCount() > 0) {
				
				$this->id = $result->fields[0];
				$this->grupo = $result->fields[1];
				$_SESSION['WBS'] = true;
				$_SESSION['grupo'] = $this->grupo;
				$_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
				$_SESSION['BIRTH'] = $agora;
				$_SESSION["usuario"] = $this->usuario;
				$_SESSION['sessionkey'] = (isset($this->sessionkey))?$this->sessionkey:$result->fields[5];
				$_SESSION["id"] = $this->id;
				$_SESSION["logado"] = 1;
				$_SESSION['aaa'] = $grp;
				$_SESSION['browser'] = $_SERVER['HTTP_USER_AGENT'];
				//$_SESSION['sql'] = $sql2;
				
				return true;
			} else {
				if (!$this->idsorteio) {
					//echo 'erro de senha';
					//exit();
					echo "<script> window.location = '../wbs_vortex/index.php?ecode=1';</script>";
					return false;
				}
				else {
					echo 'erro';
					return false;
				}
			}
		} else {
			@session_destroy();
			//echo 'erro';
			echo "<script> window.location = '../wbs_vortex/index.php?ecode=2';</script>";
			return false;
			
		}
	}

	/** 
	 * Metodo para encriptar a senha no padrão MD5
	 * 
	 */
	function encodesenha() {
		$this->setsenha(md5($this->getsenha()));
	}
	
}
?>
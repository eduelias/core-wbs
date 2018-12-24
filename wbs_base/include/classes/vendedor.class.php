<? 

class vendedor {

	private $codvend; //(int)
	private $nome; //(string)
	private $tipo; //(string)
	private $codgrp; //(int)
	private $senha; //(string)
	private $fatorusertabela; //(real)
	private $fatorcusto; //(real)
	private $tipocliente; //(string)
	private $doc; //(string)
	private $codsuper; //(int)
	private $codemp; //(int)
	private $block; //(string)
	private $msg; //(string)
	private $codcx; //(int)
	private $dataini; //(string)
	private $dataatualiza; //(string)
	private $fatorcomissao; //(real)
	private $allemp; //(string)
	private $allcx; //(string)
	private $codncgrp; //(int)
	private $tiponcgrp; //(string)
	private $email_cel; //(string)
	private $email_nc; //(string)
	private $email_msg; //(string)
	private $ped_lib; //(string)
	private $codproj; //(int)
	private $tipouserproj; //(string)
	private $meta; //(int)
	private $msg_fin; //(string)
	private $funcionario; //(string)
	private $caixa_vend; //(string)
	private $fatorcomissao_serv; //(real)
	private $list_cli; //(string)
	private $papel_rec; //(string)
	private $codemp_transf; //(int)
	private $candidato; //(string)
	private $eleitor; //(string)
	private $data_inimcv; //(string)
	private $data_fimmcv; //(string)
	private $mcv_prot; //(real)
	private $mcv_aplic; //(real)
	private $meia_mcv; //(string)
	private $image_user; //(string)
	private $vot_descricao; //(string)
	private $alcada; //(real)
	private $tipo_celular; //(string)
	private $malote; //(string)
	private $mcv_prot_max; //(real)
	private $mcv_prot_min; //(real)
	private $mcv_incre; //(real)
	private $meia_mcv_hab; //(string)
	private $tipo_info; //(string)
	private $tipo_tecnico; //(string)
	private $seed; //(int)
	private $fatorusertabela_cel; //(real)
	public $menu; //seguranca[]
	public $grupo; //segurancagrp

	
	///////////////////////////////////////
	//Métodos SET
	///////////////////////////////////////


	//Método para setar valor do atributo codvend
	function setcodvend($codvend) {

		$this->codvend = (int) $codvend;

	}

	//Método para setar valor do atributo nome
	function setnome($nome) {

		$this->nome = (string) $nome;

	}

	//Método para setar valor do atributo tipo
	function settipo($tipo) {

		$this->tipo = (string) $tipo;

	}

	//Método para setar valor do atributo codgrp
	function setcodgrp($codgrp) {

		$this->codgrp = (int) $codgrp;

	}

	//Método para setar valor do atributo senha
	function setsenha($senha) {

		$this->senha = (string) $senha;

	}

	//Método para setar valor do atributo fatorusertabela
	function setfatorusertabela($fatorusertabela) {

		$this->fatorusertabela = (real) $fatorusertabela;

	}

	//Método para setar valor do atributo fatorcusto
	function setfatorcusto($fatorcusto) {

		$this->fatorcusto = (real) $fatorcusto;

	}

	//Método para setar valor do atributo tipocliente
	function settipocliente($tipocliente) {

		$this->tipocliente = (string) $tipocliente;

	}

	//Método para setar valor do atributo doc
	function setdoc($doc) {

		$this->doc = (string) $doc;

	}

	//Método para setar valor do atributo codsuper
	function setcodsuper($codsuper) {

		$this->codsuper = (int) $codsuper;

	}

	//Método para setar valor do atributo codemp
	function setcodemp($codemp) {

		$this->codemp = (int) $codemp;

	}

	//Método para setar valor do atributo block
	function setblock($block) {

		$this->block = (string) $block;

	}

	//Método para setar valor do atributo msg
	function setmsg($msg) {

		$this->msg = (string) $msg;

	}

	//Método para setar valor do atributo codcx
	function setcodcx($codcx) {

		$this->codcx = (int) $codcx;

	}

	//Método para setar valor do atributo dataini
	function setdataini($dataini) {

		$this->dataini = (string) $dataini;

	}

	//Método para setar valor do atributo dataatualiza
	function setdataatualiza($dataatualiza) {

		$this->dataatualiza = (string) $dataatualiza;

	}

	//Método para setar valor do atributo fatorcomissao
	function setfatorcomissao($fatorcomissao) {

		$this->fatorcomissao = (real) $fatorcomissao;

	}

	//Método para setar valor do atributo allemp
	function setallemp($allemp) {

		$this->allemp = (string) $allemp;

	}

	//Método para setar valor do atributo allcx
	function setallcx($allcx) {

		$this->allcx = (string) $allcx;

	}

	//Método para setar valor do atributo codncgrp
	function setcodncgrp($codncgrp) {

		$this->codncgrp = (int) $codncgrp;

	}

	//Método para setar valor do atributo tiponcgrp
	function settiponcgrp($tiponcgrp) {

		$this->tiponcgrp = (string) $tiponcgrp;

	}

	//Método para setar valor do atributo email_cel
	function setemail_cel($email_cel) {

		$this->email_cel = (string) $email_cel;

	}

	//Método para setar valor do atributo email_nc
	function setemail_nc($email_nc) {

		$this->email_nc = (string) $email_nc;

	}

	//Método para setar valor do atributo email_msg
	function setemail_msg($email_msg) {

		$this->email_msg = (string) $email_msg;

	}

	//Método para setar valor do atributo ped_lib
	function setped_lib($ped_lib) {

		$this->ped_lib = (string) $ped_lib;

	}

	//Método para setar valor do atributo codproj
	function setcodproj($codproj) {

		$this->codproj = (int) $codproj;

	}

	//Método para setar valor do atributo tipouserproj
	function settipouserproj($tipouserproj) {

		$this->tipouserproj = (string) $tipouserproj;

	}

	//Método para setar valor do atributo meta
	function setmeta($meta) {

		$this->meta = (int) $meta;

	}

	//Método para setar valor do atributo msg_fin
	function setmsg_fin($msg_fin) {

		$this->msg_fin = (string) $msg_fin;

	}

	//Método para setar valor do atributo funcionario
	function setfuncionario($funcionario) {

		$this->funcionario = (string) $funcionario;

	}

	//Método para setar valor do atributo caixa_vend
	function setcaixa_vend($caixa_vend) {

		$this->caixa_vend = (string) $caixa_vend;

	}

	//Método para setar valor do atributo fatorcomissao_serv
	function setfatorcomissao_serv($fatorcomissao_serv) {

		$this->fatorcomissao_serv = (real) $fatorcomissao_serv;

	}

	//Método para setar valor do atributo list_cli
	function setlist_cli($list_cli) {

		$this->list_cli = (string) $list_cli;

	}

	//Método para setar valor do atributo papel_rec
	function setpapel_rec($papel_rec) {

		$this->papel_rec = (string) $papel_rec;

	}

	//Método para setar valor do atributo codemp_transf
	function setcodemp_transf($codemp_transf) {

		$this->codemp_transf = (int) $codemp_transf;

	}

	//Método para setar valor do atributo candidato
	function setcandidato($candidato) {

		$this->candidato = (string) $candidato;

	}

	//Método para setar valor do atributo eleitor
	function seteleitor($eleitor) {

		$this->eleitor = (string) $eleitor;

	}

	//Método para setar valor do atributo data_inimcv
	function setdata_inimcv($data_inimcv) {

		$this->data_inimcv = (string) $data_inimcv;

	}

	//Método para setar valor do atributo data_fimmcv
	function setdata_fimmcv($data_fimmcv) {

		$this->data_fimmcv = (string) $data_fimmcv;

	}

	//Método para setar valor do atributo mcv_prot
	function setmcv_prot($mcv_prot) {

		$this->mcv_prot = (real) $mcv_prot;

	}

	//Método para setar valor do atributo mcv_aplic
	function setmcv_aplic($mcv_aplic) {

		$this->mcv_aplic = (real) $mcv_aplic;

	}

	//Método para setar valor do atributo meia_mcv
	function setmeia_mcv($meia_mcv) {

		$this->meia_mcv = (string) $meia_mcv;

	}

	//Método para setar valor do atributo image_user
	function setimage_user($image_user) {

		$this->image_user = (string) $image_user;

	}

	//Método para setar valor do atributo vot_descricao
	function setvot_descricao($vot_descricao) {

		$this->vot_descricao = (string) $vot_descricao;

	}

	//Método para setar valor do atributo alcada
	function setalcada($alcada) {

		$this->alcada = (real) $alcada;

	}

	//Método para setar valor do atributo tipo_celular
	function settipo_celular($tipo_celular) {

		$this->tipo_celular = (string) $tipo_celular;

	}

	//Método para setar valor do atributo malote
	function setmalote($malote) {

		$this->malote = (string) $malote;

	}

	//Método para setar valor do atributo mcv_prot_max
	function setmcv_prot_max($mcv_prot_max) {

		$this->mcv_prot_max = (real) $mcv_prot_max;

	}

	//Método para setar valor do atributo mcv_prot_min
	function setmcv_prot_min($mcv_prot_min) {

		$this->mcv_prot_min = (real) $mcv_prot_min;

	}

	//Método para setar valor do atributo mcv_incre
	function setmcv_incre($mcv_incre) {

		$this->mcv_incre = (real) $mcv_incre;

	}

	//Método para setar valor do atributo meia_mcv_hab
	function setmeia_mcv_hab($meia_mcv_hab) {

		$this->meia_mcv_hab = (string) $meia_mcv_hab;

	}

	//Método para setar valor do atributo tipo_info
	function settipo_info($tipo_info) {

		$this->tipo_info = (string) $tipo_info;

	}

	//Método para setar valor do atributo tipo_tecnico
	function settipo_tecnico($tipo_tecnico) {

		$this->tipo_tecnico = (string) $tipo_tecnico;

	}

	//Método para setar valor do atributo seed
	function setseed($seed) {

		$this->seed = (int) $seed;

	}

	//Método para setar valor do atributo fatorusertabela_cel
	function setfatorusertabela_cel($fatorusertabela_cel) {

		$this->fatorusertabela_cel = (real) $fatorusertabela_cel;

	}

	///////////////////////////////////////
	//Métodos GET
	///////////////////////////////////////


		//Método para pegar valor do atributo codvend
	function getcodvend() {

		return (int) $this->codvend;

	}
	//Método para pegar valor do atributo nome
	function getnome() {

		return (string) $this->nome;

	}
	//Método para pegar valor do atributo tipo
	function gettipo() {

		return (string) $this->tipo;

	}
	//Método para pegar valor do atributo codgrp
	function getcodgrp() {

		return (int) $this->codgrp;

	}
	//Método para pegar valor do atributo senha
	function getsenha() {

		return (string) $this->senha;

	}
	//Método para pegar valor do atributo fatorusertabela
	function getfatorusertabela() {

		return (real) $this->fatorusertabela;

	}
	//Método para pegar valor do atributo fatorcusto
	function getfatorcusto() {

		return (real) $this->fatorcusto;

	}
	//Método para pegar valor do atributo tipocliente
	function gettipocliente() {

		return (string) $this->tipocliente;

	}
	//Método para pegar valor do atributo doc
	function getdoc() {

		return (string) $this->doc;

	}
	//Método para pegar valor do atributo codsuper
	function getcodsuper() {

		return (int) $this->codsuper;

	}
	//Método para pegar valor do atributo codemp
	function getcodemp() {

		return (int) $this->codemp;

	}
	//Método para pegar valor do atributo block
	function getblock() {

		return (string) $this->block;

	}
	//Método para pegar valor do atributo msg
	function getmsg() {

		return (string) $this->msg;

	}
	//Método para pegar valor do atributo codcx
	function getcodcx() {

		return (int) $this->codcx;

	}
	//Método para pegar valor do atributo dataini
	function getdataini() {

		return (string) $this->dataini;

	}
	//Método para pegar valor do atributo dataatualiza
	function getdataatualiza() {

		return (string) $this->dataatualiza;

	}
	//Método para pegar valor do atributo fatorcomissao
	function getfatorcomissao() {

		return (real) $this->fatorcomissao;

	}
	//Método para pegar valor do atributo allemp
	function getallemp() {

		return (string) $this->allemp;

	}
	//Método para pegar valor do atributo allcx
	function getallcx() {

		return (string) $this->allcx;

	}
	//Método para pegar valor do atributo codncgrp
	function getcodncgrp() {

		return (int) $this->codncgrp;

	}
	//Método para pegar valor do atributo tiponcgrp
	function gettiponcgrp() {

		return (string) $this->tiponcgrp;

	}
	//Método para pegar valor do atributo email_cel
	function getemail_cel() {

		return (string) $this->email_cel;

	}
	//Método para pegar valor do atributo email_nc
	function getemail_nc() {

		return (string) $this->email_nc;

	}
	//Método para pegar valor do atributo email_msg
	function getemail_msg() {

		return (string) $this->email_msg;

	}
	//Método para pegar valor do atributo ped_lib
	function getped_lib() {

		return (string) $this->ped_lib;

	}
	//Método para pegar valor do atributo codproj
	function getcodproj() {

		return (int) $this->codproj;

	}
	//Método para pegar valor do atributo tipouserproj
	function gettipouserproj() {

		return (string) $this->tipouserproj;

	}
	//Método para pegar valor do atributo meta
	function getmeta() {

		return (int) $this->meta;

	}
	//Método para pegar valor do atributo msg_fin
	function getmsg_fin() {

		return (string) $this->msg_fin;

	}
	//Método para pegar valor do atributo funcionario
	function getfuncionario() {

		return (string) $this->funcionario;

	}
	//Método para pegar valor do atributo caixa_vend
	function getcaixa_vend() {

		return (string) $this->caixa_vend;

	}
	//Método para pegar valor do atributo fatorcomissao_serv
	function getfatorcomissao_serv() {

		return (real) $this->fatorcomissao_serv;

	}
	//Método para pegar valor do atributo list_cli
	function getlist_cli() {

		return (string) $this->list_cli;

	}
	//Método para pegar valor do atributo papel_rec
	function getpapel_rec() {

		return (string) $this->papel_rec;

	}
	//Método para pegar valor do atributo codemp_transf
	function getcodemp_transf() {

		return (int) $this->codemp_transf;

	}
	//Método para pegar valor do atributo candidato
	function getcandidato() {

		return (string) $this->candidato;

	}
	//Método para pegar valor do atributo eleitor
	function geteleitor() {

		return (string) $this->eleitor;

	}
	//Método para pegar valor do atributo data_inimcv
	function getdata_inimcv() {

		return (string) $this->data_inimcv;

	}
	//Método para pegar valor do atributo data_fimmcv
	function getdata_fimmcv() {

		return (string) $this->data_fimmcv;

	}
	//Método para pegar valor do atributo mcv_prot
	function getmcv_prot() {

		return (real) $this->mcv_prot;

	}
	//Método para pegar valor do atributo mcv_aplic
	function getmcv_aplic() {

		return (real) $this->mcv_aplic;

	}
	//Método para pegar valor do atributo meia_mcv
	function getmeia_mcv() {

		return (string) $this->meia_mcv;

	}
	//Método para pegar valor do atributo image_user
	function getimage_user() {

		return (string) $this->image_user;

	}
	//Método para pegar valor do atributo vot_descricao
	function getvot_descricao() {

		return (string) $this->vot_descricao;

	}
	//Método para pegar valor do atributo alcada
	function getalcada() {

		return (real) $this->alcada;

	}
	//Método para pegar valor do atributo tipo_celular
	function gettipo_celular() {

		return (string) $this->tipo_celular;

	}
	//Método para pegar valor do atributo malote
	function getmalote() {

		return (string) $this->malote;

	}
	//Método para pegar valor do atributo mcv_prot_max
	function getmcv_prot_max() {

		return (real) $this->mcv_prot_max;

	}
	//Método para pegar valor do atributo mcv_prot_min
	function getmcv_prot_min() {

		return (real) $this->mcv_prot_min;

	}
	//Método para pegar valor do atributo mcv_incre
	function getmcv_incre() {

		return (real) $this->mcv_incre;

	}
	//Método para pegar valor do atributo meia_mcv_hab
	function getmeia_mcv_hab() {

		return (string) $this->meia_mcv_hab;

	}
	//Método para pegar valor do atributo tipo_info
	function gettipo_info() {

		return (string) $this->tipo_info;

	}
	//Método para pegar valor do atributo tipo_tecnico
	function gettipo_tecnico() {

		return (string) $this->tipo_tecnico;

	}
	//Método para pegar valor do atributo seed
	function getseed() {

		return (int) $this->seed;

	}
	//Método para pegar valor do atributo fatorusertabela_cel
	function getfatorusertabela_cel() {

		return (real) $this->fatorusertabela_cel;

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
			$this->setcodvend($id);
		}
		$q = mysql_query("SELECT * FROM vendedor WHERE codvend = '".$this->getcodvend()."'");
		$row = mysql_fetch_object($q);
		$vars = get_object_vars($row);
		foreach ( $vars as $key => $var ) {
		   $this->{$key} = stripslashes($var);
		}
		$this->getgrupo();
	}

	//Metodo para pegar todos os registros do banco de dados
	function getlista($filtro = '1') {

		$q = mysql_query("SELECT codvend FROM vendedor WHERE $filtro");

		for ($i = 0; $i < mysql_num_rows($q); $i++) {
			
			$ob = new vendedor;
			$ob->setcodvend(mysql_result($q, $i, "codvend"));
			$ob->getdadosfromid();

			$obarray[] = $ob;
		}
		return (array) $obarray; // array de objetos vendedor
	}

	//Metodo que pega o menu do usuario
	function getmenu() {
		$vm = new v_menu();
		$vlista = $vm->getlista("codgrp = '".$this->getcodgrp()."' ORDER BY codmenu, nomem");
		$this->menu = $vlista;

	}

	//Metodo que pega o grupo do usuario
	function getgrupo() {
		$gr = new segurancagrp();
		$gr->getdadosfromid($this->getcodgrp());
		$this->grupo = $gr;
	}

	//Metodo que insere um registro no banco
	function insere() {
		$q = mysql_query("INSERT INTO vendedor (nome, tipo, codgrp, senha, fatorusertabela, fatorcusto, tipocliente, doc, codsuper, codemp, block, msg, codcx, dataini, dataatualiza, fatorcomissao, allemp, allcx, codncgrp, tiponcgrp, email_cel, email_nc, email_msg, ped_lib, codproj, tipouserproj, meta, msg_fin, funcionario, caixa_vend, fatorcomissao_serv, list_cli, papel_rec, codemp_transf, candidato, eleitor, data_inimcv, data_fimmcv, mcv_prot, mcv_aplic, meia_mcv, image_user, vot_descricao, alcada, tipo_celular, malote, mcv_prot_max, mcv_prot_min, mcv_incre, meia_mcv_hab, tipo_info, tipo_tecnico, seed, fatorusertabela_cel) VALUES ('".$this->getnome()."', '".$this->gettipo()."', '".$this->getcodgrp()."', '".$this->getsenha()."', '".$this->getfatorusertabela()."', '".$this->getfatorcusto()."', '".$this->gettipocliente()."', '".$this->getdoc()."', '".$this->getcodsuper()."', '".$this->getcodemp()."', '".$this->getblock()."', '".$this->getmsg()."', '".$this->getcodcx()."', '".$this->getdataini()."', '".$this->getdataatualiza()."', '".$this->getfatorcomissao()."', '".$this->getallemp()."', '".$this->getallcx()."', '".$this->getcodncgrp()."', '".$this->gettiponcgrp()."', '".$this->getemail_cel()."', '".$this->getemail_nc()."', '".$this->getemail_msg()."', '".$this->getped_lib()."', '".$this->getcodproj()."', '".$this->gettipouserproj()."', '".$this->getmeta()."', '".$this->getmsg_fin()."', '".$this->getfuncionario()."', '".$this->getcaixa_vend()."', '".$this->getfatorcomissao_serv()."', '".$this->getlist_cli()."', '".$this->getpapel_rec()."', '".$this->getcodemp_transf()."', '".$this->getcandidato()."', '".$this->geteleitor()."', '".$this->getdata_inimcv()."', '".$this->getdata_fimmcv()."', '".$this->getmcv_prot()."', '".$this->getmcv_aplic()."', '".$this->getmeia_mcv()."', '".$this->getimage_user()."', '".$this->getvot_descricao()."', '".$this->getalcada()."', '".$this->gettipo_celular()."', '".$this->getmalote()."', '".$this->getmcv_prot_max()."', '".$this->getmcv_prot_min()."', '".$this->getmcv_incre()."', '".$this->getmeia_mcv_hab()."', '".$this->gettipo_info()."', '".$this->gettipo_tecnico()."', '".$this->getseed()."', '".$this->getfatorusertabela_cel()."')");
		
	}

	//Metodo que altera um registro no banco
	function altera() {
		$q = mysql_query("UPDATE vendedor SET nome = '".$this->getnome()."', tipo = '".$this->gettipo()."', codgrp = '".$this->getcodgrp()."', senha = '".$this->getsenha()."', fatorusertabela = '".$this->getfatorusertabela()."', fatorcusto = '".$this->getfatorcusto()."', tipocliente = '".$this->gettipocliente()."', doc = '".$this->getdoc()."', codsuper = '".$this->getcodsuper()."', codemp = '".$this->getcodemp()."', block = '".$this->getblock()."', msg = '".$this->getmsg()."', codcx = '".$this->getcodcx()."', dataini = '".$this->getdataini()."', dataatualiza = '".$this->getdataatualiza()."', fatorcomissao = '".$this->getfatorcomissao()."', allemp = '".$this->getallemp()."', allcx = '".$this->getallcx()."', codncgrp = '".$this->getcodncgrp()."', tiponcgrp = '".$this->gettiponcgrp()."', email_cel = '".$this->getemail_cel()."', email_nc = '".$this->getemail_nc()."', email_msg = '".$this->getemail_msg()."', ped_lib = '".$this->getped_lib()."', codproj = '".$this->getcodproj()."', tipouserproj = '".$this->gettipouserproj()."', meta = '".$this->getmeta()."', msg_fin = '".$this->getmsg_fin()."', funcionario = '".$this->getfuncionario()."', caixa_vend = '".$this->getcaixa_vend()."', fatorcomissao_serv = '".$this->getfatorcomissao_serv()."', list_cli = '".$this->getlist_cli()."', papel_rec = '".$this->getpapel_rec()."', codemp_transf = '".$this->getcodemp_transf()."', candidato = '".$this->getcandidato()."', eleitor = '".$this->geteleitor()."', data_inimcv = '".$this->getdata_inimcv()."', data_fimmcv = '".$this->getdata_fimmcv()."', mcv_prot = '".$this->getmcv_prot()."', mcv_aplic = '".$this->getmcv_aplic()."', meia_mcv = '".$this->getmeia_mcv()."', image_user = '".$this->getimage_user()."', vot_descricao = '".$this->getvot_descricao()."', alcada = '".$this->getalcada()."', tipo_celular = '".$this->gettipo_celular()."', malote = '".$this->getmalote()."', mcv_prot_max = '".$this->getmcv_prot_max()."', mcv_prot_min = '".$this->getmcv_prot_min()."', mcv_incre = '".$this->getmcv_incre()."', meia_mcv_hab = '".$this->getmeia_mcv_hab()."', tipo_info = '".$this->gettipo_info()."', tipo_tecnico = '".$this->gettipo_tecnico()."', seed = '".$this->getseed()."', fatorusertabela_cel = '".$this->getfatorusertabela_cel()."' WHERE codvend = '".$this->getcodvend()."'");
		
	}

	//Metodo que exclui um registro do banco
	function exclui() {
		$q = mysql_query("DELETE FROM vendedor WHERE codvend = '".$this->getcodvend()."'");
		
	}

}

?>
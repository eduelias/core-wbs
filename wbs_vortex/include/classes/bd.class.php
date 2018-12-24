<?
class conexao
{

    var $conn ;
	
	function errormsg(){
	
		return $this->conn->ErrorMsg();
	
	}

    function connect_wbs()
    {
        $this->conn = ADONewConnection(WBS_TIPODB);
        if (!$this->conn) die("Connection failed");
        $this->conn->debug = false;
        $this->conn->Connect(WBS_SERVER, WBS_USER, WBS_PASSWORD, WBS_DB);

    } //function
    
     function connect_data()
    {
        $this->conn = ADONewConnection(WBS_TIPODB);
        if (!$this->conn) die("Connection failed");
        $this->conn->debug = false;
        $this->conn->Connect(DATA_SERVER, DATA_USER, DATA_PASSWORD, DATA_DB);

    } //function
    
     function connect_ipa()
    {
        $this->conn = ADONewConnection(WBS_TIPODB);
        if (!$this->conn) die("Connection failed");
        $this->conn->debug = false;
        $this->conn->Connect(IPA_SERVER, IPA_USER, IPA_PASSWORD, IPA_DB);

    } //function
    
     function disconnect()
    {
        $this->conn->Close;

    } //function
	
	
	   function query_db ($query_db)
    {
         $result = $this->conn->Execute($query_db);

        return $result;
    } //function
	
	function get_all($conex) {
		$result = $this->conn->adodb_getall($conex);
		return $result;
	}
	
}
	/*
		BUGS:
			+ Forms com checkbox ainda estão com problemas para envio S/N
			+ Se não houver ao menos uma condicional, altera TODA a tabela - CORRIGIR
			+ não checa o que vem, apenas usa. 
			+ se houverem condições para tabelas que não têm campos no form, vai tentar enviar a condição assim mesmo;
		
		HOW-TO:
			+ Definir uma condição:
				- no campo hidden do form, colocar no nome do campo 'cond'@<nome_da_tabela>@<nome_do_campo_chave> e no value o valor da chave à ser alterada
				- para definir condições diferentes à tabelas diferentes, colocar varios campos hidden no formato acima
				
			+ Mudando valores de campo:
				- definir campos de formulário como name=<nome_da_tabela>@<nome_do_campo>;
				
		TO-DO:
			* TROCAR SEPARADOR DE '_' por @ (BETA1 11-10-2007)
			* IMPLEMENTAR INSERÇÃO	(BETA1) (11-10-2007 OK)
			* IMPLEMENTAR DELEÇÃO			(OK 11-10-2007)
			+ Implementar uma func que pegue esse array e transforme em XML;
			+ checar sempre se os dados estão consistentes com o que será passado ao SQL;
	*/

	class bd extends conexao{
	
		private $tb_atual;
		private $sql;
		private $raw;
		private $tabelas;
		private $debug;
		
		function get_sql_error(){
			return (array) $this->debug;
		}
		
		function get_tabelas(){
			return (array) $this->tabelas;
		}
		
		function get_raw(){
			return (array) $this->raw;
		}
		
		function get_debug(){
		
			return array('sql'=>$this->sql,'mysqlerr'=>$this->get_sql_error());
		
		}
		
		function get_sql(){
			return $this->sql;
			
		}
		
		function get_tabela(){
			return (string) $this->tb_atual;
		}
		
		//Gera RAW data para retornos únicos
		function gera_raw($campos,$tabelas,$condicao,$chave = '1'){
			parent::connect_wbs();
			$sql = 'SELECT '.$campos.' FROM '.$tabelas.' WHERE '.$condicao;
			$result = parent::query_db($sql);
			$this->sql = $sql;
			$this->raw = $result->fields;
			return $this->raw;
		}
		
		//Gera array de dados escolhendo o campo,tabela e condição, podendo retornar o id do array como código primário fornecido
		function gera_array($campos,$tabelas = '',$condicao = '',$chave = '1'){
			parent::connect_wbs();
			$sql = ($tabelas=='')?'SELECT '.$campos:'SELECT '.$campos.' FROM '.$tabelas.' WHERE '.$condicao;
			//$sql = ;
			$result = parent::query_db($sql);
			$this->sql = $sql;
			$this->raw = $result->fields;

			if(method_exists($result,GetArray)) { 
				$work = $result->GetArray(); 
				if (is_array($work)){
					foreach ($work as $field=>$value){
						foreach($value as $k=>$val){
							//checa se o indice é inteiro ou associativo, se inteiro, descarta. Usa apenas associativo.
							if (!is_integer($k)){
								
								$done[$k] = (gettype($val)=='integer')?(int) $val:$val;
							}
						}
						//checa se o usuário passou o campo chave primária para retornar no array como indice
						if ($chave == '1') {
							$rs[$field] = $done;
							//$rs[] = $done;
						} else {
							$rs[$done[$chave]] = $done;
						}
					}
				} else {
					if (method_exists($resutl,GetRowAssoc)) {
						$rs = $result->GetRowAssoc();
					} else {
						$rs='';
					}
				}
			} else { 
				$this->debug['sqlerr'] = parent::errormsg();
				$rs = '';
			}
			//pre($this->sql);
			//retorna o array
			return $rs;
		}############################################################################# FIM GERA ARRAY
		
		function gera_array_by_sql($sql){
			parent::connect_wbs();
			$result = parent::query_db($sql);
			$this->sql = $sql;
			$this->raw = $result->fields;

			if(method_exists($result,GetArray)) { 
				$work = $result->GetArray(); 
				if (is_array($work)){
					foreach ($work as $field=>$value){
						foreach($value as $k=>$val){
							//checa se o indice é inteiro ou associativo, se inteiro, descarta. Usa apenas associativo.
							if (!is_integer($k)){
								
								$done[$k] = (gettype($val)=='integer')?(int) $val:$val;
							}
						}
						//checa se o usuário passou o campo chave primária para retornar no array como indice
						if ($chave == '1') {
							$rs[$field] = $done;
							//$rs[] = $done;
						} else {
							$rs[$field] = $done;
						}
					}
				} else {
					if (method_exists($resutl,GetRowAssoc)) {
						$rs = $result->GetRowAssoc();
					} else {
						#$this->debug['sqlerr'] = parent::errormsg();
						$rs='';
					}
				}
			} else { 
				$this->debug['sqlerr'] = parent::errormsg();
				$rs = 0;
			}
			return $rs;
		}
		
		
		function gera_json($sql){
			$res = $this->gera_array_by_sql($sql);	
			
			$json = new Services_JSON();
			$data = $json->encode($res);
			$this->debug['sqlerr'] = parent::errormsg();
			return $data;
		}
		
		
		//função que gerencia alterações no banco de dados (UPDATE);
		function altera($campos){
			parent::connect_wbs();
			//inicia a tabela em array vazia;
			$table = array();
			$i = 0;
			//vamos estudar cada item vindo no post;
			foreach($campos as $tabela_campo => $valor){
				//primeiro vamos separar 'tabela' e 'campo'.
				$aux = explode('@',$tabela_campo);
				//pegando a primeira informação do campo, se for uma condicional
				if ($aux[0]=='cond'){
					//une o campo condicional à tabela que esse campo pertence
					$condicao = $aux[1].'.'.$aux[2];
					//pega um array com indice tabela.campo e a condição necessária
					$fil[$condicao] = $valor;
				//se não for uma condição ...	
				} else {
					//nomeamos o campo tabela.campo
					$campo = $aux[0].'.'.$aux[1];
					//se a tabela for diferente da anterior, guardar o nome dela
					if ($aux[0] <> $tab){
						//guardando no array tabelas[i] o nome dessa 'tabela nova'
						$tabelas[$i] = $aux[0];
						//aumentando o indice
						$i++;
					}
					//tirando nomes duplicados do array de tabelas
					$tabelas = array_unique($tabelas);
					//colocando no array principal table[tabela.campo] o valor que veio
					$table[$campo] = $valor;				
					//guardando o nome dessa tal tabela que usamos agora para checarmos acima
					$tab = $aux[0];
				}
			}
			
			//tabelas é um array com cada tabela que veio no post
			foreach ($tabelas as $tabela){
				//colocando o update na variavel sql, segundo a tabela que estamos aqui
				$sql .= 'UPDATE '.$tabela.' SET ';
				//pegando cada campo segundo tabela.campo->valor
				foreach ($table as $field=>$value){
					//separando agora tabela.campo para 0->tabela 1->campo
					$tab_campo = explode('.',$field);
					//se esse campo pertence a tabela que estamos trabalhando agora, vamos fazer um sql pra ele, se não, VAZA.
					if ($tab_campo[0]==$tabela) {
						//ATENÇÃO: esse convert confere se os acentos e tudo mais estão de acordo com o Banco, sem erros de charset;
						$sql .="`".$tab_campo[1]."`=CONVERT(\"".utf8_decode($value)."\" USING utf8),";
					}
				}
				//tirando a maldita ultima vírgula
				$sql = substr($sql,0,-1);
				//começando a definir onde vamos alterar
				$sql .= ' WHERE ';
				//vamos pegar os filtros e passa-los ao SQL
				if (is_array($fil)){
					foreach ($fil as $campo=>$true){
						//separando a condição tabela.campo em 0->tabela 1->campo
						$campo_tb = explode('.',$campo);
						//checando se a condição que vamos trabalhar agora pertence a tabela que estamos alterando
						if ($campo_tb[0] == $tabela) {
							//se é daqui, vamos trabalhar
							$sql .= $campo_tb[1].' = '.$true.' AND ';
						}
					}
					$sql .= ' 1=1 ';
				} else {
						$campo_tb = explode('.',$campo);
						//checando se a condição que vamos trabalhar agora pertence a tabela que estamos alterando
						if ($campo_tb[0] == $tabela) {
						//se é daqui, vamos trabalhar
							$sql .= $campo_tb[1].' = '.$true;
						}
				}
				//terminando a condicional -> CASO NÃO HAJA CONDIÇÃO NO FORM, VAI ALTERAR TUDO ---> CORRIGIR
				
				#guardando o sql para resposta;
				$this->sql = $sql;
				$return = parent::query_db($sql);
				//$this->sql = $sql; //print_r($fil);
			}		
		}############################################################################# FIM ALTERA 
		
		function del($tabela,$campo,$chave){
			$this->sql = 'DELETE FROM '.$tabela.' WHERE '.$campo.'='.$chave;
			parent::connect_wbs();
			$this->raw = parent::query_db($this->sql);
		}
		
		function send_sql($sql){
			$this->sql = $sql;
			parent::connect_wbs();
			$this->raw = parent::query_db($this->sql);
			return $this->raw;
		}
		
		//função que deleta multiplos campos dentro do BD
		function delete($post){
			$i=0;
			foreach($post as $campo=>$chave){
				$cp = explode('@',$campo);
				if (!$cp[0]=='file'){
					$field = $cp[0].'.'.$cp[1];
					$deletar[$field] = $chave;
					$tab[$i] = $cp[0];
					$i++;
				}
			}

			$chave = substr($chave, 0, -2);
			$chave = substr($chave, 2);
			
			$sql = '';
			if (is_array($tab)){
				foreach(array_unique($tab) as $tabela){
					$sql .= 'DELETE FROM '.$tabela.' WHERE ';
					if (is_array($deletar)){
						foreach($deletar as $chave=>$valor){
							$k = explode('.',$chave);
							if ($k[0] == $tabela) {
								$sql .= $k[1].'='.$valor;
							}
						}
					} else {
						$sql .= $cp[1].'='.$chave;
					}
				}
			} else {
				$sql .= 'DELETE FROM '.$cp[0].' WHERE ';
				if (is_array($deletar)){
					foreach($deletar as $chave=>$valor){
						$k = explode('.',$chave);
						if ($k[0] == $tabela) {
							$sql .= $k[1].'='.$valor;
						}
					}
				} else {
					$sql .= $cp[1].'='.$chave;
				}
			}
			parent::connect_wbs();
			parent::query_db($sql);
		}############################################################## FIM DELETE
		

		//função que gerencia as inserções no banco de dados baseadas na alteração (INSERT) -> Trocado _ por @
		function insere($campos){
			parent::connect_wbs();
			//inicia a tabela em array vazia;
			$table = array();
			$i = 0;
			$tab = '';
			//vamos estudar cada item vindo no post;
			foreach($campos as $tabela_campo => $valor){
				//primeiro vamos separar 'tabela' e 'campo'. Que no form são separados por "@"
				$aux = explode('@',$tabela_campo);
				if ($aux[0] <> $tab){
					//guardando no array tabelas[i] o nome dessa 'tabela nova'
					$tabelas[$i] = $aux[0];
					//aumentando o indice
					$i++;
				}
				$campo = $tabela_campo;
				//colocando no array principal table[tabela.campo] o valor que veio
				$table[$campo] = $valor;				
				//guardando o nome dessa tal tabela que usamos agora para checarmos acima
				$tab = $aux[0];
			}
			//tirando nomes duplicados do array de tabelas
			$tabelas = array_unique($tabelas);
			//tabelas é um array com cada tabela que veio no post
			foreach ($tabelas as $tabela){
				$this->tabelas[] = $tabela;
				$this->tb_atual = $tabela;
				//colocando o update na variavel sql, segundo a tabela que estamos aqui
				//if ($tabela{0} == 'n') { $tabela = substr($tabela,1); }
				$sql .= 'INSERT INTO '.$tabela.' (';
				//pegando cada campo segundo tabela.campo->valor
				foreach ($table as $field=>$value){
					//separando agora tabela.campo para 0->tabela 1->campo
					$tab_campo = explode('@',$field);
					//se esse campo pertence a tabela que estamos trabalhando agora, vamos fazer um sql pra ele, se não, VAZA.
					if ($tab_campo[0]==$tabela) {
						//ATENÇÃO: esse convert confere se os acentos e tudo mais estão de acordo com o Banco, sem erros de charset;
						$sql .="`".$tab_campo[1]."`,";
					}
				}
				//tirando a maldita ultima vírgula
				$sql = substr($sql,0,-1);
				$sql .= ") VALUES (";
				foreach ($table as $field=>$value){
					$tab_campo = explode('@',$field);
					if ($tab_campo[0]==$tabela){
						$sql .= "CONVERT(\"".utf8_decode($value)."\" USING utf8),";
					}
				}
				$sql = substr($sql,0,-1);
				$sql .= ')';

				#guardando o sql para resposta;
				$return = parent::query_db($sql);
				$this->raw = $return;
				$this->sql = $sql;
				return 0;
			}		
		}############################################################################# FIM INSERE =";
	}
?>
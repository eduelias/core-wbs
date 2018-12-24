<?php

// WBS
class CEP
{
	/// the server to connect to
    var $Server;
    /// the database to use
    var $DB;
    /// the username to use
    var $User;
    /// the password to use
    var $Password;
	/// numero de pesquisas
	var $queries = 0;



	/*!
      Constructs a new eZDB object, connects to the database and
      selects the desired table.

      The eZDB constructor takes a .ini file as an argument.
      The second argument defines under what category in the .ini
      file the database information is located.
    */
    function connect()
    {
		$this->Server = WBS_SERVER;
		$this->User = WBS_USER;
		$this->Password = WBS_PASSWORD;
		$this->DB = WBS_DB;

        mysql_connect( $this->Server, $this->User, $this->Password )
            or print( "Error: could not connect to the database." );

        mysql_select_db( $this->DB )
            or print( "Error: could not connect to the database." );;
    }


  function busca($cep, &$erro) {
    if (ereg('^([0-9]{5})([0-9]{3})$', $cep)) {
        $this->connect();
        /* pesquisando qual estado (uf) faz parte o cep */
        $sql    =  "SELECT LOWER(SiglaUF) AS uf FROM uf WHERE Faixa1iniUF <= '".substr($cep, 0, 5)."' AND Faixa1fimUF >= '".substr($cep, 0, 5)."' LIMIT 0,1";
        $result = mysql_query ($sql)
      		or die ('Erro na query' . mysql_error());
      	
         if ( mysql_num_rows( $result ) > 0 )
        {
          $uf =& mysql_fetch_array( $result );

          $sql         = "SELECT chvpatlog AS logradouro, NOMELOG AS endereco, chvbailog1 AS bairro, CEPLOG AS cep, chvloclog AS cidade FROM ".$uf['uf']." WHERE CEPLOG='".$cep."' ";
		  $result = mysql_query ($sql)
			 or die ('Erro na query' . mysql_error());

          if ( mysql_num_rows( $result ) > 0 )
       	 {
       	      $dados =& mysql_fetch_array( $result );
       	      $dados['uf'] = strtoupper($uf['uf']);
       	      
              $sql  = "SELECT nomepat AS logradouro FROM tipolog WHERE chavepat='".$dados['logradouro']."' ";
              $result = mysql_query ($sql);
              $pesq = mysql_fetch_array( $result );
              $dados['logradouro'] = $pesq['logradouro'];
              
              $sql  = "SELECT extensobai AS bairro FROM bairros WHERE chvlocbai='".$dados['cidade']."' and chavebai='".$dados['bairro']."' and ufbai = '".$dados['uf']."' ";
              $result = mysql_query ($sql);
              $pesq = mysql_fetch_array( $result );
              $dados['bairro'] = $pesq['bairro'];
              
              $sql  = "SELECT nomeloc AS cidade FROM localidades WHERE chaveloc='".$dados['cidade']."' ";
              $result = mysql_query ($sql);
              $pesq = mysql_fetch_array( $result );
              $dados['cidade'] = $pesq['cidade'];
       	      
              return $dados;
          } else {
			 

			 $sql  = "SELECT nomeloc AS cidade FROM localidades WHERE ceploc='".$cep."' ";
			  $result = mysql_query ($sql)
				   or die ('Erro na query' . mysql_error());
			 	
				  if ( mysql_num_rows( $result ) > 0 )
				 {
					   $pesq = mysql_fetch_array( $result );
						$dados['cidade'] = $pesq['cidade'];
						$dados['uf'] = strtoupper($uf['uf']);

						//echo($dados['cidade']);
					return $dados;
				 }else{
				$erro = "Nenhum registro localizado. Ex.: 80240000";
					
				 }
          }
        } else {
            $erro = "Nenhum registro localizado. Ex.: 80240000";
            
        }
     mysql_close();
    } else {
        $erro = "Formato inválido. Ex.: 01452002";
       
    }
  }
}


	

?>

<?php

// WBS
// arquivo:		ped_icarrinho.php
// template:	ped_icarrinho.htm
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
		$this->Server = 'localhost';
		$this->User = 'root';
		$this->Password = '!amargo@123';
		$this->DB = 'cep';

        mysql_connect( $this->Server, $this->User, $this->Password )
            or print( "Error: could not connect to the database." );

        mysql_select_db( $this->DB )
            or print( "Error: could not connect to the database." );;
    }


  function busca($cep) {
    if (ereg('^([0-9]{5})-([0-9]{3})$', $cep)) {
        $this->connect();
        /* pesquisando qual estado (uf) faz parte o cep */
        $sql    =  "SELECT LOWER(UF) AS uf FROM uf WHERE Cep1 <= '".substr($cep, 0, 5)."' AND Cep2 >= '".substr($cep, 0, 5)."' LIMIT 0,1";
        $result = mysql_query ($sql)
      	or die ('Erro na query' . mysql_error());
      	
      	echo("$sql - $result");

        if ( count( $result ) > 0 )
        {
          $uf =& mysql_fetch_array( $result );

          $sql         = "SELECT LOGRADOURO AS logradouro, Nome AS endereco, BAI_INI AS bairro_ini, BAI_FIM AS bairro_fim, CEP AS cep, COMPLEMENTO AS complemento, Localidade AS cidade FROM ".$uf['uf']." WHERE CEP='".$cep."'";
        echo("$sql");
          $result = mysql_query ($sql)
          or die ('Erro na query' . mysql_error());
          if ( count( $result ) > 0 )
       	 {
       	      $dados =& mysql_fetch_array( $result );
       	      $dados['uf'] = strtoupper($uf['uf']);
              return $dados;
          } else {
	    $erro = "Nenhum registro localizado. Ex.: 80240-000";
            return $erro;
          }
        } else {
            $erro = "Nenhum registro localizado. Ex.: 80240-000";
            return $erro;
        }
    
    } else {
        $erro = "Formato inválido. Ex.: 01452-002";
        return $erro;
    }
  }
}


	// TEMPLATE
	#include ("templates/ped_iformapg.htm");

?>

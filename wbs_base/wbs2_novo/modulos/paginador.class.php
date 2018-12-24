<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2005 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     paginador.class.php
+--------------------------------------------------------------
*/


class Mult_Pag {
  // Valores padrão para a navegação dos links
  var $num_pesq_pag;
  // Variáveis usadas internamente
  var $nome_arq ;
  var $total_reg;
  var $pagina;
  var $qtd_paginas;
  var $exibir_menu;
  var $tipo_view;

  /*
     Metodo construtor. Isto é somente usado para setar
     o número atual de colunas e outros métodos que
     podem ser re-usados mais tarde.
  */
  function Mult_Pag ()
  {
    global $pagina;
    $this->pagina = $pagina ? $pagina : 0;
  }

  function define_var($num_pesq_pag, $nome_arq, $total_reg, $tipo_view)
  {
    $this->num_pesq_pag = $num_pesq_pag;
    $this->nome_arq = $nome_arq;
    $this->total_reg = $total_reg;
    $this->tipo_view = $tipo_view;
  }

  /*
     Este método cria uma string que irá ser adicionada à
     url dos links de navegação. Isto é especialmente importante
     para criar links dinâmicos, então se você quiser adicionar
     opções adicionais à estas queries, a classe de navegação
     irá adicionar automaticamente aos links de navegação
     dinâmicos.
  */
  function Construir_Url()
  {
    global $REQUEST_URI, $REQUEST_METHOD, $HTTP_GET_VARS, $HTTP_POST_VARS;

    // separa o link em 2 strings
    @list($this->nome_arq, $voided) = @explode("?", $REQUEST_URI);

    if ($REQUEST_METHOD == "GET")    $cgi = $HTTP_GET_VARS;
    else                             $cgi = $HTTP_POST_VARS;
    reset($cgi); // posiciona no inicio do array

    // separa a coluna com o seu respectivo valor
    while (list($chave, $valor) = each($cgi))
      if ($chave != "pagina")
        $query_string .= "&" . $chave . "=" . $valor;

    return $query_string;
  }

  /*
     Este método cria uma ligação de todos os links da barra de
     navegação. Isto é útil, pois é totalmente independete do layout
     ou design da página. Este método retorna a ligação dos links
     chamados no script php, sendo assim, você pode criar links de
     navegação com o conteúdo atual da página.

         $opcao parâmetro:
          . "todos" - retorna todos os links de navegação
          . "numeracao" - retorna apenas páginas com links numerados
          . "strings" - retornar somente os links 'Próxima' e/ou 'Anterior'

         $mostra_string parâmetro:
          . "nao" - mostra 'Próxima' ou 'Anterior' apenas quando for necessários
          . "sim" - mostra 'Próxima' ou 'Anterior' de qualqur maneira
  */
function Construir_Links($opcao, $mostra_string)
{
    $extra_vars = $this->Construir_Url();
    $arquivo = $this->nome_arq;
    $num_mult_pag = ceil($this->total_reg / $this->num_pesq_pag); // numero de multiplas paginas
    $indice = -1; // indice do array final

    // ESTILO CSS DO PAGINADOR
    $array[++$indice] = "
    <style type='text/css'>
    <!--
    #paginador {
    	width: 100%;
    	margin: 0px auto;
    	padding: 0px;
    	text-align: center;
    	background-color: #FFFFFF;
    }
    #paginador ul {
    	color: #000000;
    	list-style: none;
    	padding: 3 1 3 1;
    	margin: 0;
    	font-family: Verdana, Arial, Helvetica, sans-serif;
    	font-size: 10px;
    }
    #paginador ul li {
        color: #000000;
    	list-style: none;
    	display: inline;
    	padding: 1;
    	margin: 1;
    }
    #paginador ul li span {
		color: #666666;
	}
    #paginador ul li span a {
		color: #EA0000;
		text-decoration: none;
	}
    #paginador ul li select {
    	border: 1px solid #666666;
    	font-family: Verdana, Arial, Helvetica, sans-serif;
    	font-size: 11px;
    	color: #666666;
    	background-color: #FFFFFF;
    	padding: 0px;
    }
    -->
    </style>
    ";

    // INICIO DO PAGINADOR
    $array[++$indice] = "
    <div id='paginador'>
    	<ul>
    ";

    if (($opcao == "todos") || ($opcao == "strings"))
    {
        // Atual
        $xpagina_atual = $this->pagina + 1;
        $array[++$indice] = "<li>[ P&aacute;gina <b>$xpagina_atual</b> de <b>$num_mult_pag</b> ]</li>";
    }

    for ($atual = 0; $atual < $num_mult_pag; $atual++)
    {
        // escreve a string esquerda (Pagina Anterior)
        if ((($opcao == "todos") || ($opcao == "strings")) && ($atual == 0))
        {
            if ($this->pagina != 0)
            {
                $array[++$indice] = '<li><a href="' . $arquivo . '?pagina=0' . $extra_vars . '"><img src="images/pag_pri.gif" border="0" align="absmiddle"></a></li>';
                $array[++$indice] = '<li><a href="' . $arquivo . '?pagina=' . ($this->pagina - 1) . $extra_vars . '"><img src="images/pag_ant.gif" border="0" align="absmiddle"></a></li>';

                // Pagina as paginas usando um select
                if ($this->tipo_view == "select")
                {
                    $array[++$indice] = '<li>';
                    $array[++$indice] = '<select name="select" onChange="if(options[selectedIndex].value) window.location.href=(options[selectedIndex].value)">';
                    $array[++$indice] .= '<option >P&aacute;gina</option>';

                    for ($h = 0; $h < $num_mult_pag; $h++)
                    {
                        $array[++$indice] .= '<option value = "' . $arquivo . '?pagina=' . ($h) . $extra_vars .'">'. ($h+1) .'</option>';
                    }
                    $array[++$indice] .= '</select></li>';
                }
            }
            elseif (($this->pagina == 0) && ($mostra_string == "sim"))
            {
                $array[++$indice] = '<li><img src="images/pag_pri2.gif" border="0" align="absmiddle"></li>';
                $array[++$indice] = '<li><img src="images/pag_ant2.gif" border="0" align="absmiddle"></li>';

                // Pagina as paginas usando um select
                if ($this->tipo_view == "select")
                {
                    $array[++$indice] = '<li>';
                    $array[++$indice] = '<select name="select" onChange="if(options[selectedIndex].value) window.location.href=(options[selectedIndex].value)">';
                    $array[++$indice] .= '<option >P&aacute;gina</option>';

                    for ($h = 0; $h < $num_mult_pag; $h++)
                    {
                        $array[++$indice] .= '<option value = "' . $arquivo . '?pagina=' . ($h) . $extra_vars .'">'. ($h+1) .'</option>';
                    }
                    $array[++$indice] .= '</select></li>';
                }
            }
        }

        // escreve a numeracao (1 2 3 ...)
        if (($opcao == "todos") || ($opcao == "numeracao") and $this->tipo_view == "numero")
        {
            if ($this->pagina == $atual)
            {
                $array[++$indice] = '<li><span>' . ($atual > 0 ? ($atual + 1) : 1) . '</span></li>';
            }
            else
            {
                $array[++$indice] = '<li><span><a href="' . $arquivo . '?pagina=' . $atual . $extra_vars . '">' . ($atual + 1) . '</a></span></li>';
            }
        }

        // escreve a string direita (Proxima Pagina)
        if ((($opcao == "todos") || ($opcao == "strings")) && ($atual == ($num_mult_pag - 1)))
        {
            if ($this->pagina != ($num_mult_pag - 1))
            {
                $array[++$indice] = '<li><a href="' . $arquivo . '?pagina=' . ($this->pagina + 1) . $extra_vars . '"><img src="images/pag_pro.gif" width="17" height="17" border="0" align="absmiddle"></a></li>';
                $array[++$indice] = '<li><a href="' . $arquivo . '?pagina=' . ($num_mult_pag - 1) . $extra_vars . '"><img src="images/pag_ult.gif" width="17" height="17" border="0" align="absmiddle"></a></li>';
            }
            elseif (($this->pagina == ($num_mult_pag - 1)) && ($mostra_string == "sim"))
            {
                $array[++$indice] = '<li><img src="images/pag_pro2.gif" width="17" height="17" border="0" align="absmiddle"></li>';
                $array[++$indice] = '<li><img src="images/pag_ult2.gif" width="17" height="17" border="0" align="absmiddle"></li>';
            }
        }
    }
    $array[++$indice] = "</ul></div>";

	$this->qtd_paginas = count($array); //Faz a contagem da quantidade de páginas que serão utilizadas
    // Caso a quantidade de páginas seja 1, o menu de navegação não é exibido
    if ($this->qtd_paginas != 3)
    {
		$this->exibir_menu = true;
		return $array;
	}
    else
    {
		$this->exibir_menu = false;
	}
}

  /*
     Este método é uma extensão do método Construir_Links() para
     que possa ser ajustado o limite 'n' de número de links na página.
     Isto é muito útil para grandes bancos de dados que desejam não
     ocupar todo o espaço da tela para mostrar toda a lista de links
     paginados.

         $array parâmetro:
          . retorna o array de Construir_Links()

         $atual parâmetro:
          . a variável da 'pagina' atual das páginas paginadas. ex: pagina=1

         $tam_desejado parâmetro:
          . o número desejado de links à serem exibidos
  */
  function Mostrar_Parte($array, $atual, $tam_desejado){
  	if ($this->exibir_menu == true){ // Se exibir estiver setado como TRUE, o menu é exibido, caso contrário não.
		$size = count($array);

		if (($size <= 2) || ($size < $tam_desejado)) {
		  $temp = $array;
		}
		else {
		  $temp = array();
		  if (($atual + $tamanho_desejado) > $size) {
			$temp = array_slice($array, $size - $tam_desejado);
		  } else {
			$temp = array_slice($array, $atual, $tam_desejado);
			if ($size >= $tamanho_desejado) {
			  array_push($temp, $array[$size - 1]);
			}
		  }
		  if ($atual > 0) {
			array_unshift($temp, $array[0]);
		  }
		}
		return $temp;
	}
  }
}
?>

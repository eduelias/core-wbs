<?php
include('./html.class.php');
$HTML_site = new HTMLSITE(1);
/*
1 = imprime diretamente no browser
2 = retorna o código HTML para aquele código HTML
3 = armazena na memória até o momento que você manda imprimir $this->show(); ou pega todo o código HTML $this->getsource();
*/

$HTML_site->set_css('style.css');
/*
Você quer incluir um CSS no cabeçalho da página
$this->set_css('caminho/ate/o/css.css');

Se você quiser incluir o javascript no cabeçalho da página
$this->set_javascript('caminho/ate/o/arquivo/javascript.js');
*/


$HTML_site->page_header('Teste');


$HTML_site->form_header('cadastro.php',$form_action);
$HTML_site->form_title('Cadastro de Clientes');

$HTML_site->form_title('Dados do Cliente');
$HTML_site->form_input('Nome','nome',$row['nome']);
$options['sexo'] = array(
0 => 'indefinido',
1 => 'Masculino',
2 => 'Feminino'
);
$HTML_site->form_select('Sexo','sexo',$options['sexo'],$row['sexo']);
$HTML_site->form_date('Data Nascimento',array('d'=>'data_dia','m'=>'data_mes','y'=>'data_ano'),$row['data'],'dmy',1901);

$options['estado_civil'] = array(
0 => 'indefinido',
1 => 'Solteiro(a)',
2 => 'Casado(a)',
3 => 'Divorciado(a)',
4 => 'Viuvo(a)',
5 => 'Falecido(a)'
);
$HTML_site->form_select('Estado Civil','estado_civil',$options['estado_civil'],$row['estado_civil']);
$HTML_site->form_input('Endereço','endereco',$row['endereco']);
$HTML_site->form_input('Bairro','bairro',$row['bairro']);
$HTML_site->form_input('Telefone','telefone',$row['telefone']);
$HTML_site->form_input('CEP','cep',$row['cep']);
$HTML_site->form_input('Cidade','cidade',$row['cidade']);

$HTML_site->form_title('Educação');
$options['escolaridade'] = array(
0 => 'indefinido',
1 => 'analfabeto',
2 => '1 grau incompleto',
3 => '1 grau completo',
4 => '2 grau incompleto',
5 => '2 grau completo',
6 => '3 grau incompleto',
7 => '3 grau completo',
8 => 'pós graduação'
);
$HTML_site->form_select('Escolaridade','escolaridade',$options['escolaridade'],$row['escolaridade']);

$HTML_site->form_input('Curso Técnico','curso_tecnico',$row['curso_tecnico']);
$HTML_site->form_input('Curso Universitário','curso_universitario',$row['curso_universitario']);

$HTML_site->form_title('Trabalho');
$HTML_site->form_input('Profissão','trabalho_cargo',$row['trabalho_cargo']);
$HTML_site->form_input('Empresa','trabalho_empresa',$row['trabalho_empresa']);

$options['familia_posicao'] = array(
0 => 'indefinido',
1 => 'Único',
2 => 'Primogênito(a)',
3 => 'Meio',
4 => 'Caçula'
);
$HTML_site->form_radio('Posição na família','familia_posicao',$options['familia_posicao'],$row['terca']);

$HTML_site->form_title('Observação');
$HTML_site->form_textarea('Observação','observacao',$row['observacao']);
$HTML_site->form_checkbox('Aceita os termos?','agree',$row['agree'],'Aceito receber e-mails bla bla bla...');
$HTML_site->form_yesno('Achou legal?','achoulegal',$row['achoulegal']);
$HTML_site->form_row('Obs','Bla bla bla bla');
$HTML_site->form_hidden('cadastro_id',$row['cadastro_id']);
$HTML_site->form_footer();




for($i=1; $i<=16; $i++)
{
	$tds[] = 'col.'.$i;
}
$numero_de_colunas = sizeof($tds);

$HTML_site->table_header('Pituco',$numero_de_colunas);
$HTML_site->table_row($tds);
$HTML_site->table_footer();
$HTML_site->page_footer();

?>

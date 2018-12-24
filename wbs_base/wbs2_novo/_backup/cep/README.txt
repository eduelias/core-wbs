CEPHP - Um WebService para buscas de CEP

�NDICE:
 * Descri��o
 * Instala��o
 * Desenvolvedor
 * Agradecimentos

DESCRI��O:
O CEPHP � um projeto livre de web-service utilizando o padr�o SOAP, desenvolvido com o intuito de facilitar a consulta de endere�os utilizando o C�digo de Endere�amento Postal (e futuramente o caminho inverso). O grande desafio foi encontrar uma base de CEPs confi�vel (n�o sabemos o quanto. Foi a que "pareceu" mais confi�vel) e atualizada (aqui confiamos na palavra de terceiros. Estava escrito "2003/2004"). O web-service � escrito em PHP (www.php.net) e � acompanhado por um cliente e pela base de dados de CEP que foi encontrada na internet. 

INSTALA��O:
Para instalar � simples, basta executar o arquivo cep.sql (da pasta sql) no mysql, usando o comando:
mysql -u USUARIO -p base < "/caminho/do/cep.sql"
Configurar no arquivo server.php as vari�veis de conex�o com o MySQL ou outro banco.
Configurar no arquivo client.php para o endere�o que ficou seu servidor.

DESENVOLVEDOR:
Foi desenvolvido integramente (at� hoje, tamb�m n�, primeira vers�o) por Leonardo Saraiva (vyper@maneh.org) com uma ajuda de Fredd J. Cardoso (fredd@maneh.org), maiores informa��es podem ser encontradas em http://cep.maneh.org/.

AGRADECIMENTOS:
A minha m�e que diz que eu fa�o bem o que fa�o;
A minha irm� por que diz que sou gostoso (t�, irm� n�o vale �?);
Ao Fredd pelo apoio e os toques no texto;
Ao F�bio Passos pela id�ia (sim, roubei a id�ia dele da PHPBrasil, mas eu precisava de uma id�ia, e resolvi abra�a-la, espero estar a altura da id�ia e poder ajudar pessoas);
E mais um monte de gente que n�o vou ficar aqui listando, que n�o � o intuito disso aqui. d:


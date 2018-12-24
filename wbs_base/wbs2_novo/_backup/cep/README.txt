CEPHP - Um WebService para buscas de CEP

ÍNDICE:
 * Descrição
 * Instalação
 * Desenvolvedor
 * Agradecimentos

DESCRIÇÃO:
O CEPHP é um projeto livre de web-service utilizando o padrão SOAP, desenvolvido com o intuito de facilitar a consulta de endereços utilizando o Código de Endereçamento Postal (e futuramente o caminho inverso). O grande desafio foi encontrar uma base de CEPs confiável (não sabemos o quanto. Foi a que "pareceu" mais confiável) e atualizada (aqui confiamos na palavra de terceiros. Estava escrito "2003/2004"). O web-service é escrito em PHP (www.php.net) e é acompanhado por um cliente e pela base de dados de CEP que foi encontrada na internet. 

INSTALAÇÃO:
Para instalar é simples, basta executar o arquivo cep.sql (da pasta sql) no mysql, usando o comando:
mysql -u USUARIO -p base < "/caminho/do/cep.sql"
Configurar no arquivo server.php as variáveis de conexão com o MySQL ou outro banco.
Configurar no arquivo client.php para o endereço que ficou seu servidor.

DESENVOLVEDOR:
Foi desenvolvido integramente (até hoje, também né, primeira versão) por Leonardo Saraiva (vyper@maneh.org) com uma ajuda de Fredd J. Cardoso (fredd@maneh.org), maiores informações podem ser encontradas em http://cep.maneh.org/.

AGRADECIMENTOS:
A minha mãe que diz que eu faço bem o que faço;
A minha irmã por que diz que sou gostoso (tá, irmã não vale é?);
Ao Fredd pelo apoio e os toques no texto;
Ao Fábio Passos pela idéia (sim, roubei a idéia dele da PHPBrasil, mas eu precisava de uma idéia, e resolvi abraça-la, espero estar a altura da idéia e poder ajudar pessoas);
E mais um monte de gente que não vou ficar aqui listando, que não é o intuito disso aqui. d:


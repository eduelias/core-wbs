--

-- Estrutura da tabela `tb_cidades`

-- 



CREATE TABLE `tb_cidades` (

  `id` int(4) unsigned zerofill NOT NULL auto_increment,

  `estado` int(2) unsigned zerofill NOT NULL default '00',

  `uf` varchar(4) NOT NULL default '',

  `nome` varchar(50) NOT NULL default '',

  UNIQUE KEY `id` (`id`),

  KEY `id_2` (`id`)

) ENGINE=MyISAM AUTO_INCREMENT=9715 DEFAULT CHARSET=latin1 AUTO_INCREMENT=9715 ;



-- 

-- Extraindo dados da tabela `tb_cidades`

-- 



INSERT INTO `tb_cidades` VALUES (0001, 01, 'AC', 'Acrelandia');

INSERT INTO `tb_cidades` VALUES (0002, 01, 'AC', 'Assis Brasil');

INSERT INTO `tb_cidades` VALUES (0003, 01, 'AC', 'Brasileia');

INSERT INTO `tb_cidades` VALUES (0004, 01, 'AC', 'Bujari');

INSERT INTO `tb_cidades` VALUES (0005, 01, 'AC', 'Capixaba');

INSERT INTO `tb_cidades` VALUES (0006, 01, 'AC', 'Cruzeiro do Sul');

INSERT INTO `tb_cidades` VALUES (0007, 01, 'AC', 'Epitaciolandia');

INSERT INTO `tb_cidades` VALUES (0008, 01, 'AC', 'Feijo');

INSERT INTO `tb_cidades` VALUES (0009, 01, 'AC', 'Jordao');

INSERT INTO `tb_cidades` VALUES (0010, 01, 'AC', 'Mancio Lima');

INSERT INTO `tb_cidades` VALUES (0011, 01, 'AC', 'Manoel Urbano');

INSERT INTO `tb_cidades` VALUES (0012, 01, 'AC', 'Marechal Thaumaturgo');

INSERT INTO `tb_cidades` VALUES (0013, 01, 'AC', 'Placido de Castro');

INSERT INTO `tb_cidades` VALUES (0014, 01, 'AC', 'Porto Acre');

INSERT INTO `tb_cidades` VALUES (0015, 01, 'AC', 'Porto Walter');

INSERT INTO `tb_cidades` VALUES (0016, 01, 'AC', 'Rio Branco');

INSERT INTO `tb_cidades` VALUES (0017, 01, 'AC', 'Rodrigues Alves');

INSERT INTO `tb_cidades` VALUES (0018, 01, 'AC', 'Santa Rosa');

INSERT INTO `tb_cidades` VALUES (0019, 01, 'AC', 'Sena Madureira');

INSERT INTO `tb_cidades` VALUES (0020, 01, 'AC', 'Senador Guiomard');

INSERT INTO `tb_cidades` VALUES (0021, 01, 'AC', 'Tarauaca');

INSERT INTO `tb_cidades` VALUES (0022, 01, 'AC', 'Xapuri');

INSERT INTO `tb_cidades` VALUES (0023, 02, 'AL', 'Agua Branca');

INSERT INTO `tb_cidades` VALUES (0024, 02, 'AL', 'Alazao');

INSERT INTO `tb_cidades` VALUES (0025, 02, 'AL', 'Alecrim');

INSERT INTO `tb_cidades` VALUES (0026, 02, 'AL', 'Anadia');

INSERT INTO `tb_cidades` VALUES (0027, 02, 'AL', 'Anel');

INSERT INTO `tb_cidades` VALUES (0028, 02, 'AL', 'Anum Novo');

INSERT INTO `tb_cidades` VALUES (0029, 02, 'AL', 'Anum Velho');

INSERT INTO `tb_cidades` VALUES (0030, 02, 'AL', 'Arapiraca');

INSERT INTO `tb_cidades` VALUES (0031, 02, 'AL', 'Atalaia');

INSERT INTO `tb_cidades` VALUES (0032, 02, 'AL', 'Baixa da Onca');

INSERT INTO `tb_cidades` VALUES (0033, 02, 'AL', 'Baixa do Capim');

INSERT INTO `tb_cidades` VALUES (0034, 02, 'AL', 'Balsamo');

INSERT INTO `tb_cidades` VALUES (0035, 02, 'AL', 'Bananeiras');

INSERT INTO `tb_cidades` VALUES (0036, 02, 'AL', 'Barra de Santo Antonio');

INSERT INTO `tb_cidades` VALUES (0037, 02, 'AL', 'Barra de Sao Miguel');

INSERT INTO `tb_cidades` VALUES (0038, 02, 'AL', 'Barra do Bonifacio');

INSERT INTO `tb_cidades` VALUES (0039, 02, 'AL', 'Barra Grande');

INSERT INTO `tb_cidades` VALUES (0040, 02, 'AL', 'Batalha');

INSERT INTO `tb_cidades` VALUES (0041, 02, 'AL', 'Batingas');

INSERT INTO `tb_cidades` VALUES (0042, 02, 'AL', 'Belem');

INSERT INTO `tb_cidades` VALUES (0043, 02, 'AL', 'Belo Monte');

INSERT INTO `tb_cidades` VALUES (0044, 02, 'AL', 'Boa Sorte');

INSERT INTO `tb_cidades` VALUES (0045, 02, 'AL', 'Boa Vista');

INSERT INTO `tb_cidades` VALUES (0046, 02, 'AL', 'Boca da Mata');

INSERT INTO `tb_cidades` VALUES (0047, 02, 'AL', 'Bom Jardim');

INSERT INTO `tb_cidades` VALUES (0048, 02, 'AL', 'Bonifacio');

INSERT INTO `tb_cidades` VALUES (0049, 02, 'AL', 'Branquinha');

INSERT INTO `tb_cidades` VALUES (0050, 02, 'AL', 'Cacimbinhas');

INSERT INTO `tb_cidades` VALUES (0051, 02, 'AL', 'Cajarana');

INSERT INTO `tb_cidades` VALUES (0052, 02, 'AL', 'Cajueiro');

INSERT INTO `tb_cidades` VALUES (0053, 02, 'AL', 'Caldeiroes de Cima');

INSERT INTO `tb_cidades` VALUES (0054, 02, 'AL', 'Camadanta');

INSERT INTO `tb_cidades` VALUES (0055, 02, 'AL', 'Campestre');

INSERT INTO `tb_cidades` VALUES (0056, 02, 'AL', 'Campo Alegre');

INSERT INTO `tb_cidades` VALUES (0057, 02, 'AL', 'Campo Grande');

INSERT INTO `tb_cidades` VALUES (0058, 02, 'AL', 'Canaa');

INSERT INTO `tb_cidades` VALUES (0059, 02, 'AL', 'Canafistula');

INSERT INTO `tb_cidades` VALUES (0060, 02, 'AL', 'Canapi');

INSERT INTO `tb_cidades` VALUES (0061, 02, 'AL', 'Canastra');

INSERT INTO `tb_cidades` VALUES (0062, 02, 'AL', 'Cangandu');

INSERT INTO `tb_cidades` VALUES (0063, 02, 'AL', 'Capela');

INSERT INTO `tb_cidades` VALUES (0064, 02, 'AL', 'Carneiros');

INSERT INTO `tb_cidades` VALUES (0065, 02, 'AL', 'Carrasco');

INSERT INTO `tb_cidades` VALUES (0066, 02, 'AL', 'Cha Preta');

INSERT INTO `tb_cidades` VALUES (0067, 02, 'AL', 'Coite do Noia');

INSERT INTO `tb_cidades` VALUES (0068, 02, 'AL', 'Colonia Leopoldina');

INSERT INTO `tb_cidades` VALUES (0069, 02, 'AL', 'Coqueiro Seco');

INSERT INTO `tb_cidades` VALUES (0070, 02, 'AL', 'Coruripe');

INSERT INTO `tb_cidades` VALUES (0071, 02, 'AL', 'Coruripe da Cal');

INSERT INTO `tb_cidades` VALUES (0072, 02, 'AL', 'Craibas');

INSERT INTO `tb_cidades` VALUES (0073, 02, 'AL', 'Delmiro Gouveia');

INSERT INTO `tb_cidades` VALUES (0074, 02, 'AL', 'Dois Riachos');

INSERT INTO `tb_cidades` VALUES (0075, 02, 'AL', 'Entremontes');

INSERT INTO `tb_cidades` VALUES (0076, 02, 'AL', 'Estrela de Alagoas');

INSERT INTO `tb_cidades` VALUES (0077, 02, 'AL', 'Feira Grande');

INSERT INTO `tb_cidades` VALUES (0078, 02, 'AL', 'Feliz Deserto');

INSERT INTO `tb_cidades` VALUES (0079, 02, 'AL', 'Fernao Velho');

INSERT INTO `tb_cidades` VALUES (0080, 02, 'AL', 'Flexeiras');

INSERT INTO `tb_cidades` VALUES (0081, 02, 'AL', 'Floriano Peixoto');

INSERT INTO `tb_cidades` VALUES (0082, 02, 'AL', 'Gaspar');

INSERT INTO `tb_cidades` VALUES (0083, 02, 'AL', 'Girau do Ponciano');

INSERT INTO `tb_cidades` VALUES (0084, 02, 'AL', 'Ibateguara');

INSERT INTO `tb_cidades` VALUES (0085, 02, 'AL', 'Igaci');

INSERT INTO `tb_cidades` VALUES (0086, 02, 'AL', 'Igreja Nova');

INSERT INTO `tb_cidades` VALUES (0087, 02, 'AL', 'Inhapi');

INSERT INTO `tb_cidades` VALUES (0088, 02, 'AL', 'Jacare dos Homens');

INSERT INTO `tb_cidades` VALUES (0089, 02, 'AL', 'Jacuipe');

INSERT INTO `tb_cidades` VALUES (0090, 02, 'AL', 'Japaratinga');

INSERT INTO `tb_cidades` VALUES (0091, 02, 'AL', 'Jaramataia');

INSERT INTO `tb_cidades` VALUES (0092, 02, 'AL', 'Jenipapo');

INSERT INTO `tb_cidades` VALUES (0093, 02, 'AL', 'Joaquim Gomes');

INSERT INTO `tb_cidades` VALUES (0094, 02, 'AL', 'Jundia');

INSERT INTO `tb_cidades` VALUES (0095, 02, 'AL', 'Junqueiro');

INSERT INTO `tb_cidades` VALUES (0096, 02, 'AL', 'Lagoa da Areia');

INSERT INTO `tb_cidades` VALUES (0097, 02, 'AL', 'Lagoa da Canoa');

INSERT INTO `tb_cidades` VALUES (0098, 02, 'AL', 'Lagoa da Pedra');

INSERT INTO `tb_cidades` VALUES (0099, 02, 'AL', 'Lagoa Dantas');

INSERT INTO `tb_cidades` VALUES (0100, 02, 'AL', 'Lagoa do Caldeirao');

INSERT INTO `tb_cidades` VALUES (0101, 02, 'AL', 'Lagoa do Canto');

INSERT INTO `tb_cidades` VALUES (0102, 02, 'AL', 'Lagoa do Exu');

INSERT INTO `tb_cidades` VALUES (0103, 02, 'AL', 'Lagoa do Rancho');

INSERT INTO `tb_cidades` VALUES (0104, 02, 'AL', 'Lajes do Caldeirao');

INSERT INTO `tb_cidades` VALUES (0105, 02, 'AL', 'Laranjal');

INSERT INTO `tb_cidades` VALUES (0106, 02, 'AL', 'Limoeiro de Anadia');

INSERT INTO `tb_cidades` VALUES (0107, 02, 'AL', 'Maceio');

INSERT INTO `tb_cidades` VALUES (0108, 02, 'AL', 'Major Isidoro');

INSERT INTO `tb_cidades` VALUES (0109, 02, 'AL', 'Mar Vermelho');

INSERT INTO `tb_cidades` VALUES (0110, 02, 'AL', 'Maragogi');

INSERT INTO `tb_cidades` VALUES (0111, 02, 'AL', 'Maravilha');

INSERT INTO `tb_cidades` VALUES (0112, 02, 'AL', 'Marechal Deodoro');

INSERT INTO `tb_cidades` VALUES (0113, 02, 'AL', 'Maribondo');

INSERT INTO `tb_cidades` VALUES (0114, 02, 'AL', 'Massaranduba');

INSERT INTO `tb_cidades` VALUES (0115, 02, 'AL', 'Mata Grande');

INSERT INTO `tb_cidades` VALUES (0116, 02, 'AL', 'Matriz de Camaragibe');

INSERT INTO `tb_cidades` VALUES (0117, 02, 'AL', 'Messias');

INSERT INTO `tb_cidades` VALUES (0118, 02, 'AL', 'Minador do Negrao');

INSERT INTO `tb_cidades` VALUES (0119, 02, 'AL', 'Monteiropolis');

INSERT INTO `tb_cidades` VALUES (0120, 02, 'AL', 'Moreira');

INSERT INTO `tb_cidades` VALUES (0121, 02, 'AL', 'Munguba');

INSERT INTO `tb_cidades` VALUES (0122, 02, 'AL', 'Murici');

INSERT INTO `tb_cidades` VALUES (0123, 02, 'AL', 'Novo Lino');

INSERT INTO `tb_cidades` VALUES (0124, 02, 'AL', 'Olho D Agua Grande');

INSERT INTO `tb_cidades` VALUES (0125, 02, 'AL', 'Olho D''agua Das Flores');

INSERT INTO `tb_cidades` VALUES (0126, 02, 'AL', 'Olho D''agua De Cima');

INSERT INTO `tb_cidades` VALUES (0127, 02, 'AL', 'Olho D''agua Do Casado');

INSERT INTO `tb_cidades` VALUES (0128, 02, 'AL', 'Olho D''agua Dos Dandanhas');

INSERT INTO `tb_cidades` VALUES (0129, 02, 'AL', 'Olivenca');

INSERT INTO `tb_cidades` VALUES (0130, 02, 'AL', 'Ouro Branco');

INSERT INTO `tb_cidades` VALUES (0131, 02, 'AL', 'Palestina');

INSERT INTO `tb_cidades` VALUES (0132, 02, 'AL', 'Palmeira de Fora');

INSERT INTO `tb_cidades` VALUES (0133, 02, 'AL', 'Palmeira dos Indios');

INSERT INTO `tb_cidades` VALUES (0134, 02, 'AL', 'Pao de Acucar');

INSERT INTO `tb_cidades` VALUES (0135, 02, 'AL', 'Pariconha');

INSERT INTO `tb_cidades` VALUES (0136, 02, 'AL', 'Paripueira');

INSERT INTO `tb_cidades` VALUES (0137, 02, 'AL', 'Passo de Camaragibe');

INSERT INTO `tb_cidades` VALUES (0138, 02, 'AL', 'Pau D''arco');

INSERT INTO `tb_cidades` VALUES (0139, 02, 'AL', 'Pau Ferro');

INSERT INTO `tb_cidades` VALUES (0140, 02, 'AL', 'Paulo Jacinto');

INSERT INTO `tb_cidades` VALUES (0141, 02, 'AL', 'Penedo');

INSERT INTO `tb_cidades` VALUES (0142, 02, 'AL', 'Piacabucu');

INSERT INTO `tb_cidades` VALUES (0143, 02, 'AL', 'Pilar');

INSERT INTO `tb_cidades` VALUES (0144, 02, 'AL', 'Pindoba');

INSERT INTO `tb_cidades` VALUES (0145, 02, 'AL', 'Piranhas');

INSERT INTO `tb_cidades` VALUES (0146, 02, 'AL', 'Pocao');

INSERT INTO `tb_cidades` VALUES (0147, 02, 'AL', 'Poco da Pedra');

INSERT INTO `tb_cidades` VALUES (0148, 02, 'AL', 'Poco das Trincheiras');

INSERT INTO `tb_cidades` VALUES (0149, 02, 'AL', 'Porto Calvo');

INSERT INTO `tb_cidades` VALUES (0150, 02, 'AL', 'Porto de Pedras');

INSERT INTO `tb_cidades` VALUES (0151, 02, 'AL', 'Porto Real do Colegio');

INSERT INTO `tb_cidades` VALUES (0152, 02, 'AL', 'Poxim');

INSERT INTO `tb_cidades` VALUES (0153, 02, 'AL', 'Quebrangulo');

INSERT INTO `tb_cidades` VALUES (0154, 02, 'AL', 'Riacho do Sertao');

INSERT INTO `tb_cidades` VALUES (0155, 02, 'AL', 'Riacho Fundo de Cima');

INSERT INTO `tb_cidades` VALUES (0156, 02, 'AL', 'Rio Largo');

INSERT INTO `tb_cidades` VALUES (0157, 02, 'AL', 'Rocha Cavalcante');

INSERT INTO `tb_cidades` VALUES (0158, 02, 'AL', 'Roteiro');

INSERT INTO `tb_cidades` VALUES (0159, 02, 'AL', 'Santa Efigenia');

INSERT INTO `tb_cidades` VALUES (0160, 02, 'AL', 'Santa Luzia do Norte');

INSERT INTO `tb_cidades` VALUES (0161, 02, 'AL', 'Santana do Ipanema');

INSERT INTO `tb_cidades` VALUES (0162, 02, 'AL', 'Santana do Mundau');

INSERT INTO `tb_cidades` VALUES (0163, 02, 'AL', 'Santo Antonio');

INSERT INTO `tb_cidades` VALUES (0164, 02, 'AL', 'Sao Bras');

INSERT INTO `tb_cidades` VALUES (0165, 02, 'AL', 'Sao Jose da Laje');

INSERT INTO `tb_cidades` VALUES (0166, 02, 'AL', 'Sao Jose da Tapera');

INSERT INTO `tb_cidades` VALUES (0167, 02, 'AL', 'Sao Luis do Quitunde');

INSERT INTO `tb_cidades` VALUES (0168, 02, 'AL', 'Sao Miguel dos Campos');

INSERT INTO `tb_cidades` VALUES (0169, 02, 'AL', 'Sao Miguel dos Milagres');

INSERT INTO `tb_cidades` VALUES (0170, 02, 'AL', 'Sao Sebastiao');

INSERT INTO `tb_cidades` VALUES (0171, 02, 'AL', 'Sapucaia');

INSERT INTO `tb_cidades` VALUES (0172, 02, 'AL', 'Satuba');

INSERT INTO `tb_cidades` VALUES (0173, 02, 'AL', 'Senador Rui Palmeira');

INSERT INTO `tb_cidades` VALUES (0174, 02, 'AL', 'Serra da Mandioca');

INSERT INTO `tb_cidades` VALUES (0175, 02, 'AL', 'Serra do Sao Jose');

INSERT INTO `tb_cidades` VALUES (0176, 02, 'AL', 'Taboleiro do Pinto');

INSERT INTO `tb_cidades` VALUES (0177, 02, 'AL', 'Taboquinha');

INSERT INTO `tb_cidades` VALUES (0178, 02, 'AL', 'Tanque D''arca');

INSERT INTO `tb_cidades` VALUES (0179, 02, 'AL', 'Taquarana');

INSERT INTO `tb_cidades` VALUES (0180, 02, 'AL', 'Tatuamunha');

INSERT INTO `tb_cidades` VALUES (0181, 02, 'AL', 'Teotonio Vilela');

INSERT INTO `tb_cidades` VALUES (0182, 02, 'AL', 'Traipu');

INSERT INTO `tb_cidades` VALUES (0183, 02, 'AL', 'Uniao dos Palmares');

INSERT INTO `tb_cidades` VALUES (0184, 02, 'AL', 'Usina Camacari');

INSERT INTO `tb_cidades` VALUES (0185, 02, 'AL', 'Vicosa');

INSERT INTO `tb_cidades` VALUES (0186, 02, 'AL', 'Vila Aparecida');

INSERT INTO `tb_cidades` VALUES (0187, 02, 'AL', 'Vila Sao Francisco');

INSERT INTO `tb_cidades` VALUES (0188, 03, 'AM', 'Alvaraes');

INSERT INTO `tb_cidades` VALUES (0189, 03, 'AM', 'Amatari');

INSERT INTO `tb_cidades` VALUES (0190, 03, 'AM', 'Amatura');

INSERT INTO `tb_cidades` VALUES (0191, 03, 'AM', 'Anama');

INSERT INTO `tb_cidades` VALUES (0192, 03, 'AM', 'Anori');

INSERT INTO `tb_cidades` VALUES (0193, 03, 'AM', 'Apui');

INSERT INTO `tb_cidades` VALUES (0194, 03, 'AM', 'Ariau');

INSERT INTO `tb_cidades` VALUES (0195, 03, 'AM', 'Atalaia do Norte');

INSERT INTO `tb_cidades` VALUES (0196, 03, 'AM', 'Augusto Montenegro');

INSERT INTO `tb_cidades` VALUES (0197, 03, 'AM', 'Autazes');

INSERT INTO `tb_cidades` VALUES (0198, 03, 'AM', 'Axinim');

INSERT INTO `tb_cidades` VALUES (0199, 03, 'AM', 'Badajos');

INSERT INTO `tb_cidades` VALUES (0200, 03, 'AM', 'Balbina');

INSERT INTO `tb_cidades` VALUES (0201, 03, 'AM', 'Barcelos');

INSERT INTO `tb_cidades` VALUES (0202, 03, 'AM', 'Barreirinha');

INSERT INTO `tb_cidades` VALUES (0203, 03, 'AM', 'Benjamin Constant');

INSERT INTO `tb_cidades` VALUES (0204, 03, 'AM', 'Beruri');

INSERT INTO `tb_cidades` VALUES (0205, 03, 'AM', 'Boa Vista do Ramos');

INSERT INTO `tb_cidades` VALUES (0206, 03, 'AM', 'Boca do Acre');

INSERT INTO `tb_cidades` VALUES (0207, 03, 'AM', 'Borba');

INSERT INTO `tb_cidades` VALUES (0208, 03, 'AM', 'Caapiranga');

INSERT INTO `tb_cidades` VALUES (0209, 03, 'AM', 'Cameta');

INSERT INTO `tb_cidades` VALUES (0210, 03, 'AM', 'Canuma');

INSERT INTO `tb_cidades` VALUES (0211, 03, 'AM', 'Canutama');

INSERT INTO `tb_cidades` VALUES (0212, 03, 'AM', 'Carauari');

INSERT INTO `tb_cidades` VALUES (0213, 03, 'AM', 'Careiro');

INSERT INTO `tb_cidades` VALUES (0214, 03, 'AM', 'Careiro da Varzea');

INSERT INTO `tb_cidades` VALUES (0215, 03, 'AM', 'Carvoeiro');

INSERT INTO `tb_cidades` VALUES (0216, 03, 'AM', 'Coari');

INSERT INTO `tb_cidades` VALUES (0217, 03, 'AM', 'Codajas');

INSERT INTO `tb_cidades` VALUES (0218, 03, 'AM', 'Cucui');

INSERT INTO `tb_cidades` VALUES (0219, 03, 'AM', 'Eirunepe');

INSERT INTO `tb_cidades` VALUES (0220, 03, 'AM', 'Envira');

INSERT INTO `tb_cidades` VALUES (0221, 03, 'AM', 'Floriano Peixoto');

INSERT INTO `tb_cidades` VALUES (0222, 03, 'AM', 'Fonte Boa');

INSERT INTO `tb_cidades` VALUES (0223, 03, 'AM', 'Freguesia do Andira');

INSERT INTO `tb_cidades` VALUES (0224, 03, 'AM', 'Guajara');

INSERT INTO `tb_cidades` VALUES (0225, 03, 'AM', 'Humaita');

INSERT INTO `tb_cidades` VALUES (0226, 03, 'AM', 'Iauarete');

INSERT INTO `tb_cidades` VALUES (0227, 03, 'AM', 'Icana');

INSERT INTO `tb_cidades` VALUES (0228, 03, 'AM', 'Ipixuna');

INSERT INTO `tb_cidades` VALUES (0229, 03, 'AM', 'Iranduba');

INSERT INTO `tb_cidades` VALUES (0230, 03, 'AM', 'Itacoatiara');

INSERT INTO `tb_cidades` VALUES (0231, 03, 'AM', 'Itamarati');

INSERT INTO `tb_cidades` VALUES (0232, 03, 'AM', 'Itapiranga');

INSERT INTO `tb_cidades` VALUES (0233, 03, 'AM', 'Japura');

INSERT INTO `tb_cidades` VALUES (0234, 03, 'AM', 'Jurua');

INSERT INTO `tb_cidades` VALUES (0235, 03, 'AM', 'Jutai');

INSERT INTO `tb_cidades` VALUES (0236, 03, 'AM', 'Labrea');

INSERT INTO `tb_cidades` VALUES (0237, 03, 'AM', 'Lago Preto');

INSERT INTO `tb_cidades` VALUES (0238, 03, 'AM', 'Manacapuru');

INSERT INTO `tb_cidades` VALUES (0239, 03, 'AM', 'Manaquiri');

INSERT INTO `tb_cidades` VALUES (0240, 03, 'AM', 'Manaus');

INSERT INTO `tb_cidades` VALUES (0241, 03, 'AM', 'Manicore');

INSERT INTO `tb_cidades` VALUES (0242, 03, 'AM', 'Maraa');

INSERT INTO `tb_cidades` VALUES (0243, 03, 'AM', 'Massauari');

INSERT INTO `tb_cidades` VALUES (0244, 03, 'AM', 'Maues');

INSERT INTO `tb_cidades` VALUES (0245, 03, 'AM', 'Mocambo');

INSERT INTO `tb_cidades` VALUES (0246, 03, 'AM', 'Moura');

INSERT INTO `tb_cidades` VALUES (0247, 03, 'AM', 'Murutinga');

INSERT INTO `tb_cidades` VALUES (0248, 03, 'AM', 'Nhamunda');

INSERT INTO `tb_cidades` VALUES (0249, 03, 'AM', 'Nova Olinda do Norte');

INSERT INTO `tb_cidades` VALUES (0250, 03, 'AM', 'Novo Airao');

INSERT INTO `tb_cidades` VALUES (0251, 03, 'AM', 'Novo Aripuana');

INSERT INTO `tb_cidades` VALUES (0252, 03, 'AM', 'Osorio da Fonseca');

INSERT INTO `tb_cidades` VALUES (0253, 03, 'AM', 'Parintins');

INSERT INTO `tb_cidades` VALUES (0254, 03, 'AM', 'Pauini');

INSERT INTO `tb_cidades` VALUES (0255, 03, 'AM', 'Pedras');

INSERT INTO `tb_cidades` VALUES (0256, 03, 'AM', 'Presidente Figueiredo');

INSERT INTO `tb_cidades` VALUES (0257, 03, 'AM', 'Repartimento');

INSERT INTO `tb_cidades` VALUES (0258, 03, 'AM', 'Rio Preto da Eva');

INSERT INTO `tb_cidades` VALUES (0259, 03, 'AM', 'Santa Isabel do Rio Negro');

INSERT INTO `tb_cidades` VALUES (0260, 03, 'AM', 'Santa Rita');

INSERT INTO `tb_cidades` VALUES (0261, 03, 'AM', 'Santo Antonio do Ica');

INSERT INTO `tb_cidades` VALUES (0262, 03, 'AM', 'Sao Felipe');

INSERT INTO `tb_cidades` VALUES (0263, 03, 'AM', 'Sao Gabriel da Cachoeira');

INSERT INTO `tb_cidades` VALUES (0264, 03, 'AM', 'Sao Paulo de Olivenca');

INSERT INTO `tb_cidades` VALUES (0265, 03, 'AM', 'Sao Sebastiao do Uatuma');

INSERT INTO `tb_cidades` VALUES (0266, 03, 'AM', 'Silves');

INSERT INTO `tb_cidades` VALUES (0267, 03, 'AM', 'Tabatinga');

INSERT INTO `tb_cidades` VALUES (0268, 03, 'AM', 'Tapaua');

INSERT INTO `tb_cidades` VALUES (0269, 03, 'AM', 'Tefe');

INSERT INTO `tb_cidades` VALUES (0270, 03, 'AM', 'Tonantins');

INSERT INTO `tb_cidades` VALUES (0271, 03, 'AM', 'Uarini');

INSERT INTO `tb_cidades` VALUES (0272, 03, 'AM', 'Urucara');

INSERT INTO `tb_cidades` VALUES (0273, 03, 'AM', 'Urucurituba');

INSERT INTO `tb_cidades` VALUES (0274, 03, 'AM', 'Vila Pitinga');

INSERT INTO `tb_cidades` VALUES (0275, 04, 'AP', 'Abacate da Pedreira');

INSERT INTO `tb_cidades` VALUES (0276, 04, 'AP', 'Agua Branca do Amapari');

INSERT INTO `tb_cidades` VALUES (0277, 04, 'AP', 'Amapa');

INSERT INTO `tb_cidades` VALUES (0278, 04, 'AP', 'Amapari');

INSERT INTO `tb_cidades` VALUES (0279, 04, 'AP', 'Ambe');

INSERT INTO `tb_cidades` VALUES (0280, 04, 'AP', 'Aporema');

INSERT INTO `tb_cidades` VALUES (0281, 04, 'AP', 'Ariri');

INSERT INTO `tb_cidades` VALUES (0282, 04, 'AP', 'Bailique');

INSERT INTO `tb_cidades` VALUES (0283, 04, 'AP', 'Boca do Jari');

INSERT INTO `tb_cidades` VALUES (0284, 04, 'AP', 'Calcoene');

INSERT INTO `tb_cidades` VALUES (0285, 04, 'AP', 'Cantanzal');

INSERT INTO `tb_cidades` VALUES (0286, 04, 'AP', 'Carmo');

INSERT INTO `tb_cidades` VALUES (0287, 04, 'AP', 'Clevelandia do Norte');

INSERT INTO `tb_cidades` VALUES (0288, 04, 'AP', 'Corre Agua');

INSERT INTO `tb_cidades` VALUES (0289, 04, 'AP', 'Cunani');

INSERT INTO `tb_cidades` VALUES (0290, 04, 'AP', 'Curiau');

INSERT INTO `tb_cidades` VALUES (0291, 04, 'AP', 'Cutias');

INSERT INTO `tb_cidades` VALUES (0292, 04, 'AP', 'Fazendinha');

INSERT INTO `tb_cidades` VALUES (0293, 04, 'AP', 'Ferreira Gomes');

INSERT INTO `tb_cidades` VALUES (0294, 04, 'AP', 'Fortaleza');

INSERT INTO `tb_cidades` VALUES (0295, 04, 'AP', 'Gaivota');

INSERT INTO `tb_cidades` VALUES (0296, 04, 'AP', 'Gurupora');

INSERT INTO `tb_cidades` VALUES (0297, 04, 'AP', 'Igarape do Lago');

INSERT INTO `tb_cidades` VALUES (0298, 04, 'AP', 'Ilha de Santana');

INSERT INTO `tb_cidades` VALUES (0299, 04, 'AP', 'Inaja');

INSERT INTO `tb_cidades` VALUES (0300, 04, 'AP', 'Itaubal');

INSERT INTO `tb_cidades` VALUES (0301, 04, 'AP', 'Laranjal do Jari');

INSERT INTO `tb_cidades` VALUES (0302, 04, 'AP', 'Livramento do Pacui');

INSERT INTO `tb_cidades` VALUES (0303, 04, 'AP', 'Lourenco');

INSERT INTO `tb_cidades` VALUES (0304, 04, 'AP', 'Macapa');

INSERT INTO `tb_cidades` VALUES (0305, 04, 'AP', 'Mazagao');

INSERT INTO `tb_cidades` VALUES (0306, 04, 'AP', 'Mazagao Velho');

INSERT INTO `tb_cidades` VALUES (0307, 04, 'AP', 'Oiapoque');

INSERT INTO `tb_cidades` VALUES (0308, 04, 'AP', 'Paredao');

INSERT INTO `tb_cidades` VALUES (0309, 04, 'AP', 'Porto Grande');

INSERT INTO `tb_cidades` VALUES (0310, 04, 'AP', 'Pracuuba');

INSERT INTO `tb_cidades` VALUES (0311, 04, 'AP', 'Santa Luzia do Pacui');

INSERT INTO `tb_cidades` VALUES (0312, 04, 'AP', 'Santa Maria');

INSERT INTO `tb_cidades` VALUES (0313, 04, 'AP', 'Santana');

INSERT INTO `tb_cidades` VALUES (0314, 04, 'AP', 'Sao Joaquim do Pacui');

INSERT INTO `tb_cidades` VALUES (0315, 04, 'AP', 'Sao Sebastiao do Livramento');

INSERT INTO `tb_cidades` VALUES (0316, 04, 'AP', 'Sao Tome');

INSERT INTO `tb_cidades` VALUES (0317, 04, 'AP', 'Serra do Navio');

INSERT INTO `tb_cidades` VALUES (0318, 04, 'AP', 'Sucuriju');

INSERT INTO `tb_cidades` VALUES (0319, 04, 'AP', 'Tartarugalzinho');

INSERT INTO `tb_cidades` VALUES (0320, 04, 'AP', 'Vila Velha');

INSERT INTO `tb_cidades` VALUES (0321, 04, 'AP', 'Vitoria do Jari');

INSERT INTO `tb_cidades` VALUES (0322, 05, 'BA', 'Abadia');

INSERT INTO `tb_cidades` VALUES (0323, 05, 'BA', 'Abaira');

INSERT INTO `tb_cidades` VALUES (0324, 05, 'BA', 'Abare');

INSERT INTO `tb_cidades` VALUES (0325, 05, 'BA', 'Abelhas');

INSERT INTO `tb_cidades` VALUES (0326, 05, 'BA', 'Abobora');

INSERT INTO `tb_cidades` VALUES (0327, 05, 'BA', 'Abrantes');

INSERT INTO `tb_cidades` VALUES (0328, 05, 'BA', 'Acajutiba');

INSERT INTO `tb_cidades` VALUES (0329, 05, 'BA', 'Acu da Torre');

INSERT INTO `tb_cidades` VALUES (0330, 05, 'BA', 'Acudina');

INSERT INTO `tb_cidades` VALUES (0331, 05, 'BA', 'Acupe');

INSERT INTO `tb_cidades` VALUES (0332, 05, 'BA', 'Adustina');

INSERT INTO `tb_cidades` VALUES (0333, 05, 'BA', 'Afligidos');

INSERT INTO `tb_cidades` VALUES (0334, 05, 'BA', 'Afranio Peixoto');

INSERT INTO `tb_cidades` VALUES (0335, 05, 'BA', 'Agua Doce');

INSERT INTO `tb_cidades` VALUES (0336, 05, 'BA', 'Agua Fria');

INSERT INTO `tb_cidades` VALUES (0337, 05, 'BA', 'Aguas do Paulista');

INSERT INTO `tb_cidades` VALUES (0338, 05, 'BA', 'Aiquara');

INSERT INTO `tb_cidades` VALUES (0339, 05, 'BA', 'Alagoinhas');

INSERT INTO `tb_cidades` VALUES (0340, 05, 'BA', 'Alcobaca');

INSERT INTO `tb_cidades` VALUES (0341, 05, 'BA', 'Alegre');

INSERT INTO `tb_cidades` VALUES (0342, 05, 'BA', 'Algodao');

INSERT INTO `tb_cidades` VALUES (0343, 05, 'BA', 'Algodoes');

INSERT INTO `tb_cidades` VALUES (0344, 05, 'BA', 'Almadina');

INSERT INTO `tb_cidades` VALUES (0345, 05, 'BA', 'Alto Bonito');

INSERT INTO `tb_cidades` VALUES (0346, 05, 'BA', 'Amado Bahia');

INSERT INTO `tb_cidades` VALUES (0347, 05, 'BA', 'Amaniu');

INSERT INTO `tb_cidades` VALUES (0348, 05, 'BA', 'Amargosa');

INSERT INTO `tb_cidades` VALUES (0349, 05, 'BA', 'Amelia Rodrigues');

INSERT INTO `tb_cidades` VALUES (0350, 05, 'BA', 'America Dourada');

INSERT INTO `tb_cidades` VALUES (0351, 05, 'BA', 'Americo Alves');

INSERT INTO `tb_cidades` VALUES (0352, 05, 'BA', 'Anage');

INSERT INTO `tb_cidades` VALUES (0353, 05, 'BA', 'Andarai');

INSERT INTO `tb_cidades` VALUES (0354, 05, 'BA', 'Andorinha');

INSERT INTO `tb_cidades` VALUES (0355, 05, 'BA', 'Angical');

INSERT INTO `tb_cidades` VALUES (0356, 05, 'BA', 'Angico');

INSERT INTO `tb_cidades` VALUES (0357, 05, 'BA', 'Anguera');

INSERT INTO `tb_cidades` VALUES (0358, 05, 'BA', 'Antas');

INSERT INTO `tb_cidades` VALUES (0359, 05, 'BA', 'Antonio Cardoso');

INSERT INTO `tb_cidades` VALUES (0360, 05, 'BA', 'Antonio Goncalves');

INSERT INTO `tb_cidades` VALUES (0361, 05, 'BA', 'Apora');

INSERT INTO `tb_cidades` VALUES (0362, 05, 'BA', 'Apuarema');

INSERT INTO `tb_cidades` VALUES (0363, 05, 'BA', 'Aracas');

INSERT INTO `tb_cidades` VALUES (0364, 05, 'BA', 'Aracatu');

INSERT INTO `tb_cidades` VALUES (0365, 05, 'BA', 'Araci');

INSERT INTO `tb_cidades` VALUES (0366, 05, 'BA', 'Aramari');

INSERT INTO `tb_cidades` VALUES (0367, 05, 'BA', 'Arapiranga');

INSERT INTO `tb_cidades` VALUES (0368, 05, 'BA', 'Arataca');

INSERT INTO `tb_cidades` VALUES (0369, 05, 'BA', 'Aratuipe');

INSERT INTO `tb_cidades` VALUES (0370, 05, 'BA', 'Areias');

INSERT INTO `tb_cidades` VALUES (0371, 05, 'BA', 'Arembepe');

INSERT INTO `tb_cidades` VALUES (0372, 05, 'BA', 'Argoim');

INSERT INTO `tb_cidades` VALUES (0373, 05, 'BA', 'Argolo');

INSERT INTO `tb_cidades` VALUES (0374, 05, 'BA', 'Aribice');

INSERT INTO `tb_cidades` VALUES (0375, 05, 'BA', 'Aritagua');

INSERT INTO `tb_cidades` VALUES (0376, 05, 'BA', 'Aurelino Leal');

INSERT INTO `tb_cidades` VALUES (0377, 05, 'BA', 'Baianopolis');

INSERT INTO `tb_cidades` VALUES (0378, 05, 'BA', 'Baixa do Palmeira');

INSERT INTO `tb_cidades` VALUES (0379, 05, 'BA', 'Baixa Grande');

INSERT INTO `tb_cidades` VALUES (0380, 05, 'BA', 'Baixao');

INSERT INTO `tb_cidades` VALUES (0381, 05, 'BA', 'Baixinha');

INSERT INTO `tb_cidades` VALUES (0382, 05, 'BA', 'Baluarte');

INSERT INTO `tb_cidades` VALUES (0383, 05, 'BA', 'Banco Central');

INSERT INTO `tb_cidades` VALUES (0384, 05, 'BA', 'Banco da Vitoria');

INSERT INTO `tb_cidades` VALUES (0385, 05, 'BA', 'Bandeira do Almada');

INSERT INTO `tb_cidades` VALUES (0386, 05, 'BA', 'Bandeira do Colonia');

INSERT INTO `tb_cidades` VALUES (0387, 05, 'BA', 'Bandiacu');

INSERT INTO `tb_cidades` VALUES (0388, 05, 'BA', 'Banzae');

INSERT INTO `tb_cidades` VALUES (0389, 05, 'BA', 'Baraunas');

INSERT INTO `tb_cidades` VALUES (0390, 05, 'BA', 'Barcelos do Sul');

INSERT INTO `tb_cidades` VALUES (0391, 05, 'BA', 'Barra');

INSERT INTO `tb_cidades` VALUES (0392, 05, 'BA', 'Barra da Estiva');

INSERT INTO `tb_cidades` VALUES (0393, 05, 'BA', 'Barra do Choca');

INSERT INTO `tb_cidades` VALUES (0394, 05, 'BA', 'Barra do Jacuipe');

INSERT INTO `tb_cidades` VALUES (0395, 05, 'BA', 'Barra do Mendes');

INSERT INTO `tb_cidades` VALUES (0396, 05, 'BA', 'Barra do Pojuca');

INSERT INTO `tb_cidades` VALUES (0397, 05, 'BA', 'Barra do Rocha');

INSERT INTO `tb_cidades` VALUES (0398, 05, 'BA', 'Barra do Tarrachil');

INSERT INTO `tb_cidades` VALUES (0399, 05, 'BA', 'Barracas');

INSERT INTO `tb_cidades` VALUES (0400, 05, 'BA', 'Barreiras');

INSERT INTO `tb_cidades` VALUES (0401, 05, 'BA', 'Barro Alto');

INSERT INTO `tb_cidades` VALUES (0402, 05, 'BA', 'Barro Preto');

INSERT INTO `tb_cidades` VALUES (0403, 05, 'BA', 'Barro Vermelho');

INSERT INTO `tb_cidades` VALUES (0404, 05, 'BA', 'Barrocas');

INSERT INTO `tb_cidades` VALUES (0405, 05, 'BA', 'Bastiao');

INSERT INTO `tb_cidades` VALUES (0406, 05, 'BA', 'Bate Pe');

INSERT INTO `tb_cidades` VALUES (0407, 05, 'BA', 'Batinga');

INSERT INTO `tb_cidades` VALUES (0408, 05, 'BA', 'Bela Flor');

INSERT INTO `tb_cidades` VALUES (0409, 05, 'BA', 'Belem da Cachoeira');

INSERT INTO `tb_cidades` VALUES (0410, 05, 'BA', 'Belmonte');

INSERT INTO `tb_cidades` VALUES (0411, 05, 'BA', 'Belo Campo');

INSERT INTO `tb_cidades` VALUES (0412, 05, 'BA', 'Bem-bom');

INSERT INTO `tb_cidades` VALUES (0413, 05, 'BA', 'Bendego');

INSERT INTO `tb_cidades` VALUES (0414, 05, 'BA', 'Bento Simoes');

INSERT INTO `tb_cidades` VALUES (0415, 05, 'BA', 'Biritinga');

INSERT INTO `tb_cidades` VALUES (0416, 05, 'BA', 'Boa Espera');

INSERT INTO `tb_cidades` VALUES (0417, 05, 'BA', 'Boa Nova');

INSERT INTO `tb_cidades` VALUES (0418, 05, 'BA', 'Boa Uniao');

INSERT INTO `tb_cidades` VALUES (0419, 05, 'BA', 'Boa Vista do Lagamar');

INSERT INTO `tb_cidades` VALUES (0420, 05, 'BA', 'Boa Vista do Tupim');

INSERT INTO `tb_cidades` VALUES (0421, 05, 'BA', 'Boacu');

INSERT INTO `tb_cidades` VALUES (0422, 05, 'BA', 'Boca do Corrego');

INSERT INTO `tb_cidades` VALUES (0423, 05, 'BA', 'Bom Jesus da Lapa');

INSERT INTO `tb_cidades` VALUES (0424, 05, 'BA', 'Bom Jesus da Serra');

INSERT INTO `tb_cidades` VALUES (0425, 05, 'BA', 'Bom Sossego');

INSERT INTO `tb_cidades` VALUES (0426, 05, 'BA', 'Bonfim da Feira');

INSERT INTO `tb_cidades` VALUES (0427, 05, 'BA', 'Boninal');

INSERT INTO `tb_cidades` VALUES (0428, 05, 'BA', 'Bonito');

INSERT INTO `tb_cidades` VALUES (0429, 05, 'BA', 'Boquira');

INSERT INTO `tb_cidades` VALUES (0430, 05, 'BA', 'Botupora');

INSERT INTO `tb_cidades` VALUES (0431, 05, 'BA', 'Botuquara');

INSERT INTO `tb_cidades` VALUES (0432, 05, 'BA', 'Brejinho das Ametistas');

INSERT INTO `tb_cidades` VALUES (0433, 05, 'BA', 'Brejo da Serra');

INSERT INTO `tb_cidades` VALUES (0434, 05, 'BA', 'Brejo Luiza de Brito');

INSERT INTO `tb_cidades` VALUES (0435, 05, 'BA', 'Brejo Novo');

INSERT INTO `tb_cidades` VALUES (0436, 05, 'BA', 'Brejoes');

INSERT INTO `tb_cidades` VALUES (0437, 05, 'BA', 'Brejolandia');

INSERT INTO `tb_cidades` VALUES (0438, 05, 'BA', 'Brotas de Macaubas');

INSERT INTO `tb_cidades` VALUES (0439, 05, 'BA', 'Brumado');

INSERT INTO `tb_cidades` VALUES (0440, 05, 'BA', 'Bucuituba');

INSERT INTO `tb_cidades` VALUES (0441, 05, 'BA', 'Buerarema');

INSERT INTO `tb_cidades` VALUES (0442, 05, 'BA', 'Buracica');

INSERT INTO `tb_cidades` VALUES (0443, 05, 'BA', 'Buranhem');

INSERT INTO `tb_cidades` VALUES (0444, 05, 'BA', 'Buril');

INSERT INTO `tb_cidades` VALUES (0445, 05, 'BA', 'Buris de Abrantes');

INSERT INTO `tb_cidades` VALUES (0446, 05, 'BA', 'Buritirama');

INSERT INTO `tb_cidades` VALUES (0447, 05, 'BA', 'Caatiba');

INSERT INTO `tb_cidades` VALUES (0448, 05, 'BA', 'Cabaceiras do Paraguacu');

INSERT INTO `tb_cidades` VALUES (0449, 05, 'BA', 'Cabralia');

INSERT INTO `tb_cidades` VALUES (0450, 05, 'BA', 'Cacha Pregos');

INSERT INTO `tb_cidades` VALUES (0451, 05, 'BA', 'Cachoeira');

INSERT INTO `tb_cidades` VALUES (0452, 05, 'BA', 'Cachoeira do Mato');

INSERT INTO `tb_cidades` VALUES (0453, 05, 'BA', 'Cacule');

INSERT INTO `tb_cidades` VALUES (0454, 05, 'BA', 'Caem');

INSERT INTO `tb_cidades` VALUES (0455, 05, 'BA', 'Caetanos');

INSERT INTO `tb_cidades` VALUES (0456, 05, 'BA', 'Caete-acu');

INSERT INTO `tb_cidades` VALUES (0457, 05, 'BA', 'Caetite');

INSERT INTO `tb_cidades` VALUES (0458, 05, 'BA', 'Cafarnaum');

INSERT INTO `tb_cidades` VALUES (0459, 05, 'BA', 'Caicara');

INSERT INTO `tb_cidades` VALUES (0460, 05, 'BA', 'Caimbe');

INSERT INTO `tb_cidades` VALUES (0461, 05, 'BA', 'Cairu');

INSERT INTO `tb_cidades` VALUES (0462, 05, 'BA', 'Caiubi');

INSERT INTO `tb_cidades` VALUES (0463, 05, 'BA', 'Cajui');

INSERT INTO `tb_cidades` VALUES (0464, 05, 'BA', 'Caldas do Jorro');

INSERT INTO `tb_cidades` VALUES (0465, 05, 'BA', 'Caldeirao');

INSERT INTO `tb_cidades` VALUES (0466, 05, 'BA', 'Caldeirao Grande');

INSERT INTO `tb_cidades` VALUES (0467, 05, 'BA', 'Caldeiras');

INSERT INTO `tb_cidades` VALUES (0468, 05, 'BA', 'Camacan');

INSERT INTO `tb_cidades` VALUES (0469, 05, 'BA', 'Camacari');

INSERT INTO `tb_cidades` VALUES (0470, 05, 'BA', 'Camamu');

INSERT INTO `tb_cidades` VALUES (0471, 05, 'BA', 'Camassandi');

INSERT INTO `tb_cidades` VALUES (0472, 05, 'BA', 'Camirim');

INSERT INTO `tb_cidades` VALUES (0473, 05, 'BA', 'Campinhos');

INSERT INTO `tb_cidades` VALUES (0474, 05, 'BA', 'Campo Alegre de Lourdes');

INSERT INTO `tb_cidades` VALUES (0475, 05, 'BA', 'Campo Formoso');

INSERT INTO `tb_cidades` VALUES (0476, 05, 'BA', 'Camurugi');

INSERT INTO `tb_cidades` VALUES (0477, 05, 'BA', 'Canabravinha');

INSERT INTO `tb_cidades` VALUES (0478, 05, 'BA', 'Canapolis');

INSERT INTO `tb_cidades` VALUES (0479, 05, 'BA', 'Canarana');

INSERT INTO `tb_cidades` VALUES (0480, 05, 'BA', 'Canatiba');

INSERT INTO `tb_cidades` VALUES (0481, 05, 'BA', 'Canavieiras');

INSERT INTO `tb_cidades` VALUES (0482, 05, 'BA', 'Canche');

INSERT INTO `tb_cidades` VALUES (0483, 05, 'BA', 'Candeal');

INSERT INTO `tb_cidades` VALUES (0484, 05, 'BA', 'Candeias');

INSERT INTO `tb_cidades` VALUES (0485, 05, 'BA', 'Candiba');

INSERT INTO `tb_cidades` VALUES (0486, 05, 'BA', 'Candido Sales');

INSERT INTO `tb_cidades` VALUES (0487, 05, 'BA', 'Canoao');

INSERT INTO `tb_cidades` VALUES (0488, 05, 'BA', 'Cansancao');

INSERT INTO `tb_cidades` VALUES (0489, 05, 'BA', 'Canto do Sol');

INSERT INTO `tb_cidades` VALUES (0490, 05, 'BA', 'Canudos');

INSERT INTO `tb_cidades` VALUES (0491, 05, 'BA', 'Capao');

INSERT INTO `tb_cidades` VALUES (0492, 05, 'BA', 'Capela do Alto Alegre');

INSERT INTO `tb_cidades` VALUES (0493, 05, 'BA', 'Capim Grosso');

INSERT INTO `tb_cidades` VALUES (0494, 05, 'BA', 'Caraguatai');

INSERT INTO `tb_cidades` VALUES (0495, 05, 'BA', 'Caraibas');

INSERT INTO `tb_cidades` VALUES (0496, 05, 'BA', 'Caraibuna');

INSERT INTO `tb_cidades` VALUES (0497, 05, 'BA', 'Caraipe');

INSERT INTO `tb_cidades` VALUES (0498, 05, 'BA', 'Caraiva');

INSERT INTO `tb_cidades` VALUES (0499, 05, 'BA', 'Caravelas');

INSERT INTO `tb_cidades` VALUES (0500, 05, 'BA', 'Cardeal da Silva');

INSERT INTO `tb_cidades` VALUES (0501, 05, 'BA', 'Carinhanha');

INSERT INTO `tb_cidades` VALUES (0502, 05, 'BA', 'Caripare');

INSERT INTO `tb_cidades` VALUES (0503, 05, 'BA', 'Carnaiba do Sertao');

INSERT INTO `tb_cidades` VALUES (0504, 05, 'BA', 'Carrapichel');

INSERT INTO `tb_cidades` VALUES (0505, 05, 'BA', 'Casa Nova');

INSERT INTO `tb_cidades` VALUES (0506, 05, 'BA', 'Castelo Novo');

INSERT INTO `tb_cidades` VALUES (0507, 05, 'BA', 'Castro Alves');

INSERT INTO `tb_cidades` VALUES (0508, 05, 'BA', 'Catinga do Moura');

INSERT INTO `tb_cidades` VALUES (0509, 05, 'BA', 'Catingal');

INSERT INTO `tb_cidades` VALUES (0510, 05, 'BA', 'Catolandia');

INSERT INTO `tb_cidades` VALUES (0511, 05, 'BA', 'Catoles');

INSERT INTO `tb_cidades` VALUES (0512, 05, 'BA', 'Catolezinho');

INSERT INTO `tb_cidades` VALUES (0513, 05, 'BA', 'Catu');

INSERT INTO `tb_cidades` VALUES (0514, 05, 'BA', 'Catu de Abrantes');

INSERT INTO `tb_cidades` VALUES (0515, 05, 'BA', 'Caturama');

INSERT INTO `tb_cidades` VALUES (0516, 05, 'BA', 'Cavunge');

INSERT INTO `tb_cidades` VALUES (0517, 05, 'BA', 'Central');

INSERT INTO `tb_cidades` VALUES (0518, 05, 'BA', 'Ceraima');

INSERT INTO `tb_cidades` VALUES (0519, 05, 'BA', 'Chorrocho');

INSERT INTO `tb_cidades` VALUES (0520, 05, 'BA', 'Cicero Dantas');

INSERT INTO `tb_cidades` VALUES (0521, 05, 'BA', 'Cinco Rios');

INSERT INTO `tb_cidades` VALUES (0522, 05, 'BA', 'Cipo');

INSERT INTO `tb_cidades` VALUES (0523, 05, 'BA', 'Coaraci');

INSERT INTO `tb_cidades` VALUES (0524, 05, 'BA', 'Cocos');

INSERT INTO `tb_cidades` VALUES (0525, 05, 'BA', 'Colonia');

INSERT INTO `tb_cidades` VALUES (0526, 05, 'BA', 'Comercio');

INSERT INTO `tb_cidades` VALUES (0527, 05, 'BA', 'Conceicao da Feira');

INSERT INTO `tb_cidades` VALUES (0528, 05, 'BA', 'Conceicao do Almeida');

INSERT INTO `tb_cidades` VALUES (0529, 05, 'BA', 'Conceicao do Coite');

INSERT INTO `tb_cidades` VALUES (0530, 05, 'BA', 'Conceicao do Jacuipe');

INSERT INTO `tb_cidades` VALUES (0531, 05, 'BA', 'Conde');

INSERT INTO `tb_cidades` VALUES (0532, 05, 'BA', 'Condeuba');

INSERT INTO `tb_cidades` VALUES (0533, 05, 'BA', 'Contendas do Sincora');

INSERT INTO `tb_cidades` VALUES (0534, 05, 'BA', 'Copixaba');

INSERT INTO `tb_cidades` VALUES (0535, 05, 'BA', 'Coqueiros');

INSERT INTO `tb_cidades` VALUES (0536, 05, 'BA', 'Coquinhos');

INSERT INTO `tb_cidades` VALUES (0537, 05, 'BA', 'Coracao de Maria');

INSERT INTO `tb_cidades` VALUES (0538, 05, 'BA', 'Cordeiros');

INSERT INTO `tb_cidades` VALUES (0539, 05, 'BA', 'Coribe');

INSERT INTO `tb_cidades` VALUES (0540, 05, 'BA', 'Coronel Joao Sa');

INSERT INTO `tb_cidades` VALUES (0541, 05, 'BA', 'Correntina');

INSERT INTO `tb_cidades` VALUES (0542, 05, 'BA', 'Corta Mao');

INSERT INTO `tb_cidades` VALUES (0543, 05, 'BA', 'Cotegipe');

INSERT INTO `tb_cidades` VALUES (0544, 05, 'BA', 'Coutos');

INSERT INTO `tb_cidades` VALUES (0545, 05, 'BA', 'Cravolandia');

INSERT INTO `tb_cidades` VALUES (0546, 05, 'BA', 'Crisopolis');

INSERT INTO `tb_cidades` VALUES (0547, 05, 'BA', 'Cristalandia');

INSERT INTO `tb_cidades` VALUES (0548, 05, 'BA', 'Cristopolis');

INSERT INTO `tb_cidades` VALUES (0549, 05, 'BA', 'Crussai');

INSERT INTO `tb_cidades` VALUES (0550, 05, 'BA', 'Cruz das Almas');

INSERT INTO `tb_cidades` VALUES (0551, 05, 'BA', 'Cumuruxatiba');

INSERT INTO `tb_cidades` VALUES (0552, 05, 'BA', 'Cunhangi');

INSERT INTO `tb_cidades` VALUES (0553, 05, 'BA', 'Curaca');

INSERT INTO `tb_cidades` VALUES (0554, 05, 'BA', 'Curral Falso');

INSERT INTO `tb_cidades` VALUES (0555, 05, 'BA', 'Dario Meira');

INSERT INTO `tb_cidades` VALUES (0556, 05, 'BA', 'Delfino');

INSERT INTO `tb_cidades` VALUES (0557, 05, 'BA', 'Descoberto');

INSERT INTO `tb_cidades` VALUES (0558, 05, 'BA', 'Dias Coelho');

INSERT INTO `tb_cidades` VALUES (0559, 05, 'BA', 'Dias D Avila');

INSERT INTO `tb_cidades` VALUES (0560, 05, 'BA', 'Diogenes Sampaio');

INSERT INTO `tb_cidades` VALUES (0561, 05, 'BA', 'Dom Basilio');

INSERT INTO `tb_cidades` VALUES (0562, 05, 'BA', 'Dom Macedo Costa');

INSERT INTO `tb_cidades` VALUES (0563, 05, 'BA', 'Dona Maria');

INSERT INTO `tb_cidades` VALUES (0564, 05, 'BA', 'Duas Barras do Morro');

INSERT INTO `tb_cidades` VALUES (0565, 05, 'BA', 'Elisio Medrado');

INSERT INTO `tb_cidades` VALUES (0566, 05, 'BA', 'Encruzilhada');

INSERT INTO `tb_cidades` VALUES (0567, 05, 'BA', 'Engenheiro Franca');

INSERT INTO `tb_cidades` VALUES (0568, 05, 'BA', 'Engenheiro Pontes');

INSERT INTO `tb_cidades` VALUES (0569, 05, 'BA', 'Entre Rios');

INSERT INTO `tb_cidades` VALUES (0570, 05, 'BA', 'Erico Cardoso');

INSERT INTO `tb_cidades` VALUES (0571, 05, 'BA', 'Esplanada');

INSERT INTO `tb_cidades` VALUES (0572, 05, 'BA', 'Euclides da Cunha');

INSERT INTO `tb_cidades` VALUES (0573, 05, 'BA', 'Eunapolis');

INSERT INTO `tb_cidades` VALUES (0574, 05, 'BA', 'Fatima');

INSERT INTO `tb_cidades` VALUES (0575, 05, 'BA', 'Feira da Mata');

INSERT INTO `tb_cidades` VALUES (0576, 05, 'BA', 'Feira de Santana');

INSERT INTO `tb_cidades` VALUES (0577, 05, 'BA', 'Ferradas');

INSERT INTO `tb_cidades` VALUES (0578, 05, 'BA', 'Filadelfia');

INSERT INTO `tb_cidades` VALUES (0579, 05, 'BA', 'Filanesia');

INSERT INTO `tb_cidades` VALUES (0580, 05, 'BA', 'Firmino Alves');

INSERT INTO `tb_cidades` VALUES (0581, 05, 'BA', 'Floresta Azul');

INSERT INTO `tb_cidades` VALUES (0582, 05, 'BA', 'Formosa do Rio Preto');

INSERT INTO `tb_cidades` VALUES (0583, 05, 'BA', 'Franca');

INSERT INTO `tb_cidades` VALUES (0584, 05, 'BA', 'Gabiarra');

INSERT INTO `tb_cidades` VALUES (0585, 05, 'BA', 'Galeao');

INSERT INTO `tb_cidades` VALUES (0586, 05, 'BA', 'Gamboa');

INSERT INTO `tb_cidades` VALUES (0587, 05, 'BA', 'Gameleira da Lapa');

INSERT INTO `tb_cidades` VALUES (0588, 05, 'BA', 'Gameleira do Assurua');

INSERT INTO `tb_cidades` VALUES (0589, 05, 'BA', 'Gandu');

INSERT INTO `tb_cidades` VALUES (0590, 05, 'BA', 'Gaviao');

INSERT INTO `tb_cidades` VALUES (0591, 05, 'BA', 'Gentio do Ouro');

INSERT INTO `tb_cidades` VALUES (0592, 05, 'BA', 'Geolandia');

INSERT INTO `tb_cidades` VALUES (0593, 05, 'BA', 'Gloria');

INSERT INTO `tb_cidades` VALUES (0594, 05, 'BA', 'Gongogi');

INSERT INTO `tb_cidades` VALUES (0595, 05, 'BA', 'Governador Joao Durval Carneiro');

INSERT INTO `tb_cidades` VALUES (0596, 05, 'BA', 'Governador Mangabeira');

INSERT INTO `tb_cidades` VALUES (0597, 05, 'BA', 'Guagirus');

INSERT INTO `tb_cidades` VALUES (0598, 05, 'BA', 'Guai');

INSERT INTO `tb_cidades` VALUES (0599, 05, 'BA', 'Guajeru');

INSERT INTO `tb_cidades` VALUES (0600, 05, 'BA', 'Guanambi');

INSERT INTO `tb_cidades` VALUES (0601, 05, 'BA', 'Guapira');

INSERT INTO `tb_cidades` VALUES (0602, 05, 'BA', 'Guarajuba');

INSERT INTO `tb_cidades` VALUES (0603, 05, 'BA', 'Guaratinga');

INSERT INTO `tb_cidades` VALUES (0604, 05, 'BA', 'Guerem');

INSERT INTO `tb_cidades` VALUES (0605, 05, 'BA', 'Guine');

INSERT INTO `tb_cidades` VALUES (0606, 05, 'BA', 'Guirapa');

INSERT INTO `tb_cidades` VALUES (0607, 05, 'BA', 'Gurupa Mirim');

INSERT INTO `tb_cidades` VALUES (0608, 05, 'BA', 'Heliopolis');

INSERT INTO `tb_cidades` VALUES (0609, 05, 'BA', 'Helvecia');

INSERT INTO `tb_cidades` VALUES (0610, 05, 'BA', 'Hidrolandia');

INSERT INTO `tb_cidades` VALUES (0611, 05, 'BA', 'Humildes');

INSERT INTO `tb_cidades` VALUES (0612, 05, 'BA', 'Iacu');

INSERT INTO `tb_cidades` VALUES (0613, 05, 'BA', 'Ibatui');

INSERT INTO `tb_cidades` VALUES (0614, 05, 'BA', 'Ibiacu');

INSERT INTO `tb_cidades` VALUES (0615, 05, 'BA', 'Ibiajara');

INSERT INTO `tb_cidades` VALUES (0616, 05, 'BA', 'Ibiapora');

INSERT INTO `tb_cidades` VALUES (0617, 05, 'BA', 'Ibiassuce');

INSERT INTO `tb_cidades` VALUES (0618, 05, 'BA', 'Ibicarai');

INSERT INTO `tb_cidades` VALUES (0619, 05, 'BA', 'Ibicoara');

INSERT INTO `tb_cidades` VALUES (0620, 05, 'BA', 'Ibicui');

INSERT INTO `tb_cidades` VALUES (0621, 05, 'BA', 'Ibipeba');

INSERT INTO `tb_cidades` VALUES (0622, 05, 'BA', 'Ibipetum');

INSERT INTO `tb_cidades` VALUES (0623, 05, 'BA', 'Ibipitanga');

INSERT INTO `tb_cidades` VALUES (0624, 05, 'BA', 'Ibiquera');

INSERT INTO `tb_cidades` VALUES (0625, 05, 'BA', 'Ibiraba');

INSERT INTO `tb_cidades` VALUES (0626, 05, 'BA', 'Ibiraja');

INSERT INTO `tb_cidades` VALUES (0627, 05, 'BA', 'Ibiranhem');

INSERT INTO `tb_cidades` VALUES (0628, 05, 'BA', 'Ibirapitanga');

INSERT INTO `tb_cidades` VALUES (0629, 05, 'BA', 'Ibirapua');

INSERT INTO `tb_cidades` VALUES (0630, 05, 'BA', 'Ibirataia');

INSERT INTO `tb_cidades` VALUES (0631, 05, 'BA', 'Ibitiara');

INSERT INTO `tb_cidades` VALUES (0632, 05, 'BA', 'Ibitiguira');

INSERT INTO `tb_cidades` VALUES (0633, 05, 'BA', 'Ibitira');

INSERT INTO `tb_cidades` VALUES (0634, 05, 'BA', 'Ibitita');

INSERT INTO `tb_cidades` VALUES (0635, 05, 'BA', 'Ibitunane');

INSERT INTO `tb_cidades` VALUES (0636, 05, 'BA', 'Ibitupa');

INSERT INTO `tb_cidades` VALUES (0637, 05, 'BA', 'Ibo');

INSERT INTO `tb_cidades` VALUES (0638, 05, 'BA', 'Ibotirama');

INSERT INTO `tb_cidades` VALUES (0639, 05, 'BA', 'Ichu');

INSERT INTO `tb_cidades` VALUES (0640, 05, 'BA', 'Ico');

INSERT INTO `tb_cidades` VALUES (0641, 05, 'BA', 'Igapora');

INSERT INTO `tb_cidades` VALUES (0642, 05, 'BA', 'Igara');

INSERT INTO `tb_cidades` VALUES (0643, 05, 'BA', 'Igarite');

INSERT INTO `tb_cidades` VALUES (0644, 05, 'BA', 'Igatu');

INSERT INTO `tb_cidades` VALUES (0645, 05, 'BA', 'Igrapiuna');

INSERT INTO `tb_cidades` VALUES (0646, 05, 'BA', 'Igua');

INSERT INTO `tb_cidades` VALUES (0647, 05, 'BA', 'Iguai');

INSERT INTO `tb_cidades` VALUES (0648, 05, 'BA', 'Iguaibi');

INSERT INTO `tb_cidades` VALUES (0649, 05, 'BA', 'Iguatemi');

INSERT INTO `tb_cidades` VALUES (0650, 05, 'BA', 'Iguira');

INSERT INTO `tb_cidades` VALUES (0651, 05, 'BA', 'Iguitu');

INSERT INTO `tb_cidades` VALUES (0652, 05, 'BA', 'Ilha de Mare');

INSERT INTO `tb_cidades` VALUES (0653, 05, 'BA', 'Ilheus');

INSERT INTO `tb_cidades` VALUES (0654, 05, 'BA', 'Indai');

INSERT INTO `tb_cidades` VALUES (0655, 05, 'BA', 'Inema');

INSERT INTO `tb_cidades` VALUES (0656, 05, 'BA', 'Inhambupe');

INSERT INTO `tb_cidades` VALUES (0657, 05, 'BA', 'Inhata');

INSERT INTO `tb_cidades` VALUES (0658, 05, 'BA', 'Inhaumas');

INSERT INTO `tb_cidades` VALUES (0659, 05, 'BA', 'Inhobim');

INSERT INTO `tb_cidades` VALUES (0660, 05, 'BA', 'Inubia');

INSERT INTO `tb_cidades` VALUES (0661, 05, 'BA', 'Ipecaeta');

INSERT INTO `tb_cidades` VALUES (0662, 05, 'BA', 'Ipiau');

INSERT INTO `tb_cidades` VALUES (0663, 05, 'BA', 'Ipira');

INSERT INTO `tb_cidades` VALUES (0664, 05, 'BA', 'Ipiuna');

INSERT INTO `tb_cidades` VALUES (0665, 05, 'BA', 'Ipucaba');

INSERT INTO `tb_cidades` VALUES (0666, 05, 'BA', 'Ipupiara');

INSERT INTO `tb_cidades` VALUES (0667, 05, 'BA', 'Irajuba');

INSERT INTO `tb_cidades` VALUES (0668, 05, 'BA', 'Iramaia');

INSERT INTO `tb_cidades` VALUES (0669, 05, 'BA', 'Iraporanga');

INSERT INTO `tb_cidades` VALUES (0670, 05, 'BA', 'Iraquara');

INSERT INTO `tb_cidades` VALUES (0671, 05, 'BA', 'Irara');

INSERT INTO `tb_cidades` VALUES (0672, 05, 'BA', 'Irece');

INSERT INTO `tb_cidades` VALUES (0673, 05, 'BA', 'Irundiara');

INSERT INTO `tb_cidades` VALUES (0674, 05, 'BA', 'Ita-azul');

INSERT INTO `tb_cidades` VALUES (0675, 05, 'BA', 'Itabela');

INSERT INTO `tb_cidades` VALUES (0676, 05, 'BA', 'Itaberaba');

INSERT INTO `tb_cidades` VALUES (0677, 05, 'BA', 'Itabuna');

INSERT INTO `tb_cidades` VALUES (0678, 05, 'BA', 'Itacare');

INSERT INTO `tb_cidades` VALUES (0679, 05, 'BA', 'Itacava');

INSERT INTO `tb_cidades` VALUES (0680, 05, 'BA', 'Itachama');

INSERT INTO `tb_cidades` VALUES (0681, 05, 'BA', 'Itacimirim');

INSERT INTO `tb_cidades` VALUES (0682, 05, 'BA', 'Itaete');

INSERT INTO `tb_cidades` VALUES (0683, 05, 'BA', 'Itagi');

INSERT INTO `tb_cidades` VALUES (0684, 05, 'BA', 'Itagiba');

INSERT INTO `tb_cidades` VALUES (0685, 05, 'BA', 'Itagimirim');

INSERT INTO `tb_cidades` VALUES (0686, 05, 'BA', 'Itaguacu da Bahia');

INSERT INTO `tb_cidades` VALUES (0687, 05, 'BA', 'Itaia');

INSERT INTO `tb_cidades` VALUES (0688, 05, 'BA', 'Itaibo');

INSERT INTO `tb_cidades` VALUES (0689, 05, 'BA', 'Itaipu');

INSERT INTO `tb_cidades` VALUES (0690, 05, 'BA', 'Itaitu');

INSERT INTO `tb_cidades` VALUES (0691, 05, 'BA', 'Itajai');

INSERT INTO `tb_cidades` VALUES (0692, 05, 'BA', 'Itaju do Colonia');

INSERT INTO `tb_cidades` VALUES (0693, 05, 'BA', 'Itajubaquara');

INSERT INTO `tb_cidades` VALUES (0694, 05, 'BA', 'Itajuipe');

INSERT INTO `tb_cidades` VALUES (0695, 05, 'BA', 'Itajuru');

INSERT INTO `tb_cidades` VALUES (0696, 05, 'BA', 'Itamaraju');

INSERT INTO `tb_cidades` VALUES (0697, 05, 'BA', 'Itamari');

INSERT INTO `tb_cidades` VALUES (0698, 05, 'BA', 'Itambe');

INSERT INTO `tb_cidades` VALUES (0699, 05, 'BA', 'Itamira');

INSERT INTO `tb_cidades` VALUES (0700, 05, 'BA', 'Itamotinga');

INSERT INTO `tb_cidades` VALUES (0701, 05, 'BA', 'Itanage');

INSERT INTO `tb_cidades` VALUES (0702, 05, 'BA', 'Itanagra');

INSERT INTO `tb_cidades` VALUES (0703, 05, 'BA', 'Itanhem');

INSERT INTO `tb_cidades` VALUES (0704, 05, 'BA', 'Itanhi');

INSERT INTO `tb_cidades` VALUES (0705, 05, 'BA', 'Itaparica');

INSERT INTO `tb_cidades` VALUES (0706, 05, 'BA', 'Itape');

INSERT INTO `tb_cidades` VALUES (0707, 05, 'BA', 'Itapebi');

INSERT INTO `tb_cidades` VALUES (0708, 05, 'BA', 'Itapeipu');

INSERT INTO `tb_cidades` VALUES (0709, 05, 'BA', 'Itapetinga');

INSERT INTO `tb_cidades` VALUES (0710, 05, 'BA', 'Itapicuru');

INSERT INTO `tb_cidades` VALUES (0711, 05, 'BA', 'Itapirema');

INSERT INTO `tb_cidades` VALUES (0712, 05, 'BA', 'Itapitanga');

INSERT INTO `tb_cidades` VALUES (0713, 05, 'BA', 'Itapora');

INSERT INTO `tb_cidades` VALUES (0714, 05, 'BA', 'Itapura');

INSERT INTO `tb_cidades` VALUES (0715, 05, 'BA', 'Itaquara');

INSERT INTO `tb_cidades` VALUES (0716, 05, 'BA', 'Itaquarai');

INSERT INTO `tb_cidades` VALUES (0717, 05, 'BA', 'Itarantim');

INSERT INTO `tb_cidades` VALUES (0718, 05, 'BA', 'Itati');

INSERT INTO `tb_cidades` VALUES (0719, 05, 'BA', 'Itatim');

INSERT INTO `tb_cidades` VALUES (0720, 05, 'BA', 'Itatingui');

INSERT INTO `tb_cidades` VALUES (0721, 05, 'BA', 'Itirucu');

INSERT INTO `tb_cidades` VALUES (0722, 05, 'BA', 'Itiuba');

INSERT INTO `tb_cidades` VALUES (0723, 05, 'BA', 'Itororo');

INSERT INTO `tb_cidades` VALUES (0724, 05, 'BA', 'Ituacu');

INSERT INTO `tb_cidades` VALUES (0725, 05, 'BA', 'Itubera');

INSERT INTO `tb_cidades` VALUES (0726, 05, 'BA', 'Itupeva');

INSERT INTO `tb_cidades` VALUES (0727, 05, 'BA', 'Iuiu');

INSERT INTO `tb_cidades` VALUES (0728, 05, 'BA', 'Jaborandi');

INSERT INTO `tb_cidades` VALUES (0729, 05, 'BA', 'Jacaraci');

INSERT INTO `tb_cidades` VALUES (0730, 05, 'BA', 'Jacobina');

INSERT INTO `tb_cidades` VALUES (0731, 05, 'BA', 'Jacu');

INSERT INTO `tb_cidades` VALUES (0732, 05, 'BA', 'Jacuipe');

INSERT INTO `tb_cidades` VALUES (0733, 05, 'BA', 'Jacuruna');

INSERT INTO `tb_cidades` VALUES (0734, 05, 'BA', 'Jaguaquara');

INSERT INTO `tb_cidades` VALUES (0735, 05, 'BA', 'Jaguara');

INSERT INTO `tb_cidades` VALUES (0736, 05, 'BA', 'Jaguarari');

INSERT INTO `tb_cidades` VALUES (0737, 05, 'BA', 'Jaguaripe');

INSERT INTO `tb_cidades` VALUES (0738, 05, 'BA', 'Jaiba');

INSERT INTO `tb_cidades` VALUES (0739, 05, 'BA', 'Jandaira');

INSERT INTO `tb_cidades` VALUES (0740, 05, 'BA', 'Japomirim');

INSERT INTO `tb_cidades` VALUES (0741, 05, 'BA', 'Japu');

INSERT INTO `tb_cidades` VALUES (0742, 05, 'BA', 'Jaua');

INSERT INTO `tb_cidades` VALUES (0743, 05, 'BA', 'Jequie');

INSERT INTO `tb_cidades` VALUES (0744, 05, 'BA', 'Jequirica');

INSERT INTO `tb_cidades` VALUES (0745, 05, 'BA', 'Jeremoabo');

INSERT INTO `tb_cidades` VALUES (0746, 05, 'BA', 'Jiribatuba');

INSERT INTO `tb_cidades` VALUES (0747, 05, 'BA', 'Jitauna');

INSERT INTO `tb_cidades` VALUES (0748, 05, 'BA', 'Joao Amaro');

INSERT INTO `tb_cidades` VALUES (0749, 05, 'BA', 'Joao Correia');

INSERT INTO `tb_cidades` VALUES (0750, 05, 'BA', 'Joao Dourado');

INSERT INTO `tb_cidades` VALUES (0751, 05, 'BA', 'Jose Goncalves');

INSERT INTO `tb_cidades` VALUES (0752, 05, 'BA', 'Juacema');

INSERT INTO `tb_cidades` VALUES (0753, 05, 'BA', 'Juazeiro');

INSERT INTO `tb_cidades` VALUES (0754, 05, 'BA', 'Jucurucu');

INSERT INTO `tb_cidades` VALUES (0755, 05, 'BA', 'Juerana');

INSERT INTO `tb_cidades` VALUES (0756, 05, 'BA', 'Junco');

INSERT INTO `tb_cidades` VALUES (0757, 05, 'BA', 'Jupagua');

INSERT INTO `tb_cidades` VALUES (0758, 05, 'BA', 'Juraci');

INSERT INTO `tb_cidades` VALUES (0759, 05, 'BA', 'Juremal');

INSERT INTO `tb_cidades` VALUES (0760, 05, 'BA', 'Jussara');

INSERT INTO `tb_cidades` VALUES (0761, 05, 'BA', 'Jussari');

INSERT INTO `tb_cidades` VALUES (0762, 05, 'BA', 'Jussiape');

INSERT INTO `tb_cidades` VALUES (0763, 05, 'BA', 'Km Sete');

INSERT INTO `tb_cidades` VALUES (0764, 05, 'BA', 'Lafaiete Coutinho');

INSERT INTO `tb_cidades` VALUES (0765, 05, 'BA', 'Lagoa Clara');

INSERT INTO `tb_cidades` VALUES (0766, 05, 'BA', 'Lagoa de Melquiades');

INSERT INTO `tb_cidades` VALUES (0767, 05, 'BA', 'Lagoa do Boi');

INSERT INTO `tb_cidades` VALUES (0768, 05, 'BA', 'Lagoa Grande');

INSERT INTO `tb_cidades` VALUES (0769, 05, 'BA', 'Lagoa Jose Luis');

INSERT INTO `tb_cidades` VALUES (0770, 05, 'BA', 'Lagoa Preta');

INSERT INTO `tb_cidades` VALUES (0771, 05, 'BA', 'Lagoa Real');

INSERT INTO `tb_cidades` VALUES (0772, 05, 'BA', 'Laje');

INSERT INTO `tb_cidades` VALUES (0773, 05, 'BA', 'Laje do Banco');

INSERT INTO `tb_cidades` VALUES (0774, 05, 'BA', 'Lajedao');

INSERT INTO `tb_cidades` VALUES (0775, 05, 'BA', 'Lajedinho');

INSERT INTO `tb_cidades` VALUES (0776, 05, 'BA', 'Lajedo Alto');

INSERT INTO `tb_cidades` VALUES (0777, 05, 'BA', 'Lajedo do Tabocal');

INSERT INTO `tb_cidades` VALUES (0778, 05, 'BA', 'Lamarao');

INSERT INTO `tb_cidades` VALUES (0779, 05, 'BA', 'Lamarao do Passe');

INSERT INTO `tb_cidades` VALUES (0780, 05, 'BA', 'Lapao');

INSERT INTO `tb_cidades` VALUES (0781, 05, 'BA', 'Largo');

INSERT INTO `tb_cidades` VALUES (0782, 05, 'BA', 'Lauro de Freitas');

INSERT INTO `tb_cidades` VALUES (0783, 05, 'BA', 'Lencois');

INSERT INTO `tb_cidades` VALUES (0784, 05, 'BA', 'Licinio de Almeida');

INSERT INTO `tb_cidades` VALUES (0785, 05, 'BA', 'Limoeiro do Bom Viver');

INSERT INTO `tb_cidades` VALUES (0786, 05, 'BA', 'Livramento do Brumado');

INSERT INTO `tb_cidades` VALUES (0787, 05, 'BA', 'Lucaia');

INSERT INTO `tb_cidades` VALUES (0788, 05, 'BA', 'Luis Viana');

INSERT INTO `tb_cidades` VALUES (0789, 05, 'BA', 'Lustosa');

INSERT INTO `tb_cidades` VALUES (0790, 05, 'BA', 'Macajuba');

INSERT INTO `tb_cidades` VALUES (0791, 05, 'BA', 'Macarani');

INSERT INTO `tb_cidades` VALUES (0792, 05, 'BA', 'Macaubas');

INSERT INTO `tb_cidades` VALUES (0793, 05, 'BA', 'Macurure');

INSERT INTO `tb_cidades` VALUES (0794, 05, 'BA', 'Madre de Deus');

INSERT INTO `tb_cidades` VALUES (0795, 05, 'BA', 'Maetinga');

INSERT INTO `tb_cidades` VALUES (0796, 05, 'BA', 'Maiquinique');

INSERT INTO `tb_cidades` VALUES (0797, 05, 'BA', 'Mairi');

INSERT INTO `tb_cidades` VALUES (0798, 05, 'BA', 'Malhada');

INSERT INTO `tb_cidades` VALUES (0799, 05, 'BA', 'Malhada de Pedras');

INSERT INTO `tb_cidades` VALUES (0800, 05, 'BA', 'Mandiroba');

INSERT INTO `tb_cidades` VALUES (0801, 05, 'BA', 'Mangue Seco');

INSERT INTO `tb_cidades` VALUES (0802, 05, 'BA', 'Maniacu');

INSERT INTO `tb_cidades` VALUES (0803, 05, 'BA', 'Manoel Vitorino');

INSERT INTO `tb_cidades` VALUES (0804, 05, 'BA', 'Mansidao');

INSERT INTO `tb_cidades` VALUES (0805, 05, 'BA', 'Mantiba');

INSERT INTO `tb_cidades` VALUES (0806, 05, 'BA', 'Mar Grande');

INSERT INTO `tb_cidades` VALUES (0807, 05, 'BA', 'Maracas');

INSERT INTO `tb_cidades` VALUES (0808, 05, 'BA', 'Maragogipe');

INSERT INTO `tb_cidades` VALUES (0809, 05, 'BA', 'Maragogipinho');

INSERT INTO `tb_cidades` VALUES (0810, 05, 'BA', 'Marau');

INSERT INTO `tb_cidades` VALUES (0811, 05, 'BA', 'Marcionilio Souza');

INSERT INTO `tb_cidades` VALUES (0812, 05, 'BA', 'Marcolino Moura');

INSERT INTO `tb_cidades` VALUES (0813, 05, 'BA', 'Maria Quiteria');

INSERT INTO `tb_cidades` VALUES (0814, 05, 'BA', 'Maricoabo');

INSERT INTO `tb_cidades` VALUES (0815, 05, 'BA', 'Mariquita');

INSERT INTO `tb_cidades` VALUES (0816, 05, 'BA', 'Mascote');

INSERT INTO `tb_cidades` VALUES (0817, 05, 'BA', 'Massacara');

INSERT INTO `tb_cidades` VALUES (0818, 05, 'BA', 'Massaroca');

INSERT INTO `tb_cidades` VALUES (0819, 05, 'BA', 'Mata da Alianca');

INSERT INTO `tb_cidades` VALUES (0820, 05, 'BA', 'Mata de Sao Joao');

INSERT INTO `tb_cidades` VALUES (0821, 05, 'BA', 'Mataripe');

INSERT INTO `tb_cidades` VALUES (0822, 05, 'BA', 'Matina');

INSERT INTO `tb_cidades` VALUES (0823, 05, 'BA', 'Matinha');

INSERT INTO `tb_cidades` VALUES (0824, 05, 'BA', 'Medeiros Neto');

INSERT INTO `tb_cidades` VALUES (0825, 05, 'BA', 'Miguel Calmon');

INSERT INTO `tb_cidades` VALUES (0826, 05, 'BA', 'Milagres');

INSERT INTO `tb_cidades` VALUES (0827, 05, 'BA', 'Mimoso do Oeste');

INSERT INTO `tb_cidades` VALUES (0828, 05, 'BA', 'Minas do Espirito Santo');

INSERT INTO `tb_cidades` VALUES (0829, 05, 'BA', 'Minas do Mimoso');

INSERT INTO `tb_cidades` VALUES (0830, 05, 'BA', 'Mirandela');

INSERT INTO `tb_cidades` VALUES (0831, 05, 'BA', 'Miranga');

INSERT INTO `tb_cidades` VALUES (0832, 05, 'BA', 'Mirangaba');

INSERT INTO `tb_cidades` VALUES (0833, 05, 'BA', 'Mirante');

INSERT INTO `tb_cidades` VALUES (0834, 05, 'BA', 'Mocambo');

INSERT INTO `tb_cidades` VALUES (0835, 05, 'BA', 'Mogiquicaba');

INSERT INTO `tb_cidades` VALUES (0836, 05, 'BA', 'Monte Cruzeiro');

INSERT INTO `tb_cidades` VALUES (0837, 05, 'BA', 'Monte Gordo');

INSERT INTO `tb_cidades` VALUES (0838, 05, 'BA', 'Monte Reconcavo');

INSERT INTO `tb_cidades` VALUES (0839, 05, 'BA', 'Monte Santo');

INSERT INTO `tb_cidades` VALUES (0840, 05, 'BA', 'Morpara');

INSERT INTO `tb_cidades` VALUES (0841, 05, 'BA', 'Morrinhos');

INSERT INTO `tb_cidades` VALUES (0842, 05, 'BA', 'Morro das Flores');

INSERT INTO `tb_cidades` VALUES (0843, 05, 'BA', 'Morro de Sao Paulo');

INSERT INTO `tb_cidades` VALUES (0844, 05, 'BA', 'Morro do Chapeu');

INSERT INTO `tb_cidades` VALUES (0845, 05, 'BA', 'Mortugaba');

INSERT INTO `tb_cidades` VALUES (0846, 05, 'BA', 'Mucuge');

INSERT INTO `tb_cidades` VALUES (0847, 05, 'BA', 'Mucuri');

INSERT INTO `tb_cidades` VALUES (0848, 05, 'BA', 'Mulungu do Morro');

INSERT INTO `tb_cidades` VALUES (0849, 05, 'BA', 'Mundo Novo');

INSERT INTO `tb_cidades` VALUES (0850, 05, 'BA', 'Muniz Ferreira');

INSERT INTO `tb_cidades` VALUES (0851, 05, 'BA', 'Muquem do Sao Francisco');

INSERT INTO `tb_cidades` VALUES (0852, 05, 'BA', 'Muritiba');

INSERT INTO `tb_cidades` VALUES (0853, 05, 'BA', 'Mutas');

INSERT INTO `tb_cidades` VALUES (0854, 05, 'BA', 'Mutuipe');

INSERT INTO `tb_cidades` VALUES (0855, 05, 'BA', 'Nage');

INSERT INTO `tb_cidades` VALUES (0856, 05, 'BA', 'Narandiba');

INSERT INTO `tb_cidades` VALUES (0857, 05, 'BA', 'Nazare');

INSERT INTO `tb_cidades` VALUES (0858, 05, 'BA', 'Nilo Pecanha');

INSERT INTO `tb_cidades` VALUES (0859, 05, 'BA', 'Nordestina');

INSERT INTO `tb_cidades` VALUES (0860, 05, 'BA', 'Nova Alegria');

INSERT INTO `tb_cidades` VALUES (0861, 05, 'BA', 'Nova Brasilia');

INSERT INTO `tb_cidades` VALUES (0862, 05, 'BA', 'Nova Canaa');

INSERT INTO `tb_cidades` VALUES (0863, 05, 'BA', 'Nova Fatima');

INSERT INTO `tb_cidades` VALUES (0864, 05, 'BA', 'Nova Ibia');

INSERT INTO `tb_cidades` VALUES (0865, 05, 'BA', 'Nova Itaipe');

INSERT INTO `tb_cidades` VALUES (0866, 05, 'BA', 'Nova Itarana');

INSERT INTO `tb_cidades` VALUES (0867, 05, 'BA', 'Nova Lidice');

INSERT INTO `tb_cidades` VALUES (0868, 05, 'BA', 'Nova Redencao');

INSERT INTO `tb_cidades` VALUES (0869, 05, 'BA', 'Nova Soure');

INSERT INTO `tb_cidades` VALUES (0870, 05, 'BA', 'Nova Vicosa');

INSERT INTO `tb_cidades` VALUES (0871, 05, 'BA', 'Novo Acre');

INSERT INTO `tb_cidades` VALUES (0872, 05, 'BA', 'Novo Horizonte');

INSERT INTO `tb_cidades` VALUES (0873, 05, 'BA', 'Novo Triunfo');

INSERT INTO `tb_cidades` VALUES (0874, 05, 'BA', 'Nucleo Residencial Pilar');

INSERT INTO `tb_cidades` VALUES (0875, 05, 'BA', 'Nuguacu');

INSERT INTO `tb_cidades` VALUES (0876, 05, 'BA', 'Olhos D''agua Do Seco');

INSERT INTO `tb_cidades` VALUES (0877, 05, 'BA', 'Olhos D''agua Do Serafim');

INSERT INTO `tb_cidades` VALUES (0878, 05, 'BA', 'Olindina');

INSERT INTO `tb_cidades` VALUES (0879, 05, 'BA', 'Oliveira dos Brejinhos');

INSERT INTO `tb_cidades` VALUES (0880, 05, 'BA', 'Olivenca');

INSERT INTO `tb_cidades` VALUES (0881, 05, 'BA', 'Onha');

INSERT INTO `tb_cidades` VALUES (0882, 05, 'BA', 'Oriente Novo');

INSERT INTO `tb_cidades` VALUES (0883, 05, 'BA', 'Ouricana');

INSERT INTO `tb_cidades` VALUES (0884, 05, 'BA', 'Ouricangas');

INSERT INTO `tb_cidades` VALUES (0885, 05, 'BA', 'Ouricuri do Ouro');

INSERT INTO `tb_cidades` VALUES (0886, 05, 'BA', 'Ourolandia');

INSERT INTO `tb_cidades` VALUES (0887, 05, 'BA', 'Outeiro Redondo');

INSERT INTO `tb_cidades` VALUES (0888, 05, 'BA', 'Paiol');

INSERT INTO `tb_cidades` VALUES (0889, 05, 'BA', 'Pajeu do Vento');

INSERT INTO `tb_cidades` VALUES (0890, 05, 'BA', 'Palame');

INSERT INTO `tb_cidades` VALUES (0891, 05, 'BA', 'Palmas de Monte Alto');

INSERT INTO `tb_cidades` VALUES (0892, 05, 'BA', 'Palmeiras');

INSERT INTO `tb_cidades` VALUES (0893, 05, 'BA', 'Parafuso');

INSERT INTO `tb_cidades` VALUES (0894, 05, 'BA', 'Paramirim');

INSERT INTO `tb_cidades` VALUES (0895, 05, 'BA', 'Parateca');

INSERT INTO `tb_cidades` VALUES (0896, 05, 'BA', 'Paratinga');

INSERT INTO `tb_cidades` VALUES (0897, 05, 'BA', 'Paripiranga');

INSERT INTO `tb_cidades` VALUES (0898, 05, 'BA', 'Pataiba');

INSERT INTO `tb_cidades` VALUES (0899, 05, 'BA', 'Patamute');

INSERT INTO `tb_cidades` VALUES (0900, 05, 'BA', 'Pau A Pique');

INSERT INTO `tb_cidades` VALUES (0901, 05, 'BA', 'Pau Brasil');

INSERT INTO `tb_cidades` VALUES (0902, 05, 'BA', 'Paulo Afonso');

INSERT INTO `tb_cidades` VALUES (0903, 05, 'BA', 'Pe de Serra');

INSERT INTO `tb_cidades` VALUES (0904, 05, 'BA', 'Pedrao');

INSERT INTO `tb_cidades` VALUES (0905, 05, 'BA', 'Pedras Altas do Mirim');

INSERT INTO `tb_cidades` VALUES (0906, 05, 'BA', 'Pedro Alexandre');

INSERT INTO `tb_cidades` VALUES (0907, 05, 'BA', 'Peixe');

INSERT INTO `tb_cidades` VALUES (0908, 05, 'BA', 'Petim');

INSERT INTO `tb_cidades` VALUES (0909, 05, 'BA', 'Piabanha');

INSERT INTO `tb_cidades` VALUES (0910, 05, 'BA', 'Piata');

INSERT INTO `tb_cidades` VALUES (0911, 05, 'BA', 'Picarrao');

INSERT INTO `tb_cidades` VALUES (0912, 05, 'BA', 'Pilao Arcado');

INSERT INTO `tb_cidades` VALUES (0913, 05, 'BA', 'Pimenteira');

INSERT INTO `tb_cidades` VALUES (0914, 05, 'BA', 'Pindai');

INSERT INTO `tb_cidades` VALUES (0915, 05, 'BA', 'Pindobacu');

INSERT INTO `tb_cidades` VALUES (0916, 05, 'BA', 'Pinhoes');

INSERT INTO `tb_cidades` VALUES (0917, 05, 'BA', 'Pintadas');

INSERT INTO `tb_cidades` VALUES (0918, 05, 'BA', 'Piragi');

INSERT INTO `tb_cidades` VALUES (0919, 05, 'BA', 'Pirai do Norte');

INSERT INTO `tb_cidades` VALUES (0920, 05, 'BA', 'Piraja');

INSERT INTO `tb_cidades` VALUES (0921, 05, 'BA', 'Pirajuia');

INSERT INTO `tb_cidades` VALUES (0922, 05, 'BA', 'Piri');

INSERT INTO `tb_cidades` VALUES (0923, 05, 'BA', 'Piripa');

INSERT INTO `tb_cidades` VALUES (0924, 05, 'BA', 'Piritiba');

INSERT INTO `tb_cidades` VALUES (0925, 05, 'BA', 'Pituba');

INSERT INTO `tb_cidades` VALUES (0926, 05, 'BA', 'Planaltino');

INSERT INTO `tb_cidades` VALUES (0927, 05, 'BA', 'Planalto');

INSERT INTO `tb_cidades` VALUES (0928, 05, 'BA', 'Poco Central');

INSERT INTO `tb_cidades` VALUES (0929, 05, 'BA', 'Poco de Fora');

INSERT INTO `tb_cidades` VALUES (0930, 05, 'BA', 'Pocoes');

INSERT INTO `tb_cidades` VALUES (0931, 05, 'BA', 'Pocos');

INSERT INTO `tb_cidades` VALUES (0932, 05, 'BA', 'Pojuca');

INSERT INTO `tb_cidades` VALUES (0933, 05, 'BA', 'Polo Petroquimico de Camacari');

INSERT INTO `tb_cidades` VALUES (0934, 05, 'BA', 'Ponta da Areia');

INSERT INTO `tb_cidades` VALUES (0935, 05, 'BA', 'Ponto Novo');

INSERT INTO `tb_cidades` VALUES (0936, 05, 'BA', 'Porto Novo');

INSERT INTO `tb_cidades` VALUES (0937, 05, 'BA', 'Porto Seguro');

INSERT INTO `tb_cidades` VALUES (0938, 05, 'BA', 'Posto da Mata');

INSERT INTO `tb_cidades` VALUES (0939, 05, 'BA', 'Potiragua');

INSERT INTO `tb_cidades` VALUES (0940, 05, 'BA', 'Poxim do Sul');

INSERT INTO `tb_cidades` VALUES (0941, 05, 'BA', 'Prado');

INSERT INTO `tb_cidades` VALUES (0942, 05, 'BA', 'Presidente Dutra');

INSERT INTO `tb_cidades` VALUES (0943, 05, 'BA', 'Presidente Janio Quadros');

INSERT INTO `tb_cidades` VALUES (0944, 05, 'BA', 'Presidente Tancredo Neves');

INSERT INTO `tb_cidades` VALUES (0945, 05, 'BA', 'Prevenido');

INSERT INTO `tb_cidades` VALUES (0946, 05, 'BA', 'Quaracu');

INSERT INTO `tb_cidades` VALUES (0947, 05, 'BA', 'Queimadas');

INSERT INTO `tb_cidades` VALUES (0948, 05, 'BA', 'Quijingue');

INSERT INTO `tb_cidades` VALUES (0949, 05, 'BA', 'Quixaba');

INSERT INTO `tb_cidades` VALUES (0950, 05, 'BA', 'Quixabeira');

INSERT INTO `tb_cidades` VALUES (0951, 05, 'BA', 'Rafael Jambeiro');

INSERT INTO `tb_cidades` VALUES (0952, 05, 'BA', 'Recife');

INSERT INTO `tb_cidades` VALUES (0953, 05, 'BA', 'Remanso');

INSERT INTO `tb_cidades` VALUES (0954, 05, 'BA', 'Remedios');

INSERT INTO `tb_cidades` VALUES (0955, 05, 'BA', 'Retirolandia');

INSERT INTO `tb_cidades` VALUES (0956, 05, 'BA', 'Riachao das Neves');

INSERT INTO `tb_cidades` VALUES (0957, 05, 'BA', 'Riachao do Jacuipe');

INSERT INTO `tb_cidades` VALUES (0958, 05, 'BA', 'Riachao do Utinga');

INSERT INTO `tb_cidades` VALUES (0959, 05, 'BA', 'Riacho da Guia');

INSERT INTO `tb_cidades` VALUES (0960, 05, 'BA', 'Riacho de Santana');

INSERT INTO `tb_cidades` VALUES (0961, 05, 'BA', 'Riacho Seco');

INSERT INTO `tb_cidades` VALUES (0962, 05, 'BA', 'Ribeira do Amparo');

INSERT INTO `tb_cidades` VALUES (0963, 05, 'BA', 'Ribeira do Pombal');

INSERT INTO `tb_cidades` VALUES (0964, 05, 'BA', 'Ribeirao do Largo');

INSERT INTO `tb_cidades` VALUES (0965, 05, 'BA', 'Ribeirao do Salto');

INSERT INTO `tb_cidades` VALUES (0966, 05, 'BA', 'Rio da Dona');

INSERT INTO `tb_cidades` VALUES (0967, 05, 'BA', 'Rio de Contas');

INSERT INTO `tb_cidades` VALUES (0968, 05, 'BA', 'Rio do Antonio');

INSERT INTO `tb_cidades` VALUES (0969, 05, 'BA', 'Rio do Braco');

INSERT INTO `tb_cidades` VALUES (0970, 05, 'BA', 'Rio do Meio');

INSERT INTO `tb_cidades` VALUES (0971, 05, 'BA', 'Rio do Pires');

INSERT INTO `tb_cidades` VALUES (0972, 05, 'BA', 'Rio Fundo');

INSERT INTO `tb_cidades` VALUES (0973, 05, 'BA', 'Rio Real');

INSERT INTO `tb_cidades` VALUES (0974, 05, 'BA', 'Rodelas');

INSERT INTO `tb_cidades` VALUES (0975, 05, 'BA', 'Ruy Barbosa');

INSERT INTO `tb_cidades` VALUES (0976, 05, 'BA', 'Saldanha');

INSERT INTO `tb_cidades` VALUES (0977, 05, 'BA', 'Salgadalia');

INSERT INTO `tb_cidades` VALUES (0978, 05, 'BA', 'Salinas da Margarida');

INSERT INTO `tb_cidades` VALUES (0979, 05, 'BA', 'Salobrinho');

INSERT INTO `tb_cidades` VALUES (0980, 05, 'BA', 'Salobro');

INSERT INTO `tb_cidades` VALUES (0981, 05, 'BA', 'Salvador');

INSERT INTO `tb_cidades` VALUES (0982, 05, 'BA', 'Sambaiba');

INSERT INTO `tb_cidades` VALUES (0983, 05, 'BA', 'Santa Barbara');

INSERT INTO `tb_cidades` VALUES (0984, 05, 'BA', 'Santa Brigida');

INSERT INTO `tb_cidades` VALUES (0985, 05, 'BA', 'Santa Cruz Cabralia');

INSERT INTO `tb_cidades` VALUES (0986, 05, 'BA', 'Santa Cruz da Vitoria');

INSERT INTO `tb_cidades` VALUES (0987, 05, 'BA', 'Santa Ines');

INSERT INTO `tb_cidades` VALUES (0988, 05, 'BA', 'Santa Luzia');

INSERT INTO `tb_cidades` VALUES (0989, 05, 'BA', 'Santa Maria da Vitoria');

INSERT INTO `tb_cidades` VALUES (0990, 05, 'BA', 'Santa Rita de Cassia');

INSERT INTO `tb_cidades` VALUES (0991, 05, 'BA', 'Santa Terezinha');

INSERT INTO `tb_cidades` VALUES (0992, 05, 'BA', 'Santaluz');

INSERT INTO `tb_cidades` VALUES (0993, 05, 'BA', 'Santana');

INSERT INTO `tb_cidades` VALUES (0994, 05, 'BA', 'Santana do Sobrado');

INSERT INTO `tb_cidades` VALUES (0995, 05, 'BA', 'Santanopolis');

INSERT INTO `tb_cidades` VALUES (0996, 05, 'BA', 'Santiago do Iguape');

INSERT INTO `tb_cidades` VALUES (0997, 05, 'BA', 'Santo Amaro');

INSERT INTO `tb_cidades` VALUES (0998, 05, 'BA', 'Santo Antonio de Barcelona');

INSERT INTO `tb_cidades` VALUES (0999, 05, 'BA', 'Santo Antonio de Jesus');

INSERT INTO `tb_cidades` VALUES (1000, 05, 'BA', 'Santo Estevao');

INSERT INTO `tb_cidades` VALUES (1001, 05, 'BA', 'Santo Inacio');

INSERT INTO `tb_cidades` VALUES (1002, 05, 'BA', 'Sao Desiderio');

INSERT INTO `tb_cidades` VALUES (1003, 05, 'BA', 'Sao Domingos');

INSERT INTO `tb_cidades` VALUES (1004, 05, 'BA', 'Sao Felipe');

INSERT INTO `tb_cidades` VALUES (1005, 05, 'BA', 'Sao Felix');

INSERT INTO `tb_cidades` VALUES (1006, 05, 'BA', 'Sao Felix do Coribe');

INSERT INTO `tb_cidades` VALUES (1007, 05, 'BA', 'Sao Francisco do Conde');

INSERT INTO `tb_cidades` VALUES (1008, 05, 'BA', 'Sao Gabriel');

INSERT INTO `tb_cidades` VALUES (1009, 05, 'BA', 'Sao Goncalo dos Campos');

INSERT INTO `tb_cidades` VALUES (1010, 05, 'BA', 'Sao Joao da Fortaleza');

INSERT INTO `tb_cidades` VALUES (1011, 05, 'BA', 'Sao Joao da Vitoria');

INSERT INTO `tb_cidades` VALUES (1012, 05, 'BA', 'Sao Jose da Vitoria');

INSERT INTO `tb_cidades` VALUES (1013, 05, 'BA', 'Sao Jose do Colonia');

INSERT INTO `tb_cidades` VALUES (1014, 05, 'BA', 'Sao Jose do Jacuipe');

INSERT INTO `tb_cidades` VALUES (1015, 05, 'BA', 'Sao Jose do Prado');

INSERT INTO `tb_cidades` VALUES (1016, 05, 'BA', 'Sao Jose do Rio Grande');

INSERT INTO `tb_cidades` VALUES (1017, 05, 'BA', 'Sao Miguel das Matas');

INSERT INTO `tb_cidades` VALUES (1018, 05, 'BA', 'Sao Paulinho');

INSERT INTO `tb_cidades` VALUES (1019, 05, 'BA', 'Sao Roque do Paraguacu');

INSERT INTO `tb_cidades` VALUES (1020, 05, 'BA', 'Sao Sebastiao do Passe');

INSERT INTO `tb_cidades` VALUES (1021, 05, 'BA', 'Sao Timoteo');

INSERT INTO `tb_cidades` VALUES (1022, 05, 'BA', 'Sapeacu');

INSERT INTO `tb_cidades` VALUES (1023, 05, 'BA', 'Satiro Dias');

INSERT INTO `tb_cidades` VALUES (1024, 05, 'BA', 'Saubara');

INSERT INTO `tb_cidades` VALUES (1025, 05, 'BA', 'Saudavel');

INSERT INTO `tb_cidades` VALUES (1026, 05, 'BA', 'Saude');

INSERT INTO `tb_cidades` VALUES (1027, 05, 'BA', 'Seabra');

INSERT INTO `tb_cidades` VALUES (1028, 05, 'BA', 'Sebastiao Laranjeiras');

INSERT INTO `tb_cidades` VALUES (1029, 05, 'BA', 'Senhor do Bonfim');

INSERT INTO `tb_cidades` VALUES (1030, 05, 'BA', 'Sento Se');

INSERT INTO `tb_cidades` VALUES (1031, 05, 'BA', 'Sergi');

INSERT INTO `tb_cidades` VALUES (1032, 05, 'BA', 'Serra da Canabrava');

INSERT INTO `tb_cidades` VALUES (1033, 05, 'BA', 'Serra do Ramalho');

INSERT INTO `tb_cidades` VALUES (1034, 05, 'BA', 'Serra Dourada');

INSERT INTO `tb_cidades` VALUES (1035, 05, 'BA', 'Serra Grande');

INSERT INTO `tb_cidades` VALUES (1036, 05, 'BA', 'Serra Preta');

INSERT INTO `tb_cidades` VALUES (1037, 05, 'BA', 'Serrinha');

INSERT INTO `tb_cidades` VALUES (1038, 05, 'BA', 'Serrolandia');

INSERT INTO `tb_cidades` VALUES (1039, 05, 'BA', 'Simoes Filho');

INSERT INTO `tb_cidades` VALUES (1040, 05, 'BA', 'Sitio da Barauna');

INSERT INTO `tb_cidades` VALUES (1041, 05, 'BA', 'Sitio do Mato');

INSERT INTO `tb_cidades` VALUES (1042, 05, 'BA', 'Sitio do Meio');

INSERT INTO `tb_cidades` VALUES (1043, 05, 'BA', 'Sitio do Quinto');

INSERT INTO `tb_cidades` VALUES (1044, 05, 'BA', 'Sitio Grande');

INSERT INTO `tb_cidades` VALUES (1045, 05, 'BA', 'Sitio Novo');

INSERT INTO `tb_cidades` VALUES (1046, 05, 'BA', 'Soares');

INSERT INTO `tb_cidades` VALUES (1047, 05, 'BA', 'Sobradinho');

INSERT INTO `tb_cidades` VALUES (1048, 05, 'BA', 'Souto Soares');

INSERT INTO `tb_cidades` VALUES (1049, 05, 'BA', 'Subauma');

INSERT INTO `tb_cidades` VALUES (1050, 05, 'BA', 'Sussuarana');

INSERT INTO `tb_cidades` VALUES (1051, 05, 'BA', 'Tabocas do Brejo Velho');

INSERT INTO `tb_cidades` VALUES (1052, 05, 'BA', 'Taboleiro do Castro');

INSERT INTO `tb_cidades` VALUES (1053, 05, 'BA', 'Taboquinhas');

INSERT INTO `tb_cidades` VALUES (1054, 05, 'BA', 'Tagua');

INSERT INTO `tb_cidades` VALUES (1055, 05, 'BA', 'Tamburil');

INSERT INTO `tb_cidades` VALUES (1056, 05, 'BA', 'Tanhacu');

INSERT INTO `tb_cidades` VALUES (1057, 05, 'BA', 'Tanque Novo');

INSERT INTO `tb_cidades` VALUES (1058, 05, 'BA', 'Tanquinho');

INSERT INTO `tb_cidades` VALUES (1059, 05, 'BA', 'Tanquinho do Poco');

INSERT INTO `tb_cidades` VALUES (1060, 05, 'BA', 'Taperoa');

INSERT INTO `tb_cidades` VALUES (1061, 05, 'BA', 'Tapiraipe');

INSERT INTO `tb_cidades` VALUES (1062, 05, 'BA', 'Tapirama');

INSERT INTO `tb_cidades` VALUES (1063, 05, 'BA', 'Tapiramuta');

INSERT INTO `tb_cidades` VALUES (1064, 05, 'BA', 'Tapiranga');

INSERT INTO `tb_cidades` VALUES (1065, 05, 'BA', 'Tapuia');

INSERT INTO `tb_cidades` VALUES (1066, 05, 'BA', 'Taquarendi');

INSERT INTO `tb_cidades` VALUES (1067, 05, 'BA', 'Taquarinha');

INSERT INTO `tb_cidades` VALUES (1068, 05, 'BA', 'Tartaruga');

INSERT INTO `tb_cidades` VALUES (1069, 05, 'BA', 'Tauape');

INSERT INTO `tb_cidades` VALUES (1070, 05, 'BA', 'Teixeira de Freitas');

INSERT INTO `tb_cidades` VALUES (1071, 05, 'BA', 'Teodoro Sampaio');

INSERT INTO `tb_cidades` VALUES (1072, 05, 'BA', 'Teofilandia');

INSERT INTO `tb_cidades` VALUES (1073, 05, 'BA', 'Teolandia');

INSERT INTO `tb_cidades` VALUES (1074, 05, 'BA', 'Terra Nova');

INSERT INTO `tb_cidades` VALUES (1075, 05, 'BA', 'Tijuacu');

INSERT INTO `tb_cidades` VALUES (1076, 05, 'BA', 'Tiquarucu');

INSERT INTO `tb_cidades` VALUES (1077, 05, 'BA', 'Tremedal');

INSERT INTO `tb_cidades` VALUES (1078, 05, 'BA', 'Triunfo do Sincora');

INSERT INTO `tb_cidades` VALUES (1079, 05, 'BA', 'Tucano');

INSERT INTO `tb_cidades` VALUES (1080, 05, 'BA', 'Uaua');

INSERT INTO `tb_cidades` VALUES (1081, 05, 'BA', 'Ubaira');

INSERT INTO `tb_cidades` VALUES (1082, 05, 'BA', 'Ubaitaba');

INSERT INTO `tb_cidades` VALUES (1083, 05, 'BA', 'Ubata');

INSERT INTO `tb_cidades` VALUES (1084, 05, 'BA', 'Ubiracaba');

INSERT INTO `tb_cidades` VALUES (1085, 05, 'BA', 'Ubiraita');

INSERT INTO `tb_cidades` VALUES (1086, 05, 'BA', 'Uibai');

INSERT INTO `tb_cidades` VALUES (1087, 05, 'BA', 'Umburanas');

INSERT INTO `tb_cidades` VALUES (1088, 05, 'BA', 'Umbuzeiro');

INSERT INTO `tb_cidades` VALUES (1089, 05, 'BA', 'Una');

INSERT INTO `tb_cidades` VALUES (1090, 05, 'BA', 'Urandi');

INSERT INTO `tb_cidades` VALUES (1091, 05, 'BA', 'Urucuca');

INSERT INTO `tb_cidades` VALUES (1092, 05, 'BA', 'Utinga');

INSERT INTO `tb_cidades` VALUES (1093, 05, 'BA', 'Vale Verde');

INSERT INTO `tb_cidades` VALUES (1094, 05, 'BA', 'Valenca');

INSERT INTO `tb_cidades` VALUES (1095, 05, 'BA', 'Valente');

INSERT INTO `tb_cidades` VALUES (1096, 05, 'BA', 'Varzea da Roca');

INSERT INTO `tb_cidades` VALUES (1097, 05, 'BA', 'Varzea do Caldas');

INSERT INTO `tb_cidades` VALUES (1098, 05, 'BA', 'Varzea do Cerco');

INSERT INTO `tb_cidades` VALUES (1099, 05, 'BA', 'Varzea do Poco');

INSERT INTO `tb_cidades` VALUES (1100, 05, 'BA', 'Varzea Nova');

INSERT INTO `tb_cidades` VALUES (1101, 05, 'BA', 'Varzeas');

INSERT INTO `tb_cidades` VALUES (1102, 05, 'BA', 'Varzedo');

INSERT INTO `tb_cidades` VALUES (1103, 05, 'BA', 'Velha Boipeba');

INSERT INTO `tb_cidades` VALUES (1104, 05, 'BA', 'Ventura');

INSERT INTO `tb_cidades` VALUES (1105, 05, 'BA', 'Vera Cruz');

INSERT INTO `tb_cidades` VALUES (1106, 05, 'BA', 'Vereda');

INSERT INTO `tb_cidades` VALUES (1107, 05, 'BA', 'Vila do Cafe');

INSERT INTO `tb_cidades` VALUES (1108, 05, 'BA', 'Vitoria da Conquista');

INSERT INTO `tb_cidades` VALUES (1109, 05, 'BA', 'Volta Grande');

INSERT INTO `tb_cidades` VALUES (1110, 05, 'BA', 'Wagner');

INSERT INTO `tb_cidades` VALUES (1111, 05, 'BA', 'Wanderley');

INSERT INTO `tb_cidades` VALUES (1112, 05, 'BA', 'Wenceslau Guimaraes');

INSERT INTO `tb_cidades` VALUES (1113, 05, 'BA', 'Xique-xique');

INSERT INTO `tb_cidades` VALUES (1114, 06, 'CE', 'Abaiara');

INSERT INTO `tb_cidades` VALUES (1115, 06, 'CE', 'Abilio Martins');

INSERT INTO `tb_cidades` VALUES (1116, 06, 'CE', 'Acarape');

INSERT INTO `tb_cidades` VALUES (1117, 06, 'CE', 'Acarau');

INSERT INTO `tb_cidades` VALUES (1118, 06, 'CE', 'Acopiara');

INSERT INTO `tb_cidades` VALUES (1119, 06, 'CE', 'Adrianopolis');

INSERT INTO `tb_cidades` VALUES (1120, 06, 'CE', 'Agua Verde');

INSERT INTO `tb_cidades` VALUES (1121, 06, 'CE', 'Aguai');

INSERT INTO `tb_cidades` VALUES (1122, 06, 'CE', 'Aiua');

INSERT INTO `tb_cidades` VALUES (1123, 06, 'CE', 'Aiuaba');

INSERT INTO `tb_cidades` VALUES (1124, 06, 'CE', 'Alagoinha');

INSERT INTO `tb_cidades` VALUES (1125, 06, 'CE', 'Alcantaras');

INSERT INTO `tb_cidades` VALUES (1126, 06, 'CE', 'Algodoes');

INSERT INTO `tb_cidades` VALUES (1127, 06, 'CE', 'Almofala');

INSERT INTO `tb_cidades` VALUES (1128, 06, 'CE', 'Altaneira');

INSERT INTO `tb_cidades` VALUES (1129, 06, 'CE', 'Alto Santo');

INSERT INTO `tb_cidades` VALUES (1130, 06, 'CE', 'Amanaiara');

INSERT INTO `tb_cidades` VALUES (1131, 06, 'CE', 'Amanari');

INSERT INTO `tb_cidades` VALUES (1132, 06, 'CE', 'Amaniutuba');

INSERT INTO `tb_cidades` VALUES (1133, 06, 'CE', 'Amarelas');

INSERT INTO `tb_cidades` VALUES (1134, 06, 'CE', 'Amaro');

INSERT INTO `tb_cidades` VALUES (1135, 06, 'CE', 'America');

INSERT INTO `tb_cidades` VALUES (1136, 06, 'CE', 'Amontada');

INSERT INTO `tb_cidades` VALUES (1137, 06, 'CE', 'Anaua');

INSERT INTO `tb_cidades` VALUES (1138, 06, 'CE', 'Aningas');

INSERT INTO `tb_cidades` VALUES (1139, 06, 'CE', 'Anjinhos');

INSERT INTO `tb_cidades` VALUES (1140, 06, 'CE', 'Antonina do Norte');

INSERT INTO `tb_cidades` VALUES (1141, 06, 'CE', 'Antonio Bezerra');

INSERT INTO `tb_cidades` VALUES (1142, 06, 'CE', 'Antonio Diogo');

INSERT INTO `tb_cidades` VALUES (1143, 06, 'CE', 'Antonio Marques');

INSERT INTO `tb_cidades` VALUES (1144, 06, 'CE', 'Aprazivel');

INSERT INTO `tb_cidades` VALUES (1145, 06, 'CE', 'Apuiares');

INSERT INTO `tb_cidades` VALUES (1146, 06, 'CE', 'Aquinopolis');

INSERT INTO `tb_cidades` VALUES (1147, 06, 'CE', 'Aquiraz');

INSERT INTO `tb_cidades` VALUES (1148, 06, 'CE', 'Aracas');

INSERT INTO `tb_cidades` VALUES (1149, 06, 'CE', 'Aracati');

INSERT INTO `tb_cidades` VALUES (1150, 06, 'CE', 'Aracatiacu');

INSERT INTO `tb_cidades` VALUES (1151, 06, 'CE', 'Aracatiara');

INSERT INTO `tb_cidades` VALUES (1152, 06, 'CE', 'Aracoiaba');

INSERT INTO `tb_cidades` VALUES (1153, 06, 'CE', 'Arajara');

INSERT INTO `tb_cidades` VALUES (1154, 06, 'CE', 'Aranau');

INSERT INTO `tb_cidades` VALUES (1155, 06, 'CE', 'Arapa');

INSERT INTO `tb_cidades` VALUES (1156, 06, 'CE', 'Arapari');

INSERT INTO `tb_cidades` VALUES (1157, 06, 'CE', 'Araporanga');

INSERT INTO `tb_cidades` VALUES (1158, 06, 'CE', 'Araquem');

INSERT INTO `tb_cidades` VALUES (1159, 06, 'CE', 'Ararenda');

INSERT INTO `tb_cidades` VALUES (1160, 06, 'CE', 'Araripe');

INSERT INTO `tb_cidades` VALUES (1161, 06, 'CE', 'Ararius');

INSERT INTO `tb_cidades` VALUES (1162, 06, 'CE', 'Aratama');

INSERT INTO `tb_cidades` VALUES (1163, 06, 'CE', 'Araticum');

INSERT INTO `tb_cidades` VALUES (1164, 06, 'CE', 'Aratuba');

INSERT INTO `tb_cidades` VALUES (1165, 06, 'CE', 'Areial');

INSERT INTO `tb_cidades` VALUES (1166, 06, 'CE', 'Ariscos dos Marianos');

INSERT INTO `tb_cidades` VALUES (1167, 06, 'CE', 'Arneiroz');

INSERT INTO `tb_cidades` VALUES (1168, 06, 'CE', 'Aroeiras');

INSERT INTO `tb_cidades` VALUES (1169, 06, 'CE', 'Arrojado');

INSERT INTO `tb_cidades` VALUES (1170, 06, 'CE', 'Aruaru');

INSERT INTO `tb_cidades` VALUES (1171, 06, 'CE', 'Assare');

INSERT INTO `tb_cidades` VALUES (1172, 06, 'CE', 'Assuncao');

INSERT INTO `tb_cidades` VALUES (1173, 06, 'CE', 'Aurora');

INSERT INTO `tb_cidades` VALUES (1174, 06, 'CE', 'Baixa Grande');

INSERT INTO `tb_cidades` VALUES (1175, 06, 'CE', 'Baixio');

INSERT INTO `tb_cidades` VALUES (1176, 06, 'CE', 'Baixio da Donana');

INSERT INTO `tb_cidades` VALUES (1177, 06, 'CE', 'Banabuiu');

INSERT INTO `tb_cidades` VALUES (1178, 06, 'CE', 'Bandeira');

INSERT INTO `tb_cidades` VALUES (1179, 06, 'CE', 'Barao de Aquiraz');

INSERT INTO `tb_cidades` VALUES (1180, 06, 'CE', 'Barbalha');

INSERT INTO `tb_cidades` VALUES (1181, 06, 'CE', 'Barra');

INSERT INTO `tb_cidades` VALUES (1182, 06, 'CE', 'Barra do Sotero');

INSERT INTO `tb_cidades` VALUES (1183, 06, 'CE', 'Barra Nova');

INSERT INTO `tb_cidades` VALUES (1184, 06, 'CE', 'Barreira');

INSERT INTO `tb_cidades` VALUES (1185, 06, 'CE', 'Barreira dos Vianas');

INSERT INTO `tb_cidades` VALUES (1186, 06, 'CE', 'Barreiras');

INSERT INTO `tb_cidades` VALUES (1187, 06, 'CE', 'Barreiros');

INSERT INTO `tb_cidades` VALUES (1188, 06, 'CE', 'Barrento');

INSERT INTO `tb_cidades` VALUES (1189, 06, 'CE', 'Barro');

INSERT INTO `tb_cidades` VALUES (1190, 06, 'CE', 'Barro Alto');

INSERT INTO `tb_cidades` VALUES (1191, 06, 'CE', 'Barroquinha');

INSERT INTO `tb_cidades` VALUES (1192, 06, 'CE', 'Baturite');

INSERT INTO `tb_cidades` VALUES (1193, 06, 'CE', 'Bau');

INSERT INTO `tb_cidades` VALUES (1194, 06, 'CE', 'Beberibe');

INSERT INTO `tb_cidades` VALUES (1195, 06, 'CE', 'Bela Cruz');

INSERT INTO `tb_cidades` VALUES (1196, 06, 'CE', 'Bela Vista');

INSERT INTO `tb_cidades` VALUES (1197, 06, 'CE', 'Betania');

INSERT INTO `tb_cidades` VALUES (1198, 06, 'CE', 'Bitupita');

INSERT INTO `tb_cidades` VALUES (1199, 06, 'CE', 'Bixopa');

INSERT INTO `tb_cidades` VALUES (1200, 06, 'CE', 'Boa Agua');

INSERT INTO `tb_cidades` VALUES (1201, 06, 'CE', 'Boa Esperanca');

INSERT INTO `tb_cidades` VALUES (1202, 06, 'CE', 'Boa Viagem');

INSERT INTO `tb_cidades` VALUES (1203, 06, 'CE', 'Boa Vista');

INSERT INTO `tb_cidades` VALUES (1204, 06, 'CE', 'Boa Vista do Caxitore');

INSERT INTO `tb_cidades` VALUES (1205, 06, 'CE', 'Bonfim');

INSERT INTO `tb_cidades` VALUES (1206, 06, 'CE', 'Bonhu');

INSERT INTO `tb_cidades` VALUES (1207, 06, 'CE', 'Bonito');

INSERT INTO `tb_cidades` VALUES (1208, 06, 'CE', 'Borges');

INSERT INTO `tb_cidades` VALUES (1209, 06, 'CE', 'Brejinho');

INSERT INTO `tb_cidades` VALUES (1210, 06, 'CE', 'Brejo Grande');

INSERT INTO `tb_cidades` VALUES (1211, 06, 'CE', 'Brejo Santo');

INSERT INTO `tb_cidades` VALUES (1212, 06, 'CE', 'Brotas');

INSERT INTO `tb_cidades` VALUES (1213, 06, 'CE', 'Buritizal');

INSERT INTO `tb_cidades` VALUES (1214, 06, 'CE', 'Buritizinho');

INSERT INTO `tb_cidades` VALUES (1215, 06, 'CE', 'Cabreiro');

INSERT INTO `tb_cidades` VALUES (1216, 06, 'CE', 'Cachoeira');

INSERT INTO `tb_cidades` VALUES (1217, 06, 'CE', 'Cachoeira Grande');

INSERT INTO `tb_cidades` VALUES (1218, 06, 'CE', 'Caicara');

INSERT INTO `tb_cidades` VALUES (1219, 06, 'CE', 'Caicarinha');

INSERT INTO `tb_cidades` VALUES (1220, 06, 'CE', 'Caio Prado');

INSERT INTO `tb_cidades` VALUES (1221, 06, 'CE', 'Caioca');

INSERT INTO `tb_cidades` VALUES (1222, 06, 'CE', 'Caipu');

INSERT INTO `tb_cidades` VALUES (1223, 06, 'CE', 'Calabaca');

INSERT INTO `tb_cidades` VALUES (1224, 06, 'CE', 'Caldeirao');

INSERT INTO `tb_cidades` VALUES (1225, 06, 'CE', 'California');

INSERT INTO `tb_cidades` VALUES (1226, 06, 'CE', 'Camara');

INSERT INTO `tb_cidades` VALUES (1227, 06, 'CE', 'Camboas');

INSERT INTO `tb_cidades` VALUES (1228, 06, 'CE', 'Camilos');

INSERT INTO `tb_cidades` VALUES (1229, 06, 'CE', 'Camocim');

INSERT INTO `tb_cidades` VALUES (1230, 06, 'CE', 'Campanario');

INSERT INTO `tb_cidades` VALUES (1231, 06, 'CE', 'Campestre');

INSERT INTO `tb_cidades` VALUES (1232, 06, 'CE', 'Campos Sales');

INSERT INTO `tb_cidades` VALUES (1233, 06, 'CE', 'Canaan');

INSERT INTO `tb_cidades` VALUES (1234, 06, 'CE', 'Canafistula');

INSERT INTO `tb_cidades` VALUES (1235, 06, 'CE', 'Cangati');

INSERT INTO `tb_cidades` VALUES (1236, 06, 'CE', 'Caninde');

INSERT INTO `tb_cidades` VALUES (1237, 06, 'CE', 'Canindezinho');

INSERT INTO `tb_cidades` VALUES (1238, 06, 'CE', 'Capistrano');

INSERT INTO `tb_cidades` VALUES (1239, 06, 'CE', 'Caponga');

INSERT INTO `tb_cidades` VALUES (1240, 06, 'CE', 'Caponga da Bernarda');

INSERT INTO `tb_cidades` VALUES (1241, 06, 'CE', 'Caracara');

INSERT INTO `tb_cidades` VALUES (1242, 06, 'CE', 'Caridade');

INSERT INTO `tb_cidades` VALUES (1243, 06, 'CE', 'Carire');

INSERT INTO `tb_cidades` VALUES (1244, 06, 'CE', 'Caririacu');

INSERT INTO `tb_cidades` VALUES (1245, 06, 'CE', 'Carius');

INSERT INTO `tb_cidades` VALUES (1246, 06, 'CE', 'Cariutaba');

INSERT INTO `tb_cidades` VALUES (1247, 06, 'CE', 'Carmelopolis');

INSERT INTO `tb_cidades` VALUES (1248, 06, 'CE', 'Carnaubal');

INSERT INTO `tb_cidades` VALUES (1249, 06, 'CE', 'Carnaubas');

INSERT INTO `tb_cidades` VALUES (1250, 06, 'CE', 'Carnaubinha');

INSERT INTO `tb_cidades` VALUES (1251, 06, 'CE', 'Carquejo');

INSERT INTO `tb_cidades` VALUES (1252, 06, 'CE', 'Carrapateiras');

INSERT INTO `tb_cidades` VALUES (1253, 06, 'CE', 'Caruatai');

INSERT INTO `tb_cidades` VALUES (1254, 06, 'CE', 'Carvalho');

INSERT INTO `tb_cidades` VALUES (1255, 06, 'CE', 'Carvoeiro');

INSERT INTO `tb_cidades` VALUES (1256, 06, 'CE', 'Cascavel');

INSERT INTO `tb_cidades` VALUES (1257, 06, 'CE', 'Castanhao');

INSERT INTO `tb_cidades` VALUES (1258, 06, 'CE', 'Catarina');

INSERT INTO `tb_cidades` VALUES (1259, 06, 'CE', 'Catole');

INSERT INTO `tb_cidades` VALUES (1260, 06, 'CE', 'Catuana');

INSERT INTO `tb_cidades` VALUES (1261, 06, 'CE', 'Catunda');

INSERT INTO `tb_cidades` VALUES (1262, 06, 'CE', 'Caucaia');

INSERT INTO `tb_cidades` VALUES (1263, 06, 'CE', 'Caxitore');

INSERT INTO `tb_cidades` VALUES (1264, 06, 'CE', 'Cedro');

INSERT INTO `tb_cidades` VALUES (1265, 06, 'CE', 'Cemoaba');

INSERT INTO `tb_cidades` VALUES (1266, 06, 'CE', 'Chaval');

INSERT INTO `tb_cidades` VALUES (1267, 06, 'CE', 'Choro');

INSERT INTO `tb_cidades` VALUES (1268, 06, 'CE', 'Chorozinho');

INSERT INTO `tb_cidades` VALUES (1269, 06, 'CE', 'Cipo dos Anjos');

INSERT INTO `tb_cidades` VALUES (1270, 06, 'CE', 'Cococi');

INSERT INTO `tb_cidades` VALUES (1271, 06, 'CE', 'Codia');

INSERT INTO `tb_cidades` VALUES (1272, 06, 'CE', 'Coite');

INSERT INTO `tb_cidades` VALUES (1273, 06, 'CE', 'Colina');

INSERT INTO `tb_cidades` VALUES (1274, 06, 'CE', 'Conceicao');

INSERT INTO `tb_cidades` VALUES (1275, 06, 'CE', 'Coreau');

INSERT INTO `tb_cidades` VALUES (1276, 06, 'CE', 'Corrego dos Fernandes');

INSERT INTO `tb_cidades` VALUES (1277, 06, 'CE', 'Crateus');

INSERT INTO `tb_cidades` VALUES (1278, 06, 'CE', 'Crato');

INSERT INTO `tb_cidades` VALUES (1279, 06, 'CE', 'Crioulos');

INSERT INTO `tb_cidades` VALUES (1280, 06, 'CE', 'Cristais');

INSERT INTO `tb_cidades` VALUES (1281, 06, 'CE', 'Croata');

INSERT INTO `tb_cidades` VALUES (1282, 06, 'CE', 'Cruxati');

INSERT INTO `tb_cidades` VALUES (1283, 06, 'CE', 'Cruz');

INSERT INTO `tb_cidades` VALUES (1284, 06, 'CE', 'Cruz de Pedra');

INSERT INTO `tb_cidades` VALUES (1285, 06, 'CE', 'Cruzeirinho');

INSERT INTO `tb_cidades` VALUES (1286, 06, 'CE', 'Cuncas');

INSERT INTO `tb_cidades` VALUES (1287, 06, 'CE', 'Curatis');

INSERT INTO `tb_cidades` VALUES (1288, 06, 'CE', 'Curupira');

INSERT INTO `tb_cidades` VALUES (1289, 06, 'CE', 'Custodio');

INSERT INTO `tb_cidades` VALUES (1290, 06, 'CE', 'Daniel de Queiros');

INSERT INTO `tb_cidades` VALUES (1291, 06, 'CE', 'Delmiro Gouveia');

INSERT INTO `tb_cidades` VALUES (1292, 06, 'CE', 'Deputado Irapuan Pinheiro');

INSERT INTO `tb_cidades` VALUES (1293, 06, 'CE', 'Deserto');

INSERT INTO `tb_cidades` VALUES (1294, 06, 'CE', 'Dom Leme');

INSERT INTO `tb_cidades` VALUES (1295, 06, 'CE', 'Dom Mauricio');

INSERT INTO `tb_cidades` VALUES (1296, 06, 'CE', 'Dom Quintino');

INSERT INTO `tb_cidades` VALUES (1297, 06, 'CE', 'Domingos da Costa');

INSERT INTO `tb_cidades` VALUES (1298, 06, 'CE', 'Donato');

INSERT INTO `tb_cidades` VALUES (1299, 06, 'CE', 'Dourados');

INSERT INTO `tb_cidades` VALUES (1300, 06, 'CE', 'Ebron');

INSERT INTO `tb_cidades` VALUES (1301, 06, 'CE', 'Ema');

INSERT INTO `tb_cidades` VALUES (1302, 06, 'CE', 'Ematuba');

INSERT INTO `tb_cidades` VALUES (1303, 06, 'CE', 'Encantado');

INSERT INTO `tb_cidades` VALUES (1304, 06, 'CE', 'Engenheiro Joao Tome');

INSERT INTO `tb_cidades` VALUES (1305, 06, 'CE', 'Engenheiro Jose Lopes');

INSERT INTO `tb_cidades` VALUES (1306, 06, 'CE', 'Engenho Velho');

INSERT INTO `tb_cidades` VALUES (1307, 06, 'CE', 'Erere');

INSERT INTO `tb_cidades` VALUES (1308, 06, 'CE', 'Espacinha');

INSERT INTO `tb_cidades` VALUES (1309, 06, 'CE', 'Esperanca');

INSERT INTO `tb_cidades` VALUES (1310, 06, 'CE', 'Espinho');

INSERT INTO `tb_cidades` VALUES (1311, 06, 'CE', 'Eusebio');

INSERT INTO `tb_cidades` VALUES (1312, 06, 'CE', 'Farias Brito');

INSERT INTO `tb_cidades` VALUES (1313, 06, 'CE', 'Fatima');

INSERT INTO `tb_cidades` VALUES (1314, 06, 'CE', 'Feiticeiro');

INSERT INTO `tb_cidades` VALUES (1315, 06, 'CE', 'Feitosa');

INSERT INTO `tb_cidades` VALUES (1316, 06, 'CE', 'Felizardo');

INSERT INTO `tb_cidades` VALUES (1317, 06, 'CE', 'Flamengo');

INSERT INTO `tb_cidades` VALUES (1318, 06, 'CE', 'Flores');

INSERT INTO `tb_cidades` VALUES (1319, 06, 'CE', 'Forquilha');

INSERT INTO `tb_cidades` VALUES (1320, 06, 'CE', 'Fortaleza');

INSERT INTO `tb_cidades` VALUES (1321, 06, 'CE', 'Fortim');

INSERT INTO `tb_cidades` VALUES (1322, 06, 'CE', 'Frecheirinha');

INSERT INTO `tb_cidades` VALUES (1323, 06, 'CE', 'Gado');

INSERT INTO `tb_cidades` VALUES (1324, 06, 'CE', 'Gado dos Rodrigues');

INSERT INTO `tb_cidades` VALUES (1325, 06, 'CE', 'Gameleira de Sao Sebastiao');

INSERT INTO `tb_cidades` VALUES (1326, 06, 'CE', 'Garcas');

INSERT INTO `tb_cidades` VALUES (1327, 06, 'CE', 'Gazea');

INSERT INTO `tb_cidades` VALUES (1328, 06, 'CE', 'General Sampaio');

INSERT INTO `tb_cidades` VALUES (1329, 06, 'CE', 'General Tiburcio');

INSERT INTO `tb_cidades` VALUES (1330, 06, 'CE', 'Genipapeiro');

INSERT INTO `tb_cidades` VALUES (1331, 06, 'CE', 'Gererau');

INSERT INTO `tb_cidades` VALUES (1332, 06, 'CE', 'Giqui');

INSERT INTO `tb_cidades` VALUES (1333, 06, 'CE', 'Girau');

INSERT INTO `tb_cidades` VALUES (1334, 06, 'CE', 'Graca');

INSERT INTO `tb_cidades` VALUES (1335, 06, 'CE', 'Granja');

INSERT INTO `tb_cidades` VALUES (1336, 06, 'CE', 'Granjeiro');

INSERT INTO `tb_cidades` VALUES (1337, 06, 'CE', 'Groairas');

INSERT INTO `tb_cidades` VALUES (1338, 06, 'CE', 'Guaiuba');

INSERT INTO `tb_cidades` VALUES (1339, 06, 'CE', 'Guajiru');

INSERT INTO `tb_cidades` VALUES (1340, 06, 'CE', 'Guanaces');

INSERT INTO `tb_cidades` VALUES (1341, 06, 'CE', 'Guaraciaba do Norte');

INSERT INTO `tb_cidades` VALUES (1342, 06, 'CE', 'Guaramiranga');

INSERT INTO `tb_cidades` VALUES (1343, 06, 'CE', 'Guararu');

INSERT INTO `tb_cidades` VALUES (1344, 06, 'CE', 'Guassi');

INSERT INTO `tb_cidades` VALUES (1345, 06, 'CE', 'Guassosse');

INSERT INTO `tb_cidades` VALUES (1346, 06, 'CE', 'Guia');

INSERT INTO `tb_cidades` VALUES (1347, 06, 'CE', 'Guriu');

INSERT INTO `tb_cidades` VALUES (1348, 06, 'CE', 'Hidrolandia');

INSERT INTO `tb_cidades` VALUES (1349, 06, 'CE', 'Holanda');

INSERT INTO `tb_cidades` VALUES (1350, 06, 'CE', 'Horizonte');

INSERT INTO `tb_cidades` VALUES (1351, 06, 'CE', 'Iapi');

INSERT INTO `tb_cidades` VALUES (1352, 06, 'CE', 'Iara');

INSERT INTO `tb_cidades` VALUES (1353, 06, 'CE', 'Ibaretama');

INSERT INTO `tb_cidades` VALUES (1354, 06, 'CE', 'Ibiapaba');

INSERT INTO `tb_cidades` VALUES (1355, 06, 'CE', 'Ibiapina');

INSERT INTO `tb_cidades` VALUES (1356, 06, 'CE', 'Ibicatu');

INSERT INTO `tb_cidades` VALUES (1357, 06, 'CE', 'Ibicua');

INSERT INTO `tb_cidades` VALUES (1358, 06, 'CE', 'Ibicuitaba');

INSERT INTO `tb_cidades` VALUES (1359, 06, 'CE', 'Ibicuitinga');

INSERT INTO `tb_cidades` VALUES (1360, 06, 'CE', 'Iborepi');

INSERT INTO `tb_cidades` VALUES (1361, 06, 'CE', 'Ibuacu');

INSERT INTO `tb_cidades` VALUES (1362, 06, 'CE', 'Ibuguacu');

INSERT INTO `tb_cidades` VALUES (1363, 06, 'CE', 'Icapui');

INSERT INTO `tb_cidades` VALUES (1364, 06, 'CE', 'Icarai');

INSERT INTO `tb_cidades` VALUES (1365, 06, 'CE', 'Ico');

INSERT INTO `tb_cidades` VALUES (1366, 06, 'CE', 'Icozinho');

INSERT INTO `tb_cidades` VALUES (1367, 06, 'CE', 'Ideal');

INSERT INTO `tb_cidades` VALUES (1368, 06, 'CE', 'Igaroi');

INSERT INTO `tb_cidades` VALUES (1369, 06, 'CE', 'Iguatu');

INSERT INTO `tb_cidades` VALUES (1370, 06, 'CE', 'Independencia');

INSERT INTO `tb_cidades` VALUES (1371, 06, 'CE', 'Ingazeiras');

INSERT INTO `tb_cidades` VALUES (1372, 06, 'CE', 'Inhamuns');

INSERT INTO `tb_cidades` VALUES (1373, 06, 'CE', 'Inhucu');

INSERT INTO `tb_cidades` VALUES (1374, 06, 'CE', 'Inhuporanga');

INSERT INTO `tb_cidades` VALUES (1375, 06, 'CE', 'Ipaporanga');

INSERT INTO `tb_cidades` VALUES (1376, 06, 'CE', 'Ipaumirim');

INSERT INTO `tb_cidades` VALUES (1377, 06, 'CE', 'Ipu');

INSERT INTO `tb_cidades` VALUES (1378, 06, 'CE', 'Ipueiras');

INSERT INTO `tb_cidades` VALUES (1379, 06, 'CE', 'Ipueiras dos Gomes');

INSERT INTO `tb_cidades` VALUES (1380, 06, 'CE', 'Iracema');

INSERT INTO `tb_cidades` VALUES (1381, 06, 'CE', 'Iraja');

INSERT INTO `tb_cidades` VALUES (1382, 06, 'CE', 'Irapua');

INSERT INTO `tb_cidades` VALUES (1383, 06, 'CE', 'Iratinga');

INSERT INTO `tb_cidades` VALUES (1384, 06, 'CE', 'Iraucuba');

INSERT INTO `tb_cidades` VALUES (1385, 06, 'CE', 'Isidoro');

INSERT INTO `tb_cidades` VALUES (1386, 06, 'CE', 'Itacima');

INSERT INTO `tb_cidades` VALUES (1387, 06, 'CE', 'Itagua');

INSERT INTO `tb_cidades` VALUES (1388, 06, 'CE', 'Itaicaba');

INSERT INTO `tb_cidades` VALUES (1389, 06, 'CE', 'Itaipaba');

INSERT INTO `tb_cidades` VALUES (1390, 06, 'CE', 'Itaitinga');

INSERT INTO `tb_cidades` VALUES (1391, 06, 'CE', 'Itans');

INSERT INTO `tb_cidades` VALUES (1392, 06, 'CE', 'Itapage');

INSERT INTO `tb_cidades` VALUES (1393, 06, 'CE', 'Itapebussu');

INSERT INTO `tb_cidades` VALUES (1394, 06, 'CE', 'Itapeim');

INSERT INTO `tb_cidades` VALUES (1395, 06, 'CE', 'Itapipoca');

INSERT INTO `tb_cidades` VALUES (1396, 06, 'CE', 'Itapiuna');

INSERT INTO `tb_cidades` VALUES (1397, 06, 'CE', 'Itapo');

INSERT INTO `tb_cidades` VALUES (1398, 06, 'CE', 'Itarema');

INSERT INTO `tb_cidades` VALUES (1399, 06, 'CE', 'Itatira');

INSERT INTO `tb_cidades` VALUES (1400, 06, 'CE', 'Jaburuna');

INSERT INTO `tb_cidades` VALUES (1401, 06, 'CE', 'Jacampari');

INSERT INTO `tb_cidades` VALUES (1402, 06, 'CE', 'Jacarecoara');

INSERT INTO `tb_cidades` VALUES (1403, 06, 'CE', 'Jacauna');

INSERT INTO `tb_cidades` VALUES (1404, 06, 'CE', 'Jaguarao');

INSERT INTO `tb_cidades` VALUES (1405, 06, 'CE', 'Jaguaretama');

INSERT INTO `tb_cidades` VALUES (1406, 06, 'CE', 'Jaguaribara');

INSERT INTO `tb_cidades` VALUES (1407, 06, 'CE', 'Jaguaribe');

INSERT INTO `tb_cidades` VALUES (1408, 06, 'CE', 'Jaguaruana');

INSERT INTO `tb_cidades` VALUES (1409, 06, 'CE', 'Jaibaras');

INSERT INTO `tb_cidades` VALUES (1410, 06, 'CE', 'Jamacaru');

INSERT INTO `tb_cidades` VALUES (1411, 06, 'CE', 'Jandrangoeira');

INSERT INTO `tb_cidades` VALUES (1412, 06, 'CE', 'Jardim');

INSERT INTO `tb_cidades` VALUES (1413, 06, 'CE', 'Jardimirim');

INSERT INTO `tb_cidades` VALUES (1414, 06, 'CE', 'Jati');

INSERT INTO `tb_cidades` VALUES (1415, 06, 'CE', 'Jijoca de Jericoacoara');

INSERT INTO `tb_cidades` VALUES (1416, 06, 'CE', 'Joao Cordeiro');

INSERT INTO `tb_cidades` VALUES (1417, 06, 'CE', 'Jordao');

INSERT INTO `tb_cidades` VALUES (1418, 06, 'CE', 'Jose de Alencar');

INSERT INTO `tb_cidades` VALUES (1419, 06, 'CE', 'Jua');

INSERT INTO `tb_cidades` VALUES (1420, 06, 'CE', 'Juatama');

INSERT INTO `tb_cidades` VALUES (1421, 06, 'CE', 'Juazeiro de Baixo');

INSERT INTO `tb_cidades` VALUES (1422, 06, 'CE', 'Juazeiro do Norte');

INSERT INTO `tb_cidades` VALUES (1423, 06, 'CE', 'Jubaia');

INSERT INTO `tb_cidades` VALUES (1424, 06, 'CE', 'Jucas');

INSERT INTO `tb_cidades` VALUES (1425, 06, 'CE', 'Jurema');

INSERT INTO `tb_cidades` VALUES (1426, 06, 'CE', 'Justiniano Serpa');

INSERT INTO `tb_cidades` VALUES (1427, 06, 'CE', 'Lacerda');

INSERT INTO `tb_cidades` VALUES (1428, 06, 'CE', 'Ladeira Grande');

INSERT INTO `tb_cidades` VALUES (1429, 06, 'CE', 'Lagoa de Sao Jose');

INSERT INTO `tb_cidades` VALUES (1430, 06, 'CE', 'Lagoa do Juvenal');

INSERT INTO `tb_cidades` VALUES (1431, 06, 'CE', 'Lagoa do Mato');

INSERT INTO `tb_cidades` VALUES (1432, 06, 'CE', 'Lagoa dos Crioulos');

INSERT INTO `tb_cidades` VALUES (1433, 06, 'CE', 'Lagoa Grande');

INSERT INTO `tb_cidades` VALUES (1434, 06, 'CE', 'Lagoinha');

INSERT INTO `tb_cidades` VALUES (1435, 06, 'CE', 'Lambedouro');

INSERT INTO `tb_cidades` VALUES (1436, 06, 'CE', 'Lameiro');

INSERT INTO `tb_cidades` VALUES (1437, 06, 'CE', 'Lavras da Mangabeira');

INSERT INTO `tb_cidades` VALUES (1438, 06, 'CE', 'Lima Campos');

INSERT INTO `tb_cidades` VALUES (1439, 06, 'CE', 'Limoeiro do Norte');

INSERT INTO `tb_cidades` VALUES (1440, 06, 'CE', 'Lisieux');

INSERT INTO `tb_cidades` VALUES (1441, 06, 'CE', 'Livramento');

INSERT INTO `tb_cidades` VALUES (1442, 06, 'CE', 'Logradouro');

INSERT INTO `tb_cidades` VALUES (1443, 06, 'CE', 'Macambira');

INSERT INTO `tb_cidades` VALUES (1444, 06, 'CE', 'Macaoca');

INSERT INTO `tb_cidades` VALUES (1445, 06, 'CE', 'Macarau');

INSERT INTO `tb_cidades` VALUES (1446, 06, 'CE', 'Maceio');

INSERT INTO `tb_cidades` VALUES (1447, 06, 'CE', 'Madalena');

INSERT INTO `tb_cidades` VALUES (1448, 06, 'CE', 'Major Simplicio');

INSERT INTO `tb_cidades` VALUES (1449, 06, 'CE', 'Majorlandia');

INSERT INTO `tb_cidades` VALUES (1450, 06, 'CE', 'Malhada Grande');

INSERT INTO `tb_cidades` VALUES (1451, 06, 'CE', 'Mangabeira');

INSERT INTO `tb_cidades` VALUES (1452, 06, 'CE', 'Manibu');

INSERT INTO `tb_cidades` VALUES (1453, 06, 'CE', 'Manituba');

INSERT INTO `tb_cidades` VALUES (1454, 06, 'CE', 'Mapua');

INSERT INTO `tb_cidades` VALUES (1455, 06, 'CE', 'Maracanau');

INSERT INTO `tb_cidades` VALUES (1456, 06, 'CE', 'Maragua');

INSERT INTO `tb_cidades` VALUES (1457, 06, 'CE', 'Maranguape');

INSERT INTO `tb_cidades` VALUES (1458, 06, 'CE', 'Mararupa');

INSERT INTO `tb_cidades` VALUES (1459, 06, 'CE', 'Marco');

INSERT INTO `tb_cidades` VALUES (1460, 06, 'CE', 'Marinheiros');

INSERT INTO `tb_cidades` VALUES (1461, 06, 'CE', 'Marrecas');

INSERT INTO `tb_cidades` VALUES (1462, 06, 'CE', 'Marrocos');

INSERT INTO `tb_cidades` VALUES (1463, 06, 'CE', 'Marruas');

INSERT INTO `tb_cidades` VALUES (1464, 06, 'CE', 'Martinopole');

INSERT INTO `tb_cidades` VALUES (1465, 06, 'CE', 'Massape');

INSERT INTO `tb_cidades` VALUES (1466, 06, 'CE', 'Mata Fresca');

INSERT INTO `tb_cidades` VALUES (1467, 06, 'CE', 'Matias');

INSERT INTO `tb_cidades` VALUES (1468, 06, 'CE', 'Matriz');

INSERT INTO `tb_cidades` VALUES (1469, 06, 'CE', 'Mauriti');

INSERT INTO `tb_cidades` VALUES (1470, 06, 'CE', 'Mel');

INSERT INTO `tb_cidades` VALUES (1471, 06, 'CE', 'Meruoca');

INSERT INTO `tb_cidades` VALUES (1472, 06, 'CE', 'Messejana');

INSERT INTO `tb_cidades` VALUES (1473, 06, 'CE', 'Miguel Xavier');

INSERT INTO `tb_cidades` VALUES (1474, 06, 'CE', 'Milagres');

INSERT INTO `tb_cidades` VALUES (1475, 06, 'CE', 'Milha');

INSERT INTO `tb_cidades` VALUES (1476, 06, 'CE', 'Milton Belo');

INSERT INTO `tb_cidades` VALUES (1477, 06, 'CE', 'Mineirolandia');

INSERT INTO `tb_cidades` VALUES (1478, 06, 'CE', 'Miragem');

INSERT INTO `tb_cidades` VALUES (1479, 06, 'CE', 'Miraima');

INSERT INTO `tb_cidades` VALUES (1480, 06, 'CE', 'Mirambe');

INSERT INTO `tb_cidades` VALUES (1481, 06, 'CE', 'Missao Nova');

INSERT INTO `tb_cidades` VALUES (1482, 06, 'CE', 'Missao Velha');

INSERT INTO `tb_cidades` VALUES (1483, 06, 'CE', 'Missi');

INSERT INTO `tb_cidades` VALUES (1484, 06, 'CE', 'Moitas');

INSERT INTO `tb_cidades` VALUES (1485, 06, 'CE', 'Mombaca');

INSERT INTO `tb_cidades` VALUES (1486, 06, 'CE', 'Mondubim');

INSERT INTO `tb_cidades` VALUES (1487, 06, 'CE', 'Monguba');

INSERT INTO `tb_cidades` VALUES (1488, 06, 'CE', 'Monsenhor Tabosa');

INSERT INTO `tb_cidades` VALUES (1489, 06, 'CE', 'Monte Alegre');

INSERT INTO `tb_cidades` VALUES (1490, 06, 'CE', 'Monte Castelo');

INSERT INTO `tb_cidades` VALUES (1491, 06, 'CE', 'Monte Grave');

INSERT INTO `tb_cidades` VALUES (1492, 06, 'CE', 'Monte Sion');

INSERT INTO `tb_cidades` VALUES (1493, 06, 'CE', 'Montenebo');

INSERT INTO `tb_cidades` VALUES (1494, 06, 'CE', 'Morada Nova');

INSERT INTO `tb_cidades` VALUES (1495, 06, 'CE', 'Moraujo');

INSERT INTO `tb_cidades` VALUES (1496, 06, 'CE', 'Morrinhos');

INSERT INTO `tb_cidades` VALUES (1497, 06, 'CE', 'Morrinhos Novos');

INSERT INTO `tb_cidades` VALUES (1498, 06, 'CE', 'Morro Branco');

INSERT INTO `tb_cidades` VALUES (1499, 06, 'CE', 'Mucambo');

INSERT INTO `tb_cidades` VALUES (1500, 06, 'CE', 'Mulungu');

INSERT INTO `tb_cidades` VALUES (1501, 06, 'CE', 'Mumbaba');

INSERT INTO `tb_cidades` VALUES (1502, 06, 'CE', 'Mundau');

INSERT INTO `tb_cidades` VALUES (1503, 06, 'CE', 'Muribeca');

INSERT INTO `tb_cidades` VALUES (1504, 06, 'CE', 'Muriti');

INSERT INTO `tb_cidades` VALUES (1505, 06, 'CE', 'Mutambeiras');

INSERT INTO `tb_cidades` VALUES (1506, 06, 'CE', 'Naraniu');

INSERT INTO `tb_cidades` VALUES (1507, 06, 'CE', 'Nascente');

INSERT INTO `tb_cidades` VALUES (1508, 06, 'CE', 'Nenenlandia');

INSERT INTO `tb_cidades` VALUES (1509, 06, 'CE', 'Nossa Senhora do Livramento');

INSERT INTO `tb_cidades` VALUES (1510, 06, 'CE', 'Nova Betania');

INSERT INTO `tb_cidades` VALUES (1511, 06, 'CE', 'Nova Fatima');

INSERT INTO `tb_cidades` VALUES (1512, 06, 'CE', 'Nova Floresta');

INSERT INTO `tb_cidades` VALUES (1513, 06, 'CE', 'Nova Olinda');

INSERT INTO `tb_cidades` VALUES (1514, 06, 'CE', 'Nova Russas');

INSERT INTO `tb_cidades` VALUES (1515, 06, 'CE', 'Nova Vida');

INSERT INTO `tb_cidades` VALUES (1516, 06, 'CE', 'Novo Assis');

INSERT INTO `tb_cidades` VALUES (1517, 06, 'CE', 'Novo Oriente');

INSERT INTO `tb_cidades` VALUES (1518, 06, 'CE', 'Ocara');

INSERT INTO `tb_cidades` VALUES (1519, 06, 'CE', 'Oiticica');

INSERT INTO `tb_cidades` VALUES (1520, 06, 'CE', 'Olho-d''agua');

INSERT INTO `tb_cidades` VALUES (1521, 06, 'CE', 'Olho-d''agua Da Bica');

INSERT INTO `tb_cidades` VALUES (1522, 06, 'CE', 'Oliveiras');

INSERT INTO `tb_cidades` VALUES (1523, 06, 'CE', 'Oros');

INSERT INTO `tb_cidades` VALUES (1524, 06, 'CE', 'Pacajus');

INSERT INTO `tb_cidades` VALUES (1525, 06, 'CE', 'Pacatuba');

INSERT INTO `tb_cidades` VALUES (1526, 06, 'CE', 'Pacoti');

INSERT INTO `tb_cidades` VALUES (1527, 06, 'CE', 'Pacuja');

INSERT INTO `tb_cidades` VALUES (1528, 06, 'CE', 'Padre Cicero');

INSERT INTO `tb_cidades` VALUES (1529, 06, 'CE', 'Padre Linhares');

INSERT INTO `tb_cidades` VALUES (1530, 06, 'CE', 'Padre Vieira');

INSERT INTO `tb_cidades` VALUES (1531, 06, 'CE', 'Pajeu');

INSERT INTO `tb_cidades` VALUES (1532, 06, 'CE', 'Pajucara');

INSERT INTO `tb_cidades` VALUES (1533, 06, 'CE', 'Palestina');

INSERT INTO `tb_cidades` VALUES (1534, 06, 'CE', 'Palestina do Norte');

INSERT INTO `tb_cidades` VALUES (1535, 06, 'CE', 'Palhano');

INSERT INTO `tb_cidades` VALUES (1536, 06, 'CE', 'Palmacia');

INSERT INTO `tb_cidades` VALUES (1537, 06, 'CE', 'Palmatoria');

INSERT INTO `tb_cidades` VALUES (1538, 06, 'CE', 'Panacui');

INSERT INTO `tb_cidades` VALUES (1539, 06, 'CE', 'Paracua');

INSERT INTO `tb_cidades` VALUES (1540, 06, 'CE', 'Paracuru');

INSERT INTO `tb_cidades` VALUES (1541, 06, 'CE', 'Paraipaba');

INSERT INTO `tb_cidades` VALUES (1542, 06, 'CE', 'Parajuru');

INSERT INTO `tb_cidades` VALUES (1543, 06, 'CE', 'Parambu');

INSERT INTO `tb_cidades` VALUES (1544, 06, 'CE', 'Paramoti');

INSERT INTO `tb_cidades` VALUES (1545, 06, 'CE', 'Parangaba');

INSERT INTO `tb_cidades` VALUES (1546, 06, 'CE', 'Parapui');

INSERT INTO `tb_cidades` VALUES (1547, 06, 'CE', 'Parazinho');

INSERT INTO `tb_cidades` VALUES (1548, 06, 'CE', 'Paripueira');

INSERT INTO `tb_cidades` VALUES (1549, 06, 'CE', 'Passagem');

INSERT INTO `tb_cidades` VALUES (1550, 06, 'CE', 'Passagem Funda');

INSERT INTO `tb_cidades` VALUES (1551, 06, 'CE', 'Pasta');

INSERT INTO `tb_cidades` VALUES (1552, 06, 'CE', 'Patacas');

INSERT INTO `tb_cidades` VALUES (1553, 06, 'CE', 'Patriarca');

INSERT INTO `tb_cidades` VALUES (1554, 06, 'CE', 'Pavuna');

INSERT INTO `tb_cidades` VALUES (1555, 06, 'CE', 'Pecem');

INSERT INTO `tb_cidades` VALUES (1556, 06, 'CE', 'Pedra Branca');

INSERT INTO `tb_cidades` VALUES (1557, 06, 'CE', 'Pedras');

INSERT INTO `tb_cidades` VALUES (1558, 06, 'CE', 'Pedrinhas');

INSERT INTO `tb_cidades` VALUES (1559, 06, 'CE', 'Peixe');

INSERT INTO `tb_cidades` VALUES (1560, 06, 'CE', 'Peixe Gordo');

INSERT INTO `tb_cidades` VALUES (1561, 06, 'CE', 'Penaforte');

INSERT INTO `tb_cidades` VALUES (1562, 06, 'CE', 'Pentecoste');

INSERT INTO `tb_cidades` VALUES (1563, 06, 'CE', 'Pereiro');

INSERT INTO `tb_cidades` VALUES (1564, 06, 'CE', 'Pernambuquinho');

INSERT INTO `tb_cidades` VALUES (1565, 06, 'CE', 'Pessoa Anta');

INSERT INTO `tb_cidades` VALUES (1566, 06, 'CE', 'Pindoguaba');

INSERT INTO `tb_cidades` VALUES (1567, 06, 'CE', 'Pindoretama');

INSERT INTO `tb_cidades` VALUES (1568, 06, 'CE', 'Pio X');

INSERT INTO `tb_cidades` VALUES (1569, 06, 'CE', 'Piquet Carneiro');

INSERT INTO `tb_cidades` VALUES (1570, 06, 'CE', 'Pirabibu');

INSERT INTO `tb_cidades` VALUES (1571, 06, 'CE', 'Pirangi');

INSERT INTO `tb_cidades` VALUES (1572, 06, 'CE', 'Pires Ferreira');

INSERT INTO `tb_cidades` VALUES (1573, 06, 'CE', 'Pitombeira');

INSERT INTO `tb_cidades` VALUES (1574, 06, 'CE', 'Pitombeiras');

INSERT INTO `tb_cidades` VALUES (1575, 06, 'CE', 'Placido Martins');

INSERT INTO `tb_cidades` VALUES (1576, 06, 'CE', 'Poco');

INSERT INTO `tb_cidades` VALUES (1577, 06, 'CE', 'Poco Comprido');

INSERT INTO `tb_cidades` VALUES (1578, 06, 'CE', 'Poco Grande');

INSERT INTO `tb_cidades` VALUES (1579, 06, 'CE', 'Podimirim');

INSERT INTO `tb_cidades` VALUES (1580, 06, 'CE', 'Ponta da Serra');

INSERT INTO `tb_cidades` VALUES (1581, 06, 'CE', 'Poranga');

INSERT INTO `tb_cidades` VALUES (1582, 06, 'CE', 'Porfirio Sampaio');

INSERT INTO `tb_cidades` VALUES (1583, 06, 'CE', 'Porteiras');

INSERT INTO `tb_cidades` VALUES (1584, 06, 'CE', 'Potengi');

INSERT INTO `tb_cidades` VALUES (1585, 06, 'CE', 'Poti');

INSERT INTO `tb_cidades` VALUES (1586, 06, 'CE', 'Potiretama');

INSERT INTO `tb_cidades` VALUES (1587, 06, 'CE', 'Prata');

INSERT INTO `tb_cidades` VALUES (1588, 06, 'CE', 'Prudente de Morais');

INSERT INTO `tb_cidades` VALUES (1589, 06, 'CE', 'Quatiguaba');

INSERT INTO `tb_cidades` VALUES (1590, 06, 'CE', 'Queimadas');

INSERT INTO `tb_cidades` VALUES (1591, 06, 'CE', 'Quimami');

INSERT INTO `tb_cidades` VALUES (1592, 06, 'CE', 'Quincoe');

INSERT INTO `tb_cidades` VALUES (1593, 06, 'CE', 'Quincunca');

INSERT INTO `tb_cidades` VALUES (1594, 06, 'CE', 'Quitaius');

INSERT INTO `tb_cidades` VALUES (1595, 06, 'CE', 'Quiterianopolis');

INSERT INTO `tb_cidades` VALUES (1596, 06, 'CE', 'Quixada');

INSERT INTO `tb_cidades` VALUES (1597, 06, 'CE', 'Quixariu');

INSERT INTO `tb_cidades` VALUES (1598, 06, 'CE', 'Quixelo');

INSERT INTO `tb_cidades` VALUES (1599, 06, 'CE', 'Quixeramobim');

INSERT INTO `tb_cidades` VALUES (1600, 06, 'CE', 'Quixere');

INSERT INTO `tb_cidades` VALUES (1601, 06, 'CE', 'Quixoa');

INSERT INTO `tb_cidades` VALUES (1602, 06, 'CE', 'Raimundo Martins');

INSERT INTO `tb_cidades` VALUES (1603, 06, 'CE', 'Redencao');

INSERT INTO `tb_cidades` VALUES (1604, 06, 'CE', 'Reriutaba');

INSERT INTO `tb_cidades` VALUES (1605, 06, 'CE', 'Riachao do Banabuiu');

INSERT INTO `tb_cidades` VALUES (1606, 06, 'CE', 'Riacho Grande');

INSERT INTO `tb_cidades` VALUES (1607, 06, 'CE', 'Riacho Verde');

INSERT INTO `tb_cidades` VALUES (1608, 06, 'CE', 'Riacho Vermelho');

INSERT INTO `tb_cidades` VALUES (1609, 06, 'CE', 'Rinare');

INSERT INTO `tb_cidades` VALUES (1610, 06, 'CE', 'Roldao');

INSERT INTO `tb_cidades` VALUES (1611, 06, 'CE', 'Russas');

INSERT INTO `tb_cidades` VALUES (1612, 06, 'CE', 'Sabiaguaba');

INSERT INTO `tb_cidades` VALUES (1613, 06, 'CE', 'Saboeiro');

INSERT INTO `tb_cidades` VALUES (1614, 06, 'CE', 'Sacramento');

INSERT INTO `tb_cidades` VALUES (1615, 06, 'CE', 'Salao');

INSERT INTO `tb_cidades` VALUES (1616, 06, 'CE', 'Salitre');

INSERT INTO `tb_cidades` VALUES (1617, 06, 'CE', 'Sambaiba');

INSERT INTO `tb_cidades` VALUES (1618, 06, 'CE', 'Santa Ana');

INSERT INTO `tb_cidades` VALUES (1619, 06, 'CE', 'Santa Fe');

INSERT INTO `tb_cidades` VALUES (1620, 06, 'CE', 'Santa Felicia');

INSERT INTO `tb_cidades` VALUES (1621, 06, 'CE', 'Santa Luzia');

INSERT INTO `tb_cidades` VALUES (1622, 06, 'CE', 'Santa Quiteria');

INSERT INTO `tb_cidades` VALUES (1623, 06, 'CE', 'Santa Tereza');

INSERT INTO `tb_cidades` VALUES (1624, 06, 'CE', 'Santana');

INSERT INTO `tb_cidades` VALUES (1625, 06, 'CE', 'Santana do Acarau');

INSERT INTO `tb_cidades` VALUES (1626, 06, 'CE', 'Santana do Cariri');

INSERT INTO `tb_cidades` VALUES (1627, 06, 'CE', 'Santarem');

INSERT INTO `tb_cidades` VALUES (1628, 06, 'CE', 'Santo Antonio');

INSERT INTO `tb_cidades` VALUES (1629, 06, 'CE', 'Santo Antonio da Pindoba');

INSERT INTO `tb_cidades` VALUES (1630, 06, 'CE', 'Santo Antonio dos Fernandes');

INSERT INTO `tb_cidades` VALUES (1631, 06, 'CE', 'Sao Bartolomeu');

INSERT INTO `tb_cidades` VALUES (1632, 06, 'CE', 'Sao Benedito');

INSERT INTO `tb_cidades` VALUES (1633, 06, 'CE', 'Sao Domingos');

INSERT INTO `tb_cidades` VALUES (1634, 06, 'CE', 'Sao Felipe');

INSERT INTO `tb_cidades` VALUES (1635, 06, 'CE', 'Sao Francisco');

INSERT INTO `tb_cidades` VALUES (1636, 06, 'CE', 'Sao Gerardo');

INSERT INTO `tb_cidades` VALUES (1637, 06, 'CE', 'Sao Goncalo do Amarante');

INSERT INTO `tb_cidades` VALUES (1638, 06, 'CE', 'Sao Goncalo do Umari');

INSERT INTO `tb_cidades` VALUES (1639, 06, 'CE', 'Sao Joao de Deus');

INSERT INTO `tb_cidades` VALUES (1640, 06, 'CE', 'Sao Joao do Jaguaribe');

INSERT INTO `tb_cidades` VALUES (1641, 06, 'CE', 'Sao Joao dos Queiroz');

INSERT INTO `tb_cidades` VALUES (1642, 06, 'CE', 'Sao Joaquim');

INSERT INTO `tb_cidades` VALUES (1643, 06, 'CE', 'Sao Joaquim do Salgado');

INSERT INTO `tb_cidades` VALUES (1644, 06, 'CE', 'Sao Jose');

INSERT INTO `tb_cidades` VALUES (1645, 06, 'CE', 'Sao Jose das Lontras');

INSERT INTO `tb_cidades` VALUES (1646, 06, 'CE', 'Sao Jose de Solonopole');

INSERT INTO `tb_cidades` VALUES (1647, 06, 'CE', 'Sao Jose do Torto');

INSERT INTO `tb_cidades` VALUES (1648, 06, 'CE', 'Sao Luis do Curu');

INSERT INTO `tb_cidades` VALUES (1649, 06, 'CE', 'Sao Miguel');

INSERT INTO `tb_cidades` VALUES (1650, 06, 'CE', 'Sao Paulo');

INSERT INTO `tb_cidades` VALUES (1651, 06, 'CE', 'Sao Pedro');

INSERT INTO `tb_cidades` VALUES (1652, 06, 'CE', 'Sao Romao');

INSERT INTO `tb_cidades` VALUES (1653, 06, 'CE', 'Sao Sebastiao');

INSERT INTO `tb_cidades` VALUES (1654, 06, 'CE', 'Sao Vicente');

INSERT INTO `tb_cidades` VALUES (1655, 06, 'CE', 'Sapo');

INSERT INTO `tb_cidades` VALUES (1656, 06, 'CE', 'Sapupara');

INSERT INTO `tb_cidades` VALUES (1657, 06, 'CE', 'Sebastiao de Abreu');

INSERT INTO `tb_cidades` VALUES (1658, 06, 'CE', 'Senador Carlos Jereissati');

INSERT INTO `tb_cidades` VALUES (1659, 06, 'CE', 'Senador Pompeu');

INSERT INTO `tb_cidades` VALUES (1660, 06, 'CE', 'Senador Sa');

INSERT INTO `tb_cidades` VALUES (1661, 06, 'CE', 'Sereno de Cima');

INSERT INTO `tb_cidades` VALUES (1662, 06, 'CE', 'Serra do Felix');

INSERT INTO `tb_cidades` VALUES (1663, 06, 'CE', 'Serragem');

INSERT INTO `tb_cidades` VALUES (1664, 06, 'CE', 'Serrota');

INSERT INTO `tb_cidades` VALUES (1665, 06, 'CE', 'Serrote');

INSERT INTO `tb_cidades` VALUES (1666, 06, 'CE', 'Sitia');

INSERT INTO `tb_cidades` VALUES (1667, 06, 'CE', 'Sitios Novos');

INSERT INTO `tb_cidades` VALUES (1668, 06, 'CE', 'Siupe');

INSERT INTO `tb_cidades` VALUES (1669, 06, 'CE', 'Sobral');

INSERT INTO `tb_cidades` VALUES (1670, 06, 'CE', 'Soledade');

INSERT INTO `tb_cidades` VALUES (1671, 06, 'CE', 'Solonopole');

INSERT INTO `tb_cidades` VALUES (1672, 06, 'CE', 'Suassurana');

INSERT INTO `tb_cidades` VALUES (1673, 06, 'CE', 'Sucatinga');

INSERT INTO `tb_cidades` VALUES (1674, 06, 'CE', 'Sucesso');

INSERT INTO `tb_cidades` VALUES (1675, 06, 'CE', 'Sussuanha');

INSERT INTO `tb_cidades` VALUES (1676, 06, 'CE', 'Tabainha');

INSERT INTO `tb_cidades` VALUES (1677, 06, 'CE', 'Taboleiro');

INSERT INTO `tb_cidades` VALUES (1678, 06, 'CE', 'Tabuleiro do Norte');

INSERT INTO `tb_cidades` VALUES (1679, 06, 'CE', 'Taiba');

INSERT INTO `tb_cidades` VALUES (1680, 06, 'CE', 'Tamboril');

INSERT INTO `tb_cidades` VALUES (1681, 06, 'CE', 'Tanques');

INSERT INTO `tb_cidades` VALUES (1682, 06, 'CE', 'Tapera');

INSERT INTO `tb_cidades` VALUES (1683, 06, 'CE', 'Taperuaba');

INSERT INTO `tb_cidades` VALUES (1684, 06, 'CE', 'Tapuiara');

INSERT INTO `tb_cidades` VALUES (1685, 06, 'CE', 'Targinos');

INSERT INTO `tb_cidades` VALUES (1686, 06, 'CE', 'Tarrafas');

INSERT INTO `tb_cidades` VALUES (1687, 06, 'CE', 'Taua');

INSERT INTO `tb_cidades` VALUES (1688, 06, 'CE', 'Tejucuoca');

INSERT INTO `tb_cidades` VALUES (1689, 06, 'CE', 'Tiangua');

INSERT INTO `tb_cidades` VALUES (1690, 06, 'CE', 'Timonha');

INSERT INTO `tb_cidades` VALUES (1691, 06, 'CE', 'Tipi');

INSERT INTO `tb_cidades` VALUES (1692, 06, 'CE', 'Tome');

INSERT INTO `tb_cidades` VALUES (1693, 06, 'CE', 'Trairi');

INSERT INTO `tb_cidades` VALUES (1694, 06, 'CE', 'Trapia');

INSERT INTO `tb_cidades` VALUES (1695, 06, 'CE', 'Trici');

INSERT INTO `tb_cidades` VALUES (1696, 06, 'CE', 'Troia');

INSERT INTO `tb_cidades` VALUES (1697, 06, 'CE', 'Trussu');

INSERT INTO `tb_cidades` VALUES (1698, 06, 'CE', 'Tucunduba');

INSERT INTO `tb_cidades` VALUES (1699, 06, 'CE', 'Tucuns');

INSERT INTO `tb_cidades` VALUES (1700, 06, 'CE', 'Tuina');

INSERT INTO `tb_cidades` VALUES (1701, 06, 'CE', 'Tururu');

INSERT INTO `tb_cidades` VALUES (1702, 06, 'CE', 'Ubajara');

INSERT INTO `tb_cidades` VALUES (1703, 06, 'CE', 'Ubauna');

INSERT INTO `tb_cidades` VALUES (1704, 06, 'CE', 'Ubiracu');

INSERT INTO `tb_cidades` VALUES (1705, 06, 'CE', 'Uiraponga');

INSERT INTO `tb_cidades` VALUES (1706, 06, 'CE', 'Umari');

INSERT INTO `tb_cidades` VALUES (1707, 06, 'CE', 'Umarituba');

INSERT INTO `tb_cidades` VALUES (1708, 06, 'CE', 'Umburanas');

INSERT INTO `tb_cidades` VALUES (1709, 06, 'CE', 'Umirim');

INSERT INTO `tb_cidades` VALUES (1710, 06, 'CE', 'Uruburetama');

INSERT INTO `tb_cidades` VALUES (1711, 06, 'CE', 'Uruoca');

INSERT INTO `tb_cidades` VALUES (1712, 06, 'CE', 'Uruque');

INSERT INTO `tb_cidades` VALUES (1713, 06, 'CE', 'Varjota');

INSERT INTO `tb_cidades` VALUES (1714, 06, 'CE', 'Varzea');

INSERT INTO `tb_cidades` VALUES (1715, 06, 'CE', 'Varzea Alegre');

INSERT INTO `tb_cidades` VALUES (1716, 06, 'CE', 'Varzea da Volta');

INSERT INTO `tb_cidades` VALUES (1717, 06, 'CE', 'Varzea do Gilo');

INSERT INTO `tb_cidades` VALUES (1718, 06, 'CE', 'Vazantes');

INSERT INTO `tb_cidades` VALUES (1719, 06, 'CE', 'Ventura');

INSERT INTO `tb_cidades` VALUES (1720, 06, 'CE', 'Vertentes do Lagedo');

INSERT INTO `tb_cidades` VALUES (1721, 06, 'CE', 'Vicosa');

INSERT INTO `tb_cidades` VALUES (1722, 06, 'CE', 'Vicosa do Ceara');

INSERT INTO `tb_cidades` VALUES (1723, 06, 'CE', 'Vila Soares');

INSERT INTO `tb_cidades` VALUES (1724, 07, 'DF', 'Brasilia');

INSERT INTO `tb_cidades` VALUES (1725, 07, 'DF', 'Brazlandia');

INSERT INTO `tb_cidades` VALUES (1726, 07, 'DF', 'Candangolandia');

INSERT INTO `tb_cidades` VALUES (1727, 07, 'DF', 'Ceilandia');

INSERT INTO `tb_cidades` VALUES (1728, 07, 'DF', 'Cruzeiro');

INSERT INTO `tb_cidades` VALUES (1729, 07, 'DF', 'Gama');

INSERT INTO `tb_cidades` VALUES (1730, 07, 'DF', 'Guara');

INSERT INTO `tb_cidades` VALUES (1731, 07, 'DF', 'Lago Norte');

INSERT INTO `tb_cidades` VALUES (1732, 07, 'DF', 'Lago Sul');

INSERT INTO `tb_cidades` VALUES (1733, 07, 'DF', 'Nucleo Bandeirante');

INSERT INTO `tb_cidades` VALUES (1734, 07, 'DF', 'Paranoa');

INSERT INTO `tb_cidades` VALUES (1735, 07, 'DF', 'Planaltina');

INSERT INTO `tb_cidades` VALUES (1736, 07, 'DF', 'Recanto das Emas');

INSERT INTO `tb_cidades` VALUES (1737, 07, 'DF', 'Riacho Fundo');

INSERT INTO `tb_cidades` VALUES (1738, 07, 'DF', 'Samambaia');

INSERT INTO `tb_cidades` VALUES (1739, 07, 'DF', 'Santa Maria');

INSERT INTO `tb_cidades` VALUES (1740, 07, 'DF', 'Sao Sebastiao');

INSERT INTO `tb_cidades` VALUES (1741, 07, 'DF', 'Sobradinho');

INSERT INTO `tb_cidades` VALUES (1742, 07, 'DF', 'Taguatinga');

INSERT INTO `tb_cidades` VALUES (1743, 08, 'ES', 'Acioli');

INSERT INTO `tb_cidades` VALUES (1744, 08, 'ES', 'Afonso Claudio');

INSERT INTO `tb_cidades` VALUES (1745, 08, 'ES', 'Agha');

INSERT INTO `tb_cidades` VALUES (1746, 08, 'ES', 'Agua Doce do Norte');

INSERT INTO `tb_cidades` VALUES (1747, 08, 'ES', 'Aguia Branca');

INSERT INTO `tb_cidades` VALUES (1748, 08, 'ES', 'Airituba');

INSERT INTO `tb_cidades` VALUES (1749, 08, 'ES', 'Alegre');

INSERT INTO `tb_cidades` VALUES (1750, 08, 'ES', 'Alfredo Chaves');

INSERT INTO `tb_cidades` VALUES (1751, 08, 'ES', 'Alto Calcado');

INSERT INTO `tb_cidades` VALUES (1752, 08, 'ES', 'Alto Caldeirao');

INSERT INTO `tb_cidades` VALUES (1753, 08, 'ES', 'Alto Mutum Preto');

INSERT INTO `tb_cidades` VALUES (1754, 08, 'ES', 'Alto Rio Novo');

INSERT INTO `tb_cidades` VALUES (1755, 08, 'ES', 'Alto Santa Maria');

INSERT INTO `tb_cidades` VALUES (1756, 08, 'ES', 'Anchieta');

INSERT INTO `tb_cidades` VALUES (1757, 08, 'ES', 'Angelo Frechiani');

INSERT INTO `tb_cidades` VALUES (1758, 08, 'ES', 'Anutiba');

INSERT INTO `tb_cidades` VALUES (1759, 08, 'ES', 'Apiaca');

INSERT INTO `tb_cidades` VALUES (1760, 08, 'ES', 'Aracatiba');

INSERT INTO `tb_cidades` VALUES (1761, 08, 'ES', 'Arace');

INSERT INTO `tb_cidades` VALUES (1762, 08, 'ES', 'Aracruz');

INSERT INTO `tb_cidades` VALUES (1763, 08, 'ES', 'Aracui');

INSERT INTO `tb_cidades` VALUES (1764, 08, 'ES', 'Araguaia');

INSERT INTO `tb_cidades` VALUES (1765, 08, 'ES', 'Ararai');

INSERT INTO `tb_cidades` VALUES (1766, 08, 'ES', 'Argolas');

INSERT INTO `tb_cidades` VALUES (1767, 08, 'ES', 'Atilio Vivacqua');

INSERT INTO `tb_cidades` VALUES (1768, 08, 'ES', 'Baia Nova');

INSERT INTO `tb_cidades` VALUES (1769, 08, 'ES', 'Baixo Guandu');

INSERT INTO `tb_cidades` VALUES (1770, 08, 'ES', 'Barra de Novo Brasil');

INSERT INTO `tb_cidades` VALUES (1771, 08, 'ES', 'Barra de Sao Francisco');

INSERT INTO `tb_cidades` VALUES (1772, 08, 'ES', 'Barra do Itapemirim');

INSERT INTO `tb_cidades` VALUES (1773, 08, 'ES', 'Barra Nova');

INSERT INTO `tb_cidades` VALUES (1774, 08, 'ES', 'Barra Seca');

INSERT INTO `tb_cidades` VALUES (1775, 08, 'ES', 'Baunilha');

INSERT INTO `tb_cidades` VALUES (1776, 08, 'ES', 'Bebedouro');

INSERT INTO `tb_cidades` VALUES (1777, 08, 'ES', 'Boa Esperanca');

INSERT INTO `tb_cidades` VALUES (1778, 08, 'ES', 'Boapaba');

INSERT INTO `tb_cidades` VALUES (1779, 08, 'ES', 'Bom Jesus do Norte');

INSERT INTO `tb_cidades` VALUES (1780, 08, 'ES', 'Bonsucesso');

INSERT INTO `tb_cidades` VALUES (1781, 08, 'ES', 'Braco do Rio');

INSERT INTO `tb_cidades` VALUES (1782, 08, 'ES', 'Brejetuba');

INSERT INTO `tb_cidades` VALUES (1783, 08, 'ES', 'Burarama');

INSERT INTO `tb_cidades` VALUES (1784, 08, 'ES', 'Cachoeirinha de Itauna');

INSERT INTO `tb_cidades` VALUES (1785, 08, 'ES', 'Cachoeiro de Itapemirim');

INSERT INTO `tb_cidades` VALUES (1786, 08, 'ES', 'Cafe');

INSERT INTO `tb_cidades` VALUES (1787, 08, 'ES', 'Calogi');

INSERT INTO `tb_cidades` VALUES (1788, 08, 'ES', 'Camara');

INSERT INTO `tb_cidades` VALUES (1789, 08, 'ES', 'Carapina');

INSERT INTO `tb_cidades` VALUES (1790, 08, 'ES', 'Cariacica');

INSERT INTO `tb_cidades` VALUES (1791, 08, 'ES', 'Castelo');

INSERT INTO `tb_cidades` VALUES (1792, 08, 'ES', 'Celina');

INSERT INTO `tb_cidades` VALUES (1793, 08, 'ES', 'Colatina');

INSERT INTO `tb_cidades` VALUES (1794, 08, 'ES', 'Conceicao da Barra');

INSERT INTO `tb_cidades` VALUES (1795, 08, 'ES', 'Conceicao do Castelo');

INSERT INTO `tb_cidades` VALUES (1796, 08, 'ES', 'Conceicao do Muqui');

INSERT INTO `tb_cidades` VALUES (1797, 08, 'ES', 'Conduru');

INSERT INTO `tb_cidades` VALUES (1798, 08, 'ES', 'Coqueiral');

INSERT INTO `tb_cidades` VALUES (1799, 08, 'ES', 'Corrego dos Monos');

INSERT INTO `tb_cidades` VALUES (1800, 08, 'ES', 'Cotaxe');

INSERT INTO `tb_cidades` VALUES (1801, 08, 'ES', 'Cristal do Norte');

INSERT INTO `tb_cidades` VALUES (1802, 08, 'ES', 'Crubixa');

INSERT INTO `tb_cidades` VALUES (1803, 08, 'ES', 'Desengano');

INSERT INTO `tb_cidades` VALUES (1804, 08, 'ES', 'Divino de Sao Lourenco');

INSERT INTO `tb_cidades` VALUES (1805, 08, 'ES', 'Divino Espirito Santo');

INSERT INTO `tb_cidades` VALUES (1806, 08, 'ES', 'Djalma Coutinho');

INSERT INTO `tb_cidades` VALUES (1807, 08, 'ES', 'Domingos Martins');

INSERT INTO `tb_cidades` VALUES (1808, 08, 'ES', 'Dona America');

INSERT INTO `tb_cidades` VALUES (1809, 08, 'ES', 'Dores do Rio Preto');

INSERT INTO `tb_cidades` VALUES (1810, 08, 'ES', 'Duas Barras');

INSERT INTO `tb_cidades` VALUES (1811, 08, 'ES', 'Ecoporanga');

INSERT INTO `tb_cidades` VALUES (1812, 08, 'ES', 'Estrela do Norte');

INSERT INTO `tb_cidades` VALUES (1813, 08, 'ES', 'Fartura');

INSERT INTO `tb_cidades` VALUES (1814, 08, 'ES', 'Fazenda Guandu');

INSERT INTO `tb_cidades` VALUES (1815, 08, 'ES', 'Fundao');

INSERT INTO `tb_cidades` VALUES (1816, 08, 'ES', 'Garrafao');

INSERT INTO `tb_cidades` VALUES (1817, 08, 'ES', 'Gironda');

INSERT INTO `tb_cidades` VALUES (1818, 08, 'ES', 'Goiabeiras');

INSERT INTO `tb_cidades` VALUES (1819, 08, 'ES', 'Governador Lacerda de Aguiar');

INSERT INTO `tb_cidades` VALUES (1820, 08, 'ES', 'Governador Lindenberg');

INSERT INTO `tb_cidades` VALUES (1821, 08, 'ES', 'Graca Aranha');

INSERT INTO `tb_cidades` VALUES (1822, 08, 'ES', 'Gruta');

INSERT INTO `tb_cidades` VALUES (1823, 08, 'ES', 'Guacui');

INSERT INTO `tb_cidades` VALUES (1824, 08, 'ES', 'Guarana');

INSERT INTO `tb_cidades` VALUES (1825, 08, 'ES', 'Guarapari');

INSERT INTO `tb_cidades` VALUES (1826, 08, 'ES', 'Guararema');

INSERT INTO `tb_cidades` VALUES (1827, 08, 'ES', 'Ibatiba');

INSERT INTO `tb_cidades` VALUES (1828, 08, 'ES', 'Ibes');

INSERT INTO `tb_cidades` VALUES (1829, 08, 'ES', 'Ibicaba');

INSERT INTO `tb_cidades` VALUES (1830, 08, 'ES', 'Ibiracu');

INSERT INTO `tb_cidades` VALUES (1831, 08, 'ES', 'Ibitirama');

INSERT INTO `tb_cidades` VALUES (1832, 08, 'ES', 'Ibitirui');

INSERT INTO `tb_cidades` VALUES (1833, 08, 'ES', 'Ibituba');

INSERT INTO `tb_cidades` VALUES (1834, 08, 'ES', 'Iconha');

INSERT INTO `tb_cidades` VALUES (1835, 08, 'ES', 'Imburana');

INSERT INTO `tb_cidades` VALUES (1836, 08, 'ES', 'Iriritiba');

INSERT INTO `tb_cidades` VALUES (1837, 08, 'ES', 'Irundi');

INSERT INTO `tb_cidades` VALUES (1838, 08, 'ES', 'Irupi');

INSERT INTO `tb_cidades` VALUES (1839, 08, 'ES', 'Isabel');

INSERT INTO `tb_cidades` VALUES (1840, 08, 'ES', 'Itabaiana');

INSERT INTO `tb_cidades` VALUES (1841, 08, 'ES', 'Itacu');

INSERT INTO `tb_cidades` VALUES (1842, 08, 'ES', 'Itaguacu');

INSERT INTO `tb_cidades` VALUES (1843, 08, 'ES', 'Itaici');

INSERT INTO `tb_cidades` VALUES (1844, 08, 'ES', 'Itaimbe');

INSERT INTO `tb_cidades` VALUES (1845, 08, 'ES', 'Itaipava');

INSERT INTO `tb_cidades` VALUES (1846, 08, 'ES', 'Itamira');

INSERT INTO `tb_cidades` VALUES (1847, 08, 'ES', 'Itaoca');

INSERT INTO `tb_cidades` VALUES (1848, 08, 'ES', 'Itapecoa');

INSERT INTO `tb_cidades` VALUES (1849, 08, 'ES', 'Itapemirim');

INSERT INTO `tb_cidades` VALUES (1850, 08, 'ES', 'Itaperuna');

INSERT INTO `tb_cidades` VALUES (1851, 08, 'ES', 'Itapina');

INSERT INTO `tb_cidades` VALUES (1852, 08, 'ES', 'Itaquari');

INSERT INTO `tb_cidades` VALUES (1853, 08, 'ES', 'Itarana');

INSERT INTO `tb_cidades` VALUES (1854, 08, 'ES', 'Itaunas');

INSERT INTO `tb_cidades` VALUES (1855, 08, 'ES', 'Itauninhas');

INSERT INTO `tb_cidades` VALUES (1856, 08, 'ES', 'Iuna');

INSERT INTO `tb_cidades` VALUES (1857, 08, 'ES', 'Jabaquara');

INSERT INTO `tb_cidades` VALUES (1858, 08, 'ES', 'Jacaraipe');

INSERT INTO `tb_cidades` VALUES (1859, 08, 'ES', 'Jacigua');

INSERT INTO `tb_cidades` VALUES (1860, 08, 'ES', 'Jacupemba');

INSERT INTO `tb_cidades` VALUES (1861, 08, 'ES', 'Jaguare');

INSERT INTO `tb_cidades` VALUES (1862, 08, 'ES', 'Jeronimo Monteiro');

INSERT INTO `tb_cidades` VALUES (1863, 08, 'ES', 'Joacuba');

INSERT INTO `tb_cidades` VALUES (1864, 08, 'ES', 'Joao Neiva');

INSERT INTO `tb_cidades` VALUES (1865, 08, 'ES', 'Joatuba');

INSERT INTO `tb_cidades` VALUES (1866, 08, 'ES', 'Jose Carlos');

INSERT INTO `tb_cidades` VALUES (1867, 08, 'ES', 'Jucu');

INSERT INTO `tb_cidades` VALUES (1868, 08, 'ES', 'Lajinha');

INSERT INTO `tb_cidades` VALUES (1869, 08, 'ES', 'Laranja da Terra');

INSERT INTO `tb_cidades` VALUES (1870, 08, 'ES', 'Limoeiro');

INSERT INTO `tb_cidades` VALUES (1871, 08, 'ES', 'Linhares');

INSERT INTO `tb_cidades` VALUES (1872, 08, 'ES', 'Mangarai');

INSERT INTO `tb_cidades` VALUES (1873, 08, 'ES', 'Mantenopolis');

INSERT INTO `tb_cidades` VALUES (1874, 08, 'ES', 'Marataizes');

INSERT INTO `tb_cidades` VALUES (1875, 08, 'ES', 'Marechal Floriano');

INSERT INTO `tb_cidades` VALUES (1876, 08, 'ES', 'Marilandia');

INSERT INTO `tb_cidades` VALUES (1877, 08, 'ES', 'Matilde');

INSERT INTO `tb_cidades` VALUES (1878, 08, 'ES', 'Melgaco');

INSERT INTO `tb_cidades` VALUES (1879, 08, 'ES', 'Menino Jesus');

INSERT INTO `tb_cidades` VALUES (1880, 08, 'ES', 'Mimoso do Sul');

INSERT INTO `tb_cidades` VALUES (1881, 08, 'ES', 'Montanha');

INSERT INTO `tb_cidades` VALUES (1882, 08, 'ES', 'Monte Carmelo do Rio Novo');

INSERT INTO `tb_cidades` VALUES (1883, 08, 'ES', 'Monte Pio');

INSERT INTO `tb_cidades` VALUES (1884, 08, 'ES', 'Monte Sinai');

INSERT INTO `tb_cidades` VALUES (1885, 08, 'ES', 'Mucurici');

INSERT INTO `tb_cidades` VALUES (1886, 08, 'ES', 'Mundo Novo');

INSERT INTO `tb_cidades` VALUES (1887, 08, 'ES', 'Muniz Freire');

INSERT INTO `tb_cidades` VALUES (1888, 08, 'ES', 'Muqui');

INSERT INTO `tb_cidades` VALUES (1889, 08, 'ES', 'Nestor Gomes');

INSERT INTO `tb_cidades` VALUES (1890, 08, 'ES', 'Nova Almeida');

INSERT INTO `tb_cidades` VALUES (1891, 08, 'ES', 'Nova Canaa');

INSERT INTO `tb_cidades` VALUES (1892, 08, 'ES', 'Nova Venecia');

INSERT INTO `tb_cidades` VALUES (1893, 08, 'ES', 'Nova Verona');

INSERT INTO `tb_cidades` VALUES (1894, 08, 'ES', 'Novo Brasil');

INSERT INTO `tb_cidades` VALUES (1895, 08, 'ES', 'Novo Horizonte');

INSERT INTO `tb_cidades` VALUES (1896, 08, 'ES', 'Pacotuba');

INSERT INTO `tb_cidades` VALUES (1897, 08, 'ES', 'Paineiras');

INSERT INTO `tb_cidades` VALUES (1898, 08, 'ES', 'Palmeira');

INSERT INTO `tb_cidades` VALUES (1899, 08, 'ES', 'Palmerino');

INSERT INTO `tb_cidades` VALUES (1900, 08, 'ES', 'Pancas');

INSERT INTO `tb_cidades` VALUES (1901, 08, 'ES', 'Paraju');

INSERT INTO `tb_cidades` VALUES (1902, 08, 'ES', 'Paulista');

INSERT INTO `tb_cidades` VALUES (1903, 08, 'ES', 'Pedro Canario');

INSERT INTO `tb_cidades` VALUES (1904, 08, 'ES', 'Pendanga');

INSERT INTO `tb_cidades` VALUES (1905, 08, 'ES', 'Pequia');

INSERT INTO `tb_cidades` VALUES (1906, 08, 'ES', 'Perdicao');

INSERT INTO `tb_cidades` VALUES (1907, 08, 'ES', 'Piacu');

INSERT INTO `tb_cidades` VALUES (1908, 08, 'ES', 'Pinheiros');

INSERT INTO `tb_cidades` VALUES (1909, 08, 'ES', 'Piracema');

INSERT INTO `tb_cidades` VALUES (1910, 08, 'ES', 'Piuma');

INSERT INTO `tb_cidades` VALUES (1911, 08, 'ES', 'Ponte de Itabapoana');

INSERT INTO `tb_cidades` VALUES (1912, 08, 'ES', 'Ponto Belo');

INSERT INTO `tb_cidades` VALUES (1913, 08, 'ES', 'Pontoes');

INSERT INTO `tb_cidades` VALUES (1914, 08, 'ES', 'Poranga');

INSERT INTO `tb_cidades` VALUES (1915, 08, 'ES', 'Porto Barra do Riacho');

INSERT INTO `tb_cidades` VALUES (1916, 08, 'ES', 'Praia Grande');

INSERT INTO `tb_cidades` VALUES (1917, 08, 'ES', 'Presidente Kennedy');

INSERT INTO `tb_cidades` VALUES (1918, 08, 'ES', 'Princesa');

INSERT INTO `tb_cidades` VALUES (1919, 08, 'ES', 'Queimado');

INSERT INTO `tb_cidades` VALUES (1920, 08, 'ES', 'Quilometro Null do Mutum');

INSERT INTO `tb_cidades` VALUES (1921, 08, 'ES', 'Regencia');

INSERT INTO `tb_cidades` VALUES (1922, 08, 'ES', 'Riacho');

INSERT INTO `tb_cidades` VALUES (1923, 08, 'ES', 'Ribeirao do Cristo');

INSERT INTO `tb_cidades` VALUES (1924, 08, 'ES', 'Rio Bananal');

INSERT INTO `tb_cidades` VALUES (1925, 08, 'ES', 'Rio Calcado');

INSERT INTO `tb_cidades` VALUES (1926, 08, 'ES', 'Rio Muqui');

INSERT INTO `tb_cidades` VALUES (1927, 08, 'ES', 'Rio Novo do Sul');

INSERT INTO `tb_cidades` VALUES (1928, 08, 'ES', 'Rio Preto');

INSERT INTO `tb_cidades` VALUES (1929, 08, 'ES', 'Rive');

INSERT INTO `tb_cidades` VALUES (1930, 08, 'ES', 'Sagrada Familia');

INSERT INTO `tb_cidades` VALUES (1931, 08, 'ES', 'Santa Angelica');

INSERT INTO `tb_cidades` VALUES (1932, 08, 'ES', 'Santa Cruz');

INSERT INTO `tb_cidades` VALUES (1933, 08, 'ES', 'Santa Julia');

INSERT INTO `tb_cidades` VALUES (1934, 08, 'ES', 'Santa Leopoldina');

INSERT INTO `tb_cidades` VALUES (1935, 08, 'ES', 'Santa Luzia de Mantenopolis');

INSERT INTO `tb_cidades` VALUES (1936, 08, 'ES', 'Santa Luzia do Azul');

INSERT INTO `tb_cidades` VALUES (1937, 08, 'ES', 'Santa Luzia do Norte');

INSERT INTO `tb_cidades` VALUES (1938, 08, 'ES', 'Santa Maria de Jetiba');

INSERT INTO `tb_cidades` VALUES (1939, 08, 'ES', 'Santa Marta');

INSERT INTO `tb_cidades` VALUES (1940, 08, 'ES', 'Santa Teresa');

INSERT INTO `tb_cidades` VALUES (1941, 08, 'ES', 'Santa Terezinha');

INSERT INTO `tb_cidades` VALUES (1942, 08, 'ES', 'Santissima Trindade');

INSERT INTO `tb_cidades` VALUES (1943, 08, 'ES', 'Santo Agostinho');

INSERT INTO `tb_cidades` VALUES (1944, 08, 'ES', 'Santo Antonio');

INSERT INTO `tb_cidades` VALUES (1945, 08, 'ES', 'Santo Antonio do Canaa');

INSERT INTO `tb_cidades` VALUES (1946, 08, 'ES', 'Santo Antonio do Muqui');

INSERT INTO `tb_cidades` VALUES (1947, 08, 'ES', 'Santo Antonio do Pousalegre');

INSERT INTO `tb_cidades` VALUES (1948, 08, 'ES', 'Santo Antonio do Quinze');

INSERT INTO `tb_cidades` VALUES (1949, 08, 'ES', 'Sao Domingos do Norte');

INSERT INTO `tb_cidades` VALUES (1950, 08, 'ES', 'Sao Francisco do Novo Brasil');

INSERT INTO `tb_cidades` VALUES (1951, 08, 'ES', 'Sao Francisco Xavier do Guandu');

INSERT INTO `tb_cidades` VALUES (1952, 08, 'ES', 'Sao Gabriel da Palha');

INSERT INTO `tb_cidades` VALUES (1953, 08, 'ES', 'Sao Geraldo');

INSERT INTO `tb_cidades` VALUES (1954, 08, 'ES', 'Sao Jacinto');

INSERT INTO `tb_cidades` VALUES (1955, 08, 'ES', 'Sao Joao de Petropolis');

INSERT INTO `tb_cidades` VALUES (1956, 08, 'ES', 'Sao Joao de Vicosa');

INSERT INTO `tb_cidades` VALUES (1957, 08, 'ES', 'Sao Joao do Sobrado');

INSERT INTO `tb_cidades` VALUES (1958, 08, 'ES', 'Sao Jorge da Barra Seca');

INSERT INTO `tb_cidades` VALUES (1959, 08, 'ES', 'Sao Jorge do Oliveira');

INSERT INTO `tb_cidades` VALUES (1960, 08, 'ES', 'Sao Jorge do Tiradentes');

INSERT INTO `tb_cidades` VALUES (1961, 08, 'ES', 'Sao Jose das Torres');

INSERT INTO `tb_cidades` VALUES (1962, 08, 'ES', 'Sao Jose de Mantenopolis');

INSERT INTO `tb_cidades` VALUES (1963, 08, 'ES', 'Sao Jose do Calcado');

INSERT INTO `tb_cidades` VALUES (1964, 08, 'ES', 'Sao Jose do Sobradinho');

INSERT INTO `tb_cidades` VALUES (1965, 08, 'ES', 'Sao Mateus');

INSERT INTO `tb_cidades` VALUES (1966, 08, 'ES', 'Sao Pedro');

INSERT INTO `tb_cidades` VALUES (1967, 08, 'ES', 'Sao Pedro de Itabapoana');

INSERT INTO `tb_cidades` VALUES (1968, 08, 'ES', 'Sao Pedro de Rates');

INSERT INTO `tb_cidades` VALUES (1969, 08, 'ES', 'Sao Rafael');

INSERT INTO `tb_cidades` VALUES (1970, 08, 'ES', 'Sao Roque do Cannaa');

INSERT INTO `tb_cidades` VALUES (1971, 08, 'ES', 'Sao Tiago');

INSERT INTO `tb_cidades` VALUES (1972, 08, 'ES', 'Sao Torquato');

INSERT INTO `tb_cidades` VALUES (1973, 08, 'ES', 'Sapucaia');

INSERT INTO `tb_cidades` VALUES (1974, 08, 'ES', 'Serra');

INSERT INTO `tb_cidades` VALUES (1975, 08, 'ES', 'Serra Pelada');

INSERT INTO `tb_cidades` VALUES (1976, 08, 'ES', 'Sobreiro');

INSERT INTO `tb_cidades` VALUES (1977, 08, 'ES', 'Sooretama');

INSERT INTO `tb_cidades` VALUES (1978, 08, 'ES', 'Timbui');

INSERT INTO `tb_cidades` VALUES (1979, 08, 'ES', 'Todos Os Santos');

INSERT INTO `tb_cidades` VALUES (1980, 08, 'ES', 'Urania');

INSERT INTO `tb_cidades` VALUES (1981, 08, 'ES', 'Vargem Alta');

INSERT INTO `tb_cidades` VALUES (1982, 08, 'ES', 'Vargem Grande do Soturno');

INSERT INTO `tb_cidades` VALUES (1983, 08, 'ES', 'Venda Nova do Imigrante');

INSERT INTO `tb_cidades` VALUES (1984, 08, 'ES', 'Viana');

INSERT INTO `tb_cidades` VALUES (1985, 08, 'ES', 'Vieira Machado');

INSERT INTO `tb_cidades` VALUES (1986, 08, 'ES', 'Vila Nelita');

INSERT INTO `tb_cidades` VALUES (1987, 08, 'ES', 'Vila Nova de Bananal');

INSERT INTO `tb_cidades` VALUES (1988, 08, 'ES', 'Vila Pavao');

INSERT INTO `tb_cidades` VALUES (1989, 08, 'ES', 'Vila Valerio');

INSERT INTO `tb_cidades` VALUES (1990, 08, 'ES', 'Vila Velha');

INSERT INTO `tb_cidades` VALUES (1991, 08, 'ES', 'Vila Verde');

INSERT INTO `tb_cidades` VALUES (1992, 08, 'ES', 'Vinhatico');

INSERT INTO `tb_cidades` VALUES (1993, 08, 'ES', 'Vinte E Cinco de Julho');

INSERT INTO `tb_cidades` VALUES (1994, 08, 'ES', 'Vitoria');

INSERT INTO `tb_cidades` VALUES (1995, 09, 'GO', 'Abadia de Goias');

INSERT INTO `tb_cidades` VALUES (1996, 09, 'GO', 'Abadiania');

INSERT INTO `tb_cidades` VALUES (1997, 09, 'GO', 'Acreuna');

INSERT INTO `tb_cidades` VALUES (1998, 09, 'GO', 'Adelandia');

INSERT INTO `tb_cidades` VALUES (1999, 09, 'GO', 'Agua Fria de Goias');

INSERT INTO `tb_cidades` VALUES (2000, 09, 'GO', 'Agua Limpa');

INSERT INTO `tb_cidades` VALUES (2001, 09, 'GO', 'Aguas Lindas de Goias');

INSERT INTO `tb_cidades` VALUES (2002, 09, 'GO', 'Alexania');

INSERT INTO `tb_cidades` VALUES (2003, 09, 'GO', 'Aloandia');

INSERT INTO `tb_cidades` VALUES (2004, 09, 'GO', 'Alto Alvorada');

INSERT INTO `tb_cidades` VALUES (2005, 09, 'GO', 'Alto Horizonte');

INSERT INTO `tb_cidades` VALUES (2006, 09, 'GO', 'Alto Paraiso de Goias');

INSERT INTO `tb_cidades` VALUES (2007, 09, 'GO', 'Alvorada do Norte');

INSERT INTO `tb_cidades` VALUES (2008, 09, 'GO', 'Amaralina');

INSERT INTO `tb_cidades` VALUES (2009, 09, 'GO', 'Americano do Brasil');

INSERT INTO `tb_cidades` VALUES (2010, 09, 'GO', 'Amorinopolis');

INSERT INTO `tb_cidades` VALUES (2011, 09, 'GO', 'Anapolis');

INSERT INTO `tb_cidades` VALUES (2012, 09, 'GO', 'Anhanguera');

INSERT INTO `tb_cidades` VALUES (2013, 09, 'GO', 'Anicuns');

INSERT INTO `tb_cidades` VALUES (2014, 09, 'GO', 'Aparecida');

INSERT INTO `tb_cidades` VALUES (2015, 09, 'GO', 'Aparecida de Goiania');

INSERT INTO `tb_cidades` VALUES (2016, 09, 'GO', 'Aparecida de Goias');

INSERT INTO `tb_cidades` VALUES (2017, 09, 'GO', 'Aparecida do Rio Claro');

INSERT INTO `tb_cidades` VALUES (2018, 09, 'GO', 'Aparecida do Rio Doce');

INSERT INTO `tb_cidades` VALUES (2019, 09, 'GO', 'Apore');

INSERT INTO `tb_cidades` VALUES (2020, 09, 'GO', 'Aracu');

INSERT INTO `tb_cidades` VALUES (2021, 09, 'GO', 'Aragarcas');

INSERT INTO `tb_cidades` VALUES (2022, 09, 'GO', 'Aragoiania');

INSERT INTO `tb_cidades` VALUES (2023, 09, 'GO', 'Araguapaz');

INSERT INTO `tb_cidades` VALUES (2024, 09, 'GO', 'Arenopolis');

INSERT INTO `tb_cidades` VALUES (2025, 09, 'GO', 'Aruana');

INSERT INTO `tb_cidades` VALUES (2026, 09, 'GO', 'Aurilandia');

INSERT INTO `tb_cidades` VALUES (2027, 09, 'GO', 'Auriverde');

INSERT INTO `tb_cidades` VALUES (2028, 09, 'GO', 'Avelinopolis');

INSERT INTO `tb_cidades` VALUES (2029, 09, 'GO', 'Bacilandia');

INSERT INTO `tb_cidades` VALUES (2030, 09, 'GO', 'Baliza');

INSERT INTO `tb_cidades` VALUES (2031, 09, 'GO', 'Bandeirantes');

INSERT INTO `tb_cidades` VALUES (2032, 09, 'GO', 'Barbosilandia');

INSERT INTO `tb_cidades` VALUES (2033, 09, 'GO', 'Barro Alto');

INSERT INTO `tb_cidades` VALUES (2034, 09, 'GO', 'Bela Vista de Goias');

INSERT INTO `tb_cidades` VALUES (2035, 09, 'GO', 'Bom Jardim de Goias');

INSERT INTO `tb_cidades` VALUES (2036, 09, 'GO', 'Bom Jesus de Goias');

INSERT INTO `tb_cidades` VALUES (2037, 09, 'GO', 'Bonfinopolis');

INSERT INTO `tb_cidades` VALUES (2038, 09, 'GO', 'Bonopolis');

INSERT INTO `tb_cidades` VALUES (2039, 09, 'GO', 'Brazabrantes');

INSERT INTO `tb_cidades` VALUES (2040, 09, 'GO', 'Britania');

INSERT INTO `tb_cidades` VALUES (2041, 09, 'GO', 'Buenolandia');

INSERT INTO `tb_cidades` VALUES (2042, 09, 'GO', 'Buriti Alegre');

INSERT INTO `tb_cidades` VALUES (2043, 09, 'GO', 'Buriti de Goias');

INSERT INTO `tb_cidades` VALUES (2044, 09, 'GO', 'Buritinopolis');

INSERT INTO `tb_cidades` VALUES (2045, 09, 'GO', 'Cabeceiras');

INSERT INTO `tb_cidades` VALUES (2046, 09, 'GO', 'Cachoeira Alta');

INSERT INTO `tb_cidades` VALUES (2047, 09, 'GO', 'Cachoeira de Goias');

INSERT INTO `tb_cidades` VALUES (2048, 09, 'GO', 'Cachoeira Dourada');

INSERT INTO `tb_cidades` VALUES (2049, 09, 'GO', 'Cacu');

INSERT INTO `tb_cidades` VALUES (2050, 09, 'GO', 'Caiaponia');

INSERT INTO `tb_cidades` VALUES (2051, 09, 'GO', 'Caicara');

INSERT INTO `tb_cidades` VALUES (2052, 09, 'GO', 'Calcilandia');

INSERT INTO `tb_cidades` VALUES (2053, 09, 'GO', 'Caldas Novas');

INSERT INTO `tb_cidades` VALUES (2054, 09, 'GO', 'Caldazinha');

INSERT INTO `tb_cidades` VALUES (2055, 09, 'GO', 'Calixto');

INSERT INTO `tb_cidades` VALUES (2056, 09, 'GO', 'Campestre de Goias');

INSERT INTO `tb_cidades` VALUES (2057, 09, 'GO', 'Campinacu');

INSERT INTO `tb_cidades` VALUES (2058, 09, 'GO', 'Campinorte');

INSERT INTO `tb_cidades` VALUES (2059, 09, 'GO', 'Campo Alegre de Goias');

INSERT INTO `tb_cidades` VALUES (2060, 09, 'GO', 'Campo Limpo');

INSERT INTO `tb_cidades` VALUES (2061, 09, 'GO', 'Campolandia');

INSERT INTO `tb_cidades` VALUES (2062, 09, 'GO', 'Campos Belos');

INSERT INTO `tb_cidades` VALUES (2063, 09, 'GO', 'Campos Verdes');

INSERT INTO `tb_cidades` VALUES (2064, 09, 'GO', 'Cana Brava');

INSERT INTO `tb_cidades` VALUES (2065, 09, 'GO', 'Canada');

INSERT INTO `tb_cidades` VALUES (2066, 09, 'GO', 'Capelinha');

INSERT INTO `tb_cidades` VALUES (2067, 09, 'GO', 'Caraiba');

INSERT INTO `tb_cidades` VALUES (2068, 09, 'GO', 'Carmo do Rio Verde');

INSERT INTO `tb_cidades` VALUES (2069, 09, 'GO', 'Castelandia');

INSERT INTO `tb_cidades` VALUES (2070, 09, 'GO', 'Castrinopolis');

INSERT INTO `tb_cidades` VALUES (2071, 09, 'GO', 'Catalao');

INSERT INTO `tb_cidades` VALUES (2072, 09, 'GO', 'Caturai');

INSERT INTO `tb_cidades` VALUES (2073, 09, 'GO', 'Cavalcante');

INSERT INTO `tb_cidades` VALUES (2074, 09, 'GO', 'Cavalheiro');

INSERT INTO `tb_cidades` VALUES (2075, 09, 'GO', 'Cebrasa');

INSERT INTO `tb_cidades` VALUES (2076, 09, 'GO', 'Ceres');

INSERT INTO `tb_cidades` VALUES (2077, 09, 'GO', 'Cezarina');

INSERT INTO `tb_cidades` VALUES (2078, 09, 'GO', 'Chapadao do Ceu');

INSERT INTO `tb_cidades` VALUES (2079, 09, 'GO', 'Choupana');

INSERT INTO `tb_cidades` VALUES (2080, 09, 'GO', 'Cibele');

INSERT INTO `tb_cidades` VALUES (2081, 09, 'GO', 'Cidade Ocidental');

INSERT INTO `tb_cidades` VALUES (2082, 09, 'GO', 'Cirilandia');

INSERT INTO `tb_cidades` VALUES (2083, 09, 'GO', 'Cocalzinho de Goias');

INSERT INTO `tb_cidades` VALUES (2084, 09, 'GO', 'Colinas do Sul');

INSERT INTO `tb_cidades` VALUES (2085, 09, 'GO', 'Corrego do Ouro');

INSERT INTO `tb_cidades` VALUES (2086, 09, 'GO', 'Corrego Rico');

INSERT INTO `tb_cidades` VALUES (2087, 09, 'GO', 'Corumba de Goias');

INSERT INTO `tb_cidades` VALUES (2088, 09, 'GO', 'Corumbaiba');

INSERT INTO `tb_cidades` VALUES (2089, 09, 'GO', 'Cristalina');

INSERT INTO `tb_cidades` VALUES (2090, 09, 'GO', 'Cristianopolis');

INSERT INTO `tb_cidades` VALUES (2091, 09, 'GO', 'Crixas');

INSERT INTO `tb_cidades` VALUES (2092, 09, 'GO', 'Crominia');

INSERT INTO `tb_cidades` VALUES (2093, 09, 'GO', 'Cruzeiro do Norte');

INSERT INTO `tb_cidades` VALUES (2094, 09, 'GO', 'Cumari');

INSERT INTO `tb_cidades` VALUES (2095, 09, 'GO', 'Damianopolis');

INSERT INTO `tb_cidades` VALUES (2096, 09, 'GO', 'Damolandia');

INSERT INTO `tb_cidades` VALUES (2097, 09, 'GO', 'Davidopolis');

INSERT INTO `tb_cidades` VALUES (2098, 09, 'GO', 'Davinopolis');

INSERT INTO `tb_cidades` VALUES (2099, 09, 'GO', 'Diolandia');

INSERT INTO `tb_cidades` VALUES (2100, 09, 'GO', 'Diorama');

INSERT INTO `tb_cidades` VALUES (2101, 09, 'GO', 'Divinopolis de Goias');

INSERT INTO `tb_cidades` VALUES (2102, 09, 'GO', 'Domiciano Ribeiro');

INSERT INTO `tb_cidades` VALUES (2103, 09, 'GO', 'Doverlandia');

INSERT INTO `tb_cidades` VALUES (2104, 09, 'GO', 'Edealina');

INSERT INTO `tb_cidades` VALUES (2105, 09, 'GO', 'Edeia');

INSERT INTO `tb_cidades` VALUES (2106, 09, 'GO', 'Estrela do Norte');

INSERT INTO `tb_cidades` VALUES (2107, 09, 'GO', 'Faina');

INSERT INTO `tb_cidades` VALUES (2108, 09, 'GO', 'Fazenda Nova');

INSERT INTO `tb_cidades` VALUES (2109, 09, 'GO', 'Firminopolis');

INSERT INTO `tb_cidades` VALUES (2110, 09, 'GO', 'Flores de Goias');

INSERT INTO `tb_cidades` VALUES (2111, 09, 'GO', 'Formosa');

INSERT INTO `tb_cidades` VALUES (2112, 09, 'GO', 'Formoso');

INSERT INTO `tb_cidades` VALUES (2113, 09, 'GO', 'Forte');

INSERT INTO `tb_cidades` VALUES (2114, 09, 'GO', 'Gameleira de Goias');

INSERT INTO `tb_cidades` VALUES (2115, 09, 'GO', 'Geriacu');

INSERT INTO `tb_cidades` VALUES (2116, 09, 'GO', 'Goialandia');

INSERT INTO `tb_cidades` VALUES (2117, 09, 'GO', 'Goianapolis');

INSERT INTO `tb_cidades` VALUES (2118, 09, 'GO', 'Goiandira');

INSERT INTO `tb_cidades` VALUES (2119, 09, 'GO', 'Goianesia');

INSERT INTO `tb_cidades` VALUES (2120, 09, 'GO', 'Goiania');

INSERT INTO `tb_cidades` VALUES (2121, 09, 'GO', 'Goianira');

INSERT INTO `tb_cidades` VALUES (2122, 09, 'GO', 'Goias');

INSERT INTO `tb_cidades` VALUES (2123, 09, 'GO', 'Goiatuba');

INSERT INTO `tb_cidades` VALUES (2124, 09, 'GO', 'Gouvelandia');

INSERT INTO `tb_cidades` VALUES (2125, 09, 'GO', 'Guapo');

INSERT INTO `tb_cidades` VALUES (2126, 09, 'GO', 'Guaraita');

INSERT INTO `tb_cidades` VALUES (2127, 09, 'GO', 'Guarani de Goias');

INSERT INTO `tb_cidades` VALUES (2128, 09, 'GO', 'Guarinos');

INSERT INTO `tb_cidades` VALUES (2129, 09, 'GO', 'Heitorai');

INSERT INTO `tb_cidades` VALUES (2130, 09, 'GO', 'Hidrolandia');

INSERT INTO `tb_cidades` VALUES (2131, 09, 'GO', 'Hidrolina');

INSERT INTO `tb_cidades` VALUES (2132, 09, 'GO', 'Iaciara');

INSERT INTO `tb_cidades` VALUES (2133, 09, 'GO', 'Inaciolandia');

INSERT INTO `tb_cidades` VALUES (2134, 09, 'GO', 'Indiara');

INSERT INTO `tb_cidades` VALUES (2135, 09, 'GO', 'Inhumas');

INSERT INTO `tb_cidades` VALUES (2136, 09, 'GO', 'Interlandia');

INSERT INTO `tb_cidades` VALUES (2137, 09, 'GO', 'Ipameri');

INSERT INTO `tb_cidades` VALUES (2138, 09, 'GO', 'Ipora');

INSERT INTO `tb_cidades` VALUES (2139, 09, 'GO', 'Israelandia');

INSERT INTO `tb_cidades` VALUES (2140, 09, 'GO', 'Itaberai');

INSERT INTO `tb_cidades` VALUES (2141, 09, 'GO', 'Itaguacu');

INSERT INTO `tb_cidades` VALUES (2142, 09, 'GO', 'Itaguari');

INSERT INTO `tb_cidades` VALUES (2143, 09, 'GO', 'Itaguaru');

INSERT INTO `tb_cidades` VALUES (2144, 09, 'GO', 'Itaja');

INSERT INTO `tb_cidades` VALUES (2145, 09, 'GO', 'Itapaci');

INSERT INTO `tb_cidades` VALUES (2146, 09, 'GO', 'Itapirapua');

INSERT INTO `tb_cidades` VALUES (2147, 09, 'GO', 'Itapuranga');

INSERT INTO `tb_cidades` VALUES (2148, 09, 'GO', 'Itaruma');

INSERT INTO `tb_cidades` VALUES (2149, 09, 'GO', 'Itaucu');

INSERT INTO `tb_cidades` VALUES (2150, 09, 'GO', 'Itumbiara');

INSERT INTO `tb_cidades` VALUES (2151, 09, 'GO', 'Ivolandia');

INSERT INTO `tb_cidades` VALUES (2152, 09, 'GO', 'Jacilandia');

INSERT INTO `tb_cidades` VALUES (2153, 09, 'GO', 'Jandaia');

INSERT INTO `tb_cidades` VALUES (2154, 09, 'GO', 'Jaragua');

INSERT INTO `tb_cidades` VALUES (2155, 09, 'GO', 'Jatai');

INSERT INTO `tb_cidades` VALUES (2156, 09, 'GO', 'Jaupaci');

INSERT INTO `tb_cidades` VALUES (2157, 09, 'GO', 'Jeroaquara');

INSERT INTO `tb_cidades` VALUES (2158, 09, 'GO', 'Jesupolis');

INSERT INTO `tb_cidades` VALUES (2159, 09, 'GO', 'Joanapolis');

INSERT INTO `tb_cidades` VALUES (2160, 09, 'GO', 'Joviania');

INSERT INTO `tb_cidades` VALUES (2161, 09, 'GO', 'Juscelandia');

INSERT INTO `tb_cidades` VALUES (2162, 09, 'GO', 'Juscelino Kubitschek');

INSERT INTO `tb_cidades` VALUES (2163, 09, 'GO', 'Jussara');

INSERT INTO `tb_cidades` VALUES (2164, 09, 'GO', 'Lagoa do Bauzinho');

INSERT INTO `tb_cidades` VALUES (2165, 09, 'GO', 'Lagolandia');

INSERT INTO `tb_cidades` VALUES (2166, 09, 'GO', 'Leopoldo de Bulhoes');

INSERT INTO `tb_cidades` VALUES (2167, 09, 'GO', 'Lucilandia');

INSERT INTO `tb_cidades` VALUES (2168, 09, 'GO', 'Luziania');

INSERT INTO `tb_cidades` VALUES (2169, 09, 'GO', 'Mairipotaba');

INSERT INTO `tb_cidades` VALUES (2170, 09, 'GO', 'Mambai');

INSERT INTO `tb_cidades` VALUES (2171, 09, 'GO', 'Mara Rosa');

INSERT INTO `tb_cidades` VALUES (2172, 09, 'GO', 'Marcianopolis');

INSERT INTO `tb_cidades` VALUES (2173, 09, 'GO', 'Marzagao');

INSERT INTO `tb_cidades` VALUES (2174, 09, 'GO', 'Matrincha');

INSERT INTO `tb_cidades` VALUES (2175, 09, 'GO', 'Maurilandia');

INSERT INTO `tb_cidades` VALUES (2176, 09, 'GO', 'Meia Ponte');

INSERT INTO `tb_cidades` VALUES (2177, 09, 'GO', 'Messianopolis');

INSERT INTO `tb_cidades` VALUES (2178, 09, 'GO', 'Mimoso de Goias');

INSERT INTO `tb_cidades` VALUES (2179, 09, 'GO', 'Minacu');

INSERT INTO `tb_cidades` VALUES (2180, 09, 'GO', 'Mineiros');

INSERT INTO `tb_cidades` VALUES (2181, 09, 'GO', 'Moipora');

INSERT INTO `tb_cidades` VALUES (2182, 09, 'GO', 'Monte Alegre de Goias');

INSERT INTO `tb_cidades` VALUES (2183, 09, 'GO', 'Montes Claros de Goias');

INSERT INTO `tb_cidades` VALUES (2184, 09, 'GO', 'Montividiu');

INSERT INTO `tb_cidades` VALUES (2185, 09, 'GO', 'Montividiu do Norte');

INSERT INTO `tb_cidades` VALUES (2186, 09, 'GO', 'Morrinhos');

INSERT INTO `tb_cidades` VALUES (2187, 09, 'GO', 'Morro Agudo de Goias');

INSERT INTO `tb_cidades` VALUES (2188, 09, 'GO', 'Mossamedes');

INSERT INTO `tb_cidades` VALUES (2189, 09, 'GO', 'Mozarlandia');

INSERT INTO `tb_cidades` VALUES (2190, 09, 'GO', 'Mundo Novo');

INSERT INTO `tb_cidades` VALUES (2191, 09, 'GO', 'Mutunopolis');

INSERT INTO `tb_cidades` VALUES (2192, 09, 'GO', 'Natinopolis');

INSERT INTO `tb_cidades` VALUES (2193, 09, 'GO', 'Nazario');

INSERT INTO `tb_cidades` VALUES (2194, 09, 'GO', 'Neropolis');

INSERT INTO `tb_cidades` VALUES (2195, 09, 'GO', 'Niquelandia');

INSERT INTO `tb_cidades` VALUES (2196, 09, 'GO', 'Nova America');

INSERT INTO `tb_cidades` VALUES (2197, 09, 'GO', 'Nova Aurora');

INSERT INTO `tb_cidades` VALUES (2198, 09, 'GO', 'Nova Crixas');

INSERT INTO `tb_cidades` VALUES (2199, 09, 'GO', 'Nova Gloria');

INSERT INTO `tb_cidades` VALUES (2200, 09, 'GO', 'Nova Iguacu de Goias');

INSERT INTO `tb_cidades` VALUES (2201, 09, 'GO', 'Nova Roma');

INSERT INTO `tb_cidades` VALUES (2202, 09, 'GO', 'Nova Veneza');

INSERT INTO `tb_cidades` VALUES (2203, 09, 'GO', 'Novo Brasil');

INSERT INTO `tb_cidades` VALUES (2204, 09, 'GO', 'Novo Gama');

INSERT INTO `tb_cidades` VALUES (2205, 09, 'GO', 'Novo Planalto');

INSERT INTO `tb_cidades` VALUES (2206, 09, 'GO', 'Olaria do Angico');

INSERT INTO `tb_cidades` VALUES (2207, 09, 'GO', 'Olhos D''agua');

INSERT INTO `tb_cidades` VALUES (2208, 09, 'GO', 'Orizona');

INSERT INTO `tb_cidades` VALUES (2209, 09, 'GO', 'Ouro Verde de Goias');

INSERT INTO `tb_cidades` VALUES (2210, 09, 'GO', 'Ouroana');

INSERT INTO `tb_cidades` VALUES (2211, 09, 'GO', 'Ouvidor');

INSERT INTO `tb_cidades` VALUES (2212, 09, 'GO', 'Padre Bernardo');

INSERT INTO `tb_cidades` VALUES (2213, 09, 'GO', 'Palestina de Goias');

INSERT INTO `tb_cidades` VALUES (2214, 09, 'GO', 'Palmeiras de Goias');

INSERT INTO `tb_cidades` VALUES (2215, 09, 'GO', 'Palmelo');

INSERT INTO `tb_cidades` VALUES (2216, 09, 'GO', 'Palminopolis');

INSERT INTO `tb_cidades` VALUES (2217, 09, 'GO', 'Panama');

INSERT INTO `tb_cidades` VALUES (2218, 09, 'GO', 'Paranaiguara');

INSERT INTO `tb_cidades` VALUES (2219, 09, 'GO', 'Parauna');

INSERT INTO `tb_cidades` VALUES (2220, 09, 'GO', 'Pau-terra');

INSERT INTO `tb_cidades` VALUES (2221, 09, 'GO', 'Pedra Branca');

INSERT INTO `tb_cidades` VALUES (2222, 09, 'GO', 'Perolandia');

INSERT INTO `tb_cidades` VALUES (2223, 09, 'GO', 'Petrolina de Goias');

INSERT INTO `tb_cidades` VALUES (2224, 09, 'GO', 'Pilar de Goias');

INSERT INTO `tb_cidades` VALUES (2225, 09, 'GO', 'Piloandia');

INSERT INTO `tb_cidades` VALUES (2226, 09, 'GO', 'Piracanjuba');

INSERT INTO `tb_cidades` VALUES (2227, 09, 'GO', 'Piranhas');

INSERT INTO `tb_cidades` VALUES (2228, 09, 'GO', 'Pirenopolis');

INSERT INTO `tb_cidades` VALUES (2229, 09, 'GO', 'Pires Belo');

INSERT INTO `tb_cidades` VALUES (2230, 09, 'GO', 'Pires do Rio');

INSERT INTO `tb_cidades` VALUES (2231, 09, 'GO', 'Planaltina');

INSERT INTO `tb_cidades` VALUES (2232, 09, 'GO', 'Pontalina');

INSERT INTO `tb_cidades` VALUES (2233, 09, 'GO', 'Porangatu');

INSERT INTO `tb_cidades` VALUES (2234, 09, 'GO', 'Porteirao');

INSERT INTO `tb_cidades` VALUES (2235, 09, 'GO', 'Portelandia');

INSERT INTO `tb_cidades` VALUES (2236, 09, 'GO', 'Posse');

INSERT INTO `tb_cidades` VALUES (2237, 09, 'GO', 'Posse D''abadia');

INSERT INTO `tb_cidades` VALUES (2238, 09, 'GO', 'Professor Jamil');

INSERT INTO `tb_cidades` VALUES (2239, 09, 'GO', 'Quirinopolis');

INSERT INTO `tb_cidades` VALUES (2240, 09, 'GO', 'Registro do Araguaia');

INSERT INTO `tb_cidades` VALUES (2241, 09, 'GO', 'Rialma');

INSERT INTO `tb_cidades` VALUES (2242, 09, 'GO', 'Rianapolis');

INSERT INTO `tb_cidades` VALUES (2243, 09, 'GO', 'Rio Quente');

INSERT INTO `tb_cidades` VALUES (2244, 09, 'GO', 'Rio Verde');

INSERT INTO `tb_cidades` VALUES (2245, 09, 'GO', 'Riverlandia');

INSERT INTO `tb_cidades` VALUES (2246, 09, 'GO', 'Rodrigues Nascimento');

INSERT INTO `tb_cidades` VALUES (2247, 09, 'GO', 'Rosalandia');

INSERT INTO `tb_cidades` VALUES (2248, 09, 'GO', 'Rubiataba');

INSERT INTO `tb_cidades` VALUES (2249, 09, 'GO', 'Sanclerlandia');

INSERT INTO `tb_cidades` VALUES (2250, 09, 'GO', 'Santa Barbara de Goias');

INSERT INTO `tb_cidades` VALUES (2251, 09, 'GO', 'Santa Cruz das Lajes');

INSERT INTO `tb_cidades` VALUES (2252, 09, 'GO', 'Santa Cruz de Goias');

INSERT INTO `tb_cidades` VALUES (2253, 09, 'GO', 'Santa Fe de Goias');

INSERT INTO `tb_cidades` VALUES (2254, 09, 'GO', 'Santa Helena de Goias');

INSERT INTO `tb_cidades` VALUES (2255, 09, 'GO', 'Santa Isabel');

INSERT INTO `tb_cidades` VALUES (2256, 09, 'GO', 'Santa Rita do Araguaia');

INSERT INTO `tb_cidades` VALUES (2257, 09, 'GO', 'Santa Rita do Novo Destino');

INSERT INTO `tb_cidades` VALUES (2258, 09, 'GO', 'Santa Rosa');

INSERT INTO `tb_cidades` VALUES (2259, 09, 'GO', 'Santa Rosa de Goias');

INSERT INTO `tb_cidades` VALUES (2260, 09, 'GO', 'Santa Tereza de Goias');

INSERT INTO `tb_cidades` VALUES (2261, 09, 'GO', 'Santa Terezinha de Goias');

INSERT INTO `tb_cidades` VALUES (2262, 09, 'GO', 'Santo Antonio da Barra');

INSERT INTO `tb_cidades` VALUES (2263, 09, 'GO', 'Santo Antonio de Goias');

INSERT INTO `tb_cidades` VALUES (2264, 09, 'GO', 'Santo Antonio do Descoberto');

INSERT INTO `tb_cidades` VALUES (2265, 09, 'GO', 'Santo Antonio do Rio Verde');

INSERT INTO `tb_cidades` VALUES (2266, 09, 'GO', 'Sao Domingos');

INSERT INTO `tb_cidades` VALUES (2267, 09, 'GO', 'Sao Francisco de Goias');

INSERT INTO `tb_cidades` VALUES (2268, 09, 'GO', 'Sao Gabriel de Goias');

INSERT INTO `tb_cidades` VALUES (2269, 09, 'GO', 'Sao Joao');

INSERT INTO `tb_cidades` VALUES (2270, 09, 'GO', 'Sao Joao D''alianca');

INSERT INTO `tb_cidades` VALUES (2271, 09, 'GO', 'Sao Joao da Parauna');

INSERT INTO `tb_cidades` VALUES (2272, 09, 'GO', 'Sao Luis de Montes Belos');

INSERT INTO `tb_cidades` VALUES (2273, 09, 'GO', 'Sao Luiz do Norte');

INSERT INTO `tb_cidades` VALUES (2274, 09, 'GO', 'Sao Luiz do Tocantins');

INSERT INTO `tb_cidades` VALUES (2275, 09, 'GO', 'Sao Miguel do Araguaia');

INSERT INTO `tb_cidades` VALUES (2276, 09, 'GO', 'Sao Miguel do Passa Quatro');

INSERT INTO `tb_cidades` VALUES (2277, 09, 'GO', 'Sao Patricio');

INSERT INTO `tb_cidades` VALUES (2278, 09, 'GO', 'Sao Sebastiao do Rio Claro');

INSERT INTO `tb_cidades` VALUES (2279, 09, 'GO', 'Sao Simao');

INSERT INTO `tb_cidades` VALUES (2280, 09, 'GO', 'Sao Vicente');

INSERT INTO `tb_cidades` VALUES (2281, 09, 'GO', 'Sarandi');

INSERT INTO `tb_cidades` VALUES (2282, 09, 'GO', 'Senador Canedo');

INSERT INTO `tb_cidades` VALUES (2283, 09, 'GO', 'Serra Dourada');

INSERT INTO `tb_cidades` VALUES (2284, 09, 'GO', 'Serranopolis');

INSERT INTO `tb_cidades` VALUES (2285, 09, 'GO', 'Silvania');

INSERT INTO `tb_cidades` VALUES (2286, 09, 'GO', 'Simolandia');

INSERT INTO `tb_cidades` VALUES (2287, 09, 'GO', 'Sitio D''abadia');

INSERT INTO `tb_cidades` VALUES (2288, 09, 'GO', 'Sousania');

INSERT INTO `tb_cidades` VALUES (2289, 09, 'GO', 'Taquaral de Goias');

INSERT INTO `tb_cidades` VALUES (2290, 09, 'GO', 'Taveira');

INSERT INTO `tb_cidades` VALUES (2291, 09, 'GO', 'Teresina de Goias');

INSERT INTO `tb_cidades` VALUES (2292, 09, 'GO', 'Terezopolis de Goias');

INSERT INTO `tb_cidades` VALUES (2293, 09, 'GO', 'Termas do Itaja');

INSERT INTO `tb_cidades` VALUES (2294, 09, 'GO', 'Tres Ranchos');

INSERT INTO `tb_cidades` VALUES (2295, 09, 'GO', 'Trindade');

INSERT INTO `tb_cidades` VALUES (2296, 09, 'GO', 'Trombas');

INSERT INTO `tb_cidades` VALUES (2297, 09, 'GO', 'Tupiracaba');

INSERT INTO `tb_cidades` VALUES (2298, 09, 'GO', 'Turvania');

INSERT INTO `tb_cidades` VALUES (2299, 09, 'GO', 'Turvelandia');

INSERT INTO `tb_cidades` VALUES (2300, 09, 'GO', 'Uirapuru');

INSERT INTO `tb_cidades` VALUES (2301, 09, 'GO', 'Uruacu');

INSERT INTO `tb_cidades` VALUES (2302, 09, 'GO', 'Uruana');

INSERT INTO `tb_cidades` VALUES (2303, 09, 'GO', 'Uruita');

INSERT INTO `tb_cidades` VALUES (2304, 09, 'GO', 'Urutai');

INSERT INTO `tb_cidades` VALUES (2305, 09, 'GO', 'Uva');

INSERT INTO `tb_cidades` VALUES (2306, 09, 'GO', 'Valdelandia');

INSERT INTO `tb_cidades` VALUES (2307, 09, 'GO', 'Valparaiso de Goias');

INSERT INTO `tb_cidades` VALUES (2308, 09, 'GO', 'Varjao');

INSERT INTO `tb_cidades` VALUES (2309, 09, 'GO', 'Vianopolis');

INSERT INTO `tb_cidades` VALUES (2310, 09, 'GO', 'Vicentinopolis');

INSERT INTO `tb_cidades` VALUES (2311, 09, 'GO', 'Vila Boa');

INSERT INTO `tb_cidades` VALUES (2312, 09, 'GO', 'Vila Brasilia');

INSERT INTO `tb_cidades` VALUES (2313, 09, 'GO', 'Vila Propicio');

INSERT INTO `tb_cidades` VALUES (2314, 09, 'GO', 'Vila Sertaneja');

INSERT INTO `tb_cidades` VALUES (2315, 10, 'MA', 'Acailandia');

INSERT INTO `tb_cidades` VALUES (2316, 10, 'MA', 'Afonso Cunha');

INSERT INTO `tb_cidades` VALUES (2317, 10, 'MA', 'Agua Doce do Maranhao');

INSERT INTO `tb_cidades` VALUES (2318, 10, 'MA', 'Alcantara');

INSERT INTO `tb_cidades` VALUES (2319, 10, 'MA', 'Aldeias Altas');

INSERT INTO `tb_cidades` VALUES (2320, 10, 'MA', 'Altamira do Maranhao');

INSERT INTO `tb_cidades` VALUES (2321, 10, 'MA', 'Alto Alegre do Maranhao');

INSERT INTO `tb_cidades` VALUES (2322, 10, 'MA', 'Alto Alegre do Pindare');

INSERT INTO `tb_cidades` VALUES (2323, 10, 'MA', 'Alto Parnaiba');

INSERT INTO `tb_cidades` VALUES (2324, 10, 'MA', 'Amapa do Maranhao');

INSERT INTO `tb_cidades` VALUES (2325, 10, 'MA', 'Amarante do Maranhao');

INSERT INTO `tb_cidades` VALUES (2326, 10, 'MA', 'Anajatuba');

INSERT INTO `tb_cidades` VALUES (2327, 10, 'MA', 'Anapurus');

INSERT INTO `tb_cidades` VALUES (2328, 10, 'MA', 'Anil');

INSERT INTO `tb_cidades` VALUES (2329, 10, 'MA', 'Apicum-acu');

INSERT INTO `tb_cidades` VALUES (2330, 10, 'MA', 'Araguana');

INSERT INTO `tb_cidades` VALUES (2331, 10, 'MA', 'Araioses');

INSERT INTO `tb_cidades` VALUES (2332, 10, 'MA', 'Arame');

INSERT INTO `tb_cidades` VALUES (2333, 10, 'MA', 'Arari');

INSERT INTO `tb_cidades` VALUES (2334, 10, 'MA', 'Aurizona');

INSERT INTO `tb_cidades` VALUES (2335, 10, 'MA', 'Axixa');

INSERT INTO `tb_cidades` VALUES (2336, 10, 'MA', 'Bacabal');

INSERT INTO `tb_cidades` VALUES (2337, 10, 'MA', 'Bacabeira');

INSERT INTO `tb_cidades` VALUES (2338, 10, 'MA', 'Bacatuba');

INSERT INTO `tb_cidades` VALUES (2339, 10, 'MA', 'Bacuri');

INSERT INTO `tb_cidades` VALUES (2340, 10, 'MA', 'Bacurituba');

INSERT INTO `tb_cidades` VALUES (2341, 10, 'MA', 'Balsas');

INSERT INTO `tb_cidades` VALUES (2342, 10, 'MA', 'Barao de Grajau');

INSERT INTO `tb_cidades` VALUES (2343, 10, 'MA', 'Barao de Tromai');

INSERT INTO `tb_cidades` VALUES (2344, 10, 'MA', 'Barra do Corda');

INSERT INTO `tb_cidades` VALUES (2345, 10, 'MA', 'Barreirinhas');

INSERT INTO `tb_cidades` VALUES (2346, 10, 'MA', 'Barro Duro');

INSERT INTO `tb_cidades` VALUES (2347, 10, 'MA', 'Bela Vista do Maranhao');

INSERT INTO `tb_cidades` VALUES (2348, 10, 'MA', 'Belagua');

INSERT INTO `tb_cidades` VALUES (2349, 10, 'MA', 'Benedito Leite');

INSERT INTO `tb_cidades` VALUES (2350, 10, 'MA', 'Bequimao');

INSERT INTO `tb_cidades` VALUES (2351, 10, 'MA', 'Bernardo do Mearim');

INSERT INTO `tb_cidades` VALUES (2352, 10, 'MA', 'Boa Vista do Gurupi');

INSERT INTO `tb_cidades` VALUES (2353, 10, 'MA', 'Boa Vista do Pindare');

INSERT INTO `tb_cidades` VALUES (2354, 10, 'MA', 'Bom Jardim');

INSERT INTO `tb_cidades` VALUES (2355, 10, 'MA', 'Bom Jesus das Selvas');

INSERT INTO `tb_cidades` VALUES (2356, 10, 'MA', 'Bom Lugar');

INSERT INTO `tb_cidades` VALUES (2357, 10, 'MA', 'Bonfim do Arari');

INSERT INTO `tb_cidades` VALUES (2358, 10, 'MA', 'Brejo');

INSERT INTO `tb_cidades` VALUES (2359, 10, 'MA', 'Brejo de Areia');

INSERT INTO `tb_cidades` VALUES (2360, 10, 'MA', 'Brejo de Sao Felix');

INSERT INTO `tb_cidades` VALUES (2361, 10, 'MA', 'Buriti');

INSERT INTO `tb_cidades` VALUES (2362, 10, 'MA', 'Buriti Bravo');

INSERT INTO `tb_cidades` VALUES (2363, 10, 'MA', 'Buriti Cortado');

INSERT INTO `tb_cidades` VALUES (2364, 10, 'MA', 'Buriticupu');

INSERT INTO `tb_cidades` VALUES (2365, 10, 'MA', 'Buritirama');

INSERT INTO `tb_cidades` VALUES (2366, 10, 'MA', 'Cachoeira Grande');

INSERT INTO `tb_cidades` VALUES (2367, 10, 'MA', 'Cajapio');

INSERT INTO `tb_cidades` VALUES (2368, 10, 'MA', 'Cajari');

INSERT INTO `tb_cidades` VALUES (2369, 10, 'MA', 'Campestre do Maranhao');

INSERT INTO `tb_cidades` VALUES (2370, 10, 'MA', 'Candido Mendes');

INSERT INTO `tb_cidades` VALUES (2371, 10, 'MA', 'Cantanhede');

INSERT INTO `tb_cidades` VALUES (2372, 10, 'MA', 'Capinzal do Norte');

INSERT INTO `tb_cidades` VALUES (2373, 10, 'MA', 'Caraiba do Norte');

INSERT INTO `tb_cidades` VALUES (2374, 10, 'MA', 'Carolina');

INSERT INTO `tb_cidades` VALUES (2375, 10, 'MA', 'Carutapera');

INSERT INTO `tb_cidades` VALUES (2376, 10, 'MA', 'Caxias');

INSERT INTO `tb_cidades` VALUES (2377, 10, 'MA', 'Cedral');

INSERT INTO `tb_cidades` VALUES (2378, 10, 'MA', 'Central do Maranhao');

INSERT INTO `tb_cidades` VALUES (2379, 10, 'MA', 'Centro do Guilherme');

INSERT INTO `tb_cidades` VALUES (2380, 10, 'MA', 'Centro Novo do Maranhao');

INSERT INTO `tb_cidades` VALUES (2381, 10, 'MA', 'Chapadinha');

INSERT INTO `tb_cidades` VALUES (2382, 10, 'MA', 'Cidelandia');

INSERT INTO `tb_cidades` VALUES (2383, 10, 'MA', 'Codo');

INSERT INTO `tb_cidades` VALUES (2384, 10, 'MA', 'Codozinho');

INSERT INTO `tb_cidades` VALUES (2385, 10, 'MA', 'Coelho Neto');

INSERT INTO `tb_cidades` VALUES (2386, 10, 'MA', 'Colinas');

INSERT INTO `tb_cidades` VALUES (2387, 10, 'MA', 'Conceicao do Lago-acu');

INSERT INTO `tb_cidades` VALUES (2388, 10, 'MA', 'Coroata');

INSERT INTO `tb_cidades` VALUES (2389, 10, 'MA', 'Curupa');

INSERT INTO `tb_cidades` VALUES (2390, 10, 'MA', 'Cururupu');

INSERT INTO `tb_cidades` VALUES (2391, 10, 'MA', 'Curva Grande');

INSERT INTO `tb_cidades` VALUES (2392, 10, 'MA', 'Custodio Lima');

INSERT INTO `tb_cidades` VALUES (2393, 10, 'MA', 'Davinopolis');

INSERT INTO `tb_cidades` VALUES (2394, 10, 'MA', 'Dom Pedro');

INSERT INTO `tb_cidades` VALUES (2395, 10, 'MA', 'Duque Bacelar');

INSERT INTO `tb_cidades` VALUES (2396, 10, 'MA', 'Esperantinopolis');

INSERT INTO `tb_cidades` VALUES (2397, 10, 'MA', 'Estandarte');

INSERT INTO `tb_cidades` VALUES (2398, 10, 'MA', 'Estreito');

INSERT INTO `tb_cidades` VALUES (2399, 10, 'MA', 'Feira Nova do Maranhao');

INSERT INTO `tb_cidades` VALUES (2400, 10, 'MA', 'Fernando Falcao');

INSERT INTO `tb_cidades` VALUES (2401, 10, 'MA', 'Formosa da Serra Negra');

INSERT INTO `tb_cidades` VALUES (2402, 10, 'MA', 'Fortaleza dos Nogueiras');

INSERT INTO `tb_cidades` VALUES (2403, 10, 'MA', 'Fortuna');

INSERT INTO `tb_cidades` VALUES (2404, 10, 'MA', 'Frecheiras');

INSERT INTO `tb_cidades` VALUES (2405, 10, 'MA', 'Godofredo Viana');

INSERT INTO `tb_cidades` VALUES (2406, 10, 'MA', 'Goncalves Dias');

INSERT INTO `tb_cidades` VALUES (2407, 10, 'MA', 'Governador Archer');

INSERT INTO `tb_cidades` VALUES (2408, 10, 'MA', 'Governador Edison Lobao');

INSERT INTO `tb_cidades` VALUES (2409, 10, 'MA', 'Governador Eugenio Barros');

INSERT INTO `tb_cidades` VALUES (2410, 10, 'MA', 'Governador Luiz Rocha');

INSERT INTO `tb_cidades` VALUES (2411, 10, 'MA', 'Governador Newton Bello');

INSERT INTO `tb_cidades` VALUES (2412, 10, 'MA', 'Governador Nunes Freire');

INSERT INTO `tb_cidades` VALUES (2413, 10, 'MA', 'Graca Aranha');

INSERT INTO `tb_cidades` VALUES (2414, 10, 'MA', 'Grajau');

INSERT INTO `tb_cidades` VALUES (2415, 10, 'MA', 'Guimaraes');

INSERT INTO `tb_cidades` VALUES (2416, 10, 'MA', 'Humberto de Campos');

INSERT INTO `tb_cidades` VALUES (2417, 10, 'MA', 'Ibipira');

INSERT INTO `tb_cidades` VALUES (2418, 10, 'MA', 'Icatu');

INSERT INTO `tb_cidades` VALUES (2419, 10, 'MA', 'Igarape do Meio');

INSERT INTO `tb_cidades` VALUES (2420, 10, 'MA', 'Igarape Grande');

INSERT INTO `tb_cidades` VALUES (2421, 10, 'MA', 'Imperatriz');

INSERT INTO `tb_cidades` VALUES (2422, 10, 'MA', 'Itaipava do Grajau');

INSERT INTO `tb_cidades` VALUES (2423, 10, 'MA', 'Itamatare');

INSERT INTO `tb_cidades` VALUES (2424, 10, 'MA', 'Itapecuru Mirim');

INSERT INTO `tb_cidades` VALUES (2425, 10, 'MA', 'Itapera');

INSERT INTO `tb_cidades` VALUES (2426, 10, 'MA', 'Itinga do Maranhao');

INSERT INTO `tb_cidades` VALUES (2427, 10, 'MA', 'Jatoba');

INSERT INTO `tb_cidades` VALUES (2428, 10, 'MA', 'Jenipapo dos Vieiras');

INSERT INTO `tb_cidades` VALUES (2429, 10, 'MA', 'Joao Lisboa');

INSERT INTO `tb_cidades` VALUES (2430, 10, 'MA', 'Joselandia');

INSERT INTO `tb_cidades` VALUES (2431, 10, 'MA', 'Junco do Maranhao');

INSERT INTO `tb_cidades` VALUES (2432, 10, 'MA', 'Lago da Pedra');

INSERT INTO `tb_cidades` VALUES (2433, 10, 'MA', 'Lago do Junco');

INSERT INTO `tb_cidades` VALUES (2434, 10, 'MA', 'Lago dos Rodrigues');

INSERT INTO `tb_cidades` VALUES (2435, 10, 'MA', 'Lago Verde');

INSERT INTO `tb_cidades` VALUES (2436, 10, 'MA', 'Lagoa do Mato');

INSERT INTO `tb_cidades` VALUES (2437, 10, 'MA', 'Lagoa Grande do Maranhao');

INSERT INTO `tb_cidades` VALUES (2438, 10, 'MA', 'Lajeado Novo');

INSERT INTO `tb_cidades` VALUES (2439, 10, 'MA', 'Lapela');

INSERT INTO `tb_cidades` VALUES (2440, 10, 'MA', 'Leandro');

INSERT INTO `tb_cidades` VALUES (2441, 10, 'MA', 'Lima Campos');

INSERT INTO `tb_cidades` VALUES (2442, 10, 'MA', 'Loreto');

INSERT INTO `tb_cidades` VALUES (2443, 10, 'MA', 'Luis Domingues');

INSERT INTO `tb_cidades` VALUES (2444, 10, 'MA', 'Magalhaes de Almeida');

INSERT INTO `tb_cidades` VALUES (2445, 10, 'MA', 'Maioba');

INSERT INTO `tb_cidades` VALUES (2446, 10, 'MA', 'Maracacume');

INSERT INTO `tb_cidades` VALUES (2447, 10, 'MA', 'Maraja do Sena');

INSERT INTO `tb_cidades` VALUES (2448, 10, 'MA', 'Maranhaozinho');

INSERT INTO `tb_cidades` VALUES (2449, 10, 'MA', 'Marianopolis');

INSERT INTO `tb_cidades` VALUES (2450, 10, 'MA', 'Mata');

INSERT INTO `tb_cidades` VALUES (2451, 10, 'MA', 'Mata Roma');

INSERT INTO `tb_cidades` VALUES (2452, 10, 'MA', 'Matinha');

INSERT INTO `tb_cidades` VALUES (2453, 10, 'MA', 'Matoes');

INSERT INTO `tb_cidades` VALUES (2454, 10, 'MA', 'Matoes do Norte');

INSERT INTO `tb_cidades` VALUES (2455, 10, 'MA', 'Milagres do Maranhao');

INSERT INTO `tb_cidades` VALUES (2456, 10, 'MA', 'Mirador');

INSERT INTO `tb_cidades` VALUES (2457, 10, 'MA', 'Miranda do Norte');

INSERT INTO `tb_cidades` VALUES (2458, 10, 'MA', 'Mirinzal');

INSERT INTO `tb_cidades` VALUES (2459, 10, 'MA', 'Moncao');

INSERT INTO `tb_cidades` VALUES (2460, 10, 'MA', 'Montes Altos');

INSERT INTO `tb_cidades` VALUES (2461, 10, 'MA', 'Morros');

INSERT INTO `tb_cidades` VALUES (2462, 10, 'MA', 'Nina Rodrigues');

INSERT INTO `tb_cidades` VALUES (2463, 10, 'MA', 'Nova Colinas');

INSERT INTO `tb_cidades` VALUES (2464, 10, 'MA', 'Nova Iorque');

INSERT INTO `tb_cidades` VALUES (2465, 10, 'MA', 'Nova Olinda do Maranhao');

INSERT INTO `tb_cidades` VALUES (2466, 10, 'MA', 'Olho D''agua Das Cunhas');

INSERT INTO `tb_cidades` VALUES (2467, 10, 'MA', 'Olinda Nova do Maranhao');

INSERT INTO `tb_cidades` VALUES (2468, 10, 'MA', 'Paco do Lumiar');

INSERT INTO `tb_cidades` VALUES (2469, 10, 'MA', 'Palmeirandia');

INSERT INTO `tb_cidades` VALUES (2470, 10, 'MA', 'Papagaio');

INSERT INTO `tb_cidades` VALUES (2471, 10, 'MA', 'Paraibano');

INSERT INTO `tb_cidades` VALUES (2472, 10, 'MA', 'Parnarama');

INSERT INTO `tb_cidades` VALUES (2473, 10, 'MA', 'Passagem Franca');

INSERT INTO `tb_cidades` VALUES (2474, 10, 'MA', 'Pastos Bons');

INSERT INTO `tb_cidades` VALUES (2475, 10, 'MA', 'Paulino Neves');

INSERT INTO `tb_cidades` VALUES (2476, 10, 'MA', 'Paulo Ramos');

INSERT INTO `tb_cidades` VALUES (2477, 10, 'MA', 'Pedreiras');

INSERT INTO `tb_cidades` VALUES (2478, 10, 'MA', 'Pedro do Rosario');

INSERT INTO `tb_cidades` VALUES (2479, 10, 'MA', 'Penalva');

INSERT INTO `tb_cidades` VALUES (2480, 10, 'MA', 'Peri Mirim');

INSERT INTO `tb_cidades` VALUES (2481, 10, 'MA', 'Peritoro');

INSERT INTO `tb_cidades` VALUES (2482, 10, 'MA', 'Pimentel');

INSERT INTO `tb_cidades` VALUES (2483, 10, 'MA', 'Pindare Mirim');

INSERT INTO `tb_cidades` VALUES (2484, 10, 'MA', 'Pinheiro');

INSERT INTO `tb_cidades` VALUES (2485, 10, 'MA', 'Pio Xii');

INSERT INTO `tb_cidades` VALUES (2486, 10, 'MA', 'Pirapemas');

INSERT INTO `tb_cidades` VALUES (2487, 10, 'MA', 'Pocao de Pedras');

INSERT INTO `tb_cidades` VALUES (2488, 10, 'MA', 'Porto das Gabarras');

INSERT INTO `tb_cidades` VALUES (2489, 10, 'MA', 'Porto Franco');

INSERT INTO `tb_cidades` VALUES (2490, 10, 'MA', 'Porto Rico do Maranhao');

INSERT INTO `tb_cidades` VALUES (2491, 10, 'MA', 'Presidente Dutra');

INSERT INTO `tb_cidades` VALUES (2492, 10, 'MA', 'Presidente Juscelino');

INSERT INTO `tb_cidades` VALUES (2493, 10, 'MA', 'Presidente Medici');

INSERT INTO `tb_cidades` VALUES (2494, 10, 'MA', 'Presidente Sarney');

INSERT INTO `tb_cidades` VALUES (2495, 10, 'MA', 'Presidente Vargas');

INSERT INTO `tb_cidades` VALUES (2496, 10, 'MA', 'Primeira Cruz');

INSERT INTO `tb_cidades` VALUES (2497, 10, 'MA', 'Raposa');

INSERT INTO `tb_cidades` VALUES (2498, 10, 'MA', 'Resplandes');

INSERT INTO `tb_cidades` VALUES (2499, 10, 'MA', 'Riachao');

INSERT INTO `tb_cidades` VALUES (2500, 10, 'MA', 'Ribamar Fiquene');

INSERT INTO `tb_cidades` VALUES (2501, 10, 'MA', 'Ribeirao Azul');

INSERT INTO `tb_cidades` VALUES (2502, 10, 'MA', 'Rocado');

INSERT INTO `tb_cidades` VALUES (2503, 10, 'MA', 'Roque');

INSERT INTO `tb_cidades` VALUES (2504, 10, 'MA', 'Rosario');

INSERT INTO `tb_cidades` VALUES (2505, 10, 'MA', 'Sambaiba');

INSERT INTO `tb_cidades` VALUES (2506, 10, 'MA', 'Santa Filomena do Maranhao');

INSERT INTO `tb_cidades` VALUES (2507, 10, 'MA', 'Santa Helena');

INSERT INTO `tb_cidades` VALUES (2508, 10, 'MA', 'Santa Ines');

INSERT INTO `tb_cidades` VALUES (2509, 10, 'MA', 'Santa Luzia');

INSERT INTO `tb_cidades` VALUES (2510, 10, 'MA', 'Santa Luzia do Parua');

INSERT INTO `tb_cidades` VALUES (2511, 10, 'MA', 'Santa Quiteria do Maranhao');

INSERT INTO `tb_cidades` VALUES (2512, 10, 'MA', 'Santa Rita');

INSERT INTO `tb_cidades` VALUES (2513, 10, 'MA', 'Santana do Maranhao');

INSERT INTO `tb_cidades` VALUES (2514, 10, 'MA', 'Santo Amaro');

INSERT INTO `tb_cidades` VALUES (2515, 10, 'MA', 'Santo Antonio dos Lopes');

INSERT INTO `tb_cidades` VALUES (2516, 10, 'MA', 'Sao Benedito do Rio Preto');

INSERT INTO `tb_cidades` VALUES (2517, 10, 'MA', 'Sao Bento');

INSERT INTO `tb_cidades` VALUES (2518, 10, 'MA', 'Sao Bernardo');

INSERT INTO `tb_cidades` VALUES (2519, 10, 'MA', 'Sao Domingos do Azeitao');

INSERT INTO `tb_cidades` VALUES (2520, 10, 'MA', 'Sao Domingos do Maranhao');

INSERT INTO `tb_cidades` VALUES (2521, 10, 'MA', 'Sao Felix de Balsas');

INSERT INTO `tb_cidades` VALUES (2522, 10, 'MA', 'Sao Francisco do Brejao');

INSERT INTO `tb_cidades` VALUES (2523, 10, 'MA', 'Sao Francisco do Maranhao');

INSERT INTO `tb_cidades` VALUES (2524, 10, 'MA', 'Sao Joao Batista');

INSERT INTO `tb_cidades` VALUES (2525, 10, 'MA', 'Sao Joao de Cortes');

INSERT INTO `tb_cidades` VALUES (2526, 10, 'MA', 'Sao Joao do Caru');

INSERT INTO `tb_cidades` VALUES (2527, 10, 'MA', 'Sao Joao do Paraiso');

INSERT INTO `tb_cidades` VALUES (2528, 10, 'MA', 'Sao Joao do Soter');

INSERT INTO `tb_cidades` VALUES (2529, 10, 'MA', 'Sao Joao dos Patos');

INSERT INTO `tb_cidades` VALUES (2530, 10, 'MA', 'Sao Joaquim dos Melos');

INSERT INTO `tb_cidades` VALUES (2531, 10, 'MA', 'Sao Jose de Ribamar');

INSERT INTO `tb_cidades` VALUES (2532, 10, 'MA', 'Sao Jose dos Basilios');

INSERT INTO `tb_cidades` VALUES (2533, 10, 'MA', 'Sao Luis');

INSERT INTO `tb_cidades` VALUES (2534, 10, 'MA', 'Sao Luis Gonzaga do Maranhao');

INSERT INTO `tb_cidades` VALUES (2535, 10, 'MA', 'Sao Mateus do Maranhao');

INSERT INTO `tb_cidades` VALUES (2536, 10, 'MA', 'Sao Pedro da Agua Branca');

INSERT INTO `tb_cidades` VALUES (2537, 10, 'MA', 'Sao Pedro dos Crentes');

INSERT INTO `tb_cidades` VALUES (2538, 10, 'MA', 'Sao Raimundo das Mangabeiras');

INSERT INTO `tb_cidades` VALUES (2539, 10, 'MA', 'Sao Raimundo de Codo');

INSERT INTO `tb_cidades` VALUES (2540, 10, 'MA', 'Sao Raimundo do Doca Bezerra');

INSERT INTO `tb_cidades` VALUES (2541, 10, 'MA', 'Sao Roberto');

INSERT INTO `tb_cidades` VALUES (2542, 10, 'MA', 'Sao Vicente Ferrer');

INSERT INTO `tb_cidades` VALUES (2543, 10, 'MA', 'Satubinha');

INSERT INTO `tb_cidades` VALUES (2544, 10, 'MA', 'Senador Alexandre Costa');

INSERT INTO `tb_cidades` VALUES (2545, 10, 'MA', 'Senador La Rocque');

INSERT INTO `tb_cidades` VALUES (2546, 10, 'MA', 'Serrano do Maranhao');

INSERT INTO `tb_cidades` VALUES (2547, 10, 'MA', 'Sitio Novo');

INSERT INTO `tb_cidades` VALUES (2548, 10, 'MA', 'Sucupira do Norte');

INSERT INTO `tb_cidades` VALUES (2549, 10, 'MA', 'Sucupira do Riachao');

INSERT INTO `tb_cidades` VALUES (2550, 10, 'MA', 'Tasso Fragoso');

INSERT INTO `tb_cidades` VALUES (2551, 10, 'MA', 'Timbiras');

INSERT INTO `tb_cidades` VALUES (2552, 10, 'MA', 'Timon');

INSERT INTO `tb_cidades` VALUES (2553, 10, 'MA', 'Trizidela do Vale');

INSERT INTO `tb_cidades` VALUES (2554, 10, 'MA', 'Tufilandia');

INSERT INTO `tb_cidades` VALUES (2555, 10, 'MA', 'Tuntum');

INSERT INTO `tb_cidades` VALUES (2556, 10, 'MA', 'Turiacu');

INSERT INTO `tb_cidades` VALUES (2557, 10, 'MA', 'Turilandia');

INSERT INTO `tb_cidades` VALUES (2558, 10, 'MA', 'Tutoia');

INSERT INTO `tb_cidades` VALUES (2559, 10, 'MA', 'Urbano Santos');

INSERT INTO `tb_cidades` VALUES (2560, 10, 'MA', 'Vargem Grande');

INSERT INTO `tb_cidades` VALUES (2561, 10, 'MA', 'Viana');

INSERT INTO `tb_cidades` VALUES (2562, 10, 'MA', 'Vila Nova dos Martirios');

INSERT INTO `tb_cidades` VALUES (2563, 10, 'MA', 'Vitoria do Mearim');

INSERT INTO `tb_cidades` VALUES (2564, 10, 'MA', 'Vitorino Freire');

INSERT INTO `tb_cidades` VALUES (2565, 10, 'MA', 'Ze Doca');

INSERT INTO `tb_cidades` VALUES (2566, 11, 'MG', 'Abadia dos Dourados');

INSERT INTO `tb_cidades` VALUES (2567, 11, 'MG', 'Abaete');

INSERT INTO `tb_cidades` VALUES (2568, 11, 'MG', 'Abaete dos Mendes');

INSERT INTO `tb_cidades` VALUES (2569, 11, 'MG', 'Abaiba');

INSERT INTO `tb_cidades` VALUES (2570, 11, 'MG', 'Abre Campo');

INSERT INTO `tb_cidades` VALUES (2571, 11, 'MG', 'Abreus');

INSERT INTO `tb_cidades` VALUES (2572, 11, 'MG', 'Acaiaca');

INSERT INTO `tb_cidades` VALUES (2573, 11, 'MG', 'Acucena');

INSERT INTO `tb_cidades` VALUES (2574, 11, 'MG', 'Acurui');

INSERT INTO `tb_cidades` VALUES (2575, 11, 'MG', 'Adao Colares');

INSERT INTO `tb_cidades` VALUES (2576, 11, 'MG', 'Agua Boa');

INSERT INTO `tb_cidades` VALUES (2577, 11, 'MG', 'Agua Branca de Minas');

INSERT INTO `tb_cidades` VALUES (2578, 11, 'MG', 'Agua Comprida');

INSERT INTO `tb_cidades` VALUES (2579, 11, 'MG', 'Agua Viva');

INSERT INTO `tb_cidades` VALUES (2580, 11, 'MG', 'Aguanil');

INSERT INTO `tb_cidades` VALUES (2581, 11, 'MG', 'Aguas de Araxa');

INSERT INTO `tb_cidades` VALUES (2582, 11, 'MG', 'Aguas de Contendas');

INSERT INTO `tb_cidades` VALUES (2583, 11, 'MG', 'Aguas Ferreas');

INSERT INTO `tb_cidades` VALUES (2584, 11, 'MG', 'Aguas Formosas');

INSERT INTO `tb_cidades` VALUES (2585, 11, 'MG', 'Aguas Vermelhas');

INSERT INTO `tb_cidades` VALUES (2586, 11, 'MG', 'Aimores');

INSERT INTO `tb_cidades` VALUES (2587, 11, 'MG', 'Aiuruoca');

INSERT INTO `tb_cidades` VALUES (2588, 11, 'MG', 'Alagoa');

INSERT INTO `tb_cidades` VALUES (2589, 11, 'MG', 'Albertina');

INSERT INTO `tb_cidades` VALUES (2590, 11, 'MG', 'Alberto Isaacson');

INSERT INTO `tb_cidades` VALUES (2591, 11, 'MG', 'Albertos');

INSERT INTO `tb_cidades` VALUES (2592, 11, 'MG', 'Aldeia');

INSERT INTO `tb_cidades` VALUES (2593, 11, 'MG', 'Alegre');

INSERT INTO `tb_cidades` VALUES (2594, 11, 'MG', 'Alegria');

INSERT INTO `tb_cidades` VALUES (2595, 11, 'MG', 'Alem Paraiba');

INSERT INTO `tb_cidades` VALUES (2596, 11, 'MG', 'Alexandrita');

INSERT INTO `tb_cidades` VALUES (2597, 11, 'MG', 'Alfenas');

INSERT INTO `tb_cidades` VALUES (2598, 11, 'MG', 'Alfredo Vasconcelos');

INSERT INTO `tb_cidades` VALUES (2599, 11, 'MG', 'Almeida');

INSERT INTO `tb_cidades` VALUES (2600, 11, 'MG', 'Almenara');

INSERT INTO `tb_cidades` VALUES (2601, 11, 'MG', 'Alpercata');

INSERT INTO `tb_cidades` VALUES (2602, 11, 'MG', 'Alpinopolis');

INSERT INTO `tb_cidades` VALUES (2603, 11, 'MG', 'Alterosa');

INSERT INTO `tb_cidades` VALUES (2604, 11, 'MG', 'Alto Caparao');

INSERT INTO `tb_cidades` VALUES (2605, 11, 'MG', 'Alto Capim');

INSERT INTO `tb_cidades` VALUES (2606, 11, 'MG', 'Alto de Santa Helena');

INSERT INTO `tb_cidades` VALUES (2607, 11, 'MG', 'Alto Jequitiba');

INSERT INTO `tb_cidades` VALUES (2608, 11, 'MG', 'Alto Maranhao');

INSERT INTO `tb_cidades` VALUES (2609, 11, 'MG', 'Alto Rio Doce');

INSERT INTO `tb_cidades` VALUES (2610, 11, 'MG', 'Altolandia');

INSERT INTO `tb_cidades` VALUES (2611, 11, 'MG', 'Alvacao');

INSERT INTO `tb_cidades` VALUES (2612, 11, 'MG', 'Alvarenga');

INSERT INTO `tb_cidades` VALUES (2613, 11, 'MG', 'Alvinopolis');

INSERT INTO `tb_cidades` VALUES (2614, 11, 'MG', 'Alvorada');

INSERT INTO `tb_cidades` VALUES (2615, 11, 'MG', 'Alvorada de Minas');

INSERT INTO `tb_cidades` VALUES (2616, 11, 'MG', 'Amanda');

INSERT INTO `tb_cidades` VALUES (2617, 11, 'MG', 'Amanhece');

INSERT INTO `tb_cidades` VALUES (2618, 11, 'MG', 'Amarantina');

INSERT INTO `tb_cidades` VALUES (2619, 11, 'MG', 'Amparo da Serra');

INSERT INTO `tb_cidades` VALUES (2620, 11, 'MG', 'Andiroba');

INSERT INTO `tb_cidades` VALUES (2621, 11, 'MG', 'Andradas');

INSERT INTO `tb_cidades` VALUES (2622, 11, 'MG', 'Andrelandia');

INSERT INTO `tb_cidades` VALUES (2623, 11, 'MG', 'Andrequice');

INSERT INTO `tb_cidades` VALUES (2624, 11, 'MG', 'Angaturama');

INSERT INTO `tb_cidades` VALUES (2625, 11, 'MG', 'Angelandia');

INSERT INTO `tb_cidades` VALUES (2626, 11, 'MG', 'Angicos de Minas');

INSERT INTO `tb_cidades` VALUES (2627, 11, 'MG', 'Anguereta');

INSERT INTO `tb_cidades` VALUES (2628, 11, 'MG', 'Angustura');

INSERT INTO `tb_cidades` VALUES (2629, 11, 'MG', 'Antonio Carlos');

INSERT INTO `tb_cidades` VALUES (2630, 11, 'MG', 'Antonio Dias');

INSERT INTO `tb_cidades` VALUES (2631, 11, 'MG', 'Antonio dos Santos');

INSERT INTO `tb_cidades` VALUES (2632, 11, 'MG', 'Antonio Ferreira');

INSERT INTO `tb_cidades` VALUES (2633, 11, 'MG', 'Antonio Pereira');

INSERT INTO `tb_cidades` VALUES (2634, 11, 'MG', 'Antonio Prado de Minas');

INSERT INTO `tb_cidades` VALUES (2635, 11, 'MG', 'Antunes');

INSERT INTO `tb_cidades` VALUES (2636, 11, 'MG', 'Aparecida de Minas');

INSERT INTO `tb_cidades` VALUES (2637, 11, 'MG', 'Aracai');

INSERT INTO `tb_cidades` VALUES (2638, 11, 'MG', 'Aracati de Minas');

INSERT INTO `tb_cidades` VALUES (2639, 11, 'MG', 'Aracitaba');

INSERT INTO `tb_cidades` VALUES (2640, 11, 'MG', 'Aracuai');

INSERT INTO `tb_cidades` VALUES (2641, 11, 'MG', 'Araguari');

INSERT INTO `tb_cidades` VALUES (2642, 11, 'MG', 'Aramirim');

INSERT INTO `tb_cidades` VALUES (2643, 11, 'MG', 'Aranha');

INSERT INTO `tb_cidades` VALUES (2644, 11, 'MG', 'Arantina');

INSERT INTO `tb_cidades` VALUES (2645, 11, 'MG', 'Araponga');

INSERT INTO `tb_cidades` VALUES (2646, 11, 'MG', 'Arapora');

INSERT INTO `tb_cidades` VALUES (2647, 11, 'MG', 'Arapua');

INSERT INTO `tb_cidades` VALUES (2648, 11, 'MG', 'Araujos');

INSERT INTO `tb_cidades` VALUES (2649, 11, 'MG', 'Arauna');

INSERT INTO `tb_cidades` VALUES (2650, 11, 'MG', 'Araxa');

INSERT INTO `tb_cidades` VALUES (2651, 11, 'MG', 'Arcangelo');

INSERT INTO `tb_cidades` VALUES (2652, 11, 'MG', 'Arceburgo');

INSERT INTO `tb_cidades` VALUES (2653, 11, 'MG', 'Arcos');

INSERT INTO `tb_cidades` VALUES (2654, 11, 'MG', 'Areado');

INSERT INTO `tb_cidades` VALUES (2655, 11, 'MG', 'Argenita');

INSERT INTO `tb_cidades` VALUES (2656, 11, 'MG', 'Argirita');

INSERT INTO `tb_cidades` VALUES (2657, 11, 'MG', 'Aricanduva');

INSERT INTO `tb_cidades` VALUES (2658, 11, 'MG', 'Arinos');

INSERT INTO `tb_cidades` VALUES (2659, 11, 'MG', 'Aristides Batista');

INSERT INTO `tb_cidades` VALUES (2660, 11, 'MG', 'Ascencao');

INSERT INTO `tb_cidades` VALUES (2661, 11, 'MG', 'Assarai');

INSERT INTO `tb_cidades` VALUES (2662, 11, 'MG', 'Astolfo Dutra');

INSERT INTO `tb_cidades` VALUES (2663, 11, 'MG', 'Ataleia');

INSERT INTO `tb_cidades` VALUES (2664, 11, 'MG', 'Augusto de Lima');

INSERT INTO `tb_cidades` VALUES (2665, 11, 'MG', 'Avai do Jacinto');

INSERT INTO `tb_cidades` VALUES (2666, 11, 'MG', 'Azurita');

INSERT INTO `tb_cidades` VALUES (2667, 11, 'MG', 'Babilonia');

INSERT INTO `tb_cidades` VALUES (2668, 11, 'MG', 'Bacao');

INSERT INTO `tb_cidades` VALUES (2669, 11, 'MG', 'Baependi');

INSERT INTO `tb_cidades` VALUES (2670, 11, 'MG', 'Baguari');

INSERT INTO `tb_cidades` VALUES (2671, 11, 'MG', 'Baioes');

INSERT INTO `tb_cidades` VALUES (2672, 11, 'MG', 'Baixa');

INSERT INTO `tb_cidades` VALUES (2673, 11, 'MG', 'Balbinopolis');

INSERT INTO `tb_cidades` VALUES (2674, 11, 'MG', 'Baldim');

INSERT INTO `tb_cidades` VALUES (2675, 11, 'MG', 'Bambui');

INSERT INTO `tb_cidades` VALUES (2676, 11, 'MG', 'Bandeira');

INSERT INTO `tb_cidades` VALUES (2677, 11, 'MG', 'Bandeira do Sul');

INSERT INTO `tb_cidades` VALUES (2678, 11, 'MG', 'Bandeirantes');

INSERT INTO `tb_cidades` VALUES (2679, 11, 'MG', 'Barao de Cocais');

INSERT INTO `tb_cidades` VALUES (2680, 11, 'MG', 'Barao de Monte Alto');

INSERT INTO `tb_cidades` VALUES (2681, 11, 'MG', 'Barbacena');

INSERT INTO `tb_cidades` VALUES (2682, 11, 'MG', 'Barra Alegre');

INSERT INTO `tb_cidades` VALUES (2683, 11, 'MG', 'Barra da Figueira');

INSERT INTO `tb_cidades` VALUES (2684, 11, 'MG', 'Barra do Ariranha');

INSERT INTO `tb_cidades` VALUES (2685, 11, 'MG', 'Barra do Cuiete');

INSERT INTO `tb_cidades` VALUES (2686, 11, 'MG', 'Barra Feliz');

INSERT INTO `tb_cidades` VALUES (2687, 11, 'MG', 'Barra Longa');

INSERT INTO `tb_cidades` VALUES (2688, 11, 'MG', 'Barranco Alto');

INSERT INTO `tb_cidades` VALUES (2689, 11, 'MG', 'Barreiro');

INSERT INTO `tb_cidades` VALUES (2690, 11, 'MG', 'Barreiro Branco');

INSERT INTO `tb_cidades` VALUES (2691, 11, 'MG', 'Barreiro da Raiz');

INSERT INTO `tb_cidades` VALUES (2692, 11, 'MG', 'Barreiro do Rio Verde');

INSERT INTO `tb_cidades` VALUES (2693, 11, 'MG', 'Barretos de Alvinopolis');

INSERT INTO `tb_cidades` VALUES (2694, 11, 'MG', 'Barrocao');

INSERT INTO `tb_cidades` VALUES (2695, 11, 'MG', 'Barroso');

INSERT INTO `tb_cidades` VALUES (2696, 11, 'MG', 'Bau');

INSERT INTO `tb_cidades` VALUES (2697, 11, 'MG', 'Bela Vista de Minas');

INSERT INTO `tb_cidades` VALUES (2698, 11, 'MG', 'Belisario');

INSERT INTO `tb_cidades` VALUES (2699, 11, 'MG', 'Belmiro Braga');

INSERT INTO `tb_cidades` VALUES (2700, 11, 'MG', 'Belo Horizonte');

INSERT INTO `tb_cidades` VALUES (2701, 11, 'MG', 'Belo Oriente');

INSERT INTO `tb_cidades` VALUES (2702, 11, 'MG', 'Belo Vale');

INSERT INTO `tb_cidades` VALUES (2703, 11, 'MG', 'Bentopolis de Minas');

INSERT INTO `tb_cidades` VALUES (2704, 11, 'MG', 'Berilo');

INSERT INTO `tb_cidades` VALUES (2705, 11, 'MG', 'Berizal');

INSERT INTO `tb_cidades` VALUES (2706, 11, 'MG', 'Bertopolis');

INSERT INTO `tb_cidades` VALUES (2707, 11, 'MG', 'Betim');

INSERT INTO `tb_cidades` VALUES (2708, 11, 'MG', 'Bias Fortes');

INSERT INTO `tb_cidades` VALUES (2709, 11, 'MG', 'Bicas');

INSERT INTO `tb_cidades` VALUES (2710, 11, 'MG', 'Bicuiba');

INSERT INTO `tb_cidades` VALUES (2711, 11, 'MG', 'Biquinhas');

INSERT INTO `tb_cidades` VALUES (2712, 11, 'MG', 'Bituri');

INSERT INTO `tb_cidades` VALUES (2713, 11, 'MG', 'Boa Esperanca');

INSERT INTO `tb_cidades` VALUES (2714, 11, 'MG', 'Boa Familia');

INSERT INTO `tb_cidades` VALUES (2715, 11, 'MG', 'Boa Uniao de Itabirinha');

INSERT INTO `tb_cidades` VALUES (2716, 11, 'MG', 'Boa Vista de Minas');

INSERT INTO `tb_cidades` VALUES (2717, 11, 'MG', 'Bocaina de Minas');

INSERT INTO `tb_cidades` VALUES (2718, 11, 'MG', 'Bocaiuva');

INSERT INTO `tb_cidades` VALUES (2719, 11, 'MG', 'Bom Despacho');

INSERT INTO `tb_cidades` VALUES (2720, 11, 'MG', 'Bom Jardim de Minas');

INSERT INTO `tb_cidades` VALUES (2721, 11, 'MG', 'Bom Jesus da Cachoeira');

INSERT INTO `tb_cidades` VALUES (2722, 11, 'MG', 'Bom Jesus da Penha');

INSERT INTO `tb_cidades` VALUES (2723, 11, 'MG', 'Bom Jesus de Cardosos');

INSERT INTO `tb_cidades` VALUES (2724, 11, 'MG', 'Bom Jesus do Amparo');

INSERT INTO `tb_cidades` VALUES (2725, 11, 'MG', 'Bom Jesus do Divino');

INSERT INTO `tb_cidades` VALUES (2726, 11, 'MG', 'Bom Jesus do Galho');

INSERT INTO `tb_cidades` VALUES (2727, 11, 'MG', 'Bom Jesus do Madeira');

INSERT INTO `tb_cidades` VALUES (2728, 11, 'MG', 'Bom Pastor');

INSERT INTO `tb_cidades` VALUES (2729, 11, 'MG', 'Bom Repouso');

INSERT INTO `tb_cidades` VALUES (2730, 11, 'MG', 'Bom Retiro');

INSERT INTO `tb_cidades` VALUES (2731, 11, 'MG', 'Bom Sucesso');

INSERT INTO `tb_cidades` VALUES (2732, 11, 'MG', 'Bom Sucesso de Patos');

INSERT INTO `tb_cidades` VALUES (2733, 11, 'MG', 'Bonanca');

INSERT INTO `tb_cidades` VALUES (2734, 11, 'MG', 'Bonfim');

INSERT INTO `tb_cidades` VALUES (2735, 11, 'MG', 'Bonfinopolis de Minas');

INSERT INTO `tb_cidades` VALUES (2736, 11, 'MG', 'Bonito de Minas');

INSERT INTO `tb_cidades` VALUES (2737, 11, 'MG', 'Borba Gato');

INSERT INTO `tb_cidades` VALUES (2738, 11, 'MG', 'Borda da Mata');

INSERT INTO `tb_cidades` VALUES (2739, 11, 'MG', 'Botelhos');

INSERT INTO `tb_cidades` VALUES (2740, 11, 'MG', 'Botumirim');

INSERT INTO `tb_cidades` VALUES (2741, 11, 'MG', 'Bras Pires');

INSERT INTO `tb_cidades` VALUES (2742, 11, 'MG', 'Brasilandia de Minas');

INSERT INTO `tb_cidades` VALUES (2743, 11, 'MG', 'Brasilia de Minas');

INSERT INTO `tb_cidades` VALUES (2744, 11, 'MG', 'Brasopolis');

INSERT INTO `tb_cidades` VALUES (2745, 11, 'MG', 'Braunas');

INSERT INTO `tb_cidades` VALUES (2746, 11, 'MG', 'Brejauba');

INSERT INTO `tb_cidades` VALUES (2747, 11, 'MG', 'Brejaubinha');

INSERT INTO `tb_cidades` VALUES (2748, 11, 'MG', 'Brejo Bonito');

INSERT INTO `tb_cidades` VALUES (2749, 11, 'MG', 'Brejo do Amparo');

INSERT INTO `tb_cidades` VALUES (2750, 11, 'MG', 'Brumadinho');

INSERT INTO `tb_cidades` VALUES (2751, 11, 'MG', 'Brumal');

INSERT INTO `tb_cidades` VALUES (2752, 11, 'MG', 'Buarque de Macedo');

INSERT INTO `tb_cidades` VALUES (2753, 11, 'MG', 'Bueno');

INSERT INTO `tb_cidades` VALUES (2754, 11, 'MG', 'Bueno Brandao');

INSERT INTO `tb_cidades` VALUES (2755, 11, 'MG', 'Buenopolis');

INSERT INTO `tb_cidades` VALUES (2756, 11, 'MG', 'Bugre');

INSERT INTO `tb_cidades` VALUES (2757, 11, 'MG', 'Buritis');

INSERT INTO `tb_cidades` VALUES (2758, 11, 'MG', 'Buritizeiro');

INSERT INTO `tb_cidades` VALUES (2759, 11, 'MG', 'Caatinga');

INSERT INTO `tb_cidades` VALUES (2760, 11, 'MG', 'Cabeceira Grande');

INSERT INTO `tb_cidades` VALUES (2761, 11, 'MG', 'Cabo Verde');

INSERT INTO `tb_cidades` VALUES (2762, 11, 'MG', 'Caburu');

INSERT INTO `tb_cidades` VALUES (2763, 11, 'MG', 'Cacaratiba');

INSERT INTO `tb_cidades` VALUES (2764, 11, 'MG', 'Cacarema');

INSERT INTO `tb_cidades` VALUES (2765, 11, 'MG', 'Cachoeira Alegre');

INSERT INTO `tb_cidades` VALUES (2766, 11, 'MG', 'Cachoeira da Prata');

INSERT INTO `tb_cidades` VALUES (2767, 11, 'MG', 'Cachoeira de Minas');

INSERT INTO `tb_cidades` VALUES (2768, 11, 'MG', 'Cachoeira de Pajeu');

INSERT INTO `tb_cidades` VALUES (2769, 11, 'MG', 'Cachoeira de Santa Cruz');

INSERT INTO `tb_cidades` VALUES (2770, 11, 'MG', 'Cachoeira do Brumado');

INSERT INTO `tb_cidades` VALUES (2771, 11, 'MG', 'Cachoeira do Campo');

INSERT INTO `tb_cidades` VALUES (2772, 11, 'MG', 'Cachoeira do Manteiga');

INSERT INTO `tb_cidades` VALUES (2773, 11, 'MG', 'Cachoeira do Vale');

INSERT INTO `tb_cidades` VALUES (2774, 11, 'MG', 'Cachoeira dos Antunes');

INSERT INTO `tb_cidades` VALUES (2775, 11, 'MG', 'Cachoeira Dourada');

INSERT INTO `tb_cidades` VALUES (2776, 11, 'MG', 'Cachoeirinha');

INSERT INTO `tb_cidades` VALUES (2777, 11, 'MG', 'Caetano Lopes');

INSERT INTO `tb_cidades` VALUES (2778, 11, 'MG', 'Caetanopolis');

INSERT INTO `tb_cidades` VALUES (2779, 11, 'MG', 'Caete');

INSERT INTO `tb_cidades` VALUES (2780, 11, 'MG', 'Caiana');

INSERT INTO `tb_cidades` VALUES (2781, 11, 'MG', 'Caiapo');

INSERT INTO `tb_cidades` VALUES (2782, 11, 'MG', 'Cajuri');

INSERT INTO `tb_cidades` VALUES (2783, 11, 'MG', 'Caldas');

INSERT INTO `tb_cidades` VALUES (2784, 11, 'MG', 'Calixto');

INSERT INTO `tb_cidades` VALUES (2785, 11, 'MG', 'Camacho');

INSERT INTO `tb_cidades` VALUES (2786, 11, 'MG', 'Camanducaia');

INSERT INTO `tb_cidades` VALUES (2787, 11, 'MG', 'Camargos');

INSERT INTO `tb_cidades` VALUES (2788, 11, 'MG', 'Cambui');

INSERT INTO `tb_cidades` VALUES (2789, 11, 'MG', 'Cambuquira');

INSERT INTO `tb_cidades` VALUES (2790, 11, 'MG', 'Campanario');

INSERT INTO `tb_cidades` VALUES (2791, 11, 'MG', 'Campanha');

INSERT INTO `tb_cidades` VALUES (2792, 11, 'MG', 'Campestre');

INSERT INTO `tb_cidades` VALUES (2793, 11, 'MG', 'Campestrinho');

INSERT INTO `tb_cidades` VALUES (2794, 11, 'MG', 'Campina Verde');

INSERT INTO `tb_cidades` VALUES (2795, 11, 'MG', 'Campo Alegre de Minas');

INSERT INTO `tb_cidades` VALUES (2796, 11, 'MG', 'Campo Azul');

INSERT INTO `tb_cidades` VALUES (2797, 11, 'MG', 'Campo Belo');

INSERT INTO `tb_cidades` VALUES (2798, 11, 'MG', 'Campo do Meio');

INSERT INTO `tb_cidades` VALUES (2799, 11, 'MG', 'Campo Florido');

INSERT INTO `tb_cidades` VALUES (2800, 11, 'MG', 'Campo Redondo');

INSERT INTO `tb_cidades` VALUES (2801, 11, 'MG', 'Campolide');

INSERT INTO `tb_cidades` VALUES (2802, 11, 'MG', 'Campos Altos');

INSERT INTO `tb_cidades` VALUES (2803, 11, 'MG', 'Campos Gerais');

INSERT INTO `tb_cidades` VALUES (2804, 11, 'MG', 'Cana Verde');

INSERT INTO `tb_cidades` VALUES (2805, 11, 'MG', 'Canaa');

INSERT INTO `tb_cidades` VALUES (2806, 11, 'MG', 'Canabrava');

INSERT INTO `tb_cidades` VALUES (2807, 11, 'MG', 'Canapolis');

INSERT INTO `tb_cidades` VALUES (2808, 11, 'MG', 'Canastrao');

INSERT INTO `tb_cidades` VALUES (2809, 11, 'MG', 'Candeias');

INSERT INTO `tb_cidades` VALUES (2810, 11, 'MG', 'Canoeiros');

INSERT INTO `tb_cidades` VALUES (2811, 11, 'MG', 'Cantagalo');

INSERT INTO `tb_cidades` VALUES (2812, 11, 'MG', 'Caparao');

INSERT INTO `tb_cidades` VALUES (2813, 11, 'MG', 'Capela Nova');

INSERT INTO `tb_cidades` VALUES (2814, 11, 'MG', 'Capelinha');

INSERT INTO `tb_cidades` VALUES (2815, 11, 'MG', 'Capetinga');

INSERT INTO `tb_cidades` VALUES (2816, 11, 'MG', 'Capim Branco');

INSERT INTO `tb_cidades` VALUES (2817, 11, 'MG', 'Capinopolis');

INSERT INTO `tb_cidades` VALUES (2818, 11, 'MG', 'Capitania');

INSERT INTO `tb_cidades` VALUES (2819, 11, 'MG', 'Capitao Andrade');

INSERT INTO `tb_cidades` VALUES (2820, 11, 'MG', 'Capitao Eneas');

INSERT INTO `tb_cidades` VALUES (2821, 11, 'MG', 'Capitolio');

INSERT INTO `tb_cidades` VALUES (2822, 11, 'MG', 'Caputira');

INSERT INTO `tb_cidades` VALUES (2823, 11, 'MG', 'Carai');

INSERT INTO `tb_cidades` VALUES (2824, 11, 'MG', 'Caranaiba');

INSERT INTO `tb_cidades` VALUES (2825, 11, 'MG', 'Carandai');

INSERT INTO `tb_cidades` VALUES (2826, 11, 'MG', 'Carangola');

INSERT INTO `tb_cidades` VALUES (2827, 11, 'MG', 'Caratinga');

INSERT INTO `tb_cidades` VALUES (2828, 11, 'MG', 'Carbonita');

INSERT INTO `tb_cidades` VALUES (2829, 11, 'MG', 'Cardeal Mota');

INSERT INTO `tb_cidades` VALUES (2830, 11, 'MG', 'Careacu');

INSERT INTO `tb_cidades` VALUES (2831, 11, 'MG', 'Carioca');

INSERT INTO `tb_cidades` VALUES (2832, 11, 'MG', 'Carlos Alves');

INSERT INTO `tb_cidades` VALUES (2833, 11, 'MG', 'Carlos Chagas');

INSERT INTO `tb_cidades` VALUES (2834, 11, 'MG', 'Carmesia');

INSERT INTO `tb_cidades` VALUES (2835, 11, 'MG', 'Carmo da Cachoeira');

INSERT INTO `tb_cidades` VALUES (2836, 11, 'MG', 'Carmo da Mata');

INSERT INTO `tb_cidades` VALUES (2837, 11, 'MG', 'Carmo de Minas');

INSERT INTO `tb_cidades` VALUES (2838, 11, 'MG', 'Carmo do Cajuru');

INSERT INTO `tb_cidades` VALUES (2839, 11, 'MG', 'Carmo do Paranaiba');

INSERT INTO `tb_cidades` VALUES (2840, 11, 'MG', 'Carmo do Rio Claro');

INSERT INTO `tb_cidades` VALUES (2841, 11, 'MG', 'Carmopolis de Minas');

INSERT INTO `tb_cidades` VALUES (2842, 11, 'MG', 'Carneirinho');

INSERT INTO `tb_cidades` VALUES (2843, 11, 'MG', 'Carrancas');

INSERT INTO `tb_cidades` VALUES (2844, 11, 'MG', 'Carvalho de Brito');

INSERT INTO `tb_cidades` VALUES (2845, 11, 'MG', 'Carvalhopolis');

INSERT INTO `tb_cidades` VALUES (2846, 11, 'MG', 'Carvalhos');

INSERT INTO `tb_cidades` VALUES (2847, 11, 'MG', 'Casa Grande');

INSERT INTO `tb_cidades` VALUES (2848, 11, 'MG', 'Cascalho Rico');

INSERT INTO `tb_cidades` VALUES (2849, 11, 'MG', 'Cassia');

INSERT INTO `tb_cidades` VALUES (2850, 11, 'MG', 'Cataguarino');

INSERT INTO `tb_cidades` VALUES (2851, 11, 'MG', 'Cataguases');

INSERT INTO `tb_cidades` VALUES (2852, 11, 'MG', 'Catajas');

INSERT INTO `tb_cidades` VALUES (2853, 11, 'MG', 'Catas Altas');

INSERT INTO `tb_cidades` VALUES (2854, 11, 'MG', 'Catas Altas da Noruega');

INSERT INTO `tb_cidades` VALUES (2855, 11, 'MG', 'Catiara');

INSERT INTO `tb_cidades` VALUES (2856, 11, 'MG', 'Catuji');

INSERT INTO `tb_cidades` VALUES (2857, 11, 'MG', 'Catune');

INSERT INTO `tb_cidades` VALUES (2858, 11, 'MG', 'Catuni');

INSERT INTO `tb_cidades` VALUES (2859, 11, 'MG', 'Catuti');

INSERT INTO `tb_cidades` VALUES (2860, 11, 'MG', 'Caxambu');

INSERT INTO `tb_cidades` VALUES (2861, 11, 'MG', 'Cedro do Abaete');

INSERT INTO `tb_cidades` VALUES (2862, 11, 'MG', 'Centenario');

INSERT INTO `tb_cidades` VALUES (2863, 11, 'MG', 'Central de Minas');

INSERT INTO `tb_cidades` VALUES (2864, 11, 'MG', 'Central de Santa Helena');

INSERT INTO `tb_cidades` VALUES (2865, 11, 'MG', 'Centralina');

INSERT INTO `tb_cidades` VALUES (2866, 11, 'MG', 'Cervo');

INSERT INTO `tb_cidades` VALUES (2867, 11, 'MG', 'Chacara');

INSERT INTO `tb_cidades` VALUES (2868, 11, 'MG', 'Chale');

INSERT INTO `tb_cidades` VALUES (2869, 11, 'MG', 'Chapada de Minas');

INSERT INTO `tb_cidades` VALUES (2870, 11, 'MG', 'Chapada do Norte');

INSERT INTO `tb_cidades` VALUES (2871, 11, 'MG', 'Chapada Gaucha');

INSERT INTO `tb_cidades` VALUES (2872, 11, 'MG', 'Chaveslandia');

INSERT INTO `tb_cidades` VALUES (2873, 11, 'MG', 'Chiador');

INSERT INTO `tb_cidades` VALUES (2874, 11, 'MG', 'Chonim');

INSERT INTO `tb_cidades` VALUES (2875, 11, 'MG', 'Chumbo');

INSERT INTO `tb_cidades` VALUES (2876, 11, 'MG', 'Cipotanea');

INSERT INTO `tb_cidades` VALUES (2877, 11, 'MG', 'Cisneiros');

INSERT INTO `tb_cidades` VALUES (2878, 11, 'MG', 'Citrolandia');

INSERT INTO `tb_cidades` VALUES (2879, 11, 'MG', 'Claraval');

INSERT INTO `tb_cidades` VALUES (2880, 11, 'MG', 'Claro de Minas');

INSERT INTO `tb_cidades` VALUES (2881, 11, 'MG', 'Claro dos Pocoes');

INSERT INTO `tb_cidades` VALUES (2882, 11, 'MG', 'Claudio');

INSERT INTO `tb_cidades` VALUES (2883, 11, 'MG', 'Claudio Manuel');

INSERT INTO `tb_cidades` VALUES (2884, 11, 'MG', 'Cocais');

INSERT INTO `tb_cidades` VALUES (2885, 11, 'MG', 'Coco');

INSERT INTO `tb_cidades` VALUES (2886, 11, 'MG', 'Coimbra');

INSERT INTO `tb_cidades` VALUES (2887, 11, 'MG', 'Coluna');

INSERT INTO `tb_cidades` VALUES (2888, 11, 'MG', 'Comendador Gomes');

INSERT INTO `tb_cidades` VALUES (2889, 11, 'MG', 'Comercinho');

INSERT INTO `tb_cidades` VALUES (2890, 11, 'MG', 'Conceicao da Aparecida');

INSERT INTO `tb_cidades` VALUES (2891, 11, 'MG', 'Conceicao da Barra de Minas');

INSERT INTO `tb_cidades` VALUES (2892, 11, 'MG', 'Conceicao da Boa Vista');

INSERT INTO `tb_cidades` VALUES (2893, 11, 'MG', 'Conceicao da Brejauba');

INSERT INTO `tb_cidades` VALUES (2894, 11, 'MG', 'Conceicao da Ibitipoca');

INSERT INTO `tb_cidades` VALUES (2895, 11, 'MG', 'Conceicao das Alagoas');

INSERT INTO `tb_cidades` VALUES (2896, 11, 'MG', 'Conceicao das Pedras');

INSERT INTO `tb_cidades` VALUES (2897, 11, 'MG', 'Conceicao de Ipanema');

INSERT INTO `tb_cidades` VALUES (2898, 11, 'MG', 'Conceicao de Itagua');

INSERT INTO `tb_cidades` VALUES (2899, 11, 'MG', 'Conceicao de Minas');

INSERT INTO `tb_cidades` VALUES (2900, 11, 'MG', 'Conceicao de Piracicaba');

INSERT INTO `tb_cidades` VALUES (2901, 11, 'MG', 'Conceicao de Tronqueiras');

INSERT INTO `tb_cidades` VALUES (2902, 11, 'MG', 'Conceicao do Capim');

INSERT INTO `tb_cidades` VALUES (2903, 11, 'MG', 'Conceicao do Formoso');

INSERT INTO `tb_cidades` VALUES (2904, 11, 'MG', 'Conceicao do Mato Dentro');

INSERT INTO `tb_cidades` VALUES (2905, 11, 'MG', 'Conceicao do Para');

INSERT INTO `tb_cidades` VALUES (2906, 11, 'MG', 'Conceicao do Rio Acima');

INSERT INTO `tb_cidades` VALUES (2907, 11, 'MG', 'Conceicao do Rio Verde');

INSERT INTO `tb_cidades` VALUES (2908, 11, 'MG', 'Conceicao dos Ouros');

INSERT INTO `tb_cidades` VALUES (2909, 11, 'MG', 'Concordia de Mucuri');

INSERT INTO `tb_cidades` VALUES (2910, 11, 'MG', 'Condado do Norte');

INSERT INTO `tb_cidades` VALUES (2911, 11, 'MG', 'Conego Joao Pio');

INSERT INTO `tb_cidades` VALUES (2912, 11, 'MG', 'Conego Marinho');

INSERT INTO `tb_cidades` VALUES (2913, 11, 'MG', 'Confins');

INSERT INTO `tb_cidades` VALUES (2914, 11, 'MG', 'Congonhal');

INSERT INTO `tb_cidades` VALUES (2915, 11, 'MG', 'Congonhas');

INSERT INTO `tb_cidades` VALUES (2916, 11, 'MG', 'Congonhas do Norte');

INSERT INTO `tb_cidades` VALUES (2917, 11, 'MG', 'Conquista');

INSERT INTO `tb_cidades` VALUES (2918, 11, 'MG', 'Conselheiro Lafaiete');

INSERT INTO `tb_cidades` VALUES (2919, 11, 'MG', 'Conselheiro Mata');

INSERT INTO `tb_cidades` VALUES (2920, 11, 'MG', 'Conselheiro Pena');

INSERT INTO `tb_cidades` VALUES (2921, 11, 'MG', 'Consolacao');

INSERT INTO `tb_cidades` VALUES (2922, 11, 'MG', 'Contagem');

INSERT INTO `tb_cidades` VALUES (2923, 11, 'MG', 'Contrato');

INSERT INTO `tb_cidades` VALUES (2924, 11, 'MG', 'Contria');

INSERT INTO `tb_cidades` VALUES (2925, 11, 'MG', 'Coqueiral');

INSERT INTO `tb_cidades` VALUES (2926, 11, 'MG', 'Coracao de Jesus');

INSERT INTO `tb_cidades` VALUES (2927, 11, 'MG', 'Cordisburgo');

INSERT INTO `tb_cidades` VALUES (2928, 11, 'MG', 'Cordislandia');

INSERT INTO `tb_cidades` VALUES (2929, 11, 'MG', 'Corinto');

INSERT INTO `tb_cidades` VALUES (2930, 11, 'MG', 'Coroaci');

INSERT INTO `tb_cidades` VALUES (2931, 11, 'MG', 'Coromandel');

INSERT INTO `tb_cidades` VALUES (2932, 11, 'MG', 'Coronel Fabriciano');

INSERT INTO `tb_cidades` VALUES (2933, 11, 'MG', 'Coronel Murta');

INSERT INTO `tb_cidades` VALUES (2934, 11, 'MG', 'Coronel Pacheco');

INSERT INTO `tb_cidades` VALUES (2935, 11, 'MG', 'Coronel Xavier Chaves');

INSERT INTO `tb_cidades` VALUES (2936, 11, 'MG', 'Corrego Danta');

INSERT INTO `tb_cidades` VALUES (2937, 11, 'MG', 'Corrego do Barro');

INSERT INTO `tb_cidades` VALUES (2938, 11, 'MG', 'Corrego do Bom Jesus');

INSERT INTO `tb_cidades` VALUES (2939, 11, 'MG', 'Corrego do Ouro');

INSERT INTO `tb_cidades` VALUES (2940, 11, 'MG', 'Corrego Fundo');

INSERT INTO `tb_cidades` VALUES (2941, 11, 'MG', 'Corrego Novo');

INSERT INTO `tb_cidades` VALUES (2942, 11, 'MG', 'Corregos');

INSERT INTO `tb_cidades` VALUES (2943, 11, 'MG', 'Correia de Almeida');

INSERT INTO `tb_cidades` VALUES (2944, 11, 'MG', 'Correntinho');

INSERT INTO `tb_cidades` VALUES (2945, 11, 'MG', 'Costa Sena');

INSERT INTO `tb_cidades` VALUES (2946, 11, 'MG', 'Costas');

INSERT INTO `tb_cidades` VALUES (2947, 11, 'MG', 'Costas da Mantiqueira');

INSERT INTO `tb_cidades` VALUES (2948, 11, 'MG', 'Couto de Magalhaes de Minas');

INSERT INTO `tb_cidades` VALUES (2949, 11, 'MG', 'Crisolia');

INSERT INTO `tb_cidades` VALUES (2950, 11, 'MG', 'Crisolita');

INSERT INTO `tb_cidades` VALUES (2951, 11, 'MG', 'Crispim Jaques');

INSERT INTO `tb_cidades` VALUES (2952, 11, 'MG', 'Cristais');

INSERT INTO `tb_cidades` VALUES (2953, 11, 'MG', 'Cristalia');

INSERT INTO `tb_cidades` VALUES (2954, 11, 'MG', 'Cristiano Otoni');

INSERT INTO `tb_cidades` VALUES (2955, 11, 'MG', 'Cristina');

INSERT INTO `tb_cidades` VALUES (2956, 11, 'MG', 'Crucilandia');

INSERT INTO `tb_cidades` VALUES (2957, 11, 'MG', 'Cruzeiro da Fortaleza');

INSERT INTO `tb_cidades` VALUES (2958, 11, 'MG', 'Cruzeiro dos Peixotos');

INSERT INTO `tb_cidades` VALUES (2959, 11, 'MG', 'Cruzilia');

INSERT INTO `tb_cidades` VALUES (2960, 11, 'MG', 'Cubas');

INSERT INTO `tb_cidades` VALUES (2961, 11, 'MG', 'Cuite Velho');

INSERT INTO `tb_cidades` VALUES (2962, 11, 'MG', 'Cuparaque');

INSERT INTO `tb_cidades` VALUES (2963, 11, 'MG', 'Curimatai');

INSERT INTO `tb_cidades` VALUES (2964, 11, 'MG', 'Curral de Dentro');

INSERT INTO `tb_cidades` VALUES (2965, 11, 'MG', 'Curvelo');

INSERT INTO `tb_cidades` VALUES (2966, 11, 'MG', 'Datas');

INSERT INTO `tb_cidades` VALUES (2967, 11, 'MG', 'Delfim Moreira');

INSERT INTO `tb_cidades` VALUES (2968, 11, 'MG', 'Delfinopolis');

INSERT INTO `tb_cidades` VALUES (2969, 11, 'MG', 'Delta');

INSERT INTO `tb_cidades` VALUES (2970, 11, 'MG', 'Deputado Augusto Clementino');

INSERT INTO `tb_cidades` VALUES (2971, 11, 'MG', 'Derribadinha');

INSERT INTO `tb_cidades` VALUES (2972, 11, 'MG', 'Descoberto');

INSERT INTO `tb_cidades` VALUES (2973, 11, 'MG', 'Desembargador Otoni');

INSERT INTO `tb_cidades` VALUES (2974, 11, 'MG', 'Desemboque');

INSERT INTO `tb_cidades` VALUES (2975, 11, 'MG', 'Desterro de Entre Rios');

INSERT INTO `tb_cidades` VALUES (2976, 11, 'MG', 'Desterro do Melo');

INSERT INTO `tb_cidades` VALUES (2977, 11, 'MG', 'Diamante de Uba');

INSERT INTO `tb_cidades` VALUES (2978, 11, 'MG', 'Diamantina');

INSERT INTO `tb_cidades` VALUES (2979, 11, 'MG', 'Dias');

INSERT INTO `tb_cidades` VALUES (2980, 11, 'MG', 'Dias Tavares/siderurgica');

INSERT INTO `tb_cidades` VALUES (2981, 11, 'MG', 'Diogo de Vasconcelos');

INSERT INTO `tb_cidades` VALUES (2982, 11, 'MG', 'Dionisio');

INSERT INTO `tb_cidades` VALUES (2983, 11, 'MG', 'Divinesia');

INSERT INTO `tb_cidades` VALUES (2984, 11, 'MG', 'Divino');

INSERT INTO `tb_cidades` VALUES (2985, 11, 'MG', 'Divino das Laranjeiras');

INSERT INTO `tb_cidades` VALUES (2986, 11, 'MG', 'Divino de Virgolandia');

INSERT INTO `tb_cidades` VALUES (2987, 11, 'MG', 'Divino Espirito Santo');

INSERT INTO `tb_cidades` VALUES (2988, 11, 'MG', 'Divinolandia de Minas');

INSERT INTO `tb_cidades` VALUES (2989, 11, 'MG', 'Divinopolis');

INSERT INTO `tb_cidades` VALUES (2990, 11, 'MG', 'Divisa Alegre');

INSERT INTO `tb_cidades` VALUES (2991, 11, 'MG', 'Divisa Nova');

INSERT INTO `tb_cidades` VALUES (2992, 11, 'MG', 'Divisopolis');

INSERT INTO `tb_cidades` VALUES (2993, 11, 'MG', 'Dois de Abril');

INSERT INTO `tb_cidades` VALUES (2994, 11, 'MG', 'Dom Bosco');

INSERT INTO `tb_cidades` VALUES (2995, 11, 'MG', 'Dom Cavati');

INSERT INTO `tb_cidades` VALUES (2996, 11, 'MG', 'Dom Joaquim');

INSERT INTO `tb_cidades` VALUES (2997, 11, 'MG', 'Dom Lara');

INSERT INTO `tb_cidades` VALUES (2998, 11, 'MG', 'Dom Modesto');

INSERT INTO `tb_cidades` VALUES (2999, 11, 'MG', 'Dom Silverio');

INSERT INTO `tb_cidades` VALUES (3000, 11, 'MG', 'Dom Vicoso');

INSERT INTO `tb_cidades` VALUES (3001, 11, 'MG', 'Dona Euzebia');

INSERT INTO `tb_cidades` VALUES (3002, 11, 'MG', 'Dores da Vitoria');

INSERT INTO `tb_cidades` VALUES (3003, 11, 'MG', 'Dores de Campos');

INSERT INTO `tb_cidades` VALUES (3004, 11, 'MG', 'Dores de Guanhaes');

INSERT INTO `tb_cidades` VALUES (3005, 11, 'MG', 'Dores do Indaia');

INSERT INTO `tb_cidades` VALUES (3006, 11, 'MG', 'Dores do Paraibuna');

INSERT INTO `tb_cidades` VALUES (3007, 11, 'MG', 'Dores do Turvo');

INSERT INTO `tb_cidades` VALUES (3008, 11, 'MG', 'Doresopolis');

INSERT INTO `tb_cidades` VALUES (3009, 11, 'MG', 'Douradinho');

INSERT INTO `tb_cidades` VALUES (3010, 11, 'MG', 'Douradoquara');

INSERT INTO `tb_cidades` VALUES (3011, 11, 'MG', 'Doutor Campolina');

INSERT INTO `tb_cidades` VALUES (3012, 11, 'MG', 'Doutor Lund');

INSERT INTO `tb_cidades` VALUES (3013, 11, 'MG', 'Durande');

INSERT INTO `tb_cidades` VALUES (3014, 11, 'MG', 'Edgard Melo');

INSERT INTO `tb_cidades` VALUES (3015, 11, 'MG', 'Eloi Mendes');

INSERT INTO `tb_cidades` VALUES (3016, 11, 'MG', 'Emboabas');

INSERT INTO `tb_cidades` VALUES (3017, 11, 'MG', 'Engenheiro Caldas');

INSERT INTO `tb_cidades` VALUES (3018, 11, 'MG', 'Engenheiro Correia');

INSERT INTO `tb_cidades` VALUES (3019, 11, 'MG', 'Engenheiro Navarro');

INSERT INTO `tb_cidades` VALUES (3020, 11, 'MG', 'Engenheiro Schnoor');

INSERT INTO `tb_cidades` VALUES (3021, 11, 'MG', 'Engenho do Ribeiro');

INSERT INTO `tb_cidades` VALUES (3022, 11, 'MG', 'Engenho Novo');

INSERT INTO `tb_cidades` VALUES (3023, 11, 'MG', 'Entre Folhas');

INSERT INTO `tb_cidades` VALUES (3024, 11, 'MG', 'Entre Rios de Minas');

INSERT INTO `tb_cidades` VALUES (3025, 11, 'MG', 'Epaminondas Otoni');

INSERT INTO `tb_cidades` VALUES (3026, 11, 'MG', 'Ermidinha');

INSERT INTO `tb_cidades` VALUES (3027, 11, 'MG', 'Ervalia');

INSERT INTO `tb_cidades` VALUES (3028, 11, 'MG', 'Esmeraldas');

INSERT INTO `tb_cidades` VALUES (3029, 11, 'MG', 'Esmeraldas de Ferros');

INSERT INTO `tb_cidades` VALUES (3030, 11, 'MG', 'Espera Feliz');

INSERT INTO `tb_cidades` VALUES (3031, 11, 'MG', 'Espinosa');

INSERT INTO `tb_cidades` VALUES (3032, 11, 'MG', 'Espirito Santo do Dourado');

INSERT INTO `tb_cidades` VALUES (3033, 11, 'MG', 'Esteios');

INSERT INTO `tb_cidades` VALUES (3034, 11, 'MG', 'Estevao de Araujo');

INSERT INTO `tb_cidades` VALUES (3035, 11, 'MG', 'Estiva');

INSERT INTO `tb_cidades` VALUES (3036, 11, 'MG', 'Estrela da Barra');

INSERT INTO `tb_cidades` VALUES (3037, 11, 'MG', 'Estrela Dalva');

INSERT INTO `tb_cidades` VALUES (3038, 11, 'MG', 'Estrela de Jordania');

INSERT INTO `tb_cidades` VALUES (3039, 11, 'MG', 'Estrela do Indaia');

INSERT INTO `tb_cidades` VALUES (3040, 11, 'MG', 'Estrela do Sul');

INSERT INTO `tb_cidades` VALUES (3041, 11, 'MG', 'Eugenopolis');

INSERT INTO `tb_cidades` VALUES (3042, 11, 'MG', 'Euxenita');

INSERT INTO `tb_cidades` VALUES (3043, 11, 'MG', 'Ewbank da Camara');

INSERT INTO `tb_cidades` VALUES (3044, 11, 'MG', 'Expedicionario Alicio');

INSERT INTO `tb_cidades` VALUES (3045, 11, 'MG', 'Extracao');

INSERT INTO `tb_cidades` VALUES (3046, 11, 'MG', 'Extrema');

INSERT INTO `tb_cidades` VALUES (3047, 11, 'MG', 'Fama');

INSERT INTO `tb_cidades` VALUES (3048, 11, 'MG', 'Faria Lemos');

INSERT INTO `tb_cidades` VALUES (3049, 11, 'MG', 'Farias');

INSERT INTO `tb_cidades` VALUES (3050, 11, 'MG', 'Fechados');

INSERT INTO `tb_cidades` VALUES (3051, 11, 'MG', 'Felicina');

INSERT INTO `tb_cidades` VALUES (3052, 11, 'MG', 'Felicio dos Santos');

INSERT INTO `tb_cidades` VALUES (3053, 11, 'MG', 'Felisburgo');

INSERT INTO `tb_cidades` VALUES (3054, 11, 'MG', 'Felixlandia');

INSERT INTO `tb_cidades` VALUES (3055, 11, 'MG', 'Fernandes Tourinho');

INSERT INTO `tb_cidades` VALUES (3056, 11, 'MG', 'Fernao Dias');

INSERT INTO `tb_cidades` VALUES (3057, 11, 'MG', 'Ferreiras');

INSERT INTO `tb_cidades` VALUES (3058, 11, 'MG', 'Ferreiropolis');

INSERT INTO `tb_cidades` VALUES (3059, 11, 'MG', 'Ferros');

INSERT INTO `tb_cidades` VALUES (3060, 11, 'MG', 'Ferruginha');

INSERT INTO `tb_cidades` VALUES (3061, 11, 'MG', 'Fervedouro');

INSERT INTO `tb_cidades` VALUES (3062, 11, 'MG', 'Fidalgo');

INSERT INTO `tb_cidades` VALUES (3063, 11, 'MG', 'Fidelandia');

INSERT INTO `tb_cidades` VALUES (3064, 11, 'MG', 'Flor de Minas');

INSERT INTO `tb_cidades` VALUES (3065, 11, 'MG', 'Floralia');

INSERT INTO `tb_cidades` VALUES (3066, 11, 'MG', 'Floresta');

INSERT INTO `tb_cidades` VALUES (3067, 11, 'MG', 'Florestal');

INSERT INTO `tb_cidades` VALUES (3068, 11, 'MG', 'Florestina');

INSERT INTO `tb_cidades` VALUES (3069, 11, 'MG', 'Fonseca');

INSERT INTO `tb_cidades` VALUES (3070, 11, 'MG', 'Formiga');

INSERT INTO `tb_cidades` VALUES (3071, 11, 'MG', 'Formoso');

INSERT INTO `tb_cidades` VALUES (3072, 11, 'MG', 'Fortaleza de Minas');

INSERT INTO `tb_cidades` VALUES (3073, 11, 'MG', 'Fortuna de Minas');

INSERT INTO `tb_cidades` VALUES (3074, 11, 'MG', 'Francisco Badaro');

INSERT INTO `tb_cidades` VALUES (3075, 11, 'MG', 'Francisco Dumont');

INSERT INTO `tb_cidades` VALUES (3076, 11, 'MG', 'Francisco Sa');

INSERT INTO `tb_cidades` VALUES (3077, 11, 'MG', 'Franciscopolis');

INSERT INTO `tb_cidades` VALUES (3078, 11, 'MG', 'Frei Eustaquio');

INSERT INTO `tb_cidades` VALUES (3079, 11, 'MG', 'Frei Gaspar');

INSERT INTO `tb_cidades` VALUES (3080, 11, 'MG', 'Frei Inocencio');

INSERT INTO `tb_cidades` VALUES (3081, 11, 'MG', 'Frei Lagonegro');

INSERT INTO `tb_cidades` VALUES (3082, 11, 'MG', 'Frei Orlando');

INSERT INTO `tb_cidades` VALUES (3083, 11, 'MG', 'Frei Serafim');

INSERT INTO `tb_cidades` VALUES (3084, 11, 'MG', 'Freire Cardoso');

INSERT INTO `tb_cidades` VALUES (3085, 11, 'MG', 'Fronteira');

INSERT INTO `tb_cidades` VALUES (3086, 11, 'MG', 'Fronteira dos Vales');

INSERT INTO `tb_cidades` VALUES (3087, 11, 'MG', 'Fruta de Leite');

INSERT INTO `tb_cidades` VALUES (3088, 11, 'MG', 'Frutal');

INSERT INTO `tb_cidades` VALUES (3089, 11, 'MG', 'Funchal');

INSERT INTO `tb_cidades` VALUES (3090, 11, 'MG', 'Funilandia');

INSERT INTO `tb_cidades` VALUES (3091, 11, 'MG', 'Furnas');

INSERT INTO `tb_cidades` VALUES (3092, 11, 'MG', 'Furquim');

INSERT INTO `tb_cidades` VALUES (3093, 11, 'MG', 'Galego');

INSERT INTO `tb_cidades` VALUES (3094, 11, 'MG', 'Galena');

INSERT INTO `tb_cidades` VALUES (3095, 11, 'MG', 'Galileia');

INSERT INTO `tb_cidades` VALUES (3096, 11, 'MG', 'Gama');

INSERT INTO `tb_cidades` VALUES (3097, 11, 'MG', 'Gameleiras');

INSERT INTO `tb_cidades` VALUES (3098, 11, 'MG', 'Garapuava');

INSERT INTO `tb_cidades` VALUES (3099, 11, 'MG', 'Gaviao');

INSERT INTO `tb_cidades` VALUES (3100, 11, 'MG', 'Glaucilandia');

INSERT INTO `tb_cidades` VALUES (3101, 11, 'MG', 'Glaura');

INSERT INTO `tb_cidades` VALUES (3102, 11, 'MG', 'Glucinio');

INSERT INTO `tb_cidades` VALUES (3103, 11, 'MG', 'Goiabeira');

INSERT INTO `tb_cidades` VALUES (3104, 11, 'MG', 'Goiana');

INSERT INTO `tb_cidades` VALUES (3105, 11, 'MG', 'Goianases');

INSERT INTO `tb_cidades` VALUES (3106, 11, 'MG', 'Goncalves');

INSERT INTO `tb_cidades` VALUES (3107, 11, 'MG', 'Gonzaga');

INSERT INTO `tb_cidades` VALUES (3108, 11, 'MG', 'Gororos');

INSERT INTO `tb_cidades` VALUES (3109, 11, 'MG', 'Gorutuba');

INSERT INTO `tb_cidades` VALUES (3110, 11, 'MG', 'Gouvea');

INSERT INTO `tb_cidades` VALUES (3111, 11, 'MG', 'Governador Valadares');

INSERT INTO `tb_cidades` VALUES (3112, 11, 'MG', 'Graminea');

INSERT INTO `tb_cidades` VALUES (3113, 11, 'MG', 'Granada');

INSERT INTO `tb_cidades` VALUES (3114, 11, 'MG', 'Grao Mogol');

INSERT INTO `tb_cidades` VALUES (3115, 11, 'MG', 'Grota');

INSERT INTO `tb_cidades` VALUES (3116, 11, 'MG', 'Grupiara');

INSERT INTO `tb_cidades` VALUES (3117, 11, 'MG', 'Guacui');

INSERT INTO `tb_cidades` VALUES (3118, 11, 'MG', 'Guaipava');

INSERT INTO `tb_cidades` VALUES (3119, 11, 'MG', 'Guanhaes');

INSERT INTO `tb_cidades` VALUES (3120, 11, 'MG', 'Guape');

INSERT INTO `tb_cidades` VALUES (3121, 11, 'MG', 'Guaraciaba');

INSERT INTO `tb_cidades` VALUES (3122, 11, 'MG', 'Guaraciama');

INSERT INTO `tb_cidades` VALUES (3123, 11, 'MG', 'Guaranesia');

INSERT INTO `tb_cidades` VALUES (3124, 11, 'MG', 'Guarani');

INSERT INTO `tb_cidades` VALUES (3125, 11, 'MG', 'Guaranilandia');

INSERT INTO `tb_cidades` VALUES (3126, 11, 'MG', 'Guarara');

INSERT INTO `tb_cidades` VALUES (3127, 11, 'MG', 'Guarataia');

INSERT INTO `tb_cidades` VALUES (3128, 11, 'MG', 'Guarda dos Ferreiros');

INSERT INTO `tb_cidades` VALUES (3129, 11, 'MG', 'Guarda-mor');

INSERT INTO `tb_cidades` VALUES (3130, 11, 'MG', 'Guardinha');

INSERT INTO `tb_cidades` VALUES (3131, 11, 'MG', 'Guaxima');

INSERT INTO `tb_cidades` VALUES (3132, 11, 'MG', 'Guaxupe');

INSERT INTO `tb_cidades` VALUES (3133, 11, 'MG', 'Guidoval');

INSERT INTO `tb_cidades` VALUES (3134, 11, 'MG', 'Guimarania');

INSERT INTO `tb_cidades` VALUES (3135, 11, 'MG', 'Guinda');

INSERT INTO `tb_cidades` VALUES (3136, 11, 'MG', 'Guiricema');

INSERT INTO `tb_cidades` VALUES (3137, 11, 'MG', 'Gurinhata');

INSERT INTO `tb_cidades` VALUES (3138, 11, 'MG', 'Heliodora');

INSERT INTO `tb_cidades` VALUES (3139, 11, 'MG', 'Hematita');

INSERT INTO `tb_cidades` VALUES (3140, 11, 'MG', 'Hermilo Alves');

INSERT INTO `tb_cidades` VALUES (3141, 11, 'MG', 'Honoropolis');

INSERT INTO `tb_cidades` VALUES (3142, 11, 'MG', 'Iapu');

INSERT INTO `tb_cidades` VALUES (3143, 11, 'MG', 'Ibertioga');

INSERT INTO `tb_cidades` VALUES (3144, 11, 'MG', 'Ibia');

INSERT INTO `tb_cidades` VALUES (3145, 11, 'MG', 'Ibiai');

INSERT INTO `tb_cidades` VALUES (3146, 11, 'MG', 'Ibiracatu');

INSERT INTO `tb_cidades` VALUES (3147, 11, 'MG', 'Ibiraci');

INSERT INTO `tb_cidades` VALUES (3148, 11, 'MG', 'Ibirite');

INSERT INTO `tb_cidades` VALUES (3149, 11, 'MG', 'Ibitira');

INSERT INTO `tb_cidades` VALUES (3150, 11, 'MG', 'Ibitiura de Minas');

INSERT INTO `tb_cidades` VALUES (3151, 11, 'MG', 'Ibituruna');

INSERT INTO `tb_cidades` VALUES (3152, 11, 'MG', 'Icarai de Minas');

INSERT INTO `tb_cidades` VALUES (3153, 11, 'MG', 'Igarape');

INSERT INTO `tb_cidades` VALUES (3154, 11, 'MG', 'Igaratinga');

INSERT INTO `tb_cidades` VALUES (3155, 11, 'MG', 'Iguatama');

INSERT INTO `tb_cidades` VALUES (3156, 11, 'MG', 'Ijaci');

INSERT INTO `tb_cidades` VALUES (3157, 11, 'MG', 'Ilheus do Prata');

INSERT INTO `tb_cidades` VALUES (3158, 11, 'MG', 'Ilicinea');

INSERT INTO `tb_cidades` VALUES (3159, 11, 'MG', 'Imbe de Minas');

INSERT INTO `tb_cidades` VALUES (3160, 11, 'MG', 'Inconfidentes');

INSERT INTO `tb_cidades` VALUES (3161, 11, 'MG', 'Indaiabira');

INSERT INTO `tb_cidades` VALUES (3162, 11, 'MG', 'Independencia');

INSERT INTO `tb_cidades` VALUES (3163, 11, 'MG', 'Indianopolis');

INSERT INTO `tb_cidades` VALUES (3164, 11, 'MG', 'Ingai');

INSERT INTO `tb_cidades` VALUES (3165, 11, 'MG', 'Inhai');

INSERT INTO `tb_cidades` VALUES (3166, 11, 'MG', 'Inhapim');

INSERT INTO `tb_cidades` VALUES (3167, 11, 'MG', 'Inhauma');

INSERT INTO `tb_cidades` VALUES (3168, 11, 'MG', 'Inimutaba');

INSERT INTO `tb_cidades` VALUES (3169, 11, 'MG', 'Ipaba');

INSERT INTO `tb_cidades` VALUES (3170, 11, 'MG', 'Ipanema');

INSERT INTO `tb_cidades` VALUES (3171, 11, 'MG', 'Ipatinga');

INSERT INTO `tb_cidades` VALUES (3172, 11, 'MG', 'Ipiacu');

INSERT INTO `tb_cidades` VALUES (3173, 11, 'MG', 'Ipoema');

INSERT INTO `tb_cidades` VALUES (3174, 11, 'MG', 'Ipuiuna');

INSERT INTO `tb_cidades` VALUES (3175, 11, 'MG', 'Irai de Minas');

INSERT INTO `tb_cidades` VALUES (3176, 11, 'MG', 'Itabira');

INSERT INTO `tb_cidades` VALUES (3177, 11, 'MG', 'Itabirinha de Mantena');

INSERT INTO `tb_cidades` VALUES (3178, 11, 'MG', 'Itabirito');

INSERT INTO `tb_cidades` VALUES (3179, 11, 'MG', 'Itaboca');

INSERT INTO `tb_cidades` VALUES (3180, 11, 'MG', 'Itacambira');

INSERT INTO `tb_cidades` VALUES (3181, 11, 'MG', 'Itacarambi');

INSERT INTO `tb_cidades` VALUES (3182, 11, 'MG', 'Itaci');

INSERT INTO `tb_cidades` VALUES (3183, 11, 'MG', 'Itacolomi');

INSERT INTO `tb_cidades` VALUES (3184, 11, 'MG', 'Itaguara');

INSERT INTO `tb_cidades` VALUES (3185, 11, 'MG', 'Itaim');

INSERT INTO `tb_cidades` VALUES (3186, 11, 'MG', 'Itaipe');

INSERT INTO `tb_cidades` VALUES (3187, 11, 'MG', 'Itajuba');

INSERT INTO `tb_cidades` VALUES (3188, 11, 'MG', 'Itajutiba');

INSERT INTO `tb_cidades` VALUES (3189, 11, 'MG', 'Itamarandiba');

INSERT INTO `tb_cidades` VALUES (3190, 11, 'MG', 'Itamarati');

INSERT INTO `tb_cidades` VALUES (3191, 11, 'MG', 'Itamarati de Minas');

INSERT INTO `tb_cidades` VALUES (3192, 11, 'MG', 'Itambacuri');

INSERT INTO `tb_cidades` VALUES (3193, 11, 'MG', 'Itambe do Mato Dentro');

INSERT INTO `tb_cidades` VALUES (3194, 11, 'MG', 'Itamirim');

INSERT INTO `tb_cidades` VALUES (3195, 11, 'MG', 'Itamogi');

INSERT INTO `tb_cidades` VALUES (3196, 11, 'MG', 'Itamonte');

INSERT INTO `tb_cidades` VALUES (3197, 11, 'MG', 'Itamuri');

INSERT INTO `tb_cidades` VALUES (3198, 11, 'MG', 'Itanhandu');

INSERT INTO `tb_cidades` VALUES (3199, 11, 'MG', 'Itanhomi');

INSERT INTO `tb_cidades` VALUES (3200, 11, 'MG', 'Itaobim');

INSERT INTO `tb_cidades` VALUES (3201, 11, 'MG', 'Itapagipe');

INSERT INTO `tb_cidades` VALUES (3202, 11, 'MG', 'Itapanhoacanga');

INSERT INTO `tb_cidades` VALUES (3203, 11, 'MG', 'Itapecerica');

INSERT INTO `tb_cidades` VALUES (3204, 11, 'MG', 'Itapeva');

INSERT INTO `tb_cidades` VALUES (3205, 11, 'MG', 'Itapiru');

INSERT INTO `tb_cidades` VALUES (3206, 11, 'MG', 'Itapirucu');

INSERT INTO `tb_cidades` VALUES (3207, 11, 'MG', 'Itatiaiucu');

INSERT INTO `tb_cidades` VALUES (3208, 11, 'MG', 'Itau de Minas');

INSERT INTO `tb_cidades` VALUES (3209, 11, 'MG', 'Itauna');

INSERT INTO `tb_cidades` VALUES (3210, 11, 'MG', 'Itauninha');

INSERT INTO `tb_cidades` VALUES (3211, 11, 'MG', 'Itaverava');

INSERT INTO `tb_cidades` VALUES (3212, 11, 'MG', 'Iterere');

INSERT INTO `tb_cidades` VALUES (3213, 11, 'MG', 'Itinga');

INSERT INTO `tb_cidades` VALUES (3214, 11, 'MG', 'Itira');

INSERT INTO `tb_cidades` VALUES (3215, 11, 'MG', 'Itueta');

INSERT INTO `tb_cidades` VALUES (3216, 11, 'MG', 'Itui');

INSERT INTO `tb_cidades` VALUES (3217, 11, 'MG', 'Ituiutaba');

INSERT INTO `tb_cidades` VALUES (3218, 11, 'MG', 'Itumirim');

INSERT INTO `tb_cidades` VALUES (3219, 11, 'MG', 'Iturama');

INSERT INTO `tb_cidades` VALUES (3220, 11, 'MG', 'Itutinga');

INSERT INTO `tb_cidades` VALUES (3221, 11, 'MG', 'Jaboticatubas');

INSERT INTO `tb_cidades` VALUES (3222, 11, 'MG', 'Jacarandira');

INSERT INTO `tb_cidades` VALUES (3223, 11, 'MG', 'Jacare');

INSERT INTO `tb_cidades` VALUES (3224, 11, 'MG', 'Jacinto');

INSERT INTO `tb_cidades` VALUES (3225, 11, 'MG', 'Jacui');

INSERT INTO `tb_cidades` VALUES (3226, 11, 'MG', 'Jacutinga');

INSERT INTO `tb_cidades` VALUES (3227, 11, 'MG', 'Jaguaracu');

INSERT INTO `tb_cidades` VALUES (3228, 11, 'MG', 'Jaguarao');

INSERT INTO `tb_cidades` VALUES (3229, 11, 'MG', 'Jaguaritira');

INSERT INTO `tb_cidades` VALUES (3230, 11, 'MG', 'Jaiba');

INSERT INTO `tb_cidades` VALUES (3231, 11, 'MG', 'Jampruca');

INSERT INTO `tb_cidades` VALUES (3232, 11, 'MG', 'Janauba');

INSERT INTO `tb_cidades` VALUES (3233, 11, 'MG', 'Januaria');

INSERT INTO `tb_cidades` VALUES (3234, 11, 'MG', 'Japaraiba');

INSERT INTO `tb_cidades` VALUES (3235, 11, 'MG', 'Japonvar');

INSERT INTO `tb_cidades` VALUES (3236, 11, 'MG', 'Jardinesia');

INSERT INTO `tb_cidades` VALUES (3237, 11, 'MG', 'Jeceaba');

INSERT INTO `tb_cidades` VALUES (3238, 11, 'MG', 'Jenipapo de Minas');

INSERT INTO `tb_cidades` VALUES (3239, 11, 'MG', 'Jequeri');

INSERT INTO `tb_cidades` VALUES (3240, 11, 'MG', 'Jequitai');

INSERT INTO `tb_cidades` VALUES (3241, 11, 'MG', 'Jequitiba');

INSERT INTO `tb_cidades` VALUES (3242, 11, 'MG', 'Jequitinhonha');

INSERT INTO `tb_cidades` VALUES (3243, 11, 'MG', 'Jesuania');

INSERT INTO `tb_cidades` VALUES (3244, 11, 'MG', 'Joaima');

INSERT INTO `tb_cidades` VALUES (3245, 11, 'MG', 'Joanesia');

INSERT INTO `tb_cidades` VALUES (3246, 11, 'MG', 'Joao Monlevade');

INSERT INTO `tb_cidades` VALUES (3247, 11, 'MG', 'Joao Pinheiro');

INSERT INTO `tb_cidades` VALUES (3248, 11, 'MG', 'Joaquim Felicio');

INSERT INTO `tb_cidades` VALUES (3249, 11, 'MG', 'Jordania');

INSERT INTO `tb_cidades` VALUES (3250, 11, 'MG', 'Jose Goncalves de Minas');

INSERT INTO `tb_cidades` VALUES (3251, 11, 'MG', 'Jose Raydan');

INSERT INTO `tb_cidades` VALUES (3252, 11, 'MG', 'Joselandia');

INSERT INTO `tb_cidades` VALUES (3253, 11, 'MG', 'Josenopolis');

INSERT INTO `tb_cidades` VALUES (3254, 11, 'MG', 'Juatuba');

INSERT INTO `tb_cidades` VALUES (3255, 11, 'MG', 'Jubai');

INSERT INTO `tb_cidades` VALUES (3256, 11, 'MG', 'Juiracu');

INSERT INTO `tb_cidades` VALUES (3257, 11, 'MG', 'Juiz de Fora');

INSERT INTO `tb_cidades` VALUES (3258, 11, 'MG', 'Junco de Minas');

INSERT INTO `tb_cidades` VALUES (3259, 11, 'MG', 'Juramento');

INSERT INTO `tb_cidades` VALUES (3260, 11, 'MG', 'Jureia');

INSERT INTO `tb_cidades` VALUES (3261, 11, 'MG', 'Juruaia');

INSERT INTO `tb_cidades` VALUES (3262, 11, 'MG', 'Jurumirim');

INSERT INTO `tb_cidades` VALUES (3263, 11, 'MG', 'Justinopolis');

INSERT INTO `tb_cidades` VALUES (3264, 11, 'MG', 'Juvenilia');

INSERT INTO `tb_cidades` VALUES (3265, 11, 'MG', 'Lacerdinha');

INSERT INTO `tb_cidades` VALUES (3266, 11, 'MG', 'Ladainha');

INSERT INTO `tb_cidades` VALUES (3267, 11, 'MG', 'Lagamar');

INSERT INTO `tb_cidades` VALUES (3268, 11, 'MG', 'Lagoa Bonita');

INSERT INTO `tb_cidades` VALUES (3269, 11, 'MG', 'Lagoa da Prata');

INSERT INTO `tb_cidades` VALUES (3270, 11, 'MG', 'Lagoa dos Patos');

INSERT INTO `tb_cidades` VALUES (3271, 11, 'MG', 'Lagoa Dourada');

INSERT INTO `tb_cidades` VALUES (3272, 11, 'MG', 'Lagoa Formosa');

INSERT INTO `tb_cidades` VALUES (3273, 11, 'MG', 'Lagoa Grande');

INSERT INTO `tb_cidades` VALUES (3274, 11, 'MG', 'Lagoa Santa');

INSERT INTO `tb_cidades` VALUES (3275, 11, 'MG', 'Lajinha');

INSERT INTO `tb_cidades` VALUES (3276, 11, 'MG', 'Lambari');

INSERT INTO `tb_cidades` VALUES (3277, 11, 'MG', 'Lamim');

INSERT INTO `tb_cidades` VALUES (3278, 11, 'MG', 'Lamounier');

INSERT INTO `tb_cidades` VALUES (3279, 11, 'MG', 'Lapinha');

INSERT INTO `tb_cidades` VALUES (3280, 11, 'MG', 'Laranjal');

INSERT INTO `tb_cidades` VALUES (3281, 11, 'MG', 'Laranjeiras de Caldas');

INSERT INTO `tb_cidades` VALUES (3282, 11, 'MG', 'Lassance');

INSERT INTO `tb_cidades` VALUES (3283, 11, 'MG', 'Lavras');

INSERT INTO `tb_cidades` VALUES (3284, 11, 'MG', 'Leandro Ferreira');

INSERT INTO `tb_cidades` VALUES (3285, 11, 'MG', 'Leme do Prado');

INSERT INTO `tb_cidades` VALUES (3286, 11, 'MG', 'Leopoldina');

INSERT INTO `tb_cidades` VALUES (3287, 11, 'MG', 'Levinopolis');

INSERT INTO `tb_cidades` VALUES (3288, 11, 'MG', 'Liberdade');

INSERT INTO `tb_cidades` VALUES (3289, 11, 'MG', 'Lima Duarte');

INSERT INTO `tb_cidades` VALUES (3290, 11, 'MG', 'Limeira D''oeste');

INSERT INTO `tb_cidades` VALUES (3291, 11, 'MG', 'Limeira de Mantena');

INSERT INTO `tb_cidades` VALUES (3292, 11, 'MG', 'Lobo Leite');

INSERT INTO `tb_cidades` VALUES (3293, 11, 'MG', 'Lontra');

INSERT INTO `tb_cidades` VALUES (3294, 11, 'MG', 'Lourenco Velho');

INSERT INTO `tb_cidades` VALUES (3295, 11, 'MG', 'Lufa');

INSERT INTO `tb_cidades` VALUES (3296, 11, 'MG', 'Luisburgo');

INSERT INTO `tb_cidades` VALUES (3297, 11, 'MG', 'Luislandia');

INSERT INTO `tb_cidades` VALUES (3298, 11, 'MG', 'Luiz Pires de Minas');

INSERT INTO `tb_cidades` VALUES (3299, 11, 'MG', 'Luizlandia do Oeste');

INSERT INTO `tb_cidades` VALUES (3300, 11, 'MG', 'Luminarias');

INSERT INTO `tb_cidades` VALUES (3301, 11, 'MG', 'Luminosa');

INSERT INTO `tb_cidades` VALUES (3302, 11, 'MG', 'Luz');

INSERT INTO `tb_cidades` VALUES (3303, 11, 'MG', 'Macaia');

INSERT INTO `tb_cidades` VALUES (3304, 11, 'MG', 'Machacalis');

INSERT INTO `tb_cidades` VALUES (3305, 11, 'MG', 'Machado');

INSERT INTO `tb_cidades` VALUES (3306, 11, 'MG', 'Macuco');

INSERT INTO `tb_cidades` VALUES (3307, 11, 'MG', 'Macuco de Minas');

INSERT INTO `tb_cidades` VALUES (3308, 11, 'MG', 'Madre de Deus de Minas');

INSERT INTO `tb_cidades` VALUES (3309, 11, 'MG', 'Mae dos Homens');

INSERT INTO `tb_cidades` VALUES (3310, 11, 'MG', 'Major Ezequiel');

INSERT INTO `tb_cidades` VALUES (3311, 11, 'MG', 'Major Porto');

INSERT INTO `tb_cidades` VALUES (3312, 11, 'MG', 'Malacacheta');

INSERT INTO `tb_cidades` VALUES (3313, 11, 'MG', 'Mamonas');

INSERT INTO `tb_cidades` VALUES (3314, 11, 'MG', 'Manga');

INSERT INTO `tb_cidades` VALUES (3315, 11, 'MG', 'Manhuacu');

INSERT INTO `tb_cidades` VALUES (3316, 11, 'MG', 'Manhumirim');

INSERT INTO `tb_cidades` VALUES (3317, 11, 'MG', 'Mantena');

INSERT INTO `tb_cidades` VALUES (3318, 11, 'MG', 'Mantiqueira');

INSERT INTO `tb_cidades` VALUES (3319, 11, 'MG', 'Mantiqueira do Palmital');

INSERT INTO `tb_cidades` VALUES (3320, 11, 'MG', 'Mar de Espanha');

INSERT INTO `tb_cidades` VALUES (3321, 11, 'MG', 'Marambainha');

INSERT INTO `tb_cidades` VALUES (3322, 11, 'MG', 'Maravilhas');

INSERT INTO `tb_cidades` VALUES (3323, 11, 'MG', 'Maria da Fe');

INSERT INTO `tb_cidades` VALUES (3324, 11, 'MG', 'Mariana');

INSERT INTO `tb_cidades` VALUES (3325, 11, 'MG', 'Marilac');

INSERT INTO `tb_cidades` VALUES (3326, 11, 'MG', 'Marilandia');

INSERT INTO `tb_cidades` VALUES (3327, 11, 'MG', 'Mario Campos');

INSERT INTO `tb_cidades` VALUES (3328, 11, 'MG', 'Maripa de Minas');

INSERT INTO `tb_cidades` VALUES (3329, 11, 'MG', 'Marlieria');

INSERT INTO `tb_cidades` VALUES (3330, 11, 'MG', 'Marmelopolis');

INSERT INTO `tb_cidades` VALUES (3331, 11, 'MG', 'Martinesia');

INSERT INTO `tb_cidades` VALUES (3332, 11, 'MG', 'Martinho Campos');

INSERT INTO `tb_cidades` VALUES (3333, 11, 'MG', 'Martins Guimaraes');

INSERT INTO `tb_cidades` VALUES (3334, 11, 'MG', 'Martins Soares');

INSERT INTO `tb_cidades` VALUES (3335, 11, 'MG', 'Mata Verde');

INSERT INTO `tb_cidades` VALUES (3336, 11, 'MG', 'Materlandia');

INSERT INTO `tb_cidades` VALUES (3337, 11, 'MG', 'Mateus Leme');

INSERT INTO `tb_cidades` VALUES (3338, 11, 'MG', 'Mathias Lobato');

INSERT INTO `tb_cidades` VALUES (3339, 11, 'MG', 'Matias Barbosa');

INSERT INTO `tb_cidades` VALUES (3340, 11, 'MG', 'Matias Cardoso');

INSERT INTO `tb_cidades` VALUES (3341, 11, 'MG', 'Matipo');

INSERT INTO `tb_cidades` VALUES (3342, 11, 'MG', 'Mato Verde');

INSERT INTO `tb_cidades` VALUES (3343, 11, 'MG', 'Matozinhos');

INSERT INTO `tb_cidades` VALUES (3344, 11, 'MG', 'Matutina');

INSERT INTO `tb_cidades` VALUES (3345, 11, 'MG', 'Medeiros');

INSERT INTO `tb_cidades` VALUES (3346, 11, 'MG', 'Medina');

INSERT INTO `tb_cidades` VALUES (3347, 11, 'MG', 'Melo Viana');

INSERT INTO `tb_cidades` VALUES (3348, 11, 'MG', 'Mendanha');

INSERT INTO `tb_cidades` VALUES (3349, 11, 'MG', 'Mendes Pimentel');

INSERT INTO `tb_cidades` VALUES (3350, 11, 'MG', 'Mendonca');

INSERT INTO `tb_cidades` VALUES (3351, 11, 'MG', 'Merces');

INSERT INTO `tb_cidades` VALUES (3352, 11, 'MG', 'Merces de Agua Limpa');

INSERT INTO `tb_cidades` VALUES (3353, 11, 'MG', 'Mesquita');

INSERT INTO `tb_cidades` VALUES (3354, 11, 'MG', 'Mestre Caetano');

INSERT INTO `tb_cidades` VALUES (3355, 11, 'MG', 'Miguel Burnier');

INSERT INTO `tb_cidades` VALUES (3356, 11, 'MG', 'Milagre');

INSERT INTO `tb_cidades` VALUES (3357, 11, 'MG', 'Milho Verde');

INSERT INTO `tb_cidades` VALUES (3358, 11, 'MG', 'Minas Novas');

INSERT INTO `tb_cidades` VALUES (3359, 11, 'MG', 'Minduri');

INSERT INTO `tb_cidades` VALUES (3360, 11, 'MG', 'Mirabela');

INSERT INTO `tb_cidades` VALUES (3361, 11, 'MG', 'Miradouro');

INSERT INTO `tb_cidades` VALUES (3362, 11, 'MG', 'Miragaia');

INSERT INTO `tb_cidades` VALUES (3363, 11, 'MG', 'Mirai');

INSERT INTO `tb_cidades` VALUES (3364, 11, 'MG', 'Miralta');

INSERT INTO `tb_cidades` VALUES (3365, 11, 'MG', 'Mirantao');

INSERT INTO `tb_cidades` VALUES (3366, 11, 'MG', 'Miraporanga');

INSERT INTO `tb_cidades` VALUES (3367, 11, 'MG', 'Miravania');

INSERT INTO `tb_cidades` VALUES (3368, 11, 'MG', 'Missionario');

INSERT INTO `tb_cidades` VALUES (3369, 11, 'MG', 'Mocambeiro');

INSERT INTO `tb_cidades` VALUES (3370, 11, 'MG', 'Mocambinho');

INSERT INTO `tb_cidades` VALUES (3371, 11, 'MG', 'Moeda');

INSERT INTO `tb_cidades` VALUES (3372, 11, 'MG', 'Moema');

INSERT INTO `tb_cidades` VALUES (3373, 11, 'MG', 'Monjolinho de Minas');

INSERT INTO `tb_cidades` VALUES (3374, 11, 'MG', 'Monjolos');

INSERT INTO `tb_cidades` VALUES (3375, 11, 'MG', 'Monsenhor Horta');

INSERT INTO `tb_cidades` VALUES (3376, 11, 'MG', 'Monsenhor Isidro');

INSERT INTO `tb_cidades` VALUES (3377, 11, 'MG', 'Monsenhor Joao Alexandre');

INSERT INTO `tb_cidades` VALUES (3378, 11, 'MG', 'Monsenhor Paulo');

INSERT INTO `tb_cidades` VALUES (3379, 11, 'MG', 'Montalvania');

INSERT INTO `tb_cidades` VALUES (3380, 11, 'MG', 'Monte Alegre de Minas');

INSERT INTO `tb_cidades` VALUES (3381, 11, 'MG', 'Monte Azul');

INSERT INTO `tb_cidades` VALUES (3382, 11, 'MG', 'Monte Belo');

INSERT INTO `tb_cidades` VALUES (3383, 11, 'MG', 'Monte Carmelo');

INSERT INTO `tb_cidades` VALUES (3384, 11, 'MG', 'Monte Celeste');

INSERT INTO `tb_cidades` VALUES (3385, 11, 'MG', 'Monte Formoso');

INSERT INTO `tb_cidades` VALUES (3386, 11, 'MG', 'Monte Rei');

INSERT INTO `tb_cidades` VALUES (3387, 11, 'MG', 'Monte Santo de Minas');

INSERT INTO `tb_cidades` VALUES (3388, 11, 'MG', 'Monte Siao');

INSERT INTO `tb_cidades` VALUES (3389, 11, 'MG', 'Monte Verde');

INSERT INTO `tb_cidades` VALUES (3390, 11, 'MG', 'Montes Claros');

INSERT INTO `tb_cidades` VALUES (3391, 11, 'MG', 'Montezuma');

INSERT INTO `tb_cidades` VALUES (3392, 11, 'MG', 'Morada Nova de Minas');

INSERT INTO `tb_cidades` VALUES (3393, 11, 'MG', 'Morro');

INSERT INTO `tb_cidades` VALUES (3394, 11, 'MG', 'Morro da Garca');

INSERT INTO `tb_cidades` VALUES (3395, 11, 'MG', 'Morro do Ferro');

INSERT INTO `tb_cidades` VALUES (3396, 11, 'MG', 'Morro do Pilar');

INSERT INTO `tb_cidades` VALUES (3397, 11, 'MG', 'Morro Vermelho');

INSERT INTO `tb_cidades` VALUES (3398, 11, 'MG', 'Mucuri');

INSERT INTO `tb_cidades` VALUES (3399, 11, 'MG', 'Mundo Novo de Minas');

INSERT INTO `tb_cidades` VALUES (3400, 11, 'MG', 'Munhoz');

INSERT INTO `tb_cidades` VALUES (3401, 11, 'MG', 'Muquem');

INSERT INTO `tb_cidades` VALUES (3402, 11, 'MG', 'Muriae');

INSERT INTO `tb_cidades` VALUES (3403, 11, 'MG', 'Mutum');

INSERT INTO `tb_cidades` VALUES (3404, 11, 'MG', 'Muzambinho');

INSERT INTO `tb_cidades` VALUES (3405, 11, 'MG', 'Nacip Raydan');

INSERT INTO `tb_cidades` VALUES (3406, 11, 'MG', 'Nanuque');

INSERT INTO `tb_cidades` VALUES (3407, 11, 'MG', 'Naque');

INSERT INTO `tb_cidades` VALUES (3408, 11, 'MG', 'Naque-nanuque');

INSERT INTO `tb_cidades` VALUES (3409, 11, 'MG', 'Natalandia');

INSERT INTO `tb_cidades` VALUES (3410, 11, 'MG', 'Natercia');

INSERT INTO `tb_cidades` VALUES (3411, 11, 'MG', 'Nazare de Minas');

INSERT INTO `tb_cidades` VALUES (3412, 11, 'MG', 'Nazareno');

INSERT INTO `tb_cidades` VALUES (3413, 11, 'MG', 'Nelson de Sena');

INSERT INTO `tb_cidades` VALUES (3414, 11, 'MG', 'Neolandia');

INSERT INTO `tb_cidades` VALUES (3415, 11, 'MG', 'Nepomuceno');

INSERT INTO `tb_cidades` VALUES (3416, 11, 'MG', 'Nhandutiba');

INSERT INTO `tb_cidades` VALUES (3417, 11, 'MG', 'Nicolandia');

INSERT INTO `tb_cidades` VALUES (3418, 11, 'MG', 'Ninheira');

INSERT INTO `tb_cidades` VALUES (3419, 11, 'MG', 'Nova Belem');

INSERT INTO `tb_cidades` VALUES (3420, 11, 'MG', 'Nova Era');

INSERT INTO `tb_cidades` VALUES (3421, 11, 'MG', 'Nova Esperanca');

INSERT INTO `tb_cidades` VALUES (3422, 11, 'MG', 'Nova Lima');

INSERT INTO `tb_cidades` VALUES (3423, 11, 'MG', 'Nova Minda');

INSERT INTO `tb_cidades` VALUES (3424, 11, 'MG', 'Nova Modica');

INSERT INTO `tb_cidades` VALUES (3425, 11, 'MG', 'Nova Ponte');

INSERT INTO `tb_cidades` VALUES (3426, 11, 'MG', 'Nova Porteirinha');

INSERT INTO `tb_cidades` VALUES (3427, 11, 'MG', 'Nova Resende');

INSERT INTO `tb_cidades` VALUES (3428, 11, 'MG', 'Nova Serrana');

INSERT INTO `tb_cidades` VALUES (3429, 11, 'MG', 'Nova Uniao');

INSERT INTO `tb_cidades` VALUES (3430, 11, 'MG', 'Novilhona');

INSERT INTO `tb_cidades` VALUES (3431, 11, 'MG', 'Novo Cruzeiro');

INSERT INTO `tb_cidades` VALUES (3432, 11, 'MG', 'Novo Horizonte');

INSERT INTO `tb_cidades` VALUES (3433, 11, 'MG', 'Novo Oriente de Minas');

INSERT INTO `tb_cidades` VALUES (3434, 11, 'MG', 'Novorizonte');

INSERT INTO `tb_cidades` VALUES (3435, 11, 'MG', 'Ocidente');

INSERT INTO `tb_cidades` VALUES (3436, 11, 'MG', 'Olaria');

INSERT INTO `tb_cidades` VALUES (3437, 11, 'MG', 'Olegario Maciel');

INSERT INTO `tb_cidades` VALUES (3438, 11, 'MG', 'Olhos D''agua Do Oeste');

INSERT INTO `tb_cidades` VALUES (3439, 11, 'MG', 'Olhos-d''agua');

INSERT INTO `tb_cidades` VALUES (3440, 11, 'MG', 'Olimpio Campos');

INSERT INTO `tb_cidades` VALUES (3441, 11, 'MG', 'Olimpio Noronha');

INSERT INTO `tb_cidades` VALUES (3442, 11, 'MG', 'Oliveira');

INSERT INTO `tb_cidades` VALUES (3443, 11, 'MG', 'Oliveira Fortes');

INSERT INTO `tb_cidades` VALUES (3444, 11, 'MG', 'Onca de Pitangui');

INSERT INTO `tb_cidades` VALUES (3445, 11, 'MG', 'Oratorios');

INSERT INTO `tb_cidades` VALUES (3446, 11, 'MG', 'Orizania');

INSERT INTO `tb_cidades` VALUES (3447, 11, 'MG', 'Ouro Branco');

INSERT INTO `tb_cidades` VALUES (3448, 11, 'MG', 'Ouro Fino');

INSERT INTO `tb_cidades` VALUES (3449, 11, 'MG', 'Ouro Preto');

INSERT INTO `tb_cidades` VALUES (3450, 11, 'MG', 'Ouro Verde de Minas');

INSERT INTO `tb_cidades` VALUES (3451, 11, 'MG', 'Paciencia');

INSERT INTO `tb_cidades` VALUES (3452, 11, 'MG', 'Padre Brito');

INSERT INTO `tb_cidades` VALUES (3453, 11, 'MG', 'Padre Carvalho');

INSERT INTO `tb_cidades` VALUES (3454, 11, 'MG', 'Padre Felisberto');

INSERT INTO `tb_cidades` VALUES (3455, 11, 'MG', 'Padre Fialho');

INSERT INTO `tb_cidades` VALUES (3456, 11, 'MG', 'Padre Joao Afonso');

INSERT INTO `tb_cidades` VALUES (3457, 11, 'MG', 'Padre Julio Maria');

INSERT INTO `tb_cidades` VALUES (3458, 11, 'MG', 'Padre Paraiso');

INSERT INTO `tb_cidades` VALUES (3459, 11, 'MG', 'Padre Pinto');

INSERT INTO `tb_cidades` VALUES (3460, 11, 'MG', 'Padre Viegas');

INSERT INTO `tb_cidades` VALUES (3461, 11, 'MG', 'Pai Pedro');

INSERT INTO `tb_cidades` VALUES (3462, 11, 'MG', 'Paineiras');

INSERT INTO `tb_cidades` VALUES (3463, 11, 'MG', 'Pains');

INSERT INTO `tb_cidades` VALUES (3464, 11, 'MG', 'Paiolinho');

INSERT INTO `tb_cidades` VALUES (3465, 11, 'MG', 'Paiva');

INSERT INTO `tb_cidades` VALUES (3466, 11, 'MG', 'Palma');

INSERT INTO `tb_cidades` VALUES (3467, 11, 'MG', 'Palmeiral');

INSERT INTO `tb_cidades` VALUES (3468, 11, 'MG', 'Palmeirinha');

INSERT INTO `tb_cidades` VALUES (3469, 11, 'MG', 'Palmital dos Carvalhos');

INSERT INTO `tb_cidades` VALUES (3470, 11, 'MG', 'Palmopolis');

INSERT INTO `tb_cidades` VALUES (3471, 11, 'MG', 'Pantano');

INSERT INTO `tb_cidades` VALUES (3472, 11, 'MG', 'Papagaios');

INSERT INTO `tb_cidades` VALUES (3473, 11, 'MG', 'Para de Minas');

INSERT INTO `tb_cidades` VALUES (3474, 11, 'MG', 'Paracatu');

INSERT INTO `tb_cidades` VALUES (3475, 11, 'MG', 'Paraguacu');

INSERT INTO `tb_cidades` VALUES (3476, 11, 'MG', 'Paraguai');

INSERT INTO `tb_cidades` VALUES (3477, 11, 'MG', 'Paraiso Garcia');

INSERT INTO `tb_cidades` VALUES (3478, 11, 'MG', 'Paraisopolis');

INSERT INTO `tb_cidades` VALUES (3479, 11, 'MG', 'Paraopeba');

INSERT INTO `tb_cidades` VALUES (3480, 11, 'MG', 'Paredao de Minas');

INSERT INTO `tb_cidades` VALUES (3481, 11, 'MG', 'Parque Durval de Barros');

INSERT INTO `tb_cidades` VALUES (3482, 11, 'MG', 'Parque Industrial');

INSERT INTO `tb_cidades` VALUES (3483, 11, 'MG', 'Passa Dez');

INSERT INTO `tb_cidades` VALUES (3484, 11, 'MG', 'Passa Quatro');

INSERT INTO `tb_cidades` VALUES (3485, 11, 'MG', 'Passa Tempo');

INSERT INTO `tb_cidades` VALUES (3486, 11, 'MG', 'Passa Vinte');

INSERT INTO `tb_cidades` VALUES (3487, 11, 'MG', 'Passabem');

INSERT INTO `tb_cidades` VALUES (3488, 11, 'MG', 'Passagem de Mariana');

INSERT INTO `tb_cidades` VALUES (3489, 11, 'MG', 'Passos');

INSERT INTO `tb_cidades` VALUES (3490, 11, 'MG', 'Patis');

INSERT INTO `tb_cidades` VALUES (3491, 11, 'MG', 'Patos de Minas');

INSERT INTO `tb_cidades` VALUES (3492, 11, 'MG', 'Patrimonio');

INSERT INTO `tb_cidades` VALUES (3493, 11, 'MG', 'Patrocinio');

INSERT INTO `tb_cidades` VALUES (3494, 11, 'MG', 'Patrocinio do Muriae');

INSERT INTO `tb_cidades` VALUES (3495, 11, 'MG', 'Paula Candido');

INSERT INTO `tb_cidades` VALUES (3496, 11, 'MG', 'Paula Lima');

INSERT INTO `tb_cidades` VALUES (3497, 11, 'MG', 'Paulistas');

INSERT INTO `tb_cidades` VALUES (3498, 11, 'MG', 'Pavao');

INSERT INTO `tb_cidades` VALUES (3499, 11, 'MG', 'Pe do Morro');

INSERT INTO `tb_cidades` VALUES (3500, 11, 'MG', 'Pecanha');

INSERT INTO `tb_cidades` VALUES (3501, 11, 'MG', 'Pedra Azul');

INSERT INTO `tb_cidades` VALUES (3502, 11, 'MG', 'Pedra Bonita');

INSERT INTO `tb_cidades` VALUES (3503, 11, 'MG', 'Pedra Corrida');

INSERT INTO `tb_cidades` VALUES (3504, 11, 'MG', 'Pedra do Anta');

INSERT INTO `tb_cidades` VALUES (3505, 11, 'MG', 'Pedra do Indaia');

INSERT INTO `tb_cidades` VALUES (3506, 11, 'MG', 'Pedra do Sino');

INSERT INTO `tb_cidades` VALUES (3507, 11, 'MG', 'Pedra Dourada');

INSERT INTO `tb_cidades` VALUES (3508, 11, 'MG', 'Pedra Grande');

INSERT INTO `tb_cidades` VALUES (3509, 11, 'MG', 'Pedra Menina');

INSERT INTO `tb_cidades` VALUES (3510, 11, 'MG', 'Pedralva');

INSERT INTO `tb_cidades` VALUES (3511, 11, 'MG', 'Pedras de Maria da Cruz');

INSERT INTO `tb_cidades` VALUES (3512, 11, 'MG', 'Pedrinopolis');

INSERT INTO `tb_cidades` VALUES (3513, 11, 'MG', 'Pedro Leopoldo');

INSERT INTO `tb_cidades` VALUES (3514, 11, 'MG', 'Pedro Lessa');

INSERT INTO `tb_cidades` VALUES (3515, 11, 'MG', 'Pedro Teixeira');

INSERT INTO `tb_cidades` VALUES (3516, 11, 'MG', 'Pedro Versiani');

INSERT INTO `tb_cidades` VALUES (3517, 11, 'MG', 'Penedia');

INSERT INTO `tb_cidades` VALUES (3518, 11, 'MG', 'Penha de Franca');

INSERT INTO `tb_cidades` VALUES (3519, 11, 'MG', 'Penha do Capim');

INSERT INTO `tb_cidades` VALUES (3520, 11, 'MG', 'Penha do Cassiano');

INSERT INTO `tb_cidades` VALUES (3521, 11, 'MG', 'Penha do Norte');

INSERT INTO `tb_cidades` VALUES (3522, 11, 'MG', 'Penha Longa');

INSERT INTO `tb_cidades` VALUES (3523, 11, 'MG', 'Pequeri');

INSERT INTO `tb_cidades` VALUES (3524, 11, 'MG', 'Pequi');

INSERT INTO `tb_cidades` VALUES (3525, 11, 'MG', 'Perdigao');

INSERT INTO `tb_cidades` VALUES (3526, 11, 'MG', 'Perdilandia');

INSERT INTO `tb_cidades` VALUES (3527, 11, 'MG', 'Perdizes');

INSERT INTO `tb_cidades` VALUES (3528, 11, 'MG', 'Perdoes');

INSERT INTO `tb_cidades` VALUES (3529, 11, 'MG', 'Pereirinhas');

INSERT INTO `tb_cidades` VALUES (3530, 11, 'MG', 'Periquito');

INSERT INTO `tb_cidades` VALUES (3531, 11, 'MG', 'Perpetuo Socorro');

INSERT INTO `tb_cidades` VALUES (3532, 11, 'MG', 'Pescador');

INSERT INTO `tb_cidades` VALUES (3533, 11, 'MG', 'Petunia');

INSERT INTO `tb_cidades` VALUES (3534, 11, 'MG', 'Piacatuba');

INSERT INTO `tb_cidades` VALUES (3535, 11, 'MG', 'Piao');

INSERT INTO `tb_cidades` VALUES (3536, 11, 'MG', 'Piau');

INSERT INTO `tb_cidades` VALUES (3537, 11, 'MG', 'Pic Sagarana');

INSERT INTO `tb_cidades` VALUES (3538, 11, 'MG', 'Piedade de Caratinga');

INSERT INTO `tb_cidades` VALUES (3539, 11, 'MG', 'Piedade de Ponte Nova');

INSERT INTO `tb_cidades` VALUES (3540, 11, 'MG', 'Piedade do Paraopeba');

INSERT INTO `tb_cidades` VALUES (3541, 11, 'MG', 'Piedade do Rio Grande');

INSERT INTO `tb_cidades` VALUES (3542, 11, 'MG', 'Piedade dos Gerais');

INSERT INTO `tb_cidades` VALUES (3543, 11, 'MG', 'Pilar');

INSERT INTO `tb_cidades` VALUES (3544, 11, 'MG', 'Pimenta');

INSERT INTO `tb_cidades` VALUES (3545, 11, 'MG', 'Pindaibas');

INSERT INTO `tb_cidades` VALUES (3546, 11, 'MG', 'Pingo-d''agua');

INSERT INTO `tb_cidades` VALUES (3547, 11, 'MG', 'Pinheirinhos');

INSERT INTO `tb_cidades` VALUES (3548, 11, 'MG', 'Pinheiros Altos');

INSERT INTO `tb_cidades` VALUES (3549, 11, 'MG', 'Pinhotiba');

INSERT INTO `tb_cidades` VALUES (3550, 11, 'MG', 'Pintopolis');

INSERT INTO `tb_cidades` VALUES (3551, 11, 'MG', 'Pintos Negreiros');

INSERT INTO `tb_cidades` VALUES (3552, 11, 'MG', 'Piracaiba');

INSERT INTO `tb_cidades` VALUES (3553, 11, 'MG', 'Piracema');

INSERT INTO `tb_cidades` VALUES (3554, 11, 'MG', 'Pirajuba');

INSERT INTO `tb_cidades` VALUES (3555, 11, 'MG', 'Piranga');

INSERT INTO `tb_cidades` VALUES (3556, 11, 'MG', 'Pirangucu');

INSERT INTO `tb_cidades` VALUES (3557, 11, 'MG', 'Piranguinho');

INSERT INTO `tb_cidades` VALUES (3558, 11, 'MG', 'Piranguita');

INSERT INTO `tb_cidades` VALUES (3559, 11, 'MG', 'Pirapanema');

INSERT INTO `tb_cidades` VALUES (3560, 11, 'MG', 'Pirapetinga');

INSERT INTO `tb_cidades` VALUES (3561, 11, 'MG', 'Pirapora');

INSERT INTO `tb_cidades` VALUES (3562, 11, 'MG', 'Pirauba');

INSERT INTO `tb_cidades` VALUES (3563, 11, 'MG', 'Pires E Albuquerque');

INSERT INTO `tb_cidades` VALUES (3564, 11, 'MG', 'Piscamba');

INSERT INTO `tb_cidades` VALUES (3565, 11, 'MG', 'Pitangui');

INSERT INTO `tb_cidades` VALUES (3566, 11, 'MG', 'Pitarana');

INSERT INTO `tb_cidades` VALUES (3567, 11, 'MG', 'Piumhi');

INSERT INTO `tb_cidades` VALUES (3568, 11, 'MG', 'Planalto de Minas');

INSERT INTO `tb_cidades` VALUES (3569, 11, 'MG', 'Planura');

INSERT INTO `tb_cidades` VALUES (3570, 11, 'MG', 'Plautino Soares');

INSERT INTO `tb_cidades` VALUES (3571, 11, 'MG', 'Poaia');

INSERT INTO `tb_cidades` VALUES (3572, 11, 'MG', 'Poco Fundo');

INSERT INTO `tb_cidades` VALUES (3573, 11, 'MG', 'Pocoes de Paineiras');

INSERT INTO `tb_cidades` VALUES (3574, 11, 'MG', 'Pocos de Caldas');

INSERT INTO `tb_cidades` VALUES (3575, 11, 'MG', 'Pocrane');

INSERT INTO `tb_cidades` VALUES (3576, 11, 'MG', 'Pompeu');

INSERT INTO `tb_cidades` VALUES (3577, 11, 'MG', 'Poncianos');

INSERT INTO `tb_cidades` VALUES (3578, 11, 'MG', 'Pontalete');

INSERT INTO `tb_cidades` VALUES (3579, 11, 'MG', 'Ponte Alta');

INSERT INTO `tb_cidades` VALUES (3580, 11, 'MG', 'Ponte Alta de Minas');

INSERT INTO `tb_cidades` VALUES (3581, 11, 'MG', 'Ponte dos Ciganos');

INSERT INTO `tb_cidades` VALUES (3582, 11, 'MG', 'Ponte Firme');

INSERT INTO `tb_cidades` VALUES (3583, 11, 'MG', 'Ponte Nova');

INSERT INTO `tb_cidades` VALUES (3584, 11, 'MG', 'Ponte Segura');

INSERT INTO `tb_cidades` VALUES (3585, 11, 'MG', 'Pontevila');

INSERT INTO `tb_cidades` VALUES (3586, 11, 'MG', 'Ponto Chique');

INSERT INTO `tb_cidades` VALUES (3587, 11, 'MG', 'Ponto Chique do Martelo');

INSERT INTO `tb_cidades` VALUES (3588, 11, 'MG', 'Ponto do Marambaia');

INSERT INTO `tb_cidades` VALUES (3589, 11, 'MG', 'Ponto dos Volantes');

INSERT INTO `tb_cidades` VALUES (3590, 11, 'MG', 'Porteirinha');

INSERT INTO `tb_cidades` VALUES (3591, 11, 'MG', 'Porto Agrario');

INSERT INTO `tb_cidades` VALUES (3592, 11, 'MG', 'Porto das Flores');

INSERT INTO `tb_cidades` VALUES (3593, 11, 'MG', 'Porto dos Mendes');

INSERT INTO `tb_cidades` VALUES (3594, 11, 'MG', 'Porto Firme');

INSERT INTO `tb_cidades` VALUES (3595, 11, 'MG', 'Pote');

INSERT INTO `tb_cidades` VALUES (3596, 11, 'MG', 'Pouso Alegre');

INSERT INTO `tb_cidades` VALUES (3597, 11, 'MG', 'Pouso Alto');

INSERT INTO `tb_cidades` VALUES (3598, 11, 'MG', 'Prados');

INSERT INTO `tb_cidades` VALUES (3599, 11, 'MG', 'Prata');

INSERT INTO `tb_cidades` VALUES (3600, 11, 'MG', 'Pratapolis');

INSERT INTO `tb_cidades` VALUES (3601, 11, 'MG', 'Pratinha');

INSERT INTO `tb_cidades` VALUES (3602, 11, 'MG', 'Presidente Bernardes');

INSERT INTO `tb_cidades` VALUES (3603, 11, 'MG', 'Presidente Juscelino');

INSERT INTO `tb_cidades` VALUES (3604, 11, 'MG', 'Presidente Kubitschek');

INSERT INTO `tb_cidades` VALUES (3605, 11, 'MG', 'Presidente Olegario');


INSERT INTO `tb_cidades` VALUES (3606, 11, 'MG', 'Presidente Pena');

INSERT INTO `tb_cidades` VALUES (3607, 11, 'MG', 'Professor Sperber');

INSERT INTO `tb_cidades` VALUES (3608, 11, 'MG', 'Providencia');

INSERT INTO `tb_cidades` VALUES (3609, 11, 'MG', 'Prudente de Morais');

INSERT INTO `tb_cidades` VALUES (3610, 11, 'MG', 'Quartel de Sao Joao');

INSERT INTO `tb_cidades` VALUES (3611, 11, 'MG', 'Quartel do Sacramento');

INSERT INTO `tb_cidades` VALUES (3612, 11, 'MG', 'Quartel Geral');

INSERT INTO `tb_cidades` VALUES (3613, 11, 'MG', 'Quatituba');

INSERT INTO `tb_cidades` VALUES (3614, 11, 'MG', 'Queixada');

INSERT INTO `tb_cidades` VALUES (3615, 11, 'MG', 'Queluzita');

INSERT INTO `tb_cidades` VALUES (3616, 11, 'MG', 'Quem-quem');

INSERT INTO `tb_cidades` VALUES (3617, 11, 'MG', 'Quilombo');

INSERT INTO `tb_cidades` VALUES (3618, 11, 'MG', 'Quintinos');

INSERT INTO `tb_cidades` VALUES (3619, 11, 'MG', 'Raposos');

INSERT INTO `tb_cidades` VALUES (3620, 11, 'MG', 'Raul Soares');

INSERT INTO `tb_cidades` VALUES (3621, 11, 'MG', 'Ravena');

INSERT INTO `tb_cidades` VALUES (3622, 11, 'MG', 'Realeza');

INSERT INTO `tb_cidades` VALUES (3623, 11, 'MG', 'Recreio');

INSERT INTO `tb_cidades` VALUES (3624, 11, 'MG', 'Reduto');

INSERT INTO `tb_cidades` VALUES (3625, 11, 'MG', 'Resende Costa');

INSERT INTO `tb_cidades` VALUES (3626, 11, 'MG', 'Resplendor');

INSERT INTO `tb_cidades` VALUES (3627, 11, 'MG', 'Ressaquinha');

INSERT INTO `tb_cidades` VALUES (3628, 11, 'MG', 'Riachinho');

INSERT INTO `tb_cidades` VALUES (3629, 11, 'MG', 'Riacho da Cruz');

INSERT INTO `tb_cidades` VALUES (3630, 11, 'MG', 'Riacho dos Machados');

INSERT INTO `tb_cidades` VALUES (3631, 11, 'MG', 'Ribeirao das Neves');

INSERT INTO `tb_cidades` VALUES (3632, 11, 'MG', 'Ribeirao de Sao Domingos');

INSERT INTO `tb_cidades` VALUES (3633, 11, 'MG', 'Ribeirao Vermelho');

INSERT INTO `tb_cidades` VALUES (3634, 11, 'MG', 'Ribeiro Junqueira');

INSERT INTO `tb_cidades` VALUES (3635, 11, 'MG', 'Ribeiros');

INSERT INTO `tb_cidades` VALUES (3636, 11, 'MG', 'Rio Acima');

INSERT INTO `tb_cidades` VALUES (3637, 11, 'MG', 'Rio Casca');

INSERT INTO `tb_cidades` VALUES (3638, 11, 'MG', 'Rio das Mortes');

INSERT INTO `tb_cidades` VALUES (3639, 11, 'MG', 'Rio do Prado');

INSERT INTO `tb_cidades` VALUES (3640, 11, 'MG', 'Rio Doce');

INSERT INTO `tb_cidades` VALUES (3641, 11, 'MG', 'Rio Espera');

INSERT INTO `tb_cidades` VALUES (3642, 11, 'MG', 'Rio Manso');

INSERT INTO `tb_cidades` VALUES (3643, 11, 'MG', 'Rio Melo');

INSERT INTO `tb_cidades` VALUES (3644, 11, 'MG', 'Rio Novo');

INSERT INTO `tb_cidades` VALUES (3645, 11, 'MG', 'Rio Paranaiba');

INSERT INTO `tb_cidades` VALUES (3646, 11, 'MG', 'Rio Pardo de Minas');

INSERT INTO `tb_cidades` VALUES (3647, 11, 'MG', 'Rio Piracicaba');

INSERT INTO `tb_cidades` VALUES (3648, 11, 'MG', 'Rio Pomba');

INSERT INTO `tb_cidades` VALUES (3649, 11, 'MG', 'Rio Pretinho');

INSERT INTO `tb_cidades` VALUES (3650, 11, 'MG', 'Rio Preto');

INSERT INTO `tb_cidades` VALUES (3651, 11, 'MG', 'Rio Vermelho');

INSERT INTO `tb_cidades` VALUES (3652, 11, 'MG', 'Ritapolis');

INSERT INTO `tb_cidades` VALUES (3653, 11, 'MG', 'Roca Grande');

INSERT INTO `tb_cidades` VALUES (3654, 11, 'MG', 'Rocas Novas');

INSERT INTO `tb_cidades` VALUES (3655, 11, 'MG', 'Rochedo de Minas');

INSERT INTO `tb_cidades` VALUES (3656, 11, 'MG', 'Rodeador');

INSERT INTO `tb_cidades` VALUES (3657, 11, 'MG', 'Rodeiro');

INSERT INTO `tb_cidades` VALUES (3658, 11, 'MG', 'Rodrigo Silva');

INSERT INTO `tb_cidades` VALUES (3659, 11, 'MG', 'Romaria');

INSERT INTO `tb_cidades` VALUES (3660, 11, 'MG', 'Rosario da Limeira');

INSERT INTO `tb_cidades` VALUES (3661, 11, 'MG', 'Rosario de Minas');

INSERT INTO `tb_cidades` VALUES (3662, 11, 'MG', 'Rosario do Pontal');

INSERT INTO `tb_cidades` VALUES (3663, 11, 'MG', 'Roseiral');

INSERT INTO `tb_cidades` VALUES (3664, 11, 'MG', 'Rubelita');

INSERT INTO `tb_cidades` VALUES (3665, 11, 'MG', 'Rubim');

INSERT INTO `tb_cidades` VALUES (3666, 11, 'MG', 'Sabara');

INSERT INTO `tb_cidades` VALUES (3667, 11, 'MG', 'Sabinopolis');

INSERT INTO `tb_cidades` VALUES (3668, 11, 'MG', 'Sacramento');

INSERT INTO `tb_cidades` VALUES (3669, 11, 'MG', 'Salinas');

INSERT INTO `tb_cidades` VALUES (3670, 11, 'MG', 'Salitre de Minas');

INSERT INTO `tb_cidades` VALUES (3671, 11, 'MG', 'Salto da Divisa');

INSERT INTO `tb_cidades` VALUES (3672, 11, 'MG', 'Sanatorio Santa Fe');

INSERT INTO `tb_cidades` VALUES (3673, 11, 'MG', 'Santa Barbara');

INSERT INTO `tb_cidades` VALUES (3674, 11, 'MG', 'Santa Barbara do Leste');

INSERT INTO `tb_cidades` VALUES (3675, 11, 'MG', 'Santa Barbara do Monte Verde');

INSERT INTO `tb_cidades` VALUES (3676, 11, 'MG', 'Santa Barbara do Tugurio');

INSERT INTO `tb_cidades` VALUES (3677, 11, 'MG', 'Santa Cruz da Aparecida');

INSERT INTO `tb_cidades` VALUES (3678, 11, 'MG', 'Santa Cruz de Botumirim');

INSERT INTO `tb_cidades` VALUES (3679, 11, 'MG', 'Santa Cruz de Minas');

INSERT INTO `tb_cidades` VALUES (3680, 11, 'MG', 'Santa Cruz de Salinas');

INSERT INTO `tb_cidades` VALUES (3681, 11, 'MG', 'Santa Cruz do Escalvado');

INSERT INTO `tb_cidades` VALUES (3682, 11, 'MG', 'Santa Cruz do Prata');

INSERT INTO `tb_cidades` VALUES (3683, 11, 'MG', 'Santa da Pedra');

INSERT INTO `tb_cidades` VALUES (3684, 11, 'MG', 'Santa Efigenia');

INSERT INTO `tb_cidades` VALUES (3685, 11, 'MG', 'Santa Efigenia de Minas');

INSERT INTO `tb_cidades` VALUES (3686, 11, 'MG', 'Santa Fe de Minas');

INSERT INTO `tb_cidades` VALUES (3687, 11, 'MG', 'Santa Filomena');

INSERT INTO `tb_cidades` VALUES (3688, 11, 'MG', 'Santa Helena de Minas');

INSERT INTO `tb_cidades` VALUES (3689, 11, 'MG', 'Santa Isabel');

INSERT INTO `tb_cidades` VALUES (3690, 11, 'MG', 'Santa Juliana');

INSERT INTO `tb_cidades` VALUES (3691, 11, 'MG', 'Santa Luzia');

INSERT INTO `tb_cidades` VALUES (3692, 11, 'MG', 'Santa Luzia da Serra');

INSERT INTO `tb_cidades` VALUES (3693, 11, 'MG', 'Santa Margarida');

INSERT INTO `tb_cidades` VALUES (3694, 11, 'MG', 'Santa Maria de Itabira');

INSERT INTO `tb_cidades` VALUES (3695, 11, 'MG', 'Santa Maria do Salto');

INSERT INTO `tb_cidades` VALUES (3696, 11, 'MG', 'Santa Maria do Suacui');

INSERT INTO `tb_cidades` VALUES (3697, 11, 'MG', 'Santa Rita da Estrela');

INSERT INTO `tb_cidades` VALUES (3698, 11, 'MG', 'Santa Rita de Caldas');

INSERT INTO `tb_cidades` VALUES (3699, 11, 'MG', 'Santa Rita de Jacutinga');

INSERT INTO `tb_cidades` VALUES (3700, 11, 'MG', 'Santa Rita de Minas');

INSERT INTO `tb_cidades` VALUES (3701, 11, 'MG', 'Santa Rita de Ouro Preto');

INSERT INTO `tb_cidades` VALUES (3702, 11, 'MG', 'Santa Rita do Cedro');

INSERT INTO `tb_cidades` VALUES (3703, 11, 'MG', 'Santa Rita do Ibitipoca');

INSERT INTO `tb_cidades` VALUES (3704, 11, 'MG', 'Santa Rita do Itueto');

INSERT INTO `tb_cidades` VALUES (3705, 11, 'MG', 'Santa Rita do Rio do Peixe');

INSERT INTO `tb_cidades` VALUES (3706, 11, 'MG', 'Santa Rita do Sapucai');

INSERT INTO `tb_cidades` VALUES (3707, 11, 'MG', 'Santa Rita Durao');

INSERT INTO `tb_cidades` VALUES (3708, 11, 'MG', 'Santa Rosa da Serra');

INSERT INTO `tb_cidades` VALUES (3709, 11, 'MG', 'Santa Rosa de Lima');

INSERT INTO `tb_cidades` VALUES (3710, 11, 'MG', 'Santa Rosa dos Dourados');

INSERT INTO `tb_cidades` VALUES (3711, 11, 'MG', 'Santa Teresa do Bonito');

INSERT INTO `tb_cidades` VALUES (3712, 11, 'MG', 'Santa Terezinha de Minas');

INSERT INTO `tb_cidades` VALUES (3713, 11, 'MG', 'Santa Vitoria');

INSERT INTO `tb_cidades` VALUES (3714, 11, 'MG', 'Santana da Vargem');

INSERT INTO `tb_cidades` VALUES (3715, 11, 'MG', 'Santana de Caldas');

INSERT INTO `tb_cidades` VALUES (3716, 11, 'MG', 'Santana de Cataguases');

INSERT INTO `tb_cidades` VALUES (3717, 11, 'MG', 'Santana de Patos');

INSERT INTO `tb_cidades` VALUES (3718, 11, 'MG', 'Santana de Pirapama');

INSERT INTO `tb_cidades` VALUES (3719, 11, 'MG', 'Santana do Alfie');

INSERT INTO `tb_cidades` VALUES (3720, 11, 'MG', 'Santana do Aracuai');

INSERT INTO `tb_cidades` VALUES (3721, 11, 'MG', 'Santana do Campestre');

INSERT INTO `tb_cidades` VALUES (3722, 11, 'MG', 'Santana do Capivari');

INSERT INTO `tb_cidades` VALUES (3723, 11, 'MG', 'Santana do Deserto');

INSERT INTO `tb_cidades` VALUES (3724, 11, 'MG', 'Santana do Garambeu');

INSERT INTO `tb_cidades` VALUES (3725, 11, 'MG', 'Santana do Jacare');

INSERT INTO `tb_cidades` VALUES (3726, 11, 'MG', 'Santana do Manhuacu');

INSERT INTO `tb_cidades` VALUES (3727, 11, 'MG', 'Santana do Paraiso');

INSERT INTO `tb_cidades` VALUES (3728, 11, 'MG', 'Santana do Paraopeba');

INSERT INTO `tb_cidades` VALUES (3729, 11, 'MG', 'Santana do Riacho');

INSERT INTO `tb_cidades` VALUES (3730, 11, 'MG', 'Santana do Tabuleiro');

INSERT INTO `tb_cidades` VALUES (3731, 11, 'MG', 'Santana dos Montes');

INSERT INTO `tb_cidades` VALUES (3732, 11, 'MG', 'Santo Antonio da Boa Vista');

INSERT INTO `tb_cidades` VALUES (3733, 11, 'MG', 'Santo Antonio da Fortaleza');

INSERT INTO `tb_cidades` VALUES (3734, 11, 'MG', 'Santo Antonio da Vargem Alegre');

INSERT INTO `tb_cidades` VALUES (3735, 11, 'MG', 'Santo Antonio do Amparo');

INSERT INTO `tb_cidades` VALUES (3736, 11, 'MG', 'Santo Antonio do Aventureiro');

INSERT INTO `tb_cidades` VALUES (3737, 11, 'MG', 'Santo Antonio do Boqueirao');

INSERT INTO `tb_cidades` VALUES (3738, 11, 'MG', 'Santo Antonio do Cruzeiro');

INSERT INTO `tb_cidades` VALUES (3739, 11, 'MG', 'Santo Antonio do Gloria');

INSERT INTO `tb_cidades` VALUES (3740, 11, 'MG', 'Santo Antonio do Grama');

INSERT INTO `tb_cidades` VALUES (3741, 11, 'MG', 'Santo Antonio do Itambe');

INSERT INTO `tb_cidades` VALUES (3742, 11, 'MG', 'Santo Antonio do Jacinto');

INSERT INTO `tb_cidades` VALUES (3743, 11, 'MG', 'Santo Antonio do Leite');

INSERT INTO `tb_cidades` VALUES (3744, 11, 'MG', 'Santo Antonio do Manhuacu');

INSERT INTO `tb_cidades` VALUES (3745, 11, 'MG', 'Santo Antonio do Monte');

INSERT INTO `tb_cidades` VALUES (3746, 11, 'MG', 'Santo Antonio do Mucuri');

INSERT INTO `tb_cidades` VALUES (3747, 11, 'MG', 'Santo Antonio do Norte');

INSERT INTO `tb_cidades` VALUES (3748, 11, 'MG', 'Santo Antonio do Pirapetinga');

INSERT INTO `tb_cidades` VALUES (3749, 11, 'MG', 'Santo Antonio do Retiro');

INSERT INTO `tb_cidades` VALUES (3750, 11, 'MG', 'Santo Antonio do Rio Abaixo');

INSERT INTO `tb_cidades` VALUES (3751, 11, 'MG', 'Santo Antonio dos Araujos');

INSERT INTO `tb_cidades` VALUES (3752, 11, 'MG', 'Santo Antonio dos Campos');

INSERT INTO `tb_cidades` VALUES (3753, 11, 'MG', 'Santo Hilario');

INSERT INTO `tb_cidades` VALUES (3754, 11, 'MG', 'Santo Hipolito');

INSERT INTO `tb_cidades` VALUES (3755, 11, 'MG', 'Santos Dumont');

INSERT INTO `tb_cidades` VALUES (3756, 11, 'MG', 'Sao Bartolomeu');

INSERT INTO `tb_cidades` VALUES (3757, 11, 'MG', 'Sao Benedito');

INSERT INTO `tb_cidades` VALUES (3758, 11, 'MG', 'Sao Bento Abade');

INSERT INTO `tb_cidades` VALUES (3759, 11, 'MG', 'Sao Bento de Caldas');

INSERT INTO `tb_cidades` VALUES (3760, 11, 'MG', 'Sao Bras do Suacui');

INSERT INTO `tb_cidades` VALUES (3761, 11, 'MG', 'Sao Braz');

INSERT INTO `tb_cidades` VALUES (3762, 11, 'MG', 'Sao Candido');

INSERT INTO `tb_cidades` VALUES (3763, 11, 'MG', 'Sao Domingos');

INSERT INTO `tb_cidades` VALUES (3764, 11, 'MG', 'Sao Domingos da Bocaina');

INSERT INTO `tb_cidades` VALUES (3765, 11, 'MG', 'Sao Domingos das Dores');

INSERT INTO `tb_cidades` VALUES (3766, 11, 'MG', 'Sao Domingos do Prata');

INSERT INTO `tb_cidades` VALUES (3767, 11, 'MG', 'Sao Felix de Minas');

INSERT INTO `tb_cidades` VALUES (3768, 11, 'MG', 'Sao Francisco');

INSERT INTO `tb_cidades` VALUES (3769, 11, 'MG', 'Sao Francisco de Paula');

INSERT INTO `tb_cidades` VALUES (3770, 11, 'MG', 'Sao Francisco de Sales');

INSERT INTO `tb_cidades` VALUES (3771, 11, 'MG', 'Sao Francisco do Gloria');

INSERT INTO `tb_cidades` VALUES (3772, 11, 'MG', 'Sao Francisco do Humaita');

INSERT INTO `tb_cidades` VALUES (3773, 11, 'MG', 'Sao Geraldo');

INSERT INTO `tb_cidades` VALUES (3774, 11, 'MG', 'Sao Geraldo da Piedade');

INSERT INTO `tb_cidades` VALUES (3775, 11, 'MG', 'Sao Geraldo de Tumiritinga');

INSERT INTO `tb_cidades` VALUES (3776, 11, 'MG', 'Sao Geraldo do Baguari');

INSERT INTO `tb_cidades` VALUES (3777, 11, 'MG', 'Sao Geraldo do Baixio');

INSERT INTO `tb_cidades` VALUES (3778, 11, 'MG', 'Sao Goncalo de Botelhos');

INSERT INTO `tb_cidades` VALUES (3779, 11, 'MG', 'Sao Goncalo do Abaete');

INSERT INTO `tb_cidades` VALUES (3780, 11, 'MG', 'Sao Goncalo do Monte');

INSERT INTO `tb_cidades` VALUES (3781, 11, 'MG', 'Sao Goncalo do Para');

INSERT INTO `tb_cidades` VALUES (3782, 11, 'MG', 'Sao Goncalo do Rio Abaixo');

INSERT INTO `tb_cidades` VALUES (3783, 11, 'MG', 'Sao Goncalo do Rio das Pedras');

INSERT INTO `tb_cidades` VALUES (3784, 11, 'MG', 'Sao Goncalo do Rio Preto');

INSERT INTO `tb_cidades` VALUES (3785, 11, 'MG', 'Sao Goncalo do Sapucai');

INSERT INTO `tb_cidades` VALUES (3786, 11, 'MG', 'Sao Gotardo');

INSERT INTO `tb_cidades` VALUES (3787, 11, 'MG', 'Sao Jeronimo dos Pocoes');

INSERT INTO `tb_cidades` VALUES (3788, 11, 'MG', 'Sao Joao Batista do Gloria');

INSERT INTO `tb_cidades` VALUES (3789, 11, 'MG', 'Sao Joao da Chapada');

INSERT INTO `tb_cidades` VALUES (3790, 11, 'MG', 'Sao Joao da Lagoa');

INSERT INTO `tb_cidades` VALUES (3791, 11, 'MG', 'Sao Joao da Mata');

INSERT INTO `tb_cidades` VALUES (3792, 11, 'MG', 'Sao Joao da Ponte');

INSERT INTO `tb_cidades` VALUES (3793, 11, 'MG', 'Sao Joao da Sapucaia');

INSERT INTO `tb_cidades` VALUES (3794, 11, 'MG', 'Sao Joao da Serra');

INSERT INTO `tb_cidades` VALUES (3795, 11, 'MG', 'Sao Joao da Serra Negra');

INSERT INTO `tb_cidades` VALUES (3796, 11, 'MG', 'Sao Joao da Vereda');

INSERT INTO `tb_cidades` VALUES (3797, 11, 'MG', 'Sao Joao das Missoes');

INSERT INTO `tb_cidades` VALUES (3798, 11, 'MG', 'Sao Joao Del Rei');

INSERT INTO `tb_cidades` VALUES (3799, 11, 'MG', 'Sao Joao do Bonito');

INSERT INTO `tb_cidades` VALUES (3800, 11, 'MG', 'Sao Joao do Jacutinga');

INSERT INTO `tb_cidades` VALUES (3801, 11, 'MG', 'Sao Joao do Manhuacu');

INSERT INTO `tb_cidades` VALUES (3802, 11, 'MG', 'Sao Joao do Manteninha');

INSERT INTO `tb_cidades` VALUES (3803, 11, 'MG', 'Sao Joao do Oriente');

INSERT INTO `tb_cidades` VALUES (3804, 11, 'MG', 'Sao Joao do Pacui');

INSERT INTO `tb_cidades` VALUES (3805, 11, 'MG', 'Sao Joao do Paraiso');

INSERT INTO `tb_cidades` VALUES (3806, 11, 'MG', 'Sao Joao Evangelista');

INSERT INTO `tb_cidades` VALUES (3807, 11, 'MG', 'Sao Joao Nepomuceno');

INSERT INTO `tb_cidades` VALUES (3808, 11, 'MG', 'Sao Joaquim');

INSERT INTO `tb_cidades` VALUES (3809, 11, 'MG', 'Sao Joaquim de Bicas');

INSERT INTO `tb_cidades` VALUES (3810, 11, 'MG', 'Sao Jose da Barra');

INSERT INTO `tb_cidades` VALUES (3811, 11, 'MG', 'Sao Jose da Bela Vista');

INSERT INTO `tb_cidades` VALUES (3812, 11, 'MG', 'Sao Jose da Lapa');

INSERT INTO `tb_cidades` VALUES (3813, 11, 'MG', 'Sao Jose da Pedra Menina');

INSERT INTO `tb_cidades` VALUES (3814, 11, 'MG', 'Sao Jose da Safira');

INSERT INTO `tb_cidades` VALUES (3815, 11, 'MG', 'Sao Jose da Varginha');

INSERT INTO `tb_cidades` VALUES (3816, 11, 'MG', 'Sao Jose das Tronqueiras');

INSERT INTO `tb_cidades` VALUES (3817, 11, 'MG', 'Sao Jose do Acacio');

INSERT INTO `tb_cidades` VALUES (3818, 11, 'MG', 'Sao Jose do Alegre');

INSERT INTO `tb_cidades` VALUES (3819, 11, 'MG', 'Sao Jose do Barreiro');

INSERT INTO `tb_cidades` VALUES (3820, 11, 'MG', 'Sao Jose do Batatal');

INSERT INTO `tb_cidades` VALUES (3821, 11, 'MG', 'Sao Jose do Buriti');

INSERT INTO `tb_cidades` VALUES (3822, 11, 'MG', 'Sao Jose do Divino');

INSERT INTO `tb_cidades` VALUES (3823, 11, 'MG', 'Sao Jose do Goiabal');

INSERT INTO `tb_cidades` VALUES (3824, 11, 'MG', 'Sao Jose do Itueto');

INSERT INTO `tb_cidades` VALUES (3825, 11, 'MG', 'Sao Jose do Jacuri');

INSERT INTO `tb_cidades` VALUES (3826, 11, 'MG', 'Sao Jose do Mantimento');

INSERT INTO `tb_cidades` VALUES (3827, 11, 'MG', 'Sao Jose do Mato Dentro');

INSERT INTO `tb_cidades` VALUES (3828, 11, 'MG', 'Sao Jose do Pantano');

INSERT INTO `tb_cidades` VALUES (3829, 11, 'MG', 'Sao Jose do Paraopeba');

INSERT INTO `tb_cidades` VALUES (3830, 11, 'MG', 'Sao Jose dos Lopes');

INSERT INTO `tb_cidades` VALUES (3831, 11, 'MG', 'Sao Jose dos Salgados');

INSERT INTO `tb_cidades` VALUES (3832, 11, 'MG', 'Sao Lourenco');

INSERT INTO `tb_cidades` VALUES (3833, 11, 'MG', 'Sao Manoel do Guaiacu');

INSERT INTO `tb_cidades` VALUES (3834, 11, 'MG', 'Sao Mateus de Minas');

INSERT INTO `tb_cidades` VALUES (3835, 11, 'MG', 'Sao Miguel do Anta');

INSERT INTO `tb_cidades` VALUES (3836, 11, 'MG', 'Sao Pedro da Garca');

INSERT INTO `tb_cidades` VALUES (3837, 11, 'MG', 'Sao Pedro da Uniao');

INSERT INTO `tb_cidades` VALUES (3838, 11, 'MG', 'Sao Pedro das Tabocas');

INSERT INTO `tb_cidades` VALUES (3839, 11, 'MG', 'Sao Pedro de Caldas');

INSERT INTO `tb_cidades` VALUES (3840, 11, 'MG', 'Sao Pedro do Avai');

INSERT INTO `tb_cidades` VALUES (3841, 11, 'MG', 'Sao Pedro do Gloria');

INSERT INTO `tb_cidades` VALUES (3842, 11, 'MG', 'Sao Pedro do Jequitinhonha');

INSERT INTO `tb_cidades` VALUES (3843, 11, 'MG', 'Sao Pedro do Suacui');

INSERT INTO `tb_cidades` VALUES (3844, 11, 'MG', 'Sao Pedro dos Ferros');

INSERT INTO `tb_cidades` VALUES (3845, 11, 'MG', 'Sao Roberto');

INSERT INTO `tb_cidades` VALUES (3846, 11, 'MG', 'Sao Romao');

INSERT INTO `tb_cidades` VALUES (3847, 11, 'MG', 'Sao Roque de Minas');

INSERT INTO `tb_cidades` VALUES (3848, 11, 'MG', 'Sao Sebastiao da Barra');

INSERT INTO `tb_cidades` VALUES (3849, 11, 'MG', 'Sao Sebastiao da Bela Vista');

INSERT INTO `tb_cidades` VALUES (3850, 11, 'MG', 'Sao Sebastiao da Vala');

INSERT INTO `tb_cidades` VALUES (3851, 11, 'MG', 'Sao Sebastiao da Vargem Alegre');

INSERT INTO `tb_cidades` VALUES (3852, 11, 'MG', 'Sao Sebastiao da Vitoria');

INSERT INTO `tb_cidades` VALUES (3853, 11, 'MG', 'Sao Sebastiao de Braunas');

INSERT INTO `tb_cidades` VALUES (3854, 11, 'MG', 'Sao Sebastiao do Anta');

INSERT INTO `tb_cidades` VALUES (3855, 11, 'MG', 'Sao Sebastiao do Baixio');

INSERT INTO `tb_cidades` VALUES (3856, 11, 'MG', 'Sao Sebastiao do Barreado');

INSERT INTO `tb_cidades` VALUES (3857, 11, 'MG', 'Sao Sebastiao do Barreiro');

INSERT INTO `tb_cidades` VALUES (3858, 11, 'MG', 'Sao Sebastiao do Bonsucesso');

INSERT INTO `tb_cidades` VALUES (3859, 11, 'MG', 'Sao Sebastiao do Bugre');

INSERT INTO `tb_cidades` VALUES (3860, 11, 'MG', 'Sao Sebastiao do Gil');

INSERT INTO `tb_cidades` VALUES (3861, 11, 'MG', 'Sao Sebastiao do Maranhao');

INSERT INTO `tb_cidades` VALUES (3862, 11, 'MG', 'Sao Sebastiao do Oculo');

INSERT INTO `tb_cidades` VALUES (3863, 11, 'MG', 'Sao Sebastiao do Oeste');

INSERT INTO `tb_cidades` VALUES (3864, 11, 'MG', 'Sao Sebastiao do Paraiso');

INSERT INTO `tb_cidades` VALUES (3865, 11, 'MG', 'Sao Sebastiao do Pontal');

INSERT INTO `tb_cidades` VALUES (3866, 11, 'MG', 'Sao Sebastiao do Rio Preto');

INSERT INTO `tb_cidades` VALUES (3867, 11, 'MG', 'Sao Sebastiao do Rio Verde');

INSERT INTO `tb_cidades` VALUES (3868, 11, 'MG', 'Sao Sebastiao do Sacramento');

INSERT INTO `tb_cidades` VALUES (3869, 11, 'MG', 'Sao Sebastiao do Soberbo');

INSERT INTO `tb_cidades` VALUES (3870, 11, 'MG', 'Sao Sebastiao dos Pocoes');

INSERT INTO `tb_cidades` VALUES (3871, 11, 'MG', 'Sao Sebastiao dos Robertos');

INSERT INTO `tb_cidades` VALUES (3872, 11, 'MG', 'Sao Sebastiao dos Torres');

INSERT INTO `tb_cidades` VALUES (3873, 11, 'MG', 'Sao Tiago');

INSERT INTO `tb_cidades` VALUES (3874, 11, 'MG', 'Sao Tomas de Aquino');

INSERT INTO `tb_cidades` VALUES (3875, 11, 'MG', 'Sao Tome das Letras');

INSERT INTO `tb_cidades` VALUES (3876, 11, 'MG', 'Sao Vicente');

INSERT INTO `tb_cidades` VALUES (3877, 11, 'MG', 'Sao Vicente da Estrela');

INSERT INTO `tb_cidades` VALUES (3878, 11, 'MG', 'Sao Vicente de Minas');

INSERT INTO `tb_cidades` VALUES (3879, 11, 'MG', 'Sao Vicente do Grama');

INSERT INTO `tb_cidades` VALUES (3880, 11, 'MG', 'Sao Vicente do Rio Doce');

INSERT INTO `tb_cidades` VALUES (3881, 11, 'MG', 'Sao Vitor');

INSERT INTO `tb_cidades` VALUES (3882, 11, 'MG', 'Sapucai');

INSERT INTO `tb_cidades` VALUES (3883, 11, 'MG', 'Sapucai-mirim');

INSERT INTO `tb_cidades` VALUES (3884, 11, 'MG', 'Sapucaia');

INSERT INTO `tb_cidades` VALUES (3885, 11, 'MG', 'Sapucaia de Guanhaes');

INSERT INTO `tb_cidades` VALUES (3886, 11, 'MG', 'Sapucaia do Norte');

INSERT INTO `tb_cidades` VALUES (3887, 11, 'MG', 'Sarandira');

INSERT INTO `tb_cidades` VALUES (3888, 11, 'MG', 'Sardoa');

INSERT INTO `tb_cidades` VALUES (3889, 11, 'MG', 'Sarzedo');

INSERT INTO `tb_cidades` VALUES (3890, 11, 'MG', 'Saudade');

INSERT INTO `tb_cidades` VALUES (3891, 11, 'MG', 'Sem Peixe');

INSERT INTO `tb_cidades` VALUES (3892, 11, 'MG', 'Senador Amaral');

INSERT INTO `tb_cidades` VALUES (3893, 11, 'MG', 'Senador Cortes');

INSERT INTO `tb_cidades` VALUES (3894, 11, 'MG', 'Senador Firmino');

INSERT INTO `tb_cidades` VALUES (3895, 11, 'MG', 'Senador Jose Bento');

INSERT INTO `tb_cidades` VALUES (3896, 11, 'MG', 'Senador Melo Viana');

INSERT INTO `tb_cidades` VALUES (3897, 11, 'MG', 'Senador Modestino Goncalves');

INSERT INTO `tb_cidades` VALUES (3898, 11, 'MG', 'Senador Mourao');

INSERT INTO `tb_cidades` VALUES (3899, 11, 'MG', 'Senhora da Gloria');

INSERT INTO `tb_cidades` VALUES (3900, 11, 'MG', 'Senhora da Penha');

INSERT INTO `tb_cidades` VALUES (3901, 11, 'MG', 'Senhora das Dores');

INSERT INTO `tb_cidades` VALUES (3902, 11, 'MG', 'Senhora de Oliveira');

INSERT INTO `tb_cidades` VALUES (3903, 11, 'MG', 'Senhora do Carmo');

INSERT INTO `tb_cidades` VALUES (3904, 11, 'MG', 'Senhora do Porto');

INSERT INTO `tb_cidades` VALUES (3905, 11, 'MG', 'Senhora dos Remedios');

INSERT INTO `tb_cidades` VALUES (3906, 11, 'MG', 'Sereno');

INSERT INTO `tb_cidades` VALUES (3907, 11, 'MG', 'Sericita');

INSERT INTO `tb_cidades` VALUES (3908, 11, 'MG', 'Seritinga');

INSERT INTO `tb_cidades` VALUES (3909, 11, 'MG', 'Serra Azul');

INSERT INTO `tb_cidades` VALUES (3910, 11, 'MG', 'Serra Azul de Minas');

INSERT INTO `tb_cidades` VALUES (3911, 11, 'MG', 'Serra Bonita');

INSERT INTO `tb_cidades` VALUES (3912, 11, 'MG', 'Serra da Canastra');

INSERT INTO `tb_cidades` VALUES (3913, 11, 'MG', 'Serra da Saudade');

INSERT INTO `tb_cidades` VALUES (3914, 11, 'MG', 'Serra das Araras');

INSERT INTO `tb_cidades` VALUES (3915, 11, 'MG', 'Serra do Camapua');

INSERT INTO `tb_cidades` VALUES (3916, 11, 'MG', 'Serra do Salitre');

INSERT INTO `tb_cidades` VALUES (3917, 11, 'MG', 'Serra dos Aimores');

INSERT INTO `tb_cidades` VALUES (3918, 11, 'MG', 'Serra dos Lemes');

INSERT INTO `tb_cidades` VALUES (3919, 11, 'MG', 'Serra Nova');

INSERT INTO `tb_cidades` VALUES (3920, 11, 'MG', 'Serrania');

INSERT INTO `tb_cidades` VALUES (3921, 11, 'MG', 'Serranopolis de Minas');

INSERT INTO `tb_cidades` VALUES (3922, 11, 'MG', 'Serranos');

INSERT INTO `tb_cidades` VALUES (3923, 11, 'MG', 'Serro');

INSERT INTO `tb_cidades` VALUES (3924, 11, 'MG', 'Sertaozinho');

INSERT INTO `tb_cidades` VALUES (3925, 11, 'MG', 'Sete Cachoeiras');

INSERT INTO `tb_cidades` VALUES (3926, 11, 'MG', 'Sete Lagoas');

INSERT INTO `tb_cidades` VALUES (3927, 11, 'MG', 'Setubinha');

INSERT INTO `tb_cidades` VALUES (3928, 11, 'MG', 'Silva Campos');

INSERT INTO `tb_cidades` VALUES (3929, 11, 'MG', 'Silva Xavier');

INSERT INTO `tb_cidades` VALUES (3930, 11, 'MG', 'Silvano');

INSERT INTO `tb_cidades` VALUES (3931, 11, 'MG', 'Silveira Carvalho');

INSERT INTO `tb_cidades` VALUES (3932, 11, 'MG', 'Silveirania');

INSERT INTO `tb_cidades` VALUES (3933, 11, 'MG', 'Silvestre');

INSERT INTO `tb_cidades` VALUES (3934, 11, 'MG', 'Silvianopolis');

INSERT INTO `tb_cidades` VALUES (3935, 11, 'MG', 'Simao Campos');

INSERT INTO `tb_cidades` VALUES (3936, 11, 'MG', 'Simao Pereira');

INSERT INTO `tb_cidades` VALUES (3937, 11, 'MG', 'Simonesia');

INSERT INTO `tb_cidades` VALUES (3938, 11, 'MG', 'Sobral Pinto');

INSERT INTO `tb_cidades` VALUES (3939, 11, 'MG', 'Sobralia');

INSERT INTO `tb_cidades` VALUES (3940, 11, 'MG', 'Soledade de Minas');

INSERT INTO `tb_cidades` VALUES (3941, 11, 'MG', 'Sopa');

INSERT INTO `tb_cidades` VALUES (3942, 11, 'MG', 'Tabajara');

INSERT INTO `tb_cidades` VALUES (3943, 11, 'MG', 'Tabauna');

INSERT INTO `tb_cidades` VALUES (3944, 11, 'MG', 'Tabuao');

INSERT INTO `tb_cidades` VALUES (3945, 11, 'MG', 'Tabuleiro');

INSERT INTO `tb_cidades` VALUES (3946, 11, 'MG', 'Taiobeiras');

INSERT INTO `tb_cidades` VALUES (3947, 11, 'MG', 'Taparuba');

INSERT INTO `tb_cidades` VALUES (3948, 11, 'MG', 'Tapira');

INSERT INTO `tb_cidades` VALUES (3949, 11, 'MG', 'Tapirai');

INSERT INTO `tb_cidades` VALUES (3950, 11, 'MG', 'Tapuirama');

INSERT INTO `tb_cidades` VALUES (3951, 11, 'MG', 'Taquaracu de Minas');

INSERT INTO `tb_cidades` VALUES (3952, 11, 'MG', 'Taruacu');

INSERT INTO `tb_cidades` VALUES (3953, 11, 'MG', 'Tarumirim');

INSERT INTO `tb_cidades` VALUES (3954, 11, 'MG', 'Tebas');

INSERT INTO `tb_cidades` VALUES (3955, 11, 'MG', 'Teixeiras');

INSERT INTO `tb_cidades` VALUES (3956, 11, 'MG', 'Tejuco');

INSERT INTO `tb_cidades` VALUES (3957, 11, 'MG', 'Teofilo Otoni');

INSERT INTO `tb_cidades` VALUES (3958, 11, 'MG', 'Terra Branca');

INSERT INTO `tb_cidades` VALUES (3959, 11, 'MG', 'Timoteo');

INSERT INTO `tb_cidades` VALUES (3960, 11, 'MG', 'Tiradentes');

INSERT INTO `tb_cidades` VALUES (3961, 11, 'MG', 'Tiros');

INSERT INTO `tb_cidades` VALUES (3962, 11, 'MG', 'Tobati');

INSERT INTO `tb_cidades` VALUES (3963, 11, 'MG', 'Tocandira');

INSERT INTO `tb_cidades` VALUES (3964, 11, 'MG', 'Tocantins');

INSERT INTO `tb_cidades` VALUES (3965, 11, 'MG', 'Tocos do Moji');

INSERT INTO `tb_cidades` VALUES (3966, 11, 'MG', 'Toledo');

INSERT INTO `tb_cidades` VALUES (3967, 11, 'MG', 'Tomas Gonzaga');

INSERT INTO `tb_cidades` VALUES (3968, 11, 'MG', 'Tombos');

INSERT INTO `tb_cidades` VALUES (3969, 11, 'MG', 'Topazio');

INSERT INTO `tb_cidades` VALUES (3970, 11, 'MG', 'Torneiros');

INSERT INTO `tb_cidades` VALUES (3971, 11, 'MG', 'Torreoes');

INSERT INTO `tb_cidades` VALUES (3972, 11, 'MG', 'Tres Coracoes');

INSERT INTO `tb_cidades` VALUES (3973, 11, 'MG', 'Tres Ilhas');

INSERT INTO `tb_cidades` VALUES (3974, 11, 'MG', 'Tres Marias');

INSERT INTO `tb_cidades` VALUES (3975, 11, 'MG', 'Tres Pontas');

INSERT INTO `tb_cidades` VALUES (3976, 11, 'MG', 'Trimonte');

INSERT INTO `tb_cidades` VALUES (3977, 11, 'MG', 'Tuiutinga');

INSERT INTO `tb_cidades` VALUES (3978, 11, 'MG', 'Tumiritinga');

INSERT INTO `tb_cidades` VALUES (3979, 11, 'MG', 'Tupaciguara');

INSERT INTO `tb_cidades` VALUES (3980, 11, 'MG', 'Tuparece');

INSERT INTO `tb_cidades` VALUES (3981, 11, 'MG', 'Turmalina');

INSERT INTO `tb_cidades` VALUES (3982, 11, 'MG', 'Turvolandia');

INSERT INTO `tb_cidades` VALUES (3983, 11, 'MG', 'Uba');

INSERT INTO `tb_cidades` VALUES (3984, 11, 'MG', 'Ubai');

INSERT INTO `tb_cidades` VALUES (3985, 11, 'MG', 'Ubaporanga');

INSERT INTO `tb_cidades` VALUES (3986, 11, 'MG', 'Ubari');

INSERT INTO `tb_cidades` VALUES (3987, 11, 'MG', 'Uberaba');

INSERT INTO `tb_cidades` VALUES (3988, 11, 'MG', 'Uberlandia');

INSERT INTO `tb_cidades` VALUES (3989, 11, 'MG', 'Umburatiba');

INSERT INTO `tb_cidades` VALUES (3990, 11, 'MG', 'Umbuzeiro');

INSERT INTO `tb_cidades` VALUES (3991, 11, 'MG', 'Unai');

INSERT INTO `tb_cidades` VALUES (3992, 11, 'MG', 'Uniao de Minas');

INSERT INTO `tb_cidades` VALUES (3993, 11, 'MG', 'Uruana de Minas');

INSERT INTO `tb_cidades` VALUES (3994, 11, 'MG', 'Urucania');

INSERT INTO `tb_cidades` VALUES (3995, 11, 'MG', 'Urucuia');

INSERT INTO `tb_cidades` VALUES (3996, 11, 'MG', 'Usina Monte Alegre');

INSERT INTO `tb_cidades` VALUES (3997, 11, 'MG', 'Vai-volta');

INSERT INTO `tb_cidades` VALUES (3998, 11, 'MG', 'Valadares');

INSERT INTO `tb_cidades` VALUES (3999, 11, 'MG', 'Valao');

INSERT INTO `tb_cidades` VALUES (4000, 11, 'MG', 'Vale Verde de Minas');

INSERT INTO `tb_cidades` VALUES (4001, 11, 'MG', 'Valo Fundo');

INSERT INTO `tb_cidades` VALUES (4002, 11, 'MG', 'Vargem Alegre');

INSERT INTO `tb_cidades` VALUES (4003, 11, 'MG', 'Vargem Bonita');

INSERT INTO `tb_cidades` VALUES (4004, 11, 'MG', 'Vargem Grande do Rio Pardo');

INSERT INTO `tb_cidades` VALUES (4005, 11, 'MG', 'Vargem Linda');

INSERT INTO `tb_cidades` VALUES (4006, 11, 'MG', 'Varginha');

INSERT INTO `tb_cidades` VALUES (4007, 11, 'MG', 'Varjao de Minas');

INSERT INTO `tb_cidades` VALUES (4008, 11, 'MG', 'Varzea da Palma');

INSERT INTO `tb_cidades` VALUES (4009, 11, 'MG', 'Varzelandia');

INSERT INTO `tb_cidades` VALUES (4010, 11, 'MG', 'Vau-acu');

INSERT INTO `tb_cidades` VALUES (4011, 11, 'MG', 'Vazante');

INSERT INTO `tb_cidades` VALUES (4012, 11, 'MG', 'Vera Cruz de Minas');

INSERT INTO `tb_cidades` VALUES (4013, 11, 'MG', 'Verdelandia');

INSERT INTO `tb_cidades` VALUES (4014, 11, 'MG', 'Vereda do Paraiso');

INSERT INTO `tb_cidades` VALUES (4015, 11, 'MG', 'Veredas');

INSERT INTO `tb_cidades` VALUES (4016, 11, 'MG', 'Veredinha');

INSERT INTO `tb_cidades` VALUES (4017, 11, 'MG', 'Verissimo');

INSERT INTO `tb_cidades` VALUES (4018, 11, 'MG', 'Vermelho');

INSERT INTO `tb_cidades` VALUES (4019, 11, 'MG', 'Vermelho Novo');

INSERT INTO `tb_cidades` VALUES (4020, 11, 'MG', 'Vermelho Velho');

INSERT INTO `tb_cidades` VALUES (4021, 11, 'MG', 'Vespasiano');

INSERT INTO `tb_cidades` VALUES (4022, 11, 'MG', 'Vicosa');

INSERT INTO `tb_cidades` VALUES (4023, 11, 'MG', 'Vieiras');

INSERT INTO `tb_cidades` VALUES (4024, 11, 'MG', 'Vila Bom Jesus');

INSERT INTO `tb_cidades` VALUES (4025, 11, 'MG', 'Vila Costina');

INSERT INTO `tb_cidades` VALUES (4026, 11, 'MG', 'Vila Nova de Minas');

INSERT INTO `tb_cidades` VALUES (4027, 11, 'MG', 'Vila Nova dos Pocoes');

INSERT INTO `tb_cidades` VALUES (4028, 11, 'MG', 'Vila Pereira');

INSERT INTO `tb_cidades` VALUES (4029, 11, 'MG', 'Vilas Boas');

INSERT INTO `tb_cidades` VALUES (4030, 11, 'MG', 'Virgem da Lapa');

INSERT INTO `tb_cidades` VALUES (4031, 11, 'MG', 'Virginia');

INSERT INTO `tb_cidades` VALUES (4032, 11, 'MG', 'Virginopolis');

INSERT INTO `tb_cidades` VALUES (4033, 11, 'MG', 'Virgolandia');

INSERT INTO `tb_cidades` VALUES (4034, 11, 'MG', 'Visconde do Rio Branco');

INSERT INTO `tb_cidades` VALUES (4035, 11, 'MG', 'Vista Alegre');

INSERT INTO `tb_cidades` VALUES (4036, 11, 'MG', 'Vitorinos');

INSERT INTO `tb_cidades` VALUES (4037, 11, 'MG', 'Volta Grande');

INSERT INTO `tb_cidades` VALUES (4038, 11, 'MG', 'Wenceslau Braz');

INSERT INTO `tb_cidades` VALUES (4039, 11, 'MG', 'Zelandia');

INSERT INTO `tb_cidades` VALUES (4040, 11, 'MG', 'Zito Soares');

INSERT INTO `tb_cidades` VALUES (4041, 12, 'MS', 'Agua Boa');

INSERT INTO `tb_cidades` VALUES (4042, 12, 'MS', 'Agua Clara');

INSERT INTO `tb_cidades` VALUES (4043, 12, 'MS', 'Albuquerque');

INSERT INTO `tb_cidades` VALUES (4044, 12, 'MS', 'Alcinopolis');

INSERT INTO `tb_cidades` VALUES (4045, 12, 'MS', 'Alto Sucuriu');

INSERT INTO `tb_cidades` VALUES (4046, 12, 'MS', 'Amambai');

INSERT INTO `tb_cidades` VALUES (4047, 12, 'MS', 'Amandina');

INSERT INTO `tb_cidades` VALUES (4048, 12, 'MS', 'Amolar');

INSERT INTO `tb_cidades` VALUES (4049, 12, 'MS', 'Anastacio');

INSERT INTO `tb_cidades` VALUES (4050, 12, 'MS', 'Anaurilandia');

INSERT INTO `tb_cidades` VALUES (4051, 12, 'MS', 'Angelica');

INSERT INTO `tb_cidades` VALUES (4052, 12, 'MS', 'Anhandui');

INSERT INTO `tb_cidades` VALUES (4053, 12, 'MS', 'Antonio Joao');

INSERT INTO `tb_cidades` VALUES (4054, 12, 'MS', 'Aparecida do Taboado');

INSERT INTO `tb_cidades` VALUES (4055, 12, 'MS', 'Aquidauana');

INSERT INTO `tb_cidades` VALUES (4056, 12, 'MS', 'Aral Moreira');

INSERT INTO `tb_cidades` VALUES (4057, 12, 'MS', 'Arapua');

INSERT INTO `tb_cidades` VALUES (4058, 12, 'MS', 'Areado');

INSERT INTO `tb_cidades` VALUES (4059, 12, 'MS', 'Arvore Grande');

INSERT INTO `tb_cidades` VALUES (4060, 12, 'MS', 'Baianopolis');

INSERT INTO `tb_cidades` VALUES (4061, 12, 'MS', 'Balsamo');

INSERT INTO `tb_cidades` VALUES (4062, 12, 'MS', 'Bandeirantes');

INSERT INTO `tb_cidades` VALUES (4063, 12, 'MS', 'Bataguassu');

INSERT INTO `tb_cidades` VALUES (4064, 12, 'MS', 'Bataipora');

INSERT INTO `tb_cidades` VALUES (4065, 12, 'MS', 'Baus');

INSERT INTO `tb_cidades` VALUES (4066, 12, 'MS', 'Bela Vista');

INSERT INTO `tb_cidades` VALUES (4067, 12, 'MS', 'Bocaja');

INSERT INTO `tb_cidades` VALUES (4068, 12, 'MS', 'Bodoquena');

INSERT INTO `tb_cidades` VALUES (4069, 12, 'MS', 'Bom Fim');

INSERT INTO `tb_cidades` VALUES (4070, 12, 'MS', 'Bonito');

INSERT INTO `tb_cidades` VALUES (4071, 12, 'MS', 'Boqueirao');

INSERT INTO `tb_cidades` VALUES (4072, 12, 'MS', 'Brasilandia');

INSERT INTO `tb_cidades` VALUES (4073, 12, 'MS', 'Caarapo');

INSERT INTO `tb_cidades` VALUES (4074, 12, 'MS', 'Cabeceira do Apa');

INSERT INTO `tb_cidades` VALUES (4075, 12, 'MS', 'Cachoeira');

INSERT INTO `tb_cidades` VALUES (4076, 12, 'MS', 'Camapua');

INSERT INTO `tb_cidades` VALUES (4077, 12, 'MS', 'Camisao');

INSERT INTO `tb_cidades` VALUES (4078, 12, 'MS', 'Campestre');

INSERT INTO `tb_cidades` VALUES (4079, 12, 'MS', 'Campo Grande');

INSERT INTO `tb_cidades` VALUES (4080, 12, 'MS', 'Capao Seco');

INSERT INTO `tb_cidades` VALUES (4081, 12, 'MS', 'Caracol');

INSERT INTO `tb_cidades` VALUES (4082, 12, 'MS', 'Carumbe');

INSERT INTO `tb_cidades` VALUES (4083, 12, 'MS', 'Cassilandia');

INSERT INTO `tb_cidades` VALUES (4084, 12, 'MS', 'Chapadao do Sul');

INSERT INTO `tb_cidades` VALUES (4085, 12, 'MS', 'Cipolandia');

INSERT INTO `tb_cidades` VALUES (4086, 12, 'MS', 'Coimbra');

INSERT INTO `tb_cidades` VALUES (4087, 12, 'MS', 'Congonha');

INSERT INTO `tb_cidades` VALUES (4088, 12, 'MS', 'Corguinho');

INSERT INTO `tb_cidades` VALUES (4089, 12, 'MS', 'Coronel Sapucaia');

INSERT INTO `tb_cidades` VALUES (4090, 12, 'MS', 'Corumba');

INSERT INTO `tb_cidades` VALUES (4091, 12, 'MS', 'Costa Rica');

INSERT INTO `tb_cidades` VALUES (4092, 12, 'MS', 'Coxim');

INSERT INTO `tb_cidades` VALUES (4093, 12, 'MS', 'Cristalina');

INSERT INTO `tb_cidades` VALUES (4094, 12, 'MS', 'Cruzaltina');

INSERT INTO `tb_cidades` VALUES (4095, 12, 'MS', 'Culturama');

INSERT INTO `tb_cidades` VALUES (4096, 12, 'MS', 'Cupins');

INSERT INTO `tb_cidades` VALUES (4097, 12, 'MS', 'Debrasa');

INSERT INTO `tb_cidades` VALUES (4098, 12, 'MS', 'Deodapolis');

INSERT INTO `tb_cidades` VALUES (4099, 12, 'MS', 'Dois Irmaos do Buriti');

INSERT INTO `tb_cidades` VALUES (4100, 12, 'MS', 'Douradina');

INSERT INTO `tb_cidades` VALUES (4101, 12, 'MS', 'Dourados');

INSERT INTO `tb_cidades` VALUES (4102, 12, 'MS', 'Eldorado');

INSERT INTO `tb_cidades` VALUES (4103, 12, 'MS', 'Fatima do Sul');

INSERT INTO `tb_cidades` VALUES (4104, 12, 'MS', 'Figueirao');

INSERT INTO `tb_cidades` VALUES (4105, 12, 'MS', 'Garcias');

INSERT INTO `tb_cidades` VALUES (4106, 12, 'MS', 'Gloria de Dourados');

INSERT INTO `tb_cidades` VALUES (4107, 12, 'MS', 'Guacu');

INSERT INTO `tb_cidades` VALUES (4108, 12, 'MS', 'Guaculandia');

INSERT INTO `tb_cidades` VALUES (4109, 12, 'MS', 'Guadalupe do Alto Parana');

INSERT INTO `tb_cidades` VALUES (4110, 12, 'MS', 'Guia Lopes da Laguna');

INSERT INTO `tb_cidades` VALUES (4111, 12, 'MS', 'Iguatemi');

INSERT INTO `tb_cidades` VALUES (4112, 12, 'MS', 'Ilha Comprida');

INSERT INTO `tb_cidades` VALUES (4113, 12, 'MS', 'Ilha Grande');

INSERT INTO `tb_cidades` VALUES (4114, 12, 'MS', 'Indaia do Sul');

INSERT INTO `tb_cidades` VALUES (4115, 12, 'MS', 'Indaia Grande');

INSERT INTO `tb_cidades` VALUES (4116, 12, 'MS', 'Indapolis');

INSERT INTO `tb_cidades` VALUES (4117, 12, 'MS', 'Inocencia');

INSERT INTO `tb_cidades` VALUES (4118, 12, 'MS', 'Ipezal');

INSERT INTO `tb_cidades` VALUES (4119, 12, 'MS', 'Itahum');

INSERT INTO `tb_cidades` VALUES (4120, 12, 'MS', 'Itapora');

INSERT INTO `tb_cidades` VALUES (4121, 12, 'MS', 'Itaquirai');

INSERT INTO `tb_cidades` VALUES (4122, 12, 'MS', 'Ivinhema');

INSERT INTO `tb_cidades` VALUES (4123, 12, 'MS', 'Jabuti');

INSERT INTO `tb_cidades` VALUES (4124, 12, 'MS', 'Jacarei');

INSERT INTO `tb_cidades` VALUES (4125, 12, 'MS', 'Japora');

INSERT INTO `tb_cidades` VALUES (4126, 12, 'MS', 'Jaraguari');

INSERT INTO `tb_cidades` VALUES (4127, 12, 'MS', 'Jardim');

INSERT INTO `tb_cidades` VALUES (4128, 12, 'MS', 'Jatei');

INSERT INTO `tb_cidades` VALUES (4129, 12, 'MS', 'Jauru');

INSERT INTO `tb_cidades` VALUES (4130, 12, 'MS', 'Juscelandia');

INSERT INTO `tb_cidades` VALUES (4131, 12, 'MS', 'Juti');

INSERT INTO `tb_cidades` VALUES (4132, 12, 'MS', 'Ladario');

INSERT INTO `tb_cidades` VALUES (4133, 12, 'MS', 'Lagoa Bonita');

INSERT INTO `tb_cidades` VALUES (4134, 12, 'MS', 'Laguna Carapa');

INSERT INTO `tb_cidades` VALUES (4135, 12, 'MS', 'Maracaju');

INSERT INTO `tb_cidades` VALUES (4136, 12, 'MS', 'Miranda');

INSERT INTO `tb_cidades` VALUES (4137, 12, 'MS', 'Montese');

INSERT INTO `tb_cidades` VALUES (4138, 12, 'MS', 'Morangas');

INSERT INTO `tb_cidades` VALUES (4139, 12, 'MS', 'Morraria do Sul');

INSERT INTO `tb_cidades` VALUES (4140, 12, 'MS', 'Morumbi');

INSERT INTO `tb_cidades` VALUES (4141, 12, 'MS', 'Mundo Novo');

INSERT INTO `tb_cidades` VALUES (4142, 12, 'MS', 'Navirai');

INSERT INTO `tb_cidades` VALUES (4143, 12, 'MS', 'Nhecolandia');

INSERT INTO `tb_cidades` VALUES (4144, 12, 'MS', 'Nioaque');

INSERT INTO `tb_cidades` VALUES (4145, 12, 'MS', 'Nossa Senhora de Fatima');

INSERT INTO `tb_cidades` VALUES (4146, 12, 'MS', 'Nova Alvorada do Sul');

INSERT INTO `tb_cidades` VALUES (4147, 12, 'MS', 'Nova America');

INSERT INTO `tb_cidades` VALUES (4148, 12, 'MS', 'Nova Andradina');

INSERT INTO `tb_cidades` VALUES (4149, 12, 'MS', 'Nova Esperanca');

INSERT INTO `tb_cidades` VALUES (4150, 12, 'MS', 'Nova Jales');

INSERT INTO `tb_cidades` VALUES (4151, 12, 'MS', 'Novo Horizonte do Sul');

INSERT INTO `tb_cidades` VALUES (4152, 12, 'MS', 'Oriente');

INSERT INTO `tb_cidades` VALUES (4153, 12, 'MS', 'Paiaguas');

INSERT INTO `tb_cidades` VALUES (4154, 12, 'MS', 'Palmeiras');

INSERT INTO `tb_cidades` VALUES (4155, 12, 'MS', 'Panambi');

INSERT INTO `tb_cidades` VALUES (4156, 12, 'MS', 'Paraiso');

INSERT INTO `tb_cidades` VALUES (4157, 12, 'MS', 'Paranaiba');

INSERT INTO `tb_cidades` VALUES (4158, 12, 'MS', 'Paranhos');

INSERT INTO `tb_cidades` VALUES (4159, 12, 'MS', 'Pedro Gomes');

INSERT INTO `tb_cidades` VALUES (4160, 12, 'MS', 'Picadinha');

INSERT INTO `tb_cidades` VALUES (4161, 12, 'MS', 'Pirapora');

INSERT INTO `tb_cidades` VALUES (4162, 12, 'MS', 'Piraputanga');

INSERT INTO `tb_cidades` VALUES (4163, 12, 'MS', 'Ponta Pora');

INSERT INTO `tb_cidades` VALUES (4164, 12, 'MS', 'Ponte Vermelha');

INSERT INTO `tb_cidades` VALUES (4165, 12, 'MS', 'Pontinha do Cocho');

INSERT INTO `tb_cidades` VALUES (4166, 12, 'MS', 'Porto Esperanca');

INSERT INTO `tb_cidades` VALUES (4167, 12, 'MS', 'Porto Murtinho');

INSERT INTO `tb_cidades` VALUES (4168, 12, 'MS', 'Porto Vilma');

INSERT INTO `tb_cidades` VALUES (4169, 12, 'MS', 'Porto Xv de Novembro');

INSERT INTO `tb_cidades` VALUES (4170, 12, 'MS', 'Presidente Castelo');

INSERT INTO `tb_cidades` VALUES (4171, 12, 'MS', 'Prudencio Thomaz');

INSERT INTO `tb_cidades` VALUES (4172, 12, 'MS', 'Quebra Coco');

INSERT INTO `tb_cidades` VALUES (4173, 12, 'MS', 'Quebracho');

INSERT INTO `tb_cidades` VALUES (4174, 12, 'MS', 'Ribas do Rio Pardo');

INSERT INTO `tb_cidades` VALUES (4175, 12, 'MS', 'Rio Brilhante');

INSERT INTO `tb_cidades` VALUES (4176, 12, 'MS', 'Rio Negro');

INSERT INTO `tb_cidades` VALUES (4177, 12, 'MS', 'Rio Verde de Mato Grosso');

INSERT INTO `tb_cidades` VALUES (4178, 12, 'MS', 'Rochedinho');

INSERT INTO `tb_cidades` VALUES (4179, 12, 'MS', 'Rochedo');

INSERT INTO `tb_cidades` VALUES (4180, 12, 'MS', 'Sanga Puita');

INSERT INTO `tb_cidades` VALUES (4181, 12, 'MS', 'Santa Rita do Pardo');

INSERT INTO `tb_cidades` VALUES (4182, 12, 'MS', 'Santa Terezinha');

INSERT INTO `tb_cidades` VALUES (4183, 12, 'MS', 'Sao Gabriel do Oeste');

INSERT INTO `tb_cidades` VALUES (4184, 12, 'MS', 'Sao Joao do Apore');

INSERT INTO `tb_cidades` VALUES (4185, 12, 'MS', 'Sao Jose');

INSERT INTO `tb_cidades` VALUES (4186, 12, 'MS', 'Sao Jose do Sucuriu');

INSERT INTO `tb_cidades` VALUES (4187, 12, 'MS', 'Sao Pedro');

INSERT INTO `tb_cidades` VALUES (4188, 12, 'MS', 'Sao Romao');

INSERT INTO `tb_cidades` VALUES (4189, 12, 'MS', 'Selviria');

INSERT INTO `tb_cidades` VALUES (4190, 12, 'MS', 'Sete Quedas');

INSERT INTO `tb_cidades` VALUES (4191, 12, 'MS', 'Sidrolandia');

INSERT INTO `tb_cidades` VALUES (4192, 12, 'MS', 'Sonora');

INSERT INTO `tb_cidades` VALUES (4193, 12, 'MS', 'Tacuru');

INSERT INTO `tb_cidades` VALUES (4194, 12, 'MS', 'Tamandare');

INSERT INTO `tb_cidades` VALUES (4195, 12, 'MS', 'Taquari');

INSERT INTO `tb_cidades` VALUES (4196, 12, 'MS', 'Taquarussu');

INSERT INTO `tb_cidades` VALUES (4197, 12, 'MS', 'Taunay');

INSERT INTO `tb_cidades` VALUES (4198, 12, 'MS', 'Terenos');

INSERT INTO `tb_cidades` VALUES (4199, 12, 'MS', 'Tres Lagoas');

INSERT INTO `tb_cidades` VALUES (4200, 12, 'MS', 'Velhacaria');

INSERT INTO `tb_cidades` VALUES (4201, 12, 'MS', 'Vicentina');

INSERT INTO `tb_cidades` VALUES (4202, 12, 'MS', 'Vila Formosa');

INSERT INTO `tb_cidades` VALUES (4203, 12, 'MS', 'Vila Marques');

INSERT INTO `tb_cidades` VALUES (4204, 12, 'MS', 'Vila Rica');

INSERT INTO `tb_cidades` VALUES (4205, 12, 'MS', 'Vila Uniao');

INSERT INTO `tb_cidades` VALUES (4206, 12, 'MS', 'Vila Vargas');

INSERT INTO `tb_cidades` VALUES (4207, 12, 'MS', 'Vista Alegre');

INSERT INTO `tb_cidades` VALUES (4208, 13, 'MT', 'Acorizal');

INSERT INTO `tb_cidades` VALUES (4209, 13, 'MT', 'Agua Boa');

INSERT INTO `tb_cidades` VALUES (4210, 13, 'MT', 'Agua Fria');

INSERT INTO `tb_cidades` VALUES (4211, 13, 'MT', 'Aguacu');

INSERT INTO `tb_cidades` VALUES (4212, 13, 'MT', 'Aguapei');

INSERT INTO `tb_cidades` VALUES (4213, 13, 'MT', 'Aguas Claras');

INSERT INTO `tb_cidades` VALUES (4214, 13, 'MT', 'Ainhumas');

INSERT INTO `tb_cidades` VALUES (4215, 13, 'MT', 'Alcantilado');

INSERT INTO `tb_cidades` VALUES (4216, 13, 'MT', 'Alta Floresta');

INSERT INTO `tb_cidades` VALUES (4217, 13, 'MT', 'Alto Araguaia');

INSERT INTO `tb_cidades` VALUES (4218, 13, 'MT', 'Alto Boa Vista');

INSERT INTO `tb_cidades` VALUES (4219, 13, 'MT', 'Alto Coite');

INSERT INTO `tb_cidades` VALUES (4220, 13, 'MT', 'Alto Garcas');

INSERT INTO `tb_cidades` VALUES (4221, 13, 'MT', 'Alto Juruena');

INSERT INTO `tb_cidades` VALUES (4222, 13, 'MT', 'Alto Paraguai');

INSERT INTO `tb_cidades` VALUES (4223, 13, 'MT', 'Alto Paraiso');

INSERT INTO `tb_cidades` VALUES (4224, 13, 'MT', 'Alto Taquari');

INSERT INTO `tb_cidades` VALUES (4225, 13, 'MT', 'Analandia do Norte');

INSERT INTO `tb_cidades` VALUES (4226, 13, 'MT', 'Apiacas');

INSERT INTO `tb_cidades` VALUES (4227, 13, 'MT', 'Araguaiana');

INSERT INTO `tb_cidades` VALUES (4228, 13, 'MT', 'Araguainha');

INSERT INTO `tb_cidades` VALUES (4229, 13, 'MT', 'Araputanga');

INSERT INTO `tb_cidades` VALUES (4230, 13, 'MT', 'Arenapolis');

INSERT INTO `tb_cidades` VALUES (4231, 13, 'MT', 'Aripuana');

INSERT INTO `tb_cidades` VALUES (4232, 13, 'MT', 'Arruda');

INSERT INTO `tb_cidades` VALUES (4233, 13, 'MT', 'Assari');

INSERT INTO `tb_cidades` VALUES (4234, 13, 'MT', 'Barao de Melgaco');

INSERT INTO `tb_cidades` VALUES (4235, 13, 'MT', 'Barra do Bugres');

INSERT INTO `tb_cidades` VALUES (4236, 13, 'MT', 'Barra do Garcas');

INSERT INTO `tb_cidades` VALUES (4237, 13, 'MT', 'Batovi');

INSERT INTO `tb_cidades` VALUES (4238, 13, 'MT', 'Baus');

INSERT INTO `tb_cidades` VALUES (4239, 13, 'MT', 'Bauxi');

INSERT INTO `tb_cidades` VALUES (4240, 13, 'MT', 'Bel Rios');

INSERT INTO `tb_cidades` VALUES (4241, 13, 'MT', 'Bezerro Branco');

INSERT INTO `tb_cidades` VALUES (4242, 13, 'MT', 'Boa Esperanca');

INSERT INTO `tb_cidades` VALUES (4243, 13, 'MT', 'Boa Uniao');

INSERT INTO `tb_cidades` VALUES (4244, 13, 'MT', 'Boa Vista');

INSERT INTO `tb_cidades` VALUES (4245, 13, 'MT', 'Bom Sucesso');

INSERT INTO `tb_cidades` VALUES (4246, 13, 'MT', 'Brasnorte');

INSERT INTO `tb_cidades` VALUES (4247, 13, 'MT', 'Buriti');

INSERT INTO `tb_cidades` VALUES (4248, 13, 'MT', 'Caceres');

INSERT INTO `tb_cidades` VALUES (4249, 13, 'MT', 'Caite');

INSERT INTO `tb_cidades` VALUES (4250, 13, 'MT', 'Campinapolis');

INSERT INTO `tb_cidades` VALUES (4251, 13, 'MT', 'Campo Novo do Parecis');

INSERT INTO `tb_cidades` VALUES (4252, 13, 'MT', 'Campo Verde');

INSERT INTO `tb_cidades` VALUES (4253, 13, 'MT', 'Campos de Julio');

INSERT INTO `tb_cidades` VALUES (4254, 13, 'MT', 'Campos Novos');

INSERT INTO `tb_cidades` VALUES (4255, 13, 'MT', 'Canabrava do Norte');

INSERT INTO `tb_cidades` VALUES (4256, 13, 'MT', 'Canarana');

INSERT INTO `tb_cidades` VALUES (4257, 13, 'MT', 'Cangas');

INSERT INTO `tb_cidades` VALUES (4258, 13, 'MT', 'Capao Grande');

INSERT INTO `tb_cidades` VALUES (4259, 13, 'MT', 'Capao Verde');

INSERT INTO `tb_cidades` VALUES (4260, 13, 'MT', 'Caramujo');

INSERT INTO `tb_cidades` VALUES (4261, 13, 'MT', 'Caravagio');

INSERT INTO `tb_cidades` VALUES (4262, 13, 'MT', 'Carlinda');

INSERT INTO `tb_cidades` VALUES (4263, 13, 'MT', 'Cassununga');

INSERT INTO `tb_cidades` VALUES (4264, 13, 'MT', 'Castanheira');

INSERT INTO `tb_cidades` VALUES (4265, 13, 'MT', 'Catuai');

INSERT INTO `tb_cidades` VALUES (4266, 13, 'MT', 'Chapada dos Guimaraes');

INSERT INTO `tb_cidades` VALUES (4267, 13, 'MT', 'Cidade Morena');

INSERT INTO `tb_cidades` VALUES (4268, 13, 'MT', 'Claudia');

INSERT INTO `tb_cidades` VALUES (4269, 13, 'MT', 'Cocalinho');

INSERT INTO `tb_cidades` VALUES (4270, 13, 'MT', 'Colider');

INSERT INTO `tb_cidades` VALUES (4271, 13, 'MT', 'Colorado do Norte');

INSERT INTO `tb_cidades` VALUES (4272, 13, 'MT', 'Comodoro');

INSERT INTO `tb_cidades` VALUES (4273, 13, 'MT', 'Confresa');

INSERT INTO `tb_cidades` VALUES (4274, 13, 'MT', 'Coronel Ponce');

INSERT INTO `tb_cidades` VALUES (4275, 13, 'MT', 'Cotrel');

INSERT INTO `tb_cidades` VALUES (4276, 13, 'MT', 'Cotriguacu');

INSERT INTO `tb_cidades` VALUES (4277, 13, 'MT', 'Coxipo Acu');

INSERT INTO `tb_cidades` VALUES (4278, 13, 'MT', 'Coxipo da Ponte');

INSERT INTO `tb_cidades` VALUES (4279, 13, 'MT', 'Coxipo do Ouro');

INSERT INTO `tb_cidades` VALUES (4280, 13, 'MT', 'Cristinopolis');

INSERT INTO `tb_cidades` VALUES (4281, 13, 'MT', 'Cristo Rei');

INSERT INTO `tb_cidades` VALUES (4282, 13, 'MT', 'Cuiaba');

INSERT INTO `tb_cidades` VALUES (4283, 13, 'MT', 'Curvelandia');

INSERT INTO `tb_cidades` VALUES (4284, 13, 'MT', 'Del Rios');

INSERT INTO `tb_cidades` VALUES (4285, 13, 'MT', 'Denise');

INSERT INTO `tb_cidades` VALUES (4286, 13, 'MT', 'Diamantino');

INSERT INTO `tb_cidades` VALUES (4287, 13, 'MT', 'Dom Aquino');

INSERT INTO `tb_cidades` VALUES (4288, 13, 'MT', 'Engenho');

INSERT INTO `tb_cidades` VALUES (4289, 13, 'MT', 'Engenho Velho');

INSERT INTO `tb_cidades` VALUES (4290, 13, 'MT', 'Entre Rios');

INSERT INTO `tb_cidades` VALUES (4291, 13, 'MT', 'Estrela do Leste');

INSERT INTO `tb_cidades` VALUES (4292, 13, 'MT', 'Faval');

INSERT INTO `tb_cidades` VALUES (4293, 13, 'MT', 'Fazenda de Cima');

INSERT INTO `tb_cidades` VALUES (4294, 13, 'MT', 'Feliz Natal');

INSERT INTO `tb_cidades` VALUES (4295, 13, 'MT', 'Figueiropolis D Oeste');

INSERT INTO `tb_cidades` VALUES (4296, 13, 'MT', 'Filadelfia');

INSERT INTO `tb_cidades` VALUES (4297, 13, 'MT', 'Flor da Serra');

INSERT INTO `tb_cidades` VALUES (4298, 13, 'MT', 'Fontanilhas');

INSERT INTO `tb_cidades` VALUES (4299, 13, 'MT', 'Gaucha do Norte');

INSERT INTO `tb_cidades` VALUES (4300, 13, 'MT', 'General Carneiro');

INSERT INTO `tb_cidades` VALUES (4301, 13, 'MT', 'Gloria D''oeste');

INSERT INTO `tb_cidades` VALUES (4302, 13, 'MT', 'Guaranta do Norte');

INSERT INTO `tb_cidades` VALUES (4303, 13, 'MT', 'Guarita');

INSERT INTO `tb_cidades` VALUES (4304, 13, 'MT', 'Guiratinga');

INSERT INTO `tb_cidades` VALUES (4305, 13, 'MT', 'Horizonte do Oeste');

INSERT INTO `tb_cidades` VALUES (4306, 13, 'MT', 'Indianapolis');

INSERT INTO `tb_cidades` VALUES (4307, 13, 'MT', 'Indiavai');

INSERT INTO `tb_cidades` VALUES (4308, 13, 'MT', 'Irenopolis');

INSERT INTO `tb_cidades` VALUES (4309, 13, 'MT', 'Itamarati Norte');

INSERT INTO `tb_cidades` VALUES (4310, 13, 'MT', 'Itauba');

INSERT INTO `tb_cidades` VALUES (4311, 13, 'MT', 'Itiquira');

INSERT INTO `tb_cidades` VALUES (4312, 13, 'MT', 'Jaciara');

INSERT INTO `tb_cidades` VALUES (4313, 13, 'MT', 'Jangada');

INSERT INTO `tb_cidades` VALUES (4314, 13, 'MT', 'Jarudore');

INSERT INTO `tb_cidades` VALUES (4315, 13, 'MT', 'Jatoba');

INSERT INTO `tb_cidades` VALUES (4316, 13, 'MT', 'Jauru');

INSERT INTO `tb_cidades` VALUES (4317, 13, 'MT', 'Joselandia');

INSERT INTO `tb_cidades` VALUES (4318, 13, 'MT', 'Juara');

INSERT INTO `tb_cidades` VALUES (4319, 13, 'MT', 'Juina');

INSERT INTO `tb_cidades` VALUES (4320, 13, 'MT', 'Juruena');

INSERT INTO `tb_cidades` VALUES (4321, 13, 'MT', 'Juscimeira');

INSERT INTO `tb_cidades` VALUES (4322, 13, 'MT', 'Lambari D''oeste');

INSERT INTO `tb_cidades` VALUES (4323, 13, 'MT', 'Lavouras');

INSERT INTO `tb_cidades` VALUES (4324, 13, 'MT', 'Lucas do Rio Verde');

INSERT INTO `tb_cidades` VALUES (4325, 13, 'MT', 'Lucialva');

INSERT INTO `tb_cidades` VALUES (4326, 13, 'MT', 'Luciara');

INSERT INTO `tb_cidades` VALUES (4327, 13, 'MT', 'Machado');

INSERT INTO `tb_cidades` VALUES (4328, 13, 'MT', 'Marcelandia');

INSERT INTO `tb_cidades` VALUES (4329, 13, 'MT', 'Marzagao');

INSERT INTO `tb_cidades` VALUES (4330, 13, 'MT', 'Mata Dentro');

INSERT INTO `tb_cidades` VALUES (4331, 13, 'MT', 'Matupa');

INSERT INTO `tb_cidades` VALUES (4332, 13, 'MT', 'Mimoso');

INSERT INTO `tb_cidades` VALUES (4333, 13, 'MT', 'Mirassol D''oeste');

INSERT INTO `tb_cidades` VALUES (4334, 13, 'MT', 'Nobres');

INSERT INTO `tb_cidades` VALUES (4335, 13, 'MT', 'Nonoai do Norte');

INSERT INTO `tb_cidades` VALUES (4336, 13, 'MT', 'Nortelandia');

INSERT INTO `tb_cidades` VALUES (4337, 13, 'MT', 'Nossa Senhora da Guia');

INSERT INTO `tb_cidades` VALUES (4338, 13, 'MT', 'Nossa Senhora do Livramento');

INSERT INTO `tb_cidades` VALUES (4339, 13, 'MT', 'Nova Alvorada');

INSERT INTO `tb_cidades` VALUES (4340, 13, 'MT', 'Nova Bandeirantes');

INSERT INTO `tb_cidades` VALUES (4341, 13, 'MT', 'Nova Brasilandia');

INSERT INTO `tb_cidades` VALUES (4342, 13, 'MT', 'Nova Brasilia');

INSERT INTO `tb_cidades` VALUES (4343, 13, 'MT', 'Nova Canaa do Norte');

INSERT INTO `tb_cidades` VALUES (4344, 13, 'MT', 'Nova Catanduva');

INSERT INTO `tb_cidades` VALUES (4345, 13, 'MT', 'Nova Galileia');

INSERT INTO `tb_cidades` VALUES (4346, 13, 'MT', 'Nova Guarita');

INSERT INTO `tb_cidades` VALUES (4347, 13, 'MT', 'Nova Lacerda');

INSERT INTO `tb_cidades` VALUES (4348, 13, 'MT', 'Nova Marilandia');

INSERT INTO `tb_cidades` VALUES (4349, 13, 'MT', 'Nova Maringa');

INSERT INTO `tb_cidades` VALUES (4350, 13, 'MT', 'Nova Monte Verde');

INSERT INTO `tb_cidades` VALUES (4351, 13, 'MT', 'Nova Mutum');

INSERT INTO `tb_cidades` VALUES (4352, 13, 'MT', 'Nova Olimpia');

INSERT INTO `tb_cidades` VALUES (4353, 13, 'MT', 'Nova Ubirata');

INSERT INTO `tb_cidades` VALUES (4354, 13, 'MT', 'Nova Xavantina');

INSERT INTO `tb_cidades` VALUES (4355, 13, 'MT', 'Novo Diamantino');

INSERT INTO `tb_cidades` VALUES (4356, 13, 'MT', 'Novo Eldorado');

INSERT INTO `tb_cidades` VALUES (4357, 13, 'MT', 'Novo Horizonte do Norte');

INSERT INTO `tb_cidades` VALUES (4358, 13, 'MT', 'Novo Mundo');

INSERT INTO `tb_cidades` VALUES (4359, 13, 'MT', 'Novo Parana');

INSERT INTO `tb_cidades` VALUES (4360, 13, 'MT', 'Novo Sao Joaquim');

INSERT INTO `tb_cidades` VALUES (4361, 13, 'MT', 'Padronal');

INSERT INTO `tb_cidades` VALUES (4362, 13, 'MT', 'Pai Andre');

INSERT INTO `tb_cidades` VALUES (4363, 13, 'MT', 'Paraiso do Leste');

INSERT INTO `tb_cidades` VALUES (4364, 13, 'MT', 'Paranaita');

INSERT INTO `tb_cidades` VALUES (4365, 13, 'MT', 'Paranatinga');

INSERT INTO `tb_cidades` VALUES (4366, 13, 'MT', 'Passagem da Conceicao');

INSERT INTO `tb_cidades` VALUES (4367, 13, 'MT', 'Pedra Preta');

INSERT INTO `tb_cidades` VALUES (4368, 13, 'MT', 'Peixoto de Azevedo');

INSERT INTO `tb_cidades` VALUES (4369, 13, 'MT', 'Pirizal');

INSERT INTO `tb_cidades` VALUES (4370, 13, 'MT', 'Placa de Santo Antonio');

INSERT INTO `tb_cidades` VALUES (4371, 13, 'MT', 'Planalto da Serra');

INSERT INTO `tb_cidades` VALUES (4372, 13, 'MT', 'Pocone');

INSERT INTO `tb_cidades` VALUES (4373, 13, 'MT', 'Pombas');

INSERT INTO `tb_cidades` VALUES (4374, 13, 'MT', 'Pontal do Araguaia');

INSERT INTO `tb_cidades` VALUES (4375, 13, 'MT', 'Ponte Branca');

INSERT INTO `tb_cidades` VALUES (4376, 13, 'MT', 'Ponte de Pedra');

INSERT INTO `tb_cidades` VALUES (4377, 13, 'MT', 'Pontes E Lacerda');

INSERT INTO `tb_cidades` VALUES (4378, 13, 'MT', 'Pontinopolis');

INSERT INTO `tb_cidades` VALUES (4379, 13, 'MT', 'Porto Alegre do Norte');

INSERT INTO `tb_cidades` VALUES (4380, 13, 'MT', 'Porto dos Gauchos');

INSERT INTO `tb_cidades` VALUES (4381, 13, 'MT', 'Porto Esperidiao');

INSERT INTO `tb_cidades` VALUES (4382, 13, 'MT', 'Porto Estrela');

INSERT INTO `tb_cidades` VALUES (4383, 13, 'MT', 'Poxoreo');

INSERT INTO `tb_cidades` VALUES (4384, 13, 'MT', 'Praia Rica');

INSERT INTO `tb_cidades` VALUES (4385, 13, 'MT', 'Primavera');

INSERT INTO `tb_cidades` VALUES (4386, 13, 'MT', 'Primavera do Leste');

INSERT INTO `tb_cidades` VALUES (4387, 13, 'MT', 'Progresso');

INSERT INTO `tb_cidades` VALUES (4388, 13, 'MT', 'Querencia');

INSERT INTO `tb_cidades` VALUES (4389, 13, 'MT', 'Rancharia');

INSERT INTO `tb_cidades` VALUES (4390, 13, 'MT', 'Reserva do Cabacal');

INSERT INTO `tb_cidades` VALUES (4391, 13, 'MT', 'Ribeirao Cascalheira');

INSERT INTO `tb_cidades` VALUES (4392, 13, 'MT', 'Ribeirao dos Cocais');

INSERT INTO `tb_cidades` VALUES (4393, 13, 'MT', 'Ribeiraozinho');

INSERT INTO `tb_cidades` VALUES (4394, 13, 'MT', 'Rio Branco');

INSERT INTO `tb_cidades` VALUES (4395, 13, 'MT', 'Rio Manso');

INSERT INTO `tb_cidades` VALUES (4396, 13, 'MT', 'Riolandia');

INSERT INTO `tb_cidades` VALUES (4397, 13, 'MT', 'Rondonopolis');

INSERT INTO `tb_cidades` VALUES (4398, 13, 'MT', 'Rosario Oeste');

INSERT INTO `tb_cidades` VALUES (4399, 13, 'MT', 'Salto do Ceu');

INSERT INTO `tb_cidades` VALUES (4400, 13, 'MT', 'Sangradouro');

INSERT INTO `tb_cidades` VALUES (4401, 13, 'MT', 'Santa Carmem');

INSERT INTO `tb_cidades` VALUES (4402, 13, 'MT', 'Santa Elvira');

INSERT INTO `tb_cidades` VALUES (4403, 13, 'MT', 'Santa Fe');

INSERT INTO `tb_cidades` VALUES (4404, 13, 'MT', 'Santa Rita');

INSERT INTO `tb_cidades` VALUES (4405, 13, 'MT', 'Santa Terezinha');

INSERT INTO `tb_cidades` VALUES (4406, 13, 'MT', 'Santaninha');

INSERT INTO `tb_cidades` VALUES (4407, 13, 'MT', 'Santo Afonso');

INSERT INTO `tb_cidades` VALUES (4408, 13, 'MT', 'Santo Antonio do Leverger');

INSERT INTO `tb_cidades` VALUES (4409, 13, 'MT', 'Santo Antonio do Rio Bonito');

INSERT INTO `tb_cidades` VALUES (4410, 13, 'MT', 'Sao Cristovao');

INSERT INTO `tb_cidades` VALUES (4411, 13, 'MT', 'Sao Domingos');

INSERT INTO `tb_cidades` VALUES (4412, 13, 'MT', 'Sao Felix do Araguaia');

INSERT INTO `tb_cidades` VALUES (4413, 13, 'MT', 'Sao Joaquim');

INSERT INTO `tb_cidades` VALUES (4414, 13, 'MT', 'Sao Jorge');

INSERT INTO `tb_cidades` VALUES (4415, 13, 'MT', 'Sao Jose');

INSERT INTO `tb_cidades` VALUES (4416, 13, 'MT', 'Sao Jose do Apui');

INSERT INTO `tb_cidades` VALUES (4417, 13, 'MT', 'Sao Jose do Planalto');

INSERT INTO `tb_cidades` VALUES (4418, 13, 'MT', 'Sao Jose do Povo');

INSERT INTO `tb_cidades` VALUES (4419, 13, 'MT', 'Sao Jose do Rio Claro');

INSERT INTO `tb_cidades` VALUES (4420, 13, 'MT', 'Sao Jose do Xingu');

INSERT INTO `tb_cidades` VALUES (4421, 13, 'MT', 'Sao Jose dos Quatro Marcos');

INSERT INTO `tb_cidades` VALUES (4422, 13, 'MT', 'Sao Lourenco de Fatima');

INSERT INTO `tb_cidades` VALUES (4423, 13, 'MT', 'Sao Pedro da Cipa');

INSERT INTO `tb_cidades` VALUES (4424, 13, 'MT', 'Sao Vicente');

INSERT INTO `tb_cidades` VALUES (4425, 13, 'MT', 'Sapezal');

INSERT INTO `tb_cidades` VALUES (4426, 13, 'MT', 'Selma');

INSERT INTO `tb_cidades` VALUES (4427, 13, 'MT', 'Serra Nova');

INSERT INTO `tb_cidades` VALUES (4428, 13, 'MT', 'Sinop');

INSERT INTO `tb_cidades` VALUES (4429, 13, 'MT', 'Sonho Azul');

INSERT INTO `tb_cidades` VALUES (4430, 13, 'MT', 'Sorriso');

INSERT INTO `tb_cidades` VALUES (4431, 13, 'MT', 'Sumidouro');

INSERT INTO `tb_cidades` VALUES (4432, 13, 'MT', 'Tabapora');

INSERT INTO `tb_cidades` VALUES (4433, 13, 'MT', 'Tangara da Serra');

INSERT INTO `tb_cidades` VALUES (4434, 13, 'MT', 'Tapirapua');

INSERT INTO `tb_cidades` VALUES (4435, 13, 'MT', 'Tapurah');

INSERT INTO `tb_cidades` VALUES (4436, 13, 'MT', 'Terra Nova do Norte');

INSERT INTO `tb_cidades` VALUES (4437, 13, 'MT', 'Terra Roxa');

INSERT INTO `tb_cidades` VALUES (4438, 13, 'MT', 'Tesouro');

INSERT INTO `tb_cidades` VALUES (4439, 13, 'MT', 'Toricueyje');

INSERT INTO `tb_cidades` VALUES (4440, 13, 'MT', 'Torixoreu');

INSERT INTO `tb_cidades` VALUES (4441, 13, 'MT', 'Tres Pontes');

INSERT INTO `tb_cidades` VALUES (4442, 13, 'MT', 'Uniao do Sul');

INSERT INTO `tb_cidades` VALUES (4443, 13, 'MT', 'Vale dos Sonhos');

INSERT INTO `tb_cidades` VALUES (4444, 13, 'MT', 'Vale Rico');

INSERT INTO `tb_cidades` VALUES (4445, 13, 'MT', 'Varginha');

INSERT INTO `tb_cidades` VALUES (4446, 13, 'MT', 'Varzea Grande');

INSERT INTO `tb_cidades` VALUES (4447, 13, 'MT', 'Vera');

INSERT INTO `tb_cidades` VALUES (4448, 13, 'MT', 'Vila Atlantica');

INSERT INTO `tb_cidades` VALUES (4449, 13, 'MT', 'Vila Bela da Santissima Trindade');

INSERT INTO `tb_cidades` VALUES (4450, 13, 'MT', 'Vila Bueno');

INSERT INTO `tb_cidades` VALUES (4451, 13, 'MT', 'Vila Mutum');

INSERT INTO `tb_cidades` VALUES (4452, 13, 'MT', 'Vila Operaria');

INSERT INTO `tb_cidades` VALUES (4453, 13, 'MT', 'Vila Paulista');

INSERT INTO `tb_cidades` VALUES (4454, 13, 'MT', 'Vila Progresso');

INSERT INTO `tb_cidades` VALUES (4455, 13, 'MT', 'Vila Rica');

INSERT INTO `tb_cidades` VALUES (4456, 13, 'MT', 'Vila Santo Antonio');

INSERT INTO `tb_cidades` VALUES (4457, 14, 'PA', 'Abaetetuba');

INSERT INTO `tb_cidades` VALUES (4458, 14, 'PA', 'Abel Figueiredo');

INSERT INTO `tb_cidades` VALUES (4459, 14, 'PA', 'Acara');

INSERT INTO `tb_cidades` VALUES (4460, 14, 'PA', 'Afua');

INSERT INTO `tb_cidades` VALUES (4461, 14, 'PA', 'Agropolis Bela Vista');

INSERT INTO `tb_cidades` VALUES (4462, 14, 'PA', 'Agua Azul do Norte');

INSERT INTO `tb_cidades` VALUES (4463, 14, 'PA', 'Agua Fria');

INSERT INTO `tb_cidades` VALUES (4464, 14, 'PA', 'Alenquer');

INSERT INTO `tb_cidades` VALUES (4465, 14, 'PA', 'Algodoal');

INSERT INTO `tb_cidades` VALUES (4466, 14, 'PA', 'Almeirim');

INSERT INTO `tb_cidades` VALUES (4467, 14, 'PA', 'Almoco');

INSERT INTO `tb_cidades` VALUES (4468, 14, 'PA', 'Alta Para');

INSERT INTO `tb_cidades` VALUES (4469, 14, 'PA', 'Altamira');

INSERT INTO `tb_cidades` VALUES (4470, 14, 'PA', 'Alter do Chao');

INSERT INTO `tb_cidades` VALUES (4471, 14, 'PA', 'Alvorada');

INSERT INTO `tb_cidades` VALUES (4472, 14, 'PA', 'Americano');

INSERT INTO `tb_cidades` VALUES (4473, 14, 'PA', 'Anajas');

INSERT INTO `tb_cidades` VALUES (4474, 14, 'PA', 'Ananindeua');

INSERT INTO `tb_cidades` VALUES (4475, 14, 'PA', 'Anapu');

INSERT INTO `tb_cidades` VALUES (4476, 14, 'PA', 'Antonio Lemos');

INSERT INTO `tb_cidades` VALUES (4477, 14, 'PA', 'Apeu');

INSERT INTO `tb_cidades` VALUES (4478, 14, 'PA', 'Apinages');

INSERT INTO `tb_cidades` VALUES (4479, 14, 'PA', 'Arapixuna');

INSERT INTO `tb_cidades` VALUES (4480, 14, 'PA', 'Araquaim');

INSERT INTO `tb_cidades` VALUES (4481, 14, 'PA', 'Arco-iris');

INSERT INTO `tb_cidades` VALUES (4482, 14, 'PA', 'Areias');

INSERT INTO `tb_cidades` VALUES (4483, 14, 'PA', 'Arumanduba');

INSERT INTO `tb_cidades` VALUES (4484, 14, 'PA', 'Aruri');

INSERT INTO `tb_cidades` VALUES (4485, 14, 'PA', 'Aturiai');

INSERT INTO `tb_cidades` VALUES (4486, 14, 'PA', 'Augusto Correa');

INSERT INTO `tb_cidades` VALUES (4487, 14, 'PA', 'Aurora do Para');

INSERT INTO `tb_cidades` VALUES (4488, 14, 'PA', 'Aveiro');

INSERT INTO `tb_cidades` VALUES (4489, 14, 'PA', 'Bagre');

INSERT INTO `tb_cidades` VALUES (4490, 14, 'PA', 'Baiao');

INSERT INTO `tb_cidades` VALUES (4491, 14, 'PA', 'Bannach');

INSERT INTO `tb_cidades` VALUES (4492, 14, 'PA', 'Barcarena');

INSERT INTO `tb_cidades` VALUES (4493, 14, 'PA', 'Barreira Branca');

INSERT INTO `tb_cidades` VALUES (4494, 14, 'PA', 'Barreira dos Campos');

INSERT INTO `tb_cidades` VALUES (4495, 14, 'PA', 'Barreiras');

INSERT INTO `tb_cidades` VALUES (4496, 14, 'PA', 'Baturite');

INSERT INTO `tb_cidades` VALUES (4497, 14, 'PA', 'Beja');

INSERT INTO `tb_cidades` VALUES (4498, 14, 'PA', 'Bela Vista do Caracol');

INSERT INTO `tb_cidades` VALUES (4499, 14, 'PA', 'Belem');

INSERT INTO `tb_cidades` VALUES (4500, 14, 'PA', 'Belterra');

INSERT INTO `tb_cidades` VALUES (4501, 14, 'PA', 'Benevides');

INSERT INTO `tb_cidades` VALUES (4502, 14, 'PA', 'Benfica');

INSERT INTO `tb_cidades` VALUES (4503, 14, 'PA', 'Boa Esperanca');

INSERT INTO `tb_cidades` VALUES (4504, 14, 'PA', 'Boa Fe');

INSERT INTO `tb_cidades` VALUES (4505, 14, 'PA', 'Boa Sorte');

INSERT INTO `tb_cidades` VALUES (4506, 14, 'PA', 'Boa Vista do Iririteua');

INSERT INTO `tb_cidades` VALUES (4507, 14, 'PA', 'Boim');

INSERT INTO `tb_cidades` VALUES (4508, 14, 'PA', 'Bom Jardim');

INSERT INTO `tb_cidades` VALUES (4509, 14, 'PA', 'Bom Jesus do Tocantins');

INSERT INTO `tb_cidades` VALUES (4510, 14, 'PA', 'Bonito');

INSERT INTO `tb_cidades` VALUES (4511, 14, 'PA', 'Braganca');

INSERT INTO `tb_cidades` VALUES (4512, 14, 'PA', 'Brasil Novo');

INSERT INTO `tb_cidades` VALUES (4513, 14, 'PA', 'Brasilia Legal');

INSERT INTO `tb_cidades` VALUES (4514, 14, 'PA', 'Brejo do Meio');

INSERT INTO `tb_cidades` VALUES (4515, 14, 'PA', 'Brejo Grande do Araguaia');

INSERT INTO `tb_cidades` VALUES (4516, 14, 'PA', 'Breu Branco');

INSERT INTO `tb_cidades` VALUES (4517, 14, 'PA', 'Breves');

INSERT INTO `tb_cidades` VALUES (4518, 14, 'PA', 'Bujaru');

INSERT INTO `tb_cidades` VALUES (4519, 14, 'PA', 'Cachoeira de Piria');

INSERT INTO `tb_cidades` VALUES (4520, 14, 'PA', 'Cachoeira do Arari');

INSERT INTO `tb_cidades` VALUES (4521, 14, 'PA', 'Cafezal');

INSERT INTO `tb_cidades` VALUES (4522, 14, 'PA', 'Cairari');

INSERT INTO `tb_cidades` VALUES (4523, 14, 'PA', 'Caju');

INSERT INTO `tb_cidades` VALUES (4524, 14, 'PA', 'Camara do Marajo');

INSERT INTO `tb_cidades` VALUES (4525, 14, 'PA', 'Cambuquira');

INSERT INTO `tb_cidades` VALUES (4526, 14, 'PA', 'Cameta');

INSERT INTO `tb_cidades` VALUES (4527, 14, 'PA', 'Camiranga');

INSERT INTO `tb_cidades` VALUES (4528, 14, 'PA', 'Canaa dos Carajas');

INSERT INTO `tb_cidades` VALUES (4529, 14, 'PA', 'Capanema');

INSERT INTO `tb_cidades` VALUES (4530, 14, 'PA', 'Capitao Poco');

INSERT INTO `tb_cidades` VALUES (4531, 14, 'PA', 'Caracara do Arari');

INSERT INTO `tb_cidades` VALUES (4532, 14, 'PA', 'Carajas');

INSERT INTO `tb_cidades` VALUES (4533, 14, 'PA', 'Carapajo');

INSERT INTO `tb_cidades` VALUES (4534, 14, 'PA', 'Caraparu');

INSERT INTO `tb_cidades` VALUES (4535, 14, 'PA', 'Caratateua');

INSERT INTO `tb_cidades` VALUES (4536, 14, 'PA', 'Caripi');

INSERT INTO `tb_cidades` VALUES (4537, 14, 'PA', 'Carrazedo');

INSERT INTO `tb_cidades` VALUES (4538, 14, 'PA', 'Castanhal');

INSERT INTO `tb_cidades` VALUES (4539, 14, 'PA', 'Castelo dos Sonhos');

INSERT INTO `tb_cidades` VALUES (4540, 14, 'PA', 'Chaves');

INSERT INTO `tb_cidades` VALUES (4541, 14, 'PA', 'Colares');

INSERT INTO `tb_cidades` VALUES (4542, 14, 'PA', 'Conceicao');

INSERT INTO `tb_cidades` VALUES (4543, 14, 'PA', 'Conceicao do Araguaia');

INSERT INTO `tb_cidades` VALUES (4544, 14, 'PA', 'Concordia do Para');

INSERT INTO `tb_cidades` VALUES (4545, 14, 'PA', 'Condeixa');

INSERT INTO `tb_cidades` VALUES (4546, 14, 'PA', 'Coqueiro');

INSERT INTO `tb_cidades` VALUES (4547, 14, 'PA', 'Cripurizao');

INSERT INTO `tb_cidades` VALUES (4548, 14, 'PA', 'Cripurizinho');

INSERT INTO `tb_cidades` VALUES (4549, 14, 'PA', 'Cuiu-cuiu');

INSERT INTO `tb_cidades` VALUES (4550, 14, 'PA', 'Cumaru do Norte');

INSERT INTO `tb_cidades` VALUES (4551, 14, 'PA', 'Curionopolis');

INSERT INTO `tb_cidades` VALUES (4552, 14, 'PA', 'Curralinho');

INSERT INTO `tb_cidades` VALUES (4553, 14, 'PA', 'Curua');

INSERT INTO `tb_cidades` VALUES (4554, 14, 'PA', 'Curuai');

INSERT INTO `tb_cidades` VALUES (4555, 14, 'PA', 'Curuca');

INSERT INTO `tb_cidades` VALUES (4556, 14, 'PA', 'Curucambaba');

INSERT INTO `tb_cidades` VALUES (4557, 14, 'PA', 'Curumu');

INSERT INTO `tb_cidades` VALUES (4558, 14, 'PA', 'Dom Eliseu');

INSERT INTO `tb_cidades` VALUES (4559, 14, 'PA', 'Eldorado dos Carajas');

INSERT INTO `tb_cidades` VALUES (4560, 14, 'PA', 'Emborai');

INSERT INTO `tb_cidades` VALUES (4561, 14, 'PA', 'Espirito Santo do Taua');

INSERT INTO `tb_cidades` VALUES (4562, 14, 'PA', 'Faro');

INSERT INTO `tb_cidades` VALUES (4563, 14, 'PA', 'Fernandes Belo');

INSERT INTO `tb_cidades` VALUES (4564, 14, 'PA', 'Flexal');

INSERT INTO `tb_cidades` VALUES (4565, 14, 'PA', 'Floresta');

INSERT INTO `tb_cidades` VALUES (4566, 14, 'PA', 'Floresta do Araguaia');

INSERT INTO `tb_cidades` VALUES (4567, 14, 'PA', 'Garrafao do Norte');

INSERT INTO `tb_cidades` VALUES (4568, 14, 'PA', 'Goianesia do Para');

INSERT INTO `tb_cidades` VALUES (4569, 14, 'PA', 'Gradaus');

INSERT INTO `tb_cidades` VALUES (4570, 14, 'PA', 'Guajara-acu');

INSERT INTO `tb_cidades` VALUES (4571, 14, 'PA', 'Guajara-miri');

INSERT INTO `tb_cidades` VALUES (4572, 14, 'PA', 'Gurupa');

INSERT INTO `tb_cidades` VALUES (4573, 14, 'PA', 'Gurupizinho');

INSERT INTO `tb_cidades` VALUES (4574, 14, 'PA', 'Hidreletrica Tucurui');

INSERT INTO `tb_cidades` VALUES (4575, 14, 'PA', 'Iatai');

INSERT INTO `tb_cidades` VALUES (4576, 14, 'PA', 'Icoraci');

INSERT INTO `tb_cidades` VALUES (4577, 14, 'PA', 'Igarape da Lama');

INSERT INTO `tb_cidades` VALUES (4578, 14, 'PA', 'Igarape-acu');

INSERT INTO `tb_cidades` VALUES (4579, 14, 'PA', 'Igarape-miri');

INSERT INTO `tb_cidades` VALUES (4580, 14, 'PA', 'Inanu');

INSERT INTO `tb_cidades` VALUES (4581, 14, 'PA', 'Inhangapi');

INSERT INTO `tb_cidades` VALUES (4582, 14, 'PA', 'Ipixuna do Para');

INSERT INTO `tb_cidades` VALUES (4583, 14, 'PA', 'Irituia');

INSERT INTO `tb_cidades` VALUES (4584, 14, 'PA', 'Itaituba');

INSERT INTO `tb_cidades` VALUES (4585, 14, 'PA', 'Itapixuna');

INSERT INTO `tb_cidades` VALUES (4586, 14, 'PA', 'Itatupa');

INSERT INTO `tb_cidades` VALUES (4587, 14, 'PA', 'Itupiranga');

INSERT INTO `tb_cidades` VALUES (4588, 14, 'PA', 'Jacareacanga');

INSERT INTO `tb_cidades` VALUES (4589, 14, 'PA', 'Jacunda');

INSERT INTO `tb_cidades` VALUES (4590, 14, 'PA', 'Jaguarari');

INSERT INTO `tb_cidades` VALUES (4591, 14, 'PA', 'Jamanxinzinho');

INSERT INTO `tb_cidades` VALUES (4592, 14, 'PA', 'Jambuacu');

INSERT INTO `tb_cidades` VALUES (4593, 14, 'PA', 'Jandiai');

INSERT INTO `tb_cidades` VALUES (4594, 14, 'PA', 'Japerica');

INSERT INTO `tb_cidades` VALUES (4595, 14, 'PA', 'Joana Coeli');

INSERT INTO `tb_cidades` VALUES (4596, 14, 'PA', 'Joana Peres');

INSERT INTO `tb_cidades` VALUES (4597, 14, 'PA', 'Joanes');

INSERT INTO `tb_cidades` VALUES (4598, 14, 'PA', 'Juaba');

INSERT INTO `tb_cidades` VALUES (4599, 14, 'PA', 'Jubim');

INSERT INTO `tb_cidades` VALUES (4600, 14, 'PA', 'Juruti');

INSERT INTO `tb_cidades` VALUES (4601, 14, 'PA', 'Km Null');

INSERT INTO `tb_cidades` VALUES (4602, 14, 'PA', 'Km Null');

INSERT INTO `tb_cidades` VALUES (4603, 14, 'PA', 'Lauro Sodre');

INSERT INTO `tb_cidades` VALUES (4604, 14, 'PA', 'Ligacao do Para');

INSERT INTO `tb_cidades` VALUES (4605, 14, 'PA', 'Limoeiro do Ajuru');

INSERT INTO `tb_cidades` VALUES (4606, 14, 'PA', 'Mae do Rio');

INSERT INTO `tb_cidades` VALUES (4607, 14, 'PA', 'Magalhaes Barata');

INSERT INTO `tb_cidades` VALUES (4608, 14, 'PA', 'Maiauata');

INSERT INTO `tb_cidades` VALUES (4609, 14, 'PA', 'Manjeiro');

INSERT INTO `tb_cidades` VALUES (4610, 14, 'PA', 'Maraba');

INSERT INTO `tb_cidades` VALUES (4611, 14, 'PA', 'Maracana');

INSERT INTO `tb_cidades` VALUES (4612, 14, 'PA', 'Marajoara');

INSERT INTO `tb_cidades` VALUES (4613, 14, 'PA', 'Marapanim');

INSERT INTO `tb_cidades` VALUES (4614, 14, 'PA', 'Marituba');

INSERT INTO `tb_cidades` VALUES (4615, 14, 'PA', 'Maruda');

INSERT INTO `tb_cidades` VALUES (4616, 14, 'PA', 'Mata Geral');

INSERT INTO `tb_cidades` VALUES (4617, 14, 'PA', 'Matapiquara');

INSERT INTO `tb_cidades` VALUES (4618, 14, 'PA', 'Medicilandia');

INSERT INTO `tb_cidades` VALUES (4619, 14, 'PA', 'Melgaco');

INSERT INTO `tb_cidades` VALUES (4620, 14, 'PA', 'Menino Deus do Anapu');

INSERT INTO `tb_cidades` VALUES (4621, 14, 'PA', 'Meruu');

INSERT INTO `tb_cidades` VALUES (4622, 14, 'PA', 'Mirasselvas');

INSERT INTO `tb_cidades` VALUES (4623, 14, 'PA', 'Miritituba');

INSERT INTO `tb_cidades` VALUES (4624, 14, 'PA', 'Mocajuba');

INSERT INTO `tb_cidades` VALUES (4625, 14, 'PA', 'Moiraba');

INSERT INTO `tb_cidades` VALUES (4626, 14, 'PA', 'Moju');

INSERT INTO `tb_cidades` VALUES (4627, 14, 'PA', 'Monsaras');

INSERT INTO `tb_cidades` VALUES (4628, 14, 'PA', 'Monte Alegre');

INSERT INTO `tb_cidades` VALUES (4629, 14, 'PA', 'Monte Alegre do Mau');

INSERT INTO `tb_cidades` VALUES (4630, 14, 'PA', 'Monte Dourado');

INSERT INTO `tb_cidades` VALUES (4631, 14, 'PA', 'Morada Nova');

INSERT INTO `tb_cidades` VALUES (4632, 14, 'PA', 'Mosqueiro');

INSERT INTO `tb_cidades` VALUES (4633, 14, 'PA', 'Muana');

INSERT INTO `tb_cidades` VALUES (4634, 14, 'PA', 'Mujui dos Campos');

INSERT INTO `tb_cidades` VALUES (4635, 14, 'PA', 'Muraja');

INSERT INTO `tb_cidades` VALUES (4636, 14, 'PA', 'Murucupi');

INSERT INTO `tb_cidades` VALUES (4637, 14, 'PA', 'Murumuru');

INSERT INTO `tb_cidades` VALUES (4638, 14, 'PA', 'Muta');

INSERT INTO `tb_cidades` VALUES (4639, 14, 'PA', 'Mutucal');

INSERT INTO `tb_cidades` VALUES (4640, 14, 'PA', 'Nazare de Mocajuba');

INSERT INTO `tb_cidades` VALUES (4641, 14, 'PA', 'Nazare dos Patos');

INSERT INTO `tb_cidades` VALUES (4642, 14, 'PA', 'Nova Esperanca do Piria');

INSERT INTO `tb_cidades` VALUES (4643, 14, 'PA', 'Nova Ipixuna');

INSERT INTO `tb_cidades` VALUES (4644, 14, 'PA', 'Nova Mocajuba');

INSERT INTO `tb_cidades` VALUES (4645, 14, 'PA', 'Nova Timboteua');

INSERT INTO `tb_cidades` VALUES (4646, 14, 'PA', 'Novo Planalto');

INSERT INTO `tb_cidades` VALUES (4647, 14, 'PA', 'Novo Progresso');

INSERT INTO `tb_cidades` VALUES (4648, 14, 'PA', 'Novo Repartimento');

INSERT INTO `tb_cidades` VALUES (4649, 14, 'PA', 'Nucleo Urbano Quilometro Null');

INSERT INTO `tb_cidades` VALUES (4650, 14, 'PA', 'Obidos');

INSERT INTO `tb_cidades` VALUES (4651, 14, 'PA', 'Oeiras do Para');

INSERT INTO `tb_cidades` VALUES (4652, 14, 'PA', 'Oriximina');

INSERT INTO `tb_cidades` VALUES (4653, 14, 'PA', 'Osvaldilandia');

INSERT INTO `tb_cidades` VALUES (4654, 14, 'PA', 'Otelo');

INSERT INTO `tb_cidades` VALUES (4655, 14, 'PA', 'Ourem');

INSERT INTO `tb_cidades` VALUES (4656, 14, 'PA', 'Ourilandia do Norte');

INSERT INTO `tb_cidades` VALUES (4657, 14, 'PA', 'Outeiro');

INSERT INTO `tb_cidades` VALUES (4658, 14, 'PA', 'Pacaja');

INSERT INTO `tb_cidades` VALUES (4659, 14, 'PA', 'Pacoval');

INSERT INTO `tb_cidades` VALUES (4660, 14, 'PA', 'Palestina do Para');

INSERT INTO `tb_cidades` VALUES (4661, 14, 'PA', 'Paragominas');

INSERT INTO `tb_cidades` VALUES (4662, 14, 'PA', 'Paratins');

INSERT INTO `tb_cidades` VALUES (4663, 14, 'PA', 'Parauapebas');

INSERT INTO `tb_cidades` VALUES (4664, 14, 'PA', 'Pau D''arco');

INSERT INTO `tb_cidades` VALUES (4665, 14, 'PA', 'Pedreira');

INSERT INTO `tb_cidades` VALUES (4666, 14, 'PA', 'Peixe-boi');

INSERT INTO `tb_cidades` VALUES (4667, 14, 'PA', 'Penhalonga');

INSERT INTO `tb_cidades` VALUES (4668, 14, 'PA', 'Perseveranca');

INSERT INTO `tb_cidades` VALUES (4669, 14, 'PA', 'Pesqueiro');

INSERT INTO `tb_cidades` VALUES (4670, 14, 'PA', 'Piabas');

INSERT INTO `tb_cidades` VALUES (4671, 14, 'PA', 'Picarra');

INSERT INTO `tb_cidades` VALUES (4672, 14, 'PA', 'Pinhal');

INSERT INTO `tb_cidades` VALUES (4673, 14, 'PA', 'Piraquara');

INSERT INTO `tb_cidades` VALUES (4674, 14, 'PA', 'Piria');

INSERT INTO `tb_cidades` VALUES (4675, 14, 'PA', 'Placas');

INSERT INTO `tb_cidades` VALUES (4676, 14, 'PA', 'Ponta de Pedras');

INSERT INTO `tb_cidades` VALUES (4677, 14, 'PA', 'Ponta de Ramos');

INSERT INTO `tb_cidades` VALUES (4678, 14, 'PA', 'Portel');

INSERT INTO `tb_cidades` VALUES (4679, 14, 'PA', 'Porto de Moz');

INSERT INTO `tb_cidades` VALUES (4680, 14, 'PA', 'Porto Salvo');

INSERT INTO `tb_cidades` VALUES (4681, 14, 'PA', 'Porto Trombetas');

INSERT INTO `tb_cidades` VALUES (4682, 14, 'PA', 'Prainha');

INSERT INTO `tb_cidades` VALUES (4683, 14, 'PA', 'Primavera');

INSERT INTO `tb_cidades` VALUES (4684, 14, 'PA', 'Quatipuru');

INSERT INTO `tb_cidades` VALUES (4685, 14, 'PA', 'Quatro Bocas');

INSERT INTO `tb_cidades` VALUES (4686, 14, 'PA', 'Redencao');

INSERT INTO `tb_cidades` VALUES (4687, 14, 'PA', 'Remansao');

INSERT INTO `tb_cidades` VALUES (4688, 14, 'PA', 'Repartimento');

INSERT INTO `tb_cidades` VALUES (4689, 14, 'PA', 'Rio Maria');

INSERT INTO `tb_cidades` VALUES (4690, 14, 'PA', 'Rio Vermelho');

INSERT INTO `tb_cidades` VALUES (4691, 14, 'PA', 'Riozinho');

INSERT INTO `tb_cidades` VALUES (4692, 14, 'PA', 'Rondon do Para');

INSERT INTO `tb_cidades` VALUES (4693, 14, 'PA', 'Ruropolis');

INSERT INTO `tb_cidades` VALUES (4694, 14, 'PA', 'Salinopolis');

INSERT INTO `tb_cidades` VALUES (4695, 14, 'PA', 'Salvaterra');

INSERT INTO `tb_cidades` VALUES (4696, 14, 'PA', 'Santa Barbara do Para');

INSERT INTO `tb_cidades` VALUES (4697, 14, 'PA', 'Santa Cruz do Arari');

INSERT INTO `tb_cidades` VALUES (4698, 14, 'PA', 'Santa Isabel do Para');

INSERT INTO `tb_cidades` VALUES (4699, 14, 'PA', 'Santa Luzia do Para');

INSERT INTO `tb_cidades` VALUES (4700, 14, 'PA', 'Santa Maria');

INSERT INTO `tb_cidades` VALUES (4701, 14, 'PA', 'Santa Maria das Barreiras');

INSERT INTO `tb_cidades` VALUES (4702, 14, 'PA', 'Santa Maria do Para');

INSERT INTO `tb_cidades` VALUES (4703, 14, 'PA', 'Santa Rosa da Vigia');

INSERT INTO `tb_cidades` VALUES (4704, 14, 'PA', 'Santa Terezinha');

INSERT INTO `tb_cidades` VALUES (4705, 14, 'PA', 'Santana do Araguaia');

INSERT INTO `tb_cidades` VALUES (4706, 14, 'PA', 'Santarem');

INSERT INTO `tb_cidades` VALUES (4707, 14, 'PA', 'Santarem Novo');

INSERT INTO `tb_cidades` VALUES (4708, 14, 'PA', 'Santo Antonio');

INSERT INTO `tb_cidades` VALUES (4709, 14, 'PA', 'Santo Antonio do Taua');

INSERT INTO `tb_cidades` VALUES (4710, 14, 'PA', 'Sao Caetano de Odivelas');

INSERT INTO `tb_cidades` VALUES (4711, 14, 'PA', 'Sao Domingos do Araguaia');

INSERT INTO `tb_cidades` VALUES (4712, 14, 'PA', 'Sao Domingos do Capim');

INSERT INTO `tb_cidades` VALUES (4713, 14, 'PA', 'Sao Felix do Xingu');

INSERT INTO `tb_cidades` VALUES (4714, 14, 'PA', 'Sao Francisco');

INSERT INTO `tb_cidades` VALUES (4715, 14, 'PA', 'Sao Francisco da Jararaca');

INSERT INTO `tb_cidades` VALUES (4716, 14, 'PA', 'Sao Francisco do Para');

INSERT INTO `tb_cidades` VALUES (4717, 14, 'PA', 'Sao Geraldo do Araguaia');

INSERT INTO `tb_cidades` VALUES (4718, 14, 'PA', 'Sao Joao da Ponta');

INSERT INTO `tb_cidades` VALUES (4719, 14, 'PA', 'Sao Joao de Pirabas');

INSERT INTO `tb_cidades` VALUES (4720, 14, 'PA', 'Sao Joao do Acangata');

INSERT INTO `tb_cidades` VALUES (4721, 14, 'PA', 'Sao Joao do Araguaia');

INSERT INTO `tb_cidades` VALUES (4722, 14, 'PA', 'Sao Joao do Piria');

INSERT INTO `tb_cidades` VALUES (4723, 14, 'PA', 'Sao Joao dos Ramos');

INSERT INTO `tb_cidades` VALUES (4724, 14, 'PA', 'Sao Joaquim do Tapara');

INSERT INTO `tb_cidades` VALUES (4725, 14, 'PA', 'Sao Jorge');

INSERT INTO `tb_cidades` VALUES (4726, 14, 'PA', 'Sao Jose do Gurupi');

INSERT INTO `tb_cidades` VALUES (4727, 14, 'PA', 'Sao Jose do Piria');

INSERT INTO `tb_cidades` VALUES (4728, 14, 'PA', 'Sao Luiz do Tapajos');

INSERT INTO `tb_cidades` VALUES (4729, 14, 'PA', 'Sao Miguel do Guama');

INSERT INTO `tb_cidades` VALUES (4730, 14, 'PA', 'Sao Miguel dos Macacos');

INSERT INTO `tb_cidades` VALUES (4731, 14, 'PA', 'Sao Pedro de Viseu');

INSERT INTO `tb_cidades` VALUES (4732, 14, 'PA', 'Sao Pedro do Capim');

INSERT INTO `tb_cidades` VALUES (4733, 14, 'PA', 'Sao Raimundo de Borralhos');

INSERT INTO `tb_cidades` VALUES (4734, 14, 'PA', 'Sao Raimundo do Araguaia');

INSERT INTO `tb_cidades` VALUES (4735, 14, 'PA', 'Sao Raimundo dos Furtados');

INSERT INTO `tb_cidades` VALUES (4736, 14, 'PA', 'Sao Roberto');

INSERT INTO `tb_cidades` VALUES (4737, 14, 'PA', 'Sao Sebastiao da Boa Vista');

INSERT INTO `tb_cidades` VALUES (4738, 14, 'PA', 'Sao Sebastiao de Vicosa');

INSERT INTO `tb_cidades` VALUES (4739, 14, 'PA', 'Sapucaia');

INSERT INTO `tb_cidades` VALUES (4740, 14, 'PA', 'Senador Jose Porfirio');

INSERT INTO `tb_cidades` VALUES (4741, 14, 'PA', 'Serra Pelada');

INSERT INTO `tb_cidades` VALUES (4742, 14, 'PA', 'Soure');

INSERT INTO `tb_cidades` VALUES (4743, 14, 'PA', 'Tailandia');

INSERT INTO `tb_cidades` VALUES (4744, 14, 'PA', 'Tatuteua');

INSERT INTO `tb_cidades` VALUES (4745, 14, 'PA', 'Tauari');

INSERT INTO `tb_cidades` VALUES (4746, 14, 'PA', 'Tauarizinho');

INSERT INTO `tb_cidades` VALUES (4747, 14, 'PA', 'Tentugal');

INSERT INTO `tb_cidades` VALUES (4748, 14, 'PA', 'Terra Alta');

INSERT INTO `tb_cidades` VALUES (4749, 14, 'PA', 'Terra Santa');

INSERT INTO `tb_cidades` VALUES (4750, 14, 'PA', 'Tijoca');

INSERT INTO `tb_cidades` VALUES (4751, 14, 'PA', 'Timboteua');

INSERT INTO `tb_cidades` VALUES (4752, 14, 'PA', 'Tome-acu');

INSERT INTO `tb_cidades` VALUES (4753, 14, 'PA', 'Tracuateua');

INSERT INTO `tb_cidades` VALUES (4754, 14, 'PA', 'Trairao');

INSERT INTO `tb_cidades` VALUES (4755, 14, 'PA', 'Tucuma');

INSERT INTO `tb_cidades` VALUES (4756, 14, 'PA', 'Tucurui');

INSERT INTO `tb_cidades` VALUES (4757, 14, 'PA', 'Ulianopolis');

INSERT INTO `tb_cidades` VALUES (4758, 14, 'PA', 'Uruara');

INSERT INTO `tb_cidades` VALUES (4759, 14, 'PA', 'Urucuri');

INSERT INTO `tb_cidades` VALUES (4760, 14, 'PA', 'Urucuriteua');

INSERT INTO `tb_cidades` VALUES (4761, 14, 'PA', 'Val-de-caes');

INSERT INTO `tb_cidades` VALUES (4762, 14, 'PA', 'Veiros');

INSERT INTO `tb_cidades` VALUES (4763, 14, 'PA', 'Vigia');

INSERT INTO `tb_cidades` VALUES (4764, 14, 'PA', 'Vila do Carmo do Tocantins');

INSERT INTO `tb_cidades` VALUES (4765, 14, 'PA', 'Vila dos Cabanos');

INSERT INTO `tb_cidades` VALUES (4766, 14, 'PA', 'Vila Franca');

INSERT INTO `tb_cidades` VALUES (4767, 14, 'PA', 'Vila Goreth');

INSERT INTO `tb_cidades` VALUES (4768, 14, 'PA', 'Vila Isol');

INSERT INTO `tb_cidades` VALUES (4769, 14, 'PA', 'Vila Nova');

INSERT INTO `tb_cidades` VALUES (4770, 14, 'PA', 'Vila Planalto');

INSERT INTO `tb_cidades` VALUES (4771, 14, 'PA', 'Vila Santa Fe');

INSERT INTO `tb_cidades` VALUES (4772, 14, 'PA', 'Vila Socorro');

INSERT INTO `tb_cidades` VALUES (4773, 14, 'PA', 'Vilarinho do Monte');

INSERT INTO `tb_cidades` VALUES (4774, 14, 'PA', 'Viseu');

INSERT INTO `tb_cidades` VALUES (4775, 14, 'PA', 'Vista Alegre');

INSERT INTO `tb_cidades` VALUES (4776, 14, 'PA', 'Vista Alegre do Para');

INSERT INTO `tb_cidades` VALUES (4777, 14, 'PA', 'Vitoria do Xingu');

INSERT INTO `tb_cidades` VALUES (4778, 14, 'PA', 'Xinguara');

INSERT INTO `tb_cidades` VALUES (4779, 14, 'PA', 'Xinguarinha');

INSERT INTO `tb_cidades` VALUES (4780, 15, 'PB', 'Agua Branca');

INSERT INTO `tb_cidades` VALUES (4781, 15, 'PB', 'Aguiar');

INSERT INTO `tb_cidades` VALUES (4782, 15, 'PB', 'Alagoa Grande');

INSERT INTO `tb_cidades` VALUES (4783, 15, 'PB', 'Alagoa Nova');

INSERT INTO `tb_cidades` VALUES (4784, 15, 'PB', 'Alagoinha');

INSERT INTO `tb_cidades` VALUES (4785, 15, 'PB', 'Alcantil');

INSERT INTO `tb_cidades` VALUES (4786, 15, 'PB', 'Algodao de Jandaira');

INSERT INTO `tb_cidades` VALUES (4787, 15, 'PB', 'Alhandra');

INSERT INTO `tb_cidades` VALUES (4788, 15, 'PB', 'Amparo');

INSERT INTO `tb_cidades` VALUES (4789, 15, 'PB', 'Aparecida');

INSERT INTO `tb_cidades` VALUES (4790, 15, 'PB', 'Aracagi');

INSERT INTO `tb_cidades` VALUES (4791, 15, 'PB', 'Arara');

INSERT INTO `tb_cidades` VALUES (4792, 15, 'PB', 'Araruna');

INSERT INTO `tb_cidades` VALUES (4793, 15, 'PB', 'Areia');

INSERT INTO `tb_cidades` VALUES (4794, 15, 'PB', 'Areia de Baraunas');

INSERT INTO `tb_cidades` VALUES (4795, 15, 'PB', 'Areial');

INSERT INTO `tb_cidades` VALUES (4796, 15, 'PB', 'Areias');

INSERT INTO `tb_cidades` VALUES (4797, 15, 'PB', 'Aroeiras');

INSERT INTO `tb_cidades` VALUES (4798, 15, 'PB', 'Assis Chateaubriand');

INSERT INTO `tb_cidades` VALUES (4799, 15, 'PB', 'Assuncao');

INSERT INTO `tb_cidades` VALUES (4800, 15, 'PB', 'Baia da Traicao');

INSERT INTO `tb_cidades` VALUES (4801, 15, 'PB', 'Balancos');

INSERT INTO `tb_cidades` VALUES (4802, 15, 'PB', 'Bananeiras');

INSERT INTO `tb_cidades` VALUES (4803, 15, 'PB', 'Barauna');

INSERT INTO `tb_cidades` VALUES (4804, 15, 'PB', 'Barra de Santa Rosa');

INSERT INTO `tb_cidades` VALUES (4805, 15, 'PB', 'Barra de Santana');

INSERT INTO `tb_cidades` VALUES (4806, 15, 'PB', 'Barra de Sao Miguel');

INSERT INTO `tb_cidades` VALUES (4807, 15, 'PB', 'Barra do Camaratuba');

INSERT INTO `tb_cidades` VALUES (4808, 15, 'PB', 'Bayeux');

INSERT INTO `tb_cidades` VALUES (4809, 15, 'PB', 'Belem');

INSERT INTO `tb_cidades` VALUES (4810, 15, 'PB', 'Belem do Brejo do Cruz');

INSERT INTO `tb_cidades` VALUES (4811, 15, 'PB', 'Bernardino Batista');

INSERT INTO `tb_cidades` VALUES (4812, 15, 'PB', 'Boa Ventura');

INSERT INTO `tb_cidades` VALUES (4813, 15, 'PB', 'Boa Vista');

INSERT INTO `tb_cidades` VALUES (4814, 15, 'PB', 'Bom Jesus');

INSERT INTO `tb_cidades` VALUES (4815, 15, 'PB', 'Bom Sucesso');

INSERT INTO `tb_cidades` VALUES (4816, 15, 'PB', 'Bonito de Santa Fe');

INSERT INTO `tb_cidades` VALUES (4817, 15, 'PB', 'Boqueirao');

INSERT INTO `tb_cidades` VALUES (4818, 15, 'PB', 'Borborema');

INSERT INTO `tb_cidades` VALUES (4819, 15, 'PB', 'Brejo do Cruz');

INSERT INTO `tb_cidades` VALUES (4820, 15, 'PB', 'Brejo dos Santos');

INSERT INTO `tb_cidades` VALUES (4821, 15, 'PB', 'Caapora');

INSERT INTO `tb_cidades` VALUES (4822, 15, 'PB', 'Cabaceiras');

INSERT INTO `tb_cidades` VALUES (4823, 15, 'PB', 'Cabedelo');

INSERT INTO `tb_cidades` VALUES (4824, 15, 'PB', 'Cachoeira');

INSERT INTO `tb_cidades` VALUES (4825, 15, 'PB', 'Cachoeira dos Indios');

INSERT INTO `tb_cidades` VALUES (4826, 15, 'PB', 'Cachoeirinha');

INSERT INTO `tb_cidades` VALUES (4827, 15, 'PB', 'Cacimba de Areia');

INSERT INTO `tb_cidades` VALUES (4828, 15, 'PB', 'Cacimba de Dentro');

INSERT INTO `tb_cidades` VALUES (4829, 15, 'PB', 'Cacimbas');

INSERT INTO `tb_cidades` VALUES (4830, 15, 'PB', 'Caicara');

INSERT INTO `tb_cidades` VALUES (4831, 15, 'PB', 'Cajazeiras');

INSERT INTO `tb_cidades` VALUES (4832, 15, 'PB', 'Cajazeirinhas');

INSERT INTO `tb_cidades` VALUES (4833, 15, 'PB', 'Caldas Brandao');

INSERT INTO `tb_cidades` VALUES (4834, 15, 'PB', 'Camalau');

INSERT INTO `tb_cidades` VALUES (4835, 15, 'PB', 'Campina Grande');

INSERT INTO `tb_cidades` VALUES (4836, 15, 'PB', 'Campo Alegre');

INSERT INTO `tb_cidades` VALUES (4837, 15, 'PB', 'Campo Grande');

INSERT INTO `tb_cidades` VALUES (4838, 15, 'PB', 'Camurupim');

INSERT INTO `tb_cidades` VALUES (4839, 15, 'PB', 'Capim');

INSERT INTO `tb_cidades` VALUES (4840, 15, 'PB', 'Caraubas');

INSERT INTO `tb_cidades` VALUES (4841, 15, 'PB', 'Cardoso');

INSERT INTO `tb_cidades` VALUES (4842, 15, 'PB', 'Carrapateira');

INSERT INTO `tb_cidades` VALUES (4843, 15, 'PB', 'Casinha do Homem');

INSERT INTO `tb_cidades` VALUES (4844, 15, 'PB', 'Casserengue');

INSERT INTO `tb_cidades` VALUES (4845, 15, 'PB', 'Catingueira');

INSERT INTO `tb_cidades` VALUES (4846, 15, 'PB', 'Catole');

INSERT INTO `tb_cidades` VALUES (4847, 15, 'PB', 'Catole do Rocha');

INSERT INTO `tb_cidades` VALUES (4848, 15, 'PB', 'Caturite');

INSERT INTO `tb_cidades` VALUES (4849, 15, 'PB', 'Cepilho');

INSERT INTO `tb_cidades` VALUES (4850, 15, 'PB', 'Conceicao');

INSERT INTO `tb_cidades` VALUES (4851, 15, 'PB', 'Condado');

INSERT INTO `tb_cidades` VALUES (4852, 15, 'PB', 'Conde');

INSERT INTO `tb_cidades` VALUES (4853, 15, 'PB', 'Congo');

INSERT INTO `tb_cidades` VALUES (4854, 15, 'PB', 'Coremas');

INSERT INTO `tb_cidades` VALUES (4855, 15, 'PB', 'Coronel Maia');

INSERT INTO `tb_cidades` VALUES (4856, 15, 'PB', 'Coxixola');

INSERT INTO `tb_cidades` VALUES (4857, 15, 'PB', 'Cruz do Espirito Santo');

INSERT INTO `tb_cidades` VALUES (4858, 15, 'PB', 'Cubati');

INSERT INTO `tb_cidades` VALUES (4859, 15, 'PB', 'Cuite');

INSERT INTO `tb_cidades` VALUES (4860, 15, 'PB', 'Cuite de Mamanguape');

INSERT INTO `tb_cidades` VALUES (4861, 15, 'PB', 'Cuitegi');

INSERT INTO `tb_cidades` VALUES (4862, 15, 'PB', 'Cupissura');

INSERT INTO `tb_cidades` VALUES (4863, 15, 'PB', 'Curral de Cima');

INSERT INTO `tb_cidades` VALUES (4864, 15, 'PB', 'Curral Velho');

INSERT INTO `tb_cidades` VALUES (4865, 15, 'PB', 'Damiao');

INSERT INTO `tb_cidades` VALUES (4866, 15, 'PB', 'Desterro');

INSERT INTO `tb_cidades` VALUES (4867, 15, 'PB', 'Diamante');

INSERT INTO `tb_cidades` VALUES (4868, 15, 'PB', 'Dona Ines');

INSERT INTO `tb_cidades` VALUES (4869, 15, 'PB', 'Duas Estradas');

INSERT INTO `tb_cidades` VALUES (4870, 15, 'PB', 'Emas');

INSERT INTO `tb_cidades` VALUES (4871, 15, 'PB', 'Engenheiro Avidos');

INSERT INTO `tb_cidades` VALUES (4872, 15, 'PB', 'Esperanca');

INSERT INTO `tb_cidades` VALUES (4873, 15, 'PB', 'Fagundes');

INSERT INTO `tb_cidades` VALUES (4874, 15, 'PB', 'Fatima');

INSERT INTO `tb_cidades` VALUES (4875, 15, 'PB', 'Fazenda Nova');

INSERT INTO `tb_cidades` VALUES (4876, 15, 'PB', 'Forte Velho');

INSERT INTO `tb_cidades` VALUES (4877, 15, 'PB', 'Frei Martinho');

INSERT INTO `tb_cidades` VALUES (4878, 15, 'PB', 'Gado Bravo');

INSERT INTO `tb_cidades` VALUES (4879, 15, 'PB', 'Galante');

INSERT INTO `tb_cidades` VALUES (4880, 15, 'PB', 'Guarabira');

INSERT INTO `tb_cidades` VALUES (4881, 15, 'PB', 'Guarita');

INSERT INTO `tb_cidades` VALUES (4882, 15, 'PB', 'Gurinhem');

INSERT INTO `tb_cidades` VALUES (4883, 15, 'PB', 'Gurjao');

INSERT INTO `tb_cidades` VALUES (4884, 15, 'PB', 'Ibiara');

INSERT INTO `tb_cidades` VALUES (4885, 15, 'PB', 'Igaracy');

INSERT INTO `tb_cidades` VALUES (4886, 15, 'PB', 'Imaculada');

INSERT INTO `tb_cidades` VALUES (4887, 15, 'PB', 'Inga');

INSERT INTO `tb_cidades` VALUES (4888, 15, 'PB', 'Itabaiana');

INSERT INTO `tb_cidades` VALUES (4889, 15, 'PB', 'Itajubatiba');

INSERT INTO `tb_cidades` VALUES (4890, 15, 'PB', 'Itaporanga');

INSERT INTO `tb_cidades` VALUES (4891, 15, 'PB', 'Itapororoca');

INSERT INTO `tb_cidades` VALUES (4892, 15, 'PB', 'Itatuba');

INSERT INTO `tb_cidades` VALUES (4893, 15, 'PB', 'Jacarau');

INSERT INTO `tb_cidades` VALUES (4894, 15, 'PB', 'Jerico');

INSERT INTO `tb_cidades` VALUES (4895, 15, 'PB', 'Joao Pessoa');

INSERT INTO `tb_cidades` VALUES (4896, 15, 'PB', 'Juarez Tavora');

INSERT INTO `tb_cidades` VALUES (4897, 15, 'PB', 'Juazeirinho');

INSERT INTO `tb_cidades` VALUES (4898, 15, 'PB', 'Junco do Serido');

INSERT INTO `tb_cidades` VALUES (4899, 15, 'PB', 'Juripiranga');

INSERT INTO `tb_cidades` VALUES (4900, 15, 'PB', 'Juru');

INSERT INTO `tb_cidades` VALUES (4901, 15, 'PB', 'Lagoa');

INSERT INTO `tb_cidades` VALUES (4902, 15, 'PB', 'Lagoa de Dentro');

INSERT INTO `tb_cidades` VALUES (4903, 15, 'PB', 'Lagoa Seca');

INSERT INTO `tb_cidades` VALUES (4904, 15, 'PB', 'Lastro');

INSERT INTO `tb_cidades` VALUES (4905, 15, 'PB', 'Lerolandia');

INSERT INTO `tb_cidades` VALUES (4906, 15, 'PB', 'Livramento');

INSERT INTO `tb_cidades` VALUES (4907, 15, 'PB', 'Logradouro');

INSERT INTO `tb_cidades` VALUES (4908, 15, 'PB', 'Lucena');

INSERT INTO `tb_cidades` VALUES (4909, 15, 'PB', 'Mae D''agua');

INSERT INTO `tb_cidades` VALUES (4910, 15, 'PB', 'Maia');

INSERT INTO `tb_cidades` VALUES (4911, 15, 'PB', 'Malta');

INSERT INTO `tb_cidades` VALUES (4912, 15, 'PB', 'Mamanguape');

INSERT INTO `tb_cidades` VALUES (4913, 15, 'PB', 'Manaira');

INSERT INTO `tb_cidades` VALUES (4914, 15, 'PB', 'Marcacao');

INSERT INTO `tb_cidades` VALUES (4915, 15, 'PB', 'Mari');

INSERT INTO `tb_cidades` VALUES (4916, 15, 'PB', 'Marizopolis');

INSERT INTO `tb_cidades` VALUES (4917, 15, 'PB', 'Massaranduba');

INSERT INTO `tb_cidades` VALUES (4918, 15, 'PB', 'Mata Limpa');

INSERT INTO `tb_cidades` VALUES (4919, 15, 'PB', 'Mata Virgem');

INSERT INTO `tb_cidades` VALUES (4920, 15, 'PB', 'Mataraca');

INSERT INTO `tb_cidades` VALUES (4921, 15, 'PB', 'Matinhas');

INSERT INTO `tb_cidades` VALUES (4922, 15, 'PB', 'Mato Grosso');

INSERT INTO `tb_cidades` VALUES (4923, 15, 'PB', 'Matureia');

INSERT INTO `tb_cidades` VALUES (4924, 15, 'PB', 'Melo');

INSERT INTO `tb_cidades` VALUES (4925, 15, 'PB', 'Mogeiro');

INSERT INTO `tb_cidades` VALUES (4926, 15, 'PB', 'Montadas');

INSERT INTO `tb_cidades` VALUES (4927, 15, 'PB', 'Monte Horebe');

INSERT INTO `tb_cidades` VALUES (4928, 15, 'PB', 'Monteiro');

INSERT INTO `tb_cidades` VALUES (4929, 15, 'PB', 'Montevideo');

INSERT INTO `tb_cidades` VALUES (4930, 15, 'PB', 'Mulungu');

INSERT INTO `tb_cidades` VALUES (4931, 15, 'PB', 'Muquem');

INSERT INTO `tb_cidades` VALUES (4932, 15, 'PB', 'Natuba');

INSERT INTO `tb_cidades` VALUES (4933, 15, 'PB', 'Nazare');

INSERT INTO `tb_cidades` VALUES (4934, 15, 'PB', 'Nazarezinho');

INSERT INTO `tb_cidades` VALUES (4935, 15, 'PB', 'Nossa Senhora do Livramento');

INSERT INTO `tb_cidades` VALUES (4936, 15, 'PB', 'Nova Floresta');

INSERT INTO `tb_cidades` VALUES (4937, 15, 'PB', 'Nova Olinda');

INSERT INTO `tb_cidades` VALUES (4938, 15, 'PB', 'Nova Palmeira');

INSERT INTO `tb_cidades` VALUES (4939, 15, 'PB', 'Nucleo N Null');

INSERT INTO `tb_cidades` VALUES (4940, 15, 'PB', 'Nucleo N Null');

INSERT INTO `tb_cidades` VALUES (4941, 15, 'PB', 'Odilandia');

INSERT INTO `tb_cidades` VALUES (4942, 15, 'PB', 'Olho D''agua');

INSERT INTO `tb_cidades` VALUES (4943, 15, 'PB', 'Olivedos');

INSERT INTO `tb_cidades` VALUES (4944, 15, 'PB', 'Ouro Velho');

INSERT INTO `tb_cidades` VALUES (4945, 15, 'PB', 'Parari');

INSERT INTO `tb_cidades` VALUES (4946, 15, 'PB', 'Passagem');

INSERT INTO `tb_cidades` VALUES (4947, 15, 'PB', 'Patos');

INSERT INTO `tb_cidades` VALUES (4948, 15, 'PB', 'Paulista');

INSERT INTO `tb_cidades` VALUES (4949, 15, 'PB', 'Pedra Branca');

INSERT INTO `tb_cidades` VALUES (4950, 15, 'PB', 'Pedra Lavrada');

INSERT INTO `tb_cidades` VALUES (4951, 15, 'PB', 'Pedras de Fogo');

INSERT INTO `tb_cidades` VALUES (4952, 15, 'PB', 'Pedro Regis');

INSERT INTO `tb_cidades` VALUES (4953, 15, 'PB', 'Pelo Sinal');

INSERT INTO `tb_cidades` VALUES (4954, 15, 'PB', 'Pereiros');

INSERT INTO `tb_cidades` VALUES (4955, 15, 'PB', 'Pianco');

INSERT INTO `tb_cidades` VALUES (4956, 15, 'PB', 'Picui');

INSERT INTO `tb_cidades` VALUES (4957, 15, 'PB', 'Pilar');

INSERT INTO `tb_cidades` VALUES (4958, 15, 'PB', 'Piloes');

INSERT INTO `tb_cidades` VALUES (4959, 15, 'PB', 'Piloezinhos');

INSERT INTO `tb_cidades` VALUES (4960, 15, 'PB', 'Pindurao');

INSERT INTO `tb_cidades` VALUES (4961, 15, 'PB', 'Pio X');

INSERT INTO `tb_cidades` VALUES (4962, 15, 'PB', 'Piraua');

INSERT INTO `tb_cidades` VALUES (4963, 15, 'PB', 'Pirpirituba');

INSERT INTO `tb_cidades` VALUES (4964, 15, 'PB', 'Pitanga de Estrada');

INSERT INTO `tb_cidades` VALUES (4965, 15, 'PB', 'Pitimbu');

INSERT INTO `tb_cidades` VALUES (4966, 15, 'PB', 'Pocinhos');

INSERT INTO `tb_cidades` VALUES (4967, 15, 'PB', 'Poco Dantas');

INSERT INTO `tb_cidades` VALUES (4968, 15, 'PB', 'Poco de Jose de Moura');

INSERT INTO `tb_cidades` VALUES (4969, 15, 'PB', 'Pombal');

INSERT INTO `tb_cidades` VALUES (4970, 15, 'PB', 'Porteirinha de Pedra');

INSERT INTO `tb_cidades` VALUES (4971, 15, 'PB', 'Prata');

INSERT INTO `tb_cidades` VALUES (4972, 15, 'PB', 'Princesa Isabel');

INSERT INTO `tb_cidades` VALUES (4973, 15, 'PB', 'Puxinana');

INSERT INTO `tb_cidades` VALUES (4974, 15, 'PB', 'Queimadas');

INSERT INTO `tb_cidades` VALUES (4975, 15, 'PB', 'Quixaba');

INSERT INTO `tb_cidades` VALUES (4976, 15, 'PB', 'Remigio');

INSERT INTO `tb_cidades` VALUES (4977, 15, 'PB', 'Riachao');

INSERT INTO `tb_cidades` VALUES (4978, 15, 'PB', 'Riachao do Poco');

INSERT INTO `tb_cidades` VALUES (4979, 15, 'PB', 'Riacho de Santo Antonio');

INSERT INTO `tb_cidades` VALUES (4980, 15, 'PB', 'Riacho dos Cavalos');

INSERT INTO `tb_cidades` VALUES (4981, 15, 'PB', 'Ribeira');

INSERT INTO `tb_cidades` VALUES (4982, 15, 'PB', 'Rio Tinto');

INSERT INTO `tb_cidades` VALUES (4983, 15, 'PB', 'Rua Nova');

INSERT INTO `tb_cidades` VALUES (4984, 15, 'PB', 'Salema');

INSERT INTO `tb_cidades` VALUES (4985, 15, 'PB', 'Salgadinho');

INSERT INTO `tb_cidades` VALUES (4986, 15, 'PB', 'Salgado de Sao Felix');

INSERT INTO `tb_cidades` VALUES (4987, 15, 'PB', 'Santa Cecilia de Umbuzeiro');

INSERT INTO `tb_cidades` VALUES (4988, 15, 'PB', 'Santa Cruz');

INSERT INTO `tb_cidades` VALUES (4989, 15, 'PB', 'Santa Gertrudes');

INSERT INTO `tb_cidades` VALUES (4990, 15, 'PB', 'Santa Helena');

INSERT INTO `tb_cidades` VALUES (4991, 15, 'PB', 'Santa Ines');

INSERT INTO `tb_cidades` VALUES (4992, 15, 'PB', 'Santa Luzia');

INSERT INTO `tb_cidades` VALUES (4993, 15, 'PB', 'Santa Luzia do Cariri');

INSERT INTO `tb_cidades` VALUES (4994, 15, 'PB', 'Santa Maria');

INSERT INTO `tb_cidades` VALUES (4995, 15, 'PB', 'Santa Rita');

INSERT INTO `tb_cidades` VALUES (4996, 15, 'PB', 'Santa Teresinha');

INSERT INTO `tb_cidades` VALUES (4997, 15, 'PB', 'Santa Terezinha');

INSERT INTO `tb_cidades` VALUES (4998, 15, 'PB', 'Santana de Mangueira');

INSERT INTO `tb_cidades` VALUES (4999, 15, 'PB', 'Santana dos Garrotes');

INSERT INTO `tb_cidades` VALUES (5000, 15, 'PB', 'Santarem');

INSERT INTO `tb_cidades` VALUES (5001, 15, 'PB', 'Santo Andre');

INSERT INTO `tb_cidades` VALUES (5002, 15, 'PB', 'Sao Bento');

INSERT INTO `tb_cidades` VALUES (5003, 15, 'PB', 'Sao Bento de Pombal');

INSERT INTO `tb_cidades` VALUES (5004, 15, 'PB', 'Sao Domingos de Pombal');

INSERT INTO `tb_cidades` VALUES (5005, 15, 'PB', 'Sao Domingos do Cariri');

INSERT INTO `tb_cidades` VALUES (5006, 15, 'PB', 'Sao Francisco');

INSERT INTO `tb_cidades` VALUES (5007, 15, 'PB', 'Sao Goncalo');

INSERT INTO `tb_cidades` VALUES (5008, 15, 'PB', 'Sao Joao Bosco');

INSERT INTO `tb_cidades` VALUES (5009, 15, 'PB', 'Sao Joao do Cariri');

INSERT INTO `tb_cidades` VALUES (5010, 15, 'PB', 'Sao Joao do Rio do Peixe');

INSERT INTO `tb_cidades` VALUES (5011, 15, 'PB', 'Sao Joao do Tigre');

INSERT INTO `tb_cidades` VALUES (5012, 15, 'PB', 'Sao Jose da Lagoa Tapada');

INSERT INTO `tb_cidades` VALUES (5013, 15, 'PB', 'Sao Jose da Mata');

INSERT INTO `tb_cidades` VALUES (5014, 15, 'PB', 'Sao Jose de Caiana');

INSERT INTO `tb_cidades` VALUES (5015, 15, 'PB', 'Sao Jose de Espinharas');

INSERT INTO `tb_cidades` VALUES (5016, 15, 'PB', 'Sao Jose de Marimbas');

INSERT INTO `tb_cidades` VALUES (5017, 15, 'PB', 'Sao Jose de Piranhas');

INSERT INTO `tb_cidades` VALUES (5018, 15, 'PB', 'Sao Jose de Princesa');

INSERT INTO `tb_cidades` VALUES (5019, 15, 'PB', 'Sao Jose do Bonfim');

INSERT INTO `tb_cidades` VALUES (5020, 15, 'PB', 'Sao Jose do Brejo do Cruz');

INSERT INTO `tb_cidades` VALUES (5021, 15, 'PB', 'Sao Jose do Sabugi');

INSERT INTO `tb_cidades` VALUES (5022, 15, 'PB', 'Sao Jose dos Cordeiros');

INSERT INTO `tb_cidades` VALUES (5023, 15, 'PB', 'Sao Jose dos Ramos');

INSERT INTO `tb_cidades` VALUES (5024, 15, 'PB', 'Sao Mamede');

INSERT INTO `tb_cidades` VALUES (5025, 15, 'PB', 'Sao Miguel de Taipu');

INSERT INTO `tb_cidades` VALUES (5026, 15, 'PB', 'Sao Pedro');

INSERT INTO `tb_cidades` VALUES (5027, 15, 'PB', 'Sao Sebastiao de Lagoa de Roca');

INSERT INTO `tb_cidades` VALUES (5028, 15, 'PB', 'Sao Sebastiao do Umbuzeiro');

INSERT INTO `tb_cidades` VALUES (5029, 15, 'PB', 'Sape');

INSERT INTO `tb_cidades` VALUES (5030, 15, 'PB', 'Serido');

INSERT INTO `tb_cidades` VALUES (5031, 15, 'PB', 'Serido/sao Vicente do Serido');

INSERT INTO `tb_cidades` VALUES (5032, 15, 'PB', 'Serra Branca');

INSERT INTO `tb_cidades` VALUES (5033, 15, 'PB', 'Serra da Raiz');

INSERT INTO `tb_cidades` VALUES (5034, 15, 'PB', 'Serra Grande');

INSERT INTO `tb_cidades` VALUES (5035, 15, 'PB', 'Serra Redonda');

INSERT INTO `tb_cidades` VALUES (5036, 15, 'PB', 'Serraria');

INSERT INTO `tb_cidades` VALUES (5037, 15, 'PB', 'Sertaozinho');

INSERT INTO `tb_cidades` VALUES (5038, 15, 'PB', 'Sobrado');

INSERT INTO `tb_cidades` VALUES (5039, 15, 'PB', 'Solanea');

INSERT INTO `tb_cidades` VALUES (5040, 15, 'PB', 'Soledade');

INSERT INTO `tb_cidades` VALUES (5041, 15, 'PB', 'Sossego');

INSERT INTO `tb_cidades` VALUES (5042, 15, 'PB', 'Sousa');

INSERT INTO `tb_cidades` VALUES (5043, 15, 'PB', 'Sucuru');

INSERT INTO `tb_cidades` VALUES (5044, 15, 'PB', 'Sume');

INSERT INTO `tb_cidades` VALUES (5045, 15, 'PB', 'Tacima');

INSERT INTO `tb_cidades` VALUES (5046, 15, 'PB', 'Tambau');

INSERT INTO `tb_cidades` VALUES (5047, 15, 'PB', 'Tambauzinho');

INSERT INTO `tb_cidades` VALUES (5048, 15, 'PB', 'Taperoa');

INSERT INTO `tb_cidades` VALUES (5049, 15, 'PB', 'Tavares');

INSERT INTO `tb_cidades` VALUES (5050, 15, 'PB', 'Teixeira');

INSERT INTO `tb_cidades` VALUES (5051, 15, 'PB', 'Tenorio');

INSERT INTO `tb_cidades` VALUES (5052, 15, 'PB', 'Triunfo');

INSERT INTO `tb_cidades` VALUES (5053, 15, 'PB', 'Uirauna');

INSERT INTO `tb_cidades` VALUES (5054, 15, 'PB', 'Umari');

INSERT INTO `tb_cidades` VALUES (5055, 15, 'PB', 'Umbuzeiro');

INSERT INTO `tb_cidades` VALUES (5056, 15, 'PB', 'Varzea');

INSERT INTO `tb_cidades` VALUES (5057, 15, 'PB', 'Varzea Comprida');

INSERT INTO `tb_cidades` VALUES (5058, 15, 'PB', 'Varzea Nova');

INSERT INTO `tb_cidades` VALUES (5059, 15, 'PB', 'Vazante');

INSERT INTO `tb_cidades` VALUES (5060, 15, 'PB', 'Vieiropolis');

INSERT INTO `tb_cidades` VALUES (5061, 15, 'PB', 'Vista Serrana');

INSERT INTO `tb_cidades` VALUES (5062, 15, 'PB', 'Zabele');

INSERT INTO `tb_cidades` VALUES (5063, 16, 'PE', 'Abreu E Lima');

INSERT INTO `tb_cidades` VALUES (5064, 16, 'PE', 'Afogados da Ingazeira');

INSERT INTO `tb_cidades` VALUES (5065, 16, 'PE', 'Afranio');

INSERT INTO `tb_cidades` VALUES (5066, 16, 'PE', 'Agrestina');

INSERT INTO `tb_cidades` VALUES (5067, 16, 'PE', 'Agua Fria');

INSERT INTO `tb_cidades` VALUES (5068, 16, 'PE', 'Agua Preta');

INSERT INTO `tb_cidades` VALUES (5069, 16, 'PE', 'Aguas Belas');

INSERT INTO `tb_cidades` VALUES (5070, 16, 'PE', 'Airi');

INSERT INTO `tb_cidades` VALUES (5071, 16, 'PE', 'Alagoinha');

INSERT INTO `tb_cidades` VALUES (5072, 16, 'PE', 'Albuquerque Ne');

INSERT INTO `tb_cidades` VALUES (5073, 16, 'PE', 'Algodoes');

INSERT INTO `tb_cidades` VALUES (5074, 16, 'PE', 'Alianca');

INSERT INTO `tb_cidades` VALUES (5075, 16, 'PE', 'Altinho');

INSERT INTO `tb_cidades` VALUES (5076, 16, 'PE', 'Amaraji');

INSERT INTO `tb_cidades` VALUES (5077, 16, 'PE', 'Ameixas');

INSERT INTO `tb_cidades` VALUES (5078, 16, 'PE', 'Angelim');

INSERT INTO `tb_cidades` VALUES (5079, 16, 'PE', 'Apoti');

INSERT INTO `tb_cidades` VALUES (5080, 16, 'PE', 'Aracoiaba');

INSERT INTO `tb_cidades` VALUES (5081, 16, 'PE', 'Araripina');

INSERT INTO `tb_cidades` VALUES (5082, 16, 'PE', 'Arcoverde');

INSERT INTO `tb_cidades` VALUES (5083, 16, 'PE', 'Aripibu');

INSERT INTO `tb_cidades` VALUES (5084, 16, 'PE', 'Arizona');

INSERT INTO `tb_cidades` VALUES (5085, 16, 'PE', 'Barra de Farias');

INSERT INTO `tb_cidades` VALUES (5086, 16, 'PE', 'Barra de Guabiraba');

INSERT INTO `tb_cidades` VALUES (5087, 16, 'PE', 'Barra de Sao Pedro');

INSERT INTO `tb_cidades` VALUES (5088, 16, 'PE', 'Barra do Brejo');

INSERT INTO `tb_cidades` VALUES (5089, 16, 'PE', 'Barra do Chata');

INSERT INTO `tb_cidades` VALUES (5090, 16, 'PE', 'Barra do Jardim');

INSERT INTO `tb_cidades` VALUES (5091, 16, 'PE', 'Barra do Riachao');

INSERT INTO `tb_cidades` VALUES (5092, 16, 'PE', 'Barra do Sirinhaem');

INSERT INTO `tb_cidades` VALUES (5093, 16, 'PE', 'Barreiros');

INSERT INTO `tb_cidades` VALUES (5094, 16, 'PE', 'Batateira');

INSERT INTO `tb_cidades` VALUES (5095, 16, 'PE', 'Belem de Maria');

INSERT INTO `tb_cidades` VALUES (5096, 16, 'PE', 'Belem de Sao Francisco');

INSERT INTO `tb_cidades` VALUES (5097, 16, 'PE', 'Belo Jardim');

INSERT INTO `tb_cidades` VALUES (5098, 16, 'PE', 'Bengalas');

INSERT INTO `tb_cidades` VALUES (5099, 16, 'PE', 'Bentivi');

INSERT INTO `tb_cidades` VALUES (5100, 16, 'PE', 'Bernardo Vieira');

INSERT INTO `tb_cidades` VALUES (5101, 16, 'PE', 'Betania');

INSERT INTO `tb_cidades` VALUES (5102, 16, 'PE', 'Bezerros');

INSERT INTO `tb_cidades` VALUES (5103, 16, 'PE', 'Bizarra');

INSERT INTO `tb_cidades` VALUES (5104, 16, 'PE', 'Boas Novas');

INSERT INTO `tb_cidades` VALUES (5105, 16, 'PE', 'Bodoco');

INSERT INTO `tb_cidades` VALUES (5106, 16, 'PE', 'Bom Conselho');

INSERT INTO `tb_cidades` VALUES (5107, 16, 'PE', 'Bom Jardim');

INSERT INTO `tb_cidades` VALUES (5108, 16, 'PE', 'Bom Nome');

INSERT INTO `tb_cidades` VALUES (5109, 16, 'PE', 'Bonfim');

INSERT INTO `tb_cidades` VALUES (5110, 16, 'PE', 'Bonito');

INSERT INTO `tb_cidades` VALUES (5111, 16, 'PE', 'Brejao');

INSERT INTO `tb_cidades` VALUES (5112, 16, 'PE', 'Brejinho');

INSERT INTO `tb_cidades` VALUES (5113, 16, 'PE', 'Brejo da Madre de Deus');

INSERT INTO `tb_cidades` VALUES (5114, 16, 'PE', 'Buenos Aires');

INSERT INTO `tb_cidades` VALUES (5115, 16, 'PE', 'Buique');

INSERT INTO `tb_cidades` VALUES (5116, 16, 'PE', 'Cabanas');

INSERT INTO `tb_cidades` VALUES (5117, 16, 'PE', 'Cabo de Santo Agostinho');

INSERT INTO `tb_cidades` VALUES (5118, 16, 'PE', 'Cabrobo');

INSERT INTO `tb_cidades` VALUES (5119, 16, 'PE', 'Cachoeira do Roberto');

INSERT INTO `tb_cidades` VALUES (5120, 16, 'PE', 'Cachoeirinha');

INSERT INTO `tb_cidades` VALUES (5121, 16, 'PE', 'Caetes');

INSERT INTO `tb_cidades` VALUES (5122, 16, 'PE', 'Caicarinha da Penha');

INSERT INTO `tb_cidades` VALUES (5123, 16, 'PE', 'Calcado');

INSERT INTO `tb_cidades` VALUES (5124, 16, 'PE', 'Caldeiroes');

INSERT INTO `tb_cidades` VALUES (5125, 16, 'PE', 'Calumbi');

INSERT INTO `tb_cidades` VALUES (5126, 16, 'PE', 'Camaragibe');

INSERT INTO `tb_cidades` VALUES (5127, 16, 'PE', 'Camela');

INSERT INTO `tb_cidades` VALUES (5128, 16, 'PE', 'Camocim de Sao Felix');

INSERT INTO `tb_cidades` VALUES (5129, 16, 'PE', 'Camutanga');

INSERT INTO `tb_cidades` VALUES (5130, 16, 'PE', 'Canaa');

INSERT INTO `tb_cidades` VALUES (5131, 16, 'PE', 'Canhotinho');

INSERT INTO `tb_cidades` VALUES (5132, 16, 'PE', 'Capoeiras');

INSERT INTO `tb_cidades` VALUES (5133, 16, 'PE', 'Caraiba');

INSERT INTO `tb_cidades` VALUES (5134, 16, 'PE', 'Caraibeiras');

INSERT INTO `tb_cidades` VALUES (5135, 16, 'PE', 'Carapotos');

INSERT INTO `tb_cidades` VALUES (5136, 16, 'PE', 'Carice');

INSERT INTO `tb_cidades` VALUES (5137, 16, 'PE', 'Carima');

INSERT INTO `tb_cidades` VALUES (5138, 16, 'PE', 'Caririmirim');

INSERT INTO `tb_cidades` VALUES (5139, 16, 'PE', 'Carnaiba');

INSERT INTO `tb_cidades` VALUES (5140, 16, 'PE', 'Carnaubeira da Penha');

INSERT INTO `tb_cidades` VALUES (5141, 16, 'PE', 'Carneiro');

INSERT INTO `tb_cidades` VALUES (5142, 16, 'PE', 'Carpina');

INSERT INTO `tb_cidades` VALUES (5143, 16, 'PE', 'Carqueja');

INSERT INTO `tb_cidades` VALUES (5144, 16, 'PE', 'Caruaru');

INSERT INTO `tb_cidades` VALUES (5145, 16, 'PE', 'Casinhas');

INSERT INTO `tb_cidades` VALUES (5146, 16, 'PE', 'Catende');

INSERT INTO `tb_cidades` VALUES (5147, 16, 'PE', 'Catimbau');

INSERT INTO `tb_cidades` VALUES (5148, 16, 'PE', 'Catole');

INSERT INTO `tb_cidades` VALUES (5149, 16, 'PE', 'Cavaleiro');

INSERT INTO `tb_cidades` VALUES (5150, 16, 'PE', 'Cedro');

INSERT INTO `tb_cidades` VALUES (5151, 16, 'PE', 'Cha de Alegria');

INSERT INTO `tb_cidades` VALUES (5152, 16, 'PE', 'Cha do Rocha');

INSERT INTO `tb_cidades` VALUES (5153, 16, 'PE', 'Cha Grande');

INSERT INTO `tb_cidades` VALUES (5154, 16, 'PE', 'Cimbres');

INSERT INTO `tb_cidades` VALUES (5155, 16, 'PE', 'Clarana');

INSERT INTO `tb_cidades` VALUES (5156, 16, 'PE', 'Cocau');

INSERT INTO `tb_cidades` VALUES (5157, 16, 'PE', 'Conceicao das Crioulas');

INSERT INTO `tb_cidades` VALUES (5158, 16, 'PE', 'Condado');

INSERT INTO `tb_cidades` VALUES (5159, 16, 'PE', 'Correntes');

INSERT INTO `tb_cidades` VALUES (5160, 16, 'PE', 'Cortes');

INSERT INTO `tb_cidades` VALUES (5161, 16, 'PE', 'Couro D''antas');

INSERT INTO `tb_cidades` VALUES (5162, 16, 'PE', 'Cristalia');

INSERT INTO `tb_cidades` VALUES (5163, 16, 'PE', 'Cruanji');

INSERT INTO `tb_cidades` VALUES (5164, 16, 'PE', 'Cruzes');

INSERT INTO `tb_cidades` VALUES (5165, 16, 'PE', 'Cuiambuca');

INSERT INTO `tb_cidades` VALUES (5166, 16, 'PE', 'Cumaru');

INSERT INTO `tb_cidades` VALUES (5167, 16, 'PE', 'Cupira');

INSERT INTO `tb_cidades` VALUES (5168, 16, 'PE', 'Curral Queimado');

INSERT INTO `tb_cidades` VALUES (5169, 16, 'PE', 'Custodia');

INSERT INTO `tb_cidades` VALUES (5170, 16, 'PE', 'Dois Leoes');

INSERT INTO `tb_cidades` VALUES (5171, 16, 'PE', 'Dormentes');

INSERT INTO `tb_cidades` VALUES (5172, 16, 'PE', 'Entroncamento');

INSERT INTO `tb_cidades` VALUES (5173, 16, 'PE', 'Escada');

INSERT INTO `tb_cidades` VALUES (5174, 16, 'PE', 'Espirito Santo');

INSERT INTO `tb_cidades` VALUES (5175, 16, 'PE', 'Exu');

INSERT INTO `tb_cidades` VALUES (5176, 16, 'PE', 'Fazenda Nova');

INSERT INTO `tb_cidades` VALUES (5177, 16, 'PE', 'Feira Nova');

INSERT INTO `tb_cidades` VALUES (5178, 16, 'PE', 'Feitoria');

INSERT INTO `tb_cidades` VALUES (5179, 16, 'PE', 'Fernando de Noronha');

INSERT INTO `tb_cidades` VALUES (5180, 16, 'PE', 'Ferreiros');

INSERT INTO `tb_cidades` VALUES (5181, 16, 'PE', 'Flores');

INSERT INTO `tb_cidades` VALUES (5182, 16, 'PE', 'Floresta');

INSERT INTO `tb_cidades` VALUES (5183, 16, 'PE', 'Frei Miguelinho');

INSERT INTO `tb_cidades` VALUES (5184, 16, 'PE', 'Frexeiras');

INSERT INTO `tb_cidades` VALUES (5185, 16, 'PE', 'Gameleira');

INSERT INTO `tb_cidades` VALUES (5186, 16, 'PE', 'Garanhuns');

INSERT INTO `tb_cidades` VALUES (5187, 16, 'PE', 'Gloria do Goita');

INSERT INTO `tb_cidades` VALUES (5188, 16, 'PE', 'Goiana');

INSERT INTO `tb_cidades` VALUES (5189, 16, 'PE', 'Goncalves Ferreira');

INSERT INTO `tb_cidades` VALUES (5190, 16, 'PE', 'Granito');

INSERT INTO `tb_cidades` VALUES (5191, 16, 'PE', 'Gravata');

INSERT INTO `tb_cidades` VALUES (5192, 16, 'PE', 'Gravata do Ibiapina');

INSERT INTO `tb_cidades` VALUES (5193, 16, 'PE', 'Grotao');

INSERT INTO `tb_cidades` VALUES (5194, 16, 'PE', 'Guanumbi');

INSERT INTO `tb_cidades` VALUES (5195, 16, 'PE', 'Henrique Dias');

INSERT INTO `tb_cidades` VALUES (5196, 16, 'PE', 'Iateca');

INSERT INTO `tb_cidades` VALUES (5197, 16, 'PE', 'Iati');

INSERT INTO `tb_cidades` VALUES (5198, 16, 'PE', 'Ibimirim');

INSERT INTO `tb_cidades` VALUES (5199, 16, 'PE', 'Ibirajuba');

INSERT INTO `tb_cidades` VALUES (5200, 16, 'PE', 'Ibiranga');

INSERT INTO `tb_cidades` VALUES (5201, 16, 'PE', 'Ibiratinga');

INSERT INTO `tb_cidades` VALUES (5202, 16, 'PE', 'Ibitiranga');

INSERT INTO `tb_cidades` VALUES (5203, 16, 'PE', 'Ibo');

INSERT INTO `tb_cidades` VALUES (5204, 16, 'PE', 'Icaicara');

INSERT INTO `tb_cidades` VALUES (5205, 16, 'PE', 'Igapo');

INSERT INTO `tb_cidades` VALUES (5206, 16, 'PE', 'Igarapeassu');

INSERT INTO `tb_cidades` VALUES (5207, 16, 'PE', 'Igarapeba');

INSERT INTO `tb_cidades` VALUES (5208, 16, 'PE', 'Igarassu');

INSERT INTO `tb_cidades` VALUES (5209, 16, 'PE', 'Iguaraci');

INSERT INTO `tb_cidades` VALUES (5210, 16, 'PE', 'Inaja');

INSERT INTO `tb_cidades` VALUES (5211, 16, 'PE', 'Ingazeira');

INSERT INTO `tb_cidades` VALUES (5212, 16, 'PE', 'Ipojuca');

INSERT INTO `tb_cidades` VALUES (5213, 16, 'PE', 'Ipubi');

INSERT INTO `tb_cidades` VALUES (5214, 16, 'PE', 'Ipuera');

INSERT INTO `tb_cidades` VALUES (5215, 16, 'PE', 'Iraguacu');

INSERT INTO `tb_cidades` VALUES (5216, 16, 'PE', 'Irajai');

INSERT INTO `tb_cidades` VALUES (5217, 16, 'PE', 'Iratama');

INSERT INTO `tb_cidades` VALUES (5218, 16, 'PE', 'Itacuruba');

INSERT INTO `tb_cidades` VALUES (5219, 16, 'PE', 'Itaiba');

INSERT INTO `tb_cidades` VALUES (5220, 16, 'PE', 'Itamaraca');

INSERT INTO `tb_cidades` VALUES (5221, 16, 'PE', 'Itambe');

INSERT INTO `tb_cidades` VALUES (5222, 16, 'PE', 'Itapetim');

INSERT INTO `tb_cidades` VALUES (5223, 16, 'PE', 'Itapissuma');

INSERT INTO `tb_cidades` VALUES (5224, 16, 'PE', 'Itaquitinga');

INSERT INTO `tb_cidades` VALUES (5225, 16, 'PE', 'Ituguacu');

INSERT INTO `tb_cidades` VALUES (5226, 16, 'PE', 'Iuitepora');

INSERT INTO `tb_cidades` VALUES (5227, 16, 'PE', 'Jabitaca');

INSERT INTO `tb_cidades` VALUES (5228, 16, 'PE', 'Jaboatao');

INSERT INTO `tb_cidades` VALUES (5229, 16, 'PE', 'Jaboatao dos Guararapes');

INSERT INTO `tb_cidades` VALUES (5230, 16, 'PE', 'Japecanga');

INSERT INTO `tb_cidades` VALUES (5231, 16, 'PE', 'Jaqueira');

INSERT INTO `tb_cidades` VALUES (5232, 16, 'PE', 'Jatauba');

INSERT INTO `tb_cidades` VALUES (5233, 16, 'PE', 'Jatiuca');

INSERT INTO `tb_cidades` VALUES (5234, 16, 'PE', 'Jatoba');

INSERT INTO `tb_cidades` VALUES (5235, 16, 'PE', 'Jenipapo');

INSERT INTO `tb_cidades` VALUES (5236, 16, 'PE', 'Joao Alfredo');

INSERT INTO `tb_cidades` VALUES (5237, 16, 'PE', 'Joaquim Nabuco');

INSERT INTO `tb_cidades` VALUES (5238, 16, 'PE', 'Jose da Costa');

INSERT INTO `tb_cidades` VALUES (5239, 16, 'PE', 'Jose Mariano');

INSERT INTO `tb_cidades` VALUES (5240, 16, 'PE', 'Jucaral');

INSERT INTO `tb_cidades` VALUES (5241, 16, 'PE', 'Jucati');

INSERT INTO `tb_cidades` VALUES (5242, 16, 'PE', 'Jupi');

INSERT INTO `tb_cidades` VALUES (5243, 16, 'PE', 'Jurema');

INSERT INTO `tb_cidades` VALUES (5244, 16, 'PE', 'Jutai');

INSERT INTO `tb_cidades` VALUES (5245, 16, 'PE', 'Lagoa');

INSERT INTO `tb_cidades` VALUES (5246, 16, 'PE', 'Lagoa de Sao Jose');

INSERT INTO `tb_cidades` VALUES (5247, 16, 'PE', 'Lagoa do Barro');

INSERT INTO `tb_cidades` VALUES (5248, 16, 'PE', 'Lagoa do Carro');

INSERT INTO `tb_cidades` VALUES (5249, 16, 'PE', 'Lagoa do Itaenga');

INSERT INTO `tb_cidades` VALUES (5250, 16, 'PE', 'Lagoa do Ouro');

INSERT INTO `tb_cidades` VALUES (5251, 16, 'PE', 'Lagoa do Souza');

INSERT INTO `tb_cidades` VALUES (5252, 16, 'PE', 'Lagoa dos Gatos');

INSERT INTO `tb_cidades` VALUES (5253, 16, 'PE', 'Lagoa Grande');

INSERT INTO `tb_cidades` VALUES (5254, 16, 'PE', 'Laje de Sao Jose');

INSERT INTO `tb_cidades` VALUES (5255, 16, 'PE', 'Laje Grande');

INSERT INTO `tb_cidades` VALUES (5256, 16, 'PE', 'Lajedo');

INSERT INTO `tb_cidades` VALUES (5257, 16, 'PE', 'Lajedo do Cedro');

INSERT INTO `tb_cidades` VALUES (5258, 16, 'PE', 'Limoeiro');

INSERT INTO `tb_cidades` VALUES (5259, 16, 'PE', 'Livramento do Tiuma');

INSERT INTO `tb_cidades` VALUES (5260, 16, 'PE', 'Luanda');

INSERT INTO `tb_cidades` VALUES (5261, 16, 'PE', 'Macaparana');

INSERT INTO `tb_cidades` VALUES (5262, 16, 'PE', 'Machados');

INSERT INTO `tb_cidades` VALUES (5263, 16, 'PE', 'Macuje');

INSERT INTO `tb_cidades` VALUES (5264, 16, 'PE', 'Manari');

INSERT INTO `tb_cidades` VALUES (5265, 16, 'PE', 'Mandacaia');

INSERT INTO `tb_cidades` VALUES (5266, 16, 'PE', 'Mandacaru');

INSERT INTO `tb_cidades` VALUES (5267, 16, 'PE', 'Manicoba');

INSERT INTO `tb_cidades` VALUES (5268, 16, 'PE', 'Maraial');

INSERT INTO `tb_cidades` VALUES (5269, 16, 'PE', 'Maravilha');

INSERT INTO `tb_cidades` VALUES (5270, 16, 'PE', 'Mimoso');

INSERT INTO `tb_cidades` VALUES (5271, 16, 'PE', 'Miracica');

INSERT INTO `tb_cidades` VALUES (5272, 16, 'PE', 'Mirandiba');

INSERT INTO `tb_cidades` VALUES (5273, 16, 'PE', 'Morais');

INSERT INTO `tb_cidades` VALUES (5274, 16, 'PE', 'Moreilandia');

INSERT INTO `tb_cidades` VALUES (5275, 16, 'PE', 'Moreno');

INSERT INTO `tb_cidades` VALUES (5276, 16, 'PE', 'Moxoto');

INSERT INTO `tb_cidades` VALUES (5277, 16, 'PE', 'Mulungu');

INSERT INTO `tb_cidades` VALUES (5278, 16, 'PE', 'Murupe');

INSERT INTO `tb_cidades` VALUES (5279, 16, 'PE', 'Mutuca');

INSERT INTO `tb_cidades` VALUES (5280, 16, 'PE', 'Nascente');

INSERT INTO `tb_cidades` VALUES (5281, 16, 'PE', 'Navarro');

INSERT INTO `tb_cidades` VALUES (5282, 16, 'PE', 'Nazare da Mata');

INSERT INTO `tb_cidades` VALUES (5283, 16, 'PE', 'Negras');

INSERT INTO `tb_cidades` VALUES (5284, 16, 'PE', 'Nossa Senhora da Luz');

INSERT INTO `tb_cidades` VALUES (5285, 16, 'PE', 'Nossa Senhora do Carmo');

INSERT INTO `tb_cidades` VALUES (5286, 16, 'PE', 'Nossa Senhora do O');

INSERT INTO `tb_cidades` VALUES (5287, 16, 'PE', 'Nova Cruz');

INSERT INTO `tb_cidades` VALUES (5288, 16, 'PE', 'Olho D''agua De Dentro');

INSERT INTO `tb_cidades` VALUES (5289, 16, 'PE', 'Olinda');

INSERT INTO `tb_cidades` VALUES (5290, 16, 'PE', 'Oratorio');

INSERT INTO `tb_cidades` VALUES (5291, 16, 'PE', 'Ori');

INSERT INTO `tb_cidades` VALUES (5292, 16, 'PE', 'Orobo');

INSERT INTO `tb_cidades` VALUES (5293, 16, 'PE', 'Oroco');

INSERT INTO `tb_cidades` VALUES (5294, 16, 'PE', 'Ouricuri');

INSERT INTO `tb_cidades` VALUES (5295, 16, 'PE', 'Pajeu');

INSERT INTO `tb_cidades` VALUES (5296, 16, 'PE', 'Palmares');

INSERT INTO `tb_cidades` VALUES (5297, 16, 'PE', 'Palmeirina');

INSERT INTO `tb_cidades` VALUES (5298, 16, 'PE', 'Panelas');

INSERT INTO `tb_cidades` VALUES (5299, 16, 'PE', 'Pao de Acucar');

INSERT INTO `tb_cidades` VALUES (5300, 16, 'PE', 'Pao de Acucar do Pocao');

INSERT INTO `tb_cidades` VALUES (5301, 16, 'PE', 'Papagaio');

INSERT INTO `tb_cidades` VALUES (5302, 16, 'PE', 'Paquevira');

INSERT INTO `tb_cidades` VALUES (5303, 16, 'PE', 'Para');

INSERT INTO `tb_cidades` VALUES (5304, 16, 'PE', 'Paranatama');

INSERT INTO `tb_cidades` VALUES (5305, 16, 'PE', 'Paratibe');

INSERT INTO `tb_cidades` VALUES (5306, 16, 'PE', 'Parnamirim');

INSERT INTO `tb_cidades` VALUES (5307, 16, 'PE', 'Passagem do To');

INSERT INTO `tb_cidades` VALUES (5308, 16, 'PE', 'Passira');

INSERT INTO `tb_cidades` VALUES (5309, 16, 'PE', 'Pau Ferro');

INSERT INTO `tb_cidades` VALUES (5310, 16, 'PE', 'Paudalho');

INSERT INTO `tb_cidades` VALUES (5311, 16, 'PE', 'Paulista');

INSERT INTO `tb_cidades` VALUES (5312, 16, 'PE', 'Pedra');

INSERT INTO `tb_cidades` VALUES (5313, 16, 'PE', 'Perpetuo Socorro');

INSERT INTO `tb_cidades` VALUES (5314, 16, 'PE', 'Pesqueira');

INSERT INTO `tb_cidades` VALUES (5315, 16, 'PE', 'Petrolandia');

INSERT INTO `tb_cidades` VALUES (5316, 16, 'PE', 'Petrolina');

INSERT INTO `tb_cidades` VALUES (5317, 16, 'PE', 'Pirituba');

INSERT INTO `tb_cidades` VALUES (5318, 16, 'PE', 'Pocao');

INSERT INTO `tb_cidades` VALUES (5319, 16, 'PE', 'Pocao de Afranio');

INSERT INTO `tb_cidades` VALUES (5320, 16, 'PE', 'Poco Comprido');

INSERT INTO `tb_cidades` VALUES (5321, 16, 'PE', 'Poco Fundo');

INSERT INTO `tb_cidades` VALUES (5322, 16, 'PE', 'Pombos');

INSERT INTO `tb_cidades` VALUES (5323, 16, 'PE', 'Pontas de Pedra');

INSERT INTO `tb_cidades` VALUES (5324, 16, 'PE', 'Ponte dos Carvalhos');

INSERT INTO `tb_cidades` VALUES (5325, 16, 'PE', 'Praia da Conceicao');

INSERT INTO `tb_cidades` VALUES (5326, 16, 'PE', 'Primavera');

INSERT INTO `tb_cidades` VALUES (5327, 16, 'PE', 'Quipapa');

INSERT INTO `tb_cidades` VALUES (5328, 16, 'PE', 'Quitimbu');

INSERT INTO `tb_cidades` VALUES (5329, 16, 'PE', 'Quixaba');

INSERT INTO `tb_cidades` VALUES (5330, 16, 'PE', 'Rainha Isabel');

INSERT INTO `tb_cidades` VALUES (5331, 16, 'PE', 'Rajada');

INSERT INTO `tb_cidades` VALUES (5332, 16, 'PE', 'Rancharia');

INSERT INTO `tb_cidades` VALUES (5333, 16, 'PE', 'Recife');

INSERT INTO `tb_cidades` VALUES (5334, 16, 'PE', 'Riacho das Almas');

INSERT INTO `tb_cidades` VALUES (5335, 16, 'PE', 'Riacho do Meio');

INSERT INTO `tb_cidades` VALUES (5336, 16, 'PE', 'Riacho Fechado');

INSERT INTO `tb_cidades` VALUES (5337, 16, 'PE', 'Riacho Pequeno');

INSERT INTO `tb_cidades` VALUES (5338, 16, 'PE', 'Ribeirao');

INSERT INTO `tb_cidades` VALUES (5339, 16, 'PE', 'Rio da Barra');

INSERT INTO `tb_cidades` VALUES (5340, 16, 'PE', 'Rio Formoso');

INSERT INTO `tb_cidades` VALUES (5341, 16, 'PE', 'Saire');

INSERT INTO `tb_cidades` VALUES (5342, 16, 'PE', 'Salgadinho');

INSERT INTO `tb_cidades` VALUES (5343, 16, 'PE', 'Salgueiro');

INSERT INTO `tb_cidades` VALUES (5344, 16, 'PE', 'Saloa');

INSERT INTO `tb_cidades` VALUES (5345, 16, 'PE', 'Salobro');

INSERT INTO `tb_cidades` VALUES (5346, 16, 'PE', 'Sanharo');

INSERT INTO `tb_cidades` VALUES (5347, 16, 'PE', 'Santa Cruz');

INSERT INTO `tb_cidades` VALUES (5348, 16, 'PE', 'Santa Cruz da Baixa Verde');

INSERT INTO `tb_cidades` VALUES (5349, 16, 'PE', 'Santa Cruz do Capibaribe');

INSERT INTO `tb_cidades` VALUES (5350, 16, 'PE', 'Santa Filomena');

INSERT INTO `tb_cidades` VALUES (5351, 16, 'PE', 'Santa Maria da Boa Vista');

INSERT INTO `tb_cidades` VALUES (5352, 16, 'PE', 'Santa Maria do Cambuca');

INSERT INTO `tb_cidades` VALUES (5353, 16, 'PE', 'Santa Rita');

INSERT INTO `tb_cidades` VALUES (5354, 16, 'PE', 'Santa Terezinha');

INSERT INTO `tb_cidades` VALUES (5355, 16, 'PE', 'Santana de Sao Joaquim');

INSERT INTO `tb_cidades` VALUES (5356, 16, 'PE', 'Santo Agostinho');

INSERT INTO `tb_cidades` VALUES (5357, 16, 'PE', 'Santo Antonio das Queimadas');

INSERT INTO `tb_cidades` VALUES (5358, 16, 'PE', 'Santo Antonio dos Palmares');

INSERT INTO `tb_cidades` VALUES (5359, 16, 'PE', 'Sao Benedito do Sul');

INSERT INTO `tb_cidades` VALUES (5360, 16, 'PE', 'Sao Bento do Una');

INSERT INTO `tb_cidades` VALUES (5361, 16, 'PE', 'Sao Caetano do Navio');

INSERT INTO `tb_cidades` VALUES (5362, 16, 'PE', 'Sao Caitano');

INSERT INTO `tb_cidades` VALUES (5363, 16, 'PE', 'Sao Domingos');

INSERT INTO `tb_cidades` VALUES (5364, 16, 'PE', 'Sao Joao');

INSERT INTO `tb_cidades` VALUES (5365, 16, 'PE', 'Sao Joaquim do Monte');

INSERT INTO `tb_cidades` VALUES (5366, 16, 'PE', 'Sao Jose');

INSERT INTO `tb_cidades` VALUES (5367, 16, 'PE', 'Sao Jose da Coroa Grande');

INSERT INTO `tb_cidades` VALUES (5368, 16, 'PE', 'Sao Jose do Belmonte');

INSERT INTO `tb_cidades` VALUES (5369, 16, 'PE', 'Sao Jose do Egito');

INSERT INTO `tb_cidades` VALUES (5370, 16, 'PE', 'Sao Lazaro');

INSERT INTO `tb_cidades` VALUES (5371, 16, 'PE', 'Sao Lourenco da Mata');

INSERT INTO `tb_cidades` VALUES (5372, 16, 'PE', 'Sao Pedro');

INSERT INTO `tb_cidades` VALUES (5373, 16, 'PE', 'Sao Vicente');

INSERT INTO `tb_cidades` VALUES (5374, 16, 'PE', 'Sao Vicente Ferrer');

INSERT INTO `tb_cidades` VALUES (5375, 16, 'PE', 'Sapucarana');

INSERT INTO `tb_cidades` VALUES (5376, 16, 'PE', 'Saue');

INSERT INTO `tb_cidades` VALUES (5377, 16, 'PE', 'Serra Branca');

INSERT INTO `tb_cidades` VALUES (5378, 16, 'PE', 'Serra do Vento');

INSERT INTO `tb_cidades` VALUES (5379, 16, 'PE', 'Serra Talhada');

INSERT INTO `tb_cidades` VALUES (5380, 16, 'PE', 'Serrita');

INSERT INTO `tb_cidades` VALUES (5381, 16, 'PE', 'Serrolandia');

INSERT INTO `tb_cidades` VALUES (5382, 16, 'PE', 'Sertania');

INSERT INTO `tb_cidades` VALUES (5383, 16, 'PE', 'Sertaozinho de Baixo');

INSERT INTO `tb_cidades` VALUES (5384, 16, 'PE', 'Siriji');

INSERT INTO `tb_cidades` VALUES (5385, 16, 'PE', 'Sirinhaem');

INSERT INTO `tb_cidades` VALUES (5386, 16, 'PE', 'Sitio dos Nunes');

INSERT INTO `tb_cidades` VALUES (5387, 16, 'PE', 'Solidao');

INSERT INTO `tb_cidades` VALUES (5388, 16, 'PE', 'Surubim');

INSERT INTO `tb_cidades` VALUES (5389, 16, 'PE', 'Tabira');

INSERT INTO `tb_cidades` VALUES (5390, 16, 'PE', 'Tabocas');

INSERT INTO `tb_cidades` VALUES (5391, 16, 'PE', 'Tacaimbo');

INSERT INTO `tb_cidades` VALUES (5392, 16, 'PE', 'Tacaratu');

INSERT INTO `tb_cidades` VALUES (5393, 16, 'PE', 'Tamandare');

INSERT INTO `tb_cidades` VALUES (5394, 16, 'PE', 'Tamboata');

INSERT INTO `tb_cidades` VALUES (5395, 16, 'PE', 'Tapiraim');

INSERT INTO `tb_cidades` VALUES (5396, 16, 'PE', 'Taquaritinga do Norte');

INSERT INTO `tb_cidades` VALUES (5397, 16, 'PE', 'Tara');

INSERT INTO `tb_cidades` VALUES (5398, 16, 'PE', 'Tauapiranga');

INSERT INTO `tb_cidades` VALUES (5399, 16, 'PE', 'Tejucupapo');

INSERT INTO `tb_cidades` VALUES (5400, 16, 'PE', 'Terezinha');

INSERT INTO `tb_cidades` VALUES (5401, 16, 'PE', 'Terra Nova');

INSERT INTO `tb_cidades` VALUES (5402, 16, 'PE', 'Timbauba');

INSERT INTO `tb_cidades` VALUES (5403, 16, 'PE', 'Timorante');

INSERT INTO `tb_cidades` VALUES (5404, 16, 'PE', 'Toritama');

INSERT INTO `tb_cidades` VALUES (5405, 16, 'PE', 'Tracunhaem');

INSERT INTO `tb_cidades` VALUES (5406, 16, 'PE', 'Trapia');

INSERT INTO `tb_cidades` VALUES (5407, 16, 'PE', 'Tres Ladeiras');

INSERT INTO `tb_cidades` VALUES (5408, 16, 'PE', 'Trindade');

INSERT INTO `tb_cidades` VALUES (5409, 16, 'PE', 'Triunfo');

INSERT INTO `tb_cidades` VALUES (5410, 16, 'PE', 'Tupanaci');

INSERT INTO `tb_cidades` VALUES (5411, 16, 'PE', 'Tupanatinga');

INSERT INTO `tb_cidades` VALUES (5412, 16, 'PE', 'Tupaoca');

INSERT INTO `tb_cidades` VALUES (5413, 16, 'PE', 'Tuparetama');

INSERT INTO `tb_cidades` VALUES (5414, 16, 'PE', 'Umas');

INSERT INTO `tb_cidades` VALUES (5415, 16, 'PE', 'Umburetama');

INSERT INTO `tb_cidades` VALUES (5416, 16, 'PE', 'Upatininga');

INSERT INTO `tb_cidades` VALUES (5417, 16, 'PE', 'Urimama');

INSERT INTO `tb_cidades` VALUES (5418, 16, 'PE', 'Urucu-mirim');

INSERT INTO `tb_cidades` VALUES (5419, 16, 'PE', 'Urucuba');

INSERT INTO `tb_cidades` VALUES (5420, 16, 'PE', 'Vasques');

INSERT INTO `tb_cidades` VALUES (5421, 16, 'PE', 'Veneza');

INSERT INTO `tb_cidades` VALUES (5422, 16, 'PE', 'Venturosa');

INSERT INTO `tb_cidades` VALUES (5423, 16, 'PE', 'Verdejante');

INSERT INTO `tb_cidades` VALUES (5424, 16, 'PE', 'Vertente do Lerio');

INSERT INTO `tb_cidades` VALUES (5425, 16, 'PE', 'Vertentes');

INSERT INTO `tb_cidades` VALUES (5426, 16, 'PE', 'Vicencia');

INSERT INTO `tb_cidades` VALUES (5427, 16, 'PE', 'Vila Nova');

INSERT INTO `tb_cidades` VALUES (5428, 16, 'PE', 'Viracao');

INSERT INTO `tb_cidades` VALUES (5429, 16, 'PE', 'Vitoria de Santo Antao');

INSERT INTO `tb_cidades` VALUES (5430, 16, 'PE', 'Volta do Moxoto');

INSERT INTO `tb_cidades` VALUES (5431, 16, 'PE', 'Xexeu');

INSERT INTO `tb_cidades` VALUES (5432, 16, 'PE', 'Xucuru');

INSERT INTO `tb_cidades` VALUES (5433, 16, 'PE', 'Ze Gomes');

INSERT INTO `tb_cidades` VALUES (5434, 17, 'PI', 'Acaua');

INSERT INTO `tb_cidades` VALUES (5435, 17, 'PI', 'Agricolandia');

INSERT INTO `tb_cidades` VALUES (5436, 17, 'PI', 'Agua Branca');

INSERT INTO `tb_cidades` VALUES (5437, 17, 'PI', 'Alagoinha do Piaui');

INSERT INTO `tb_cidades` VALUES (5438, 17, 'PI', 'Alegrete do Piaui');

INSERT INTO `tb_cidades` VALUES (5439, 17, 'PI', 'Alto Longa');

INSERT INTO `tb_cidades` VALUES (5440, 17, 'PI', 'Altos');

INSERT INTO `tb_cidades` VALUES (5441, 17, 'PI', 'Alvorada do Gurgueia');

INSERT INTO `tb_cidades` VALUES (5442, 17, 'PI', 'Amarante');

INSERT INTO `tb_cidades` VALUES (5443, 17, 'PI', 'Angical do Piaui');

INSERT INTO `tb_cidades` VALUES (5444, 17, 'PI', 'Anisio de Abreu');

INSERT INTO `tb_cidades` VALUES (5445, 17, 'PI', 'Antonio Almeida');

INSERT INTO `tb_cidades` VALUES (5446, 17, 'PI', 'Aroazes');

INSERT INTO `tb_cidades` VALUES (5447, 17, 'PI', 'Arraial');

INSERT INTO `tb_cidades` VALUES (5448, 17, 'PI', 'Assuncao do Piaui');

INSERT INTO `tb_cidades` VALUES (5449, 17, 'PI', 'Avelino Lopes');

INSERT INTO `tb_cidades` VALUES (5450, 17, 'PI', 'Baixa Grande do Ribeiro');

INSERT INTO `tb_cidades` VALUES (5451, 17, 'PI', 'Barra D''alcantara');

INSERT INTO `tb_cidades` VALUES (5452, 17, 'PI', 'Barras');

INSERT INTO `tb_cidades` VALUES (5453, 17, 'PI', 'Barreiras do Piaui');

INSERT INTO `tb_cidades` VALUES (5454, 17, 'PI', 'Barro Duro');

INSERT INTO `tb_cidades` VALUES (5455, 17, 'PI', 'Batalha');

INSERT INTO `tb_cidades` VALUES (5456, 17, 'PI', 'Bela Vista do Piaui');

INSERT INTO `tb_cidades` VALUES (5457, 17, 'PI', 'Belem do Piaui');

INSERT INTO `tb_cidades` VALUES (5458, 17, 'PI', 'Beneditinos');

INSERT INTO `tb_cidades` VALUES (5459, 17, 'PI', 'Bertolinia');

INSERT INTO `tb_cidades` VALUES (5460, 17, 'PI', 'Betania do Piaui');

INSERT INTO `tb_cidades` VALUES (5461, 17, 'PI', 'Boa Hora');

INSERT INTO `tb_cidades` VALUES (5462, 17, 'PI', 'Bocaina');

INSERT INTO `tb_cidades` VALUES (5463, 17, 'PI', 'Bom Jesus');

INSERT INTO `tb_cidades` VALUES (5464, 17, 'PI', 'Bom Principio do Piaui');

INSERT INTO `tb_cidades` VALUES (5465, 17, 'PI', 'Bonfim do Piaui');

INSERT INTO `tb_cidades` VALUES (5466, 17, 'PI', 'Boqueirao do Piaui');

INSERT INTO `tb_cidades` VALUES (5467, 17, 'PI', 'Brasileira');

INSERT INTO `tb_cidades` VALUES (5468, 17, 'PI', 'Brejo do Piaui');

INSERT INTO `tb_cidades` VALUES (5469, 17, 'PI', 'Buriti dos Lopes');

INSERT INTO `tb_cidades` VALUES (5470, 17, 'PI', 'Buriti dos Montes');

INSERT INTO `tb_cidades` VALUES (5471, 17, 'PI', 'Cabeceiras do Piaui');

INSERT INTO `tb_cidades` VALUES (5472, 17, 'PI', 'Cajazeiras do Piaui');

INSERT INTO `tb_cidades` VALUES (5473, 17, 'PI', 'Cajueiro da Praia');

INSERT INTO `tb_cidades` VALUES (5474, 17, 'PI', 'Caldeirao Grande do Piaui');

INSERT INTO `tb_cidades` VALUES (5475, 17, 'PI', 'Campinas do Piaui');

INSERT INTO `tb_cidades` VALUES (5476, 17, 'PI', 'Campo Alegre do Fidalgo');

INSERT INTO `tb_cidades` VALUES (5477, 17, 'PI', 'Campo Grande do Piaui');

INSERT INTO `tb_cidades` VALUES (5478, 17, 'PI', 'Campo Largo do Piaui');

INSERT INTO `tb_cidades` VALUES (5479, 17, 'PI', 'Campo Maior');

INSERT INTO `tb_cidades` VALUES (5480, 17, 'PI', 'Canavieira');

INSERT INTO `tb_cidades` VALUES (5481, 17, 'PI', 'Canto do Buriti');

INSERT INTO `tb_cidades` VALUES (5482, 17, 'PI', 'Capitao de Campos');

INSERT INTO `tb_cidades` VALUES (5483, 17, 'PI', 'Capitao Gervasio Oliveira');

INSERT INTO `tb_cidades` VALUES (5484, 17, 'PI', 'Caracol');

INSERT INTO `tb_cidades` VALUES (5485, 17, 'PI', 'Caraubas do Piaui');

INSERT INTO `tb_cidades` VALUES (5486, 17, 'PI', 'Caridade do Piaui');

INSERT INTO `tb_cidades` VALUES (5487, 17, 'PI', 'Castelo do Piaui');

INSERT INTO `tb_cidades` VALUES (5488, 17, 'PI', 'Caxingo');

INSERT INTO `tb_cidades` VALUES (5489, 17, 'PI', 'Cocal');

INSERT INTO `tb_cidades` VALUES (5490, 17, 'PI', 'Cocal de Telha');

INSERT INTO `tb_cidades` VALUES (5491, 17, 'PI', 'Cocal dos Alves');

INSERT INTO `tb_cidades` VALUES (5492, 17, 'PI', 'Coivaras');

INSERT INTO `tb_cidades` VALUES (5493, 17, 'PI', 'Colonia do Gurgueia');

INSERT INTO `tb_cidades` VALUES (5494, 17, 'PI', 'Colonia do Piaui');

INSERT INTO `tb_cidades` VALUES (5495, 17, 'PI', 'Conceicao do Caninde');

INSERT INTO `tb_cidades` VALUES (5496, 17, 'PI', 'Coronel Jose Dias');

INSERT INTO `tb_cidades` VALUES (5497, 17, 'PI', 'Corrente');

INSERT INTO `tb_cidades` VALUES (5498, 17, 'PI', 'Cristalandia do Piaui');

INSERT INTO `tb_cidades` VALUES (5499, 17, 'PI', 'Cristino Castro');

INSERT INTO `tb_cidades` VALUES (5500, 17, 'PI', 'Curimata');

INSERT INTO `tb_cidades` VALUES (5501, 17, 'PI', 'Currais');

INSERT INTO `tb_cidades` VALUES (5502, 17, 'PI', 'Curral Novo do Piaui');

INSERT INTO `tb_cidades` VALUES (5503, 17, 'PI', 'Curralinhos');

INSERT INTO `tb_cidades` VALUES (5504, 17, 'PI', 'Demerval Lobao');

INSERT INTO `tb_cidades` VALUES (5505, 17, 'PI', 'Dirceu Arcoverde');

INSERT INTO `tb_cidades` VALUES (5506, 17, 'PI', 'Dom Expedito Lopes');

INSERT INTO `tb_cidades` VALUES (5507, 17, 'PI', 'Dom Inocencio');

INSERT INTO `tb_cidades` VALUES (5508, 17, 'PI', 'Domingos Mourao');

INSERT INTO `tb_cidades` VALUES (5509, 17, 'PI', 'Elesbao Veloso');

INSERT INTO `tb_cidades` VALUES (5510, 17, 'PI', 'Eliseu Martins');

INSERT INTO `tb_cidades` VALUES (5511, 17, 'PI', 'Esperantina');

INSERT INTO `tb_cidades` VALUES (5512, 17, 'PI', 'Fartura do Piaui');

INSERT INTO `tb_cidades` VALUES (5513, 17, 'PI', 'Flores do Piaui');

INSERT INTO `tb_cidades` VALUES (5514, 17, 'PI', 'Floresta do Piaui');

INSERT INTO `tb_cidades` VALUES (5515, 17, 'PI', 'Floriano');

INSERT INTO `tb_cidades` VALUES (5516, 17, 'PI', 'Francinopolis');

INSERT INTO `tb_cidades` VALUES (5517, 17, 'PI', 'Francisco Ayres');

INSERT INTO `tb_cidades` VALUES (5518, 17, 'PI', 'Francisco Macedo');

INSERT INTO `tb_cidades` VALUES (5519, 17, 'PI', 'Francisco Santos');

INSERT INTO `tb_cidades` VALUES (5520, 17, 'PI', 'Fronteiras');

INSERT INTO `tb_cidades` VALUES (5521, 17, 'PI', 'Geminiano');

INSERT INTO `tb_cidades` VALUES (5522, 17, 'PI', 'Gilbues');

INSERT INTO `tb_cidades` VALUES (5523, 17, 'PI', 'Guadalupe');

INSERT INTO `tb_cidades` VALUES (5524, 17, 'PI', 'Guaribas');

INSERT INTO `tb_cidades` VALUES (5525, 17, 'PI', 'Hugo Napoleao');

INSERT INTO `tb_cidades` VALUES (5526, 17, 'PI', 'Ilha Grande');

INSERT INTO `tb_cidades` VALUES (5527, 17, 'PI', 'Inhuma');

INSERT INTO `tb_cidades` VALUES (5528, 17, 'PI', 'Ipiranga do Piaui');

INSERT INTO `tb_cidades` VALUES (5529, 17, 'PI', 'Isaias Coelho');

INSERT INTO `tb_cidades` VALUES (5530, 17, 'PI', 'Itainopolis');

INSERT INTO `tb_cidades` VALUES (5531, 17, 'PI', 'Itaueira');

INSERT INTO `tb_cidades` VALUES (5532, 17, 'PI', 'Jacobina do Piaui');

INSERT INTO `tb_cidades` VALUES (5533, 17, 'PI', 'Jaicos');

INSERT INTO `tb_cidades` VALUES (5534, 17, 'PI', 'Jardim do Mulato');

INSERT INTO `tb_cidades` VALUES (5535, 17, 'PI', 'Jatoba do Piaui');

INSERT INTO `tb_cidades` VALUES (5536, 17, 'PI', 'Jerumenha');

INSERT INTO `tb_cidades` VALUES (5537, 17, 'PI', 'Joao Costa');

INSERT INTO `tb_cidades` VALUES (5538, 17, 'PI', 'Joaquim Pires');

INSERT INTO `tb_cidades` VALUES (5539, 17, 'PI', 'Joca Marques');

INSERT INTO `tb_cidades` VALUES (5540, 17, 'PI', 'Jose de Freitas');

INSERT INTO `tb_cidades` VALUES (5541, 17, 'PI', 'Juazeiro do Piaui');

INSERT INTO `tb_cidades` VALUES (5542, 17, 'PI', 'Julio Borges');

INSERT INTO `tb_cidades` VALUES (5543, 17, 'PI', 'Jurema');

INSERT INTO `tb_cidades` VALUES (5544, 17, 'PI', 'Lagoa Alegre');

INSERT INTO `tb_cidades` VALUES (5545, 17, 'PI', 'Lagoa de Sao Francisco');

INSERT INTO `tb_cidades` VALUES (5546, 17, 'PI', 'Lagoa do Barro do Piaui');

INSERT INTO `tb_cidades` VALUES (5547, 17, 'PI', 'Lagoa do Piaui');

INSERT INTO `tb_cidades` VALUES (5548, 17, 'PI', 'Lagoa do Sitio');

INSERT INTO `tb_cidades` VALUES (5549, 17, 'PI', 'Lagoinha do Piaui');

INSERT INTO `tb_cidades` VALUES (5550, 17, 'PI', 'Landri Sales');

INSERT INTO `tb_cidades` VALUES (5551, 17, 'PI', 'Luis Correia');

INSERT INTO `tb_cidades` VALUES (5552, 17, 'PI', 'Luzilandia');

INSERT INTO `tb_cidades` VALUES (5553, 17, 'PI', 'Madeiro');

INSERT INTO `tb_cidades` VALUES (5554, 17, 'PI', 'Manoel Emidio');

INSERT INTO `tb_cidades` VALUES (5555, 17, 'PI', 'Marcolandia');

INSERT INTO `tb_cidades` VALUES (5556, 17, 'PI', 'Marcos Parente');

INSERT INTO `tb_cidades` VALUES (5557, 17, 'PI', 'Massape do Piaui');

INSERT INTO `tb_cidades` VALUES (5558, 17, 'PI', 'Matias Olimpio');

INSERT INTO `tb_cidades` VALUES (5559, 17, 'PI', 'Miguel Alves');

INSERT INTO `tb_cidades` VALUES (5560, 17, 'PI', 'Miguel Leao');

INSERT INTO `tb_cidades` VALUES (5561, 17, 'PI', 'Milton Brandao');

INSERT INTO `tb_cidades` VALUES (5562, 17, 'PI', 'Monsenhor Gil');

INSERT INTO `tb_cidades` VALUES (5563, 17, 'PI', 'Monsenhor Hipolito');

INSERT INTO `tb_cidades` VALUES (5564, 17, 'PI', 'Monte Alegre do Piaui');

INSERT INTO `tb_cidades` VALUES (5565, 17, 'PI', 'Morro Cabeca No Tempo');

INSERT INTO `tb_cidades` VALUES (5566, 17, 'PI', 'Morro do Chapeu do Piaui');

INSERT INTO `tb_cidades` VALUES (5567, 17, 'PI', 'Murici dos Portelas');

INSERT INTO `tb_cidades` VALUES (5568, 17, 'PI', 'Nazare do Piaui');

INSERT INTO `tb_cidades` VALUES (5569, 17, 'PI', 'Nossa Senhora de Nazare');

INSERT INTO `tb_cidades` VALUES (5570, 17, 'PI', 'Nossa Senhora dos Remedios');

INSERT INTO `tb_cidades` VALUES (5571, 17, 'PI', 'Nova Santa Rita');

INSERT INTO `tb_cidades` VALUES (5572, 17, 'PI', 'Novo Nilo');

INSERT INTO `tb_cidades` VALUES (5573, 17, 'PI', 'Novo Oriente do Piaui');

INSERT INTO `tb_cidades` VALUES (5574, 17, 'PI', 'Novo Santo Antonio');

INSERT INTO `tb_cidades` VALUES (5575, 17, 'PI', 'Oeiras');

INSERT INTO `tb_cidades` VALUES (5576, 17, 'PI', 'Olho D''agua Do Piaui');

INSERT INTO `tb_cidades` VALUES (5577, 17, 'PI', 'Padre Marcos');

INSERT INTO `tb_cidades` VALUES (5578, 17, 'PI', 'Paes Landim');

INSERT INTO `tb_cidades` VALUES (5579, 17, 'PI', 'Pajeu do Piaui');

INSERT INTO `tb_cidades` VALUES (5580, 17, 'PI', 'Palmeira do Piaui');

INSERT INTO `tb_cidades` VALUES (5581, 17, 'PI', 'Palmeirais');

INSERT INTO `tb_cidades` VALUES (5582, 17, 'PI', 'Paqueta');

INSERT INTO `tb_cidades` VALUES (5583, 17, 'PI', 'Parnagua');

INSERT INTO `tb_cidades` VALUES (5584, 17, 'PI', 'Parnaiba');

INSERT INTO `tb_cidades` VALUES (5585, 17, 'PI', 'Passagem Franca do Piaui');

INSERT INTO `tb_cidades` VALUES (5586, 17, 'PI', 'Patos do Piaui');

INSERT INTO `tb_cidades` VALUES (5587, 17, 'PI', 'Paulistana');

INSERT INTO `tb_cidades` VALUES (5588, 17, 'PI', 'Pavussu');

INSERT INTO `tb_cidades` VALUES (5589, 17, 'PI', 'Pedro Ii');

INSERT INTO `tb_cidades` VALUES (5590, 17, 'PI', 'Pedro Laurentino');

INSERT INTO `tb_cidades` VALUES (5591, 17, 'PI', 'Picos');

INSERT INTO `tb_cidades` VALUES (5592, 17, 'PI', 'Pimenteiras');

INSERT INTO `tb_cidades` VALUES (5593, 17, 'PI', 'Pio Ix');

INSERT INTO `tb_cidades` VALUES (5594, 17, 'PI', 'Piracuruca');

INSERT INTO `tb_cidades` VALUES (5595, 17, 'PI', 'Piripiri');

INSERT INTO `tb_cidades` VALUES (5596, 17, 'PI', 'Porto');

INSERT INTO `tb_cidades` VALUES (5597, 17, 'PI', 'Porto Alegre do Piaui');

INSERT INTO `tb_cidades` VALUES (5598, 17, 'PI', 'Prata do Piaui');

INSERT INTO `tb_cidades` VALUES (5599, 17, 'PI', 'Queimada Nova');

INSERT INTO `tb_cidades` VALUES (5600, 17, 'PI', 'Redencao do Gurgueia');

INSERT INTO `tb_cidades` VALUES (5601, 17, 'PI', 'Regeneracao');

INSERT INTO `tb_cidades` VALUES (5602, 17, 'PI', 'Riacho Frio');

INSERT INTO `tb_cidades` VALUES (5603, 17, 'PI', 'Ribeira do Piaui');

INSERT INTO `tb_cidades` VALUES (5604, 17, 'PI', 'Ribeiro Goncalves');

INSERT INTO `tb_cidades` VALUES (5605, 17, 'PI', 'Rio Grande do Piaui');

INSERT INTO `tb_cidades` VALUES (5606, 17, 'PI', 'Santa Cruz do Piaui');

INSERT INTO `tb_cidades` VALUES (5607, 17, 'PI', 'Santa Cruz dos Milagres');

INSERT INTO `tb_cidades` VALUES (5608, 17, 'PI', 'Santa Filomena');

INSERT INTO `tb_cidades` VALUES (5609, 17, 'PI', 'Santa Luz');

INSERT INTO `tb_cidades` VALUES (5610, 17, 'PI', 'Santa Rosa do Piaui');

INSERT INTO `tb_cidades` VALUES (5611, 17, 'PI', 'Santana do Piaui');

INSERT INTO `tb_cidades` VALUES (5612, 17, 'PI', 'Santo Antonio de Lisboa');

INSERT INTO `tb_cidades` VALUES (5613, 17, 'PI', 'Santo Antonio dos Milagres');

INSERT INTO `tb_cidades` VALUES (5614, 17, 'PI', 'Santo Inacio do Piaui');

INSERT INTO `tb_cidades` VALUES (5615, 17, 'PI', 'Sao Braz do Piaui');

INSERT INTO `tb_cidades` VALUES (5616, 17, 'PI', 'Sao Felix do Piaui');

INSERT INTO `tb_cidades` VALUES (5617, 17, 'PI', 'Sao Francisco de Assis do Piaui');

INSERT INTO `tb_cidades` VALUES (5618, 17, 'PI', 'Sao Francisco do Piaui');

INSERT INTO `tb_cidades` VALUES (5619, 17, 'PI', 'Sao Goncalo do Gurgueia');

INSERT INTO `tb_cidades` VALUES (5620, 17, 'PI', 'Sao Goncalo do Piaui');

INSERT INTO `tb_cidades` VALUES (5621, 17, 'PI', 'Sao Joao da Canabrava');

INSERT INTO `tb_cidades` VALUES (5622, 17, 'PI', 'Sao Joao da Fronteira');

INSERT INTO `tb_cidades` VALUES (5623, 17, 'PI', 'Sao Joao da Serra');

INSERT INTO `tb_cidades` VALUES (5624, 17, 'PI', 'Sao Joao da Varjota');

INSERT INTO `tb_cidades` VALUES (5625, 17, 'PI', 'Sao Joao do Arraial');

INSERT INTO `tb_cidades` VALUES (5626, 17, 'PI', 'Sao Joao do Piaui');

INSERT INTO `tb_cidades` VALUES (5627, 17, 'PI', 'Sao Jose do Divino');

INSERT INTO `tb_cidades` VALUES (5628, 17, 'PI', 'Sao Jose do Peixe');

INSERT INTO `tb_cidades` VALUES (5629, 17, 'PI', 'Sao Jose do Piaui');

INSERT INTO `tb_cidades` VALUES (5630, 17, 'PI', 'Sao Juliao');

INSERT INTO `tb_cidades` VALUES (5631, 17, 'PI', 'Sao Lourenco do Piaui');

INSERT INTO `tb_cidades` VALUES (5632, 17, 'PI', 'Sao Luis do Piaui');

INSERT INTO `tb_cidades` VALUES (5633, 17, 'PI', 'Sao Miguel da Baixa Grande');

INSERT INTO `tb_cidades` VALUES (5634, 17, 'PI', 'Sao Miguel do Fidalgo');

INSERT INTO `tb_cidades` VALUES (5635, 17, 'PI', 'Sao Miguel do Tapuio');

INSERT INTO `tb_cidades` VALUES (5636, 17, 'PI', 'Sao Pedro do Piaui');

INSERT INTO `tb_cidades` VALUES (5637, 17, 'PI', 'Sao Raimundo Nonato');

INSERT INTO `tb_cidades` VALUES (5638, 17, 'PI', 'Sebastiao Barros');

INSERT INTO `tb_cidades` VALUES (5639, 17, 'PI', 'Sebastiao Leal');

INSERT INTO `tb_cidades` VALUES (5640, 17, 'PI', 'Sigefredo Pacheco');

INSERT INTO `tb_cidades` VALUES (5641, 17, 'PI', 'Simoes');

INSERT INTO `tb_cidades` VALUES (5642, 17, 'PI', 'Simplicio Mendes');

INSERT INTO `tb_cidades` VALUES (5643, 17, 'PI', 'Socorro do Piaui');

INSERT INTO `tb_cidades` VALUES (5644, 17, 'PI', 'Sussuapara');

INSERT INTO `tb_cidades` VALUES (5645, 17, 'PI', 'Tamboril do Piaui');

INSERT INTO `tb_cidades` VALUES (5646, 17, 'PI', 'Tanque do Piaui');

INSERT INTO `tb_cidades` VALUES (5647, 17, 'PI', 'Teresina');

INSERT INTO `tb_cidades` VALUES (5648, 17, 'PI', 'Uniao');

INSERT INTO `tb_cidades` VALUES (5649, 17, 'PI', 'Urucui');

INSERT INTO `tb_cidades` VALUES (5650, 17, 'PI', 'Valenca do Piaui');

INSERT INTO `tb_cidades` VALUES (5651, 17, 'PI', 'Varzea Branca');

INSERT INTO `tb_cidades` VALUES (5652, 17, 'PI', 'Varzea Grande');

INSERT INTO `tb_cidades` VALUES (5653, 17, 'PI', 'Vera Mendes');

INSERT INTO `tb_cidades` VALUES (5654, 17, 'PI', 'Vila Nova do Piaui');

INSERT INTO `tb_cidades` VALUES (5655, 17, 'PI', 'Wall Ferraz');

INSERT INTO `tb_cidades` VALUES (5656, 18, 'PR', 'Abapa');

INSERT INTO `tb_cidades` VALUES (5657, 18, 'PR', 'Abatia');

INSERT INTO `tb_cidades` VALUES (5658, 18, 'PR', 'Acampamento das Minas');

INSERT INTO `tb_cidades` VALUES (5659, 18, 'PR', 'Acungui');

INSERT INTO `tb_cidades` VALUES (5660, 18, 'PR', 'Adhemar de Barros');

INSERT INTO `tb_cidades` VALUES (5661, 18, 'PR', 'Adrianopolis');

INSERT INTO `tb_cidades` VALUES (5662, 18, 'PR', 'Agostinho');

INSERT INTO `tb_cidades` VALUES (5663, 18, 'PR', 'Agua Azul');

INSERT INTO `tb_cidades` VALUES (5664, 18, 'PR', 'Agua Boa');

INSERT INTO `tb_cidades` VALUES (5665, 18, 'PR', 'Agua Branca');

INSERT INTO `tb_cidades` VALUES (5666, 18, 'PR', 'Agua do Boi');

INSERT INTO `tb_cidades` VALUES (5667, 18, 'PR', 'Agua Mineral');

INSERT INTO `tb_cidades` VALUES (5668, 18, 'PR', 'Agua Vermelha');

INSERT INTO `tb_cidades` VALUES (5669, 18, 'PR', 'Agudos do Sul');

INSERT INTO `tb_cidades` VALUES (5670, 18, 'PR', 'Alecrim');

INSERT INTO `tb_cidades` VALUES (5671, 18, 'PR', 'Alexandra');

INSERT INTO `tb_cidades` VALUES (5672, 18, 'PR', 'Almirante Tamandare');

INSERT INTO `tb_cidades` VALUES (5673, 18, 'PR', 'Altamira do Parana');

INSERT INTO `tb_cidades` VALUES (5674, 18, 'PR', 'Altaneira');

INSERT INTO `tb_cidades` VALUES (5675, 18, 'PR', 'Alto Alegre');

INSERT INTO `tb_cidades` VALUES (5676, 18, 'PR', 'Alto Alegre do Iguacu');

INSERT INTO `tb_cidades` VALUES (5677, 18, 'PR', 'Alto Amparo');

INSERT INTO `tb_cidades` VALUES (5678, 18, 'PR', 'Alto do Amparo');

INSERT INTO `tb_cidades` VALUES (5679, 18, 'PR', 'Alto Para');

INSERT INTO `tb_cidades` VALUES (5680, 18, 'PR', 'Alto Parana');

INSERT INTO `tb_cidades` VALUES (5681, 18, 'PR', 'Alto Piquiri');

INSERT INTO `tb_cidades` VALUES (5682, 18, 'PR', 'Alto Pora');

INSERT INTO `tb_cidades` VALUES (5683, 18, 'PR', 'Alto Sabia');

INSERT INTO `tb_cidades` VALUES (5684, 18, 'PR', 'Alto Santa Fe');

INSERT INTO `tb_cidades` VALUES (5685, 18, 'PR', 'Alto Sao Joao');

INSERT INTO `tb_cidades` VALUES (5686, 18, 'PR', 'Altonia');

INSERT INTO `tb_cidades` VALUES (5687, 18, 'PR', 'Alvorada do Iguacu');

INSERT INTO `tb_cidades` VALUES (5688, 18, 'PR', 'Alvorada do Sul');

INSERT INTO `tb_cidades` VALUES (5689, 18, 'PR', 'Amapora');

INSERT INTO `tb_cidades` VALUES (5690, 18, 'PR', 'Amorinha');

INSERT INTO `tb_cidades` VALUES (5691, 18, 'PR', 'Ampere');

INSERT INTO `tb_cidades` VALUES (5692, 18, 'PR', 'Anahy');

INSERT INTO `tb_cidades` VALUES (5693, 18, 'PR', 'Andira');

INSERT INTO `tb_cidades` VALUES (5694, 18, 'PR', 'Andorinhas');

INSERT INTO `tb_cidades` VALUES (5695, 18, 'PR', 'Angai');

INSERT INTO `tb_cidades` VALUES (5696, 18, 'PR', 'Angulo');

INSERT INTO `tb_cidades` VALUES (5697, 18, 'PR', 'Antas');

INSERT INTO `tb_cidades` VALUES (5698, 18, 'PR', 'Antonina');

INSERT INTO `tb_cidades` VALUES (5699, 18, 'PR', 'Antonio Brandao de Oliveira');

INSERT INTO `tb_cidades` VALUES (5700, 18, 'PR', 'Antonio Olinto');

INSERT INTO `tb_cidades` VALUES (5701, 18, 'PR', 'Anunciacao');

INSERT INTO `tb_cidades` VALUES (5702, 18, 'PR', 'Aparecida do Oeste');

INSERT INTO `tb_cidades` VALUES (5703, 18, 'PR', 'Apiaba');

INSERT INTO `tb_cidades` VALUES (5704, 18, 'PR', 'Apucarana');

INSERT INTO `tb_cidades` VALUES (5705, 18, 'PR', 'Aquidaban');

INSERT INTO `tb_cidades` VALUES (5706, 18, 'PR', 'Aranha');

INSERT INTO `tb_cidades` VALUES (5707, 18, 'PR', 'Arapongas');

INSERT INTO `tb_cidades` VALUES (5708, 18, 'PR', 'Arapoti');

INSERT INTO `tb_cidades` VALUES (5709, 18, 'PR', 'Arapua');

INSERT INTO `tb_cidades` VALUES (5710, 18, 'PR', 'Arapuan');

INSERT INTO `tb_cidades` VALUES (5711, 18, 'PR', 'Ararapira');

INSERT INTO `tb_cidades` VALUES (5712, 18, 'PR', 'Araruna');

INSERT INTO `tb_cidades` VALUES (5713, 18, 'PR', 'Araucaria');

INSERT INTO `tb_cidades` VALUES (5714, 18, 'PR', 'Areia Branca dos Assis');

INSERT INTO `tb_cidades` VALUES (5715, 18, 'PR', 'Areias');

INSERT INTO `tb_cidades` VALUES (5716, 18, 'PR', 'Aricanduva');

INSERT INTO `tb_cidades` VALUES (5717, 18, 'PR', 'Ariranha do Ivai');

INSERT INTO `tb_cidades` VALUES (5718, 18, 'PR', 'Aroeira');

INSERT INTO `tb_cidades` VALUES (5719, 18, 'PR', 'Arquimedes');

INSERT INTO `tb_cidades` VALUES (5720, 18, 'PR', 'Assai');

INSERT INTO `tb_cidades` VALUES (5721, 18, 'PR', 'Assis Chateaubriand');

INSERT INTO `tb_cidades` VALUES (5722, 18, 'PR', 'Astorga');

INSERT INTO `tb_cidades` VALUES (5723, 18, 'PR', 'Atalaia');

INSERT INTO `tb_cidades` VALUES (5724, 18, 'PR', 'Aurora do Iguacu');

INSERT INTO `tb_cidades` VALUES (5725, 18, 'PR', 'Bairro Cachoeira');

INSERT INTO `tb_cidades` VALUES (5726, 18, 'PR', 'Bairro do Felisberto');

INSERT INTO `tb_cidades` VALUES (5727, 18, 'PR', 'Bairro Limoeiro');

INSERT INTO `tb_cidades` VALUES (5728, 18, 'PR', 'Balsa Nova');

INSERT INTO `tb_cidades` VALUES (5729, 18, 'PR', 'Bandeirantes');

INSERT INTO `tb_cidades` VALUES (5730, 18, 'PR', 'Bandeirantes D''oeste');

INSERT INTO `tb_cidades` VALUES (5731, 18, 'PR', 'Banhado');

INSERT INTO `tb_cidades` VALUES (5732, 18, 'PR', 'Barao de Lucena');

INSERT INTO `tb_cidades` VALUES (5733, 18, 'PR', 'Barbosa Ferraz');

INSERT INTO `tb_cidades` VALUES (5734, 18, 'PR', 'Barra Bonita');

INSERT INTO `tb_cidades` VALUES (5735, 18, 'PR', 'Barra do Jacare');

INSERT INTO `tb_cidades` VALUES (5736, 18, 'PR', 'Barra Grande');

INSERT INTO `tb_cidades` VALUES (5737, 18, 'PR', 'Barra Mansa');

INSERT INTO `tb_cidades` VALUES (5738, 18, 'PR', 'Barra Santa Salete');

INSERT INTO `tb_cidades` VALUES (5739, 18, 'PR', 'Barracao');

INSERT INTO `tb_cidades` VALUES (5740, 18, 'PR', 'Barras');

INSERT INTO `tb_cidades` VALUES (5741, 18, 'PR', 'Barreiro');

INSERT INTO `tb_cidades` VALUES (5742, 18, 'PR', 'Barreiro das Frutas');

INSERT INTO `tb_cidades` VALUES (5743, 18, 'PR', 'Barreiros');

INSERT INTO `tb_cidades` VALUES (5744, 18, 'PR', 'Barrinha');

INSERT INTO `tb_cidades` VALUES (5745, 18, 'PR', 'Barro Preto');

INSERT INTO `tb_cidades` VALUES (5746, 18, 'PR', 'Bateias');

INSERT INTO `tb_cidades` VALUES (5747, 18, 'PR', 'Baulandia');

INSERT INTO `tb_cidades` VALUES (5748, 18, 'PR', 'Bela Vista');

INSERT INTO `tb_cidades` VALUES (5749, 18, 'PR', 'Bela Vista do Caroba');

INSERT INTO `tb_cidades` VALUES (5750, 18, 'PR', 'Bela Vista do Ivai');

INSERT INTO `tb_cidades` VALUES (5751, 18, 'PR', 'Bela Vista do Paraiso');

INSERT INTO `tb_cidades` VALUES (5752, 18, 'PR', 'Bela Vista do Piquiri');

INSERT INTO `tb_cidades` VALUES (5753, 18, 'PR', 'Bela Vista do Tapiracui');

INSERT INTO `tb_cidades` VALUES (5754, 18, 'PR', 'Bentopolis');

INSERT INTO `tb_cidades` VALUES (5755, 18, 'PR', 'Bernardelli');

INSERT INTO `tb_cidades` VALUES (5756, 18, 'PR', 'Betaras');

INSERT INTO `tb_cidades` VALUES (5757, 18, 'PR', 'Bituruna');

INSERT INTO `tb_cidades` VALUES (5758, 18, 'PR', 'Boa Esperanca');

INSERT INTO `tb_cidades` VALUES (5759, 18, 'PR', 'Boa Esperanca do Iguacu');

INSERT INTO `tb_cidades` VALUES (5760, 18, 'PR', 'Boa Ventura de Sao Roque');

INSERT INTO `tb_cidades` VALUES (5761, 18, 'PR', 'Boa Vista');

INSERT INTO `tb_cidades` VALUES (5762, 18, 'PR', 'Boa Vista da Aparecida');

INSERT INTO `tb_cidades` VALUES (5763, 18, 'PR', 'Bocaina');

INSERT INTO `tb_cidades` VALUES (5764, 18, 'PR', 'Bocaiuva do Sul');

INSERT INTO `tb_cidades` VALUES (5765, 18, 'PR', 'Bom Jardim do Sul');

INSERT INTO `tb_cidades` VALUES (5766, 18, 'PR', 'Bom Jesus do Sul');

INSERT INTO `tb_cidades` VALUES (5767, 18, 'PR', 'Bom Progresso');

INSERT INTO `tb_cidades` VALUES (5768, 18, 'PR', 'Bom Retiro');

INSERT INTO `tb_cidades` VALUES (5769, 18, 'PR', 'Bom Sucesso');

INSERT INTO `tb_cidades` VALUES (5770, 18, 'PR', 'Bom Sucesso do Sul');

INSERT INTO `tb_cidades` VALUES (5771, 18, 'PR', 'Borda do Campo');

INSERT INTO `tb_cidades` VALUES (5772, 18, 'PR', 'Borda do Campo de Sao Sebastiao');

INSERT INTO `tb_cidades` VALUES (5773, 18, 'PR', 'Borman');

INSERT INTO `tb_cidades` VALUES (5774, 18, 'PR', 'Borrazopolis');

INSERT INTO `tb_cidades` VALUES (5775, 18, 'PR', 'Botuquara');

INSERT INTO `tb_cidades` VALUES (5776, 18, 'PR', 'Bourbonia');

INSERT INTO `tb_cidades` VALUES (5777, 18, 'PR', 'Braganey');

INSERT INTO `tb_cidades` VALUES (5778, 18, 'PR', 'Bragantina');

INSERT INTO `tb_cidades` VALUES (5779, 18, 'PR', 'Brasilandia do Sul');

INSERT INTO `tb_cidades` VALUES (5780, 18, 'PR', 'Bugre');

INSERT INTO `tb_cidades` VALUES (5781, 18, 'PR', 'Bulcao');

INSERT INTO `tb_cidades` VALUES (5782, 18, 'PR', 'Cabrito');

INSERT INTO `tb_cidades` VALUES (5783, 18, 'PR', 'Cacatu');

INSERT INTO `tb_cidades` VALUES (5784, 18, 'PR', 'Cachoeira');

INSERT INTO `tb_cidades` VALUES (5785, 18, 'PR', 'Cachoeira de Cima');

INSERT INTO `tb_cidades` VALUES (5786, 18, 'PR', 'Cachoeira de Sao Jose');

INSERT INTO `tb_cidades` VALUES (5787, 18, 'PR', 'Cachoeira do Espirito Santo');

INSERT INTO `tb_cidades` VALUES (5788, 18, 'PR', 'Cachoeirinha');

INSERT INTO `tb_cidades` VALUES (5789, 18, 'PR', 'Cadeadinho');

INSERT INTO `tb_cidades` VALUES (5790, 18, 'PR', 'Caetano Mendes');

INSERT INTO `tb_cidades` VALUES (5791, 18, 'PR', 'Cafeara');

INSERT INTO `tb_cidades` VALUES (5792, 18, 'PR', 'Cafeeiros');

INSERT INTO `tb_cidades` VALUES (5793, 18, 'PR', 'Cafelandia');

INSERT INTO `tb_cidades` VALUES (5794, 18, 'PR', 'Cafezal do Sul');

INSERT INTO `tb_cidades` VALUES (5795, 18, 'PR', 'Caita');

INSERT INTO `tb_cidades` VALUES (5796, 18, 'PR', 'Caixa Prego');

INSERT INTO `tb_cidades` VALUES (5797, 18, 'PR', 'California');

INSERT INTO `tb_cidades` VALUES (5798, 18, 'PR', 'Calogeras');

INSERT INTO `tb_cidades` VALUES (5799, 18, 'PR', 'Cambara');

INSERT INTO `tb_cidades` VALUES (5800, 18, 'PR', 'Cambe');

INSERT INTO `tb_cidades` VALUES (5801, 18, 'PR', 'Cambiju');

INSERT INTO `tb_cidades` VALUES (5802, 18, 'PR', 'Cambira');

INSERT INTO `tb_cidades` VALUES (5803, 18, 'PR', 'Campestrinho');

INSERT INTO `tb_cidades` VALUES (5804, 18, 'PR', 'Campina');

INSERT INTO `tb_cidades` VALUES (5805, 18, 'PR', 'Campina da Lagoa');

INSERT INTO `tb_cidades` VALUES (5806, 18, 'PR', 'Campina do Miranguava');

INSERT INTO `tb_cidades` VALUES (5807, 18, 'PR', 'Campina do Simao');

INSERT INTO `tb_cidades` VALUES (5808, 18, 'PR', 'Campina dos Furtados');

INSERT INTO `tb_cidades` VALUES (5809, 18, 'PR', 'Campina Grande do Sul');

INSERT INTO `tb_cidades` VALUES (5810, 18, 'PR', 'Campinas');

INSERT INTO `tb_cidades` VALUES (5811, 18, 'PR', 'Campo Bonito');

INSERT INTO `tb_cidades` VALUES (5812, 18, 'PR', 'Campo do Meio');

INSERT INTO `tb_cidades` VALUES (5813, 18, 'PR', 'Campo do Tenente');

INSERT INTO `tb_cidades` VALUES (5814, 18, 'PR', 'Campo Largo');

INSERT INTO `tb_cidades` VALUES (5815, 18, 'PR', 'Campo Largo da Roseira');

INSERT INTO `tb_cidades` VALUES (5816, 18, 'PR', 'Campo Magro');

INSERT INTO `tb_cidades` VALUES (5817, 18, 'PR', 'Campo Mourao');

INSERT INTO `tb_cidades` VALUES (5818, 18, 'PR', 'Candido de Abreu');

INSERT INTO `tb_cidades` VALUES (5819, 18, 'PR', 'Candoi');

INSERT INTO `tb_cidades` VALUES (5820, 18, 'PR', 'Canela');

INSERT INTO `tb_cidades` VALUES (5821, 18, 'PR', 'Cantagalo');

INSERT INTO `tb_cidades` VALUES (5822, 18, 'PR', 'Canzianopolis');

INSERT INTO `tb_cidades` VALUES (5823, 18, 'PR', 'Capanema');

INSERT INTO `tb_cidades` VALUES (5824, 18, 'PR', 'Capao Alto');

INSERT INTO `tb_cidades` VALUES (5825, 18, 'PR', 'Capao Bonito');

INSERT INTO `tb_cidades` VALUES (5826, 18, 'PR', 'Capao da Lagoa');

INSERT INTO `tb_cidades` VALUES (5827, 18, 'PR', 'Capao Grande');

INSERT INTO `tb_cidades` VALUES (5828, 18, 'PR', 'Capao Rico');

INSERT INTO `tb_cidades` VALUES (5829, 18, 'PR', 'Capitao Leonidas Marques');

INSERT INTO `tb_cidades` VALUES (5830, 18, 'PR', 'Capivara');

INSERT INTO `tb_cidades` VALUES (5831, 18, 'PR', 'Capoeirinha');

INSERT INTO `tb_cidades` VALUES (5832, 18, 'PR', 'Cara Pintado');

INSERT INTO `tb_cidades` VALUES (5833, 18, 'PR', 'Cara-cara');

INSERT INTO `tb_cidades` VALUES (5834, 18, 'PR', 'Caraja');

INSERT INTO `tb_cidades` VALUES (5835, 18, 'PR', 'Carambei');

INSERT INTO `tb_cidades` VALUES (5836, 18, 'PR', 'Caramuru');

INSERT INTO `tb_cidades` VALUES (5837, 18, 'PR', 'Caratuva');

INSERT INTO `tb_cidades` VALUES (5838, 18, 'PR', 'Carazinho');

INSERT INTO `tb_cidades` VALUES (5839, 18, 'PR', 'Carbonera');

INSERT INTO `tb_cidades` VALUES (5840, 18, 'PR', 'Carlopolis');

INSERT INTO `tb_cidades` VALUES (5841, 18, 'PR', 'Casa Nova');

INSERT INTO `tb_cidades` VALUES (5842, 18, 'PR', 'Cascatinha');

INSERT INTO `tb_cidades` VALUES (5843, 18, 'PR', 'Cascavel');

INSERT INTO `tb_cidades` VALUES (5844, 18, 'PR', 'Castro');

INSERT INTO `tb_cidades` VALUES (5845, 18, 'PR', 'Catanduvas');

INSERT INTO `tb_cidades` VALUES (5846, 18, 'PR', 'Catanduvas do Sul');

INSERT INTO `tb_cidades` VALUES (5847, 18, 'PR', 'Catarinenses');

INSERT INTO `tb_cidades` VALUES (5848, 18, 'PR', 'Caxambu');

INSERT INTO `tb_cidades` VALUES (5849, 18, 'PR', 'Cedro');

INSERT INTO `tb_cidades` VALUES (5850, 18, 'PR', 'Centenario');

INSERT INTO `tb_cidades` VALUES (5851, 18, 'PR', 'Centenario do Sul');

INSERT INTO `tb_cidades` VALUES (5852, 18, 'PR', 'Central Lupion');

INSERT INTO `tb_cidades` VALUES (5853, 18, 'PR', 'Centralito');

INSERT INTO `tb_cidades` VALUES (5854, 18, 'PR', 'Centro Novo');

INSERT INTO `tb_cidades` VALUES (5855, 18, 'PR', 'Cerne');

INSERT INTO `tb_cidades` VALUES (5856, 18, 'PR', 'Cerrado Grande');

INSERT INTO `tb_cidades` VALUES (5857, 18, 'PR', 'Cerro Azul');

INSERT INTO `tb_cidades` VALUES (5858, 18, 'PR', 'Cerro Velho');

INSERT INTO `tb_cidades` VALUES (5859, 18, 'PR', 'Ceu Azul');

INSERT INTO `tb_cidades` VALUES (5860, 18, 'PR', 'Chopinzinho');

INSERT INTO `tb_cidades` VALUES (5861, 18, 'PR', 'Cianorte');

INSERT INTO `tb_cidades` VALUES (5862, 18, 'PR', 'Cidade Gaucha');

INSERT INTO `tb_cidades` VALUES (5863, 18, 'PR', 'Cintra Pimentel');

INSERT INTO `tb_cidades` VALUES (5864, 18, 'PR', 'Clevelandia');

INSERT INTO `tb_cidades` VALUES (5865, 18, 'PR', 'Coitinho');

INSERT INTO `tb_cidades` VALUES (5866, 18, 'PR', 'Colombo');

INSERT INTO `tb_cidades` VALUES (5867, 18, 'PR', 'Colonia Acioli');

INSERT INTO `tb_cidades` VALUES (5868, 18, 'PR', 'Colonia Castelhanos');

INSERT INTO `tb_cidades` VALUES (5869, 18, 'PR', 'Colonia Castrolanda');

INSERT INTO `tb_cidades` VALUES (5870, 18, 'PR', 'Colonia Centenario');

INSERT INTO `tb_cidades` VALUES (5871, 18, 'PR', 'Colonia Cristina');

INSERT INTO `tb_cidades` VALUES (5872, 18, 'PR', 'Colonia Dom Carlos');

INSERT INTO `tb_cidades` VALUES (5873, 18, 'PR', 'Colonia Esperanca');

INSERT INTO `tb_cidades` VALUES (5874, 18, 'PR', 'Colonia General Carneiro');

INSERT INTO `tb_cidades` VALUES (5875, 18, 'PR', 'Colonia Iapo');

INSERT INTO `tb_cidades` VALUES (5876, 18, 'PR', 'Colonia Melissa');

INSERT INTO `tb_cidades` VALUES (5877, 18, 'PR', 'Colonia Murici');

INSERT INTO `tb_cidades` VALUES (5878, 18, 'PR', 'Colonia Padre Paulo');

INSERT INTO `tb_cidades` VALUES (5879, 18, 'PR', 'Colonia Pereira');

INSERT INTO `tb_cidades` VALUES (5880, 18, 'PR', 'Colonia Santos Andrade');

INSERT INTO `tb_cidades` VALUES (5881, 18, 'PR', 'Colonia Sao Jose');

INSERT INTO `tb_cidades` VALUES (5882, 18, 'PR', 'Colonia Sapucai');

INSERT INTO `tb_cidades` VALUES (5883, 18, 'PR', 'Colonia Saude');

INSERT INTO `tb_cidades` VALUES (5884, 18, 'PR', 'Colonia Tapera');

INSERT INTO `tb_cidades` VALUES (5885, 18, 'PR', 'Colorado');

INSERT INTO `tb_cidades` VALUES (5886, 18, 'PR', 'Comur');

INSERT INTO `tb_cidades` VALUES (5887, 18, 'PR', 'Conceicao');

INSERT INTO `tb_cidades` VALUES (5888, 18, 'PR', 'Conchas Velhas');

INSERT INTO `tb_cidades` VALUES (5889, 18, 'PR', 'Conciolandia');

INSERT INTO `tb_cidades` VALUES (5890, 18, 'PR', 'Congonhas');

INSERT INTO `tb_cidades` VALUES (5891, 18, 'PR', 'Congonhinhas');

INSERT INTO `tb_cidades` VALUES (5892, 18, 'PR', 'Conselheiro Mairinck');

INSERT INTO `tb_cidades` VALUES (5893, 18, 'PR', 'Conselheiro Zacarias');

INSERT INTO `tb_cidades` VALUES (5894, 18, 'PR', 'Contenda');

INSERT INTO `tb_cidades` VALUES (5895, 18, 'PR', 'Copacabana do Norte');

INSERT INTO `tb_cidades` VALUES (5896, 18, 'PR', 'Corbelia');

INSERT INTO `tb_cidades` VALUES (5897, 18, 'PR', 'Cornelio Procopio');

INSERT INTO `tb_cidades` VALUES (5898, 18, 'PR', 'Coronel Domingos Soares');

INSERT INTO `tb_cidades` VALUES (5899, 18, 'PR', 'Coronel Firmino Martins');

INSERT INTO `tb_cidades` VALUES (5900, 18, 'PR', 'Coronel Vivida');

INSERT INTO `tb_cidades` VALUES (5901, 18, 'PR', 'Correia de Freitas');

INSERT INTO `tb_cidades` VALUES (5902, 18, 'PR', 'Corumbatai do Sul');

INSERT INTO `tb_cidades` VALUES (5903, 18, 'PR', 'Corvo');

INSERT INTO `tb_cidades` VALUES (5904, 18, 'PR', 'Costeira');

INSERT INTO `tb_cidades` VALUES (5905, 18, 'PR', 'Covo');

INSERT INTO `tb_cidades` VALUES (5906, 18, 'PR', 'Coxilha Rica');

INSERT INTO `tb_cidades` VALUES (5907, 18, 'PR', 'Cristo Rei');

INSERT INTO `tb_cidades` VALUES (5908, 18, 'PR', 'Cruz Machado');

INSERT INTO `tb_cidades` VALUES (5909, 18, 'PR', 'Cruzeiro do Iguacu');

INSERT INTO `tb_cidades` VALUES (5910, 18, 'PR', 'Cruzeiro do Norte');

INSERT INTO `tb_cidades` VALUES (5911, 18, 'PR', 'Cruzeiro do Oeste');

INSERT INTO `tb_cidades` VALUES (5912, 18, 'PR', 'Cruzeiro do Sul');

INSERT INTO `tb_cidades` VALUES (5913, 18, 'PR', 'Cruzmaltina');

INSERT INTO `tb_cidades` VALUES (5914, 18, 'PR', 'Cunhaporanga');

INSERT INTO `tb_cidades` VALUES (5915, 18, 'PR', 'Curitiba');

INSERT INTO `tb_cidades` VALUES (5916, 18, 'PR', 'Curiuva');

INSERT INTO `tb_cidades` VALUES (5917, 18, 'PR', 'Curucaca');

INSERT INTO `tb_cidades` VALUES (5918, 18, 'PR', 'Deputado Jose Afonso');

INSERT INTO `tb_cidades` VALUES (5919, 18, 'PR', 'Despique');

INSERT INTO `tb_cidades` VALUES (5920, 18, 'PR', 'Despraiado');

INSERT INTO `tb_cidades` VALUES (5921, 18, 'PR', 'Dez de Maio');

INSERT INTO `tb_cidades` VALUES (5922, 18, 'PR', 'Diamante');

INSERT INTO `tb_cidades` VALUES (5923, 18, 'PR', 'Diamante D''oeste');

INSERT INTO `tb_cidades` VALUES (5924, 18, 'PR', 'Diamante do Norte');

INSERT INTO `tb_cidades` VALUES (5925, 18, 'PR', 'Diamante do Sul');

INSERT INTO `tb_cidades` VALUES (5926, 18, 'PR', 'Doce Grande');

INSERT INTO `tb_cidades` VALUES (5927, 18, 'PR', 'Dois Irmaos');

INSERT INTO `tb_cidades` VALUES (5928, 18, 'PR', 'Dois Marcos');

INSERT INTO `tb_cidades` VALUES (5929, 18, 'PR', 'Dois Vizinhos');

INSERT INTO `tb_cidades` VALUES (5930, 18, 'PR', 'Dom Rodrigo');

INSERT INTO `tb_cidades` VALUES (5931, 18, 'PR', 'Dorizon');

INSERT INTO `tb_cidades` VALUES (5932, 18, 'PR', 'Douradina');

INSERT INTO `tb_cidades` VALUES (5933, 18, 'PR', 'Doutor Antonio Paranhos');

INSERT INTO `tb_cidades` VALUES (5934, 18, 'PR', 'Doutor Camargo');

INSERT INTO `tb_cidades` VALUES (5935, 18, 'PR', 'Doutor Ernesto');

INSERT INTO `tb_cidades` VALUES (5936, 18, 'PR', 'Doutor Oliveira Castro');

INSERT INTO `tb_cidades` VALUES (5937, 18, 'PR', 'Doutor Ulysses');

INSERT INTO `tb_cidades` VALUES (5938, 18, 'PR', 'Eduardo Xavier da Silva');

INSERT INTO `tb_cidades` VALUES (5939, 18, 'PR', 'Emboguacu');

INSERT INTO `tb_cidades` VALUES (5940, 18, 'PR', 'Emboque');

INSERT INTO `tb_cidades` VALUES (5941, 18, 'PR', 'Encantado D''oeste');

INSERT INTO `tb_cidades` VALUES (5942, 18, 'PR', 'Encruzilhada');

INSERT INTO `tb_cidades` VALUES (5943, 18, 'PR', 'Eneas Marques');

INSERT INTO `tb_cidades` VALUES (5944, 18, 'PR', 'Engenheiro Beltrao');

INSERT INTO `tb_cidades` VALUES (5945, 18, 'PR', 'Entre Rios');

INSERT INTO `tb_cidades` VALUES (5946, 18, 'PR', 'Entre Rios do Oeste');

INSERT INTO `tb_cidades` VALUES (5947, 18, 'PR', 'Esperanca do Norte');

INSERT INTO `tb_cidades` VALUES (5948, 18, 'PR', 'Esperanca Nova');

INSERT INTO `tb_cidades` VALUES (5949, 18, 'PR', 'Espigao Alto do Iguacu');

INSERT INTO `tb_cidades` VALUES (5950, 18, 'PR', 'Espirito Santo');

INSERT INTO `tb_cidades` VALUES (5951, 18, 'PR', 'Estacao General Lucio');

INSERT INTO `tb_cidades` VALUES (5952, 18, 'PR', 'Estacao Roca Nova');

INSERT INTO `tb_cidades` VALUES (5953, 18, 'PR', 'Europa');

INSERT INTO `tb_cidades` VALUES (5954, 18, 'PR', 'Euzebio de Oliveira');

INSERT INTO `tb_cidades` VALUES (5955, 18, 'PR', 'Faisqueira');

INSERT INTO `tb_cidades` VALUES (5956, 18, 'PR', 'Farol');

INSERT INTO `tb_cidades` VALUES (5957, 18, 'PR', 'Faxina');

INSERT INTO `tb_cidades` VALUES (5958, 18, 'PR', 'Faxinal');

INSERT INTO `tb_cidades` VALUES (5959, 18, 'PR', 'Faxinal do Ceu');

INSERT INTO `tb_cidades` VALUES (5960, 18, 'PR', 'Faxinal dos Elias');

INSERT INTO `tb_cidades` VALUES (5961, 18, 'PR', 'Faxinal Santa Cruz');

INSERT INTO `tb_cidades` VALUES (5962, 18, 'PR', 'Fazenda do Brigadeiro');

INSERT INTO `tb_cidades` VALUES (5963, 18, 'PR', 'Fazenda dos Barbosas');

INSERT INTO `tb_cidades` VALUES (5964, 18, 'PR', 'Fazenda Jangada');

INSERT INTO `tb_cidades` VALUES (5965, 18, 'PR', 'Fazenda Rio Grande');

INSERT INTO `tb_cidades` VALUES (5966, 18, 'PR', 'Fazenda Salmo Null');

INSERT INTO `tb_cidades` VALUES (5967, 18, 'PR', 'Fazendinha');

INSERT INTO `tb_cidades` VALUES (5968, 18, 'PR', 'Felpudo');

INSERT INTO `tb_cidades` VALUES (5969, 18, 'PR', 'Fenix');

INSERT INTO `tb_cidades` VALUES (5970, 18, 'PR', 'Fernandes Pinheiro');

INSERT INTO `tb_cidades` VALUES (5971, 18, 'PR', 'Fernao Dias');

INSERT INTO `tb_cidades` VALUES (5972, 18, 'PR', 'Ferraria');

INSERT INTO `tb_cidades` VALUES (5973, 18, 'PR', 'Ferreiras');

INSERT INTO `tb_cidades` VALUES (5974, 18, 'PR', 'Figueira');

INSERT INTO `tb_cidades` VALUES (5975, 18, 'PR', 'Figueira do Oeste');

INSERT INTO `tb_cidades` VALUES (5976, 18, 'PR', 'Fiusas');

INSERT INTO `tb_cidades` VALUES (5977, 18, 'PR', 'Flor da Serra');

INSERT INTO `tb_cidades` VALUES (5978, 18, 'PR', 'Flor da Serra do Sul');

INSERT INTO `tb_cidades` VALUES (5979, 18, 'PR', 'Florai');

INSERT INTO `tb_cidades` VALUES (5980, 18, 'PR', 'Floresta');

INSERT INTO `tb_cidades` VALUES (5981, 18, 'PR', 'Florestopolis');

INSERT INTO `tb_cidades` VALUES (5982, 18, 'PR', 'Floriano');

INSERT INTO `tb_cidades` VALUES (5983, 18, 'PR', 'Florida');

INSERT INTO `tb_cidades` VALUES (5984, 18, 'PR', 'Floropolis');

INSERT INTO `tb_cidades` VALUES (5985, 18, 'PR', 'Fluviopolis');

INSERT INTO `tb_cidades` VALUES (5986, 18, 'PR', 'Formigone');

INSERT INTO `tb_cidades` VALUES (5987, 18, 'PR', 'Formosa do Oeste');

INSERT INTO `tb_cidades` VALUES (5988, 18, 'PR', 'Foz do Iguacu');

INSERT INTO `tb_cidades` VALUES (5989, 18, 'PR', 'Foz do Jordao');

INSERT INTO `tb_cidades` VALUES (5990, 18, 'PR', 'Francisco Alves');

INSERT INTO `tb_cidades` VALUES (5991, 18, 'PR', 'Francisco Beltrao');

INSERT INTO `tb_cidades` VALUES (5992, 18, 'PR', 'Francisco Frederico Teixeira Guimaraes');

INSERT INTO `tb_cidades` VALUES (5993, 18, 'PR', 'Frei Timoteo');

INSERT INTO `tb_cidades` VALUES (5994, 18, 'PR', 'Fueros');

INSERT INTO `tb_cidades` VALUES (5995, 18, 'PR', 'Fundao');

INSERT INTO `tb_cidades` VALUES (5996, 18, 'PR', 'Gamadinho');

INSERT INTO `tb_cidades` VALUES (5997, 18, 'PR', 'Gamela');

INSERT INTO `tb_cidades` VALUES (5998, 18, 'PR', 'Gaucha');

INSERT INTO `tb_cidades` VALUES (5999, 18, 'PR', 'Gaviao');

INSERT INTO `tb_cidades` VALUES (6000, 18, 'PR', 'General Carneiro');

INSERT INTO `tb_cidades` VALUES (6001, 18, 'PR', 'General Osorio');

INSERT INTO `tb_cidades` VALUES (6002, 18, 'PR', 'Geremia Lunardelli');

INSERT INTO `tb_cidades` VALUES (6003, 18, 'PR', 'Godoy Moreira');

INSERT INTO `tb_cidades` VALUES (6004, 18, 'PR', 'Goioere');

INSERT INTO `tb_cidades` VALUES (6005, 18, 'PR', 'Goioxim');

INSERT INTO `tb_cidades` VALUES (6006, 18, 'PR', 'Gois');

INSERT INTO `tb_cidades` VALUES (6007, 18, 'PR', 'Goncalves Junior');

INSERT INTO `tb_cidades` VALUES (6008, 18, 'PR', 'Graciosa');

INSERT INTO `tb_cidades` VALUES (6009, 18, 'PR', 'Grandes Rios');

INSERT INTO `tb_cidades` VALUES (6010, 18, 'PR', 'Guaipora');

INSERT INTO `tb_cidades` VALUES (6011, 18, 'PR', 'Guaira');

INSERT INTO `tb_cidades` VALUES (6012, 18, 'PR', 'Guairaca');

INSERT INTO `tb_cidades` VALUES (6013, 18, 'PR', 'Guajuvira');

INSERT INTO `tb_cidades` VALUES (6014, 18, 'PR', 'Guamiranga');

INSERT INTO `tb_cidades` VALUES (6015, 18, 'PR', 'Guamirim');

INSERT INTO `tb_cidades` VALUES (6016, 18, 'PR', 'Guapirama');

INSERT INTO `tb_cidades` VALUES (6017, 18, 'PR', 'Guapore');

INSERT INTO `tb_cidades` VALUES (6018, 18, 'PR', 'Guaporema');

INSERT INTO `tb_cidades` VALUES (6019, 18, 'PR', 'Guara');

INSERT INTO `tb_cidades` VALUES (6020, 18, 'PR', 'Guaraci');

INSERT INTO `tb_cidades` VALUES (6021, 18, 'PR', 'Guaragi');

INSERT INTO `tb_cidades` VALUES (6022, 18, 'PR', 'Guaraituba');

INSERT INTO `tb_cidades` VALUES (6023, 18, 'PR', 'Guarani');

INSERT INTO `tb_cidades` VALUES (6024, 18, 'PR', 'Guaraniacu');

INSERT INTO `tb_cidades` VALUES (6025, 18, 'PR', 'Guarapuava');

INSERT INTO `tb_cidades` VALUES (6026, 18, 'PR', 'Guarapuavinha');

INSERT INTO `tb_cidades` VALUES (6027, 18, 'PR', 'Guaraquecaba');

INSERT INTO `tb_cidades` VALUES (6028, 18, 'PR', 'Guararema');

INSERT INTO `tb_cidades` VALUES (6029, 18, 'PR', 'Guaratuba');

INSERT INTO `tb_cidades` VALUES (6030, 18, 'PR', 'Guarauna');

INSERT INTO `tb_cidades` VALUES (6031, 18, 'PR', 'Guaravera');

INSERT INTO `tb_cidades` VALUES (6032, 18, 'PR', 'Guardamoria');

INSERT INTO `tb_cidades` VALUES (6033, 18, 'PR', 'Harmonia');

INSERT INTO `tb_cidades` VALUES (6034, 18, 'PR', 'Herculandia');

INSERT INTO `tb_cidades` VALUES (6035, 18, 'PR', 'Herval Grande');

INSERT INTO `tb_cidades` VALUES (6036, 18, 'PR', 'Herveira');

INSERT INTO `tb_cidades` VALUES (6037, 18, 'PR', 'Hidreletrica Itaipu');

INSERT INTO `tb_cidades` VALUES (6038, 18, 'PR', 'Honorio Serpa');

INSERT INTO `tb_cidades` VALUES (6039, 18, 'PR', 'Iarama');

INSERT INTO `tb_cidades` VALUES (6040, 18, 'PR', 'Ibaiti');

INSERT INTO `tb_cidades` VALUES (6041, 18, 'PR', 'Ibema');

INSERT INTO `tb_cidades` VALUES (6042, 18, 'PR', 'Ibiaci');

INSERT INTO `tb_cidades` VALUES (6043, 18, 'PR', 'Ibipora');

INSERT INTO `tb_cidades` VALUES (6044, 18, 'PR', 'Icara');

INSERT INTO `tb_cidades` VALUES (6045, 18, 'PR', 'Icaraima');

INSERT INTO `tb_cidades` VALUES (6046, 18, 'PR', 'Icatu');

INSERT INTO `tb_cidades` VALUES (6047, 18, 'PR', 'Igrejinha');

INSERT INTO `tb_cidades` VALUES (6048, 18, 'PR', 'Iguaracu');

INSERT INTO `tb_cidades` VALUES (6049, 18, 'PR', 'Iguatemi');

INSERT INTO `tb_cidades` VALUES (6050, 18, 'PR', 'Iguatu');

INSERT INTO `tb_cidades` VALUES (6051, 18, 'PR', 'Iguipora');

INSERT INTO `tb_cidades` VALUES (6052, 18, 'PR', 'Ilha do Mel');

INSERT INTO `tb_cidades` VALUES (6053, 18, 'PR', 'Ilha dos Valadares');

INSERT INTO `tb_cidades` VALUES (6054, 18, 'PR', 'Imbau');

INSERT INTO `tb_cidades` VALUES (6055, 18, 'PR', 'Imbauzinho');

INSERT INTO `tb_cidades` VALUES (6056, 18, 'PR', 'Imbituva');

INSERT INTO `tb_cidades` VALUES (6057, 18, 'PR', 'Inacio Martins');

INSERT INTO `tb_cidades` VALUES (6058, 18, 'PR', 'Inaja');

INSERT INTO `tb_cidades` VALUES (6059, 18, 'PR', 'Independencia');

INSERT INTO `tb_cidades` VALUES (6060, 18, 'PR', 'Indianopolis');

INSERT INTO `tb_cidades` VALUES (6061, 18, 'PR', 'Inspetor Carvalho');

INSERT INTO `tb_cidades` VALUES (6062, 18, 'PR', 'Invernada');

INSERT INTO `tb_cidades` VALUES (6063, 18, 'PR', 'Invernadinha');

INSERT INTO `tb_cidades` VALUES (6064, 18, 'PR', 'Iolopolis');

INSERT INTO `tb_cidades` VALUES (6065, 18, 'PR', 'Ipiranga');

INSERT INTO `tb_cidades` VALUES (6066, 18, 'PR', 'Ipora');

INSERT INTO `tb_cidades` VALUES (6067, 18, 'PR', 'Iracema do Oeste');

INSERT INTO `tb_cidades` VALUES (6068, 18, 'PR', 'Irapuan');

INSERT INTO `tb_cidades` VALUES (6069, 18, 'PR', 'Irati');

INSERT INTO `tb_cidades` VALUES (6070, 18, 'PR', 'Irere');

INSERT INTO `tb_cidades` VALUES (6071, 18, 'PR', 'Iretama');

INSERT INTO `tb_cidades` VALUES (6072, 18, 'PR', 'Itaguaje');

INSERT INTO `tb_cidades` VALUES (6073, 18, 'PR', 'Itaiacoca');

INSERT INTO `tb_cidades` VALUES (6074, 18, 'PR', 'Itaipulandia');

INSERT INTO `tb_cidades` VALUES (6075, 18, 'PR', 'Itambaraca');

INSERT INTO `tb_cidades` VALUES (6076, 18, 'PR', 'Itambe');

INSERT INTO `tb_cidades` VALUES (6077, 18, 'PR', 'Itapanhacanga');

INSERT INTO `tb_cidades` VALUES (6078, 18, 'PR', 'Itapara');

INSERT INTO `tb_cidades` VALUES (6079, 18, 'PR', 'Itapejara D''oeste');

INSERT INTO `tb_cidades` VALUES (6080, 18, 'PR', 'Itaperucu');

INSERT INTO `tb_cidades` VALUES (6081, 18, 'PR', 'Itaqui');

INSERT INTO `tb_cidades` VALUES (6082, 18, 'PR', 'Itauna do Sul');

INSERT INTO `tb_cidades` VALUES (6083, 18, 'PR', 'Itinga');

INSERT INTO `tb_cidades` VALUES (6084, 18, 'PR', 'Ivai');

INSERT INTO `tb_cidades` VALUES (6085, 18, 'PR', 'Ivailandia');

INSERT INTO `tb_cidades` VALUES (6086, 18, 'PR', 'Ivaipora');

INSERT INTO `tb_cidades` VALUES (6087, 18, 'PR', 'Ivaitinga');

INSERT INTO `tb_cidades` VALUES (6088, 18, 'PR', 'Ivate');

INSERT INTO `tb_cidades` VALUES (6089, 18, 'PR', 'Ivatuba');

INSERT INTO `tb_cidades` VALUES (6090, 18, 'PR', 'Jaborandi');

INSERT INTO `tb_cidades` VALUES (6091, 18, 'PR', 'Jaboti');

INSERT INTO `tb_cidades` VALUES (6092, 18, 'PR', 'Jaboticabal');

INSERT INTO `tb_cidades` VALUES (6093, 18, 'PR', 'Jaburu');

INSERT INTO `tb_cidades` VALUES (6094, 18, 'PR', 'Jacare');

INSERT INTO `tb_cidades` VALUES (6095, 18, 'PR', 'Jacarezinho');

INSERT INTO `tb_cidades` VALUES (6096, 18, 'PR', 'Jaciaba');

INSERT INTO `tb_cidades` VALUES (6097, 18, 'PR', 'Jacutinga');

INSERT INTO `tb_cidades` VALUES (6098, 18, 'PR', 'Jaguapita');

INSERT INTO `tb_cidades` VALUES (6099, 18, 'PR', 'Jaguariaiva');

INSERT INTO `tb_cidades` VALUES (6100, 18, 'PR', 'Jandaia do Sul');

INSERT INTO `tb_cidades` VALUES (6101, 18, 'PR', 'Jangada');

INSERT INTO `tb_cidades` VALUES (6102, 18, 'PR', 'Jangada do Sul');

INSERT INTO `tb_cidades` VALUES (6103, 18, 'PR', 'Janiopolis');

INSERT INTO `tb_cidades` VALUES (6104, 18, 'PR', 'Japira');

INSERT INTO `tb_cidades` VALUES (6105, 18, 'PR', 'Japura');

INSERT INTO `tb_cidades` VALUES (6106, 18, 'PR', 'Jaracatia');

INSERT INTO `tb_cidades` VALUES (6107, 18, 'PR', 'Jardim');

INSERT INTO `tb_cidades` VALUES (6108, 18, 'PR', 'Jardim Alegre');

INSERT INTO `tb_cidades` VALUES (6109, 18, 'PR', 'Jardim Olinda');

INSERT INTO `tb_cidades` VALUES (6110, 18, 'PR', 'Jardim Paredao');

INSERT INTO `tb_cidades` VALUES (6111, 18, 'PR', 'Jardim Paulista');

INSERT INTO `tb_cidades` VALUES (6112, 18, 'PR', 'Jardinopolis');

INSERT INTO `tb_cidades` VALUES (6113, 18, 'PR', 'Jataizinho');

INSERT INTO `tb_cidades` VALUES (6114, 18, 'PR', 'Javacae');

INSERT INTO `tb_cidades` VALUES (6115, 18, 'PR', 'Jesuitas');

INSERT INTO `tb_cidades` VALUES (6116, 18, 'PR', 'Joa');

INSERT INTO `tb_cidades` VALUES (6117, 18, 'PR', 'Joaquim Tavora');

INSERT INTO `tb_cidades` VALUES (6118, 18, 'PR', 'Jordaozinho');

INSERT INTO `tb_cidades` VALUES (6119, 18, 'PR', 'Jose Lacerda');

INSERT INTO `tb_cidades` VALUES (6120, 18, 'PR', 'Juciara');

INSERT INTO `tb_cidades` VALUES (6121, 18, 'PR', 'Jundiai do Sul');

INSERT INTO `tb_cidades` VALUES (6122, 18, 'PR', 'Juranda');

INSERT INTO `tb_cidades` VALUES (6123, 18, 'PR', 'Jussara');

INSERT INTO `tb_cidades` VALUES (6124, 18, 'PR', 'Juvinopolis');

INSERT INTO `tb_cidades` VALUES (6125, 18, 'PR', 'Kalore');

INSERT INTO `tb_cidades` VALUES (6126, 18, 'PR', 'Km Null');

INSERT INTO `tb_cidades` VALUES (6127, 18, 'PR', 'Lagoa');

INSERT INTO `tb_cidades` VALUES (6128, 18, 'PR', 'Lagoa Bonita');

INSERT INTO `tb_cidades` VALUES (6129, 18, 'PR', 'Lagoa dos Ribas');

INSERT INTO `tb_cidades` VALUES (6130, 18, 'PR', 'Lagoa Dourada');

INSERT INTO `tb_cidades` VALUES (6131, 18, 'PR', 'Lagoa Seca');

INSERT INTO `tb_cidades` VALUES (6132, 18, 'PR', 'Lagoa Verde');

INSERT INTO `tb_cidades` VALUES (6133, 18, 'PR', 'Lagoinha');

INSERT INTO `tb_cidades` VALUES (6134, 18, 'PR', 'Lajeado');

INSERT INTO `tb_cidades` VALUES (6135, 18, 'PR', 'Lajeado Bonito');

INSERT INTO `tb_cidades` VALUES (6136, 18, 'PR', 'Lajeado Grande');

INSERT INTO `tb_cidades` VALUES (6137, 18, 'PR', 'Lambari');

INSERT INTO `tb_cidades` VALUES (6138, 18, 'PR', 'Lapa');

INSERT INTO `tb_cidades` VALUES (6139, 18, 'PR', 'Laranja Azeda');

INSERT INTO `tb_cidades` VALUES (6140, 18, 'PR', 'Laranjal');

INSERT INTO `tb_cidades` VALUES (6141, 18, 'PR', 'Laranjeiras do Sul');

INSERT INTO `tb_cidades` VALUES (6142, 18, 'PR', 'Lavra');

INSERT INTO `tb_cidades` VALUES (6143, 18, 'PR', 'Lavrinha');

INSERT INTO `tb_cidades` VALUES (6144, 18, 'PR', 'Leopolis');

INSERT INTO `tb_cidades` VALUES (6145, 18, 'PR', 'Lerroville');

INSERT INTO `tb_cidades` VALUES (6146, 18, 'PR', 'Lidianopolis');

INSERT INTO `tb_cidades` VALUES (6147, 18, 'PR', 'Lindoeste');

INSERT INTO `tb_cidades` VALUES (6148, 18, 'PR', 'Linha Giacomini');

INSERT INTO `tb_cidades` VALUES (6149, 18, 'PR', 'Loanda');

INSERT INTO `tb_cidades` VALUES (6150, 18, 'PR', 'Lobato');

INSERT INTO `tb_cidades` VALUES (6151, 18, 'PR', 'Londrina');

INSERT INTO `tb_cidades` VALUES (6152, 18, 'PR', 'Lopei');

INSERT INTO `tb_cidades` VALUES (6153, 18, 'PR', 'Lovat');

INSERT INTO `tb_cidades` VALUES (6154, 18, 'PR', 'Luar');

INSERT INTO `tb_cidades` VALUES (6155, 18, 'PR', 'Luiziana');

INSERT INTO `tb_cidades` VALUES (6156, 18, 'PR', 'Lunardelli');

INSERT INTO `tb_cidades` VALUES (6157, 18, 'PR', 'Lupionopolis');

INSERT INTO `tb_cidades` VALUES (6158, 18, 'PR', 'Macaco');

INSERT INTO `tb_cidades` VALUES (6159, 18, 'PR', 'Macucos');

INSERT INTO `tb_cidades` VALUES (6160, 18, 'PR', 'Maira');

INSERT INTO `tb_cidades` VALUES (6161, 18, 'PR', 'Maita');

INSERT INTO `tb_cidades` VALUES (6162, 18, 'PR', 'Mallet');

INSERT INTO `tb_cidades` VALUES (6163, 18, 'PR', 'Malu');

INSERT INTO `tb_cidades` VALUES (6164, 18, 'PR', 'Mambore');

INSERT INTO `tb_cidades` VALUES (6165, 18, 'PR', 'Mandacaia');

INSERT INTO `tb_cidades` VALUES (6166, 18, 'PR', 'Mandaguacu');

INSERT INTO `tb_cidades` VALUES (6167, 18, 'PR', 'Mandaguari');

INSERT INTO `tb_cidades` VALUES (6168, 18, 'PR', 'Mandiocaba');

INSERT INTO `tb_cidades` VALUES (6169, 18, 'PR', 'Mandirituba');

INSERT INTO `tb_cidades` VALUES (6170, 18, 'PR', 'Manfrinopolis');

INSERT INTO `tb_cidades` VALUES (6171, 18, 'PR', 'Mangueirinha');

INSERT INTO `tb_cidades` VALUES (6172, 18, 'PR', 'Manoel Ribas');

INSERT INTO `tb_cidades` VALUES (6173, 18, 'PR', 'Maraba');

INSERT INTO `tb_cidades` VALUES (6174, 18, 'PR', 'Maracana');

INSERT INTO `tb_cidades` VALUES (6175, 18, 'PR', 'Marajo');

INSERT INTO `tb_cidades` VALUES (6176, 18, 'PR', 'Maravilha');

INSERT INTO `tb_cidades` VALUES (6177, 18, 'PR', 'Marcelino');

INSERT INTO `tb_cidades` VALUES (6178, 18, 'PR', 'Marcionopolis');

INSERT INTO `tb_cidades` VALUES (6179, 18, 'PR', 'Marechal Candido Rondon');

INSERT INTO `tb_cidades` VALUES (6180, 18, 'PR', 'Margarida');

INSERT INTO `tb_cidades` VALUES (6181, 18, 'PR', 'Maria Helena');

INSERT INTO `tb_cidades` VALUES (6182, 18, 'PR', 'Maria Luiza');

INSERT INTO `tb_cidades` VALUES (6183, 18, 'PR', 'Marialva');

INSERT INTO `tb_cidades` VALUES (6184, 18, 'PR', 'Mariental');

INSERT INTO `tb_cidades` VALUES (6185, 18, 'PR', 'Marilandia do Sul');

INSERT INTO `tb_cidades` VALUES (6186, 18, 'PR', 'Marilena');

INSERT INTO `tb_cidades` VALUES (6187, 18, 'PR', 'Marilu');

INSERT INTO `tb_cidades` VALUES (6188, 18, 'PR', 'Mariluz');

INSERT INTO `tb_cidades` VALUES (6189, 18, 'PR', 'Marimbondo');

INSERT INTO `tb_cidades` VALUES (6190, 18, 'PR', 'Maringa');

INSERT INTO `tb_cidades` VALUES (6191, 18, 'PR', 'Mariopolis');

INSERT INTO `tb_cidades` VALUES (6192, 18, 'PR', 'Maripa');

INSERT INTO `tb_cidades` VALUES (6193, 18, 'PR', 'Maristela');

INSERT INTO `tb_cidades` VALUES (6194, 18, 'PR', 'Mariza');

INSERT INTO `tb_cidades` VALUES (6195, 18, 'PR', 'Marmelandia');

INSERT INTO `tb_cidades` VALUES (6196, 18, 'PR', 'Marmeleiro');

INSERT INTO `tb_cidades` VALUES (6197, 18, 'PR', 'Marques de Abrantes');

INSERT INTO `tb_cidades` VALUES (6198, 18, 'PR', 'Marquinho');

INSERT INTO `tb_cidades` VALUES (6199, 18, 'PR', 'Marrecas');

INSERT INTO `tb_cidades` VALUES (6200, 18, 'PR', 'Martins');

INSERT INTO `tb_cidades` VALUES (6201, 18, 'PR', 'Marumbi');

INSERT INTO `tb_cidades` VALUES (6202, 18, 'PR', 'Matelandia');

INSERT INTO `tb_cidades` VALUES (6203, 18, 'PR', 'Matinhos');

INSERT INTO `tb_cidades` VALUES (6204, 18, 'PR', 'Mato Queimado');

INSERT INTO `tb_cidades` VALUES (6205, 18, 'PR', 'Mato Rico');

INSERT INTO `tb_cidades` VALUES (6206, 18, 'PR', 'Maua da Serra');

INSERT INTO `tb_cidades` VALUES (6207, 18, 'PR', 'Medianeira');

INSERT INTO `tb_cidades` VALUES (6208, 18, 'PR', 'Meia-lua');

INSERT INTO `tb_cidades` VALUES (6209, 18, 'PR', 'Memoria');

INSERT INTO `tb_cidades` VALUES (6210, 18, 'PR', 'Mendeslandia');

INSERT INTO `tb_cidades` VALUES (6211, 18, 'PR', 'Mercedes');

INSERT INTO `tb_cidades` VALUES (6212, 18, 'PR', 'Mirador');

INSERT INTO `tb_cidades` VALUES (6213, 18, 'PR', 'Miranda');

INSERT INTO `tb_cidades` VALUES (6214, 18, 'PR', 'Mirante do Piquiri');

INSERT INTO `tb_cidades` VALUES (6215, 18, 'PR', 'Miraselva');

INSERT INTO `tb_cidades` VALUES (6216, 18, 'PR', 'Missal');

INSERT INTO `tb_cidades` VALUES (6217, 18, 'PR', 'Monjolinho');

INSERT INTO `tb_cidades` VALUES (6218, 18, 'PR', 'Monte Real');

INSERT INTO `tb_cidades` VALUES (6219, 18, 'PR', 'Moreira Sales');

INSERT INTO `tb_cidades` VALUES (6220, 18, 'PR', 'Morretes');

INSERT INTO `tb_cidades` VALUES (6221, 18, 'PR', 'Morro Alto');

INSERT INTO `tb_cidades` VALUES (6222, 18, 'PR', 'Morro Ingles');

INSERT INTO `tb_cidades` VALUES (6223, 18, 'PR', 'Munhoz de Melo');

INSERT INTO `tb_cidades` VALUES (6224, 18, 'PR', 'Natingui');

INSERT INTO `tb_cidades` VALUES (6225, 18, 'PR', 'Nilza');

INSERT INTO `tb_cidades` VALUES (6226, 18, 'PR', 'Nordestina');

INSERT INTO `tb_cidades` VALUES (6227, 18, 'PR', 'Nossa Senhora Aparecida');

INSERT INTO `tb_cidades` VALUES (6228, 18, 'PR', 'Nossa Senhora da Aparecida');

INSERT INTO `tb_cidades` VALUES (6229, 18, 'PR', 'Nossa Senhora da Candelaria');

INSERT INTO `tb_cidades` VALUES (6230, 18, 'PR', 'Nossa Senhora das Gracas');

INSERT INTO `tb_cidades` VALUES (6231, 18, 'PR', 'Nossa Senhora de Lourdes');

INSERT INTO `tb_cidades` VALUES (6232, 18, 'PR', 'Nossa Senhora do Carmo');

INSERT INTO `tb_cidades` VALUES (6233, 18, 'PR', 'Nova Alianca do Ivai');

INSERT INTO `tb_cidades` VALUES (6234, 18, 'PR', 'Nova Altamira');

INSERT INTO `tb_cidades` VALUES (6235, 18, 'PR', 'Nova America da Colina');

INSERT INTO `tb_cidades` VALUES (6236, 18, 'PR', 'Nova Amoreira');

INSERT INTO `tb_cidades` VALUES (6237, 18, 'PR', 'Nova Aurora');

INSERT INTO `tb_cidades` VALUES (6238, 18, 'PR', 'Nova Bilac');

INSERT INTO `tb_cidades` VALUES (6239, 18, 'PR', 'Nova Brasilia');

INSERT INTO `tb_cidades` VALUES (6240, 18, 'PR', 'Nova Brasilia do Itarare');

INSERT INTO `tb_cidades` VALUES (6241, 18, 'PR', 'Nova Cantu');

INSERT INTO `tb_cidades` VALUES (6242, 18, 'PR', 'Nova Concordia');

INSERT INTO `tb_cidades` VALUES (6243, 18, 'PR', 'Nova Esperanca');

INSERT INTO `tb_cidades` VALUES (6244, 18, 'PR', 'Nova Esperanca do Sudoeste');

INSERT INTO `tb_cidades` VALUES (6245, 18, 'PR', 'Nova Fatima');

INSERT INTO `tb_cidades` VALUES (6246, 18, 'PR', 'Nova Laranjeiras');

INSERT INTO `tb_cidades` VALUES (6247, 18, 'PR', 'Nova Londrina');

INSERT INTO `tb_cidades` VALUES (6248, 18, 'PR', 'Nova Lourdes');

INSERT INTO `tb_cidades` VALUES (6249, 18, 'PR', 'Nova Olimpia');

INSERT INTO `tb_cidades` VALUES (6250, 18, 'PR', 'Nova Prata do Iguacu');

INSERT INTO `tb_cidades` VALUES (6251, 18, 'PR', 'Nova Riqueza');

INSERT INTO `tb_cidades` VALUES (6252, 18, 'PR', 'Nova Santa Barbara');

INSERT INTO `tb_cidades` VALUES (6253, 18, 'PR', 'Nova Santa Rosa');

INSERT INTO `tb_cidades` VALUES (6254, 18, 'PR', 'Nova Tebas');

INSERT INTO `tb_cidades` VALUES (6255, 18, 'PR', 'Nova Tirol');

INSERT INTO `tb_cidades` VALUES (6256, 18, 'PR', 'Nova Videira');

INSERT INTO `tb_cidades` VALUES (6257, 18, 'PR', 'Novo Horizonte');

INSERT INTO `tb_cidades` VALUES (6258, 18, 'PR', 'Novo Itacolomi');

INSERT INTO `tb_cidades` VALUES (6259, 18, 'PR', 'Novo Jardim');

INSERT INTO `tb_cidades` VALUES (6260, 18, 'PR', 'Novo Sarandi');

INSERT INTO `tb_cidades` VALUES (6261, 18, 'PR', 'Novo Sobradinho');

INSERT INTO `tb_cidades` VALUES (6262, 18, 'PR', 'Novo Tres Passos');

INSERT INTO `tb_cidades` VALUES (6263, 18, 'PR', 'Olaria');

INSERT INTO `tb_cidades` VALUES (6264, 18, 'PR', 'Olho Agudo');

INSERT INTO `tb_cidades` VALUES (6265, 18, 'PR', 'Olho D''agua');

INSERT INTO `tb_cidades` VALUES (6266, 18, 'PR', 'Oroite');

INSERT INTO `tb_cidades` VALUES (6267, 18, 'PR', 'Ortigueira');

INSERT INTO `tb_cidades` VALUES (6268, 18, 'PR', 'Ourilandia');

INSERT INTO `tb_cidades` VALUES (6269, 18, 'PR', 'Ourizona');

INSERT INTO `tb_cidades` VALUES (6270, 18, 'PR', 'Ouro Verde do Oeste');

INSERT INTO `tb_cidades` VALUES (6271, 18, 'PR', 'Ouro Verde do Piquiri');

INSERT INTO `tb_cidades` VALUES (6272, 18, 'PR', 'Padre Ponciano');

INSERT INTO `tb_cidades` VALUES (6273, 18, 'PR', 'Paicandu');

INSERT INTO `tb_cidades` VALUES (6274, 18, 'PR', 'Paiol de Baixo');

INSERT INTO `tb_cidades` VALUES (6275, 18, 'PR', 'Paiol Queimado');

INSERT INTO `tb_cidades` VALUES (6276, 18, 'PR', 'Paiquere');

INSERT INTO `tb_cidades` VALUES (6277, 18, 'PR', 'Palmas');

INSERT INTO `tb_cidades` VALUES (6278, 18, 'PR', 'Palmeira');

INSERT INTO `tb_cidades` VALUES (6279, 18, 'PR', 'Palmeirinha');

INSERT INTO `tb_cidades` VALUES (6280, 18, 'PR', 'Palmira');

INSERT INTO `tb_cidades` VALUES (6281, 18, 'PR', 'Palmital');

INSERT INTO `tb_cidades` VALUES (6282, 18, 'PR', 'Palmital de Sao Silvestre');

INSERT INTO `tb_cidades` VALUES (6283, 18, 'PR', 'Palmitopolis');

INSERT INTO `tb_cidades` VALUES (6284, 18, 'PR', 'Palotina');

INSERT INTO `tb_cidades` VALUES (6285, 18, 'PR', 'Panema');

INSERT INTO `tb_cidades` VALUES (6286, 18, 'PR', 'Pangare');

INSERT INTO `tb_cidades` VALUES (6287, 18, 'PR', 'Papagaios Novos');

INSERT INTO `tb_cidades` VALUES (6288, 18, 'PR', 'Paraiso do Norte');

INSERT INTO `tb_cidades` VALUES (6289, 18, 'PR', 'Parana D''oeste');

INSERT INTO `tb_cidades` VALUES (6290, 18, 'PR', 'Paranacity');

INSERT INTO `tb_cidades` VALUES (6291, 18, 'PR', 'Paranagi');

INSERT INTO `tb_cidades` VALUES (6292, 18, 'PR', 'Paranagua');

INSERT INTO `tb_cidades` VALUES (6293, 18, 'PR', 'Paranapoema');

INSERT INTO `tb_cidades` VALUES (6294, 18, 'PR', 'Paranavai');

INSERT INTO `tb_cidades` VALUES (6295, 18, 'PR', 'Passa Una');

INSERT INTO `tb_cidades` VALUES (6296, 18, 'PR', 'Passo da Ilha');

INSERT INTO `tb_cidades` VALUES (6297, 18, 'PR', 'Passo dos Pupos');

INSERT INTO `tb_cidades` VALUES (6298, 18, 'PR', 'Passo Fundo');

INSERT INTO `tb_cidades` VALUES (6299, 18, 'PR', 'Passo Liso');

INSERT INTO `tb_cidades` VALUES (6300, 18, 'PR', 'Pato Bragado');

INSERT INTO `tb_cidades` VALUES (6301, 18, 'PR', 'Pato Branco');

INSERT INTO `tb_cidades` VALUES (6302, 18, 'PR', 'Patos Velhos');

INSERT INTO `tb_cidades` VALUES (6303, 18, 'PR', 'Pau D''alho Do Sul');

INSERT INTO `tb_cidades` VALUES (6304, 18, 'PR', 'Paula Freitas');

INSERT INTO `tb_cidades` VALUES (6305, 18, 'PR', 'Paulistania');

INSERT INTO `tb_cidades` VALUES (6306, 18, 'PR', 'Paulo Frontin');

INSERT INTO `tb_cidades` VALUES (6307, 18, 'PR', 'Peabiru');

INSERT INTO `tb_cidades` VALUES (6308, 18, 'PR', 'Pedra Branca do Araraquara');

INSERT INTO `tb_cidades` VALUES (6309, 18, 'PR', 'Pedras');

INSERT INTO `tb_cidades` VALUES (6310, 18, 'PR', 'Pedro Lustosa');

INSERT INTO `tb_cidades` VALUES (6311, 18, 'PR', 'Pelado');

INSERT INTO `tb_cidades` VALUES (6312, 18, 'PR', 'Perobal');

INSERT INTO `tb_cidades` VALUES (6313, 18, 'PR', 'Perola');

INSERT INTO `tb_cidades` VALUES (6314, 18, 'PR', 'Perola do Oeste');

INSERT INTO `tb_cidades` VALUES (6315, 18, 'PR', 'Perola Independente');

INSERT INTO `tb_cidades` VALUES (6316, 18, 'PR', 'Piassuguera');

INSERT INTO `tb_cidades` VALUES (6317, 18, 'PR', 'Pien');

INSERT INTO `tb_cidades` VALUES (6318, 18, 'PR', 'Pinare');

INSERT INTO `tb_cidades` VALUES (6319, 18, 'PR', 'Pinhais');

INSERT INTO `tb_cidades` VALUES (6320, 18, 'PR', 'Pinhal do Sao Bento');

INSERT INTO `tb_cidades` VALUES (6321, 18, 'PR', 'Pinhal Preto');

INSERT INTO `tb_cidades` VALUES (6322, 18, 'PR', 'Pinhalao');

INSERT INTO `tb_cidades` VALUES (6323, 18, 'PR', 'Pinhalzinho');

INSERT INTO `tb_cidades` VALUES (6324, 18, 'PR', 'Pinhao');

INSERT INTO `tb_cidades` VALUES (6325, 18, 'PR', 'Pinheiro');

INSERT INTO `tb_cidades` VALUES (6326, 18, 'PR', 'Piquirivai');

INSERT INTO `tb_cidades` VALUES (6327, 18, 'PR', 'Piracema');

INSERT INTO `tb_cidades` VALUES (6328, 18, 'PR', 'Pirai do Sul');

INSERT INTO `tb_cidades` VALUES (6329, 18, 'PR', 'Pirapo');

INSERT INTO `tb_cidades` VALUES (6330, 18, 'PR', 'Piraquara');

INSERT INTO `tb_cidades` VALUES (6331, 18, 'PR', 'Piriquitos');

INSERT INTO `tb_cidades` VALUES (6332, 18, 'PR', 'Pitanga');

INSERT INTO `tb_cidades` VALUES (6333, 18, 'PR', 'Pitangueiras');

INSERT INTO `tb_cidades` VALUES (6334, 18, 'PR', 'Pitangui');

INSERT INTO `tb_cidades` VALUES (6335, 18, 'PR', 'Planaltina do Parana');

INSERT INTO `tb_cidades` VALUES (6336, 18, 'PR', 'Planalto');

INSERT INTO `tb_cidades` VALUES (6337, 18, 'PR', 'Pocinho');

INSERT INTO `tb_cidades` VALUES (6338, 18, 'PR', 'Poema');

INSERT INTO `tb_cidades` VALUES (6339, 18, 'PR', 'Ponta do Pasto');

INSERT INTO `tb_cidades` VALUES (6340, 18, 'PR', 'Ponta Grossa');

INSERT INTO `tb_cidades` VALUES (6341, 18, 'PR', 'Pontal do Parana');

INSERT INTO `tb_cidades` VALUES (6342, 18, 'PR', 'Porecatu');

INSERT INTO `tb_cidades` VALUES (6343, 18, 'PR', 'Portao');

INSERT INTO `tb_cidades` VALUES (6344, 18, 'PR', 'Porteira Preta');

INSERT INTO `tb_cidades` VALUES (6345, 18, 'PR', 'Porto Amazonas');

INSERT INTO `tb_cidades` VALUES (6346, 18, 'PR', 'Porto Barreiro');

INSERT INTO `tb_cidades` VALUES (6347, 18, 'PR', 'Porto Belo');

INSERT INTO `tb_cidades` VALUES (6348, 18, 'PR', 'Porto Brasilio');

INSERT INTO `tb_cidades` VALUES (6349, 18, 'PR', 'Porto Camargo');

INSERT INTO `tb_cidades` VALUES (6350, 18, 'PR', 'Porto de Cima');

INSERT INTO `tb_cidades` VALUES (6351, 18, 'PR', 'Porto Meira');

INSERT INTO `tb_cidades` VALUES (6352, 18, 'PR', 'Porto Mendes');

INSERT INTO `tb_cidades` VALUES (6353, 18, 'PR', 'Porto Rico');

INSERT INTO `tb_cidades` VALUES (6354, 18, 'PR', 'Porto San Juan');

INSERT INTO `tb_cidades` VALUES (6355, 18, 'PR', 'Porto Santana');

INSERT INTO `tb_cidades` VALUES (6356, 18, 'PR', 'Porto Sao Carlos');

INSERT INTO `tb_cidades` VALUES (6357, 18, 'PR', 'Porto Sao Jose');

INSERT INTO `tb_cidades` VALUES (6358, 18, 'PR', 'Porto Vitoria');

INSERT INTO `tb_cidades` VALUES (6359, 18, 'PR', 'Prado Ferreira');

INSERT INTO `tb_cidades` VALUES (6360, 18, 'PR', 'Pranchita');

INSERT INTO `tb_cidades` VALUES (6361, 18, 'PR', 'Prata');

INSERT INTO `tb_cidades` VALUES (6362, 18, 'PR', 'Prata Um');

INSERT INTO `tb_cidades` VALUES (6363, 18, 'PR', 'Presidente Castelo Branco');

INSERT INTO `tb_cidades` VALUES (6364, 18, 'PR', 'Presidente Kennedy');

INSERT INTO `tb_cidades` VALUES (6365, 18, 'PR', 'Primeiro de Maio');

INSERT INTO `tb_cidades` VALUES (6366, 18, 'PR', 'Progresso');

INSERT INTO `tb_cidades` VALUES (6367, 18, 'PR', 'Prudentopolis');

INSERT INTO `tb_cidades` VALUES (6368, 18, 'PR', 'Pulinopolis');

INSERT INTO `tb_cidades` VALUES (6369, 18, 'PR', 'Quatigua');

INSERT INTO `tb_cidades` VALUES (6370, 18, 'PR', 'Quatro Barras');

INSERT INTO `tb_cidades` VALUES (6371, 18, 'PR', 'Quatro Pontes');

INSERT INTO `tb_cidades` VALUES (6372, 18, 'PR', 'Quebra Freio');

INSERT INTO `tb_cidades` VALUES (6373, 18, 'PR', 'Quedas do Iguacu');

INSERT INTO `tb_cidades` VALUES (6374, 18, 'PR', 'Queimados');

INSERT INTO `tb_cidades` VALUES (6375, 18, 'PR', 'Querencia do Norte');

INSERT INTO `tb_cidades` VALUES (6376, 18, 'PR', 'Quinta do Sol');

INSERT INTO `tb_cidades` VALUES (6377, 18, 'PR', 'Quinzopolis');

INSERT INTO `tb_cidades` VALUES (6378, 18, 'PR', 'Quitandinha');

INSERT INTO `tb_cidades` VALUES (6379, 18, 'PR', 'Ramilandia');

INSERT INTO `tb_cidades` VALUES (6380, 18, 'PR', 'Rancho Alegre');

INSERT INTO `tb_cidades` VALUES (6381, 18, 'PR', 'Rancho Alegre D''oeste');

INSERT INTO `tb_cidades` VALUES (6382, 18, 'PR', 'Realeza');

INSERT INTO `tb_cidades` VALUES (6383, 18, 'PR', 'Reboucas');

INSERT INTO `tb_cidades` VALUES (6384, 18, 'PR', 'Regiao dos Valos');

INSERT INTO `tb_cidades` VALUES (6385, 18, 'PR', 'Reianopolis');

INSERT INTO `tb_cidades` VALUES (6386, 18, 'PR', 'Renascenca');

INSERT INTO `tb_cidades` VALUES (6387, 18, 'PR', 'Reserva');

INSERT INTO `tb_cidades` VALUES (6388, 18, 'PR', 'Reserva do Iguacu');

INSERT INTO `tb_cidades` VALUES (6389, 18, 'PR', 'Retiro');

INSERT INTO `tb_cidades` VALUES (6390, 18, 'PR', 'Retiro Grande');

INSERT INTO `tb_cidades` VALUES (6391, 18, 'PR', 'Ribeirao Bonito');

INSERT INTO `tb_cidades` VALUES (6392, 18, 'PR', 'Ribeirao Claro');

INSERT INTO `tb_cidades` VALUES (6393, 18, 'PR', 'Ribeirao do Pinhal');

INSERT INTO `tb_cidades` VALUES (6394, 18, 'PR', 'Ribeirao do Pinheiro');

INSERT INTO `tb_cidades` VALUES (6395, 18, 'PR', 'Rio Abaixo');

INSERT INTO `tb_cidades` VALUES (6396, 18, 'PR', 'Rio Azul');

INSERT INTO `tb_cidades` VALUES (6397, 18, 'PR', 'Rio Bom');

INSERT INTO `tb_cidades` VALUES (6398, 18, 'PR', 'Rio Bonito');

INSERT INTO `tb_cidades` VALUES (6399, 18, 'PR', 'Rio Bonito do Iguacu');

INSERT INTO `tb_cidades` VALUES (6400, 18, 'PR', 'Rio Branco do Ivai');

INSERT INTO `tb_cidades` VALUES (6401, 18, 'PR', 'Rio Branco do Sul');

INSERT INTO `tb_cidades` VALUES (6402, 18, 'PR', 'Rio Claro do Sul');

INSERT INTO `tb_cidades` VALUES (6403, 18, 'PR', 'Rio da Prata');

INSERT INTO `tb_cidades` VALUES (6404, 18, 'PR', 'Rio das Antas');

INSERT INTO `tb_cidades` VALUES (6405, 18, 'PR', 'Rio das Mortes');

INSERT INTO `tb_cidades` VALUES (6406, 18, 'PR', 'Rio das Pedras');

INSERT INTO `tb_cidades` VALUES (6407, 18, 'PR', 'Rio das Pombas');

INSERT INTO `tb_cidades` VALUES (6408, 18, 'PR', 'Rio do Mato');

INSERT INTO `tb_cidades` VALUES (6409, 18, 'PR', 'Rio do Salto');

INSERT INTO `tb_cidades` VALUES (6410, 18, 'PR', 'Rio Negro');

INSERT INTO `tb_cidades` VALUES (6411, 18, 'PR', 'Rio Novo');

INSERT INTO `tb_cidades` VALUES (6412, 18, 'PR', 'Rio Pinheiro');

INSERT INTO `tb_cidades` VALUES (6413, 18, 'PR', 'Rio Quatorze');

INSERT INTO `tb_cidades` VALUES (6414, 18, 'PR', 'Rio Saltinho');

INSERT INTO `tb_cidades` VALUES (6415, 18, 'PR', 'Rio Saudade');

INSERT INTO `tb_cidades` VALUES (6416, 18, 'PR', 'Rio Verde');

INSERT INTO `tb_cidades` VALUES (6417, 18, 'PR', 'Roberto Silveira');

INSERT INTO `tb_cidades` VALUES (6418, 18, 'PR', 'Roca Velha');

INSERT INTO `tb_cidades` VALUES (6419, 18, 'PR', 'Rolandia');

INSERT INTO `tb_cidades` VALUES (6420, 18, 'PR', 'Romeopolis');

INSERT INTO `tb_cidades` VALUES (6421, 18, 'PR', 'Roncador');

INSERT INTO `tb_cidades` VALUES (6422, 18, 'PR', 'Rondinha');

INSERT INTO `tb_cidades` VALUES (6423, 18, 'PR', 'Rondon');

INSERT INTO `tb_cidades` VALUES (6424, 18, 'PR', 'Rosario do Ivai');

INSERT INTO `tb_cidades` VALUES (6425, 18, 'PR', 'Sabaudia');

INSERT INTO `tb_cidades` VALUES (6426, 18, 'PR', 'Sagrada Familia');

INSERT INTO `tb_cidades` VALUES (6427, 18, 'PR', 'Salgado Filho');

INSERT INTO `tb_cidades` VALUES (6428, 18, 'PR', 'Salles de Oliveira');

INSERT INTO `tb_cidades` VALUES (6429, 18, 'PR', 'Saltinho do Oeste');

INSERT INTO `tb_cidades` VALUES (6430, 18, 'PR', 'Salto do Itarare');

INSERT INTO `tb_cidades` VALUES (6431, 18, 'PR', 'Salto do Lontra');

INSERT INTO `tb_cidades` VALUES (6432, 18, 'PR', 'Salto Portao');

INSERT INTO `tb_cidades` VALUES (6433, 18, 'PR', 'Samambaia');

INSERT INTO `tb_cidades` VALUES (6434, 18, 'PR', 'Santa Amelia');

INSERT INTO `tb_cidades` VALUES (6435, 18, 'PR', 'Santa Cecilia do Pavao');

INSERT INTO `tb_cidades` VALUES (6436, 18, 'PR', 'Santa Clara');

INSERT INTO `tb_cidades` VALUES (6437, 18, 'PR', 'Santa Cruz de Monte Castelo');

INSERT INTO `tb_cidades` VALUES (6438, 18, 'PR', 'Santa Eliza');

INSERT INTO `tb_cidades` VALUES (6439, 18, 'PR', 'Santa Esmeralda');

INSERT INTO `tb_cidades` VALUES (6440, 18, 'PR', 'Santa Fe');

INSERT INTO `tb_cidades` VALUES (6441, 18, 'PR', 'Santa Fe do Pirapo');

INSERT INTO `tb_cidades` VALUES (6442, 18, 'PR', 'Santa Helena');

INSERT INTO `tb_cidades` VALUES (6443, 18, 'PR', 'Santa Ines');

INSERT INTO `tb_cidades` VALUES (6444, 18, 'PR', 'Santa Isabel do Ivai');

INSERT INTO `tb_cidades` VALUES (6445, 18, 'PR', 'Santa Izabel do Oeste');

INSERT INTO `tb_cidades` VALUES (6446, 18, 'PR', 'Santa Lucia');

INSERT INTO `tb_cidades` VALUES (6447, 18, 'PR', 'Santa Lurdes');

INSERT INTO `tb_cidades` VALUES (6448, 18, 'PR', 'Santa Luzia da Alvorada');

INSERT INTO `tb_cidades` VALUES (6449, 18, 'PR', 'Santa Margarida');

INSERT INTO `tb_cidades` VALUES (6450, 18, 'PR', 'Santa Maria');

INSERT INTO `tb_cidades` VALUES (6451, 18, 'PR', 'Santa Maria do Oeste');

INSERT INTO `tb_cidades` VALUES (6452, 18, 'PR', 'Santa Maria do Rio do Peixe');

INSERT INTO `tb_cidades` VALUES (6453, 18, 'PR', 'Santa Mariana');

INSERT INTO `tb_cidades` VALUES (6454, 18, 'PR', 'Santa Monica');

INSERT INTO `tb_cidades` VALUES (6455, 18, 'PR', 'Santa Quiteria');

INSERT INTO `tb_cidades` VALUES (6456, 18, 'PR', 'Santa Rita');

INSERT INTO `tb_cidades` VALUES (6457, 18, 'PR', 'Santa Rita do Oeste');

INSERT INTO `tb_cidades` VALUES (6458, 18, 'PR', 'Santa Rosa');

INSERT INTO `tb_cidades` VALUES (6459, 18, 'PR', 'Santa Tereza do Oeste');

INSERT INTO `tb_cidades` VALUES (6460, 18, 'PR', 'Santa Terezinha de Itaipu');

INSERT INTO `tb_cidades` VALUES (6461, 18, 'PR', 'Santa Zelia');

INSERT INTO `tb_cidades` VALUES (6462, 18, 'PR', 'Santana');

INSERT INTO `tb_cidades` VALUES (6463, 18, 'PR', 'Santana do Itarare');

INSERT INTO `tb_cidades` VALUES (6464, 18, 'PR', 'Santo Antonio');

INSERT INTO `tb_cidades` VALUES (6465, 18, 'PR', 'Santo Antonio da Platina');

INSERT INTO `tb_cidades` VALUES (6466, 18, 'PR', 'Santo Antonio do Caiua');

INSERT INTO `tb_cidades` VALUES (6467, 18, 'PR', 'Santo Antonio do Iratim');

INSERT INTO `tb_cidades` VALUES (6468, 18, 'PR', 'Santo Antonio do Palmital');

INSERT INTO `tb_cidades` VALUES (6469, 18, 'PR', 'Santo Antonio do Paraiso');

INSERT INTO `tb_cidades` VALUES (6470, 18, 'PR', 'Santo Antonio do Sudoeste');

INSERT INTO `tb_cidades` VALUES (6471, 18, 'PR', 'Santo Inacio');

INSERT INTO `tb_cidades` VALUES (6472, 18, 'PR', 'Santo Rei');

INSERT INTO `tb_cidades` VALUES (6473, 18, 'PR', 'Sao Bento');

INSERT INTO `tb_cidades` VALUES (6474, 18, 'PR', 'Sao Braz');

INSERT INTO `tb_cidades` VALUES (6475, 18, 'PR', 'Sao Camilo');

INSERT INTO `tb_cidades` VALUES (6476, 18, 'PR', 'Sao Carlos do Ivai');

INSERT INTO `tb_cidades` VALUES (6477, 18, 'PR', 'Sao Cirilo');

INSERT INTO `tb_cidades` VALUES (6478, 18, 'PR', 'Sao Clemente');

INSERT INTO `tb_cidades` VALUES (6479, 18, 'PR', 'Sao Cristovao');

INSERT INTO `tb_cidades` VALUES (6480, 18, 'PR', 'Sao Domingos');

INSERT INTO `tb_cidades` VALUES (6481, 18, 'PR', 'Sao Francisco');

INSERT INTO `tb_cidades` VALUES (6482, 18, 'PR', 'Sao Francisco de Imbau');

INSERT INTO `tb_cidades` VALUES (6483, 18, 'PR', 'Sao Francisco de Sales');

INSERT INTO `tb_cidades` VALUES (6484, 18, 'PR', 'Sao Gabriel');

INSERT INTO `tb_cidades` VALUES (6485, 18, 'PR', 'Sao Gotardo');

INSERT INTO `tb_cidades` VALUES (6486, 18, 'PR', 'Sao Jeronimo da Serra');

INSERT INTO `tb_cidades` VALUES (6487, 18, 'PR', 'Sao Joao');

INSERT INTO `tb_cidades` VALUES (6488, 18, 'PR', 'Sao Joao D''oeste');

INSERT INTO `tb_cidades` VALUES (6489, 18, 'PR', 'Sao Joao da Boa Vista');

INSERT INTO `tb_cidades` VALUES (6490, 18, 'PR', 'Sao Joao do Caiua');

INSERT INTO `tb_cidades` VALUES (6491, 18, 'PR', 'Sao Joao do Ivai');

INSERT INTO `tb_cidades` VALUES (6492, 18, 'PR', 'Sao Joao do Pinhal');

INSERT INTO `tb_cidades` VALUES (6493, 18, 'PR', 'Sao Joao do Triunfo');

INSERT INTO `tb_cidades` VALUES (6494, 18, 'PR', 'Sao Joaquim');

INSERT INTO `tb_cidades` VALUES (6495, 18, 'PR', 'Sao Joaquim do Pontal');

INSERT INTO `tb_cidades` VALUES (6496, 18, 'PR', 'Sao Jorge D''oeste');

INSERT INTO `tb_cidades` VALUES (6497, 18, 'PR', 'Sao Jorge do Ivai');

INSERT INTO `tb_cidades` VALUES (6498, 18, 'PR', 'Sao Jorge do Patrocinio');

INSERT INTO `tb_cidades` VALUES (6499, 18, 'PR', 'Sao Jose');

INSERT INTO `tb_cidades` VALUES (6500, 18, 'PR', 'Sao Jose da Boa Vista');

INSERT INTO `tb_cidades` VALUES (6501, 18, 'PR', 'Sao Jose das Palmeiras');

INSERT INTO `tb_cidades` VALUES (6502, 18, 'PR', 'Sao Jose do Iguacu');

INSERT INTO `tb_cidades` VALUES (6503, 18, 'PR', 'Sao Jose do Itavo');

INSERT INTO `tb_cidades` VALUES (6504, 18, 'PR', 'Sao Jose do Ivai');

INSERT INTO `tb_cidades` VALUES (6505, 18, 'PR', 'Sao Jose dos Pinhais');

INSERT INTO `tb_cidades` VALUES (6506, 18, 'PR', 'Sao Judas Tadeu');

INSERT INTO `tb_cidades` VALUES (6507, 18, 'PR', 'Sao Leonardo');

INSERT INTO `tb_cidades` VALUES (6508, 18, 'PR', 'Sao Lourenco');

INSERT INTO `tb_cidades` VALUES (6509, 18, 'PR', 'Sao Luiz');

INSERT INTO `tb_cidades` VALUES (6510, 18, 'PR', 'Sao Luiz do Puruna');

INSERT INTO `tb_cidades` VALUES (6511, 18, 'PR', 'Sao Manoel do Parana');

INSERT INTO `tb_cidades` VALUES (6512, 18, 'PR', 'Sao Marcos');

INSERT INTO `tb_cidades` VALUES (6513, 18, 'PR', 'Sao Martinho');

INSERT INTO `tb_cidades` VALUES (6514, 18, 'PR', 'Sao Mateus do Sul');

INSERT INTO `tb_cidades` VALUES (6515, 18, 'PR', 'Sao Miguel');

INSERT INTO `tb_cidades` VALUES (6516, 18, 'PR', 'Sao Miguel do Cambui');

INSERT INTO `tb_cidades` VALUES (6517, 18, 'PR', 'Sao Miguel do Iguacu');

INSERT INTO `tb_cidades` VALUES (6518, 18, 'PR', 'Sao Paulo');

INSERT INTO `tb_cidades` VALUES (6519, 18, 'PR', 'Sao Pedro');

INSERT INTO `tb_cidades` VALUES (6520, 18, 'PR', 'Sao Pedro do Florido');

INSERT INTO `tb_cidades` VALUES (6521, 18, 'PR', 'Sao Pedro do Iguacu');

INSERT INTO `tb_cidades` VALUES (6522, 18, 'PR', 'Sao Pedro do Ivai');

INSERT INTO `tb_cidades` VALUES (6523, 18, 'PR', 'Sao Pedro do Parana');

INSERT INTO `tb_cidades` VALUES (6524, 18, 'PR', 'Sao Pedro Lopei');

INSERT INTO `tb_cidades` VALUES (6525, 18, 'PR', 'Sao Pio X');

INSERT INTO `tb_cidades` VALUES (6526, 18, 'PR', 'Sao Roque');

INSERT INTO `tb_cidades` VALUES (6527, 18, 'PR', 'Sao Roque do Pinhal');

INSERT INTO `tb_cidades` VALUES (6528, 18, 'PR', 'Sao Salvador');

INSERT INTO `tb_cidades` VALUES (6529, 18, 'PR', 'Sao Sebastiao');

INSERT INTO `tb_cidades` VALUES (6530, 18, 'PR', 'Sao Sebastiao da Amoreira');

INSERT INTO `tb_cidades` VALUES (6531, 18, 'PR', 'Sao Silvestre');

INSERT INTO `tb_cidades` VALUES (6532, 18, 'PR', 'Sao Tome');

INSERT INTO `tb_cidades` VALUES (6533, 18, 'PR', 'Sao Valentim');

INSERT INTO `tb_cidades` VALUES (6534, 18, 'PR', 'Sao Vicente');

INSERT INTO `tb_cidades` VALUES (6535, 18, 'PR', 'Sape');

INSERT INTO `tb_cidades` VALUES (6536, 18, 'PR', 'Sapopema');

INSERT INTO `tb_cidades` VALUES (6537, 18, 'PR', 'Sarandi');

INSERT INTO `tb_cidades` VALUES (6538, 18, 'PR', 'Saudade do Iguacu');

INSERT INTO `tb_cidades` VALUES (6539, 18, 'PR', 'Sede Alvorada');

INSERT INTO `tb_cidades` VALUES (6540, 18, 'PR', 'Sede Chaparral');

INSERT INTO `tb_cidades` VALUES (6541, 18, 'PR', 'Sede Nova Sant''ana');

INSERT INTO `tb_cidades` VALUES (6542, 18, 'PR', 'Sede Progresso');

INSERT INTO `tb_cidades` VALUES (6543, 18, 'PR', 'Selva');

INSERT INTO `tb_cidades` VALUES (6544, 18, 'PR', 'Senges');

INSERT INTO `tb_cidades` VALUES (6545, 18, 'PR', 'Senhor Bom Jesus dos Gramados');

INSERT INTO `tb_cidades` VALUES (6546, 18, 'PR', 'Serra dos Dourados');

INSERT INTO `tb_cidades` VALUES (6547, 18, 'PR', 'Serra Negra');

INSERT INTO `tb_cidades` VALUES (6548, 18, 'PR', 'Serranopolis do Iguacu');

INSERT INTO `tb_cidades` VALUES (6549, 18, 'PR', 'Serraria Klas');

INSERT INTO `tb_cidades` VALUES (6550, 18, 'PR', 'Serrinha');

INSERT INTO `tb_cidades` VALUES (6551, 18, 'PR', 'Sertaneja');

INSERT INTO `tb_cidades` VALUES (6552, 18, 'PR', 'Sertanopolis');

INSERT INTO `tb_cidades` VALUES (6553, 18, 'PR', 'Sertaozinho');

INSERT INTO `tb_cidades` VALUES (6554, 18, 'PR', 'Sete Saltos de Cima');

INSERT INTO `tb_cidades` VALUES (6555, 18, 'PR', 'Silvolandia');

INSERT INTO `tb_cidades` VALUES (6556, 18, 'PR', 'Siqueira Belo');

INSERT INTO `tb_cidades` VALUES (6557, 18, 'PR', 'Siqueira Campos');

INSERT INTO `tb_cidades` VALUES (6558, 18, 'PR', 'Socavao');

INSERT INTO `tb_cidades` VALUES (6559, 18, 'PR', 'Socorro');

INSERT INTO `tb_cidades` VALUES (6560, 18, 'PR', 'Sulina');

INSERT INTO `tb_cidades` VALUES (6561, 18, 'PR', 'Sumare');

INSERT INTO `tb_cidades` VALUES (6562, 18, 'PR', 'Sussui');

INSERT INTO `tb_cidades` VALUES (6563, 18, 'PR', 'Sutis');

INSERT INTO `tb_cidades` VALUES (6564, 18, 'PR', 'Taipa');

INSERT INTO `tb_cidades` VALUES (6565, 18, 'PR', 'Tamarana');

INSERT INTO `tb_cidades` VALUES (6566, 18, 'PR', 'Tambarutaca');

INSERT INTO `tb_cidades` VALUES (6567, 18, 'PR', 'Tamboara');

INSERT INTO `tb_cidades` VALUES (6568, 18, 'PR', 'Tanque Grande');

INSERT INTO `tb_cidades` VALUES (6569, 18, 'PR', 'Tapejara');

INSERT INTO `tb_cidades` VALUES (6570, 18, 'PR', 'Tapira');

INSERT INTO `tb_cidades` VALUES (6571, 18, 'PR', 'Tapui');

INSERT INTO `tb_cidades` VALUES (6572, 18, 'PR', 'Taquara');

INSERT INTO `tb_cidades` VALUES (6573, 18, 'PR', 'Taquari dos Polacos');

INSERT INTO `tb_cidades` VALUES (6574, 18, 'PR', 'Taquari dos Russos');

INSERT INTO `tb_cidades` VALUES (6575, 18, 'PR', 'Taquaruna');

INSERT INTO `tb_cidades` VALUES (6576, 18, 'PR', 'Teixeira Soares');

INSERT INTO `tb_cidades` VALUES (6577, 18, 'PR', 'Telemaco Borba');

INSERT INTO `tb_cidades` VALUES (6578, 18, 'PR', 'Teolandia');

INSERT INTO `tb_cidades` VALUES (6579, 18, 'PR', 'Tereza Breda');

INSERT INTO `tb_cidades` VALUES (6580, 18, 'PR', 'Tereza Cristina');

INSERT INTO `tb_cidades` VALUES (6581, 18, 'PR', 'Terra Boa');

INSERT INTO `tb_cidades` VALUES (6582, 18, 'PR', 'Terra Nova');

INSERT INTO `tb_cidades` VALUES (6583, 18, 'PR', 'Terra Rica');

INSERT INTO `tb_cidades` VALUES (6584, 18, 'PR', 'Terra Roxa');

INSERT INTO `tb_cidades` VALUES (6585, 18, 'PR', 'Tibagi');

INSERT INTO `tb_cidades` VALUES (6586, 18, 'PR', 'Tijucas do Sul');

INSERT INTO `tb_cidades` VALUES (6587, 18, 'PR', 'Tijuco Preto');

INSERT INTO `tb_cidades` VALUES (6588, 18, 'PR', 'Timbu Velho');

INSERT INTO `tb_cidades` VALUES (6589, 18, 'PR', 'Tindiquera');

INSERT INTO `tb_cidades` VALUES (6590, 18, 'PR', 'Tiradentes');

INSERT INTO `tb_cidades` VALUES (6591, 18, 'PR', 'Toledo');

INSERT INTO `tb_cidades` VALUES (6592, 18, 'PR', 'Tomaz Coelho');

INSERT INTO `tb_cidades` VALUES (6593, 18, 'PR', 'Tomazina');

INSERT INTO `tb_cidades` VALUES (6594, 18, 'PR', 'Tranqueira');

INSERT INTO `tb_cidades` VALUES (6595, 18, 'PR', 'Tres Barras do Parana');

INSERT INTO `tb_cidades` VALUES (6596, 18, 'PR', 'Tres Bicos');

INSERT INTO `tb_cidades` VALUES (6597, 18, 'PR', 'Tres Bocas');

INSERT INTO `tb_cidades` VALUES (6598, 18, 'PR', 'Tres Capoes');

INSERT INTO `tb_cidades` VALUES (6599, 18, 'PR', 'Tres Corregos');

INSERT INTO `tb_cidades` VALUES (6600, 18, 'PR', 'Tres Lagoas');

INSERT INTO `tb_cidades` VALUES (6601, 18, 'PR', 'Tres Pinheiros');

INSERT INTO `tb_cidades` VALUES (6602, 18, 'PR', 'Tres Placas');

INSERT INTO `tb_cidades` VALUES (6603, 18, 'PR', 'Triangulo');

INSERT INTO `tb_cidades` VALUES (6604, 18, 'PR', 'Trindade');

INSERT INTO `tb_cidades` VALUES (6605, 18, 'PR', 'Triolandia');

INSERT INTO `tb_cidades` VALUES (6606, 18, 'PR', 'Tronco');

INSERT INTO `tb_cidades` VALUES (6607, 18, 'PR', 'Tunas do Parana');

INSERT INTO `tb_cidades` VALUES (6608, 18, 'PR', 'Tuneiras do Oeste');

INSERT INTO `tb_cidades` VALUES (6609, 18, 'PR', 'Tupassi');

INSERT INTO `tb_cidades` VALUES (6610, 18, 'PR', 'Tupinamba');

INSERT INTO `tb_cidades` VALUES (6611, 18, 'PR', 'Turvo');

INSERT INTO `tb_cidades` VALUES (6612, 18, 'PR', 'Ubaldino Taques');

INSERT INTO `tb_cidades` VALUES (6613, 18, 'PR', 'Ubauna');

INSERT INTO `tb_cidades` VALUES (6614, 18, 'PR', 'Ubirata');

INSERT INTO `tb_cidades` VALUES (6615, 18, 'PR', 'Umuarama');

INSERT INTO `tb_cidades` VALUES (6616, 18, 'PR', 'Uniao');

INSERT INTO `tb_cidades` VALUES (6617, 18, 'PR', 'Uniao da Vitoria');

INSERT INTO `tb_cidades` VALUES (6618, 18, 'PR', 'Uniao do Oeste');

INSERT INTO `tb_cidades` VALUES (6619, 18, 'PR', 'Uniflor');

INSERT INTO `tb_cidades` VALUES (6620, 18, 'PR', 'Urai');

INSERT INTO `tb_cidades` VALUES (6621, 18, 'PR', 'Usina');

INSERT INTO `tb_cidades` VALUES (6622, 18, 'PR', 'Uvaia');

INSERT INTO `tb_cidades` VALUES (6623, 18, 'PR', 'Valentins');

INSERT INTO `tb_cidades` VALUES (6624, 18, 'PR', 'Valerio');

INSERT INTO `tb_cidades` VALUES (6625, 18, 'PR', 'Vargeado');

INSERT INTO `tb_cidades` VALUES (6626, 18, 'PR', 'Vassoural');

INSERT INTO `tb_cidades` VALUES (6627, 18, 'PR', 'Ventania');

INSERT INTO `tb_cidades` VALUES (6628, 18, 'PR', 'Vera Cruz do Oeste');

INSERT INTO `tb_cidades` VALUES (6629, 18, 'PR', 'Vera Guarani');

INSERT INTO `tb_cidades` VALUES (6630, 18, 'PR', 'Vere');

INSERT INTO `tb_cidades` VALUES (6631, 18, 'PR', 'Vida Nova');

INSERT INTO `tb_cidades` VALUES (6632, 18, 'PR', 'Vidigal');

INSERT INTO `tb_cidades` VALUES (6633, 18, 'PR', 'Vila Alta');

INSERT INTO `tb_cidades` VALUES (6634, 18, 'PR', 'Vila Diniz');

INSERT INTO `tb_cidades` VALUES (6635, 18, 'PR', 'Vila dos Roldos');

INSERT INTO `tb_cidades` VALUES (6636, 18, 'PR', 'Vila Florida');

INSERT INTO `tb_cidades` VALUES (6637, 18, 'PR', 'Vila Gandhi');

INSERT INTO `tb_cidades` VALUES (6638, 18, 'PR', 'Vila Guay');

INSERT INTO `tb_cidades` VALUES (6639, 18, 'PR', 'Vila Nova');

INSERT INTO `tb_cidades` VALUES (6640, 18, 'PR', 'Vila Nova de Florenca');

INSERT INTO `tb_cidades` VALUES (6641, 18, 'PR', 'Vila Paraiso');

INSERT INTO `tb_cidades` VALUES (6642, 18, 'PR', 'Vila Reis');

INSERT INTO `tb_cidades` VALUES (6643, 18, 'PR', 'Vila Rica do Ivai');

INSERT INTO `tb_cidades` VALUES (6644, 18, 'PR', 'Vila Roberto Brzezinski');

INSERT INTO `tb_cidades` VALUES (6645, 18, 'PR', 'Vila Silva Jardim');

INSERT INTO `tb_cidades` VALUES (6646, 18, 'PR', 'Vila Velha');

INSERT INTO `tb_cidades` VALUES (6647, 18, 'PR', 'Virmond');

INSERT INTO `tb_cidades` VALUES (6648, 18, 'PR', 'Vista Alegre');

INSERT INTO `tb_cidades` VALUES (6649, 18, 'PR', 'Vista Bonita');

INSERT INTO `tb_cidades` VALUES (6650, 18, 'PR', 'Vitoria');

INSERT INTO `tb_cidades` VALUES (6651, 18, 'PR', 'Vitorino');

INSERT INTO `tb_cidades` VALUES (6652, 18, 'PR', 'Warta');

INSERT INTO `tb_cidades` VALUES (6653, 18, 'PR', 'Wenceslau Braz');

INSERT INTO `tb_cidades` VALUES (6654, 18, 'PR', 'Xambre');

INSERT INTO `tb_cidades` VALUES (6655, 18, 'PR', 'Xaxim');

INSERT INTO `tb_cidades` VALUES (6656, 18, 'PR', 'Yolanda');

INSERT INTO `tb_cidades` VALUES (6657, 19, 'RJ', 'Abarracamento');

INSERT INTO `tb_cidades` VALUES (6658, 19, 'RJ', 'Abraao');

INSERT INTO `tb_cidades` VALUES (6659, 19, 'RJ', 'Afonso Arinos');

INSERT INTO `tb_cidades` VALUES (6660, 19, 'RJ', 'Agulhas Negras');

INSERT INTO `tb_cidades` VALUES (6661, 19, 'RJ', 'Amparo');

INSERT INTO `tb_cidades` VALUES (6662, 19, 'RJ', 'Andrade Pinto');

INSERT INTO `tb_cidades` VALUES (6663, 19, 'RJ', 'Angra dos Reis');

INSERT INTO `tb_cidades` VALUES (6664, 19, 'RJ', 'Anta');

INSERT INTO `tb_cidades` VALUES (6665, 19, 'RJ', 'Aperibe');

INSERT INTO `tb_cidades` VALUES (6666, 19, 'RJ', 'Araruama');

INSERT INTO `tb_cidades` VALUES (6667, 19, 'RJ', 'Areal');

INSERT INTO `tb_cidades` VALUES (6668, 19, 'RJ', 'Armacao de Buzios');

INSERT INTO `tb_cidades` VALUES (6669, 19, 'RJ', 'Arraial do Cabo');

INSERT INTO `tb_cidades` VALUES (6670, 19, 'RJ', 'Arrozal');

INSERT INTO `tb_cidades` VALUES (6671, 19, 'RJ', 'Avelar');

INSERT INTO `tb_cidades` VALUES (6672, 19, 'RJ', 'Bacaxa');

INSERT INTO `tb_cidades` VALUES (6673, 19, 'RJ', 'Baltazar');

INSERT INTO `tb_cidades` VALUES (6674, 19, 'RJ', 'Banquete');

INSERT INTO `tb_cidades` VALUES (6675, 19, 'RJ', 'Barao de Juparana');

INSERT INTO `tb_cidades` VALUES (6676, 19, 'RJ', 'Barcelos');

INSERT INTO `tb_cidades` VALUES (6677, 19, 'RJ', 'Barra Alegre');

INSERT INTO `tb_cidades` VALUES (6678, 19, 'RJ', 'Barra de Macae');

INSERT INTO `tb_cidades` VALUES (6679, 19, 'RJ', 'Barra de Sao Joao');

INSERT INTO `tb_cidades` VALUES (6680, 19, 'RJ', 'Barra do Pirai');

INSERT INTO `tb_cidades` VALUES (6681, 19, 'RJ', 'Barra Mansa');

INSERT INTO `tb_cidades` VALUES (6682, 19, 'RJ', 'Barra Seca');

INSERT INTO `tb_cidades` VALUES (6683, 19, 'RJ', 'Belford Roxo');

INSERT INTO `tb_cidades` VALUES (6684, 19, 'RJ', 'Bemposta');

INSERT INTO `tb_cidades` VALUES (6685, 19, 'RJ', 'Boa Esperanca');

INSERT INTO `tb_cidades` VALUES (6686, 19, 'RJ', 'Boa Sorte');

INSERT INTO `tb_cidades` VALUES (6687, 19, 'RJ', 'Boa Ventura');

INSERT INTO `tb_cidades` VALUES (6688, 19, 'RJ', 'Bom Jardim');

INSERT INTO `tb_cidades` VALUES (6689, 19, 'RJ', 'Bom Jesus do Itabapoana');

INSERT INTO `tb_cidades` VALUES (6690, 19, 'RJ', 'Bom Jesus do Querendo');

INSERT INTO `tb_cidades` VALUES (6691, 19, 'RJ', 'Cabo Frio');

INSERT INTO `tb_cidades` VALUES (6692, 19, 'RJ', 'Cabucu');

INSERT INTO `tb_cidades` VALUES (6693, 19, 'RJ', 'Cachoeiras de Macacu');

INSERT INTO `tb_cidades` VALUES (6694, 19, 'RJ', 'Cachoeiros');

INSERT INTO `tb_cidades` VALUES (6695, 19, 'RJ', 'Calheiros');

INSERT INTO `tb_cidades` VALUES (6696, 19, 'RJ', 'Cambiasca');

INSERT INTO `tb_cidades` VALUES (6697, 19, 'RJ', 'Cambuci');

INSERT INTO `tb_cidades` VALUES (6698, 19, 'RJ', 'Campo do Coelho');

INSERT INTO `tb_cidades` VALUES (6699, 19, 'RJ', 'Campos dos Goytacazes');

INSERT INTO `tb_cidades` VALUES (6700, 19, 'RJ', 'Campos Elyseos');

INSERT INTO `tb_cidades` VALUES (6701, 19, 'RJ', 'Cantagalo');

INSERT INTO `tb_cidades` VALUES (6702, 19, 'RJ', 'Carabucu');

INSERT INTO `tb_cidades` VALUES (6703, 19, 'RJ', 'Carapebus');

INSERT INTO `tb_cidades` VALUES (6704, 19, 'RJ', 'Cardoso Moreira');

INSERT INTO `tb_cidades` VALUES (6705, 19, 'RJ', 'Carmo');

INSERT INTO `tb_cidades` VALUES (6706, 19, 'RJ', 'Cascatinha');

INSERT INTO `tb_cidades` VALUES (6707, 19, 'RJ', 'Casimiro de Abreu');

INSERT INTO `tb_cidades` VALUES (6708, 19, 'RJ', 'Cava');

INSERT INTO `tb_cidades` VALUES (6709, 19, 'RJ', 'Coelho da Rocha');

INSERT INTO `tb_cidades` VALUES (6710, 19, 'RJ', 'Colonia');

INSERT INTO `tb_cidades` VALUES (6711, 19, 'RJ', 'Comendador Levy Gasparian');

INSERT INTO `tb_cidades` VALUES (6712, 19, 'RJ', 'Comendador Venancio');

INSERT INTO `tb_cidades` VALUES (6713, 19, 'RJ', 'Conceicao de Jacarei');

INSERT INTO `tb_cidades` VALUES (6714, 19, 'RJ', 'Conceicao de Macabu');

INSERT INTO `tb_cidades` VALUES (6715, 19, 'RJ', 'Conrado');

INSERT INTO `tb_cidades` VALUES (6716, 19, 'RJ', 'Conselheiro Paulino');

INSERT INTO `tb_cidades` VALUES (6717, 19, 'RJ', 'Conservatoria');

INSERT INTO `tb_cidades` VALUES (6718, 19, 'RJ', 'Cordeiro');

INSERT INTO `tb_cidades` VALUES (6719, 19, 'RJ', 'Coroa Grande');

INSERT INTO `tb_cidades` VALUES (6720, 19, 'RJ', 'Correas');

INSERT INTO `tb_cidades` VALUES (6721, 19, 'RJ', 'Corrego da Prata');

INSERT INTO `tb_cidades` VALUES (6722, 19, 'RJ', 'Corrego do Ouro');

INSERT INTO `tb_cidades` VALUES (6723, 19, 'RJ', 'Correntezas');

INSERT INTO `tb_cidades` VALUES (6724, 19, 'RJ', 'Cunhambebe');

INSERT INTO `tb_cidades` VALUES (6725, 19, 'RJ', 'Dorandia');

INSERT INTO `tb_cidades` VALUES (6726, 19, 'RJ', 'Dores de Macabu');

INSERT INTO `tb_cidades` VALUES (6727, 19, 'RJ', 'Doutor Elias');

INSERT INTO `tb_cidades` VALUES (6728, 19, 'RJ', 'Doutor Loreti');

INSERT INTO `tb_cidades` VALUES (6729, 19, 'RJ', 'Duas Barras');

INSERT INTO `tb_cidades` VALUES (6730, 19, 'RJ', 'Duque de Caxias');

INSERT INTO `tb_cidades` VALUES (6731, 19, 'RJ', 'Engenheiro Passos');

INSERT INTO `tb_cidades` VALUES (6732, 19, 'RJ', 'Engenheiro Paulo de Frontin');

INSERT INTO `tb_cidades` VALUES (6733, 19, 'RJ', 'Engenheiro Pedreira');

INSERT INTO `tb_cidades` VALUES (6734, 19, 'RJ', 'Estrada Nova');

INSERT INTO `tb_cidades` VALUES (6735, 19, 'RJ', 'Euclidelandia');

INSERT INTO `tb_cidades` VALUES (6736, 19, 'RJ', 'Falcao');

INSERT INTO `tb_cidades` VALUES (6737, 19, 'RJ', 'Floriano');

INSERT INTO `tb_cidades` VALUES (6738, 19, 'RJ', 'Fumaca');

INSERT INTO `tb_cidades` VALUES (6739, 19, 'RJ', 'Funil');

INSERT INTO `tb_cidades` VALUES (6740, 19, 'RJ', 'Gavioes');

INSERT INTO `tb_cidades` VALUES (6741, 19, 'RJ', 'Getulandia');

INSERT INTO `tb_cidades` VALUES (6742, 19, 'RJ', 'Glicerio');

INSERT INTO `tb_cidades` VALUES (6743, 19, 'RJ', 'Goitacazes');

INSERT INTO `tb_cidades` VALUES (6744, 19, 'RJ', 'Governador Portela');

INSERT INTO `tb_cidades` VALUES (6745, 19, 'RJ', 'Guapimirim');

INSERT INTO `tb_cidades` VALUES (6746, 19, 'RJ', 'Guia de Pacobaiba');

INSERT INTO `tb_cidades` VALUES (6747, 19, 'RJ', 'Ibitiguacu');

INSERT INTO `tb_cidades` VALUES (6748, 19, 'RJ', 'Ibitioca');

INSERT INTO `tb_cidades` VALUES (6749, 19, 'RJ', 'Ibituporanga');

INSERT INTO `tb_cidades` VALUES (6750, 19, 'RJ', 'Iguaba Grande');

INSERT INTO `tb_cidades` VALUES (6751, 19, 'RJ', 'Imbarie');

INSERT INTO `tb_cidades` VALUES (6752, 19, 'RJ', 'Inconfidencia');

INSERT INTO `tb_cidades` VALUES (6753, 19, 'RJ', 'Inhomirim');

INSERT INTO `tb_cidades` VALUES (6754, 19, 'RJ', 'Inoa');

INSERT INTO `tb_cidades` VALUES (6755, 19, 'RJ', 'Ipiabas');

INSERT INTO `tb_cidades` VALUES (6756, 19, 'RJ', 'Ipiiba');

INSERT INTO `tb_cidades` VALUES (6757, 19, 'RJ', 'Ipuca');

INSERT INTO `tb_cidades` VALUES (6758, 19, 'RJ', 'Itabapoana');

INSERT INTO `tb_cidades` VALUES (6759, 19, 'RJ', 'Itaborai');

INSERT INTO `tb_cidades` VALUES (6760, 19, 'RJ', 'Itacurussa');

INSERT INTO `tb_cidades` VALUES (6761, 19, 'RJ', 'Itaguai');

INSERT INTO `tb_cidades` VALUES (6762, 19, 'RJ', 'Itaipava');

INSERT INTO `tb_cidades` VALUES (6763, 19, 'RJ', 'Itaipu');

INSERT INTO `tb_cidades` VALUES (6764, 19, 'RJ', 'Itajara');

INSERT INTO `tb_cidades` VALUES (6765, 19, 'RJ', 'Italva');

INSERT INTO `tb_cidades` VALUES (6766, 19, 'RJ', 'Itambi');

INSERT INTO `tb_cidades` VALUES (6767, 19, 'RJ', 'Itaocara');

INSERT INTO `tb_cidades` VALUES (6768, 19, 'RJ', 'Itaperuna');

INSERT INTO `tb_cidades` VALUES (6769, 19, 'RJ', 'Itatiaia');

INSERT INTO `tb_cidades` VALUES (6770, 19, 'RJ', 'Jacuecanga');

INSERT INTO `tb_cidades` VALUES (6771, 19, 'RJ', 'Jaguarembe');

INSERT INTO `tb_cidades` VALUES (6772, 19, 'RJ', 'Jamapara');

INSERT INTO `tb_cidades` VALUES (6773, 19, 'RJ', 'Japeri');

INSERT INTO `tb_cidades` VALUES (6774, 19, 'RJ', 'Japuiba');

INSERT INTO `tb_cidades` VALUES (6775, 19, 'RJ', 'Laje do Muriae');

INSERT INTO `tb_cidades` VALUES (6776, 19, 'RJ', 'Laranjais');

INSERT INTO `tb_cidades` VALUES (6777, 19, 'RJ', 'Lidice');

INSERT INTO `tb_cidades` VALUES (6778, 19, 'RJ', 'Lumiar');

INSERT INTO `tb_cidades` VALUES (6779, 19, 'RJ', 'Macabuzinho');

INSERT INTO `tb_cidades` VALUES (6780, 19, 'RJ', 'Macae');

INSERT INTO `tb_cidades` VALUES (6781, 19, 'RJ', 'Macuco');

INSERT INTO `tb_cidades` VALUES (6782, 19, 'RJ', 'Mage');

INSERT INTO `tb_cidades` VALUES (6783, 19, 'RJ', 'Mambucaba');

INSERT INTO `tb_cidades` VALUES (6784, 19, 'RJ', 'Mangaratiba');

INSERT INTO `tb_cidades` VALUES (6785, 19, 'RJ', 'Maniva');

INSERT INTO `tb_cidades` VALUES (6786, 19, 'RJ', 'Manoel Ribeiro');

INSERT INTO `tb_cidades` VALUES (6787, 19, 'RJ', 'Manuel Duarte');

INSERT INTO `tb_cidades` VALUES (6788, 19, 'RJ', 'Marangatu');

INSERT INTO `tb_cidades` VALUES (6789, 19, 'RJ', 'Marica');

INSERT INTO `tb_cidades` VALUES (6790, 19, 'RJ', 'Mendes');

INSERT INTO `tb_cidades` VALUES (6791, 19, 'RJ', 'Mesquita');

INSERT INTO `tb_cidades` VALUES (6792, 19, 'RJ', 'Miguel Pereira');

INSERT INTO `tb_cidades` VALUES (6793, 19, 'RJ', 'Miracema');

INSERT INTO `tb_cidades` VALUES (6794, 19, 'RJ', 'Monera');

INSERT INTO `tb_cidades` VALUES (6795, 19, 'RJ', 'Monjolo');

INSERT INTO `tb_cidades` VALUES (6796, 19, 'RJ', 'Monte Alegre');

INSERT INTO `tb_cidades` VALUES (6797, 19, 'RJ', 'Monte Verde');

INSERT INTO `tb_cidades` VALUES (6798, 19, 'RJ', 'Monumento');

INSERT INTO `tb_cidades` VALUES (6799, 19, 'RJ', 'Morangaba');

INSERT INTO `tb_cidades` VALUES (6800, 19, 'RJ', 'Morro do Coco');

INSERT INTO `tb_cidades` VALUES (6801, 19, 'RJ', 'Morro Grande');

INSERT INTO `tb_cidades` VALUES (6802, 19, 'RJ', 'Mussurepe');

INSERT INTO `tb_cidades` VALUES (6803, 19, 'RJ', 'Natividade');

INSERT INTO `tb_cidades` VALUES (6804, 19, 'RJ', 'Neves');

INSERT INTO `tb_cidades` VALUES (6805, 19, 'RJ', 'Nhunguacu');

INSERT INTO `tb_cidades` VALUES (6806, 19, 'RJ', 'Nilopolis');

INSERT INTO `tb_cidades` VALUES (6807, 19, 'RJ', 'Niteroi');

INSERT INTO `tb_cidades` VALUES (6808, 19, 'RJ', 'Nossa Senhora da Aparecida');

INSERT INTO `tb_cidades` VALUES (6809, 19, 'RJ', 'Nossa Senhora da Penha');

INSERT INTO `tb_cidades` VALUES (6810, 19, 'RJ', 'Nossa Senhora do Amparo');

INSERT INTO `tb_cidades` VALUES (6811, 19, 'RJ', 'Nova Friburgo');

INSERT INTO `tb_cidades` VALUES (6812, 19, 'RJ', 'Nova Iguacu');

INSERT INTO `tb_cidades` VALUES (6813, 19, 'RJ', 'Olinda');

INSERT INTO `tb_cidades` VALUES (6814, 19, 'RJ', 'Ourania');

INSERT INTO `tb_cidades` VALUES (6815, 19, 'RJ', 'Papucaia');

INSERT INTO `tb_cidades` VALUES (6816, 19, 'RJ', 'Paquequer Pequeno');

INSERT INTO `tb_cidades` VALUES (6817, 19, 'RJ', 'Paracambi');

INSERT INTO `tb_cidades` VALUES (6818, 19, 'RJ', 'Paraiba do Sul');

INSERT INTO `tb_cidades` VALUES (6819, 19, 'RJ', 'Paraiso do Tobias');

INSERT INTO `tb_cidades` VALUES (6820, 19, 'RJ', 'Paraoquena');

INSERT INTO `tb_cidades` VALUES (6821, 19, 'RJ', 'Parapeuna');

INSERT INTO `tb_cidades` VALUES (6822, 19, 'RJ', 'Parati');

INSERT INTO `tb_cidades` VALUES (6823, 19, 'RJ', 'Parati Mirim');

INSERT INTO `tb_cidades` VALUES (6824, 19, 'RJ', 'Passa Tres');

INSERT INTO `tb_cidades` VALUES (6825, 19, 'RJ', 'Paty do Alferes');

INSERT INTO `tb_cidades` VALUES (6826, 19, 'RJ', 'Pedra Selada');

INSERT INTO `tb_cidades` VALUES (6827, 19, 'RJ', 'Pedro do Rio');

INSERT INTO `tb_cidades` VALUES (6828, 19, 'RJ', 'Penedo');

INSERT INTO `tb_cidades` VALUES (6829, 19, 'RJ', 'Pentagna');

INSERT INTO `tb_cidades` VALUES (6830, 19, 'RJ', 'Petropolis');

INSERT INTO `tb_cidades` VALUES (6831, 19, 'RJ', 'Piabeta');

INSERT INTO `tb_cidades` VALUES (6832, 19, 'RJ', 'Piao');

INSERT INTO `tb_cidades` VALUES (6833, 19, 'RJ', 'Pinheiral');

INSERT INTO `tb_cidades` VALUES (6834, 19, 'RJ', 'Pipeiras');

INSERT INTO `tb_cidades` VALUES (6835, 19, 'RJ', 'Pirai');

INSERT INTO `tb_cidades` VALUES (6836, 19, 'RJ', 'Pirangai');

INSERT INTO `tb_cidades` VALUES (6837, 19, 'RJ', 'Pirapetinga de Bom Jesus');

INSERT INTO `tb_cidades` VALUES (6838, 19, 'RJ', 'Porciuncula');

INSERT INTO `tb_cidades` VALUES (6839, 19, 'RJ', 'Portela');

INSERT INTO `tb_cidades` VALUES (6840, 19, 'RJ', 'Porto das Caixas');

INSERT INTO `tb_cidades` VALUES (6841, 19, 'RJ', 'Porto Real');

INSERT INTO `tb_cidades` VALUES (6842, 19, 'RJ', 'Porto Velho do Cunha');

INSERT INTO `tb_cidades` VALUES (6843, 19, 'RJ', 'Posse');

INSERT INTO `tb_cidades` VALUES (6844, 19, 'RJ', 'Praia de Aracatiba');

INSERT INTO `tb_cidades` VALUES (6845, 19, 'RJ', 'Pureza');

INSERT INTO `tb_cidades` VALUES (6846, 19, 'RJ', 'Purilandia');

INSERT INTO `tb_cidades` VALUES (6847, 19, 'RJ', 'Quarteis');

INSERT INTO `tb_cidades` VALUES (6848, 19, 'RJ', 'Quatis');

INSERT INTO `tb_cidades` VALUES (6849, 19, 'RJ', 'Queimados');

INSERT INTO `tb_cidades` VALUES (6850, 19, 'RJ', 'Quissama');

INSERT INTO `tb_cidades` VALUES (6851, 19, 'RJ', 'Raposo');

INSERT INTO `tb_cidades` VALUES (6852, 19, 'RJ', 'Renascenca');

INSERT INTO `tb_cidades` VALUES (6853, 19, 'RJ', 'Resende');

INSERT INTO `tb_cidades` VALUES (6854, 19, 'RJ', 'Retiro do Muriae');

INSERT INTO `tb_cidades` VALUES (6855, 19, 'RJ', 'Rialto');

INSERT INTO `tb_cidades` VALUES (6856, 19, 'RJ', 'Ribeirao de Sao Joaquim');

INSERT INTO `tb_cidades` VALUES (6857, 19, 'RJ', 'Rio Bonito');

INSERT INTO `tb_cidades` VALUES (6858, 19, 'RJ', 'Rio Claro');

INSERT INTO `tb_cidades` VALUES (6859, 19, 'RJ', 'Rio das Flores');

INSERT INTO `tb_cidades` VALUES (6860, 19, 'RJ', 'Rio das Ostras');

INSERT INTO `tb_cidades` VALUES (6861, 19, 'RJ', 'Rio de Janeiro');

INSERT INTO `tb_cidades` VALUES (6862, 19, 'RJ', 'Riograndina');

INSERT INTO `tb_cidades` VALUES (6863, 19, 'RJ', 'Rosal');

INSERT INTO `tb_cidades` VALUES (6864, 19, 'RJ', 'Sacra Familia do Tingua');

INSERT INTO `tb_cidades` VALUES (6865, 19, 'RJ', 'Salutaris');

INSERT INTO `tb_cidades` VALUES (6866, 19, 'RJ', 'Sambaetiba');

INSERT INTO `tb_cidades` VALUES (6867, 19, 'RJ', 'Sampaio Correia');

INSERT INTO `tb_cidades` VALUES (6868, 19, 'RJ', 'Sana');

INSERT INTO `tb_cidades` VALUES (6869, 19, 'RJ', 'Santa Clara');

INSERT INTO `tb_cidades` VALUES (6870, 19, 'RJ', 'Santa Cruz');

INSERT INTO `tb_cidades` VALUES (6871, 19, 'RJ', 'Santa Cruz da Serra');

INSERT INTO `tb_cidades` VALUES (6872, 19, 'RJ', 'Santa Isabel');

INSERT INTO `tb_cidades` VALUES (6873, 19, 'RJ', 'Santa Isabel do Rio Preto');

INSERT INTO `tb_cidades` VALUES (6874, 19, 'RJ', 'Santa Maria');

INSERT INTO `tb_cidades` VALUES (6875, 19, 'RJ', 'Santa Maria Madalena');

INSERT INTO `tb_cidades` VALUES (6876, 19, 'RJ', 'Santa Rita da Floresta');

INSERT INTO `tb_cidades` VALUES (6877, 19, 'RJ', 'Santanesia');

INSERT INTO `tb_cidades` VALUES (6878, 19, 'RJ', 'Santo Aleixo');

INSERT INTO `tb_cidades` VALUES (6879, 19, 'RJ', 'Santo Amaro de Campos');

INSERT INTO `tb_cidades` VALUES (6880, 19, 'RJ', 'Santo Antonio de Padua');

INSERT INTO `tb_cidades` VALUES (6881, 19, 'RJ', 'Santo Antonio do Imbe');

INSERT INTO `tb_cidades` VALUES (6882, 19, 'RJ', 'Santo Eduardo');

INSERT INTO `tb_cidades` VALUES (6883, 19, 'RJ', 'Sao Fidelis');

INSERT INTO `tb_cidades` VALUES (6884, 19, 'RJ', 'Sao Francisco de Itabapoana');

INSERT INTO `tb_cidades` VALUES (6885, 19, 'RJ', 'Sao Goncalo');

INSERT INTO `tb_cidades` VALUES (6886, 19, 'RJ', 'Sao Joao da Barra');

INSERT INTO `tb_cidades` VALUES (6887, 19, 'RJ', 'Sao Joao de Meriti');

INSERT INTO `tb_cidades` VALUES (6888, 19, 'RJ', 'Sao Joao do Paraiso');

INSERT INTO `tb_cidades` VALUES (6889, 19, 'RJ', 'Sao Joao Marcos');

INSERT INTO `tb_cidades` VALUES (6890, 19, 'RJ', 'Sao Joaquim');

INSERT INTO `tb_cidades` VALUES (6891, 19, 'RJ', 'Sao Jose de Uba');

INSERT INTO `tb_cidades` VALUES (6892, 19, 'RJ', 'Sao Jose do Ribeirao');

INSERT INTO `tb_cidades` VALUES (6893, 19, 'RJ', 'Sao Jose do Turvo');

INSERT INTO `tb_cidades` VALUES (6894, 19, 'RJ', 'Sao Jose do Vale do Rio Preto');

INSERT INTO `tb_cidades` VALUES (6895, 19, 'RJ', 'Sao Mateus');

INSERT INTO `tb_cidades` VALUES (6896, 19, 'RJ', 'Sao Pedro da Aldeia');

INSERT INTO `tb_cidades` VALUES (6897, 19, 'RJ', 'Sao Sebastiao de Campos');

INSERT INTO `tb_cidades` VALUES (6898, 19, 'RJ', 'Sao Sebastiao do Alto');

INSERT INTO `tb_cidades` VALUES (6899, 19, 'RJ', 'Sao Sebastiao do Paraiba');

INSERT INTO `tb_cidades` VALUES (6900, 19, 'RJ', 'Sao Sebastiao dos Ferreiros');

INSERT INTO `tb_cidades` VALUES (6901, 19, 'RJ', 'Sao Vicente de Paula');

INSERT INTO `tb_cidades` VALUES (6902, 19, 'RJ', 'Sapucaia');

INSERT INTO `tb_cidades` VALUES (6903, 19, 'RJ', 'Saquarema');

INSERT INTO `tb_cidades` VALUES (6904, 19, 'RJ', 'Saracuruna');

INSERT INTO `tb_cidades` VALUES (6905, 19, 'RJ', 'Sebastiao de Lacerda');

INSERT INTO `tb_cidades` VALUES (6906, 19, 'RJ', 'Seropedica');

INSERT INTO `tb_cidades` VALUES (6907, 19, 'RJ', 'Serrinha');

INSERT INTO `tb_cidades` VALUES (6908, 19, 'RJ', 'Sete Pontes');

INSERT INTO `tb_cidades` VALUES (6909, 19, 'RJ', 'Silva Jardim');

INSERT INTO `tb_cidades` VALUES (6910, 19, 'RJ', 'Sodrelandia');

INSERT INTO `tb_cidades` VALUES (6911, 19, 'RJ', 'Sossego');

INSERT INTO `tb_cidades` VALUES (6912, 19, 'RJ', 'Subaio');

INSERT INTO `tb_cidades` VALUES (6913, 19, 'RJ', 'Sumidouro');

INSERT INTO `tb_cidades` VALUES (6914, 19, 'RJ', 'Surui');

INSERT INTO `tb_cidades` VALUES (6915, 19, 'RJ', 'Taboas');

INSERT INTO `tb_cidades` VALUES (6916, 19, 'RJ', 'Tamoios');

INSERT INTO `tb_cidades` VALUES (6917, 19, 'RJ', 'Tangua');

INSERT INTO `tb_cidades` VALUES (6918, 19, 'RJ', 'Tapera');

INSERT INTO `tb_cidades` VALUES (6919, 19, 'RJ', 'Tarituba');

INSERT INTO `tb_cidades` VALUES (6920, 19, 'RJ', 'Teresopolis');

INSERT INTO `tb_cidades` VALUES (6921, 19, 'RJ', 'Tocos');

INSERT INTO `tb_cidades` VALUES (6922, 19, 'RJ', 'Trajano de Morais');

INSERT INTO `tb_cidades` VALUES (6923, 19, 'RJ', 'Travessao');

INSERT INTO `tb_cidades` VALUES (6924, 19, 'RJ', 'Tres Irmaos');

INSERT INTO `tb_cidades` VALUES (6925, 19, 'RJ', 'Tres Rios');

INSERT INTO `tb_cidades` VALUES (6926, 19, 'RJ', 'Triunfo');

INSERT INTO `tb_cidades` VALUES (6927, 19, 'RJ', 'Valao do Barro');

INSERT INTO `tb_cidades` VALUES (6928, 19, 'RJ', 'Valenca');

INSERT INTO `tb_cidades` VALUES (6929, 19, 'RJ', 'Vargem Alegre');

INSERT INTO `tb_cidades` VALUES (6930, 19, 'RJ', 'Varre-sai');

INSERT INTO `tb_cidades` VALUES (6931, 19, 'RJ', 'Vassouras');

INSERT INTO `tb_cidades` VALUES (6932, 19, 'RJ', 'Venda das Flores');

INSERT INTO `tb_cidades` VALUES (6933, 19, 'RJ', 'Venda das Pedras');

INSERT INTO `tb_cidades` VALUES (6934, 19, 'RJ', 'Vila da Grama');

INSERT INTO `tb_cidades` VALUES (6935, 19, 'RJ', 'Vila do Frade');

INSERT INTO `tb_cidades` VALUES (6936, 19, 'RJ', 'Vila Muriqui');

INSERT INTO `tb_cidades` VALUES (6937, 19, 'RJ', 'Vila Nova de Campos');

INSERT INTO `tb_cidades` VALUES (6938, 19, 'RJ', 'Visconde de Imbe');

INSERT INTO `tb_cidades` VALUES (6939, 19, 'RJ', 'Volta Redonda');

INSERT INTO `tb_cidades` VALUES (6940, 19, 'RJ', 'Werneck');

INSERT INTO `tb_cidades` VALUES (6941, 19, 'RJ', 'Xerem');

INSERT INTO `tb_cidades` VALUES (6942, 20, 'RN', 'Acari');

INSERT INTO `tb_cidades` VALUES (6943, 20, 'RN', 'Acu');

INSERT INTO `tb_cidades` VALUES (6944, 20, 'RN', 'Afonso Bezerra');

INSERT INTO `tb_cidades` VALUES (6945, 20, 'RN', 'Agua Nova');

INSERT INTO `tb_cidades` VALUES (6946, 20, 'RN', 'Alexandria');

INSERT INTO `tb_cidades` VALUES (6947, 20, 'RN', 'Almino Afonso');

INSERT INTO `tb_cidades` VALUES (6948, 20, 'RN', 'Alto do Rodrigues');

INSERT INTO `tb_cidades` VALUES (6949, 20, 'RN', 'Angicos');

INSERT INTO `tb_cidades` VALUES (6950, 20, 'RN', 'Antonio Martins');

INSERT INTO `tb_cidades` VALUES (6951, 20, 'RN', 'Apodi');

INSERT INTO `tb_cidades` VALUES (6952, 20, 'RN', 'Areia Branca');

INSERT INTO `tb_cidades` VALUES (6953, 20, 'RN', 'Ares');

INSERT INTO `tb_cidades` VALUES (6954, 20, 'RN', 'Baia Formosa');

INSERT INTO `tb_cidades` VALUES (6955, 20, 'RN', 'Barao de Serra Branca');

INSERT INTO `tb_cidades` VALUES (6956, 20, 'RN', 'Barauna');

INSERT INTO `tb_cidades` VALUES (6957, 20, 'RN', 'Barcelona');

INSERT INTO `tb_cidades` VALUES (6958, 20, 'RN', 'Belo Horizonte');

INSERT INTO `tb_cidades` VALUES (6959, 20, 'RN', 'Bento Fernandes');

INSERT INTO `tb_cidades` VALUES (6960, 20, 'RN', 'Boa Saude');

INSERT INTO `tb_cidades` VALUES (6961, 20, 'RN', 'Bodo');

INSERT INTO `tb_cidades` VALUES (6962, 20, 'RN', 'Bom Jesus');

INSERT INTO `tb_cidades` VALUES (6963, 20, 'RN', 'Brejinho');

INSERT INTO `tb_cidades` VALUES (6964, 20, 'RN', 'Caicara do Norte');

INSERT INTO `tb_cidades` VALUES (6965, 20, 'RN', 'Caicara do Rio do Vento');

INSERT INTO `tb_cidades` VALUES (6966, 20, 'RN', 'Caico');

INSERT INTO `tb_cidades` VALUES (6967, 20, 'RN', 'Campo Grande');

INSERT INTO `tb_cidades` VALUES (6968, 20, 'RN', 'Campo Redondo');

INSERT INTO `tb_cidades` VALUES (6969, 20, 'RN', 'Canguaretama');

INSERT INTO `tb_cidades` VALUES (6970, 20, 'RN', 'Caraubas');

INSERT INTO `tb_cidades` VALUES (6971, 20, 'RN', 'Carnauba dos Dantas');

INSERT INTO `tb_cidades` VALUES (6972, 20, 'RN', 'Carnaubais');

INSERT INTO `tb_cidades` VALUES (6973, 20, 'RN', 'Ceara-mirim');

INSERT INTO `tb_cidades` VALUES (6974, 20, 'RN', 'Cerro Cora');

INSERT INTO `tb_cidades` VALUES (6975, 20, 'RN', 'Coronel Ezequiel');

INSERT INTO `tb_cidades` VALUES (6976, 20, 'RN', 'Coronel Joao Pessoa');

INSERT INTO `tb_cidades` VALUES (6977, 20, 'RN', 'Corrego de Sao Mateus');

INSERT INTO `tb_cidades` VALUES (6978, 20, 'RN', 'Cruzeta');

INSERT INTO `tb_cidades` VALUES (6979, 20, 'RN', 'Currais Novos');

INSERT INTO `tb_cidades` VALUES (6980, 20, 'RN', 'Doutor Severiano');

INSERT INTO `tb_cidades` VALUES (6981, 20, 'RN', 'Encanto');

INSERT INTO `tb_cidades` VALUES (6982, 20, 'RN', 'Equador');

INSERT INTO `tb_cidades` VALUES (6983, 20, 'RN', 'Espirito Santo');

INSERT INTO `tb_cidades` VALUES (6984, 20, 'RN', 'Espirito Santo do Oeste');

INSERT INTO `tb_cidades` VALUES (6985, 20, 'RN', 'Extremoz');

INSERT INTO `tb_cidades` VALUES (6986, 20, 'RN', 'Felipe Guerra');

INSERT INTO `tb_cidades` VALUES (6987, 20, 'RN', 'Fernando Pedroza');

INSERT INTO `tb_cidades` VALUES (6988, 20, 'RN', 'Firmamento');

INSERT INTO `tb_cidades` VALUES (6989, 20, 'RN', 'Florania');

INSERT INTO `tb_cidades` VALUES (6990, 20, 'RN', 'Francisco Dantas');

INSERT INTO `tb_cidades` VALUES (6991, 20, 'RN', 'Frutuoso Gomes');

INSERT INTO `tb_cidades` VALUES (6992, 20, 'RN', 'Galinhos');

INSERT INTO `tb_cidades` VALUES (6993, 20, 'RN', 'Gameleira');

INSERT INTO `tb_cidades` VALUES (6994, 20, 'RN', 'Goianinha');

INSERT INTO `tb_cidades` VALUES (6995, 20, 'RN', 'Governador Dix-sept Rosado');

INSERT INTO `tb_cidades` VALUES (6996, 20, 'RN', 'Grossos');

INSERT INTO `tb_cidades` VALUES (6997, 20, 'RN', 'Guamare');

INSERT INTO `tb_cidades` VALUES (6998, 20, 'RN', 'Ielmo Marinho');

INSERT INTO `tb_cidades` VALUES (6999, 20, 'RN', 'Igreja Nova');

INSERT INTO `tb_cidades` VALUES (7000, 20, 'RN', 'Ipanguacu');

INSERT INTO `tb_cidades` VALUES (7001, 20, 'RN', 'Ipiranga');

INSERT INTO `tb_cidades` VALUES (7002, 20, 'RN', 'Ipueira');

INSERT INTO `tb_cidades` VALUES (7003, 20, 'RN', 'Itaja');

INSERT INTO `tb_cidades` VALUES (7004, 20, 'RN', 'Itau');

INSERT INTO `tb_cidades` VALUES (7005, 20, 'RN', 'Jacana');

INSERT INTO `tb_cidades` VALUES (7006, 20, 'RN', 'Jandaira');

INSERT INTO `tb_cidades` VALUES (7007, 20, 'RN', 'Janduis');

INSERT INTO `tb_cidades` VALUES (7008, 20, 'RN', 'Japi');

INSERT INTO `tb_cidades` VALUES (7009, 20, 'RN', 'Jardim de Angicos');

INSERT INTO `tb_cidades` VALUES (7010, 20, 'RN', 'Jardim de Piranhas');

INSERT INTO `tb_cidades` VALUES (7011, 20, 'RN', 'Jardim do Serido');

INSERT INTO `tb_cidades` VALUES (7012, 20, 'RN', 'Joao Camara');

INSERT INTO `tb_cidades` VALUES (7013, 20, 'RN', 'Joao Dias');

INSERT INTO `tb_cidades` VALUES (7014, 20, 'RN', 'Jose da Penha');

INSERT INTO `tb_cidades` VALUES (7015, 20, 'RN', 'Jucurutu');

INSERT INTO `tb_cidades` VALUES (7016, 20, 'RN', 'Jundia de Cima');

INSERT INTO `tb_cidades` VALUES (7017, 20, 'RN', 'Lagoa D''anta');

INSERT INTO `tb_cidades` VALUES (7018, 20, 'RN', 'Lagoa de Pedras');

INSERT INTO `tb_cidades` VALUES (7019, 20, 'RN', 'Lagoa de Velhos');

INSERT INTO `tb_cidades` VALUES (7020, 20, 'RN', 'Lagoa Nova');

INSERT INTO `tb_cidades` VALUES (7021, 20, 'RN', 'Lagoa Salgada');

INSERT INTO `tb_cidades` VALUES (7022, 20, 'RN', 'Lajes');

INSERT INTO `tb_cidades` VALUES (7023, 20, 'RN', 'Lajes Pintadas');

INSERT INTO `tb_cidades` VALUES (7024, 20, 'RN', 'Lucrecia');

INSERT INTO `tb_cidades` VALUES (7025, 20, 'RN', 'Luis Gomes');

INSERT INTO `tb_cidades` VALUES (7026, 20, 'RN', 'Macaiba');

INSERT INTO `tb_cidades` VALUES (7027, 20, 'RN', 'Macau');

INSERT INTO `tb_cidades` VALUES (7028, 20, 'RN', 'Major Felipe');

INSERT INTO `tb_cidades` VALUES (7029, 20, 'RN', 'Major Sales');

INSERT INTO `tb_cidades` VALUES (7030, 20, 'RN', 'Marcelino Vieira');

INSERT INTO `tb_cidades` VALUES (7031, 20, 'RN', 'Martins');

INSERT INTO `tb_cidades` VALUES (7032, 20, 'RN', 'Mata de Sao Braz');

INSERT INTO `tb_cidades` VALUES (7033, 20, 'RN', 'Maxaranguape');

INSERT INTO `tb_cidades` VALUES (7034, 20, 'RN', 'Messias Targino');

INSERT INTO `tb_cidades` VALUES (7035, 20, 'RN', 'Montanhas');

INSERT INTO `tb_cidades` VALUES (7036, 20, 'RN', 'Monte Alegre');

INSERT INTO `tb_cidades` VALUES (7037, 20, 'RN', 'Monte das Gameleiras');

INSERT INTO `tb_cidades` VALUES (7038, 20, 'RN', 'Mossoro');

INSERT INTO `tb_cidades` VALUES (7039, 20, 'RN', 'Natal');

INSERT INTO `tb_cidades` VALUES (7040, 20, 'RN', 'Nisia Floresta');

INSERT INTO `tb_cidades` VALUES (7041, 20, 'RN', 'Nova Cruz');

INSERT INTO `tb_cidades` VALUES (7042, 20, 'RN', 'Olho-d''agua Do Borges');

INSERT INTO `tb_cidades` VALUES (7043, 20, 'RN', 'Ouro Branco');

INSERT INTO `tb_cidades` VALUES (7044, 20, 'RN', 'Parana');

INSERT INTO `tb_cidades` VALUES (7045, 20, 'RN', 'Parazinho');

INSERT INTO `tb_cidades` VALUES (7046, 20, 'RN', 'Parelhas');

INSERT INTO `tb_cidades` VALUES (7047, 20, 'RN', 'Parnamirim');

INSERT INTO `tb_cidades` VALUES (7048, 20, 'RN', 'Passa E Fica');

INSERT INTO `tb_cidades` VALUES (7049, 20, 'RN', 'Passagem');

INSERT INTO `tb_cidades` VALUES (7050, 20, 'RN', 'Patu');

INSERT INTO `tb_cidades` VALUES (7051, 20, 'RN', 'Pau dos Ferros');

INSERT INTO `tb_cidades` VALUES (7052, 20, 'RN', 'Pedra Grande');

INSERT INTO `tb_cidades` VALUES (7053, 20, 'RN', 'Pedra Preta');

INSERT INTO `tb_cidades` VALUES (7054, 20, 'RN', 'Pedro Avelino');

INSERT INTO `tb_cidades` VALUES (7055, 20, 'RN', 'Pedro Velho');

INSERT INTO `tb_cidades` VALUES (7056, 20, 'RN', 'Pendencias');

INSERT INTO `tb_cidades` VALUES (7057, 20, 'RN', 'Piloes');

INSERT INTO `tb_cidades` VALUES (7058, 20, 'RN', 'Poco Branco');

INSERT INTO `tb_cidades` VALUES (7059, 20, 'RN', 'Portalegre');

INSERT INTO `tb_cidades` VALUES (7060, 20, 'RN', 'Porto do Mangue');

INSERT INTO `tb_cidades` VALUES (7061, 20, 'RN', 'Pureza');

INSERT INTO `tb_cidades` VALUES (7062, 20, 'RN', 'Rafael Fernandes');

INSERT INTO `tb_cidades` VALUES (7063, 20, 'RN', 'Rafael Godeiro');

INSERT INTO `tb_cidades` VALUES (7064, 20, 'RN', 'Riacho da Cruz');

INSERT INTO `tb_cidades` VALUES (7065, 20, 'RN', 'Riacho de Santana');

INSERT INTO `tb_cidades` VALUES (7066, 20, 'RN', 'Riachuelo');

INSERT INTO `tb_cidades` VALUES (7067, 20, 'RN', 'Rio do Fogo');

INSERT INTO `tb_cidades` VALUES (7068, 20, 'RN', 'Rodolfo Fernandes');

INSERT INTO `tb_cidades` VALUES (7069, 20, 'RN', 'Rosario');

INSERT INTO `tb_cidades` VALUES (7070, 20, 'RN', 'Ruy Barbosa');

INSERT INTO `tb_cidades` VALUES (7071, 20, 'RN', 'Salva Vida');

INSERT INTO `tb_cidades` VALUES (7072, 20, 'RN', 'Santa Cruz');

INSERT INTO `tb_cidades` VALUES (7073, 20, 'RN', 'Santa Fe');

INSERT INTO `tb_cidades` VALUES (7074, 20, 'RN', 'Santa Maria');

INSERT INTO `tb_cidades` VALUES (7075, 20, 'RN', 'Santa Teresa');

INSERT INTO `tb_cidades` VALUES (7076, 20, 'RN', 'Santana do Matos');

INSERT INTO `tb_cidades` VALUES (7077, 20, 'RN', 'Santana do Serido');

INSERT INTO `tb_cidades` VALUES (7078, 20, 'RN', 'Santo Antonio');

INSERT INTO `tb_cidades` VALUES (7079, 20, 'RN', 'Santo Antonio do Potengi');

INSERT INTO `tb_cidades` VALUES (7080, 20, 'RN', 'Sao Bento do Norte');

INSERT INTO `tb_cidades` VALUES (7081, 20, 'RN', 'Sao Bento do Trairi');

INSERT INTO `tb_cidades` VALUES (7082, 20, 'RN', 'Sao Bernardo');

INSERT INTO `tb_cidades` VALUES (7083, 20, 'RN', 'Sao Fernando');

INSERT INTO `tb_cidades` VALUES (7084, 20, 'RN', 'Sao Francisco do Oeste');

INSERT INTO `tb_cidades` VALUES (7085, 20, 'RN', 'Sao Geraldo');

INSERT INTO `tb_cidades` VALUES (7086, 20, 'RN', 'Sao Goncalo do Amarante');

INSERT INTO `tb_cidades` VALUES (7087, 20, 'RN', 'Sao Joao do Sabugi');

INSERT INTO `tb_cidades` VALUES (7088, 20, 'RN', 'Sao Jose da Passagem');

INSERT INTO `tb_cidades` VALUES (7089, 20, 'RN', 'Sao Jose de Mipibu');

INSERT INTO `tb_cidades` VALUES (7090, 20, 'RN', 'Sao Jose do Campestre');

INSERT INTO `tb_cidades` VALUES (7091, 20, 'RN', 'Sao Jose do Serido');

INSERT INTO `tb_cidades` VALUES (7092, 20, 'RN', 'Sao Miguel');

INSERT INTO `tb_cidades` VALUES (7093, 20, 'RN', 'Sao Miguel de Touros');

INSERT INTO `tb_cidades` VALUES (7094, 20, 'RN', 'Sao Paulo do Potengi');

INSERT INTO `tb_cidades` VALUES (7095, 20, 'RN', 'Sao Pedro');

INSERT INTO `tb_cidades` VALUES (7096, 20, 'RN', 'Sao Rafael');

INSERT INTO `tb_cidades` VALUES (7097, 20, 'RN', 'Sao Tome');

INSERT INTO `tb_cidades` VALUES (7098, 20, 'RN', 'Sao Vicente');

INSERT INTO `tb_cidades` VALUES (7099, 20, 'RN', 'Senador Eloi de Souza');

INSERT INTO `tb_cidades` VALUES (7100, 20, 'RN', 'Senador Georgino Avelino');

INSERT INTO `tb_cidades` VALUES (7101, 20, 'RN', 'Serra Caiada');

INSERT INTO `tb_cidades` VALUES (7102, 20, 'RN', 'Serra da Tapuia');

INSERT INTO `tb_cidades` VALUES (7103, 20, 'RN', 'Serra de Sao Bento');

INSERT INTO `tb_cidades` VALUES (7104, 20, 'RN', 'Serra do Mel');

INSERT INTO `tb_cidades` VALUES (7105, 20, 'RN', 'Serra Negra do Norte');

INSERT INTO `tb_cidades` VALUES (7106, 20, 'RN', 'Serrinha');

INSERT INTO `tb_cidades` VALUES (7107, 20, 'RN', 'Serrinha dos Pintos');

INSERT INTO `tb_cidades` VALUES (7108, 20, 'RN', 'Severiano Melo');

INSERT INTO `tb_cidades` VALUES (7109, 20, 'RN', 'Sitio Novo');

INSERT INTO `tb_cidades` VALUES (7110, 20, 'RN', 'Taboleiro Grande');

INSERT INTO `tb_cidades` VALUES (7111, 20, 'RN', 'Taipu');

INSERT INTO `tb_cidades` VALUES (7112, 20, 'RN', 'Tangara');

INSERT INTO `tb_cidades` VALUES (7113, 20, 'RN', 'Tenente Ananias');

INSERT INTO `tb_cidades` VALUES (7114, 20, 'RN', 'Tenente Laurentino Cruz');

INSERT INTO `tb_cidades` VALUES (7115, 20, 'RN', 'Tibau');

INSERT INTO `tb_cidades` VALUES (7116, 20, 'RN', 'Tibau do Sul');

INSERT INTO `tb_cidades` VALUES (7117, 20, 'RN', 'Timbauba dos Batistas');

INSERT INTO `tb_cidades` VALUES (7118, 20, 'RN', 'Touros');

INSERT INTO `tb_cidades` VALUES (7119, 20, 'RN', 'Trairi');

INSERT INTO `tb_cidades` VALUES (7120, 20, 'RN', 'Triunfo Potiguar');

INSERT INTO `tb_cidades` VALUES (7121, 20, 'RN', 'Umarizal');

INSERT INTO `tb_cidades` VALUES (7122, 20, 'RN', 'Upanema');

INSERT INTO `tb_cidades` VALUES (7123, 20, 'RN', 'Varzea');

INSERT INTO `tb_cidades` VALUES (7124, 20, 'RN', 'Venha-ver');

INSERT INTO `tb_cidades` VALUES (7125, 20, 'RN', 'Vera Cruz');

INSERT INTO `tb_cidades` VALUES (7126, 20, 'RN', 'Vicosa');

INSERT INTO `tb_cidades` VALUES (7127, 20, 'RN', 'Vila Flor');

INSERT INTO `tb_cidades` VALUES (7128, 21, 'RO', 'Abuna');

INSERT INTO `tb_cidades` VALUES (7129, 21, 'RO', 'Alta Alegre dos Parecis');

INSERT INTO `tb_cidades` VALUES (7130, 21, 'RO', 'Alta Floresta do Oeste');

INSERT INTO `tb_cidades` VALUES (7131, 21, 'RO', 'Alto Paraiso');

INSERT INTO `tb_cidades` VALUES (7132, 21, 'RO', 'Alvorada do Oeste');

INSERT INTO `tb_cidades` VALUES (7133, 21, 'RO', 'Ariquemes');

INSERT INTO `tb_cidades` VALUES (7134, 21, 'RO', 'Buritis');

INSERT INTO `tb_cidades` VALUES (7135, 21, 'RO', 'Cabixi');

INSERT INTO `tb_cidades` VALUES (7136, 21, 'RO', 'Cacaulandia');

INSERT INTO `tb_cidades` VALUES (7137, 21, 'RO', 'Cacoal');

INSERT INTO `tb_cidades` VALUES (7138, 21, 'RO', 'Calama');

INSERT INTO `tb_cidades` VALUES (7139, 21, 'RO', 'Campo Novo de Rondonia');

INSERT INTO `tb_cidades` VALUES (7140, 21, 'RO', 'Candeias do Jamari');

INSERT INTO `tb_cidades` VALUES (7141, 21, 'RO', 'Castanheiras');

INSERT INTO `tb_cidades` VALUES (7142, 21, 'RO', 'Cerejeiras');

INSERT INTO `tb_cidades` VALUES (7143, 21, 'RO', 'Chupinguaia');

INSERT INTO `tb_cidades` VALUES (7144, 21, 'RO', 'Colorado do Oeste');

INSERT INTO `tb_cidades` VALUES (7145, 21, 'RO', 'Corumbiara');

INSERT INTO `tb_cidades` VALUES (7146, 21, 'RO', 'Costa Marques');

INSERT INTO `tb_cidades` VALUES (7147, 21, 'RO', 'Cujubim');

INSERT INTO `tb_cidades` VALUES (7148, 21, 'RO', 'Espigao D''oeste');

INSERT INTO `tb_cidades` VALUES (7149, 21, 'RO', 'Governador Jorge Teixeira');

INSERT INTO `tb_cidades` VALUES (7150, 21, 'RO', 'Guajara-mirim');

INSERT INTO `tb_cidades` VALUES (7151, 21, 'RO', 'Jaci Parana');

INSERT INTO `tb_cidades` VALUES (7152, 21, 'RO', 'Jamari');

INSERT INTO `tb_cidades` VALUES (7153, 21, 'RO', 'Jaru');

INSERT INTO `tb_cidades` VALUES (7154, 21, 'RO', 'Ji-parana');

INSERT INTO `tb_cidades` VALUES (7155, 21, 'RO', 'Machadinho D''oeste');

INSERT INTO `tb_cidades` VALUES (7156, 21, 'RO', 'Marco Rondon');

INSERT INTO `tb_cidades` VALUES (7157, 21, 'RO', 'Ministro Andreazza');

INSERT INTO `tb_cidades` VALUES (7158, 21, 'RO', 'Mirante da Serra');

INSERT INTO `tb_cidades` VALUES (7159, 21, 'RO', 'Monte Negro');

INSERT INTO `tb_cidades` VALUES (7160, 21, 'RO', 'Nova Brasilandia D''oeste');

INSERT INTO `tb_cidades` VALUES (7161, 21, 'RO', 'Nova Mamore');

INSERT INTO `tb_cidades` VALUES (7162, 21, 'RO', 'Nova Uniao');

INSERT INTO `tb_cidades` VALUES (7163, 21, 'RO', 'Nova Vida');

INSERT INTO `tb_cidades` VALUES (7164, 21, 'RO', 'Novo Horizonte do Oeste');

INSERT INTO `tb_cidades` VALUES (7165, 21, 'RO', 'Ouro Preto do Oeste');

INSERT INTO `tb_cidades` VALUES (7166, 21, 'RO', 'Parecis');

INSERT INTO `tb_cidades` VALUES (7167, 21, 'RO', 'Pedras Negras');

INSERT INTO `tb_cidades` VALUES (7168, 21, 'RO', 'Pimenta Bueno');

INSERT INTO `tb_cidades` VALUES (7169, 21, 'RO', 'Pimenteiras do Oeste');

INSERT INTO `tb_cidades` VALUES (7170, 21, 'RO', 'Porto Velho');

INSERT INTO `tb_cidades` VALUES (7171, 21, 'RO', 'Presidente Medici');

INSERT INTO `tb_cidades` VALUES (7172, 21, 'RO', 'Primavera de Rondonia');

INSERT INTO `tb_cidades` VALUES (7173, 21, 'RO', 'Principe da Beira');

INSERT INTO `tb_cidades` VALUES (7174, 21, 'RO', 'Rio Crespo');

INSERT INTO `tb_cidades` VALUES (7175, 21, 'RO', 'Riozinho');

INSERT INTO `tb_cidades` VALUES (7176, 21, 'RO', 'Rolim de Moura');

INSERT INTO `tb_cidades` VALUES (7177, 21, 'RO', 'Santa Luzia do Oeste');

INSERT INTO `tb_cidades` VALUES (7178, 21, 'RO', 'Sao Felipe D''oeste');

INSERT INTO `tb_cidades` VALUES (7179, 21, 'RO', 'Sao Francisco do Guapore');

INSERT INTO `tb_cidades` VALUES (7180, 21, 'RO', 'Sao Miguel do Guapore');

INSERT INTO `tb_cidades` VALUES (7181, 21, 'RO', 'Seringueiras');

INSERT INTO `tb_cidades` VALUES (7182, 21, 'RO', 'Tabajara');

INSERT INTO `tb_cidades` VALUES (7183, 21, 'RO', 'Teixeiropolis');

INSERT INTO `tb_cidades` VALUES (7184, 21, 'RO', 'Theobroma');

INSERT INTO `tb_cidades` VALUES (7185, 21, 'RO', 'Urupa');

INSERT INTO `tb_cidades` VALUES (7186, 21, 'RO', 'Vale do Anari');

INSERT INTO `tb_cidades` VALUES (7187, 21, 'RO', 'Vale do Paraiso');

INSERT INTO `tb_cidades` VALUES (7188, 21, 'RO', 'Vila Extrema');

INSERT INTO `tb_cidades` VALUES (7189, 21, 'RO', 'Vilhena');

INSERT INTO `tb_cidades` VALUES (7190, 21, 'RO', 'Vista Alegre do Abuna');

INSERT INTO `tb_cidades` VALUES (7191, 22, 'RR', 'Alto Alegre');

INSERT INTO `tb_cidades` VALUES (7192, 22, 'RR', 'Amajari');

INSERT INTO `tb_cidades` VALUES (7193, 22, 'RR', 'Boa Vista');

INSERT INTO `tb_cidades` VALUES (7194, 22, 'RR', 'Bonfim');

INSERT INTO `tb_cidades` VALUES (7195, 22, 'RR', 'Canta');

INSERT INTO `tb_cidades` VALUES (7196, 22, 'RR', 'Caracarai');

INSERT INTO `tb_cidades` VALUES (7197, 22, 'RR', 'Caroebe');

INSERT INTO `tb_cidades` VALUES (7198, 22, 'RR', 'Iracema');

INSERT INTO `tb_cidades` VALUES (7199, 22, 'RR', 'Mucajai');

INSERT INTO `tb_cidades` VALUES (7200, 22, 'RR', 'Normandia');

INSERT INTO `tb_cidades` VALUES (7201, 22, 'RR', 'Pacaraima');

INSERT INTO `tb_cidades` VALUES (7202, 22, 'RR', 'Rorainopolis');

INSERT INTO `tb_cidades` VALUES (7203, 22, 'RR', 'Sao Joao da Baliza');

INSERT INTO `tb_cidades` VALUES (7204, 22, 'RR', 'Sao Luiz');

INSERT INTO `tb_cidades` VALUES (7205, 22, 'RR', 'Uiramuta');

INSERT INTO `tb_cidades` VALUES (7206, 23, 'RS', 'Acegua');

INSERT INTO `tb_cidades` VALUES (7207, 23, 'RS', 'Afonso Rodrigues');

INSERT INTO `tb_cidades` VALUES (7208, 23, 'RS', 'Agua Santa');

INSERT INTO `tb_cidades` VALUES (7209, 23, 'RS', 'Aguas Claras');

INSERT INTO `tb_cidades` VALUES (7210, 23, 'RS', 'Agudo');

INSERT INTO `tb_cidades` VALUES (7211, 23, 'RS', 'Ajuricaba');

INSERT INTO `tb_cidades` VALUES (7212, 23, 'RS', 'Albardao');

INSERT INTO `tb_cidades` VALUES (7213, 23, 'RS', 'Alecrim');

INSERT INTO `tb_cidades` VALUES (7214, 23, 'RS', 'Alegrete');

INSERT INTO `tb_cidades` VALUES (7215, 23, 'RS', 'Alegria');

INSERT INTO `tb_cidades` VALUES (7216, 23, 'RS', 'Alfredo Brenner');

INSERT INTO `tb_cidades` VALUES (7217, 23, 'RS', 'Almirante Tamandare');

INSERT INTO `tb_cidades` VALUES (7218, 23, 'RS', 'Alpestre');

INSERT INTO `tb_cidades` VALUES (7219, 23, 'RS', 'Alto Alegre');

INSERT INTO `tb_cidades` VALUES (7220, 23, 'RS', 'Alto da Uniao');

INSERT INTO `tb_cidades` VALUES (7221, 23, 'RS', 'Alto Feliz');

INSERT INTO `tb_cidades` VALUES (7222, 23, 'RS', 'Alto Paredao');

INSERT INTO `tb_cidades` VALUES (7223, 23, 'RS', 'Alto Recreio');

INSERT INTO `tb_cidades` VALUES (7224, 23, 'RS', 'Alto Uruguai');

INSERT INTO `tb_cidades` VALUES (7225, 23, 'RS', 'Alvorada');

INSERT INTO `tb_cidades` VALUES (7226, 23, 'RS', 'Amaral Ferrador');

INSERT INTO `tb_cidades` VALUES (7227, 23, 'RS', 'Ametista do Sul');

INSERT INTO `tb_cidades` VALUES (7228, 23, 'RS', 'Andre da Rocha');

INSERT INTO `tb_cidades` VALUES (7229, 23, 'RS', 'Anta Gorda');

INSERT INTO `tb_cidades` VALUES (7230, 23, 'RS', 'Antonio Kerpel');

INSERT INTO `tb_cidades` VALUES (7231, 23, 'RS', 'Antonio Prado');

INSERT INTO `tb_cidades` VALUES (7232, 23, 'RS', 'Arambare');

INSERT INTO `tb_cidades` VALUES (7233, 23, 'RS', 'Ararica');

INSERT INTO `tb_cidades` VALUES (7234, 23, 'RS', 'Aratiba');

INSERT INTO `tb_cidades` VALUES (7235, 23, 'RS', 'Arco Verde');

INSERT INTO `tb_cidades` VALUES (7236, 23, 'RS', 'Arco-iris');

INSERT INTO `tb_cidades` VALUES (7237, 23, 'RS', 'Arroio Canoas');

INSERT INTO `tb_cidades` VALUES (7238, 23, 'RS', 'Arroio do Meio');

INSERT INTO `tb_cidades` VALUES (7239, 23, 'RS', 'Arroio do Padre');

INSERT INTO `tb_cidades` VALUES (7240, 23, 'RS', 'Arroio do Sal');

INSERT INTO `tb_cidades` VALUES (7241, 23, 'RS', 'Arroio do So');

INSERT INTO `tb_cidades` VALUES (7242, 23, 'RS', 'Arroio do Tigre');

INSERT INTO `tb_cidades` VALUES (7243, 23, 'RS', 'Arroio dos Ratos');

INSERT INTO `tb_cidades` VALUES (7244, 23, 'RS', 'Arroio Grande');

INSERT INTO `tb_cidades` VALUES (7245, 23, 'RS', 'Arvore So');

INSERT INTO `tb_cidades` VALUES (7246, 23, 'RS', 'Arvorezinha');

INSERT INTO `tb_cidades` VALUES (7247, 23, 'RS', 'Atafona');

INSERT INTO `tb_cidades` VALUES (7248, 23, 'RS', 'Atiacu');

INSERT INTO `tb_cidades` VALUES (7249, 23, 'RS', 'Augusto Pestana');

INSERT INTO `tb_cidades` VALUES (7250, 23, 'RS', 'Aurea');

INSERT INTO `tb_cidades` VALUES (7251, 23, 'RS', 'Avelino Paranhos');

INSERT INTO `tb_cidades` VALUES (7252, 23, 'RS', 'Azevedo Sodre');

INSERT INTO `tb_cidades` VALUES (7253, 23, 'RS', 'Bacupari');

INSERT INTO `tb_cidades` VALUES (7254, 23, 'RS', 'Bage');

INSERT INTO `tb_cidades` VALUES (7255, 23, 'RS', 'Baliza');

INSERT INTO `tb_cidades` VALUES (7256, 23, 'RS', 'Balneario Pinhal');

INSERT INTO `tb_cidades` VALUES (7257, 23, 'RS', 'Banhado do Colegio');

INSERT INTO `tb_cidades` VALUES (7258, 23, 'RS', 'Barao');

INSERT INTO `tb_cidades` VALUES (7259, 23, 'RS', 'Barao de Cotegipe');

INSERT INTO `tb_cidades` VALUES (7260, 23, 'RS', 'Barao do Triunfo');

INSERT INTO `tb_cidades` VALUES (7261, 23, 'RS', 'Barra do Guarita');

INSERT INTO `tb_cidades` VALUES (7262, 23, 'RS', 'Barra do Ouro');

INSERT INTO `tb_cidades` VALUES (7263, 23, 'RS', 'Barra do Quarai');

INSERT INTO `tb_cidades` VALUES (7264, 23, 'RS', 'Barra do Ribeiro');

INSERT INTO `tb_cidades` VALUES (7265, 23, 'RS', 'Barra do Rio Azul');

INSERT INTO `tb_cidades` VALUES (7266, 23, 'RS', 'Barra Funda');

INSERT INTO `tb_cidades` VALUES (7267, 23, 'RS', 'Barracao');

INSERT INTO `tb_cidades` VALUES (7268, 23, 'RS', 'Barreirinho');

INSERT INTO `tb_cidades` VALUES (7269, 23, 'RS', 'Barreiro');

INSERT INTO `tb_cidades` VALUES (7270, 23, 'RS', 'Barro Preto');

INSERT INTO `tb_cidades` VALUES (7271, 23, 'RS', 'Barro Vermelho');

INSERT INTO `tb_cidades` VALUES (7272, 23, 'RS', 'Barros Cassal');

INSERT INTO `tb_cidades` VALUES (7273, 23, 'RS', 'Basilio');

INSERT INTO `tb_cidades` VALUES (7274, 23, 'RS', 'Bela Vista');

INSERT INTO `tb_cidades` VALUES (7275, 23, 'RS', 'Beluno');

INSERT INTO `tb_cidades` VALUES (7276, 23, 'RS', 'Benjamin Constant do Sul');

INSERT INTO `tb_cidades` VALUES (7277, 23, 'RS', 'Bento Goncalves');

INSERT INTO `tb_cidades` VALUES (7278, 23, 'RS', 'Bexiga');

INSERT INTO `tb_cidades` VALUES (7279, 23, 'RS', 'Boa Esperanca');

INSERT INTO `tb_cidades` VALUES (7280, 23, 'RS', 'Boa Vista');

INSERT INTO `tb_cidades` VALUES (7281, 23, 'RS', 'Boa Vista das Missoes');

INSERT INTO `tb_cidades` VALUES (7282, 23, 'RS', 'Boa Vista do Burica');

INSERT INTO `tb_cidades` VALUES (7283, 23, 'RS', 'Boa Vista do Cadeado');

INSERT INTO `tb_cidades` VALUES (7284, 23, 'RS', 'Boa Vista do Incra');

INSERT INTO `tb_cidades` VALUES (7285, 23, 'RS', 'Boa Vista do Sul');

INSERT INTO `tb_cidades` VALUES (7286, 23, 'RS', 'Boca do Monte');

INSERT INTO `tb_cidades` VALUES (7287, 23, 'RS', 'Boi Preto');

INSERT INTO `tb_cidades` VALUES (7288, 23, 'RS', 'Bojuru');

INSERT INTO `tb_cidades` VALUES (7289, 23, 'RS', 'Bom Jardim');

INSERT INTO `tb_cidades` VALUES (7290, 23, 'RS', 'Bom Jesus');

INSERT INTO `tb_cidades` VALUES (7291, 23, 'RS', 'Bom Principio');

INSERT INTO `tb_cidades` VALUES (7292, 23, 'RS', 'Bom Progresso');

INSERT INTO `tb_cidades` VALUES (7293, 23, 'RS', 'Bom Retiro');

INSERT INTO `tb_cidades` VALUES (7294, 23, 'RS', 'Bom Retiro do Guaiba');

INSERT INTO `tb_cidades` VALUES (7295, 23, 'RS', 'Bom Retiro do Sul');

INSERT INTO `tb_cidades` VALUES (7296, 23, 'RS', 'Bonito');

INSERT INTO `tb_cidades` VALUES (7297, 23, 'RS', 'Boqueirao');

INSERT INTO `tb_cidades` VALUES (7298, 23, 'RS', 'Boqueirao do Leao');

INSERT INTO `tb_cidades` VALUES (7299, 23, 'RS', 'Borore');

INSERT INTO `tb_cidades` VALUES (7300, 23, 'RS', 'Bossoroca');

INSERT INTO `tb_cidades` VALUES (7301, 23, 'RS', 'Botucarai');

INSERT INTO `tb_cidades` VALUES (7302, 23, 'RS', 'Braga');

INSERT INTO `tb_cidades` VALUES (7303, 23, 'RS', 'Brochier');

INSERT INTO `tb_cidades` VALUES (7304, 23, 'RS', 'Buriti');

INSERT INTO `tb_cidades` VALUES (7305, 23, 'RS', 'Butia');

INSERT INTO `tb_cidades` VALUES (7306, 23, 'RS', 'Butias');

INSERT INTO `tb_cidades` VALUES (7307, 23, 'RS', 'Cacapava do Sul');

INSERT INTO `tb_cidades` VALUES (7308, 23, 'RS', 'Cacequi');

INSERT INTO `tb_cidades` VALUES (7309, 23, 'RS', 'Cachoeira do Sul');

INSERT INTO `tb_cidades` VALUES (7310, 23, 'RS', 'Cachoeirinha');

INSERT INTO `tb_cidades` VALUES (7311, 23, 'RS', 'Cacique Doble');

INSERT INTO `tb_cidades` VALUES (7312, 23, 'RS', 'Cadorna');

INSERT INTO `tb_cidades` VALUES (7313, 23, 'RS', 'Caibate');

INSERT INTO `tb_cidades` VALUES (7314, 23, 'RS', 'Caicara');

INSERT INTO `tb_cidades` VALUES (7315, 23, 'RS', 'Camaqua');

INSERT INTO `tb_cidades` VALUES (7316, 23, 'RS', 'Camargo');

INSERT INTO `tb_cidades` VALUES (7317, 23, 'RS', 'Cambara do Sul');

INSERT INTO `tb_cidades` VALUES (7318, 23, 'RS', 'Camobi');

INSERT INTO `tb_cidades` VALUES (7319, 23, 'RS', 'Campestre Baixo');

INSERT INTO `tb_cidades` VALUES (7320, 23, 'RS', 'Campestre da Serra');

INSERT INTO `tb_cidades` VALUES (7321, 23, 'RS', 'Campina das Missoes');

INSERT INTO `tb_cidades` VALUES (7322, 23, 'RS', 'Campina Redonda');

INSERT INTO `tb_cidades` VALUES (7323, 23, 'RS', 'Campinas');

INSERT INTO `tb_cidades` VALUES (7324, 23, 'RS', 'Campinas do Sul');

INSERT INTO `tb_cidades` VALUES (7325, 23, 'RS', 'Campo Bom');

INSERT INTO `tb_cidades` VALUES (7326, 23, 'RS', 'Campo Branco');

INSERT INTO `tb_cidades` VALUES (7327, 23, 'RS', 'Campo do Meio');

INSERT INTO `tb_cidades` VALUES (7328, 23, 'RS', 'Campo Novo');

INSERT INTO `tb_cidades` VALUES (7329, 23, 'RS', 'Campo Santo');

INSERT INTO `tb_cidades` VALUES (7330, 23, 'RS', 'Campo Seco');

INSERT INTO `tb_cidades` VALUES (7331, 23, 'RS', 'Campo Vicente');

INSERT INTO `tb_cidades` VALUES (7332, 23, 'RS', 'Campos Borges');

INSERT INTO `tb_cidades` VALUES (7333, 23, 'RS', 'Candelaria');

INSERT INTO `tb_cidades` VALUES (7334, 23, 'RS', 'Candido Freire');

INSERT INTO `tb_cidades` VALUES (7335, 23, 'RS', 'Candido Godoi');

INSERT INTO `tb_cidades` VALUES (7336, 23, 'RS', 'Candiota');

INSERT INTO `tb_cidades` VALUES (7337, 23, 'RS', 'Canela');

INSERT INTO `tb_cidades` VALUES (7338, 23, 'RS', 'Cangucu');

INSERT INTO `tb_cidades` VALUES (7339, 23, 'RS', 'Canhembora');

INSERT INTO `tb_cidades` VALUES (7340, 23, 'RS', 'Canoas');

INSERT INTO `tb_cidades` VALUES (7341, 23, 'RS', 'Canudos');

INSERT INTO `tb_cidades` VALUES (7342, 23, 'RS', 'Capane');

INSERT INTO `tb_cidades` VALUES (7343, 23, 'RS', 'Capao Bonito');

INSERT INTO `tb_cidades` VALUES (7344, 23, 'RS', 'Capao Comprido');

INSERT INTO `tb_cidades` VALUES (7345, 23, 'RS', 'Capao da Canoa');

INSERT INTO `tb_cidades` VALUES (7346, 23, 'RS', 'Capao da Porteira');

INSERT INTO `tb_cidades` VALUES (7347, 23, 'RS', 'Capao do Cedro');

INSERT INTO `tb_cidades` VALUES (7348, 23, 'RS', 'Capao do Cipo');

INSERT INTO `tb_cidades` VALUES (7349, 23, 'RS', 'Capao do Leao');

INSERT INTO `tb_cidades` VALUES (7350, 23, 'RS', 'Capela de Santana');

INSERT INTO `tb_cidades` VALUES (7351, 23, 'RS', 'Capela Velha');

INSERT INTO `tb_cidades` VALUES (7352, 23, 'RS', 'Capinzal');

INSERT INTO `tb_cidades` VALUES (7353, 23, 'RS', 'Capitao');

INSERT INTO `tb_cidades` VALUES (7354, 23, 'RS', 'Capivari do Sul');

INSERT INTO `tb_cidades` VALUES (7355, 23, 'RS', 'Capivarita');

INSERT INTO `tb_cidades` VALUES (7356, 23, 'RS', 'Capo-ere');

INSERT INTO `tb_cidades` VALUES (7357, 23, 'RS', 'Capoeira Grande');

INSERT INTO `tb_cidades` VALUES (7358, 23, 'RS', 'Caraa');

INSERT INTO `tb_cidades` VALUES (7359, 23, 'RS', 'Caraja Seival');

INSERT INTO `tb_cidades` VALUES (7360, 23, 'RS', 'Carazinho');

INSERT INTO `tb_cidades` VALUES (7361, 23, 'RS', 'Carlos Barbosa');

INSERT INTO `tb_cidades` VALUES (7362, 23, 'RS', 'Carlos Gomes');

INSERT INTO `tb_cidades` VALUES (7363, 23, 'RS', 'Carovi');

INSERT INTO `tb_cidades` VALUES (7364, 23, 'RS', 'Casca');

INSERT INTO `tb_cidades` VALUES (7365, 23, 'RS', 'Cascata');

INSERT INTO `tb_cidades` VALUES (7366, 23, 'RS', 'Caseiros');

INSERT INTO `tb_cidades` VALUES (7367, 23, 'RS', 'Castelinho');

INSERT INTO `tb_cidades` VALUES (7368, 23, 'RS', 'Catuipe');

INSERT INTO `tb_cidades` VALUES (7369, 23, 'RS', 'Cavajureta');

INSERT INTO `tb_cidades` VALUES (7370, 23, 'RS', 'Cavera');

INSERT INTO `tb_cidades` VALUES (7371, 23, 'RS', 'Caxias do Sul');

INSERT INTO `tb_cidades` VALUES (7372, 23, 'RS', 'Cazuza Ferreira');

INSERT INTO `tb_cidades` VALUES (7373, 23, 'RS', 'Cedro Marcado');

INSERT INTO `tb_cidades` VALUES (7374, 23, 'RS', 'Centenario');

INSERT INTO `tb_cidades` VALUES (7375, 23, 'RS', 'Centro Linha Brasil');

INSERT INTO `tb_cidades` VALUES (7376, 23, 'RS', 'Cerrito');

INSERT INTO `tb_cidades` VALUES (7377, 23, 'RS', 'Cerrito Alegre');

INSERT INTO `tb_cidades` VALUES (7378, 23, 'RS', 'Cerrito do Ouro Ou Vila do Cerrito');

INSERT INTO `tb_cidades` VALUES (7379, 23, 'RS', 'Cerro Alto');

INSERT INTO `tb_cidades` VALUES (7380, 23, 'RS', 'Cerro Branco');

INSERT INTO `tb_cidades` VALUES (7381, 23, 'RS', 'Cerro Claro');

INSERT INTO `tb_cidades` VALUES (7382, 23, 'RS', 'Cerro do Martins');

INSERT INTO `tb_cidades` VALUES (7383, 23, 'RS', 'Cerro do Roque');

INSERT INTO `tb_cidades` VALUES (7384, 23, 'RS', 'Cerro Grande');

INSERT INTO `tb_cidades` VALUES (7385, 23, 'RS', 'Cerro Grande do Sul');

INSERT INTO `tb_cidades` VALUES (7386, 23, 'RS', 'Cerro Largo');

INSERT INTO `tb_cidades` VALUES (7387, 23, 'RS', 'Chapada');

INSERT INTO `tb_cidades` VALUES (7388, 23, 'RS', 'Charqueadas');

INSERT INTO `tb_cidades` VALUES (7389, 23, 'RS', 'Charrua');

INSERT INTO `tb_cidades` VALUES (7390, 23, 'RS', 'Chiapetta');

INSERT INTO `tb_cidades` VALUES (7391, 23, 'RS', 'Chicoloma');

INSERT INTO `tb_cidades` VALUES (7392, 23, 'RS', 'Chimarrao');

INSERT INTO `tb_cidades` VALUES (7393, 23, 'RS', 'Chorao');

INSERT INTO `tb_cidades` VALUES (7394, 23, 'RS', 'Chui');

INSERT INTO `tb_cidades` VALUES (7395, 23, 'RS', 'Chuvisca');

INSERT INTO `tb_cidades` VALUES (7396, 23, 'RS', 'Cidreira');

INSERT INTO `tb_cidades` VALUES (7397, 23, 'RS', 'Cinquentenario');

INSERT INTO `tb_cidades` VALUES (7398, 23, 'RS', 'Ciriaco');

INSERT INTO `tb_cidades` VALUES (7399, 23, 'RS', 'Clara');

INSERT INTO `tb_cidades` VALUES (7400, 23, 'RS', 'Clemente Argolo');

INSERT INTO `tb_cidades` VALUES (7401, 23, 'RS', 'Coimbra');

INSERT INTO `tb_cidades` VALUES (7402, 23, 'RS', 'Colinas');

INSERT INTO `tb_cidades` VALUES (7403, 23, 'RS', 'Colonia das Almas');

INSERT INTO `tb_cidades` VALUES (7404, 23, 'RS', 'Colonia Medeiros');

INSERT INTO `tb_cidades` VALUES (7405, 23, 'RS', 'Colonia Municipal');

INSERT INTO `tb_cidades` VALUES (7406, 23, 'RS', 'Colonia Nova');

INSERT INTO `tb_cidades` VALUES (7407, 23, 'RS', 'Colonia Sao Joao');

INSERT INTO `tb_cidades` VALUES (7408, 23, 'RS', 'Colonia Z-null');

INSERT INTO `tb_cidades` VALUES (7409, 23, 'RS', 'Coloninha');

INSERT INTO `tb_cidades` VALUES (7410, 23, 'RS', 'Colorado');

INSERT INTO `tb_cidades` VALUES (7411, 23, 'RS', 'Comandai');

INSERT INTO `tb_cidades` VALUES (7412, 23, 'RS', 'Condor');

INSERT INTO `tb_cidades` VALUES (7413, 23, 'RS', 'Consolata');

INSERT INTO `tb_cidades` VALUES (7414, 23, 'RS', 'Constantina');

INSERT INTO `tb_cidades` VALUES (7415, 23, 'RS', 'Coqueiro Baixo');

INSERT INTO `tb_cidades` VALUES (7416, 23, 'RS', 'Coqueiros do Sul');

INSERT INTO `tb_cidades` VALUES (7417, 23, 'RS', 'Cordilheira');

INSERT INTO `tb_cidades` VALUES (7418, 23, 'RS', 'Coroados');

INSERT INTO `tb_cidades` VALUES (7419, 23, 'RS', 'Coronel Barros');

INSERT INTO `tb_cidades` VALUES (7420, 23, 'RS', 'Coronel Bicaco');

INSERT INTO `tb_cidades` VALUES (7421, 23, 'RS', 'Coronel Finzito');

INSERT INTO `tb_cidades` VALUES (7422, 23, 'RS', 'Coronel Pilar');

INSERT INTO `tb_cidades` VALUES (7423, 23, 'RS', 'Coronel Teixeira');

INSERT INTO `tb_cidades` VALUES (7424, 23, 'RS', 'Cortado');

INSERT INTO `tb_cidades` VALUES (7425, 23, 'RS', 'Costa da Cadeia');

INSERT INTO `tb_cidades` VALUES (7426, 23, 'RS', 'Costao');

INSERT INTO `tb_cidades` VALUES (7427, 23, 'RS', 'Cotipora');

INSERT INTO `tb_cidades` VALUES (7428, 23, 'RS', 'Coxilha');

INSERT INTO `tb_cidades` VALUES (7429, 23, 'RS', 'Coxilha Grande');

INSERT INTO `tb_cidades` VALUES (7430, 23, 'RS', 'Cr-null');

INSERT INTO `tb_cidades` VALUES (7431, 23, 'RS', 'Crissiumal');

INSERT INTO `tb_cidades` VALUES (7432, 23, 'RS', 'Cristal');

INSERT INTO `tb_cidades` VALUES (7433, 23, 'RS', 'Cristal do Sul');

INSERT INTO `tb_cidades` VALUES (7434, 23, 'RS', 'Criuva');

INSERT INTO `tb_cidades` VALUES (7435, 23, 'RS', 'Cruz Alta');

INSERT INTO `tb_cidades` VALUES (7436, 23, 'RS', 'Cruz Altense');

INSERT INTO `tb_cidades` VALUES (7437, 23, 'RS', 'Cruzeiro');

INSERT INTO `tb_cidades` VALUES (7438, 23, 'RS', 'Cruzeiro do Sul');

INSERT INTO `tb_cidades` VALUES (7439, 23, 'RS', 'Curral Alto');

INSERT INTO `tb_cidades` VALUES (7440, 23, 'RS', 'Curumim');

INSERT INTO `tb_cidades` VALUES (7441, 23, 'RS', 'Daltro Filho');

INSERT INTO `tb_cidades` VALUES (7442, 23, 'RS', 'Dario Lassance');

INSERT INTO `tb_cidades` VALUES (7443, 23, 'RS', 'David Canabarro');

INSERT INTO `tb_cidades` VALUES (7444, 23, 'RS', 'Delfina');

INSERT INTO `tb_cidades` VALUES (7445, 23, 'RS', 'Deodoro');

INSERT INTO `tb_cidades` VALUES (7446, 23, 'RS', 'Deposito');

INSERT INTO `tb_cidades` VALUES (7447, 23, 'RS', 'Derrubadas');

INSERT INTO `tb_cidades` VALUES (7448, 23, 'RS', 'Dezesseis de Novembro');

INSERT INTO `tb_cidades` VALUES (7449, 23, 'RS', 'Dilermando de Aguiar');

INSERT INTO `tb_cidades` VALUES (7450, 23, 'RS', 'Divino');

INSERT INTO `tb_cidades` VALUES (7451, 23, 'RS', 'Dois Irmaos');

INSERT INTO `tb_cidades` VALUES (7452, 23, 'RS', 'Dois Irmaos das Missoes');

INSERT INTO `tb_cidades` VALUES (7453, 23, 'RS', 'Dois Lajeados');

INSERT INTO `tb_cidades` VALUES (7454, 23, 'RS', 'Dom Diogo');

INSERT INTO `tb_cidades` VALUES (7455, 23, 'RS', 'Dom Feliciano');

INSERT INTO `tb_cidades` VALUES (7456, 23, 'RS', 'Dom Pedrito');

INSERT INTO `tb_cidades` VALUES (7457, 23, 'RS', 'Dom Pedro de Alcantara');

INSERT INTO `tb_cidades` VALUES (7458, 23, 'RS', 'Dona Francisca');

INSERT INTO `tb_cidades` VALUES (7459, 23, 'RS', 'Dona Otilia');

INSERT INTO `tb_cidades` VALUES (7460, 23, 'RS', 'Dourado');

INSERT INTO `tb_cidades` VALUES (7461, 23, 'RS', 'Doutor Bozano');

INSERT INTO `tb_cidades` VALUES (7462, 23, 'RS', 'Doutor Edgardo Pereira Velho');

INSERT INTO `tb_cidades` VALUES (7463, 23, 'RS', 'Doutor Mauricio Cardoso');

INSERT INTO `tb_cidades` VALUES (7464, 23, 'RS', 'Doutor Ricardo');

INSERT INTO `tb_cidades` VALUES (7465, 23, 'RS', 'Eldorado do Sul');

INSERT INTO `tb_cidades` VALUES (7466, 23, 'RS', 'Eletra');

INSERT INTO `tb_cidades` VALUES (7467, 23, 'RS', 'Encantado');

INSERT INTO `tb_cidades` VALUES (7468, 23, 'RS', 'Encruzilhada');

INSERT INTO `tb_cidades` VALUES (7469, 23, 'RS', 'Encruzilhada do Sul');

INSERT INTO `tb_cidades` VALUES (7470, 23, 'RS', 'Engenho Velho');

INSERT INTO `tb_cidades` VALUES (7471, 23, 'RS', 'Entre Rios do Sul');

INSERT INTO `tb_cidades` VALUES (7472, 23, 'RS', 'Entre-ijuis');

INSERT INTO `tb_cidades` VALUES (7473, 23, 'RS', 'Entrepelado');

INSERT INTO `tb_cidades` VALUES (7474, 23, 'RS', 'Erebango');

INSERT INTO `tb_cidades` VALUES (7475, 23, 'RS', 'Erechim');

INSERT INTO `tb_cidades` VALUES (7476, 23, 'RS', 'Ernestina');

INSERT INTO `tb_cidades` VALUES (7477, 23, 'RS', 'Ernesto Alves');

INSERT INTO `tb_cidades` VALUES (7478, 23, 'RS', 'Erval Grande');

INSERT INTO `tb_cidades` VALUES (7479, 23, 'RS', 'Erval Seco');

INSERT INTO `tb_cidades` VALUES (7480, 23, 'RS', 'Erveiras');

INSERT INTO `tb_cidades` VALUES (7481, 23, 'RS', 'Esmeralda');

INSERT INTO `tb_cidades` VALUES (7482, 23, 'RS', 'Esperanca do Sul');

INSERT INTO `tb_cidades` VALUES (7483, 23, 'RS', 'Espigao');

INSERT INTO `tb_cidades` VALUES (7484, 23, 'RS', 'Espigao Alto');

INSERT INTO `tb_cidades` VALUES (7485, 23, 'RS', 'Espinilho Grande');

INSERT INTO `tb_cidades` VALUES (7486, 23, 'RS', 'Espirito Santo');

INSERT INTO `tb_cidades` VALUES (7487, 23, 'RS', 'Espumoso');

INSERT INTO `tb_cidades` VALUES (7488, 23, 'RS', 'Esquina Araujo');

INSERT INTO `tb_cidades` VALUES (7489, 23, 'RS', 'Esquina Bom Sucesso');

INSERT INTO `tb_cidades` VALUES (7490, 23, 'RS', 'Esquina Gaucha');

INSERT INTO `tb_cidades` VALUES (7491, 23, 'RS', 'Esquina Ipiranga');

INSERT INTO `tb_cidades` VALUES (7492, 23, 'RS', 'Esquina Piratini');

INSERT INTO `tb_cidades` VALUES (7493, 23, 'RS', 'Estacao');

INSERT INTO `tb_cidades` VALUES (7494, 23, 'RS', 'Estancia Grande');

INSERT INTO `tb_cidades` VALUES (7495, 23, 'RS', 'Estancia Velha');

INSERT INTO `tb_cidades` VALUES (7496, 23, 'RS', 'Esteio');

INSERT INTO `tb_cidades` VALUES (7497, 23, 'RS', 'Esteira');

INSERT INTO `tb_cidades` VALUES (7498, 23, 'RS', 'Estreito');

INSERT INTO `tb_cidades` VALUES (7499, 23, 'RS', 'Estrela');

INSERT INTO `tb_cidades` VALUES (7500, 23, 'RS', 'Estrela Velha');

INSERT INTO `tb_cidades` VALUES (7501, 23, 'RS', 'Eugenio de Castro');

INSERT INTO `tb_cidades` VALUES (7502, 23, 'RS', 'Evangelista');

INSERT INTO `tb_cidades` VALUES (7503, 23, 'RS', 'Fagundes Varela');

INSERT INTO `tb_cidades` VALUES (7504, 23, 'RS', 'Fao');

INSERT INTO `tb_cidades` VALUES (7505, 23, 'RS', 'Faria Lemos');

INSERT INTO `tb_cidades` VALUES (7506, 23, 'RS', 'Farinhas');

INSERT INTO `tb_cidades` VALUES (7507, 23, 'RS', 'Farrapos');

INSERT INTO `tb_cidades` VALUES (7508, 23, 'RS', 'Farroupilha');

INSERT INTO `tb_cidades` VALUES (7509, 23, 'RS', 'Faxinal');

INSERT INTO `tb_cidades` VALUES (7510, 23, 'RS', 'Faxinal do Soturno');

INSERT INTO `tb_cidades` VALUES (7511, 23, 'RS', 'Faxinalzinho');

INSERT INTO `tb_cidades` VALUES (7512, 23, 'RS', 'Fazenda Fialho');

INSERT INTO `tb_cidades` VALUES (7513, 23, 'RS', 'Fazenda Souza');

INSERT INTO `tb_cidades` VALUES (7514, 23, 'RS', 'Fazenda Vilanova');

INSERT INTO `tb_cidades` VALUES (7515, 23, 'RS', 'Feliz');

INSERT INTO `tb_cidades` VALUES (7516, 23, 'RS', 'Ferreira');

INSERT INTO `tb_cidades` VALUES (7517, 23, 'RS', 'Flores da Cunha');

INSERT INTO `tb_cidades` VALUES (7518, 23, 'RS', 'Floresta');

INSERT INTO `tb_cidades` VALUES (7519, 23, 'RS', 'Floriano Peixoto');

INSERT INTO `tb_cidades` VALUES (7520, 23, 'RS', 'Florida');

INSERT INTO `tb_cidades` VALUES (7521, 23, 'RS', 'Fontoura Xavier');

INSERT INTO `tb_cidades` VALUES (7522, 23, 'RS', 'Formigueiro');

INSERT INTO `tb_cidades` VALUES (7523, 23, 'RS', 'Formosa');

INSERT INTO `tb_cidades` VALUES (7524, 23, 'RS', 'Forninho');

INSERT INTO `tb_cidades` VALUES (7525, 23, 'RS', 'Forquetinha');

INSERT INTO `tb_cidades` VALUES (7526, 23, 'RS', 'Fortaleza dos Valos');

INSERT INTO `tb_cidades` VALUES (7527, 23, 'RS', 'Frederico Westphalen');

INSERT INTO `tb_cidades` VALUES (7528, 23, 'RS', 'Frei Sebastiao');

INSERT INTO `tb_cidades` VALUES (7529, 23, 'RS', 'Freire');

INSERT INTO `tb_cidades` VALUES (7530, 23, 'RS', 'Garibaldi');

INSERT INTO `tb_cidades` VALUES (7531, 23, 'RS', 'Garibaldina');

INSERT INTO `tb_cidades` VALUES (7532, 23, 'RS', 'Garruchos');

INSERT INTO `tb_cidades` VALUES (7533, 23, 'RS', 'Gaurama');

INSERT INTO `tb_cidades` VALUES (7534, 23, 'RS', 'General Camara');

INSERT INTO `tb_cidades` VALUES (7535, 23, 'RS', 'Gentil');

INSERT INTO `tb_cidades` VALUES (7536, 23, 'RS', 'Getulio Vargas');

INSERT INTO `tb_cidades` VALUES (7537, 23, 'RS', 'Girua');

INSERT INTO `tb_cidades` VALUES (7538, 23, 'RS', 'Gloria');

INSERT INTO `tb_cidades` VALUES (7539, 23, 'RS', 'Glorinha');

INSERT INTO `tb_cidades` VALUES (7540, 23, 'RS', 'Goio-en');

INSERT INTO `tb_cidades` VALUES (7541, 23, 'RS', 'Gramado');

INSERT INTO `tb_cidades` VALUES (7542, 23, 'RS', 'Gramado dos Loureiros');

INSERT INTO `tb_cidades` VALUES (7543, 23, 'RS', 'Gramado Sao Pedro');

INSERT INTO `tb_cidades` VALUES (7544, 23, 'RS', 'Gramado Xavier');

INSERT INTO `tb_cidades` VALUES (7545, 23, 'RS', 'Gravatai');

INSERT INTO `tb_cidades` VALUES (7546, 23, 'RS', 'Guabiju');

INSERT INTO `tb_cidades` VALUES (7547, 23, 'RS', 'Guaiba');

INSERT INTO `tb_cidades` VALUES (7548, 23, 'RS', 'Guajuviras');

INSERT INTO `tb_cidades` VALUES (7549, 23, 'RS', 'Guapore');

INSERT INTO `tb_cidades` VALUES (7550, 23, 'RS', 'Guarani das Missoes');

INSERT INTO `tb_cidades` VALUES (7551, 23, 'RS', 'Guassupi');

INSERT INTO `tb_cidades` VALUES (7552, 23, 'RS', 'Harmonia');

INSERT INTO `tb_cidades` VALUES (7553, 23, 'RS', 'Herval');

INSERT INTO `tb_cidades` VALUES (7554, 23, 'RS', 'Herveiras');

INSERT INTO `tb_cidades` VALUES (7555, 23, 'RS', 'Hidraulica');

INSERT INTO `tb_cidades` VALUES (7556, 23, 'RS', 'Horizontina');

INSERT INTO `tb_cidades` VALUES (7557, 23, 'RS', 'Hulha Negra');

INSERT INTO `tb_cidades` VALUES (7558, 23, 'RS', 'Humaita');

INSERT INTO `tb_cidades` VALUES (7559, 23, 'RS', 'Ibarama');

INSERT INTO `tb_cidades` VALUES (7560, 23, 'RS', 'Ibare');

INSERT INTO `tb_cidades` VALUES (7561, 23, 'RS', 'Ibiaca');

INSERT INTO `tb_cidades` VALUES (7562, 23, 'RS', 'Ibiraiaras');

INSERT INTO `tb_cidades` VALUES (7563, 23, 'RS', 'Ibirapuita');

INSERT INTO `tb_cidades` VALUES (7564, 23, 'RS', 'Ibiruba');

INSERT INTO `tb_cidades` VALUES (7565, 23, 'RS', 'Igrejinha');

INSERT INTO `tb_cidades` VALUES (7566, 23, 'RS', 'Ijucapirama');

INSERT INTO `tb_cidades` VALUES (7567, 23, 'RS', 'Ijui');

INSERT INTO `tb_cidades` VALUES (7568, 23, 'RS', 'Ilha dos Marinheiros');

INSERT INTO `tb_cidades` VALUES (7569, 23, 'RS', 'Ilopolis');

INSERT INTO `tb_cidades` VALUES (7570, 23, 'RS', 'Imbe');

INSERT INTO `tb_cidades` VALUES (7571, 23, 'RS', 'Imigrante');

INSERT INTO `tb_cidades` VALUES (7572, 23, 'RS', 'Independencia');

INSERT INTO `tb_cidades` VALUES (7573, 23, 'RS', 'Inhacora');

INSERT INTO `tb_cidades` VALUES (7574, 23, 'RS', 'Ipe');

INSERT INTO `tb_cidades` VALUES (7575, 23, 'RS', 'Ipiranga');

INSERT INTO `tb_cidades` VALUES (7576, 23, 'RS', 'Ipiranga do Sul');

INSERT INTO `tb_cidades` VALUES (7577, 23, 'RS', 'Ipuacu');

INSERT INTO `tb_cidades` VALUES (7578, 23, 'RS', 'Irai');

INSERT INTO `tb_cidades` VALUES (7579, 23, 'RS', 'Irui');

INSERT INTO `tb_cidades` VALUES (7580, 23, 'RS', 'Itaara');

INSERT INTO `tb_cidades` VALUES (7581, 23, 'RS', 'Itacolomi');

INSERT INTO `tb_cidades` VALUES (7582, 23, 'RS', 'Itacurubi');

INSERT INTO `tb_cidades` VALUES (7583, 23, 'RS', 'Itai');

INSERT INTO `tb_cidades` VALUES (7584, 23, 'RS', 'Itaimbezinho');

INSERT INTO `tb_cidades` VALUES (7585, 23, 'RS', 'Itao');

INSERT INTO `tb_cidades` VALUES (7586, 23, 'RS', 'Itapua');

INSERT INTO `tb_cidades` VALUES (7587, 23, 'RS', 'Itapuca');

INSERT INTO `tb_cidades` VALUES (7588, 23, 'RS', 'Itaqui');

INSERT INTO `tb_cidades` VALUES (7589, 23, 'RS', 'Itati');

INSERT INTO `tb_cidades` VALUES (7590, 23, 'RS', 'Itatiba do Sul');

INSERT INTO `tb_cidades` VALUES (7591, 23, 'RS', 'Itauba');

INSERT INTO `tb_cidades` VALUES (7592, 23, 'RS', 'Ituim');

INSERT INTO `tb_cidades` VALUES (7593, 23, 'RS', 'Ivai');

INSERT INTO `tb_cidades` VALUES (7594, 23, 'RS', 'Ivora');

INSERT INTO `tb_cidades` VALUES (7595, 23, 'RS', 'Ivoti');

INSERT INTO `tb_cidades` VALUES (7596, 23, 'RS', 'Jaboticaba');

INSERT INTO `tb_cidades` VALUES (7597, 23, 'RS', 'Jacuizinho');

INSERT INTO `tb_cidades` VALUES (7598, 23, 'RS', 'Jacutinga');

INSERT INTO `tb_cidades` VALUES (7599, 23, 'RS', 'Jaguarao');

INSERT INTO `tb_cidades` VALUES (7600, 23, 'RS', 'Jaguarete');

INSERT INTO `tb_cidades` VALUES (7601, 23, 'RS', 'Jaguari');

INSERT INTO `tb_cidades` VALUES (7602, 23, 'RS', 'Jansen');

INSERT INTO `tb_cidades` VALUES (7603, 23, 'RS', 'Jaquirana');

INSERT INTO `tb_cidades` VALUES (7604, 23, 'RS', 'Jari');

INSERT INTO `tb_cidades` VALUES (7605, 23, 'RS', 'Jazidas Ou Capela Sao Vicente');

INSERT INTO `tb_cidades` VALUES (7606, 23, 'RS', 'Joao Arregui');

INSERT INTO `tb_cidades` VALUES (7607, 23, 'RS', 'Joao Rodrigues');

INSERT INTO `tb_cidades` VALUES (7608, 23, 'RS', 'Joca Tavares');

INSERT INTO `tb_cidades` VALUES (7609, 23, 'RS', 'Joia');

INSERT INTO `tb_cidades` VALUES (7610, 23, 'RS', 'Jose Otavio');

INSERT INTO `tb_cidades` VALUES (7611, 23, 'RS', 'Jua');

INSERT INTO `tb_cidades` VALUES (7612, 23, 'RS', 'Julio de Castilhos');

INSERT INTO `tb_cidades` VALUES (7613, 23, 'RS', 'Lagoa Bonita');

INSERT INTO `tb_cidades` VALUES (7614, 23, 'RS', 'Lagoa dos Tres Cantos');

INSERT INTO `tb_cidades` VALUES (7615, 23, 'RS', 'Lagoa Vermelha');

INSERT INTO `tb_cidades` VALUES (7616, 23, 'RS', 'Lagoao');

INSERT INTO `tb_cidades` VALUES (7617, 23, 'RS', 'Lajeado');

INSERT INTO `tb_cidades` VALUES (7618, 23, 'RS', 'Lajeado Bonito');

INSERT INTO `tb_cidades` VALUES (7619, 23, 'RS', 'Lajeado Cerne');

INSERT INTO `tb_cidades` VALUES (7620, 23, 'RS', 'Lajeado do Bugre');

INSERT INTO `tb_cidades` VALUES (7621, 23, 'RS', 'Lajeado Grande');

INSERT INTO `tb_cidades` VALUES (7622, 23, 'RS', 'Lara');

INSERT INTO `tb_cidades` VALUES (7623, 23, 'RS', 'Laranjeira');

INSERT INTO `tb_cidades` VALUES (7624, 23, 'RS', 'Lava-pes');

INSERT INTO `tb_cidades` VALUES (7625, 23, 'RS', 'Lavras do Sul');

INSERT INTO `tb_cidades` VALUES (7626, 23, 'RS', 'Leonel Rocha');

INSERT INTO `tb_cidades` VALUES (7627, 23, 'RS', 'Liberato Salzano');

INSERT INTO `tb_cidades` VALUES (7628, 23, 'RS', 'Lindolfo Collor');

INSERT INTO `tb_cidades` VALUES (7629, 23, 'RS', 'Linha Comprida');

INSERT INTO `tb_cidades` VALUES (7630, 23, 'RS', 'Linha Nova');

INSERT INTO `tb_cidades` VALUES (7631, 23, 'RS', 'Linha Vitoria');

INSERT INTO `tb_cidades` VALUES (7632, 23, 'RS', 'Loreto');

INSERT INTO `tb_cidades` VALUES (7633, 23, 'RS', 'Macambara');

INSERT INTO `tb_cidades` VALUES (7634, 23, 'RS', 'Machadinho');

INSERT INTO `tb_cidades` VALUES (7635, 23, 'RS', 'Magisterio');

INSERT INTO `tb_cidades` VALUES (7636, 23, 'RS', 'Mampituba');

INSERT INTO `tb_cidades` VALUES (7637, 23, 'RS', 'Manchinha');

INSERT INTO `tb_cidades` VALUES (7638, 23, 'RS', 'Mangueiras');

INSERT INTO `tb_cidades` VALUES (7639, 23, 'RS', 'Manoel Viana');

INSERT INTO `tb_cidades` VALUES (7640, 23, 'RS', 'Maquine');

INSERT INTO `tb_cidades` VALUES (7641, 23, 'RS', 'Marata');

INSERT INTO `tb_cidades` VALUES (7642, 23, 'RS', 'Marau');

INSERT INTO `tb_cidades` VALUES (7643, 23, 'RS', 'Marcelino Ramos');

INSERT INTO `tb_cidades` VALUES (7644, 23, 'RS', 'Marcorama');

INSERT INTO `tb_cidades` VALUES (7645, 23, 'RS', 'Mariana Pimentel');

INSERT INTO `tb_cidades` VALUES (7646, 23, 'RS', 'Mariano Moro');

INSERT INTO `tb_cidades` VALUES (7647, 23, 'RS', 'Mariante');

INSERT INTO `tb_cidades` VALUES (7648, 23, 'RS', 'Mariapolis');

INSERT INTO `tb_cidades` VALUES (7649, 23, 'RS', 'Marques de Souza');

INSERT INTO `tb_cidades` VALUES (7650, 23, 'RS', 'Mata');

INSERT INTO `tb_cidades` VALUES (7651, 23, 'RS', 'Matarazzo');

INSERT INTO `tb_cidades` VALUES (7652, 23, 'RS', 'Mato Castelhano');

INSERT INTO `tb_cidades` VALUES (7653, 23, 'RS', 'Mato Grande');

INSERT INTO `tb_cidades` VALUES (7654, 23, 'RS', 'Mato Leitao');

INSERT INTO `tb_cidades` VALUES (7655, 23, 'RS', 'Mato Queimado');

INSERT INTO `tb_cidades` VALUES (7656, 23, 'RS', 'Maua');

INSERT INTO `tb_cidades` VALUES (7657, 23, 'RS', 'Maximiliano de Almeida');

INSERT INTO `tb_cidades` VALUES (7658, 23, 'RS', 'Medianeira');

INSERT INTO `tb_cidades` VALUES (7659, 23, 'RS', 'Minas do Leao');

INSERT INTO `tb_cidades` VALUES (7660, 23, 'RS', 'Miraguai');

INSERT INTO `tb_cidades` VALUES (7661, 23, 'RS', 'Miraguaia');

INSERT INTO `tb_cidades` VALUES (7662, 23, 'RS', 'Mirim');

INSERT INTO `tb_cidades` VALUES (7663, 23, 'RS', 'Montauri');

INSERT INTO `tb_cidades` VALUES (7664, 23, 'RS', 'Monte Alegre');

INSERT INTO `tb_cidades` VALUES (7665, 23, 'RS', 'Monte Alegre dos Campos');

INSERT INTO `tb_cidades` VALUES (7666, 23, 'RS', 'Monte Alverne');

INSERT INTO `tb_cidades` VALUES (7667, 23, 'RS', 'Monte Belo do Sul');

INSERT INTO `tb_cidades` VALUES (7668, 23, 'RS', 'Monte Bonito');

INSERT INTO `tb_cidades` VALUES (7669, 23, 'RS', 'Montenegro');

INSERT INTO `tb_cidades` VALUES (7670, 23, 'RS', 'Mormaco');

INSERT INTO `tb_cidades` VALUES (7671, 23, 'RS', 'Morrinhos');

INSERT INTO `tb_cidades` VALUES (7672, 23, 'RS', 'Morrinhos do Sul');

INSERT INTO `tb_cidades` VALUES (7673, 23, 'RS', 'Morro Alto');

INSERT INTO `tb_cidades` VALUES (7674, 23, 'RS', 'Morro Azul');

INSERT INTO `tb_cidades` VALUES (7675, 23, 'RS', 'Morro Redondo');

INSERT INTO `tb_cidades` VALUES (7676, 23, 'RS', 'Morro Reuter');

INSERT INTO `tb_cidades` VALUES (7677, 23, 'RS', 'Morungava');

INSERT INTO `tb_cidades` VALUES (7678, 23, 'RS', 'Mostardas');

INSERT INTO `tb_cidades` VALUES (7679, 23, 'RS', 'Mucum');

INSERT INTO `tb_cidades` VALUES (7680, 23, 'RS', 'Muitos Capoes');

INSERT INTO `tb_cidades` VALUES (7681, 23, 'RS', 'Muliterno');

INSERT INTO `tb_cidades` VALUES (7682, 23, 'RS', 'Nao-me-toque');

INSERT INTO `tb_cidades` VALUES (7683, 23, 'RS', 'Nazare');

INSERT INTO `tb_cidades` VALUES (7684, 23, 'RS', 'Nicolau Vergueiro');

INSERT INTO `tb_cidades` VALUES (7685, 23, 'RS', 'Nonoai');

INSERT INTO `tb_cidades` VALUES (7686, 23, 'RS', 'Nossa Senhora Aparecida');

INSERT INTO `tb_cidades` VALUES (7687, 23, 'RS', 'Nossa Senhora da Conceicao');

INSERT INTO `tb_cidades` VALUES (7688, 23, 'RS', 'Nova Alvorada');

INSERT INTO `tb_cidades` VALUES (7689, 23, 'RS', 'Nova Araca');

INSERT INTO `tb_cidades` VALUES (7690, 23, 'RS', 'Nova Bassano');

INSERT INTO `tb_cidades` VALUES (7691, 23, 'RS', 'Nova Boa Vista');

INSERT INTO `tb_cidades` VALUES (7692, 23, 'RS', 'Nova Brescia');

INSERT INTO `tb_cidades` VALUES (7693, 23, 'RS', 'Nova Candelaria');

INSERT INTO `tb_cidades` VALUES (7694, 23, 'RS', 'Nova Esperanca do Sul');

INSERT INTO `tb_cidades` VALUES (7695, 23, 'RS', 'Nova Hartz');

INSERT INTO `tb_cidades` VALUES (7696, 23, 'RS', 'Nova Milano');

INSERT INTO `tb_cidades` VALUES (7697, 23, 'RS', 'Nova Padua');

INSERT INTO `tb_cidades` VALUES (7698, 23, 'RS', 'Nova Palma');

INSERT INTO `tb_cidades` VALUES (7699, 23, 'RS', 'Nova Petropolis');

INSERT INTO `tb_cidades` VALUES (7700, 23, 'RS', 'Nova Prata');

INSERT INTO `tb_cidades` VALUES (7701, 23, 'RS', 'Nova Ramada');

INSERT INTO `tb_cidades` VALUES (7702, 23, 'RS', 'Nova Roma do Sul');

INSERT INTO `tb_cidades` VALUES (7703, 23, 'RS', 'Nova Santa Rita');

INSERT INTO `tb_cidades` VALUES (7704, 23, 'RS', 'Nova Sardenha');

INSERT INTO `tb_cidades` VALUES (7705, 23, 'RS', 'Novo Barreiro');

INSERT INTO `tb_cidades` VALUES (7706, 23, 'RS', 'Novo Cabrais');

INSERT INTO `tb_cidades` VALUES (7707, 23, 'RS', 'Novo Hamburgo');

INSERT INTO `tb_cidades` VALUES (7708, 23, 'RS', 'Novo Horizonte');

INSERT INTO `tb_cidades` VALUES (7709, 23, 'RS', 'Novo Machado');

INSERT INTO `tb_cidades` VALUES (7710, 23, 'RS', 'Novo Planalto');

INSERT INTO `tb_cidades` VALUES (7711, 23, 'RS', 'Novo Tiradentes');

INSERT INTO `tb_cidades` VALUES (7712, 23, 'RS', 'Oliva');

INSERT INTO `tb_cidades` VALUES (7713, 23, 'RS', 'Oralina');

INSERT INTO `tb_cidades` VALUES (7714, 23, 'RS', 'Osorio');

INSERT INTO `tb_cidades` VALUES (7715, 23, 'RS', 'Osvaldo Cruz');

INSERT INTO `tb_cidades` VALUES (7716, 23, 'RS', 'Osvaldo Kroeff');

INSERT INTO `tb_cidades` VALUES (7717, 23, 'RS', 'Otavio Rocha');

INSERT INTO `tb_cidades` VALUES (7718, 23, 'RS', 'Pacheca');

INSERT INTO `tb_cidades` VALUES (7719, 23, 'RS', 'Padilha');

INSERT INTO `tb_cidades` VALUES (7720, 23, 'RS', 'Padre Gonzales');

INSERT INTO `tb_cidades` VALUES (7721, 23, 'RS', 'Paim Filho');

INSERT INTO `tb_cidades` VALUES (7722, 23, 'RS', 'Palmares do Sul');

INSERT INTO `tb_cidades` VALUES (7723, 23, 'RS', 'Palmas');

INSERT INTO `tb_cidades` VALUES (7724, 23, 'RS', 'Palmeira das Missoes');

INSERT INTO `tb_cidades` VALUES (7725, 23, 'RS', 'Palmitinho');

INSERT INTO `tb_cidades` VALUES (7726, 23, 'RS', 'Pampeiro');

INSERT INTO `tb_cidades` VALUES (7727, 23, 'RS', 'Panambi');

INSERT INTO `tb_cidades` VALUES (7728, 23, 'RS', 'Pantano Grande');

INSERT INTO `tb_cidades` VALUES (7729, 23, 'RS', 'Parai');

INSERT INTO `tb_cidades` VALUES (7730, 23, 'RS', 'Paraiso do Sul');

INSERT INTO `tb_cidades` VALUES (7731, 23, 'RS', 'Pareci Novo');

INSERT INTO `tb_cidades` VALUES (7732, 23, 'RS', 'Parobe');

INSERT INTO `tb_cidades` VALUES (7733, 23, 'RS', 'Passa Sete');

INSERT INTO `tb_cidades` VALUES (7734, 23, 'RS', 'Passinhos');

INSERT INTO `tb_cidades` VALUES (7735, 23, 'RS', 'Passo Burmann');

INSERT INTO `tb_cidades` VALUES (7736, 23, 'RS', 'Passo da Areia');

INSERT INTO `tb_cidades` VALUES (7737, 23, 'RS', 'Passo da Caveira');

INSERT INTO `tb_cidades` VALUES (7738, 23, 'RS', 'Passo das Pedras');

INSERT INTO `tb_cidades` VALUES (7739, 23, 'RS', 'Passo do Adao');

INSERT INTO `tb_cidades` VALUES (7740, 23, 'RS', 'Passo do Sabao');

INSERT INTO `tb_cidades` VALUES (7741, 23, 'RS', 'Passo do Sobrado');

INSERT INTO `tb_cidades` VALUES (7742, 23, 'RS', 'Passo Fundo');

INSERT INTO `tb_cidades` VALUES (7743, 23, 'RS', 'Passo Novo');

INSERT INTO `tb_cidades` VALUES (7744, 23, 'RS', 'Passo Raso');

INSERT INTO `tb_cidades` VALUES (7745, 23, 'RS', 'Paulo Bento');

INSERT INTO `tb_cidades` VALUES (7746, 23, 'RS', 'Pavao');

INSERT INTO `tb_cidades` VALUES (7747, 23, 'RS', 'Paverama');

INSERT INTO `tb_cidades` VALUES (7748, 23, 'RS', 'Pedras Altas');

INSERT INTO `tb_cidades` VALUES (7749, 23, 'RS', 'Pedreiras');

INSERT INTO `tb_cidades` VALUES (7750, 23, 'RS', 'Pedro Garcia');

INSERT INTO `tb_cidades` VALUES (7751, 23, 'RS', 'Pedro Osorio');

INSERT INTO `tb_cidades` VALUES (7752, 23, 'RS', 'Pedro Paiva');

INSERT INTO `tb_cidades` VALUES (7753, 23, 'RS', 'Pejucara');

INSERT INTO `tb_cidades` VALUES (7754, 23, 'RS', 'Pelotas');

INSERT INTO `tb_cidades` VALUES (7755, 23, 'RS', 'Picada Cafe');

INSERT INTO `tb_cidades` VALUES (7756, 23, 'RS', 'Pinhal');

INSERT INTO `tb_cidades` VALUES (7757, 23, 'RS', 'Pinhal Alto');

INSERT INTO `tb_cidades` VALUES (7758, 23, 'RS', 'Pinhal da Serra');

INSERT INTO `tb_cidades` VALUES (7759, 23, 'RS', 'Pinhal Grande');

INSERT INTO `tb_cidades` VALUES (7760, 23, 'RS', 'Pinhalzinho');

INSERT INTO `tb_cidades` VALUES (7761, 23, 'RS', 'Pinheirinho do Vale');

INSERT INTO `tb_cidades` VALUES (7762, 23, 'RS', 'Pinheiro Machado');

INSERT INTO `tb_cidades` VALUES (7763, 23, 'RS', 'Pinheiro Marcado');

INSERT INTO `tb_cidades` VALUES (7764, 23, 'RS', 'Pinto Bandeira');

INSERT INTO `tb_cidades` VALUES (7765, 23, 'RS', 'Pirai');

INSERT INTO `tb_cidades` VALUES (7766, 23, 'RS', 'Pirapo');

INSERT INTO `tb_cidades` VALUES (7767, 23, 'RS', 'Piratini');

INSERT INTO `tb_cidades` VALUES (7768, 23, 'RS', 'Pitanga');

INSERT INTO `tb_cidades` VALUES (7769, 23, 'RS', 'Planalto');

INSERT INTO `tb_cidades` VALUES (7770, 23, 'RS', 'Plano Alto');

INSERT INTO `tb_cidades` VALUES (7771, 23, 'RS', 'Poco das Antas');

INSERT INTO `tb_cidades` VALUES (7772, 23, 'RS', 'Poligono do Erval');

INSERT INTO `tb_cidades` VALUES (7773, 23, 'RS', 'Polo Petroquimico de Triunfo');

INSERT INTO `tb_cidades` VALUES (7774, 23, 'RS', 'Pontao');

INSERT INTO `tb_cidades` VALUES (7775, 23, 'RS', 'Ponte Preta');

INSERT INTO `tb_cidades` VALUES (7776, 23, 'RS', 'Portao');

INSERT INTO `tb_cidades` VALUES (7777, 23, 'RS', 'Porto Alegre');

INSERT INTO `tb_cidades` VALUES (7778, 23, 'RS', 'Porto Batista');

INSERT INTO `tb_cidades` VALUES (7779, 23, 'RS', 'Porto Lucena');

INSERT INTO `tb_cidades` VALUES (7780, 23, 'RS', 'Porto Maua');

INSERT INTO `tb_cidades` VALUES (7781, 23, 'RS', 'Porto Vera Cruz');

INSERT INTO `tb_cidades` VALUES (7782, 23, 'RS', 'Porto Xavier');

INSERT INTO `tb_cidades` VALUES (7783, 23, 'RS', 'Pouso Novo');

INSERT INTO `tb_cidades` VALUES (7784, 23, 'RS', 'Povo Novo');

INSERT INTO `tb_cidades` VALUES (7785, 23, 'RS', 'Povoado Tozzo');

INSERT INTO `tb_cidades` VALUES (7786, 23, 'RS', 'Pranchada');

INSERT INTO `tb_cidades` VALUES (7787, 23, 'RS', 'Pratos');

INSERT INTO `tb_cidades` VALUES (7788, 23, 'RS', 'Presidente Lucena');

INSERT INTO `tb_cidades` VALUES (7789, 23, 'RS', 'Progresso');

INSERT INTO `tb_cidades` VALUES (7790, 23, 'RS', 'Protasio Alves');

INSERT INTO `tb_cidades` VALUES (7791, 23, 'RS', 'Pulador');

INSERT INTO `tb_cidades` VALUES (7792, 23, 'RS', 'Putinga');

INSERT INTO `tb_cidades` VALUES (7793, 23, 'RS', 'Quarai');

INSERT INTO `tb_cidades` VALUES (7794, 23, 'RS', 'Quaraim');

INSERT INTO `tb_cidades` VALUES (7795, 23, 'RS', 'Quatro Irmaos');

INSERT INTO `tb_cidades` VALUES (7796, 23, 'RS', 'Quevedos');

INSERT INTO `tb_cidades` VALUES (7797, 23, 'RS', 'Quilombo');

INSERT INTO `tb_cidades` VALUES (7798, 23, 'RS', 'Quinta');

INSERT INTO `tb_cidades` VALUES (7799, 23, 'RS', 'Quintao');

INSERT INTO `tb_cidades` VALUES (7800, 23, 'RS', 'Quinze de Novembro');

INSERT INTO `tb_cidades` VALUES (7801, 23, 'RS', 'Quiteria');

INSERT INTO `tb_cidades` VALUES (7802, 23, 'RS', 'Rancho Velho');

INSERT INTO `tb_cidades` VALUES (7803, 23, 'RS', 'Redentora');

INSERT INTO `tb_cidades` VALUES (7804, 23, 'RS', 'Refugiado');

INSERT INTO `tb_cidades` VALUES (7805, 23, 'RS', 'Relvado');

INSERT INTO `tb_cidades` VALUES (7806, 23, 'RS', 'Restinga Seca');

INSERT INTO `tb_cidades` VALUES (7807, 23, 'RS', 'Rincao de Sao Pedro');

INSERT INTO `tb_cidades` VALUES (7808, 23, 'RS', 'Rincao Del Rei');

INSERT INTO `tb_cidades` VALUES (7809, 23, 'RS', 'Rincao do Cristovao Pereira');

INSERT INTO `tb_cidades` VALUES (7810, 23, 'RS', 'Rincao do Meio');

INSERT INTO `tb_cidades` VALUES (7811, 23, 'RS', 'Rincao do Segredo');

INSERT INTO `tb_cidades` VALUES (7812, 23, 'RS', 'Rincao Doce');

INSERT INTO `tb_cidades` VALUES (7813, 23, 'RS', 'Rincao dos Kroeff');

INSERT INTO `tb_cidades` VALUES (7814, 23, 'RS', 'Rincao dos Mendes');

INSERT INTO `tb_cidades` VALUES (7815, 23, 'RS', 'Rincao Vermelho');

INSERT INTO `tb_cidades` VALUES (7816, 23, 'RS', 'Rio Azul');

INSERT INTO `tb_cidades` VALUES (7817, 23, 'RS', 'Rio Branco');

INSERT INTO `tb_cidades` VALUES (7818, 23, 'RS', 'Rio da Ilha');

INSERT INTO `tb_cidades` VALUES (7819, 23, 'RS', 'Rio dos Indios');

INSERT INTO `tb_cidades` VALUES (7820, 23, 'RS', 'Rio Grande');

INSERT INTO `tb_cidades` VALUES (7821, 23, 'RS', 'Rio Pardinho');

INSERT INTO `tb_cidades` VALUES (7822, 23, 'RS', 'Rio Pardo');

INSERT INTO `tb_cidades` VALUES (7823, 23, 'RS', 'Rio Telha');

INSERT INTO `tb_cidades` VALUES (7824, 23, 'RS', 'Rio Tigre');

INSERT INTO `tb_cidades` VALUES (7825, 23, 'RS', 'Rio Toldo');

INSERT INTO `tb_cidades` VALUES (7826, 23, 'RS', 'Riozinho');

INSERT INTO `tb_cidades` VALUES (7827, 23, 'RS', 'Roca Sales');

INSERT INTO `tb_cidades` VALUES (7828, 23, 'RS', 'Rodeio Bonito');

INSERT INTO `tb_cidades` VALUES (7829, 23, 'RS', 'Rolador');

INSERT INTO `tb_cidades` VALUES (7830, 23, 'RS', 'Rolante');

INSERT INTO `tb_cidades` VALUES (7831, 23, 'RS', 'Rolantinho da Figueira');

INSERT INTO `tb_cidades` VALUES (7832, 23, 'RS', 'Ronda Alta');

INSERT INTO `tb_cidades` VALUES (7833, 23, 'RS', 'Rondinha');

INSERT INTO `tb_cidades` VALUES (7834, 23, 'RS', 'Roque Gonzales');

INSERT INTO `tb_cidades` VALUES (7835, 23, 'RS', 'Rosario');

INSERT INTO `tb_cidades` VALUES (7836, 23, 'RS', 'Rosario do Sul');

INSERT INTO `tb_cidades` VALUES (7837, 23, 'RS', 'Sagrada Familia');

INSERT INTO `tb_cidades` VALUES (7838, 23, 'RS', 'Saica');

INSERT INTO `tb_cidades` VALUES (7839, 23, 'RS', 'Saldanha Marinho');

INSERT INTO `tb_cidades` VALUES (7840, 23, 'RS', 'Saltinho');

INSERT INTO `tb_cidades` VALUES (7841, 23, 'RS', 'Salto');

INSERT INTO `tb_cidades` VALUES (7842, 23, 'RS', 'Salto do Jacui');

INSERT INTO `tb_cidades` VALUES (7843, 23, 'RS', 'Salvador das Missoes');

INSERT INTO `tb_cidades` VALUES (7844, 23, 'RS', 'Salvador do Sul');

INSERT INTO `tb_cidades` VALUES (7845, 23, 'RS', 'Sananduva');

INSERT INTO `tb_cidades` VALUES (7846, 23, 'RS', 'Sant Auta');

INSERT INTO `tb_cidades` VALUES (7847, 23, 'RS', 'Santa Barbara');

INSERT INTO `tb_cidades` VALUES (7848, 23, 'RS', 'Santa Barbara do Sul');

INSERT INTO `tb_cidades` VALUES (7849, 23, 'RS', 'Santa Catarina');

INSERT INTO `tb_cidades` VALUES (7850, 23, 'RS', 'Santa Cecilia');

INSERT INTO `tb_cidades` VALUES (7851, 23, 'RS', 'Santa Clara do Ingai');

INSERT INTO `tb_cidades` VALUES (7852, 23, 'RS', 'Santa Clara do Sul');

INSERT INTO `tb_cidades` VALUES (7853, 23, 'RS', 'Santa Cristina');

INSERT INTO `tb_cidades` VALUES (7854, 23, 'RS', 'Santa Cruz');

INSERT INTO `tb_cidades` VALUES (7855, 23, 'RS', 'Santa Cruz da Concordia');

INSERT INTO `tb_cidades` VALUES (7856, 23, 'RS', 'Santa Cruz do Sul');

INSERT INTO `tb_cidades` VALUES (7857, 23, 'RS', 'Santa Flora');

INSERT INTO `tb_cidades` VALUES (7858, 23, 'RS', 'Santa Ines');

INSERT INTO `tb_cidades` VALUES (7859, 23, 'RS', 'Santa Izabel do Sul');

INSERT INTO `tb_cidades` VALUES (7860, 23, 'RS', 'Santa Lucia');

INSERT INTO `tb_cidades` VALUES (7861, 23, 'RS', 'Santa Lucia do Piai');

INSERT INTO `tb_cidades` VALUES (7862, 23, 'RS', 'Santa Luiza');

INSERT INTO `tb_cidades` VALUES (7863, 23, 'RS', 'Santa Luzia');

INSERT INTO `tb_cidades` VALUES (7864, 23, 'RS', 'Santa Maria');

INSERT INTO `tb_cidades` VALUES (7865, 23, 'RS', 'Santa Maria do Herval');

INSERT INTO `tb_cidades` VALUES (7866, 23, 'RS', 'Santa Rita do Sul');

INSERT INTO `tb_cidades` VALUES (7867, 23, 'RS', 'Santa Rosa');

INSERT INTO `tb_cidades` VALUES (7868, 23, 'RS', 'Santa Silvana');

INSERT INTO `tb_cidades` VALUES (7869, 23, 'RS', 'Santa Teresinha');

INSERT INTO `tb_cidades` VALUES (7870, 23, 'RS', 'Santa Tereza');

INSERT INTO `tb_cidades` VALUES (7871, 23, 'RS', 'Santa Vitoria do Palmar');

INSERT INTO `tb_cidades` VALUES (7872, 23, 'RS', 'Santana');

INSERT INTO `tb_cidades` VALUES (7873, 23, 'RS', 'Santana da Boa Vista');

INSERT INTO `tb_cidades` VALUES (7874, 23, 'RS', 'Santana do Livramento');

INSERT INTO `tb_cidades` VALUES (7875, 23, 'RS', 'Santiago');

INSERT INTO `tb_cidades` VALUES (7876, 23, 'RS', 'Santo Amaro do Sul');

INSERT INTO `tb_cidades` VALUES (7877, 23, 'RS', 'Santo Angelo');

INSERT INTO `tb_cidades` VALUES (7878, 23, 'RS', 'Santo Antonio');

INSERT INTO `tb_cidades` VALUES (7879, 23, 'RS', 'Santo Antonio da Patrulha');

INSERT INTO `tb_cidades` VALUES (7880, 23, 'RS', 'Santo Antonio das Missoes');

INSERT INTO `tb_cidades` VALUES (7881, 23, 'RS', 'Santo Antonio de Castro');

INSERT INTO `tb_cidades` VALUES (7882, 23, 'RS', 'Santo Antonio do Bom Retiro');

INSERT INTO `tb_cidades` VALUES (7883, 23, 'RS', 'Santo Antonio do Palma');

INSERT INTO `tb_cidades` VALUES (7884, 23, 'RS', 'Santo Antonio do Planalto');

INSERT INTO `tb_cidades` VALUES (7885, 23, 'RS', 'Santo Augusto');

INSERT INTO `tb_cidades` VALUES (7886, 23, 'RS', 'Santo Cristo');

INSERT INTO `tb_cidades` VALUES (7887, 23, 'RS', 'Santo Expedito do Sul');

INSERT INTO `tb_cidades` VALUES (7888, 23, 'RS', 'Santo Inacio');

INSERT INTO `tb_cidades` VALUES (7889, 23, 'RS', 'Sao Bento');

INSERT INTO `tb_cidades` VALUES (7890, 23, 'RS', 'Sao Bom Jesus');

INSERT INTO `tb_cidades` VALUES (7891, 23, 'RS', 'Sao Borja');

INSERT INTO `tb_cidades` VALUES (7892, 23, 'RS', 'Sao Carlos');

INSERT INTO `tb_cidades` VALUES (7893, 23, 'RS', 'Sao Domingos do Sul');

INSERT INTO `tb_cidades` VALUES (7894, 23, 'RS', 'Sao Francisco');

INSERT INTO `tb_cidades` VALUES (7895, 23, 'RS', 'Sao Francisco de Assis');

INSERT INTO `tb_cidades` VALUES (7896, 23, 'RS', 'Sao Francisco de Paula');

INSERT INTO `tb_cidades` VALUES (7897, 23, 'RS', 'Sao Gabriel');

INSERT INTO `tb_cidades` VALUES (7898, 23, 'RS', 'Sao Jeronimo');

INSERT INTO `tb_cidades` VALUES (7899, 23, 'RS', 'Sao Joao');

INSERT INTO `tb_cidades` VALUES (7900, 23, 'RS', 'Sao Joao Batista');

INSERT INTO `tb_cidades` VALUES (7901, 23, 'RS', 'Sao Joao Bosco');

INSERT INTO `tb_cidades` VALUES (7902, 23, 'RS', 'Sao Joao da Urtiga');

INSERT INTO `tb_cidades` VALUES (7903, 23, 'RS', 'Sao Joao do Polesine');

INSERT INTO `tb_cidades` VALUES (7904, 23, 'RS', 'Sao Jorge');

INSERT INTO `tb_cidades` VALUES (7905, 23, 'RS', 'Sao Jose');

INSERT INTO `tb_cidades` VALUES (7906, 23, 'RS', 'Sao Jose da Gloria');

INSERT INTO `tb_cidades` VALUES (7907, 23, 'RS', 'Sao Jose das Missoes');

INSERT INTO `tb_cidades` VALUES (7908, 23, 'RS', 'Sao Jose de Castro');

INSERT INTO `tb_cidades` VALUES (7909, 23, 'RS', 'Sao Jose do Centro');

INSERT INTO `tb_cidades` VALUES (7910, 23, 'RS', 'Sao Jose do Herval');

INSERT INTO `tb_cidades` VALUES (7911, 23, 'RS', 'Sao Jose do Hortencio');

INSERT INTO `tb_cidades` VALUES (7912, 23, 'RS', 'Sao Jose do Inhacora');

INSERT INTO `tb_cidades` VALUES (7913, 23, 'RS', 'Sao Jose do Norte');

INSERT INTO `tb_cidades` VALUES (7914, 23, 'RS', 'Sao Jose do Ouro');

INSERT INTO `tb_cidades` VALUES (7915, 23, 'RS', 'Sao Jose dos Ausentes');

INSERT INTO `tb_cidades` VALUES (7916, 23, 'RS', 'Sao Leopoldo');

INSERT INTO `tb_cidades` VALUES (7917, 23, 'RS', 'Sao Lourenco das Missoes');

INSERT INTO `tb_cidades` VALUES (7918, 23, 'RS', 'Sao Lourenco do Sul');

INSERT INTO `tb_cidades` VALUES (7919, 23, 'RS', 'Sao Luis Rei');

INSERT INTO `tb_cidades` VALUES (7920, 23, 'RS', 'Sao Luiz');

INSERT INTO `tb_cidades` VALUES (7921, 23, 'RS', 'Sao Luiz Gonzaga');

INSERT INTO `tb_cidades` VALUES (7922, 23, 'RS', 'Sao Manuel');

INSERT INTO `tb_cidades` VALUES (7923, 23, 'RS', 'Sao Marcos');

INSERT INTO `tb_cidades` VALUES (7924, 23, 'RS', 'Sao Martinho');

INSERT INTO `tb_cidades` VALUES (7925, 23, 'RS', 'Sao Martinho da Serra');

INSERT INTO `tb_cidades` VALUES (7926, 23, 'RS', 'Sao Miguel');

INSERT INTO `tb_cidades` VALUES (7927, 23, 'RS', 'Sao Miguel das Missoes');

INSERT INTO `tb_cidades` VALUES (7928, 23, 'RS', 'Sao Nicolau');

INSERT INTO `tb_cidades` VALUES (7929, 23, 'RS', 'Sao Paulo');

INSERT INTO `tb_cidades` VALUES (7930, 23, 'RS', 'Sao Paulo das Missoes');

INSERT INTO `tb_cidades` VALUES (7931, 23, 'RS', 'Sao Pedro');

INSERT INTO `tb_cidades` VALUES (7932, 23, 'RS', 'Sao Pedro da Serra');

INSERT INTO `tb_cidades` VALUES (7933, 23, 'RS', 'Sao Pedro do Butia');

INSERT INTO `tb_cidades` VALUES (7934, 23, 'RS', 'Sao Pedro do Iraxim');

INSERT INTO `tb_cidades` VALUES (7935, 23, 'RS', 'Sao Pedro do Sul');

INSERT INTO `tb_cidades` VALUES (7936, 23, 'RS', 'Sao Roque');

INSERT INTO `tb_cidades` VALUES (7937, 23, 'RS', 'Sao Sebastiao');

INSERT INTO `tb_cidades` VALUES (7938, 23, 'RS', 'Sao Sebastiao do Cai');

INSERT INTO `tb_cidades` VALUES (7939, 23, 'RS', 'Sao Sepe');

INSERT INTO `tb_cidades` VALUES (7940, 23, 'RS', 'Sao Simao');

INSERT INTO `tb_cidades` VALUES (7941, 23, 'RS', 'Sao Valentim');

INSERT INTO `tb_cidades` VALUES (7942, 23, 'RS', 'Sao Valentim do Sul');

INSERT INTO `tb_cidades` VALUES (7943, 23, 'RS', 'Sao Valerio do Sul');

INSERT INTO `tb_cidades` VALUES (7944, 23, 'RS', 'Sao Vendelino');

INSERT INTO `tb_cidades` VALUES (7945, 23, 'RS', 'Sao Vicente do Sul');

INSERT INTO `tb_cidades` VALUES (7946, 23, 'RS', 'Sapiranga');

INSERT INTO `tb_cidades` VALUES (7947, 23, 'RS', 'Sapucaia do Sul');

INSERT INTO `tb_cidades` VALUES (7948, 23, 'RS', 'Sarandi');

INSERT INTO `tb_cidades` VALUES (7949, 23, 'RS', 'Scharlau');

INSERT INTO `tb_cidades` VALUES (7950, 23, 'RS', 'Seberi');

INSERT INTO `tb_cidades` VALUES (7951, 23, 'RS', 'Seca');

INSERT INTO `tb_cidades` VALUES (7952, 23, 'RS', 'Sede Aurora');

INSERT INTO `tb_cidades` VALUES (7953, 23, 'RS', 'Sede Nova');

INSERT INTO `tb_cidades` VALUES (7954, 23, 'RS', 'Segredo');

INSERT INTO `tb_cidades` VALUES (7955, 23, 'RS', 'Seival');

INSERT INTO `tb_cidades` VALUES (7956, 23, 'RS', 'Selbach');

INSERT INTO `tb_cidades` VALUES (7957, 23, 'RS', 'Senador Salgado Filho');

INSERT INTO `tb_cidades` VALUES (7958, 23, 'RS', 'Sentinela do Sul');

INSERT INTO `tb_cidades` VALUES (7959, 23, 'RS', 'Serafim Schmidt');

INSERT INTO `tb_cidades` VALUES (7960, 23, 'RS', 'Serafina Correa');

INSERT INTO `tb_cidades` VALUES (7961, 23, 'RS', 'Serio');

INSERT INTO `tb_cidades` VALUES (7962, 23, 'RS', 'Serra dos Gregorios');

INSERT INTO `tb_cidades` VALUES (7963, 23, 'RS', 'Serrinha');

INSERT INTO `tb_cidades` VALUES (7964, 23, 'RS', 'Sertao');

INSERT INTO `tb_cidades` VALUES (7965, 23, 'RS', 'Sertao Santana');

INSERT INTO `tb_cidades` VALUES (7966, 23, 'RS', 'Sertaozinho');

INSERT INTO `tb_cidades` VALUES (7967, 23, 'RS', 'Sete de Setembro');

INSERT INTO `tb_cidades` VALUES (7968, 23, 'RS', 'Sete Lagoas');

INSERT INTO `tb_cidades` VALUES (7969, 23, 'RS', 'Severiano de Almeida');

INSERT INTO `tb_cidades` VALUES (7970, 23, 'RS', 'Silva Jardim');

INSERT INTO `tb_cidades` VALUES (7971, 23, 'RS', 'Silveira');

INSERT INTO `tb_cidades` VALUES (7972, 23, 'RS', 'Silveira Martins');

INSERT INTO `tb_cidades` VALUES (7973, 23, 'RS', 'Sinimbu');

INSERT INTO `tb_cidades` VALUES (7974, 23, 'RS', 'Sirio');

INSERT INTO `tb_cidades` VALUES (7975, 23, 'RS', 'Sitio Gabriel');

INSERT INTO `tb_cidades` VALUES (7976, 23, 'RS', 'Sobradinho');

INSERT INTO `tb_cidades` VALUES (7977, 23, 'RS', 'Soledade');

INSERT INTO `tb_cidades` VALUES (7978, 23, 'RS', 'Souza Ramos');

INSERT INTO `tb_cidades` VALUES (7979, 23, 'RS', 'Suspiro');

INSERT INTO `tb_cidades` VALUES (7980, 23, 'RS', 'Tabai');

INSERT INTO `tb_cidades` VALUES (7981, 23, 'RS', 'Tabajara');

INSERT INTO `tb_cidades` VALUES (7982, 23, 'RS', 'Taim');

INSERT INTO `tb_cidades` VALUES (7983, 23, 'RS', 'Tainhas');

INSERT INTO `tb_cidades` VALUES (7984, 23, 'RS', 'Tamandua');

INSERT INTO `tb_cidades` VALUES (7985, 23, 'RS', 'Tanque');

INSERT INTO `tb_cidades` VALUES (7986, 23, 'RS', 'Tapejara');

INSERT INTO `tb_cidades` VALUES (7987, 23, 'RS', 'Tapera');

INSERT INTO `tb_cidades` VALUES (7988, 23, 'RS', 'Tapes');

INSERT INTO `tb_cidades` VALUES (7989, 23, 'RS', 'Taquara');

INSERT INTO `tb_cidades` VALUES (7990, 23, 'RS', 'Taquari');

INSERT INTO `tb_cidades` VALUES (7991, 23, 'RS', 'Taquarichim');

INSERT INTO `tb_cidades` VALUES (7992, 23, 'RS', 'Taquarucu do Sul');

INSERT INTO `tb_cidades` VALUES (7993, 23, 'RS', 'Tavares');

INSERT INTO `tb_cidades` VALUES (7994, 23, 'RS', 'Tenente Portela');

INSERT INTO `tb_cidades` VALUES (7995, 23, 'RS', 'Terra de Areia');

INSERT INTO `tb_cidades` VALUES (7996, 23, 'RS', 'Tesouras');

INSERT INTO `tb_cidades` VALUES (7997, 23, 'RS', 'Teutonia');

INSERT INTO `tb_cidades` VALUES (7998, 23, 'RS', 'Tiaraju');

INSERT INTO `tb_cidades` VALUES (7999, 23, 'RS', 'Timbauva');

INSERT INTO `tb_cidades` VALUES (8000, 23, 'RS', 'Tiradentes do Sul');

INSERT INTO `tb_cidades` VALUES (8001, 23, 'RS', 'Toropi');

INSERT INTO `tb_cidades` VALUES (8002, 23, 'RS', 'Toroqua');

INSERT INTO `tb_cidades` VALUES (8003, 23, 'RS', 'Torquato Severo');

INSERT INTO `tb_cidades` VALUES (8004, 23, 'RS', 'Torres');

INSERT INTO `tb_cidades` VALUES (8005, 23, 'RS', 'Torrinhas');

INSERT INTO `tb_cidades` VALUES (8006, 23, 'RS', 'Touro Passo');

INSERT INTO `tb_cidades` VALUES (8007, 23, 'RS', 'Tramandai');

INSERT INTO `tb_cidades` VALUES (8008, 23, 'RS', 'Travesseiro');

INSERT INTO `tb_cidades` VALUES (8009, 23, 'RS', 'Trentin');

INSERT INTO `tb_cidades` VALUES (8010, 23, 'RS', 'Tres Arroios');

INSERT INTO `tb_cidades` VALUES (8011, 23, 'RS', 'Tres Barras');

INSERT INTO `tb_cidades` VALUES (8012, 23, 'RS', 'Tres Cachoeiras');

INSERT INTO `tb_cidades` VALUES (8013, 23, 'RS', 'Tres Coroas');

INSERT INTO `tb_cidades` VALUES (8014, 23, 'RS', 'Tres de Maio');

INSERT INTO `tb_cidades` VALUES (8015, 23, 'RS', 'Tres Forquilhas');

INSERT INTO `tb_cidades` VALUES (8016, 23, 'RS', 'Tres Palmeiras');

INSERT INTO `tb_cidades` VALUES (8017, 23, 'RS', 'Tres Passos');

INSERT INTO `tb_cidades` VALUES (8018, 23, 'RS', 'Tres Vendas');

INSERT INTO `tb_cidades` VALUES (8019, 23, 'RS', 'Trindade do Sul');

INSERT INTO `tb_cidades` VALUES (8020, 23, 'RS', 'Triunfo');

INSERT INTO `tb_cidades` VALUES (8021, 23, 'RS', 'Tronqueiras');

INSERT INTO `tb_cidades` VALUES (8022, 23, 'RS', 'Tucunduva');

INSERT INTO `tb_cidades` VALUES (8023, 23, 'RS', 'Tuiuti');

INSERT INTO `tb_cidades` VALUES (8024, 23, 'RS', 'Tunas');

INSERT INTO `tb_cidades` VALUES (8025, 23, 'RS', 'Tunel Verde');

INSERT INTO `tb_cidades` VALUES (8026, 23, 'RS', 'Tupanci do Sul');

INSERT INTO `tb_cidades` VALUES (8027, 23, 'RS', 'Tupancireta');

INSERT INTO `tb_cidades` VALUES (8028, 23, 'RS', 'Tupancy Ou Vila Block');

INSERT INTO `tb_cidades` VALUES (8029, 23, 'RS', 'Tupandi');

INSERT INTO `tb_cidades` VALUES (8030, 23, 'RS', 'Tupantuba');

INSERT INTO `tb_cidades` VALUES (8031, 23, 'RS', 'Tuparendi');

INSERT INTO `tb_cidades` VALUES (8032, 23, 'RS', 'Tupi Silveira');

INSERT INTO `tb_cidades` VALUES (8033, 23, 'RS', 'Tupinamba');

INSERT INTO `tb_cidades` VALUES (8034, 23, 'RS', 'Turucu');

INSERT INTO `tb_cidades` VALUES (8035, 23, 'RS', 'Turvinho');

INSERT INTO `tb_cidades` VALUES (8036, 23, 'RS', 'Ubiretama');

INSERT INTO `tb_cidades` VALUES (8037, 23, 'RS', 'Umbu');

INSERT INTO `tb_cidades` VALUES (8038, 23, 'RS', 'Uniao da Serra');

INSERT INTO `tb_cidades` VALUES (8039, 23, 'RS', 'Unistalda');

INSERT INTO `tb_cidades` VALUES (8040, 23, 'RS', 'Uruguaiana');

INSERT INTO `tb_cidades` VALUES (8041, 23, 'RS', 'Vacacai');

INSERT INTO `tb_cidades` VALUES (8042, 23, 'RS', 'Vacaria');

INSERT INTO `tb_cidades` VALUES (8043, 23, 'RS', 'Valdastico');

INSERT INTO `tb_cidades` VALUES (8044, 23, 'RS', 'Vale do Rio Cai');

INSERT INTO `tb_cidades` VALUES (8045, 23, 'RS', 'Vale do Sol');

INSERT INTO `tb_cidades` VALUES (8046, 23, 'RS', 'Vale Real');

INSERT INTO `tb_cidades` VALUES (8047, 23, 'RS', 'Vale Veneto');

INSERT INTO `tb_cidades` VALUES (8048, 23, 'RS', 'Vale Verde');

INSERT INTO `tb_cidades` VALUES (8049, 23, 'RS', 'Vanini');

INSERT INTO `tb_cidades` VALUES (8050, 23, 'RS', 'Venancio Aires');

INSERT INTO `tb_cidades` VALUES (8051, 23, 'RS', 'Vera Cruz');

INSERT INTO `tb_cidades` VALUES (8052, 23, 'RS', 'Veranopolis');

INSERT INTO `tb_cidades` VALUES (8053, 23, 'RS', 'Vertentes');

INSERT INTO `tb_cidades` VALUES (8054, 23, 'RS', 'Vespasiano Correa');

INSERT INTO `tb_cidades` VALUES (8055, 23, 'RS', 'Viadutos');

INSERT INTO `tb_cidades` VALUES (8056, 23, 'RS', 'Viamao');

INSERT INTO `tb_cidades` VALUES (8057, 23, 'RS', 'Vicente Dutra');

INSERT INTO `tb_cidades` VALUES (8058, 23, 'RS', 'Victor Graeff');

INSERT INTO `tb_cidades` VALUES (8059, 23, 'RS', 'Vila Bender');

INSERT INTO `tb_cidades` VALUES (8060, 23, 'RS', 'Vila Cruz');

INSERT INTO `tb_cidades` VALUES (8061, 23, 'RS', 'Vila Flores');

INSERT INTO `tb_cidades` VALUES (8062, 23, 'RS', 'Vila Langaro');

INSERT INTO `tb_cidades` VALUES (8063, 23, 'RS', 'Vila Laranjeira');

INSERT INTO `tb_cidades` VALUES (8064, 23, 'RS', 'Vila Maria');

INSERT INTO `tb_cidades` VALUES (8065, 23, 'RS', 'Vila Nova do Sul');

INSERT INTO `tb_cidades` VALUES (8066, 23, 'RS', 'Vila Rica');

INSERT INTO `tb_cidades` VALUES (8067, 23, 'RS', 'Vila Seca');

INSERT INTO `tb_cidades` VALUES (8068, 23, 'RS', 'Vila Turvo');

INSERT INTO `tb_cidades` VALUES (8069, 23, 'RS', 'Vista Alegre');

INSERT INTO `tb_cidades` VALUES (8070, 23, 'RS', 'Vista Alegre do Prata');

INSERT INTO `tb_cidades` VALUES (8071, 23, 'RS', 'Vista Gaucha');

INSERT INTO `tb_cidades` VALUES (8072, 23, 'RS', 'Vitoria');

INSERT INTO `tb_cidades` VALUES (8073, 23, 'RS', 'Vitoria das Missoes');

INSERT INTO `tb_cidades` VALUES (8074, 23, 'RS', 'Volta Alegre');

INSERT INTO `tb_cidades` VALUES (8075, 23, 'RS', 'Volta Fechada');

INSERT INTO `tb_cidades` VALUES (8076, 23, 'RS', 'Volta Grande');

INSERT INTO `tb_cidades` VALUES (8077, 23, 'RS', 'Xadrez');

INSERT INTO `tb_cidades` VALUES (8078, 23, 'RS', 'Xangri-la');

INSERT INTO `tb_cidades` VALUES (8079, 23, 'RS', 'Xingu');

INSERT INTO `tb_cidades` VALUES (8080, 24, 'SC', 'Abdon Batista');

INSERT INTO `tb_cidades` VALUES (8081, 24, 'SC', 'Abelardo Luz');

INSERT INTO `tb_cidades` VALUES (8082, 24, 'SC', 'Agrolandia');

INSERT INTO `tb_cidades` VALUES (8083, 24, 'SC', 'Agronomica');

INSERT INTO `tb_cidades` VALUES (8084, 24, 'SC', 'Agua Doce');

INSERT INTO `tb_cidades` VALUES (8085, 24, 'SC', 'Aguas Brancas');

INSERT INTO `tb_cidades` VALUES (8086, 24, 'SC', 'Aguas Claras');

INSERT INTO `tb_cidades` VALUES (8087, 24, 'SC', 'Aguas de Chapeco');

INSERT INTO `tb_cidades` VALUES (8088, 24, 'SC', 'Aguas Frias');

INSERT INTO `tb_cidades` VALUES (8089, 24, 'SC', 'Aguas Mornas');

INSERT INTO `tb_cidades` VALUES (8090, 24, 'SC', 'Aguti');

INSERT INTO `tb_cidades` VALUES (8091, 24, 'SC', 'Aiure');

INSERT INTO `tb_cidades` VALUES (8092, 24, 'SC', 'Alfredo Wagner');

INSERT INTO `tb_cidades` VALUES (8093, 24, 'SC', 'Alto Alegre');

INSERT INTO `tb_cidades` VALUES (8094, 24, 'SC', 'Alto Bela Vista');

INSERT INTO `tb_cidades` VALUES (8095, 24, 'SC', 'Alto da Serra');

INSERT INTO `tb_cidades` VALUES (8096, 24, 'SC', 'Anchieta');

INSERT INTO `tb_cidades` VALUES (8097, 24, 'SC', 'Angelina');

INSERT INTO `tb_cidades` VALUES (8098, 24, 'SC', 'Anita Garibaldi');

INSERT INTO `tb_cidades` VALUES (8099, 24, 'SC', 'Anitapolis');

INSERT INTO `tb_cidades` VALUES (8100, 24, 'SC', 'Anta Gorda');

INSERT INTO `tb_cidades` VALUES (8101, 24, 'SC', 'Antonio Carlos');

INSERT INTO `tb_cidades` VALUES (8102, 24, 'SC', 'Apiuna');

INSERT INTO `tb_cidades` VALUES (8103, 24, 'SC', 'Arabuta');

INSERT INTO `tb_cidades` VALUES (8104, 24, 'SC', 'Araquari');

INSERT INTO `tb_cidades` VALUES (8105, 24, 'SC', 'Ararangua');

INSERT INTO `tb_cidades` VALUES (8106, 24, 'SC', 'Armazem');

INSERT INTO `tb_cidades` VALUES (8107, 24, 'SC', 'Arnopolis');

INSERT INTO `tb_cidades` VALUES (8108, 24, 'SC', 'Arroio Trinta');

INSERT INTO `tb_cidades` VALUES (8109, 24, 'SC', 'Arvoredo');

INSERT INTO `tb_cidades` VALUES (8110, 24, 'SC', 'Ascurra');

INSERT INTO `tb_cidades` VALUES (8111, 24, 'SC', 'Atalanta');

INSERT INTO `tb_cidades` VALUES (8112, 24, 'SC', 'Aterrado Torto');

INSERT INTO `tb_cidades` VALUES (8113, 24, 'SC', 'Aurora');

INSERT INTO `tb_cidades` VALUES (8114, 24, 'SC', 'Azambuja');

INSERT INTO `tb_cidades` VALUES (8115, 24, 'SC', 'Baia Alta');

INSERT INTO `tb_cidades` VALUES (8116, 24, 'SC', 'Balneario Arroio do Silva');

INSERT INTO `tb_cidades` VALUES (8117, 24, 'SC', 'Balneario Barra do Sul');

INSERT INTO `tb_cidades` VALUES (8118, 24, 'SC', 'Balneario Camboriu');

INSERT INTO `tb_cidades` VALUES (8119, 24, 'SC', 'Balneario Gaivota');

INSERT INTO `tb_cidades` VALUES (8120, 24, 'SC', 'Balneario Morro dos Conventos');

INSERT INTO `tb_cidades` VALUES (8121, 24, 'SC', 'Bandeirante');

INSERT INTO `tb_cidades` VALUES (8122, 24, 'SC', 'Barra Bonita');

INSERT INTO `tb_cidades` VALUES (8123, 24, 'SC', 'Barra Clara');

INSERT INTO `tb_cidades` VALUES (8124, 24, 'SC', 'Barra da Lagoa');

INSERT INTO `tb_cidades` VALUES (8125, 24, 'SC', 'Barra da Prata');

INSERT INTO `tb_cidades` VALUES (8126, 24, 'SC', 'Barra Fria');

INSERT INTO `tb_cidades` VALUES (8127, 24, 'SC', 'Barra Grande');

INSERT INTO `tb_cidades` VALUES (8128, 24, 'SC', 'Barra Velha');

INSERT INTO `tb_cidades` VALUES (8129, 24, 'SC', 'Barreiros');

INSERT INTO `tb_cidades` VALUES (8130, 24, 'SC', 'Barro Branco');

INSERT INTO `tb_cidades` VALUES (8131, 24, 'SC', 'Bateias de Baixo');

INSERT INTO `tb_cidades` VALUES (8132, 24, 'SC', 'Bela Vista');

INSERT INTO `tb_cidades` VALUES (8133, 24, 'SC', 'Bela Vista do Sul');

INSERT INTO `tb_cidades` VALUES (8134, 24, 'SC', 'Bela Vista do Toldo');

INSERT INTO `tb_cidades` VALUES (8135, 24, 'SC', 'Belmonte');

INSERT INTO `tb_cidades` VALUES (8136, 24, 'SC', 'Benedito Novo');

INSERT INTO `tb_cidades` VALUES (8137, 24, 'SC', 'Biguacu');

INSERT INTO `tb_cidades` VALUES (8138, 24, 'SC', 'Blumenau');

INSERT INTO `tb_cidades` VALUES (8139, 24, 'SC', 'Bocaina do Sul');

INSERT INTO `tb_cidades` VALUES (8140, 24, 'SC', 'Boiteuxburgo');

INSERT INTO `tb_cidades` VALUES (8141, 24, 'SC', 'Bom Jardim da Serra');

INSERT INTO `tb_cidades` VALUES (8142, 24, 'SC', 'Bom Jesus');

INSERT INTO `tb_cidades` VALUES (8143, 24, 'SC', 'Bom Jesus do Oeste');

INSERT INTO `tb_cidades` VALUES (8144, 24, 'SC', 'Bom Retiro');

INSERT INTO `tb_cidades` VALUES (8145, 24, 'SC', 'Bom Sucesso');

INSERT INTO `tb_cidades` VALUES (8146, 24, 'SC', 'Bombinhas');

INSERT INTO `tb_cidades` VALUES (8147, 24, 'SC', 'Botuvera');

INSERT INTO `tb_cidades` VALUES (8148, 24, 'SC', 'Braco do Norte');

INSERT INTO `tb_cidades` VALUES (8149, 24, 'SC', 'Braco do Trombudo');

INSERT INTO `tb_cidades` VALUES (8150, 24, 'SC', 'Brunopolis');

INSERT INTO `tb_cidades` VALUES (8151, 24, 'SC', 'Brusque');

INSERT INTO `tb_cidades` VALUES (8152, 24, 'SC', 'Cacador');

INSERT INTO `tb_cidades` VALUES (8153, 24, 'SC', 'Cachoeira de Fatima');

INSERT INTO `tb_cidades` VALUES (8154, 24, 'SC', 'Cachoeira do Bom Jesus');

INSERT INTO `tb_cidades` VALUES (8155, 24, 'SC', 'Caibi');

INSERT INTO `tb_cidades` VALUES (8156, 24, 'SC', 'Calmon');

INSERT INTO `tb_cidades` VALUES (8157, 24, 'SC', 'Camboriu');

INSERT INTO `tb_cidades` VALUES (8158, 24, 'SC', 'Cambuinzal');

INSERT INTO `tb_cidades` VALUES (8159, 24, 'SC', 'Campeche');

INSERT INTO `tb_cidades` VALUES (8160, 24, 'SC', 'Campinas');

INSERT INTO `tb_cidades` VALUES (8161, 24, 'SC', 'Campo Alegre');

INSERT INTO `tb_cidades` VALUES (8162, 24, 'SC', 'Campo Belo do Sul');

INSERT INTO `tb_cidades` VALUES (8163, 24, 'SC', 'Campo Ere');

INSERT INTO `tb_cidades` VALUES (8164, 24, 'SC', 'Campos Novos');

INSERT INTO `tb_cidades` VALUES (8165, 24, 'SC', 'Canasvieiras');

INSERT INTO `tb_cidades` VALUES (8166, 24, 'SC', 'Canelinha');

INSERT INTO `tb_cidades` VALUES (8167, 24, 'SC', 'Canoas');

INSERT INTO `tb_cidades` VALUES (8168, 24, 'SC', 'Canoinhas');

INSERT INTO `tb_cidades` VALUES (8169, 24, 'SC', 'Capao Alto');

INSERT INTO `tb_cidades` VALUES (8170, 24, 'SC', 'Capinzal');

INSERT INTO `tb_cidades` VALUES (8171, 24, 'SC', 'Capivari de Baixo');

INSERT INTO `tb_cidades` VALUES (8172, 24, 'SC', 'Caraiba');

INSERT INTO `tb_cidades` VALUES (8173, 24, 'SC', 'Catanduvas');

INSERT INTO `tb_cidades` VALUES (8174, 24, 'SC', 'Catuira');

INSERT INTO `tb_cidades` VALUES (8175, 24, 'SC', 'Caxambu do Sul');

INSERT INTO `tb_cidades` VALUES (8176, 24, 'SC', 'Cedro Alto');

INSERT INTO `tb_cidades` VALUES (8177, 24, 'SC', 'Celso Ramos');

INSERT INTO `tb_cidades` VALUES (8178, 24, 'SC', 'Cerro Negro');

INSERT INTO `tb_cidades` VALUES (8179, 24, 'SC', 'Chapadao do Lageado');

INSERT INTO `tb_cidades` VALUES (8180, 24, 'SC', 'Chapeco');

INSERT INTO `tb_cidades` VALUES (8181, 24, 'SC', 'Claraiba');

INSERT INTO `tb_cidades` VALUES (8182, 24, 'SC', 'Cocal do Sul');

INSERT INTO `tb_cidades` VALUES (8183, 24, 'SC', 'Colonia Santa Tereza');

INSERT INTO `tb_cidades` VALUES (8184, 24, 'SC', 'Colonia Santana');

INSERT INTO `tb_cidades` VALUES (8185, 24, 'SC', 'Concordia');

INSERT INTO `tb_cidades` VALUES (8186, 24, 'SC', 'Cordilheira Alta');

INSERT INTO `tb_cidades` VALUES (8187, 24, 'SC', 'Coronel Freitas');

INSERT INTO `tb_cidades` VALUES (8188, 24, 'SC', 'Coronel Martins');

INSERT INTO `tb_cidades` VALUES (8189, 24, 'SC', 'Correia Pinto');

INSERT INTO `tb_cidades` VALUES (8190, 24, 'SC', 'Corupa');

INSERT INTO `tb_cidades` VALUES (8191, 24, 'SC', 'Criciuma');

INSERT INTO `tb_cidades` VALUES (8192, 24, 'SC', 'Cunha Pora');

INSERT INTO `tb_cidades` VALUES (8193, 24, 'SC', 'Cunhatai');

INSERT INTO `tb_cidades` VALUES (8194, 24, 'SC', 'Curitibanos');

INSERT INTO `tb_cidades` VALUES (8195, 24, 'SC', 'Dal Pai');

INSERT INTO `tb_cidades` VALUES (8196, 24, 'SC', 'Dalbergia');

INSERT INTO `tb_cidades` VALUES (8197, 24, 'SC', 'Descanso');

INSERT INTO `tb_cidades` VALUES (8198, 24, 'SC', 'Dionisio Cerqueira');

INSERT INTO `tb_cidades` VALUES (8199, 24, 'SC', 'Dona Emma');

INSERT INTO `tb_cidades` VALUES (8200, 24, 'SC', 'Doutor Pedrinho');

INSERT INTO `tb_cidades` VALUES (8201, 24, 'SC', 'Engenho Velho');

INSERT INTO `tb_cidades` VALUES (8202, 24, 'SC', 'Enseada de Brito');

INSERT INTO `tb_cidades` VALUES (8203, 24, 'SC', 'Entre Rios');

INSERT INTO `tb_cidades` VALUES (8204, 24, 'SC', 'Ermo');

INSERT INTO `tb_cidades` VALUES (8205, 24, 'SC', 'Erval Velho');

INSERT INTO `tb_cidades` VALUES (8206, 24, 'SC', 'Espinilho');

INSERT INTO `tb_cidades` VALUES (8207, 24, 'SC', 'Estacao Cocal');

INSERT INTO `tb_cidades` VALUES (8208, 24, 'SC', 'Faxinal dos Guedes');

INSERT INTO `tb_cidades` VALUES (8209, 24, 'SC', 'Fazenda Zandavalli');

INSERT INTO `tb_cidades` VALUES (8210, 24, 'SC', 'Felipe Schmidt');

INSERT INTO `tb_cidades` VALUES (8211, 24, 'SC', 'Figueira');

INSERT INTO `tb_cidades` VALUES (8212, 24, 'SC', 'Flor do Sertao');

INSERT INTO `tb_cidades` VALUES (8213, 24, 'SC', 'Florianopolis');

INSERT INTO `tb_cidades` VALUES (8214, 24, 'SC', 'Formosa do Sul');

INSERT INTO `tb_cidades` VALUES (8215, 24, 'SC', 'Forquilhinha');

INSERT INTO `tb_cidades` VALUES (8216, 24, 'SC', 'Fragosos');

INSERT INTO `tb_cidades` VALUES (8217, 24, 'SC', 'Fraiburgo');

INSERT INTO `tb_cidades` VALUES (8218, 24, 'SC', 'Frederico Wastner');

INSERT INTO `tb_cidades` VALUES (8219, 24, 'SC', 'Frei Rogerio');

INSERT INTO `tb_cidades` VALUES (8220, 24, 'SC', 'Galvao');

INSERT INTO `tb_cidades` VALUES (8221, 24, 'SC', 'Garcia');

INSERT INTO `tb_cidades` VALUES (8222, 24, 'SC', 'Garopaba');

INSERT INTO `tb_cidades` VALUES (8223, 24, 'SC', 'Garuva');

INSERT INTO `tb_cidades` VALUES (8224, 24, 'SC', 'Gaspar');

INSERT INTO `tb_cidades` VALUES (8225, 24, 'SC', 'Goio-en');

INSERT INTO `tb_cidades` VALUES (8226, 24, 'SC', 'Governador Celso Ramos');

INSERT INTO `tb_cidades` VALUES (8227, 24, 'SC', 'Grao Para');

INSERT INTO `tb_cidades` VALUES (8228, 24, 'SC', 'Grapia');

INSERT INTO `tb_cidades` VALUES (8229, 24, 'SC', 'Gravatal');

INSERT INTO `tb_cidades` VALUES (8230, 24, 'SC', 'Guabiruba');

INSERT INTO `tb_cidades` VALUES (8231, 24, 'SC', 'Guaporanga');

INSERT INTO `tb_cidades` VALUES (8232, 24, 'SC', 'Guaraciaba');

INSERT INTO `tb_cidades` VALUES (8233, 24, 'SC', 'Guaramirim');

INSERT INTO `tb_cidades` VALUES (8234, 24, 'SC', 'Guaruja do Sul');

INSERT INTO `tb_cidades` VALUES (8235, 24, 'SC', 'Guata');

INSERT INTO `tb_cidades` VALUES (8236, 24, 'SC', 'Guatambu');

INSERT INTO `tb_cidades` VALUES (8237, 24, 'SC', 'Hercilio Luz');

INSERT INTO `tb_cidades` VALUES (8238, 24, 'SC', 'Herciliopolis');

INSERT INTO `tb_cidades` VALUES (8239, 24, 'SC', 'Herval D''oeste');

INSERT INTO `tb_cidades` VALUES (8240, 24, 'SC', 'Ibiam');

INSERT INTO `tb_cidades` VALUES (8241, 24, 'SC', 'Ibicare');

INSERT INTO `tb_cidades` VALUES (8242, 24, 'SC', 'Ibicui');

INSERT INTO `tb_cidades` VALUES (8243, 24, 'SC', 'Ibirama');

INSERT INTO `tb_cidades` VALUES (8244, 24, 'SC', 'Icara');

INSERT INTO `tb_cidades` VALUES (8245, 24, 'SC', 'Ilhota');

INSERT INTO `tb_cidades` VALUES (8246, 24, 'SC', 'Imarui');

INSERT INTO `tb_cidades` VALUES (8247, 24, 'SC', 'Imbituba');

INSERT INTO `tb_cidades` VALUES (8248, 24, 'SC', 'Imbuia');

INSERT INTO `tb_cidades` VALUES (8249, 24, 'SC', 'Indaial');

INSERT INTO `tb_cidades` VALUES (8250, 24, 'SC', 'Indios');

INSERT INTO `tb_cidades` VALUES (8251, 24, 'SC', 'Ingleses do Rio Vermelho');

INSERT INTO `tb_cidades` VALUES (8252, 24, 'SC', 'Invernada');

INSERT INTO `tb_cidades` VALUES (8253, 24, 'SC', 'Iomere');

INSERT INTO `tb_cidades` VALUES (8254, 24, 'SC', 'Ipira');

INSERT INTO `tb_cidades` VALUES (8255, 24, 'SC', 'Ipomeia');

INSERT INTO `tb_cidades` VALUES (8256, 24, 'SC', 'Ipora do Oeste');

INSERT INTO `tb_cidades` VALUES (8257, 24, 'SC', 'Ipuacu');

INSERT INTO `tb_cidades` VALUES (8258, 24, 'SC', 'Ipumirim');

INSERT INTO `tb_cidades` VALUES (8259, 24, 'SC', 'Iraceminha');

INSERT INTO `tb_cidades` VALUES (8260, 24, 'SC', 'Irakitan');

INSERT INTO `tb_cidades` VALUES (8261, 24, 'SC', 'Irani');

INSERT INTO `tb_cidades` VALUES (8262, 24, 'SC', 'Iraputa');

INSERT INTO `tb_cidades` VALUES (8263, 24, 'SC', 'Irati');

INSERT INTO `tb_cidades` VALUES (8264, 24, 'SC', 'Irineopolis');

INSERT INTO `tb_cidades` VALUES (8265, 24, 'SC', 'Ita');

INSERT INTO `tb_cidades` VALUES (8266, 24, 'SC', 'Itaio');

INSERT INTO `tb_cidades` VALUES (8267, 24, 'SC', 'Itaiopolis');

INSERT INTO `tb_cidades` VALUES (8268, 24, 'SC', 'Itajai');

INSERT INTO `tb_cidades` VALUES (8269, 24, 'SC', 'Itajuba');

INSERT INTO `tb_cidades` VALUES (8270, 24, 'SC', 'Itapema');

INSERT INTO `tb_cidades` VALUES (8271, 24, 'SC', 'Itapiranga');

INSERT INTO `tb_cidades` VALUES (8272, 24, 'SC', 'Itapoa');

INSERT INTO `tb_cidades` VALUES (8273, 24, 'SC', 'Itapocu');

INSERT INTO `tb_cidades` VALUES (8274, 24, 'SC', 'Itoupava');

INSERT INTO `tb_cidades` VALUES (8275, 24, 'SC', 'Ituporanga');

INSERT INTO `tb_cidades` VALUES (8276, 24, 'SC', 'Jabora');

INSERT INTO `tb_cidades` VALUES (8277, 24, 'SC', 'Jacinto Machado');

INSERT INTO `tb_cidades` VALUES (8278, 24, 'SC', 'Jaguaruna');

INSERT INTO `tb_cidades` VALUES (8279, 24, 'SC', 'Jaragua do Sul');

INSERT INTO `tb_cidades` VALUES (8280, 24, 'SC', 'Jardinopolis');

INSERT INTO `tb_cidades` VALUES (8281, 24, 'SC', 'Joacaba');

INSERT INTO `tb_cidades` VALUES (8282, 24, 'SC', 'Joinville');

INSERT INTO `tb_cidades` VALUES (8283, 24, 'SC', 'Jose Boiteux');

INSERT INTO `tb_cidades` VALUES (8284, 24, 'SC', 'Jupia');

INSERT INTO `tb_cidades` VALUES (8285, 24, 'SC', 'Lacerdopolis');

INSERT INTO `tb_cidades` VALUES (8286, 24, 'SC', 'Lages');

INSERT INTO `tb_cidades` VALUES (8287, 24, 'SC', 'Lagoa');

INSERT INTO `tb_cidades` VALUES (8288, 24, 'SC', 'Lagoa da Estiva');

INSERT INTO `tb_cidades` VALUES (8289, 24, 'SC', 'Laguna');

INSERT INTO `tb_cidades` VALUES (8290, 24, 'SC', 'Lajeado Grande');

INSERT INTO `tb_cidades` VALUES (8291, 24, 'SC', 'Laurentino');

INSERT INTO `tb_cidades` VALUES (8292, 24, 'SC', 'Lauro Muller');

INSERT INTO `tb_cidades` VALUES (8293, 24, 'SC', 'Leao');

INSERT INTO `tb_cidades` VALUES (8294, 24, 'SC', 'Lebon Regis');

INSERT INTO `tb_cidades` VALUES (8295, 24, 'SC', 'Leoberto Leal');

INSERT INTO `tb_cidades` VALUES (8296, 24, 'SC', 'Lindoia do Sul');

INSERT INTO `tb_cidades` VALUES (8297, 24, 'SC', 'Linha das Palmeiras');

INSERT INTO `tb_cidades` VALUES (8298, 24, 'SC', 'Lontras');

INSERT INTO `tb_cidades` VALUES (8299, 24, 'SC', 'Lourdes');

INSERT INTO `tb_cidades` VALUES (8300, 24, 'SC', 'Luiz Alves');

INSERT INTO `tb_cidades` VALUES (8301, 24, 'SC', 'Luzerna');

INSERT INTO `tb_cidades` VALUES (8302, 24, 'SC', 'Machados');

INSERT INTO `tb_cidades` VALUES (8303, 24, 'SC', 'Macieira');

INSERT INTO `tb_cidades` VALUES (8304, 24, 'SC', 'Mafra');

INSERT INTO `tb_cidades` VALUES (8305, 24, 'SC', 'Major Gercino');

INSERT INTO `tb_cidades` VALUES (8306, 24, 'SC', 'Major Vieira');

INSERT INTO `tb_cidades` VALUES (8307, 24, 'SC', 'Maracaja');

INSERT INTO `tb_cidades` VALUES (8308, 24, 'SC', 'Marari');

INSERT INTO `tb_cidades` VALUES (8309, 24, 'SC', 'Marata');

INSERT INTO `tb_cidades` VALUES (8310, 24, 'SC', 'Maravilha');

INSERT INTO `tb_cidades` VALUES (8311, 24, 'SC', 'Marcilio Dias');

INSERT INTO `tb_cidades` VALUES (8312, 24, 'SC', 'Marechal Bormann');

INSERT INTO `tb_cidades` VALUES (8313, 24, 'SC', 'Marema');

INSERT INTO `tb_cidades` VALUES (8314, 24, 'SC', 'Mariflor');

INSERT INTO `tb_cidades` VALUES (8315, 24, 'SC', 'Marombas');

INSERT INTO `tb_cidades` VALUES (8316, 24, 'SC', 'Marombas Bossardi');

INSERT INTO `tb_cidades` VALUES (8317, 24, 'SC', 'Massaranduba');

INSERT INTO `tb_cidades` VALUES (8318, 24, 'SC', 'Matos Costa');

INSERT INTO `tb_cidades` VALUES (8319, 24, 'SC', 'Meleiro');

INSERT INTO `tb_cidades` VALUES (8320, 24, 'SC', 'Mirador');

INSERT INTO `tb_cidades` VALUES (8321, 24, 'SC', 'Mirim');

INSERT INTO `tb_cidades` VALUES (8322, 24, 'SC', 'Mirim Doce');

INSERT INTO `tb_cidades` VALUES (8323, 24, 'SC', 'Modelo');

INSERT INTO `tb_cidades` VALUES (8324, 24, 'SC', 'Mondai');

INSERT INTO `tb_cidades` VALUES (8325, 24, 'SC', 'Monte Alegre');

INSERT INTO `tb_cidades` VALUES (8326, 24, 'SC', 'Monte Carlo');

INSERT INTO `tb_cidades` VALUES (8327, 24, 'SC', 'Monte Castelo');

INSERT INTO `tb_cidades` VALUES (8328, 24, 'SC', 'Morro Chato');

INSERT INTO `tb_cidades` VALUES (8329, 24, 'SC', 'Morro da Fumaca');

INSERT INTO `tb_cidades` VALUES (8330, 24, 'SC', 'Morro do Meio');

INSERT INTO `tb_cidades` VALUES (8331, 24, 'SC', 'Morro Grande');

INSERT INTO `tb_cidades` VALUES (8332, 24, 'SC', 'Navegantes');

INSERT INTO `tb_cidades` VALUES (8333, 24, 'SC', 'Nossa Senhora de Caravaggio');

INSERT INTO `tb_cidades` VALUES (8334, 24, 'SC', 'Nova Cultura');

INSERT INTO `tb_cidades` VALUES (8335, 24, 'SC', 'Nova Erechim');

INSERT INTO `tb_cidades` VALUES (8336, 24, 'SC', 'Nova Guarita');

INSERT INTO `tb_cidades` VALUES (8337, 24, 'SC', 'Nova Itaberaba');

INSERT INTO `tb_cidades` VALUES (8338, 24, 'SC', 'Nova Petropolis');

INSERT INTO `tb_cidades` VALUES (8339, 24, 'SC', 'Nova Teutonia');

INSERT INTO `tb_cidades` VALUES (8340, 24, 'SC', 'Nova Trento');

INSERT INTO `tb_cidades` VALUES (8341, 24, 'SC', 'Nova Veneza');

INSERT INTO `tb_cidades` VALUES (8342, 24, 'SC', 'Novo Horizonte');

INSERT INTO `tb_cidades` VALUES (8343, 24, 'SC', 'Orleans');

INSERT INTO `tb_cidades` VALUES (8344, 24, 'SC', 'Otacilio Costa');

INSERT INTO `tb_cidades` VALUES (8345, 24, 'SC', 'Ouro');

INSERT INTO `tb_cidades` VALUES (8346, 24, 'SC', 'Ouro Verde');

INSERT INTO `tb_cidades` VALUES (8347, 24, 'SC', 'Paial');

INSERT INTO `tb_cidades` VALUES (8348, 24, 'SC', 'Painel');

INSERT INTO `tb_cidades` VALUES (8349, 24, 'SC', 'Palhoca');

INSERT INTO `tb_cidades` VALUES (8350, 24, 'SC', 'Palma Sola');

INSERT INTO `tb_cidades` VALUES (8351, 24, 'SC', 'Palmeira');

INSERT INTO `tb_cidades` VALUES (8352, 24, 'SC', 'Palmitos');

INSERT INTO `tb_cidades` VALUES (8353, 24, 'SC', 'Pantano do Sul');

INSERT INTO `tb_cidades` VALUES (8354, 24, 'SC', 'Papanduva');

INSERT INTO `tb_cidades` VALUES (8355, 24, 'SC', 'Paraiso');

INSERT INTO `tb_cidades` VALUES (8356, 24, 'SC', 'Passo de Torres');

INSERT INTO `tb_cidades` VALUES (8357, 24, 'SC', 'Passo Manso');

INSERT INTO `tb_cidades` VALUES (8358, 24, 'SC', 'Passos Maia');

INSERT INTO `tb_cidades` VALUES (8359, 24, 'SC', 'Paula Pereira');

INSERT INTO `tb_cidades` VALUES (8360, 24, 'SC', 'Paulo Lopes');

INSERT INTO `tb_cidades` VALUES (8361, 24, 'SC', 'Pedras Grandes');

INSERT INTO `tb_cidades` VALUES (8362, 24, 'SC', 'Penha');

INSERT INTO `tb_cidades` VALUES (8363, 24, 'SC', 'Perico');

INSERT INTO `tb_cidades` VALUES (8364, 24, 'SC', 'Peritiba');

INSERT INTO `tb_cidades` VALUES (8365, 24, 'SC', 'Pescaria Brava');

INSERT INTO `tb_cidades` VALUES (8366, 24, 'SC', 'Petrolandia');

INSERT INTO `tb_cidades` VALUES (8367, 24, 'SC', 'Picarras');

INSERT INTO `tb_cidades` VALUES (8368, 24, 'SC', 'Pindotiba');

INSERT INTO `tb_cidades` VALUES (8369, 24, 'SC', 'Pinhalzinho');

INSERT INTO `tb_cidades` VALUES (8370, 24, 'SC', 'Pinheiral');

INSERT INTO `tb_cidades` VALUES (8371, 24, 'SC', 'Pinheiro Preto');

INSERT INTO `tb_cidades` VALUES (8372, 24, 'SC', 'Pinheiros');

INSERT INTO `tb_cidades` VALUES (8373, 24, 'SC', 'Pirabeiraba');

INSERT INTO `tb_cidades` VALUES (8374, 24, 'SC', 'Piratuba');

INSERT INTO `tb_cidades` VALUES (8375, 24, 'SC', 'Planalto');

INSERT INTO `tb_cidades` VALUES (8376, 24, 'SC', 'Planalto Alegre');

INSERT INTO `tb_cidades` VALUES (8377, 24, 'SC', 'Poco Preto');

INSERT INTO `tb_cidades` VALUES (8378, 24, 'SC', 'Pomerode');

INSERT INTO `tb_cidades` VALUES (8379, 24, 'SC', 'Ponte Alta');

INSERT INTO `tb_cidades` VALUES (8380, 24, 'SC', 'Ponte Alta do Norte');

INSERT INTO `tb_cidades` VALUES (8381, 24, 'SC', 'Ponte Serrada');

INSERT INTO `tb_cidades` VALUES (8382, 24, 'SC', 'Porto Belo');

INSERT INTO `tb_cidades` VALUES (8383, 24, 'SC', 'Porto Uniao');

INSERT INTO `tb_cidades` VALUES (8384, 24, 'SC', 'Pouso Redondo');

INSERT INTO `tb_cidades` VALUES (8385, 24, 'SC', 'Praia Grande');

INSERT INTO `tb_cidades` VALUES (8386, 24, 'SC', 'Prata');

INSERT INTO `tb_cidades` VALUES (8387, 24, 'SC', 'Presidente Castelo Branco');

INSERT INTO `tb_cidades` VALUES (8388, 24, 'SC', 'Presidente Getulio');

INSERT INTO `tb_cidades` VALUES (8389, 24, 'SC', 'Presidente Juscelino');

INSERT INTO `tb_cidades` VALUES (8390, 24, 'SC', 'Presidente Kennedy');

INSERT INTO `tb_cidades` VALUES (8391, 24, 'SC', 'Presidente Nereu');

INSERT INTO `tb_cidades` VALUES (8392, 24, 'SC', 'Princesa');

INSERT INTO `tb_cidades` VALUES (8393, 24, 'SC', 'Quarta Linha');

INSERT INTO `tb_cidades` VALUES (8394, 24, 'SC', 'Quilombo');

INSERT INTO `tb_cidades` VALUES (8395, 24, 'SC', 'Quilometro Doze');

INSERT INTO `tb_cidades` VALUES (8396, 24, 'SC', 'Rancho Queimado');

INSERT INTO `tb_cidades` VALUES (8397, 24, 'SC', 'Ratones');

INSERT INTO `tb_cidades` VALUES (8398, 24, 'SC', 'Residencia Fuck');

INSERT INTO `tb_cidades` VALUES (8399, 24, 'SC', 'Ribeirao da Ilha');

INSERT INTO `tb_cidades` VALUES (8400, 24, 'SC', 'Ribeirao Pequeno');

INSERT INTO `tb_cidades` VALUES (8401, 24, 'SC', 'Rio Antinha');

INSERT INTO `tb_cidades` VALUES (8402, 24, 'SC', 'Rio Bonito');

INSERT INTO `tb_cidades` VALUES (8403, 24, 'SC', 'Rio D''una');

INSERT INTO `tb_cidades` VALUES (8404, 24, 'SC', 'Rio da Anta');

INSERT INTO `tb_cidades` VALUES (8405, 24, 'SC', 'Rio da Luz');

INSERT INTO `tb_cidades` VALUES (8406, 24, 'SC', 'Rio das Antas');

INSERT INTO `tb_cidades` VALUES (8407, 24, 'SC', 'Rio das Furnas');

INSERT INTO `tb_cidades` VALUES (8408, 24, 'SC', 'Rio do Campo');

INSERT INTO `tb_cidades` VALUES (8409, 24, 'SC', 'Rio do Oeste');

INSERT INTO `tb_cidades` VALUES (8410, 24, 'SC', 'Rio do Sul');

INSERT INTO `tb_cidades` VALUES (8411, 24, 'SC', 'Rio dos Bugres');

INSERT INTO `tb_cidades` VALUES (8412, 24, 'SC', 'Rio dos Cedros');

INSERT INTO `tb_cidades` VALUES (8413, 24, 'SC', 'Rio Fortuna');

INSERT INTO `tb_cidades` VALUES (8414, 24, 'SC', 'Rio Maina');

INSERT INTO `tb_cidades` VALUES (8415, 24, 'SC', 'Rio Negrinho');

INSERT INTO `tb_cidades` VALUES (8416, 24, 'SC', 'Rio Preto do Sul');

INSERT INTO `tb_cidades` VALUES (8417, 24, 'SC', 'Rio Rufino');

INSERT INTO `tb_cidades` VALUES (8418, 24, 'SC', 'Riqueza');

INSERT INTO `tb_cidades` VALUES (8419, 24, 'SC', 'Rodeio');

INSERT INTO `tb_cidades` VALUES (8420, 24, 'SC', 'Romelandia');

INSERT INTO `tb_cidades` VALUES (8421, 24, 'SC', 'Sai');

INSERT INTO `tb_cidades` VALUES (8422, 24, 'SC', 'Salete');

INSERT INTO `tb_cidades` VALUES (8423, 24, 'SC', 'Saltinho');

INSERT INTO `tb_cidades` VALUES (8424, 24, 'SC', 'Salto Veloso');

INSERT INTO `tb_cidades` VALUES (8425, 24, 'SC', 'Sanga da Toca');

INSERT INTO `tb_cidades` VALUES (8426, 24, 'SC', 'Sangao');

INSERT INTO `tb_cidades` VALUES (8427, 24, 'SC', 'Santa Cecilia');

INSERT INTO `tb_cidades` VALUES (8428, 24, 'SC', 'Santa Cruz do Timbo');

INSERT INTO `tb_cidades` VALUES (8429, 24, 'SC', 'Santa Helena');

INSERT INTO `tb_cidades` VALUES (8430, 24, 'SC', 'Santa Izabel');

INSERT INTO `tb_cidades` VALUES (8431, 24, 'SC', 'Santa Lucia');

INSERT INTO `tb_cidades` VALUES (8432, 24, 'SC', 'Santa Maria');

INSERT INTO `tb_cidades` VALUES (8433, 24, 'SC', 'Santa Rosa de Lima');

INSERT INTO `tb_cidades` VALUES (8434, 24, 'SC', 'Santa Rosa do Sul');

INSERT INTO `tb_cidades` VALUES (8435, 24, 'SC', 'Santa Terezinha');

INSERT INTO `tb_cidades` VALUES (8436, 24, 'SC', 'Santa Terezinha do Progresso');

INSERT INTO `tb_cidades` VALUES (8437, 24, 'SC', 'Santa Terezinha do Salto');

INSERT INTO `tb_cidades` VALUES (8438, 24, 'SC', 'Santiago do Sul');

INSERT INTO `tb_cidades` VALUES (8439, 24, 'SC', 'Santo Amaro da Imperatriz');

INSERT INTO `tb_cidades` VALUES (8440, 24, 'SC', 'Santo Antonio de Lisboa');

INSERT INTO `tb_cidades` VALUES (8441, 24, 'SC', 'Sao Bento Baixo');

INSERT INTO `tb_cidades` VALUES (8442, 24, 'SC', 'Sao Bento do Sul');

INSERT INTO `tb_cidades` VALUES (8443, 24, 'SC', 'Sao Bernardino');

INSERT INTO `tb_cidades` VALUES (8444, 24, 'SC', 'Sao Bonifacio');

INSERT INTO `tb_cidades` VALUES (8445, 24, 'SC', 'Sao Carlos');

INSERT INTO `tb_cidades` VALUES (8446, 24, 'SC', 'Sao Cristovao');

INSERT INTO `tb_cidades` VALUES (8447, 24, 'SC', 'Sao Cristovao do Sul');

INSERT INTO `tb_cidades` VALUES (8448, 24, 'SC', 'Sao Defende');

INSERT INTO `tb_cidades` VALUES (8449, 24, 'SC', 'Sao Domingos');

INSERT INTO `tb_cidades` VALUES (8450, 24, 'SC', 'Sao Francisco do Sul');

INSERT INTO `tb_cidades` VALUES (8451, 24, 'SC', 'Sao Gabriel');

INSERT INTO `tb_cidades` VALUES (8452, 24, 'SC', 'Sao Joao Batista');

INSERT INTO `tb_cidades` VALUES (8453, 24, 'SC', 'Sao Joao do Itaperiu');

INSERT INTO `tb_cidades` VALUES (8454, 24, 'SC', 'Sao Joao do Oeste');

INSERT INTO `tb_cidades` VALUES (8455, 24, 'SC', 'Sao Joao do Rio Vermelho');

INSERT INTO `tb_cidades` VALUES (8456, 24, 'SC', 'Sao Joao do Sul');

INSERT INTO `tb_cidades` VALUES (8457, 24, 'SC', 'Sao Joaquim');

INSERT INTO `tb_cidades` VALUES (8458, 24, 'SC', 'Sao Jose');

INSERT INTO `tb_cidades` VALUES (8459, 24, 'SC', 'Sao Jose do Cedro');

INSERT INTO `tb_cidades` VALUES (8460, 24, 'SC', 'Sao Jose do Cerrito');

INSERT INTO `tb_cidades` VALUES (8461, 24, 'SC', 'Sao Jose do Laranjal');

INSERT INTO `tb_cidades` VALUES (8462, 24, 'SC', 'Sao Leonardo');

INSERT INTO `tb_cidades` VALUES (8463, 24, 'SC', 'Sao Lourenco do Oeste');

INSERT INTO `tb_cidades` VALUES (8464, 24, 'SC', 'Sao Ludgero');

INSERT INTO `tb_cidades` VALUES (8465, 24, 'SC', 'Sao Martinho');

INSERT INTO `tb_cidades` VALUES (8466, 24, 'SC', 'Sao Miguel D''oeste');

INSERT INTO `tb_cidades` VALUES (8467, 24, 'SC', 'Sao Miguel da Boa Vista');

INSERT INTO `tb_cidades` VALUES (8468, 24, 'SC', 'Sao Miguel da Serra');

INSERT INTO `tb_cidades` VALUES (8469, 24, 'SC', 'Sao Pedro de Alcantara');

INSERT INTO `tb_cidades` VALUES (8470, 24, 'SC', 'Sao Pedro Tobias');

INSERT INTO `tb_cidades` VALUES (8471, 24, 'SC', 'Sao Roque');

INSERT INTO `tb_cidades` VALUES (8472, 24, 'SC', 'Sao Sebastiao do Arvoredo');

INSERT INTO `tb_cidades` VALUES (8473, 24, 'SC', 'Sao Sebastiao do Sul');

INSERT INTO `tb_cidades` VALUES (8474, 24, 'SC', 'Sapiranga');

INSERT INTO `tb_cidades` VALUES (8475, 24, 'SC', 'Saudades');

INSERT INTO `tb_cidades` VALUES (8476, 24, 'SC', 'Schroeder');

INSERT INTO `tb_cidades` VALUES (8477, 24, 'SC', 'Seara');

INSERT INTO `tb_cidades` VALUES (8478, 24, 'SC', 'Sede Oldemburg');

INSERT INTO `tb_cidades` VALUES (8479, 24, 'SC', 'Serra Alta');

INSERT INTO `tb_cidades` VALUES (8480, 24, 'SC', 'Sertao do Maruim');

INSERT INTO `tb_cidades` VALUES (8481, 24, 'SC', 'Sideropolis');

INSERT INTO `tb_cidades` VALUES (8482, 24, 'SC', 'Sombrio');

INSERT INTO `tb_cidades` VALUES (8483, 24, 'SC', 'Sorocaba do Sul');

INSERT INTO `tb_cidades` VALUES (8484, 24, 'SC', 'Sul Brasil');

INSERT INTO `tb_cidades` VALUES (8485, 24, 'SC', 'Taio');

INSERT INTO `tb_cidades` VALUES (8486, 24, 'SC', 'Tangara');

INSERT INTO `tb_cidades` VALUES (8487, 24, 'SC', 'Taquara Verde');

INSERT INTO `tb_cidades` VALUES (8488, 24, 'SC', 'Taquaras');

INSERT INTO `tb_cidades` VALUES (8489, 24, 'SC', 'Tigipio');

INSERT INTO `tb_cidades` VALUES (8490, 24, 'SC', 'Tigrinhos');

INSERT INTO `tb_cidades` VALUES (8491, 24, 'SC', 'Tijucas');

INSERT INTO `tb_cidades` VALUES (8492, 24, 'SC', 'Timbe do Sul');

INSERT INTO `tb_cidades` VALUES (8493, 24, 'SC', 'Timbo');

INSERT INTO `tb_cidades` VALUES (8494, 24, 'SC', 'Timbo Grande');

INSERT INTO `tb_cidades` VALUES (8495, 24, 'SC', 'Tres Barras');

INSERT INTO `tb_cidades` VALUES (8496, 24, 'SC', 'Treviso');

INSERT INTO `tb_cidades` VALUES (8497, 24, 'SC', 'Treze de Maio');

INSERT INTO `tb_cidades` VALUES (8498, 24, 'SC', 'Treze Tilias');

INSERT INTO `tb_cidades` VALUES (8499, 24, 'SC', 'Trombudo Central');

INSERT INTO `tb_cidades` VALUES (8500, 24, 'SC', 'Tubarao');

INSERT INTO `tb_cidades` VALUES (8501, 24, 'SC', 'Tunapolis');

INSERT INTO `tb_cidades` VALUES (8502, 24, 'SC', 'Tupitinga');

INSERT INTO `tb_cidades` VALUES (8503, 24, 'SC', 'Turvo');

INSERT INTO `tb_cidades` VALUES (8504, 24, 'SC', 'Uniao do Oeste');

INSERT INTO `tb_cidades` VALUES (8505, 24, 'SC', 'Urubici');

INSERT INTO `tb_cidades` VALUES (8506, 24, 'SC', 'Uruguai');

INSERT INTO `tb_cidades` VALUES (8507, 24, 'SC', 'Urupema');

INSERT INTO `tb_cidades` VALUES (8508, 24, 'SC', 'Urussanga');

INSERT INTO `tb_cidades` VALUES (8509, 24, 'SC', 'Vargeao');

INSERT INTO `tb_cidades` VALUES (8510, 24, 'SC', 'Vargem');

INSERT INTO `tb_cidades` VALUES (8511, 24, 'SC', 'Vargem Bonita');

INSERT INTO `tb_cidades` VALUES (8512, 24, 'SC', 'Vargem do Cedro');

INSERT INTO `tb_cidades` VALUES (8513, 24, 'SC', 'Vidal Ramos');

INSERT INTO `tb_cidades` VALUES (8514, 24, 'SC', 'Videira');

INSERT INTO `tb_cidades` VALUES (8515, 24, 'SC', 'Vila Conceicao');

INSERT INTO `tb_cidades` VALUES (8516, 24, 'SC', 'Vila de Volta Grande');

INSERT INTO `tb_cidades` VALUES (8517, 24, 'SC', 'Vila Milani');

INSERT INTO `tb_cidades` VALUES (8518, 24, 'SC', 'Vila Nova');

INSERT INTO `tb_cidades` VALUES (8519, 24, 'SC', 'Vitor Meireles');

INSERT INTO `tb_cidades` VALUES (8520, 24, 'SC', 'Witmarsum');

INSERT INTO `tb_cidades` VALUES (8521, 24, 'SC', 'Xanxere');

INSERT INTO `tb_cidades` VALUES (8522, 24, 'SC', 'Xavantina');

INSERT INTO `tb_cidades` VALUES (8523, 24, 'SC', 'Xaxim');

INSERT INTO `tb_cidades` VALUES (8524, 24, 'SC', 'Zortea');

INSERT INTO `tb_cidades` VALUES (8525, 25, 'SE', 'Altos Verdes');

INSERT INTO `tb_cidades` VALUES (8526, 25, 'SE', 'Amparo de Sao Francisco');

INSERT INTO `tb_cidades` VALUES (8527, 25, 'SE', 'Aquidaba');

INSERT INTO `tb_cidades` VALUES (8528, 25, 'SE', 'Aracaju');

INSERT INTO `tb_cidades` VALUES (8529, 25, 'SE', 'Araua');

INSERT INTO `tb_cidades` VALUES (8530, 25, 'SE', 'Areia Branca');

INSERT INTO `tb_cidades` VALUES (8531, 25, 'SE', 'Barra dos Coqueiros');

INSERT INTO `tb_cidades` VALUES (8532, 25, 'SE', 'Barracas');

INSERT INTO `tb_cidades` VALUES (8533, 25, 'SE', 'Boquim');

INSERT INTO `tb_cidades` VALUES (8534, 25, 'SE', 'Brejo Grande');

INSERT INTO `tb_cidades` VALUES (8535, 25, 'SE', 'Campo do Brito');

INSERT INTO `tb_cidades` VALUES (8536, 25, 'SE', 'Canhoba');

INSERT INTO `tb_cidades` VALUES (8537, 25, 'SE', 'Caninde de Sao Francisco');

INSERT INTO `tb_cidades` VALUES (8538, 25, 'SE', 'Capela');

INSERT INTO `tb_cidades` VALUES (8539, 25, 'SE', 'Carira');

INSERT INTO `tb_cidades` VALUES (8540, 25, 'SE', 'Carmopolis');

INSERT INTO `tb_cidades` VALUES (8541, 25, 'SE', 'Cedro de Sao Joao');

INSERT INTO `tb_cidades` VALUES (8542, 25, 'SE', 'Cristinapolis');

INSERT INTO `tb_cidades` VALUES (8543, 25, 'SE', 'Cumbe');

INSERT INTO `tb_cidades` VALUES (8544, 25, 'SE', 'Divina Pastora');

INSERT INTO `tb_cidades` VALUES (8545, 25, 'SE', 'Estancia');

INSERT INTO `tb_cidades` VALUES (8546, 25, 'SE', 'Feira Nova');

INSERT INTO `tb_cidades` VALUES (8547, 25, 'SE', 'Frei Paulo');

INSERT INTO `tb_cidades` VALUES (8548, 25, 'SE', 'Gararu');

INSERT INTO `tb_cidades` VALUES (8549, 25, 'SE', 'General Maynard');

INSERT INTO `tb_cidades` VALUES (8550, 25, 'SE', 'Graccho Cardoso');

INSERT INTO `tb_cidades` VALUES (8551, 25, 'SE', 'Ilha das Flores');

INSERT INTO `tb_cidades` VALUES (8552, 25, 'SE', 'Indiaroba');

INSERT INTO `tb_cidades` VALUES (8553, 25, 'SE', 'Itabaiana');

INSERT INTO `tb_cidades` VALUES (8554, 25, 'SE', 'Itabaianinha');

INSERT INTO `tb_cidades` VALUES (8555, 25, 'SE', 'Itabi');

INSERT INTO `tb_cidades` VALUES (8556, 25, 'SE', 'Itaporanga D''ajuda');

INSERT INTO `tb_cidades` VALUES (8557, 25, 'SE', 'Japaratuba');

INSERT INTO `tb_cidades` VALUES (8558, 25, 'SE', 'Japoata');

INSERT INTO `tb_cidades` VALUES (8559, 25, 'SE', 'Lagarto');

INSERT INTO `tb_cidades` VALUES (8560, 25, 'SE', 'Lagoa Funda');

INSERT INTO `tb_cidades` VALUES (8561, 25, 'SE', 'Laranjeiras');

INSERT INTO `tb_cidades` VALUES (8562, 25, 'SE', 'Macambira');

INSERT INTO `tb_cidades` VALUES (8563, 25, 'SE', 'Malhada dos Bois');

INSERT INTO `tb_cidades` VALUES (8564, 25, 'SE', 'Malhador');

INSERT INTO `tb_cidades` VALUES (8565, 25, 'SE', 'Maruim');

INSERT INTO `tb_cidades` VALUES (8566, 25, 'SE', 'Miranda');

INSERT INTO `tb_cidades` VALUES (8567, 25, 'SE', 'Moita Bonita');

INSERT INTO `tb_cidades` VALUES (8568, 25, 'SE', 'Monte Alegre de Sergipe');

INSERT INTO `tb_cidades` VALUES (8569, 25, 'SE', 'Mosqueiro');

INSERT INTO `tb_cidades` VALUES (8570, 25, 'SE', 'Muribeca');

INSERT INTO `tb_cidades` VALUES (8571, 25, 'SE', 'Neopolis');

INSERT INTO `tb_cidades` VALUES (8572, 25, 'SE', 'Nossa Senhora Aparecida');

INSERT INTO `tb_cidades` VALUES (8573, 25, 'SE', 'Nossa Senhora da Gloria');

INSERT INTO `tb_cidades` VALUES (8574, 25, 'SE', 'Nossa Senhora das Dores');

INSERT INTO `tb_cidades` VALUES (8575, 25, 'SE', 'Nossa Senhora de Lourdes');

INSERT INTO `tb_cidades` VALUES (8576, 25, 'SE', 'Nossa Senhora do Socorro');

INSERT INTO `tb_cidades` VALUES (8577, 25, 'SE', 'Pacatuba');

INSERT INTO `tb_cidades` VALUES (8578, 25, 'SE', 'Palmares');

INSERT INTO `tb_cidades` VALUES (8579, 25, 'SE', 'Pedra Mole');

INSERT INTO `tb_cidades` VALUES (8580, 25, 'SE', 'Pedras');

INSERT INTO `tb_cidades` VALUES (8581, 25, 'SE', 'Pedrinhas');

INSERT INTO `tb_cidades` VALUES (8582, 25, 'SE', 'Pinhao');

INSERT INTO `tb_cidades` VALUES (8583, 25, 'SE', 'Pirambu');

INSERT INTO `tb_cidades` VALUES (8584, 25, 'SE', 'Poco Redondo');

INSERT INTO `tb_cidades` VALUES (8585, 25, 'SE', 'Poco Verde');

INSERT INTO `tb_cidades` VALUES (8586, 25, 'SE', 'Porto da Folha');

INSERT INTO `tb_cidades` VALUES (8587, 25, 'SE', 'Propria');

INSERT INTO `tb_cidades` VALUES (8588, 25, 'SE', 'Riachao do Dantas');

INSERT INTO `tb_cidades` VALUES (8589, 25, 'SE', 'Riachuelo');

INSERT INTO `tb_cidades` VALUES (8590, 25, 'SE', 'Ribeiropolis');

INSERT INTO `tb_cidades` VALUES (8591, 25, 'SE', 'Rosario do Catete');

INSERT INTO `tb_cidades` VALUES (8592, 25, 'SE', 'Salgado');

INSERT INTO `tb_cidades` VALUES (8593, 25, 'SE', 'Samambaia');

INSERT INTO `tb_cidades` VALUES (8594, 25, 'SE', 'Santa Luzia do Itanhy');

INSERT INTO `tb_cidades` VALUES (8595, 25, 'SE', 'Santa Rosa de Lima');

INSERT INTO `tb_cidades` VALUES (8596, 25, 'SE', 'Santana do Sao Francisco');

INSERT INTO `tb_cidades` VALUES (8597, 25, 'SE', 'Santo Amaro das Brotas');

INSERT INTO `tb_cidades` VALUES (8598, 25, 'SE', 'Sao Cristovao');

INSERT INTO `tb_cidades` VALUES (8599, 25, 'SE', 'Sao Domingos');

INSERT INTO `tb_cidades` VALUES (8600, 25, 'SE', 'Sao Francisco');

INSERT INTO `tb_cidades` VALUES (8601, 25, 'SE', 'Sao Jose');

INSERT INTO `tb_cidades` VALUES (8602, 25, 'SE', 'Sao Mateus da Palestina');

INSERT INTO `tb_cidades` VALUES (8603, 25, 'SE', 'Sao Miguel do Aleixo');

INSERT INTO `tb_cidades` VALUES (8604, 25, 'SE', 'Simao Dias');

INSERT INTO `tb_cidades` VALUES (8605, 25, 'SE', 'Siriri');

INSERT INTO `tb_cidades` VALUES (8606, 25, 'SE', 'Telha');

INSERT INTO `tb_cidades` VALUES (8607, 25, 'SE', 'Tobias Barreto');

INSERT INTO `tb_cidades` VALUES (8608, 25, 'SE', 'Tomar do Geru');

INSERT INTO `tb_cidades` VALUES (8609, 25, 'SE', 'Umbauba');

INSERT INTO `tb_cidades` VALUES (8610, 26, 'SP', 'Adamantina');

INSERT INTO `tb_cidades` VALUES (8611, 26, 'SP', 'Adolfo');

INSERT INTO `tb_cidades` VALUES (8612, 26, 'SP', 'Agisse');

INSERT INTO `tb_cidades` VALUES (8613, 26, 'SP', 'Agua Vermelha');

INSERT INTO `tb_cidades` VALUES (8614, 26, 'SP', 'Aguai');

INSERT INTO `tb_cidades` VALUES (8615, 26, 'SP', 'Aguas da Prata');

INSERT INTO `tb_cidades` VALUES (8616, 26, 'SP', 'Aguas de Lindoia');

INSERT INTO `tb_cidades` VALUES (8617, 26, 'SP', 'Aguas de Santa Barbara');

INSERT INTO `tb_cidades` VALUES (8618, 26, 'SP', 'Aguas de Sao Pedro');

INSERT INTO `tb_cidades` VALUES (8619, 26, 'SP', 'Agudos');

INSERT INTO `tb_cidades` VALUES (8620, 26, 'SP', 'Agulha');

INSERT INTO `tb_cidades` VALUES (8621, 26, 'SP', 'Ajapi');

INSERT INTO `tb_cidades` VALUES (8622, 26, 'SP', 'Alambari');

INSERT INTO `tb_cidades` VALUES (8623, 26, 'SP', 'Alberto Moreira');

INSERT INTO `tb_cidades` VALUES (8624, 26, 'SP', 'Aldeia');

INSERT INTO `tb_cidades` VALUES (8625, 26, 'SP', 'Aldeia de Carapicuiba');

INSERT INTO `tb_cidades` VALUES (8626, 26, 'SP', 'Alfredo Guedes');

INSERT INTO `tb_cidades` VALUES (8627, 26, 'SP', 'Alfredo Marcondes');

INSERT INTO `tb_cidades` VALUES (8628, 26, 'SP', 'Altair');

INSERT INTO `tb_cidades` VALUES (8629, 26, 'SP', 'Altinopolis');

INSERT INTO `tb_cidades` VALUES (8630, 26, 'SP', 'Alto Alegre');

INSERT INTO `tb_cidades` VALUES (8631, 26, 'SP', 'Alto Pora');

INSERT INTO `tb_cidades` VALUES (8632, 26, 'SP', 'Aluminio');

INSERT INTO `tb_cidades` VALUES (8633, 26, 'SP', 'Alvares Florence');

INSERT INTO `tb_cidades` VALUES (8634, 26, 'SP', 'Alvares Machado');

INSERT INTO `tb_cidades` VALUES (8635, 26, 'SP', 'Alvaro de Carvalho');

INSERT INTO `tb_cidades` VALUES (8636, 26, 'SP', 'Alvinlandia');

INSERT INTO `tb_cidades` VALUES (8637, 26, 'SP', 'Amadeu Amaral');

INSERT INTO `tb_cidades` VALUES (8638, 26, 'SP', 'Amandaba');

INSERT INTO `tb_cidades` VALUES (8639, 26, 'SP', 'Ameliopolis');

INSERT INTO `tb_cidades` VALUES (8640, 26, 'SP', 'Americana');

INSERT INTO `tb_cidades` VALUES (8641, 26, 'SP', 'Americo Brasiliense');

INSERT INTO `tb_cidades` VALUES (8642, 26, 'SP', 'Americo de Campos');

INSERT INTO `tb_cidades` VALUES (8643, 26, 'SP', 'Amparo');

INSERT INTO `tb_cidades` VALUES (8644, 26, 'SP', 'Ana Dias');

INSERT INTO `tb_cidades` VALUES (8645, 26, 'SP', 'Analandia');

INSERT INTO `tb_cidades` VALUES (8646, 26, 'SP', 'Anapolis');

INSERT INTO `tb_cidades` VALUES (8647, 26, 'SP', 'Andes');

INSERT INTO `tb_cidades` VALUES (8648, 26, 'SP', 'Andradina');

INSERT INTO `tb_cidades` VALUES (8649, 26, 'SP', 'Angatuba');

INSERT INTO `tb_cidades` VALUES (8650, 26, 'SP', 'Anhembi');

INSERT INTO `tb_cidades` VALUES (8651, 26, 'SP', 'Anhumas');

INSERT INTO `tb_cidades` VALUES (8652, 26, 'SP', 'Aparecida');

INSERT INTO `tb_cidades` VALUES (8653, 26, 'SP', 'Aparecida D''oeste');

INSERT INTO `tb_cidades` VALUES (8654, 26, 'SP', 'Aparecida de Monte Alto');

INSERT INTO `tb_cidades` VALUES (8655, 26, 'SP', 'Aparecida de Sao Manuel');

INSERT INTO `tb_cidades` VALUES (8656, 26, 'SP', 'Aparecida do Bonito');

INSERT INTO `tb_cidades` VALUES (8657, 26, 'SP', 'Apiai');

INSERT INTO `tb_cidades` VALUES (8658, 26, 'SP', 'Apiai-mirim');

INSERT INTO `tb_cidades` VALUES (8659, 26, 'SP', 'Arabela');

INSERT INTO `tb_cidades` VALUES (8660, 26, 'SP', 'Aracacu');

INSERT INTO `tb_cidades` VALUES (8661, 26, 'SP', 'Aracaiba');

INSERT INTO `tb_cidades` VALUES (8662, 26, 'SP', 'Aracariguama');

INSERT INTO `tb_cidades` VALUES (8663, 26, 'SP', 'Aracatuba');

INSERT INTO `tb_cidades` VALUES (8664, 26, 'SP', 'Aracoiaba da Serra');

INSERT INTO `tb_cidades` VALUES (8665, 26, 'SP', 'Aramina');

INSERT INTO `tb_cidades` VALUES (8666, 26, 'SP', 'Arandu');

INSERT INTO `tb_cidades` VALUES (8667, 26, 'SP', 'Arapei');

INSERT INTO `tb_cidades` VALUES (8668, 26, 'SP', 'Araraquara');

INSERT INTO `tb_cidades` VALUES (8669, 26, 'SP', 'Araras');

INSERT INTO `tb_cidades` VALUES (8670, 26, 'SP', 'Araxas');

INSERT INTO `tb_cidades` VALUES (8671, 26, 'SP', 'Arcadas');

INSERT INTO `tb_cidades` VALUES (8672, 26, 'SP', 'Arco-iris');

INSERT INTO `tb_cidades` VALUES (8673, 26, 'SP', 'Arealva');

INSERT INTO `tb_cidades` VALUES (8674, 26, 'SP', 'Areias');

INSERT INTO `tb_cidades` VALUES (8675, 26, 'SP', 'Areiopolis');

INSERT INTO `tb_cidades` VALUES (8676, 26, 'SP', 'Ariranha');

INSERT INTO `tb_cidades` VALUES (8677, 26, 'SP', 'Ariri');

INSERT INTO `tb_cidades` VALUES (8678, 26, 'SP', 'Artemis');

INSERT INTO `tb_cidades` VALUES (8679, 26, 'SP', 'Artur Nogueira');

INSERT INTO `tb_cidades` VALUES (8680, 26, 'SP', 'Aruja');

INSERT INTO `tb_cidades` VALUES (8681, 26, 'SP', 'Aspasia');

INSERT INTO `tb_cidades` VALUES (8682, 26, 'SP', 'Assis');

INSERT INTO `tb_cidades` VALUES (8683, 26, 'SP', 'Assistencia');

INSERT INTO `tb_cidades` VALUES (8684, 26, 'SP', 'Atibaia');

INSERT INTO `tb_cidades` VALUES (8685, 26, 'SP', 'Atlantida');

INSERT INTO `tb_cidades` VALUES (8686, 26, 'SP', 'Auriflama');

INSERT INTO `tb_cidades` VALUES (8687, 26, 'SP', 'Avai');

INSERT INTO `tb_cidades` VALUES (8688, 26, 'SP', 'Avanhandava');

INSERT INTO `tb_cidades` VALUES (8689, 26, 'SP', 'Avare');

INSERT INTO `tb_cidades` VALUES (8690, 26, 'SP', 'Avencas');

INSERT INTO `tb_cidades` VALUES (8691, 26, 'SP', 'Bacaetava');

INSERT INTO `tb_cidades` VALUES (8692, 26, 'SP', 'Bacuriti');

INSERT INTO `tb_cidades` VALUES (8693, 26, 'SP', 'Bady Bassitt');

INSERT INTO `tb_cidades` VALUES (8694, 26, 'SP', 'Baguacu');

INSERT INTO `tb_cidades` VALUES (8695, 26, 'SP', 'Bairro Alto');

INSERT INTO `tb_cidades` VALUES (8696, 26, 'SP', 'Balbinos');

INSERT INTO `tb_cidades` VALUES (8697, 26, 'SP', 'Balsamo');

INSERT INTO `tb_cidades` VALUES (8698, 26, 'SP', 'Bananal');

INSERT INTO `tb_cidades` VALUES (8699, 26, 'SP', 'Bandeirantes D''oeste');

INSERT INTO `tb_cidades` VALUES (8700, 26, 'SP', 'Barao Ataliba Nogueira');

INSERT INTO `tb_cidades` VALUES (8701, 26, 'SP', 'Barao de Antonina');

INSERT INTO `tb_cidades` VALUES (8702, 26, 'SP', 'Barao de Geraldo');

INSERT INTO `tb_cidades` VALUES (8703, 26, 'SP', 'Barbosa');

INSERT INTO `tb_cidades` VALUES (8704, 26, 'SP', 'Bariri');

INSERT INTO `tb_cidades` VALUES (8705, 26, 'SP', 'Barra Bonita');

INSERT INTO `tb_cidades` VALUES (8706, 26, 'SP', 'Barra do Chapeu');

INSERT INTO `tb_cidades` VALUES (8707, 26, 'SP', 'Barra do Turvo');

INSERT INTO `tb_cidades` VALUES (8708, 26, 'SP', 'Barra Dourada');

INSERT INTO `tb_cidades` VALUES (8709, 26, 'SP', 'Barrania');

INSERT INTO `tb_cidades` VALUES (8710, 26, 'SP', 'Barretos');

INSERT INTO `tb_cidades` VALUES (8711, 26, 'SP', 'Barrinha');

INSERT INTO `tb_cidades` VALUES (8712, 26, 'SP', 'Barueri');

INSERT INTO `tb_cidades` VALUES (8713, 26, 'SP', 'Bastos');

INSERT INTO `tb_cidades` VALUES (8714, 26, 'SP', 'Batatais');

INSERT INTO `tb_cidades` VALUES (8715, 26, 'SP', 'Batatuba');

INSERT INTO `tb_cidades` VALUES (8716, 26, 'SP', 'Batista Botelho');

INSERT INTO `tb_cidades` VALUES (8717, 26, 'SP', 'Bauru');

INSERT INTO `tb_cidades` VALUES (8718, 26, 'SP', 'Bebedouro');

INSERT INTO `tb_cidades` VALUES (8719, 26, 'SP', 'Bela Floresta');

INSERT INTO `tb_cidades` VALUES (8720, 26, 'SP', 'Bela Vista Sao-carlense');

INSERT INTO `tb_cidades` VALUES (8721, 26, 'SP', 'Bento de Abreu');

INSERT INTO `tb_cidades` VALUES (8722, 26, 'SP', 'Bernardino de Campos');

INSERT INTO `tb_cidades` VALUES (8723, 26, 'SP', 'Bertioga');

INSERT INTO `tb_cidades` VALUES (8724, 26, 'SP', 'Bilac');

INSERT INTO `tb_cidades` VALUES (8725, 26, 'SP', 'Birigui');

INSERT INTO `tb_cidades` VALUES (8726, 26, 'SP', 'Biritiba-mirim');

INSERT INTO `tb_cidades` VALUES (8727, 26, 'SP', 'Biritiba-ussu');

INSERT INTO `tb_cidades` VALUES (8728, 26, 'SP', 'Boa Esperanca do Sul');

INSERT INTO `tb_cidades` VALUES (8729, 26, 'SP', 'Boa Vista dos Andradas');

INSERT INTO `tb_cidades` VALUES (8730, 26, 'SP', 'Boa Vista Paulista');

INSERT INTO `tb_cidades` VALUES (8731, 26, 'SP', 'Bocaina');

INSERT INTO `tb_cidades` VALUES (8732, 26, 'SP', 'Bofete');

INSERT INTO `tb_cidades` VALUES (8733, 26, 'SP', 'Boituva');

INSERT INTO `tb_cidades` VALUES (8734, 26, 'SP', 'Bom Fim do Bom Jesus');

INSERT INTO `tb_cidades` VALUES (8735, 26, 'SP', 'Bom Jesus dos Perdoes');

INSERT INTO `tb_cidades` VALUES (8736, 26, 'SP', 'Bom Retiro da Esperanca');

INSERT INTO `tb_cidades` VALUES (8737, 26, 'SP', 'Bom Sucesso de Itarare');

INSERT INTO `tb_cidades` VALUES (8738, 26, 'SP', 'Bonfim Paulista');

INSERT INTO `tb_cidades` VALUES (8739, 26, 'SP', 'Bora');

INSERT INTO `tb_cidades` VALUES (8740, 26, 'SP', 'Boraceia');

INSERT INTO `tb_cidades` VALUES (8741, 26, 'SP', 'Borborema');

INSERT INTO `tb_cidades` VALUES (8742, 26, 'SP', 'Borebi');

INSERT INTO `tb_cidades` VALUES (8743, 26, 'SP', 'Botafogo');

INSERT INTO `tb_cidades` VALUES (8744, 26, 'SP', 'Botelho');

INSERT INTO `tb_cidades` VALUES (8745, 26, 'SP', 'Botucatu');

INSERT INTO `tb_cidades` VALUES (8746, 26, 'SP', 'Botujuru');

INSERT INTO `tb_cidades` VALUES (8747, 26, 'SP', 'Braco');

INSERT INTO `tb_cidades` VALUES (8748, 26, 'SP', 'Braganca Paulista');

INSERT INTO `tb_cidades` VALUES (8749, 26, 'SP', 'Bras Cubas');

INSERT INTO `tb_cidades` VALUES (8750, 26, 'SP', 'Brasitania');

INSERT INTO `tb_cidades` VALUES (8751, 26, 'SP', 'Brauna');

INSERT INTO `tb_cidades` VALUES (8752, 26, 'SP', 'Brejo Alegre');

INSERT INTO `tb_cidades` VALUES (8753, 26, 'SP', 'Brodowski');

INSERT INTO `tb_cidades` VALUES (8754, 26, 'SP', 'Brotas');

INSERT INTO `tb_cidades` VALUES (8755, 26, 'SP', 'Bueno de Andrada');

INSERT INTO `tb_cidades` VALUES (8756, 26, 'SP', 'Buri');

INSERT INTO `tb_cidades` VALUES (8757, 26, 'SP', 'Buritama');

INSERT INTO `tb_cidades` VALUES (8758, 26, 'SP', 'Buritizal');

INSERT INTO `tb_cidades` VALUES (8759, 26, 'SP', 'Cabralia Paulista');

INSERT INTO `tb_cidades` VALUES (8760, 26, 'SP', 'Cabreuva');

INSERT INTO `tb_cidades` VALUES (8761, 26, 'SP', 'Cacapava');

INSERT INTO `tb_cidades` VALUES (8762, 26, 'SP', 'Cachoeira de Emas');

INSERT INTO `tb_cidades` VALUES (8763, 26, 'SP', 'Cachoeira Paulista');

INSERT INTO `tb_cidades` VALUES (8764, 26, 'SP', 'Caconde');

INSERT INTO `tb_cidades` VALUES (8765, 26, 'SP', 'Cafelandia');

INSERT INTO `tb_cidades` VALUES (8766, 26, 'SP', 'Cafesopolis');

INSERT INTO `tb_cidades` VALUES (8767, 26, 'SP', 'Caiabu');

INSERT INTO `tb_cidades` VALUES (8768, 26, 'SP', 'Caibura');

INSERT INTO `tb_cidades` VALUES (8769, 26, 'SP', 'Caieiras');

INSERT INTO `tb_cidades` VALUES (8770, 26, 'SP', 'Caiua');

INSERT INTO `tb_cidades` VALUES (8771, 26, 'SP', 'Cajamar');

INSERT INTO `tb_cidades` VALUES (8772, 26, 'SP', 'Cajati');

INSERT INTO `tb_cidades` VALUES (8773, 26, 'SP', 'Cajobi');

INSERT INTO `tb_cidades` VALUES (8774, 26, 'SP', 'Cajuru');

INSERT INTO `tb_cidades` VALUES (8775, 26, 'SP', 'Cambaquara');

INSERT INTO `tb_cidades` VALUES (8776, 26, 'SP', 'Cambaratiba');

INSERT INTO `tb_cidades` VALUES (8777, 26, 'SP', 'Campestrinho');

INSERT INTO `tb_cidades` VALUES (8778, 26, 'SP', 'Campina de Fora');

INSERT INTO `tb_cidades` VALUES (8779, 26, 'SP', 'Campina do Monte Alegre');

INSERT INTO `tb_cidades` VALUES (8780, 26, 'SP', 'Campinal');

INSERT INTO `tb_cidades` VALUES (8781, 26, 'SP', 'Campinas');

INSERT INTO `tb_cidades` VALUES (8782, 26, 'SP', 'Campo Limpo Paulista');

INSERT INTO `tb_cidades` VALUES (8783, 26, 'SP', 'Campos de Cunha');

INSERT INTO `tb_cidades` VALUES (8784, 26, 'SP', 'Campos do Jordao');

INSERT INTO `tb_cidades` VALUES (8785, 26, 'SP', 'Campos Novos Paulista');

INSERT INTO `tb_cidades` VALUES (8786, 26, 'SP', 'Cananeia');

INSERT INTO `tb_cidades` VALUES (8787, 26, 'SP', 'Canas');

INSERT INTO `tb_cidades` VALUES (8788, 26, 'SP', 'Candia');

INSERT INTO `tb_cidades` VALUES (8789, 26, 'SP', 'Candido Mota');

INSERT INTO `tb_cidades` VALUES (8790, 26, 'SP', 'Candido Rodrigues');

INSERT INTO `tb_cidades` VALUES (8791, 26, 'SP', 'Canguera');

INSERT INTO `tb_cidades` VALUES (8792, 26, 'SP', 'Canitar');

INSERT INTO `tb_cidades` VALUES (8793, 26, 'SP', 'Capao Bonito');

INSERT INTO `tb_cidades` VALUES (8794, 26, 'SP', 'Capela do Alto');

INSERT INTO `tb_cidades` VALUES (8795, 26, 'SP', 'Capivari');

INSERT INTO `tb_cidades` VALUES (8796, 26, 'SP', 'Capivari da Mata');

INSERT INTO `tb_cidades` VALUES (8797, 26, 'SP', 'Caporanga');

INSERT INTO `tb_cidades` VALUES (8798, 26, 'SP', 'Capuava');

INSERT INTO `tb_cidades` VALUES (8799, 26, 'SP', 'Caraguatatuba');

INSERT INTO `tb_cidades` VALUES (8800, 26, 'SP', 'Carapicuiba');

INSERT INTO `tb_cidades` VALUES (8801, 26, 'SP', 'Cardeal');

INSERT INTO `tb_cidades` VALUES (8802, 26, 'SP', 'Cardoso');

INSERT INTO `tb_cidades` VALUES (8803, 26, 'SP', 'Caruara');

INSERT INTO `tb_cidades` VALUES (8804, 26, 'SP', 'Casa Branca');

INSERT INTO `tb_cidades` VALUES (8805, 26, 'SP', 'Cassia dos Coqueiros');

INSERT INTO `tb_cidades` VALUES (8806, 26, 'SP', 'Castilho');

INSERT INTO `tb_cidades` VALUES (8807, 26, 'SP', 'Catanduva');

INSERT INTO `tb_cidades` VALUES (8808, 26, 'SP', 'Catigua');

INSERT INTO `tb_cidades` VALUES (8809, 26, 'SP', 'Catucaba');

INSERT INTO `tb_cidades` VALUES (8810, 26, 'SP', 'Caucaia do Alto');

INSERT INTO `tb_cidades` VALUES (8811, 26, 'SP', 'Cedral');

INSERT INTO `tb_cidades` VALUES (8812, 26, 'SP', 'Cerqueira Cesar');

INSERT INTO `tb_cidades` VALUES (8813, 26, 'SP', 'Cerquilho');

INSERT INTO `tb_cidades` VALUES (8814, 26, 'SP', 'Cesario Lange');

INSERT INTO `tb_cidades` VALUES (8815, 26, 'SP', 'Cezar de Souza');

INSERT INTO `tb_cidades` VALUES (8816, 26, 'SP', 'Charqueada');

INSERT INTO `tb_cidades` VALUES (8817, 26, 'SP', 'Chavantes');

INSERT INTO `tb_cidades` VALUES (8818, 26, 'SP', 'Cipo-guacu');

INSERT INTO `tb_cidades` VALUES (8819, 26, 'SP', 'Clarinia');

INSERT INTO `tb_cidades` VALUES (8820, 26, 'SP', 'Clementina');

INSERT INTO `tb_cidades` VALUES (8821, 26, 'SP', 'Cocaes');

INSERT INTO `tb_cidades` VALUES (8822, 26, 'SP', 'Colina');

INSERT INTO `tb_cidades` VALUES (8823, 26, 'SP', 'Colombia');

INSERT INTO `tb_cidades` VALUES (8824, 26, 'SP', 'Conceicao de Monte Alegre');

INSERT INTO `tb_cidades` VALUES (8825, 26, 'SP', 'Conchal');

INSERT INTO `tb_cidades` VALUES (8826, 26, 'SP', 'Conchas');

INSERT INTO `tb_cidades` VALUES (8827, 26, 'SP', 'Cordeiropolis');

INSERT INTO `tb_cidades` VALUES (8828, 26, 'SP', 'Coroados');

INSERT INTO `tb_cidades` VALUES (8829, 26, 'SP', 'Coronel Goulart');

INSERT INTO `tb_cidades` VALUES (8830, 26, 'SP', 'Coronel Macedo');

INSERT INTO `tb_cidades` VALUES (8831, 26, 'SP', 'Corredeira');

INSERT INTO `tb_cidades` VALUES (8832, 26, 'SP', 'Corrego Rico');

INSERT INTO `tb_cidades` VALUES (8833, 26, 'SP', 'Corumbatai');

INSERT INTO `tb_cidades` VALUES (8834, 26, 'SP', 'Cosmopolis');

INSERT INTO `tb_cidades` VALUES (8835, 26, 'SP', 'Cosmorama');

INSERT INTO `tb_cidades` VALUES (8836, 26, 'SP', 'Costa Machado');

INSERT INTO `tb_cidades` VALUES (8837, 26, 'SP', 'Cotia');

INSERT INTO `tb_cidades` VALUES (8838, 26, 'SP', 'Cravinhos');

INSERT INTO `tb_cidades` VALUES (8839, 26, 'SP', 'Cristais Paulista');

INSERT INTO `tb_cidades` VALUES (8840, 26, 'SP', 'Cruz das Posses');

INSERT INTO `tb_cidades` VALUES (8841, 26, 'SP', 'Cruzalia');

INSERT INTO `tb_cidades` VALUES (8842, 26, 'SP', 'Cruzeiro');

INSERT INTO `tb_cidades` VALUES (8843, 26, 'SP', 'Cubatao');

INSERT INTO `tb_cidades` VALUES (8844, 26, 'SP', 'Cuiaba Paulista');

INSERT INTO `tb_cidades` VALUES (8845, 26, 'SP', 'Cunha');

INSERT INTO `tb_cidades` VALUES (8846, 26, 'SP', 'Curupa');

INSERT INTO `tb_cidades` VALUES (8847, 26, 'SP', 'Dalas');

INSERT INTO `tb_cidades` VALUES (8848, 26, 'SP', 'Descalvado');

INSERT INTO `tb_cidades` VALUES (8849, 26, 'SP', 'Diadema');

INSERT INTO `tb_cidades` VALUES (8850, 26, 'SP', 'Dirce Reis');

INSERT INTO `tb_cidades` VALUES (8851, 26, 'SP', 'Dirceu');

INSERT INTO `tb_cidades` VALUES (8852, 26, 'SP', 'Divinolandia');

INSERT INTO `tb_cidades` VALUES (8853, 26, 'SP', 'Dobrada');

INSERT INTO `tb_cidades` VALUES (8854, 26, 'SP', 'Dois Corregos');

INSERT INTO `tb_cidades` VALUES (8855, 26, 'SP', 'Dolcinopolis');

INSERT INTO `tb_cidades` VALUES (8856, 26, 'SP', 'Domelia');

INSERT INTO `tb_cidades` VALUES (8857, 26, 'SP', 'Dourado');

INSERT INTO `tb_cidades` VALUES (8858, 26, 'SP', 'Dracena');

INSERT INTO `tb_cidades` VALUES (8859, 26, 'SP', 'Duartina');

INSERT INTO `tb_cidades` VALUES (8860, 26, 'SP', 'Dumont');

INSERT INTO `tb_cidades` VALUES (8861, 26, 'SP', 'Duplo Ceu');

INSERT INTO `tb_cidades` VALUES (8862, 26, 'SP', 'Echapora');

INSERT INTO `tb_cidades` VALUES (8863, 26, 'SP', 'Eldorado');

INSERT INTO `tb_cidades` VALUES (8864, 26, 'SP', 'Eleuterio');

INSERT INTO `tb_cidades` VALUES (8865, 26, 'SP', 'Elias Fausto');

INSERT INTO `tb_cidades` VALUES (8866, 26, 'SP', 'Elisiario');

INSERT INTO `tb_cidades` VALUES (8867, 26, 'SP', 'Embauba');

INSERT INTO `tb_cidades` VALUES (8868, 26, 'SP', 'Embu');

INSERT INTO `tb_cidades` VALUES (8869, 26, 'SP', 'Embu-guacu');

INSERT INTO `tb_cidades` VALUES (8870, 26, 'SP', 'Emilianopolis');

INSERT INTO `tb_cidades` VALUES (8871, 26, 'SP', 'Eneida');

INSERT INTO `tb_cidades` VALUES (8872, 26, 'SP', 'Engenheiro Balduino');

INSERT INTO `tb_cidades` VALUES (8873, 26, 'SP', 'Engenheiro Coelho');

INSERT INTO `tb_cidades` VALUES (8874, 26, 'SP', 'Engenheiro Maia');

INSERT INTO `tb_cidades` VALUES (8875, 26, 'SP', 'Engenheiro Schmidt');

INSERT INTO `tb_cidades` VALUES (8876, 26, 'SP', 'Esmeralda');

INSERT INTO `tb_cidades` VALUES (8877, 26, 'SP', 'Esperanca D''oeste');

INSERT INTO `tb_cidades` VALUES (8878, 26, 'SP', 'Espigao');

INSERT INTO `tb_cidades` VALUES (8879, 26, 'SP', 'Espirito Santo do Pinhal');

INSERT INTO `tb_cidades` VALUES (8880, 26, 'SP', 'Espirito Santo do Turvo');

INSERT INTO `tb_cidades` VALUES (8881, 26, 'SP', 'Estiva Gerbi');

INSERT INTO `tb_cidades` VALUES (8882, 26, 'SP', 'Estrela D''oeste');

INSERT INTO `tb_cidades` VALUES (8883, 26, 'SP', 'Estrela do Norte');

INSERT INTO `tb_cidades` VALUES (8884, 26, 'SP', 'Euclides da Cunha Paulista');

INSERT INTO `tb_cidades` VALUES (8885, 26, 'SP', 'Eugenio de Melo');

INSERT INTO `tb_cidades` VALUES (8886, 26, 'SP', 'Fartura');

INSERT INTO `tb_cidades` VALUES (8887, 26, 'SP', 'Fatima');

INSERT INTO `tb_cidades` VALUES (8888, 26, 'SP', 'Fatima Paulista');

INSERT INTO `tb_cidades` VALUES (8889, 26, 'SP', 'Fazenda Velha');

INSERT INTO `tb_cidades` VALUES (8890, 26, 'SP', 'Fernando Prestes');

INSERT INTO `tb_cidades` VALUES (8891, 26, 'SP', 'Fernandopolis');

INSERT INTO `tb_cidades` VALUES (8892, 26, 'SP', 'Fernao');

INSERT INTO `tb_cidades` VALUES (8893, 26, 'SP', 'Ferraz de Vasconcelos');

INSERT INTO `tb_cidades` VALUES (8894, 26, 'SP', 'Flora Rica');

INSERT INTO `tb_cidades` VALUES (8895, 26, 'SP', 'Floreal');

INSERT INTO `tb_cidades` VALUES (8896, 26, 'SP', 'Floresta do Sul');

INSERT INTO `tb_cidades` VALUES (8897, 26, 'SP', 'Florida Paulista');

INSERT INTO `tb_cidades` VALUES (8898, 26, 'SP', 'Florinea');

INSERT INTO `tb_cidades` VALUES (8899, 26, 'SP', 'Franca');

INSERT INTO `tb_cidades` VALUES (8900, 26, 'SP', 'Francisco Morato');

INSERT INTO `tb_cidades` VALUES (8901, 26, 'SP', 'Franco da Rocha');

INSERT INTO `tb_cidades` VALUES (8902, 26, 'SP', 'Frutal do Campo');

INSERT INTO `tb_cidades` VALUES (8903, 26, 'SP', 'Gabriel Monteiro');

INSERT INTO `tb_cidades` VALUES (8904, 26, 'SP', 'Galia');

INSERT INTO `tb_cidades` VALUES (8905, 26, 'SP', 'Garca');

INSERT INTO `tb_cidades` VALUES (8906, 26, 'SP', 'Gardenia');

INSERT INTO `tb_cidades` VALUES (8907, 26, 'SP', 'Gastao Vidigal');

INSERT INTO `tb_cidades` VALUES (8908, 26, 'SP', 'Gaviao Peixoto');

INSERT INTO `tb_cidades` VALUES (8909, 26, 'SP', 'General Salgado');

INSERT INTO `tb_cidades` VALUES (8910, 26, 'SP', 'Getulina');

INSERT INTO `tb_cidades` VALUES (8911, 26, 'SP', 'Glicerio');

INSERT INTO `tb_cidades` VALUES (8912, 26, 'SP', 'Gramadinho');

INSERT INTO `tb_cidades` VALUES (8913, 26, 'SP', 'Guachos');

INSERT INTO `tb_cidades` VALUES (8914, 26, 'SP', 'Guaianas');

INSERT INTO `tb_cidades` VALUES (8915, 26, 'SP', 'Guaicara');

INSERT INTO `tb_cidades` VALUES (8916, 26, 'SP', 'Guaimbe');

INSERT INTO `tb_cidades` VALUES (8917, 26, 'SP', 'Guaira');

INSERT INTO `tb_cidades` VALUES (8918, 26, 'SP', 'Guamium');

INSERT INTO `tb_cidades` VALUES (8919, 26, 'SP', 'Guapiacu');

INSERT INTO `tb_cidades` VALUES (8920, 26, 'SP', 'Guapiara');

INSERT INTO `tb_cidades` VALUES (8921, 26, 'SP', 'Guapiranga');

INSERT INTO `tb_cidades` VALUES (8922, 26, 'SP', 'Guara');

INSERT INTO `tb_cidades` VALUES (8923, 26, 'SP', 'Guaracai');

INSERT INTO `tb_cidades` VALUES (8924, 26, 'SP', 'Guaraci');

INSERT INTO `tb_cidades` VALUES (8925, 26, 'SP', 'Guaraciaba D''oeste');

INSERT INTO `tb_cidades` VALUES (8926, 26, 'SP', 'Guarani D''oeste');

INSERT INTO `tb_cidades` VALUES (8927, 26, 'SP', 'Guaranta');

INSERT INTO `tb_cidades` VALUES (8928, 26, 'SP', 'Guarapiranga');

INSERT INTO `tb_cidades` VALUES (8929, 26, 'SP', 'Guarapua');

INSERT INTO `tb_cidades` VALUES (8930, 26, 'SP', 'Guararapes');

INSERT INTO `tb_cidades` VALUES (8931, 26, 'SP', 'Guararema');

INSERT INTO `tb_cidades` VALUES (8932, 26, 'SP', 'Guaratingueta');

INSERT INTO `tb_cidades` VALUES (8933, 26, 'SP', 'Guarei');

INSERT INTO `tb_cidades` VALUES (8934, 26, 'SP', 'Guariba');

INSERT INTO `tb_cidades` VALUES (8935, 26, 'SP', 'Guariroba');

INSERT INTO `tb_cidades` VALUES (8936, 26, 'SP', 'Guarizinho');

INSERT INTO `tb_cidades` VALUES (8937, 26, 'SP', 'Guaruja');

INSERT INTO `tb_cidades` VALUES (8938, 26, 'SP', 'Guarulhos');

INSERT INTO `tb_cidades` VALUES (8939, 26, 'SP', 'Guatapara');

INSERT INTO `tb_cidades` VALUES (8940, 26, 'SP', 'Guzolandia');

INSERT INTO `tb_cidades` VALUES (8941, 26, 'SP', 'Herculandia');

INSERT INTO `tb_cidades` VALUES (8942, 26, 'SP', 'Holambra');

INSERT INTO `tb_cidades` VALUES (8943, 26, 'SP', 'Holambra Ii');

INSERT INTO `tb_cidades` VALUES (8944, 26, 'SP', 'Hortolandia');

INSERT INTO `tb_cidades` VALUES (8945, 26, 'SP', 'Iacanga');

INSERT INTO `tb_cidades` VALUES (8946, 26, 'SP', 'Iacri');

INSERT INTO `tb_cidades` VALUES (8947, 26, 'SP', 'Iaras');

INSERT INTO `tb_cidades` VALUES (8948, 26, 'SP', 'Ibate');

INSERT INTO `tb_cidades` VALUES (8949, 26, 'SP', 'Ibiporanga');

INSERT INTO `tb_cidades` VALUES (8950, 26, 'SP', 'Ibira');

INSERT INTO `tb_cidades` VALUES (8951, 26, 'SP', 'Ibirarema');

INSERT INTO `tb_cidades` VALUES (8952, 26, 'SP', 'Ibitinga');

INSERT INTO `tb_cidades` VALUES (8953, 26, 'SP', 'Ibitiruna');

INSERT INTO `tb_cidades` VALUES (8954, 26, 'SP', 'Ibitiuva');

INSERT INTO `tb_cidades` VALUES (8955, 26, 'SP', 'Ibitu');

INSERT INTO `tb_cidades` VALUES (8956, 26, 'SP', 'Ibiuna');

INSERT INTO `tb_cidades` VALUES (8957, 26, 'SP', 'Icem');

INSERT INTO `tb_cidades` VALUES (8958, 26, 'SP', 'Ida Iolanda');

INSERT INTO `tb_cidades` VALUES (8959, 26, 'SP', 'Iepe');

INSERT INTO `tb_cidades` VALUES (8960, 26, 'SP', 'Igacaba');

INSERT INTO `tb_cidades` VALUES (8961, 26, 'SP', 'Igaracu do Tiete');

INSERT INTO `tb_cidades` VALUES (8962, 26, 'SP', 'Igarai');

INSERT INTO `tb_cidades` VALUES (8963, 26, 'SP', 'Igarapava');

INSERT INTO `tb_cidades` VALUES (8964, 26, 'SP', 'Igarata');

INSERT INTO `tb_cidades` VALUES (8965, 26, 'SP', 'Iguape');

INSERT INTO `tb_cidades` VALUES (8966, 26, 'SP', 'Ilha Comprida');

INSERT INTO `tb_cidades` VALUES (8967, 26, 'SP', 'Ilha Diana');

INSERT INTO `tb_cidades` VALUES (8968, 26, 'SP', 'Ilha Solteira');

INSERT INTO `tb_cidades` VALUES (8969, 26, 'SP', 'Ilhabela');

INSERT INTO `tb_cidades` VALUES (8970, 26, 'SP', 'Indaia do Aguapei');

INSERT INTO `tb_cidades` VALUES (8971, 26, 'SP', 'Indaiatuba');

INSERT INTO `tb_cidades` VALUES (8972, 26, 'SP', 'Indiana');

INSERT INTO `tb_cidades` VALUES (8973, 26, 'SP', 'Indiapora');

INSERT INTO `tb_cidades` VALUES (8974, 26, 'SP', 'Ingas');

INSERT INTO `tb_cidades` VALUES (8975, 26, 'SP', 'Inubia Paulista');

INSERT INTO `tb_cidades` VALUES (8976, 26, 'SP', 'Ipaussu');

INSERT INTO `tb_cidades` VALUES (8977, 26, 'SP', 'Ipero');

INSERT INTO `tb_cidades` VALUES (8978, 26, 'SP', 'Ipeuna');

INSERT INTO `tb_cidades` VALUES (8979, 26, 'SP', 'Ipigua');

INSERT INTO `tb_cidades` VALUES (8980, 26, 'SP', 'Iporanga');

INSERT INTO `tb_cidades` VALUES (8981, 26, 'SP', 'Ipua');

INSERT INTO `tb_cidades` VALUES (8982, 26, 'SP', 'Iracemapolis');

INSERT INTO `tb_cidades` VALUES (8983, 26, 'SP', 'Irape');

INSERT INTO `tb_cidades` VALUES (8984, 26, 'SP', 'Irapua');

INSERT INTO `tb_cidades` VALUES (8985, 26, 'SP', 'Irapuru');

INSERT INTO `tb_cidades` VALUES (8986, 26, 'SP', 'Itabera');

INSERT INTO `tb_cidades` VALUES (8987, 26, 'SP', 'Itaboa');

INSERT INTO `tb_cidades` VALUES (8988, 26, 'SP', 'Itai');

INSERT INTO `tb_cidades` VALUES (8989, 26, 'SP', 'Itaiuba');

INSERT INTO `tb_cidades` VALUES (8990, 26, 'SP', 'Itajobi');

INSERT INTO `tb_cidades` VALUES (8991, 26, 'SP', 'Itaju');

INSERT INTO `tb_cidades` VALUES (8992, 26, 'SP', 'Itanhaem');

INSERT INTO `tb_cidades` VALUES (8993, 26, 'SP', 'Itaoca');

INSERT INTO `tb_cidades` VALUES (8994, 26, 'SP', 'Itapecerica da Serra');

INSERT INTO `tb_cidades` VALUES (8995, 26, 'SP', 'Itapetininga');

INSERT INTO `tb_cidades` VALUES (8996, 26, 'SP', 'Itapeuna');

INSERT INTO `tb_cidades` VALUES (8997, 26, 'SP', 'Itapeva');

INSERT INTO `tb_cidades` VALUES (8998, 26, 'SP', 'Itapevi');

INSERT INTO `tb_cidades` VALUES (8999, 26, 'SP', 'Itapira');

INSERT INTO `tb_cidades` VALUES (9000, 26, 'SP', 'Itapirapua Paulista');

INSERT INTO `tb_cidades` VALUES (9001, 26, 'SP', 'Itapolis');

INSERT INTO `tb_cidades` VALUES (9002, 26, 'SP', 'Itaporanga');

INSERT INTO `tb_cidades` VALUES (9003, 26, 'SP', 'Itapui');

INSERT INTO `tb_cidades` VALUES (9004, 26, 'SP', 'Itapura');

INSERT INTO `tb_cidades` VALUES (9005, 26, 'SP', 'Itaquaquecetuba');

INSERT INTO `tb_cidades` VALUES (9006, 26, 'SP', 'Itaqueri da Serra');

INSERT INTO `tb_cidades` VALUES (9007, 26, 'SP', 'Itarare');

INSERT INTO `tb_cidades` VALUES (9008, 26, 'SP', 'Itariri');

INSERT INTO `tb_cidades` VALUES (9009, 26, 'SP', 'Itatiba');

INSERT INTO `tb_cidades` VALUES (9010, 26, 'SP', 'Itatinga');

INSERT INTO `tb_cidades` VALUES (9011, 26, 'SP', 'Itirapina');

INSERT INTO `tb_cidades` VALUES (9012, 26, 'SP', 'Itirapua');

INSERT INTO `tb_cidades` VALUES (9013, 26, 'SP', 'Itobi');

INSERT INTO `tb_cidades` VALUES (9014, 26, 'SP', 'Itororo do Paranapanema');

INSERT INTO `tb_cidades` VALUES (9015, 26, 'SP', 'Itu');

INSERT INTO `tb_cidades` VALUES (9016, 26, 'SP', 'Itupeva');

INSERT INTO `tb_cidades` VALUES (9017, 26, 'SP', 'Ituverava');

INSERT INTO `tb_cidades` VALUES (9018, 26, 'SP', 'Iubatinga');

INSERT INTO `tb_cidades` VALUES (9019, 26, 'SP', 'Jaborandi');

INSERT INTO `tb_cidades` VALUES (9020, 26, 'SP', 'Jaboticabal');

INSERT INTO `tb_cidades` VALUES (9021, 26, 'SP', 'Jacare');

INSERT INTO `tb_cidades` VALUES (9022, 26, 'SP', 'Jacarei');

INSERT INTO `tb_cidades` VALUES (9023, 26, 'SP', 'Jaci');

INSERT INTO `tb_cidades` VALUES (9024, 26, 'SP', 'Jacipora');

INSERT INTO `tb_cidades` VALUES (9025, 26, 'SP', 'Jacuba');

INSERT INTO `tb_cidades` VALUES (9026, 26, 'SP', 'Jacupiranga');

INSERT INTO `tb_cidades` VALUES (9027, 26, 'SP', 'Jafa');

INSERT INTO `tb_cidades` VALUES (9028, 26, 'SP', 'Jaguariuna');

INSERT INTO `tb_cidades` VALUES (9029, 26, 'SP', 'Jales');

INSERT INTO `tb_cidades` VALUES (9030, 26, 'SP', 'Jamaica');

INSERT INTO `tb_cidades` VALUES (9031, 26, 'SP', 'Jambeiro');

INSERT INTO `tb_cidades` VALUES (9032, 26, 'SP', 'Jandira');

INSERT INTO `tb_cidades` VALUES (9033, 26, 'SP', 'Jardim Belval');

INSERT INTO `tb_cidades` VALUES (9034, 26, 'SP', 'Jardim Presidente Dutra');

INSERT INTO `tb_cidades` VALUES (9035, 26, 'SP', 'Jardim Santa Luzia');

INSERT INTO `tb_cidades` VALUES (9036, 26, 'SP', 'Jardim Silveira');

INSERT INTO `tb_cidades` VALUES (9037, 26, 'SP', 'Jardinopolis');

INSERT INTO `tb_cidades` VALUES (9038, 26, 'SP', 'Jarinu');

INSERT INTO `tb_cidades` VALUES (9039, 26, 'SP', 'Jatoba');

INSERT INTO `tb_cidades` VALUES (9040, 26, 'SP', 'Jau');

INSERT INTO `tb_cidades` VALUES (9041, 26, 'SP', 'Jeriquara');

INSERT INTO `tb_cidades` VALUES (9042, 26, 'SP', 'Joanopolis');

INSERT INTO `tb_cidades` VALUES (9043, 26, 'SP', 'Joao Ramalho');

INSERT INTO `tb_cidades` VALUES (9044, 26, 'SP', 'Joaquim Egidio');

INSERT INTO `tb_cidades` VALUES (9045, 26, 'SP', 'Jordanesia');

INSERT INTO `tb_cidades` VALUES (9046, 26, 'SP', 'Jose Bonifacio');

INSERT INTO `tb_cidades` VALUES (9047, 26, 'SP', 'Juliania');

INSERT INTO `tb_cidades` VALUES (9048, 26, 'SP', 'Julio Mesquita');

INSERT INTO `tb_cidades` VALUES (9049, 26, 'SP', 'Jumirim');

INSERT INTO `tb_cidades` VALUES (9050, 26, 'SP', 'Jundiai');

INSERT INTO `tb_cidades` VALUES (9051, 26, 'SP', 'Jundiapeba');

INSERT INTO `tb_cidades` VALUES (9052, 26, 'SP', 'Junqueira');

INSERT INTO `tb_cidades` VALUES (9053, 26, 'SP', 'Junqueiropolis');

INSERT INTO `tb_cidades` VALUES (9054, 26, 'SP', 'Juquia');

INSERT INTO `tb_cidades` VALUES (9055, 26, 'SP', 'Juquiratiba');

INSERT INTO `tb_cidades` VALUES (9056, 26, 'SP', 'Juquitiba');

INSERT INTO `tb_cidades` VALUES (9057, 26, 'SP', 'Juritis');

INSERT INTO `tb_cidades` VALUES (9058, 26, 'SP', 'Juruce');

INSERT INTO `tb_cidades` VALUES (9059, 26, 'SP', 'Jurupeba');

INSERT INTO `tb_cidades` VALUES (9060, 26, 'SP', 'Jurupema');

INSERT INTO `tb_cidades` VALUES (9061, 26, 'SP', 'Lacio');

INSERT INTO `tb_cidades` VALUES (9062, 26, 'SP', 'Lagoa Azul');

INSERT INTO `tb_cidades` VALUES (9063, 26, 'SP', 'Lagoa Branca');

INSERT INTO `tb_cidades` VALUES (9064, 26, 'SP', 'Lagoinha');

INSERT INTO `tb_cidades` VALUES (9065, 26, 'SP', 'Laranjal Paulista');

INSERT INTO `tb_cidades` VALUES (9066, 26, 'SP', 'Laras');

INSERT INTO `tb_cidades` VALUES (9067, 26, 'SP', 'Lauro Penteado');

INSERT INTO `tb_cidades` VALUES (9068, 26, 'SP', 'Lavinia');

INSERT INTO `tb_cidades` VALUES (9069, 26, 'SP', 'Lavrinhas');

INSERT INTO `tb_cidades` VALUES (9070, 26, 'SP', 'Leme');

INSERT INTO `tb_cidades` VALUES (9071, 26, 'SP', 'Lencois Paulista');

INSERT INTO `tb_cidades` VALUES (9072, 26, 'SP', 'Limeira');

INSERT INTO `tb_cidades` VALUES (9073, 26, 'SP', 'Lindoia');

INSERT INTO `tb_cidades` VALUES (9074, 26, 'SP', 'Lins');

INSERT INTO `tb_cidades` VALUES (9075, 26, 'SP', 'Lobo');

INSERT INTO `tb_cidades` VALUES (9076, 26, 'SP', 'Lorena');

INSERT INTO `tb_cidades` VALUES (9077, 26, 'SP', 'Lourdes');

INSERT INTO `tb_cidades` VALUES (9078, 26, 'SP', 'Louveira');

INSERT INTO `tb_cidades` VALUES (9079, 26, 'SP', 'Lucelia');

INSERT INTO `tb_cidades` VALUES (9080, 26, 'SP', 'Lucianopolis');

INSERT INTO `tb_cidades` VALUES (9081, 26, 'SP', 'Luis Antonio');

INSERT INTO `tb_cidades` VALUES (9082, 26, 'SP', 'Luiziania');

INSERT INTO `tb_cidades` VALUES (9083, 26, 'SP', 'Lupercio');

INSERT INTO `tb_cidades` VALUES (9084, 26, 'SP', 'Lusitania');

INSERT INTO `tb_cidades` VALUES (9085, 26, 'SP', 'Lutecia');

INSERT INTO `tb_cidades` VALUES (9086, 26, 'SP', 'Macatuba');

INSERT INTO `tb_cidades` VALUES (9087, 26, 'SP', 'Macaubal');

INSERT INTO `tb_cidades` VALUES (9088, 26, 'SP', 'Macedonia');

INSERT INTO `tb_cidades` VALUES (9089, 26, 'SP', 'Macucos');

INSERT INTO `tb_cidades` VALUES (9090, 26, 'SP', 'Magda');

INSERT INTO `tb_cidades` VALUES (9091, 26, 'SP', 'Mailasqui');

INSERT INTO `tb_cidades` VALUES (9092, 26, 'SP', 'Mairinque');

INSERT INTO `tb_cidades` VALUES (9093, 26, 'SP', 'Mairipora');

INSERT INTO `tb_cidades` VALUES (9094, 26, 'SP', 'Major Prado');

INSERT INTO `tb_cidades` VALUES (9095, 26, 'SP', 'Manduri');

INSERT INTO `tb_cidades` VALUES (9096, 26, 'SP', 'Mangaratu');

INSERT INTO `tb_cidades` VALUES (9097, 26, 'SP', 'Maraba Paulista');

INSERT INTO `tb_cidades` VALUES (9098, 26, 'SP', 'Maracai');

INSERT INTO `tb_cidades` VALUES (9099, 26, 'SP', 'Marapoama');

INSERT INTO `tb_cidades` VALUES (9100, 26, 'SP', 'Marcondesia');

INSERT INTO `tb_cidades` VALUES (9101, 26, 'SP', 'Maresias');

INSERT INTO `tb_cidades` VALUES (9102, 26, 'SP', 'Mariapolis');

INSERT INTO `tb_cidades` VALUES (9103, 26, 'SP', 'Marilia');

INSERT INTO `tb_cidades` VALUES (9104, 26, 'SP', 'Marinopolis');

INSERT INTO `tb_cidades` VALUES (9105, 26, 'SP', 'Maristela');

INSERT INTO `tb_cidades` VALUES (9106, 26, 'SP', 'Martim Francisco');

INSERT INTO `tb_cidades` VALUES (9107, 26, 'SP', 'Martinho Prado Junior');

INSERT INTO `tb_cidades` VALUES (9108, 26, 'SP', 'Martinopolis');

INSERT INTO `tb_cidades` VALUES (9109, 26, 'SP', 'Matao');

INSERT INTO `tb_cidades` VALUES (9110, 26, 'SP', 'Maua');

INSERT INTO `tb_cidades` VALUES (9111, 26, 'SP', 'Mendonca');

INSERT INTO `tb_cidades` VALUES (9112, 26, 'SP', 'Meridiano');

INSERT INTO `tb_cidades` VALUES (9113, 26, 'SP', 'Mesopolis');

INSERT INTO `tb_cidades` VALUES (9114, 26, 'SP', 'Miguelopolis');

INSERT INTO `tb_cidades` VALUES (9115, 26, 'SP', 'Mineiros do Tiete');

INSERT INTO `tb_cidades` VALUES (9116, 26, 'SP', 'Mira Estrela');

INSERT INTO `tb_cidades` VALUES (9117, 26, 'SP', 'Miracatu');

INSERT INTO `tb_cidades` VALUES (9118, 26, 'SP', 'Miraluz');

INSERT INTO `tb_cidades` VALUES (9119, 26, 'SP', 'Mirandopolis');

INSERT INTO `tb_cidades` VALUES (9120, 26, 'SP', 'Mirante do Paranapanema');

INSERT INTO `tb_cidades` VALUES (9121, 26, 'SP', 'Mirassol');

INSERT INTO `tb_cidades` VALUES (9122, 26, 'SP', 'Mirassolandia');

INSERT INTO `tb_cidades` VALUES (9123, 26, 'SP', 'Mococa');

INSERT INTO `tb_cidades` VALUES (9124, 26, 'SP', 'Mogi das Cruzes');

INSERT INTO `tb_cidades` VALUES (9125, 26, 'SP', 'Mogi-guacu');

INSERT INTO `tb_cidades` VALUES (9126, 26, 'SP', 'Mogi-mirim');

INSERT INTO `tb_cidades` VALUES (9127, 26, 'SP', 'Mombuca');

INSERT INTO `tb_cidades` VALUES (9128, 26, 'SP', 'Moncoes');

INSERT INTO `tb_cidades` VALUES (9129, 26, 'SP', 'Mongagua');

INSERT INTO `tb_cidades` VALUES (9130, 26, 'SP', 'Montalvao');

INSERT INTO `tb_cidades` VALUES (9131, 26, 'SP', 'Monte Alegre do Sul');

INSERT INTO `tb_cidades` VALUES (9132, 26, 'SP', 'Monte Alto');

INSERT INTO `tb_cidades` VALUES (9133, 26, 'SP', 'Monte Aprazivel');

INSERT INTO `tb_cidades` VALUES (9134, 26, 'SP', 'Monte Azul Paulista');

INSERT INTO `tb_cidades` VALUES (9135, 26, 'SP', 'Monte Cabrao');

INSERT INTO `tb_cidades` VALUES (9136, 26, 'SP', 'Monte Castelo');

INSERT INTO `tb_cidades` VALUES (9137, 26, 'SP', 'Monte Mor');

INSERT INTO `tb_cidades` VALUES (9138, 26, 'SP', 'Monte Verde Paulista');

INSERT INTO `tb_cidades` VALUES (9139, 26, 'SP', 'Monteiro Lobato');

INSERT INTO `tb_cidades` VALUES (9140, 26, 'SP', 'Moreira Cesar');

INSERT INTO `tb_cidades` VALUES (9141, 26, 'SP', 'Morro Agudo');

INSERT INTO `tb_cidades` VALUES (9142, 26, 'SP', 'Morro do Alto');

INSERT INTO `tb_cidades` VALUES (9143, 26, 'SP', 'Morungaba');

INSERT INTO `tb_cidades` VALUES (9144, 26, 'SP', 'Mostardas');

INSERT INTO `tb_cidades` VALUES (9145, 26, 'SP', 'Motuca');

INSERT INTO `tb_cidades` VALUES (9146, 26, 'SP', 'Mourao');

INSERT INTO `tb_cidades` VALUES (9147, 26, 'SP', 'Murutinga do Sul');

INSERT INTO `tb_cidades` VALUES (9148, 26, 'SP', 'Nantes');

INSERT INTO `tb_cidades` VALUES (9149, 26, 'SP', 'Narandiba');

INSERT INTO `tb_cidades` VALUES (9150, 26, 'SP', 'Natividade da Serra');

INSERT INTO `tb_cidades` VALUES (9151, 26, 'SP', 'Nazare Paulista');

INSERT INTO `tb_cidades` VALUES (9152, 26, 'SP', 'Neves Paulista');

INSERT INTO `tb_cidades` VALUES (9153, 26, 'SP', 'Nhandeara');

INSERT INTO `tb_cidades` VALUES (9154, 26, 'SP', 'Nipoa');

INSERT INTO `tb_cidades` VALUES (9155, 26, 'SP', 'Nogueira');

INSERT INTO `tb_cidades` VALUES (9156, 26, 'SP', 'Nossa Senhora do Remedio');

INSERT INTO `tb_cidades` VALUES (9157, 26, 'SP', 'Nova Alexandria');

INSERT INTO `tb_cidades` VALUES (9158, 26, 'SP', 'Nova Alianca');

INSERT INTO `tb_cidades` VALUES (9159, 26, 'SP', 'Nova America');

INSERT INTO `tb_cidades` VALUES (9160, 26, 'SP', 'Nova Aparecida');

INSERT INTO `tb_cidades` VALUES (9161, 26, 'SP', 'Nova Campina');

INSERT INTO `tb_cidades` VALUES (9162, 26, 'SP', 'Nova Canaa Paulista');

INSERT INTO `tb_cidades` VALUES (9163, 26, 'SP', 'Nova Castilho');

INSERT INTO `tb_cidades` VALUES (9164, 26, 'SP', 'Nova Europa');

INSERT INTO `tb_cidades` VALUES (9165, 26, 'SP', 'Nova Granada');

INSERT INTO `tb_cidades` VALUES (9166, 26, 'SP', 'Nova Guataporanga');

INSERT INTO `tb_cidades` VALUES (9167, 26, 'SP', 'Nova Independencia');

INSERT INTO `tb_cidades` VALUES (9168, 26, 'SP', 'Nova Itapirema');

INSERT INTO `tb_cidades` VALUES (9169, 26, 'SP', 'Nova Luzitania');

INSERT INTO `tb_cidades` VALUES (9170, 26, 'SP', 'Nova Odessa');

INSERT INTO `tb_cidades` VALUES (9171, 26, 'SP', 'Nova Patria');

INSERT INTO `tb_cidades` VALUES (9172, 26, 'SP', 'Nova Veneza');

INSERT INTO `tb_cidades` VALUES (9173, 26, 'SP', 'Novais');

INSERT INTO `tb_cidades` VALUES (9174, 26, 'SP', 'Novo Cravinhos');

INSERT INTO `tb_cidades` VALUES (9175, 26, 'SP', 'Novo Horizonte');

INSERT INTO `tb_cidades` VALUES (9176, 26, 'SP', 'Nuporanga');

INSERT INTO `tb_cidades` VALUES (9177, 26, 'SP', 'Oasis');

INSERT INTO `tb_cidades` VALUES (9178, 26, 'SP', 'Ocaucu');

INSERT INTO `tb_cidades` VALUES (9179, 26, 'SP', 'Oleo');

INSERT INTO `tb_cidades` VALUES (9180, 26, 'SP', 'Olimpia');

INSERT INTO `tb_cidades` VALUES (9181, 26, 'SP', 'Oliveira Barros');

INSERT INTO `tb_cidades` VALUES (9182, 26, 'SP', 'Onda Branca');

INSERT INTO `tb_cidades` VALUES (9183, 26, 'SP', 'Onda Verde');

INSERT INTO `tb_cidades` VALUES (9184, 26, 'SP', 'Oriente');

INSERT INTO `tb_cidades` VALUES (9185, 26, 'SP', 'Orindiuva');

INSERT INTO `tb_cidades` VALUES (9186, 26, 'SP', 'Orlandia');

INSERT INTO `tb_cidades` VALUES (9187, 26, 'SP', 'Osasco');

INSERT INTO `tb_cidades` VALUES (9188, 26, 'SP', 'Oscar Bressane');

INSERT INTO `tb_cidades` VALUES (9189, 26, 'SP', 'Osvaldo Cruz');

INSERT INTO `tb_cidades` VALUES (9190, 26, 'SP', 'Ourinhos');

INSERT INTO `tb_cidades` VALUES (9191, 26, 'SP', 'Ouro Fino Paulista');

INSERT INTO `tb_cidades` VALUES (9192, 26, 'SP', 'Ouro Verde');

INSERT INTO `tb_cidades` VALUES (9193, 26, 'SP', 'Ouroeste');

INSERT INTO `tb_cidades` VALUES (9194, 26, 'SP', 'Pacaembu');

INSERT INTO `tb_cidades` VALUES (9195, 26, 'SP', 'Padre Nobrega');

INSERT INTO `tb_cidades` VALUES (9196, 26, 'SP', 'Palestina');

INSERT INTO `tb_cidades` VALUES (9197, 26, 'SP', 'Palmares Paulista');

INSERT INTO `tb_cidades` VALUES (9198, 26, 'SP', 'Palmeira D''oeste');

INSERT INTO `tb_cidades` VALUES (9199, 26, 'SP', 'Palmeiras de Sao Paulo');

INSERT INTO `tb_cidades` VALUES (9200, 26, 'SP', 'Palmital');

INSERT INTO `tb_cidades` VALUES (9201, 26, 'SP', 'Panorama');

INSERT INTO `tb_cidades` VALUES (9202, 26, 'SP', 'Paraguacu Paulista');

INSERT INTO `tb_cidades` VALUES (9203, 26, 'SP', 'Paraibuna');

INSERT INTO `tb_cidades` VALUES (9204, 26, 'SP', 'Paraiso');

INSERT INTO `tb_cidades` VALUES (9205, 26, 'SP', 'Paraisolandia');

INSERT INTO `tb_cidades` VALUES (9206, 26, 'SP', 'Paranabi');

INSERT INTO `tb_cidades` VALUES (9207, 26, 'SP', 'Paranapanema');

INSERT INTO `tb_cidades` VALUES (9208, 26, 'SP', 'Paranapiacaba');

INSERT INTO `tb_cidades` VALUES (9209, 26, 'SP', 'Paranapua');

INSERT INTO `tb_cidades` VALUES (9210, 26, 'SP', 'Parapua');

INSERT INTO `tb_cidades` VALUES (9211, 26, 'SP', 'Pardinho');

INSERT INTO `tb_cidades` VALUES (9212, 26, 'SP', 'Pariquera-acu');

INSERT INTO `tb_cidades` VALUES (9213, 26, 'SP', 'Parisi');

INSERT INTO `tb_cidades` VALUES (9214, 26, 'SP', 'Parnaso');

INSERT INTO `tb_cidades` VALUES (9215, 26, 'SP', 'Parque Meia Lua');

INSERT INTO `tb_cidades` VALUES (9216, 26, 'SP', 'Paruru');

INSERT INTO `tb_cidades` VALUES (9217, 26, 'SP', 'Patrocinio Paulista');

INSERT INTO `tb_cidades` VALUES (9218, 26, 'SP', 'Pauliceia');

INSERT INTO `tb_cidades` VALUES (9219, 26, 'SP', 'Paulinia');

INSERT INTO `tb_cidades` VALUES (9220, 26, 'SP', 'Paulistania');

INSERT INTO `tb_cidades` VALUES (9221, 26, 'SP', 'Paulo de Faria');

INSERT INTO `tb_cidades` VALUES (9222, 26, 'SP', 'Paulopolis');

INSERT INTO `tb_cidades` VALUES (9223, 26, 'SP', 'Pederneiras');

INSERT INTO `tb_cidades` VALUES (9224, 26, 'SP', 'Pedra Bela');

INSERT INTO `tb_cidades` VALUES (9225, 26, 'SP', 'Pedra Branca de Itarare');

INSERT INTO `tb_cidades` VALUES (9226, 26, 'SP', 'Pedranopolis');

INSERT INTO `tb_cidades` VALUES (9227, 26, 'SP', 'Pedregulho');

INSERT INTO `tb_cidades` VALUES (9228, 26, 'SP', 'Pedreira');

INSERT INTO `tb_cidades` VALUES (9229, 26, 'SP', 'Pedrinhas Paulista');

INSERT INTO `tb_cidades` VALUES (9230, 26, 'SP', 'Pedro Barros');

INSERT INTO `tb_cidades` VALUES (9231, 26, 'SP', 'Pedro de Toledo');

INSERT INTO `tb_cidades` VALUES (9232, 26, 'SP', 'Penapolis');

INSERT INTO `tb_cidades` VALUES (9233, 26, 'SP', 'Pereira Barreto');

INSERT INTO `tb_cidades` VALUES (9234, 26, 'SP', 'Pereiras');

INSERT INTO `tb_cidades` VALUES (9235, 26, 'SP', 'Peruibe');

INSERT INTO `tb_cidades` VALUES (9236, 26, 'SP', 'Piacatu');

INSERT INTO `tb_cidades` VALUES (9237, 26, 'SP', 'Picinguaba');

INSERT INTO `tb_cidades` VALUES (9238, 26, 'SP', 'Piedade');

INSERT INTO `tb_cidades` VALUES (9239, 26, 'SP', 'Pilar do Sul');

INSERT INTO `tb_cidades` VALUES (9240, 26, 'SP', 'Pindamonhangaba');

INSERT INTO `tb_cidades` VALUES (9241, 26, 'SP', 'Pindorama');

INSERT INTO `tb_cidades` VALUES (9242, 26, 'SP', 'Pinhalzinho');

INSERT INTO `tb_cidades` VALUES (9243, 26, 'SP', 'Pinheiros');

INSERT INTO `tb_cidades` VALUES (9244, 26, 'SP', 'Pioneiros');

INSERT INTO `tb_cidades` VALUES (9245, 26, 'SP', 'Piquerobi');

INSERT INTO `tb_cidades` VALUES (9246, 26, 'SP', 'Piquete');

INSERT INTO `tb_cidades` VALUES (9247, 26, 'SP', 'Piracaia');

INSERT INTO `tb_cidades` VALUES (9248, 26, 'SP', 'Piracicaba');

INSERT INTO `tb_cidades` VALUES (9249, 26, 'SP', 'Piraju');

INSERT INTO `tb_cidades` VALUES (9250, 26, 'SP', 'Pirajui');

INSERT INTO `tb_cidades` VALUES (9251, 26, 'SP', 'Piramboia');

INSERT INTO `tb_cidades` VALUES (9252, 26, 'SP', 'Pirangi');

INSERT INTO `tb_cidades` VALUES (9253, 26, 'SP', 'Pirapitingui');

INSERT INTO `tb_cidades` VALUES (9254, 26, 'SP', 'Pirapora do Bom Jesus');

INSERT INTO `tb_cidades` VALUES (9255, 26, 'SP', 'Pirapozinho');

INSERT INTO `tb_cidades` VALUES (9256, 26, 'SP', 'Pirassununga');

INSERT INTO `tb_cidades` VALUES (9257, 26, 'SP', 'Piratininga');

INSERT INTO `tb_cidades` VALUES (9258, 26, 'SP', 'Pitangueiras');

INSERT INTO `tb_cidades` VALUES (9259, 26, 'SP', 'Planalto');

INSERT INTO `tb_cidades` VALUES (9260, 26, 'SP', 'Planalto do Sul');

INSERT INTO `tb_cidades` VALUES (9261, 26, 'SP', 'Platina');

INSERT INTO `tb_cidades` VALUES (9262, 26, 'SP', 'Poa');

INSERT INTO `tb_cidades` VALUES (9263, 26, 'SP', 'Poloni');

INSERT INTO `tb_cidades` VALUES (9264, 26, 'SP', 'Polvilho');

INSERT INTO `tb_cidades` VALUES (9265, 26, 'SP', 'Pompeia');

INSERT INTO `tb_cidades` VALUES (9266, 26, 'SP', 'Pongai');

INSERT INTO `tb_cidades` VALUES (9267, 26, 'SP', 'Pontal');

INSERT INTO `tb_cidades` VALUES (9268, 26, 'SP', 'Pontalinda');

INSERT INTO `tb_cidades` VALUES (9269, 26, 'SP', 'Pontes Gestal');

INSERT INTO `tb_cidades` VALUES (9270, 26, 'SP', 'Populina');

INSERT INTO `tb_cidades` VALUES (9271, 26, 'SP', 'Porangaba');

INSERT INTO `tb_cidades` VALUES (9272, 26, 'SP', 'Porto Feliz');

INSERT INTO `tb_cidades` VALUES (9273, 26, 'SP', 'Porto Ferreira');

INSERT INTO `tb_cidades` VALUES (9274, 26, 'SP', 'Porto Novo');

INSERT INTO `tb_cidades` VALUES (9275, 26, 'SP', 'Potim');

INSERT INTO `tb_cidades` VALUES (9276, 26, 'SP', 'Potirendaba');

INSERT INTO `tb_cidades` VALUES (9277, 26, 'SP', 'Potunduva');

INSERT INTO `tb_cidades` VALUES (9278, 26, 'SP', 'Pracinha');

INSERT INTO `tb_cidades` VALUES (9279, 26, 'SP', 'Pradinia');

INSERT INTO `tb_cidades` VALUES (9280, 26, 'SP', 'Pradopolis');

INSERT INTO `tb_cidades` VALUES (9281, 26, 'SP', 'Praia Grande');

INSERT INTO `tb_cidades` VALUES (9282, 26, 'SP', 'Pratania');

INSERT INTO `tb_cidades` VALUES (9283, 26, 'SP', 'Presidente Alves');

INSERT INTO `tb_cidades` VALUES (9284, 26, 'SP', 'Presidente Bernardes');

INSERT INTO `tb_cidades` VALUES (9285, 26, 'SP', 'Presidente Epitacio');

INSERT INTO `tb_cidades` VALUES (9286, 26, 'SP', 'Presidente Prudente');

INSERT INTO `tb_cidades` VALUES (9287, 26, 'SP', 'Presidente Venceslau');

INSERT INTO `tb_cidades` VALUES (9288, 26, 'SP', 'Primavera');

INSERT INTO `tb_cidades` VALUES (9289, 26, 'SP', 'Promissao');

INSERT INTO `tb_cidades` VALUES (9290, 26, 'SP', 'Prudencio E Moraes');

INSERT INTO `tb_cidades` VALUES (9291, 26, 'SP', 'Quadra');

INSERT INTO `tb_cidades` VALUES (9292, 26, 'SP', 'Quata');

INSERT INTO `tb_cidades` VALUES (9293, 26, 'SP', 'Queiroz');

INSERT INTO `tb_cidades` VALUES (9294, 26, 'SP', 'Queluz');

INSERT INTO `tb_cidades` VALUES (9295, 26, 'SP', 'Quintana');

INSERT INTO `tb_cidades` VALUES (9296, 26, 'SP', 'Quiririm');

INSERT INTO `tb_cidades` VALUES (9297, 26, 'SP', 'Rafard');

INSERT INTO `tb_cidades` VALUES (9298, 26, 'SP', 'Rancharia');

INSERT INTO `tb_cidades` VALUES (9299, 26, 'SP', 'Rechan');

INSERT INTO `tb_cidades` VALUES (9300, 26, 'SP', 'Redencao da Serra');

INSERT INTO `tb_cidades` VALUES (9301, 26, 'SP', 'Regente Feijo');

INSERT INTO `tb_cidades` VALUES (9302, 26, 'SP', 'Reginopolis');

INSERT INTO `tb_cidades` VALUES (9303, 26, 'SP', 'Registro');

INSERT INTO `tb_cidades` VALUES (9304, 26, 'SP', 'Restinga');

INSERT INTO `tb_cidades` VALUES (9305, 26, 'SP', 'Riacho Grande');

INSERT INTO `tb_cidades` VALUES (9306, 26, 'SP', 'Ribeira');

INSERT INTO `tb_cidades` VALUES (9307, 26, 'SP', 'Ribeirao Bonito');

INSERT INTO `tb_cidades` VALUES (9308, 26, 'SP', 'Ribeirao Branco');

INSERT INTO `tb_cidades` VALUES (9309, 26, 'SP', 'Ribeirao Corrente');

INSERT INTO `tb_cidades` VALUES (9310, 26, 'SP', 'Ribeirao do Sul');

INSERT INTO `tb_cidades` VALUES (9311, 26, 'SP', 'Ribeirao dos Indios');

INSERT INTO `tb_cidades` VALUES (9312, 26, 'SP', 'Ribeirao Grande');

INSERT INTO `tb_cidades` VALUES (9313, 26, 'SP', 'Ribeirao Pires');

INSERT INTO `tb_cidades` VALUES (9314, 26, 'SP', 'Ribeirao Preto');

INSERT INTO `tb_cidades` VALUES (9315, 26, 'SP', 'Ribeiro do Vale');

INSERT INTO `tb_cidades` VALUES (9316, 26, 'SP', 'Ribeiro dos Santos');

INSERT INTO `tb_cidades` VALUES (9317, 26, 'SP', 'Rifaina');

INSERT INTO `tb_cidades` VALUES (9318, 26, 'SP', 'Rincao');

INSERT INTO `tb_cidades` VALUES (9319, 26, 'SP', 'Rinopolis');

INSERT INTO `tb_cidades` VALUES (9320, 26, 'SP', 'Rio Claro');

INSERT INTO `tb_cidades` VALUES (9321, 26, 'SP', 'Rio das Pedras');

INSERT INTO `tb_cidades` VALUES (9322, 26, 'SP', 'Rio Grande da Serra');

INSERT INTO `tb_cidades` VALUES (9323, 26, 'SP', 'Riolandia');

INSERT INTO `tb_cidades` VALUES (9324, 26, 'SP', 'Riversul');

INSERT INTO `tb_cidades` VALUES (9325, 26, 'SP', 'Roberto');

INSERT INTO `tb_cidades` VALUES (9326, 26, 'SP', 'Rosalia');

INSERT INTO `tb_cidades` VALUES (9327, 26, 'SP', 'Rosana');

INSERT INTO `tb_cidades` VALUES (9328, 26, 'SP', 'Roseira');

INSERT INTO `tb_cidades` VALUES (9329, 26, 'SP', 'Rubiacea');

INSERT INTO `tb_cidades` VALUES (9330, 26, 'SP', 'Rubiao Junior');

INSERT INTO `tb_cidades` VALUES (9331, 26, 'SP', 'Rubineia');

INSERT INTO `tb_cidades` VALUES (9332, 26, 'SP', 'Ruilandia');

INSERT INTO `tb_cidades` VALUES (9333, 26, 'SP', 'Sabauna');

INSERT INTO `tb_cidades` VALUES (9334, 26, 'SP', 'Sabino');

INSERT INTO `tb_cidades` VALUES (9335, 26, 'SP', 'Sagres');

INSERT INTO `tb_cidades` VALUES (9336, 26, 'SP', 'Sales');

INSERT INTO `tb_cidades` VALUES (9337, 26, 'SP', 'Sales Oliveira');

INSERT INTO `tb_cidades` VALUES (9338, 26, 'SP', 'Salesopolis');

INSERT INTO `tb_cidades` VALUES (9339, 26, 'SP', 'Salmourao');

INSERT INTO `tb_cidades` VALUES (9340, 26, 'SP', 'Saltinho');

INSERT INTO `tb_cidades` VALUES (9341, 26, 'SP', 'Salto');

INSERT INTO `tb_cidades` VALUES (9342, 26, 'SP', 'Salto de Pirapora');

INSERT INTO `tb_cidades` VALUES (9343, 26, 'SP', 'Salto do Avanhandava');

INSERT INTO `tb_cidades` VALUES (9344, 26, 'SP', 'Salto Grande');

INSERT INTO `tb_cidades` VALUES (9345, 26, 'SP', 'Sandovalina');

INSERT INTO `tb_cidades` VALUES (9346, 26, 'SP', 'Santa Adelia');

INSERT INTO `tb_cidades` VALUES (9347, 26, 'SP', 'Santa Albertina');

INSERT INTO `tb_cidades` VALUES (9348, 26, 'SP', 'Santa America');

INSERT INTO `tb_cidades` VALUES (9349, 26, 'SP', 'Santa Barbara D''oeste');

INSERT INTO `tb_cidades` VALUES (9350, 26, 'SP', 'Santa Branca');

INSERT INTO `tb_cidades` VALUES (9351, 26, 'SP', 'Santa Clara D''oeste');

INSERT INTO `tb_cidades` VALUES (9352, 26, 'SP', 'Santa Cruz da Conceicao');

INSERT INTO `tb_cidades` VALUES (9353, 26, 'SP', 'Santa Cruz da Esperanca');

INSERT INTO `tb_cidades` VALUES (9354, 26, 'SP', 'Santa Cruz da Estrela');

INSERT INTO `tb_cidades` VALUES (9355, 26, 'SP', 'Santa Cruz das Palmeiras');

INSERT INTO `tb_cidades` VALUES (9356, 26, 'SP', 'Santa Cruz do Rio Pardo');

INSERT INTO `tb_cidades` VALUES (9357, 26, 'SP', 'Santa Cruz dos Lopes');

INSERT INTO `tb_cidades` VALUES (9358, 26, 'SP', 'Santa Ernestina');

INSERT INTO `tb_cidades` VALUES (9359, 26, 'SP', 'Santa Eudoxia');

INSERT INTO `tb_cidades` VALUES (9360, 26, 'SP', 'Santa Fe do Sul');

INSERT INTO `tb_cidades` VALUES (9361, 26, 'SP', 'Santa Gertrudes');

INSERT INTO `tb_cidades` VALUES (9362, 26, 'SP', 'Santa Isabel');

INSERT INTO `tb_cidades` VALUES (9363, 26, 'SP', 'Santa Isabel do Marinheiro');

INSERT INTO `tb_cidades` VALUES (9364, 26, 'SP', 'Santa Lucia');

INSERT INTO `tb_cidades` VALUES (9365, 26, 'SP', 'Santa Margarida Paulista');

INSERT INTO `tb_cidades` VALUES (9366, 26, 'SP', 'Santa Maria da Serra');

INSERT INTO `tb_cidades` VALUES (9367, 26, 'SP', 'Santa Maria do Gurupa');

INSERT INTO `tb_cidades` VALUES (9368, 26, 'SP', 'Santa Mercedes');

INSERT INTO `tb_cidades` VALUES (9369, 26, 'SP', 'Santa Rita D''oeste');

INSERT INTO `tb_cidades` VALUES (9370, 26, 'SP', 'Santa Rita do Passa Quatro');

INSERT INTO `tb_cidades` VALUES (9371, 26, 'SP', 'Santa Rita do Ribeira');

INSERT INTO `tb_cidades` VALUES (9372, 26, 'SP', 'Santa Rosa de Viterbo');

INSERT INTO `tb_cidades` VALUES (9373, 26, 'SP', 'Santa Salete');

INSERT INTO `tb_cidades` VALUES (9374, 26, 'SP', 'Santa Teresinha de Piracicaba');

INSERT INTO `tb_cidades` VALUES (9375, 26, 'SP', 'Santana da Ponte Pensa');

INSERT INTO `tb_cidades` VALUES (9376, 26, 'SP', 'Santana de Parnaiba');

INSERT INTO `tb_cidades` VALUES (9377, 26, 'SP', 'Santelmo');

INSERT INTO `tb_cidades` VALUES (9378, 26, 'SP', 'Santo Anastacio');

INSERT INTO `tb_cidades` VALUES (9379, 26, 'SP', 'Santo Andre');

INSERT INTO `tb_cidades` VALUES (9380, 26, 'SP', 'Santo Antonio da Alegria');

INSERT INTO `tb_cidades` VALUES (9381, 26, 'SP', 'Santo Antonio da Estiva');

INSERT INTO `tb_cidades` VALUES (9382, 26, 'SP', 'Santo Antonio de Posse');

INSERT INTO `tb_cidades` VALUES (9383, 26, 'SP', 'Santo Antonio do Aracangua');

INSERT INTO `tb_cidades` VALUES (9384, 26, 'SP', 'Santo Antonio do Jardim');

INSERT INTO `tb_cidades` VALUES (9385, 26, 'SP', 'Santo Antonio do Paranapanema');

INSERT INTO `tb_cidades` VALUES (9386, 26, 'SP', 'Santo Antonio do Pinhal');

INSERT INTO `tb_cidades` VALUES (9387, 26, 'SP', 'Santo Antonio Paulista');

INSERT INTO `tb_cidades` VALUES (9388, 26, 'SP', 'Santo Expedito');

INSERT INTO `tb_cidades` VALUES (9389, 26, 'SP', 'Santopolis do Aguapei');

INSERT INTO `tb_cidades` VALUES (9390, 26, 'SP', 'Santos');

INSERT INTO `tb_cidades` VALUES (9391, 26, 'SP', 'Sao Benedito da Cachoeirinha');

INSERT INTO `tb_cidades` VALUES (9392, 26, 'SP', 'Sao Benedito das Areias');

INSERT INTO `tb_cidades` VALUES (9393, 26, 'SP', 'Sao Bento do Sapucai');

INSERT INTO `tb_cidades` VALUES (9394, 26, 'SP', 'Sao Bernardo do Campo');

INSERT INTO `tb_cidades` VALUES (9395, 26, 'SP', 'Sao Berto');

INSERT INTO `tb_cidades` VALUES (9396, 26, 'SP', 'Sao Caetano do Sul');

INSERT INTO `tb_cidades` VALUES (9397, 26, 'SP', 'Sao Carlos');

INSERT INTO `tb_cidades` VALUES (9398, 26, 'SP', 'Sao Francisco');

INSERT INTO `tb_cidades` VALUES (9399, 26, 'SP', 'Sao Francisco da Praia');

INSERT INTO `tb_cidades` VALUES (9400, 26, 'SP', 'Sao Francisco Xavier');

INSERT INTO `tb_cidades` VALUES (9401, 26, 'SP', 'Sao Joao da Boa Vista');

INSERT INTO `tb_cidades` VALUES (9402, 26, 'SP', 'Sao Joao das Duas Pontes');

INSERT INTO `tb_cidades` VALUES (9403, 26, 'SP', 'Sao Joao de Iracema');

INSERT INTO `tb_cidades` VALUES (9404, 26, 'SP', 'Sao Joao de Itaguacu');

INSERT INTO `tb_cidades` VALUES (9405, 26, 'SP', 'Sao Joao do Marinheiro');

INSERT INTO `tb_cidades` VALUES (9406, 26, 'SP', 'Sao Joao Do Pau D''alho');

INSERT INTO `tb_cidades` VALUES (9407, 26, 'SP', 'Sao Joao Novo');

INSERT INTO `tb_cidades` VALUES (9408, 26, 'SP', 'Sao Joaquim da Barra');

INSERT INTO `tb_cidades` VALUES (9409, 26, 'SP', 'Sao Jose da Bela Vista');

INSERT INTO `tb_cidades` VALUES (9410, 26, 'SP', 'Sao Jose das Laranjeiras');

INSERT INTO `tb_cidades` VALUES (9411, 26, 'SP', 'Sao Jose do Barreiro');

INSERT INTO `tb_cidades` VALUES (9412, 26, 'SP', 'Sao Jose do Rio Pardo');

INSERT INTO `tb_cidades` VALUES (9413, 26, 'SP', 'Sao Jose do Rio Preto');

INSERT INTO `tb_cidades` VALUES (9414, 26, 'SP', 'Sao Jose dos Campos');

INSERT INTO `tb_cidades` VALUES (9415, 26, 'SP', 'Sao Lourenco da Serra');

INSERT INTO `tb_cidades` VALUES (9416, 26, 'SP', 'Sao Lourenco do Turvo');

INSERT INTO `tb_cidades` VALUES (9417, 26, 'SP', 'Sao Luis do Paraitinga');

INSERT INTO `tb_cidades` VALUES (9418, 26, 'SP', 'Sao Luiz do Guaricanga');

INSERT INTO `tb_cidades` VALUES (9419, 26, 'SP', 'Sao Manuel');

INSERT INTO `tb_cidades` VALUES (9420, 26, 'SP', 'Sao Martinho D''oeste');

INSERT INTO `tb_cidades` VALUES (9421, 26, 'SP', 'Sao Miguel Arcanjo');

INSERT INTO `tb_cidades` VALUES (9422, 26, 'SP', 'Sao Paulo');

INSERT INTO `tb_cidades` VALUES (9423, 26, 'SP', 'Sao Pedro');

INSERT INTO `tb_cidades` VALUES (9424, 26, 'SP', 'Sao Pedro do Turvo');

INSERT INTO `tb_cidades` VALUES (9425, 26, 'SP', 'Sao Roque');

INSERT INTO `tb_cidades` VALUES (9426, 26, 'SP', 'Sao Roque da Fartura');

INSERT INTO `tb_cidades` VALUES (9427, 26, 'SP', 'Sao Sebastiao');

INSERT INTO `tb_cidades` VALUES (9428, 26, 'SP', 'Sao Sebastiao da Grama');

INSERT INTO `tb_cidades` VALUES (9429, 26, 'SP', 'Sao Sebastiao da Serra');

INSERT INTO `tb_cidades` VALUES (9430, 26, 'SP', 'Sao Silvestre de Jacarei');

INSERT INTO `tb_cidades` VALUES (9431, 26, 'SP', 'Sao Simao');

INSERT INTO `tb_cidades` VALUES (9432, 26, 'SP', 'Sao Vicente');

INSERT INTO `tb_cidades` VALUES (9433, 26, 'SP', 'Sapezal');

INSERT INTO `tb_cidades` VALUES (9434, 26, 'SP', 'Sarapui');

INSERT INTO `tb_cidades` VALUES (9435, 26, 'SP', 'Sarutaia');

INSERT INTO `tb_cidades` VALUES (9436, 26, 'SP', 'Sebastianopolis do Sul');

INSERT INTO `tb_cidades` VALUES (9437, 26, 'SP', 'Serra Azul');

INSERT INTO `tb_cidades` VALUES (9438, 26, 'SP', 'Serra Negra');

INSERT INTO `tb_cidades` VALUES (9439, 26, 'SP', 'Serrana');

INSERT INTO `tb_cidades` VALUES (9440, 26, 'SP', 'Sertaozinho');

INSERT INTO `tb_cidades` VALUES (9441, 26, 'SP', 'Sete Barras');

INSERT INTO `tb_cidades` VALUES (9442, 26, 'SP', 'Severinia');

INSERT INTO `tb_cidades` VALUES (9443, 26, 'SP', 'Silvania');

INSERT INTO `tb_cidades` VALUES (9444, 26, 'SP', 'Silveiras');

INSERT INTO `tb_cidades` VALUES (9445, 26, 'SP', 'Simoes');

INSERT INTO `tb_cidades` VALUES (9446, 26, 'SP', 'Simonsen');

INSERT INTO `tb_cidades` VALUES (9447, 26, 'SP', 'Socorro');

INSERT INTO `tb_cidades` VALUES (9448, 26, 'SP', 'Sodrelia');

INSERT INTO `tb_cidades` VALUES (9449, 26, 'SP', 'Solemar');

INSERT INTO `tb_cidades` VALUES (9450, 26, 'SP', 'Sorocaba');

INSERT INTO `tb_cidades` VALUES (9451, 26, 'SP', 'Sousas');

INSERT INTO `tb_cidades` VALUES (9452, 26, 'SP', 'Sud Mennucci');

INSERT INTO `tb_cidades` VALUES (9453, 26, 'SP', 'Suinana');

INSERT INTO `tb_cidades` VALUES (9454, 26, 'SP', 'Sumare');

INSERT INTO `tb_cidades` VALUES (9455, 26, 'SP', 'Sussui');

INSERT INTO `tb_cidades` VALUES (9456, 26, 'SP', 'Suzanapolis');

INSERT INTO `tb_cidades` VALUES (9457, 26, 'SP', 'Suzano');

INSERT INTO `tb_cidades` VALUES (9458, 26, 'SP', 'Tabajara');

INSERT INTO `tb_cidades` VALUES (9459, 26, 'SP', 'Tabapua');

INSERT INTO `tb_cidades` VALUES (9460, 26, 'SP', 'Tabatinga');

INSERT INTO `tb_cidades` VALUES (9461, 26, 'SP', 'Taboao da Serra');

INSERT INTO `tb_cidades` VALUES (9462, 26, 'SP', 'Taciba');

INSERT INTO `tb_cidades` VALUES (9463, 26, 'SP', 'Taguai');

INSERT INTO `tb_cidades` VALUES (9464, 26, 'SP', 'Taiacu');

INSERT INTO `tb_cidades` VALUES (9465, 26, 'SP', 'Taiacupeba');

INSERT INTO `tb_cidades` VALUES (9466, 26, 'SP', 'Taiuva');

INSERT INTO `tb_cidades` VALUES (9467, 26, 'SP', 'Talhado');

INSERT INTO `tb_cidades` VALUES (9468, 26, 'SP', 'Tambau');

INSERT INTO `tb_cidades` VALUES (9469, 26, 'SP', 'Tanabi');

INSERT INTO `tb_cidades` VALUES (9470, 26, 'SP', 'Tapinas');

INSERT INTO `tb_cidades` VALUES (9471, 26, 'SP', 'Tapirai');

INSERT INTO `tb_cidades` VALUES (9472, 26, 'SP', 'Tapiratiba');

INSERT INTO `tb_cidades` VALUES (9473, 26, 'SP', 'Taquaral');

INSERT INTO `tb_cidades` VALUES (9474, 26, 'SP', 'Taquaritinga');

INSERT INTO `tb_cidades` VALUES (9475, 26, 'SP', 'Taquarituba');

INSERT INTO `tb_cidades` VALUES (9476, 26, 'SP', 'Taquarivai');

INSERT INTO `tb_cidades` VALUES (9477, 26, 'SP', 'Tarabai');

INSERT INTO `tb_cidades` VALUES (9478, 26, 'SP', 'Taruma');

INSERT INTO `tb_cidades` VALUES (9479, 26, 'SP', 'Tatui');

INSERT INTO `tb_cidades` VALUES (9480, 26, 'SP', 'Taubate');

INSERT INTO `tb_cidades` VALUES (9481, 26, 'SP', 'Tecainda');

INSERT INTO `tb_cidades` VALUES (9482, 26, 'SP', 'Tejupa');

INSERT INTO `tb_cidades` VALUES (9483, 26, 'SP', 'Teodoro Sampaio');

INSERT INTO `tb_cidades` VALUES (9484, 26, 'SP', 'Termas de Ibira');

INSERT INTO `tb_cidades` VALUES (9485, 26, 'SP', 'Terra Nova D''oeste');

INSERT INTO `tb_cidades` VALUES (9486, 26, 'SP', 'Terra Roxa');

INSERT INTO `tb_cidades` VALUES (9487, 26, 'SP', 'Tibirica');

INSERT INTO `tb_cidades` VALUES (9488, 26, 'SP', 'Tibirica do Paranapanema');

INSERT INTO `tb_cidades` VALUES (9489, 26, 'SP', 'Tiete');

INSERT INTO `tb_cidades` VALUES (9490, 26, 'SP', 'Timburi');

INSERT INTO `tb_cidades` VALUES (9491, 26, 'SP', 'Toledo');

INSERT INTO `tb_cidades` VALUES (9492, 26, 'SP', 'Torre de Pedra');

INSERT INTO `tb_cidades` VALUES (9493, 26, 'SP', 'Torrinha');

INSERT INTO `tb_cidades` VALUES (9494, 26, 'SP', 'Trabiju');

INSERT INTO `tb_cidades` VALUES (9495, 26, 'SP', 'Tremembe');

INSERT INTO `tb_cidades` VALUES (9496, 26, 'SP', 'Tres Aliancas');

INSERT INTO `tb_cidades` VALUES (9497, 26, 'SP', 'Tres Fronteiras');

INSERT INTO `tb_cidades` VALUES (9498, 26, 'SP', 'Tres Pontes');

INSERT INTO `tb_cidades` VALUES (9499, 26, 'SP', 'Tres Vendas');

INSERT INTO `tb_cidades` VALUES (9500, 26, 'SP', 'Tuiuti');

INSERT INTO `tb_cidades` VALUES (9501, 26, 'SP', 'Tujuguaba');

INSERT INTO `tb_cidades` VALUES (9502, 26, 'SP', 'Tupa');

INSERT INTO `tb_cidades` VALUES (9503, 26, 'SP', 'Tupi');

INSERT INTO `tb_cidades` VALUES (9504, 26, 'SP', 'Tupi Paulista');

INSERT INTO `tb_cidades` VALUES (9505, 26, 'SP', 'Turiba do Sul');

INSERT INTO `tb_cidades` VALUES (9506, 26, 'SP', 'Turiuba');

INSERT INTO `tb_cidades` VALUES (9507, 26, 'SP', 'Turmalina');

INSERT INTO `tb_cidades` VALUES (9508, 26, 'SP', 'Turvinia');

INSERT INTO `tb_cidades` VALUES (9509, 26, 'SP', 'Ubarana');

INSERT INTO `tb_cidades` VALUES (9510, 26, 'SP', 'Ubatuba');

INSERT INTO `tb_cidades` VALUES (9511, 26, 'SP', 'Ubirajara');

INSERT INTO `tb_cidades` VALUES (9512, 26, 'SP', 'Uchoa');

INSERT INTO `tb_cidades` VALUES (9513, 26, 'SP', 'Uniao Paulista');

INSERT INTO `tb_cidades` VALUES (9514, 26, 'SP', 'Universo');

INSERT INTO `tb_cidades` VALUES (9515, 26, 'SP', 'Urania');

INSERT INTO `tb_cidades` VALUES (9516, 26, 'SP', 'Uru');

INSERT INTO `tb_cidades` VALUES (9517, 26, 'SP', 'Urupes');

INSERT INTO `tb_cidades` VALUES (9518, 26, 'SP', 'Ururai');

INSERT INTO `tb_cidades` VALUES (9519, 26, 'SP', 'Utinga');

INSERT INTO `tb_cidades` VALUES (9520, 26, 'SP', 'Vale Formoso');

INSERT INTO `tb_cidades` VALUES (9521, 26, 'SP', 'Valentim Gentil');

INSERT INTO `tb_cidades` VALUES (9522, 26, 'SP', 'Valinhos');

INSERT INTO `tb_cidades` VALUES (9523, 26, 'SP', 'Valparaiso');

INSERT INTO `tb_cidades` VALUES (9524, 26, 'SP', 'Vangloria');

INSERT INTO `tb_cidades` VALUES (9525, 26, 'SP', 'Vargem');

INSERT INTO `tb_cidades` VALUES (9526, 26, 'SP', 'Vargem Grande do Sul');

INSERT INTO `tb_cidades` VALUES (9527, 26, 'SP', 'Vargem Grande Paulista');

INSERT INTO `tb_cidades` VALUES (9528, 26, 'SP', 'Varpa');

INSERT INTO `tb_cidades` VALUES (9529, 26, 'SP', 'Varzea Paulista');

INSERT INTO `tb_cidades` VALUES (9530, 26, 'SP', 'Venda Branca');

INSERT INTO `tb_cidades` VALUES (9531, 26, 'SP', 'Vera Cruz');

INSERT INTO `tb_cidades` VALUES (9532, 26, 'SP', 'Vicente de Carvalho');

INSERT INTO `tb_cidades` VALUES (9533, 26, 'SP', 'Vicentinopolis');

INSERT INTO `tb_cidades` VALUES (9534, 26, 'SP', 'Vila Dirce');

INSERT INTO `tb_cidades` VALUES (9535, 26, 'SP', 'Vila Nery');

INSERT INTO `tb_cidades` VALUES (9536, 26, 'SP', 'Vila Xavier');

INSERT INTO `tb_cidades` VALUES (9537, 26, 'SP', 'Vinhedo');

INSERT INTO `tb_cidades` VALUES (9538, 26, 'SP', 'Viradouro');

INSERT INTO `tb_cidades` VALUES (9539, 26, 'SP', 'Vista Alegre do Alto');

INSERT INTO `tb_cidades` VALUES (9540, 26, 'SP', 'Vitoria Brasil');

INSERT INTO `tb_cidades` VALUES (9541, 26, 'SP', 'Vitoriana');

INSERT INTO `tb_cidades` VALUES (9542, 26, 'SP', 'Votorantim');

INSERT INTO `tb_cidades` VALUES (9543, 26, 'SP', 'Votuporanga');

INSERT INTO `tb_cidades` VALUES (9544, 26, 'SP', 'Zacarias');

INSERT INTO `tb_cidades` VALUES (9545, 27, 'TO', 'Abreulandia');

INSERT INTO `tb_cidades` VALUES (9546, 27, 'TO', 'Aguiarnopolis');

INSERT INTO `tb_cidades` VALUES (9547, 27, 'TO', 'Alianca do Tocantins');

INSERT INTO `tb_cidades` VALUES (9548, 27, 'TO', 'Almas');

INSERT INTO `tb_cidades` VALUES (9549, 27, 'TO', 'Alvorada');

INSERT INTO `tb_cidades` VALUES (9550, 27, 'TO', 'Anajanopolis');

INSERT INTO `tb_cidades` VALUES (9551, 27, 'TO', 'Ananas');

INSERT INTO `tb_cidades` VALUES (9552, 27, 'TO', 'Angico');

INSERT INTO `tb_cidades` VALUES (9553, 27, 'TO', 'Aparecida do Rio Negro');

INSERT INTO `tb_cidades` VALUES (9554, 27, 'TO', 'Apinaje');

INSERT INTO `tb_cidades` VALUES (9555, 27, 'TO', 'Aragacui');

INSERT INTO `tb_cidades` VALUES (9556, 27, 'TO', 'Aragominas');

INSERT INTO `tb_cidades` VALUES (9557, 27, 'TO', 'Araguacema');

INSERT INTO `tb_cidades` VALUES (9558, 27, 'TO', 'Araguacu');

INSERT INTO `tb_cidades` VALUES (9559, 27, 'TO', 'Araguaina');

INSERT INTO `tb_cidades` VALUES (9560, 27, 'TO', 'Araguana');

INSERT INTO `tb_cidades` VALUES (9561, 27, 'TO', 'Araguatins');

INSERT INTO `tb_cidades` VALUES (9562, 27, 'TO', 'Arapoema');

INSERT INTO `tb_cidades` VALUES (9563, 27, 'TO', 'Arraias');

INSERT INTO `tb_cidades` VALUES (9564, 27, 'TO', 'Augustinopolis');

INSERT INTO `tb_cidades` VALUES (9565, 27, 'TO', 'Aurora do Tocantins');

INSERT INTO `tb_cidades` VALUES (9566, 27, 'TO', 'Axixa do Tocantins');

INSERT INTO `tb_cidades` VALUES (9567, 27, 'TO', 'Babaculandia');

INSERT INTO `tb_cidades` VALUES (9568, 27, 'TO', 'Bandeirantes do Tocantins');

INSERT INTO `tb_cidades` VALUES (9569, 27, 'TO', 'Barra do Grota');

INSERT INTO `tb_cidades` VALUES (9570, 27, 'TO', 'Barra do Ouro');

INSERT INTO `tb_cidades` VALUES (9571, 27, 'TO', 'Barrolandia');

INSERT INTO `tb_cidades` VALUES (9572, 27, 'TO', 'Bernardo Sayao');

INSERT INTO `tb_cidades` VALUES (9573, 27, 'TO', 'Bom Jesus do Tocantins');

INSERT INTO `tb_cidades` VALUES (9574, 27, 'TO', 'Brasilandia');

INSERT INTO `tb_cidades` VALUES (9575, 27, 'TO', 'Brasilandia do Tocantins');

INSERT INTO `tb_cidades` VALUES (9576, 27, 'TO', 'Brejinho de Nazare');

INSERT INTO `tb_cidades` VALUES (9577, 27, 'TO', 'Buriti do Tocantins');

INSERT INTO `tb_cidades` VALUES (9578, 27, 'TO', 'Cachoeirinha');

INSERT INTO `tb_cidades` VALUES (9579, 27, 'TO', 'Campos Lindos');

INSERT INTO `tb_cidades` VALUES (9580, 27, 'TO', 'Cana Brava');

INSERT INTO `tb_cidades` VALUES (9581, 27, 'TO', 'Cariri do Tocantins');

INSERT INTO `tb_cidades` VALUES (9582, 27, 'TO', 'Carmolandia');

INSERT INTO `tb_cidades` VALUES (9583, 27, 'TO', 'Carrasco Bonito');

INSERT INTO `tb_cidades` VALUES (9584, 27, 'TO', 'Cartucho');

INSERT INTO `tb_cidades` VALUES (9585, 27, 'TO', 'Caseara');

INSERT INTO `tb_cidades` VALUES (9586, 27, 'TO', 'Centenario');

INSERT INTO `tb_cidades` VALUES (9587, 27, 'TO', 'Chapada da Areia');

INSERT INTO `tb_cidades` VALUES (9588, 27, 'TO', 'Chapada da Natividade');

INSERT INTO `tb_cidades` VALUES (9589, 27, 'TO', 'Cocalandia');

INSERT INTO `tb_cidades` VALUES (9590, 27, 'TO', 'Cocalinho');

INSERT INTO `tb_cidades` VALUES (9591, 27, 'TO', 'Colinas do Tocantins');

INSERT INTO `tb_cidades` VALUES (9592, 27, 'TO', 'Colmeia');

INSERT INTO `tb_cidades` VALUES (9593, 27, 'TO', 'Combinado');

INSERT INTO `tb_cidades` VALUES (9594, 27, 'TO', 'Conceicao do Tocantins');

INSERT INTO `tb_cidades` VALUES (9595, 27, 'TO', 'Correinha');

INSERT INTO `tb_cidades` VALUES (9596, 27, 'TO', 'Couto de Magalhaes');

INSERT INTO `tb_cidades` VALUES (9597, 27, 'TO', 'Craolandia');

INSERT INTO `tb_cidades` VALUES (9598, 27, 'TO', 'Cristalandia');

INSERT INTO `tb_cidades` VALUES (9599, 27, 'TO', 'Crixas');

INSERT INTO `tb_cidades` VALUES (9600, 27, 'TO', 'Crixas do Tocantins');

INSERT INTO `tb_cidades` VALUES (9601, 27, 'TO', 'Darcinopolis');

INSERT INTO `tb_cidades` VALUES (9602, 27, 'TO', 'Dianopolis');

INSERT INTO `tb_cidades` VALUES (9603, 27, 'TO', 'Divinopolis do Tocantins');

INSERT INTO `tb_cidades` VALUES (9604, 27, 'TO', 'Dois Irmaos do Tocantins');

INSERT INTO `tb_cidades` VALUES (9605, 27, 'TO', 'Duere');

INSERT INTO `tb_cidades` VALUES (9606, 27, 'TO', 'Escondido');

INSERT INTO `tb_cidades` VALUES (9607, 27, 'TO', 'Esperantina');

INSERT INTO `tb_cidades` VALUES (9608, 27, 'TO', 'Fatima');

INSERT INTO `tb_cidades` VALUES (9609, 27, 'TO', 'Figueiropolis');

INSERT INTO `tb_cidades` VALUES (9610, 27, 'TO', 'Filadelfia');

INSERT INTO `tb_cidades` VALUES (9611, 27, 'TO', 'Formoso do Araguaia');

INSERT INTO `tb_cidades` VALUES (9612, 27, 'TO', 'Fortaleza do Tabocao');

INSERT INTO `tb_cidades` VALUES (9613, 27, 'TO', 'Goianorte');

INSERT INTO `tb_cidades` VALUES (9614, 27, 'TO', 'Goiatins');

INSERT INTO `tb_cidades` VALUES (9615, 27, 'TO', 'Guarai');

INSERT INTO `tb_cidades` VALUES (9616, 27, 'TO', 'Gurupi');

INSERT INTO `tb_cidades` VALUES (9617, 27, 'TO', 'Ilha Barreira Branca');

INSERT INTO `tb_cidades` VALUES (9618, 27, 'TO', 'Ipueiras');

INSERT INTO `tb_cidades` VALUES (9619, 27, 'TO', 'Itacaja');

INSERT INTO `tb_cidades` VALUES (9620, 27, 'TO', 'Itaguatins');

INSERT INTO `tb_cidades` VALUES (9621, 27, 'TO', 'Itapiratins');

INSERT INTO `tb_cidades` VALUES (9622, 27, 'TO', 'Itapora do Tocantins');

INSERT INTO `tb_cidades` VALUES (9623, 27, 'TO', 'Jau do Tocantins');

INSERT INTO `tb_cidades` VALUES (9624, 27, 'TO', 'Juarina');

INSERT INTO `tb_cidades` VALUES (9625, 27, 'TO', 'Jussara');

INSERT INTO `tb_cidades` VALUES (9626, 27, 'TO', 'Lagoa da Confusao');

INSERT INTO `tb_cidades` VALUES (9627, 27, 'TO', 'Lagoa do Tocantins');

INSERT INTO `tb_cidades` VALUES (9628, 27, 'TO', 'Lajeado');

INSERT INTO `tb_cidades` VALUES (9629, 27, 'TO', 'Lavandeira');

INSERT INTO `tb_cidades` VALUES (9630, 27, 'TO', 'Lizarda');

INSERT INTO `tb_cidades` VALUES (9631, 27, 'TO', 'Luzinopolis');

INSERT INTO `tb_cidades` VALUES (9632, 27, 'TO', 'Marianopolis do Tocantins');

INSERT INTO `tb_cidades` VALUES (9633, 27, 'TO', 'Mateiros');

INSERT INTO `tb_cidades` VALUES (9634, 27, 'TO', 'Maurilandia do Tocantins');

INSERT INTO `tb_cidades` VALUES (9635, 27, 'TO', 'Miracema do Tocantins');

INSERT INTO `tb_cidades` VALUES (9636, 27, 'TO', 'Mirandopolis');

INSERT INTO `tb_cidades` VALUES (9637, 27, 'TO', 'Miranorte');

INSERT INTO `tb_cidades` VALUES (9638, 27, 'TO', 'Monte do Carmo');

INSERT INTO `tb_cidades` VALUES (9639, 27, 'TO', 'Monte Lindo');

INSERT INTO `tb_cidades` VALUES (9640, 27, 'TO', 'Monte Santo do Tocantins');

INSERT INTO `tb_cidades` VALUES (9641, 27, 'TO', 'Mosquito');

INSERT INTO `tb_cidades` VALUES (9642, 27, 'TO', 'Muricilandia');

INSERT INTO `tb_cidades` VALUES (9643, 27, 'TO', 'Natal');

INSERT INTO `tb_cidades` VALUES (9644, 27, 'TO', 'Natividade');

INSERT INTO `tb_cidades` VALUES (9645, 27, 'TO', 'Nazare');

INSERT INTO `tb_cidades` VALUES (9646, 27, 'TO', 'Nova Olinda');

INSERT INTO `tb_cidades` VALUES (9647, 27, 'TO', 'Nova Rosalandia');

INSERT INTO `tb_cidades` VALUES (9648, 27, 'TO', 'Novo Acordo');

INSERT INTO `tb_cidades` VALUES (9649, 27, 'TO', 'Novo Alegre');

INSERT INTO `tb_cidades` VALUES (9650, 27, 'TO', 'Novo Horizonte');

INSERT INTO `tb_cidades` VALUES (9651, 27, 'TO', 'Novo Jardim');

INSERT INTO `tb_cidades` VALUES (9652, 27, 'TO', 'Oliveira de Fatima');

INSERT INTO `tb_cidades` VALUES (9653, 27, 'TO', 'Palmas');

INSERT INTO `tb_cidades` VALUES (9654, 27, 'TO', 'Palmeirante');

INSERT INTO `tb_cidades` VALUES (9655, 27, 'TO', 'Palmeiropolis');

INSERT INTO `tb_cidades` VALUES (9656, 27, 'TO', 'Paraiso do Tocantins');

INSERT INTO `tb_cidades` VALUES (9657, 27, 'TO', 'Parana');

INSERT INTO `tb_cidades` VALUES (9658, 27, 'TO', 'Pau D''arco');

INSERT INTO `tb_cidades` VALUES (9659, 27, 'TO', 'Pe da Serra');

INSERT INTO `tb_cidades` VALUES (9660, 27, 'TO', 'Pedro Afonso');

INSERT INTO `tb_cidades` VALUES (9661, 27, 'TO', 'Pedro Ludovico');

INSERT INTO `tb_cidades` VALUES (9662, 27, 'TO', 'Peixe');

INSERT INTO `tb_cidades` VALUES (9663, 27, 'TO', 'Pequizeiro');

INSERT INTO `tb_cidades` VALUES (9664, 27, 'TO', 'Piloes');

INSERT INTO `tb_cidades` VALUES (9665, 27, 'TO', 'Pindorama do Tocantins');

INSERT INTO `tb_cidades` VALUES (9666, 27, 'TO', 'Piraque');

INSERT INTO `tb_cidades` VALUES (9667, 27, 'TO', 'Pium');

INSERT INTO `tb_cidades` VALUES (9668, 27, 'TO', 'Ponte Alta do Bom Jesus');

INSERT INTO `tb_cidades` VALUES (9669, 27, 'TO', 'Ponte Alta do Tocantins');

INSERT INTO `tb_cidades` VALUES (9670, 27, 'TO', 'Pontes');

INSERT INTO `tb_cidades` VALUES (9671, 27, 'TO', 'Poraozinho');

INSERT INTO `tb_cidades` VALUES (9672, 27, 'TO', 'Porto Alegre do Tocantins');

INSERT INTO `tb_cidades` VALUES (9673, 27, 'TO', 'Porto Lemos');

INSERT INTO `tb_cidades` VALUES (9674, 27, 'TO', 'Porto Nacional');

INSERT INTO `tb_cidades` VALUES (9675, 27, 'TO', 'Praia Norte');

INSERT INTO `tb_cidades` VALUES (9676, 27, 'TO', 'Presidente Kennedy');

INSERT INTO `tb_cidades` VALUES (9677, 27, 'TO', 'Principe');

INSERT INTO `tb_cidades` VALUES (9678, 27, 'TO', 'Pugmil');

INSERT INTO `tb_cidades` VALUES (9679, 27, 'TO', 'Recursolandia');

INSERT INTO `tb_cidades` VALUES (9680, 27, 'TO', 'Riachinho');

INSERT INTO `tb_cidades` VALUES (9681, 27, 'TO', 'Rio da Conceicao');

INSERT INTO `tb_cidades` VALUES (9682, 27, 'TO', 'Rio dos Bois');

INSERT INTO `tb_cidades` VALUES (9683, 27, 'TO', 'Rio Sono');

INSERT INTO `tb_cidades` VALUES (9684, 27, 'TO', 'Sampaio');

INSERT INTO `tb_cidades` VALUES (9685, 27, 'TO', 'Sandolandia');

INSERT INTO `tb_cidades` VALUES (9686, 27, 'TO', 'Santa Fe do Araguaia');

INSERT INTO `tb_cidades` VALUES (9687, 27, 'TO', 'Santa Maria do Tocantins');

INSERT INTO `tb_cidades` VALUES (9688, 27, 'TO', 'Santa Rita do Tocantins');

INSERT INTO `tb_cidades` VALUES (9689, 27, 'TO', 'Santa Rosa do Tocantins');

INSERT INTO `tb_cidades` VALUES (9690, 27, 'TO', 'Santa Tereza do Tocantins');

INSERT INTO `tb_cidades` VALUES (9691, 27, 'TO', 'Santa Terezinha do Tocantins');

INSERT INTO `tb_cidades` VALUES (9692, 27, 'TO', 'Sao Bento do Tocantins');

INSERT INTO `tb_cidades` VALUES (9693, 27, 'TO', 'Sao Felix do Tocantins');

INSERT INTO `tb_cidades` VALUES (9694, 27, 'TO', 'Sao Miguel do Tocantins');

INSERT INTO `tb_cidades` VALUES (9695, 27, 'TO', 'Sao Salvador do Tocantins');

INSERT INTO `tb_cidades` VALUES (9696, 27, 'TO', 'Sao Sebastiao do Tocantins');

INSERT INTO `tb_cidades` VALUES (9697, 27, 'TO', 'Sao Valerio da Natividade');

INSERT INTO `tb_cidades` VALUES (9698, 27, 'TO', 'Silvanopolis');

INSERT INTO `tb_cidades` VALUES (9699, 27, 'TO', 'Sitio Novo do Tocantins');

INSERT INTO `tb_cidades` VALUES (9700, 27, 'TO', 'Sucupira');

INSERT INTO `tb_cidades` VALUES (9701, 27, 'TO', 'Taguatinga');

INSERT INTO `tb_cidades` VALUES (9702, 27, 'TO', 'Taipas do Tocantins');

INSERT INTO `tb_cidades` VALUES (9703, 27, 'TO', 'Talisma');

INSERT INTO `tb_cidades` VALUES (9704, 27, 'TO', 'Tamboril');

INSERT INTO `tb_cidades` VALUES (9705, 27, 'TO', 'Taquaralto');

INSERT INTO `tb_cidades` VALUES (9706, 27, 'TO', 'Taquarussu do Tocantins');

INSERT INTO `tb_cidades` VALUES (9707, 27, 'TO', 'Tocantinia');

INSERT INTO `tb_cidades` VALUES (9708, 27, 'TO', 'Tocantinopolis');

INSERT INTO `tb_cidades` VALUES (9709, 27, 'TO', 'Tupirama');

INSERT INTO `tb_cidades` VALUES (9710, 27, 'TO', 'Tupirata');

INSERT INTO `tb_cidades` VALUES (9711, 27, 'TO', 'Tupiratins');

INSERT INTO `tb_cidades` VALUES (9712, 27, 'TO', 'Venus');

INSERT INTO `tb_cidades` VALUES (9713, 27, 'TO', 'Wanderlandia');

INSERT INTO `tb_cidades` VALUES (9714, 27, 'TO', 'Xambioa');



-- --------------------------------------------------------



-- 

-- Estrutura da tabela `tb_estados`

-- 



CREATE TABLE `tb_estados` (

  `id` int(2) unsigned zerofill NOT NULL auto_increment,

  `uf` varchar(10) NOT NULL default '',

  `nome` varchar(20) NOT NULL default '',

  PRIMARY KEY  (`id`)

) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;



-- 

-- Extraindo dados da tabela `tb_estados`

-- 



INSERT INTO `tb_estados` VALUES (01, 'AC', 'Acre');

INSERT INTO `tb_estados` VALUES (02, 'AL', 'Alagoas');

INSERT INTO `tb_estados` VALUES (03, 'AM', 'Amazonas');

INSERT INTO `tb_estados` VALUES (04, 'AP', 'Amap�');

INSERT INTO `tb_estados` VALUES (05, 'BA', 'Bahia');

INSERT INTO `tb_estados` VALUES (06, 'CE', 'Cear�');

INSERT INTO `tb_estados` VALUES (07, 'DF', 'Distrito Federal');

INSERT INTO `tb_estados` VALUES (08, 'ES', 'Esp�rito Santo');

INSERT INTO `tb_estados` VALUES (09, 'GO', 'Goi�s');

INSERT INTO `tb_estados` VALUES (10, 'MA', 'Maranhao');

INSERT INTO `tb_estados` VALUES (11, 'MG', 'Minas Gerais');

INSERT INTO `tb_estados` VALUES (12, 'MS', 'Mato Grosso do Sul');

INSERT INTO `tb_estados` VALUES (13, 'MT', 'Mato Grosso');

INSERT INTO `tb_estados` VALUES (14, 'PA', 'Par�');

INSERT INTO `tb_estados` VALUES (15, 'PB', 'Para�ba');

INSERT INTO `tb_estados` VALUES (16, 'PE', 'Pernambuco');

INSERT INTO `tb_estados` VALUES (17, 'PI', 'Piau�');

INSERT INTO `tb_estados` VALUES (18, 'PR', 'Paran�');

INSERT INTO `tb_estados` VALUES (19, 'RJ', 'Rio de Janeiro');

INSERT INTO `tb_estados` VALUES (20, 'RN', 'Rio Grande do Norte');

INSERT INTO `tb_estados` VALUES (21, 'RO', 'Rond�nia');

INSERT INTO `tb_estados` VALUES (22, 'RR', 'Roraima');

INSERT INTO `tb_estados` VALUES (23, 'RS', 'Rio Grande do Sul');

INSERT INTO `tb_estados` VALUES (24, 'SC', 'Santa Catarina');

INSERT INTO `tb_estados` VALUES (25, 'SE', 'Sergipe');

INSERT INTO `tb_estados` VALUES (26, 'SP', 'Sao Paulo');

INSERT INTO `tb_estados` VALUES (27, 'TO', 'Tocantins');
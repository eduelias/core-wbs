# phpMyAdmin SQL Dump
# version 2.5.6
# http://www.phpmyadmin.net
#
# Servidor: localhost
# Tempo de Generação: Ago 06, 2004 at 02:42 PM
# Versão do Servidor: 4.0.18
# Versão do PHP: 4.3.6
# 
# Banco de Dados : `sif_base`
# 

# --------------------------------------------------------

#
# Estrutura da tabela `os`
#

CREATE TABLE `os` (
  `codos` bigint(21) NOT NULL auto_increment,
  `codemp` bigint(21) NOT NULL default '0',
  `codcliente` bigint(21) NOT NULL default '0',
  `codvend` bigint(21) NOT NULL default '0',
  `codtipo_serv` bigint(21) NOT NULL default '0',
  `mlb` double(10,2) NOT NULL default '0.00',
  `vpv` double(10,2) NOT NULL default '0.00',
  `vt` double(10,2) NOT NULL default '0.00',
  `vpp` double(10,2) NOT NULL default '0.00',
  `mcv` double(10,5) NOT NULL default '0.00000',
  `vc` double(10,2) NOT NULL default '0.00',
  `vs` double(10,2) NOT NULL default '0.00',
  `dataos` datetime NOT NULL default '0000-00-00 00:00:00',
  `dataprevent` date NOT NULL default '0000-00-00',
  `dataentrega` datetime NOT NULL default '0000-00-00 00:00:00',
  `horaprevent` varchar(50) NOT NULL default '',
  `status` varchar(20) default NULL,
  `contato` varchar(20) default NULL,
  `dddtel1` char(3) NOT NULL default '',
  `tel1` varchar(20) default NULL,
  `dddtel2` char(3) NOT NULL default '',
  `tel2` varchar(20) default NULL,
  `os_descricao_equip` mediumtext NOT NULL,
  `os_defeito_apres` mediumtext NOT NULL,
  `os_laudo` mediumtext NOT NULL,
  `os_servico_execut` mediumtext NOT NULL,
  `serv_coletar` char(3) NOT NULL default '',
  `serv_entregar` char(3) NOT NULL default '',
  `serv_onsite` char(3) NOT NULL default '',
  `hist` int(5) default '0',
  `modped` char(3) NOT NULL default '',
  `ckmlb` char(3) NOT NULL default '',
  `fat` char(3) NOT NULL default '',
  `nf` char(3) NOT NULL default '',
  `cb` varchar(5) NOT NULL default '',
  `caixa` varchar(5) NOT NULL default '',
  `libentr` varchar(5) NOT NULL default '',
  `cancel` char(3) NOT NULL default '',
  `codbarra` bigint(21) NOT NULL default '0',
  `respentr` varchar(50) NOT NULL default '',
  `obs` varchar(250) NOT NULL default '',
  `fatorvista` double(10,8) NOT NULL default '0.00000000',
  `taxa` double(10,2) NOT NULL default '0.00',
  `codbarra_pedref` bigint(21) NOT NULL default '0',
  `codbarra_osref` bigint(21) NOT NULL default '0',
  PRIMARY KEY  (`codos`),
  KEY `codbarra` (`codbarra`),
  KEY `codemp` (`codemp`)
) TYPE=MyISAM PACK_KEYS=1 AUTO_INCREMENT=1000 ;

#
# Extraindo dados da tabela `os`
#


# --------------------------------------------------------

#
# Estrutura da tabela `os_mod`
#

CREATE TABLE `os_mod` (
  `codmod_os` bigint(21) NOT NULL auto_increment,
  `codos` bigint(21) NOT NULL default '0',
  `codprod` bigint(21) NOT NULL default '0',
  `qtde` int(20) NOT NULL default '0',
  `codcb` mediumtext NOT NULL,
  `codprodcj` bigint(20) NOT NULL default '0',
  `tipocj` bigint(20) NOT NULL default '0',
  `datamod_os` datetime NOT NULL default '0000-00-00 00:00:00',
  `login` varchar(50) NOT NULL default '',
  `status` varchar(5) NOT NULL default '',
  `tipo_estoque` varchar(5) NOT NULL default '',
  PRIMARY KEY  (`codmod_os`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Extraindo dados da tabela `os_mod`
#


# --------------------------------------------------------

#
# Estrutura da tabela `os_nf`
#

CREATE TABLE `os_nf` (
  `codnf_os` bigint(21) NOT NULL auto_increment,
  `codos` bigint(21) NOT NULL default '0',
  `nf` varchar(200) NOT NULL default '',
  `valornf` double(10,2) NOT NULL default '0.00',
  PRIMARY KEY  (`codnf_os`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Extraindo dados da tabela `os_nf`
#


# --------------------------------------------------------

#
# Estrutura da tabela `os_parcelas`
#

CREATE TABLE `os_parcelas` (
  `codparcos` bigint(21) NOT NULL auto_increment,
  `codos` bigint(21) NOT NULL default '0',
  `datavenc` date default '0000-00-00',
  `vp` double(10,2) default '0.00',
  `tipo` varchar(30) default NULL,
  `numcheq` varchar(100) default NULL,
  `banco` varchar(20) default NULL,
  `agencia` varchar(20) NOT NULL default '',
  `conta` varchar(50) NOT NULL default '',
  `pendfpg` char(3) NOT NULL default '',
  `parcpg` char(3) NOT NULL default '',
  `numdoc` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`codparcos`)
) TYPE=MyISAM PACK_KEYS=1 AUTO_INCREMENT=1 ;

#
# Extraindo dados da tabela `os_parcelas`
#


# --------------------------------------------------------

#
# Estrutura da tabela `os_prod`
#

CREATE TABLE `os_prod` (
  `codpos` bigint(21) NOT NULL auto_increment,
  `codos` bigint(21) NOT NULL default '0',
  `codprod` bigint(21) NOT NULL default '0',
  `qtde` int(20) NOT NULL default '0',
  `ppu` double(10,2) NOT NULL default '0.00',
  `datastatus` datetime NOT NULL default '0000-00-00 00:00:00',
  `status` varchar(20) default NULL,
  `codprodcj` bigint(21) NOT NULL default '0',
  `tipoprod` varchar(10) default NULL,
  `tipocj` bigint(21) default NULL,
  `codcb` mediumtext NOT NULL,
  `tipo_estoque` varchar(10) default NULL,
  PRIMARY KEY  (`codpos`)
) TYPE=MyISAM PACK_KEYS=1 AUTO_INCREMENT=1 ;

#
# Extraindo dados da tabela `os_prod`
#


# --------------------------------------------------------

#
# Estrutura da tabela `os_status`
#

CREATE TABLE `os_status` (
  `codposstatus` bigint(21) NOT NULL auto_increment,
  `codos` bigint(21) NOT NULL default '0',
  `datastatus` datetime NOT NULL default '0000-00-00 00:00:00',
  `statusped` varchar(50) default NULL,
  `login` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`codposstatus`)
) TYPE=MyISAM PACK_KEYS=1 AUTO_INCREMENT=1 ;

#
# Extraindo dados da tabela `os_status`
#


# --------------------------------------------------------

#
# Estrutura da tabela `os_tipo`
#

CREATE TABLE `os_tipo` (
  `codtipo_serv` bigint(21) NOT NULL auto_increment,
  `tipo` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`codtipo_serv`)
) TYPE=MyISAM AUTO_INCREMENT=7 ;

#
# Extraindo dados da tabela `os_tipo`
#

INSERT INTO `os_tipo` VALUES (1, 'AVULSA');
INSERT INTO `os_tipo` VALUES (2, 'GAR. IPASOFT');
INSERT INTO `os_tipo` VALUES (3, 'GAR. LG');
INSERT INTO `os_tipo` VALUES (4, 'GAR. BEMATECH');
INSERT INTO `os_tipo` VALUES (5, 'CONTRATO');
INSERT INTO `os_tipo` VALUES (6, 'CORTESIA');

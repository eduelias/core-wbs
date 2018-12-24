<?php

// brazilian

$language = new language;

$language->name = "Brazilian";
$language->author = "Cristiano de Oliveira";
$language->author_email = "cristiano@celtaware.com.br";
$language->author_web = "http://www.celtaware.com.br/";

$language->charset = "ISO-8859-1";

// uncomment this if you need to increase the font size from 10px
// $language->font_size = "10px;"; 

$language->about = array("tagline" => "mantenha seu trabalho organizado para ter sucesso."
                        ,"documentation" => "Documenta��o"
                        ,"read_me" => "Leia-me"
                        ,"license" => "Licen�a"
                        ,"download" => "download"
                        ,"this_version" => "Esta Vers�o: __0" // number
                        ,"latest_version" => "�ltima vers�o lan�ada: __0" // number
                        ,"beta_version" => "�ltima vers�o beta: __0" // number
                        ,"using_latest" => "Voc� est� utilizando a �ltima vers�o lan�ada."
                        ,"using_beta" => "Voc� est� utilizando a �ltima vers�o beta."
                        ,"feedback" => "Feedback and Sugest�es:"
                        ,"web" => "Web:"
                        ,"credits" => "Cr�ditos"
                        ,"main_credit" => "Tasks Jr. foi conceitualizado e criado por <nobr>Alex King</nobr>. Foi encontrado nestes idiomas pela colabora��o de parceiros:"
                        ,"web_site" => "web site"
                        ,"email" => "E-mail"
                        );

$language->accesskey = array("calendar" => "c"
                            ,"history" => "y"
                            ,"home" => "h"
                            ,"new_note" => "n"
                            ,"new_task" => "t"
                            ,"quick_search" => "q"
                            ,"remember_me" => "r"
                            ,"save" => "s"
                            ,"search" => "a"
                            ,"sortable" => "b"
                            ,"title" => "e"
                            ,"upcoming" => "u"
                            );

$language->admin = array("config" => "Configura��es do Servidor"
                        ,"form_title" => "Administra��o"
                        ,"groups" => "Grupos"
                        ,"manage_config" => "Gerenciar Configura��es do Servidor"
                        ,"manage_groups" => "Gerenciar Grupos"
                        ,"new_group" => "Novo Grupo"
                        ,"users" => "Usu�rios"
                        ,"manage_users" => "Gerenciar Usu�rios"
                        ,"new_user" => "Novo Usu�rio"
                        );

$language->breadcrumbs = array("admin" => "Admin"
                              ,"config" => "Configura��es do Servidor"
                              ,"group" => "Editar Grupo"
                              ,"groups" => "Gerenciar Grupos"
                              ,"history" => "Hist�rico"
                              ,"home" => "Home"
                              ,"new_group" => "Novo Grupo"
                              ,"new_task" => "Novo"
                              ,"new_user" => "Novo Usu�rio"
                              ,"preferences" => "Prefer�ncias"
                              ,"restricted" => "(restrito)"
                              ,"search" => "Procurar"
                              ,"search_results" => "Resultados da busca"
                              ,"sortable" => "Ordenar lista de tarefas"
                              ,"upcoming" => "Tarefas previstas"
                              ,"user" => "Editar Usu�rio"
                              ,"users" => "Gerenciar Usu�rios"
                              );

$language->config = array("check_for_updates" => "Verificar novas atualiza��es"
                         ,"cookie_domain" => "Dom�nio para ser utilizados nos cookies (ex: '.example.com' ou deixe em branco na d�vida):"
                         ,"cookie_path" => "Caminho utilizado em Cookies (i.e. '/tasks/' ou deixe em branco na d�vida):"
                         ,"email" => "Endere�o de e-mail utilizado para enviar mensagens para o administrador:"
                         ,"email_notifications" => "Habilitar notifica��es por e-mail"
                         ,"email_reminders" => "Habilitar lembretes di�rios por e-mail"
                         ,"form_title" => "Configura��es do Servidor"
                         ,"ical_enable" => "Habilitar PHP iCalendar"
                         ,"ical_URL" => "PHP iCalendar URL:"
                         ,"language" => "Idioma padr�o:"
                         ,"language_mobile" => "Idioma padr�o para acesso M�vel/PDA:"
                         ,"limit_user_groups" => "Usu�rios podem somente ver parte de grupos quando eles estejam criando ou editando uma tarefa/nota"
						 ,"tasks_URL" => "Tasks Pro&trade; URL (n�o inclua 'index.php'):"
                         ,"use_beta" => "Verificar lan�amento de vers�es beta"
                         );

$language->confirm = array("complete_instructions" => "A tarefa que voc� est� marcando como completa tem __0 sub-tarefas abertas. Por favor escolha como proceder:" // number
                          ,"complete_multiple_instructions" => "Uma ou mais tarefas que voc� selecionou para marcar como completada possui sub-tarefas(s). Por favor escolha como proceder:" // number
                          ,"complete_multiple_orphan" => "Marcar tarefa como completada e desvincular as sub-tarefas"
                          ,"complete_multiple_recursive" => "Marcar tarefas e sub-tarefas como completadas"
                          ,"complete_multiple_title" => "Tarefas completadas"
                          ,"complete_orphan" => "Marque esta tarefa como completada e desvincule as sub-tarefas"
                          ,"complete_notes" => "Entre com as notas de fechamento da tarefa:"
                          ,"complete_recursive" => "Marque esta tarefa e suas sub-tarefas como completadas"
                          ,"complete_remove" => "Marque esta tarefa como completada e vincule suas sub-tarefas na tarefa principal"
                          ,"complete_title" => "Op��es de Tarefas Completadas"
                          ,"delete_confirm" => "Voc� tem certeza que deseja apagar esta tarefa?"
                          ,"delete_instructions" => "A tarefa que voc� est� apagando tem __0 sub-tarefas abertas. Por favor escolha como proceder:" // number
                          ,"delete_multiple_instructions" => "Uma ou mais tarefas que voc� est� apagando possuem sub-tarefas. Por favor escolha como a exclus�o deve se comportar."
                          ,"delete_multiple_orphan" => "Apagar as tarefas selecionadas e desvincular as sub-tarefas"
                          ,"delete_multiple_recursive" => "Apagar as tarefas selecionadas e suas sub-tarefas"
                          ,"delete_multiple_title" => "Apagar Tarefas"
                          ,"delete_orphan" => "Apagar esta tarefa e desvincular as sub-tarefas"
                          ,"delete_recursive" => "Apagar esta tarefa e sub-tarefas"
                          ,"delete_remove" => "Apagar esta tarefa e vincular as sub-tarefas na tarefa principal"
                          ,"delete_title" => "Apagar Tarefa"
                          ,"delete_title_m" => "Apagar Tarefa"
                          ,"delete_user_instructions" => "Usu�rio '__0' possui __1 tarefas definidas para ele, Por favor escolha o usu�rio que voc� gostaria de designar estas tarefas." // name, number
                          ,"delete_user_tasks" => "Tarefas definidas para '__0'" // name
                          ,"delete_user_title" => "Apagar Usu�rio"
                          ,"new_owner" => "Novo respons�vel:"
                          );

$language->data = array("done" => "Feito"
                       ,"group_name_copy" => " Copia"
                       ,"no" => "N�o"
                       ,"priority_1" => "Mais baixo"
                       ,"priority_2" => "Baixo"
                       ,"priority_3" => "M�dio"
                       ,"priority_4" => "Alto"
                       ,"priority_5" => "Mais alto"
                       ,"private" => "Particular"
                       ,"rel_date" => "__0" // date
                       ,"rel_date_days" => "__0 Dias" // number
                       ,"rel_date_days_ago" => "__0 Dias atr�s" // number
                       ,"rel_date_today" => "Hoje"
                       ,"rel_date_tomorrow" => "Amanh�"
                       ,"rel_date_week" => "1 Semana"
                       ,"rel_date_week_ago" => "1 Semana atr�s"
                       ,"rel_date_yesterday" => "Ontem"
                       ,"shared" => "Compartilhado"
                       ,"username_copy" => "_copy"
                       ,"yes" => "Sim"
                       );

$language->email = array("go_to_prefs" => "Voc� pode alterar sua senha na tela de Prefer�ncias ap�s efetuar o logon para tarefas:"
                        ,"line_break" => "\n"
                        ,"new_login_info" => "Sua nova informa��o de login �:"
                        ,"password_reset" => "Por sua solicita��o, sua senha de tarefas foi reajustada."
                        ,"password" => "Senha:"
                        ,"salutation" => "Sauda��es __0,"
                        ,"signoff" => "Felicita��es."
                        ,"subject_password_reset" => "Nova senha de tarefas"
                        ,"subject_task_assigned" => "Tarefa '__0' (#__1) foi definida para voc�" // title, id
                        ,"subject_task_complete" => "Tarefa '__0' (#__1) foi completada" // title, id
                        ,"subject_task_updated" => "Tarefa '__0' (#__1) foi atualizada" // title, id
                        ,"task_assigned" => "Tarefa '__0' (#__1) foi definida para voc� por __2." // title, id, name
                        ,"task_complete_creator" => "Tarefa '__0' (#__1) criada por voc� foi completada por __2." // title, id, name
                        ,"task_complete_owner" => "Tarefa '__0' (#__1) definida para voc� foi completada por __2." // title, id, name
                        ,"task_updated" => "Tarefa '__0' (#__1) foi atualizada por __2." // title, id, name
                        ,"username" => "Usu�rio:"
                        );

$language->email_reminders = array("overdue" => "N�o cumprido"
                                  ,"due" => "Vencimento"
                                  ,"upcoming" => "Previs�o"
                                  ,"high_priority" => "Alta Prioridade"
                                  ,"status" => "Status"
                                  ,"complete" => "% Completado"
                                  ,"priority" => "Prioridade"
                                  ,"none" => "(nenhum)"
                                  ,"subject" => "Tasks Pro(tm) Lembrete: __0" // date
                                  );

$language->form = array("1_week" => "1 Semana"
                       ,"1_year" => "1 Ano"
                       ,"30_days" => "30 Dias"
                       ,"90_days" => "90 Dias"
                       ,"access" => "Acesso:"
                       ,"after_save" => "Ap�s salvar:"
                       ,"all_groups" => "Todos os grupos"
                       ,"choose_date" => "Escolher data"
                       ,"clear_date" => "Limpar"
                       ,"created_by" => "Criado por:"
                       ,"date_due" => "Data vencimento:"
                       ,"date_entered" => "Data entrada:"
                       ,"date_modified" => "�ltima altera��o:"
                       ,"form_title_edit" => "Editar"
                       ,"form_title_new" => "Nova"
                       ,"hide_groups" => "Fechar"
                       ,"groups" => "Grupos:"
                       ,"id" => "ID:"
                       ,"modified_by" => "�ltima altera��o por:"
                       ,"mono_font" => "Largura-fixa"
                       ,"my_groups" => "Meus Grupos"
                       ,"new_note" => "Nova nota"
                       ,"new_task" => "Nova Tarefa"
                       ,"no_groups" => "Sem Grupos"
                       ,"note" => "Nota"
                       ,"notes" => "Notas:"
                       ,"owner" => "Respons�vel:"
                       ,"parent" => "Principal:"
                       ,"priority" => "Prioridade:"
                       ,"private" => "Particular"
                       ,"return_home" => "Voltar ao in�cio"
                       ,"select_groups" => "Grupos selecionados:"
                       ,"snapback" => "Tela anterior"
                       ,"status" => "% Completado:"
                       ,"status_label" => "% Completado"
                       ,"stay_here" => "Ficar Aqui"
                       ,"sticky" => "Tarefa Fixa"
                       ,"sticky_label" => "Tarefa Fixa:"
                       ,"task" => "Tarefa"
                       ,"title" => "T�tul<u>o</u>:"
                       ,"today" => "Hoje"
                       ,"tomorrow" => "Amanh�"
                       ,"type" => "Tipo:"
                       ,"url" => "URL:"
                       ,"urls" => "URLs:"
                       ,"url_1" => "URL 1:"
                       ,"url_2" => "URL 2:"
                       ,"url_3" => "URL 3:"
                       ,"view_parent" => "Visualizar tarefa principal"
                       ,"view_tree" => "Visualizar �rvore "
                       );

$language->group = array("add_user" => "Adicionar usu�rio"
                        ,"description" => "Descri��o:"
                        ,"form_title" => "Editar Grupo"
                        ,"name" => "Nome:"
                        ,"users" => "Usu�rios Selecionados"
                        ,"users_add" => "Usu�rios Dispon�veis"
                        );


$language->groups = array("form_title" => "Gerenciar Grupos"
                         ,"new_group" => "Novo Grupo"
                         );

$language->home = array();

$language->icons = array("completed" => "Tarefa Completada"
                        ,"delete" => "Apagar"
                        ,"duplicate" => "Duplicar"
                        ,"edit" => "Editar"
                        ,"forms_hide_show" => "Esconder/Mostrar Sub-Tarefas/Notas"
                        ,"forms_hide_show_tip" => "Esconder ou mostrar mais informa��es das sub-tarefas/notas"
                        ,"hide_show" => "Esconder/Mostrar"
                        ,"hide_show_tip" => "Esconder ou mostrar mais informa��es desta tarefa/nota"
                        ,"ical" => "iCalendar"
                        ,"ical_group_tip" => "iCalendar deste grupo de tarefas"
                        ,"ical_user_tip" => "iCalendar das tarefas deste usu�rio"
                        ,"mark_complete" => "Marcar como completada"
                        ,"new_sub_task" => "Nova Sub-Tarefa"
                        ,"new_sub_note" => "Nova Sub-Nota"
                        ,"note" => "Nota"
                        ,"notes_bigger" => "Expandir visualiza��o de notas"
                        ,"notes_smaller" => "Reduzir visualiza��o de notas"
                        ,"parent_picker" => "Escolher a tarefa/nota principal"
                        ,"phpical" => "Abrir no PHP iCalendar"
                        ,"phpical_group_tip" => "Veja um iCalendar deste grupo de tarefas em PHP iCalendar"
                        ,"phpical_user_tip" => "Veja um iCalendar das tarefas deste usu�rio em PHP iCalendar"
                        ,"priority" => "Prioridade: __0" // result of get_friendly_priority();
                        ,"private" => "Particular"
                        ,"private_tip" => "Esta tarefa � particular"
                        ,"remove" => "Remover"
                        ,"required" => "Requerido"
                        ,"required_tip" => "Este campo deve ser preenchido"
                        ,"rss" => "RSS"
                        ,"rss_group_tip" => "RSS fonte deste grupo de tarefas."
                        ,"rss_user_tip" => "RSS fonte das tarefas deste usu�rio."
                        ,"sticky" => "Tarefa Fixa"
                        ,"task" => "Tarefa"
                        ,"tree_toggle" => "Esconder/Mostrar"
                        ,"tree_toggle_tip" => "Esconder ou mostrar as sub-tarefas/notas desta tarefa"
                        ,"under_task_picker" => "Escolha uma tarefa que ser� o ponto de partida para a procura"
                        ,"visit_url" => "V� para esta URL"
                        ,"visit_url_tip" => "V� para esta URL em uma nova janela"
                        );

$language->install = array("access_explanation" => "Se voc� definir suas tarefas como 'Particulares', somente voc� poder� ve-las. Se voc� definir como 'Compartilhadas' elas ser�o vis�veis por voc� e por outras pessoas dos seus grupos. Voc� poder� alterar isto h� qualquer hora."
                          ,"create_tables" => "Criar Tabelas de Banco de Dados"
                          ,"create_tables_text" => "Criando tabelas de banco de dados..."
                          ,"choose" => "Instalar ou Atualizar?"
                          ,"choose_install" => "Instalar Tasks Pro&trade; pela primeira vez."
                          ,"choose_text" => "Voc� est� instalando o Tasks Pro&trade; pela primeira vez ou est� atualizando o tasks 1.x?."
                          ,"choose_upgrade" => "Atualizar a vers�o do tasks 1.x."
                          ,"database_connection" => "N�o conectou ao banco de dados"
                          ,"database_connection_text" => "<strong>Erro:</strong> N�o conectou ao banco de dados '__0' em '__1'." // database name, username
                          ,"database_correct_settings" => "Por favor corrija sua configura��o no 'database.inc.php' ent�o <a href=\"../index.php\">tente novamente</a>."
                          ,"db_name" => "Nome do Banco de Dados:"
                          ,"db_password" => "Senha:"
                          ,"db_settings" => "Sua configura��o atual:"
                          ,"db_username" => "Usu�rio:"
                          ,"done" => "Terminado!"
                          ,"done_text" => "Certo, agora tudo deve estar pronto! Entre na p�gina de <a href=\"../login.php\">login</a> e comece a utilizar o sistema."
                          ,"done_text_review" => "Voc� deve revisar sua configura��o do servidor (clique em 'Admin') e prefer�ncias (clique em 'Prefer�ncias') quando estiver logado."
                          ,"err_config_not_saved" => "N�o foi poss�vel salvar as informa��es de configura��o do servidor. Isto pode ser porque j� foi salvo ao banco de dados."
                          ,"err_creating_tables" => "Nenhuma tabela foi criada, por favor verifique suas configura��es de banco de dados e permiss�o de usu�rio, depois tente novamente."
                          ,"err_no_table_to_upgrade" => "A tabela '__0' especificada como tabela de tarefas em database.inc.php n�o existe no banco de dados '__1'. Por Favor verifique o nome da tabela." // table name, database name
                          ,"err_restart" => "Op�, ocorreu um erro."
                          ,"err_restart_text" => "Um erro ocorreu durante o �ltimo passo. Voc� provavelmente dever� apagar as tabelas criadas anteriormente utilizando o <a href=\"http://phpmyadmin.sourceforge.net\">PHPMyAdmin</a> ou ferramenta MySQL similar e <a href=\"index.php\">recomece</a>."
                          ,"err_select_database" => "Banco de Dados n�o selecionado"
                          ,"err_select_database_text" => "Foi poss�vel conectar ao servidor, mas n�o foi poss�vel conectar ao banco de dados '__0'."
                          ,"err_tables_dont_exist" => "<strong>Erro:</strong> a tabela de dados especificada no 'database.inc.php' n�o existe no banco de dados '__0'." // database name
                          ,"err_try_again" => "Uma vez voc� tenha definido o assunto de configura��o, voc� deve <a href=\"index.php\">tentar novamente</a>."
                          ,"err_user_not_saved" => "A informa��o sobre o usu�rio n�o pode ser salva. Isto pode ocorrer porque o usu�rio j� existe no banco de dados."
                          ,"err_users_exist" => "Os usu�rios j� existem no sistema."
                          ,"go_to_install" => "Se ainda n�o instalou o Tasks Pro&trade;, <a href=\"index.php\">execute o instalador agora</a>."
                          ,"intro_text" => "Bem-vindo ao <strong>tasks</strong>. As pr�ximas telas o ajudar�o a configurar tudo."
                          ,"introduction" => "Introdu��o"
                          ,"name" => "Seu Nome:"
                          ,"next" => "Pr�ximo"
                          ,"not_displayed" => "(N�o exibido, configure no 'database.inc.php')"
                          ,"password" => "Senha:"
                          ,"password_confirm" => "Entre com a senha novamente:"
                          ,"preferences" => "Definir a Senha Admin"
                          ,"preferences_text" => "Informe o nome e a senha para usar no usu�rio administrador criado para voc�."
                          ,"press_next" => "Pressione 'Pr�ximo' para continuar..."
                          ,"private" => "Particular"
                          ,"select_language" => "Por favor escolha o idioma que voc� deseja utilizar."
                          ,"server_settings" => "Verificar as Configura��es B�sicas do Servidor"
                          ,"server_settings_text" => "Para prosseguir defina os valores iniciais de configura��o do servidor."
						  ,"set_db_settings" => "Configura��es do banco de Dados"
                          ,"set_db_settings_text" => "Tenha certeza que suas configura��es de Tabelas est�o corretas em 'database.inc.php' e o banco de dados j� est� criado. <strong>Este n�o cria o banco de dados para voc�</strong>."
                          ,"shared" => "Compartilhar"
                          ,"table_created" => "Tabela '__0' foi criada." // table name
                          ,"table_exists" => "<strong>Aviso:</strong> tabela '__0' j� existe." // table name
                          ,"table_not_created" => "<strong>Erro:</strong> tabela '__0' n�o foi criada." // table name
                          ,"table_upgraded" => "Tabela '__0' foi alterada." // table name
                          ,"tasks_URL" => "Entre com a URL onde o tasks foi instalado (inclua as barras de diret�rio - n�s mostramos uma sugest�o):"
                          ,"title" => "Tasks Pro&trade;: Configurar"
                          ,"upgrade_1.x" => "Atualizar tasks 1.x"
                          ,"upgrade_1.x_text" => "Antes que voc� fa�a qualquer coisa, <strong>SALVE SEUS DADOS!</strong> Nenhuma atualiza��o � simples, se voc� n�o tem conhecimento para salvar os dados atuais, <em>n�o continue</em>. Pe�a para algu�m ajudar, procure um tutorial on-line, para obter ajuda. Se algo de errado acontecer na vers�o atualizada e voc� n�o tiver auxilio de  algu�m experiente, seus dados podem ser perdidos ou danificados."
                          ,"upgrade_complete" => "Atualiza��o completada"
                          ,"upgrade_complete_text" => "Seus dados de tarefas foram atualizados com sucesso."
                          ,"upgrade_task_access" => "Voc� quer atualizar suas tarefas como Compartilhadas ou Particulares?"
                          ,"username" => "Usu�rio:"
                          ,"verify_db_settings" => "Verificar Configura��es do Banco de Dados"
                          ,"verify_db_settings_text" => "Conectamos com sucesso ao banco de dados utilizando o usu�rio e senha definidos em 'database.inc.php', agora precisamos criar as tabelas de dados. Tenha certeza que todas as informa��es est�o corretas, ent�o clique em 'Pr�ximo' para criar as tabelas. Se voc� precisa mudar alguma informa��o apresentada, edite o arquivo 'database.inc.php' e fa�a a corre��o apropriada."
                          );

$language->list = array("add_notes" => "Adicionar Notas:" // number
                       ,"banner" => "Mostrando __0 Itens" // number
                       ,"date_due" => "Data Vencimento"
                       ,"description" => "Descri��o"
                       ,"done" => "(nenhum)"
                       ,"email" => "E-mail"
                       ,"icalendar" => "iCalendar"
                       ,"id" => "ID"
                       ,"modify_title" => "Modificar Tarefas Selecionadas"
                       ,"name" => "Nome"
                       ,"none" => "(nenhum)"
                       ,"no_items" => "Sem itens para mostrar."
                       ,"owner" => "Respons�vel"
                       ,"phone" => "Telefone"
                       ,"priority" => "Prioridade"
                       ,"rss_feed" => "RSS Fonte"
                       ,"selected_tasks" => "Tarefas Selecionadas:"
                       ,"status" => "% Completado"
                       ,"title" => "T�tulo"
                       ,"username" => "Usu�rio"
                       ,"users" => "Usu�rios"
                       ,"web" => "Web"
                       );

$language->list_titles = array("groups" => "Grupos"
                              ,"history" => "�ltimas 25 Tarefas Alteradas"
                              ,"overdue" => "Tarefas n�o cumpridas"
                              ,"sortable" => "Lista de Tarefas ordenadas"
                              ,"upcoming" => "Tarefas Previstas"
                              ,"users" => "Usu�rios"
                              );

$language->log_in = array("back_to_login" => "Voltar para o formul�rio de Login"
                         ,"email" => "Endere�o de E-mail:"
                         ,"err_no_email" => "Desculpe, n�o foi poss�vel identificar o usu�rio com este endere�o de e-mail: __0" // email address
                         ,"err_no_email_for_user" => "Desculpe, n�o existe endere�o de e-mail no registro para '__0'. Por favor entre em contato com seu administrador de sistema e pe�a para reconfigurar sua senha." // username
                         ,"err_no_username" => "Desculpe, n�o foi poss�vel localizar o usu�rio: __0" // username
                         ,"forgot_password_instructions" => "Entre com o usu�rio e/ou endere�o de e-mail, ent�o pressione o bot�o &quot;Senha por E-Mail&quot;. Ser� gerada uma nova senha e enviada para voc� no seu e-mail."
                         ,"forgot_password" => "Esqueceu sua Senha?"
                         ,"log_in" => "Entrar"
                         ,"log_in_failed" => "Desculpe, o usu�rio ou a senha informada n�o est� correta. Por favor verifique se a tecla Caps Lock est� ligada e tente novamente."
                         ,"mail_password" => "Senha por E-Mail"
                         ,"password_mailed" => "A nova senha foi enviada por e-mail para voc� em: __0" // email address
                         ,"password" => "Senha:"
                         ,"remember_me" => "<u>L</u>embre-me" // letter inside <u> tags should match "remember_me" value in accesskey
                         ,"username" => "Usu�rio:"
                         );

$language->menu = array("admin" => "Admin"
                       ,"admin_tip" => "Clique aqui para efetuar tarefas administrativas para o sistema."
                       ,"calendar" => "<u>C</u>alend�rio"
                       ,"calendar_tip" => "Clique aqui para visualizar o calend�rio de suas tarefas."
                       ,"history" => "Hist�r<u>i</u>co"
                       ,"history_tip" => "Clique aqui para visualizar as �ltimas 25 tarefas alteradas."
                       ,"home" => "<u>H</u>ome"
                       ,"home_tip" => "Clique aqui para ir para tela inicial e visualizar todas as tarefas principais."
                       ,"log_out" => "Sair"
                       ,"log_out_tip" => "Clique aqui para efetuar o logoff."
                       ,"new_note" => "Nova <u>N</u>ota"
                       ,"new_note_tip" => "Clique aqui para criar uma nova nota."
                       ,"new_task" => "Nova <u>T</u>arefa"
                       ,"new_task_tip" => "Clique aqui para criar uma nova tarefa."
                       ,"preferences" => "Prefer�ncias"
                       ,"preferences_tip" => "Clique aqui para ver e alterar suas prefer�ncias pessoais."
                       ,"search" => "Procur<u>a</u>r"
                       ,"search_tip" => "Clique aqui para localizar uma tarefa."
                       ,"sortable" => "Or<u>d</u>enar"
                       ,"sortable_tip" => "Clique aqui para visualizar a lista de tarefas ordenada."
                       ,"upcoming" => "<u>P</u>end�ncias"
                       ,"upcoming_tip" => "Clique aqui para visualizar todas as tarefas pendentes e atrasadas."
                       );

$language->messages = array("completed" => "Tarefa &quot;__0&quot; (#__1) est� marcada como completada." // title, id
                           ,"completed_reason" => 'Tarefa &quot;__0&quot; (#__1) est� marcada como completada com o motivo:<p class="complete_reason">&rarr; __2</p>' // title, id, reason
                           ,"completed_tasks_reason" => 'The selected tasks have been marked complete with reason:<p class="complete_reason">&rarr; __0</p>' // reason
                           ,"completed_w_reason" => 'Fechada por __0 com o motivo: __1' // name, reason
                           ,"completed_task_link" => "Visualizar Tarefa completada"
                           ,"completed_task_parent_link" => "Visualizar Tarefas Principais Completadas"
                           ,"complete_instructions" => "Tarefa #__0 tem __1 Sub-Tarefa(s) (__2) Aberta(s), por favor escolha como proceder." // id, number, number
                           ,"complete_orphan" => "Tarefa &quot;__0&quot; (#__1) est� marcada como completada e todas as sub-tarefas foram desvinculadas da tarefa principal." // title, id
                           ,"complete_recursive" => "Tarefa &quot;__0&quot; (#__1) e todas as sub-tarefas foram marcadas como completadas." // title, id
                           ,"complete_remove" => "Tarefa &quot;__0&quot; (#__1) foi marcada como completada e todas as sub-tarefas foram vinculadas a tarefa #__2." // title, id, new parent task id
                           ,"config_saved" => "Sua configura��o de servidor ou salva com sucesso."
                           ,"confirm_delete" => "Apagar tarefa: __0?" // title
                           ,"confirm_delete_group" => "Apagar grupo: __0?" // name
                           ,"confirm_delete_note" => "Apagar nota: __0?" // title
                           ,"confirm_delete_user" => "Apagar usu�rio: __0?" // name
                           ,"confirm_remove_user" => "Remover __0 deste grupo?" // name
                           ,"confirm_remove_user_generic" => "Remover usu�rio deste grupo?"
                           ,"deleted" => "Tarefa &quot;__0&quot; (#__1) apagada com sucesso." // title, id
                           ,"delete_instructions" => "Tarefa #__0 tem __1 Sub-Tarefa(s) (__2) Aberta(s), por favor escolha como proceder." // id, number, number
                           ,"deleted_multiple_orphan" => "As tarefas selecionadas foram apagadas e todas as sub-tarefas foram desvinculadas."
                           ,"deleted_multiple_recursive" => "As tarefas selecionadas e todas as sub-tarefas vinculadas foram apagadas."                           
                           ,"deleted_orphan" => "Tarefa &quot;__0&quot; (#__1) foi apagada e todas as sub-tarefas foram desvinculadas." // title, id
                           ,"deleted_recursive" => "Tarefa &quot;__0&quot; (#__1) e todas as sub-tarefas vinculadas foram apagadas." // title, id
                           ,"deleted_remove" => "Tarefa &quot;__0&quot; (#__1) foi apagada e todas as sub-tarefas foram vinculadas a tarefa #__2" // title, id, new parent id
                           ,"err_config_not_saved" => "Sua configura��o do servidor n�o foi salva."
                           ,"err_conflict" => "Esta tarefa n�o foi salva.<br />: Esta tarefa foi atualizada por outro usu�rio desde que voc� come�ou a editar. Por favor revise as diferen�as listadas e salve novamente. <p>A vers�o desta tarefa que voc� alterou foi salva por �ltimo em  __0;<br />a vers�o atual foi salva no banco de dados como __1"
                           ,"err_date_format" => "Existe um erro no <b>\$custom->date_format</b> em 'config.php'. Seu valor: '__0' n�o cont�m um ou mais 'm', 'd', 'y'. Por favor corrija isto no 'config.php'." // date_format
                           ,"err_event_type" => "Existe um erro no <b>\$custom->ical_export_type</b> em 'config.php'. Seu valor: '__0' n�o � 'event' ou 'todo'. Por favor corrija isto no 'config.php'." // ical_export_type
                           ,"err_group_not_deleted" => "O grupo n�o foi apagado."
                           ,"err_group_not_saved" => "Os dados do grupo n�o foram salvos."
                           ,"err_invalid_date" => "Esta tarefa n�o foi salva porque a data informada n�o � v�lida. Corrija ou limpe a data de vencimento e salve a tarefa novamente."
                           ,"err_invalid_modify_date" => "As altera��es solicitadas n�o foram feitas porque a data est� inv�lida. Corrija ou limpe a data do vencimento e salve novamente."
                           ,"err_invalid_parent" => "Tarefa #__0 foi especificada como uma sub-tarefa, mas n�o existe tarefa com o c�digo informado. Por favor corrija o c�digo da tarefa e salve novamente." // id
                           ,"err_loop" => "Salvando esta tarefa com a sub-tarefa especificada iria criar um loop infinito podendo at� travar a opera��o."
                           ,"err_no_root" => "Nenhuma raiz definida."
                           ,"err_own_parent" => "Uma tarefa n�o pode ser o seu pr�prio pai."
                           ,"err_owner_changed_no_access" => "O respons�vel desta tarefa mudou entre o tempo que voc� utilizou para editar e salvar. Voc� j� n�o tem permiss�o para editar esta tarefa."
                           ,"err_prefs_not_saved" => "Suas prefer�ncias n�o foram salvas."
                           ,"err_search_date_after" => "Esta procura n�o achar� nenhuma tarefa porque o valor especificado em 'Data Vencimento est� depois:' n�o � v�lido. Corrija ou limpe a data de vencimento e tente procurar novamente.."
                           ,"err_search_date_before" => "Esta procura n�o achar� nenhuma tarefa porque o valor especificado em 'Data Vencimento est� antes:' n�o � v�lido. Corrija ou limpe a data de vencimento e tente procurar novamente.."
                           ,"err_search_date_exact" => "Esta procura n�o achar� nenhuma tarefa porque o valor especificado em 'Data Vencimento � exatamente:' n�o � v�lido. Corrija ou limpe a data de vencimento e tente procurar novamente.."
                           ,"err_task_groups_not_modified" => "O grupo de permiss�es para as tarefas selecionadas n�o pode ser alterado. Por favor tente novamente."
                           ,"err_task_not_deleted" => "A tarefa selecionada n�o foi apagada."
                           ,"err_task_status_not_changed" => "O '% Completado' n�o foi modificado em __0 das tarefas selecionadas porque o status � calculando pelas sub-tarefas associadas." // number
                           ,"err_tasks_not_comleted" => "__0 das tarefas selecionadas n�o estavam marcadas como completadas." // number
                           ,"err_tasks_not_deleted" => "__0 das tarefas selecionadas n�o foram deletadas." // number
                           ,"err_tasks_not_modified" => "As tarefas selecionadas n�e puderam ser alteradas. Por favor tente novamente."
                           ,"err_tasks_not_reassigned" => "as tarefas n�o puderam ser redefinidas. Por favor tente novamente."
                           ,"err_unauthorized_task_in_list" => "tarefa #__0 foi inclu�da na lista mas voc� n�o est� autorizado para acessar esta tarefa." // id
                           ,"err_user_limit" => ' Voc� tem mais usu�rios que sua licen�a permite e est� usando este software ilegalmente. Por favor <a href="http://www.taskspro.com/buy/">atualize sua licen�a</a>.'
						   ,"err_user_not_added_to_group" => "O usu�rio selecionado n�o foi adicionado ao grupo."
                           ,"err_user_not_authorized" => "Voc� n�o est� autorizado para executar esta a��o."
                           ,"err_user_not_authorized_for_screen" => "Voc� n�o est� autorizado para acessar esta tela."
                           ,"err_user_not_authorized_for_task" => "Voc� n�o est� autorizado para acessar esta tarefa."
                           ,"err_user_not_deleted" => "O usu�rio n�o foi apagado."
                           ,"err_user_not_removed_from_group" => "O usu�rio selecionado n�o foi removido do grupo."
                           ,"err_user_not_saved" => "Os dados do usu�rio n�o foram salvos."
                           ,"err_username_exists" => "J� existe um usu�rio com o nome '__0'." // username
                           ,"group_deleted" => "O grupo '__0' foi apagado." // name
                           ,"group_saved" => "Os dados do grupo foram salvos."
                           ,"js_abandon_changes" => "Sair sem salvar suas altera��es?"
                           ,"js_complete_confirm" => "Voc� tem certeza de fechar\\nesta tarefa sem informar a\\nnota de fechamento?"
                           ,"js_complete_prompt" => "Entre com as notas de fechamento para esta tarefa:"
                           ,"js_complete_tasks_prompt" => "Entre com as notas de fechamento para estas tarefas:"
                           ,"js_complete_tasks_confirm" => "Voc� tem certeza de fechar\\nestas tarefas sem informar as\\nnotas de fechamento?"
                           ,"js_delete_tasks_confirm" => "Voc� tem certeza de apagar estas tarefas?"
                           ,"js_err_edit_date" => "O valor atual no campo data de vencimento n�o � de uma data v�lida.\\nModifique ou limpe este valor depois salve."
                           ,"js_err_group_errors" => "Advert�ncia - Os seguintes problemas precisam ser resolvidos\\nantes deste grupo poder ser salvo: \\n"
                           ,"js_err_group_name_required" => "O campo 'Nome' n�o pode ficar em branco."
                           ,"js_err_invalid_modify_date" => "Advert�ncia - a data de vencimento especificada n�o � uma data v�lida.\\nVoc� precisa corrigir isto antes de poder salvar."
                           ,"js_err_no_modifications" => "Advert�ncia - Nenhuma altera��o foi feita.\\nFa�a altera��es nos campos abaixo antes de salvar."
                           ,"js_err_no_selected_tasks" => "Voc� precisa selecionar um ou mais tarefas para que possa editar."
                           ,"js_err_prefs_date_format" => "O Formato da Data, 'Date Format', deve conter 'd', 'm' e 'y'."
                           ,"js_err_prefs_errors" => "Advert�ncia - O seguinte problema precisa ser resolvido\\nantes de voc� salvar suas prefer�ncias: \\n"
                           ,"js_err_prefs_ical_days_after" => "O campo Dias Futuros, 'Future Days', deve ser um n�mero."
                           ,"js_err_prefs_ical_days_before" => "o campo Dias Passados, 'Previous Days', deve ser um n�mero."
                           ,"js_err_prefs_new_password" => "Voc� precisa entrar com uma senha para este novo usu�rio nos dois campos de senha."
                           ,"js_err_prefs_password" => "O valor nos dois campos de 'Senha' devem ser iguais."
                           ,"js_err_prefs_server_time_difference" => "O valor no campo 'Server Time Difference' deve ser um n�mero entre -23 e 23."
                           ,"js_err_prefs_upcoming_days" => "O valor no campo Dias Previstos, 'Upcoming Days', deve ser um n�mero maior do que zero 0."
                           ,"js_err_search_date_after" => "O valor atual do campo 'Data Prevista est� ap�s:' n�o � uma data v�lida."
                           ,"js_err_search_date_before" => "O valor atual do campo 'Data Prevista est� antes:' n�o � uma data v�lida."
                           ,"js_err_search_date_exact" => "O valor atual do campo 'Data Prevista � exatamente:' n�o � uma data v�lida."
                           ,"js_err_search_date_range" => "A data em 'Data Prevista est� ap�s:' deve ser antes da data de 'Data Prevista est� depois:' Por favor corrija."
                           ,"js_err_search_errors" => "Advert�ncia - Os seguintes problemas precisam ser corrigidos\\nantes de sua procura possa devolver qualquer resultado: \\n"
                           ,"js_err_search_id_invalid" => "O campo 'ID' deve estar vazio ou ter um valor num�rico maior que 0."
                           ,"js_err_search_parent_invalid" => "O campo Pai, 'Parent', deve estar vazio ou ter um valor num�rico maior que 0."
                           ,"js_err_search_status_exact" => "O campo 'Status � exatamente:' deve ter um valor num�rico entre 0 e 100."
                           ,"js_err_search_status_less" => "O campo 'Status � menos que:' tem que estar vazio ou com um valor num�rico entre 0 e 100."
                           ,"js_err_search_status_more" => "O campo 'Status � mais que:' tem que estar vazio ou com um valor num�rico entre 0 e 100."
                           ,"js_err_search_status_range" => "O campo 'Status � menos que:' deve ser maior que o campo 'Status � mais que:'."
                           ,"js_err_user_errors" => "Advert�ncia - Os seguintes problemas precisam ser resolvidos\\nantes deste usu�rio ser salvo: \\n"
                           ,"js_err_user_name_required" => "O campo 'Nome' n�o pode ficar em branco."
                           ,"js_err_user_username_required" => "O campo 'Usu�rio' n�o pode ficar em branco."
                           ,"js_loading_text" => "Carregando..."
                           ,"js_no_selected_groups" => "Nenhum grupo foi selecionado para esta tarefa/nota,\\nmas voc� n�o marcou isto como privado.\\n\\nSe voc� salvar a tarefa sem grupos,\\nsomente voc� poder� visualiz�-la.\\n\\nPressione OK para salvar a tarefa/nota sem grupos\\n ou Cancelar para voltar e adicionar grupos."
                           ,"js_nothing_to_save" => "Desculpe, n�o h� nada para salvar nesta tela."
                           ,"js_parent_required" => "Voc� precisa especificar um pai para esta tarefa para\\nver as sub-tarefa ap�s salvar."
                           ,"mail_sent" => "Lembretes Di�rios enviados por e-mail."
                           ,"mobile_resolve_instructions" => "Os dados ue voc� entrou ser�o mostrados na vers�o anterior no banco de dados. Fa�a as mudan�as que voc� precisa, ent�o clique em 'Salvar'."
                           ,"no_email" => "Por favor adicione seu endere�o de email no config.php."
                           ,"no_tasks" => "Nenhuma tarefa para mostrar."
                           ,"orphaned_when_parent_task_closed" => "Esta tarefa/nota foi alterada para n�o possuir tarefa-pai porque outro usu�rio fechou a tarefa principal, mas n�o foi permitido fechar esta tarefa."
                           ,"parent_changed" => "Tarefa principal alterada de #__0 para #__1." // old parent id, new parent id
                           ,"prefs_saved" => "Suas prefer�ncias foram salvas."
                           ,"saved" => "Tarefa salva #__0 (__1) at� __2." // id, title, timestamp
                           ,"tasks_deleted" => "As tarefas selecionadas foram apagadas."
                           ,"tasks_modified" => "As tarefas selecionadas foram modificadas."
                           ,"tasks_reassigned" => "As tarefas foram redefinidas com sucesso."
                           ,"task_reassigned_user_deleted" => "Esta tarefa foi redefinida quando o respons�vel foi removido do sistema."
                           ,"title" => "Mensagens"
                           ,"type_error" => "Erro:"
                           ,"type_info" => "Info:"
                           ,"type_warning" => "Advert�ncia:"
                           ,"user_password_changed" => "A senha do usu�rio foi alterada."
                           ,"user_deleted" => "O usu�rio '__0' foi deletado." // username
                           ,"user_limit" => "Sua licen�a lhe permite adicionar mais __0 usu�rios." // number
						   ,"user_saved" => "Os dados do usu�rio foram salvos."
                           ,"username_no_spaces" => "O nome do usu�rio n�o pode conter espa�os. Os espa�os no nome do usu�rio ser�o substituidos por '_'."
						   ,"warn_config_version" => 'Suas configura��es do servidor foram salvas com uma vers�o diferente do Tasks Pro&trade;. Por favor v� at� <a href="index.php?screen=config">Configura��es do Servidor</a>, verifique suas configura��es e pressione Salvar.'
                           ,"warn_deleted" => "Esta tarefa j� foi deletada."
                           ,"warn_list_over_100" => "Esta tela est� limitada para mostrar 100 tarefas e notas."
                           ,"warn_pref_version" => 'Suas Prefer�ncias foram salvas com uma vers�o diferente do Tasks Pro&trade;. Por favor v� at� <a href="index.php?screen=preferences">Prefer�ncias</a>, verifique suas configura��es e pressione Salvar.'
                           ,"warn_search_results_over_100" => "Esta procura devolveu mais de 100 resultados, somente as primeiras 100 ser�o mostradas aqui."
                           ,"warn_user_limit" => 'Voc� tem o n�mero de m�ximo de usu�rios que sua licen�a permite, voc� precisar� apagar um usu�rio existente ou <a href="http://www.taskspro.com/buy/">atualizar sua licen�a</a> para criar um novo usu�rio.'
						   ,"your_password_changed" => "Sua senha foi alterada."
                           );

$language->misc = array("about_tasks" => "Sobre __0" // "Tasks Pro(tm)"
                       ,"all_rights_reserved" => "Todos os direitos reservados."
                       ,"all_users_and_groups" => "Todos os Usu�rios &amp; Grupos"
                       ,"back_to_top" => "Voltar para o topo"
					   ,"completed_tasks" => "Tarefas Completadas:"
                       ,"copyright" => "Copyright"
                       ,"count_open" => "__0 Tarefas Abertas" // number
                       ,"count_open_one" => "1 Tarefa Aberta"
                       ,"count_overdue" => "__0 Atrasadas" // number
                       ,"count_upcoming" => "__0 Previstas" // number
                       ,"due" => "DEVIDA:"
                       ,"go" => "V�"
                       ,"hide_completed" => "Esconder"
                       ,"hide_completed_tasks" => "Esconder tarefas completadas"
                       ,"ical_title" => "Tarefas para __0" // name
                       ,"jump_to" => "Ir para..."
                       ,"none" => "(nenhum)"
                       ,"overdue" => "VENCIDA:"
                       ,"quick_search" => "Procura r�pida"
                       ,"rss_title" => "Tarefas para __0" // name
                       ,"show_completed" => "Mostrar"
                       ,"show_completed_tasks" => "Mostrar tarefas completadas"
                       ,"sort_by" => "Ordenar por:"
                       ,"sort_date_due" => "Data Vencimento"
                       ,"sort_date_due_rev" => "Data Vencimento (reversa)"
                       ,"sort_order" => "Ordenar tarefas por:"
                       ,"sort_date_due" => "Data Vencimento"
                       ,"sort_date_due_rev" => "Data Vencimento (reverso)"
                       ,"sort_magic" => "&quot;Magic&quot; Ordem de tipo"
                       ,"sort_priority" => "Prioridade"
                       ,"sort_priority_rev" => "Prioridade (reverso)"
                       ,"sort_status" => "% Completado"
                       ,"sort_status_rev" => "% Completado (reverso)"
                       ,"sort_title" => "T�tulo"
                       ,"sort_title_rev" => "T�tulo (reverso)"
                       ,"timer" => "p�gina criada em __0 segundos." // seconds
                       ,"user" => "Usu�rio: __0" // name
                       ,"version" => "vers�o __0" // number
                       );

$language->picker = array("date_go" => "V�"
                         ,"date_key_selected" => "Data atualmente selecionada"
                         ,"date_key_today" => "A data de hoje"
                         ,"date_next" => "Pr�xima"
                         ,"date_previous" => "Anterior"
                         ,"date_today" => "Hoje"
                         ,"days" => "'Dom','Seg','Ter','Qua','Qui','Sex','Sab'"
                         ,"months" => "'Janeiro','Fevereiro','Mar�o','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'"
                         ,"parent_title" => "Escolha uma tarefa principal"
                         );

$language->preferences = array("form_title" => "Prefer�ncias"
                              );

$language->resolve = array("append" => "Juntar"
                          ,"current_version" => "Vers�o Atual"
                          ,"form_title" => "Os seguintes campos t�m diferen�as"
                          ,"none" => "(nenhum)"
                          ,"save" => "Salvar"
                          ,"use" => "Usar"
                          ,"your_data" => "Seus dados"
                          );

$language->search = array("after" => "est� depois:"
                         ,"before" => "est� antes:"
                         ,"exactly" => "� exatamente:"
                         ,"fewer_options" => "Menos Op��es de Procura"
                         ,"form_title" => "Crit�rios de procura"
                         ,"include_completed" => "Incluir Tarefas Completadas"
                         ,"instructions" => "Entre com palavras ou partes de palavras que aparecem no t�tulo e/ou notas das tarefas que voc� quer localizar. Por padr�o, a procura acha s� registros que contenham todas as condi��es de procura que voc� informou. Clique em &quot;Mais op��es de procura&quot; para ver crit�rios de consulta adicionais."
                         ,"less_than" => "� menos que:"
                         ,"more_options" => "Mais Op��es de Consulta"
                         ,"more_than" => "� mais que:"
                         ,"note" => "Nota"
                         ,"results_title" => "Resultados da Procura"
                         ,"search_button" => "Procurar"
                         ,"task" => "Tarefa"
                         ,"type" => "Tipo:"
                         ,"under_task" => "Sob a Tarefa:"
                         );

$language->toolbar = array("add_user" => "Adicionar um usu�rio"
                          ,"b2_tip" => "Postar para b2"
                          ,"convert_to_note" => "Converter para Nota"
                          ,"convert_to_task" => "Converter para Tarefa"
                          ,"date_time" => "Inserir Data/Hora"
                          ,"date_time_tip" => "Inserir data/hora atual no campo Notas"
                          ,"delete" => "Deletar"
                          ,"delete_multiple_tip" => "Deletar itens selecionados"
                          ,"duplicate" => "Duplicar"
                          ,"edit" => "Editar"
                          ,"edit_multiple_tip" => "Editar itens selecionados"
                          ,"mark_complete" => "Marcar como Completada"
                          ,"mark_complete_m" => "100%"
                          ,"mark_complete_multiple_tip" => "Marcar tarefas como completadas"
                          ,"mt_tip" => "Postar para Tipo m�vel"
                          ,"new_sub" => "Sub-Tarefa"
                          ,"new_sub_note" => "Sub-Nota"
                          ,"save" => "<u>S</u>alvar"
                          ,"save_alt" => "Salvar"
                          ,"save_as_new" => "Salvar como Novo"
                          ,"wp_tip" => "Postar para WordPress"
                          );

$language->tree = array("due" => "Previs�o:"
                       ,"id" => "ID:"
                       ,"loading" => $language->messages["js_loading_text"] // no need to set this
                       ,"open_sub_task" => '1 Sub-Tarefa/Nota Aberta <span style="color: #666;">(__0 Total)</span>' // number
                       ,"open_sub_tasks" => '__0 Sub-Tarefas/Notas Abertas <span style="color: #666;">(__1 Total)</span>' // number, number
                       ,"owner" => "Respons�vel: __0" // user name
                       ,"status" => "__0% Completado" // number (0-100)
                       ,"by" => "por __0" // user name
                       );

$language->user = array("form_title" => "Editar Usu�rio"
                        );

$language->user_form = array("add_groups" => "Adicionar Grupos"
                            ,"blog_settings" => "Configura��es de Publica��o de Blogs"
                            ,"b2_enable" => "Habilitar publica��o para o b2 blog"
                            ,"b2_post_URL" => "b2tasks_post.php URL:"
                            ,"b2_settings" => "Configura��es b2"
                            ,"change_password" => "Alterar Senha"
                            ,"config_server" => "Usu�rio pode alterar configura��es do Servidor"
                            ,"date_format" => "Formato da Data:"
                            ,"date_format_example" => "(Examplos: 'm/d/y', 'y-m-d', 'm.y.d')"
                            ,"date_picker_months" => "Meses na escolha de data:"
                            ,"default_groups" => "Grupos padr�es permitiram ver suas tarefas:"
                            ,"default_queue" => "Visualiza��o Padr�o na P�gina Principal:"
                            ,"email" => "Endere�o de E-mail:"
                            ,"email_notifications" => "Receba notifica��es por e-mail quando colocar novas tarefas/notas ou suas tarefas/notas forem modificadas"
                            ,"email_reminders" => "Receber diariamente lembrete de tarefas"
                            ,"form_title" => "Prefer�ncias"
                            ,"formatting_toolbar" => "Habilitar ferramentas de Tags HTML"
                            ,"general_settings" => "Configura��es Gerais"
                            ,"groups" => "Grupos"
                            ,"groups_add" => "Grupos dispon�veis"
                            ,"group_edit" => "Editar"
                            ,"groups_in" => "Grupos Selecionados"
                            ,"group_new" => "Criar"
                            ,"group_view" => "Visualizar"
                            ,"home_show_level" => "N�veis para mostrar expandidos na P�gina Principal (0 � recomendado):"
                            ,"home_sort_order" => "Ordem de Tipo na P�gina Principal:"
                            ,"ical_days_after" => "Dias futuros:"
                            ,"ical_days_before" => "Dias passados:"
                            ,"ical_enable" => "Habilitar PHP iCalendar"
                            ,"ical_export_type" => "iCalendar exportar tipo:"
                            ,"ical_include_todo" => "Incluir tarefas sem data de vencimento"
                            ,"ical_link" => "Subscreva seu Tasks Pro&trade; iCalendar"
                            ,"ical_settings" => "Configura��es iCalendar"
                            ,"language_mobile" => "Idioma para Vers�o PDA/Mobile:"
                            ,"language" => "Idioma:"
                            ,"live_breadcrumbs" => "Atualizar os breadcrumbs enquanto digita"
                            ,"mono_font" => "Habilitar op��o de fonte de largura-fixa para o campo de notas"
                            ,"mt_enable" => "Habilitar postagem para o MoveableType blog"
                            ,"mt_post_URL" => "MoveableType Bookmarklet URL:"
                            ,"mt_settings" => "Configura��es MoveableType"
                            ,"name" => "Nome:"
                            ,"new_password_tip" => "(Entre com a senha em ambos os campos.)"
                            ,"no_groups" => "Nenhum grupo ainda foi criado"
                            ,"password" => "Senha:"
                            ,"password_tip" => "(Entre em uma nova senha duas vezes para mudar a senha ou deixe em branco para manter sua senha atual.)"
                            ,"permissions" => "Permiss�es"
                            ,"phone" => "N�mero do Telefone:"
                            ,"profile" => "Perfil"
                            ,"server_setting_disabled" => "(Esta op��o est� desabilitada nas configura��es do Servidor)"
                            ,"server_setting_disabled_link" => '(Esta op��o est� desabilitada nas <a href="index.php?screen=config">Configura��es do Servidor</a>)'
                            ,"server_time_difference" => "Diferen�a de tempo do Servidor (em horas, pode ser negativo):"
                            ,"show_deleted_in_history" => "Mostrar tarefas deletadas no Hist�rico"
                            ,"task_access_private" => "Privado (somente visualizada por mim)"
                            ,"task_access_public" => "Compartilhado (visualizada pelas pessoas do meu grupo)"
                            ,"task_default_access" => "Configura��o padr�o para novas tarefas:"
                            ,"tasks" => "Tarefas &amp; Notas"
                            ,"task_edit" => "Editar"
                            ,"task_edit_not_owner" => " � permitido editar tarefas/notas que pertence a outro usu�rio"
                            ,"task_new" => "Criar"
                            ,"task_view" => "Visualizar"
                            ,"team" => "Usu�rios &amp; Grupos"
                            ,"this_user" => "(Este usu�rio)"
                            ,"tree_sort_order" => "Ordenar tipo em vis�o de �rvore:"
                            ,"upcoming_days" => "Dias de antecedencia para mostrar em 'Previs�o':"
                            ,"username" => "Usu�rio:"
                            ,"users" => "Usu�rios"
                            ,"user_edit" => "Editar"
                            ,"user_new" => "Criar"
                            ,"user_view" => "Visualizar"
                            ,"view_all" => "Visualizar tudo"
                            ,"web" => "Web Site:"
                            ,"wp_enable" => "Habilitar postagem para o WordPress blog"
                            ,"wp_post_URL" => "WordPress Bookmarklet URL:"
                            ,"wp_settings" => "Configura��es WordPress"
                            );

$language->users = array("form_title" => "Gerenciar Usu�rios"
                        ,"new_user" => "Novo Usu�rio"
                        );

?>
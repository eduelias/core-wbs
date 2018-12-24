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
                        ,"documentation" => "Documentação"
                        ,"read_me" => "Leia-me"
                        ,"license" => "Licença"
                        ,"download" => "download"
                        ,"this_version" => "Esta Versão: __0" // number
                        ,"latest_version" => "Última versão lançada: __0" // number
                        ,"beta_version" => "Última versão beta: __0" // number
                        ,"using_latest" => "Você está utilizando a última versão lançada."
                        ,"using_beta" => "Você está utilizando a última versão beta."
                        ,"feedback" => "Feedback and Sugestões:"
                        ,"web" => "Web:"
                        ,"credits" => "Créditos"
                        ,"main_credit" => "Tasks Jr. foi conceitualizado e criado por <nobr>Alex King</nobr>. Foi encontrado nestes idiomas pela colaboração de parceiros:"
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

$language->admin = array("config" => "Configurações do Servidor"
                        ,"form_title" => "Administração"
                        ,"groups" => "Grupos"
                        ,"manage_config" => "Gerenciar Configurações do Servidor"
                        ,"manage_groups" => "Gerenciar Grupos"
                        ,"new_group" => "Novo Grupo"
                        ,"users" => "Usuários"
                        ,"manage_users" => "Gerenciar Usuários"
                        ,"new_user" => "Novo Usuário"
                        );

$language->breadcrumbs = array("admin" => "Admin"
                              ,"config" => "Configurações do Servidor"
                              ,"group" => "Editar Grupo"
                              ,"groups" => "Gerenciar Grupos"
                              ,"history" => "Histórico"
                              ,"home" => "Home"
                              ,"new_group" => "Novo Grupo"
                              ,"new_task" => "Novo"
                              ,"new_user" => "Novo Usuário"
                              ,"preferences" => "Preferências"
                              ,"restricted" => "(restrito)"
                              ,"search" => "Procurar"
                              ,"search_results" => "Resultados da busca"
                              ,"sortable" => "Ordenar lista de tarefas"
                              ,"upcoming" => "Tarefas previstas"
                              ,"user" => "Editar Usuário"
                              ,"users" => "Gerenciar Usuários"
                              );

$language->config = array("check_for_updates" => "Verificar novas atualizações"
                         ,"cookie_domain" => "Domínio para ser utilizados nos cookies (ex: '.example.com' ou deixe em branco na dúvida):"
                         ,"cookie_path" => "Caminho utilizado em Cookies (i.e. '/tasks/' ou deixe em branco na dúvida):"
                         ,"email" => "Endereço de e-mail utilizado para enviar mensagens para o administrador:"
                         ,"email_notifications" => "Habilitar notificações por e-mail"
                         ,"email_reminders" => "Habilitar lembretes diários por e-mail"
                         ,"form_title" => "Configurações do Servidor"
                         ,"ical_enable" => "Habilitar PHP iCalendar"
                         ,"ical_URL" => "PHP iCalendar URL:"
                         ,"language" => "Idioma padrão:"
                         ,"language_mobile" => "Idioma padrão para acesso Móvel/PDA:"
                         ,"limit_user_groups" => "Usuários podem somente ver parte de grupos quando eles estejam criando ou editando uma tarefa/nota"
						 ,"tasks_URL" => "Tasks Pro&trade; URL (não inclua 'index.php'):"
                         ,"use_beta" => "Verificar lançamento de versões beta"
                         );

$language->confirm = array("complete_instructions" => "A tarefa que você está marcando como completa tem __0 sub-tarefas abertas. Por favor escolha como proceder:" // number
                          ,"complete_multiple_instructions" => "Uma ou mais tarefas que você selecionou para marcar como completada possui sub-tarefas(s). Por favor escolha como proceder:" // number
                          ,"complete_multiple_orphan" => "Marcar tarefa como completada e desvincular as sub-tarefas"
                          ,"complete_multiple_recursive" => "Marcar tarefas e sub-tarefas como completadas"
                          ,"complete_multiple_title" => "Tarefas completadas"
                          ,"complete_orphan" => "Marque esta tarefa como completada e desvincule as sub-tarefas"
                          ,"complete_notes" => "Entre com as notas de fechamento da tarefa:"
                          ,"complete_recursive" => "Marque esta tarefa e suas sub-tarefas como completadas"
                          ,"complete_remove" => "Marque esta tarefa como completada e vincule suas sub-tarefas na tarefa principal"
                          ,"complete_title" => "Opções de Tarefas Completadas"
                          ,"delete_confirm" => "Você tem certeza que deseja apagar esta tarefa?"
                          ,"delete_instructions" => "A tarefa que você está apagando tem __0 sub-tarefas abertas. Por favor escolha como proceder:" // number
                          ,"delete_multiple_instructions" => "Uma ou mais tarefas que você está apagando possuem sub-tarefas. Por favor escolha como a exclusão deve se comportar."
                          ,"delete_multiple_orphan" => "Apagar as tarefas selecionadas e desvincular as sub-tarefas"
                          ,"delete_multiple_recursive" => "Apagar as tarefas selecionadas e suas sub-tarefas"
                          ,"delete_multiple_title" => "Apagar Tarefas"
                          ,"delete_orphan" => "Apagar esta tarefa e desvincular as sub-tarefas"
                          ,"delete_recursive" => "Apagar esta tarefa e sub-tarefas"
                          ,"delete_remove" => "Apagar esta tarefa e vincular as sub-tarefas na tarefa principal"
                          ,"delete_title" => "Apagar Tarefa"
                          ,"delete_title_m" => "Apagar Tarefa"
                          ,"delete_user_instructions" => "Usuário '__0' possui __1 tarefas definidas para ele, Por favor escolha o usuário que você gostaria de designar estas tarefas." // name, number
                          ,"delete_user_tasks" => "Tarefas definidas para '__0'" // name
                          ,"delete_user_title" => "Apagar Usuário"
                          ,"new_owner" => "Novo responsável:"
                          );

$language->data = array("done" => "Feito"
                       ,"group_name_copy" => " Copia"
                       ,"no" => "Não"
                       ,"priority_1" => "Mais baixo"
                       ,"priority_2" => "Baixo"
                       ,"priority_3" => "Médio"
                       ,"priority_4" => "Alto"
                       ,"priority_5" => "Mais alto"
                       ,"private" => "Particular"
                       ,"rel_date" => "__0" // date
                       ,"rel_date_days" => "__0 Dias" // number
                       ,"rel_date_days_ago" => "__0 Dias atrás" // number
                       ,"rel_date_today" => "Hoje"
                       ,"rel_date_tomorrow" => "Amanhã"
                       ,"rel_date_week" => "1 Semana"
                       ,"rel_date_week_ago" => "1 Semana atrás"
                       ,"rel_date_yesterday" => "Ontem"
                       ,"shared" => "Compartilhado"
                       ,"username_copy" => "_copy"
                       ,"yes" => "Sim"
                       );

$language->email = array("go_to_prefs" => "Você pode alterar sua senha na tela de Preferências após efetuar o logon para tarefas:"
                        ,"line_break" => "\n"
                        ,"new_login_info" => "Sua nova informação de login é:"
                        ,"password_reset" => "Por sua solicitação, sua senha de tarefas foi reajustada."
                        ,"password" => "Senha:"
                        ,"salutation" => "Saudações __0,"
                        ,"signoff" => "Felicitações."
                        ,"subject_password_reset" => "Nova senha de tarefas"
                        ,"subject_task_assigned" => "Tarefa '__0' (#__1) foi definida para você" // title, id
                        ,"subject_task_complete" => "Tarefa '__0' (#__1) foi completada" // title, id
                        ,"subject_task_updated" => "Tarefa '__0' (#__1) foi atualizada" // title, id
                        ,"task_assigned" => "Tarefa '__0' (#__1) foi definida para você por __2." // title, id, name
                        ,"task_complete_creator" => "Tarefa '__0' (#__1) criada por você foi completada por __2." // title, id, name
                        ,"task_complete_owner" => "Tarefa '__0' (#__1) definida para você foi completada por __2." // title, id, name
                        ,"task_updated" => "Tarefa '__0' (#__1) foi atualizada por __2." // title, id, name
                        ,"username" => "Usuário:"
                        );

$language->email_reminders = array("overdue" => "Não cumprido"
                                  ,"due" => "Vencimento"
                                  ,"upcoming" => "Previsão"
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
                       ,"after_save" => "Após salvar:"
                       ,"all_groups" => "Todos os grupos"
                       ,"choose_date" => "Escolher data"
                       ,"clear_date" => "Limpar"
                       ,"created_by" => "Criado por:"
                       ,"date_due" => "Data vencimento:"
                       ,"date_entered" => "Data entrada:"
                       ,"date_modified" => "Última alteração:"
                       ,"form_title_edit" => "Editar"
                       ,"form_title_new" => "Nova"
                       ,"hide_groups" => "Fechar"
                       ,"groups" => "Grupos:"
                       ,"id" => "ID:"
                       ,"modified_by" => "Última alteração por:"
                       ,"mono_font" => "Largura-fixa"
                       ,"my_groups" => "Meus Grupos"
                       ,"new_note" => "Nova nota"
                       ,"new_task" => "Nova Tarefa"
                       ,"no_groups" => "Sem Grupos"
                       ,"note" => "Nota"
                       ,"notes" => "Notas:"
                       ,"owner" => "Responsável:"
                       ,"parent" => "Principal:"
                       ,"priority" => "Prioridade:"
                       ,"private" => "Particular"
                       ,"return_home" => "Voltar ao início"
                       ,"select_groups" => "Grupos selecionados:"
                       ,"snapback" => "Tela anterior"
                       ,"status" => "% Completado:"
                       ,"status_label" => "% Completado"
                       ,"stay_here" => "Ficar Aqui"
                       ,"sticky" => "Tarefa Fixa"
                       ,"sticky_label" => "Tarefa Fixa:"
                       ,"task" => "Tarefa"
                       ,"title" => "Títul<u>o</u>:"
                       ,"today" => "Hoje"
                       ,"tomorrow" => "Amanhã"
                       ,"type" => "Tipo:"
                       ,"url" => "URL:"
                       ,"urls" => "URLs:"
                       ,"url_1" => "URL 1:"
                       ,"url_2" => "URL 2:"
                       ,"url_3" => "URL 3:"
                       ,"view_parent" => "Visualizar tarefa principal"
                       ,"view_tree" => "Visualizar árvore "
                       );

$language->group = array("add_user" => "Adicionar usuário"
                        ,"description" => "Descrição:"
                        ,"form_title" => "Editar Grupo"
                        ,"name" => "Nome:"
                        ,"users" => "Usuários Selecionados"
                        ,"users_add" => "Usuários Disponíveis"
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
                        ,"forms_hide_show_tip" => "Esconder ou mostrar mais informações das sub-tarefas/notas"
                        ,"hide_show" => "Esconder/Mostrar"
                        ,"hide_show_tip" => "Esconder ou mostrar mais informações desta tarefa/nota"
                        ,"ical" => "iCalendar"
                        ,"ical_group_tip" => "iCalendar deste grupo de tarefas"
                        ,"ical_user_tip" => "iCalendar das tarefas deste usuário"
                        ,"mark_complete" => "Marcar como completada"
                        ,"new_sub_task" => "Nova Sub-Tarefa"
                        ,"new_sub_note" => "Nova Sub-Nota"
                        ,"note" => "Nota"
                        ,"notes_bigger" => "Expandir visualização de notas"
                        ,"notes_smaller" => "Reduzir visualização de notas"
                        ,"parent_picker" => "Escolher a tarefa/nota principal"
                        ,"phpical" => "Abrir no PHP iCalendar"
                        ,"phpical_group_tip" => "Veja um iCalendar deste grupo de tarefas em PHP iCalendar"
                        ,"phpical_user_tip" => "Veja um iCalendar das tarefas deste usuário em PHP iCalendar"
                        ,"priority" => "Prioridade: __0" // result of get_friendly_priority();
                        ,"private" => "Particular"
                        ,"private_tip" => "Esta tarefa é particular"
                        ,"remove" => "Remover"
                        ,"required" => "Requerido"
                        ,"required_tip" => "Este campo deve ser preenchido"
                        ,"rss" => "RSS"
                        ,"rss_group_tip" => "RSS fonte deste grupo de tarefas."
                        ,"rss_user_tip" => "RSS fonte das tarefas deste usuário."
                        ,"sticky" => "Tarefa Fixa"
                        ,"task" => "Tarefa"
                        ,"tree_toggle" => "Esconder/Mostrar"
                        ,"tree_toggle_tip" => "Esconder ou mostrar as sub-tarefas/notas desta tarefa"
                        ,"under_task_picker" => "Escolha uma tarefa que será o ponto de partida para a procura"
                        ,"visit_url" => "Vá para esta URL"
                        ,"visit_url_tip" => "Vá para esta URL em uma nova janela"
                        );

$language->install = array("access_explanation" => "Se você definir suas tarefas como 'Particulares', somente você poderá ve-las. Se você definir como 'Compartilhadas' elas serão visíveis por você e por outras pessoas dos seus grupos. Você poderá alterar isto há qualquer hora."
                          ,"create_tables" => "Criar Tabelas de Banco de Dados"
                          ,"create_tables_text" => "Criando tabelas de banco de dados..."
                          ,"choose" => "Instalar ou Atualizar?"
                          ,"choose_install" => "Instalar Tasks Pro&trade; pela primeira vez."
                          ,"choose_text" => "Você está instalando o Tasks Pro&trade; pela primeira vez ou está atualizando o tasks 1.x?."
                          ,"choose_upgrade" => "Atualizar a versão do tasks 1.x."
                          ,"database_connection" => "Não conectou ao banco de dados"
                          ,"database_connection_text" => "<strong>Erro:</strong> Não conectou ao banco de dados '__0' em '__1'." // database name, username
                          ,"database_correct_settings" => "Por favor corrija sua configuração no 'database.inc.php' então <a href=\"../index.php\">tente novamente</a>."
                          ,"db_name" => "Nome do Banco de Dados:"
                          ,"db_password" => "Senha:"
                          ,"db_settings" => "Sua configuração atual:"
                          ,"db_username" => "Usuário:"
                          ,"done" => "Terminado!"
                          ,"done_text" => "Certo, agora tudo deve estar pronto! Entre na página de <a href=\"../login.php\">login</a> e comece a utilizar o sistema."
                          ,"done_text_review" => "Você deve revisar sua configuração do servidor (clique em 'Admin') e preferências (clique em 'Preferências') quando estiver logado."
                          ,"err_config_not_saved" => "Não foi possível salvar as informações de configuração do servidor. Isto pode ser porque já foi salvo ao banco de dados."
                          ,"err_creating_tables" => "Nenhuma tabela foi criada, por favor verifique suas configurações de banco de dados e permissão de usuário, depois tente novamente."
                          ,"err_no_table_to_upgrade" => "A tabela '__0' especificada como tabela de tarefas em database.inc.php não existe no banco de dados '__1'. Por Favor verifique o nome da tabela." // table name, database name
                          ,"err_restart" => "Opá, ocorreu um erro."
                          ,"err_restart_text" => "Um erro ocorreu durante o último passo. Você provavelmente deverá apagar as tabelas criadas anteriormente utilizando o <a href=\"http://phpmyadmin.sourceforge.net\">PHPMyAdmin</a> ou ferramenta MySQL similar e <a href=\"index.php\">recomece</a>."
                          ,"err_select_database" => "Banco de Dados não selecionado"
                          ,"err_select_database_text" => "Foi possível conectar ao servidor, mas não foi possível conectar ao banco de dados '__0'."
                          ,"err_tables_dont_exist" => "<strong>Erro:</strong> a tabela de dados especificada no 'database.inc.php' não existe no banco de dados '__0'." // database name
                          ,"err_try_again" => "Uma vez você tenha definido o assunto de configuração, você deve <a href=\"index.php\">tentar novamente</a>."
                          ,"err_user_not_saved" => "A informação sobre o usuário não pode ser salva. Isto pode ocorrer porque o usuário já existe no banco de dados."
                          ,"err_users_exist" => "Os usuários já existem no sistema."
                          ,"go_to_install" => "Se ainda não instalou o Tasks Pro&trade;, <a href=\"index.php\">execute o instalador agora</a>."
                          ,"intro_text" => "Bem-vindo ao <strong>tasks</strong>. As próximas telas o ajudarão a configurar tudo."
                          ,"introduction" => "Introdução"
                          ,"name" => "Seu Nome:"
                          ,"next" => "Próximo"
                          ,"not_displayed" => "(Não exibido, configure no 'database.inc.php')"
                          ,"password" => "Senha:"
                          ,"password_confirm" => "Entre com a senha novamente:"
                          ,"preferences" => "Definir a Senha Admin"
                          ,"preferences_text" => "Informe o nome e a senha para usar no usuário administrador criado para você."
                          ,"press_next" => "Pressione 'Próximo' para continuar..."
                          ,"private" => "Particular"
                          ,"select_language" => "Por favor escolha o idioma que você deseja utilizar."
                          ,"server_settings" => "Verificar as Configurações Básicas do Servidor"
                          ,"server_settings_text" => "Para prosseguir defina os valores iniciais de configuração do servidor."
						  ,"set_db_settings" => "Configurações do banco de Dados"
                          ,"set_db_settings_text" => "Tenha certeza que suas configurações de Tabelas estão corretas em 'database.inc.php' e o banco de dados já está criado. <strong>Este não cria o banco de dados para você</strong>."
                          ,"shared" => "Compartilhar"
                          ,"table_created" => "Tabela '__0' foi criada." // table name
                          ,"table_exists" => "<strong>Aviso:</strong> tabela '__0' já existe." // table name
                          ,"table_not_created" => "<strong>Erro:</strong> tabela '__0' não foi criada." // table name
                          ,"table_upgraded" => "Tabela '__0' foi alterada." // table name
                          ,"tasks_URL" => "Entre com a URL onde o tasks foi instalado (inclua as barras de diretório - nós mostramos uma sugestão):"
                          ,"title" => "Tasks Pro&trade;: Configurar"
                          ,"upgrade_1.x" => "Atualizar tasks 1.x"
                          ,"upgrade_1.x_text" => "Antes que você faça qualquer coisa, <strong>SALVE SEUS DADOS!</strong> Nenhuma atualização é simples, se você não tem conhecimento para salvar os dados atuais, <em>não continue</em>. Peça para alguém ajudar, procure um tutorial on-line, para obter ajuda. Se algo de errado acontecer na versão atualizada e você não tiver auxilio de  alguém experiente, seus dados podem ser perdidos ou danificados."
                          ,"upgrade_complete" => "Atualização completada"
                          ,"upgrade_complete_text" => "Seus dados de tarefas foram atualizados com sucesso."
                          ,"upgrade_task_access" => "Você quer atualizar suas tarefas como Compartilhadas ou Particulares?"
                          ,"username" => "Usuário:"
                          ,"verify_db_settings" => "Verificar Configurações do Banco de Dados"
                          ,"verify_db_settings_text" => "Conectamos com sucesso ao banco de dados utilizando o usuário e senha definidos em 'database.inc.php', agora precisamos criar as tabelas de dados. Tenha certeza que todas as informações estão corretas, então clique em 'Próximo' para criar as tabelas. Se você precisa mudar alguma informação apresentada, edite o arquivo 'database.inc.php' e faça a correção apropriada."
                          );

$language->list = array("add_notes" => "Adicionar Notas:" // number
                       ,"banner" => "Mostrando __0 Itens" // number
                       ,"date_due" => "Data Vencimento"
                       ,"description" => "Descrição"
                       ,"done" => "(nenhum)"
                       ,"email" => "E-mail"
                       ,"icalendar" => "iCalendar"
                       ,"id" => "ID"
                       ,"modify_title" => "Modificar Tarefas Selecionadas"
                       ,"name" => "Nome"
                       ,"none" => "(nenhum)"
                       ,"no_items" => "Sem itens para mostrar."
                       ,"owner" => "Responsável"
                       ,"phone" => "Telefone"
                       ,"priority" => "Prioridade"
                       ,"rss_feed" => "RSS Fonte"
                       ,"selected_tasks" => "Tarefas Selecionadas:"
                       ,"status" => "% Completado"
                       ,"title" => "Título"
                       ,"username" => "Usuário"
                       ,"users" => "Usuários"
                       ,"web" => "Web"
                       );

$language->list_titles = array("groups" => "Grupos"
                              ,"history" => "Últimas 25 Tarefas Alteradas"
                              ,"overdue" => "Tarefas não cumpridas"
                              ,"sortable" => "Lista de Tarefas ordenadas"
                              ,"upcoming" => "Tarefas Previstas"
                              ,"users" => "Usuários"
                              );

$language->log_in = array("back_to_login" => "Voltar para o formulário de Login"
                         ,"email" => "Endereço de E-mail:"
                         ,"err_no_email" => "Desculpe, não foi possível identificar o usuário com este endereço de e-mail: __0" // email address
                         ,"err_no_email_for_user" => "Desculpe, não existe endereço de e-mail no registro para '__0'. Por favor entre em contato com seu administrador de sistema e peça para reconfigurar sua senha." // username
                         ,"err_no_username" => "Desculpe, não foi possível localizar o usuário: __0" // username
                         ,"forgot_password_instructions" => "Entre com o usuário e/ou endereço de e-mail, então pressione o botão &quot;Senha por E-Mail&quot;. Será gerada uma nova senha e enviada para você no seu e-mail."
                         ,"forgot_password" => "Esqueceu sua Senha?"
                         ,"log_in" => "Entrar"
                         ,"log_in_failed" => "Desculpe, o usuário ou a senha informada não está correta. Por favor verifique se a tecla Caps Lock está ligada e tente novamente."
                         ,"mail_password" => "Senha por E-Mail"
                         ,"password_mailed" => "A nova senha foi enviada por e-mail para você em: __0" // email address
                         ,"password" => "Senha:"
                         ,"remember_me" => "<u>L</u>embre-me" // letter inside <u> tags should match "remember_me" value in accesskey
                         ,"username" => "Usuário:"
                         );

$language->menu = array("admin" => "Admin"
                       ,"admin_tip" => "Clique aqui para efetuar tarefas administrativas para o sistema."
                       ,"calendar" => "<u>C</u>alendário"
                       ,"calendar_tip" => "Clique aqui para visualizar o calendário de suas tarefas."
                       ,"history" => "Histór<u>i</u>co"
                       ,"history_tip" => "Clique aqui para visualizar as últimas 25 tarefas alteradas."
                       ,"home" => "<u>H</u>ome"
                       ,"home_tip" => "Clique aqui para ir para tela inicial e visualizar todas as tarefas principais."
                       ,"log_out" => "Sair"
                       ,"log_out_tip" => "Clique aqui para efetuar o logoff."
                       ,"new_note" => "Nova <u>N</u>ota"
                       ,"new_note_tip" => "Clique aqui para criar uma nova nota."
                       ,"new_task" => "Nova <u>T</u>arefa"
                       ,"new_task_tip" => "Clique aqui para criar uma nova tarefa."
                       ,"preferences" => "Preferências"
                       ,"preferences_tip" => "Clique aqui para ver e alterar suas preferências pessoais."
                       ,"search" => "Procur<u>a</u>r"
                       ,"search_tip" => "Clique aqui para localizar uma tarefa."
                       ,"sortable" => "Or<u>d</u>enar"
                       ,"sortable_tip" => "Clique aqui para visualizar a lista de tarefas ordenada."
                       ,"upcoming" => "<u>P</u>endências"
                       ,"upcoming_tip" => "Clique aqui para visualizar todas as tarefas pendentes e atrasadas."
                       );

$language->messages = array("completed" => "Tarefa &quot;__0&quot; (#__1) está marcada como completada." // title, id
                           ,"completed_reason" => 'Tarefa &quot;__0&quot; (#__1) está marcada como completada com o motivo:<p class="complete_reason">&rarr; __2</p>' // title, id, reason
                           ,"completed_tasks_reason" => 'The selected tasks have been marked complete with reason:<p class="complete_reason">&rarr; __0</p>' // reason
                           ,"completed_w_reason" => 'Fechada por __0 com o motivo: __1' // name, reason
                           ,"completed_task_link" => "Visualizar Tarefa completada"
                           ,"completed_task_parent_link" => "Visualizar Tarefas Principais Completadas"
                           ,"complete_instructions" => "Tarefa #__0 tem __1 Sub-Tarefa(s) (__2) Aberta(s), por favor escolha como proceder." // id, number, number
                           ,"complete_orphan" => "Tarefa &quot;__0&quot; (#__1) está marcada como completada e todas as sub-tarefas foram desvinculadas da tarefa principal." // title, id
                           ,"complete_recursive" => "Tarefa &quot;__0&quot; (#__1) e todas as sub-tarefas foram marcadas como completadas." // title, id
                           ,"complete_remove" => "Tarefa &quot;__0&quot; (#__1) foi marcada como completada e todas as sub-tarefas foram vinculadas a tarefa #__2." // title, id, new parent task id
                           ,"config_saved" => "Sua configuração de servidor ou salva com sucesso."
                           ,"confirm_delete" => "Apagar tarefa: __0?" // title
                           ,"confirm_delete_group" => "Apagar grupo: __0?" // name
                           ,"confirm_delete_note" => "Apagar nota: __0?" // title
                           ,"confirm_delete_user" => "Apagar usuário: __0?" // name
                           ,"confirm_remove_user" => "Remover __0 deste grupo?" // name
                           ,"confirm_remove_user_generic" => "Remover usuário deste grupo?"
                           ,"deleted" => "Tarefa &quot;__0&quot; (#__1) apagada com sucesso." // title, id
                           ,"delete_instructions" => "Tarefa #__0 tem __1 Sub-Tarefa(s) (__2) Aberta(s), por favor escolha como proceder." // id, number, number
                           ,"deleted_multiple_orphan" => "As tarefas selecionadas foram apagadas e todas as sub-tarefas foram desvinculadas."
                           ,"deleted_multiple_recursive" => "As tarefas selecionadas e todas as sub-tarefas vinculadas foram apagadas."                           
                           ,"deleted_orphan" => "Tarefa &quot;__0&quot; (#__1) foi apagada e todas as sub-tarefas foram desvinculadas." // title, id
                           ,"deleted_recursive" => "Tarefa &quot;__0&quot; (#__1) e todas as sub-tarefas vinculadas foram apagadas." // title, id
                           ,"deleted_remove" => "Tarefa &quot;__0&quot; (#__1) foi apagada e todas as sub-tarefas foram vinculadas a tarefa #__2" // title, id, new parent id
                           ,"err_config_not_saved" => "Sua configuração do servidor não foi salva."
                           ,"err_conflict" => "Esta tarefa não foi salva.<br />: Esta tarefa foi atualizada por outro usuário desde que você começou a editar. Por favor revise as diferenças listadas e salve novamente. <p>A versão desta tarefa que você alterou foi salva por último em  __0;<br />a versão atual foi salva no banco de dados como __1"
                           ,"err_date_format" => "Existe um erro no <b>\$custom->date_format</b> em 'config.php'. Seu valor: '__0' não contém um ou mais 'm', 'd', 'y'. Por favor corrija isto no 'config.php'." // date_format
                           ,"err_event_type" => "Existe um erro no <b>\$custom->ical_export_type</b> em 'config.php'. Seu valor: '__0' não é 'event' ou 'todo'. Por favor corrija isto no 'config.php'." // ical_export_type
                           ,"err_group_not_deleted" => "O grupo não foi apagado."
                           ,"err_group_not_saved" => "Os dados do grupo não foram salvos."
                           ,"err_invalid_date" => "Esta tarefa não foi salva porque a data informada não é válida. Corrija ou limpe a data de vencimento e salve a tarefa novamente."
                           ,"err_invalid_modify_date" => "As alterações solicitadas não foram feitas porque a data está inválida. Corrija ou limpe a data do vencimento e salve novamente."
                           ,"err_invalid_parent" => "Tarefa #__0 foi especificada como uma sub-tarefa, mas não existe tarefa com o código informado. Por favor corrija o código da tarefa e salve novamente." // id
                           ,"err_loop" => "Salvando esta tarefa com a sub-tarefa especificada iria criar um loop infinito podendo até travar a operação."
                           ,"err_no_root" => "Nenhuma raiz definida."
                           ,"err_own_parent" => "Uma tarefa não pode ser o seu próprio pai."
                           ,"err_owner_changed_no_access" => "O responsável desta tarefa mudou entre o tempo que você utilizou para editar e salvar. Você já não tem permissão para editar esta tarefa."
                           ,"err_prefs_not_saved" => "Suas preferências não foram salvas."
                           ,"err_search_date_after" => "Esta procura não achará nenhuma tarefa porque o valor especificado em 'Data Vencimento está depois:' não é válido. Corrija ou limpe a data de vencimento e tente procurar novamente.."
                           ,"err_search_date_before" => "Esta procura não achará nenhuma tarefa porque o valor especificado em 'Data Vencimento está antes:' não é válido. Corrija ou limpe a data de vencimento e tente procurar novamente.."
                           ,"err_search_date_exact" => "Esta procura não achará nenhuma tarefa porque o valor especificado em 'Data Vencimento é exatamente:' não é válido. Corrija ou limpe a data de vencimento e tente procurar novamente.."
                           ,"err_task_groups_not_modified" => "O grupo de permissões para as tarefas selecionadas não pode ser alterado. Por favor tente novamente."
                           ,"err_task_not_deleted" => "A tarefa selecionada não foi apagada."
                           ,"err_task_status_not_changed" => "O '% Completado' não foi modificado em __0 das tarefas selecionadas porque o status é calculando pelas sub-tarefas associadas." // number
                           ,"err_tasks_not_comleted" => "__0 das tarefas selecionadas não estavam marcadas como completadas." // number
                           ,"err_tasks_not_deleted" => "__0 das tarefas selecionadas não foram deletadas." // number
                           ,"err_tasks_not_modified" => "As tarefas selecionadas nõe puderam ser alteradas. Por favor tente novamente."
                           ,"err_tasks_not_reassigned" => "as tarefas não puderam ser redefinidas. Por favor tente novamente."
                           ,"err_unauthorized_task_in_list" => "tarefa #__0 foi incluída na lista mas você não está autorizado para acessar esta tarefa." // id
                           ,"err_user_limit" => ' Você tem mais usuários que sua licença permite e está usando este software ilegalmente. Por favor <a href="http://www.taskspro.com/buy/">atualize sua licença</a>.'
						   ,"err_user_not_added_to_group" => "O usuário selecionado não foi adicionado ao grupo."
                           ,"err_user_not_authorized" => "Você não está autorizado para executar esta ação."
                           ,"err_user_not_authorized_for_screen" => "Você não está autorizado para acessar esta tela."
                           ,"err_user_not_authorized_for_task" => "Você não está autorizado para acessar esta tarefa."
                           ,"err_user_not_deleted" => "O usuário não foi apagado."
                           ,"err_user_not_removed_from_group" => "O usuário selecionado não foi removido do grupo."
                           ,"err_user_not_saved" => "Os dados do usuário não foram salvos."
                           ,"err_username_exists" => "Já existe um usuário com o nome '__0'." // username
                           ,"group_deleted" => "O grupo '__0' foi apagado." // name
                           ,"group_saved" => "Os dados do grupo foram salvos."
                           ,"js_abandon_changes" => "Sair sem salvar suas alterações?"
                           ,"js_complete_confirm" => "Você tem certeza de fechar\\nesta tarefa sem informar a\\nnota de fechamento?"
                           ,"js_complete_prompt" => "Entre com as notas de fechamento para esta tarefa:"
                           ,"js_complete_tasks_prompt" => "Entre com as notas de fechamento para estas tarefas:"
                           ,"js_complete_tasks_confirm" => "Você tem certeza de fechar\\nestas tarefas sem informar as\\nnotas de fechamento?"
                           ,"js_delete_tasks_confirm" => "Você tem certeza de apagar estas tarefas?"
                           ,"js_err_edit_date" => "O valor atual no campo data de vencimento não é de uma data válida.\\nModifique ou limpe este valor depois salve."
                           ,"js_err_group_errors" => "Advertência - Os seguintes problemas precisam ser resolvidos\\nantes deste grupo poder ser salvo: \\n"
                           ,"js_err_group_name_required" => "O campo 'Nome' não pode ficar em branco."
                           ,"js_err_invalid_modify_date" => "Advertência - a data de vencimento especificada não é uma data válida.\\nVocê precisa corrigir isto antes de poder salvar."
                           ,"js_err_no_modifications" => "Advertência - Nenhuma alteração foi feita.\\nFaça alterações nos campos abaixo antes de salvar."
                           ,"js_err_no_selected_tasks" => "Você precisa selecionar um ou mais tarefas para que possa editar."
                           ,"js_err_prefs_date_format" => "O Formato da Data, 'Date Format', deve conter 'd', 'm' e 'y'."
                           ,"js_err_prefs_errors" => "Advertência - O seguinte problema precisa ser resolvido\\nantes de você salvar suas preferências: \\n"
                           ,"js_err_prefs_ical_days_after" => "O campo Dias Futuros, 'Future Days', deve ser um número."
                           ,"js_err_prefs_ical_days_before" => "o campo Dias Passados, 'Previous Days', deve ser um número."
                           ,"js_err_prefs_new_password" => "Você precisa entrar com uma senha para este novo usuário nos dois campos de senha."
                           ,"js_err_prefs_password" => "O valor nos dois campos de 'Senha' devem ser iguais."
                           ,"js_err_prefs_server_time_difference" => "O valor no campo 'Server Time Difference' deve ser um número entre -23 e 23."
                           ,"js_err_prefs_upcoming_days" => "O valor no campo Dias Previstos, 'Upcoming Days', deve ser um número maior do que zero 0."
                           ,"js_err_search_date_after" => "O valor atual do campo 'Data Prevista está após:' não é uma data válida."
                           ,"js_err_search_date_before" => "O valor atual do campo 'Data Prevista está antes:' não é uma data válida."
                           ,"js_err_search_date_exact" => "O valor atual do campo 'Data Prevista é exatamente:' não é uma data válida."
                           ,"js_err_search_date_range" => "A data em 'Data Prevista está após:' deve ser antes da data de 'Data Prevista está depois:' Por favor corrija."
                           ,"js_err_search_errors" => "Advertência - Os seguintes problemas precisam ser corrigidos\\nantes de sua procura possa devolver qualquer resultado: \\n"
                           ,"js_err_search_id_invalid" => "O campo 'ID' deve estar vazio ou ter um valor numérico maior que 0."
                           ,"js_err_search_parent_invalid" => "O campo Pai, 'Parent', deve estar vazio ou ter um valor numérico maior que 0."
                           ,"js_err_search_status_exact" => "O campo 'Status é exatamente:' deve ter um valor numérico entre 0 e 100."
                           ,"js_err_search_status_less" => "O campo 'Status é menos que:' tem que estar vazio ou com um valor numérico entre 0 e 100."
                           ,"js_err_search_status_more" => "O campo 'Status é mais que:' tem que estar vazio ou com um valor numérico entre 0 e 100."
                           ,"js_err_search_status_range" => "O campo 'Status é menos que:' deve ser maior que o campo 'Status é mais que:'."
                           ,"js_err_user_errors" => "Advertência - Os seguintes problemas precisam ser resolvidos\\nantes deste usuário ser salvo: \\n"
                           ,"js_err_user_name_required" => "O campo 'Nome' não pode ficar em branco."
                           ,"js_err_user_username_required" => "O campo 'Usuário' não pode ficar em branco."
                           ,"js_loading_text" => "Carregando..."
                           ,"js_no_selected_groups" => "Nenhum grupo foi selecionado para esta tarefa/nota,\\nmas você não marcou isto como privado.\\n\\nSe você salvar a tarefa sem grupos,\\nsomente você poderá visualizá-la.\\n\\nPressione OK para salvar a tarefa/nota sem grupos\\n ou Cancelar para voltar e adicionar grupos."
                           ,"js_nothing_to_save" => "Desculpe, não há nada para salvar nesta tela."
                           ,"js_parent_required" => "Você precisa especificar um pai para esta tarefa para\\nver as sub-tarefa após salvar."
                           ,"mail_sent" => "Lembretes Diários enviados por e-mail."
                           ,"mobile_resolve_instructions" => "Os dados ue você entrou serão mostrados na versão anterior no banco de dados. Faça as mudanças que você precisa, então clique em 'Salvar'."
                           ,"no_email" => "Por favor adicione seu endereço de email no config.php."
                           ,"no_tasks" => "Nenhuma tarefa para mostrar."
                           ,"orphaned_when_parent_task_closed" => "Esta tarefa/nota foi alterada para não possuir tarefa-pai porque outro usuário fechou a tarefa principal, mas não foi permitido fechar esta tarefa."
                           ,"parent_changed" => "Tarefa principal alterada de #__0 para #__1." // old parent id, new parent id
                           ,"prefs_saved" => "Suas preferências foram salvas."
                           ,"saved" => "Tarefa salva #__0 (__1) até __2." // id, title, timestamp
                           ,"tasks_deleted" => "As tarefas selecionadas foram apagadas."
                           ,"tasks_modified" => "As tarefas selecionadas foram modificadas."
                           ,"tasks_reassigned" => "As tarefas foram redefinidas com sucesso."
                           ,"task_reassigned_user_deleted" => "Esta tarefa foi redefinida quando o responsável foi removido do sistema."
                           ,"title" => "Mensagens"
                           ,"type_error" => "Erro:"
                           ,"type_info" => "Info:"
                           ,"type_warning" => "Advertência:"
                           ,"user_password_changed" => "A senha do usuário foi alterada."
                           ,"user_deleted" => "O usuário '__0' foi deletado." // username
                           ,"user_limit" => "Sua licença lhe permite adicionar mais __0 usuários." // number
						   ,"user_saved" => "Os dados do usuário foram salvos."
                           ,"username_no_spaces" => "O nome do usuário não pode conter espaços. Os espaços no nome do usuário serão substituidos por '_'."
						   ,"warn_config_version" => 'Suas configurações do servidor foram salvas com uma versão diferente do Tasks Pro&trade;. Por favor vá até <a href="index.php?screen=config">Configurações do Servidor</a>, verifique suas configurações e pressione Salvar.'
                           ,"warn_deleted" => "Esta tarefa já foi deletada."
                           ,"warn_list_over_100" => "Esta tela está limitada para mostrar 100 tarefas e notas."
                           ,"warn_pref_version" => 'Suas Preferências foram salvas com uma versão diferente do Tasks Pro&trade;. Por favor vá até <a href="index.php?screen=preferences">Preferências</a>, verifique suas configurações e pressione Salvar.'
                           ,"warn_search_results_over_100" => "Esta procura devolveu mais de 100 resultados, somente as primeiras 100 serão mostradas aqui."
                           ,"warn_user_limit" => 'Você tem o número de máximo de usuários que sua licença permite, você precisará apagar um usuário existente ou <a href="http://www.taskspro.com/buy/">atualizar sua licença</a> para criar um novo usuário.'
						   ,"your_password_changed" => "Sua senha foi alterada."
                           );

$language->misc = array("about_tasks" => "Sobre __0" // "Tasks Pro(tm)"
                       ,"all_rights_reserved" => "Todos os direitos reservados."
                       ,"all_users_and_groups" => "Todos os Usuários &amp; Grupos"
                       ,"back_to_top" => "Voltar para o topo"
					   ,"completed_tasks" => "Tarefas Completadas:"
                       ,"copyright" => "Copyright"
                       ,"count_open" => "__0 Tarefas Abertas" // number
                       ,"count_open_one" => "1 Tarefa Aberta"
                       ,"count_overdue" => "__0 Atrasadas" // number
                       ,"count_upcoming" => "__0 Previstas" // number
                       ,"due" => "DEVIDA:"
                       ,"go" => "Vá"
                       ,"hide_completed" => "Esconder"
                       ,"hide_completed_tasks" => "Esconder tarefas completadas"
                       ,"ical_title" => "Tarefas para __0" // name
                       ,"jump_to" => "Ir para..."
                       ,"none" => "(nenhum)"
                       ,"overdue" => "VENCIDA:"
                       ,"quick_search" => "Procura rápida"
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
                       ,"sort_title" => "Título"
                       ,"sort_title_rev" => "Título (reverso)"
                       ,"timer" => "página criada em __0 segundos." // seconds
                       ,"user" => "Usuário: __0" // name
                       ,"version" => "versão __0" // number
                       );

$language->picker = array("date_go" => "Vá"
                         ,"date_key_selected" => "Data atualmente selecionada"
                         ,"date_key_today" => "A data de hoje"
                         ,"date_next" => "Próxima"
                         ,"date_previous" => "Anterior"
                         ,"date_today" => "Hoje"
                         ,"days" => "'Dom','Seg','Ter','Qua','Qui','Sex','Sab'"
                         ,"months" => "'Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'"
                         ,"parent_title" => "Escolha uma tarefa principal"
                         );

$language->preferences = array("form_title" => "Preferências"
                              );

$language->resolve = array("append" => "Juntar"
                          ,"current_version" => "Versão Atual"
                          ,"form_title" => "Os seguintes campos têm diferenças"
                          ,"none" => "(nenhum)"
                          ,"save" => "Salvar"
                          ,"use" => "Usar"
                          ,"your_data" => "Seus dados"
                          );

$language->search = array("after" => "está depois:"
                         ,"before" => "está antes:"
                         ,"exactly" => "é exatamente:"
                         ,"fewer_options" => "Menos Opções de Procura"
                         ,"form_title" => "Critérios de procura"
                         ,"include_completed" => "Incluir Tarefas Completadas"
                         ,"instructions" => "Entre com palavras ou partes de palavras que aparecem no título e/ou notas das tarefas que você quer localizar. Por padrão, a procura acha só registros que contenham todas as condições de procura que você informou. Clique em &quot;Mais opções de procura&quot; para ver critérios de consulta adicionais."
                         ,"less_than" => "é menos que:"
                         ,"more_options" => "Mais Opções de Consulta"
                         ,"more_than" => "é mais que:"
                         ,"note" => "Nota"
                         ,"results_title" => "Resultados da Procura"
                         ,"search_button" => "Procurar"
                         ,"task" => "Tarefa"
                         ,"type" => "Tipo:"
                         ,"under_task" => "Sob a Tarefa:"
                         );

$language->toolbar = array("add_user" => "Adicionar um usuário"
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
                          ,"mt_tip" => "Postar para Tipo móvel"
                          ,"new_sub" => "Sub-Tarefa"
                          ,"new_sub_note" => "Sub-Nota"
                          ,"save" => "<u>S</u>alvar"
                          ,"save_alt" => "Salvar"
                          ,"save_as_new" => "Salvar como Novo"
                          ,"wp_tip" => "Postar para WordPress"
                          );

$language->tree = array("due" => "Previsão:"
                       ,"id" => "ID:"
                       ,"loading" => $language->messages["js_loading_text"] // no need to set this
                       ,"open_sub_task" => '1 Sub-Tarefa/Nota Aberta <span style="color: #666;">(__0 Total)</span>' // number
                       ,"open_sub_tasks" => '__0 Sub-Tarefas/Notas Abertas <span style="color: #666;">(__1 Total)</span>' // number, number
                       ,"owner" => "Responsável: __0" // user name
                       ,"status" => "__0% Completado" // number (0-100)
                       ,"by" => "por __0" // user name
                       );

$language->user = array("form_title" => "Editar Usuário"
                        );

$language->user_form = array("add_groups" => "Adicionar Grupos"
                            ,"blog_settings" => "Configurações de Publicação de Blogs"
                            ,"b2_enable" => "Habilitar publicação para o b2 blog"
                            ,"b2_post_URL" => "b2tasks_post.php URL:"
                            ,"b2_settings" => "Configurações b2"
                            ,"change_password" => "Alterar Senha"
                            ,"config_server" => "Usuário pode alterar configurações do Servidor"
                            ,"date_format" => "Formato da Data:"
                            ,"date_format_example" => "(Examplos: 'm/d/y', 'y-m-d', 'm.y.d')"
                            ,"date_picker_months" => "Meses na escolha de data:"
                            ,"default_groups" => "Grupos padrões permitiram ver suas tarefas:"
                            ,"default_queue" => "Visualização Padrão na Página Principal:"
                            ,"email" => "Endereço de E-mail:"
                            ,"email_notifications" => "Receba notificações por e-mail quando colocar novas tarefas/notas ou suas tarefas/notas forem modificadas"
                            ,"email_reminders" => "Receber diariamente lembrete de tarefas"
                            ,"form_title" => "Preferências"
                            ,"formatting_toolbar" => "Habilitar ferramentas de Tags HTML"
                            ,"general_settings" => "Configurações Gerais"
                            ,"groups" => "Grupos"
                            ,"groups_add" => "Grupos disponíveis"
                            ,"group_edit" => "Editar"
                            ,"groups_in" => "Grupos Selecionados"
                            ,"group_new" => "Criar"
                            ,"group_view" => "Visualizar"
                            ,"home_show_level" => "Níveis para mostrar expandidos na Página Principal (0 é recomendado):"
                            ,"home_sort_order" => "Ordem de Tipo na Página Principal:"
                            ,"ical_days_after" => "Dias futuros:"
                            ,"ical_days_before" => "Dias passados:"
                            ,"ical_enable" => "Habilitar PHP iCalendar"
                            ,"ical_export_type" => "iCalendar exportar tipo:"
                            ,"ical_include_todo" => "Incluir tarefas sem data de vencimento"
                            ,"ical_link" => "Subscreva seu Tasks Pro&trade; iCalendar"
                            ,"ical_settings" => "Configurações iCalendar"
                            ,"language_mobile" => "Idioma para Versão PDA/Mobile:"
                            ,"language" => "Idioma:"
                            ,"live_breadcrumbs" => "Atualizar os breadcrumbs enquanto digita"
                            ,"mono_font" => "Habilitar opção de fonte de largura-fixa para o campo de notas"
                            ,"mt_enable" => "Habilitar postagem para o MoveableType blog"
                            ,"mt_post_URL" => "MoveableType Bookmarklet URL:"
                            ,"mt_settings" => "Configurações MoveableType"
                            ,"name" => "Nome:"
                            ,"new_password_tip" => "(Entre com a senha em ambos os campos.)"
                            ,"no_groups" => "Nenhum grupo ainda foi criado"
                            ,"password" => "Senha:"
                            ,"password_tip" => "(Entre em uma nova senha duas vezes para mudar a senha ou deixe em branco para manter sua senha atual.)"
                            ,"permissions" => "Permissões"
                            ,"phone" => "Número do Telefone:"
                            ,"profile" => "Perfil"
                            ,"server_setting_disabled" => "(Esta opção está desabilitada nas configurações do Servidor)"
                            ,"server_setting_disabled_link" => '(Esta opção está desabilitada nas <a href="index.php?screen=config">Configurações do Servidor</a>)'
                            ,"server_time_difference" => "Diferença de tempo do Servidor (em horas, pode ser negativo):"
                            ,"show_deleted_in_history" => "Mostrar tarefas deletadas no Histórico"
                            ,"task_access_private" => "Privado (somente visualizada por mim)"
                            ,"task_access_public" => "Compartilhado (visualizada pelas pessoas do meu grupo)"
                            ,"task_default_access" => "Configuração padrão para novas tarefas:"
                            ,"tasks" => "Tarefas &amp; Notas"
                            ,"task_edit" => "Editar"
                            ,"task_edit_not_owner" => " É permitido editar tarefas/notas que pertence a outro usuário"
                            ,"task_new" => "Criar"
                            ,"task_view" => "Visualizar"
                            ,"team" => "Usuários &amp; Grupos"
                            ,"this_user" => "(Este usuário)"
                            ,"tree_sort_order" => "Ordenar tipo em visão de árvore:"
                            ,"upcoming_days" => "Dias de antecedencia para mostrar em 'Previsão':"
                            ,"username" => "Usuário:"
                            ,"users" => "Usuários"
                            ,"user_edit" => "Editar"
                            ,"user_new" => "Criar"
                            ,"user_view" => "Visualizar"
                            ,"view_all" => "Visualizar tudo"
                            ,"web" => "Web Site:"
                            ,"wp_enable" => "Habilitar postagem para o WordPress blog"
                            ,"wp_post_URL" => "WordPress Bookmarklet URL:"
                            ,"wp_settings" => "Configurações WordPress"
                            );

$language->users = array("form_title" => "Gerenciar Usuários"
                        ,"new_user" => "Novo Usuário"
                        );

?>
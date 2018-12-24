<?

// catalan 

$language = new language;

$language->name = "Catalan";
$language->author = "Aleix Badia i Bosch";
$language->author_email = "abadia@ica.es";
$language->author_web = "";

$language->charset = "iso-8859-1";

// uncomment this if you need to increase the font size from 10px
// $language->font_size = "10px;"; 

$language->about = array("tagline" => "manteniu les tasques organitzades i aconseguiu que es realitzin."
                        ,"documentation" => "Documentació"
                        ,"read_me" => "Llegiu-me"
                        ,"license" => "Llicència"
                        ,"download" => "guardeu"
                        ,"this_version" => "Aquesta versió: __0" // number
                        ,"latest_version" => "Última versió estable: __0" // number
                        ,"beta_version" => "Última versió beta: __0" // number
                        ,"using_latest" => "Esteu utilitzant l'última versió estable disponible."
                        ,"using_beta" => "Esteu utilitzant l'última versió beta disponible."
                        ,"feedback" => "Suggerències:"
                        ,"web" => "Web:"
                        ,"credits" => "Crèdits:"
                        ,"main_credit" => "Tasks Jr. està dissenyat i implementat per en <nobr>Alex King</nobr>. S'ha traduït als diferents idiomes gràcies a les següents persones: "
                        ,"web_site" => "lloc web"
                        ,"email" => "correu electrònic"
                        );

$language->accesskey = array("calendar" => "c"
                            ,"history" => "r"
                            ,"home" => "h"
                            ,"new_task" => "t"
                            ,"save" => "g"
                            ,"search" => "a"
                            ,"sortable" => "b"
                            ,"title" => "e"
                            ,"upcoming" => "p"
                            );

$language->breadcrumbs = array("history" => "Historial"
                              ,"home" => "Inici"
                              ,"new_task" => "Nova Tasca"
                              ,"search" => "Cerca"
                              ,"search_results" => "Resultats Cerca"
                              ,"sortable" => "Tasques Ordenables"
                              ,"upcoming" => "Pròximes Tasques"
                              );

$language->confirm = array("complete_instructions" => "La tasca que heu marcat com a completada té __0 subtasques obertes. Siusplau, sel·leccioneu com continuar: " // number
                          ,"complete_orphan" => "Marcar aquesta tasca com a completada i deixar les subtasques sense pare"
                          ,"complete_notes" => "Entrar les notes de finalització de la tasca:"
                          ,"complete_recursive" => "Marcar aquesta tasca i les respectives subtasques com a completades"
                          ,"complete_remove" => "Marcar aquesta tasca com a completada i enllaçar les corresponents subtasques a la seva tasca pare"
                          ,"complete_title" => "Opcions Tasques Completades"
                          ,"delete_confirm" => "Esteu segur de voler borrar aquest tasca?"
                          ,"delete_instructions" => "La tasca que esteu borrant té __0 subtasques obertes. Siusplau, sel·leccioneu com continuar: " // number
                          ,"delete_orphan" => "Borrar aquesta tasca i deixar sense pare les corresponents subtasques"
                          ,"delete_recursive" => "Borrar aquesta tasca i les corresponents subtasques"
                          ,"delete_remove" => "Borrar aquesta tasca i enllaçar les corresponents subtasques a la seva tasca pare"
                          ,"delete_title" => "Opcions d'Eliminació Tasca"
                          ,"delete_title_m" => "Borrar Tasca"
                          );

$language->data = array("no" => "No"
                       ,"priority_1" => "Més baixa"
                       ,"priority_2" => "Baixa"
                       ,"priority_3" => "Mitjana"
                       ,"priority_4" => "Alta"
                       ,"priority_5" => "Més alta"
                       ,"rel_date" => "__0" // date
                       ,"rel_date_days" => "__0 Dies" // number
                       ,"rel_date_days_ago" => "__0 Dies anteriors" // number
                       ,"rel_date_today" => "Avui"
                       ,"rel_date_tomorrow" => "Demà"
                       ,"rel_date_week" => "1 Setmana"
                       ,"rel_date_week_ago" => "1 Setmana passada"
                       ,"rel_date_yesterday" => "Ahir"
                       ,"yes" => "Sí"
                       );

$language->email_reminders = array("overdue" => "Endarrerit"
                                  ,"due" => "Pendent"
                                  ,"upcoming" => "Pròxima"
                                  ,"high_priority" => "Prioritat Alta"
                                  ,"status" => "Estat"
                                  ,"complete" => "% Completat"
                                  ,"priority" => "Prioritat"
                                  ,"none" => "(cap)"
                                  ,"subject" => "recordatori tasques"
                                  );

$language->form = array("1_week" => "1 Setmana"
                       ,"1_year" => "1 Any"
                       ,"30_days" => "30 Dies"
                       ,"90_days" => "90 Dues"
                       ,"after_save" => "Després de guardar:"
                       ,"choose_date" => "Sel·leccionar data"
                       ,"clear_date" => "Borrar"
                       ,"date_due" => "Data límit:"
                       ,"date_entered" => "Data inici:"
                       ,"date_modified" => "Última modificació:"
                       ,"form_title_edit" => "Edició Tasca"
                       ,"form_title_new" => "Nova Tasca"
                       ,"id" => "ID:"
			,"new_task" => "Nova Tasca"
                       ,"notes" => "Notes:"
                       ,"parent" => "Pare:"
                       ,"priority" => "Prioritat:"
                       ,"return_home" => "Anar Inici"
                       ,"status" => "% Completat:"
                       ,"status_label" => "% Completat"
                       ,"stay_here" => "Mantenir-se Aquí"
                       ,"sticky" => "Tasca Sticky"
                       ,"sticky_label" => "Tasca Sticky:"
                       ,"title" => "Títol:"
                       ,"today" => "Avui"
                       ,"tomorrow" => "Demà"
                       ,"url" => "URL:"
                       ,"urls" => "URLs:"
                       ,"url_1" => "URL 1:"
                       ,"url_2" => "URL 2:"
                       ,"url_3" => "URL 3:"
                       ,"view_parent" => "Veure Tasca Pare"
                       ,"view_tree" => "Veure Arbre"
                       );

$language->home = array("sort_title" => "Ordenar per títol"
                       ,"sort_title_rev" => "Ordenar inversament per títol"
                       ,"sort_priority" => "Ordenar per prioritat"
                       ,"sort_priority_rev" => "Ordenar inversament per prioritat"
                       );

$language->icons = array("completed" => "Tasca Completada"
                        ,"delete" => "Borrar"
                        ,"edit" => "Editar"
                        ,"hide_show" => "Amagar/Mostrar"
                        ,"hide_show_tip" => "Amagar o mostrar més informació d'aquesta tasca"
                        ,"mark_complete" => "Marcar Completada"
                        ,"new_sub_task" => "Nova subtasca"
                        ,"notes_bigger" => "Ampliar el camp de notes"
                        ,"notes_smaller" => "Disminuir del camp de notes"
                        ,"parent_picker" => "Sel·leccionar la tasca pare"
                        ,"priority" => "Prioritat: __0" // result of get_friendly_priority();
                        ,"sticky" => "Tasca Sticky"
                        ,"tree_toggle" => "Amagar/Mostrar"
                        ,"tree_toggle_tip" => "Amagar o mostrar més subtasques d'aquesta tasca"
                        );

$language->list = array("banner" => "Mostrant __0 Element(s)" // number
                       ,"date_due" => "Data límit"
                       ,"done" => "(fet)"
                       ,"id" => "ID"
                       ,"no_items" => "No hi ha cap element a mostrar."
                       ,"priority" => "Prioritat"
                       ,"status" => "% Completat"
                       ,"title" => "Títol"
                       );

$language->list_titles = array("history" => "Últimes 20 tasques modificades"
                              ,"overdue" => "Tasques pendents"
                              ,"sortable" => "Llista Ordenable de Tasques"
                              ,"upcoming" => "Pròximes Tasques"
                              );

$language->menu = array("calendar" => "<u>C</u>alendari"
                       ,"calendar_tip" => "Premeu aquí per veure el calendari de les teves tasques i actualitzar les dades de iCalendar."
                       ,"history" => "Histo<u>r</u>ial"
                       ,"history_tip" => "Premeu aquí per veure les últimes 25 tasques modificades."
                       ,"home" => "<u>I</u>nici"
                       ,"home_tip" => "Premeu aquí per anar a l'Inici i veure totes les tasques principals."
                       ,"new_task" => "Nova <u>T</u>asca"
                       ,"new_task_tip" => "Premeu aquí per crear una nova tasca."
                       ,"search" => "Cerc<u>a</u>r"
                       ,"search_tip" => "Premeu aquí per cercar una tasca."
                       ,"sortable" => "Ordena<u>b</u>le"
                       ,"sortable_tip" => "Premeu aquí per veure una llista ordenable de tasques."
                       ,"upcoming" => "<u>P</u>ròximes"
                       ,"upcoming_tip" => "Premer aquí per veure totes les pròximes tasques i les endarrerides."
                       );

$language->messages = array("completed" => "La tasca &quot;__0&quot; (#__1) s'ha marcat com a completada." // title, id
			    ,"completed_reason" => 'La tasca &quot;__0&quot; (#__1) s\'ha marcat com a completada per la següent raó:<p style="padding-left: 15px;">__2</p>' // title, id, reason
                           ,"completed_task_link" => "Veure Tasques Completades"
                           ,"completed_task_parent_link" => "Veure la tasca pare de les tasques completades"
                           ,"complete_instructions" => "La tasca #__0 té __1 subtasques (__2) obertes, siusplau sel·leccioneu l'opció que considereu oportuna." // id, number, number
                           ,"complete_orphan" => "La tasca &quot;__0&quot; (#__1) s'ha marcat com a completada i totes les seves subtasques s'han adjuntat a la tasca #__2." // title, id, new parent task id
                           ,"complete_orphan" => "La tasca &quot;__0&quot; (#__1) s'ha marcat com a completada i s'ha borrat el ID pare de totes les seves subtasques." // title, id
                           ,"complete_recursive" => "La tasca &quot;__0&quot; (#__1) i totes les seves subtasques s'han marcat com a completades." // title, id
                           ,"confirm_delete" => "Borrar tasca: __0?"
                           ,"deleted" => "S'ha borrat la tasca &quot;__0&quot; (#__1)." // title, id
                           ,"delete_instructions" => "La tasca #__0 té __1 subtasques (__2) obertes, siusplau sel·leccioneu l'opció que considereu oportuna." // id, number, number
                           ,"delete_orphan" => "S'ha borrat &quot;__0&quot; (#__1) , igual que el ID pare de totes les seves subtasques s'ha eliminat." // title, id
                           ,"delete_recursive" => "S'ha borrat la tasca &quot;__0&quot; (#__1) i totes les seves subtasques." // title, id
                           ,"delete_remove" => "S'ha borrat la tasca &quot;__0&quot; (#__1) i totes les seves subtasques s'han enllaçat a la tasca #__2" // title, id, new parent id
                           ,"err_conflict" => "<b>Error:</b> Aquesta tasca no s'ha guardat.<br>Aquesta tasca ha estat actualitzada per un altre usuari mentre heu iniciat la seva edició. Siusplau, reviseu les diferències que apareixen a sota i guardeu-lo de nou.  <p>L'última versió de la tasca que preteneu guardar és de __0;<br>la versió actual de la base de dades és de __1"
			  ,"err_date_format" => "<b>Error:</b> Hi ha un error en el  <b>\$custom->date_format</b> a 'config.php'. El vostre valor: '__0' no conté un o més dels caràcters 'm', 'd', 'y'. Siusplau feu la correspent correció a 'config.php'." // date_format
                           ,"err_event_type" => "<b>Error:</b> Hi ha una error en el <b>\$custom->ical_export_type</b> a  'config.php'. El vostre valor: '__0' no és 'event' o 'todo'. Siusplau feu la corresponent correció a 'config.php'." // ical_export_type
                           ,"err_invalid_date" => "<b>Error:</b> Aquesta tasca no s'ha guardat perquè la data especificada no és vàlida. Arregleu o borreu la data i guardeu la tasca."
                           ,"err_invalid_parent" => "<b>Error:</b> La tasca #__0 s'ha marcat com la tasca pare, però no existeix cap tasca amb aquest ID. Siusplau, sol·lucioneu aquest problema i guardeu la tasca de nou." // id
                           ,"err_loop" => "<b>Error:</b> Guardar aquesta tasca amb aquest ID pare pot induir a un bucle infinit."
                           ,"err_no_root" => "Error: No hi ha branca principal."
                           ,"err_own_parent" => "<b>Error:</b> Una tasca no pot ser el seu propi pare."
                           ,"err_search_date_after" => "<b>Error:</b> Aquesta cerca no trobarà cap tasca, ja que el valor de la 'Data Pendent és posterior:' no és correcte. Corregiu o borreu la data pendent i proveu de nou la cerca."
                           ,"err_search_date_before" => "<b>Error:</b> Aquesta cerca no trobarà cap tasca, ja que el valor de la 'Data Pendent és anterior:' no és correcte. Corregiu o borreu la data pendent i proveu de nou la cerca."
                           ,"err_search_date_exact" => "<b>Error:</b> Aquesta cerca no trobarà cap tasca, ja que el valor de la 'Data Pendent és exactament:' no és correcte. Corregiu o borreu la data pendent i proveu de nou la cerca."
                           ,"js_abandon_changes" => "Abandonar sense guardar els canvis?"
                           ,"js_complete_confirm" => "Voleu tancar \\naquesta tasca sense introduir cap \\nnota de clausura?"
                           ,"js_complete_prompt" => "Entrar una nota de clausura a aquesta tasca."
                           ,"js_err_edit_date" => "El valor actual del camp Data Pendent no és una data vàlida.\\nModifiqueu o borreu aquest valor abans de guardar."
                           ,"js_err_search_date_after" => "El valor actual del camp 'Data Pendent és posterior:' no és una data vàlida."
                           ,"js_err_search_date_before" => "El valor actual del camp 'Data Pendent és anterior:' no és una data vàlida."
                           ,"js_err_search_date_exact" => "El valor actual del camp 'Data Pendent és exactament:' no és una data vàlida."
                           ,"js_err_search_date_range" => "La data 'Data Pendent és posterior:' ha de ser anterior a la data 'Data Pendent és anterior:'"
                           ,"js_err_search_errors" => "Avís - Cal solucionar els següents errors\\n per tal que la cerca pugui retornar els resultats: \\n"
                           ,"js_err_search_id_invalid" => "El camp 'ID' ha d'estar buit o tenir un valor numèric superior a 0."
                           ,"js_err_search_parent_invalid" => "El camp 'Pare' ha d'estar buit o tenir un valor numèric superior a 0."
                           ,"js_err_search_status_exact" => "El camp 'Estat és exactament': ha de tenir un valor numèric entre 0 i 100."
                           ,"js_err_search_status_less" => "El camp 'Estat és inferior a:' ha d'estar buit o tenir un valor numèric entre 0 i 100."
                           ,"js_err_search_status_more" => "El camp 'Estat és superior a:' ha d'estar buit o tenir un valor numèric entre 0 i 100."
                           ,"js_err_search_status_range" => "El camp 'Estat és inferior a:' ha de ser superior al camp 'Estat és superior a:'."
                           ,"js_loading_text" => "Carregant..."
                           ,"js_nothing_to_save" => "Perdó, no hi ha res a guardar en aquesta pantalla."
                           ,"js_parent_required" => "Heu d'especificar la tasca pare d'aquesta tasca per tal \\nde veure la tasca pare després de guardar-la."
                           ,"mail_sent" => "S'han enviat els recordatoris diaris via correu electrònic."
                           ,"mobile_resolve_instructions" => "Les dades que heu introduit apareixeran sota la versió actual de les dades present a la base de dades. Feu els canvis que considereu necessaris i posteriorment apreteu 'Salvar'."

                           ,"no_email" => "Siusplau, afegiu la vostra adreça de correu electrònic a config.php."
                           ,"parent_changed" => "La tasca pare ha canviat de __0 a __1." // old parent id, new parent id
                           ,"saved" => "Tasca Guardada #__0 (__1) a __2." // id, title, timestamp
                           ,"title" => "Missatges"
                           ,"warn_deleted" => "<b>Avís:</b> Aquesta tasca ja s'ha borrat."
                           );

$language->misc = array("all_rights_reserved" => "tots els drets reservats."
                       ,"copyright" => "copyright"
                       ,"count_open" => "__0 Tasques Obertes" // number
                       ,"count_total" => "__0 Tasques" // number
                       ,"hide_completed" => "Amagar Tasques Completades"
                       ,"jump_to" => "Anar a..."
			,"quick_search" => "Cerca ràpida"
                       ,"show_completed" => "Mostrar Tasques Completades"
                       ,"timer" => "pantalla renderitzada en __0 segons." // seconds
                       ,"version" => "versió __0" // number
                       );

$language->picker = array("date_go" => "Anar a"
                         ,"date_key_selected" => "Data Sel·leccionada"
                         ,"date_key_today" => "Data d'avui"
                         ,"date_next" => "Següent"
                         ,"date_previous" => "Anterior"
                         ,"date_today" => "Avui"
                         ,"days" => "'Dg','Dl','Dm','Dc','Dj','Dv','Ds'"
                         ,"months" => "'gener','febrer','març','abril','maig','juny','juliol','agost','setembre','octubre','novembre','desembre'"
                         ,"parent_title" => "Sel·leccionar la tasca pare"
                         );

$language->resolve = array("append" => "Afegir"
                          ,"current_version" => "Versió Actual"
                          ,"form_title" => "Els següents camps tenen diferències"
                          ,"none" => "(buit)"
                          ,"save" => "Guardar"
                          ,"use" => "Utilitzar"
                          ,"your_data" => "La teva data"
                          );

$language->search = array("after" => "és posterior:"
                         ,"before" => "és anterior:"
                         ,"exactly" => "és exactament:"
                         ,"form_title" => "Criteri de Cerca"
                         ,"include_completed" => "Incloure Tasques Completades"
                         ,"instructions" => "Entrar paraules o parts de les parules que apareixen al títol i/o notes de les tasques que voleu cercar. Per defecte, la cerca només troba les entrades que contenen totes les paraules de la cerca. Premeu sobre  &quot;Més Opcions de Cerca&quot; per veure les criteris de cerca addicionals."
                         ,"less_than" => "és inferior a :"
                         ,"more_options" => "Més Opcions de Cerca"
                         ,"more_than" => "és superior a:"
                         ,"results_title" => "Resultats Cerca"
                         ,"search_button" => "Cerca"
                         );

$language->toolbar = array("b2_tip" => "Enviar a b2"
                          ,"date_time" => "Insertar Data/Hora"
                          ,"date_time_tip" => "Insertar la Data/Hora actual al camp Notes"
                          ,"delete" => "Borrar"
                          ,"edit" => "Editar"
                          ,"mark_complete" => "Marcar com a completada"
                          ,"mark_complete_m" => "100%"
                          ,"mt_tip" => "Enviar a Tipus Movible"
                          ,"new_sub" => "Nova Subtasca"
                          ,"new_sub_m" => "Nova Sub"
                          ,"save" => "<u>G</u>uardar"
                          ,"save_alt" => "Guardar"
                          ,"save_as_new" => "Guardar com a Nova Tasca"
                          ,"wp_tip" => "Enviar a WordPress"
                          );

$language->tree = array("due" => "Pendent:"
                       ,"id" => "ID:"
                       ,"loading" => $language->messages["js_loading_text"] // no need to set this
                       ,"open_sub_task" => '1 Obrir Subtasca <span style="color: #666;">(__0 Total)</span>' // number
                       ,"open_sub_tasks" => '__0 Obrir Subtasques <span style="color: #666;">(__1 Total)</span>' // number, number
                       ,"status" => "__0% Completat" // number (0-100)
                       );

?>

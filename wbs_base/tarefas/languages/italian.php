<?

// italian

$language = new language;

$language->name = "Italiano";
$language->author = "Tiziano Solignani";
$language->author_email = "solignani@solignani.it";
$language->author_web = "http://www.solignani.it";

$language->charset = "utf-8";

$language->about = array("tagline" => "tieni tutto organizzato e completa gli impegni."
                        ,"documentation" => "Documentazione"
                        ,"read_me" => "Leggimi"
                        ,"license" => "Licenza"
                        ,"download" => "download"
                        ,"this_version" => "Versione corrente: __0"
                        ,"latest_version" => "Ultima versione stabile: __0"
                        ,"beta_version" => "Ultima versione beta: __0"
                        ,"using_latest" => "Stai usando l'ultima versione disponibile."
                        ,"using_beta" => "Stai usando l'ultima versione beta disponibile."
                        ,"feedback" => "Feedback e suggerimenti:"
                        ,"web" => "Web:"
                        ,"credits" => "Credits"
                        ,"main_credit" => "Tasks Jr. è stato concepito e realizzato da <nobr>Alex King</nobr>. E' stato localizzato in questi linguaggi grazie ai seguenti generosi individui:"
                        ,"web_site" => "sito web"
                        ,"email" => "e-mail"
                        );

$language->accesskey = array("calendar" => "c"
                            ,"history" => "r"
                            ,"home" => "h"
                            ,"new_task" => "t"
                            ,"save" => "s"
                            ,"search" => "a"
                            ,"sortable" => "b"
                            ,"title" => "e"
                            ,"upcoming" => "u"
                            );

$language->breadcrumbs = array("history" => "Cronologia"
                              ,"home" => "Home"
                              ,"new_task" => "Nuovo task"
                              ,"search" => "Cerca"
                              ,"search_results" => "Risultati"
                              ,"sortable" => "Lista ordinabile"
                              ,"upcoming" => "Task in scadenza"
                              );

$language->confirm = array("complete_instructions" => "Il task che stai marcando come completo ha sotto-task. Per piacere, scegli come vuoi procedere al riguardo:" // number
                          ,"complete_orphan" => "Marca il task corrente come completo e metti in primo piano i sotto-task"
                          ,"complete_notes" => "Inserisci note di chiusura per questo task:"
                          ,"complete_recursive" => "Marca questo task e tutti i sotto task"
                          ,"complete_remove" => "Marca questo task come completo e collega i suoi sottotask al task di grado superiore"
                          ,"complete_title" => "Opzioni di definizione dei task con sottotask come completi"
                          ,"delete_confirm" => "Sei sicuro che vuoi cancellare questo task?"
                          ,"delete_instructions" => "Il task che stai cancellando ha __0 sotto-task aperta(e). Per piacere scegli come vuoi procedere:" // number
                          ,"delete_orphan" => "Cancella questo task e metti in primo piano i sotto-task"
                          ,"delete_recursive" => "Cancella questo task e tutti i sotto-task"
                          ,"delete_remove" => "Cancella questo task e collegata i suoi sotto-task al task di grado superiore"
                          ,"delete_title" => "Opzioni di eliminazione dei task"
                          ,"delete_title_m" => "Cancella Task"
                          );

$language->data = array("no" => "No"
                       ,"priority_1" => "Bassissima"
                       ,"priority_2" => "Bassa"
                       ,"priority_3" => "Media"
                       ,"priority_4" => "Alta"
                       ,"priority_5" => "Altissima"
                       ,"rel_date" => "__0" // date
                       ,"rel_date_days" => "__0 Giorni" // number
                       ,"rel_date_days_ago" => "__0 Giorni fa" // number
                       ,"rel_date_today" => "Oggi"
                       ,"rel_date_tomorrow" => "Domani"
                       ,"rel_date_week" => "1 Settimana"
                       ,"rel_date_week_ago" => "1 Settimana fa"
                       ,"rel_date_yesterday" => "Ieri"
                       ,"yes" => "S?"
                       );

$language->email_reminders = array("overdue" => "Scadute"
                                  ,"due" => "In scadenza"
                                  ,"upcoming" => "Scadenze prossime"
                                  ,"high_priority" => "Alta priorità"
                                  ,"status" => "Status"
                                  ,"complete" => "% Completata"
                                  ,"priority" => "Priorità"
                                  ,"none" => "(nessuno)"
                                  ,"subject" => "memo task"
                                  );


$language->form = array("1_week" => "1 Settimana"
                       ,"1_year" => "1 Anno"
                       ,"30_days" => "30 Giorni"
                       ,"90_days" => "90 Giorni"
                       ,"after_save" => "Dopo il salvataggio:"
                       ,"choose_date" => "Scegli una data"
                       ,"clear_date" => "Cancella"
                       ,"date_due" => "Data di scadenza:"
                       ,"date_entered" => "Data immessa:"
                       ,"date_modified" => "Modificato da ultimo il:"
                       ,"form_title_edit" => "Modifica il task"
                       ,"form_title_new" => "Nuovo task"
                       ,"id" => "ID:"
                       ,"new_task" => "Nuovo Task"
                       ,"notes" => "Note:"
                       ,"parent" => "Task genitore:"
                       ,"priority" => "Priorit?:"
                       ,"return_home" => "Torna alla Home"
                       ,"status" => "% Completa:"
                       ,"status_label" => "% Completa"
                       ,"stay_here" => "Stai qui"
                       ,"sticky" => "Sticky Task"
                       ,"sticky_label" => "Sticky Task:"
                       ,"title" => "Titolo:"
                       ,"today" => "Oggi"
                       ,"tomorrow" => "Domani"
                       ,"url" => "URL:"
                       ,"urls" => "URLs:"
                       ,"url_1" => "URL 1:"
                       ,"url_2" => "URL 2:"
                       ,"url_3" => "URL 3:"
                       ,"view_parent" => "Vedi il task superiore"
                       ,"view_tree" => "Vedi l'albero"
                       );

$language->home = array("sort_title" => "Ordina per titolo"
                       ,"sort_title_rev" => "Ordina all'inverso per titolo"
                       ,"sort_priority" => "Ordina per priorità"
                       ,"sort_priority_rev" => "Ordina all'inverso per priorità"
                       );

$language->icons = array("completed" => "Task completato"
                        ,"delete" => "Cancella"
                        ,"edit" => "Modifica"
                        ,"hide_show" => "Nascondi/Mostra"
                        ,"hide_show_tip" => "Cancella o mostra pi? informazioni per questo task"
                        ,"mark_complete" => "Segna come completo"
                        ,"new_sub_task" => "Nuovo sottotask"
                        ,"notes_bigger" => "Visualizza il campo NOTE pi? grande"
                        ,"notes_smaller" => "Visualizza il campo NOTE pi? piccolo"
                        ,"parent_picker" => "Scegli una task genitore"
                        ,"priority" => "Priorit?: __0" // result of get_friendly_priority();
                        ,"sticky" => "Sticky Task"
                        ,"tree_toggle" => "Nascondi/Mostra"
                        ,"tree_toggle_tip" => "Nascondi o mostra pi? subtask per questo task"
                        );

$language->list = array("banner" => "Mostrando __0 elemento(i)" // number
                       ,"date_due" => "Data di scadenza"
		       ,"done" => "(fatto)"
                       ,"id" => "ID"
                       ,"no_items" => "Nessun elemento da visualizzare."
                       ,"priority" => "Priorit?"
                       ,"status" => "% Completato"
                       ,"title" => "Titolo"
                       );

$language->list_titles = array("history" => "Ultime 25 task modificate"
                              ,"overdue" => "Task scadute"
                              ,"sortable" => "Lista ordinabile dei task"
                              ,"upcoming" => "Task in scadenza"
                              );

$language->menu = array("calendar" => "<u>C</u>alendario"
                       ,"calendar_tip" => "Clicca qui per vedere i tuoi task nel calendario e aggiornare i dati iCalendar."
                       ,"history" => "C<u>r</u>onologia"
                       ,"history_tip" => "Clicca qui per vedere le ultime 25 task modificate."
                       ,"home" => "<u>H</u>ome"
                       ,"home_tip" => "Clicca qui per andare alla home e vedere tutte le task principali."
                       ,"new_task" => "Nuovo <u>T</u>ask"
                       ,"new_task_tip" => "Clicca qui per creare un nuovo task."
                       ,"search" => "Cerc<u>a</u>"
                       ,"search_tip" => "Clicca qui per cercare un task."
                       ,"sortable" => "Ordina<u>b</u>ile"
                       ,"sortable_tip" => "Clicca qui per vedere una lista ordinabile di task."
                       ,"upcoming" => "<u>I</u>n scadenza"
                       ,"upcoming_tip" => "Clicca qui per vedere tutte le task in scadenze e scadute."
                       );

$language->messages = array("completed" => "Task &quot;__0&quot; (#__1) ∂ stata marcata come completata." // title, id
                           ,"completed_reason" => "Task &quot;__0&quot; (#__1) ∂ stata marcata completata con il seguente motivo:<p style=\"padding-left: 15px;\">__2</p>" // title, id, reason
                           ,"completed_task_link" => "Vedi task completati"
                           ,"completed_task_parent_link" => "Vedi il task principale della task completata"
                           ,"complete_instructions" => "Task #__0 has __1 Sub-Task(s) (__2) Aperta, per favore seleziona l'esito che preferisci del completamento." // id, number, number
                           ,"complete_orphan" => "Task &quot;__0&quot; (#__1) ∂ stata marcata come completata e tutte le sottotask sono state attaccate al task #__2." // title, id, new parent task id
                           ,"complete_orphan" => "Task &quot;__0&quot; (#__1) ∂ stata marcata come completata e tutte le sottotask sono state scollegate dal loro ID genitore." // title, id
                           ,"complete_recursive" => "Task &quot;__0&quot; (#__1) e tutte le sottotask sono state marcate come complete." // title, id
                           ,"confirm_delete" => "Delete task: __0?"
                           ,"deleted" => "Task &quot;__0&quot; (#__1) ∂ stata cancellata." // title, id
                           ,"delete_instructions" => "Task #__0 has __1 Sub-Task(s) (__2) Aperta, per piacere scegli l'esito preferito della cancellazione." // id, number, number
                           ,"delete_orphan" => "Task &quot;__0&quot; (#__1) ∂ stata cancellata e tutte le sottotask sono state rimosse." // title, id
                           ,"delete_recursive" => "Task &quot;__0&quot; (#__1) e tutte le sottotask sono state rimosse." // title, id
                           ,"delete_remove" => "Task &quot;__0&quot; (#__1) ∂ stata cancellata e tutte le sottotask sono state ricollegate alla task #__2" // title, id, new parent id
                           ,"err_conflict" => "<b>Error:</b> Questo task non ∂ stato salvato.<br>Questo task ∂ stato modificato da un altro utente dopo che avevi iniziato a modificarlo. Per piacere, rivediti le differenze indicate di seguito e salva ancora. <p> La versione del task sulla quale hai fatto le modifiche ∂ stata salvata da ultimo il __0;<br>la versione corrente del database ∂ stata salvata il  __1"
                           ,"err_date_format" => "<b>Error:</b> C'è un errore nel tuo <b>\$custom->date_format</b> in 'config.php'. Il tuo valore: '__0' non contiene uno o più 'm', 'd', 'y'. Per piacere modifica e correggi il file 'config.php'." // date_format
                           ,"err_event_type" => "<b>Error:</b> C'è un errore nel tuo <b>\$custom->ical_export_type</b> in 'config.php'. Il tuo valore: '__0' non è  'event' or 'todo'. Per piacere correggi questo nel file 'config.php'." // ical_export_type
                           ,"err_invalid_date" => "<b>Error:</b> Questo task non ∂ stato salvato perch∂ la data indicata ∂ invalida. Correggi o elimina la data di scadenza e poi salva ancora il task."
                           ,"err_invalid_parent" => "<b>Error:</b> Task #__0 era stata indicata come task di base ma non esiste nessun task con quel numero di ID. Per piacere risolvi questo problema e salva ancora." // id
                           ,"err_loop" => "<b>Error:</b> Salvare questo task con la task genitore indicata creerebbe un loop."
                           ,"err_no_root" => "Error: No root was set."
                           ,"err_own_parent" => "<b>Error:</b> Un task non pu? essere genitore di se stessa."
                           ,"err_search_date_after" => "<b>Error:</b> Questa ricerca non trover? nessuna task perch∂ il campo 'Data di scadenza ∂ dopo: ∂ invalido. Correggi o elimina la chiave di ricerca relativa alla data di scadenza e cerca ancora."
                           ,"err_search_date_before" => "<b>Error:</b> Questa ricerca non trover? nessuna task perch∂ il campo 'Data di scadenza ∂ prima: ∂ invalido. Correggi o elimina la chiave di ricerca relativa alla data di scadenza e cerca ancora."
                           ,"err_search_date_exact" => "<b>Error:</b> Questa ricerca non trover? nessuna task perch∂ il campo 'Data di scadenza ∂ esattamente: ∂ invalido. Correggi o elimina la chiave di ricerca relativa alla data di scadenza e cerca ancora."
                           ,"js_abandon_changes" => "Esci senza salvare?!?"
                           ,"js_complete_confirm" => "Sei sicuro che vuoi chiudere questo task senza mettere note di chiusura?"
                           ,"js_complete_prompt" => "Inserisci le note di chiusura per questo task."
                           ,"js_err_edit_date" => "Il valore corrente della Data di Scadenza non ∂ una data valida.nCambia o elimina questo valore prima di salvare."
                           ,"js_err_search_date_after" => "Il valore corrente del campo 'Data di Scadenza ∂ dopo:' non ∂ una data valida."
                           ,"js_err_search_date_before" => "Il valore corrente del campo 'Data di Scadenza ∂ prima:' non ∂ una data valida."
                           ,"js_err_search_date_exact" => "Il valore corrente del campo 'Data di Scadenza ∂ esattamente:' non ∂ una data valida."
                           ,"js_err_search_date_range" => "Il campo 'Data di Scadenza ∂ dopo:' deve essere prima di 'Data di scadenza ∂ prima:' come data."
                           ,"js_err_search_errors" => "Warning - IL seguente problema deve essere correttonprima che tu possa avere risultati di ricerca: n"
                           ,"js_err_search_id_invalid" => "Il campo 'ID' deve essere vuoto o avere un valore numerico maggiore di 0."
                           ,"js_err_search_parent_invalid" => "Il campo 'Parent' deve essere vuoto o avere un valore numerico maggiore di 0."
                           ,"js_err_search_status_exact" => "Il campo 'Status is exactly:' deve essere vuoto o avere un valore numerico maggiore di 0."
                           ,"js_err_search_status_less" => "Il campo 'Status is less than:' deve essere vuoto o avere un valore numerico maggiore di 0."
                           ,"js_err_search_status_more" => "Il campo 'Status is more than:' deve essere vuoto o avere un valore tra 0 e 100."
                           ,"js_err_search_status_range" => "Il campo 'Status is less than:' deve essere maggiore del campo 'Status is more than:'."
                           ,"js_loading_text" => "Caricando..."
                           ,"js_nothing_to_save" => "Sorry, there is nothing to save on this screen."
                           ,"mail_sent" => "Memo giornalieri sono stati inviati via mail."
                           ,"mobile_resolve_instructions" => "La data che hai inserito verrà mostrato sotto la versione attualmente nel database. Fai ogni modifica che vuoi, poi clicca su 'Salva'."
                           ,"no_email" => "Per piacere aggiungi tuo e-mail in config.php."

			   ,"js_parent_required" => "Devi specificare un genitore per uqesto task pernvedere la task genitore prima di salvare."
                           ,"parent_changed" => "Task genitore ha cambiando da __0 to __1." // vecchio id genitore, nuovo id genitore
                           ,"saved" => "Task salvata #__0 (__1) at __2." // id, title, timestamp
                           ,"title" => "Messaggi"
                           ,"warn_deleted" => "<b>Warning:</b> Questo task ∂ gi? cancellato."
                           );

$language->misc = array("all_rights_reserved" => "Tutti i diritti riservati."
                       ,"copyright" => "copyright"
                       ,"count_open" => "__0 Open Tasks" // number
                       ,"count_total" => "__0 Tasks" // number
                       ,"hide_completed" => "Nascondi le task completate"
                       ,"jump_to" => "Vai a ..."
                       ,"quick_search" => "Ricerca veloce"
                       ,"show_completed" => "Mostra le task completate"
                       ,"timer" => "schermata resa in __0 secondi." // seconds
                       ,"version" => "versione __0"
                       );

$language->picker = array("date_go" => "Vai"
                         ,"date_key_selected" => "Data correntemente selezionata"
                         ,"date_key_today" => "Data di oggi"
                         ,"date_next" => "Prossimo"
                         ,"date_previous" => "Precente"
                         ,"date_today" => "Oggi"
                         ,"days" => "'Dom','Lun','Mar','Mer','Gio','Ven','Sab'"
                         ,"months" => "'Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'"
                         ,"parent_title" => "Scegli un task genitore"
                         );

$language->resolve = array("append" => "Appendi"
                          ,"current_version" => "Versione corrente"
                          ,"form_title" => "I campi seguenti hanno delle differenze"
                          ,"none" => "(nessuno)"
                          ,"save" => "Salva"
                          ,"use" => "Usa"
                          ,"your_data" => "Tuoi dati"
                          );

$language->search = array("after" => "∂ dopo:"
                         ,"before" => "∂ prima:"
                         ,"exactly" => "∂ esattamente:"
                         ,"form_title" => "Criteri di ricerca"
                         ,"include_completed" => "Includi le Task Completate"
                         ,"instructions" => "Inserisci le parole o parti di parole che appaiono nel titolo o nelle note delle task che vuoi trovare. Per default, la ricerca trova solo le task che contengono tutti i termini di ricerca. Clicca su &quot;More Search Options&quot; per vedere ulteriori criteri di ricerca."
                         ,"less_than" => "∂ minore di:"
                         ,"more_options" => "Piˇ opzioni di ricerca"
                         ,"more_than" => "∂ piˇ di:"
                         ,"results_title" => "Risultati della ricerca"
                         ,"search_button" => "Cerca"
                         );

$language->toolbar = array("b2_tip" => "Post to b2"
                          ,"date_time" => "Inserisci Data/Ora"
                          ,"date_time_tip" => "Inserisci la data/ora correnti nel campo note"
                          ,"delete" => "Cancella"
                          ,"edit" => "Edita"
                          ,"mark_complete" => "Marca come completata"
                          ,"mark_complete_m" => "100%"
                          ,"mt_tip" => "Post to Movable Type"
                          ,"new_sub" => "Nuovo Sotto-Task"
                          ,"new_sub_m" => "Nuovo Sub-task"
                          ,"save" => "<u>S</u>alva"
                          ,"save_alt" => "Salva"
                          ,"save_as_new" => "Save come Nuovo Task"
                          ,"wp_tip" => "Posta a WordPress"
                          );

$language->tree = array("due" => "Scadenza:"
                       ,"id" => "ID:"
                       ,"loading" => $language->messages["js_loading_text"]
                       ,"open_sub_task" => '1 Apri Sotto-Task <span style="color: #666;">(__0 Total)</span>' // number
                       ,"open_sub_tasks" => '__0 Apri i Sotto-Tasks <span style="color: #666;">(__1 Total)</span>' // number, number
                       ,"status" => "__0% Completato" // number (0-100)
                       );

?>

<?

// english

$language = new language;

$language->name = "Portuguese";
$language->author = "Alex King";
$language->author_email = "software@alexking.org";
$language->author_web = "http://www.alexking.org/";

$language->charset = "utf-8";

// uncomment this if you need to increase the font size from 10px
// $language->font_size = "10px;"; 

$language->about = array("tagline" => "keep stuff organized and get it done."
                        ,"documentation" => "Documenta��o"
                        ,"read_me" => "Para Ler!"
                        ,"license" => "Licen�a"
                        ,"download" => "Download"
                        ,"this_version" => "Esta Vers�o: __0" // number
                        ,"latest_version" => "�ltima Edi��o Vers�o: __0" // number
                        ,"beta_version" => "�ltima Edi��o Beta: __0" // number
                        ,"using_latest" => "Est� a utilizar a �ltima vers�o dispon�vel."
                        ,"using_beta" => "Est� a utilizar a �ltima vers�o beta dispon�vel."
                        ,"feedback" => "Opini�es e Sugest�es:"
                        ,"web" => "Web:"
                        ,"credits" => "Cr�ditos"
                        ,"main_credit" => "Tasks Jr. � um conceito e cria��o de <nobr>Alex King</nobr>. Foi traduzido para os seguintes idiomas pelos generosos indiv�duos que se seguem:"
                        ,"web_site" => "p�gina na internet"
                        ,"email" => "correio electronico"
                        );

$language->accesskey = array("calendar" => "c"
                            ,"history" => "y"
                            ,"home" => "h"
                            ,"new_task" => "t"
                            ,"save" => "s"
                            ,"search" => "a"
                            ,"sortable" => "b"
                            ,"title" => "e"
                            ,"upcoming" => "u"
                            );

$language->breadcrumbs = array("history" => "Hist�ria"
                              ,"home" => "Home"
                              ,"new_task" => "Nova Tarefa"
                              ,"search" => "Procurar"
                              ,"search_results" => "Resultados da Pesquisa"
                              ,"sortable" => "Resultados Organizados da Pesquisa Task"
                              ,"upcoming" => "Pr�ximas Tarefas"
                              );

$language->confirm = array("complete_instructions" => "A tarefa que marcou como terminada tem __0 open sub-task(s). Por favor escolha como continuar" // number
                          ,"complete_orphan" => "Marque esta farefa como completa e defina a(s) sua(s) sub-tarefa(s) como n�o tendo PARENT"
                          ,"complete_notes" => "Enter closing notes for this task:"
                          ,"complete_recursive" => "Marque esta tarefa e a(s) sua(s) sub_tarefa(s) como completa"
                          ,"complete_remove" => "Mark this task complete and attach its sub-task(s) to its parent task"
                          ,"complete_title" => "Complete Task Options"
                          ,"delete_confirm" => "Tem a certeza de que quer apagar esta tarefa?"
                          ,"delete_instructions" => "The task you are deleting has __0 open sub-task(s). Please choose how to proceed:" // number
                          ,"delete_orphan" => "Delete this task and set its sub-task(s) to have no parent"
                          ,"delete_recursive" => "Apague esta tarefa e a(s) sua(s) sub_tarefa(s) "
                          ,"delete_remove" => "Apague esta tarefa e anexe a(s) sua(s) sub-tarefa(s) a sua tarefa m�e"
                          ,"delete_title" => "Apagar as op��es de tarefa"
                          ,"delete_title_m" => "Apagar tarefa"
                          );

$language->data = array("no" => "No"
                       ,"priority_1" => "Menos Importante"
                       ,"priority_2" => "Pouco Importante"
                       ,"priority_3" => "Normal"
                       ,"priority_4" => "Importante"
                       ,"priority_5" => "Muito Importante"
                       ,"rel_date" => "__0" // date
                       ,"rel_date_days" => "__0 Days" // number
                       ,"rel_date_days_ago" => "__0 Days Ago" // number
                       ,"rel_date_today" => "Hoje"
                       ,"rel_date_tomorrow" => "Amanh�"
                       ,"rel_date_week" => "1 Semana"
                       ,"rel_date_week_ago" => "Semana Passada"
                       ,"rel_date_yesterday" => "Ontem"
                       ,"yes" => "Sim"
                       );

$language->email_reminders = array("overdue" => "Overdue"
                                  ,"due" => "Due"
                                  ,"upcoming" => "Upcoming"
                                  ,"high_priority" => "Priorit�rio"
                                  ,"status" => "Status"
                                  ,"complete" => "% Completo"
                                  ,"priority" => "Prioridade"
                                  ,"none" => "(none)"
                                  ,"subject" => "lembrete de tarefa"
                                  );

$language->form = array("1_week" => "1 Semana"
                       ,"1_year" => "1 Ano"
                       ,"30_days" => "30 Dias"
                       ,"90_days" => "90 Dias"
                       ,"after_save" => "After Save:"
                       ,"choose_date" => "Choose Date"
                       ,"clear_date" => "Limpar"
                       ,"date_due" => "Date Due:"
                       ,"date_entered" => "Date Entered:"
                       ,"date_modified" => "Last Modified:"
                       ,"form_title_edit" => "Editar Tarefa"
                       ,"form_title_new" => "Nova Tarefa"
                       ,"id" => "ID:"
                       ,"new_task" => "Nova Tarefa "
                       ,"notes" => "Notas:"
                       ,"parent" => "Parent:"
                       ,"priority" => "Prioridade:"
                       ,"return_home" => "Voltar a Home"
                       ,"status" => "% Completo:"
                       ,"status_label" => "% Completo"
                       ,"stay_here" => "Stay Here"
                       ,"sticky" => "Sticky Task"
                       ,"sticky_label" => "Sticky Task:"
                       ,"title" => "Titl<u>e</u>:"
                       ,"today" => "Hoje"
                       ,"tomorrow" => "Amanh�"
                       ,"url" => "URL:"
                       ,"urls" => "URLs:"
                       ,"url_1" => "URL 1:"
                       ,"url_2" => "URL 2:"
                       ,"url_3" => "URL 3:"
                       ,"view_parent" => "View Parent Task"
                       ,"view_tree" => "View Tree"
                       );

$language->home = array("sort_title" => "Sort by Title"
                       ,"sort_title_rev" => "Reverse sort by Title"
                       ,"sort_priority" => "Sort by Priority"
                       ,"sort_priority_rev" => "Reverse sort by Priority"
                       );

$language->icons = array("completed" => "Tarefa Cumprida"
                        ,"delete" => "Apagar"
                        ,"edit" => "Editar"
                        ,"hide_show" => "Esconder/Mostrar"
                        ,"hide_show_tip" => "Hide or show more information for this task"
                        ,"mark_complete" => "Mark Complete"
                        ,"new_sub_task" => "New Sub-Task"
                        ,"notes_bigger" => "Make Notes field bigger"
                        ,"notes_smaller" => "Make Notes field smaller"
                        ,"parent_picker" => "Choose a parent task"
                        ,"priority" => "Priority: __0" // result of get_friendly_priority();
                        ,"sticky" => "Sticky Task"
                        ,"tree_toggle" => "Hide/Show"
                        ,"tree_toggle_tip" => "Hide or show more sub-tasks for this task"
                        );

$language->list = array("banner" => "Showing __0 Item(s)" // number
                       ,"date_due" => "Date Due"
                       ,"done" => "(done)"
                       ,"id" => "ID"
                       ,"no_items" => "No items to display."
                       ,"priority" => "Priority"
                       ,"status" => "% Complete"
                       ,"title" => "Title"
                       );

$language->list_titles = array("history" => "Last 25 Modified Tasks"
                              ,"overdue" => "Overdue Tasks"
                              ,"sortable" => "Sortable Task List"
                              ,"upcoming" => "Upcoming Tasks"
                              );

$language->menu = array("calendar" => "<u>C</u>alendar"
                       ,"calendar_tip" => "Click here to see a calendar view of your tasks."
                       ,"history" => "Histor<u>y</u>"
                       ,"history_tip" => "Click here to see the last 25 modified tasks."
                       ,"home" => "<u>H</u>ome"
                       ,"home_tip" => "Click here to go to the Home screen which displays all root tasks."
                       ,"new_task" => "New <u>T</u>ask"
                       ,"new_task_tip" => "Click here to create a new task."
                       ,"search" => "Se<u>a</u>rch"
                       ,"search_tip" => "Click here to search for a task."
                       ,"sortable" => "Sorta<u>b</u>le"
                       ,"sortable_tip" => "Click here to view a sortable list of tasks."
                       ,"upcoming" => "<u>U</u>pcoming"
                       ,"upcoming_tip" => "Click here to see all upcoming and overdue tasks."
                       );

$language->messages = array("completed" => "Task &quot;__0&quot; (#__1) has been marked complete." // title, id
                           ,"completed_reason" => 'Task &quot;__0&quot; (#__1) has been marked complete with reason:<p style="padding-left: 15px;">__2</p>' // title, id, reason
                           ,"completed_task_link" => "View Completed Task"
                           ,"completed_task_parent_link" => "View Completed Task's Parent"
                           ,"complete_instructions" => "Task #__0 has __1 Sub-Task(s) (__2) Open, please choose your desired complete behavior." // id, number, number
                           ,"complete_orphan" => "Task &quot;__0&quot; (#__1) has been marked complete and all children have been attached to task #__2." // title, id, new parent task id
                           ,"complete_orphan" => "Task &quot;__0&quot; (#__1) has been marked complete and all of its sub-tasks have had their parent IDs removed." // title, id
                           ,"complete_recursive" => "Task &quot;__0&quot; (#__1) and all children have marked complete." // title, id
                           ,"confirm_delete" => "Delete task: __0?"
                           ,"deleted" => "Task &quot;__0&quot; (#__1) has been deleted." // title, id
                           ,"delete_instructions" => "Task #__0 has __1 Sub-Task(s) (__2) Open, please choose your desired delete behavior." // id, number, number
                           ,"delete_orphan" => "Task &quot;__0&quot; (#__1) has been deleted and all children have had their parent IDs removed." // title, id
                           ,"delete_recursive" => "Task &quot;__0&quot; (#__1) and all children have been deleted." // title, id
                           ,"delete_remove" => "Task &quot;__0&quot; (#__1) has been deleted and all children have been attached to task #__2" // title, id, new parent id
                           ,"err_conflict" => "<b>Error:</b> This task was not saved.<br>This task was updated by another user since you started editing it. Please review the differences listed below and save again. <p>The version of this task you made changes to was last saved on __0;<br>the current version in the database was saved on __1"
                           ,"err_date_format" => "<b>Error:</b> There is an error in your <b>\$custom->date_format</b> in 'config.php'. Your value: '__0' does not contain one or more of 'm', 'd', 'y'. Please correct this in 'config.php'." // date_format
                           ,"err_event_type" => "<b>Error:</b> There is an error in your <b>\$custom->ical_export_type</b> in 'config.php'. Your value: '__0' is not 'event' or 'todo'. Please correct this in 'config.php'." // ical_export_type
                           ,"err_invalid_date" => "<b>Error:</b> This task was not saved because the specified date is invalid. Correct or clear the due date and then save the task."
                           ,"err_invalid_parent" => "<b>Error:</b> Task #__0 was specified as the parent task but no task with that ID exists. Please address this problem and Save again." // id
                           ,"err_loop" => "<b>Error:</b> Saving this task with the specified parent would create an infinite loop."
                           ,"err_no_root" => "Error: No root was set."
                           ,"err_own_parent" => "<b>Error:</b> A task cannot be its own parent."
                           ,"err_search_date_after" => "<b>Error:</b> This search will not find any tasks because the specified 'Date Due is after:' value is invalid. Correct or clear the due date and try your search again."
                           ,"err_search_date_before" => "<b>Error:</b> This search will not find any tasks because the specified 'Date Due is before:' value is invalid. Correct or clear the due date and try your search again."
                           ,"err_search_date_exact" => "<b>Error:</b> This search will not find any tasks because the specified 'Date Due is exactly:' value is invalid. Correct or clear the due date and try your search again."
                           ,"js_abandon_changes" => "Leave without saving your changes?"
                           ,"js_complete_confirm" => "Are you sure you want to close\\nthis task without entering any\\nclosing notes?"
                           ,"js_complete_prompt" => "Enter closing notes for this task."
                           ,"js_err_edit_date" => "The current value in the Date Due field is not a valid date.\\nChange or clear this value before saving."
                           ,"js_err_search_date_after" => "The current value in the 'Date Due is after:' field is not a valid date."
                           ,"js_err_search_date_before" => "The current value in the 'Date Due is before:' field is not a valid date."
                           ,"js_err_search_date_exact" => "The current value in the 'Date Due is exactly:' field is not a valid date."
                           ,"js_err_search_date_range" => "The 'Date Due is after:' date must be before the 'Date Due is before:' date."
                           ,"js_err_search_errors" => "Warning - The following problems need to be corrected\\nbefore your search can return any results: \\n"
                           ,"js_err_search_id_invalid" => "The 'ID' field must be empty or have a numeric value greater than 0."
                           ,"js_err_search_parent_invalid" => "The 'Parent' field must be empty or have a numeric value greater than 0."
                           ,"js_err_search_status_exact" => "The 'Status is exactly:' field must have a numeric value between 0 and 100."
                           ,"js_err_search_status_less" => "The 'Status is less than:' field must be empty or have a numeric value between 0 and 100."
                           ,"js_err_search_status_more" => "The 'Status is more than:' field must be empty or have a numeric value between 0 and 100."
                           ,"js_err_search_status_range" => "The 'Status is less than:' field must be greater than the 'Status is more than:' field."
                           ,"js_loading_text" => "Loading..."
                           ,"js_nothing_to_save" => "Sorry, there is nothing to save on this screen."
                           ,"js_parent_required" => "You must specify a parent for this task to\\nview the task's parent after the save."
                           ,"mail_sent" => "Daily reminders have been e-mailed."
                           ,"mobile_resolve_instructions" => "The data you entered will be shown below the version that is currently in the database. Make whatever changes you need to, then click 'Save'."
                           ,"no_email" => "Please add your email address in config.php."
                           ,"parent_changed" => "Task parent changed from __0 to __1." // old parent id, new parent id
                           ,"saved" => "Saved Task #__0 (__1) at __2." // id, title, timestamp
                           ,"title" => "Messages"
                           ,"warn_deleted" => "<b>Warning:</b> This task is already deleted."
                           );

$language->misc = array("all_rights_reserved" => "all rights reserved."
                       ,"copyright" => "copyright"
                       ,"count_open" => "__0 Open Tasks" // number
                       ,"count_total" => "__0 Tasks" // number
                       ,"hide_completed" => "Hide Completed Tasks"
                       ,"jump_to" => "Jump to..."
                       ,"quick_search" => "Quick Search"
                       ,"show_completed" => "Show Completed Tasks"
                       ,"timer" => "screen rendered in __0 seconds." // seconds
                       ,"version" => "version __0" // number
                       );

$language->picker = array("date_go" => "Go"
                         ,"date_key_selected" => "Currently Selected Date"
                         ,"date_key_today" => "Today's Date"
                         ,"date_next" => "Next"
                         ,"date_previous" => "Previous"
                         ,"date_today" => "Today"
                         ,"days" => "'Sun','Mon','Tue','Wed','Thu','Fri','Sat'"
                         ,"months" => "'January','February','March','April','May','June','July','August','September','October','November','December'"
                         ,"parent_title" => "Choose a parent task"
                         );

$language->resolve = array("append" => "Append"
                          ,"current_version" => "Current Version"
                          ,"form_title" => "The following fields have differences"
                          ,"none" => "(none)"
                          ,"save" => "Save"
                          ,"use" => "Use"
                          ,"your_data" => "Your Data"
                          );

$language->search = array("after" => "is after:"
                         ,"before" => "is before:"
                         ,"exactly" => "is exactly:"
                         ,"form_title" => "Search Criteria"
                         ,"include_completed" => "Include Completed Tasks"
                         ,"instructions" => "Enter words or parts of words that appear in the title and/or notes of tasks you want to search for. By default, the search finds only records that contain all of the search terms you enter. Click on &quot;More Search Options&quot; to see additional search criteria."
                         ,"less_than" => "is less than:"
                         ,"more_options" => "More Search Options"
                         ,"more_than" => "is more than:"
                         ,"results_title" => "Search Results"
                         ,"search_button" => "Search"
                         );

$language->toolbar = array("b2_tip" => "Post to b2"
                          ,"date_time" => "Inserir Data/Hora"
                          ,"date_time_tip" => "Insert current date/time in Notes field"
                          ,"delete" => "Apagar"
                          ,"edit" => "Editar"
                          ,"mark_complete" => "Mark Complete"
                          ,"mark_complete_m" => "100%"
                          ,"mt_tip" => "Post to Moveable Type"
                          ,"new_sub" => "New Sub-Task"
                          ,"new_sub_m" => "New Sub"
                          ,"save" => "<u>S</u>ave"
                          ,"save_alt" => "Save"
                          ,"save_as_new" => "Guardar como Nova Tarefa"
                          ,"wp_tip" => "Post to WordPress"
                          );

$language->tree = array("due" => "Due:"
                       ,"id" => "ID:"
                       ,"loading" => $language->messages["js_loading_text"] // no need to set this
                       ,"open_sub_task" => '1 Open Sub-Task <span style="color: #666;">(__0 Total)</span>' // number
                       ,"open_sub_tasks" => '__0 Open Sub-Tasks <span style="color: #666;">(__1 Total)</span>' // number, number
                       ,"status" => "__0% Complete" // number (0-100)
                       );

?>
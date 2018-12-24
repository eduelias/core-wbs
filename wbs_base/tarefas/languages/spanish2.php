<?

// english

$language = new language;

$language->name = "Spanish";
$language->author = "Jorge Robles";
$language->author_email = "software@alexking.org";
$language->author_web = "http://www.alexking.org/";

$language->charset = "iso-8859-1";

// uncomment this if you need to increase the font size from 10px
// $language->font_size = "10px;";

$language->about = array("tagline" => "manten las cosas organizadas y realizadas."
                        ,"documentation" => "Documentaci&oacute;n"
                        ,"read_me" => "Leeme"
                        ,"license" => "Licencia"
                        ,"download" => "Descargar"
                        ,"this_version" => "Esta versi&oacute;n: __0" // number
                        ,"latest_version" => "&Uacute;ltima versi&oacute;n de funcional: __0" // number
                        ,"beta_version" => "&Uacute;ltima versi&oacute;n Beta: __0" // number
                        ,"using_latest" => "Est&aacute;s usando la &uacute;ltima versi&oacute;n disponible."
                        ,"using_beta" => "Est&aacute;s usando la &uacute;ltima versi&oacute;n Beta disponible."
                        ,"feedback" => "Sugerencias y pareceres:"
                        ,"web" => "Web:"
                        ,"credits" => "Cr&eacute;ditos"
                        ,"main_credit" => "Tasks Jr. fue conceptualizada y creada por <nobr>Alex King</nobr>. Ha sido traducida en los siguientes lenguages por los siguientes individuos generosos:"
                        ,"web_site" => "Sitio Web"
                        ,"email" => "e-mail"
                        );

$language->accesskey = array("calendar" => "c"
                            ,"history" => "h"
                            ,"home" => "i"
                            ,"new_task" => "n"
                            ,"save" => "s"
                            ,"search" => "b"
                            ,"sortable" => "o"
                            ,"title" => "t"
                            ,"upcoming" => "p"
                            );

$language->breadcrumbs = array("history" => "Historia"
                              ,"home" => "Inicio"
                              ,"new_task" => "Nueva Tarea"
                              ,"search" => "Buscar"
                              ,"search_results" => "Buscar Resultados"
                              ,"sortable" => "Lista de tareas organizable"
                              ,"upcoming" => "Tareas pendientes"
                              );

$language->confirm = array("complete_instructions" => "La tarea que est&aacute;s marcando como completada tiene las siguientes  __0 subtareas pendientes. Elije como proceder:" // number
                          ,"complete_orphan" => "Marcar esta tarea completada y poner sus subtareas sin tarea madre"
                          ,"complete_notes" => "Introducir notas finales a esta tarea:"
                          ,"complete_recursive" => "Marcar esta tarea y sus subtareas como completadas"
                          ,"complete_remove" => "Marcar esta tarea completa y sus subtareas trasladarlas a la tarea madre de esta tarea"
                          ,"complete_title" => "Opciones de completar tarea"
                          ,"delete_confirm" => "&iquest;Est&aacute;s seguro de querer eliminar esta tarea?"
                          ,"delete_instructions" => "La tarea que estas eliminando tiene __0 subtareas pendientes. Elije como proceder:" // number
                          ,"delete_orphan" => "Eliminar esta tarea y poner sus subtareas sin tarea madre"
                          ,"delete_recursive" => "Eliminar esta tarea y sus subtareas"
                          ,"delete_remove" => "Eliminar esta tarea y sus subtareas trasladarlas a la tarea madre de esta tarea"
                          ,"delete_title" => "Opciones de eliminaci&oacute;n de tareas"
                          ,"delete_title_m" => "Eliminar Tarea"
                          );

$language->data = array("no" => "No"
                       ,"priority_1" => "La m&aacute;s Baja"
                       ,"priority_2" => "Baja"
                       ,"priority_3" => "Media"
                       ,"priority_4" => "Alta"
                       ,"priority_5" => "La m&aacute;s Alta"
                       ,"rel_date" => "__0" // date
                       ,"rel_date_days" => "__0 Dias" // number
                       ,"rel_date_days_ago" => "Hace __0 dias" // number
                       ,"rel_date_today" => "Hoy"
                       ,"rel_date_tomorrow" => "Ma&ntilde;ana"
                       ,"rel_date_week" => "1 semana"
                       ,"rel_date_week_ago" => "Hace 1 semana"
                       ,"rel_date_yesterday" => "Ayer"
                       ,"yes" => "Si"
                       );

$language->email_reminders = array("overdue" => "Atrasado"
                                  ,"due" => "En fecha"
                                  ,"upcoming" => "Pendiente"
                                  ,"high_priority" => "Alta Prioridad"
                                  ,"status" => "Estado"
                                  ,"complete" => "% Completado"
                                  ,"priority" => "Prioridad"
                                  ,"none" => "(nada)"
                                  ,"subject" => "Recordar tarea"
                                  );

$language->form = array("1_week" => "1 Semana"
                       ,"1_year" => "1 A&ntilde;o"
                       ,"30_days" => "30 Dias"
                       ,"90_days" => "90 Dias"
                       ,"after_save" => "Tras salvar:"
                       ,"choose_date" => "Elije Fecha"
                       ,"clear_date" => "Borrar"
                       ,"date_due" => "En Fecha:"
                       ,"date_entered" => "Fecha en la que se creo:"
                       ,"date_modified" => "&Uacute;ltima modificaci&oacute;n:"
                       ,"form_title_edit" => "Editar Tarea"
                       ,"form_title_new" => "Nueva Tarea"
                       ,"id" => "ID:"
                       ,"new_task" => "Nueva Tarea"
                       ,"notes" => "Notas:"
                       ,"parent" => "Padre:"
                       ,"priority" => "Prioridad:"
                       ,"return_home" => "Volver al inicio"
                       ,"status" => "% Completado:"
                       ,"status_label" => "% Completado"
                       ,"stay_here" => "Qu&eacute;date aqu&iacute;"
                       ,"sticky" => "Tarea adhesiva"
                       ,"sticky_label" => "Tarea adhesiva:"
                       ,"title" => "Ti<u>t</u>ulo:"
                       ,"today" => "Hoy"
                       ,"tomorrow" => "Ma&ntilde;ana"
                       ,"url" => "URL:"
                       ,"urls" => "URLs:"
                       ,"url_1" => "URL 1:"
                       ,"url_2" => "URL 2:"
                       ,"url_3" => "URL 3:"
                       ,"view_parent" => "Ver tarea madre"
                       ,"view_tree" => "Ver &aacute;rbol"
                       );

$language->home = array("sort_title" => "Ordenar por T&iacute;tulo"
                       ,"sort_title_rev" => "Ordenar inversamente por T&iacute;tulo"
                       ,"sort_priority" => "Ordenar por Prioridad"
                       ,"sort_priority_rev" => "Ordenar inversamente por Prioridad"
                       );

$language->icons = array("completed" => "Tarea completada"
                        ,"delete" => "Borrar"
                        ,"edit" => "Editar"
                        ,"hide_show" => "Ocultar/Mostrar"
                        ,"hide_show_tip" => "Oculta o muestra mas informacion para esta tarea"
                        ,"mark_complete" => "Marcar completada"
                        ,"new_sub_task" => "Nueva subtarea"
                        ,"notes_bigger" => "Hacer m&aacute;s grande el campo de Notas"
                        ,"notes_smaller" => "Hacer m&aacute;s peque&ntilde;o el campo de Notas"
                        ,"parent_picker" => "Elije una tarea madre"
                        ,"priority" => "Prioridad: __0" // result of get_friendly_priority();
                        ,"sticky" => "Tarea adhesiva"
                        ,"tree_toggle" => "Ocultar/Mostrar"
                        ,"tree_toggle_tip" => "Oculta o muestra m&aacute;s subtareas para esta tarea"
                        );

$language->list = array("banner" => "Showing __0 Item(s)" // number
                       ,"date_due" => "En Fecha"
                       ,"done" => "(Hecho)"
                       ,"id" => "ID"
                       ,"no_items" => "No hay elementos que mostrar."
                       ,"priority" => "Prioridad"
                       ,"status" => "% Completado"
                       ,"title" => "T&iacute;tulo"
                       );

$language->list_titles = array("history" => "&Uacute;ltimas 25 tareas modificadas"
                              ,"overdue" => "Tareas retrasadas"
                              ,"sortable" => "Lista de tareas organizable"
                              ,"upcoming" => "Tareas pendientes"
                              );

$language->menu = array("calendar" => "<u>C</u>alendario"
                       ,"calendar_tip" => "Pulsa aqu&iacute; para ver un calendario de tus tareas."
                       ,"history" => "<u>H</u>ist&oacute;rico"
                       ,"history_tip" => "Pulsa aqu&iacute; para ver las &uacute;ltimas 25 tareas modificadas."
                       ,"home" => "<u>I</u>nicio"
                       ,"home_tip" => "Pulsa aqu&iacute; para ir a la pantalla de inicio que muestra todas las tareas principales."
                       ,"new_task" => "<u>N</u>ueva Tarea"
                       ,"new_task_tip" => "Pulsa aqu&iacute; para crear una nueva tarea."
                       ,"search" => "<u>B</u>&uacute;squeda"
                       ,"search_tip" => "Pulsa aqu&iacute; para buscar una tarea."
                       ,"sortable" => "<u>O</u>rganizable"
                       ,"sortable_tip" => "Pulsa aqu&iacute; para ver una lista organizable de tareas."
                       ,"upcoming" => "<u>P</u>endientes"
                       ,"upcoming_tip" => "Pulsa aqu&iacute; para ver una lista de tareas pendientes."
                       );

$language->messages = array("completed" => "La tarea &quot;__0&quot; (#__1) ha sido marcada como completada." // title, id
                           ,"completed_reason" => 'La tarea &quot;__0&quot; (#__1) ha sido marcada como completada por la raz&oacute;n:<p style="padding-left: 15px;">__2</p>' // title, id, reason
                           ,"completed_task_link" => "Ver tarea completada"
                           ,"completed_task_parent_link" => "Ver la tarea madre de la tarea completada"
                           ,"complete_instructions" => "La tarea #__0 tiene __1 subtareas) (__2) pendientes, por favor selecciona el comportamiento a seguir para ser completadas." // id, number, number
                           ,"complete_orphan" => "La tarea &quot;__0&quot; (#__1) ha sido marcada como completada y todas sus subtareas han sido trasladadas a la tarea #__2." // title, id, new parent task id
                           ,"complete_orphan" => "La tarea &quot;__0&quot; (#__1) ha sido marcada como completada y a todas sus subtareas se les ha borrado el IDs de tarea madre." // title, id
                           ,"complete_recursive" => "La tarea &quot;__0&quot; (#__1) y todas sus subtareas han sido marcadas como completadas." // title, id
                           ,"confirm_delete" => "Borrar tarea: __0?"
                           ,"deleted" => "La tarea &quot;__0&quot; (#__1) ha sido eliminada." // title, id
                           ,"delete_instructions" => "La tarea #__0 tiene __1 subtareas) (__2) pendientes, por favor selecciona el comportamiento a seguir para ser eliminadas." // id, number, number
                           ,"delete_orphan" => "La tarea &quot;__0&quot; (#__1) ha sido eliminada y a todas sus subtareas se les ha borrado el IDs de tarea madre." // title, id
                           ,"delete_recursive" => "La tarea &quot;__0&quot; (#__1) y todas sus subtareas han sido eliminadas." // title, id
                           ,"delete_remove" => "La tarea &quot;__0&quot; (#__1) ha sido eliminada y todas sus subtareas trasladadas a la tarea #__2" // title, id, new parent id
                           ,"err_conflict" => "<b>Error:</b> La tarea no se guard&oacute;.<br>Esta tarea ha sido modificada por otro usuario desde que la empezaste a editar. Por favor, revisa las diferencias listadas debajo y guarda de nuevo. <p>La versi&oacute;n de esta tarea en la que hiciste cambios fue guardada por &uacute;ltima vez en __0;<br>la versi&oacute;n actual en la base de datos fue guardada en __1"
                           ,"err_date_format" => "<b>Error:</b> Hay un error en tu personalizaci&oacute;n de <b>\$custom->date_format</b> en 'config.php'. Tu valor: '__0' no contiene uno o m&aacute;s de los elemento 'm', 'd', 'y'. Por favor corrigelo en  'config.php'." // date_format
                           ,"err_event_type" => "<b>Error:</b> Hay un error en tu personalizaci&oacute;n de <b>\$custom->ical_export_type</b> en 'config.php'. Tu valor: '__0' no es Evento 'event' or Por Hacer 'todo'. Por favor corrigelo en 'config.php'." // ical_export_type
                           ,"err_invalid_date" => "<b>Error:</b> Esta tarea no fue guardada porque la fecha especificada no es v&aacute;lida. Corrige o elimina la fecha y entonces guarda la tarea."
                           ,"err_invalid_parent" => "<b>Error:</b> La tarea #__0 se especific&oacute; como tarea madre pero no existe ninguna con tal ID . Por favor arregla este problema y guarda de nuevo." // id
                           ,"err_loop" => "<b>Error:</b> Salvar esta tarea con tal tarea madre crear&iacute;a un bucle infinito."
                           ,"err_no_root" => "Error: No se ha definido una raiz."
                           ,"err_own_parent" => "<b>Error:</b> Una tarea no puede ser su propia madre."
                           ,"err_search_date_after" => "<b>Error:</b> Esta busqueda no encontrara tareas porque el valor de 'La Fecha es posterior a:' no es v&aacute;lido. Corrige o borra la fecha e intenta la b&uacute;squeda de nuevo."
                           ,"err_search_date_before" => "<b>Error:</b> Esta busqueda no encontrara tareas porque el valor de 'La Fecha es anterior a:' no es v&aacute;lido. Corrige o borra la fecha e intenta la b&uacute;squeda de nuevo."
                           ,"err_search_date_exact" => "<b>Error:</b> Esta busqueda no encontrara tareas porque el valor de 'La Fecha es exactamente:' no es v&aacute;lido. Corrige o borra la fecha e intenta la b&uacute;squeda de nuevo."
                           ,"js_abandon_changes" => "Salir sin salvar cambios?"
                           ,"js_complete_confirm" => "Seguro que quieres cerrar\\nesta tarea sin introducir\\nninguna nota final?"
                           ,"js_complete_prompt" => "Introduce las notas finales para esta tarea."
                           ,"js_err_edit_date" => "La fecha actual del campo 'En Fecha' no es v&aacute;lido.\\nC&aacute;mbialo o b&oacute;rralo antes de salvar."
                           ,"js_err_search_date_after" => "La fecha actual del campo  'La fecha es posterior a:' no es una fecha v&aacute;lida."
                           ,"js_err_search_date_before" => "La fecha actual del campo  'La fecha es anterior a:' no es una fecha v&aacute;lida."
                           ,"js_err_search_date_exact" => "La fecha actual del campo  'La fecha es exactamente:' no es una fecha v&aacute;lida."
                           ,"js_err_search_date_range" => "La fecha de 'La fecha es posterior a:' debe ser anterior 'La fecha es anterior a:'"
                           ,"js_err_search_errors" => "Advertencia - Los siguientes problemas han de ser corregidos\\nantes de que tu b&uacute;squeda d&eacute; ningun tipo de resultado: \\n"
                           ,"js_err_search_id_invalid" => "El campo 'ID' debe estar vacio o ser un n&uacute;mero mayor de 0."
                           ,"js_err_search_parent_invalid" => "El campo 'Madre' debe estar vacio o ser un n&uacute;mero mayor de 0."
                           ,"js_err_search_status_exact" => "El campo 'El estado es exactamente:' debe o estar vacio o ser un valor entre 0 y 100."
                           ,"js_err_search_status_less" => "El campo 'El estado es menos que:' debe o estar vacio o ser un valor entre 0 y 100."
                           ,"js_err_search_status_more" => "El campo 'El estado es m&aacute;s que:' debe o estar vacio o ser un valor entre 0 y 100."
                           ,"js_err_search_status_range" => "El campo 'El estado es menos que:' debe ser mayor que el campo 'El estado es m&aacute;s que:'."
                           ,"js_loading_text" => "Cargando..."
                           ,"js_nothing_to_save" => "Lo siento no hay nada que salvar en esta pantalla."
                           ,"js_parent_required" => "Debes especificar una tarea adre para esta tarea para poder verla tras salvar."
                           ,"mail_sent" => "Se han enviado los correos diarios."
                           ,"mobile_resolve_instructions" => "Los datos introducidos ser&aacute;n mostrados debajo de la versi&oacute;n que hay actualmente en la base de datos. Haz los cambios que creas necesarios y pulsa 'Salvar'."
                           ,"no_email" => "Por favor introduce tu email en 'config.php'."
                           ,"parent_changed" => "La tarea madre ha cambiado de __0 a __1." // old parent id, new parent id
                           ,"saved" => "Se guard&oacute; la tarea #__0 (__1) en __2." // id, title, timestamp
                           ,"title" => "Mensajes"
                           ,"warn_deleted" => "<b>Advertencia:</b> Esta tarea ya ha sido eliminada."
                           );

$language->misc = array("all_rights_reserved" => "all rights reserved."
                       ,"copyright" => "copyright"
                       ,"count_open" => "__0 Tareas pendientes" // number
                       ,"count_total" => "__0 Tareas" // number
                       ,"hide_completed" => "Ocultar tareas completadas"
                       ,"jump_to" => "Saltar a ..."
                       ,"quick_search" => "Busqueda r&aacute;pida"
                       ,"show_completed" => "Mostrar tareas completadas"
                       ,"timer" => "pantalla generada en  __0 segundos." // seconds
                       ,"version" => "versi&oacute;n __0" // number
                       );

$language->picker = array("date_go" => "Go"
                         ,"date_key_selected" => "Fecha seleccionada actualmente"
                         ,"date_key_today" => "Fecha de hoy"
                         ,"date_next" => "Siguiente"
                         ,"date_previous" => "Anterior"
                         ,"date_today" => "Hoy"
                         ,"days" => "'Dom','Lun','Mar','Mie','Jue','Vie','Sab'"
                         ,"months" => "'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'"
                         ,"parent_title" => "Elije una tarea madre"
                         );

$language->resolve = array("append" => "Agregar"
                          ,"current_version" => "Versi&oacute;n actual"
                          ,"form_title" => "Los siguientes campos tienen diferecias"
                          ,"none" => "(nada)"
                          ,"save" => "Salvar"
                          ,"use" => "Usar"
                          ,"your_data" => "Tus datos"
                          );

$language->search = array("after" => "es posterior:"
                         ,"before" => "es anterior:"
                         ,"exactly" => "es exactamente:"
                         ,"form_title" => "criterio de b&uacute;squeda"
                         ,"include_completed" => "Incluir tareas completadas"
                         ,"instructions" => "Introduce palabras o partes de palabras que aparecen en el t&iacute;tulo y/o las notas de las tareas que quieres buscar. Por defecto la tarea encuentra solo los registros que contienen todos los t&eacute;rminos que hayas introducido. Pulsa en &quot;M&aacute;s opciones de b&uacute;squeda&quot; para ver criterios adicionales."
                         ,"less_than" => "es menos que:"
                         ,"more_options" => "M&aacute;s opciones de b&uacute;squeda"
                         ,"more_than" => "es m&aacute;s que:"
                         ,"results_title" => "Resultados a la b&uacute;squeda"
                         ,"search_button" => "B&uacute;squeda"
                         );

$language->toolbar = array("b2_tip" => "Enviar a b2"
                          ,"date_time" => "Introducir fecha/hora"
                          ,"date_time_tip" => "Introducir fecha/hora actuales en el campo de notas"
                          ,"delete" => "Eliminar"
                          ,"edit" => "Editar"
                          ,"mark_complete" => "Marcar como completada"
                          ,"mark_complete_m" => "100%"
                          ,"mt_tip" => "Enviar a Movable Type"
                          ,"new_sub" => "Nueva subtarea"
                          ,"new_sub_m" => "Nueva Sub"
                          ,"save" => "<u>S</u>alvar"
                          ,"save_alt" => "Salvar"
                          ,"save_as_new" => "Salvar como nueva tarea"
                          ,"wp_tip" => "Enviar a WordPress"
                          );

$language->tree = array("due" => "En Fecha:"
                       ,"id" => "ID:"
                       ,"loading" => $language->messages["js_loading_text"] // no need to set this
                       ,"open_sub_task" => '1 subtarea pendiente <span style="color: #666;">(__0 Total)</span>' // number
                       ,"open_sub_tasks" => '__0 subtareas pendientes <span style="color: #666;">(__1 Total)</span>' // number, number
                       ,"status" => "__0% Completado" // number (0-100)
                       );

?>
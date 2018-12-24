<?

// spanish

$language = new language;

$language->name = "Español";
$language->author = "Carlos Martín Aires";
$language->author_email = "carlos@imaginando.com";
$language->author_web = "http://www.imaginando.com";

$language->charset = "iso-8859-1";

// uncomment this if you need to increase the font size from 10px
// $language->font_size = "10px;"; 
$language->about = array("tagline" => "mantener las cosas organizadas."
                        ,"documentation" => "Documentación"
                        ,"read_me" => "Léame"
                        ,"license" => "Licencia"
                        ,"download" => "Descargar"
                        ,"this_version" => "Versión: __0" // number
                        ,"latest_version" => "última versión : __0" // number
                        ,"beta_version" => "última versión beta : __0" // number
                        ,"using_latest" => "Está usted usando la última versión."
                        ,"using_beta" => "Está usted usando la última versión beta."
                        ,"feedback" => "Sugerencias y comentarios:"
                        ,"web" => "Web:"
                        ,"credits" => "Créditos"
                        ,"main_credit" => "Tasks Jr. fue diseñado y creado por  <nobr>Alex King</nobr>. Ha sido traducido por:"
                        ,"web_site" => "web site"
                        ,"email" => "e-mail"
                        );

$language->accesskey = array("calendar" => "c"
                            ,"history" => "h"
                            ,"home" => "i"
                            ,"new_task" => "t"
                            ,"save" => "g"
                            ,"search" => "b"
                            ,"sortable" => "o"
                            ,"title" => "l"
                            ,"upcoming" => "p"
                            );

$language->breadcrumbs = array("history" => "Historial"
                              ,"home" => "Inicio"
                              ,"new_task" => "Nueva Tarea"
                              ,"search" => "Búsqueda"
                              ,"search_results" => "Resultados de Búsqueda"
                              ,"sortable" => "Lista de tareas para ordenar"
                              ,"upcoming" => "Tareas pendientes"
                              );

$language->confirm = array("complete_instructions" => "La tarea que está marcando como terminada tiene  __0 subtarea(s) abierta(s). Por favor, elija lo que quiere hacer:" // number
                          ,"complete_orphan" => "Marcar como terminada y quitar esta tarea superior a todas las sub-tareas"
                          ,"complete_notes" => "Introduzca notas para cerrar la tarea:"
                          ,"complete_recursive" => "Marque esta tarea y sub-tareas como terminadas"
                          ,"complete_remove" => "Marque esta tarea como completa y agregue las sub-tareas a la tarea "
                          ,"complete_title" => "Opciones al terminar una tarea"
                          ,"delete_confirm" => "¿Está seguro de que quiere borrar esta tarea?"
                          ,"delete_instructions" => "La tarea que está borrando tiene  __0 sub-tarea(s) abierta(s). Elija lo que quiere hacer:" // number
                          ,"delete_orphan" => "Borrar esta tarea y dejar las sub-tareas sin tarea"
                          ,"delete_recursive" => "Borrar esta tarea y todas sus sub-tareas"
                          ,"delete_remove" => "Borrar esta tarea y hacer que sus sub-tareas pasen a depender de la tarea "
                          ,"delete_title" => "Opciones de borrado de tareas"
                          ,"delete_title_m" => "Borrar tarea"
                          );

$language->data = array("no" => "No"
                       ,"priority_1" => "Bajísima"
                       ,"priority_2" => "Baja"
                       ,"priority_3" => "Media"
                       ,"priority_4" => "Alta"
                       ,"priority_5" => "Altísima"
											 ,"rel_date" => "__0" // date
                       ,"rel_date_days" => "__0 días" // number
                       ,"rel_date_days_ago" => "hace __0 días" // number
                       ,"rel_date_today" => "Hoy"
                       ,"rel_date_tomorrow" => "Mañana"
                       ,"rel_date_week" => "1 semana"
                       ,"rel_date_week_ago" => "Hace 1 semana"
                       ,"rel_date_yesterday" => "Ayer"
                       ,"yes" => "Sí"
                       );

$language->email_reminders = array("overdue" => "Atrasada"
                                  ,"due" => "Pendiente"
                                  ,"upcoming" => "Pendientes"
                                  ,"high_priority" => "Alta prioridad"
                                  ,"status" => "Estado"
                                  ,"complete" => "% Terminada"
                                  ,"priority" => "Prioridad"
                                  ,"none" => "(ninguna)"
                                  ,"subject" => "recordatorio de tareas"
                                  );

$language->form = array("1_week" => "1 semana"
                       ,"1_year" => "1 año"
                       ,"30_days" => "30 días"
                       ,"90_days" => "90 días"
                       ,"after_save" => "Despues de grabar:"
                       ,"choose_date" => "Seleccionar fecha"
                       ,"clear_date" => "Borrar"
                       ,"date_due" => "Fecha de vencimiento:"
                       ,"date_entered" => "Fecha de alta:"
                       ,"date_modified" => "Ultima modificación:"
                       ,"form_title_edit" => "Editar Tarea"
                       ,"form_title_new" => "Nueva Tarea"
                       ,"id" => "ID:"
											 ,"new_task" => "Nueva Tarea"
                       ,"notes" => "Notas:"
                       ,"parent" => "Tarea Superior:"
                       ,"priority" => "Prioridad:"
                       ,"return_home" => "Volver al Inicio"
                       ,"status" => "% Terminado:"
                       ,"status_label" => "% Terminado"
                       ,"stay_here" => "Quedarse aquí"
                       ,"sticky" => "Permanente"
                       ,"sticky_label" => "Permanente:"
                       ,"title" => "Título:"
                       ,"today" => "Hoy"
                       ,"tomorrow" => "Mañana"
                       ,"url" => "URL:"
                       ,"urls" => "URLs:"
                       ,"url_1" => "URL 1:"
                       ,"url_2" => "URL 2:"
                       ,"url_3" => "URL 3:"
                       ,"view_parent" => "Ver tareas superiores"
                       ,"view_tree" => "Ver árbol"
                       );
											 
$language->home = array("sort_title" => "Ordenar por título"
                       ,"sort_title_rev" => "Ordenar inversamente por título"
                       ,"sort_priority" => "Ordenar por prioridad"
                       ,"sort_priority_rev" => "Ordenar inversamente por prioridad"
                       );

$language->icons = array("completed" => "Tareas terminadas"
                        ,"delete" => "Borrar"
                        ,"edit" => "Editar"
                        ,"hide_show" => "Ocultar/Mostrar"
                        ,"hide_show_tip" => "Oculta o muestra más información para esta tarea"
                        ,"mark_complete" => "Marcar como completa"
                        ,"new_sub_task" => "Nueva sub-tarea"
                        ,"notes_bigger" => "Hacer el campo notas más grande"
                        ,"notes_smaller" => "Hacer campo notas más pequeño"
                        ,"parent_picker" => "Seleccionar la tarea superior"
                        ,"priority" => "Prioridad: __0" // result of get_friendly_priority();
                        ,"sticky" => "Tarea Permanente"
                        ,"tree_toggle" => "Ocultar/Mostrar"
                        ,"tree_toggle_tip" => "Ocultar o mostrar sub-tareas para esta tarea."
                        );

$language->list = array("banner" => "Mostrando __0 Item(s)" // number
                       ,"date_due" => "Fecha de vencimiento"
                       ,"done" => "(hecho)"
                       ,"id" => "ID"
                       ,"no_items" => "No hay nada."
                       ,"priority" => "Prioridad"
                       ,"status" => "% Terminado"
                       ,"title" => "Título"
                       );

$language->list_titles = array("history" => "últimas 25 tareas modificadas"
                              ,"overdue" => "Tareas vencidas"
                              ,"sortable" => "Lista de tareas que puede ordenar"
                              ,"upcoming" => "Tareas vencidas"
                              );

$language->menu = array("calendar" => "<u>C</u>alendario"
                       ,"calendar_tip" => "Pinche para ver el calendario y actualizar la informacion de i-calendar."
                       ,"history" => "<u>H</u>istoria"
                       ,"history_tip" => "Pinche para ver las últimas 25 tareas modificadas."
                       ,"home" => "<u>I</u>nicio"
                       ,"home_tip" => "Pinche para ir al Inicio y mostrar todas las tareas."
                       ,"new_task" => "Nueva <u>T</u>area"
                       ,"new_task_tip" => "Pinche para crear una nueva tarea."
                       ,"search" => "<u>B</u>uscar"
                       ,"search_tip" => "Pinche para buscar una tarea."
                       ,"sortable" => "<u>O</u>rdenar"
                       ,"sortable_tip" => "Pinche para ver una lista de las tareas para ordenar."
                       ,"upcoming" => "<u>P</u>endientes"
                       ,"upcoming_tip" => "Pinche para ver las tareas pendientes o vencidas."
                       );

$language->messages = array("completed" => "La tarea &quot;__0&quot; (#__1) ha sido marcada como terminada." // title, id
                           ,"completed_reason" => 'La tarea &quot;__0&quot; (#__1) ha sido marcada como terminada con las siguientes notas de cierre:<p style="padding-left: 15px;">__2</p>' // title, id, reason
                           ,"completed_task_link" => "Ver tareas terminadas"
                           ,"completed_task_parent_link" => "Ver tareas superiores terminadas"
                           ,"complete_instructions" => "La tarea #__0  tiene __1 Sub-tarea(s) (__2) abiertas, seleccione qué desea hacer." // id, number, number
                           ,"complete_orphan" => "La tarea &quot;__0&quot; (#__1) ha sido marcada como terminada y todas sus sub-tareas han sido agregadas a la tarea  #__2." // title, id, new parent task id
                           ,"complete_orphan" => "La tarea &quot;__0&quot; (#__1) ha sido marcada como terminada y a todas sus sub-tareas les han sido quitadas las tareas superiores." // title, id
                           ,"complete_recursive" => "La area &quot;__0&quot; (#__1) y todas las sub-tareas han sido marcadas como terminadas ." // title, id
                           ,"confirm_delete" => "¿Borrar Tarea: __0?"
                           ,"deleted" => "La tarea &quot;__0&quot; (#__1) ha sido borrada." // title, id
                           ,"delete_instructions" => "La tarea #__0 tiene  __1 Sub-tarea(s) (__2) abierta(s). Seleccione la acción apropiada." // id, number, number
                           ,"delete_orphan" => "La tarea &quot;__0&quot; (#__1) ha sido borrada y todos las sub-tareas y las IDs de sus tareas superiores han sido borradas." // title, id
                           ,"delete_recursive" => "La tarea &quot;__0&quot; (#__1) y todas sus sub-tareas han sido borradas." // title, id
                           ,"delete_remove" => "La tarea &quot;__0&quot; (#__1) ha sido borrada y todas sus sub-tareas han sido agregadas a la tarea #__2" // title, id, new parent id
                           ,"err_conflict" => "<b>Error:</b> esta tarea no está guardada.<br>Esta tarea ha sido actualizada por otro usuario desde que usted comenzó la edición. Por favor, revise las diferencias que aparecen debajo. <p>La versión de esta tarea es la  __0;<br>la versión actual de la base de datos es la  __1"
                           ,"err_date_format" => "<b>Error:</b> hay un error en su formato de fecha <b>\$custom->date_format</b> en  'config.php'. Su valor : '__0' no contiene las variables 'm', 'd', 'y'. Por favor, corrija esto en el  'config.php'." // date_format
                           ,"err_event_type" => "<b>Error:</b> hay un error en su <b>\$custom->ical_export_type</b> en  'config.php'. Su valor: '__0' no es  'event' or 'todo'. Por favor, corríjalo en el  'config.php'." // ical_export_type
                           ,"err_invalid_date" => "<b>Error:</b> esta tarea no ha sido guardada porque la fecha es inválida. Corrija o borre la fecha para poder guardar la tarea."
                           ,"err_invalid_parent" => "<b>Error:</b> tarea #__0 fue especificada como tarea superior pero ese ID no existe. Por favor, arregle eso para poder guardarla." // id
                           ,"err_loop" => "<b>Error:</b> si guarda esta tarea con esta tarea superior puede producir un bucle infinito."
                           ,"err_no_root" => "Error: no se especificó raíz."
                           ,"err_own_parent" => "<b>Error:</b> una tarea no puede ser la tarea superior de sí misma."
                           ,"err_search_date_after" => "<b>Error:</b> esta búsqueda no encontró ningún resultado porque la fecha de vencimiento no es válida. Corrija o borre esta fecha para volver a realizar la búsqueda."
                           ,"err_search_date_before" => "<b>Error:</b> esta búsqueda no encontró ningún resultado porque la fecha de vencimiento 'después de:' no es válida. Corrija o borre esta fecha para volver a buscar."
                           ,"err_search_date_exact" => "<b>Error:</b> esta búsqueda no encontró ningún resultado porque la fecha de vencimiento 'exacta:' no es iálida. Corrija o borre esta fecha para volver a buscar."
                           ,"js_abandon_changes" => "¿Salir sin guardar los cambios?"
                           ,"js_complete_confirm" => "¿Está seguro de que quiere cerrar \\nesta tarea sin agregar ninguna nota de cierre?"
                           ,"js_complete_prompt" => "Introduzca notas de cierre para esta tarea."
                           ,"js_err_edit_date" => "El valor de fecha de vencimiento no es válido.\\nCambie este valor antes de grabar."
                           ,"js_err_search_date_after" => "El valor actual de 'Fecha de vencimiento despues de:' no es una fecha válida."
                           ,"js_err_search_date_before" => "El valor actual de 'Fecha de vencimiento antes de:' no es una fecha válida."
                           ,"js_err_search_date_exact" => "El valor actual de 'Fecha de vencimiento exacta:' no es una fecha válida."
                           ,"js_err_search_date_range" => "El valor 'Fecha de vencimiento antes de:' debe ser mayor que la 'Fecha de vencimiento después de:' "
                           ,"js_err_search_errors" => "Atención: los siguientes errores deben ser corregidos\\nantes de continuar con la búsqueda \\n"
                           ,"js_err_search_id_invalid" => "El campo 'ID' debe estar vacío o tener un valor numérico superior a 0."
                           ,"js_err_search_parent_invalid" => "El campo 'Tarea Superior' debe estar vacío o tener un valor numérico superior a 0."
                           ,"js_err_search_status_exact" => "El campo 'Estado exacto:' debe estar vacío o tener un valor numérico entre 0 y 100."
                           ,"js_err_search_status_less" =>"El campo 'Estado menor que:' debe estar vacío o tener un valor numérico entre 0 y 100."
                           ,"js_err_search_status_more" => "El campo 'Estado mayor que:' debe estar vacío o tener un valor numérico entre 0 y 100."
                           ,"js_err_search_status_range" => "El campo 'Estado mayor que:' debe ser mayor que el campo Estado menor que"
                           ,"js_loading_text" => "Cargando..."
                           ,"js_nothing_to_save" => "Lo lamento, no hay nada que guardar."
                           ,"js_parent_required" => "Debe especificar una tarea superior para esta tarea para \\nver las tareas superiores después de guardar."
                           ,"mail_sent" => "Los recordatorios diarios han sido enviados."
                           ,"mobile_resolve_instructions" => "Los datos introducidos por usted son de una versión de la base de datos anterior a la actual. Haga los cambios que necesite y luego presione 'Guardar'"
                           ,"no_email" => "Por favor, agregue su dirección de correo a config.php."
                           ,"parent_changed" => "Tarea superior cambiada de __0 a __1." // old parent id, new parent id
                           ,"saved" => "Tarea grabada  #__0 (__1) a las  __2." // id, title, timestamp
                           ,"title" => "Mensajes"
                           ,"warn_deleted" => "<b>Atención:</b> esta tarea ya está borrada."
                           );

$language->misc = array("all_rights_reserved" => "Todos los derechos reservados."
                       ,"copyright" => "copyright"
                       ,"count_open" => "__0 tareas abiertas" // number
                       ,"count_total" => "__0 tareas" // number
                       ,"hide_completed" => "Ocultar tareas terminadas"
                       ,"jump_to" => "Ir a..."
											 ,"quick_search" => "Búsqueda rápida"
                       ,"show_completed" => "Mostrar tareas terminadas"
                       ,"timer" => "página armada en  __0 segundos." // seconds
                       ,"version" => "versión __0" // number
                       );

$language->picker = array("date_go" => "Ir"
                         ,"date_key_selected" => "Fecha seleccionada actualmente"
                         ,"date_key_today" => "Fecha de hoy"
                         ,"date_next" => "Siguiente"
                         ,"date_previous" => "Anterior"
                         ,"date_today" => "Hoy"
                         ,"days" => "'Dom','Lun','Mar','Mie','Jue','Vie','Sab'"
                         ,"months" => '"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"' 
                         ,"parent_title" => "Seleccione una tarea superior"
                         );

$language->resolve = array("append" => "Agregar"
                          ,"current_version" => "Versión actual"
                          ,"form_title" => "Los siguientes campos tienen diferencias"
                          ,"none" => "(ninguno)"
                          ,"save" => "Guardar"
                          ,"use" => "Usar"
                          ,"your_data" => "Su información"
                          );

$language->search = array("after" => "después de:"
                         ,"before" => "antes de:"
                         ,"exactly" => "exactamente:"
                         ,"form_title" => "Criterios de búsqueda:"
                         ,"include_completed" => "Incluir tareas completas"
                         ,"instructions" => "Introduzca palabras o partes de palabras que aparezcan en los títulos o notas de las tareas que desee encontrar. Por defecto, la búsqueda se realiza con todos los términos. Pinche en &quot;Más opciones de búsqueda&quot; para ver opciones avanzadas."
                         ,"less_than" => "menor que:"
                         ,"more_options" => "Más opciones de búsqueda"
                         ,"more_than" => "mayor que:"
                         ,"results_title" => "Resultados de búsqueda"
                         ,"search_button" => "Buscar"
                         );

$language->toolbar = array("b2_tip" => "Enviar a b2"
                          ,"date_time" => "Insertar Fecha/Hora"
                          ,"date_time_tip" => "Insertar  Fecha/Hora en las notas"
                          ,"delete" => "Borrar"
                          ,"edit" => "Editar"
                          ,"mark_complete" => "Marcar como terminada"
                          ,"mark_complete_m" => "100%"
                          ,"mt_tip" => "Enviar a Movable Type"
                          ,"new_sub" => "Nueva Sub-tarea"
                          ,"new_sub_m" => "Nueva Sub"
                          ,"save" => "<u>G</u>uardar"
                          ,"save_alt" => "Guardar"
                          ,"save_as_new" => "Guardar como una nueva tarea"
                          ,"wp_tip" => "Enviar a WordPress"
                          );

$language->tree = array("due" => "Vencimiento:"
                       ,"id" => "ID:"
                       ,"loading" => $language->messages["js_loading_text"] // no need to set this
                       ,"open_sub_task" => '1 Sub-tarea  abierta<span style="color: #666;">(__0 Total)</span>' // number
                       ,"open_sub_tasks" => '__0  Sub-tareas abiertas<span style="color: #666;">(__1 Total)</span>' // number, number
                       ,"status" => "__0% Completo" // number (0-100)
                       );

?>
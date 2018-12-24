<?

// german

$language = new language;

$language->name = "German";
$language->author = "Nikolai Stiehl";
$language->author_email = "nistl@arcor.de";
$language->author_web = "http://www.nikolai-stiehl.de";

$language->charset = "ISO-8859-1";

// entkommentieren Sie die folgende Zeile, wenn Sie die Schriftgröße auf 10px setzen möchten
// $language->font_size = "10px;"; 

$language->about = array("tagline" => "Organisiere Deine Vorhaben und erledige sie."
                        ,"documentation" => "Dokumentation"
                        ,"read_me" => "Liesmich"
                        ,"license" => "Lizenz"
                        ,"download" => "Herunterladen"
                        ,"this_version" => "Diese Version: __0"
                        ,"latest_version" => "Letzte Release Version: __0" // number
                        ,"beta_version" => "Letzte Beta Version: __0" // number
                        ,"using_latest" => "Sie benutzen die aktuelle Release Version."
                        ,"using_beta" => "Sie benutzen die aktuelle Beta Version."
                        ,"feedback" => "Empfehlungen und Vorschl&auml;ge:"
                        ,"web" => "Web:"
                        ,"credits" => "Danksagung"
                        ,"main_credit" => "Tasks Jr. wurde von <nobr>Alex King</nobr> konzipiert und realisiert. Es wurde in die unten aufgef&uuml;hrten Sprachen von den folgenden Personen &uuml;bersetzt:"
                        ,"web_site" => "Website"
                        ,"email" => "E-Mail"
                        );

$language->accesskey = array("calendar" => "k"
                            ,"history" => "v"
                            ,"home" => "t"
                            ,"new_task" => "n"
                            ,"save" => "s"
                            ,"search" => "u"
                            ,"sortable" => "r"
                            ,"title" => "l"
                            ,"upcoming" => "a"
                            );

$language->breadcrumbs = array("history" => "Verlauf"
                              ,"home" => "Startseite"
                              ,"new_task" => "Neuer Vorgang"
                              ,"search" => "Suche"
                              ,"search_results" => "In den Ergebnissen suchen"
                              ,"sortable" => "Sortierte Vorgangsliste"
                              ,"upcoming" => "Anstehende Vorg&auml;nge"
                              );

$language->confirm = array("complete_instructions" => "Der Vorgang, den Sie als abgeschlossen markieren m&ouml;chten enth&auml;lt noch __0 offene Teilvorg&auml;nge. Bitte w&auml;hlen Sie, wie Sie weiter verfahren m&ouml;chten:" // nummer
                          ,"complete_orphan" => "Diesen Vorgang als abgeschlossen markieren und den Teilvorg&auml;ngen den &uuml;bergeordneten Vorgang entfernen"
                          ,"complete_notes" => "Tragen Sie eine Abschlussnotiz zu diesem Vorgang ein:"
                          ,"complete_recursive" => "Diesen Vorgang mit seinen Teilvorg&auml;ngen als abgeschlossen markieren."
                          ,"complete_remove" => "Diesen Vorgang als abgeschlossen markieren und und die enthaltenen Untervorg&auml;nge einem &uuml;bergeordneten Vorgang zuordnen"
                          ,"complete_title" => "Alle Vorgangsoptionen"
                          ,"delete_confirm" => "Sind Sie sicher, dass Sie den Vorgang entfernen m&ouml;chten?"
                          ,"delete_instructions" => "Der Vorgang den Sie entfernen m&ouml;chten hat __0 offene Teilvorg&auml;nge. Bitte w&auml;hlen Sie die weitere Vorgehensweise aus:" // nummer
                          ,"delete_orphan" => "Diesen Vorgang entfernen und seine Teilvorg&auml;nge so einstellen, das sie keinem Vorgang mehr untergeordnet sind"
                          ,"delete_recursive" => "Diesen Vorgang und seine Teilvorg&auml;nge entfernen"
                          ,"delete_remove" => "Diesen Vorgang l&ouml;schen und die enthaltenen Untervorg&auml;nge einem &uuml;bergeordneten Vorgang zuordnen"
                          ,"delete_title" => "Vorgangsoptionen l&ouml;schen"
                          ,"delete_title_m" => "Vorgang l&ouml;schen"
                          );

$language->data = array("no" => "Nein"
                       ,"priority_1" => "Sehr niedrig"
                       ,"priority_2" => "Niedrig"
                       ,"priority_3" => "Mittel"
                       ,"priority_4" => "Hoch"
                       ,"priority_5" => "Sehr hoch"
                       ,"rel_date" => "am __0" // date
                       ,"rel_date_days" => "in __0 Tagen" // number
                       ,"rel_date_days_ago" => "seit __0 Tagen" // number
                       ,"rel_date_today" => "Heute"
                       ,"rel_date_tomorrow" => "Morgen"
                       ,"rel_date_week" => "in 1 Woche"
                       ,"rel_date_week_ago" => "seit 1 Woche"
                       ,"rel_date_yesterday" => "seit Gestern"
                       ,"yes" => "Ja"
                       );

$language->email_reminders = array("overdue" => "Überfällig"
                                  ,"due" => "Fällig"
                                  ,"upcoming" => "Anstehend"
                                  ,"high_priority" => "Hohe Priorität"
                                  ,"status" => "Status"
                                  ,"complete" => "% Abgeschlossen"
                                  ,"priority" => "Priorität"
                                  ,"none" => "(kein)"
                                  ,"subject" => "Tasks Erinnerung"
                                  );

$language->form = array("1_week" => "1 Woche"
                       ,"1_year" => "1 Jahr"
                       ,"30_days" => "30 Tage"
                       ,"90_days" => "90 Tage"
                       ,"after_save" => "Nach dem Speichern:"
                       ,"choose_date" => "Datum w&auml;hlen"
                       ,"clear_date" => "L&ouml;schen"
                       ,"date_due" => "Fertigstellungsdatum:"
                       ,"date_entered" => "Erstellt:"
                       ,"date_modified" => "Ge&auml;ndert:"
                       ,"form_title_edit" => "Vorgang ver&auml;ndern"
                       ,"form_title_new" => "Neuer Vorgang"
                       ,"id" => "ID:"
                       ,"new_task" => "Neuer Vorgang"
                       ,"notes" => "Notizen:"
                       ,"parent" => "&Uuml;bergeordneter Vorgang:"
                       ,"priority" => "Priorit&auml;t:"
                       ,"return_home" => "Auf die Startseite zur&uuml;ck"
                       ,"status" => "% abgeschlossen:"
                       ,"status_label" => "% abgeschlossen"
                       ,"stay_here" => "Hier bleiben"
                       ,"sticky" => "Prio Vorgang"
                       ,"sticky_label" => "Prio Vorgang:"
                       ,"title" => "Titel:"
                       ,"today" => "Heute"
                       ,"tomorrow" => "Morgen"
                       ,"url" => "URL:"
                       ,"urls" => "URLs:"
                       ,"url_1" => "URL 1:"
                       ,"url_2" => "URL 2:"
                       ,"url_3" => "URL 3:"
                       ,"view_parent" => "&Uuml;bergeordneten Vorgang anzeigen"
                       ,"view_tree" => "Verzeichnisbaum anzeigen"
                       );

$language->home = array("sort_title" => "nach Titel aufsteigend"
                       ,"sort_title_rev" => "nach Titel absteigend"
                       ,"sort_priority" => "nach Prio aufsteigend"
                       ,"sort_priority_rev" => "nach Prio absteigend"
                       );

$language->icons = array("completed" => "Vorgang abgeschlossen"
                        ,"delete" => "L&ouml;schen"
                        ,"edit" => "&Auml;ndern"
                        ,"hide_show" => "Ein-/Ausblenden"
                        ,"hide_show_tip" => "Mehr Informationen zu dem Vorgang ein-/ ausblenden"
                        ,"mark_complete" => "Als abgeschlossen markieren"
                        ,"new_sub_task" => "Neuer Teilvorgang"
                        ,"notes_bigger" => "Notizfeld vergr&ouml;&szlig;ern"
                        ,"notes_smaller" => "Notizfeld verkleinern"
                        ,"parent_picker" => "&Uuml;bergeordneten Vorgang ausw&auml;hlen"
                        ,"priority" => "Priorit&auml;t: __0" // result of get_friendly_priority();
                        ,"sticky" => "Prio Vorgang"
                        ,"tree_toggle" => "Ein-/Ausblenden"
                        ,"tree_toggle_tip" => "Noch mehr Teilvorg&auml;nge dieses Vorgangs ein-/ausblenden"
                        );

$language->list = array("banner" => " __0 Objekt(e) werden angezeigt" // number
                       ,"date_due" => "F&auml;lligkeit"
                       ,"done" => "(erledigt)"
                       ,"id" => "ID"
                       ,"no_items" => "Es werden keine Objekte angezeigt."
                       ,"priority" => "Priorit&auml;t"
                       ,"status" => "% abgeschlossen"
                       ,"title" => "Titel"
                       );

$language->list_titles = array("history" => "Die letzten 25 ver&auml;nderten Vorg&auml;nge"
                              ,"overdue" => "Verp&auml;tete Vorg&auml;nge"
                              ,"sortable" => "Sortierte Vorgangsliste"
                              ,"upcoming" => "Anstehende Vorg&auml;nge"
                              );

$language->menu = array("calendar" => "<u>K</u>alender"
                       ,"calendar_tip" => "Klicken Sie hier, um eine Kalenderansicht Ihrer Vorg&auml;nge zu erhalten und Ihre iCalendar Daten zu aktualisieren."
                       ,"history" => "<u>V</u>erlauf"
                       ,"history_tip" => "Klicken Sie hier, um die letzen 25 ver&auml;nderten Vorg&auml;nge anzeigen zu lassen."
                       ,"home" => "S<u>t</u>artseite"
                       ,"home_tip" => "Klicken Sie hier, um auf die Startseite zur&uuml;ckzukehren, die alle Sammelvorg&auml;nge anzeigt."
                       ,"new_task" => "<u>N</u>euer Vorgang"
                       ,"new_task_tip" => "Klicken Sie hier, um einen neuen Vorgang anzulegen."
                       ,"search" => "S<u>u</u>che"
                       ,"search_tip" => "Klicken Sie hier, um einen Vorgang zu suchen."
                       ,"sortable" => "So<u>r</u>tiert"
                       ,"sortable_tip" => "Klicken Sie hier, um eine sortierbare Liste an Vorg&auml;ngen anzuzeigen."
                       ,"upcoming" => "<u>A</u>nstehend"
                       ,"upcoming_tip" => "Klicken Sie hier, um alle anstehenden und versp&auml;teten Vorg&auml;nge anzuzeigen."
                       );

$language->messages = array("completed" => "Vorgang &quot;__0&quot; (#__1) wurde als abgeschlossen markiert." // title, id
                           ,"completed_reason" => "Der Vorgang &quot;__0&quot; (#__1) wurde aus folgendem Grund als abgeschlossen markiert:<p style=\"padding-left: 15px;\">__2</p>" // title, id, reason
                           ,"completed_task_link" => "Abgeschlossenen Vorgang anzeigen"
                           ,"completed_task_parent_link" => "Den &uuml;bergeordneten Vorgang zu dem abgeschlossenen Vorgang anzeigen"
                           ,"complete_instructions" => "Vorgang #__0 hat __1 noch Teilvorgang (__2) ge&ouml;ffnet. Bitte w&auml;hlen Sie die weitere Vorgehensweise aus." // id, number, number
                           ,"complete_orphan" => "Vorgang &quot;__0&quot; (#__1) wurde als abgeschlossen gekennzeichnet. Alle Teilvorg&auml;nge wurden dem Vorgang #__2 zugeordnet." // title, id, new parent task id
                           ,"complete_orphan" => "Vorgang &quot;__0&quot; (#__1) wurde als abgeschlossen gekennzeichnet. Allen Teilvorg&auml;ngen wurde die ID des Sammelvorgangs entfernt." // title, id
                           ,"complete_recursive" => "Vorgang &quot;__0&quot; (#__1) und alle Teilvorg&auml;ngen wurden als abgeschlossen gekennzeichnet." // title, id
                           ,"confirm_delete" => "Vorgang: __0 l&ouml;schen?"
                           ,"deleted" => "Vorgang  &quot;__0&quot; (#__1) wurde gel&ouml;scht." // title, id
                           ,"delete_instructions" => "Vorgang #__0 hat __1 noch Teilvorgang (__2) ge&ouml;ffnet. Bitte w&auml;hlen Sie die weitere Vorgehensweise aus." // id, number, number
                           ,"delete_orphan" => "Vorgang &quot;__0&quot; (#__1) wurde gel&ouml;scht und allen Teilvorg&auml;ngen wurden die ID's des Sammelvorgangs entfernt." // title, id
                           ,"delete_recursive" => "Vorgang &quot;__0&quot; (#__1) und alle Teilvorg&auml;nge wurden gel&ouml;scht." // title, id
                           ,"delete_remove" => "Vorgang &quot;__0&quot; (#__1) wurde gel&ouml;scht. Alle Teilvorg&auml;nge wurden dem Vorgang #__2 zugeordnet." // title, id, new parent id
                           ,"err_conflict" => "<b>Fehler:</b> Der Vorgang wurde nicht gespeichert.<br>Der Vorgang wurde von einem anderen Anwender ver&auml;ndert, w&auml;hrend Sie ihn ge&ouml;ffnet hatten. Bitte &uuml;berpr&uuml;fen Sie die unten aufgef&uuml;hrten Unterschiede und speichern noch einmal. <p>Die Version des von Ihnen ver&auml;nderten Vorgangs wurde zuletzt am __0 gespeichert.<br>Die aktuelle Version in der Datenbank wurde zuletzt am __1 gespeichert."
                           ,"err_date_format" => "<b>Fehler:</b> Es liegt ein Fehler bei <b>\$custom->date_format</b> in der 'config.php' Datei vor. Der Wert: '__0' enth&auml;lt keine oder mehrere der folgenden Eintr&auml;ge 'm', 'd', 'y'. Korrigieren Sie dies bitte in der 'config.php'." // date_format
                           ,"err_event_type" => "<b>Fehler:</b> Es liegt ein Fehler bei <b>\$custom->ical_export_type</b> in der 'config.php' Datei vor. Der Wert: '__0' ist weder 'event' noch 'todo'. Bitte korrigieren Sie dies in der 'config.php'." // ical_export_type
                           ,"err_invalid_date" => "<b>Fehler:</b> Der Vorgang wurde nicht gespeichert, da das angegebene Datum ung&uuml;ltig ist. Korrigieren oder l&ouml;schen Sie das Endedatum und speichern dann den Vorgang."
                           ,"err_invalid_parent" => "<b>Fehler:</b> Vorgang #__0 wurde als Sammelvorgang ausgew&auml;hlt. Es existiert kein Vorgang mit der angegebene ID. Bitte w&auml;hlen Sie erneut und speichern noch einmal." // id
                           ,"err_loop" => "<b>Fehler:</b> Diesen Vorgang mit seinem Sammelvorgang zu speichern w&uuml;rde eine Endlosschleife erzeugen."
                           ,"err_no_root" => "Fehler: Es wurde kein Ursprung definiert."
                           ,"err_own_parent" => "<b>Fehler:</b> Ein Vorgang kann nicht sein eigener Sammelvorgang sein."
                           ,"err_search_date_after" => "<b>Fehler:</b> Die Suche wird keine Vorg&auml;nge finden, da der Wert im Feld 'Ist f&auml;llig nach:' ung&uuml;ltig ist. Korrigieren oder l&ouml;schen Sie das Datum und wiederholen Sie Ihre Suche."
                           ,"err_search_date_before" => "<b>Fehler:</b> Die Suche wird keine Vorg&auml;nge finden, da der Wert im Feld 'Ist f&auml;llig vor:' ung&uuml;ltig ist. Korrigieren oder l&ouml;schen Sie das Datum und wiederholen Sie Ihre Suche."
                           ,"err_search_date_exact" => "<b>Fehler:</b> Die Suche wird keine Vorg&auml;nge finden, da der Wert im Feld 'Ist f&auml;llig am:' ung&uuml;ltig ist. Korrigieren oder l&ouml;schen Sie das Datum und wiederholen Sie Ihre Suche."
                           ,"js_abandon_changes" => "Beenden ohne die Änderungen zu speichern?"
                           ,"js_complete_confirm" => "Sind Sie sicher, \\ndass Sie diesen Vorgang schliessen möchten,\\nohne abschliessende Notizen?"
                           ,"js_complete_prompt" => "Abschliessende Notizen für diesen Vorgang."
                           ,"js_err_edit_date" => "Der eingegebene Wert ist kein gültiges Datum.\\nKorrigieren oder löschen Sie das Datum vor dem Speichern."
                           ,"js_err_search_date_after" => "Der Wert im Feld 'Ist fällig nach:' ist kein gültiges Datum."
                           ,"js_err_search_date_before" => "Der Wert im Feld 'Ist fällig vor:' ist kein gültiges Datum."
                           ,"js_err_search_date_exact" => "Der Wert im Feld 'Ist fällig am:' ist kein gültiges Datum."
                           ,"js_err_search_date_range" =>"Das Datum im Feld 'fällig ab:' muss vor dem Datum im Feld 'Fällig bis:' liegen."
                           ,"js_err_search_errors" => "Warnung - Die folgenden Probleme müssen korrigiert werden,\\ndamit Ihre Suche erfolgreich durchgeführt werden kann: \\n"
                           ,"js_err_search_id_invalid" => "Das 'ID' Feld muss leer sein, oder einen numerischen Wert größer 0 haben."
                           ,"js_err_search_parent_invalid" => "Das Feld 'Sammelvorgang' muss leer sein, oder einen numerischen Wert größer 0 haben."
                           ,"js_err_search_status_exact" => "Das Feld 'Status' muss leer sein, oder einen numerischen Wert zwischen 0 und 100 haben."
                           ,"js_err_search_status_less" => "Das Feld 'Status ist weniger als:' muss leer sein, oder einen numerischen Wert zwischen 0 und 100 haben."
                           ,"js_err_search_status_more" => "Das Feld 'Status ist mehr als:' muss leer sein, oder einen numerischen Wert zwischen 0 und 100 haben."
                           ,"js_err_search_status_range" => "Das Feld 'Status ist weniger als:' muss größer sein als das Feld 'Status ist mehr als:'."
                           ,"js_loading_text" => "Laden..."
                           ,"js_nothing_to_save" => "Entschuldigung, es gibt auf diesem Bildschirm nichts zu speichern."
                           ,"js_parent_required" => "Sie müssen einen Sammelvorgang für diesen Vorgang angeben,\\num den Sammelvorgang nach dem Speichern zu sehen.."
                           ,"mail_sent" => "T&auml;gliche Mahnung wurde per E-Mail versendet."
                           ,"mobile_resolve_instructions" => "Die eingetragenen Daten werden in der aktuellen Datenbankversion angezeigt. F&uuml;hren Sie Ihre &Auml;nderungen durch und klicken Sie auf 'Speichern'."
                           ,"no_email" => "Bitte tragen Sie Ihre E-Mail Adresse in der config.php Datei ein."
                           ,"parent_changed" => "Der Sammelvorgang &auml;nderte sich von __0 auf __1." // old parent id, new parent id
                           ,"saved" => "Vorgangsnummer #__0 (__1) um __2 gespeichert." // id, title, timestamp
                           ,"title" => "Nachrichten"
                           ,"warn_deleted" => "<b>Warnung:</b> Dieser Vorgang wurde bereits gel&ouml;scht."
                           );

$language->misc = array("all_rights_reserved" => "alle Rechte vorbehalten."
                       ,"copyright" => "Urheberrecht"
                       ,"count_open" => "__0 Offene Vorg&auml;nge" // number
                       ,"count_total" => "__0 Vorg&auml;nge" // number
                       ,"hide_completed" => "Abgeschlossene Vorg&auml;nge ausblenden"
                       ,"jump_to" => "Gehe zu..."
                       ,"quick_search" => "Suche"
                       ,"show_completed" => "Abgeschlossene Vorg&auml;nge einblenden"
                       ,"timer" => "Bildschirmaufbau in __0 Sekunden." // seconds
                       ,"version" => "Version __0"
                       );

$language->picker = array("date_go" => "Los"
                         ,"date_key_selected" => "ausgew&auml;hltes Datum"
                         ,"date_key_today" => "Heutiges Datum"
                         ,"date_next" => "Vorw&auml;rts"
                         ,"date_previous" => "Zur&uuml;ck"
                         ,"date_today" => "Heute"
                         ,"days" => "'So','Mo','Di','Mi','Do','Fr','Sa'"
                         ,"months" => "'Januar','Februar','M&auml;rz','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember'"
                         ,"parent_title" => "Sammelvorgang w&auml;hlen"
                         );

$language->resolve = array("append" => "Anh&auml;ngen"
                          ,"current_version" => "Aktuelle Version"
                          ,"form_title" => "Die folgenden Felder unterscheiden sich"
                          ,"none" => "(kein)"
                          ,"save" => "Speichern"
                          ,"use" => "Benutzen"
                          ,"your_data" => "Ihre Daten"
                          );

$language->search = array("after" => "ist f&auml;llig nach:"
                         ,"before" => "ist f&auml;llig vor:"
                         ,"exactly" => "ist f&auml;llig am:"
                         ,"form_title" => "Suchbegriff"
                         ,"include_completed" => "Abgeschlossene Vorg&auml;nge einschliessen"
                         ,"instructions" => "Tragen Sie den Suchbegriff, bzw. Teile der des Suchbegriffs, der in im Titel und/oder in den Notizen der Vorg&auml;nge enthalten sind, die Sie suchen. Standardm&auml;&szlig;ig werden nur die Ergebnisse zur&uuml;ckgegeben, die allen Suchbegriffen entsprechen. Klicken Sie auf &quot;noch mehr Suchoptionen&quot; um weitere Suchoptionen angezeigt zu bekommen."
                         ,"less_than" => "ist kleiner als:"
                         ,"more_options" => "noch mehr Suchoptionen"
                         ,"more_than" => "ist gr&ouml;&szlig;er als:"
                         ,"results_title" => "Suchergebnisse"
                         ,"search_button" => "Suchen"
                         );

$language->toolbar = array("b2_tip" => "An b2 senden"
                          ,"date_time" => "Datum/Uhrzeit eintragen"
                          ,"date_time_tip" => "Aktuelle(s) Datum/Uhrzeit in das Notizfeld eintragen."
                          ,"delete" => "Entfernen"
                          ,"edit" => "Editieren"
                          ,"mark_complete" => "Als abgeschlossen markieren"
                          ,"mark_complete_m" => "100%"
                          ,"mt_tip" => "An Moveable Type senden"
                          ,"new_sub" => "Neuer Teilvorgang"
                          ,"new_sub_m" => "Neuer Teil"
                          ,"save" => "<u>S</u>peichern"
                          ,"save_alt" => "Speichern"
                          ,"save_as_new" => "Als neuen Vorgang speichern"
                          ,"wp_tip" => "An WordPress senden"
                          );

$language->tree = array("due" => "F&auml;llig"
                       ,"id" => "ID:"
                       ,"loading" => $language->messages["js_loading_text"]
                       ,"open_sub_task" => "1 Teilvorg&auml;nge &ouml;ffnen <span style=\"color: #666;\">(__0 Total)</span>" // number
                       ,"open_sub_tasks" => "__0 Teilvorg&auml;nge &ouml;ffnen <span style=\"color: #666;\">(__1 Total)</span>" // number, number
                       ,"status" => "__0% abgeschlossen" // number (0-100)
                       );

?>

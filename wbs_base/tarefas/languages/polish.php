<?

// Polish 1.0

$language = new language;

$language->name = "Polish";
$language->author = "Konrad Caban";
$language->author_email = "k.caban@REMOVETHISsiteimpulse.com";
$language->author_web = "http://www.siteimpulse.com/";

$language->charset = "ISO-8859-2";

// uncomment this if you need to increase the font size from 10px
// $language->font_size = "10px;";

$language->about = array("tagline" => "keep stuff organized and get it done."
                        ,"documentation" => "Dokumentacja"
                        ,"read_me" => "Informacje"
                        ,"license" => "Licencja"
                        ,"download" => "pliki"
                        ,"this_version" => "Wersja: __0" // number
                        ,"latest_version" => "Najnowsza stabilna wersja: __0" // number
                        ,"beta_version" => "Najnowsza wersja beta: __0" // number
                        ,"using_latest" => "Korzystasz z najnowszej stabilnej wersji."
                        ,"using_beta" => "Korzystasz z najnowszej wersji beta."
                        ,"feedback" => "Uwagi i sugestie:"
                        ,"web" => "WWW:"
                        ,"credits" => "Autorzy"
                        ,"main_credit" => "aplikacja Tasks Jr. zosta³a wymy¶lona i stworzona przez <nobr>Alex King</nobr>. Poszczególne wersje jêzykowe stworzyli:"
                        ,"web_site" => "web site"
                        ,"email" => "e-mail"
                        );

$language->accesskey = array("calendar" => "k"
                            ,"history" => "h"
                            ,"home" => "r"
                            ,"new_task" => "n"
                            ,"save" => "z"
                            ,"search" => "s"
                            ,"sortable" => "w"
                            ,"title" => "t"
                            ,"upcoming" => "u"
                            );

$language->breadcrumbs = array("history" => "Historia"
                              ,"home" => "Start"
                              ,"new_task" => "Nowe zadanie"
                              ,"search" => "Szukaj"
                              ,"search_results" => "Szukaj w wynikach"
                              ,"sortable" => "Sortowalna lista zadañ"
                              ,"upcoming" => "Up³ywaj±ce terminy"
                              );

$language->confirm = array("complete_instructions" => "Zadanie, które zaznaczasz jako wykonane, ma __0 otwartych pod-zadañ. Zdecyduj, co robiæ:" // number
                          ,"complete_orphan" => "Zaznaczyæ to zadanie jako wykonane i od³±czyæ od niego pod-zadania."
                          ,"complete_notes" => "Wprowad¼ opis zamkniêcia dla tego zadania:"
                          ,"complete_recursive" => "Zaznaczyæ to zadanie i jego pod-zadania jako wykonane."
                          ,"complete_remove" => "Zaznaczyæ to zadanie jako wykonane a jego pod-zadania przenie¶æ do zadania nadrzêdnego dla tego zadania."
                          ,"complete_title" => "Zaznaczanie zadania jako wykonane - opcje"
                          ,"delete_confirm" => "Na pewno chcesz usun±æ to zadanie?"
                          ,"delete_instructions" => "Zadanie, które chcesz usun±æ, ma __0 otwartych pod-zadañ. Zdecyduj, co robiæ:" // number
                          ,"delete_orphan" => "Usun±æ to zadanie i od³±czyæ od niego pod-zadania."
                          ,"delete_recursive" => "Usun±æ to zadanie razem z jego pod-zadaniami."
                          ,"delete_remove" => "Usun±æ to zadanie a jego pod-zadania przenie¶æ do zadania nadrzêdnego dla tego zadania."
                          ,"delete_title" => "Usuwanie zadania - opcje"
                          ,"delete_title_m" => "Usuñ zadanie"
                          );

$language->data = array("no" => "Nie"
                       ,"priority_1" => "Najni¿szy"
                       ,"priority_2" => "Niski"
                       ,"priority_3" => "¦redni"
                       ,"priority_4" => "Wysoki"
                       ,"priority_5" => "Najwy¿szy"
                       ,"rel_date" => "__0" // date
                       ,"rel_date_days" => "za __0 dni" // number
                       ,"rel_date_days_ago" => "__0 dni temu" // number
                       ,"rel_date_today" => "dzisiaj"
                       ,"rel_date_tomorrow" => "jutro"
                       ,"rel_date_week" => "za tydzieñ"
                       ,"rel_date_week_ago" => "tydzieñ temu"
                       ,"rel_date_yesterday" => "wczoraj"
                       ,"yes" => "Tak"
                       );

$language->email_reminders = array("overdue" => "Po terminie"
                                  ,"due" => "Termin"
                                  ,"upcoming" => "Up³ywaj±cy"
                                  ,"high_priority" => "Wysokie priorytet"
                                  ,"status" => "Status"
                                  ,"complete" => "% wykonania"
                                  ,"priority" => "Priorytet"
                                  ,"none" => "(nic)"
                                  ,"subject" => "przypominacz o zadaniach"
                                  );

$language->form = array("1_week" => "1 tydzieñ"
                       ,"1_year" => "1 rok"
                       ,"30_days" => "30 dni"
                       ,"90_days" => "90 dni"
                       ,"after_save" => "Po zapisaniu:"
                       ,"choose_date" => "Wybierz datê"
                       ,"clear_date" => "Wyczy¶æ"
                       ,"date_due" => "Termin:"
                       ,"date_entered" => "Data wprowadzenia:"
                       ,"date_modified" => "Ostatnia modyfikacja:"
                       ,"form_title_edit" => "Edytuj zadanie"
                       ,"form_title_new" => "Nowe zadanie"
                       ,"id" => "ID:"
                       ,"new_task" => "Nowe zadanie"
                       ,"notes" => "Opis:"
                       ,"parent" => "Nadrzêdne:"
                       ,"priority" => "Priorytet:"
                       ,"return_home" => "Wróæ na stronê g³ówn±"
                       ,"status" => "% wykonania:"
                       ,"status_label" => "% wykonania"
                       ,"stay_here" => "Zostañ tutaj"
                       ,"sticky" => "Zadanie sta³e"
                       ,"sticky_label" => "Zadanie sta³e:"
                       ,"title" => "<U>T</U>ytu³:"
                       ,"today" => "Dzisiaj"
                       ,"tomorrow" => "Jutro"
                       ,"url" => "URL:"
                       ,"urls" => "URL:"
                       ,"url_1" => "URL 1:"
                       ,"url_2" => "URL 2:"
                       ,"url_3" => "URL 3:"
                       ,"view_parent" => "Zobacz zadanie nadrzêdne"
                       ,"view_tree" => "Zobacz drzewo"
                       );

$language->home = array("sort_title" => "Sortuj wg tytu³u"
                       ,"sort_title_rev" => "Sortuj wg tytu³u (malej±co)"
                       ,"sort_priority" => "Sortuj wg priorytetu"
                       ,"sort_priority_rev" => "Sortuj wg priorytetu (malej±co)"
                       );

$language->icons = array("completed" => "Zadanie wykonane"
                        ,"delete" => "Usuñ"
                        ,"edit" => "Edytuj"
                        ,"hide_show" => "Ukryj/Poka¿"
                        ,"hide_show_tip" => "Ukryj lub poka¿ wiêcej informacji o tym zadaniu"
                        ,"mark_complete" => "Zaznacz jako wykonane"
                        ,"new_sub_task" => "Nowe pod-zadanie"
                        ,"notes_bigger" => "Powiêksz pole opisu"
                        ,"notes_smaller" => "Pomniejsz pole poisu"
                        ,"parent_picker" => "Wybierz zadanie nadrzêdne"
                        ,"priority" => "Priorytet: __0" // result of get_friendly_priority();
                        ,"sticky" => "Zadanie sta³e"
                        ,"tree_toggle" => "Ukryj/Poka¿"
                        ,"tree_toggle_tip" => "Ukryj lub poka¿ wiêcej pod-zadañ tego zadania"
                        );

$language->list = array("banner" => "Wy¶wietlanie __0 elementów" // number
                       ,"date_due" => "Termin"
                       ,"done" => "(wykonane)"
                       ,"id" => "ID"
                       ,"no_items" => "Brak elementów do wy¶wietlenia."
                       ,"priority" => "Priorytet"
                       ,"status" => "% wykonania"
                       ,"title" => "Tytu³"
                       );

$language->list_titles = array("history" => "25 ostatnio modyfikowanych zadañ"
                              ,"overdue" => "Zadania opó¼nione"
                              ,"sortable" => "Sortowalna lista zadañ"
                              ,"upcoming" => "Up³ywaj±ce terminy"
                              );

$language->menu = array("calendar" => "<u>K</u>alendarz"
                       ,"calendar_tip" => "Kliknij ¿eby zobaczyæ swoje zadania na kalendarzu."
                       ,"history" => "<u>H</u>istoria"
                       ,"history_tip" => "Kliknij ¿eby zobaczyæ 25 ostatnio modyfikowanych zadañ."
                       ,"home" => "Sta<u>r</u>t"
                       ,"home_tip" => "Kliknij ¿eby przej¶æ na stronê g³ówn± i zobaczyæ wszystkie zadania g³ówne."
                       ,"new_task" => "<u>N</u>owe zadanie"
                       ,"new_task_tip" => "Kliknij ¿eby utworzyæ nowe zadanie."
                       ,"search" => "<u>S</u>zukaj"
                       ,"search_tip" => "Kliknij, ¿eby przeszukaæ zadania."
                       ,"sortable" => "Lista sorto<u>w</u>alna"
                       ,"sortable_tip" => "Kliknij ¿eby zobaczyæ sortowaln± listê zadañ."
                       ,"upcoming" => "<u>U</u>p³ywaj±ce terminy"
                       ,"upcoming_tip" => "Kliknij ¿eby zobaczyæ wszystkie up³ywaj±ce terminy i opó¼nione zadania."
                       );

$language->messages = array("completed" => "Zadanie &quot;__0&quot; (#__1) zosta³o zaznaczone jako wykonane." // title, id
                           ,"completed_reason" => 'Zadanie &quot;__0&quot; (#__1) zosta³o zaznaczone jako wykonane z powodu:<p style="padding-left: 15px;">__2</p>' // title, id, reason
                           ,"completed_task_link" => "Zobacz wykonane zadanie"
                           ,"completed_task_parent_link" => "Zobacz zadanie nadrzêdne wykonanego zadania"
                           ,"complete_instructions" => "Zadanie #__0 ma __1 pod-zadañ, (w tym __2 otwartych). Zdecyduj, co robiæ." // id, number, number
                           ,"complete_orphan" => "Zadanie &quot;__0&quot; (#__1) zosta³o zaznaczone jako wykonane a wszystkie jego pod-zadania zosta³y przeniesione do zadania #__2." // title, id, new parent task id
                           ,"complete_orphan" => "Zadanie &quot;__0&quot; (#__1) zosta³o zaznaczone jako wykonane a wszystkie jego pod-zadania zosta³y od niego od³±czone." // title, id
                           ,"complete_recursive" => "Zadanie &quot;__0&quot; (#__1) i wszystkie jego pod-zadania zosta³y zaznaczone jako wykonane." // title, id
                           ,"confirm_delete" => "Usun±æ zadanie: __0?"
                           ,"deleted" => "Zadanie &quot;__0&quot; (#__1) zosta³o usuniête." // title, id
                           ,"delete_instructions" => "Zadanie #__0 ma __1 pod zadañ (w tym __2 otwartych). Zdecyduj, co robiæ." // id, number, number
                           ,"delete_orphan" => "Zadanie &quot;__0&quot; (#__1) zosta³o usuniête a wszystkie jego pod-zadania zosta³y od niego od³±czone." // title, id
                           ,"delete_recursive" => "Zadanie &quot;__0&quot; (#__1) i wszystkie jego pod-zadania zosta³y usuniête." // title, id
                           ,"delete_remove" => "Zadanie &quot;__0&quot; (#__1) zosta³o usuniête a wszystkie jego pod-zadania zosta³y przeniesione do zadania #__2" // title, id, new parent id
                           ,"err_conflict" => "<b>B³±d:</b> To zadanie nie by³o zapisane.<br>Inny u¿ytkownik je edytowa³ od momentu, kiedy zosta³o przez Ciebie otwarte. Przejrzyj wy¶wietlone poni¿ej ró¿nice i zapisz ponownie. <p>Wersja, do której zmiany zosta³y wprowadzone przez Ciebie, zosta³a ostatnoi zapisana __0;<br>aktualna wersja w bazie zosta³a zapisana __1"
                           ,"err_date_format" => "<b>B³±d:</b> Jest b³±d w Twoim <b>\$custom->date_format</b> w 'config.php'. W Twojej warto¶ci: '__0' brakuje jednego (lub wiêcej) z elementów: 'm', 'd', 'y'. Popraw to w pliku 'config.php'." // date_format
                           ,"err_event_type" => "<b>B³±d:</b> Jest b³±d w Twoim <b>\$custom->ical_export_type</b> w 'config.php'. Twoja warto¶æ: '__0' nie jest 'event' ani 'todo'. Popraw to w pliku 'config.php'." // ical_export_type
                           ,"err_invalid_date" => "<b>B³±d:</b> To zadanie nie zosta³o zapisane, poniewa¿ podana data nie jest poprawna. Popraw lub wyczy¶æ termin i zapisz zadanie."
                           ,"err_invalid_parent" => "<b>B³±d:</b> Zadanie #__0 zosta³o okre¶lone jako nadrzêdne, ale nie istnieje zadanie z tym ID. Rozwi±¿ ten problem i zapisz ponownie." // id
                           ,"err_loop" => "<b>B³±d:</b> Zapisanie tego zadania ze zdefiniowanym zadaniem nadrzêdnym spowodowa³oby nieskoñczon± pêtlê."
                           ,"err_no_root" => "B³±d: Brak zadania g³ównego."
                           ,"err_own_parent" => "<b>B³±d:</b> Zadanie nie mo¿e byæ swoim w³asnym zadaniem nadrzêdnym."
                           ,"err_search_date_after" => "<b>B³±d:</b> To zapytanie nie znajdzie ¿adnych zadañ, poniewa¿ podany 'Termin po:' jest niew³a¶ciwy. Popraw lub wyczy¶æ termin i spróbuj ponownie."
                           ,"err_search_date_before" => "<b>B³±d:</b> To zapytanie nie znajdzie ¿adnych zadañ, poniewa¿ podany 'Termin przed:' jest niew³a¶ciwy. Popraw lub wyczy¶æ termin i spróbuj ponownie."
                           ,"err_search_date_exact" => "<b>B³±d:</b> To zapytanie nie znajdzie ¿adnych zadañ, poniewa¿ podany 'Termin dok³adnie:' jest niew³a¶ciwy. Popraw lub wyczy¶æ termin i spróbuj ponownie."
                           ,"js_abandon_changes" => "Wyj¶æ bez zapisywania zmian?"
                           ,"js_complete_confirm" => "Na pewno chcesz zamkn±æ to zadanie\\nbez podawania opisu zamkniêcia?"
                           ,"js_complete_prompt" => "Wprowad¼ opis zamkniêcia zla tego zadania."
                           ,"js_err_edit_date" => "Obecna warto¶æ pola Termin jest niew³a¶ciwa.\\nZmieñ lub usuñ t± warto¶æ przed zapisaniem."
                           ,"js_err_search_date_after" => "Obecna warto¶æ pola 'Termin po:' nie jest poprawn± dat±."
                           ,"js_err_search_date_before" => "Obecna warto¶æ pola 'Termin przed:' nie jest poprawn± dat±."
                           ,"js_err_search_date_exact" => "Obecna warto¶æ pola 'Termin dok³adnie:' nie jest poprawn± dat±."
                           ,"js_err_search_date_range" => "Data w polu 'Termin przed:' musi byæ pó¼niejsza ni¿ 'Termin po:' ."
                           ,"js_err_search_errors" => "Ostrze¿enie - Nastêpuj±ce problemy musz± zostaæ rozwi±zane\\n¿eby Twoje zapytanie zwróci³o jakiekolwiek wyniki: \\n"
                           ,"js_err_search_id_invalid" => "Pole 'ID' field must be empty or have a numeric value greater than 0."
                           ,"js_err_search_parent_invalid" => "Pole 'Zadanie nadrzêdne' musi byæ puste albo zawieraæ warto¶æ liczbow± wiêksz± od 0."
                           ,"js_err_search_status_exact" => "Pole 'Status dok³adnie:' musi zawieraæ warto¶æ liczbow± miêdzy 0 a 100."
                           ,"js_err_search_status_less" => "Pole 'Status poni¿ej:' musi byæ puste albo zawieraæ warto¶æ liczbow± miêdzy 0 a 100."
                           ,"js_err_search_status_more" => "Pole 'Status powy¿ej:' musi byæ puste albo zawieraæ warto¶æ liczbow± miêdzy 0 a 100."
                           ,"js_err_search_status_range" => "Pole 'Status poni¿ej:' musi zawieraæ warto¶æ wiêksz± ni¿ 'Status powy¿ej:'."
                           ,"js_loading_text" => "Wczytywanie..."
                           ,"js_nothing_to_save" => "Na tym ekranie nie ma niczego do zapisania."
                           ,"js_parent_required" => "Musisz okre¶liæ zadanie nadrzêdne dla tego\\nzadania, ¿eby je zobaczyæ po zapisaniu."
                           ,"mail_sent" => "Dzienne przypominacze zosta³y wys³ane."
                           ,"mobile_resolve_instructions" => "Dane przez Ciebie wprowadzone zostan± wy¶wietlone pod wersj±, która obecnie znajduje siê w bazie. Wprowad¼ wszelkie zamierzone zmiany i kliknij 'Zapisz'."
                           ,"no_email" => "Podaj swój adres e-mail w pliku config.php."
                           ,"parent_changed" => "Zadanie nadrzêdne zmienione z __0 na __1." // old parent id, new parent id
                           ,"saved" => "Zadanie #__0 (__1) zapisane __2." // id, title, timestamp
                           ,"title" => "Wiadomo¶ci"
                           ,"warn_deleted" => "<b>Ostrze¿enie:</b> To zadanie zosta³o ju¿ usuniête."
                           );

$language->misc = array("all_rights_reserved" => "wszelkie prawa zastrze¿one."
                       ,"copyright" => "copyright"
                       ,"count_open" => "__0 otwartych zadañ" // number
                       ,"count_total" => "__0 zadañ" // number
                       ,"hide_completed" => "Ukryj wykonane zadania"
                       ,"jump_to" => "Skocz do..."
                       ,"quick_search" => "Szybkie szukanie"
                       ,"show_completed" => "Poka¿ wykonane zadania"
                       ,"timer" => "ekran wy¶wietlony w __0 sekund." // seconds
                       ,"version" => "wersja __0" // number
                       );

$language->picker = array("date_go" => "Id¼"
                         ,"date_key_selected" => "Obecnie wybrana data"
                         ,"date_key_today" => "Data dzisiejsza"
                         ,"date_next" => "Nastêpny"
                         ,"date_previous" => "Poprzedni"
                         ,"date_today" => "Dzisiaj"
                         ,"days" => "'Nie','Pon','Wto','¦ro','Czw','Pi±','Sob'"
                         ,"months" => "'styczeñ','luty','marzec','kwiecieñ','maj','czerwiec','lipiec','sierpieñ','wrzesieñ','pa¼dziernik','listopad','grudzieñ'"
                         ,"parent_title" => "Wybierz zadanie nadrzêdne"
                         );

$language->resolve = array("append" => "Dodaj"
                          ,"current_version" => "Obecna wersja"
                          ,"form_title" => "Nastêpuj±ce pola siê ró¿ni±"
                          ,"none" => "(nic)"
                          ,"save" => "Zapisz"
                          ,"use" => "U¿yj"
                          ,"your_data" => "Twoje dane"
                          );

$language->search = array("after" => "przed:"
                         ,"before" => "po:"
                         ,"exactly" => "dok³adnie:"
                         ,"form_title" => "Kryteria wyszukiwania"
                         ,"include_completed" => "Uwzglêdnij równie¿ zadania wykonane"
                         ,"instructions" => "Podaj s³owa lub fragmenty s³ów, które znajduj± siê w tytule lub opisie zadañ, których szukasz. Domy¶lnie, wyszukiwanie znajdzie tylko te zadania, które zawieraj± wszystkie podane s³owa/fragmenty. Kliknij &quot;Wiêcej opcji wyszukiwania&quot;, ¿eby zobaczyæ dodatkowe kryteria."
                         ,"less_than" => "poni¿ej:"
                         ,"more_options" => "Wiêcej opcji wyszukiwania"
                         ,"more_than" => "powy¿ej:"
                         ,"results_title" => "Wyniki wyszukiwania"
                         ,"search_button" => "Szukaj"
                         );

$language->toolbar = array("b2_tip" => "Umie¶æ w b2"
                          ,"date_time" => "Wstaw datê/czas"
                          ,"date_time_tip" => "Wprowad¼ bie¿±c± datê/czas w polu Opis"
                          ,"delete" => "Usuñ"
                          ,"edit" => "Edytuj"
                          ,"mark_complete" => "Zaznacz jako wykonane"
                          ,"mark_complete_m" => "100%"
                          ,"mt_tip" => "Umie¶æ w typie ruchomym"
                          ,"new_sub" => "Nowe pod-zadanie"
                          ,"new_sub_m" => "Nowe pod-"
                          ,"save" => "<u>Z</u>apisz"
                          ,"save_alt" => "Zapisz"
                          ,"save_as_new" => "Zapisz jako nowe zadanie"
                          ,"wp_tip" => "Umie¶æ w WordPress"
                          );

$language->tree = array("due" => "Termin:"
                       ,"id" => "ID:"
                       ,"loading" => $language->messages["js_loading_text"] // no need to set this
                       ,"open_sub_task" => '1 otwarte pod-zadanie <span style="color: #666;">(w sumie __0)</span>' // number
                       ,"open_sub_tasks" => '__0 otwartych pod-zadañ <span style="color: #666;">(w sumie __1)</span>' // number, number
                       ,"status" => "__0% wykonania" // number (0-100)
                       );

?>

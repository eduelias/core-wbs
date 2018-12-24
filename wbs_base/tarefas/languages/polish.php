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
                        ,"main_credit" => "aplikacja Tasks Jr. zosta�a wymy�lona i stworzona przez <nobr>Alex King</nobr>. Poszczeg�lne wersje j�zykowe stworzyli:"
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
                              ,"sortable" => "Sortowalna lista zada�"
                              ,"upcoming" => "Up�ywaj�ce terminy"
                              );

$language->confirm = array("complete_instructions" => "Zadanie, kt�re zaznaczasz jako wykonane, ma __0 otwartych pod-zada�. Zdecyduj, co robi�:" // number
                          ,"complete_orphan" => "Zaznaczy� to zadanie jako wykonane i od��czy� od niego pod-zadania."
                          ,"complete_notes" => "Wprowad� opis zamkni�cia dla tego zadania:"
                          ,"complete_recursive" => "Zaznaczy� to zadanie i jego pod-zadania jako wykonane."
                          ,"complete_remove" => "Zaznaczy� to zadanie jako wykonane a jego pod-zadania przenie�� do zadania nadrz�dnego dla tego zadania."
                          ,"complete_title" => "Zaznaczanie zadania jako wykonane - opcje"
                          ,"delete_confirm" => "Na pewno chcesz usun�� to zadanie?"
                          ,"delete_instructions" => "Zadanie, kt�re chcesz usun��, ma __0 otwartych pod-zada�. Zdecyduj, co robi�:" // number
                          ,"delete_orphan" => "Usun�� to zadanie i od��czy� od niego pod-zadania."
                          ,"delete_recursive" => "Usun�� to zadanie razem z jego pod-zadaniami."
                          ,"delete_remove" => "Usun�� to zadanie a jego pod-zadania przenie�� do zadania nadrz�dnego dla tego zadania."
                          ,"delete_title" => "Usuwanie zadania - opcje"
                          ,"delete_title_m" => "Usu� zadanie"
                          );

$language->data = array("no" => "Nie"
                       ,"priority_1" => "Najni�szy"
                       ,"priority_2" => "Niski"
                       ,"priority_3" => "�redni"
                       ,"priority_4" => "Wysoki"
                       ,"priority_5" => "Najwy�szy"
                       ,"rel_date" => "__0" // date
                       ,"rel_date_days" => "za __0 dni" // number
                       ,"rel_date_days_ago" => "__0 dni temu" // number
                       ,"rel_date_today" => "dzisiaj"
                       ,"rel_date_tomorrow" => "jutro"
                       ,"rel_date_week" => "za tydzie�"
                       ,"rel_date_week_ago" => "tydzie� temu"
                       ,"rel_date_yesterday" => "wczoraj"
                       ,"yes" => "Tak"
                       );

$language->email_reminders = array("overdue" => "Po terminie"
                                  ,"due" => "Termin"
                                  ,"upcoming" => "Up�ywaj�cy"
                                  ,"high_priority" => "Wysokie priorytet"
                                  ,"status" => "Status"
                                  ,"complete" => "% wykonania"
                                  ,"priority" => "Priorytet"
                                  ,"none" => "(nic)"
                                  ,"subject" => "przypominacz o zadaniach"
                                  );

$language->form = array("1_week" => "1 tydzie�"
                       ,"1_year" => "1 rok"
                       ,"30_days" => "30 dni"
                       ,"90_days" => "90 dni"
                       ,"after_save" => "Po zapisaniu:"
                       ,"choose_date" => "Wybierz dat�"
                       ,"clear_date" => "Wyczy��"
                       ,"date_due" => "Termin:"
                       ,"date_entered" => "Data wprowadzenia:"
                       ,"date_modified" => "Ostatnia modyfikacja:"
                       ,"form_title_edit" => "Edytuj zadanie"
                       ,"form_title_new" => "Nowe zadanie"
                       ,"id" => "ID:"
                       ,"new_task" => "Nowe zadanie"
                       ,"notes" => "Opis:"
                       ,"parent" => "Nadrz�dne:"
                       ,"priority" => "Priorytet:"
                       ,"return_home" => "Wr�� na stron� g��wn�"
                       ,"status" => "% wykonania:"
                       ,"status_label" => "% wykonania"
                       ,"stay_here" => "Zosta� tutaj"
                       ,"sticky" => "Zadanie sta�e"
                       ,"sticky_label" => "Zadanie sta�e:"
                       ,"title" => "<U>T</U>ytu�:"
                       ,"today" => "Dzisiaj"
                       ,"tomorrow" => "Jutro"
                       ,"url" => "URL:"
                       ,"urls" => "URL:"
                       ,"url_1" => "URL 1:"
                       ,"url_2" => "URL 2:"
                       ,"url_3" => "URL 3:"
                       ,"view_parent" => "Zobacz zadanie nadrz�dne"
                       ,"view_tree" => "Zobacz drzewo"
                       );

$language->home = array("sort_title" => "Sortuj wg tytu�u"
                       ,"sort_title_rev" => "Sortuj wg tytu�u (malej�co)"
                       ,"sort_priority" => "Sortuj wg priorytetu"
                       ,"sort_priority_rev" => "Sortuj wg priorytetu (malej�co)"
                       );

$language->icons = array("completed" => "Zadanie wykonane"
                        ,"delete" => "Usu�"
                        ,"edit" => "Edytuj"
                        ,"hide_show" => "Ukryj/Poka�"
                        ,"hide_show_tip" => "Ukryj lub poka� wi�cej informacji o tym zadaniu"
                        ,"mark_complete" => "Zaznacz jako wykonane"
                        ,"new_sub_task" => "Nowe pod-zadanie"
                        ,"notes_bigger" => "Powi�ksz pole opisu"
                        ,"notes_smaller" => "Pomniejsz pole poisu"
                        ,"parent_picker" => "Wybierz zadanie nadrz�dne"
                        ,"priority" => "Priorytet: __0" // result of get_friendly_priority();
                        ,"sticky" => "Zadanie sta�e"
                        ,"tree_toggle" => "Ukryj/Poka�"
                        ,"tree_toggle_tip" => "Ukryj lub poka� wi�cej pod-zada� tego zadania"
                        );

$language->list = array("banner" => "Wy�wietlanie __0 element�w" // number
                       ,"date_due" => "Termin"
                       ,"done" => "(wykonane)"
                       ,"id" => "ID"
                       ,"no_items" => "Brak element�w do wy�wietlenia."
                       ,"priority" => "Priorytet"
                       ,"status" => "% wykonania"
                       ,"title" => "Tytu�"
                       );

$language->list_titles = array("history" => "25 ostatnio modyfikowanych zada�"
                              ,"overdue" => "Zadania op�nione"
                              ,"sortable" => "Sortowalna lista zada�"
                              ,"upcoming" => "Up�ywaj�ce terminy"
                              );

$language->menu = array("calendar" => "<u>K</u>alendarz"
                       ,"calendar_tip" => "Kliknij �eby zobaczy� swoje zadania na kalendarzu."
                       ,"history" => "<u>H</u>istoria"
                       ,"history_tip" => "Kliknij �eby zobaczy� 25 ostatnio modyfikowanych zada�."
                       ,"home" => "Sta<u>r</u>t"
                       ,"home_tip" => "Kliknij �eby przej�� na stron� g��wn� i zobaczy� wszystkie zadania g��wne."
                       ,"new_task" => "<u>N</u>owe zadanie"
                       ,"new_task_tip" => "Kliknij �eby utworzy� nowe zadanie."
                       ,"search" => "<u>S</u>zukaj"
                       ,"search_tip" => "Kliknij, �eby przeszuka� zadania."
                       ,"sortable" => "Lista sorto<u>w</u>alna"
                       ,"sortable_tip" => "Kliknij �eby zobaczy� sortowaln� list� zada�."
                       ,"upcoming" => "<u>U</u>p�ywaj�ce terminy"
                       ,"upcoming_tip" => "Kliknij �eby zobaczy� wszystkie up�ywaj�ce terminy i op�nione zadania."
                       );

$language->messages = array("completed" => "Zadanie &quot;__0&quot; (#__1) zosta�o zaznaczone jako wykonane." // title, id
                           ,"completed_reason" => 'Zadanie &quot;__0&quot; (#__1) zosta�o zaznaczone jako wykonane z powodu:<p style="padding-left: 15px;">__2</p>' // title, id, reason
                           ,"completed_task_link" => "Zobacz wykonane zadanie"
                           ,"completed_task_parent_link" => "Zobacz zadanie nadrz�dne wykonanego zadania"
                           ,"complete_instructions" => "Zadanie #__0 ma __1 pod-zada�, (w tym __2 otwartych). Zdecyduj, co robi�." // id, number, number
                           ,"complete_orphan" => "Zadanie &quot;__0&quot; (#__1) zosta�o zaznaczone jako wykonane a wszystkie jego pod-zadania zosta�y przeniesione do zadania #__2." // title, id, new parent task id
                           ,"complete_orphan" => "Zadanie &quot;__0&quot; (#__1) zosta�o zaznaczone jako wykonane a wszystkie jego pod-zadania zosta�y od niego od��czone." // title, id
                           ,"complete_recursive" => "Zadanie &quot;__0&quot; (#__1) i wszystkie jego pod-zadania zosta�y zaznaczone jako wykonane." // title, id
                           ,"confirm_delete" => "Usun�� zadanie: __0?"
                           ,"deleted" => "Zadanie &quot;__0&quot; (#__1) zosta�o usuni�te." // title, id
                           ,"delete_instructions" => "Zadanie #__0 ma __1 pod zada� (w tym __2 otwartych). Zdecyduj, co robi�." // id, number, number
                           ,"delete_orphan" => "Zadanie &quot;__0&quot; (#__1) zosta�o usuni�te a wszystkie jego pod-zadania zosta�y od niego od��czone." // title, id
                           ,"delete_recursive" => "Zadanie &quot;__0&quot; (#__1) i wszystkie jego pod-zadania zosta�y usuni�te." // title, id
                           ,"delete_remove" => "Zadanie &quot;__0&quot; (#__1) zosta�o usuni�te a wszystkie jego pod-zadania zosta�y przeniesione do zadania #__2" // title, id, new parent id
                           ,"err_conflict" => "<b>B��d:</b> To zadanie nie by�o zapisane.<br>Inny u�ytkownik je edytowa� od momentu, kiedy zosta�o przez Ciebie otwarte. Przejrzyj wy�wietlone poni�ej r�nice i zapisz ponownie. <p>Wersja, do kt�rej zmiany zosta�y wprowadzone przez Ciebie, zosta�a ostatnoi zapisana __0;<br>aktualna wersja w bazie zosta�a zapisana __1"
                           ,"err_date_format" => "<b>B��d:</b> Jest b��d w Twoim <b>\$custom->date_format</b> w 'config.php'. W Twojej warto�ci: '__0' brakuje jednego (lub wi�cej) z element�w: 'm', 'd', 'y'. Popraw to w pliku 'config.php'." // date_format
                           ,"err_event_type" => "<b>B��d:</b> Jest b��d w Twoim <b>\$custom->ical_export_type</b> w 'config.php'. Twoja warto��: '__0' nie jest 'event' ani 'todo'. Popraw to w pliku 'config.php'." // ical_export_type
                           ,"err_invalid_date" => "<b>B��d:</b> To zadanie nie zosta�o zapisane, poniewa� podana data nie jest poprawna. Popraw lub wyczy�� termin i zapisz zadanie."
                           ,"err_invalid_parent" => "<b>B��d:</b> Zadanie #__0 zosta�o okre�lone jako nadrz�dne, ale nie istnieje zadanie z tym ID. Rozwi�� ten problem i zapisz ponownie." // id
                           ,"err_loop" => "<b>B��d:</b> Zapisanie tego zadania ze zdefiniowanym zadaniem nadrz�dnym spowodowa�oby niesko�czon� p�tl�."
                           ,"err_no_root" => "B��d: Brak zadania g��wnego."
                           ,"err_own_parent" => "<b>B��d:</b> Zadanie nie mo�e by� swoim w�asnym zadaniem nadrz�dnym."
                           ,"err_search_date_after" => "<b>B��d:</b> To zapytanie nie znajdzie �adnych zada�, poniewa� podany 'Termin po:' jest niew�a�ciwy. Popraw lub wyczy�� termin i spr�buj ponownie."
                           ,"err_search_date_before" => "<b>B��d:</b> To zapytanie nie znajdzie �adnych zada�, poniewa� podany 'Termin przed:' jest niew�a�ciwy. Popraw lub wyczy�� termin i spr�buj ponownie."
                           ,"err_search_date_exact" => "<b>B��d:</b> To zapytanie nie znajdzie �adnych zada�, poniewa� podany 'Termin dok�adnie:' jest niew�a�ciwy. Popraw lub wyczy�� termin i spr�buj ponownie."
                           ,"js_abandon_changes" => "Wyj�� bez zapisywania zmian?"
                           ,"js_complete_confirm" => "Na pewno chcesz zamkn�� to zadanie\\nbez podawania opisu zamkni�cia?"
                           ,"js_complete_prompt" => "Wprowad� opis zamkni�cia zla tego zadania."
                           ,"js_err_edit_date" => "Obecna warto�� pola Termin jest niew�a�ciwa.\\nZmie� lub usu� t� warto�� przed zapisaniem."
                           ,"js_err_search_date_after" => "Obecna warto�� pola 'Termin po:' nie jest poprawn� dat�."
                           ,"js_err_search_date_before" => "Obecna warto�� pola 'Termin przed:' nie jest poprawn� dat�."
                           ,"js_err_search_date_exact" => "Obecna warto�� pola 'Termin dok�adnie:' nie jest poprawn� dat�."
                           ,"js_err_search_date_range" => "Data w polu 'Termin przed:' musi by� p�niejsza ni� 'Termin po:' ."
                           ,"js_err_search_errors" => "Ostrze�enie - Nast�puj�ce problemy musz� zosta� rozwi�zane\\n�eby Twoje zapytanie zwr�ci�o jakiekolwiek wyniki: \\n"
                           ,"js_err_search_id_invalid" => "Pole 'ID' field must be empty or have a numeric value greater than 0."
                           ,"js_err_search_parent_invalid" => "Pole 'Zadanie nadrz�dne' musi by� puste albo zawiera� warto�� liczbow� wi�ksz� od 0."
                           ,"js_err_search_status_exact" => "Pole 'Status dok�adnie:' musi zawiera� warto�� liczbow� mi�dzy 0 a 100."
                           ,"js_err_search_status_less" => "Pole 'Status poni�ej:' musi by� puste albo zawiera� warto�� liczbow� mi�dzy 0 a 100."
                           ,"js_err_search_status_more" => "Pole 'Status powy�ej:' musi by� puste albo zawiera� warto�� liczbow� mi�dzy 0 a 100."
                           ,"js_err_search_status_range" => "Pole 'Status poni�ej:' musi zawiera� warto�� wi�ksz� ni� 'Status powy�ej:'."
                           ,"js_loading_text" => "Wczytywanie..."
                           ,"js_nothing_to_save" => "Na tym ekranie nie ma niczego do zapisania."
                           ,"js_parent_required" => "Musisz okre�li� zadanie nadrz�dne dla tego\\nzadania, �eby je zobaczy� po zapisaniu."
                           ,"mail_sent" => "Dzienne przypominacze zosta�y wys�ane."
                           ,"mobile_resolve_instructions" => "Dane przez Ciebie wprowadzone zostan� wy�wietlone pod wersj�, kt�ra obecnie znajduje si� w bazie. Wprowad� wszelkie zamierzone zmiany i kliknij 'Zapisz'."
                           ,"no_email" => "Podaj sw�j adres e-mail w pliku config.php."
                           ,"parent_changed" => "Zadanie nadrz�dne zmienione z __0 na __1." // old parent id, new parent id
                           ,"saved" => "Zadanie #__0 (__1) zapisane __2." // id, title, timestamp
                           ,"title" => "Wiadomo�ci"
                           ,"warn_deleted" => "<b>Ostrze�enie:</b> To zadanie zosta�o ju� usuni�te."
                           );

$language->misc = array("all_rights_reserved" => "wszelkie prawa zastrze�one."
                       ,"copyright" => "copyright"
                       ,"count_open" => "__0 otwartych zada�" // number
                       ,"count_total" => "__0 zada�" // number
                       ,"hide_completed" => "Ukryj wykonane zadania"
                       ,"jump_to" => "Skocz do..."
                       ,"quick_search" => "Szybkie szukanie"
                       ,"show_completed" => "Poka� wykonane zadania"
                       ,"timer" => "ekran wy�wietlony w __0 sekund." // seconds
                       ,"version" => "wersja __0" // number
                       );

$language->picker = array("date_go" => "Id�"
                         ,"date_key_selected" => "Obecnie wybrana data"
                         ,"date_key_today" => "Data dzisiejsza"
                         ,"date_next" => "Nast�pny"
                         ,"date_previous" => "Poprzedni"
                         ,"date_today" => "Dzisiaj"
                         ,"days" => "'Nie','Pon','Wto','�ro','Czw','Pi�','Sob'"
                         ,"months" => "'stycze�','luty','marzec','kwiecie�','maj','czerwiec','lipiec','sierpie�','wrzesie�','pa�dziernik','listopad','grudzie�'"
                         ,"parent_title" => "Wybierz zadanie nadrz�dne"
                         );

$language->resolve = array("append" => "Dodaj"
                          ,"current_version" => "Obecna wersja"
                          ,"form_title" => "Nast�puj�ce pola si� r�ni�"
                          ,"none" => "(nic)"
                          ,"save" => "Zapisz"
                          ,"use" => "U�yj"
                          ,"your_data" => "Twoje dane"
                          );

$language->search = array("after" => "przed:"
                         ,"before" => "po:"
                         ,"exactly" => "dok�adnie:"
                         ,"form_title" => "Kryteria wyszukiwania"
                         ,"include_completed" => "Uwzgl�dnij r�wnie� zadania wykonane"
                         ,"instructions" => "Podaj s�owa lub fragmenty s��w, kt�re znajduj� si� w tytule lub opisie zada�, kt�rych szukasz. Domy�lnie, wyszukiwanie znajdzie tylko te zadania, kt�re zawieraj� wszystkie podane s�owa/fragmenty. Kliknij &quot;Wi�cej opcji wyszukiwania&quot;, �eby zobaczy� dodatkowe kryteria."
                         ,"less_than" => "poni�ej:"
                         ,"more_options" => "Wi�cej opcji wyszukiwania"
                         ,"more_than" => "powy�ej:"
                         ,"results_title" => "Wyniki wyszukiwania"
                         ,"search_button" => "Szukaj"
                         );

$language->toolbar = array("b2_tip" => "Umie�� w b2"
                          ,"date_time" => "Wstaw dat�/czas"
                          ,"date_time_tip" => "Wprowad� bie��c� dat�/czas w polu Opis"
                          ,"delete" => "Usu�"
                          ,"edit" => "Edytuj"
                          ,"mark_complete" => "Zaznacz jako wykonane"
                          ,"mark_complete_m" => "100%"
                          ,"mt_tip" => "Umie�� w typie ruchomym"
                          ,"new_sub" => "Nowe pod-zadanie"
                          ,"new_sub_m" => "Nowe pod-"
                          ,"save" => "<u>Z</u>apisz"
                          ,"save_alt" => "Zapisz"
                          ,"save_as_new" => "Zapisz jako nowe zadanie"
                          ,"wp_tip" => "Umie�� w WordPress"
                          );

$language->tree = array("due" => "Termin:"
                       ,"id" => "ID:"
                       ,"loading" => $language->messages["js_loading_text"] // no need to set this
                       ,"open_sub_task" => '1 otwarte pod-zadanie <span style="color: #666;">(w sumie __0)</span>' // number
                       ,"open_sub_tasks" => '__0 otwartych pod-zada� <span style="color: #666;">(w sumie __1)</span>' // number, number
                       ,"status" => "__0% wykonania" // number (0-100)
                       );

?>

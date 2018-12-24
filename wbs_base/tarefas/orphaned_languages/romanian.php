<?

// romanian

$language = new language;

$language->name = "Romana";
$language->author = "Andrei Mihut";
$language->author_email = "amihut@ieee.org";
$language->author_web = "http://www.fibre-data.org/act/";

$language->charset = "utf-8";

$language->about = array("tagline" => "organizati-va activitatile, actualizati-le"
                        ,"documentation" => "Documentatie"
                        ,"read_me" => "Cititi!"
                        ,"license" => "Licenta"
                        ,"download" => "incarcati"
                        ,"this_version" => "Versiune instalata : __0"
                        ,"latest_version" => "Ultima versine disponibila : __0"
                        ,"beta_version" => "Ultima version beta disponibila : __0"
                        ,"using_latest" => "Folositi ultima versiune disponibila."
                        ,"using_beta" => "Folositi ultima versiune beta disponibila"
                        ,"feedback" => "Comentarii si sugestii :"
                        ,"web" => "Web :"
                        ,"credits" => "Autori"
                        ,"main_credit" => "Conceput si realizat de <nobr>Alex T. King</nobr>. Urmatoarele persoane au contribuit la realizarea:"
                        ,"web_site" => "site Internet"
                        ,"email" => "e-mail"
                        );

$language->accesskey = array("calendar" => "c"
                            ,"history" => "i"
                            ,"home" => "a"
                            ,"new_task" => "n"
                            ,"save" => "s"
                            ,"search" => "t"
                            ,"sortable" => "b"
                            ,"title" => "e"
                            ,"upcoming" => "u"
                            );

$language->breadcrumbs = array("history" => "Lista cronologica"
                              ,"home" => "Cuprins"
                              ,"new_task" => "Fisa noua"
                              ,"search" => "Cautare"
                              ,"search_results" => "Rezultatele cautarii"
                              ,"sortable" => "Lista sortata"
                              ,"upcoming" => "Scadente"
                              );

$language->confirm = array("complete_instructions" => "fisa pe care o marcati terminata are __0 subactivitati in curs. Ce doriti sa alegeti?" // number
                          ,"complete_orphan" => "Marcati aceasta activitate terminata si marcati subactivitatile ca independente"
                          ,"complete_recursive" => "Marcati atit aceasta activitate cit si subactivitatile ca terminate"
                          ,"complete_remove" => "Marcati aceasta activitate terminata si atasati subactivitatile la radacina comuna"
                          ,"complete_title" => "Optiuni la terminarea activitatii"
                          ,"delete_instructions" => "Fisa pe care o stergeti are __0 subfise in lucru. Ce doriti sa alegeti?" // number
                          ,"delete_orphan" => "Stergeti aceasta fisa si marcati sub-fisele independente."
                          ,"delete_recursive" => "Stergeti atit aceasta fisa cit si sub-fisele dependente"
                          ,"delete_remove" => "Stergeti aceasta fisa si marcati sub-fisele dependente de radacina"
                          ,"delete_title" => "Optiuni la stergerea unei fise"
                          );

$language->data = array("no" => "Nu"
                       ,"priority_1" => "Rutina"
                       ,"priority_2" => "Necesara"
                       ,"priority_3" => "Normala"
                       ,"priority_4" => "Importanta"
                       ,"priority_5" => "Vitala"
                       ,"rel_date_days" => "In __0 zile" // number
                       ,"rel_date_days_ago" => "Sint __0 zile" // number
                       ,"rel_date_today" => "Astazi"
                       ,"rel_date_tomorrow" => "Miine"
                       ,"rel_date_week" => "Intr-o saptamina"
                       ,"rel_date_week_ago" => "De 1 saptamina"
                       ,"rel_date_yesterday" => "Ieri"
                       ,"yes" => "Da"
                       );

$language->email_reminders = array("overdue" => "Depasite"
                                  ,"due" => "Scadente"
                                  ,"upcoming" => "Urmatoare"
                                  ,"high_priority" => "Prioritare"
                                  ,"status" => "Progression"
                                  ,"complete" => "% incheiata"
                                  ,"priority" => "Prioritate"
                                  ,"none" => "(niciuna)"
                                  ,"subject" => "Rappel tasks"
                                  );

$language->form = array("1_week" => "1 saptamina"
                       ,"1_year" => "1 an"
                       ,"30_days" => "30 zile"
                       ,"90_days" => "90 zile"
                       ,"after_save" => "Dupa completare afisati:"
                       ,"choose_date" => "alegeti data"
                       ,"clear_date" => "stergeti"
                       ,"date_due" => "Data scadenta:"
                       ,"date_entered" => "Data crearii:"
                       ,"date_modified" => "Data modificarii:"
                       ,"form_title_edit" => "Modificati fisa"
                       ,"form_title_new" => "Fisa noua"
                       ,"id" => "ID&nbsp;:"
                       ,"notes" => "Note:"
                       ,"parent" => "Fisa radacina:"
                       ,"priority" => "Prioritatea:"
                       ,"return_home" => "Cuprins"
                       ,"status" => "Progres:"
                       ,"status_label" => "Progres"
                       ,"stay_here" => "pagina actuala"
                       ,"sticky" => "Persistenta"
                       ,"sticky_label" => "Persistenta:"
                       ,"title" => "Titlu:"
                       ,"today" => "Astazi"
                       ,"tomorrow" => "Miine"
                       ,"url" => "Adresa:"
                       ,"urls" => "Adrese:"
                       ,"url_1" => "Adresa 1:"
                       ,"url_2" => "Adresa 2:"
                       ,"url_3" => "Adresa 3:"
                       ,"view_parent" => "Fisa radacina"
                       ,"view_tree" => "Cuprins"
                       );

$language->icons = array("completed" => "incheiata"
                        ,"delete" => "Stergeti fisa"
                        ,"edit" => "Modificati Fisa"
                        ,"hide_show" => "Arata/Ascunde"
                        ,"hide_show_tip" => "Arata/Ascunde continutul"
                        ,"mark_complete" => "Marcati fisa completata"
                        ,"new_sub_task" => "Incepeti o sub-fisa"
                        ,"notes_bigger" => "Mariti chenarul"
                        ,"notes_smaller" => "Micsorati chenarul"
                        ,"parent_picker" => "Alegeti o radacina"
                        ,"priority" => "Prioritate; : __0" // result of get_friendly_priority();
                        ,"sticky" => "Persistenta"
                        ,"tree_toggle" => "Arata/Ascunde"
                        ,"tree_toggle_tip" => "Cu/Fara sugestii"
                        );

$language->list = array("banner" => " __0 fise afisate" // number
                       ,"date_due" => "Scadenta"
                       ,"done" => "terminate"
                       ,"id" => "ID"
                       ,"no_items" => "Nici o Fisa nu corespunde criteriului."
                       ,"priority" => "Prioritate"
                       ,"status" => "Completare"
                       ,"title" => "Titlu"
                       );

$language->list_titles = array("history" => "Ultimele 25 fise modificate"
                              ,"overdue" => "Fise cu termenul depasit"
                              ,"sortable" => "Lista sortabila"
                              ,"upcoming" => "Lista fiselor scadente"
                              );

$language->menu = array("calendar" => "<u>C</u>alendar"
                       ,"calendar_tip" => "Apasati aici pentru a vedea fisele in forma de calendar si pentru a actualiza iCalendar."
                       ,"history" => "Lista cronologica"
                       ,"history_tip" => "Apasati aici pentru a afisa ultimele fise modificate"
                       ,"home" => "Cuprins"
                       ,"home_tip" => "Apasati aici pentru a afisa lista radacina."
                       ,"new_task" => "Fisa <u>n</u>oua"
                       ,"new_task_tip" => "Apasati aici pentru a crea o fisa noua."
                       ,"search" => "Cau<u>t</u>are"
                       ,"search_tip" => "Cautati o fisa."
                       ,"sortable" => "Lista sorta<u>b</u>ila"
                       ,"sortable_tip" => "Apasati aici pentru a afisa o lista cu posibilitati de sortare."
                       ,"upcoming" => "Scadente"
                       ,"upcoming_tip" => "Afisati aici pentru a afisa lista fiselor scadente sau cu termen depasit."
                       );

$language->messages = array("completed" => "Fisa &quot;__0&quot; (nr. __1) a fost marcata completata" // title, id
                           ,"completed_reason" => "Fisa &quot;__0&quot; (no __1) a fost marcata completata cu urmatoarea remarca:<p style=\"padding-left: 15px;\">__2</p>" // title, id, reason
                           ,"completed_task_link" => "Afisati fisele terminate"
                           ,"completed_task_parent_link" => "Afisati fisa radacina a fisei completate"
                           ,"complete_instructions" => "Fisa nr __0 are __1 sub-fise (__2) in lucru. Ce alegeti ?" // id, number, number
                           ,"complete_orphan" => "Fisa &quot;__0&quot; (nr __1) a fost marcata completata si sub-fisele au fost atasate la fisa radacina nr __2." // title, id, new parent task id
                           ,"complete_orphan" => "Fisa  &quot;__0&quot; (nr. __1) a fost marcata completata si sub fisele au fost marcate independente." // title, id
                           ,"complete_recursive" => "Fisa &quot;__0&quot; (no __1) shi sub-fisele au fost marcate completate." // title, id
                           ,"confirm_delete" => "Stergeti fisa __0 ?"
                           ,"deleted" => "Fisa &quot;__0&quot; (nr __1) a fost stearsa." // title, id
                           ,"delete_instructions" => "Fisa nr __0 are __1 sub-fise(__2) in lucru. Ce alegeti?" // id, number, number
                           ,"delete_orphan" => "Fisa &quot;__0&quot; (no __1) va fi stearsa si sub-fisele vor fi marcate independente." // title, id
                           ,"delete_recursive" => "Fisa &quot;__0&quot; (no __1) si sub-fisele dependente vor fi sterse." // title, id
                           ,"delete_remove" => "Fisa &quot;__0&quot; (no __1) va fi stearsa si sub-fisele vor fi atasate fisei nr __2" // title, id, new parent id
                           ,"err_conflict" => "<b>Eroare :</b> Fisa nu a fost inregistrata.<br>Fisa la care lucrati   a fost modificata de un alt utilizator in timp ce lucrati la ea. Verificati diferentele mai jos si salvati din nou. Ultima versiune a fost salvata __0;Data acualizarii din baza de date __1"
                           ,"err_invalid_date" => "<b>Eroare:</b> Fisa nu a fost salvata deoarece data specificata este gresita. Corectati-o si resalvati."
                           ,"err_invalid_parent" => "<b>Eroare :</b> Fisa  cu ID __0 a fost desemnata ca radacina. Nu exista acel ID. Corectati problema si resalvati " // id
                           ,"err_loop" => "<b>Eroare :</b> Salvind Fisa cu acea radacina va crea un ciclu infinit."
                           ,"err_no_root" => "Eroare : Nu ati definit o fisa radacina."
                           ,"err_own_parent" => "<b>Eroare :</b> Fisa nu poate fi desemnata ca propria radacina."
                           ,"err_search_date_after" => "<b>Eroare :</b> Cautarea nu poate fi efectuata. este o problema in cimpul scadenta. Corectati-o"
                           ,"err_search_date_before" =>"<b>Eroare :</b> Aceasta cautare nu a fost efectuata din cauza unor erori la cimpul Scadenta. Corectatile inainte de a reincepe cautarea."
                           ,"err_search_date_exact" => "<b>Eroare :</b> Aceasta cautare nu a fost efectuata din cauza unor erori la cimpul data. Corectatile inainte de a reincepe cautarea."
                           ,"js_abandon_changes" => "Inchideti Fisa fara modificari?"
                           ,"js_complete_confirm" => "Inchideti fisa fara remarca de incheiere?"
                           ,"js_complete_prompt" => "Introduceti o remarca de incheiere:"
                           ,"js_err_edit_date" => "Data introdusa e incorecta.\\n modificati-o inainte de salvare."
                           ,"js_err_search_date_after" => "Data scadenta nu e valabila."
                           ,"js_err_search_date_before" => "Data scadenta nu e valabila."
                           ,"js_err_search_date_exact" => "Data scadenta nu e valabila."
                           ,"js_err_search_date_range" => "Data scadentei trebuie sa fie intre:'."
                           ,"js_err_search_errors" => "Atentiune: urmatoarele erori trebuie corectate inainte de a efectua cautarea: \\n"
                           ,"js_err_search_id_invalid" => "Valoarea cimpului ID trebuie sa fie: fie nula fie pozitiva."
                           ,"js_err_search_parent_invalid" => "Valoarea cimpului Radacina trebuie sa fie: fie nula fie pozitiva."
                           ,"js_err_search_status_exact" => "Valoare cimpului Progres este negativa :'trebuie sa aiba o valoare pozitiva."
                           ,"js_err_search_status_less" => "Valoare cimpului Progres este prea mica  :'Trebuie sa aiba o valoare intre 1 si 100  ."
                           ,"js_err_search_status_more" => "Valoare cimpului Progres este prea mare :'Trebuie sa aiba o valoare intre 1 si 100."
                           ,"js_err_search_status_range" => "Valoare cimpului Progres este inferioara :' Trebuie sa fie superioara valorii cimpului :'."
                           ,"js_loading_text" => "Incarcare..."
                           ,"js_nothing_to_save" => "Nimic de salvat."
                           ,"js_parent_required" => "Alegeti o fisa radacina."
                           ,"mail_sent" => "Mesajul a fost trimis."
                           ,"no_email" => "Nu ati introdus o adresa de email in fisierul config.php."
                           ,"parent_changed" => "Fisa curenta a schimbat radacina __0 cu radacina __1." // old parent id, new parent id
                           ,"saved" => "Fisa  __0 (__1) a fost inregistrata in __2." // id, title, timestamp
                           ,"title" => "Mesaje"
                           ,"warn_deleted" => "<b>Atentie :</b> Aceasta fisa va fi stearsa."
                           );

$language->misc = array("all_rights_reserved" => "Toate drepturile rezervate."
                       ,"copyright" => "copyright"
                       ,"count_open" => "__0 in lucru" // number
                       ,"count_total" => "__0 Fise" // number
                       ,"hide_completed" => "Ascundeti activitatile terminate"
                       ,"jump_to" => "Alegeti..."
                       ,"show_completed" => "Lista activitatilor terminate"
                       ,"timer" => "pagina creata in __0 secunde." // seconds
                       ,"version" => "versiunea __0"
                       );

$language->picker = array("date_go" => "Alegeti"
                         ,"date_key_selected" => "Data aleasa"
                         ,"date_key_today" => "Data de astazi"
                         ,"date_next" => "Inainte"
                         ,"date_previous" => "Inapoi"
                         ,"date_today" => "Astazi"
                         ,"days" => "'Du','Lu','Ma','Mi','Jo','Vi','Sa'"
                         ,"months" => "'Ianuarie','Februarie','Martie','Aprilie','Mai','Iunie','Iulie','August','Septembrie','Octombrie','Noiembrie','Decembrie'"
                         ,"parent_title" => "Alegeti o fisa radacina"
                         );

$language->resolve = array("append" => "Adaugati"
                          ,"current_version" => "Versiune actualizata"
                          ,"form_title" => "Les champs ci-dessous pr&eacute;sentent des diff&eacute;rences"
                          ,"none" => "()"
                          ,"save" => "Salvati"
                          ,"use" => "Alegeti"
                          ,"your_data" => "Datele introduse"
                          );

$language->search = array("after" => "dupa:"
                         ,"before" => "inainte de"
                         ,"exactly" => "este exact"
                         ,"form_title" => "Criteriul de cautare"
                         ,"include_completed" => "Includeti si fisele completate"
                         ,"instructions" => "Introduceti cuvintele pe care le cautati. Alegeti cautare avansata pentru a rafina cautarea"
                         ,"less_than" => "mai mic decit"
                         ,"more_options" => "Cautare avansata"
                         ,"more_than" => "mai mare ca"
                         ,"results_title" => "Rezultatul cautarii"
                         ,"search_button" => "Cautati"
                         );

$language->toolbar = array("b2_tip" => "Interconectare b2"
                          ,"date_time" => "Introduceti data/ora"
                          ,"date_time_tip" => "Introduceti data in Nota"
                          ,"delete" => "Stergeti "
                          ,"mt_tip" => "Interconectare Moveable Type"
                          ,"new_sub" => "Sub-Fisa noua"
                          ,"save" => "Salvati fisa"
                          ,"save_alt" => "Salvati Fisa"
                          ,"save_as_new" => "Salvati ca Fisa noua"
                          );

$language->tree = array("due" => "Scadenta:"
                       ,"id" => "ID&nbsp;:"
                       ,"loading" => $language->messages["js_loading_text"]
                       ,"open_sub_task" => "1 Sub-Fisa neterminata <span style=\"color: #666;\">(__0 au total)</span>" // number
                       ,"open_sub_tasks" => "__0 Sub-Fise in lucru <span style=\"color: #666;\">(__1 au total)</span>" // number, number
                       ,"status" => "__0% completata" // number (0-100)
                       );

?>
<?

// danish

$language = new language;

$language->name = "Danish";
$language->author = "Ole Andersen & Frank Steen";
$language->author_email = "admin@uups.dk";
$language->author_web = "http://www.uups.dk/";

$language->charset = "iso-8859-1";

// Fjern de to // p� linien herunder for st�rre font end 10px.
// $language->font_size = "10px;"; 

$language->about = array("tagline" => "Organiser opgaver og f� dem udf�rt."
                        ,"documentation" => "Dokumentation"
                        ,"read_me" => "L�s mig"
                        ,"license" => "Licens"
                        ,"download" => "download"
                        ,"this_version" => "Denne version: __0" // number
                        ,"latest_version" => "Senest frigivet version: __0" // number
                        ,"beta_version" => "Seneste Beta Version: __0" // number
                        ,"using_latest" => "Du bruger den senest frigivne version."
                        ,"using_beta" => "Du bruger den senest frigivne beta version."
                        ,"feedback" => "Ris - Ros - forslag:"
                        ,"web" => "Web:"
                        ,"credits" => "Tak til ..."
                        ,"main_credit" => "Opgave er udt�nkt og realiseret af <nobr>Alex King</nobr>. Det er blevet oversat til disse sprog af f�lgende flinke  individualister:"
                        ,"web_site" => "web side"
                        ,"email" => "e-mail"
                        );

$language->accesskey = array("calendar" => "k"
                            ,"history" => "i"
                            ,"home" => "f"
                            ,"new_task" => "y"
                            ,"save" => "s"
                            ,"search" => "g"
                            ,"sortable" => "r"
                            ,"title" => "e"
                            ,"upcoming" => "v"
                            );

$language->breadcrumbs = array("history" => "Historie"
                              ,"home" => "Forside"
                              ,"new_task" => "Ny opgave"
                              ,"search" => "S�g"
                              ,"search_results" => "S�ge-resultater"
                              ,"sortable" => "Sortering af opgaveliste"
                              ,"upcoming" => "Kommende opgaver"
                              );

$language->confirm = array("complete_instructions" => "Denne opgave du markerer som udf�rt har __0 �bne under-opgave(r). V�lg hvordan du vil forts�tte:" // number
                          ,"complete_orphan" => "Marker denne opgave som f�rdig og s�t denne/disse under-opgave(r) til ikke at have en hoved-opgave"
                          ,"complete_notes" => "Skriv afsluttende bem�rkninger for denne opgave:"
                          ,"complete_recursive" => "Marker denne opgave og under-opgave(r) som f�rdige"
                          ,"complete_remove" => "Marker denne opgave som f�rdig og knyt denne/disse under-opgave(r) til hoved-opgaven"
                          ,"complete_title" => "Afslut opgavevalg"
                          ,"delete_confirm" => "Er du sikker p� at du vil slette denne opgave ?"
                          ,"delete_instructions" => "Den opgave du vil slette har __0 �bne under-opgave(r). V�lg hvordan du vil forts�tte:" // number
                          ,"delete_orphan" => "Slet denne opgave og under-opgave(r) uden hoved-opgave"
                          ,"delete_recursive" => "Slet denne opgave og under-opgave(r)"
                          ,"delete_remove" => "Slet denne opgave og tilf�j unger-opgave(r) til hoved-opgaven."
                          ,"delete_title" => "Slet opgavevalg"
                          ,"delete_title_m" => "Slet opgave"
                          );

$language->data = array("no" => "Nej"
                       ,"priority_1" => "Lavest"
                       ,"priority_2" => "Lav"
                       ,"priority_3" => "Mellem"
                       ,"priority_4" => "H�j"
                       ,"priority_5" => "H�jest"
                       ,"rel_date" => "__0" // date
                       ,"rel_date_days" => "__0 Dage" // number
                       ,"rel_date_days_ago" => "__0 Dage siden" // number
                       ,"rel_date_today" => "I dag"
                       ,"rel_date_tomorrow" => "I morgen"
                       ,"rel_date_week" => "1 uge"
                       ,"rel_date_week_ago" => "1 uge siden"
                       ,"rel_date_yesterday" => "i g�r"
                       ,"yes" => "Ja"
                       );

$language->email_reminders = array("overdue" => "For�ldet"
                                  ,"due" => "Rettidig"
                                  ,"upcoming" => "Ventende"
                                  ,"high_priority" => "H�j Prioritet"
                                  ,"status" => "Status"
                                  ,"complete" => "% Fuldf�rt"
                                  ,"priority" => "Prioritet"
                                  ,"none" => "(f�rdig)"
                                  ,"subject" => "opgave p�mindelse"
                                  );

$language->form = array("1_week" => "1 uge"
                       ,"1_year" => "1 �r"
                       ,"30_days" => "30 Dage"
                       ,"90_days" => "90 Dage"
                       ,"after_save" => "Efter gem:"
                       ,"choose_date" => "V�lg dato"
                       ,"clear_date" => "Nulstil dato"
                       ,"date_due" => "Gyldig dato:"
                       ,"date_entered" => "Dato oprettet:"
                       ,"date_modified" => "Sidst �ndret:"
                       ,"form_title_edit" => "Ret i opgave"
                       ,"form_title_new" => "Ny opgave"
                       ,"id" => "ID:"
                       ,"new_task" => "Ny opgave"
                       ,"notes" => "Notater:"
                       ,"parent" => "Hoved:"
                       ,"priority" => "Prioritet:"
                       ,"return_home" => "Retur til forside"
                       ,"status" => "% F�rdig:"
                       ,"status_label" => "% Komplet"
                       ,"stay_here" => "Bliv her"
                       ,"sticky" => "Opgaven h�nger"
                       ,"sticky_label" => "Opgaven h�nger:"
                       ,"title" => "Tit<u>e</u>l:"
                       ,"today" => "I dag"
                       ,"tomorrow" => "I morgen"
                       ,"url" => "URL:"
                       ,"urls" => "URLs:"
                       ,"url_1" => "URL 1:"
                       ,"url_2" => "URL 2:"
                       ,"url_3" => "URL 3:"
                       ,"view_parent" => "Vis hoved-opgave"
                       ,"view_tree" => "Vis sti"
                       );

$language->home = array("sort_title" => "Sorteret efter titel"
                       ,"sort_title_rev" => "Omvendt sorteret efter titel"
                       ,"sort_priority" => "Sorter efter prioritet"
                       ,"sort_priority_rev" => "Omvendt sorteret efter prioritet"
                       );

$language->icons = array("completed" => "Fuldf�rte opgaver"
                        ,"delete" => "Slet"
                        ,"edit" => "Ret"
                        ,"hide_show" => "Skjul/Vis"
                        ,"hide_show_tip" => "Skjul eller vis mere information om denne opgave"
                        ,"mark_complete" => "Marker som udf�rt"
                        ,"new_sub_task" => "Ny under-opgave"
                        ,"notes_bigger" => "G�r notat feltet st�rre"
                        ,"notes_smaller" => "G�r notat feltet mindre"
                        ,"parent_picker" => "V�lg en hoved-opgave opgave"
                        ,"priority" => "Prioritet: __0" // result of get_friendly_priority();
                        ,"sticky" => "Opgave h�nger"
                        ,"tree_toggle" => "Skjul/Vis"
                        ,"tree_toggle_tip" => "Skjul eller vis flere under-opgaver for denne opgave"
                        );

$language->list = array("banner" => "Viser __0 enheder" // number
                       ,"date_due" => "Dato rettidig"
                       ,"done" => "(f�rdig)"
                       ,"id" => "ID"
                       ,"no_items" => "Ingen enheder at vise."
                       ,"priority" => "Prioritet"
                       ,"status" => "% F�rdig"
                       ,"title" => "Titel"
                       );

$language->list_titles = array("history" => "Sidste 25 �ndrede opgaver"
                              ,"overdue" => "For�ldede opgaver"
                              ,"sortable" => "Sorteret opgave liste"
                              ,"upcoming" => "Ventende opgaver"
                              );

$language->menu = array("calendar" => "<u>K</u>alender"
                       ,"calendar_tip" => "Klik her for at se en kalender med opgaverne."
                       ,"history" => "H<u>i</u>storie"
                       ,"history_tip" => "Klik her for at se de sidste 25 �ndrede opgaver."
                       ,"home" => "<u>F</u>orside"
                       ,"home_tip" => "Klik her for at g� til forsiden."
                       ,"new_task" => "N<u>y</u> opgave"
                       ,"new_task_tip" => "Klik her for at oprette en ny opgave."
                       ,"search" => "S�<u>g</u>"
                       ,"search_tip" => "Klik her for at s�ge efter en opgave."
                       ,"sortable" => "Sorte<u>r</u>ing"
                       ,"sortable_tip" => "Klik her for at se en sorteret liste."
                       ,"upcoming" => "<u>V</u>entende"
                       ,"upcoming_tip" => "Klik her for at se alle ventende og for�ldede opgaver."
                       );

$language->messages = array("completed" => "Opgaven &quot;__0&quot; (#__1) er markeret f�rdig." // title, id
                           ,"completed_reason" => 'opgaven &quot;__0&quot; (#__1) er markeret f�rdig med denne begrundelse:<p style="padding-left: 15px;">__2</p>' // title, id, reason
                           ,"completed_task_link" => "Vis f�rdige opgaver"
                           ,"completed_task_parent_link" => "Vis f�rdige under-opgave(r)'s hoved-opgave"
                           ,"complete_instructions" => "Opgave #__0 har __1 under-opgave(r) (__2) �bne, v�lg �nsket V�lg venligst �nsket afslutnings-forl�b." // id, number, number
                           ,"complete_orphan" => "Opgave &quot;__0&quot; (#__1) er blevet markeret afsluttet, og alle side-opgaver er blevet tilf�jet til opgave #__2." // title, id, new parent task id
                           ,"complete_orphan" => "Opgave &quot;__0&quot; (#__1) er blevet markeret afsluttet, og alle side-opgaver har f�et deres hoved-opgave ID fjernet." // title, id
                           ,"complete_recursive" => "Opgave &quot;__0&quot; (#__1) og alle side-opgaver er markeret f�rdiggjort(e)." // title, id
                           ,"confirm_delete" => "Slet opgave: __0?"
                           ,"deleted" => "Opgave &quot;__0&quot; (#__1) er blevet slettet." // title, id
                           ,"delete_instructions" => "Opgave #__0 har __1 under-opgave(r) (__2) �ben, v�lg hvordan du vil slette." // id, number, number
                           ,"delete_orphan" => "Opgave &quot;__0&quot; (#__1) er blevet slettet og alle under-opgaver har f�et fjernet hoved-opgave ID." // title, id
                           ,"delete_recursive" => "Opgave &quot;__0&quot; (#__1) og alle under-opgave(r) er slettet." // title, id
                           ,"delete_remove" => "Opgave &quot;__0&quot; (#__1) er blevet slettet, og alle under-opgaver er tilf�jet til opgave #__2" // title, id, new parent id
                           ,"err_conflict" => "<b>Fejl:</b> Denne opgave er ikke gemt.<br>Opgaven er blevet �ndret af en anden bruger. Se venligst �ndringerne vist herunder, og gem igen. <p>Den version du �ndrede blev sidst gemt d. __0;<br>Den nuv�rende version i databasen blev gemt d. __1"
                           ,"err_date_format" => "<b>Fejl:</b> Der er en fejl  i dit <b>\$custom->date_format</b> i 'Config.php'. Dine v�rdier: '__0' indeholder ikke en eller felre af disse: 'd', 'm', 'y'. Ret venligst dette i 'config.php'." // date_format
                           ,"err_event_type" => "<b>Fejl:</b> Der er en fejl i din <b>\$custom->ical_export_type</b> i 'config.php'. Din v�rdi: '__0' er ikke en 'h�ndelse' eller 'todo'. Ret venligst dette i 'config.php'." // ical_export_type
                           ,"err_invalid_date" => "<b>Fejl:</b> Denne opgave blev ikke gemt, da den indtastede Dato er ugyldig. Ret eller slet Dato'en og gem derefter opgaven."
                           ,"err_invalid_parent" => "<b>Fejl:</b> Opgave #__0 er sat som hoved-opgave, men ingen opgave med den ID eksisterer. Ret dette problem og gem igen." // id
                           ,"err_loop" => "<b>Fejl:</b> At gemme denne opgave med navngivet hoved-opgave, kan resultere i en uendelig l�kke"
                           ,"err_no_root" => "Fejl: Ingen rodfil var angivet."
                           ,"err_own_parent" => "<b>Fejl:</b> En under-opgave kan ikke v�re sin egen hoved-opgave"
                           ,"err_search_date_after" => "<b>Fejl:</b> Denne s�gning vil ikke finde nogen opgaver, fordi den valgte 'udl�bsdato er efter:' v�rdien er ugyldig. Ret eller slet den gyldige Dato 'efter' og pr�v at s�ge igen."
                           ,"err_search_date_before" => "<b>Fejl:</b> Denne s�gning vil ikke finde nogen opgaver, fordi den valgte 'udl�bsdato er f�r:' v�rdien er ugyldig. Ret eller slet den gyldige Dato 'f�r' og pr�v at s�ge igen."
                           ,"err_search_date_exact" => "<b>Fejl:</b> Denne s�gning vil ikke finde nogen opgaver, fordi den valgte udl�bsdato er efter 'udl�badato er pr�cis:' v�rdien er ugyldig. Ret eller slet den udl�bsdato 'f�r' og pr�v at s�ge igen."
                           ,"js_abandon_changes" => "Forlad uden at gemme dine �ndringer ?"
                           ,"js_complete_confirm" => "Er du sikker p� at du vil forlade opgaven,\\n uden at anf�re notater ?\\n"
                           ,"js_complete_prompt" => "Skriv slutnotater for denne opgave."
                           ,"js_err_edit_date" => "Den nuv�rende v�rdi i udl�bsdato feltet er ikke en gyldig v�rdi.\\nRet eller fjern dato f�r du gemmer."
                           ,"js_err_search_date_after" => "Den nuv�rende v�rdi i 'udl�bsdato er efter:' feltet er ikke en gyldig dato."
                           ,"js_err_search_date_before" => "Den nuv�rende v�rdi i 'udl�bsdato er f�r:' feltet er ikke en gyldig dato."
                           ,"js_err_search_date_exact" => "Den nuv�rende v�rdi i 'udl�bsdato er pr�cis:' feltet er ikke en gyldig dato."
                           ,"js_err_search_date_range" => "'Udl�bsdato er efter:' datoen skal v�re f�r udl�bsdato."
                           ,"js_err_search_errors" => "Advarsel - F�lgende problem skal rettes\\nf�r din s�gning kan udf�res: \\n"
                           ,"js_err_search_id_invalid" => "'ID' feltet skal v�re tomt, eller have en nummerisk v�rdi st�rre end 0."
                           ,"js_err_search_parent_invalid" => "Hoved-feltet skal v�re tomt, eller have en nummerisk v�rdi st�rre end 0."
                           ,"js_err_search_status_exact" => "'Status er pr�cis:' feltet m� v�re tomt eller skal have en numerisk v�rdi mellem 0 og 100."
                           ,"js_err_search_status_less" => "'Status er mindre end:' feltet m� v�re tomt eller skal have en numerisk v�rdi mellem 0 og 100."
                           ,"js_err_search_status_more" => "'Status er mere end:' feltet m� v�re tomt eller skal have en numerisk v�rdi mellem 0 og 100."
                           ,"js_err_search_status_range" => "'Status er mindre end:' feltet skal v�re st�rre end 'Status er mere end:' feltet."
                           ,"js_loading_text" => "Henter data..."
                           ,"js_nothing_to_save" => "Beklager, der er ikke noget at gemme p� denne sk�rm."
                           ,"js_parent_required" => "You must specify a parent for this task to\\nview the task's parent after the save."
                           ,"mail_sent" => "Daglig p�mindelse er blevet sendt med e-mail."
                           ,"mobile_resolve_instructions" => "De data du har skrevet vil blive vist nedenunder den version der nu er i databasen. Skriv de �ndringer du �nsker og klik p� 'Gem'."
                           ,"no_email" => "V�r venlig at tilf�je din e-mail adresse i config.php."
                           ,"parent_changed" => "Hoved-opgave �ndret fra __0 til __1." // old parent id, new parent id
                           ,"saved" => "Gemt opgave #__0 (__1) som __2." // id, title, timestamp
                           ,"title" => "Messages"
                           ,"warn_deleted" => "<b>Advarsel:</b> Denne opgave er allerede slettet."
                           );

$language->misc = array("all_rights_reserved" => "alle rettigheder forbeholdes."
                       ,"copyright" => "copyright"
                       ,"count_open" => "__0 �bne opgaver" // number
                       ,"count_total" => "__0 Opgave(r)" // number
                       ,"hide_completed" => "Skjul f�rdige opgaver"
                       ,"jump_to" => "G� til..."
                       ,"quick_search" => "Hurtig s�gning"
                       ,"show_completed" => "Vis udf�rte opgaver"
                       ,"timer" => "sk�rmen opdateret p� __0 sekunder." // seconds
                       ,"version" => "version __0" // number
                       );

$language->picker = array("date_go" => "Udf�r" // Der stod: Go
                         ,"date_key_selected" => "Valgte dato"
                         ,"date_key_today" => "Dags dato"
                         ,"date_next" => "N�ste"
                         ,"date_previous" => "Forrige"
                         ,"date_today" => "I dag"
                         ,"days" => "'S�n','Man','Tir','Ons','Tor','Fre','L�r'"
                         ,"months" => "'Januar','Februar','Marts','April','Maj','Juni','Juli','August','September','Oktober','November','December'"
                         ,"parent_title" => "V�lg en hoved-opgave"
                         );

$language->resolve = array("append" => "Tilf�j"
                          ,"current_version" => "Denne version"
                          ,"form_title" => "De f�lgende felter er forskellige"
                          ,"none" => "(ingen)"
                          ,"save" => "Gem"
                          ,"use" => "Brug"
                          ,"your_data" => "Dine Data"
                          );

$language->search = array("after" => "er efter:"
                         ,"before" => "er f�r:"
                         ,"exactly" => "er n�jagtig:"
                         ,"form_title" => "S�ge muligheder"
                         ,"include_completed" => "Indkluder f�rdige opgaver"
                         ,"instructions" => "Skriv ord eller en del af et ord som vises i titel og/eller notat feltet i den opgave du �nsker at s�ge efter. Som standard, vil s�gningen kun finde de opgaver som indeholder alle de s�geord du skriver. Klik p� &quot;Flere s�ge funktioner&quot; for at f� avancerede s�gemuligheder."
                         ,"less_than" => "er mindre end:"
                         ,"more_options" => "Flere s�ge funktioner"
                         ,"more_than" => "er mere end:"
                         ,"results_title" => "S�ge resultat"
                         ,"search_button" => "S�g"
                         );

$language->toolbar = array("b2_tip" => "Post til b2"
                          ,"date_time" => "Inds�t Dato/Tid"
                          ,"date_time_tip" => "Inds�t nuv�rende dato/tid i notat feltet"
                          ,"delete" => "Slet"
                          ,"edit" => "Ret"
                          ,"mark_complete" => "Marker komplet"
                          ,"mark_complete_m" => "100%"
                          ,"mt_tip" => "Post til flytbar type"
                          ,"new_sub" => "Ny under-opgave"
                          ,"new_sub_m" => "Ny under"
                          ,"save" => "<u>S</u>ave"
                          ,"save_alt" => "Gem"
                          ,"save_as_new" => "Gem som ny opgave"
                          ,"wp_tip" => "Post til WordPress"
                          );

$language->tree = array("due" => "Udf�res:"
                       ,"id" => "ID:"
                       ,"loading" => $language->messages["js_loading_text"] // no need to set this
                       ,"open_sub_task" => '1 �ben under-opgave <span style="color: #666;">(__0 Total)</span>' // number
                       ,"open_sub_tasks" => '__0 �ben under-opgave <span style="color: #666;">(__1 Total)</span>' // number, number
                       ,"status" => "__0% F�rdig" // number (0-100)
                       );

?>
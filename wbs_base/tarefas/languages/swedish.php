<?

// swedish

$language = new language;

$language->name = "swedish";
$language->author = "Christian Forslind";
$language->author_email = "salseroxxx@msn.com";
$language->author_web = "";

$language->charset = "ISO-8859-1";

// uncomment this if you need to increase the font size from 10px
// $language->font_size = "10px;"; 

$language->about = array("tagline" => "Organisera och f� det gjort."
                        ,"documentation" => "Dokumentation"
                        ,"read_me" => "L�s mig"
                        ,"license" => "Licens"
                        ,"download" => "Ladda hem"
                        ,"this_version" => "Denna Version: __0" // number
                        ,"latest_version" => "Senaste Sl�ppta Version: __0" // number
                        ,"beta_version" => "Senaste Beta Version: __0" // number
                        ,"using_latest" => "Du anv�nder den senaste tillg�ngliga versionen."
                        ,"using_beta" => "Du anv�nder den senaste tillg�ngliga beta versionen."
                        ,"feedback" => "Feedback och f�rslag:"
                        ,"web" => "Webb:"
                        ,"credits" => "Credits"
                        ,"main_credit" => "Tasks Jr. concept �r framtaget och skapat av <nobr>Alex King</nobr>. Det har blivit �versatt till f�ljande spr�k av f�ljande personer:"
                        ,"web_site" => "webbsida"
                        ,"email" => "e-mail"
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

$language->breadcrumbs = array("history" => "Historia"
                              ,"home" => "Hem"
                              ,"new_task" => "Ny Uppgift"
                              ,"search" => "S�k"
                              ,"search_results" => "S�kresultat"
                              ,"sortable" => "Sorterbar Uppgiftslista"
                              ,"upcoming" => "Kommande Uppgifter"
                              );

$language->confirm = array("complete_instructions" => "Uppgiften du markerat Slutf�rd har __0 �ppna underuppgifter. V�lj hur du vill forts�tta:" // number
                          ,"complete_orphan" => "Markera denna uppgift som Slutf�rd och flytta upp dess underuppgifter"
                          ,"complete_notes" => "Skriv st�ngningsnotering f�r denna uppgift:"
                          ,"complete_recursive" => "Markera denna uppgift och dess underuppgifter slutf�rda"
                          ,"complete_remove" => "Markera denna uppgift slutf�rd och bifoga dess underuppgifter till ovanliggande uppgift"
                          ,"complete_title" => "F�rdigst�ll uppgifternas alternativ"
                          ,"delete_confirm" => "�r du s�ker p� att du vill radera denna uppgift?"
                          ,"delete_instructions" => "Uppgiften du vill radera har __0 �ppna underliggande uppgifter. V�lj hur du vill forts�tta:" // number
                          ,"delete_orphan" => "Radera denna uppgift och flytta upp underliggande uppgift som huvuduppgift"
                          ,"delete_recursive" => "Radera denna uppgift och dess underliggande uppgifter"
                          ,"delete_remove" => "Radera denna uppgift och bifoga dess underliggande uppgifter till ovanliggande uppgift"
                          ,"delete_title" => "Raderingsalternativ f�r uppgiften"
                          ,"delete_title_m" => "Radera uppgift"
                          );

$language->data = array("no" => "Nej"
                       ,"priority_1" => "L�gst"
                       ,"priority_2" => "L�gt"
                       ,"priority_3" => "Medel"
                       ,"priority_4" => "H�g"
                       ,"priority_5" => "H�gst"
                       ,"rel_date" => "__0" // datum
                       ,"rel_date_days" => "__0 Dagar" // number
                       ,"rel_date_days_ago" => "__0 Dagar tidigare" // number
                       ,"rel_date_today" => "Idag"
                       ,"rel_date_tomorrow" => "I Morgon"
                       ,"rel_date_week" => "1 Vecka"
                       ,"rel_date_week_ago" => "1 Vecka tidigare"
                       ,"rel_date_yesterday" => "I g�r"
                       ,"yes" => "Ja"
                       );

$language->email_reminders = array("overdue" => "F�rfallna"
                                  ,"due" => "F�rfallen"
                                  ,"upcoming" => "Kommande"
                                  ,"high_priority" => "H�g prioritet"
                                  ,"status" => "Status"
                                  ,"complete" => "% Slutf�rd"
                                  ,"priority" => "Prioritet"
                                  ,"none" => "(Ingen)"
                                  ,"subject" => "P�minnelse uppgift"
                                  );

$language->form = array("1_week" => "1 Vecka"
                       ,"1_year" => "1 �r"
                       ,"30_days" => "30 Dagar"
                       ,"90_days" => "90 Dagar"
                       ,"after_save" => "Efter spara:"
                       ,"choose_date" => "V�lj datum"
                       ,"clear_date" => "Rensa"
                       ,"date_due" => "Datum F�rfaller:"
                       ,"date_entered" => "Angivet Datum:"
                       ,"date_modified" => "Sist �ndrat:"
                       ,"form_title_edit" => "Redigera uppgift"
                       ,"form_title_new" => "Ny uppgift"
                       ,"id" => "ID:"
                       ,"new_task" => "Ny uppgift"
                       ,"notes" => "Noteringar:"
                       ,"parent" => "F�reg�ende:"
                       ,"priority" => "Prioritet:"
                       ,"return_home" => "G� till f�rsta sidan"
                       ,"status" => "% Klar:"
                       ,"status_label" => "% Klar"
                       ,"stay_here" => "V�nta H�r"
                       ,"sticky" => "Klistrad Uppgift"
                       ,"sticky_label" => "Klistrad Uppgift:"
                       ,"title" => "�mne:"
                       ,"today" => "I Dag"
                       ,"tomorrow" => "I Morgon"
                       ,"url" => "URL:"
                       ,"urls" => "URLs:"
                       ,"url_1" => "URL 1:"
                       ,"url_2" => "URL 2:"
                       ,"url_3" => "URL 3:"
                       ,"view_parent" => "Granska F�reg�ende uppgift"
                       ,"view_tree" => "Visa Uppgifter"
                       );

$language->home = array("sort_title" => "Sortera efter �mne"
				,"sort_title_rev" => "Sortera omv�nt efter �mne"
                       ,"sort_priority" => "Sortera efter Prioritet"
                       ,"sort_priority_rev" => "Sortera omv�nt efter Prioritet"
                       );

$language->icons = array("completed" => "Slutf�rd uppgift"
                        ,"delete" => "Ta bort"
                        ,"edit" => "Redigera"
                        ,"hide_show" => "D�lj/Visa"
                        ,"hide_show_tip" => "D�lj eller visa mer information f�r denna uppgift"
                        ,"mark_complete" => "Markera Slutf�rd"
                        ,"new_sub_task" => "Ny Underliggande uppgift"
                        ,"notes_bigger" => "Skapa st�rre f�lt f�r noteringar"
                        ,"notes_smaller" => "Skapa mindre f�lt f�r noteringar"
                        ,"parent_picker" => "V�lj en aktuell uppgift"
                        ,"priority" => "Prioritet: __0" // result of get_friendly_priority();
                        ,"sticky" => "Klistrad uppgift"
                        ,"tree_toggle" => "D�lj/Visa"
                        ,"tree_toggle_tip" => "D�lj eller visa mer underliggande uppgifter f�r denna uppgift"
                        );

$language->list = array("banner" => "Visar __0 Poster" // number
                       ,"date_due" => "Datum F�rfaller"
                       ,"done" => "(slutf�rd)"
                       ,"id" => "ID"
                       ,"no_items" => "Inga poster att visa."
                       ,"priority" => "Prioritet"
                       ,"status" => "% Klar"
                       ,"title" => "�mne"
                       );

$language->list_titles = array("history" => "25 senast modifierade Uppgifter"
                              ,"overdue" => "F�rfallna Uppgifter"
                              ,"sortable" => "Sorterbar Uppgiftslista"
                              ,"upcoming" => "Kommande Uppgifter"
                              );

$language->menu = array("calendar" => "<u>K</u>alender"
                       ,"calendar_tip" => "Klicka h�r f�r att se dina uppgifter i kalender."
                       ,"history" => "Histori<u>a</u>"
                       ,"history_tip" => "Klicka h�r f�r att se de 25 senast modifierade uppgifterna."
                       ,"home" => "<u>H</u>em"
                       ,"home_tip" => "Klicka h�r f�r att g� till f�rsta sidan som visar alla grunduppgifter."
                       ,"new_task" => "Ny <u>U</u>ppgift"
                       ,"new_task_tip" => "Klicka h�r f�r att skapa ny uppgift."
                       ,"search" => "S<u>�</u>k"
                       ,"search_tip" => "Klicka h�r f�r att s�ka efter en uppgift."
                       ,"sortable" => "<u>S</u>orterbara"
                       ,"sortable_tip" => "Klicka h�r f�r att visa en sorterbar lista med uppgifter."
                       ,"upcoming" => "<u>K</u>ommande"
                       ,"upcoming_tip" => "Klicka h�r f�r att se all kommande och �verskridna uppgifter."
                       );

$language->messages = array("completed" => "Uppgiften;__0&quot; (#__1) har blivit markerad slutf�rd." // title, id
				   ,"completed_reason" => 'Uppgiften &quot;__0&quot; (#__1) har blivit markerad slutf�rd med f�rklaring:<p style="padding-left: 15px;">__2</p>' // title, id, reason
                           ,"completed_task_link" => "Visa slutf�rd Uppgift"
                           ,"completed_task_parent_link" => "Visa slutf�rd uppgifts f�reg�ende"
                           ,"complete_instructions" => "Uppgiften #__0 har __1 underuppgifter (__2) �ppna, V�lj hur du vill f�rfara." // id, number, number
                           ,"complete_orphan" => "Uppgiften &quot;__0&quot; (#__1) har markerats som slutf�rd och alla underliggande uppgifter har bifogats Uppgift #__2." // title, id, new parent task id
                           ,"complete_orphan" => "Uppgiften &quot;__0&quot; (#__1) har markerats som slutf�rd och underliggande uppgifters tidigare ID har raderats." // title, id
                           ,"complete_recursive" => "Uppgiften &quot;__0&quot; (#__1) och alla underliggande uppgifter har markerats som slutf�rda." // title, id
                           ,"confirm_delete" => "Radera Uppgift: __0?"
				   ,"deleted" => "Uppgift &quot;__0&quot; (#__1) har nu raderats." // title, id
                           ,"delete_instructions" => "Uppgift #__0 har __1 Underliggande uppgifter �ppna, v�lj hur du vill f�rfara." // id, number, number
                           ,"delete_orphan" => "Uppgift &quot;__0&quot; (#__1) har raderats dess underuppgift har flyttas upp som huvuduppgift." // title, id
                           ,"delete_recursive" => "Uppgift &quot;__0&quot; (#__1) och dess underliggande uppgifter har raderats." // title, id
                           ,"delete_remove" => "Uppgift &quot;__0&quot; (#__1) har raderats och dess underliggande uppgift(er) har flyttats upp en niv�" // title, id, new parent id
                           ,"err_conflict" => "<b>Fel:</b> Denna uppgift blev inte sparad.<br>Denna uppgift blev uppdaterad av en annan anv�ndare efter det att du b�rjade redigera den. Granska skillnaderna nedan och spara igen. <p>Versionen av uppgiften du �ndrade i sparades sist __0;<br>den aktuella versionen i databasen var sparad __1"
                           ,"err_date_format" => "<b>Fel:</b> Det �r ett fel i din <b>\$custom->date_format</b> i 'config.php'. Ditt v�rde: '__0' saknar en eller flera  'm', 'd', 'y'. Korrigera detta i 'config.php'." // date_format
                           ,"err_event_type" => "<b>Fel:</b> Det �r ett fel i din <b>\$custom->ical_export_type</b> i 'config.php'. Ditt v�rde: '__0' �r inte 'event' eller 'todo'. Korrigera detta i 'config.php'." // ical_export_type
                           ,"err_invalid_date" => "<b>Fel:</b> Uppgiften blev inte sparad eftersom angivet datum �r felaktigt. Korrigera detta eller rensa f�rfallodatum och spara igen."
                           ,"err_invalid_parent" => "<b>Fel:</b> Uppgift #__0 specificerades som aktuell uppgift men ingen uppgift med detta Id existerar. �ndra detta och spara igen." // id
                           ,"err_loop" => "<b>Fel:</b> Att spara denna uppgift med specificerad uppgift kommer att skapa en o�ndlig loop."
                           ,"err_no_root" => "Fel: Ingen bas (root) har blivit satt."
				   ,"err_own_parent" => "<b>Fel:</b> En underliggande uppgift kan inte vara sin egen huvuduppgift."
                           ,"err_search_date_after" => "<b>Fel:</b> Denna s�kning kan inte finna n�gra uppgifter d�rf�r att specificerat datum i f�ltet Sist �ndrat 'efter:' �r ogiltigt. Korrigera eller rensa f�ltet och prova att s�ka igen."
                           ,"err_search_date_before" => "<b>Fel:</b> Denna s�kning kan inte finna n�gra uppgifter d�rf�r att specificerat datum i f�ltet Sist �ndrat 'f�re:' �r ogiltigt. Korrigera eller rensa f�ltet och prova att s�ka igen."
                           ,"err_search_date_exact" => "<b>Fel:</b> Denna s�kning kan inte finna n�gra uppgifter d�rf�r att specificerat datum i f�ltet Sist �ndrat  'exakt:' �r ogiltigt. Korrigera eller rensa f�ltet och prova att s�ka igen."
                           ,"js_abandon_changes" => "Avsluta utan att spara dina �ndringar?"                        
                           ,"js_complete_confirm" => "�r du s�ker p� att du vill avsluta\\ denna uppgift utan att inf�ra\\ noteringar innan du st�nger?"
                           ,"js_complete_prompt" => "F�r in st�ngningsnotering f�r denna uppgift:"
                           ,"js_err_edit_date" => "Aktuellt v�rde i f�ltet f�r n�r datum f�rfaller �r ogiltigt.\\ �ndra eller rensa detta v�rde innan du sparar."
                           ,"js_err_search_date_after" => "Datum F�rfaller: Aktuellt v�rde i f�ltet 'efter:' �r inte ett giltigt datum."
                           ,"js_err_search_date_before" => "Datum F�rfaller: Aktuellt v�rde i f�ltet 'f�re:' �r inte ett giltigt datum."
                           ,"js_err_search_date_exact" => "Datum F�rfaller: Aktuellt v�rde i f�ltet 'exakt:' �r inte ett giltigt datum."
				   ,"js_err_search_date_range" => "'Efter:' datumet m�ste vara f�re 'f�re:' -datumet."
                           ,"js_err_search_errors" => "Varning - F�ljande problem m�ste korrigeras\\ innan din s�kning kan returnera n�gra resultat: \\n"
                           ,"js_err_search_id_invalid" => "F�ltet 'ID' m�ste vara tomt eller inneh�lla ett numeriskt v�rde st�rre �n 0."
                           ,"js_err_search_parent_invalid" => "F�ltet 'F�reg�ende' m�ste vara tomt eller inneh�lla ett numeriskt v�rde st�rre �n 0."
                           ,"js_err_search_status_exact" => "F�ltet 'Exakt:'  m�ste inneh�lla ett numeriskt v�rde mellan 0 och 100."
                           ,"js_err_search_status_less" => "F�ltet 'mindre �n:' m�ste inneh�lla ett numeriskt v�rde mellan 0 och 100."
                           ,"js_err_search_status_more" => "F�ltet 'mer �n:' m�ste inneh�lla ett numeriskt v�rde mellan 0 och 100."
                           ,"js_err_search_status_range" => "F�ltet 'l�gre �n:' m�ste vara h�gre �n 'Status mer �n:' f�ltet."
                           ,"js_loading_text" => "Laddar..."
                           ,"js_nothing_to_save" => "Det finns ingenting att spara i aktuellt f�nster."
                           ,"js_parent_required" => "Du m�ste specifiera vilken uppgift denna uppgift ska h�ra till f�r att\\ se uppgiften efter det att du sparat."
                           ,"mail_sent" => "Dagliga p�minnelser har skickats via e-mail."
                           ,"mobile_resolve_instructions" => "De data du fyllt i kommer att visas under versionen som redan existerar i databasen. G�r de �ndringar du beh�ver och spara sedan."
                           ,"no_email" => "Var v�nlig och l�gg till din e-mail adress i config.php."
                           ,"parent_changed" => "Uppgiftens ID �ndrades fr�n __0 till __1." // old parent id, new parent id
                           ,"saved" => "Sparade uppgift #__0 (__1) den __2." // id, title, timestamp
                           ,"title" => "Meddelande"
                           ,"warn_deleted" => "<b>Varning:</b> Denna uppgift �r redan raderad."
                           );

$language->misc = array("all_rights_reserved" => "all rights reserved."
                       ,"copyright" => "copyright"
                       ,"count_open" => "__0 �ppna Uppgifter" // number
                       ,"count_total" => "__0 Uppgifter" // number
                       ,"hide_completed" => "D�lj slutf�rda uppgifter"
                       ,"jump_to" => "G� till..."
                       ,"quick_search" => "Snabb s�kning"
                       ,"show_completed" => "Visa slutf�rda uppgifter"
                       ,"timer" => "screen rendered in __0 seconds." // seconds
                       ,"version" => "version __0" // number
                       );

$language->picker = array("date_go" => "G�"
                         ,"date_key_selected" => "Nuvarande valt datum"
                         ,"date_key_today" => "Dagens Datum"
                         ,"date_next" => "N�sta"
                         ,"date_previous" => "F�reg�ende"
                         ,"date_today" => "Idag"
                         ,"days" => "'S�n','M�n','Tis','Ons','Tor','Fre','L�r'"
                         ,"months" => "'Januari','Februari','Mars','April','Maj','Juni','Juli','Augusti','September','Oktober','November','December'"
                         ,"parent_title" => "V�lj f�reg�ende uppgift"
                         );

$language->resolve = array("append" => "Bifoga"
                          ,"current_version" => "Aktuell Version"
                          ,"form_title" => "F�ljande f�lt inneh�ller skillnader"
                          ,"none" => "(Ingen)"
                          ,"save" => "Spara"
                          ,"use" => "Anv�nd"
                          ,"your_data" => "Dina Data"
                          );

$language->search = array("after" => "efter:"
                         ,"before" => "f�re:"
                         ,"exactly" => "exakt:"
                         ,"form_title" => "S�kkriterium"
                         ,"include_completed" => "Inkludera slutf�rda Uppgifter"
                         ,"instructions" => "F�r in ord eller delar av ord som finns med i �mnesbeskrivningen och/eller noteringar fr�n uppgifter du vill s�ka efter. Som standard hittar s�kningen endast registerposter som inneh�ller alla de s�ktermer du f�r in. Klicka p�&quot;Advancerad s�kning&quot; f�r att se ut�kade s�kfunktioner."
                         ,"less_than" => "mindre �n:"
                         ,"more_options" => "Advancerad s�kning"
                         ,"more_than" => "mer �n:"
                         ,"results_title" => "Resultat av s�kning"
                         ,"search_button" => "S�k"
                         );

$language->toolbar = array("b2_tip" => "Skicka till b2"
                          ,"date_time" => "F�r in Datum/Tid"
                          ,"date_time_tip" => "F�r in aktuellt datum/tid i f�ltet f�r noteringar"
                          ,"delete" => "Ta Bort"
                          ,"edit" => "Redigera"
                          ,"mark_complete" => "Markera slutf�rt"
                          ,"mark_complete_m" => "100%"
                          ,"mt_tip" => "Posta till flyttbar typ"
                          ,"new_sub" => "Ny underliggande uppgift"
                          ,"new_sub_m" => "Ny underliggande uppgift"
                          ,"save" => "<u>S</u>para"
                          ,"save_alt" => "Spara"
                          ,"save_as_new" => "Spara som ny Uppgift"
                          ,"wp_tip" => "Skicka till WordPress"
                          );

$language->tree = array("due" => "F�rfaller:"
                       ,"id" => "ID:"
                       ,"loading" => $language->messages["js_loading_text"] // no need to set this
                       ,"open_sub_task" => '1 �ppna underuppgifter <span style="color: #666;">(__0 Total)</span>' // number
                       ,"open_sub_tasks" => '__0 �ppna undergiter <span style="color: #666;">(__1 Total)</span>' // number, number
                       ,"status" => "__0% Slutf�rd" // number (0-100)
                       );

?>
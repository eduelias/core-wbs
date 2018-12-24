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

$language->about = array("tagline" => "Organisera och få det gjort."
                        ,"documentation" => "Dokumentation"
                        ,"read_me" => "Läs mig"
                        ,"license" => "Licens"
                        ,"download" => "Ladda hem"
                        ,"this_version" => "Denna Version: __0" // number
                        ,"latest_version" => "Senaste Släppta Version: __0" // number
                        ,"beta_version" => "Senaste Beta Version: __0" // number
                        ,"using_latest" => "Du använder den senaste tillgängliga versionen."
                        ,"using_beta" => "Du använder den senaste tillgängliga beta versionen."
                        ,"feedback" => "Feedback och förslag:"
                        ,"web" => "Webb:"
                        ,"credits" => "Credits"
                        ,"main_credit" => "Tasks Jr. concept är framtaget och skapat av <nobr>Alex King</nobr>. Det har blivit översatt till följande språk av följande personer:"
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
                              ,"search" => "Sök"
                              ,"search_results" => "Sökresultat"
                              ,"sortable" => "Sorterbar Uppgiftslista"
                              ,"upcoming" => "Kommande Uppgifter"
                              );

$language->confirm = array("complete_instructions" => "Uppgiften du markerat Slutförd har __0 öppna underuppgifter. Välj hur du vill fortsätta:" // number
                          ,"complete_orphan" => "Markera denna uppgift som Slutförd och flytta upp dess underuppgifter"
                          ,"complete_notes" => "Skriv stängningsnotering för denna uppgift:"
                          ,"complete_recursive" => "Markera denna uppgift och dess underuppgifter slutförda"
                          ,"complete_remove" => "Markera denna uppgift slutförd och bifoga dess underuppgifter till ovanliggande uppgift"
                          ,"complete_title" => "Färdigställ uppgifternas alternativ"
                          ,"delete_confirm" => "är du säker på att du vill radera denna uppgift?"
                          ,"delete_instructions" => "Uppgiften du vill radera har __0 öppna underliggande uppgifter. Välj hur du vill fortsätta:" // number
                          ,"delete_orphan" => "Radera denna uppgift och flytta upp underliggande uppgift som huvuduppgift"
                          ,"delete_recursive" => "Radera denna uppgift och dess underliggande uppgifter"
                          ,"delete_remove" => "Radera denna uppgift och bifoga dess underliggande uppgifter till ovanliggande uppgift"
                          ,"delete_title" => "Raderingsalternativ för uppgiften"
                          ,"delete_title_m" => "Radera uppgift"
                          );

$language->data = array("no" => "Nej"
                       ,"priority_1" => "Lägst"
                       ,"priority_2" => "Lågt"
                       ,"priority_3" => "Medel"
                       ,"priority_4" => "Hög"
                       ,"priority_5" => "Högst"
                       ,"rel_date" => "__0" // datum
                       ,"rel_date_days" => "__0 Dagar" // number
                       ,"rel_date_days_ago" => "__0 Dagar tidigare" // number
                       ,"rel_date_today" => "Idag"
                       ,"rel_date_tomorrow" => "I Morgon"
                       ,"rel_date_week" => "1 Vecka"
                       ,"rel_date_week_ago" => "1 Vecka tidigare"
                       ,"rel_date_yesterday" => "I går"
                       ,"yes" => "Ja"
                       );

$language->email_reminders = array("overdue" => "Förfallna"
                                  ,"due" => "Förfallen"
                                  ,"upcoming" => "Kommande"
                                  ,"high_priority" => "Hög prioritet"
                                  ,"status" => "Status"
                                  ,"complete" => "% Slutförd"
                                  ,"priority" => "Prioritet"
                                  ,"none" => "(Ingen)"
                                  ,"subject" => "Påminnelse uppgift"
                                  );

$language->form = array("1_week" => "1 Vecka"
                       ,"1_year" => "1 år"
                       ,"30_days" => "30 Dagar"
                       ,"90_days" => "90 Dagar"
                       ,"after_save" => "Efter spara:"
                       ,"choose_date" => "Välj datum"
                       ,"clear_date" => "Rensa"
                       ,"date_due" => "Datum Förfaller:"
                       ,"date_entered" => "Angivet Datum:"
                       ,"date_modified" => "Sist ändrat:"
                       ,"form_title_edit" => "Redigera uppgift"
                       ,"form_title_new" => "Ny uppgift"
                       ,"id" => "ID:"
                       ,"new_task" => "Ny uppgift"
                       ,"notes" => "Noteringar:"
                       ,"parent" => "Föregående:"
                       ,"priority" => "Prioritet:"
                       ,"return_home" => "Gå till första sidan"
                       ,"status" => "% Klar:"
                       ,"status_label" => "% Klar"
                       ,"stay_here" => "Vänta Här"
                       ,"sticky" => "Klistrad Uppgift"
                       ,"sticky_label" => "Klistrad Uppgift:"
                       ,"title" => "Ämne:"
                       ,"today" => "I Dag"
                       ,"tomorrow" => "I Morgon"
                       ,"url" => "URL:"
                       ,"urls" => "URLs:"
                       ,"url_1" => "URL 1:"
                       ,"url_2" => "URL 2:"
                       ,"url_3" => "URL 3:"
                       ,"view_parent" => "Granska Föregående uppgift"
                       ,"view_tree" => "Visa Uppgifter"
                       );

$language->home = array("sort_title" => "Sortera efter ämne"
				,"sort_title_rev" => "Sortera omvänt efter ämne"
                       ,"sort_priority" => "Sortera efter Prioritet"
                       ,"sort_priority_rev" => "Sortera omvänt efter Prioritet"
                       );

$language->icons = array("completed" => "Slutförd uppgift"
                        ,"delete" => "Ta bort"
                        ,"edit" => "Redigera"
                        ,"hide_show" => "Dölj/Visa"
                        ,"hide_show_tip" => "Dölj eller visa mer information för denna uppgift"
                        ,"mark_complete" => "Markera Slutförd"
                        ,"new_sub_task" => "Ny Underliggande uppgift"
                        ,"notes_bigger" => "Skapa större fält för noteringar"
                        ,"notes_smaller" => "Skapa mindre fält för noteringar"
                        ,"parent_picker" => "Välj en aktuell uppgift"
                        ,"priority" => "Prioritet: __0" // result of get_friendly_priority();
                        ,"sticky" => "Klistrad uppgift"
                        ,"tree_toggle" => "Dölj/Visa"
                        ,"tree_toggle_tip" => "Dölj eller visa mer underliggande uppgifter för denna uppgift"
                        );

$language->list = array("banner" => "Visar __0 Poster" // number
                       ,"date_due" => "Datum Förfaller"
                       ,"done" => "(slutförd)"
                       ,"id" => "ID"
                       ,"no_items" => "Inga poster att visa."
                       ,"priority" => "Prioritet"
                       ,"status" => "% Klar"
                       ,"title" => "Ämne"
                       );

$language->list_titles = array("history" => "25 senast modifierade Uppgifter"
                              ,"overdue" => "Förfallna Uppgifter"
                              ,"sortable" => "Sorterbar Uppgiftslista"
                              ,"upcoming" => "Kommande Uppgifter"
                              );

$language->menu = array("calendar" => "<u>K</u>alender"
                       ,"calendar_tip" => "Klicka här för att se dina uppgifter i kalender."
                       ,"history" => "Histori<u>a</u>"
                       ,"history_tip" => "Klicka här för att se de 25 senast modifierade uppgifterna."
                       ,"home" => "<u>H</u>em"
                       ,"home_tip" => "Klicka här för att gå till första sidan som visar alla grunduppgifter."
                       ,"new_task" => "Ny <u>U</u>ppgift"
                       ,"new_task_tip" => "Klicka här för att skapa ny uppgift."
                       ,"search" => "S<u>ö</u>k"
                       ,"search_tip" => "Klicka här för att söka efter en uppgift."
                       ,"sortable" => "<u>S</u>orterbara"
                       ,"sortable_tip" => "Klicka här för att visa en sorterbar lista med uppgifter."
                       ,"upcoming" => "<u>K</u>ommande"
                       ,"upcoming_tip" => "Klicka här för att se all kommande och överskridna uppgifter."
                       );

$language->messages = array("completed" => "Uppgiften;__0&quot; (#__1) har blivit markerad slutförd." // title, id
				   ,"completed_reason" => 'Uppgiften &quot;__0&quot; (#__1) har blivit markerad slutförd med förklaring:<p style="padding-left: 15px;">__2</p>' // title, id, reason
                           ,"completed_task_link" => "Visa slutförd Uppgift"
                           ,"completed_task_parent_link" => "Visa slutförd uppgifts föregående"
                           ,"complete_instructions" => "Uppgiften #__0 har __1 underuppgifter (__2) öppna, Välj hur du vill förfara." // id, number, number
                           ,"complete_orphan" => "Uppgiften &quot;__0&quot; (#__1) har markerats som slutförd och alla underliggande uppgifter har bifogats Uppgift #__2." // title, id, new parent task id
                           ,"complete_orphan" => "Uppgiften &quot;__0&quot; (#__1) har markerats som slutförd och underliggande uppgifters tidigare ID har raderats." // title, id
                           ,"complete_recursive" => "Uppgiften &quot;__0&quot; (#__1) och alla underliggande uppgifter har markerats som slutförda." // title, id
                           ,"confirm_delete" => "Radera Uppgift: __0?"
				   ,"deleted" => "Uppgift &quot;__0&quot; (#__1) har nu raderats." // title, id
                           ,"delete_instructions" => "Uppgift #__0 har __1 Underliggande uppgifter öppna, välj hur du vill förfara." // id, number, number
                           ,"delete_orphan" => "Uppgift &quot;__0&quot; (#__1) har raderats dess underuppgift har flyttas upp som huvuduppgift." // title, id
                           ,"delete_recursive" => "Uppgift &quot;__0&quot; (#__1) och dess underliggande uppgifter har raderats." // title, id
                           ,"delete_remove" => "Uppgift &quot;__0&quot; (#__1) har raderats och dess underliggande uppgift(er) har flyttats upp en nivå" // title, id, new parent id
                           ,"err_conflict" => "<b>Fel:</b> Denna uppgift blev inte sparad.<br>Denna uppgift blev uppdaterad av en annan användare efter det att du började redigera den. Granska skillnaderna nedan och spara igen. <p>Versionen av uppgiften du ändrade i sparades sist __0;<br>den aktuella versionen i databasen var sparad __1"
                           ,"err_date_format" => "<b>Fel:</b> Det är ett fel i din <b>\$custom->date_format</b> i 'config.php'. Ditt värde: '__0' saknar en eller flera  'm', 'd', 'y'. Korrigera detta i 'config.php'." // date_format
                           ,"err_event_type" => "<b>Fel:</b> Det är ett fel i din <b>\$custom->ical_export_type</b> i 'config.php'. Ditt värde: '__0' är inte 'event' eller 'todo'. Korrigera detta i 'config.php'." // ical_export_type
                           ,"err_invalid_date" => "<b>Fel:</b> Uppgiften blev inte sparad eftersom angivet datum är felaktigt. Korrigera detta eller rensa förfallodatum och spara igen."
                           ,"err_invalid_parent" => "<b>Fel:</b> Uppgift #__0 specificerades som aktuell uppgift men ingen uppgift med detta Id existerar. Ändra detta och spara igen." // id
                           ,"err_loop" => "<b>Fel:</b> Att spara denna uppgift med specificerad uppgift kommer att skapa en oändlig loop."
                           ,"err_no_root" => "Fel: Ingen bas (root) har blivit satt."
				   ,"err_own_parent" => "<b>Fel:</b> En underliggande uppgift kan inte vara sin egen huvuduppgift."
                           ,"err_search_date_after" => "<b>Fel:</b> Denna sökning kan inte finna några uppgifter därför att specificerat datum i fältet Sist Ändrat 'efter:' är ogiltigt. Korrigera eller rensa fältet och prova att söka igen."
                           ,"err_search_date_before" => "<b>Fel:</b> Denna sökning kan inte finna några uppgifter därför att specificerat datum i fältet Sist Ändrat 'före:' är ogiltigt. Korrigera eller rensa fältet och prova att söka igen."
                           ,"err_search_date_exact" => "<b>Fel:</b> Denna sökning kan inte finna några uppgifter därför att specificerat datum i fältet Sist Ändrat  'exakt:' är ogiltigt. Korrigera eller rensa fältet och prova att söka igen."
                           ,"js_abandon_changes" => "Avsluta utan att spara dina ändringar?"                        
                           ,"js_complete_confirm" => "Är du säker på att du vill avsluta\\ denna uppgift utan att införa\\ noteringar innan du stänger?"
                           ,"js_complete_prompt" => "För in stängningsnotering för denna uppgift:"
                           ,"js_err_edit_date" => "Aktuellt värde i fältet för när datum förfaller är ogiltigt.\\ Ändra eller rensa detta värde innan du sparar."
                           ,"js_err_search_date_after" => "Datum Förfaller: Aktuellt värde i fältet 'efter:' är inte ett giltigt datum."
                           ,"js_err_search_date_before" => "Datum Förfaller: Aktuellt värde i fältet 'före:' är inte ett giltigt datum."
                           ,"js_err_search_date_exact" => "Datum Förfaller: Aktuellt värde i fältet 'exakt:' är inte ett giltigt datum."
				   ,"js_err_search_date_range" => "'Efter:' datumet måste vara före 'före:' -datumet."
                           ,"js_err_search_errors" => "Varning - Följande problem måste korrigeras\\ innan din sökning kan returnera några resultat: \\n"
                           ,"js_err_search_id_invalid" => "Fältet 'ID' måste vara tomt eller innehålla ett numeriskt värde större än 0."
                           ,"js_err_search_parent_invalid" => "Fältet 'Föregående' måste vara tomt eller innehålla ett numeriskt värde större än 0."
                           ,"js_err_search_status_exact" => "Fältet 'Exakt:'  måste innehålla ett numeriskt värde mellan 0 och 100."
                           ,"js_err_search_status_less" => "Fältet 'mindre än:' måste innehålla ett numeriskt värde mellan 0 och 100."
                           ,"js_err_search_status_more" => "Fältet 'mer än:' måste innehålla ett numeriskt värde mellan 0 och 100."
                           ,"js_err_search_status_range" => "Fältet 'lägre än:' måste vara högre än 'Status mer än:' fältet."
                           ,"js_loading_text" => "Laddar..."
                           ,"js_nothing_to_save" => "Det finns ingenting att spara i aktuellt fönster."
                           ,"js_parent_required" => "Du måste specifiera vilken uppgift denna uppgift ska höra till för att\\ se uppgiften efter det att du sparat."
                           ,"mail_sent" => "Dagliga påminnelser har skickats via e-mail."
                           ,"mobile_resolve_instructions" => "De data du fyllt i kommer att visas under versionen som redan existerar i databasen. Gör de ändringar du behöver och spara sedan."
                           ,"no_email" => "Var vänlig och lägg till din e-mail adress i config.php."
                           ,"parent_changed" => "Uppgiftens ID ändrades från __0 till __1." // old parent id, new parent id
                           ,"saved" => "Sparade uppgift #__0 (__1) den __2." // id, title, timestamp
                           ,"title" => "Meddelande"
                           ,"warn_deleted" => "<b>Varning:</b> Denna uppgift är redan raderad."
                           );

$language->misc = array("all_rights_reserved" => "all rights reserved."
                       ,"copyright" => "copyright"
                       ,"count_open" => "__0 öppna Uppgifter" // number
                       ,"count_total" => "__0 Uppgifter" // number
                       ,"hide_completed" => "Dölj slutförda uppgifter"
                       ,"jump_to" => "Gå till..."
                       ,"quick_search" => "Snabb sökning"
                       ,"show_completed" => "Visa slutförda uppgifter"
                       ,"timer" => "screen rendered in __0 seconds." // seconds
                       ,"version" => "version __0" // number
                       );

$language->picker = array("date_go" => "Gå"
                         ,"date_key_selected" => "Nuvarande valt datum"
                         ,"date_key_today" => "Dagens Datum"
                         ,"date_next" => "Nästa"
                         ,"date_previous" => "Föregående"
                         ,"date_today" => "Idag"
                         ,"days" => "'Sön','Mån','Tis','Ons','Tor','Fre','Lör'"
                         ,"months" => "'Januari','Februari','Mars','April','Maj','Juni','Juli','Augusti','September','Oktober','November','December'"
                         ,"parent_title" => "Välj föregående uppgift"
                         );

$language->resolve = array("append" => "Bifoga"
                          ,"current_version" => "Aktuell Version"
                          ,"form_title" => "Följande fält innehåller skillnader"
                          ,"none" => "(Ingen)"
                          ,"save" => "Spara"
                          ,"use" => "Använd"
                          ,"your_data" => "Dina Data"
                          );

$language->search = array("after" => "efter:"
                         ,"before" => "före:"
                         ,"exactly" => "exakt:"
                         ,"form_title" => "Sökkriterium"
                         ,"include_completed" => "Inkludera slutförda Uppgifter"
                         ,"instructions" => "För in ord eller delar av ord som finns med i ämnesbeskrivningen och/eller noteringar från uppgifter du vill söka efter. Som standard hittar sökningen endast registerposter som innehåller alla de söktermer du för in. Klicka på&quot;Advancerad sökning&quot; för att se utökade sökfunktioner."
                         ,"less_than" => "mindre än:"
                         ,"more_options" => "Advancerad sökning"
                         ,"more_than" => "mer än:"
                         ,"results_title" => "Resultat av sökning"
                         ,"search_button" => "Sök"
                         );

$language->toolbar = array("b2_tip" => "Skicka till b2"
                          ,"date_time" => "För in Datum/Tid"
                          ,"date_time_tip" => "För in aktuellt datum/tid i fältet för noteringar"
                          ,"delete" => "Ta Bort"
                          ,"edit" => "Redigera"
                          ,"mark_complete" => "Markera slutfört"
                          ,"mark_complete_m" => "100%"
                          ,"mt_tip" => "Posta till flyttbar typ"
                          ,"new_sub" => "Ny underliggande uppgift"
                          ,"new_sub_m" => "Ny underliggande uppgift"
                          ,"save" => "<u>S</u>para"
                          ,"save_alt" => "Spara"
                          ,"save_as_new" => "Spara som ny Uppgift"
                          ,"wp_tip" => "Skicka till WordPress"
                          );

$language->tree = array("due" => "Förfaller:"
                       ,"id" => "ID:"
                       ,"loading" => $language->messages["js_loading_text"] // no need to set this
                       ,"open_sub_task" => '1 öppna underuppgifter <span style="color: #666;">(__0 Total)</span>' // number
                       ,"open_sub_tasks" => '__0 öppna undergiter <span style="color: #666;">(__1 Total)</span>' // number, number
                       ,"status" => "__0% Slutförd" // number (0-100)
                       );

?>
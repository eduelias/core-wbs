<?

// dutch

$language = new language;

$language->name = "Nederlands";
$language->author = "Ejal de Klerk";
$language->author_email = "kib@kibje.com";
$language->author_web = "http://kibje.com";

$language->charset = "utf-8";

$language->about = array("tagline" => "breng uw zaken op orde en krijg dingen gedaan."
                        ,"documentation" => "Documentatie"
                        ,"read_me" => "Leesmij"
                        ,"license" => "Licensie"
                        ,"download" => "download"
                        ,"this_version" => "Deze versie: __0"
                        ,"latest_version" => "Laatste productie versie : __0"
                        ,"beta_version" => "Laatste beta versie: __0"
                        ,"using_latest" => "u gebruikt de laatst beschikbare officiële versie."
                        ,"using_beta" => "u gebruikt de laatst beschikbare beta versie."
                        ,"feedback" => "Opmerkingen en Suggesties:"
                        ,"web" => "Web:"
                        ,"credits" => "Credits"
                        ,"main_credit" => "Tasks Jr. is bedacht en tot stand gebracht door <nobr>Alex King</nobr>. Het is in de volgende talen gelocaliseerd door de volgende vrijgevige personen:"
                        ,"web_site" => "website"
                        ,"email" => "e-mail"
                        );

$language->accesskey = array("calendar" => "k"
                            ,"history" => "g"
                            ,"home" => "o"
                            ,"new_task" => "t"
                            ,"save" => "w"
                            ,"search" => "z"
                            ,"sortable" => "s"
                            ,"title" => "i"
                            ,"upcoming" => "n"
                            );

$language->breadcrumbs = array("history" => "Geschiedenis"
                              ,"home" => "Overzicht"
                              ,"new_task" => "Nieuwe Taak"
                              ,"search" => "Zoek"
                              ,"search_results" => "Zoek Resultaten"
                              ,"sortable" => "Sorteerbare Takenlijst"
                              ,"upcoming" => "Naderende Taken"
                              );

$language->confirm = array("complete_instructions" => "De taak die u compleet markeert heeft __0 openstaande subtaken. Kies hoe u verder wil gaan:" // number
                          ,"complete_orphan" => "Markeer deze taak compleet en zet alle subtaken zonder moedertaak"
                          ,"complete_recursive" => "Markeer deze taak en alle subtaken compleet"
                          ,"complete_notes" => "Type uw sluitnotities voor deze taak:"
				  ,"complete_remove" => "Markeer deze taak compleet en plaats alle subtaken onder de moedertaak van deze taak"
                          ,"complete_title" => "Voltooiings Opties Taken"
                          ,"delete_confirm" => "Weet u zeker dat u deze taak wil verwijderen?"
				  ,"delete_instructions" => "De taak die u verwijdert heeft __0 open subtaken. Kies hoe u verder wil gaan:" // number
                          ,"delete_orphan" => "Verwijder deze taak en zet alle subtaken zonder moedertaak"
                          ,"delete_recursive" => "Verwijder deze taak en alle subtaken"
                          ,"delete_remove" => "Verwijder deze taak en plaats alle subtaken onder de moedertaak van deze taak"
                          ,"delete_title" => "Verwijder Taak Opties"
				  ,"delete_title_m" => "Verwijder Taak"
                          );

$language->data = array("no" => "Nee"
                       ,"priority_1" => "Laagst"
                       ,"priority_2" => "Laag"
                       ,"priority_3" => "Gemiddeld"
                       ,"priority_4" => "Hoog"
                       ,"priority_5" => "Hoogst"
                       ,"rel_date" => "__0" // date
                       ,"rel_date_days" => "__0 Dagen" // number
                       ,"rel_date_days_ago" => "__0 Dagen Geleden" // number
                       ,"rel_date_today" => "Vandaag"
                       ,"rel_date_tomorrow" => "Morgen"
                       ,"rel_date_week" => "1 Week"
                       ,"rel_date_week_ago" => "1 Week Geleden"
                       ,"rel_date_yesterday" => "Gisteren"
                       ,"yes" => "Ja"
                       );

$language->email_reminders = array("overdue" => "Achterstallig"
                                  ,"due" => "Gepland"
                                  ,"upcoming" => "Naderend"
                                  ,"high_priority" => "Hoge Prioriteit"
                                  ,"status" => "Status"
                                  ,"complete" => "% Compleet"
                                  ,"priority" => "Prioriteit"
                                  ,"none" => "(geen)"
                                  ,"subject" => "taken herinnering"
                                  );

$language->form = array("1_week" => "1 Week"
                       ,"1_year" => "1 Jaar"
                       ,"30_days" => "30 Dagen"
                       ,"90_days" => "90 Dagen"
                       ,"after_save" => "Na Bewaren:"
                       ,"choose_date" => "Kies Datum"
                       ,"clear_date" => "Leeg"
                       ,"date_due" => "Planningsd	atum:"
                       ,"date_entered" => "Datum Aanmaak:"
                       ,"date_modified" => "Laatst Bewerkt:"
                       ,"form_title_edit" => "Bewerk Taak"
                       ,"form_title_new" => "Nieuwe Taak"
                       ,"id" => "ID:"
                       ,"new_task" => "Nieuwe Taak"
			     ,"notes" => "Notities:"
                       ,"parent" => "Moedertaak:"
                       ,"priority" => "Prioriteit:"
                       ,"return_home" => "Naar Overzicht"
                       ,"status" => "% Compleet:"
                       ,"status_label" => "% Compleet"
                       ,"stay_here" => "Blijf Hier"
                       ,"sticky" => "Vastgepinde Taak"
                       ,"sticky_label" => "Vastgepinde Taak:"
                       ,"title" => "Titel:"
                       ,"today" => "Vandaag"
                       ,"tomorrow" => "Morgen"
                       ,"url" => "URL:"
                       ,"urls" => "URLs:"
                       ,"url_1" => "URL 1:"
                       ,"url_2" => "URL 2:"
                       ,"url_3" => "URL 3:"
                       ,"view_parent" => "Bekijk Moedertaak"
                       ,"view_tree" => "Bekijk Boomstructuur"
                       );

$language->home = array("sort_title" => "Sorteer op Titel"
                       ,"sort_title_rev" => "Sorteer omgekeerd op Titel"
                       ,"sort_priority" => "Sorteer op Prioriteit"
                       ,"sort_priority_rev" => "Sorteer omgekeerd op Prioriteit"
                       );

$language->icons = array("completed" => "Voltooide Taken"
                        ,"delete" => "Verwijder"
                        ,"edit" => "Bewerk"
                        ,"hide_show" => "Toon/Verberg"
                        ,"hide_show_tip" => "Toon of Verberg meer informatie voor deze taak"
                        ,"mark_complete" => "Markeer Compleet"
                        ,"new_sub_task" => "Nieuwe Subtaak"
                        ,"notes_bigger" => "Maak Notitieveld groter"
                        ,"notes_smaller" => "Maak Notitieveld kleiner"
                        ,"parent_picker" => "Kies een moedertaak"
                        ,"priority" => "Prioriteit: __0" // result of get_friendly_priority();
                        ,"sticky" => "Vastgepinde Taak"
                        ,"tree_toggle" => "Toon/Verberg"
                        ,"tree_toggle_tip" => "Toon of Verberg meer subtaken voor deze taak"
                        );

$language->list = array("banner" => "Bekijk __0 Item(s)" // number
                       ,"date_due" => "Planningsdatum"
                       ,"done" => "(klaar)"
                       ,"id" => "ID"
                       ,"no_items" => "Geen items te tonen."
                       ,"priority" => "Prioriteit"
                       ,"status" => "% Compleet"
                       ,"title" => "Titel"
                       );

$language->list_titles = array("history" => "Laatste 25 Bewerkte"
                              ,"overdue" => "Achterstallige Taken"
                              ,"sortable" => "Sorteerbare Takenlijst"
                              ,"upcoming" => "Naderende Taken"
                              );

$language->menu = array("calendar" => "<u>K</u>alender"
                       ,"calendar_tip" => "Klik hier om een kalender overzicht van uw taken te bekijken en om uw iCalender data bij te werken."
                       ,"history" => "<u>G</u>eschiedenis"
                       ,"history_tip" => "Klik hier om de laatste 25 bewerkte taken te bekijken."
                       ,"home" => "<u>O</u>verzicht"
                       ,"home_tip" => "Klik hier om naar het beginscherm te gaan waar u alle hoofdtaken kunt bekijken."
                       ,"new_task" => "Nieuwe <u>T</u>aak"
                       ,"new_task_tip" => "Klik hier om een nieuwe taak te maken."
                       ,"search" => "<u>Z</u>oek"
                       ,"search_tip" => "Klik hier om een taak te zoeken."
                       ,"sortable" => "<u>S</u>orteerbaar"
                       ,"sortable_tip" => "Klik hier om een sorteerbare lijst met taken te bekijken."
                       ,"upcoming" => "<u>N</u>aderend"
                       ,"upcoming_tip" => "Klik hier om naderende en achterstallige taken te bekijken."
                       );

$language->messages = array("completed" => "Taak &quot;__0&quot; (#__1) is gemarkeerd als compleet." // title, id
                           ,"completed_reason" => 'Taak &quot;__0&quot; (#__1) is gemarkeerd als compleet met als reden:<p style="padding-left: 15px;">__2</p>' // title, id, reason
                           ,"completed_task_link" => "Bekijk Gecompleteerde Taak"
                           ,"completed_task_parent_link" => "Bekijk de moedertaak van de als compleet gemarkeerde taak"
                           ,"complete_instructions" => "Taak #__0 heeft __1 subtaken, waarvan (__2) openstaand. Kies het door u gewenste gedrag om de taak compleet te markeren." // id, number, number
                           ,"complete_orphan" => "Taak &quot;__0&quot; (#__1) is gemarkeerd als compleet, alle bijbehorende subtaken zijn ondergebracht bij taak #__2." // title, id, new parent task id
                           ,"complete_orphan" => "Taak &quot;__0&quot; (#__1) is gemarkeerd als compleet, alle bijbehorende subtaken zijn veranderd in zelfstandige taken zonder moedertaak." // title, id
                           ,"complete_recursive" => "Taak &quot;__0&quot; (#__1) en alle bijbehorende subtaken zijn gemarkeerd als compleet." // title, id
                           ,"confirm_delete" => "Delete task: __0?"
                           ,"deleted" => "Taak &quot;__0&quot; (#__1) is verwijderd." // title, id
                           ,"delete_instructions" => "Taak #__0 heeft __1 subtaken, waarvan (__2) openstaand. Kies het gewenste verwijderings-gedrag." // id, number, number
                           ,"delete_orphan" => "Taak &quot;__0&quot; (#__1) is verwijderd, alle bijbehorende subtaken zijn veranderd in zelfstandige taken zonder moedertaak." // title, id
                           ,"delete_recursive" => "Taak &quot;__0&quot; (#__1) en alle bijbehorende subtaken zijn verwijderd." // title, id
                           ,"delete_remove" => "Taak &quot;__0&quot; (#__1) is verwijderd en alle bijbehorende subtaken zijn ondergebracht bij taak #__2" // title, id, new parent id
                           ,"err_conflict" => "<b>Fout:</b> Deze taak is niet opgeslagen.<br>Deze taak werd bijgewerkt door een andere gebruiker nadat u begon met bewerken. you started editing it. u kunt de verschillen hieronder bekijken en vervolgens opnieuw opslaan.<p>De versie van deze taak waar u veranderingen in aanbracht werd het laatst opgeslagen op  __0;<br>de huidige in de database werd opgeslagen op __1"
                           ,"err_date_format" => "<b>Fout:</b> Er zit een fout in de waarde van <b>\$custom->date_format</b> in 'config.php'. Uw waarde: '__0' bevat niet een of meerdere van de letters 'm', 'd' en 'y'. Hersteld u dit alstublieft in uw 'config.php'." // date_format
				   ,"err_event_type" => "<b>Fout:</b> Er zit een fout in de waarde van  <b>\$custom->ical_export_type</b> in 'config.php'. Uw waarde: '__0' is niet 'event' of 'todo'. Hersteld u dit alstublieft in uw 'config.php'." // ical_export_type
				   ,"err_invalid_date" => "<b>Fout:</b> Deze taak is niet opgeslagen omdat de gespecificeerde datum onjuist was. Corrigeer of verwijder de verloopdatum en sla de taak opnieuw op."
                           ,"err_invalid_parent" => "<b>Fout:</b> Taak #__0 werd gespecificeerd als de moedertaak, maar er bestaat geen taak met dat ID nummer. Verhelp dit probleem en sla de taak opnieuw op." // id
                           ,"err_loop" => "<b>Fout:</b> Deze taak opslaan met de opgegeven moedertaak zou een oneindige lus veroorzaken."
                           ,"err_no_root" => "Fout: Er werd geen hoofdmoeder ingesteld."
                           ,"err_own_parent" => "<b>Fout:</b> Een taak kan niet zijn eigen moedertaak zijn."
                           ,"err_search_date_after" => "<b>Fout:</b> Deze zoekopdracht zal geen taken vinden omdat de opgegeven waarde voor 'Verloopdatum is groter dan' incorrect is. Corrigeer of verwijder de verloopdatum en probeer opnieuw."
                           ,"err_search_date_before" => "<b>Fout:</b> Deze zoekopdracht zal geen taken vinden omdat de opgegeven waarde voor 'Verloopdatum is kleiner dan:' incorrect is. Corrigeer of verwijder de verloopdatum en probeer opnieuw."
                           ,"err_search_date_exact" => "<b>Fout:</b> Deze zoekopdracht zal geen taken vinden omdat de opgegeven waarde voor 'Verloopdatum is exact:' incorrect is. Corrigeer of verwijder de verloopdatum en probeer opnieuw."
                           ,"js_abandon_changes" => "Verlaten zonder uw wijzigingen op te slaan?"
                           ,"js_complete_confirm" => "Weet u zeker dat u deze \\ntaak wil sluiten zonder enige\\nsluitingsnotities toe te voegen?"
                           ,"js_complete_prompt" => "Vul sluitingsnotities in voor deze taak."
                           ,"js_err_edit_date" => "De huidige waarde in het veld 'Verloopdatum' is geen geldige datum.\\nVerander of verwijder deze waarde alvorens op te slaan."
                           ,"js_err_search_date_after" => "De huidige waarde in het veld 'Verloopdatum is groter dan:' is geen geldige datum."
                           ,"js_err_search_date_before" => "De huidige waarde in het veld 'Verloopdatum is kleiner dan:' is geen geldige datum."
                           ,"js_err_search_date_exact" => "De huidige waarde in het veld 'Verloopdatum is exact:' is geen geldige datum."
                           ,"js_err_search_date_range" => "De 'Verloopdatum is groter dan:' datum moet eerder zijn dan de 'Verloopdatum is kleiner dan:' datum."
                           ,"js_err_search_errors" => "Waarschuwing - De volgende problemen moeten opgelost worden\\nvoordat uw zoekopdracht een resultaat kan weergeven: \\n"
                           ,"js_err_search_id_invalid" => "Het 'ID' veld moet leeg zijn of een numerieke waarde boven 0 bevatten."
                           ,"js_err_search_parent_invalid" => "Het 'Moedertaak' veld moet leeg zijn of een numerieke waarde boven 0 bevatten."
                           ,"js_err_search_status_exact" => "Het 'Status is exact:' veld moet een numerieke waarde bevatten tussen 0 en 100."
                           ,"js_err_search_status_less" => "Het 'Status is kleiner dan:' veld moet leeg zijn of een waarde tussen 0 en 100 bevatten."
                           ,"js_err_search_status_more" => "Het 'Status is groter dan:' veld moet leeg zijn of een waarde tussen 0 en 100 bevatten."
                           ,"js_err_search_status_range" => "Het 'Status is kleiner dan:' veld moet groter zijn dan het 'Status is groter dan' veld."
                           ,"js_loading_text" => "Laadt..."
                           ,"js_nothing_to_save" => "Sorry,er valt niks te bewaren op dit scherm."
                           ,"js_parent_required" => "u moet een moedertaak opgeven voor deze taak\\nom de moedertaak na het bewaren te kunnen zien."
                           ,"mail_sent" => "Dagelijkse herinneringen zijn ge-emailed."
                           
                           ,"mobile_resolve_instructions" => "De data die u heeft ingevuld zal getoond worden direct onder de versie die nu in de database staat. Maak zoveel veranderingen als u wilt en klik daarna op 'Bewaar'."
				   ,"no_email" => "Vul alstublieft uw email-adres in in de config.php"
                           ,"parent_changed" => "De moedertaak van taak __0 verandert naar __1." // old parent id, new parent id
                           ,"saved" => "Taak #__0 (__1) bewaard op __2." // id, title, timestamp
                           ,"title" => "Berichten"
                           ,"warn_deleted" => "<b>Waarschuwing:</b> Deze taak is reeds verwijderd."
                           );

$language->misc = array("all_rights_reserved" => "alle rechten gereserveerd."
                       ,"copyright" => "copyright"
                       ,"count_open" => "__0 Open Taken" // number
                       ,"count_total" => "__0 Taken" // number
                       ,"hide_completed" => "Verberg Complete Taken"
                       ,"jump_to" => "Spring Naar..."
                       ,"quick_search" => "Snel Zoeken"
			     ,"show_completed" => "Toon Complete Taken"
                       ,"timer" => "scherm opgebouwd in __0 seconden." // seconds
                       ,"version" => "versie __0"
                       );

$language->picker = array("date_go" => "Ga"
                         ,"date_key_selected" => "Huidig Geselecteerde Datum"
                         ,"date_key_today" => "Datum Vandaag"
                         ,"date_next" => "Volgende"
                         ,"date_previous" => "Vorige"
                         ,"date_today" => "Vandaag"
                         ,"days" => "'Zon','Maa','Din','Woe','Don','Vrij','Zat'"
                         ,"months" => "'Januari','Februari','Maart','April','Mei','Juni','Juli','Augustus','September','Oktober','November','December'"
                         ,"parent_title" => "Kies een moedertaak"
                         );

$language->resolve = array("append" => "Voeg achteraan toe"
                          ,"current_version" => "Huidige Versie"
                          ,"form_title" => "De volgende velden bevatten verschillen"
                          ,"none" => "(geen)"
                          ,"save" => "Bewaar"
                          ,"use" => "Gebruik"
                          ,"your_data" => "Uw gegevens"
                          );

$language->search = array("after" => "is groter dan:"
                         ,"before" => "is kleiner dan:"
                         ,"exactly" => "exact:"
                         ,"form_title" => "Zoekcriteria"
                         ,"include_completed" => "Inclusief voltooide taken"
                         ,"instructions" => "Vul woorden of delen van woorden in die voorkomen in de titel en/of opmerkingen van de taken waarnaar u zoekt.<br />Standaard worden alleen taken gevonden waarin alle ingetypte woorden voorkomen.<br/>Klik op &quot;Meer zoekopties&quot; om extra zoekcriteria te zien."
                         ,"less_than" => "minder dan:"
                         ,"more_options" => "Meer zoekopties"
                         ,"more_than" => "meer dan:"
                         ,"results_title" => "Zoekresultaten"
                         ,"search_button" => "Zoek"
                         );

$language->toolbar = array("b2_tip" => "Plaats in b2"
                          ,"date_time" => "Voeg datum/tijd in"
                          ,"date_time_tip" => "Voeg huidige tijd in notitieveld in"
                          ,"delete" => "Wis"
                          ,"edit" => "Bewerk"
                          ,"mark_complete" => "Markeer Compleet"
                          ,"mark_complete_m" => "100%"
                          ,"mt_tip" => "Plaats in Moveable Type"
                          ,"new_sub" => "Nieuwe subtaak"                          
				  ,"new_sub_m" => "Maak Sub"
                          ,"save" => "<u>B</u>ewaar"
                          ,"save_alt" => "Bewaar"
                          ,"save_as_new" => "Bewaar als nieuwe Taak"
                          ,"wp_tip" => "Stuur naar WordPress"
                          );

$language->tree = array("due" => "Gepland:"
                       ,"id" => "ID:"
                       ,"loading" => $language->messages["js_loading_text"]
                       ,"open_sub_task" => '1 Open Subtaak <span style="color: #666;">(__0 Totaal)</span>' // number
                       ,"open_sub_tasks" => '__0 Open Subtaken <span style="color: #666;">(__1 Totaal)</span>' // number, number
                       ,"status" => "__0% Compleet" // number (0-100)
                       );

?>
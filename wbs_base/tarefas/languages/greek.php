<?

// english

$language = new language;

$language->name = "Greek";
$language->author = "Tripkos Chris";
$language->author_email = "tripkos@sch.gr";
$language->author_web = "http://www.nextschool.gr/";

$language->charset = "windows-1253";

// uncomment this if you need to increase the font size from 10px
// $language->font_size = "10px;"; 

$language->about = array("tagline" => "Το μέλλον ανήκει σ' αυτούς που το προετοιμάζουν."
                        ,"documentation" => "documentation"
                        ,"read_me" => "Διαβασέ με"
                        ,"license" => "’δεια χρήσης"
                        ,"download" => "Ανάκτηση"
                        ,"this_version" => "Έκδοση: __0" // number
                        ,"latest_version" => "Τελευταία έκδοση: __0" // number
                        ,"beta_version" => "Τελευταία beta έκδοση: __0" // number
                        ,"using_latest" => "Χρησιμοποιείτε την τελευταία έκδοση."
                        ,"using_beta" => "Χρησιμοποιείτε την τελευταία δοκιμαστική έκδοση."
                        ,"feedback" => "Απόκριση και προτάσεις:"
                        ,"web" => "Web:"
                        ,"credits" => "Credits"
                        ,"main_credit" => "Το πρόγραμμα παραμετροποιήθηκε απο τον <nobr>Alex King</nobr>. Εξελληνισμός:"
                        ,"web_site" => "web site"
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

$language->breadcrumbs = array("history" => "Ολοκληρώθηκαν"
                              ,"home" => "Κατάλογος"
                              ,"new_task" => "Νέα εργασία"
                              ,"search" => "Έύρεση"
                              ,"search_results" => "Αποτελέσματα αναζήτησης"
                              ,"sortable" => "Ταξινομένη λίστα εργασιών"
                              ,"upcoming" => "Ερχόμενες εργασίες"
                              );

$language->confirm = array("complete_instructions" => "Η εργασία που ολοκληρώνετε έχει __0 ανεκπλήρωτες υποεργασίες. Επέλεξε τι θέλεις να κάνεις:" // number
                          ,"complete_orphan" => "Ολοκληρωση εργασίας και απελευθέρωση υποεργασιών"
                          ,"complete_notes" => "Σχόλια ολοκλήρωσης:"
                          ,"complete_recursive" => "Ολοκλήρωση εργασίας και καθηκόντων"
                          ,"complete_remove" => "Ολοκληρωση εργασίας και ανάθεση υποεργασιών στην γονική εργασία"
                          ,"complete_title" => "Επιλογές ολοκληρωσης"
                          ,"delete_confirm" => "Είσαι σίγουρος ότι θέλεις να διαγράψεις την εργασία;"
                          ,"delete_instructions" => "Η εργασία που διαγράφετε έχει __0 ανεκπλήρωτες υποεργασίες. Επέλεξε τι θέλεις να γίνει:" // number
                          ,"delete_orphan" => "Διαγραφή της εργασίας και απελευθέρωση των υποεργασιών"
                          ,"delete_recursive" => "Διαγραφή της εργασίας και των εξαρτημένων υποεργασιών"
                          ,"delete_remove" => "Διαγραφή εργασίας και ανάθεση υποεργασιών στην γονική εργασία"
                          ,"delete_title" => "Διαγραφή επιλογών εργασίας"
                          ,"delete_title_m" => "Διαγραφή εργασίας"
                          );

$language->data = array("no" => "No"
                       ,"priority_1" => "Πολύ χαμηλή"
                       ,"priority_2" => "Χαμηλή"
                       ,"priority_3" => "Μέση"
                       ,"priority_4" => "Υψηλή"
                       ,"priority_5" => "Υψηλότατη"
                       ,"rel_date" => "__0" // date
                       ,"rel_date_days" => "__0 ημέρες" // number
                       ,"rel_date_days_ago" => "__0 ημέρες ακόμα" // number
                       ,"rel_date_today" => "Σήμερα"
                       ,"rel_date_tomorrow" => "Αύριο"
                       ,"rel_date_week" => "1 εβδομάδα"
                       ,"rel_date_week_ago" => "1 εβδομάδα ακόμα"
                       ,"rel_date_yesterday" => "Χθές"
                       ,"yes" => "Ναί"
                       );

$language->email_reminders = array("overdue" => "Εκτός προθεσμίας"
                                  ,"due" => "Μέχρι"
                                  ,"upcoming" => "Ερχόμενες"
                                  ,"high_priority" => "Υψηλής προτεραιότητας"
                                  ,"status" => "Κατάσταση"
                                  ,"complete" => "% ολοκληρώθηκε"
                                  ,"priority" => "Προτεραιότητα"
                                  ,"none" => "(καμιά)"
                                  ,"subject" => "υπενθύμιση εργασιών"
                                  );

$language->form = array("1_week" => "1 εβδομάδα(ες)"
                       ,"1_year" => "1 χρόνια"
                       ,"30_days" => "30 ημέρες"
                       ,"90_days" => "90 ημέρες"
                       ,"after_save" => "Έπειτα απο αποθήκευση:"
                       ,"choose_date" => "Επέλεξε ημερομηνία"
                       ,"clear_date" => "Καθαρισμός ημερομηνίας"
                       ,"date_due" => "Έως:"
                       ,"date_entered" => "Ημερομηνία εισαγωγής:"
                       ,"date_modified" => "Τελευταία τροποποίηση:"
                       ,"form_title_edit" => "Επεξεργασίας"
                       ,"form_title_new" => "Νέα εργασία"
                       ,"id" => "ID:"
                       ,"new_task" => "Νέα εργασία"
                       ,"notes" => "Σημειώσεις:"
                       ,"parent" => "Γονική:"
                       ,"priority" => "Προτεραιότητα:"
                       ,"return_home" => "Επιστροφή στην αρχική"
                       ,"status" => "% ολοκληρώθηκε:"
                       ,"status_label" => "% Ολοκληρώθηκε"
                       ,"stay_here" => "Παρέμεινε εδώ"
                       ,"sticky" => "Sticky εργασία"
                       ,"sticky_label" => "Sticky εργασία:"
                       ,"title" => "Τίτλος:"
                       ,"today" => "Σήμερα"
                       ,"tomorrow" => "Αύριο"
                       ,"url" => "URL:"
                       ,"urls" => "URLs:"
                       ,"url_1" => "URL 1:"
                       ,"url_2" => "URL 2:"
                       ,"url_3" => "URL 3:"
                       ,"view_parent" => "Γονική εργασία"
                       ,"view_tree" => "Γονικό δέντρο"
                       );

$language->home = array("sort_title" => "Ταξινόμηση κατά τίτλο"
                       ,"sort_title_rev" => "Αντίστροφη ταξινόμηση κατά τίτλο"
                       ,"sort_priority" => "ταξινόμηση κατα προτεραιότητα"
                       ,"sort_priority_rev" => "Αντίστροφη ταξινόμηση κατα προτεραιότητα"
                       );

$language->icons = array("completed" => "Ολοκληρωμένες εργασίες"
                        ,"delete" => "Διαγραφή"
                        ,"edit" => "Επεξεργασία"
                        ,"hide_show" => "Εμφάνιση/Απόκρυψη"
                        ,"hide_show_tip" => "Εμφάνιση/Απόκρυψη σημειώσεων"
                        ,"mark_complete" => "Ολοκληρώθηκε !"
                        ,"new_sub_task" => "Νέα υποεργασία"
                        ,"notes_bigger" => "Μεγαλύτερες σημειώσεις"
                        ,"notes_smaller" => "Μικρότερες σημειώσεις"
                        ,"parent_picker" => "Επιλογή γονικής εργασίας"
                        ,"priority" => "Προτεραιότητα: __0" // result of get_friendly_priority();
                        ,"sticky" => "Sticky εργασία"
                        ,"tree_toggle" => "Εμφάνιση/Απόκρυψη"
                        ,"tree_toggle_tip" => "Εμφάνιση/Απόκρυψη υποεργασιών"
                        );

$language->list = array("banner" => "Εμφάνιση __0 τεμαχίων" // number
                       ,"date_due" => "Έως:"
                       ,"done" => "(ολοκληρώθηκαν)"
                       ,"id" => "ID"
                       ,"no_items" => "Δεν υπάρχουν στοιχεία για επιλογή."
                       ,"priority" => "Προτεραιότητα"
                       ,"status" => "% Ολοκληρώθηκαν"
                       ,"title" => "Τίτλος"
                       );

$language->list_titles = array("history" => "Τελευταίες 25 επεξεργασμένες εργασίες"
                              ,"overdue" => "Εργασίες εκτός προθεσμίας"
                              ,"sortable" => "Ταξινομένη λίστα εργασιών"
                              ,"upcoming" => "Ερχόμενες εργασίες"
                              );

$language->menu = array("calendar" => "<u>Η</u>μερολόγιο"
                       ,"calendar_tip" => "Κλικ εδώ για να δείτε ημερολόγιο με τις εργασίες."
                       ,"history" => "Ιστορικ<u>ό</u>"
                       ,"history_tip" => "Κλικ εδώ για να δείτε τις τελευταίες 25 τροποιημένες εργασίες."
                       ,"home" => "<u>Κ</u>ατάλογος"
                       ,"home_tip" => "Κλίκ εδώ για να δείτε τον κατάλογο με όλες τις εργασίες."
                       ,"new_task" => "Νέα <u>ε</u>ργασία"
                       ,"new_task_tip" => "Κλίκ εδώ για να δημιουργήσετε νέα εργασία."
                       ,"search" => "Εύ<u>ρ</u>εση"
                       ,"search_tip" => "Κλίκ εδώ για να αναζητήσετε μια εργασία."
                       ,"sortable" => "Ταξινό<u>μ</u>ηση"
                       ,"sortable_tip" => "κλικ εδώ για να δείτε μια ταξινομημένη λίστα εργασιών."
                       ,"upcoming" => "<u>Ε</u>ρχόμενες"
                       ,"upcoming_tip" => "Κλικ εδω για να δείτε τις ερχόμενες και εκτός προθεσμίας εργασίες."
                       );

$language->messages = array("completed" => "Η εργασία &quot;__0&quot; (#__1) ολοκληρώθηκε." // title, id
                           ,"completed_reason" => 'Η εργασία &quot;__0&quot; (#__1) ολοκληρώθηκε με τα εξής σχόλια:<p style="padding-left: 15px;">__2</p>' // title, id, reason
                           ,"completed_task_link" => "Ολοκληρωμένες εργασίες"
                           ,"completed_task_parent_link" => "Εμφάνιση γονικών εργασιών για τις ολοκληρωμένες"
                           ,"complete_instructions" => "Η εργασία #__0 έχει __1 υποεργασίες (__2) ανοιχτές, παρακαλώ επιλέξτε τι θέλετε να γίνει." // id, number, number
                           ,"complete_orphan" => "Η εργασία &quot;__0&quot; (#__1) ολοκληρώθηκε και όλες οι υποεργασίες ανατέθηκαν στην εργασία #__2." // title, id, new parent task id
                           ,"complete_orphan" => "Η εργασία &quot;__0&quot; (#__1) ολοκληρώθηκε και όλες οι υποεργασίες δεν έχουν πλέον γονική εργασία." // title, id
                           ,"complete_recursive" => "Η εργασία &quot;__0&quot; (#__1) και όλες οι υποεργασίες ολοκληρώθηκαν." // title, id
                           ,"confirm_delete" => "Διαγραφή εργασίας: __0?"
                           ,"deleted" => "Η εργασία &quot;__0&quot; (#__1) έχει διαγραφεί." // title, id
                           ,"delete_instructions" => "Η εργασία #__0 έχει __1 υποεργασίες (__2) ανοιχτές, επέλεξε τι διαγραφή θέλεις να γίνει." // id, number, number
                           ,"delete_orphan" => "Η εργασία &quot;__0&quot; (#__1) διαγράφηκε και όλες οι υποεργασίες δεν έχουν πλέον γονική εργασία." // title, id
                           ,"delete_recursive" => "Η εργασία &quot;__0&quot; (#__1) και όλες οι υποεργασίες έχουν διαγραφεί." // title, id
                           ,"delete_remove" => "Η εργασία &quot;__0&quot; (#__1) διαγράφηκε και όλες οι υποεργασίες ανατέθηκαν στην εργασία #__2" // title, id, new parent id
                           ,"err_conflict" => "<b>Λάθος:</b> Η εργασία δεν αποθηκεύτηκε.<br>Η εργασία αυτή τροποιήθηκε ήδη απο άλλο χρήστη. Δες τις αλλαγές και αποθήκευσε ξανά. <p>Η εργασία που τροποποιείς αποθηκεύτηκε αρχικά __0;<br>Οι αλλαγές που βλέπεις αποθηκεύτηκαν την __1"
                           ,"err_date_format" => "<b>Λάθος:</b> Υπάρχει λάθος στην <b>\$custom->date_format</b> του 'config.php'. Η τιμή σου: '__0' δεν περιέχει 'm', 'd', 'y'. Διόρθωσε το 'config.php'." // date_format
                           ,"err_event_type" => "<b>Λάθος:</b> Υπάρχει λάθος <b>\$custom->ical_export_type</b> στο 'config.php'. Η τιμή σου: '__0' is not 'event' or 'todo'. Please correct this in 'config.php'." // ical_export_type
                           ,"err_invalid_date" => "<b>Λάθος:</b> Η εργασία δεν αποθηκεύτηκε γιατί υπάρχει λάθος στην ημερομηνία. Διόρθωσε την ημερομηνία και αποθήκευσε ξανά."
                           ,"err_invalid_parent" => "<b>Λάθος:</b> Η εργασία #__0 έχει οριστεί ως γονική αλλά δεν υπάρχει. Διόρθωσε το πρόβλημα και αποθήκευσε ξανά." // id
                           ,"err_loop" => "<b>Λάθος:</b> Δεν μπορεί να ανατεθεί υποεργασία στον εαυτό της."
                           ,"err_no_root" => "Λάθος: Δεν έχει οριστεί αρχικός."
                           ,"err_own_parent" => "<b>Λάθος:</b> Η εργασία δεν μπορεί να ανατεθεί στον εαυτό της."
                           ,"err_search_date_after" => "<b>Λάθος:</b> Η εύρεση δεν βρήκε αποτελέσματα γιατί η ορισμένη 'Date Due is after:' τιμή είναι λάθος. Διόρθωσε την ημερομηνία και προσπάθησε ξανά."
                           ,"err_search_date_before" => "<b>Λάθος:</b> Η εύρεση δεν βρήκε αποτελέσματα γιατί η ορισμένη 'Date Due is before:' τιμή είναι λάθος. Διόρθωσε την ημερομηνία και προσπάθησε ξανά."
                           ,"err_search_date_exact" => "<b>Λάθος:</b> Η εύρεση δεν βρήκε αποτελέσματα γιατί η ορισμένη 'Date Due is exactly:' τιμή είναι λάθος. Διόρθωσε την ημερομηνία και προσπάθησε ξανά."
                           ,"js_abandon_changes" => "Θέλεις να φύγεις χωρίς να αποθηκεύσεις τις αλλαγές;"
                           ,"js_complete_confirm" => "Είσαι σίγουρος ότι θέλεις να κλείσεις \\nτην εργασία χωρίς να ορίσεις\\nσχόλια ολοκληρωσης;"
                           ,"js_complete_prompt" => "Εισάγετε σχόλια ολοκληρωσης για την εργασία."
                           ,"js_err_edit_date" => "The current value in the Date Due field is not a valid date.\\nChange or clear this value before saving."
                           ,"js_err_search_date_after" => "Η ημερομηνία που ορίσατε στην 'Date Due is after:' δεν είναι σωστή."
                           ,"js_err_search_date_before" => "Η ημερομηνία που ορίσατε στην 'Date Due is before:' δεν είναι σωστή."
                           ,"js_err_search_date_exact" => "Η ημερομηνία που ορίσατε στην 'Date Due is exactly:' δεν είναι σωστή."
                           ,"js_err_search_date_range" => "Η 'Date Due is after:' πρέπει να είναι πρίν απο την 'Date Due is before:'."
                           ,"js_err_search_errors" => "Προσοχή - Τα ακόλουθα προβλήματα πρέπει να διορθωθούν\\nπροκειμένου η αναζήτηση να έχει αποτελέσματα: \\n"
                           ,"js_err_search_id_invalid" => "Το 'ID' πεδίο πρέπει να είναι άδειο ή να έχει τιμή μεγαλύτερη απο 0."
                           ,"js_err_search_parent_invalid" => "Το 'Parent' πεδίο πρέπει να είναι άδειο ή να έχει τιμή μεγαλύτερη απο 0."
                           ,"js_err_search_status_exact" => "Το 'Status is exactly:' πεδίο πρέπει να έχει τιμή απο 0 έως 100."
                           ,"js_err_search_status_less" => "Το 'Status is less than:' πεδίο πρέπει να είναι άδειο ή να έχει τιμή απο 0 έως 100."
                           ,"js_err_search_status_more" => "Το 'Status is more than:' πεδίο πρέπει να είναι άδειο ή να έχει τιμή απο 0 έως 100."
                           ,"js_err_search_status_range" => "Το 'Status is less than:' πεδίο πρέπει να έχει τιμή μεγαλύτερη απο το 'Status is more than:' πεδίο."
                           ,"js_loading_text" => "Φόρτωση..."
                           ,"js_nothing_to_save" => "Συγνώμη, δεν υπάρχει τίποτα να αποθηκεύσω."
                           ,"js_parent_required" => "Πρέπει να ορίσεις μια γονική εργασία σε\\n για να εμφανιστεί μετά την αποθήκευση."
                           ,"mail_sent" => "Οι υπενθυμίσεις έχουν αποσταλεί με e-mail."
                           ,"mobile_resolve_instructions" => "Οι αλλαγές που κάνατε φαίνονται μετά τις πρωτότυπες πληρφορίες που υπάρχουν στην βάση. Κάνε όσες αλλαγές θέλετε, και μετά κάντε κλίκ στην 'Save'."
                           ,"no_email" => "Κάντε αλλαγές στο email του config.php."
                           ,"parent_changed" => "Η γονική εργασία άλλαξε απο __0 σε __1." // old parent id, new parent id
                           ,"saved" => "Αποθηκευμένες εργασίες #__0 (__1) at __2." // id, title, timestamp
                           ,"title" => "Μηνύματα"
                           ,"warn_deleted" => "<b>Προσοχή:</b> Η εργασία αυτή έχει ήδη διαγραφεί."
                           );

$language->misc = array("all_rights_reserved" => "all rights reserved."
                       ,"copyright" => "copyright"
                       ,"count_open" => "__0 ανοιχτές εργασίες" // number
                       ,"count_total" => "__0 εργασίες" // number
                       ,"hide_completed" => "Απόκρυψη ολοκληρωμένων εργασιών"
                       ,"jump_to" => "Μεταφορά στην..."
                       ,"quick_search" => "’μμεση εύρεση"
                       ,"show_completed" => "Εύρεση ολοκληρωμένων εργασιών"
                       ,"timer" => "Η εντολή επεξεργάστηκε σε __0 δευτερόλεπτα." // seconds
                       ,"version" => "έκδοση __0" // number
                       );

$language->picker = array("date_go" => "Go"
                         ,"date_key_selected" => "Επιλεγμένη ημερομηνία"
                         ,"date_key_today" => "Σημερινή ημερομηνία"
                         ,"date_next" => "Επόμενη"
                         ,"date_previous" => "Προηγούμενη"
                         ,"date_today" => "Σήμερα"
                         ,"days" => "'Κυρ','Δευ','Τρί','Τετ','Πέμ','Παρ','Σάβ'"
                         ,"months" => "'Ιανουάριος','Φεβρουάριος','Μάρτιος','Απρίλιος','Μάιος','Ιούνιος','Ιούλιος','Αύγουστος','Σεπτέμβριος','Οκτώβριος','Νοέμβριος','Δεκέμβριος'"
                         ,"parent_title" => "Επέλεξε γονική εργασία"
                         );

$language->resolve = array("append" => "Προσθήκη"
                          ,"current_version" => "Τελευταία έκδοση"
                          ,"form_title" => "Τα ακόλουθα πεδία έχουν αλλαγές"
                          ,"none" => "(κανένα)"
                          ,"save" => "Αποθήκευση"
                          ,"use" => "Χρήση"
                          ,"your_data" => "Τα δεδομένα σας"
                          );

$language->search = array("after" => "είναι μετά:"
                         ,"before" => "είναι πρίν:"
                         ,"exactly" => "είναι ακριβώς:"
                         ,"form_title" => "Κριτήρια εύρεσης"
                         ,"include_completed" => "Συμπερίληψη ολοκληρωμένων εργασιών"
                         ,"instructions" => "Εισάγετε λέξεις ή τμήματα λέξεων απο τις εργασίες /ή σημειώσεις για τις εργασίες που ψάχνετε. Εξ ορισμού, η εύρεση βρίκει μόνο τις εγγραφές που περιέχουν ολόκληρες τις πληροφορίες. Κλικ στο &quot;More Search Options&quot; για να δείτε περισσότερες επιλογές εύρεσης."
                         ,"less_than" => "είναι μικρότερο απο:"
                         ,"more_options" => "Περισσότερες επιλογές εύρεσης"
                         ,"more_than" => "περισσότερο απο:"
                         ,"results_title" => "Αποτελέσματα εύρεσης"
                         ,"search_button" => "Εύρεση"
                         );

$language->toolbar = array("b2_tip" => "Post to b2"
                          ,"date_time" => "Εισαγωγή τρέχουσας ημερομηνίας/ώρας"
                          ,"date_time_tip" => "Εισαγωγή τρέχουσας ημερομηνίας/ώρας στις σημειώσεις"
                          ,"delete" => "Διαγραφή"
                          ,"edit" => "Επεξεργασία"
                          ,"mark_complete" => "Ολοκλήρωση"
                          ,"mark_complete_m" => "100%"
                          ,"mt_tip" => "Αποστολή στον τύπο μεταφοράς"
                          ,"new_sub" => "Νέα υποεργασία"
                          ,"new_sub_m" => "Νέα υπο"
                          ,"save" => "<u>Α</u>ποθήκευση"
                          ,"save_alt" => "Αποθήκευση"
                          ,"save_as_new" => "Αποθήκευση ως νέα εργασία"
                          ,"wp_tip" => "Αποστολή στο WordPress"
                          );

$language->tree = array("due" => "Έως:"
                       ,"id" => "ID:"
                       ,"loading" => $language->messages["js_loading_text"] // no need to set this
                       ,"open_sub_task" => '1 ’νοιγμα υποεργασίας <span style="color: #666;">(__0 Total)</span>' // number
                       ,"open_sub_tasks" => '__0 ’νοιγμα υποεργασίας <span style="color: #666;">(__1 Total)</span>' // number, number
                       ,"status" => "__0% ολοκληρώθηκε" // number (0-100)
                       );

?>
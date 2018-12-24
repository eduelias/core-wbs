<?

// french

$language = new language;

$language->name = "Fran&ccedil;ais";
$language->author = "Simon Jacquier";
$language->author_email = "jacksim@mac.com";
$language->author_web = "http://homepage.mac.com/jacksim/";

$language->charset = "utf-8";

$language->about = array("tagline" => "organisez vos t&acirc;ches et r&eacute;alisez-les."
                        ,"documentation" => "Documentation"
                        ,"read_me" => "Lisez-moi"
                        ,"license" => "License"
                        ,"download" => "t&eacute;l&eacute;charger"
                        ,"this_version" => "Version install&eacute;e : __0"
                        ,"latest_version" => "Derni&egrave;re version disponible : __0"
                        ,"beta_version" => "Derni&egrave;re version b&ecirc;ta disponible : __0"
                        ,"using_latest" => "Vous utilisez la derni&egrave;re version disponible."
                        ,"using_beta" => "Vous utilisez la derni&egrave;re version b&ecirc;ta disponible"
                        ,"feedback" => "Commentaires et suggestions :"
                        ,"web" => "Web :"
                        ,"credits" => "Auteurs"
                        ,"main_credit" => "Con&ccedil;u et r&eacute;alis&eacute; par <nobr>Alex T. King</nobr>. Les personnes suivantes ont contribu&eacute; &agrave; la localisation :"
                        ,"web_site" => "site Internet"
                        ,"email" => "e-mail"
                        );

$language->accesskey = array("calendar" => "c"
                            ,"history" => "h"
                            ,"home" => "a"
                            ,"new_task" => "n"
                            ,"save" => "s"
                            ,"search" => "r"
                            ,"sortable" => "b"
                            ,"title" => "e"
                            ,"upcoming" => "u"
                            );

$language->breadcrumbs = array("history" => "Historique"
                              ,"home" => "Accueil"
                              ,"new_task" => "Nouvelle"
                              ,"search" => "Recherche"
                              ,"search_results" => "R&eacute;sultats de la recherche"
                              ,"sortable" => "Liste triable"
                              ,"upcoming" => "A venir"
                              );

$language->confirm = array("complete_instructions" => "La t&acirc;che que vous marquez comme termin&eacute;e a __0 sous-t&acirc;che(s) en cours. Que souhaitez-vous faire ?" // number
                          ,"complete_orphan" => "Marquer cette t&acirc;che comme termin&eacute;e et rendre ses sous-t&acirc;ches ind&eacute;pendantes"
                          ,"complete_notes" => "Entrez un commentaire pour la fermeture de la t&acirc;che :"
                          ,"complete_recursive" => "Marquer cette t&acirc;che est ses sous-t&acirc;ches comme termin&eacute;es"
                          ,"complete_remove" => "Marquer cette t&acirc;che comme termin&eacute;e et rattâcher ses sous-t&acirc;ches &agrave; sa t&acirc;che parente"
                          ,"complete_title" => "Options de fin de t&acirc;che"
                          ,"delete_confirm" => "Souhaitez-vous r&eacute;ellement supprimer cette t&acirc;che ?"
                          ,"delete_instructions" => "La t&acirc;ches &agrave; supprimer a __0 sous-t&acirc;che(s) en cours. Que souhaitez-vous faire ?" // number
                          ,"delete_orphan" => "Supprimer cette t&acirc;che et rendre ses sous-t&acirc;ches ind&eacute;pendantes"
                          ,"delete_recursive" => "Supprimer cette t&acirc;ches et ses sous-t&acirc;ches"
                          ,"delete_remove" => "Supprimer cette t&acirc;che et rattâcher ses sous-t&acirc;ches &agrave; sa t&acirc;che parente"
                          ,"delete_title" => "Options de suppression de t&acirc;che"
                          ,"delete_title_m" => "Suppression de la t&acirc;che"
                          );

$language->data = array("no" => "Non"
                       ,"priority_1" => "La plus basse"
                       ,"priority_2" => "Basse"
                       ,"priority_3" => "Normale"
                       ,"priority_4" => "Haute"
                       ,"priority_5" => "La plus haute"
                       ,"rel_date" => "__0" // date
                       ,"rel_date_days" => "Dans __0 jours" // number
                       ,"rel_date_days_ago" => "Il y a __0 jours" // number
                       ,"rel_date_today" => "Aujourd'hui"
                       ,"rel_date_tomorrow" => "Demain"
                       ,"rel_date_week" => "Dans 1 semaine"
                       ,"rel_date_week_ago" => "Il y a 1 semaine"
                       ,"rel_date_yesterday" => "Hier"
                       ,"yes" => "Oui"
                       );

$language->email_reminders = array("overdue" => "En retard"
                                  ,"due" => "Ech�ance"
                                  ,"upcoming" => "A venir"
                                  ,"high_priority" => "Priorit� haute"
                                  ,"status" => "Progression"
                                  ,"complete" => "% termin�e"
                                  ,"priority" => "Priorit�"
                                  ,"none" => "(aucune)"
                                  ,"subject" => "Rappel tasks"
                                  );

$language->form = array("1_week" => "1 semaine"
                       ,"1_year" => "1 an"
                       ,"30_days" => "30 jours"
                       ,"90_days" => "90 jours"
                       ,"after_save" => "Apr&egrave;s l'enregistrement :"
                       ,"choose_date" => "Choisir date"
                       ,"clear_date" => "Effacer"
                       ,"date_due" => "Ech&eacute;ance&nbsp;:"
                       ,"date_entered" => "Date de cr&eacute;ation&nbsp;:"
                       ,"date_modified" => "Derni&egrave;re modification&nbsp;:"
                       ,"form_title_edit" => "Modification de la t&acirc;che"
                       ,"form_title_new" => "Nouvelle t&acirc;che"
                       ,"id" => "ID&nbsp;:"
                       ,"new_task" => "Nouvelle t&acirc;che"
                       ,"notes" => "Notes&nbsp;:"
                       ,"parent" => "Parente&nbsp;:"
                       ,"priority" => "Priorit&eacute;&nbsp;:"
                       ,"return_home" => "Retour &agrave; l'accueil"
                       ,"status" => "Progression&nbsp;:"
                       ,"status_label" => "Progression"
                       ,"stay_here" => "Rester ici"
                       ,"sticky" => "Persistante"
                       ,"sticky_label" => "Persistante&nbsp;:"
                       ,"title" => "Titre&nbsp;:"
                       ,"today" => "Aujourd'hui"
                       ,"tomorrow" => "Demain"
                       ,"url" => "Lien&nbsp;:"
                       ,"urls" => "Liens&nbsp;:"
                       ,"url_1" => "Lien 1&nbsp;:"
                       ,"url_2" => "Lien 2&nbsp;:"
                       ,"url_3" => "Lien 3&nbsp;:"
                       ,"view_parent" => "Afficher la t&acirc;che parente"
                       ,"view_tree" => "Affiche la liste"
                       );

$language->home = array("sort_title" => "Trier par titre"
                       ,"sort_title_rev" => "Trier par titre (inverse)"
                       ,"sort_priority" => "Trier par priorit&eacute;"
                       ,"sort_priority_rev" => "Trier par priorit&eacute; (inverse)"
                       );

$language->icons = array("completed" => "T&acirc;che termin&eacute;e"
                        ,"delete" => "Supprimer"
                        ,"edit" => "Modifier"
                        ,"hide_show" => "Afficher/Masquer"
                        ,"hide_show_tip" => "Afficher/Masquer les d&eacute;tails"
                        ,"mark_complete" => "Marquer comme termin&eacute;e"
                        ,"new_sub_task" => "Ajouter une sous-t&acirc;che"
                        ,"notes_bigger" => "Agrandir le champ Notes"
                        ,"notes_smaller" => "R&eacute;duire le champ Notes"
                        ,"parent_picker" => "Choisir une t&acirc;che parente"
                        ,"priority" => "Priorit&eacute; : __0" // result of get_friendly_priority();
                        ,"sticky" => "T&acirc;che persistante"
                        ,"tree_toggle" => "Afficher/Masquer"
                        ,"tree_toggle_tip" => "Afficher/Masquer les sous-t&acirc;ches"
                        );

$language->list = array("banner" => "Affichage de __0 &eacute;l&eacute;ment(s)" // number
                       ,"date_due" => "Ech&eacute;ance"
                       ,"done" => "(termin&eacute;e)"
                       ,"id" => "ID"
                       ,"no_items" => "Aucune t&acirc;che &agrave; afficher."
                       ,"priority" => "Priorit&eacute;"
                       ,"status" => "Progression"
                       ,"title" => "Titre"
                       );

$language->list_titles = array("history" => "Derni&egrave;res 25 t&acirc;ches modifi&eacute;es"
                              ,"overdue" => "T&acirc;ches en retard"
                              ,"sortable" => "Liste triable"
                              ,"upcoming" => "T&acirc;ches &agrave; venir"
                              );

$language->menu = array("calendar" => "<u>C</u>alendrier"
                       ,"calendar_tip" => "Afficher les t&acirc;ches dans le calendrier et mettre &agrave; jour vos donn&eacute;es iCalendar."
                       ,"history" => "<u>H</u>istorique"
                       ,"history_tip" => "Afficher les 25 derni&egrave;res t&acirc;ches modifi&eacute;es."
                       ,"home" => "<u>A</u>ccueil"
                       ,"home_tip" => "Afficher l'accueil avec la liste des t&acirc;ches."
                       ,"new_task" => "<u>N</u>ouvelle"
                       ,"new_task_tip" => "Cr&eacute;er une nouvelle t&acirc;che."
                       ,"search" => "<u>R</u>echerche"
                       ,"search_tip" => "Chercher une t&acirc;che."
                       ,"sortable" => "Liste tria<u>b</u>le"
                       ,"sortable_tip" => "Afficher une liste des t&acirc;ches triable."
                       ,"upcoming" => "A <u>v</u>enir"
                       ,"upcoming_tip" => "Afficher les t&acirc;ches &agrave; venir ou en retard."
                       );

$language->messages = array("completed" => "La t&acirc;che &quot;__0&quot; (no __1) a &eacute;t&eacute; marqu&eacute;e comme termin&eacute;e." // title, id
                           ,"completed_reason" => "La t&acirc;che &quot;__0&quot; (no __1) a &eacute;t&eacute; marqu&eacute;e comme termin&eacute;e avec le commentaire suivant :<p style=\"padding-left: 15px;\">__2</p>" // title, id, reason
                           ,"completed_task_link" => "Afficher la t&acirc;che termin&eacute;e"
                           ,"completed_task_parent_link" => "Afficher la t&acirc;che parente de la t&acirc;che termin&eacute;e"
                           ,"complete_instructions" => "La t&acirc;che no __0 a __1 sous-t&acirc;che(s) (__2) en cours. Que souhaitez-vous faire ?" // id, number, number
                           ,"complete_orphan" => "La t&acirc;che &quot;__0&quot; (no __1) a &eacute;t&eacute; marqu&eacute;e comme termin&eacute;e et ses sous-t&acirc;ches ont &eacute;t&eacute; ratach&eacute;es &agrave; la t&acirc;che no __2." // title, id, new parent task id
                           ,"complete_orphan" => "La t&acirc;che &quot;__0&quot; (no __1) a &eacute;t&eacute; marqu&eacute;e comme termin&eacute;e et ses sous-t&acirc;ches ont &eacute;t&eacute; rendues ind&eacute;pendantes." // title, id
                           ,"complete_recursive" => "La t&acirc;che &quot;__0&quot; (no __1) et ses sous-t&acirc;ches ont &eacute;t&eacute; marqu&eacute;es comme termin&eacute;es." // title, id
                           ,"confirm_delete" => "Souhaitez-vous r&eacute;ellement supprimer la t&acirc;che __0 ?"
                           ,"deleted" => "La t&acirc;che &quot;__0&quot; (no __1) a &eacute;t&eacute; supprim&eacute;e." // title, id
                           ,"delete_instructions" => "La t&acirc;che no __0 a __1 sous-t&acirc;che(s) (__2) en cours. Que souhaitez-vous faire ?" // id, number, number
                           ,"delete_orphan" => "La t&acirc;che &quot;__0&quot; (no __1) a &eacute;t&eacute; supprim&eacute;e et ses sous-t&acirc;ches ont &eacute;t&eacute; rendues ind&eacute;pendantes." // title, id
                           ,"delete_recursive" => "La t&acirc;che &quot;__0&quot; (no __1) et ses sous-t&acirc;ches ont &eacute;t&eacute; supprim&eacute;es." // title, id
                           ,"delete_remove" => "La t&acirc;che &quot;__0&quot; (no __1) a &eacute;t&eacute; supprim&eacute;e et ses sous-t&acirc;ches ont &eacute;t&eacute; ratach&eacute;es &agrave; la t&acirc;che no __2" // title, id, new parent id
                           ,"err_conflict" => "<b>Erreur :</b> La t&acirc;che n'a pas &eacute;t&eacute; enregistr&eacute;e.<br>Cette t&acirc;che a &eacute;t&eacute; mise &agrave; jour par un autre utilisateur depuis que vous avez commenc&eacute; &agrave; la modifier. Veuillez examiner les diff&eacute;rences ci-dessous et enregistrer &agrave; nouveau. <p>La version de la t&acirc;che que vous avez modifi&eacute;e avait &eacute;t&eacute; enregistr&eacute;e pour la derni&egrave;re fois le __0&nbsp;;<br>la version actuellement dans la base de donn&eacute;es avait &eacute;t&eacute; enregistr&eacute;e pour la derni&egrave;re fois le __1"
                           ,"err_date_format" => "<b>Erreur :</b>Il y a une erreur pour la valeur de <b>\$custom->date_format</b> dans 'config.php'. Votre valeur, '__0', ne contient pas un ou plusieurs 'm', 'd' ou 'y'. Veuillez apporter les corrections n&eacute;cessaires dans 'config.php'." // date_format
                           ,"err_event_type" => "<b>Erreur :</b> Il y a une erreur pour la valeur de <b>\$custom->ical_export_type</b> dans 'config.php'. Votre valeur, '__0' n'est pas 'event' ou 'todo'. Veuillez apporter les corrections n&eacute;cessaires dans 'config.php'." // ical_export_type
                           ,"err_invalid_date" => "<b>Erreur :</b> La t&acirc;che n'a pas &eacute;t&eacute; enregistr&eacute;e car la date d'&eacute;ch&eacute;ance n'est pas valable. Corrigez la date ou supprimez-la, puis enregistrer la t&acirc;che &agrave; nouveau."
                           ,"err_invalid_parent" => "<b>Erreur :</b> La t&acirc;che d'ID __0 est indiqu&eacute;e comme parente, mais il n'existe aucune t&acirc;che avec cet ID. Veuillez rem&eacute;dier &agrave; ce probl&egrave;me et enregistrer la t&acirc;che &agrave; nouveau." // id
                           ,"err_loop" => "<b>Erreur :</b> Enregistrer la t&acirc;che avec la t&acirc;che parente pr&eacute;cis&eacute;e cr&eacute;erait une boucle infinie."
                           ,"err_no_root" => "Erreur : Aucune racine ou t&acirc;che de base n'est d&eacute;finie."
                           ,"err_own_parent" => "<b>Erreur :</b> Une t&acirc;che ne peut pas &ecirc;tre sa propre parente."
                           ,"err_search_date_after" => "<b>Erreur :</b> Cette recherche ne retournera aucun r&eacute;sultat car la valeur du champ 'Ech&eacute;ance est apr&egrave;s le :' n'est pas valable. Corrigez-la et relancez la recherche."
                           ,"err_search_date_before" => "<b>Erreur :</b> Cette recherche ne retournera aucun r&eacute;sultat car la valeur du champ 'Ech&eacute;ance est avant le :' n'est pas valable. Corrigez-la et relancez la recherche."
                           ,"err_search_date_exact" => "<b>Erreur :</b> Cette recherche ne retournera aucun r&eacute;sultat car la valeur du champ 'Ech&eacute;ance est :' n'est pas valable. Corrigez-la et relancez la recherche."
                           ,"js_abandon_changes" => "Souhaitez-vous r&eacute;ellement quitter\\nl'écran sans enregistrer les modifications ?"
                           ,"js_complete_confirm" => "Souhaitez-vous r&eacute;ellement fermer\\ncette tâche sans entrer de commentaires ?"
                           ,"js_complete_prompt" => "Entrez un commentaire pour la fermeture de la tâche :"
                           ,"js_err_edit_date" => "La date d'échéance n'est pas valable.\\nModifiez-la avant d'enregistrer."
                           ,"js_err_search_date_after" => "La valeur du champ 'Echéance est après le :' n'est pas une date valable."
                           ,"js_err_search_date_before" => "La valeur du champ 'Echéance est avant le :' n'est pas une date valable."
                           ,"js_err_search_date_exact" => "La valeur du champ 'Echéance est :' n'est pas une date valable."
                           ,"js_err_search_date_range" => "La date 'Echéance est après le :' doit être anterieure à la date 'Echeance est avant le :'."
                           ,"js_err_search_errors" => "Attention - Les problèmes suivants doivent être\\ncorrigés avant que la recherche\\nne puisse s'effectuer : \\n"
                           ,"js_err_search_id_invalid" => "Le champ 'ID' doit être vide ou d'une valeur numérique supérieure à 0."
                           ,"js_err_search_parent_invalid" => "Le champ 'Parente' doit être vide ou d'une valeur numérique supérieure à 0."
                           ,"js_err_search_status_exact" => "Le champ 'Progression est :' doit être vide ou d'une valeur numérique supérieure à 0."
                           ,"js_err_search_status_less" => "Le champ 'Progression est inferieure à :' doit être vide ou d'une valeur numérique comprise entre 0 et 100."
                           ,"js_err_search_status_more" => "Le champ 'Progression est supérieure à :' doit être vide ou d'une valeur numérique comprise entre 0 et 100."
                           ,"js_err_search_status_range" => "La valeur du champ 'Progression est inférieure à :' doit être superieure à celle du champ 'Progression est supérieure à :'."
                           ,"js_loading_text" => "Chargement..."
                           ,"js_nothing_to_save" => "Il n'a rien à enregistrer sur cette écran."
                           ,"js_parent_required" => "Vous devez préciser une tâche parente pour\\nvoir la parente après l'enregistrement."
                           ,"mail_sent" => "Les rappels quotidiens ont &eacute;t&eacute; envoy&eacute;s par e-mail."
                           ,"mobile_resolve_instructions" => "Les données entrées seront affichées au-dessous de la version actuelle. Effectuez les changements nécessaires, puis cliquer sur 'Enregistrer'."
                           ,"no_email" => "Veuillez entrer une adresse e-mail dans le fichier config.php."
                           ,"parent_changed" => "La t&acirc;che parente &agrave; &eacute;t&eacute; chang&eacute;e de la t&acirc;che __0 &agrave; la t&acirc;che __1." // old parent id, new parent id
                           ,"saved" => "La t&acirc;che no __0 (__1) a &eacute;t&eacute; enregistr&eacute;e le __2." // id, title, timestamp
                           ,"title" => "Messages"
                           ,"warn_deleted" => "<b>Attention :</b> Cette t&acirc;che est d&eacute;j&agrave; supprim&eacute;e."
                           );

$language->misc = array("all_rights_reserved" => "tous droits r&eacute;serv&eacute;s."
                       ,"copyright" => "copyright"
                       ,"count_open" => "__0 en cours" // number
                       ,"count_total" => "__0 t&acirc;ches" // number
                       ,"hide_completed" => "Masquer les t&acirc;ches termin&eacute;es"
                       ,"jump_to" => "Aller &agrave;..."
                       ,"quick_search" => "Recherche"
                       ,"show_completed" => "Afficher les t&acirc;ches termin&eacute;es"
                       ,"timer" => "page g&eacute;n&eacute;r&eacute;e en __0 secondes." // seconds
                       ,"version" => "version __0"
                       );

$language->picker = array("date_go" => "Aller"
                         ,"date_key_selected" => "Date s&eacute;lectionn&eacute;e"
                         ,"date_key_today" => "Date du jour"
                         ,"date_next" => "Suivant"
                         ,"date_previous" => "Pr&eacute;c&eacute;dent"
                         ,"date_today" => "Aujourd'hui"
                         ,"days" => "'Dim','Lun','Mar','Mer','Jeu','Ven','Sam'"
                         ,"months" => "'Janvier','F&eacute;vrier','Mars','Avril','Mai','Juin','Juillet','Ao&ucirc;t','Septembre','Octobre','Novembre','D&eacute;cembre'"
                         ,"parent_title" => "Choisissez d'une t&acirc;che parente"
                         );

$language->resolve = array("append" => "Ajouter"
                          ,"current_version" => "Version actuelle"
                          ,"form_title" => "Les champs ci-dessous pr&eacute;sentent des diff&eacute;rences"
                          ,"none" => "(aucun)"
                          ,"save" => "Enregistrer"
                          ,"use" => "Choisir"
                          ,"your_data" => "Vos donn&eacute;es"
                          );

$language->search = array("after" => "est apr&egrave;s le&nbsp;:"
                         ,"before" => "est avant le&nbsp;:"
                         ,"exactly" => "est&nbsp;:"
                         ,"form_title" => "Crit&egrave;res de recherche"
                         ,"include_completed" => "Inclure les t&acirc;ches termin&eacute;es"
                         ,"instructions" => "Entrez des mots ou une cha&icirc;ne de caract&egrave;res que vous d&eacute;sirez rechercher dans le titre et/ou la note des t&acirc;ches. Par d&eacute;faut, seuls les &eacute;l&eacute;ments contenant tous les crit&egrave;res de recherche sont affich&eacute;s. Cliquez sur \"Recherche avanc&eacute;e\" pour plus d'options."
                         ,"less_than" => "inf&eacute;rieure &agrave;&nbsp;:"
                         ,"more_options" => "Recherche avanc&eacute;e"
                         ,"more_than" => "sup&eacute;rieure &agrave;&nbsp;:"
                         ,"results_title" => "R&eacute;sultats de la recherche"
                         ,"search_button" => "Rechercher"
                         );

$language->toolbar = array("b2_tip" => "Poster sur b2"
                          ,"date_time" => "Ins&eacute;rer date/heure"
                          ,"date_time_tip" => "Ins&eacute;rer la date actuelle dans le champ Notes"
                          ,"delete" => "Supprimer"
                          ,"edit" => "Editer"
                          ,"mark_complete" => "Marquer comme termin&eacute;e"
                          ,"mark_complete_m" => "100%"
                          ,"mt_tip" => "Poster sur Moveable Type"
                          ,"new_sub" => "Nouvelle sous-t&acirc;che"
                          ,"new_sub_m" => "Nlle. sous-t&acirc;che"
                          ,"save" => "Enregi<u>s</u>trer"
                          ,"save_alt" => "Enregistrer"
                          ,"save_as_new" => "Enregistrer comme nouvelle t&acirc;che"
                          ,"wp_tip" => "Poster sur WordPress"
                          );

$language->tree = array("due" => "Ech&eacute;ance&nbsp;:"
                       ,"id" => "ID&nbsp;:"
                       ,"loading" => $language->messages["js_loading_text"]
                       ,"open_sub_task" => "1 sous-t&acirc;che ouverte <span style=\"color: #666;\">(__0 au total)</span>" // number
                       ,"open_sub_tasks" => "__0 sous-t&acirc;ches ouvertes <span style=\"color: #666;\">(__1 au total)</span>" // number, number
                       ,"status" => "__0% termin&eacute;e" // number (0-100)
                       );

?>
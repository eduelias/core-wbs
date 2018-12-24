<?

// japanese
// translated by Toshiro Yagi <yagi@lovemorgue.org>
// special thanks to Toshiro Kanda

$language = new language;

$language->name = "Japanese (Shift_JIS)";
$language->author = "Toshiro Yagi";
$language->author_email = "yagi@lovemorgue.org";
$language->author_web = "http://lovemorgue.org/";

$language->charset = "Shift_JIS";

$language->font_size = "12px";

$language->about = array("tagline" => "�������ڂ��Ďd����Еt���悤"
                        ,"documentation" => "�}�j���A��"
                        ,"read_me" => "���ǂ݂�������"
                        ,"license" => "���C�Z���X"
                        ,"download" => "�_�E�����[�h"
                        ,"this_version" => "���݂̃o�[�W�����F __0"
                        ,"latest_version" => "�ŐV�o�[�W�����F __0"
                        ,"beta_version" => "�ŐV���� __0"
                        ,"using_latest" => "���ݍŐV�̃����[�X�ł������p���ł��B"
                        ,"using_beta" => "���ݍŐV�̃��ł������p���ł��B"
                        ,"feedback" => "���ӌ��A����āF"
                        ,"web" => "�E�F�u�T�C�g�F"
                        ,"credits" => "�N���W�b�g"
                        ,"main_credit" => "Tasks Jr. �� <nobr>Alex King</nobr> �ɂ��l�āA�쐬����܂����B���L�̕��X�̐ɂ��݂Ȃ����s�͂����������A�ȉ��̌���Ƀ��[�J���C�Y����Ă��܂��F"
                        ,"web_site" => "web site"
                        ,"email" => "e-mail"
                        );

$language->accesskey = array("calendar" => "�J"
                            ,"history" => "��"
                            ,"home" => "�z"
                            ,"new_task" => "�V"
                            ,"save" => "��"
                            ,"search" => "��"
                            ,"sortable" => "��"
                            ,"title" => "��"
                            ,"upcoming" => "��"
                            );

$language->breadcrumbs = array("history" => "����"
                              ,"home" => "�z�[��"
                              ,"new_task" => "�V�K�^�X�N"
                              ,"search" => "����"
                              ,"search_results" => "��������"
                              ,"sortable" => "���ޕʃ^�X�N���X�g"
                              ,"upcoming" => "�����̋߂��^�X�N"
                              );

$language->confirm = array("complete_instructions" => "�����ςƃ}�[�N���ꂽ�^�X�N�ɂ� __0 �̃T�u�^�X�N������܂��B�ǂ̂悤�ɏ������邩�I�����Ă��������F" // number
                          ,"complete_orphan" => "���̃^�X�N�Ɋ����ςƃ}�[�N���A�T�u�^�X�N�͐e�^�X�N�Ȃ��Ƃ���"
						  ,"complete_notes" => "���̃^�X�N�̊����R�����g����́F"
                          ,"complete_recursive" => "���̃^�X�N�ƃT�u�^�X�N�����Ɋ����ςƃ}�[�N����"
                          ,"complete_remove" => "���̃^�X�N�Ɋ����ςƃ}�[�N���A�T�u�^�X�N�͐e�^�X�N�Ɉړ�������"
                          ,"complete_title" => "�^�X�N�����̃I�v�V����"
						  ,"delete_confirm" => "�{���ɂ��̃^�X�N���폜���܂����H"
                          ,"delete_instructions" => "�폜�����^�X�N�ɂ� __0 �̃T�u�^�X�N������܂��B�ǂ̂悤�ɏ������邩�I�����Ă��������F" // number
                          ,"delete_orphan" => "���̃^�X�N�Ɋ����ƃ}�[�N���A�T�u�^�X�N�͐e�^�X�N�Ȃ��Ƃ���"
                          ,"delete_recursive" => "���̃^�X�N�ƃT�u�^�X�N�������폜����"
                          ,"delete_remove" => "���̃^�X�N���폜���A�T�u�^�X�N�͐e�^�X�N�Ɉړ�������"
                          ,"delete_title" => "�^�X�N�폜�̃I�v�V����"
						  ,"delete_title_m" => "�^�N�X�폜"
                          );

$language->data = array("no" => "������"
                       ,"priority_1" => "��"
                       ,"priority_2" => "����"
                       ,"priority_3" => "��"
                       ,"priority_4" => "��"
                       ,"priority_5" => "�d�v"
                       ,"rel_date" => "__0" // date
                       ,"rel_date_days" => "__0 ��" // number
                       ,"rel_date_days_ago" => "__0 ���O" // number
                       ,"rel_date_today" => "�{��"
                       ,"rel_date_tomorrow" => "����"
                       ,"rel_date_week" => "��T�Ԍ�"
                       ,"rel_date_week_ago" => "��T�ԑO"
                       ,"rel_date_yesterday" => "���"
                       ,"yes" => "�͂�"
                       );

$language->email_reminders = array("overdue" => "�x��"
                                  ,"due" => "����"
                                  ,"upcoming" => "����"
                                  ,"high_priority" => "�D��"
                                  ,"status" => "��"
                                  ,"complete" => "% ��"
                                  ,"priority" => "�D��x"
                                  ,"none" => "�i�Ȃ��j"
                                  ,"subject" => "tasks ����̂��m�点"
                                  );

$language->form = array("1_week" => "��T�Ԍ�"
                       ,"1_year" => "��N��"
                       ,"30_days" => "�R�O����"
                       ,"90_days" => "�X�O����"
                       ,"after_save" => "�ۑ���́F"
                       ,"choose_date" => "���t��I��"
                       ,"clear_date" => "���"
                       ,"date_due" => "�����F"
                       ,"date_entered" => "�L�����F"
                       ,"date_modified" => "�ŏI�X�V�F"
                       ,"form_title_edit" => "�^�X�N�̕ҏW"
                       ,"form_title_new" => "�V�K�^�X�N"
                       ,"id" => "ID:"
                       ,"notes" => "�����F"
                       ,"parent" => "�e�^�X�N�F"
                       ,"priority" => "�D��x�F"
                       ,"return_home" => "�z�[���ɖ߂�"
                       ,"status" => "�i���x�F"
                       ,"status_label" => "�i���x�i���j"
                       ,"stay_here" => "���̉�ʂ��J��"
                       ,"sticky" => "�d�v�^�X�N"
                       ,"sticky_label" => "�d�v�^�X�N�F"
                       ,"title" => "�����F"
                       ,"today" => "�{��"
                       ,"tomorrow" => "����"
                       ,"url" => "URL:"
                       ,"urls" => "URLs:"
                       ,"url_1" => "URL 1:"
                       ,"url_2" => "URL 2:"
                       ,"url_3" => "URL 3:"
                       ,"view_parent" => "�e�^�X�N��\��"
                       ,"view_tree" => "�c���[��\��"
					   ,"new_task" => "�V�K�^�X�N"
                       );
					   
$language->home = array("sort_title" => "�����ŕ���"
                       ,"sort_title_rev" => "�������t���ŕ���"
                       ,"sort_priority" => "�D��x�ŕ���"
                       ,"sort_priority_rev" => "�D��x���t���ŕ���"
                       );
					   
$language->icons = array("completed" => "���������^�X�N"
                        ,"delete" => "�폜"
                        ,"edit" => "�ҏW"
                        ,"hide_show" => "��\���^�\��"
                        ,"hide_show_tip" => "���̃^�X�N�̏ڂ������̕\���^��\��"
                        ,"mark_complete" => "�����ςƃ}�[�N����"
                        ,"new_sub_task" => "�V�K�T�u�^�X�N"
                        ,"notes_bigger" => "���������g��\��"
                        ,"notes_smaller" => "���������k���\��"
                        ,"parent_picker" => "�e�^�X�N��I��"
                        ,"priority" => "�D��x�F __0" // result of get_friendly_priority();
                        ,"sticky" => "�d�v�^�X�N"
                        ,"tree_toggle" => "��\���^�\��"
                        ,"tree_toggle_tip" => "�T�u�^�X�N�̕\���^��\��"
                        );

$language->list = array("banner" => "__0 �̃^�X�N��\��" // number
                       ,"date_due" => "����"
                       ,"done" => "�i�ρj"
                       ,"id" => "ID"
                       ,"no_items" => "�\������A�C�e���͂���܂���"
                       ,"priority" => "�D��x"
                       ,"status" => "�i���x"
                       ,"title" => "����"
                       );

$language->list_titles = array("history" => "�ŋߍX�V���ꂽ�Q�T�̃^�X�N"
                              ,"overdue" => "�������߂����^�X�N"
                              ,"sortable" => "���ޕʃ^�X�N���X�g"
                              ,"upcoming" => "�����̋߂��^�X�N"
                              );

$language->menu = array("calendar" => "<u>�J</u>�����_�["
                       ,"calendar_tip" => "�^�X�N�̃J�����_�[��\������iCalender�̓��t���A�b�v�f�[�g����ɂ͂�������N���b�N"
                       ,"history" => "<u>��</u>��"
                       ,"history_tip" => "�ŋߍX�V���ꂽ�Q�T�̃^�X�N��\������ɂ͂�������N���b�N"
                       ,"home" => "<u>�z</u>�[��"
                       ,"home_tip" => "�S�Ẵ��[�g�^�X�N��\������z�[����ʂ�\������ɂ͂�������N���b�N"
                       ,"new_task" => "<u>�V</u>�K�^�X�N"
                       ,"new_task_tip" => "�V�K�^�X�N���쐬����ɂ͂�������N���b�N"
                       ,"search" => "<u>��</u>��"
                       ,"search_tip" => "�^�X�N����������ɂ͂�������N���b�N"
                       ,"sortable" => "<u>��</u>�ޕ�"
                       ,"sortable_tip" => "���ޕʃ^�X�N���X�g��\��������ɂ͂�������N���b�N"
                       ,"upcoming" => "<u>��</u>�߃^�X�N"
                       ,"upcoming_tip" => "�����̋߂��^�X�N�Ɗ������߂����^�X�N��\������ɂ͂�������N���b�N"
                       );

$language->messages = array("completed" => "�^�X�N &quot;__0&quot; (#__1) �͊����ςƃ}�[�N����܂����B" // title, id
                           ,"completed_reason" => '�^�X�N &quot;__0&quot; (#__1) �͈ȉ��̗��R�Ŋ����ςƃ}�[�N����܂����F<p style="padding-left: 15px;">__2</p>' // title, id, reason
                           ,"completed_task_link" => "�����σ^�X�N��\��"
                           ,"completed_task_parent_link" => "�����σ^�X�N�̐e�^�X�N��\��"
                           ,"complete_instructions" => "�^�X�N #__0 �ɂ� __1 �̃T�u�^�X�N������A���̂��� (__2) ���i�s���ƂȂ��Ă��܂��B�ǂ̂悤�Ɋ����ςƂ��邩�I�����Ă��������B" // id, number, number
                           ,"complete_orphan" => "�^�X�N &quot;__0&quot; (#__1) �͊����ςƃ}�[�N����A���̉��̑S�Ẵ^�X�N�̓^�X�N #__2 �̉��Ɉړ����܂����B" // title, id, new parent task id
                           ,"complete_orphan" => "�^�X�N &quot;__0&quot; (#__1) �͊����ςƃ}�[�N����A�S�ẴT�u�^�X�N�͐e�^�X�N��ID���폜����܂����B" // title, id
                           ,"complete_recursive" => "�^�X�N &quot;__0&quot; (#__1) �Ƃ��̉��̑S�Ẵ^�X�N�������ςƃ}�[�N����܂����B" // title, id
                           ,"confirm_delete" => "�^�X�N�F __0 ���폜���܂����H"
                           ,"deleted" => "�^�X�N &quot;__0&quot; (#__1) �͍폜����܂����B" // title, id
                           ,"delete_instructions" => "�^�X�N #__0 �ɂ� __1 �̃T�u�^�X�N������A���̂��� (__2) ���i�s���ƂȂ��Ă��܂��B�ǂ̂悤�ɍ폜���邩�I�����Ă��������B" // id, number, number
                           ,"delete_orphan" => "�^�X�N &quot;__0&quot; (#__1) �͍폜����A���̉��̑S�Ẵ^�X�N�͐e�^�X�N��ID���폜����܂����B" // title, id
                           ,"delete_recursive" => "�^�X�N &quot;__0&quot; (#__1) �Ƃ��̉��̑S�Ẵ^�X�N���폜����܂����B" // title, id
                           ,"delete_remove" => "�^�X�N &quot;__0&quot; (#__1) �͍폜����A���̉��̑S�Ẵ^�X�N�̓^�X�N #__2 �̉��Ɉړ����܂����B" // title, id, new parent id
                           ,"err_conflict" => "<b>�G���[�F</b> ���̃^�X�N�͕ۑ�����܂���B<br>���̃^�X�N�͂��Ȃ����ҏW���J�n���Ă����ɑ��̃��[�U�[�ɂ��A�b�v�f�[�g����Ă��܂��B���ɕ\�����ꂽ�������������Ă�����x�ۑ����Ă��������B<p>���Ȃ����ύX�������̃^�X�N�̃o�[�W�����̍ŏI�X�V�� __0 �ł��B<br>�f�[�^�x�[�X�ɕۑ����ꂽ���o�[�W������ __1 �ɂȂ��Ă��܂��B"
						   ,"err_date_format" => "<b>�G���[�F</b> 'config.php' �� <b>\$custom->date_format</b> �Ɍ�肪����܂��B�ݒ肳�ꂽ�l�F '__0' �ɂ͂��ꂼ���ȏ�K�v�� 'm', 'd', 'y' ������܂���B'config.php' ���C�����Ă��������B" // date_format
						   ,"err_event_type" => "<b>Error:</b> 'config.php' �� <b>\$custom->ical_export_type</b> �Ɍ�肪����܂��B�ݒ肳�ꂽ�l�F '__0' �� 'event' �� 'todo' �ł͂���܂���B'config.php' ���C�����Ă��������B" // ical_export_type
                           ,"err_invalid_date" => "<b>�G���[�F</b> ���̃^�X�N�͕ۑ�����܂���B�w�肳�ꂽ���t�Ɍ�肪����܂��B�������C�����邩�������Ă��������x�^�X�N��ۑ����Ă��������B"
                           ,"err_invalid_parent" => "<b>�G���[�F</b> �^�X�N #__0 ���e�^�X�N�Ǝw�肳��܂������A����ID�̃^�X�N�͂���܂���B���̖����C�����Ă�����x�ۑ����Ă��������B" // id
                           ,"err_loop" => "<b>�G���[�F</b> ���̃^�X�N���w�肳�ꂽ�e�^�X�N�ŕۑ�����Ɩ������[�v�ɂȂ�܂��B"
                           ,"err_no_root" => "�G���[�F���[�g�̎w�肪����܂���B"
                           ,"err_own_parent" => "<b>�G���[�F</b> ���̃^�X�N���g��e�^�X�N�ɂ��邱�Ƃ͂ł��܂���B"
                           ,"err_search_date_after" => "<b>�G���[�F</b> ���̌��������ł̓^�X�N�������邱�Ƃ͂ł��܂���B�u����������ȍ~�F�v���Ŏw�肳�ꂽ�l�Ɍ�肪����܂��B�������C�����邩�������Ă��������x�������Ă݂Ă��������B"
                           ,"err_search_date_before" => "<b>�G���[�F</b> ���̌��������ł̓^�X�N�������邱�Ƃ͂ł��܂���B�u����������ȑO�F�v���Ŏw�肳�ꂽ�l�Ɍ�肪����܂��B�������C�����邩�������Ă��������x�������Ă݂Ă��������B"
                           ,"err_search_date_exact" => "<b>�G���[�F</b> ���̌��������ł̓^�X�N�������邱�Ƃ͂ł��܂���B�u�����F�v���Ŏw�肳�ꂽ�l�Ɍ�肪����܂��B�������C�����邩�������Ă��������x�������Ă݂Ă��������B"
                           ,"js_abandon_changes" => "�ύX��ۑ����Ȃ��܂܂ɂ��Ă����܂����H"
                           ,"js_complete_confirm" => "�{���ɂ��̃^�X�N��\\n�I���̃R�����g�Ȃ���\\n�N���[�Y���܂����H"
                           ,"js_complete_prompt" => "�I���̃R�����g���L��"
                           ,"js_err_edit_date" => "�������ɋL�����ꂽ���݂̒l�͐��������t�ł͂���܂���B\\n�ۑ�����O�ɂ��̒l���C�����邩�������Ă��������B"
                           ,"js_err_search_date_after" => "�u�i�����j������ȍ~�F�v���̒l�����������t�ł͂���܂���B"
                           ,"js_err_search_date_before" => "�u�i�����j������ȑO�F�v���̒l�����������t�ł͂���܂���B"
                           ,"js_err_search_date_exact" => "�u�i�����j�����傤�ǁF�v���̒l�����������t�ł͂���܂���B"
                           ,"js_err_search_date_range" => "�u�i�����j������ȍ~�F�v���̓��t�́u�i�����j������ȑO�F�v���̓��t���O�łȂ���΂����܂���B"
                           ,"js_err_search_errors" => "���� - �������ʂ�\��������O��\\n�ȉ��̖����C�����Ă��������F\\n"
                           ,"js_err_search_id_invalid" => "�uID�v���͋󗓂ɂ��邩�A�O���傫���������L�����Ă��������B"
                           ,"js_err_search_parent_invalid" => "�u�e�^�X�N�v���͋󗓂ɂ��邩�A�O���傫���������L�����Ă��������B"
                           ,"js_err_search_status_exact" => "�u�i�i���x�j�����傤�ǁF�v���ɂ͂O����P�O�O�܂ł̐������L�����Ă��������B"
                           ,"js_err_search_status_less" => "�u�i�i���x�j������ȉ��F�v���ɂ͂O����P�O�O�܂ł̐������L�����Ă��������B"
                           ,"js_err_search_status_more" => "�u�i�i���x�j������ȏ�F�v���ɂ͂O����P�O�O�܂ł̐������L�����Ă��������B"
                           ,"js_err_search_status_range" => "�u�i�i���x�j������ȉ��F�v���́u�i�i���x�j������ȏ�v�����傫�������łȂ���΂����܂���B"
                           ,"js_loading_text" => "���[�h��..."
                           ,"js_nothing_to_save" => "�\���󂠂�܂���B���̉�ʂł͕ۑ��������̂͂���܂���B"
                           ,"js_parent_required" => "�ۑ���ɐe�^�X�N��\�����邽�߂ɂ�\\n�e�^�X�N���w�肵�Ă��������B"
                           ,"mail_sent" => "�������s�̂��m�点�����[���ő��M���܂��B"
						   ,"mobile_resolve_instructions" => "���͂��ꂽ�f�[�^�͌��݃f�[�^�x�[�X���ɂ���o�[�W�����̉��ɑ}������܂����B�ύX�̕K�v������ΕύX���A'�ۑ�'���N���b�N���Ă��������B"
                           ,"no_email" => "config.php�ɂ��Ȃ��̃��[���A�h���X���L�����Ă��������B"
                           ,"parent_changed" => "�e�^�X�N�� __0 ���� __1 �ɕύX����܂����B" // old parent id, new parent id
                           ,"saved" => "__2<BR>�^�X�N #__0 ��ۑ����܂����B" // id, title, timestamp
                           ,"title" => "���b�Z�[�W"
                           ,"warn_deleted" => "<b>���ӁF</b> ���̃^�X�N�͂��łɍ폜����Ă��܂��B"
                           );

$language->misc = array("all_rights_reserved" => "all rights reserved."
                       ,"copyright" => "copyright"
                       ,"count_open" => "�i�s���F__0" // number
                       ,"count_total" => "�^�X�N���F__0" // number
                       ,"hide_completed" => "�����ς̃^�X�N���B��"
                       ,"jump_to" => "�ړ�����..."
                       ,"show_completed" => "�����ς̃^�X�N��\��"
                       ,"timer" => "�y�[�W�̍쐬���ԁF __0 �b" // seconds
                       ,"version" => "�o�[�W���� __0"
					   ,"quick_search" => "�N�C�b�N�T�[�`"
                       );

$language->picker = array("date_go" => "�ړ�"
                         ,"date_key_selected" => "�I�����ꂽ���t"
                         ,"date_key_today" => "�����̓��t"
                         ,"date_next" => "��"
                         ,"date_previous" => "�O"
                         ,"date_today" => "�{��"
                         ,"days" => "'��','��','��','��','��','��','�y'"
                         ,"months" => "'1��','2��','3��','4��','5��','6��','7��','8��','9��','10��','11��','12��'"
                         ,"parent_title" => "�e�^�X�N��I��"
                         );

$language->resolve = array("append" => "�ǉ�"
                          ,"current_version" => "���o�[�W����"
                          ,"form_title" => "�ȉ��̗��ɕύX������܂�"
                          ,"none" => "�i�Ȃ��j"
                          ,"save" => "�ۑ�"
                          ,"use" => "���p"
                          ,"your_data" => "���Ȃ��̃f�[�^"
                          );

$language->search = array("after" => "������ȍ~�F"
                         ,"before" => "������ȑO�F"
                         ,"exactly" => "�����傤�ǁF"
                         ,"form_title" => "���������̎w��"
                         ,"include_completed" => "�����ς̃^�X�N������"
                         ,"instructions" => "��������^�X�N�̌����Ɓ^�܂��̓����Ɋ܂܂��P���P��̈ꕔ����͂��Ă��������B�f�t�H���g�ł͓��͂��ꂽ�P���S�Ċ܂ނ��̂������������܂��B���̑��̌���������\������ɂ́u�ڂ������������v���N���b�N���Ă��������B"
                         ,"less_than" => "������ȉ��F"
                         ,"more_options" => "�ڂ�����������"
                         ,"more_than" => "������ȏ�F"
                         ,"results_title" => "��������"
                         ,"search_button" => "����"
                         );

$language->toolbar = array("b2_tip" => "b2 �iweblog�j�ɓ��e����"
                          ,"date_time" => "���t�Ǝ�����}��"
                          ,"date_time_tip" => "�������Ɍ��ݎ����Ɠ��t��}��"
                          ,"delete" => "�폜"
						  ,"edit" => "�ҏW"
						  ,"mark_complete" => "�����ƃ}�[�N����"
						  ,"mark_complete_m" => "100%"
                          ,"new_sub" => "�V�K�T�u�^�X�N"
                          ,"save" => "<u>��</u>��"
                          ,"save_alt" => "�ۑ�"
                          ,"save_as_new" => "�V�K�^�X�N�Ƃ��ĕۑ�"
                          ,"mt_tip" => "Moveable Type �iweblog�j�ɓ��e����"
						  ,"new_sub" => "�V�K�T�u�^�X�N"
						  ,"new_sub_m" => "�V�K�T�u"
                          ,"wp_tip" => "WordPress �iweblog�j�ɓ��e����"
                          );

$language->tree = array("due" => "�����F"
                       ,"id" => "ID�F"
                       ,"loading" => "���[�h��..."
                       ,"open_sub_task" => '�i�s���̃T�u�^�X�N�F�P <span style="color: #666;">�i�S __0 ���j</span>' // number
                       ,"open_sub_tasks" => '�i�s���̃T�u�^�X�N�F__0 <span style="color: #666;">�i�S __1 ���j</span>' // number, number
                       ,"status" => "__0% ������" // number (0-100)
                       );
		       
$language->cellular = array("open_sub_task" => "�i�s���̃T�u�^�X�N�F"
                           ,"open_sub_tasks" => "�i�s���̃T�u�^�X�N�F"
			   ,"total" => "�����F"
			   ,"save" => "�ۑ�"
			   ,"and" => "����"
			   ,"mb_language" => "japanese"
			   ,"to_encoding" => "SJIS"
			   ,"from_encoding" => "UTF8"
			   );

?>
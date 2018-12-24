<?

// korean

$language = new language;

$language->name = "Korean";
$language->author = "TaeYoung Oh";
$language->author_email = "spier@hybird.net";
$language->author_web = "http://spier.hybird.net/";

$language->charset = "utf-8";
$language->font_size = "11px";

$language->about = array("tagline" => "keep stuff organized and get it done."
                        ,"documentation" => "문서"
                        ,"read_me" => "읽어보기"
                        ,"license" => "이용약관"
                        ,"download" => "다운로드"
                        ,"this_version" => "설치된 버젼: __0"
                        ,"latest_version" => "최신 릴리즈 버젼: __0"
                        ,"beta_version" => "최신 베타 버젼: __0"
                        ,"using_latest" => "가장 최근에 릴리즈된 버젼을 사용중입니다."
                        ,"using_beta" => "가장 최근에 발표된 베타 버젼을 사용중입니다."
                        ,"feedback" => "사용자 의견 및 제안:"
                        ,"web" => "웹:"
                        ,"credits" => "도움주신 분들"
                        ,"main_credit" => "Tasks Jr.는 <nobr>Alex King</nobr>에 의해 구상되고 제작되었습니다. 아래 도움을 주신 분들 덕분에 여러 언어로 번역되었습니다.:"
                        ,"web_site" => "웹 사이트"
                        ,"email" => "이메일"
                        );

$language->accesskey = array("calendar" => "c"
                            ,"history" => "r"
                            ,"home" => "h"
                            ,"new_task" => "t"
                            ,"save" => "s"
                            ,"search" => "a"
                            ,"sortable" => "b"
                            ,"title" => "e"
                            ,"upcoming" => "u"
                            );

$language->breadcrumbs = array("history" => "변경사항"
                              ,"home" => "홈"
                              ,"new_task" => "신규작업"
                              ,"search" => "검색"
                              ,"search_results" => "검색결과"
                              ,"sortable" => "작업정렬"
                              ,"upcoming" => "향후작업"
                              );

$language->confirm = array("complete_instructions" => "완료로 설정한 작업에는  __0 개의 열린 하위작업들이 존재합니다. 어떻게 처리할 것인지 선택하세요:" // number
                          ,"complete_orphan" => "이 작업을 완료상태로 지정하고 하위 작업들은 상위 작업이 없도록 설정합니다."
                          ,"complete_notes" => "작업을 종료하기 전에 메모를 입력하세요.:"
                          ,"complete_recursive" => "이 작업과 그 하위작업을 완료상태로 설정합니다."
                          ,"complete_remove" => "이 작업을 완료상태로 설정하고, 하위작업들을 이 작업의 상위작업에 첨부시킵니다."
                          ,"complete_title" => "작업 설정을 확인하세요"
                          ,"delete_confirm" => "이 작업을 정말 삭제하시겠습니까?"
                          ,"delete_instructions" => "삭제하려는 작업에는 __0 개의 진행중인 하위작업들이 있습니다. 어떻게 처리할 것인지 선택하세요:" // number
                          ,"delete_orphan" => "이 작업을 삭제하고, 하위 작업들은 상위작업이 없도록 설정합니다."
                          ,"delete_recursive" => "이 작업과 하위 작업들을 삭제합니다"
                          ,"delete_remove" => "이 작업을 삭제하고, 그 하위작업들은 이 작업의 상위작업에 첨부시킵니다"
                          ,"delete_title" => "작업 삭제 선택사항"
                          ,"delete_title_m" => "작업 삭제"
                          );

$language->data = array("no" => "아니오"
                       ,"priority_1" => "가장 낮음"
                       ,"priority_2" => "낮음"
                       ,"priority_3" => "중간"
                       ,"priority_4" => "높음"
                       ,"priority_5" => "가장 높음"
                       ,"rel_date" => "__0" // date
                       ,"rel_date_days" => "__0 일" // number
                       ,"rel_date_days_ago" => "__0 일 이전" // number
                       ,"rel_date_today" => "오늘"
                       ,"rel_date_tomorrow" => "내일"
                       ,"rel_date_week" => "1주일"
                       ,"rel_date_week_ago" => "1주일 이전"
                       ,"rel_date_yesterday" => "어제"
                       ,"yes" => "예"
                       );

$language->email_reminders = array("overdue" => "기한초과"
                                  ,"due" => "마감예정"
                                  ,"upcoming" => "이후 작업"
                                  ,"high_priority" => "높은 우선순위"
                                  ,"status" => "상태"
                                  ,"complete" => "% 완료"
                                  ,"priority" => "우선순위"
                                  ,"none" => "(없음)"
                                  ,"subject" => "tasks reminder"
                                  );

$language->form = array("1_week" => "1 주일"
                       ,"1_year" => "1 년"
                       ,"30_days" => "30 일"
                       ,"90_days" => "90 일"
                       ,"after_save" => "저장후에:"
                       ,"choose_date" => "날짜를 선택하세요"
                       ,"clear_date" => "지우기"
                       ,"date_due" => "완료예정일:"
                       ,"date_entered" => "입력일:"
                       ,"date_modified" => "마지막 수정일:"
                       ,"form_title_edit" => "작업 편집"
                       ,"form_title_new" => "신규 작업"
                       ,"id" => "ID:"
                       ,"new_task" => "신규 작업"
                       ,"notes" => "메모:"
                       ,"parent" => "상위:"
                       ,"priority" => "우선순위:"
                       ,"return_home" => "홈으로 돌아가기"
                       ,"status" => "% 완료:"
                       ,"status_label" => "% 완료"
                       ,"stay_here" => "이 페이지에 머뭄"
                       ,"sticky" => "작업 고정표시"
                       ,"sticky_label" => "작업 고정표시:"
                       ,"title" => "제목:"
                       ,"today" => "오늘"
                       ,"tomorrow" => "내일"
                       ,"url" => "URL:"
                       ,"urls" => "URLs:"
                       ,"url_1" => "URL 1:"
                       ,"url_2" => "URL 2:"
                       ,"url_3" => "URL 3:"
                       ,"view_parent" => "상위 작업 보기"
                       ,"view_tree" => "작업 Tree"
                       );

$language->home = array("sort_title" => "제목 순서로"
                       ,"sort_title_rev" => "제목 역순으로"
                       ,"sort_priority" => "우선순위 순서로"
                       ,"sort_priority_rev" => "우선순위 역순으로"
                       );

$language->icons = array("completed" => "Completed Task"
                        ,"delete" => "삭제"
                        ,"edit" => "편집"
                        ,"hide_show" => "가리기/보기"
                        ,"hide_show_tip" => "이 작업에 대한 상세 정보 가리기 또는 보기"
                        ,"mark_complete" => "완료로 표시"
                        ,"new_sub_task" => "신규 하위 작업"
                        ,"notes_bigger" => "노트영역 확장"
                        ,"notes_smaller" => "노트영역 축소"
                        ,"parent_picker" => "상위 작업 선택"
                        ,"priority" => "우선순위: __0" // result of get_friendly_priority();
                        ,"sticky" => "작업 고정표시"
                        ,"tree_toggle" => "가리기/보기"
                        ,"tree_toggle_tip" => "이 작업에 대한 하위작업 좀더 보기 또는 가리기"
                        );

$language->list = array("banner" => " __0 항목 표시됨" // number
                       ,"date_due" => "완료예정일"
                       ,"done" => "(완료)"
                       ,"id" => "ID"
                       ,"no_items" => "표시할 항목이 없습니다."
                       ,"priority" => "우선순위"
                       ,"status" => "% 완료"
                       ,"title" => "제목"
                       );

$language->list_titles = array("history" => "최근 수정된 25개 작업"
                              ,"overdue" => "기한이 지난 작업"
                              ,"sortable" => "작업정렬"
                              ,"upcoming" => "향후작업"
                              );

$language->menu = array("calendar" => "달력<font size=1><u>(C)</u></font>"
                       ,"calendar_tip" => "작업목록을 달력모양으로 보거나, iCalendar 데이터를 갱신하시려면 여기를 클릭하세요."
                       ,"history" => "변경내역<font size=1><u>(R)</u></font>"
                       ,"history_tip" => "최근 수정된 25개 작업목록을 보시려면 여기를 클릭하세요."
                       ,"home" => "홈<u><font size=1>(H)</u></font>"
                       ,"home_tip" => "모든 루트 작업을 표시하는 홈페이지로 이동하시려면 여기를 클릭하세요."
                       ,"new_task" => "신규작업<font size=1><u>(T)</u></font>"
                       ,"new_task_tip" => "Click here to create a new task."
                       ,"search" => "검색<font size=1><u>(A)</u></font>"
                       ,"search_tip" => "작업을 검색하시려면 여기를 클릭하세요."
                       ,"sortable" => "작업정렬<font size=1><u>(B)</u></font>"
                       ,"sortable_tip" => "정렬된 작업목록을 보시려면 여기를 클릭하세요."
                       ,"upcoming" => "향후작업<font size=1><u>(U)</u></font>"
                       ,"upcoming_tip" => "이후 모든 작업 및 기한이 지난 작업을 보시려면 여기를 클릭하세요."
                       );

$language->messages = array("completed" => "&quot;__0&quot; (#__1) 작업이 완료상태로 설정되었습니다." // title, id
                           ,"completed_reason" => "&quot;__0&quot; (#__1) 작업이 다음과 같은 이유로 완료상태로 설정되었습니다:<p style=\"padding-left: 15px;\">__2</p>" // title, id, reason
                           ,"completed_task_link" => "완료된 작업 보기"
                           ,"completed_task_parent_link" => "완료된 작업의 상위 작업 보기"
                           ,"complete_instructions" => "#__0 작업은 __1 개의 하위작업과 (__2) 개의 진행중인 작업이 포함되어있습니다. 원하시는 완료상태를 설정하세요." // id, number, number
                           ,"complete_orphan" => "&quot;__0&quot; (#__1) 작업이 완료상태로 설정되었으며 모든 하위작업은 #__2 작업으로 첨부되었습니다." // title, id, new parent task id
                           ,"complete_orphan" => "&quot;__0&quot; (#__1) 작업이 완료상태로 설정되었으며 상위 작업에 속한 모든 하위작업들은 삭제되었습니다." // title, id
                           ,"complete_recursive" => "&quot;__0&quot; (#__1) 작업과 모든 하위 작업들이 완료상태로 설정되었습니다." // title, id
                           ,"confirm_delete" => "다음 작업을 삭제하시겠습니까?: __0"
                           ,"deleted" => "&quot;__0&quot; (#__1) 작업이 삭제되었습니다." // title, id
                           ,"delete_instructions" => "#__0 작업은 __1 개의 하위작업과 (__2) 개의 진행중인 작업이 포함되어있습니다, 원하시는 삭제상태를 선택하세요." // id, number, number
                           ,"delete_orphan" => "&quot;__0&quot; (#__1) 작업이 삭제되었으며 상위 작업 ID를 가진 모든 하위작업들은 삭제되었습니다." // title, id
                           ,"delete_recursive" => "&quot;__0&quot; (#__1) 작업과 모든 하위 작업들이 삭제되었습니다." // title, id
                           ,"delete_remove" => "&quot;__0&quot; (#__1) 작업이 삭제되었으며 모든 하위 작업들은 #__2 작업에 첨부되었습니다." // title, id, new parent id
                           ,"err_conflict" => "<b>오류:</b> 작업이 저장되지 않았습니다.<br>현재 편집중인 작업을 다른 사용자가 수정을 하였습니다. 아래 차이점을 비교한 다음 다시 저장하시기 바랍니다. <p>이 작업의 최종수정 시점은 __0;입니다.<br>현재 데이터베이스에 저장된 작업은 __1 에 저장되었습니다"
                           ,"err_date_format" => "<b>오류:</b> 'config.php'의 <b>\$custom->date_format</b> 에 오류가 있습니다. 입력값: '__0' 에 하나 이상의 'm', 'd', 'y'가 포함되지 않았습니다. 이 문제를 'config.php'에서 수정하시기 바랍니다." // date_format
                           ,"err_event_type" => "<b>오류:</b> 'config.php'의 <b>\$custom->ical_export_type</b> 에 오류가 있습니다. 입력값: '__0' 에 '일정' 또는 작업이 없습니다. 이 문제를 'config.php'에서 수정하시기 바랍니다." // ical_export_type
                           ,"err_invalid_date" => "<b>Error:</b> This task was not saved because the specified date is invalid. Correct or clear the due date and then save the task."
                           ,"err_invalid_date" => "<b>오류:</b> 지정된 날짜가 올바르지 않아서 작업이 저장되지 않았습니다. 마감일을 수정하거나 삭제하고 난 다음 작업을 저장하세요."
                           ,"err_invalid_parent" => "<b>오류:</b> #__0 작업에 상위 작업이 설정되어있지만 존재하지 않는 ID를 가진 작업입니다. 문제를 수정하시고 다시 시도하세요." // id
                           ,"err_loop" => "<b>오류:</b> 지정된 상위 작업으로 작업을 저장하면 무한루프를 생성하게 됩니다."
                           ,"err_no_root" => "오류: 루트가 설정되지 않았습니다."
                           ,"err_own_parent" => "<b>오류:</b> 작업자체가 상위작업이 될 수 없습니다.."
                           ,"err_search_date_after" => "<b>오류:</b> 이 검색에서는 '마감일이 다음 이후'에 해당하는 값이 올바르지 않아 작업을 찾을 수 없습니다. 마감일을 수정 또는 삭제하신 후 다시 시도하세요."
                           ,"err_search_date_before" => "<b>오류:</b> 이 검색에서는 '마감일이 다음 이전'에 해당하는 값이 올바르지 않아 작업을 찾을 수 없습니다. 마감일을 수정 또는 삭제하신 후 다시 시도하세요."
                           ,"err_search_date_exact" => "<b>오류:</b> 이 검색에서는 '마감일'에 해당하는 값이 올바르지 않아 작업을 찾을 수 없습니다. 마감일을 수정 또는 삭제하신 후 다시 검색하세요."
                           ,"js_abandon_changes" => "변경사항을 저장하지 않으시겠습니까?"
                           ,"js_complete_confirm" => "메모를 남기지 않고 작업을 닫으시겠습니까?"
                           ,"js_complete_prompt" => "작업을 닫기 전에 메모를 남기세요."
                           ,"js_err_edit_date" => "마감일의 현재 값이 올바르지 않습니다. \\n이 값을 수정하시고 저장하세요."
                           ,"js_err_search_date_after" => "'마감일이 다음 이후'에 해당하는 값이 올바른 날짜가 아닙니다."
                           ,"js_err_search_date_before" => "'마감일이 다음 이전'에 해당하는 날짜가 올바르지 않습니다."
                           ,"js_err_search_date_exact" => "'마감일:'에 해당하는 날짜가 올바른 날짜가 아닙니다."
                           ,"js_err_search_date_range" => " '마감일이 다음 이후:' 에 해당하는 날짜가 '마감일이 다음 이전'에 해당 날짜보다 이후이어야합니다."
                           ,"js_err_search_errors" => " 경고 - 다음 문제는 검색결과를 얻기 위해서는\\수정되어야합니다.: \\n "
                           ,"js_err_search_id_invalid" => "'ID' 필드는 공란 또는 0보다 큰 숫자로 구성되어야합니다."
                           ,"js_err_search_parent_invalid" => "'상위' 필드는 공란 또는 0보다 큰 숫자로 구성되어야합니다."
                           ,"js_err_search_status_exact" => "'상태 일치' 필드는 0에서 100사이의 숫자로 구성되어야합니다."
                           ,"js_err_search_status_less" => "'상태가 다음 이하:' 필드는 공란 또는 0에서 100사이의 숫자로 구성되어야합니다."
                           ,"js_err_search_status_more" => "'상태가 다음 이상:' 필드는 공란 또는 0에서 100사이의 숫자로 구성되어야합니다."
                           ,"js_err_search_status_range" => "'상태가 다음 다음 미만:' 필드는 '상태가 다음 이상:' 필드의 값도다 커야합니다."
                           ,"js_loading_text" => "로딩중..."
                           ,"js_nothing_to_save" => "죄송합니다. 이 화면에는 저장할 내용이 없습니다."
                           ,"js_parent_required" => "저장후 작업의 상위 작업을 보려면\\n 이 작업의 상위작업을 지정해야합니다."
                           ,"mail_sent" => "일일 알림 메일이 발송되었습니다."
                           ,"mobile_resolve_instructions" => "입력된 데이터는 현재 데이터베이스에 등록된 버젼 아래에 표시됩니다. 변경하신 다음 '저장' 버튼을 클릭하세요."
                           ,"no_email" => "config.php 파일에 당신의 이메일 주소를 입력하세요."
                           ,"parent_changed" => "상위 작업이 __0 에서 __1 으로 변경되었습니다." // old parent id, new parent id
                           ,"saved" => "다음 작업이 저장되었습니다: #__0 (__1) at __2." // id, title, timestamp
                           ,"title" => "메시지"
                           ,"warn_deleted" => "<b>경고:</b> 이 작업은 이미 삭제되었습니다."
                           );

$language->misc = array("all_rights_reserved" => "모든 권리 보유."
                       ,"copyright" => "저작권"
                       ,"count_open" => "__0개 작업진행중" // number
                       ,"count_total" => "총 __0개의 작업" // number
                       ,"hide_completed" => "완료된 작업 가리기"
                       ,"jump_to" => "이동..."
                       ,"quick_search" => "빠른 검색"
                       ,"show_completed" => "완료된 작업 보기"
                       ,"timer" => "화면표시 소요시간 __0 초." // seconds
                       ,"version" => "버젼 __0"
                       );

$language->picker = array("date_go" => "가기"
                         ,"date_key_selected" => "현재 선택된 날짜"
                         ,"date_key_today" => "오늘 날짜"
                         ,"date_next" => "다음"
                         ,"date_previous" => "이전"
                         ,"date_today" => "오늘"
                         ,"days" => "'일','월','화','수','목','금','토'"
                         ,"months" => "'1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'"
                         ,"parent_title" => "상위 작업을 선택하세요"
                         );

$language->resolve = array("append" => "추가"
                          ,"current_version" => "현재 버젼"
                          ,"form_title" => "다음 필드들에 차이가 있습니다"
                          ,"none" => "(없음)"
                          ,"save" => "저장"
                          ,"use" => "사용"
                          ,"your_data" => "나의 데이터"
                          );

$language->search = array("after" => "다음 이후:"
                         ,"before" => "다음 이전:"
                         ,"exactly" => "다음 날짜:"
                         ,"form_title" => "검색 설정"
                         ,"include_completed" => "완료 작업 포함"
                         ,"instructions" => "검색할 작업의 제목이나 메모란에 포함된 단어를 입력하세요. 검색의 결과는 기본적으로 기입된 모든 단어가 포함된 결과만이 해당됩니다. 추가 검색옵션을 보려면 &quot;고급 검색&quot 을 클릭하세요."
                         ,"less_than" => "다음 미만:"
                         ,"more_options" => "상세 검색 옵션"
                         ,"more_than" => "다음 이상:"
                         ,"results_title" => "검색결과"
                         ,"search_button" => "검색"
                         );

$language->toolbar = array("b2_tip" => "b2에 게시"
                          ,"date_time" => "날짜/시간 삽입"
                          ,"date_time_tip" => "메모란에 현재 날짜/시간 삽입"
                          ,"delete" => "삭제"
                          ,"edit" => "편집"
                          ,"mark_complete" => "완료로 표시"
                          ,"mark_complete_m" => "100%"
                          ,"mt_tip" => "Moveable Type에 게시"
                          ,"new_sub" => "신규 하위작업"
                          ,"new_sub_m" => "신규 하위 작업"
                          ,"save" => "저장 (<u>S</u>)"
                          ,"save_alt" => "저장"
                          ,"save_as_new" => "신규 작업으로 저장"
                          ,"wp_tip" => "WordPress에 게시"
                          );

$language->tree = array("due" => "마감일:"
                       ,"id" => "ID:"
                       ,"loading" => $language->messages["js_loading_text"]
                       ,"open_sub_task" => "1 개의 진행중인 하위 작업 <span style=\"color: #666;\">(총 __0 항목)</span>" // number
                       ,"open_sub_tasks" => "__0 개의 진행중인 하위 작업 <span style=\"color: #666;\">(총 __1 항목)</span>" // number, number
                       ,"status" => "__0% 완료됨" // number (0-100)
                       );

?>
<?

// Traditional Chinese

$language = new language;

$language->name = "正體中文";
$language->author = "Julian Yu-Chung Chen";
$language->author_email = "julian9@mac.com";
$language->author_web = "http://homepage.mac.com/julian9";

$language->charset = "utf-8";

// uncomment this if you need to increase the font size from 10px
// $language->font_size = "10px;"; 

$language->about = array("tagline" => "keep stuff organized and get it done."
                        ,"documentation" => "文件"
                        ,"read_me" => "讀我"
                        ,"license" => "版權"
                        ,"download" => "下載"
                        ,"this_version" => "這個版本: __0"
                        ,"latest_version" => "最新釋出版本: __0"
                        ,"beta_version" => "最新測試版本: __0"
                        ,"using_latest" => "你正在使用最新釋出的版本。"
                        ,"using_beta" => "你正在使用最新測試的版本。"
                        ,"feedback" => "回應與建議:"
                        ,"web" => "網頁:"
                        ,"credits" => "貢獻"
                        ,"main_credit" => "Tasks Jr. 是由 <nobr>Alex King</nobr> 所創造與實作的。 並由以下這些人好心地進行各個語言的本土化工作:"
                        ,"web_site" => "網站"
                        ,"email" => "電子郵件"
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

$language->breadcrumbs = array("history" => "歷史"
                              ,"home" => "家頁面"
                              ,"new_task" => "新工作"
                              ,"search" => "搜尋"
                              ,"search_results" => "搜尋結果"
                              ,"sortable" => "可排序的工作列表"
                              ,"upcoming" => "即將到來的工作項目"
                              );

$language->confirm = array("complete_instructions" => "你所標記為完成的工作項目尚有 __0 個 open 的子工作項目。請選擇要如何處理:" // number
                          ,"complete_orphan" => "將此工作項目標記為完成並設定其子工作項目無父工作項目"
                          ,"complete_notes" => "輸入此工作的結束筆記"
                          ,"complete_recursive" => "將此工作項目及其子工作項目標記為完成"
                          ,"complete_remove" => "將此工作項目標記為完成並其子工作項目附加於此工作項目的副工作項目"
                          ,"complete_title" => "完整工作項目選項"
                          ,"delete_confirm" => "你確定要刪除此鄉工作嗎？"
                          ,"delete_instructions" => "要刪除的工作項目有 __0 的 open 子工作項目。請選擇要如何繼續:" // number
                          ,"delete_orphan" => "刪除此工作項目並將其子工作項目設定為沒有父工作項目"
                          ,"delete_recursive" => "刪除此工作項目及其子工作項目"
                          ,"delete_remove" => "作項目並將其子工作項目附加到其父工作項目"
                          ,"delete_title" => "刪除工作項目選項"
                          ,"delete_title_m" => "刪除工作"
                          );

$language->data = array("no" => "No"
                       ,"priority_1" => "最低"
                       ,"priority_2" => "低"
                       ,"priority_3" => "普通"
                       ,"priority_4" => "高"
                       ,"priority_5" => "最高"
                       ,"rel_date" => "__0" // date
                       ,"rel_date_days" => "__0 天" // number
                       ,"rel_date_days_ago" => "__0 天前" // number
                       ,"rel_date_today" => "今天"
                       ,"rel_date_tomorrow" => "明天"
                       ,"rel_date_week" => "一週"
                       ,"rel_date_week_ago" => "一週前"
                       ,"rel_date_yesterday" => "昨天"
                       ,"yes" => "是的"
                       );

$language->email_reminders = array("overdue" => "過期"
                                  ,"due" => "到期"
                                  ,"upcoming" => "即將到來"
                                  ,"high_priority" => "高優先權"
                                  ,"status" => "狀態"
                                  ,"complete" => "% 完成"
                                  ,"priority" => "優先順序"
                                  ,"none" => "(none)"
                                  ,"subject" => "工作項目提醒"
                                  );

$language->form = array("1_week" => "一週"
                       ,"1_year" => "一年"
                       ,"30_days" => "30 天"
                       ,"90_days" => "90 天"
                       ,"after_save" => "在儲存之後你要:"
                       ,"choose_date" => "選擇日期"
                       ,"clear_date" => "清除"
                       ,"date_due" => "到期日期:"
                       ,"date_entered" => "輸入資料的日期:"
                       ,"date_modified" => "上次更改的日期:"
                       ,"form_title_edit" => "編輯工作項目"
                       ,"form_title_new" => "新的工作項目"
                       ,"id" => "序號:"
                       ,"new_task" => "新工作項目"
                       ,"notes" => "筆記:"
                       ,"parent" => "父工作項目:"
                       ,"priority" => "優先權:"
                       ,"return_home" => "返回家頁面"
                       ,"status" => "% 完成:"
                       ,"status_label" => "% 完成"
                       ,"stay_here" => "留在目前畫面"
                       ,"sticky" => "Sticky 工作項目"
                       ,"sticky_label" => "Sticky 工作項目:"
                       ,"title" => "主題:"
                       ,"today" => "今天"
                       ,"tomorrow" => "明天"
                       ,"url" => "URL:"
                       ,"urls" => "相關網址:"
                       ,"url_1" => "URL 1:"
                       ,"url_2" => "URL 2:"
                       ,"url_3" => "URL 3:"
                       ,"view_parent" => "檢視父工作項目"
                       ,"view_tree" => "檢視樹狀"
                       );
$language->home = array("sort_title" => "以主題排序"
                       ,"sort_title_rev" => "以主題反向排序"
                       ,"sort_priority" => "以優先順序排序"
                       ,"sort_priority_rev" => "以反向優先順序排序"
                       );
                       
$language->icons = array("completed" => "已完成的工作項目"
                        ,"delete" => "摻除"
                        ,"edit" => "編輯"
                        ,"hide_show" => "隱藏/顯示"
                        ,"hide_show_tip" => "隱藏或是顯示更多有關本工作項目的資訊"
                        ,"mark_complete" => "標記為完成"
                        ,"new_sub_task" => "新的子工作項目"
                        ,"notes_bigger" => "擴大筆記欄位"
                        ,"notes_smaller" => "縮小筆記欄位"
                        ,"parent_picker" => "選擇一個父工作項目"
                        ,"priority" => "優先權: __0" // result of get_friendly_priority();
                        ,"sticky" => "Sticky 工作項目"
                        ,"tree_toggle" => "隱藏/顯示"
                        ,"tree_toggle_tip" => "隱藏或是顯示更多有關本子工作項目的資訊"
                        );

$language->list = array("banner" => "顯示 __0 個項目" // number
                       ,"date_due" => "到期日期"
                       ,"done" => "(完成)"
                       ,"id" => "序號"
                       ,"no_items" => "沒有項目可供顯示。"
                       ,"priority" => "優先權"
                       ,"status" => "% 完成"
                       ,"title" => "主題"
                       );

$language->list_titles = array("history" => "最近 25 個修改過的工作項目"
                              ,"overdue" => "過期工作項目"
                              ,"sortable" => "工作項目排序列表"
                              ,"upcoming" => "即將到來的工作項目"
                              );

$language->menu = array("calendar" => "行事曆(C)"
                       ,"calendar_tip" => "按下這裡來更新 iCalendar 資料並以行事曆方式察看你的工作項目。"
                       ,"history" => "歷史(R)"
                       ,"history_tip" => "按下這裡來察看最近 25 個修改過的工作項目。"
                       ,"home" => "家頁面(H)"
                       ,"home_tip" => "按下這裡來回到顯示所有最上層工作項目的家頁面。"
                       ,"new_task" => "新的(T)"
                       ,"new_task_tip" => "按下這裡來產生一個新的工作項目。"
                       ,"search" => "搜尋(A)"
                       ,"search_tip" => "按下這裡來搜尋工作項目。"
                       ,"sortable" => "排序(B)"
                       ,"sortable_tip" => "按下這裡來檢視工作項目排序列表。"
                       ,"upcoming" => "即將到來(U)"
                       ,"upcoming_tip" => "按下這裡來檢視所有即將到來與過期的工作項目。"
                       );

$language->messages = array("completed" => "工作項目 &quot;".$title_HTML."&quot; (#".$task->id.") 已標示為完成。" // title, id
                           ,"completed_reason" => '工作項目 &quot;__0&quot; (#__1) 已標示為完成。原因是:<p style="padding-left: 15px;">__2</p>' // title, id, reason
                           ,"completed_task_link" => "檢視已完成的工作項目"
                           ,"completed_task_parent_link" => "檢視已完成的工作項目的父工作項目"
                           ,"complete_instructions" => "工作項目 #__0 有 __1 個子工作項目 (__2) 個未完成, 請選擇你想要的完成選擇。" // id, number, number
                           ,"complete_orphan" => "工作項目 &quot;__0&quot; (#__1) 已標示為完成，且其所有的子工作項目已附加於工作項目 #__2." // title, id, new parent task id
                           ,"complete_orphan" => "工作項目 &quot;__0&quot; (#__1) 已標示為完成, 且其所有的子工作項目皆已移除他們的父工作項目序號。" // title, id
                           ,"complete_recursive" => "工作項目 &quot;__0&quot; (#__1) 及其子工作項目皆已標示為完成。" // title, id
                           ,"confirm_delete" => "刪除工作項目: __0?"
                           ,"deleted" => "工作項目 &quot;__0&quot; (#__1) 已被移除。" // title, id
                           ,"delete_instructions" => "工作項目 #__0 有 __1 個子工作項目 (__2) 個未完成, 請選擇你想要的刪除模式。" // id, number, number
                           ,"delete_orphan" => "工作項目 &quot;__0&quot; (#__1) 已被刪除且其所有的子工作項目已移除父序號。" // title, id
                           ,"delete_recursive" => "工作項目 &quot;__0&quot; (#__1) 及其所有的子工作項目接已被移除。" // title, id
                           ,"delete_remove" => "工作項目 &quot;__0&quot; (#__1) 已被移除，且其所有的子工作項目已被附加到工作項目 #__2" // title, id, new parent id
                           ,"err_conflict" => "<b>錯誤:</b> 這個工作項目未被儲存。<br>這個工作項目在你開始編輯之後被其他使用這更新了。請檢視下面所咧的差異後再儲存一次。<p>你目前更改的工作項目版本上一次儲存是在 __0;<br>目前在資料庫內的版本是在 __1 儲存的。"
                           ,"err_date_format" => "<b>錯誤:</b> 在你的 'config.php' 中的 <b>\$custom->date_format</b> 發生設定錯誤。你所設定的值 : '__0' 並不包含一個或以個以上的 'm', 'd', 'y'。請在 'config.php' 中更正。" // date_format
                           ,"err_event_type" => "<b>錯誤:</b> 在你的 'config.php' 中的 <b>\$custom->ical_export_type</b> 發生設定錯誤。你所設定的值 : '__0' 並不是 'event' 或是 'todo'。請在 'config.php' 中更正。" // ical_export_type
                           ,"err_invalid_date" => "<b>錯誤:</b> 這個工作項目未被儲存。因為所指定的日期是無效的。更正或是清除截止日期後再儲存這個工作項目一遍。"
                           ,"err_invalid_parent" => "<b>錯誤:</b> 工作項目 #__0 被指定為父工作項目，但這樣的序號的工作項目並不存在。請處理此一問題後再儲存一遍。" // id
                           ,"err_loop" => "<b>錯誤:</b> 已所指定的父工作項目儲存此工作項目將會造成無窮回圈。"
                           ,"err_no_root" => "錯誤: 沒有設定根工作項目。"
                           ,"err_own_parent" => "<b>錯誤:</b> 一個工作項目不能為其自己的父工作項目。"
                           ,"err_search_date_after" => "<b>錯誤:</b> 這樣的搜尋找不到任何的工作項目，因為所指定的 '到期日期在...之後:' 值無效。修正或是清除到期日期後再搜尋一次。"
                           ,"err_search_date_before" => "<b>錯誤:</b> 這樣的搜尋找不到任何的工作項目，因為所指定的 '到期日期在...之前:' 值無效。修正或是清除到期日期後再搜尋一次。"
                           ,"err_search_date_exact" => "<b>錯誤:</b> 這樣的搜尋找不到任何的工作項目， 因為所指定的 '到期日期完全比對:' 值無效。修正或是清除到期日期後再搜尋一次。"
                           ,"js_abandon_changes" => "尚未儲存你的改變就要離開嗎？"
                           ,"js_complete_confirm" => "確定要關閉\\n這個工作項目而不輸入任何\\n關閉筆記嗎？"
                           ,"js_complete_prompt" => "為這個工作項目輸入關閉筆記。"
                           ,"js_err_edit_date" => "目前在【到期】欄位的值不是一個有效的日期。\\n在儲存之前更改或是清除這個值嗎？"
                           ,"js_err_search_date_after" => "目前在【到期在...之後】欄位的值不是一個有效的日期。"
                           ,"js_err_search_date_before" => "目前在【到期在...之前】欄位的值不是一個有效的日期。"
                           ,"js_err_search_date_exact" => "目前在【到期完全比對】欄位的值不是一個有效的日期。"
                           ,"js_err_search_date_range" => "'到期在...之後:' 日期必須在'到期在...之前:'日期之前。"
                           ,"js_err_search_errors" => "警告 - 以下問題在搜尋\\n回傳資料前必須要更正: \\n"
                           ,"js_err_search_id_invalid" => "'序號' 欄位不是為空的就必須是一個大於 0 的數字。"
                           ,"js_err_search_parent_invalid" => "'父工作項目' 欄位不是為空的就必須是一個大於 0 的數字。"
                           ,"js_err_search_status_exact" => "'進度完全比對:' 欄位必須是在 0 到 100 之間的一個數字資料。"
                           ,"js_err_search_status_less" => "'進度比...少:' 欄位必須是在 0 到 100 之間的一個數字資料。"
                           ,"js_err_search_status_more" => "'進度比...多:' 欄位必須是在 0 到 100 之間的一個數字資料。"
                           ,"js_err_search_status_range" => "'進度比...少:' 欄位值必須比 '進度比...多:' 欄位大"
                           ,"js_loading_text" => "讀取中..."
                           ,"js_nothing_to_save" => "抱歉, 目前畫面中沒有什麼好儲存的。"
                           ,"js_parent_required" => "你必須指定這個工作項目的父工作項目\\n以便在儲存之後檢視其父工作項目。"
                           ,"mail_sent" => "每日提醒已用 e-mail 寄出。"
                           ,"mobile_resolve_instructions" => "你所輸入的資料會顯示在目前在資料庫中的資料以下。作你所要的變更，然後用滑鼠按下「儲存」。"
                           ,"no_email" => "請在 config.php 裡加入你的電子郵件地址。"
                           ,"parent_changed" => "父工作項目從 __0 更改成 __1。" // old parent id, new parent id
                           ,"saved" => "在 __2 儲存工作項目 #__0 (__1)。" // id, title, timestamp
                           ,"title" => "信息(Message)"
                           ,"warn_deleted" => "<b>警告:</b> 這個工作項目已被刪除。"
                           );

$language->misc = array("all_rights_reserved" => "保留所有權利"
                       ,"copyright" => "版權所有"
                       ,"count_open" => "__0 個開啟的工作項目" // number
                       ,"count_total" => "__0 個工作項目" // number
                       ,"hide_completed" => "隱藏已完成的工作項目"
                       ,"jump_to" => "前往..."
                       ,"quick_search" => "快速搜尋"
                       ,"show_completed" => "顯示完成的工作項目"
                       ,"timer" => "本畫面在 __0 秒內 繪製完成。" // seconds
                       ,"version" => "__0 版"
                       );

$language->picker = array("date_go" => "前往"
                         ,"date_key_selected" => "目前選擇的日期"
                         ,"date_key_today" => "今天的日期"
                         ,"date_next" => "下一個"
                         ,"date_previous" => "上一個"
                         ,"date_today" => "今天"
                         ,"days" => "'週日','週一','週二','週三','週四','週五','週六'"
                         ,"months" => "'一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'"
                         ,"parent_title" => "選擇父工作項目"
                         );

$language->resolve = array("append" => "附加在之後"
                          ,"current_version" => "目前版本"
                          ,"form_title" => "以下的欄位沒有差異"
                          ,"none" => "(none)"
                          ,"save" => "儲存"
                          ,"use" => "使用"
                          ,"your_data" => "你的資料"
                          );

$language->search = array("after" => "在...之後:"
                         ,"before" => "在...之前:"
                         ,"exactly" => "完全相同比對:"
                         ,"form_title" => "搜尋條件"
                         ,"include_completed" => "包含已完成的工作項目"
                         ,"instructions" => "輸入你想在標題或是筆記中要搜尋的字串。預設本搜尋只會找出包含所有你所輸入的字眼的記錄。按下【更多搜尋選項】，來使用其他額外的搜尋選項。"
                         ,"less_than" => "比...更少:"
                         ,"more_options" => "更多搜尋選項"
                         ,"more_than" => "比...更多:"
                         ,"results_title" => "搜尋結果"
                         ,"search_button" => "搜尋"
                         );

$language->toolbar = array("b2_tip" => "發佈到 b2"
                          ,"date_time" => "插入 日期/時間"
                          ,"date_time_tip" => "在筆記欄位插入目前的日期及時間"
                          ,"delete" => "刪除"
                          ,"edit" => "編輯"
                          ,"mark_complete" => "標記完成"
                          ,"mark_complete_m" => "百分之百"
                          ,"mt_tip" => "發佈到 Moveable Type"
                          ,"new_sub" => "新的子工作項目"
                          ,"new_sub_m" => "新子工作"
                          ,"save" => "<u>儲</u>存"
                          ,"save_alt" => "儲存"
                          ,"save_as_new" => "新儲存成一個工作項目"
                          ,"wp_tip" => "發佈到 WordPress"
                          );

$language->tree = array("due" => "到期:"
                       ,"id" => "序號:"
                       ,"loading" => "讀取中..."
                       ,"open_sub_task" => '1 尚未完成的子工作項目 <span style="color: #666;">(總共 __0 個)</span>' // number
                       ,"open_sub_tasks" => '__0 尚未完成的子工作項目 <span style="color: #666;">(總共 __1 個)</span>' // number, number
                       ,"status" => "__0% 完成" // number (0-100)
                       );

?>

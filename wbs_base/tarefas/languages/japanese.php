<?

// japanese
// translated by Toshiro Yagi <yagi@lovemorgue.org>
// special thanks to Toshiro Kanda

$language = new language;

$language->name = "Japanese";
$language->author = "Toshiro Yagi";
$language->author_email = "yagi@lovemorgue.org";
$language->author_web = "http://lovemorgue.org/";

$language->charset = "utf-8";

$language->font_size = "12px";

$language->about = array("tagline" => "整理整頓して仕事を片付けよう"
                        ,"documentation" => "マニュアル"
                        ,"read_me" => "お読みください"
                        ,"license" => "ライセンス"
                        ,"download" => "ダウンロード"
                        ,"this_version" => "現在のバージョン： __0"
                        ,"latest_version" => "最新バージョン： __0"
                        ,"beta_version" => "最新β版 __0"
                        ,"using_latest" => "現在最新のリリース版をご利用中です。"
                        ,"using_beta" => "現在最新のβ版をご利用中です。"
                        ,"feedback" => "ご意見、ご提案："
                        ,"web" => "ウェブサイト："
                        ,"credits" => "クレジット"
                        ,"main_credit" => "Tasks Jr. は <nobr>Alex King</nobr> により考案、作成されました。下記の方々の惜しみないご尽力をいただき、以下の言語にローカライズされています："
                        ,"web_site" => "ウェブサイト"
                        ,"email" => "メール"
                        );

$language->accesskey = array("calendar" => "カ"
                            ,"history" => "リ"
                            ,"home" => "ホ"
                            ,"new_task" => "新"
                            ,"save" => "保"
                            ,"search" => "検"
                            ,"sortable" => "分"
                            ,"title" => "件"
                            ,"upcoming" => "期"
                            );

$language->breadcrumbs = array("history" => "履歴"
                              ,"home" => "ホーム"
                              ,"new_task" => "新規タスク"
                              ,"search" => "検索"
                              ,"search_results" => "検索結果"
                              ,"sortable" => "分類別タスクリスト"
                              ,"upcoming" => "期日の近いタスク"
                              );

$language->confirm = array("complete_instructions" => "完了済とマークされたタスクには __0 個のサブタスクがあります。どのように処理するか選択してください：" // number
                          ,"complete_orphan" => "このタスクに完了済とマークし、サブタスクは親タスクなしとする"
			  ,"complete_notes" => "このタスクの完了コメントを入力："
                          ,"complete_recursive" => "このタスクとサブタスク両方に完了済とマークする"
                          ,"complete_remove" => "このタスクに完了済とマークし、サブタスクは親タスクに移動させる"
                          ,"complete_title" => "タスク完了のオプション"
			  ,"delete_confirm" => "本当にこのタスクを削除しますか？"
                          ,"delete_instructions" => "削除されるタスクには __0 個のサブタスクがあります。どのように処理するか選択してください：" // number
                          ,"delete_orphan" => "このタスクに完了とマークし、サブタスクは親タスクなしとする"
                          ,"delete_recursive" => "このタスクとサブタスク両方を削除する"
                          ,"delete_remove" => "このタスクを削除し、サブタスクは親タスクに移動させる"
                          ,"delete_title" => "タスクのオプションを削除"
                          ,"delete_title_m" => "タクス削除"
                          );

$language->data = array("no" => "いいえ"
                       ,"priority_1" => "低"
                       ,"priority_2" => "やや低"
                       ,"priority_3" => "中"
                       ,"priority_4" => "高"
                       ,"priority_5" => "重要"
                       ,"rel_date" => "__0" // date
                       ,"rel_date_days" => "__0 日" // number
                       ,"rel_date_days_ago" => "__0 日前" // number
                       ,"rel_date_today" => "本日"
                       ,"rel_date_tomorrow" => "明日"
                       ,"rel_date_week" => "一週間後"
                       ,"rel_date_week_ago" => "一週間前"
                       ,"rel_date_yesterday" => "昨日"
                       ,"yes" => "はい"
                       );

$language->email_reminders = array("overdue" => "遅延"
                                  ,"due" => "期日"
                                  ,"upcoming" => "次回"
                                  ,"high_priority" => "優先"
                                  ,"status" => "状況"
                                  ,"complete" => "% 済"
                                  ,"priority" => "優先度"
                                  ,"none" => "（なし）"
                                  ,"subject" => "tasks からのお知らせ"
                                  );

$language->form = array("1_week" => "一週間後"
                       ,"1_year" => "一年後"
                       ,"30_days" => "３０日後"
                       ,"90_days" => "９０日後"
                       ,"after_save" => "保存後は："
                       ,"choose_date" => "日付を選択"
                       ,"clear_date" => "取消"
                       ,"date_due" => "期日："
                       ,"date_entered" => "記入日："
                       ,"date_modified" => "最終更新："
                       ,"form_title_edit" => "タスクの編集"
                       ,"form_title_new" => "新規タスク"
                       ,"id" => "ID:"
                       ,"notes" => "メモ："
                       ,"parent" => "親タスク："
                       ,"priority" => "優先度："
                       ,"return_home" => "ホームに戻る"
                       ,"status" => "進捗度："
                       ,"status_label" => "進捗度（％）"
                       ,"stay_here" => "この画面を開く"
                       ,"sticky" => "重要タスク"
                       ,"sticky_label" => "重要タスク："
                       ,"title" => "件名："
                       ,"today" => "本日"
                       ,"tomorrow" => "明日"
                       ,"url" => "URL:"
                       ,"urls" => "URLs:"
                       ,"url_1" => "URL 1:"
                       ,"url_2" => "URL 2:"
                       ,"url_3" => "URL 3:"
                       ,"view_parent" => "親タスクを表示"
                       ,"view_tree" => "ツリーを表示"
					   ,"new_task" => "新規タスク"
                       );
$language->home = array("sort_title" => "件名で並替"
                       ,"sort_title_rev" => "件名を逆順で並替"
                       ,"sort_priority" => "優先度で並替"
                       ,"sort_priority_rev" => "優先度を逆順で並替"
                       );
		       
$language->icons = array("completed" => "完了したタスク"
                        ,"delete" => "削除"
                        ,"edit" => "編集"
                        ,"hide_show" => "非表示／表示"
                        ,"hide_show_tip" => "このタスクの詳しい情報の表示／非表示"
                        ,"mark_complete" => "完了済とマークする"
                        ,"new_sub_task" => "新規サブタスク"
                        ,"notes_bigger" => "メモ欄を拡大表示"
                        ,"notes_smaller" => "メモ欄を縮小表示"
                        ,"parent_picker" => "親タスクを選択"
                        ,"priority" => "優先度： __0" // result of get_friendly_priority();
                        ,"sticky" => "重要タスク"
                        ,"tree_toggle" => "非表示／表示"
                        ,"tree_toggle_tip" => "サブタスクの表示／非表示"
                        );

$language->list = array("banner" => "__0 個のタスクを表示" // number
                       ,"date_due" => "期日"
                       ,"done" => "（済）"
                       ,"id" => "ID"
                       ,"no_items" => "表示するアイテムはありません"
                       ,"priority" => "優先度"
                       ,"status" => "進捗度"
                       ,"title" => "件名"
                       );

$language->list_titles = array("history" => "最近更新された２５個のタスク"
                              ,"overdue" => "期限を過ぎたタスク"
                              ,"sortable" => "分類別タスクリスト"
                              ,"upcoming" => "期日の近いタスク"
                              );

$language->menu = array("calendar" => "<u>カ</u>レンダー"
                       ,"calendar_tip" => "タスクのカレンダーを表示してiCalenderの日付をアップデートするにはこちらをクリック"
                       ,"history" => "<u>履</u>歴"
                       ,"history_tip" => "最近更新された２５個のタスクを表示するにはこちらをクリック"
                       ,"home" => "<u>ホ</u>ーム"
                       ,"home_tip" => "全てのルートタスクを表示するホーム画面を表示するにはこちらをクリック"
                       ,"new_task" => "<u>新</u>規タスク"
                       ,"new_task_tip" => "新規タスクを作成するにはこちらをクリック"
                       ,"search" => "<u>検</u>索"
                       ,"search_tip" => "タスクを検索するにはこちらをクリック"
                       ,"sortable" => "<u>分</u>類別"
                       ,"sortable_tip" => "分類別タスクリストを表示させるにはこちらをクリック"
                       ,"upcoming" => "<u>期</u>近タスク"
                       ,"upcoming_tip" => "期日の近いタスクと期日を過ぎたタスクを表示するにはこちらをクリック"
                       );

$language->messages = array("completed" => "タスク &quot;__0&quot; (#__1) は完了済とマークされました。" // title, id
                           ,"completed_reason" => 'タスク &quot;__0&quot; (#__1) は以下の理由で完了済とマークされました：<p style="padding-left: 15px;">__2</p>' // title, id, reason
                           ,"completed_task_link" => "完了済タスクを表示"
                           ,"completed_task_parent_link" => "完了済タスクの親タスクを表示"
                           ,"complete_instructions" => "タスク #__0 には __1 個のサブタスクがあり、そのうち (__2) 個が進行中となっています。どのように完了済とするか選択してください。" // id, number, number
                           ,"complete_orphan" => "タスク &quot;__0&quot; (#__1) は完了済とマークされ、その下の全てのタスクはタスク #__2 の下に移動しました。" // title, id, new parent task id
                           ,"complete_orphan" => "タスク &quot;__0&quot; (#__1) は完了済とマークされ、全てのサブタスクは親タスクのIDを削除されました。" // title, id
                           ,"complete_recursive" => "タスク &quot;__0&quot; (#__1) とその下の全てのタスクが完了済とマークされました。" // title, id
                           ,"confirm_delete" => "タスク： __0 を削除しますか？"
                           ,"deleted" => "タスク &quot;__0&quot; (#__1) は削除されました。" // title, id
                           ,"delete_instructions" => "タスク #__0 には __1 個のサブタスクがあり、そのうち (__2) が進行中となっています。どのように削除するか選択してください。" // id, number, number
                           ,"delete_orphan" => "タスク &quot;__0&quot; (#__1) は削除され、その下の全てのタスクは親タスクのIDを削除されました。" // title, id
                           ,"delete_recursive" => "タスク &quot;__0&quot; (#__1) とその下の全てのタスクが削除されました。" // title, id
                           ,"delete_remove" => "タスク &quot;__0&quot; (#__1) は削除され、その下の全てのタスクはタスク #__2 の下に移動しました。" // title, id, new parent id
                           ,"err_conflict" => "<b>エラー：</b> このタスクは保存されません。<br>このタスクはあなたが編集を開始してから後に他のユーザーによりアップデートされています。下に表示された差分を見直してもう一度保存してください。<p>あなたが変更したこのタスクのバージョンの最終更新は __0 です。<br>データベースに保存された現バージョンは __1 になっています。"
                           ,"err_date_format" => "<b>エラー：</b> 'config.php' の <b>\$custom->date_format</b> に誤りがあります。設定された値： '__0' にはそれぞれ一つ以上必要な 'm', 'd', 'y' がありません。'config.php' を修正してください。" // date_format
			   ,"err_event_type" => "<b>Error:</b> 'config.php' の <b>\$custom->ical_export_type</b> に誤りがあります。設定された値： '__0' は 'event' や 'todo' ではありません。'config.php' を修正してください。" // ical_export_type
                           ,"err_invalid_date" => "<b>エラー：</b> このタスクは保存されません。指定された日付に誤りがあります。期日を修正するか取り消してからもう一度タスクを保存してください。"
                           ,"err_invalid_parent" => "<b>エラー：</b> タスク #__0 が親タスクと指定されましたが、そのIDのタスクはありません。この問題を修正してもう一度保存してください。" // id
                           ,"err_loop" => "<b>エラー：</b> このタスクを指定された親タスクで保存すると無限ループになります。"
                           ,"err_no_root" => "エラー：ルートの指定がありません。"
                           ,"err_own_parent" => "<b>エラー：</b> そのタスク自身を親タスクにすることはできません。"
                           ,"err_search_date_after" => "<b>エラー：</b> この検索条件ではタスクを見つけることはできません。「期日がこれ以降：」欄で指定された値に誤りがあります。期日を修正するか取り消してからもう一度検索してみてください。"
                           ,"err_search_date_before" => "<b>エラー：</b> この検索条件ではタスクを見つけることはできません。「期日がこれ以前：」欄で指定された値に誤りがあります。期日を修正するか取り消してからもう一度検索してみてください。"
                           ,"err_search_date_exact" => "<b>エラー：</b> この検索条件ではタスクを見つけることはできません。「期日：」欄で指定された値に誤りがあります。期日を修正するか取り消してからもう一度検索してみてください。"
                           ,"js_abandon_changes" => "変更を保存しないままにしておきますか？"
                           ,"js_complete_confirm" => "本当にこのタスクを\\n終了のコメントなしで\\nクローズしますか？"
                           ,"js_complete_prompt" => "終了のコメントを記入"
                           ,"js_err_edit_date" => "期日欄に記入された現在の値は正しい日付ではありません。\\n保存する前にこの値を修正するか取り消してください。"
                           ,"js_err_search_date_after" => "「（期日）がこれ以降：」欄の値が正しい日付ではありません。"
                           ,"js_err_search_date_before" => "「（期日）がこれ以前：」欄の値が正しい日付ではありません。"
                           ,"js_err_search_date_exact" => "「（期日）がちょうど：」欄の値が正しい日付ではありません。"
                           ,"js_err_search_date_range" => "「（期日）がこれ以降：」欄の日付は「（期日）がこれ以前：」欄の日付より前でなければいけません。"
                           ,"js_err_search_errors" => "注意 - 検索結果を表示させる前に\\n以下の問題を修正してください：\\n"
                           ,"js_err_search_id_invalid" => "「ID」欄は空欄にするか、０より大きい数字を記入してください。"
                           ,"js_err_search_parent_invalid" => "「親タスク」欄は空欄にするか、０より大きい数字を記入してください。"
                           ,"js_err_search_status_exact" => "「（進捗度）がちょうど：」欄には０から１００までの数字を記入してください。"
                           ,"js_err_search_status_less" => "「（進捗度）がこれ以下：」欄には０から１００までの数字を記入してください。"
                           ,"js_err_search_status_more" => "「（進捗度）がこれ以上：」欄には０から１００までの数字を記入してください。"
                           ,"js_err_search_status_range" => "「（進捗度）がこれ以下：」欄は「（進捗度）がこれ以上」欄より大きい数字でなければいけません。"
                           ,"js_loading_text" => "ロード中..."
                           ,"js_nothing_to_save" => "申し訳ありません。この画面では保存されるものはありません。"
                           ,"js_parent_required" => "保存後に親タスクを表示するためには\\n親タスクを指定してください。"
                           ,"mail_sent" => "毎日発行のお知らせをメールで送信します。"
			   ,"mobile_resolve_instructions" => "入力されたデータは現在データベース内にあるバージョンの下に挿入されました。変更の必要があれば変更し、'保存'をクリックしてください。"
                           ,"no_email" => "config.phpにあなたのメールアドレスを記入してください。"
                           ,"parent_changed" => "親タスクが __0 から __1 に変更されました。" // old parent id, new parent id
                           ,"saved" => "__2 、タスク #__0 (__1) を保存しました。" // id, title, timestamp
                           ,"title" => "メッセージ"
                           ,"warn_deleted" => "<b>注意：</b> このタスクはすでに削除されています。"
                           );

$language->misc = array("all_rights_reserved" => "all rights reserved."
                       ,"copyright" => "copyright"
                       ,"count_open" => "進行中：__0" // number
                       ,"count_total" => "タスク数：__0" // number
                       ,"hide_completed" => "完了済のタスクを隠す"
                       ,"jump_to" => "移動する..."
                       ,"show_completed" => "完了済のタスクを表示"
                       ,"timer" => "ページの作成時間： __0 秒" // seconds
                       ,"version" => "バージョン __0"
					   ,"quick_search" => "クイックサーチ"
                       );

$language->picker = array("date_go" => "移動"
                         ,"date_key_selected" => "選択された日付"
                         ,"date_key_today" => "今日の日付"
                         ,"date_next" => "次"
                         ,"date_previous" => "前"
                         ,"date_today" => "本日"
                         ,"days" => "'日','月','火','水','木','金','土'"
                         ,"months" => "'1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'"
                         ,"parent_title" => "親タスクを選択"
                         );

$language->resolve = array("append" => "追加"
                          ,"current_version" => "現バージョン"
                          ,"form_title" => "以下の欄に変更があります"
                          ,"none" => "（なし）"
                          ,"save" => "保存"
                          ,"use" => "利用"
                          ,"your_data" => "あなたのデータ"
                          );

$language->search = array("after" => "がこれ以降："
                         ,"before" => "がこれ以前："
                         ,"exactly" => "がちょうど："
                         ,"form_title" => "検索条件の指定"
                         ,"include_completed" => "完了済のタスクも検索"
                         ,"instructions" => "検索するタスクの件名と／またはメモに含まれる単語や単語の一部を入力してください。デフォルトでは入力された単語を全て含むものだけを検索します。その他の検索条件を表示するには「詳しい検索条件」をクリックしてください。"
                         ,"less_than" => "がこれ以下："
                         ,"more_options" => "詳しい検索条件"
                         ,"more_than" => "がこれ以上："
                         ,"results_title" => "検索結果"
                         ,"search_button" => "検索"
                         );

$language->toolbar = array("b2_tip" => "b2 （weblog）に投稿する"
                          ,"date_time" => "日付と時刻を挿入"
                          ,"date_time_tip" => "メモ欄に現在時刻と日付を挿入"
                          ,"delete" => "削除"
			  ,"edit" => "編集"
			  ,"mark_complete" => "完了とマークする"
                          ,"mark_complete_m" => "100%"
                          ,"new_sub" => "新規サブタスク"
                          ,"save" => "<u>保</u>存"
                          ,"save_alt" => "保存"
                          ,"save_as_new" => "新規タスクとして保存"
                          ,"mt_tip" => "Moveable Type （weblog）に投稿する"
			  ,"new_sub" => "新規サブタスク"
                          ,"new_sub_m" => "新規サブ"
                          ,"save" => "<u>保</u>存"
                          ,"save_alt" => "保存"
                          ,"save_as_new" => "新規タスクの保存"
                          ,"wp_tip" => "WordPress （weblog）に投稿する"
                          );

$language->tree = array("due" => "期日："
                       ,"id" => "ID："
                       ,"loading" => $language->messages["js_loading_text"]
                       ,"open_sub_task" => '進行中のサブタスク：１ <span style="color: #666;">（全 __0 個中）</span>' // number
                       ,"open_sub_tasks" => '進行中のサブタスク：__0 <span style="color: #666;">（全 __1 個中）</span>' // number, number
                       ,"status" => "__0% 完了済" // number (0-100)
                       );

?>
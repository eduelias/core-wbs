<?

// english

$language = new language;

$language->name = "Simple_Chinese";
$language->author = "Lemon Hall";
$language->author_email = "lemonhall@hotmail.org";
$language->author_web = "http://lemondog.51.net/wordpress";

$language->charset = "GBK";

// uncomment this if you need to increase the font size from 10px
// $language->font_size = "10px;"; 

$language->about = array("tagline" => "keep stuff organized and get it done."
                        ,"documentation" => "文件"
                        ,"read_me" => "读我"
                        ,"license" => "版权"
                        ,"download" => "下载"
                        ,"this_version" => "这个版本: __0" // number
                        ,"latest_version" => "最新发布版本: __0" // number
                        ,"beta_version" => "最新测试版本: __0" // number
                        ,"using_latest" => "您正在使用的是最新的发布版本."
                        ,"using_beta" => "您正在使用的是最新的测试版本."
                        ,"feedback" => "回应与建议:"
                        ,"web" => "网页:"
                        ,"credits" => "贡献"
                        ,"main_credit" => "Tasks Jr. 是由 <nobr>Alex King</nobr>　所创作并实用化的。并由以下的志愿者进行各个语言的本地化工作:"
                        ,"web_site" => "网站"
                        ,"email" => "电邮"
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

$language->breadcrumbs = array("history" => "历史"
                              ,"home" => "主页"
                              ,"new_task" => "新任务"
                              ,"search" => "搜索"
                              ,"search_results" => "搜索结果"
                              ,"sortable" => "可排序的任务列表"
                              ,"upcoming" => "即将到来的工作项目"
                              );

$language->confirm = array("complete_instructions" => "你所标记为完成的任务下尚有 __0 个尚未完成的子任务。请选择要如何处理:" // number
                          ,"complete_orphan" => "将此任务标记为完成，并设定其子任务无父工作项目"
                          ,"complete_notes" => "输入这个任务的结束备注:"
                          ,"complete_recursive" => "将这个任务及其子任务标记为完成"
                          ,"complete_remove" => "将这个任务标记为完成，并将它所有的子任务移动到其父任务下"
                          ,"complete_title" => "完成任务选项"
                          ,"delete_confirm" => "你确定要删除这个任务么?"
                          ,"delete_instructions" => "将要删除的任务下仍有 __0 个尚未完成的子任务。请选择如何处理:" // number
                          ,"delete_orphan" => "删除这个任务，并将其所属的子任务变成普通任务"
                          ,"delete_recursive" => "删除这个任务及其所属的所有子任务"
                          ,"delete_remove" => "删除这个任务，并将它所有的子任务移动到其父任务下"
                          ,"delete_title" => "删除任务选项"
                          ,"delete_title_m" => "删除任务"
                          );

$language->data = array("no" => "否"
                       ,"priority_1" => "最低"
                       ,"priority_2" => "低"
                       ,"priority_3" => "中"
                       ,"priority_4" => "高"
                       ,"priority_5" => "最高"
                       ,"rel_date" => "__0" // date
                       ,"rel_date_days" => "__0 天" // number
                       ,"rel_date_days_ago" => "__0 天前" // number
                       ,"rel_date_today" => "今天"
                       ,"rel_date_tomorrow" => "明天"
                       ,"rel_date_week" => "一周"
                       ,"rel_date_week_ago" => "一周前"
                       ,"rel_date_yesterday" => "昨天"
                       ,"yes" => "是的"
                       );

$language->email_reminders = array("overdue" => "过期"
                                  ,"due" => "到期"
                                  ,"upcoming" => "即将到来"
                                  ,"high_priority" => "最优先权"
                                  ,"status" => "状态"
                                  ,"complete" => "完成　%"
                                  ,"priority" => "优先顺序"
                                  ,"none" => "(none)"
                                  ,"subject" => "任务提醒"
                                  );

$language->form = array("1_week" => "一周"
                       ,"1_year" => "一年"
                       ,"30_days" => "30 天"
                       ,"90_days" => "90 天"
                       ,"after_save" => "储存后你要:"
                       ,"choose_date" => "选择日期"
                       ,"clear_date" => "清除"
                       ,"date_due" => "到期时间:"
                       ,"date_entered" => "输入资料的日期:"
                       ,"date_modified" => "上次更改的日期:"
                       ,"form_title_edit" => "编辑任务"
                       ,"form_title_new" => "新任务"
                       ,"id" => "序号:"
                       ,"new_task" => "新任务"
                       ,"notes" => "备注:"
                       ,"parent" => "父任务:"
                       ,"priority" => "优先权:"
                       ,"return_home" => "回主页"
                       ,"status" => "完成　%:"
                       ,"status_label" => "完成　%"
                       ,"stay_here" => "留在目前画面"
                       ,"sticky" => "置顶任务"
                       ,"sticky_label" => "置顶任务:"
                       ,"title" => "主题:"
                       ,"today" => "今天"
                       ,"tomorrow" => "明天"
                       ,"url" => "URL:"
                       ,"urls" => "相关网址:"
                       ,"url_1" => "URL 1:"
                       ,"url_2" => "URL 2:"
                       ,"url_3" => "URL 3:"
                       ,"view_parent" => "查看父任务"
                       ,"view_tree" => "查看任务树"
                       );

$language->home = array("sort_title" => "按主题排序"
                       ,"sort_title_rev" => "按主题反向排序"
                       ,"sort_priority" => "按优先权排序"
                       ,"sort_priority_rev" => "按优先权反排序"
                       );

$language->icons = array("completed" => "已完成的任务"
                        ,"delete" => "删除"
                        ,"edit" => "编辑"
                        ,"hide_show" => "隐藏/显示"
                        ,"hide_show_tip" => "隐藏或查看有关这个任务的更多信息"
                        ,"mark_complete" => "标记为完成"
                        ,"new_sub_task" => "新的子任务"
                        ,"notes_bigger" => "扩展备注栏"
                        ,"notes_smaller" => "缩小备注栏"
                        ,"parent_picker" => "选择一个父任务"
                        ,"priority" => "优先权: __0" // result of get_friendly_priority();
                        ,"sticky" => "置顶任务"
                        ,"tree_toggle" => "隐藏/显示"
                        ,"tree_toggle_tip" => "隐藏或查看有关这个任务的更多信息"
                        );

$language->list = array("banner" => "查看 __0 个项目" // number
                       ,"date_due" => "到期时间"
                       ,"done" => "(完成)"
                       ,"id" => "序号"
                       ,"no_items" => "没有任务可供查看。"
                       ,"priority" => "优先权"
                       ,"status" => "完成　%"
                       ,"title" => "主题"
                       );

$language->list_titles = array("history" => "最近 25 个修改过的任务"
                              ,"overdue" => "过期任务"
                              ,"sortable" => "任务列表"
                              ,"upcoming" => "即将到来的任务"
                              );

$language->menu = array("calendar" => "日历(c)"
                       ,"calendar_tip" => "以日历方式查看你的工作任务"
                       ,"history" => "历史(y)"
                       ,"history_tip" => "查看最近 25 个修改的项目"
                       ,"home" => "主页(h)"
                       ,"home_tip" => "回到主页，并查看最上层任务"
                       ,"new_task" => "新任务(t)"
                       ,"new_task_tip" => "新建一个任务"
                       ,"search" => "搜索(a)"
                       ,"search_tip" => "搜索任务"
                       ,"sortable" => "排序(b)"
                       ,"sortable_tip" => "查看所有任务的排序列表"
                       ,"upcoming" => "即将到来(u)"
                       ,"upcoming_tip" => "查看所有即将到来或者过期的项目"
                       );

$language->messages = array("completed" => "任务 &quot;__0&quot; (#__1) 已经被标记为完成。" // title, id
                           ,"completed_reason" => '任务 &quot;__0&quot; (#__1) 已经被标记为完成。原因是:<p style="padding-left: 15px;">__2</p>' // title, id, reason
                           ,"completed_task_link" => "查看已经完成的任务"
                           ,"completed_task_parent_link" => "查看已完成任务的父任务"
                           ,"complete_instructions" => "任务 #__0 有 __1 个子任务 (__2) 个尚未完成，请选择你想要的完成选择" // id, number, number
                           ,"complete_orphan" => "任务 &quot;__0&quot; (#__1) 已标记为完成，且它的所有子任务已经归属到任务 #__2。" // title, id, new parent task id
                           ,"complete_orphan" => "任务 &quot;__0&quot; (#__1) 已标记为完成，且它的所有子任务都已经不再附属于原来的父任务。" // title, id
                           ,"complete_recursive" => "任务 &quot;__0&quot; (#__1) 及其子任务均被标记为完成。" // title, id
                           ,"confirm_delete" => "删除任务: __0?"
                           ,"deleted" => "任务 &quot;__0&quot; (#__1) 已被删除" // title, id
                           ,"delete_instructions" => "任务 #__0 有 __1 个子任务 (__2) 个尚未完成，请选择你想要的删除模式" // id, number, number
                           ,"delete_orphan" => "任务 &quot;__0&quot; (#__1) 已删除，且所有的子任务都已经不再附属于原来的父任务" // title, id
                           ,"delete_recursive" => "任务 &quot;__0&quot; (#__1) 及其所有子任务均被删除。" // title, id
                           ,"delete_remove" => "任务 &quot;__0&quot; (#__1) 已删除，且其所有子任务都已经归属到任务 #__2" // title, id, new parent id
                           ,"err_conflict" => "<b>错误:</b> 这个任务尚未储存<br>这个任务在您开始编辑之后被其他用户更新了。请查看两个版本的不同后再次保存<p>您目前编辑的版本上次更改于 __0;<br>目前储存的版本是在 __1储存的"
                           ,"err_date_format" => "<b>错误:</b> 在 'config.php'中 <b>\$custom->date_format</b> 设定错误。您所设定的值: '__0' 不包含一个或更多的 'm', 'd', 'y'。 请修改后重试。" // date_format
                           ,"err_event_type" => "<b>错误:</b> 在 'config.php'中 <b>\$custom->ical_export_type</b>  您所设定的值: '__0' 不是 'event' 或 'todo'. 请修改后重试。" // ical_export_type
                           ,"err_invalid_date" => "<b>错误:</b> 这个任务并没有被保存，因为指定的日期无效。 修正或清除截止日期后，请再试一次。"
                           ,"err_invalid_parent" => "<b>错误:</b> 任务 #__0 被指定为父任务但有这样序号的任务并不存在。请检查问题后再储存过。" // id
                           ,"err_loop" => "<b>错误:</b> 如果这样储存这个任务，将造成任务间互为父任务。请确认后再试。"
                           ,"err_no_root" => "错误: 没有指定根任务。"
                           ,"err_own_parent" => "<b>错误:</b> 一个任务不可能同时是自己的父任务"
                           ,"err_search_date_after" => "<b>错误:</b> 无法得到任何搜索结果，因为设置的'截止日期在...之后:' 的值无效。修正或清除截止日期后，请再试一次。"
                           ,"err_search_date_before" => "<b>错误:</b> 无法得到任何搜索结果，因为设置的'截止日期在...之前:' 的值无效。修正或清除截止日期后，请再试一次。"
                           ,"err_search_date_exact" => "<b>错误:</b> 无法得到任何搜索结果，因为设置的'截止日期精确比对:' 的值无效。修正或清除截止日期后，请再试一次。"
                           ,"js_abandon_changes" => "尚未储存就离开么?"
                           ,"js_complete_confirm" => "确定要关闭\\n这个任务而不填写任何\\n结束备注么?"
                           ,"js_complete_prompt" => "为这个任务输入结束备注"
                           ,"js_err_edit_date" => "目前在 截止日期 栏的值无效.\\n要在存储之前修改或清除这个值么？"
                           ,"js_err_search_date_after" => "目前在 截止在...之后 栏的值无效."
                           ,"js_err_search_date_before" => "目前在 截止在...之前 栏的值无效."
                           ,"js_err_search_date_exact" => "目前在 到期精确比对 栏的值无效."
                           ,"js_err_search_date_range" => "截止在...之后　的日期必须早于　截止在...之前　的日期"
                           ,"js_err_search_errors" => "警告 - 以下问题必须在得到任何搜索结果前得到更正: \\n"
                           ,"js_err_search_id_invalid" => "‘序号’的值须为空，或者大于0的数字"
                           ,"js_err_search_parent_invalid" => "‘父任务’的须值为空，或者一个大于0的数字"
                           ,"js_err_search_status_exact" => "‘精确比对状态’　值必须是一个0到100的值。"
                           ,"js_err_search_status_less" => "‘精确比...少’　值必须是一个0到100的值。"
                           ,"js_err_search_status_more" => "‘精确比...多’　值必须是一个0到100的值。"
                           ,"js_err_search_status_range" => "‘精确比...少’　值必须比　‘精确比...少’　的值大"
                           ,"js_loading_text" => "读取中..."
                           ,"js_nothing_to_save" => "抱歉，目前画面中没有什么好储存的"
                           ,"js_parent_required" => "您必须指定这个任务的父任务号\\n以便储存之后查看其父任务"
                           ,"mail_sent" => "每日提醒已用EMAIL寄出"
                           ,"mobile_resolve_instructions" => "您所输入的资料会显示在目前资料库中的资料下。做出你所要的变更，然后点击‘储存’"
                           ,"no_email" => "请在config.php中加入您的电邮地址"
                           ,"parent_changed" => "父任务从 __0 t更改成 __1." // old parent id, new parent id
                           ,"saved" => "在 #__0 (__1) 储存任务 __2." // id, title, timestamp
                           ,"title" => "信息(Messages)"
                           ,"warn_deleted" => "<b>警告:</b> 这个任务已被删除。"
                           );

$language->misc = array("all_rights_reserved" => "保留所有版权"
                       ,"copyright" => "版权所有"
                       ,"count_open" => "__0 个未完成的任务" // number
                       ,"count_total" => "__0 个任务" // number
                       ,"hide_completed" => "隐藏已经完成的任务"
                       ,"jump_to" => "跳到..."
                       ,"quick_search" => "快速搜索"
                       ,"show_completed" => "查看已经完成的任务"
                       ,"timer" => "本页面在 __0 秒内绘制完毕" // seconds
                       ,"version" => "版本 __0" // number
                       );

$language->picker = array("date_go" => "前往"
                         ,"date_key_selected" => "目前选择的日期"
                         ,"date_key_today" => "今天的日期"
                         ,"date_next" => "下一个"
                         ,"date_previous" => "上一个"
                         ,"date_today" => "今天"
                         ,"days" => "'周日','周一','周二','周三','周四','周五','周六'"
                         ,"months" => "'一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'"
                         ,"parent_title" => "选择一个父任务"
                         );

$language->resolve = array("append" => "附加在之后"
                          ,"current_version" => "目前的版本"
                          ,"form_title" => "以下的栏位没有差异"
                          ,"none" => "(none)"
                          ,"save" => "储存"
                          ,"use" => "使用"
                          ,"your_data" => "您的资料"
                          );

$language->search = array("after" => "在...之后："
                         ,"before" => "在...之前:"
                         ,"exactly" => "精确比对:"
                         ,"form_title" => "搜索条件"
                         ,"include_completed" => "包含已经完成的任务"
                         ,"instructions" => "键入您想查询的关键字，它们可以出现在主题或者备注中。默认情况下，包含您所输入的所有关键字的任务记录才会被匹配。 点击“更多搜索选项”您可以得以高级搜索"
                         ,"less_than" => "比...更少:"
                         ,"more_options" => "更多搜索选项"
                         ,"more_than" => "比...更多:"
                         ,"results_title" => "搜索结果"
                         ,"search_button" => "搜索"
                         );

$language->toolbar = array("b2_tip" => "发布到 b2"
                          ,"date_time" => "插入　时间/日期"
                          ,"date_time_tip" => "在备注栏插入目前的日期/时间"
                          ,"delete" => "删除"
                          ,"edit" => "编辑"
                          ,"mark_complete" => "标记为完成"
                          ,"mark_complete_m" => "100%"
                          ,"mt_tip" => "发布到　Moveable Type"
                          ,"new_sub" => "新建子任务"
                          ,"new_sub_m" => "New Sub"
                          ,"save" => "储存"
                          ,"save_alt" => "储存"
                          ,"save_as_new" => "另存为一个新任务"
                          ,"wp_tip" => "发布到 WordPress"
                          );

$language->tree = array("due" => "到期:"
                       ,"id" => "序号:"
                       ,"loading" => "读取中" // no need to set this
                       ,"open_sub_task" => '1 尚未完成的子任务 <span style="color: #666;">(共__0 个)</span>' // number
                       ,"open_sub_tasks" => '__0 尚未完成的子任务 <span style="color: #666;">(共__1 个)</span>' // number, number
                       ,"status" => "__0% 完成" // number (0-100)
                       );

?>
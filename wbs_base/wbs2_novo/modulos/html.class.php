<?php
/*
 * Class  : HTMLSITE
 * Autor  : Calvin
 * Data   : 2003-05-12
 * Licensa: Free
 *
 * Descrição:
 * - Classe para gerar código HTML para formulário e tabela no padrão XHTML 1.0 do W3C
 *  
*/
define('HTMLSITE_INC',true);
class HTMLSITE
{
	var $html = '';
	var $bgcounter = '';
	var $target = '';
	var $htmldir = 'ltr';
	var $charset = 'iso-8859-1';
	var $source = true;
	var $doctype = 'transitional';
	var $title = ' ';
	var $jscript = '';
	var $hidden_fields = '';
	
	/* css class names */
	var $css_form_button_main = 'class="mainoption"';
	var $css_form_button_lite = 'class="liteoption"';
	var $css_form = ''; // 'class="formline"';
	var $css_table = 'class="tableline"';
	
	function HTMLSITE($case=1) {
		$this->set_var('todo',$case);
	}
	/* ################################ COSMETIC ################################ */
	function get_row_bg() {
		if ($this->bgcounter++%2 == 0)
		{
			return 'class="firstalt"';
		} else {
			return 'class="secondalt"';
		}
	}
	/* ################################ CONTROL ################################ */
	function set_var($varname,$value='') {
		$this->$varname = $value;
	}
	function set_css($value='') {
		$this->css = $value;
	}
	function set_javascript($value='') {
		$this->jscript = $value;
	}
	function todo($str='') {
		switch ($this->todo)
		{
			case 1: // print
				echo $str;
				break;
			case 2: // get source
				return $str;
				break;
			case 3: // memory
				$this->html .= $str;
				break;
		}
	}
	function clean($name='') {
		if (empty($name))
		{
			$this->html = '';
			$this->bgcounter = '';
			$this->target = '';
			$this->charset = '';
			$this->htmldir = '';
			$this->hidden_fields = '';
		} else {
			$this->set_var($name);
		}
	}
	
	/* ################################ TEXT ################################ */
	function html_ahref($url,$text,$title='') {
		$target = !empty($this->target)? ' target="'. $this->target .'"' : '';
		$_html = '<a href="'. $url .'" title="'. $title .'"'. $target .'>'. $text .'</a>';
		return $_html;
	}
	
	/* ################################ FORM ################################ */
	function form_input($title,$name,$value='',$htmlise=true,$size=35) {
		if ($htmlise)
		{
			$value = htmlspecialchars(stripslashes($value),ENT_QUOTES);
		}
		$_html = "<tr ". $this->get_row_bg() ." valign='top'>
			<td><b>". $title ."</b></td>
			<td><input type='text' size='". $size ."' name='". $name ."' value='". $value ."' /> $_thumb </td>
		</tr>\n";
		$this->todo($_html);
	}
	
	function form_file($title,$name) {
		$_html = "<tr ". $this->get_row_bg() ." valign='top'>
			<td><b>". $title ."</b></td>
			<td><input type='file' name='". $name ."' value='' /></td>
		</tr>\n";
		$this->todo($_html);
	}
	
	function form_hidden($name,$value='',$htmlise=true) {
		if (is_array($name))
		{
			foreach ($name as $key=>$val)
			{
				if ($htmlise)
				{
					$value = htmlspecialchars(stripslashes($value),ENT_QUOTES);
				}
				$_html .= "<input type='hidden' name='". $key ."' value='". $val ."' />\n";
			}
		} else {
			if ($htmlise)
			{
				$value = htmlspecialchars(stripslashes($value),ENT_QUOTES);
			}
			$_html .= "<input type='hidden' name='". $name ."' value='". $value ."' />\n";
		}
		$this->hidden_fields .= $_html;
		return $_html;
	}
	
	function form_password($title,$name,$value='',$htmlise=true,$size=35) {
		if ($htmlise)
		{
			$value = htmlspecialchars(stripslashes($value),ENT_QUOTES);
		}
		$_html = "<tr ". $this->get_row_bg() ." valign='top'>
			<td><b>". $title ."</b></td>
			<td><input type='password' size='". $size ."' name='". $name ."' value='". $value ."' /></td>
		</tr>\n";
		$this->todo($_html);
	}
	
	function form_textarea($title,$name,$value='',$rows=4,$cols=40,$htmlise=1) {
		if ($htmlise)
		{
			$value = htmlspecialchars(stripslashes($value),ENT_QUOTES);
		}
		$_html = "<tr ". $this->get_row_bg() ." valign='top'>
			<td><b>". $title ."</b></td>
			<td><textarea name='". $name ."' rows='". $rows ."' cols='". $cols ."'>". $value ."</textarea></td>
		</tr>\n";
		$this->todo($_html);
	}
	
	function form_yesno($title,$name,$value=1) {
		$_html = "<tr ". $this->get_row_bg() ." valign='top'>
		<td><b>". $title ."</b></td>
			<td>
				Sim <input type='radio' name='". $name ."' value='1' ".( ($value==1)? 'checked="checked"':'' )." />
				Não <input type='radio' name='". $name ."' value='0' ".( ($value==0 || empty($value))? 'checked="checked"':'' )." />
			</td>
		</tr>\n";
		$this->todo($_html);
	}
	
	function form_select($title,$name,$value='',$select='',$extra='') {
		$output = $extra;
		if (is_array($value))
		{
			foreach ($value as $key => $val)
			{
				$selected = ($select==$key)? 'selected="selected"' : '';
				$output .= "<option value='". $key ."' $selected>". htmlspecialchars(stripslashes($val),ENT_QUOTES) ."</option>\n";
			}
		} else {
			$output = $value;
		}
		$_html = "<tr ". $this->get_row_bg() ." valign='top'>
			<td><b>". $title ."</b></td>
			<td><select name='". $name ."'>". $output ."</select></td>
		</tr>\n";
		$this->todo($_html);
	}
	
	function form_option($value='',$select='',$extra='') {
		$_html = $extra;
		if (is_array($value))
		{
			foreach ($value as $key => $val)
			{
				$selected = ($select==$key)? 'selected="selected"' : '';
				$_html .= "<option value='". $key ."' $selected>". htmlspecialchars(stripslashes($val),ENT_QUOTES) ."</option>\n";
			}
		} else {
			$_html = $value;
		}
		$this->todo($_html);
	}
	
	function form_radio($title,$name,$value='',$select='') {
		if (is_array($value))
		{
			foreach ($value as $key => $val)
			{
				$selected = ($select==$key)? 'checked="checked"' : '';
				$options .= "<input type='radio' name='". $name ."' value='". $val ."' $selected /> $val<br />\n";
			}
		} else {
			$options = $value;
		}
		$_html = "<tr ". $this->get_row_bg() ." valign='top'>
			<td><b>". $title ."</b></td>
			<td>". $options ."</td>
		</tr>\n";
		$this->todo($_html);
	}
	
	function form_checkbox($title,$name,$value='',$text='') {
		$_html = "<tr ". $this->get_row_bg() ." valign='top'>
			<td><b>". $title ."</b></td>
			<td><input type='checkbox' name='". $name ."' value='". $val ."' ".( ($select)? 'checked="checked"' : '' )." /> $text </td>
		</tr>\n";
		$this->todo($_html);
	}
	function form_date($title,$name,$select='',$order='ymd',$s_year='',$e_year='') {
		if(is_array($name))
		{
			$f_yr = $name['y'];
			$f_mo = $name['m'];
			$f_da = $name['d'];
		}
		// select
		$yr = strval(substr($select,0,4));
		$mo = strval(substr($select,5,2));
		$da = strval(substr($select,8,2));
		// day
		for($i=1; $i<32; $i++)
		{
			$selected = ($i==$da)? 'selected="selected"' : '';
			$_html .= "<option value='". $i ."' $selected>". $i ."</option>\n";
		}
		$_html_da = "<select name='". $f_da ."'><option value=''>Dia</option>\n". $_html ."</select> \n";
		$_html = '';
		//month
		for($i=1; $i<13; $i++)
		{
			$selected = ($i==$mo)? 'selected="selected"' : '';
			$_html .= "<option value='". $i ."' $selected>". $i ."</option>\n";
		}
		$_html_mo = "<select name='". $f_mo ."'><option value=''>Mês</option>\n". $_html ."</select> \n";
		$_html = '';
		//year
		$s_year = empty($s_year)? date('Y') : $s_year;
		$e_year = empty($_eyear)? date('Y')+1 : $e_year;
		for($i=$s_year; $i< $e_year; $i++)
		{
			$selected = ($i==$yr)? 'selected="selected"' : '';
			$_html .= "<option value='". $i ."' $selected>". $i ."</option>\n";
		}
		$_html_yr = "<select name='". $f_yr ."'><option value=''>Ano</option>\n". $_html ."</select> \n";
		
		$_html = "<tr ". $this->get_row_bg() ." valign='top'>
			<td><b>". $title ."</b></td>\n";
		switch($order)
		{
			case 'dmy':
				$_html .= "<td>". $_html_da ." ". $_html_mo ." ". $_html_yr ."(DD/MM/AAAA)</td>";
				break;
			case 'mdy':
				$_html .= "<td>". $_html_mo ." ". $_html_da ." ". $_html_da ."(MM/DD/AAAA)</td>";
				break;
			default:
				$_html .= "<td>". $_html_yr ." ". $_html_mo ." ". $_html_da ."(AAAA/MM/DD)</td>";
		}
		$_html .= "\n</tr>\n";
		$this->todo($_html);
	}

	/* ################################ OUTPUT ################################ */
	function show() {
		echo $this->html;
	}
	
	function getsource() {
		return $this->html;
	}
	
	function form_header($script,$uploadform=0,$name='formname',$addtable=true) {
		$_html = "\n<form action='". $script ."' ".( ($uploadform)? "enctype='multipart/form-data'":'' )." name='". $name ."' method='post' ". $this->css_form .">\n";
		if ($addtable)
		{
			$_html .= "<table width='100%' cellpadding='4' cellspacing='1' border='0' align='center' ". $this->css_table .">\n";
		}
		$this->todo($_html);
	}
	
	function form_footer($submit='Submit',$reset='Reset',$addtable=true) {
		if ($addtable)
		{
			$_html = "</table>\n";
		}
		$_html .= "<table width='100%' cellpadding='4' cellspacing='1' border='0' align='center' ". $this->css_table .">
		<tr>
			<td align='center'><input type='submit' name='submit' value=' ". $submit ." ' ". $this->css_form_button_main ." /></td>
			<td align='center'><input type='reset' name='reset' value=' ". $reset ." ' ". $this->css_form_button_lite ." /></td>
		</tr>
		</table>\n";
		$_html .= $this->hidden_fields;
		$_html .= "</form>\n";
		$this->todo($_html);
	}
	
	function form_title($title) {
		$_html .= "\n<tr>
			<th colspan='2'>". $title ."</th>
		</tr>\n";
		$this->todo($_html);
	}
	
	function form_row($title,$str,$desc='') {
		$_html = "<tr ". $this->get_row_bg() ." valign='top'>
			<td><b>". $title ."</b><br />". $desc ."</td>
			<td>". $str ."</td>
		</tr>\n";
		$this->todo($_html);
	}
	
	/* ################################ PAGE ################################ */
	function page_header($title='',$extra='') {
		
		$title = empty($title)? $this->title : $title;
		/* $_html = '<?xml version="1.0"?>'."\n"; <? */
		$_html = '';
		$this->doctype = strtolower($this->doctype);
		switch($this->doctype)
		{
			case 'transitional':
				$_html .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'."\n";
				break;
			case 'frameset':
				$_html .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">'."\n";
				break;
			case 'strict':
				$_html .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">'."\n";
			break;
		}
		//$_html .= '<html dir="'. $this->htmldir .'" xml:lang="'. $this->lang .'" lang="'. $this->lang .'">'."\n";
		$_html .= '<html>'."\n";
		$_html .= "<head>\n";
		$_html .= !empty($this->css)? "<link href='". $this->css ."' rel='stylesheet' type='text/css' media='all' />\n" :'';
		$_html .= !empty($this->jscript)? "<script src='". $this->jscript  ."' type='text/javascript'></script>\n" :'';
		$_html .= empty($extra)? $extra ."\n": '';
		$_html .= "<title>". $title ."</title>\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=". $this->charset ."\" />\n</head>\n<body>\n";
		$this->todo($_html);
	}
	
	function page_footer($extra='') {
		$_html = $extra;
		$_html .= "\n</body>\n</html>";
		$this->todo($_html);
	}
	
	/* ################################ TABLES ################################ */
	function table_header($title,$colspan=2) {
		$_html = "\n<table width='100%' cellpadding='4' cellspacing='1' border='0' ". $this->css_table .">\n
		<tr><th colspan='". $colspan ."'>". $title ."</th></tr>\n";
		$this->todo($_html);
	}
	
	function table_footer() {
		$_html = "</table>\n";
		$this->todo($_html);
	}
	
	function table_row($value,$colspan='') {
		$_html .= "<tr>";
		if (is_array($value))
		{
			foreach ($value as $key => $val)
			{
				$_html .= "<td>". $val ."</td>\n";
			}
		} else {
			$colspan = !empty($colspan)? ' colspan="$colspan"' : '';
			$_html .= "<td $colspan>". $value ."</td>\n";
		}
		$_html .= "</tr>\n";
		$this->todo($_html);
	}
	
	function table_td($value) {
		$_html .= "<td>". $value ."</td>\n";
		$this->todo($_html);
	}
}

?>

<?
$f_timer = ereg_replace('0\.([0-9\.]*) ([0-9]*)','\\2.\\1',microtime());
$loadpage = ($f_timer-$d_timer);
$loadpage = number_format($loadpage, 4, ',', '');
?><center>

<table width="100%"  border="0" cellpadding="3" cellspacing="3" class="rodape" style="font-size:9px;" bgcolor="#EDEDED">
      <tr>
        <td align="center" colspan="6">Copyright &copy; 2002/<?php echo date(Y); ?> - Todos os direitos reservados.<br>
      Processado em <? echo $loadpage; ?> segundos. <? echo $_SESSION['BIRTH']; //$tipegueiprint; ?></td>
      </tr>
	<tr>
	<td width="20%">&nbsp;</td>
    <td align="center"><a href="http://www.php.net" target="_blank"><img src="<?=IMAGES?>bt_php.gif" width="80" height="15" border="0"></a></td>
    <td align="center"><a href="http://www.mysql.com" target="_blank"><img src="<?=IMAGES?>bt_mysql.gif" width="80" height="15" border="0"></a></td>
    <td align="center"><a href="http://adodb.sourceforge.net/" target="_blank"><img src="<?=IMAGES?>bt_adodb.gif" width="80" height="15" border="0"></a></td>
    <td align="center"><a href="http://developer.yahoo.com/yui/" target="_blank"><img src="<?=VIMAGES?>bt_yui.gif" width="80" height="15" border="0"></a></td>
    <td width="20%">&nbsp;</td>
    <tr>
    </table>
</center>
</body>
</html>
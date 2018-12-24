<?

ob_implicit_flush();

class MSN
{
    var $_AccountName = '';
    var $_AccountPassword = '';

//    var $_DisServerAddress = '207.46.106.175';
    var $_DisServerAddress = 'messenger.hotmail.com';
    var $_DisServerPort = 1863;
    var $_NotServerAddress;
    var $_NotServerPort;
    var $_Debug = false;
    var $_Connected = false;
    var $_Socket;
    var $_iD = 0;
    var $_EncodeProtocol = 'MD5';
    var $_MSNver = '5.0.0543';
    var $_Status = array(
                        "Online"          => "NLN",        // Áª»ú
                        "Offline"         => "FLN",        // ÍÑ»ú
                        "Hidden"          => "HDN",        // ÒþÉí
                        "Idle"            => "IDL",        // ·¢´ô
                        "Away"            => "AWY",        // Àë¿ª
                        "Busy"            => "BSY",        // Ã¦Âµ
                        "Be Right Back"   => "BRB",        // ÂíÉÏ»ØÀ´
                        "On the Phone"    => "PHN",        // ½ÓÌýµç»°
                        "Out to Lunch"    => "LUN",        // Íâ³ö¾Í²Í
                        );
    var $_ConnectStatus = '';
    var $_useLanguage = '0x0804';
    var $MSNProtocol = 'MSNP2';
    var $ScreenName = '';
    var $TimeOut = 30;
    var $ScanTime = 1;
    var $ERRiD;
    var $ERRiNFO = '';
    function MSN( $_AccountName, $_AccountPassword, $ScreenName = "", $_ConnectStatus = "Online" )
    {
        if ( $_AccountName )
            $this->_AccountName = $_AccountName;
        else
            return false;

        if ( $_AccountPassword )
            $this->_AccountPassword = $_AccountPassword;
        else
            return false;

        if ( $ScreenName )
            $this->ScreenName = $ScreenName;
        else
            $this->ScreenName = $this->_AccountName;

        if ( $_ConnectStatus )
            $this->_ConnectStatus = $this->_Status[$_ConnectStatus];
        else
            $this->_ConnectStatus = $this->_Status["Online"];
    }

    function Login()
    {
        if ( $this->_Debug )
            $this->_ShowDebug( "ÕýÔÚÁ¬½Ó MSN µÄ Dispatch ·þÎñÆ÷¡­¡­", "black" );
        if ( !$this->_Connected )
            if ( $this->_Socket = @fsockopen( $this->_DisServerAddress, $this->_DisServerPort, $this->ERRiD, $this->ERRiNFO, $this->TimeOut ) )
                $this->_Connected = true;
            else
                die( "Á¬½Ó Dispatch ·þÎñÆ÷³ö´í£¡" );
        $this->_SendCMD( 'VER '.$this->_iD.' '.$this->MSNProtocol );

        if ( eregi( '^VER ', $this->_RecvData() ) )
        {
            if ( $this->_Debug )
                $this->_ShowDebug( "Óë MSN µÄ Dispatch ·þÎñÆ÷£º$this->_DisServerAddress Í¨Ñ¶³É¹¦", "green" );
        }
        $this->_SendCMD( 'INF '.$this->_iD++ );

        if ( eregi( '^INF ', $this->_RecvData() ) )
        {
            if ( $this->_Debug )
                $this->_ShowDebug( "ÒÑ¾­µÃµ½¼ÓÃÜ°üÁË£¡", "green" );
        }

        $this->_SendCMD('USR ' . $this->_iD++ . ' ' . $this->_EncodeProtocol . ' I ' . $this->_AccountName);

        $inbound = $this->_RecvData();

        if (eregi('^XFR ', $inbound))
        {
            if ( $this->_Debug )
                $this->_ShowDebug( "ÓÃ»§µÄ Passport ×ÊÁÏÕýÔÚ·¢ËÍ£¬µÈ´ý´«ÊäÖÐ", "black" );

            @list($cmd, $trid, $type, $info, $etc) = explode(' ', $inbound);

            $info = trim($info);

            if ( $this->_Debug )
                $this->_ShowDebug( "ÒÑ¾­½ÓÊÕµ½´«Êä·þÎñÆ÷µÄÐÅÏ¢£º$info", "black" );

            @list($srv, $prt) = explode(':', $info);

            $this->_NotServerAddress = $srv;

            $this->_NotServerPort = $prt;

            if ( $this->_Debug )
                $this->_ShowDebug( "Notification ·þÎñÆ÷µÄµØÖ·Îª£º$srv", "blue" );

            if ( $this->_Debug )
                $this->_ShowDebug( "Notification ·þÎñÆ÷µÄµØÖ·Îª£º$prt", "blue" );

            if ( $this->_Debug )
                $this->_ShowDebug( "¹Ø±ÕÓë Dispatch ·þÎñÆ÷µÄ SocketÁ¬½ÓÖÐ¡­¡­", "blue" );

            $this->_Connected = false;

            $this->_LoginNotificationServer();
        }

    }

    function KeepConnect()
    {
        while( 1 )
        {
            $_RecivedData = $this->_RecvData();
            if( eregi( '^RNG ', $_RecivedData ) )
                $bla = new _MSNuser( $_RecivedData, $this->_AccountName );

//            usleep( $this->ScanTime * 1000 );
        }
    }

    function Debug( $_DebugStatus = true )
    {

        $this->_Debug = $_DebugStatus;

    } // ½áÊø Debug º¯Êý

    function _LoginNotificationServer() {

        if ( $this->_Debug )
            $this->_ShowDebug( "¿ªÊ¼Óë Notification ·þÎñÆ÷Á¬½Ó", "black" );

        if ( !$this->_Connected )
        {
            if ( !($this->_Socket = @fsockopen( $this->_NotServerAddress, $this->_NotServerPort, $this->ERRiD, $this->ERRiNFO, $this->TimeOut )) )
                die("noti");

            $this->_Connected = true;


            $this->_SendCMD( 'VER '.$this->_iD++.' '.$this->MSNProtocol );

            if ( eregi( '^VER ', $this->_RecvData() ) )
            {
                if ( $this->_Debug )
                    $this->_ShowDebug( "Óë Notification µÄ·þÎñÆ÷£¨$this->_NotServerAddress£©Í¨Ñ¶³É¹¦", "green" );
            }


            $this->_SendCMD( 'INF '.$this->_iD++ );

            if ( eregi( '^INF ', $this->_RecvData() ) )
            {
                // ¼ÙÈçÉèÖÃÐèÒªµ÷ÊÔ±ê¼Ç£¬ÔòÊä³öµ±Ç°Ö´ÐÐµÄ×´Ì¬
                if ( $this->_Debug )
                    $this->_ShowDebug( "ÒÑ¾­È¡µÃ¼ÓÃÜ°ü", "green" );
            }


            $this->_SendCMD( 'USR '.$this->_iD++.' '.$this->_EncodeProtocol.' I '.$this->_AccountName );

            $inbound = $this->_RecvData();

            if ( eregi( '^USR ', $inbound ) )
            {
                @list( $cmd, $trid, $enc, $mode, $digest ) = explode( ' ', $inbound );

                if ( trim( $mode ) == 'S' )
                {
                    // ¼ÙÈçÉèÖÃÐèÒªµ÷ÊÔ±ê¼Ç£¬ÔòÊä³öµ±Ç°Ö´ÐÐµÄ×´Ì¬
                    if ( $this->_Debug )
                        $this->_ShowDebug( "ÒÑ¾­È¡µÃ¼ÓÃÜÄ£Ê½", "green" );

                    $encpass = md5( trim( $digest ) . $this->_AccountPassword );

                    $this->_SendCMD( 'USR '.$this->_iD++.' MD5 S '.$encpass );

                    // ¼ÙÈçÉèÖÃÐèÒªµ÷ÊÔ±ê¼Ç£¬ÔòÊä³öµ±Ç°Ö´ÐÐµÄ×´Ì¬
                    if ( $this->_Debug )
                        $this->_ShowDebug( "¼ÓÃÜºóµÄÕËºóÃÜÂë·¢ËÍÖÐ£º$encpass", "black" );
                }
            }


            $final = $this->_RecvData();

            if ( eregi( '^USR ', $final ) )
            {
                @list( $cmd, $trid, $stat, $usr, $sn, $etc ) = explode( ' ', $final );

                if ( trim( $stat ) == 'OK' )
                {
                    // ¼ÙÈçÉèÖÃÐèÒªµ÷ÊÔ±ê¼Ç£¬ÔòÊä³öµ±Ç°Ö´ÐÐµÄ×´Ì¬
                    if ( $this->_Debug )
                        $this->_ShowDebug( "µÇÂ½ MSN ³É¹¦¡£", "green" );

                    // ·¢ËÍµÇÂ½ºóÏÔÊ¾ÎÒµÄ×´Ì¬µÄÖ¸Áî
                    $this->_SendCMD( 'CHG '.$this->_iD++.' '.$this->_ConnectStatus );

                    $this->_SendCMD( 'BLP '.$this->_iD++.' AL' );

                    // ·¢ËÍÏÔÊ¾Ãû³Æ
                    $this->_SendCMD( 'REA '.$this->_iD++.' '.$this->_AccountName.' '.urlencode( $this->ScreenName ) );

//                        $this->_SendCMD('CVR '.$this->_iD++.' 5.0.0543 5.0.0543 1.0.0000');
                    $this->_SendCMD('CVR '.$this->_iD++.' '.$this->_useLanguage.' win 4.10 i386 MSMSGS '.$this->_MSNver.' MSMSGS');
                }
            }
        }
    }


    function _RecvData()
    {
        if ( !$this->_Connected )
            return false;

        $OriginalData = fgets( $this->_Socket, 2048 );

        if( $OriginalData != "" )
        {
            if ( $this->_Debug )
                $this->_ShowDebug( "ÒÑ¾­ÊÕµ½Êý¾Ý£º$OriginalData", "green" );

            flush();

            return $OriginalData;
        }

        else
            return false;
    }

    function _SendCMD( $Data, $DataStream = "ASCII" )
    {
        if ( !$this->_Connected )
            return false;

        if ( $this->_Debug )
            $this->_ShowDebug( "ÕýÔÚ·¢ËÍÖ¸Áî£º$Data", "red" );

        flush();

        if( $DataStream == "ASCII" )
            $Data = $Data."\r\n";

        return fputs( $this->_Socket, $Data );
    } // ½áÊø _SendCMD º¯Êý

    function _ShowDebug( $_descINFO, $_descCOLOR )
    {

        echo "<font color=$_descCOLOR>";
        echo $_descINFO;
        echo "</font><br>";

    } // ½áÊø _ShowDebug º¯Êý

} // ½áÊø MSN Àà¿â

class _MSNuser
{
    var $TimeOut = 30;
    var $_Connected = false;
    var $ERRiD;
    var $ERRiNFO = '';
    var $ScanTime = 1;
    var $_Socket;
    var $_switchip;
    var $_switchport;
    var $_iD = 1;
    var $_end = false;
    function _MSNuser( $_OriginalData, $_AccountName ){
        echo "nieuwe";

//        $this->_iD = 1;

        @list( $cmd, $sesid, $switchip, $bla, $hash, $contact_email, $contact_name ) = explode( " ", $_OriginalData );
//echo "·ÖÎöµÃµ½£º".$switchip;

        @list( $this->_switchip, $this->_switchport ) = explode( ":", $switchip );

        if ( $this->_Debug )
            $this->_ShowDebug( "ÕýÔÚÁ¬½ÓµØÖ·£º$this->_switchip", "red" );

        if ( $this->_Debug )
            $this->_ShowDebug( "ÕýÔÚÁ¬½Ó¶Ë¿Ú£ºthis->_switchport", "red" );

        if ( $this->_Socket = fsockopen( $this->_switchip, $this->_switchport, $this->ERRiD, $thos->ERRiNFO, $this->TimeOut ) )
            $this->_Connected = true;

//        die("unablue cont contact");

        //set_file_buffer($this->_Socket,0);

        //ANS 1 212dewse@hotmail.com 989495494.750408580 11742066

        $this->_SendCMD( "ANS ".$this->_iD++." ".$_AccountName." ".$hash." ".$sesid );

/*        while( $this->_Connected )
        {

            if ($this->_RecvData()) {

                if ($this->_end) {
//                    usleep( 10 * 1000 );
                }
            }
        }
*/
//        $this->SendMSG("ÄãºÃ£¬ÎÒÊÇ»úÆ÷ÈË£¬\r\nÈç¹ûÄãÓÐÊ²Ã´ÊÂÇéÇëÊäÈëÒÔÏÂÖ¸Áî£º\r\n\/help\r\n\/time\r\n\/date\r\n\/bye\r\n\/killserver");

while (!feof($this->_Socket))
{
    $output=fgets( $this->_Socket,2048);
    if(ereg("hi",$output))
    {
        $this->SendMSG("hello ".$_AccountName);
    }
    if(ereg("fuck",$output))
    {
        $this->SendMSG("hey man, dont say this!");
    }
    if(ereg("/time",$output))
    {
        $time=date("H:i");
        $this->SendMSG($time);
    }
    if(ereg("/date",$output))
    {
        $time=date("m-d-y");
        $this->SendMSG($time);
    }
    if(ereg("/bye",$output))
    {
        $this->SendMSG( "Bai" );
        $this->_SendCMD( "OUT", "BIN" );
/*        echo"Connection to switchboard closed<br><script>self.close();</script>";*/
//        exit;
    }
    if(ereg("/killserver",$output))
    {
        $this->SendMSG( "Bai" );
        $this->_SendCMD( "OUT", "BIN" );
/*        echo"Connection to switchboard closed<br><script>self.close();</script>";*/
        exit;
    }
    if(ereg("TypingUser: ",$output))
    {
/*        echo "<script>document.bgColor = \"#113311\";setTimeout(\"black()\", 5000);</script>"; */
    }
}

    } // ½áÊø _MSNuser µÄÏ¤¹¹º¯Êý

    function SendMSG( $_MSG ){

//        $header = "MIME-Version: 1.0\r\nContent-Type: text/plain; charset=UTF-8\r\nX-MMS-IM-Format: FN=MS%20Shell%20Dlg; EF=; CO=0; CS=0; PF=0\r\n\r\n";
    $header ="MIME-Version: 1.0" . "\r\n";
    $header .="Content-Type: text/plain; charset=UTF-8" . "\r\n\r\n";

      $header .= $_MSG;

    $this->_SendCMD( 'MSG '.$this->_iD++.' N '.strlen( $header )."\r\n".$header, "BIN" );
    }

    function _RecvData()
    {


        $d = fgets ( $this->_Socket, 2048 );

        $_result = trim( $d );
if ($_result)
{
    flush();
//    return $_
}
        // Çå¿Õ Socket ÖÐµÄÄÚÈÝ

        return $d;
    }

    function _ParseData($Origin)
    {


        $d = fgets ( $this->_Socket, 2048 );

        flush();

        return $d;
    }


    function _SendCMD( $_CMD, $_DataType = "ASCII" )
    {
//        $_Data = $_CMD." ".$this->_iD++." ".$_Data;
        $_Data = $_CMD;

        if ( $this->_Debug )
            $this->_ShowDebug( "ÕýÔÚ·¢ËÍÊý¾Ý£¨µ½¶Ô·½ÓÃ»§£©£º$data", "red" );

        if( $_DataType = "ASCII" )
            $_Data .= "\r\n";

        return fputs( $this->_Socket, $_Data );

        flush();

    } // ½áÊø _SendCMD º¯Êý

    function _ShowDebug( $_descINFO, $_descCOLOR )
    {
        echo "<font color=$_descCOLOR>";
        echo $_descINFO;
        echo "</font><br>";
    }
}

?>
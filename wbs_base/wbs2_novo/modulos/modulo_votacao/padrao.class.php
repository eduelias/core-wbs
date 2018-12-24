<?php

/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2005 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     padrao.class.php
+--------------------------------------------------------------
*/

class Padrao extends ADOConnection
{

    var $conn ;

    function connect_wbs()
    {
        $this->$conn =& New ADOConnection(WBS_TIPODB);
        if (!$this->$conn) die("Connection failed");
        $this->$conn->debug = false;
        $this->$conn->Connect(WBS_SERVER, WBS_USER, WBS_PASSWORD, WBS_DB);

    } //function
    
     function connect_data()
    {
        $this->$conn =& New ADOConnection(DATA_TIPODB);
        if (!$this->$conn) die("Connection failed");
        $this->$conn->debug = true;
        $this->$conn->Connect(DATA_SERVER, DATA_USER, DATA_PASSWORD, DATA_DB);

    } //function
    
     function disconnect()
    {
        $this->$conn->Close;

    } //function
    
    function format_str ($formato, $str)
    {
        if ($formato == "UP")
        {
            $str = strtoupper($str);
        } //if
        if ($formato == "DOWN")
        {
            $str = strtolower($str);
        } //if
        if ($formato == "FIRT")
        {
            $str = ucfirst(strtolower($str));
        } //if
        
        return $str;
    } //function
}

?>

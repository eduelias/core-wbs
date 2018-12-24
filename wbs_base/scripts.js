

function submitForm() {
        document.Form.submit();
}

function elemdisable(callingElement) {
  
   if (document.Form.idicj.checked==true)
  {
	   callingElement.disabled=false;
  }
  else
  {
	   callingElement.disabled=true;
  } 
  
}

function func2() {
  
   if (document.Form.tipo[1].checked==true)
  {
	   
	   document.Form.rs.disabled=false;
	   document.Form.ie.disabled=false;
	   document.Form.cgc.disabled=false;
	   document.Form.rg.disabled=true;
	   document.Form.cpf.disabled=true;
  }
  else
  {
	  document.Form.rs.disabled=true;
	   document.Form.ie.disabled=true;
	   document.Form.cgc.disabled=true;
	   document.Form.rg.disabled=false;
	   document.Form.cpf.disabled=false;
	   
  } 
  
}



function MakeArray(n) {
	this.length = n
	return this
}
monthNames = new MakeArray(12)
monthNames[1] = 'Janeiro'
monthNames[2] = 'Fevereiro'
monthNames[3] = 'Março'
monthNames[4] = 'Abril'
monthNames[5] = 'Maio'
monthNames[6] = 'Junho'
monthNames[7] = 'Julho'
monthNames[8] = 'Agosto'
monthNames[9] = 'Setembro'
monthNames[10] = 'Outubro'
monthNames[11] = 'Novembro'
monthNames[12] = 'Dezembro'
dayNames = new MakeArray(7)
dayNames[1] = 'Domingo'
dayNames[2] = 'Segunda'
dayNames[3] = 'Terça'
dayNames[4] = 'Quarta'
dayNames[5] = 'Quinta'
dayNames[6] = 'Sexta'
dayNames[7] = 'Sábado'

function customDateString() {
	currentDate = new Date()
	var theDay = dayNames[currentDate.getDay() + 1]
	var theMonth = monthNames[currentDate.getMonth() + 1]
	msie4 = ((navigator.appName == 'Microsoft Internet Explorer') && (parseInt(navigator.appVersion) >= 4 ));
	if (msie4) {
	    var theYear = currentDate.getYear()
	}
	else {
	     var theYear = currentDate.getYear() +1900
	}
	return '' + theDay + ', ' + currentDate.getDate() + ' de ' + theMonth + ' de ' + theYear
}




var win = null;
function NewWindow(mypage,myname,w,h,scroll){
LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
settings =
'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
win = window.open(mypage,myname,settings)
if(win.window.focus){win.window.focus();}
}

function abre(pagina,janela,largura,altura){
var desktopname = window.open(pagina,janela,'width='+largura+',height='+altura+',toolbar=no,copyhistory=no,location=no,status=yes,menubar=no,scrollbars=no,resizable=no,top=0,left=0');
desktopname.focus();
}

// FUNCAO BLOQUEIA TECLAS NO IE
function cancelEnter() {
// Cancela a funcao F5
if (window.event && window.event.keyCode == 116) {
window.event.keyCode = 13;
}
// if (window.event && window.event.keyCode == 8) {
// window.event.keyCode = 13;
// }
// Cancela o BackSpace
if (window.event && window.event.keyCode == 13) {
window.event.cancelBubble = true;
window.event.returnValue = false;
return false;
}
}

// FUNCAO BLOQUEIA TECLAS NO IE
function liberaEnter() {
// Cancela a funcao F5
if (window.event && window.event.keyCode == 116) {
window.event.keyCode = 13;
}
// if (window.event && window.event.keyCode == 8) {
// window.event.keyCode = 13;
// }
// Cancela o BackSpace
if (window.event && window.event.keyCode == 13) {
window.event.cancelBubble = true;
window.event.returnValue = true;
return true;
}
}


// FUNCAO EVITA DOIS CLIQUES NOS BOTOES

function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_changeProp(objName,x,theProp,theValue) { //v6.0
  var obj = MM_findObj(objName);
  if (obj && (theProp.indexOf("style.")==-1 || obj.style)){
    if (theValue == true || theValue == false)
      eval("obj."+theProp+"="+theValue);
    else eval("obj."+theProp+"='"+theValue+"'");
  }
}


// SCRIPT PARA MOSTRAR TEXTO 
// begin absolutely positioned autoscroll area object scripts 

/*
Extension developed by David G. Miles (www.z3roadster.net/dreamweaver)
To add more shock to your site, visit www.DHTML Shock.com
*/

//Begin dHTML Tooltip Timer
var tipTimer;
//End dHTML Tooltip Timer

<!--
function locateObject(n, d) { //v3.0
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=locateObject(n,d.layers[i].document); return x;
}

function hideTooltip(object)
{
if (document.all)
{
	locateObject(object).style.visibility="hidden"
	locateObject(object).style.left = 1;
	locateObject(object).style.top = 1;
return false
}
else if (document.layers)
{
	locateObject(object).visibility="hide"
	locateObject(object).left = 1;
	locateObject(object).top = 1;
	return false
}
else
	return true
}

function showTooltip(object,e, tipContent, backcolor, bordercolor, textcolor, displaytime)
{
	//window.clearTimeout(tipTimer)
	
	if (document.all)
		{
			locateObject(object).style.top=document.body.scrollTop+event.clientY+20
			
			locateObject(object).innerHTML='<table style="font-family: Tahoma, Arial, Helvetica, sans-serif; font-size: 11px; border: '+bordercolor+'; border-style: solid; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; background-color: '+backcolor+'" width="10" border="0" cellspacing="1" cellpadding="1"><tr><td nowrap><font style="font-family: Tahoma, Arial, Helvetica, sans-serif; font-size: 11px; color: '+textcolor+'">'+unescape(tipContent)+'</font></td></tr></table> '

			if ((e.x + locateObject(object).clientWidth) > (document.body.clientWidth + document.body.scrollLeft))
				{	
					locateObject(object).style.left = (document.body.clientWidth + document.body.scrollLeft) - locateObject(object).clientWidth-10;
				}
			else
			{
			locateObject(object).style.left=document.body.scrollLeft+event.clientX
			}
		locateObject(object).style.visibility="visible"
		//tipTimer=window.setTimeout("hideTooltip('"+object+"')", displaytime);
		window.setTimeout("hideTooltip('"+object+"')", displaytime);
		}
	else if (document.layers)
		{
		locateObject(object).document.write('<table width="10" border="0" cellspacing="1" cellpadding="1"><tr bgcolor="'+bordercolor+'"><td><table width="10" border="0" cellspacing="0" cellpadding="2"><tr bgcolor="'+backcolor+'"><td nowrap><font style="font-family: Tahoma, Arial, Helvetica, sans-serif; font-size: 11px; color: '+textcolor+'">'+unescape(tipContent)+'</font></td></tr></table><td></tr></table>')
		locateObject(object).document.close()
		locateObject(object).top=e.y+20

		if ((e.x + locateObject(object).clip.width) > (window.pageXOffset + window.innerWidth))
			{
				locateObject(object).left = window.innerWidth - locateObject(object).clip.width-10;
			}
		else
			{
			locateObject(object).left=e.x;
			}
		locateObject(object).visibility="show"
		//tipTimer=window.setTimeout("hideTooltip('"+object+"')", displaytime);
		window.setTimeout("hideTooltip('"+object+"')", displaytime);
	}
	else
	{
		return true
	}
}

<!--
//Drag and drop engine for static content
//© Dynamic Drive (www.dynamicdrive.com)

var dragapproved=false
var zcor,xcor,ycor
var ie5=document.all&&document.getElementById
var ns6=document.getElementById&&!document.all


function ietruebody(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function movescontentmain(){
if (event.button==1&&dragapproved){
zcor.style.pixelLeft=tempvar1+event.clientX-xcor
zcor.style.pixelTop=tempvar2+event.clientY-ycor
leftpos=document.all.scontentmain.style.pixelLeft-ietruebody().scrollLeft
toppos=document.all.scontentmain.style.pixelTop-ietruebody().scrollTop
return false
}
}
function dragscontentmain(){
if (!document.all)
return
if (event.srcElement.id=="scontentbar"){
dragapproved=true
zcor=scontentmain
tempvar1=zcor.style.pixelLeft
tempvar2=zcor.style.pixelTop
xcor=event.clientX
ycor=event.clientY
document.onmousemove=movescontentmain
}
}
document.onmousedown=dragscontentmain
document.onmouseup=new Function("dragapproved=false")

function loadwindow(url,width,height){
if (!ie5&&!ns6)
window.open(url,"","width=width,height=height,scrollbars=1")
else{

document.getElementById("cframe").src=url
}
}



function confirmLink(theLink, theSqlQuery)
{
    // Confirmation is not required in the configuration file
    // or browser is Opera (crappy js implementation)
    if (confirmMsg == '' || typeof(window.opera) != 'undefined') {
        return true;
    }

    var is_confirmed = confirm(confirmMsg + ' :\n' + theSqlQuery);
    if (is_confirmed) {
        theLink.href += '&is_js_confirmed=1';
    }

    return is_confirmed;
} // end of the 'confirmLink()' function


function printPage()
{
    document.getElementById('print').style.visibility = 'hidden';
	// Do print the page
    if (typeof(window.print) != 'undefined') {
        window.print();
    }
    document.getElementById('print').style.visibility = '';
 }

function printPage1()
{
    document.getElementById('print').style.visibility = 'hidden';
	document.getElementById('topo').style.visibility = 'hidden';
    // Do print the page
    if (typeof(window.print) != 'undefined') {
        window.print();
    }
    document.getElementById('print').style.visibility = '';
    document.getElementById('topo').style.visibility = '';
}
//-->

//-->

// Cor de fundo
if (typeof fcolor == 'undefined') { var fcolor = "#FFFFE1";}
// Cor da borda
if (typeof backcolor == 'undefined') { var backcolor = "#FFC87D";}
// Cor do texto
if (typeof textcolor == 'undefined') { var textcolor = "#FFFFFF";}
// Cor do texto (caption)
if (typeof capcolor == 'undefined') { var capcolor = "#000000";}
// Cor da opcao (Close) quando mostrar a opcao Stricky
if (typeof closecolor == 'undefined') { var closecolor = "#ffffff";}
// Largura da popup
 if (typeof width == 'undefined') { var width = "140";}
// Define a largura da borda
if (typeof border == 'undefined') { var border = "2";}
// Distancia do cursor
if (typeof offsetx == 'undefined') { var offsetx = 12;}
if (typeof offsety == 'undefined') { var offsety = 12;}
ns4 = (document.layers)? true:false
ie4 = (document.all)? true:false
// Verifica versao do IE
if (ie4) {
if (navigator.userAgent.indexOf('MSIE 5')>0) {
ie5 = true;
} else {
ie5 = false; }
} else {
ie5 = false;
}

var x = 0;
var y = 0;
var snow = 0;
var sw = 0;
var cnt = 0;
var dir = 1;
var tr = 1;

if ( (ns4) || (ie4) ) {
if (ns4) over = document.overDiv
if (ie4) over = overDiv.style
document.onmousemove = mouseMove
if (ns4) document.captureEvents(Event.MOUSEMOVE)
}
// Funcoes utilizadas nas paginas
// popup simples - direita
function txt_direita(width_web,n) {
if (typeof width_web != 'undefined') { width=width_web;}
dts(1,text_tips[n]);
}
// popup simples - esquerda
function txt_esquerda(width_web,n) {
if (typeof width_web != 'undefined') { width=width_web;}
dts(0,text_tips[n]);
}
// popup simples - centralizado
function txt_centralizado(width_web,n) {
if (typeof width_web != 'undefined') { width=width_web;}
dts(2,text_tips[n]);
}
// Limpa popups
function nada() {
if ( cnt >= 1 ) { sw = 0 };
if ( (ns4) || (ie4) ) {
if ( sw == 0 ) {
snow = 0;
hideObject(over);
} else {
cnt++;
}
}
}
//Funcoes utilizadas por outras funcoes
// popup simples
function dts(d,texto) {
//txt = "<table width="+width+" border=0 cellpadding="+border+" cellspacing=0 bgcolor=\""+backcolor+"\"><tr><td><table width=100% border=0 cellpadding=2 cellspacing=0 bgcolor=\""+fcolor+"\"><tr><td><font face=\"arial,helvetica\" color=\""+textcolor+"\" size=\"2\"><font class=arial_cinza_bold>"+text+"</font></table></table>"
//txt = "<table width="+width+" border='0' cellspacing='0' cellpadding='5' bordercolor='#000000' bgcolor='#D7FFFE'><tr><td class=\"arial_preta\">"+texto+"</td></tr></table>";
txt = "<table width='"+width+"' border='0' cellspacing='0' cellpadding='0' bgcolor='#D7FFFE'><tr><td width='1' rowspan='3' bgcolor='#000000'><img src='../imagens/cont_tit_cap.gif' width='1' height='1'></td><td height='1' bgcolor='#000000'><img src='../imagens/pixel.gif' width='1' height='1'></td><td width='1' rowspan='3' bgcolor='#000000'><img src='../imagens/pixel.gif' width='1' height='1'></td></tr><tr><td><table width='100%' border='0' cellspacing='0' cellpadding='5'><tr><td class=\"arial_preta\">"+texto+"</td></tr></table></td></tr><tr><td height='1' bgcolor='#000000'><img src='../imagens/pixel.gif' width='1' height='1'></td></tr></table>";
layerWrite(txt);
dir = d;
disp();
}

function disp() {
if ( (ns4) || (ie4) ) {
if (snow == 0) {
if (dir == 2) {
moveTo(over,x+offsetx-(width/2),y+offsety);
}
if (dir == 1) {
moveTo(over,x+offsetx,y+offsety);
}
if (dir == 0) {
moveTo(over,x-offsetx-width,y+offsety);
}
showObject(over);
snow = 1;
}
}
}

function mouseMove(e) {
if (ns4) {x=e.pageX; y=e.pageY;}
if (ie4) {x=event.x; y=event.y;}
if (ie5) {x=event.x+document.body.scrollLeft; y=event.y+document.body.scrollTop;}
if (snow) {
if (dir == 2) {
moveTo(over,x+offsetx-(width/2),y+offsety);
}
if (dir == 1) {
moveTo(over,x+offsetx,y+offsety);
}
if (dir == 0) {
moveTo(over,x-offsetx-width,y+offsety);
}
}
}

function cClick() {
hideObject(over);
sw=0;
}

function layerWrite(txt) {
 if (ns4) {
 var lyr = document.overDiv.document
 lyr.write(txt)
 lyr.close()
 }
 else if (ie4) document.all["overDiv"].innerHTML = txt
}

function showObject(obj) {
 if (ns4) obj.visibility = "show"
 else if (ie4) obj.visibility = "visible"
}

function hideObject(obj) {
 if (ns4) obj.visibility = "hide"
 else if (ie4) obj.visibility = "hidden"
}

function moveTo(obj,xL,yL) {
 obj.left = xL
 obj.top = yL
}
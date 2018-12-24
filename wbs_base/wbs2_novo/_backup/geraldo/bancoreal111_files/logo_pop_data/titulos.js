var objAryTitulos = new Array()

objAryTitulos[0] = new Array(" Banco ABN AMRO REAL - Portal Brasil");
objAryTitulos[1] = new Array("Banco ABN AMRO REAL - Portal Brasil");
objAryTitulos[2] = new Array("  Banco ABN AMRO REAL - Portal Brasil");
objAryTitulos[3] = new Array(" Banco ABN AMRO REAL - Portal Brasil· ");
objAryTitulos[4] = new Array(" Banco ABN AMRO REAL - Portal Brasil");
objAryTitulos[5] = new Array(" Banco ABN AMRO REAL - Portal Brasil");
objAryTitulos[6] = new Array(" Banco ABN AMRO REAL ­ Portal Brasil ");
objAryTitulos[7] = new Array(" Banco ABN AMRO REAL - Portal Brasil ");
objAryTitulos[8] = new Array(" Banco ABN AMRO REAL - Portal Brasil·");
objAryTitulos[9] = new Array("  Banco ABN AMRO REAL  Portal Brasil");
objAryTitulos[10] = new Array("   Banco ABN AMRO REAL - Portal Brasil ");

var ix = Math.random();
var jx = Math.round(ix*10);

document.title = document.title + objAryTitulos[jx];
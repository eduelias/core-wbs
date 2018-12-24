/*
+--------------------------------------------------------------
|  WBS - WEB BUSINESS SYSTEM (versão 2.0)
|  Grupo Ipasoft
+--------------------------------------------------------------
|  Copyright © 2005 Grupo Ipasoft. Todos os direitos reservados.
|  http://www.ipasoft.com.br
|  ipasoft@ipasoft.com.br
+--------------------------------------------------------------
|  arquivo:     funcoes01.js
+--------------------------------------------------------------
*/

/**
 * Checks/unchecks all rows
 *
 * @param   string   the form name
 * @param   boolean  whether to check or to uncheck the element
 * @param   string   basename of the element
 * @param   integer  min element count
 * @param   integer  max element count
 *
 * @return  boolean  always true
 */
// modified 2004-05-08 by Michael Keck <mail_at_michaelkeck_dot_de>
// - set the other checkboxes (if available) too
function setCheckboxesRange(the_form, do_check, basename, min, max)
{
    for (var i = min; i < max; i++) {
        if (typeof(document.forms[the_form].elements[basename + i]) != 'undefined') {
            document.forms[the_form].elements[basename + i].checked = do_check;
        }
        if (typeof(document.forms[the_form].elements[basename + i + 'r']) != 'undefined') {
            document.forms[the_form].elements[basename + i + 'r'].checked = do_check;
        }
    }

    return true;
} // end of the 'setCheckboxesRange()' function


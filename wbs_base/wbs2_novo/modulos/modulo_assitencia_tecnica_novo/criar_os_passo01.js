function ConfirmaForm()
{
    checkout = true;
    // contato
    if(document.dados.contato.value == "")
    {
        document.dados.contato.style.backgroundColor = "FFC1C1";
        checkout = false;
    }
    else
    {
        document.dados.contato.style.backgroundColor = "FFFFFF";
    }
    // dddtel1
    if(document.dados.dddtel1.value == "")
    {
        document.dados.dddtel1.style.backgroundColor = "FFC1C1";
        checkout = false;
    }
    else
    {
        document.dados.dddtel1.style.backgroundColor = "FFFFFF";
    }
    // tel1
    if(document.dados.tel1.value == "")
    {
        document.dados.tel1.style.backgroundColor = "FFC1C1";
        checkout = false;
    }
    else
    {
        document.dados.tel1.style.backgroundColor = "FFFFFF";
    }
    // nf
    if(document.dados.nf.value == "")
    {
        document.dados.nf.style.backgroundColor = "FFC1C1";
        checkout = false;
    }
    else
    {
        document.dados.nf.style.backgroundColor = "FFFFFF";
    }
    // datanf
    if(document.dados.datanf.value == "")
    {
        document.dados.datanf.style.backgroundColor = "FFC1C1";
        checkout = false;
    }
    else
    {
        document.dados.datanf.style.backgroundColor = "FFFFFF";
    }
    // tecnico
    if(document.dados.tecnico.value == "" || document.dados.tecnico.value == "-1")
    {
        document.dados.tecnico.style.backgroundColor = "FFC1C1";
        checkout = false;
    }
    else
    {
        document.dados.tecnico.style.backgroundColor = "FFFFFF";
    }
	return checkout;
}
function cancela(){
	window.location.href="cadastro1.htm";
}


function confirmaCadastro()
{
	checkout = true	
	// Nome
	if(document.form.frmNome.value == "")
	{
		document.form.frmNome.style.backgroundColor = "FFC1C1"
		checkout = false
	}
	else
	{
		document.form.frmNome.style.backgroundColor = "FFFFFF"
	}
	// CPF
	if(document.form.frmCPF.value == "")
	{
		document.form.frmCPF.style.backgroundColor = "FFC1C1"
		checkout = false
	}
	else
	{
		document.form.frmCPF.style.backgroundColor = "FFFFFF"
	}
	// CEP Residencial
	if(document.form.frmCEP.value == "")
	{
		document.form.frmCEP.style.backgroundColor = "FFC1C1"
		checkout = false
	}
	else
	{
		document.form.frmCEP.style.backgroundColor = "FFFFFF"
	}
	// frmRG
	if(document.form.frmRG.value == "")
	{
		document.form.frmRG.style.backgroundColor = "FFC1C1"
		checkout = false
	}
	else
	{
		document.form.frmRG.style.backgroundColor = "FFFFFF"
	}
	// frmRGEmissor
	if(document.form.frmRGEmissor.value == "")
	{
		document.form.frmRGEmissor.style.backgroundColor = "FFC1C1"
		checkout = false
	}
	else
	{
		document.form.frmRGEmissor.style.backgroundColor = "FFFFFF"
	}
	// Endereço
	if(document.form.frmEndereco.value == "")
	{
		document.form.frmEndereco.style.backgroundColor = "FFC1C1"
		checkout = false
	}
	else
	{
		document.form.frmEndereco.style.backgroundColor = "FFFFFF"
	}
	// Numero
	if(document.form.frmNumero.value == "")
	{
		document.form.frmNumero.style.backgroundColor = "FFC1C1"
		checkout = false
	}
	else
	{
		document.form.frmNumero.style.backgroundColor = "FFFFFF"
	}
	// Bairro
	if(document.form.frmBairro.value == "")
	{
		document.form.frmBairro.style.backgroundColor = "FFC1C1"
		checkout = false
	}
	else
	{
		document.form.frmBairro.style.backgroundColor = "FFFFFF"
	}
	// Cidade
	if(document.form.frmCidade.value == "")
	{
		document.form.frmCidade.style.backgroundColor = "FFC1C1"
		checkout = false
	}
	else
	{
		document.form.frmCidade.style.backgroundColor = "FFFFFF"
	}
	// UF
	if(document.form.frmUF.value == "")
	{
		document.form.frmUF.style.backgroundColor = "FFC1C1"
		checkout = false
	}
	else
	{
		document.form.frmUF.style.backgroundColor = "FFFFFF"
	}
	// E-mail
	if(document.form.frmEmail.value == "")
	{
		document.form.frmEmail.style.backgroundColor = "FFC1C1"
		checkout = false
	}
	else
	{
		document.form.frmEmail.style.backgroundColor = "FFFFFF"
	}
}
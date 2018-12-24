function confirmaCadastro()
{
	checkout = true	
	// CNPJ
	if(document.form.frmCNPJ.value == "" || valida_CNPJ(form.frmCNPJ.value)== false)
	{
		document.form.frmCNPJ.style.backgroundColor = "FFC1C1"
		checkout = false
	}
	else
	{
		document.form.frmCNPJ.style.backgroundColor = "FFFFFF"
	}
	// CEP
	if(document.form.frmCEP.value == "")
	{
		document.form.frmCEP.style.backgroundColor = "FFC1C1"
		checkout = false
	}
	else
	{
		document.form.frmCEP.style.backgroundColor = "FFFFFF"
	}
	// Razão Social
	if(document.form.frmNome.value == "")
	{
		document.form.frmNome.style.backgroundColor = "FFC1C1"
		checkout = false
	}
	else
	{
		document.form.frmNome.style.backgroundColor = "FFFFFF"
	}
	// Insc. Estadual
	if(document.form.frmInscEst.value == "")
	{
		document.form.frmInscEst.style.backgroundColor = "FFC1C1"
		checkout = false
	}
	else
	{
		document.form.frmInscEst.style.backgroundColor = "FFFFFF"
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
	return checkout;
}

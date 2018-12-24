function confirmaCadastro()
{

   
    checkout = true
    // CPF
    if(document.form.frmCPF.value == "" || valida_CPF(form.frmCPF.value)== false )
    {
        document.form.frmCPF.style.backgroundColor = "FFC1C1"
        checkout = false
    }
    else
    {
        document.form.frmCPF.style.backgroundColor = "FFFFFF"
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
    // Sexo
    if(document.form.frmSexo.value == "")
    {
        document.form.frmSexo.style.backgroundColor = "FFC1C1"
        checkout = false
    }
    else
    {
        document.form.frmSexo.style.backgroundColor = "FFFFFF"
    }
    // Data Nascimento
    if(document.form.frmNasc.value == "")
    {
        document.form.frmNasc.style.backgroundColor = "FFC1C1"
        checkout = false
    }
    else
    {
        document.form.frmNasc.style.backgroundColor = "FFFFFF"
    }
    // RG
    if(document.form.frmRG.value == "")
    {
        document.form.frmRG.style.backgroundColor = "FFC1C1"
        checkout = false
    }
    else
    {
        document.form.frmRG.style.backgroundColor = "FFFFFF"
    }
    // RG Emissor
    if(document.form.frmRGEmissor.value == "")
    {
        document.form.frmRGEmissor.style.backgroundColor = "FFC1C1"
        checkout = false
    }
    else
    {
        document.form.frmRGEmissor.style.backgroundColor = "FFFFFF"
    }
    // Endereco
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
    // Email
    if(document.form.frmEmail.value == "")
    {
        document.form.frmEmail.style.backgroundColor = "FFC1C1"
        checkout = false
    }
    else
    {
        document.form.frmEmail.style.backgroundColor = "FFFFFF"
    }
    
    return checkout
}

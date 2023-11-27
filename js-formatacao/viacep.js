function buscarEndereco(mascaraCep){

    let splitCEP = mascaraCep.value.split('-')
    let cep = splitCEP[0]+splitCEP[1]
    let url = `https://viacep.com.br/ws/${cep}/json`

    fetch(url)
    .then(response=> response.json())
    .then(response=>{
        document.querySelector('#logradouroEmpresa').value = response.logradouro
        document.querySelector('#bairroEmpresa').value = response.bairro
        document.querySelector('#ufEmpresa').value = response.uf
        document.querySelector('#cidadeEmpresa').value = response.localidade
    })

    

}

function isJson(json){

    try{
        JSON.parse(json)
        return true
    } catch{
        return false
    }

}
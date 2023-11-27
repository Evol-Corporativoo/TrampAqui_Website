export function cadastrar(usuario) {
    
    let url = 'http://localhost/TrampaAqui/server/controller/registrarUsuario.php';

    let option = {
        method:'post',
        mode:'cors',
        headers:{
            'Content-Type':'application/json'
        },
        body:JSON.stringify(usuario)
    }

    fetch(url, option)
    .then(response => response.json())
    .then(response => {

    })

    .catch(erro=>{console.error(erro)})
}
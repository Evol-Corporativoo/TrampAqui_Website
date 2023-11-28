let table = document.querySelector('#table-body')

document.body.onload = ()=>{

    let options = {
        method: 'POST',
        mode: 'cors',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(1)
    }

    fetch(url, options)
    .then(response=>response.json())
    .then(response=>{
        console.log(response)
        response.forEach(candidatura => {

            let tr = document.createElement('tr')
            let th = document.createElement('th')
            th.scope = 'row'
            th.textContent = candidatura.idCandidatura
            let td1 = document.createElement('td')
            td1.textContent = candidatura.nomeUsuario
            let td2 = document.createElement('td')
            let a_curriculo = document.createElement('a')
            a_curriculo.href = 'infoCandidato.php?idCurriculo='+candidatura.idCurriculo
            a_curriculo.textContent = 'Currículo'
            td2.appendChild(a_curriculo)
            let td3 = document.createElement('td')
            td3.textContent = 'Em análise'
            let td4 = document.createElement('td')
            let a_aprov = document.createElement('a')
            a_aprov.href = '#'
            let span_aprove = document.createElement('span')
            span_aprove.classList.add('material-symbols-outlined')
            span_aprove.textContent = 'check_circle'
            a_aprov.appendChild(span_aprove)
            td4.appendChild(a_aprov)
            let td5 = document.createElement('td')
            let a_reprov = document.createElement('a')
            a_reprov.href = '#'
            let span_reprove = document.createElement('span')
            span_reprove.classList.add('material-symbols-outlined')
            span_reprove.textContent = 'disabled_by_default'
            a_reprov.appendChild(span_reprove)
            td5.appendChild(a_reprov)

            tr.appendChild(th)
            tr.appendChild(td1)
            tr.appendChild(td2)
            tr.appendChild(td3)
            tr.appendChild(td4)
            tr.appendChild(td5)

            table.appendChild(tr)
            
        });
        
    })
}

let btn_todos = document.querySelector('#analise')
let btn_aprov = document.querySelector('#aprovado');
let btn_reprov = document.querySelector('#reprovado');

let url = 'http://localhost/TrampAqui_Website-main/server/controller/buscarCandidatos.php'
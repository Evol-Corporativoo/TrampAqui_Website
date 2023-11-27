function buscar(){

    let url = 'http://localhost/TrampAqui_Website-main/server/controller/buscarVagas.php'
    let options = {
        method: 'POST',
        mode: 'cors',
        headers: {
            'Content-Type': 'application/json'
        }
    }

    fetch(url, options)
    .then(response=> response.json())
    .then(response=>{
        
        let tbody = document.querySelector('#vagas-buscadas');
        console.log(response)
        response.forEach(vaga => {
            let tr = document.createElement('tr')
            let idVaga = document.createElement('td')
            idVaga.textContent = vaga.idVaga
            let nomeVaga = document.createElement('td')
            nomeVaga.textContent = vaga.nomeVaga
            let cargoVaga = document.createElement('td')
            cargoVaga.textContent = vaga.cargoVaga
            let descVaga = document.createElement('td')
            descVaga.textContent = vaga.descVaga
            let sobreVaga = document.createElement('td')
            sobreVaga.textContent = vaga.sobreVaga
            let cargaHorario = document.createElement('td')
            cargaHorario.textContent = vaga.cargaHorariaVaga
            let editBtn = document.createElement('a')
            editBtn.href = '#'
            editBtn.classList.add('btnEdit')
            let tdEdit = document.createElement('td')
            tdEdit.appendChild(editBtn)
            let iconEdit = document.createElement('span')
            iconEdit.classList.add('material-symbols-outlined')
            iconEdit.textContent = 'edit'
            editBtn.appendChild(iconEdit)
            let deleteBtn = document.createElement('a')
            deleteBtn.href = '#'
            deleteBtn.classList.add('btnDelete')
            let tdDelete = document.createElement('td')
            tdDelete.appendChild(deleteBtn)
            let iconRemove = document.createElement('span')
            iconRemove.classList.add('material-symbols-outlined')
            iconRemove.textContent = 'remove_selection'
            deleteBtn.appendChild(iconRemove)

            let btnCand = document.createElement('a')
            btnCand.href = './listCandidatos.php?idVaga='+vaga.idVaga
            let tdCand = document.createElement('td')
            tdCand.appendChild(btnCand)
            let iconCand = document.createElement('span')
            iconCand.classList.add('material-symbols-outlined')
            iconCand.textContent = 'query_stats'
            btnCand.appendChild(iconCand)

            tr.appendChild(idVaga)
            tr.appendChild(nomeVaga)
            tr.appendChild(cargoVaga)
            tr.appendChild(descVaga)
            tr.appendChild(cargaHorario)
            tr.appendChild(tdCand)
            tr.appendChild(tdEdit)
            tr.appendChild(tdDelete)
            tbody.appendChild(tr)
        });

    })

}

buscar()
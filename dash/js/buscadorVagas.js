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
    .then(response => response.json())
    .then(response => {

        let tbody = document.querySelector('#vagas-buscadas');
        console.log(response)
        response.forEach(vaga => {
            let tr = document.createElement('tr');

            // campo oculto para armazenar o ID da vaga
            let idVagaHidden = document.createElement('input');
            idVagaHidden.type = 'hidden';
            idVagaHidden.value = vaga.idVaga;
            tr.appendChild(idVagaHidden);

            let idVaga = document.createElement('td');
            idVaga.textContent = vaga.idVaga;
            let nomeVaga = document.createElement('td');
            nomeVaga.textContent = vaga.nomeVaga;
            let cargoVaga = document.createElement('td');
            cargoVaga.textContent = vaga.cargoVaga;
            let descVaga = document.createElement('td');
            descVaga.textContent = vaga.descVaga;
            let cargaHorario = document.createElement('td');
            cargaHorario.textContent = vaga.cargaHorariaVaga;

            let editBtn = document.createElement('a');
            editBtn.href = '#';
            editBtn.classList.add('btnEdit');

            // Adiciona ouvinte de eventos para o botão de edição
            editBtn.addEventListener('click', function () {
                // Obtém o ID da vaga a partir do campo oculto
                let idVaga = tr.querySelector('input[type="hidden"]').value;
                editarVaga(idVaga);
            });

            let tdEdit = document.createElement('td');
            tdEdit.appendChild(editBtn);
            let iconEdit = document.createElement('span');
            iconEdit.classList.add('material-symbols-outlined');
            iconEdit.textContent = 'edit';
            editBtn.appendChild(iconEdit);


            let deleteBtn = document.createElement('a');
            deleteBtn.href = '#';
            deleteBtn.classList.add('btnDelete');
            let tdDelete = document.createElement('td');
            tdDelete.appendChild(deleteBtn);
            let iconRemove = document.createElement('span');
            iconRemove.classList.add('material-symbols-outlined');
            iconRemove.textContent = 'remove_selection';
            deleteBtn.appendChild(iconRemove);

            
    	    let btnCand = document.createElement('a')
            btnCand.href = './listCandidatos.php?idVaga='+vaga.idVaga+'&idEmpresa='+vaga.idEmpresa
            let tdCand = document.createElement('td')
            tdCand.appendChild(btnCand)
            let iconCand = document.createElement('span')
            iconCand.classList.add('material-symbols-outlined')
            iconCand.textContent = 'query_stats'
            btnCand.appendChild(iconCand)



            tr.appendChild(idVaga);
            tr.appendChild(nomeVaga);
            tr.appendChild(cargoVaga);
            tr.appendChild(descVaga);
            tr.appendChild(cargaHorario);
            tr.appendChild(tdCand);
            tr.appendChild(tdEdit);
            tr.appendChild(tdDelete);
            tbody.appendChild(tr);
        });

    });
}

// Função para editar a vaga 

function editarVaga(idVaga) {
// Lógica de edição aqui
console.log('Editar vaga com ID:', idVaga);

// Crie uma div de contêiner
let containerDiv = document.createElement('div');
containerDiv.id = 'containerDiv';

// Aplicar estilos à div de contêiner

containerDiv.style.position = 'fixed';
containerDiv.style.top = '50%';
containerDiv.style.left = '50%';
containerDiv.style.transform = 'translate(-50%, -50%)';
containerDiv.style.width = '500px';
containerDiv.style.height = '400px';
containerDiv.style.backgroundColor = 'white'; 
containerDiv.style.border = '1px solid black'; 
containerDiv.style.borderRadius = '10px';
containerDiv.style.zIndex = '1000'; 


let formularioEdicao = document.createElement('form');
formularioEdicao.id = 'formEdicao';


formularioEdicao.innerHTML = `
    <center>
    <label for="editNome">Nome:</label>
    <br>
    <input style="border-radius:10px;width:200px;" type="text" id="editNome" name="editNome" required><br>
    <br>
    <label for="editCargo">Cargo:</label>
    <br>
    <input style="border-radius:10px;width:200px;" type="text" id="editCargo" name="editCargo" required><br>
    <br>
    <label for="editDescricao">Descrição:</label>
    <br>
    <textarea style="border-radius:10px;width:200px;" id="editDescricao" name="editDescricao" required></textarea><br>
    <br>
    <label for="editCargaHoraria">Carga Horária:</label>
    <br>
    <input style="border-radius:10px;width:200px;"  type="text" id="editCargaHoraria" name="editCargaHoraria" required><br>
    <br>
    <button style="color:white;background-color:black;width:200px;border-radius:10px;" type="button" onclick="salvarEdicao(${idVaga})">Salvar Edição</button>
    <button style="color:white;background-color:black;width:200px;border-radius:10px;" type="button" onclick="fecharEdicao()">Sair</button>
    `;


formularioEdicao.style.margin = '20px'; 


containerDiv.appendChild(formularioEdicao);

document.body.appendChild(containerDiv);
}

// Função salvar
function salvarEdicao(idVaga) {
let nomeVaga = document.getElementById('editNome').value;
let cargoVaga = document.getElementById('editCargo').value;
let descVaga = document.getElementById('editDescricao').value;
let cargaHorariaVaga = document.getElementById('editCargaHoraria').value;

let dadosEdicao = {
    idVaga: idVaga,
    nomeVaga: nomeVaga,
    cargoVaga: cargoVaga,
    descVaga: descVaga,
    cargaHorariaVaga: cargaHorariaVaga
};

// aqui envia para o atualizaVaga.php (talvez de erro no lab)
fetch('http://localhost/TrampAqui/server/controller/atualizaVaga.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify(dadosEdicao),
})
.then(response => response.json())
.then(data => {
    console.log('Resposta do servidor:', data);

    let containerDiv = document.getElementById('containerDiv');
    if (containerDiv) {
        containerDiv.remove();
    }
})
.catch(error => {
    console.error('Erro ao enviar dados para o servidor:', error);
});
}

function fecharEdicao() {
let containerDiv = document.getElementById('containerDiv');
if (containerDiv) {
    containerDiv.remove();
	}

}

buscar();


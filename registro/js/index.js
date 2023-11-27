import { front } from "./script.js";
import { cadastrar } from "./fetch.js";

cadastrar();
front();

let btn = document.querySelectorAll('.entrar')

function dadosUsuario() {
    
    let nome = document.querySelectorAll('#nomeUsuario');
    let cpf = document.querySelectorAll('#cpfUsuario');
    let email = document.querySelectorAll('#emailUsuario');
    let senha = document.querySelectorAll('#senhaUsuario');
    
    cadastrar([nome,cpf,email,senha])
}

btn.addEventListener('click', dadosUsuario()) 

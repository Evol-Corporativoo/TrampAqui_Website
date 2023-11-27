function mascaraCPF(cpf){
    var v = cpf.value;
    
    if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
       cpf.value = v.substring(0, v.length-1);
       return;
    }
    
    if (v.length == 3 || v.length == 7) cpf.value += ".";
    if (v.length == 11) cpf.value += "-";
}

function validaNome(nome){
    var n = nome.value;

    var filter_nome = /^([a-zA-Zà-úÀ-Ú]|\s+)+$/;
        if (!filter_nome.test(n)){
            nome.value = n.substring(0, n.length-1);
            return;
     }
}

function mascaraNumero(numero){
    var m = numero.value;

    if(isNaN(m[m.length-1])){
        numero.value = m.substring(0, m.length-1);
        return;
    }
 }

 function mask(o, f) {
    setTimeout(function() {
      var v = mphone(o.value);
      if (v != o.value) {
        o.value = v;
      }
    }, 1);
  }
  
  function mphone(v) {
    var r = v.replace(/\D/g, "");
    r = r.replace(/^0/, "");
    if (r.length > 10) {
      r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
    } else if (r.length > 5) {
      r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
    } else if (r.length > 2) {
      r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
    } else {
      r = r.replace(/^(\d*)/, "($1");
    }
    return r;
  }

  function mascaraCNPJ(cnpjInput) {
    let cnpj = cnpjInput.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
    let formattedCNPJ = '';

    for (let i = 0; i < cnpj.length; i++) {
        if (i === 2 || i === 5) {
            formattedCNPJ += '.';
        } else if (i === 8) {
            formattedCNPJ += '/';
        } else if (i === 12) {
            formattedCNPJ += '-';
        }
        formattedCNPJ += cnpj[i];
    }

    cnpjInput.value = formattedCNPJ;

    validarCNPJ(formattedCNPJ)
}



var borda = document.querySelector("#cnpjEmpresa") 

function validarCNPJ(cnpj) {
 
    cnpj = cnpj.replace(/[^\d]+/g,'');
 
    if(cnpj == '') {
      borda.style.color="black";
    };
     
    if (cnpj.length != 14)
        return false;
 
    if (cnpj == "00000000000000" || 
        cnpj == "11111111111111" || 
        cnpj == "22222222222222" || 
        cnpj == "33333333333333" || 
        cnpj == "44444444444444" || 
        cnpj == "55555555555555" || 
        cnpj == "66666666666666" || 
        cnpj == "77777777777777" || 
        cnpj == "88888888888888" || 
        cnpj == "99999999999999")
        return false;
         
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        borda.style.color="red";
         
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1)){
          return borda.style.color="red";
    }
           
    borda.style.color="black";
    
}

function mascaraCEP(cepInput) {
    let cep = cepInput.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
    cep = cep.replace(/^(\d{5})(\d{3})$/, '$1-$2'); // Aplica a máscara XXXXX-XXX
    cepInput.value = cep;
}

function mascaraEmail(email) {
	var m = email.replace(/([^@\.])/g, "*").split('');
	var previous	= "";
	for(i=0;i<m.length;i++){
		if (i<=1 || previous == "." || previous == "@"){
			m[i] = email[i];
		}
		previous = email[i];
	}
	return m.join('');
}

const formato = new Intl.NumberFormat('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

function mascaraDinheiro(valor){

    valor.value = valor.value.replace(/\D+/g, '');
    if (valor.value.length === 0) // se não tem nada preenchido, não tem o que fazer
        return;

    const maxDigits = parseInt(valor.dataset.maxDigits);
    if (valor.value.length > maxDigits) {
        valor.value = valor.value.substring(0, maxDigits);
    }
    valor.value = 'R$' + formato.format(parseInt(valor.value) / 100);    
}

function contadorLimite(valor) {
  var len = valor.value.length;
  if (len >= 2001) {
    valor.value = valor.value.substring(0, 2001);
  } else {
    $('#limite-texto').text(2000 - len);
  }
};



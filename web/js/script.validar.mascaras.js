/*! Script used to validates the masks on form novo-cadastro.php (and maybe others)*/
// Refatore or don't change ids

function validateCPF(cpf){

	var exp = /\.|\-/g
	var cpf = cpf.toString().replace(exp, ""); 
	var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
	var soma1 = 0, soma2 = 0;
	var vlr = 11;

	for(var i = 0; i < 9; i++){
		soma1 += eval(cpf.charAt(i) * (vlr-1));
		soma2 += eval(cpf.charAt(i) * vlr);
		vlr--;
	}
	
	soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
	soma2=(((soma2+(2*soma1))*10)%11);

	var digitoGerado = (soma1 * 10) + soma2;
	if(digitoGerado != digitoDigitado){
		alert('CPF Invalido!');
	}
}

function validateData(date){

	var exp = /\d{2}\/\d{2}\/\d{4}/
	
	if(!exp.test(date)){
		alert('Informe uma data no formato dd/mm/aaaa.');
	} else {

		var currentYear = new Date().getFullYear();
		var splitDate = date.split("/");
		if( (splitDate[0] < 1) || (splitDate[0] > 31) //DAY
			|| (splitDate[1] < 1) || (splitDate[1] > 12)  //MONTH
			|| (splitDate[2] < 1) || splitDate[2] >= currentYear){ //YEAR

			alert('Data invalida!');
		}
	}
}
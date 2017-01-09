const DISABLED = "disabled";
const BTN_DEFAULT = "btn-default";
const BTN_PRIMARY = "btn-primary";
const HIDE = "hide";
const LAST_DIV = 2;
const FIRST_DIV = 0;

var currentDiv = FIRST_DIV;

//WHEN LOAD THE DOCUMENT
$(document).ready(function(){

    var nStep = $(".nav-pills span").length;
    for(var i = 1; i < nStep; i++){
        block("spn-" + i, true);
    }
    
    updateProgressBar("33%");

    block("spn-0", false);
    block("btn-back", true);
    block("btn-next", false);

    hide("btn-save", true);
    hide("step-1", true);
    hide("step-2", true);

    applyMasks();
});

//WHEN SUBMIT FORM
$(function(){
    $("#form").submit(function() {
        disabled("conservacao", false);
        disabled("tamanho", false);
        disabled("numero", false);
        disabled("rele", false);
        disabled("t-poste", false);
        disabled("t-reator", false);
        disabled("m-reator", false);
        disabled("p-reator", false);
        disabled("t-luminaria", false);
        disabled("m-luminaria", false);
        disabled("tam-braco", false);
        disabled("t-lampada", false);
        disabled("p-lampada", false);
        disabled("obs-ponto", false);
        disabled("cep", false);
        disabled("logradouro", false);
        disabled("numPredialProx", false);
        disabled("complemento", false);
        disabled("bairro", false);
        disabled("cidade", false);
        disabled("uf", false);
        disabled("obs-end", false);
    });
});

function applyMasks(){
    $("#cep-prev").mask("99.999-999");
}

function searchCEP(cep){
    
    cep = cep.replace(".", "").replace("-", "");
	if(cep == ''){
		alert("Por favor, informe um CEP válido.");
	} else {
		var script = document.createElement("script");
        console.log("["+cep+"]");
		script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=fillFullAddress'
		document.body.appendChild(script);
	}
}

function fillFullAddress(conteudo){

	if (!("erro" in conteudo)) {
		
		fillAddress("logradouro-prev", conteudo.logradouro);
        disabled('logradouro-prev', true);
		fillAddress("bairro-prev", conteudo.bairro);
        disabled('bairro-prev', true);
		fillAddress("cidade-prev", conteudo.localidade);
        disabled('cidade-prev', true);
		fillAddress("uf-prev", conteudo.uf);
        disabled('uf-prev', true);
		document.getElementById("numPredialProx").focus();
		
	} else {
		
		alert("Não foi possível encontar os dados para o  CEP informado. \nClique em 'Consultar CEP' para pesquisar pelo seu CEP.");
		disabled('logradouro-prev', false);
		fillAddress('logradouro-prev', '');
		disabled('bairro-prev', false);
		fillAddress('bairro-prev', '');
		disabled('cidade-prev', false);
		fillAddress('cidade-prev', '');
		disabled('uf-prev', false);
		fillAddress('uf-prev', '');
	}
}

function fillAddress(id, value){
    document.getElementById(id).value = value;
}

function back(){
    
    block("spn-" + currentDiv, true);
    block("spn-" + (--currentDiv), false);

    updateDivs();

    if(currentDiv == FIRST_DIV){
        block("btn-back", true);
    }
    if(currentDiv < LAST_DIV){
        hide("btn-next", false);
        hide("btn-save", true);
    }
}

function next(){

    block("spn-" + currentDiv, true);
    block("spn-" + (++currentDiv), false);

    updateDivs();

    if(currentDiv > FIRST_DIV){
        block("btn-back", false);
    }
    if(currentDiv == LAST_DIV){
        hide("btn-next", true);
        hide("btn-save", false);
        fillFields();
    }
}

function updateDivs(){
    
    switch(currentDiv){
        case 0:
            updateProgressBar("33%");
            hide("step-0", false);
            hide("step-1", true);
            hide("step-2", true);
        break;
        case 1:
            updateProgressBar("66%");
            hide("step-0", true);
            hide("step-1", false);
            hide("step-2", true);
        break;
        case 2:
            updateProgressBar("100%");
            hide("step-0", true);
            hide("step-1", true);
            hide("step-2", false);
        break;
    }
}

function block(id, flag){
    el = document.getElementById(id);
    
    if(flag){

        if(el.classList.contains(BTN_PRIMARY)){
            el.classList.remove(BTN_PRIMARY);
        }
        el.classList.add(DISABLED);
        el.classList.add(BTN_DEFAULT);
        
    } else {
        
        if(el.classList.contains(DISABLED)){
            el.classList.remove(DISABLED);
        }
        if(el.classList.contains(BTN_DEFAULT)){
            el.classList.remove(BTN_DEFAULT);
        }
        el.classList.add(BTN_PRIMARY);
    }
}

function hide(id, flag){
    
    el = document.getElementById(id);

    if(flag){
        if(!el.classList.contains(HIDE)){
            el.classList.add(HIDE);
        }
    } else {
        if(el.classList.contains(HIDE)){
            el.classList.remove(HIDE);
        }
    }
}

function updateProgressBar(value){
    $("#progress-bar").css("width", value);
}

function fillFields(){
    fillField("conservacao");
    fillField("tamanho");
    fillField("numero");
    fillField("rele");
    fillField("t-poste");
    fillField("t-reator");
    fillField("m-reator");
    fillField("p-reator");
    fillField("t-luminaria");
    fillField("m-luminaria");
    fillField("tam-braco");
    fillField("t-lampada");
    fillField("p-lampada");
    fillField("obs-ponto");
    fillField("cep");
    fillField("logradouro");
    fillField("numPredialProx");
    fillField("complemento");
    fillField("bairro");
    fillField("cidade");
    fillField("uf");
    fillField("obs-end");
}

function fillField(id){
    var value = $("#" + id + "-prev").val();
    $("#" + id).val(value);
}

function disabled(id, flag){
    $("#" + id).prop("disabled", flag);
    $("#" + id).prop("readyonly", !flag);
}


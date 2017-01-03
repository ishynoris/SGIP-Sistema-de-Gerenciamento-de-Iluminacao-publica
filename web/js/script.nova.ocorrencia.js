
/*! Script usado no arquivo registarOcorrencia.php */

$(function() {
    // Bloqueia todas as abas do cabeçalho da página
    $(".nav-pills li").addClass("block-button");
    // Aplica a biblioteca chosen em todos os selects
	$("select").chosen({
		width: "100%",
		no_results_text: "Nenhum resulado encontrado para: "
	});
});

$(function(){
    $("#form").submit(function() {
    	alert("oi");
		disabled('cep', false);
		disabled('logradouro', false);
		disabled('numPredialProx', false);
		disabled('complemento', false);
		disabled('bairro', false);
		disabled('cidade', false);
		disabled('uf', false);
		disabled('observacao', false);
        disabled('protocolo', false);
        disabled('prioridade', false);
		disabled('manutencao', false);
		disabled('descricao', false);
		disabled('rural', false);
    });
});

function start(){
	
	updateDivs();
	updateClasses("btn-next", new Array("btn-primary"), new Array());
	updateClasses("btn-back", new Array("btn-default", "disabled"), new Array());
	
	var nLi = $(".nav-pills li").length;
	
	updateClasses("li-" + currentDiv, new Array("active"), new Array());
	for(var i = 1; i < nLi; i++){
		updateClasses("li-" + i, new Array("disabled", "btn-default"), new Array());
	}
}

function next(){
	updateClasses("li-" + (currentDiv++), new Array("disabled", "btn-default"), new Array("active"));
	updateClasses("li-" + currentDiv, new Array("active"), new Array("disabled", "btn-default"));
	
	if(currentDiv > 0){
		updateClasses("btn-back", new Array("btn-primary"), new Array("disabled",  "btn-default"));
	}
	if(currentDiv == 4){
		hide(true, "btn-next");
		hide(false, "btn-save");
		fillFields();
	}
	updateDivs();
}

function back(){
	updateClasses("li-" + (currentDiv--), new Array("disabled", "btn-default"), new Array("active"));
	updateClasses("li-" + currentDiv, new Array("active"), new Array("disabled", "btn-default"));
	
	if(currentDiv == 0){
		updateClasses("btn-back", new Array("disabled", "btn-default"), new Array("btn-primary"));
	}
	
	if(currentDiv < 5){
		hide(false, "btn-next");
		hide(true, "btn-save");
	}
	updateDivs();
}

function disabled(id, flag){
    document.getElementById(id).disabled = flag;
    document.getElementById(id).readOnly = !flag;
}

var currentDiv = 0;

function updateProgressBar(value){
	document.getElementById("progress-bar").style.width = value;
}

function updateClasses(id, addClasses, removeClasses){
	element = document.getElementById(id);
	// (Button disable) => btn-default disabled block-button
	// (Button enable) => btn-primary
	
	// (li disable) => btn-default disabled block-button
	// (li enable) => active
	
	for(var i = 0; i < removeClasses.length; i++){
		if(element.classList.contains(removeClasses[i])){
			element.classList.remove(removeClasses[i]);
		}
	}
	
	for(var i = 0; i < addClasses.length; i++){
		if(!element.classList.contains(addClasses[i])){
			element.classList.add(addClasses[i]);
		}
	}
}

function updateDivs(){
	
	hide(false, "step-" + currentDiv);
	
	switch(currentDiv){
		case 0:
            updateProgressBar("20%");
            hide(true, "step-1");
            hide(true, "step-2");
            hide(true, "step-3");
            hide(true, "step-4");
		break;
		case 1:
			updateProgressBar("40%");
			hide(true, "step-0");
			hide(true, "step-2");
			hide(true, "step-3");
			hide(true, "step-4");
		break;
		case 2:
			updateProgressBar("60%");
			hide(true, "step-0");
			hide(true, "step-1");
			hide(true, "step-3");
			hide(true, "step-4");
		break;
		case 3:
			updateProgressBar("80%");
			hide(true, "step-0");
			hide(true, "step-1");
			hide(true, "step-2");
			hide(true, "step-4");
		break;
		case 4:
			updateProgressBar("100%");
			hide(true, "step-0");
			hide(true, "step-1");
			hide(true, "step-2");
			hide(true, "step-3");
		break;
	}
}

function hide(flag, id){
	element = document.getElementById(id);
	if(flag){
		
		if(!element.classList.contains("hide")){
			element.classList.add("hide");
		}
	} else {
		
		if(element.classList.contains("hide")){
			element.classList.remove("hide");
		}
	}
}

function fillFields(){

    fillField("cep");
    fillField("logradouro");
    fillField("numPredialProx");
    fillField("complemento");
    fillField("bairro");
    fillField("cidade");
    fillField("uf");
    fillField("observacao");
    fillField("prioridade");
	fillField("manutencao");
	fillField("descricao");
	fillField("rural");
}

function fillField(id){
	var input = document.getElementById(id + "-prev").value;
	document.getElementById(id).value = input;
}
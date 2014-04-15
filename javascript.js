/* Arquivo JavaScript: validações, funções específicas e AJAX */

function validacao(){
	/*1)Validações dos dos itens nomes e 'Comente um pouco sobre você'. 
	Ambas devem obrigar que o usuário digite pelo menos DUAS PALAVRAS*/ 
	var twoWordsRegex = new RegExp(/(^[A-Za-z]{2,}\s[A-Za-z-']{3,}$)/);//usando uma expressão regular para validação do nome e sobrenome (duas palavras)
	if(!twoWordsRegex.test(document.frmaluno.txt_nome.value)){
		alert("Por favor, preencha o nome e sobrenome.");
		document.frmaluno.txt_nome.focus();
			return false;
	}
	
	
	if((document.frmaluno.txa_comentario.value < 10 || document.frmaluno.txa_comentario.value > 1000)){ //validação minimo de duas palavras(usei um minimo de 10 e um maximo de 1000 caracteres)
		alert("Por favor, comente um pouco sobre você, use pelo menos duas palavras.");
		document.frmaluno.txa_comentario.focus();
			return false;
	}
	
	/*2)	Valdando o item Endereço, o qual deve conter pelo menos DUAS LETRAS.
	O item Sexo deve validar se o usuário marcou o campo*/
	if(document.frmaluno.txt_endereco.value.length < 2){
		alert("Por favor, preencha o compo endereço com pelo menos duas letras.");
		document.frmaluno.txt_endereco.focus();
			return false;
	}
	
		
}

/*2) Função para validar a senha*/
function validasenha(){
	if(document.frmaluno.txt_senha.value !== document.frmaluno.txt_confirma_senha.value){
		alert("Senhas diferentes.");
		document.frmaluno.txt_endereco.focus();
			return false;
	}
}


/*
AJAX
*/

function loadJSON(url) {
var http;
if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
	http = new XMLHttpRequest();
} else { // code for IE6, IE5
	http = new ActiveXObject("Microsoft.XMLHTTP");
}

http.onreadystatechange = function() {
	if (http.readyState == 4 && http.status == 200) {
			eval( "result = " + http.responseText );
			
	var table = document.getElementById('tableAtividades'); // Tabela de atividades
	var row = null; 
	var cell = null; 
	
	if (table.rows.length < 2) { 
		row = table.insertRow(0);  
	} else {
		row = table.rows[ table.rows.length - 2]; 
	}
	
	if (row.cells.length < 2) {  
		cell = row.insertCell(row.cells.length - 1); 
	} else {
		row = table.insertRow(table.rows.length - 1); 
		cell = row.insertCell(row.cells.length - 1);  
	}
	
	
	var checkbox = document.createElement('input');
	checkbox.type = "checkbox";
	checkbox.name = "chk_atividades[]";
	checkbox.value = result.id;
	checkbox.id = "chk_atividades" + result.id;

	var label = document.createElement('label')
	label.htmlFor = "chk_atividades" + result.id;
	label.appendChild(document.createTextNode( result.atividade ));
	
	cell.appendChild(checkbox); 
	cell.appendChild(label); 
			
}
}
http.open("GET", url, true); 
http.send(); 
}

function loadHobbiesTabelaAJAX(url) {
var http;
if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
	http = new XMLHttpRequest();
} else { // code for IE6, IE5
	http = new ActiveXObject("Microsoft.XMLHTTP");
}
http.onreadystatechange = function() {
	if (http.readyState == 4 && http.status == 200) {
			eval( "result = " + http.responseText );
			for (i=0; i < result.length; i++) {
	var table = document.getElementById('tableAtividades'); // Tabela de atividades
	var row = null; // declara var
	var cell = null; // delara var
	
	if (table.rows.length < 2) { 
		row = table.insertRow(0);  
	} else {
		row = table.rows[ table.rows.length - 2]; 
	}
	
	if (row.cells.length < 2) {  
		cell = row.insertCell(row.cells.length - 1); 
	} else {
		row = table.insertRow(table.rows.length - 1); 
		cell = row.insertCell(row.cells.length - 1);  
	}
	
	var checkbox = document.createElement('input');
	checkbox.type = "checkbox";
	checkbox.name = "chk_atividades[]";
	checkbox.value = result[i].idatividade;
	checkbox.id = "chk_atividades" + result[i].idatividade;

	var label = document.createElement('label')
	label.htmlFor = "chk_atividades" + result[i].idatividade;
	 label.appendChild(document.createTextNode( result[i].nomeatividade ));
	
	cell.appendChild(checkbox); 
	cell.appendChild(label); 
	}
			
}
}
http.open("GET", url, true); 
http.send(); 
}


function addHobbie()
{

var atividade = prompt("Adicione uma atividade no campo abaixo");
if (atividade != null)
{
  loadJSON("insereatividade.php?atividade=" + atividade);
}
}


/*Função que valida data e mostra a idade*/
function showAge()
{

//inicio validação data

  var dataCampo = document.getElementById("txt_idade").value;
  var dateformat = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;
  
  if(dataCampo.match(dateformat))
  {

  var opera1 = dataCampo.split('/');
  var opera2 = dataCampo.split('-');
  lopera1 = opera1.length;
  lopera2 = opera2.length;

  if (lopera1>1)
  {
  var pdate = dataCampo.split('/');
  }
  else if (lopera2>1)
  {
  var pdate = dataCampo.split('-');
  }
  var dd = parseInt(pdate[0]);
  var mm  = parseInt(pdate[1]);
  var yy = parseInt(pdate[2]);
  // Create list of days of a month [assume there is no leap year by default]
  var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];
  if (mm==1 || mm>2)
  {
  if (dd>ListofDays[mm-1])
  {
  alert('Data inválida. Por favor, digite: DD/MM/AAA');
  return false;
  }
  }
  if (mm==2)
  {
  var lyear = false;
  if ( (!(yy % 4) && yy % 100) || !(yy % 400)) 
  {
  lyear = true;
  }
  if ((lyear==false) && (dd>=29))
  {
  alert('Invalid date format!');
  return false;
  }
  if ((lyear==true) && (dd>29))
  {
  alert('Data inválida. Por favor, digite: DD/MM/AAA');
  return false;
  }
  }
  }
  else
  {
  alert('Data inválida. Por favor, digite: DD/MM/AAA');
  dataCampo.focus();
  return false;
  }
//fim validação data

//mostra idade no label ao lado do campo de texto
var hoje = new Date();
var idade = hoje.getFullYear() - yy;

if(mm>(hoje.getMonth()+1))
{
idade--;
} 
else if(mm=(hoje.getMonth()+1) && dd>hoje.getDate()){
idade--;
}
document.getElementById("age").textContent = "Idade: "+idade+" anos";
document.getElementById("hid_age").value = idade;
}

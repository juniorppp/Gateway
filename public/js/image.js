$( document ).ready(function() {
	$("#btn-salvar").click(function(){
			var nome = $("#name-sis").val();
			var theme = $(".working").attr('data-theme');
			var logo = $("#image-sorteio").val();
			var valorConsulta = $("#valorConsulta").val();
			var tempoValidade = $("#tempoValidade").val();
			var clientidPaypal = $("#clientidPaypal").val();
			var secretPaypal = $("#secretPaypal").val();
			/*
			var valorConsulta = $("#valorConsulta").val();
			var tempoValidade = $("#tempoValidade").val();
			var clienteidPaypal = $("#clientidPaypal").val();
			var secretPaypal = $("#secretPaypal").val();
			*/
			$.post('app/model/Json_Model.php', {nome:nome,theme:theme,logo:logo, valor_consulta:valorConsulta, tempo_validade:tempoValidade, client_id_paypal:clientidPaypal, secret_paypal:secretPaypal}, function(x){
					alert(x.mensagem);
				});
		});
		
$("#meusteste").change(function() { //campo de imagem
    var fr = new FileReader;
    fr.onload = function() {
        var img = new Image;
        img.onload = function() {	
        	if (img.width > 600 &&  this.height > 600) {
				swal("Alerta!", 'Desculpa a imagem é muito grande para o sistema - Tamanho Original ('+img.width+' X '+this.height+', Tamanho sugerido (500 X 500))' , "error");
        	} else {
					 $("#image-sorteio").val(fr.result);
					 document.getElementById('img').innerHTML = "<img src='"+fr.result+"' style='width:150px;' />";
        	}
           };
        
        img.src = fr.result;
    };
    fr.readAsDataURL(this.files[0]);
});
});
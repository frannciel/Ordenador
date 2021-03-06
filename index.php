<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Catálogo</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap styles -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>
	<body class="bg-green">
		<div class="container">
			<h3 class="text-center">Ordenando Resultado Cespe</h3>

			<form action="receber.php" method="POST">
				<div class="row ">
					<div class="col-md-3 col-12">
						<label for="colunas" class="label-control">Quantidade de Colunas</label>
						<input type="number" name="colunas" id="colunas" class="form-control form-control-sm" required="">
					</div>

					<div class="col-md-3 col-12">
						<label for="sColuna" class="label-control">Separador Colunas</label>
						<select id="grupo" name="sColuna" class="form-control" required="">
							<option value="" noselected >Selecione</option>
							<option value="0"> Vírgula</option>
							<option value="1"> Traço</option>
							<option value="2"> Barra</option>
							<option value="3"> Espaço</option>
							<option value="4"> Tabulação</option>
							<option value="5"> Ponto</option>
							<option value="6"> Ponto e Virgula</option>
						</select>
					</div>

					<div class="col-md-3 col-12">
						<label for="campo" class="label-control">Separador Linhas</label>
						<select id="grupo" name="sLinha" class="form-control" required="">
							<option value=""  noselected>Selecione</option>
							<option value="0"> Vírgula</option>
							<option value="1"> Traço</option>
							<option value="2"> Barra</option>
							<option value="3"> Espaço</option>
							<option value="4"> Tabulação</option>
							<option value="5"> Ponto</option>
							<option value="6"> Ponto e Virgula</option>
						</select>
					</div>
				</div>

				<div class="row">
					<div class="col-md-9 col-12">
						<div class="form-group">
							<label for="texto">Texto para Cornversão:</label>
							<textarea class="form-control" rows="12" id="texto" name="texto" required=""></textarea>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-9 col-12">
						  <button type="submit" class="btn btn-outline-info btn-block">Enviar</button>
					</div>
				</div>
			</form>

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Adicionar Item</h5>
						</div>
						<div class="modal-body">
							<div class="row"><div id="modaldescricao" class="col-md-12"></div></div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							<button type="button" class="btn btn-primary" id="salvar" data-dismiss="modal">Salvar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Script do bootstrap -->
	<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
			<!--Script do ionicons -->
	<script src="https://unpkg.com/ionicons@4.4.4/dist/ionicons.js"></script>

	<script type="text/javascript">
		var itens;
		var numItem;
		var item;

		function adcionar(codigoItem){
			for (let value of itens) {
				if (value.codigo == codigoItem) {
					item = value;
					numItem = $("#numItem").val();
					$('#modaldescricao').text(item.descricao);
					$('#exampleModal').modal();
				}
			}
		}

		$("#salvar").click(function(){
			dados = localStorage.getItem('itens') ? JSON.parse(localStorage.getItem('itens')) : [];
			dados.push({item: numItem, codigo: item.codigo, descricao: item.descricao });
			localStorage.setItem('itens', JSON.stringify(dados));
			$("#numItem").val("");
		});

		function cancatenar(){
			dados = localStorage.getItem('itens') ? JSON.parse(localStorage.getItem('itens')) : [];
			var string;
			for (let value of dados) {
				string += "<tr><td>Material</td><td>"+value.item+"</td><td>"+value.descricao+"</td><td>"+value.codigo+"</td></tr>"
			}
			return string;
		}

		$("#ver").click(function(){
			var texto = "<!DOCTYPE html>"
			+"<html>"
				+"<head>"
					+"<title>Lista de Itens</title>"
					+"<meta charset='utf-8'>"
				+"</head>"
				+"<body>"
					+"<table border=1>"
						+"<thead>"
							+"<td>Tipo</td>"
							+"<td>Item</td>"
							+"<td>Descrição do Item</td>"
							+"<td>Código</td>"
						+"</thead>"
						+"<tbody>"+cancatenar()
							/*+"<tr>"
								+"<td>Material</td>"
								+"<td>"+value.item+"</td>"
								+"<td>"+value.descricao+"</td>"
								+"<td>"+value.codigo+"</td>"
							+"</tr>"*/
						+"</tbody>"
					+"</table>"
				+"</body>"
			+"</html>";
			pagina = window.open("", '_blank');
		 	pagina.document.open();
		   	pagina.document.write(texto);
		  	pagina.document.close();
		});


		$(document).ready(function() {

			function animateloop () {
		        $("#barra").css({marginLeft: "-45%"});
		        $("#barra").animate({marginLeft: "145%"}, 2000, function(){animateloop()});
		    }

		    function setGrupo(itens){
		    	var temporario = [];
		    	$('#grupo').append("<option disabled noselected><i>Selecione um ou mais grupos</i></option>");
		    	for (let value of itens) {
			    	if (!temporario.some(item => item.id_grupo == value.id_grupo)){
			    		temporario.push(value);
			    		$('#grupo').append("<option value='"+value.id_grupo+"'>"+value.grupo+"</option>");
			    	}
			    }
		    }

		    function setClasse(itens){
		    	var temporario = [];
		    	$('#classe').append("<option disabled noselected><i>Selecione uma ou mais classes</i></option>");
		    	for (let value of itens) {
			    	if (!temporario.some(item => item.id_classe == value.id_classe)){
			    		temporario.push(value);
			    		$('#classe').append("<option value='"+value.id_classe+"'>"+value.classe+"</option>");
			    	}
			    }
		    }

		    function setTableValue(itens){
		    	var numero = 0;
		    	for (let item of itens) {
		    		numero += 1;
			    	$("tbody").append("<tr onclick='javascript:adcionar("+item.codigo+")'><td>"
					+numero+"</td><td>"
					+item.codigo+"</td><td>"
					+item.descricao+"</td><td>"
					+item.sustentavel+"</td></tr>");
		    	}
    			if (numero == 0)
					$("tbody").append("<tr><td colspan=4><center> Nenhum item encontardo ou ativo</center></td></tr>");
		    }

		    $("#remove").click(function(){
				localStorage.removeItem('itens');
			});

		    $("#classe").change(function(){
		    	var temporario = [];
		    	var classes = $("#classe").val();
		    	for (let item of itens){
		    		if (classes.some(classe => classe == item.id_classe))
		    			temporario.push(item);
		    	}
				$("tbody").empty();
				setTableValue(temporario);
		    });

		    $("#grupo").change(function(){
		    	var temporario = [];
		    	var grupos = $("#grupo").val();
		    	for (let item of itens)
		    		if (grupos.some(grupo => grupo == item.id_grupo))
		    			temporario.push(item);
				$('#classe').empty();
				$("tbody").empty();
				setClasse(temporario);
				setTableValue(temporario);
		    });

			function setDados(dados){
				for (let value of dados) {
					if (value['status']){
						var  sustentavel = value['sustentavel'] ? "Sim" : "Não";
						itens.push({
							codigo: value['codigo'],
							descricao: value['descricao'],
							sustentavel: sustentavel,
							id_grupo: value['id_grupo'],
							grupo: value['_links']['grupo']['title'],
							id_classe: value['id_classe'],
							classe: value['_links']['classe']['title']
						});
					}
				}
			}

			function limpar(){
				itens = new Array();
				$("tbody").empty();
				$('#classe').empty();
				$('#grupo').empty();
			}

			$("#buscar").click(function(){
				if ($("#campo").val().length > 1) {
					limpar();
					$("#loader").html("<div class='progress'><div id='barra' class='progress-bar progress-bar-striped' role='progressbar' aria-valuenow='45' aria-valuemin='0' aria-valuemax='100' style='width:45%'></div></div>");
					animateloop();
					$.ajax({
						type: 'GET',
						url:  'http://compras.dados.gov.br/materiais/v1/materiais.json?descricao_item='+$("#campo").val(),
						success: function(response) {
							resultado = response['_embedded']['materiais'];
							setDados(resultado);
							setGrupo(itens);
							setClasse(itens);
							setTableValue(itens);
							$(".progress").remove();
						},
						error: function(){
							$(".progress").remove();
							alert("Para evitar o erro 'Access-Control-Allow-Origin' ins");
						}
					});
				}
			});
		});
	</script>
</html>
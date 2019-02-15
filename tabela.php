<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Tablesorter - Tutsup</title>
	<!-- Estilos necessários para o tema do tablesorter -->
	<link rel="stylesheet" href="css/blue/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- jQuery e Tablesorter -->
	<script src="js/jquery-latest.js"></script>
	<script src="js/jquery.tablesorter.min.js"></script>
	<!-- Meu script -->
	<script src="js/scripts.js"></script>
</head>

<body>
    <form action="receber.php" method="POST">
        <div class="row">
            <div class="col-md-3 col-12">
                <label for="campo" class="label-control">Quantidade de Colunas</label>
                <input type="number" name="campo" id="campo" class="form-control form-control-sm" required="">
            </div>

            <div class="col-md-3 col-12">
                <label for="campo" class="label-control">Separador Colunas</label>
                <select id="grupo" name="Scoluna" class="form-control" required="">
                    <option value="" noselected >Selecione</option>
                    <option value="0"> Vírgula</option>
                    <option value="1"> Traço</option>
                    <option value="2"> Barra</option>
                    <option value="3"> Espaço</option>
                    <option value="2"> Tabulação</option>
                    <option value="2"> Ponto</option>
                    <option value="3"> Ponto e Virgula</option>
                </select>
            </div>

            <div class="col-md-3 col-12">
                <label for="campo" class="label-control">Separador Linhas</label>
                <select id="grupo" name="SLinha" class="form-control" required="">
                    <option value=""  noselected>Selecione</option>
                    <option value="0"> Vírgula</option>
                    <option value="1"> Traço</option>
                    <option value="2"> Barra</option>
                    <option value="3"> Espaço</option>
                    <option value="2"> Tabulação</option>
                    <option value="2"> Ponto</option>
                    <option value="3"> Ponto e Virgula</option>
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

    <?php
        session_start();
        echo $_SESSION['tabela'];
    ?>
</body>
script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
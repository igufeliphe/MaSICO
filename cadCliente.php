<?php
include 'header.php';
 include_once 'config.php'; ?>



<html>
	<head>
		<title>Cadastro de Cliente</title>
		<meta charset="utf-8">
	</head>
	<body>


<!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>






<div class="container">
		<form action="" method="POST" enctype="multipart/form-data">

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Nome</span>
  <input type="text" class="form-control" name="nome" aria-describedby="basic-addon1" >
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">CPF</span>
  <input type="text" class="form-control" name="cpf" aria-describedby="basic-addon1" maxlength="11" required>
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">CNPJ</span>
  <input type="text" class="form-control" name="cnpj" aria-describedby="basic-addon1" required>
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">RG</span>
  <input type="text" class="form-control" name="rg" aria-describedby="basic-addon1" required>
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">I.E</span>
  <input type="text" class="form-control" name="ie" aria-describedby="basic-addon1" required>
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Telefone</span>
  <input type="number" class="form-control" name="tel" aria-describedby="basic-addon1" required>
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">E-mail</span>
  <input type="email" class="form-control" name="email" aria-describedby="basic-addon1" required>
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">CEP</span>
  <input type="text" class="form-control" id="cep" name="cep" aria-describedby="basic-addon1" required>
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Rua</span>
  <input type="text" class="form-control" id="rua" name="rua" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Nº</span>
  <input type="text" class="form-control" name="num" aria-describedby="basic-addon1" required>
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Bairro</span>
  <input type="text" class="form-control" id="bairro" name="bairro" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Cidade</span>
  <input type="text" class="form-control" id="cidade" name="cidade" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Estado</span>
  <input type="text" class="form-control" id="uf" name="estado" aria-describedby="basic-addon1">
</div>
<br>
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Imagem</span>
  <input type="file" class="form-control" name="foto" aria-describedby="basic-addon1">
</div>
<br>

			<button class="btn btn-default" type="submit" name="confirmar">Cadastrar</button><br>
		</form>
	</div>
	</body>
</html>

<?php 
if (isset($_POST['confirmar'])) {

  cadCliente();
  
}
 ?>
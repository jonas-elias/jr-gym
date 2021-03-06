<body>

<?php include('title.php'); ?>
<?php include('paginacaoTelas.php'); ?>

<div class="container" style="margin-top: 5%; margin-bottom: 5%;">
  <div class="row">
    <div class="col-sm-6">
     <h2>Cadastro de funcionários</h2><br><br>
     <form action=".././backend/cadastroFuncionario.php" method="POST" enctype="multipart/form-data">
        <fieldset>
			<P>Nome do funcionário: <input type="text" placeholder="Digite o nome do funcionário" id="nome_funcionario" name="nome_funcionario">
			<P>Data de nascimento: <input type="date" placeholder=" Digite a data de nascimento" id="nascimento_funcionario" name="nascimento_funcionario">
			<P>RG: <input type="text" id="rg" placeholder=" Digite o RG do funcionário" name="rg_funcionario">
			<P>CPF: <input type="text" placeholder=" Digite o CPF do funcionário" id="cpf_funcionario" name="cpf_funcionario">
			<p>Gênero:
			<select name="genero_funcionario" id="genero_funcionario" style="background-color: #DDDDDD;">
				<option value="0">Selecione</option>
				<option value="Masculino">Masculino</option>
				<option value="Feminino">Feminino</option>
			</select>
			</p>
			<p>E-mail: <input type="text" placeholder=" Digite o e-mail do cliente" id="email_funcionario" name="email_funcionario"></p>
			<p>Telefone: <input type="text" placeholder=" Digite o telefone do cliente" id="telefone_funcionario" name="telefone_funcionario"></p>
			<p>Observação: <input type="text" id="observacao_funcionario" placeholder=" Digite uma observação" name="observacao_funcionario"></p>
			<p>Senha: <input type="password" placeholder=" Digite uma observação" id="senha_funcionario" name="senha_funcionario"></p>
			<br>
			<p>Endereço: <input type="button" class="btn" style="background-color: #2F4F4F; color: white;" data-toggle="modal" data-target="#modalEndereco" value="Abrir caixa de informações" placeholder="Endereço">
			<p>Link da foto: <input name="userfile" type="file" /></p>
				</p>
				<input class="inputUpdate2" name="inputHiddenEndereco" value="" type="hidden">
				<input class="inputUpdate" value="" type="hidden">
				<button type="submit" style="background-color: #2F4F4F; color: white;" class="btn btn-primary btn-enviar-dados-funcionarios">Enviar</button>
			<div class="modal fade" id="modalEndereco" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Informações do endereço</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
							<div class="form-group">
							<label for="recipient-name" class="col-form-label">Rua:</label>
							<input type="text" class="form-control" id="rua-name" name="rua">
							</div>
							<div class="form-group">
							<label for="recipient-name" class="col-form-label">Número:</label>
							<input type="text" class="form-control" id="numero-name" name="numero">
							</div>
							<div class="form-group">
							<label for="recipient-name" class="col-form-label">Cidade:</label>
							<input type="text" class="form-control" id="cidade-name" name="cidade">
							</div>
							<div class="form-group">
							<label for="recipient-name" class="col-form-label">Bairro:</label>
							<input type="text" class="form-control" id="bairro-name" name="bairro">
							</div>
							<div class="form-group">
							<label for="recipient-name" class="col-form-label">Estado:</label>
							<select  class="form-control" name= "estado" id="estado" style="background-color: #DDDDDD;">
								<option  class="form-control" value="0">Selecione</option>
								<option  class="form-control" value="SC">Santa Catarina</option>
								<option  class="form-control" value="RS">Rio Grande do Sul</option>
							</select>
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Salvar</button>
						<!--button type="button" class="btn btn-primary"></button-->
					</div>
				</div>
			</div>
        </fieldset>
      </form>
   </div>
   <div class="col-sm-6">
   		<p>Buscar pelo nome: <input type="text" placeholder="Digite o nome do funcionário" class="text-buscar" name="text-buscar"></p>
		<?php
				include('./../backend/conexao.php');
				
				if (!$link) {
					die('Não foi possível conectar: ' . mysqli_error($conn));
				}
				
				$query = "SELECT * from funcionario LIMIT 10";
				$result = mysqli_query ($link, $query);

		?>
		<table class="table">
			<thead>
				<tr>
				<th scope="col">Id</th>
				<th scope="col">Nome</th>
				<th scope="col">Cpf</th>
				<th scope="col">Ações</th>
				</tr>
			</thead>
			<?php if ($result) { 
				while($row = mysqli_fetch_array($result)) { ?>
					<tbody id="popularDados">
						<tr>
						<td><?php echo $row['cod']; ?></td>
						<td><?php echo $row['nome']; ?></td>
						<td><?php echo $row['cpf']; ?></td>
						<td><button type="button" style="margin-right: 10px;" class="btn btn-success btn-edit" data-id-edit="<?php echo $row['cod'] ?>"><i class="far fa-edit"></i></button>
						<button type="button" class="btn btn-danger btn-exclude" data-id-exclude="<?php echo $row['cod'] ?>" ><i class="fas fa-times-circle"></i></button></td></tr>

					</tbody>
				<?php } ?>
			<?php } ?>
		</table>
   </div>
  </div>
</div>

<div class="modal fade modalMensagem" id="myModal1 modalMensagem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mensagem do sistema!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-mensagem">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-modal" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>			

<div class="jumbotron text-center" style="margin-bottom: 0;">
  <p>Jr Fitness system</p>
  <p>Sistema de controle de clientes</p>
</div>

</body>
<script>
    
    $(document).on("click", ".btn-enviar-dados-funcionarios", function(e) {
		varMensangem = "";
		if($("#nome_funcionario").val() == ""){
			e.preventDefault();
			varMensangem += " Nome,"	
		}
		if($("#cpf_funcionario").val() == ""){
			e.preventDefault();
			varMensangem += " Cpf,"
		}if($("#email_funcionario").val() == ""){
			e.preventDefault();
			varMensangem += " Email,"
		}if($("#telefone_funcionario").val() == ""){
			e.preventDefault();
			varMensangem += " Telefone,"
		}if($("#senha_funcionario").val() == ""){
			e.preventDefault();
			varMensangem += " Senha,"
		}

		if(varMensangem != ""){
			varNovaMensagem = varMensangem.slice(0, -1);
			$(".text-mensagem").html("Digite os campos de: " + varNovaMensagem)
			$('.modalMensagem').modal('show');
		}

    });

	$(document).on("click", ".btn-edit", function(e) {
		$.ajax({
          url: ".././backend/buscarFuncionarios.php",
          type: "POST",
          data: {q : $(this).attr('data-id-edit'), action: "popularCampos"},
          success: function(result){
			jq_json_obj = $.parseJSON(result);
			cont = jq_json_obj.length
			$('#nome_funcionario').val(jq_json_obj['nome']);
			$('#nascimento_funcionario').val(jq_json_obj['data_nasc']);
			$('#rg').val(jq_json_obj['rg']);
			$('#cpf_funcionario').val(jq_json_obj['cpf']);

			if(jq_json_obj['genero'] == 1){
				$('#genero_funcionario').val('Masculino');
			}else if(jq_json_obj['genero'] == 2){
				$('#genero_funcionario').val('Feminino');
			}else{
				$('#genero_funcionario').val('Outros');
			}

			$('.inputUpdate').attr("name", 'inputHidden');
			$('.inputUpdate').val(jq_json_obj[0]);
			$('.inputUpdate2').val(jq_json_obj['endereco']);
			$('#email_funcionario').val(jq_json_obj['email']);
			$('#telefone_funcionario').val(jq_json_obj['fone']);
			$('#observacao_funcionario').val(jq_json_obj['obs']);
			$('#senha_funcionario').val(jq_json_obj['senha']);
			$('#rua-name').val(jq_json_obj['rua']);
			$('#numero-name').val(jq_json_obj['numero']);
			$('#cidade-name').val(jq_json_obj['cidade']);
			$('#bairro-name').val(jq_json_obj['bairro']);
			$('#estado').val(jq_json_obj['estado']);

          },
          error: function(error){

          }
      	});
    });

	$(document).on("click", ".btn-exclude", function(e) {
		$(".text-mensagem").html("Tem certeza que deseja excluir o funcionário?")
		$('.modalMensagem').modal('show');
		$('.btn-modal').addClass('btn-exclude-modal');
		$('.btn-exclude-modal').html("Excluir");
		$('.btn-exclude-modal').attr('data-id', $(this).attr('data-id-exclude'));
    });

	$(document).on("click", ".btn-exclude-modal", function(e) {
		$.ajax({
          url: ".././backend/excludeFuncionario.php",
          type: "POST",
          data: {q : $(this).attr('data-id')},
          success: function(result){
			alert('Excluído com sucesso');
          },
          error: function(error){
			alert('Error '+ error);
          }
      	});
    });

	$( ".text-buscar" ).keyup(function() {
		$.ajax({
          url: ".././backend/buscarFuncionarios.php",
          type: "POST",
          data: {q : $('.text-buscar').val()},
          success: function(result){
			cols = "";
			if(result == "null"){
				cols += '<td scope="row"></td>';
				$("#popularDados").html(cols);
				cols = "";
			}else{
				jq_json_obj = $.parseJSON(result);
				cont = jq_json_obj.length
				for (x = 0; x < cont; x++){
					cols += '<tr><td scope="row">'+jq_json_obj[x]['cod']+'</td>';
					cols += '<td>'+jq_json_obj[x]['nome']+'</td>';
					cols += '<td>'+jq_json_obj[x]['cpf']+'</td>';
					cols += '<td><button type="button" style="margin-right: 10px;" class="btn btn-success btn-edit" data-id-edit="'+jq_json_obj[x]['cod']+'"><i class="far fa-edit"></i></button>'
					+'<button type="button" class="btn btn-danger btn-exclude" data-id-exclude="'+jq_json_obj[x]['cod']+'" ><i class="fas fa-times-circle"></i></button></td></tr>';

					$("#popularDados").html(cols);
				} 
			}

          },
          error: function(error){
            alert('Error '+ error);
          }
      });
	});

  </script>
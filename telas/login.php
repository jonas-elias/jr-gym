<body>
  <?php include('telas/title.php'); ?>

  <div class="container" style="margin-top: 5%; margin-bottom: 5%; width: 40%;">
    <div class="row">
      <div class="col-md-12">
      <br><br><br>
      <h2>Login</h2>
    <form>
      <div class="form-group" >
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Digite seu email" name="email">
      </div>
      <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" class="form-control" id="senha" placeholder="Insira sua senha" name="senha">
      </div>
     
    <div>
    <button type="button" class="btn btn-primary btn-logar-sistema">Enviar</button>

    </div>
    
    </form>
    <br><br><br> 
    </div>
    </div>
  </div>

  <div class="modal fade modalMensagem" id="myModal1 modalMensagem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mensagem do sistema</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-mensagem">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
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
    
    $(document).on("click", ".btn-logar-sistema",function() {
      $.ajax({
          url: "./backend/login.php",
          type: "POST",
          data: {email: $("#email").val(),  senha: $("#senha").val()},
          success: function(result){
            if(result != "Usuário ou senha incorretos"){
              setTimeout(() => {  
                location.href = "http://localhost/projetoAcademia/telas/cadastro_funcionario.php"; 
              }, 2500);
            }
            $(".text-mensagem").html(result);
            $('.modalMensagem').modal('show');
          },
          error: function(error){
            alert(error);
          }
      });
    });
  </script>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="include/css/index.css">

    <title>Login | Proyecto</title>
  </head>
  <body id="main">
    <div class="element transicion--fadein">
    <!-- Contenido animado -->
      <div class="container">
      <div class="row justify-content-center pt-5 mt-5 mr-1">
        <div class="col-md-4 form- div-login pt-4 pb-5">
          <form action="include/functions/validate.php" method="POST">
            <div class="form-group text-center pb-4 h2-title">
                <h2 class="text-light text-h2">Login</h2>
            </div>
            <div class="form-group text-center">
              <div class="form-group mx-sm-4">
                <div class="h1-class">
                  <label for="" class="form-group text-light">Matrícula: </label>
                </div>
                <input type="number" name="user" min="0000000" max="9999999" id="user" class="form-control user label-login" placeholder="1234567" required>
              </div>
              <script>
                var input=  document.getElementById('user');
                input.addEventListener('input',function(){
                  if (this.value.length > 7) 
                    this.value = this.value.slice(7,7); 
                })
              </script>
              <div class="form-group mx-sm-4">
                <div class="h1-class pass">
                  <label for="" class="form-group text-light">Contraseña: </label>
                </div>
                <input type="password" name="password" id="password" class="form-control user label-login" placeholder="Contraseña" required>
              </div>
              <p class="error">
              <?php
              if ($_GET) {
                  if ($_GET["login"] == 1) {
                      echo 'Mátricula y/o Contraseña Incorrecta';
                  }
              }
              ?>
              </p>
              <div class="form-group mx-sm-4 div-button">
                <button type="submit" name="submit" class="btn btn-block login text-light login-btn" onsubmit=>
                  <i class="fas fa-sign-in-alt"></i>Login</button>
              </div>
            </div>
          </form>

        </div>
      </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <!-- Script-->
    <script src="include/js/jquery-3.6.0.min.js"></script>
    <script src="include/js/jquery.smoothState.min.js"></script>
    <script src="include/js/function.js"></script>
  </body>
</html>

<!DOCTYPE html>
<html lang="ptbr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - NS</title>
        <link href="../bootstrap/css/styles.css" rel="stylesheet" />
        <link href="../public/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="login-post" method="POST">
                                            <input type="hidden" name="tipo" value="login">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="" type="text" placeholder="Login" 
                                                    name="login" data-mask="999.999.999-99">
                                                <label for="login">Login</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="senha" type="password" placeholder="Senha" name="senha"/>
                                                <label for="senha">Senha</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../bootstrap/js/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"> </script>
    <script src="../public/js/jquery-mask/jquery.mask.js"> </script>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>

    <script> 

        $(document).ready(function() {
            
        });
    </script>
</html>

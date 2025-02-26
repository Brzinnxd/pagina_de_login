
<?php 
    require ("conexao.php");

    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_SESSION["nome"])){
        header("location: pagina_inicial");
    }
    else{
        if(isset($_POST["email"])){
       
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $consulta = "SELECT * FROM cadastro WHERE email = '$email' limit 1";
    
            $sql_exec = $mysqli->query($consulta) or die ($mysqli->error);
            $usuario = $sql_exec->fetch_assoc();
        
            if(password_verify($senha, $usuario['senha'])){
                $_SESSION["nome"] = $usuario['nome'];
                header("location: pagina_inicial.php");
            }
            else{
                echo "<script> alert('Senha ou email incorreto')</script>";
            }
    
           
        }
    }
    
    
       
    
    


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container">
    <div class="container d-flex justify-content-center">

    
        <form class="form" method="post">
            <h1 class="text-center">Login</h1>
          
            <div class="flex-column">
                <label>Email: </label>
            </div>
            <div class="inputForm">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 32 32" height="20">
                    <g data-name="Layer 3" id="Layer_3">
                        <path
                            d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z">
                        </path>
                    </g>
                </svg>
                <input placeholder="Digite seu Email" class="input" type="text" name="email" required>
            </div>

            <div class="flex-column">
                <label>Senha: </label>
            </div>
            <div class="inputForm">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="-64 0 512 512" height="20">
                    <path
                        d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0">
                    </path>
                    <path
                        d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0">
                    </path>
                </svg>
                <input placeholder="Digite sua Senha" class="input" type="password" name="senha" required>
            </div>

           

            <div class="flex-row">
                <div>
                    <input type="radio">
                    <label>Lembrar senha </label>
                    
                </div>
                    
                <span class="span">Esqueceu a senha?</span>
                
            </div>
            
            <p class="p">Não tem uma conta? <a href="cadastro.php" class="span">Criar</a>
            <input type="submit" class="button-submit"/>
            
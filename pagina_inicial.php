<?php 
   
   require ("conexao.php");

   if(!isset($_SESSION)){
        session_start();
   }

   if(!isset($_SESSION["nome"])){
        header("location: login.php");
   }

   else{

   }
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>BEM VINDO A PAGINA INICIAL!!</h1>
    <p>Logado com sucesso: <?php echo($_SESSION["nome"]); ?></p>
    <a class="btn btn-link" href='sair.php'>Voltar</a>
    
</body>
</html>
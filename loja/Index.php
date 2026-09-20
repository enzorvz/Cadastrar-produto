<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Formulario de cadastro</title>
</head>
<body>
    <section>
        <h1>Envio de Imagens</h1>
        <form action="teste.php" method="post" enctype="multipart/form-data">
            <label for="nome"> Nome de Produto</label>
            <input type="text" name="nome">

           <label for="desc"> descript</label>
            <textarea name="desc"></textarea>

            <label for="valor"> Valor de Produto</label>
            <input type="number" name="valor">

            

            <input type="file" name="foto[]" multiple> 
            <input type="submit" id="botao">
            
        </form>
    </section>
</body>
</html>

 

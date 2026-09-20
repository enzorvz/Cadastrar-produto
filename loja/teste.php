<link rel="stylesheet" href="CSS/louco.css">
<?php
require 'classe/Produto.class.php';
$p = new Produto() ;

$con= $p->conecta();
if ($con){
  if (isset($_POST["nome"])) {  
    $nome =$_POST["nome"];
    $desc =$_POST["desc"];
     $valo =$_POST["valor"];
     $foto=$_FILES["foto"]["name"];

    if($p->cadastrar($nome, $desc, $valo,$foto)){
      echo "cadastro sucedido";
    }

    $dados=$p->mostrarTudo();
echo"<div>";
    foreach ($dados as  $value) {
      ?>
 
      <img src="imagens/<?php echo $value['nome_imagem'];?>">
 
 <?php
 echo"</div>";
    }

  }}
    ?>
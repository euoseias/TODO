

 
<?php
       //_______________________________________________________________________________________
      //                                   TABLE TAREFA
     //__________________________________________________________________________________________ 
// Conectando ao banco de dados:
 include_once("conexaoBD.php");
$id = $_POST['id'];
$tarefas = $_POST['tarefas'];
$situacao = $_POST['situacao'];

$strcon = mysqli_connect('localhost','root','','todo') or die('Erro ao conectar ao banco de dados');
$sql = "INSERT INTO tarefas VALUES ";
$sql .= "('','$tarefas', '$situacao')"; 

mysqli_query($strcon,$sql) or die("Erro ao tentar cadastrar registro");
mysqli_close($strcon);
?>


 <?php
 echo "Redirecionamento";  
 header("Location:index.php");
  die(); 
?>

<?php
 error_reporting ( 0 );
?>


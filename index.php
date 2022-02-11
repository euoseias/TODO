
<?php
//Ocultar variaveis
 error_reporting ( 0 );
?>
<?php
 // Conectando ao banco de dados:
 include_once("conexaoBD.php");
?>

 <html>
 <head>
 <link href="index.css" rel="stylesheet" type="text/css">
 <title>TODO</title>
 </head>
 <body>

 	  <h1>TODO</h1>
        <div class="mode">
              <input type="checkbox" class="checkbox" id="chk"/>
             <label class="label" for="chk">
               <i class="fas fa-moon"></i>
                  <i class="fas fa-sun"></i>
      <div class="ball"></div>
    </label>
       </div>


<div class="centro3">
	<form name="cadatro" action="CadastraDados.php" method="POST">
        <input type="text" name="tarefas"  placeholder="Tarefas" required>
             <button type="submit" class="button4">Adcionar</button>
               <input type="radio" name="situacao"  value="ativo" required> <label>Ativo</label>
                   <input type="radio" name="situacao" value="completo" required><label>Completo</label>  
    </form>
</div>

 	





 <!-- Criando tabela e cabeçalho de dados: -->
 <table id="customers"  class="centro2"> 
 <!-- Preenchendo a tabela com os dados do banco: -->
 <?php

 /*Consultando a tabela tarefas*/
 $sql = "SELECT * FROM tarefas";
 $resultado = mysqli_query($strcon,$sql) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while ($registro = mysqli_fetch_array($resultado))
 {
 	  $id = $registro['id'];
      $tarefas = $registro['tarefas'];
          echo "<td>"."<input type='radio' class='a' id='$+id''>".$tarefas."</td>";
             echo "</tr>";
 }
 mysqli_close($strcon);
 echo "</table>";
?>




<div class="centro4">
    <div class="meio">
       <a href="#" style="text-decoration:none; color:white;" id="bntCheckTrue">Concluidos</a>
          <a href="pagina2.php" style="text-decoration:none; color:white;" class="button1">Tudo</a>
             <a href="ativo.php"   style="text-decoration:none; color:white;" class="button2">Ativo</a>
                <a href="completo.php"   style="text-decoration:none; color:white;" class="button3">Completo</a>
     </div>

<div class="direita">
    <?php  echo"<a href='#' style='text-decoration:none; color:white;' id='$id' class='btn btn-outline-danger btn-sm' onclick='apagarUsuarioDados($id)'>Apagar Completo</a>";
        ?> 
</div>
</div>









<script>
	let checkbox = document.querySelectorAll('.a')
	let bntCheckTrue = document.querySelector('#bntCheckTrue')


	bntCheckTrue.addEventListener('click', () => {
	    for(let current of checkbox){
	    	current.checked = !current.checked
	    }
	})

async function apagarUsuarioDados(id) {

    var confirmar = confirm("Tem certeza que deseja excluir o registro selecionado?");

    if(confirmar == true){
        const dados = await fetch('apagar.php?id=' + id);

        const resposta = await dados.json();
        if (resposta['erro']) {
            msgAlerta.innerHTML = resposta['msg'];
        } else {
            msgAlerta.innerHTML = resposta['msg'];
            listarUsuarios(1);
        }
    }    

}


const chk = document.getElementById('chk')

chk.addEventListener('change', () => {
  document.body.classList.toggle('dark')
})
</script>




</body>
</html>









<?php
include_once('mensagens.php');
if (!empty($_POST)) {
    $nome = trim($_POST["nome"]);
    $descricao = trim($_POST["descricao"]);
    $quant = trim($_POST["quant"]);
    $valor = trim($_POST["valor"]);
    
    $sqlProduto = "insert into produto (nome, descricao, quant, valor) values ('$nome', '$descricao', '$quant', '$valor')";

   
    
    //Conecta o banco de dados
    $conn = mysqli_connect(LOCAL, USER, PASS, BASE);
    mysqli_set_charset($conn, "utf8");

    mysqli_query($conn, htmlspecialchars($sqlProduto)) or die(mysqli_error($conn));
    if ($sqlProduto){
        //echo "<div class='alert alert-success'> Salvo </div>";
        aviso("Salvo");
    } else {
        //echo "<div class='alert alert-danger'> Erro ao salvar! </div>";
        erro("Erro ao Salvar");
    }

    mysqli_close($conn);
}

?>

<section class="container bg-branco">
    <h3 class="center">Dados do usuário</h3>
    <form method="post" action="admin.php?pag=prod">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" name="nome" required>
        </div>
        <div class="form-group">
            <label>descrição</label>
            <input type="text" class="form-control" name="descricao" required>
        </div>
        <div class="form-group">
            <label>Quantidade</label>
            <input type="text" class="form-control" name="quant">
        </div>
        <div class="form-group">
            <label>Valor</label>
            <input type="text" class="form-control" name="valor">
        </div>
        
        <div class="form-group text-right">
            <button type="submit" class="btn bg-azul branco">Enviar</button>
            <button type="reset" class="btn btn-danger branco">Cancelar</button>
        </div>
    </form>
</section>
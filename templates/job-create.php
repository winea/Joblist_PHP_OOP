
<?php include 'includes/header.php';?>

<div class="container" style="margin-top:80px;">
    <h2 class="page-header">Criar nova Vaga de Trabalho</h2>
    <form method="post" action="create.php">
        <div clas="form-group">
            <label>Companhia</label>
            <input type="text" class="form-control" name="company">
        </div>
        <div clas="form-group">
            <label>Categoria</label>
            <select class="form-control" name="category" >
            <option value="0">Escolha a Categoria</option>
                    <?php foreach($categories as $category): ?>
                        <option value="<?php echo $category->id_categ; ?>">
                        <?php echo $category->name; ?></option>  
                    <?php endforeach ?>
            </select>
        </div>
        <div clas="form-group">
            <label>Titulo da Vaga</label>
            <input type="text" class="form-control" name="job_title">
        </div>
        <div clas="form-group">
            <label>Descricao</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div clas="form-group">
            <label>Localizacao</label>
            <input type="text" class="form-control" name="location">
        </div>
        <div clas="form-group">
            <label>Salario</label>
            <input type="text" class="form-control" name="salary">
        </div>
        <div clas="form-group">
            <label>Usuario para Contato</label>
            <input type="text" class="form-control" name="contact_user">
        </div>
        <div clas="form-group">
            <label>Email para Contato</label>
            <input type="text" class="form-control" name="contact_email">
        </div>
        <br>
        <input type="submit" class="btn btn-primary" value="Submit" name="submit">
    </form>
  
    <br><br>
</div> <!-- /container -->
<?php include 'includes/footer.php';?>

<?php include 'includes/header.php';?>

<div class="container" style="margin-top:80px;">
    <h2 class="page-header">Alterar nova Vaga de Trabalho</h2>
    <form method="post" action="edit.php?id=<?php echo $job->id_job; ?>">
        <div clas="form-group">
            <label>Companhia</label>
            <input type="text" class="form-control" name="company" value="<?php echo $job->company; ?>">
        </div>
        <div clas="form-group">
            <label>Categoria</label>
            <select class="form-control" name="category" >
            <option value="0">Escolha a Categoria</option>
                    <?php foreach($categories as $category): ?>
                    <?php if($job->id_categ == $category->id_categ) : ?>
                        <option value="<?php echo $category->id_categ; ?>" selected>
                            <?php echo $category->name; ?></option> 
                    <?php else : ?>
                        <option value="<?php echo $category->id_categ; ?>">
                            <?php echo $category->name; ?></option> 
                    <?php endif; ?>     
                    <?php endforeach ?>
            </select>
        </div>
        <div clas="form-group">
            <label>Titulo da Vaga</label>
            <input type="text" class="form-control" name="job_title" value="<?php echo $job->job_title;?>">
        </div>
        <div clas="form-group">
            <label>Descricao</label>
            <textarea class="form-control" name="description"><?php echo $job->description; ?></textarea>
        </div>
        <div clas="form-group">
            <label>Localizacao</label>
            <input type="text" class="form-control" name="location" value="<?php echo $job->location; ?>">
        </div>
        <div clas="form-group">
            <label>Salario</label>
            <input type="text" class="form-control" name="salary" value="<?php echo $job->salary; ?>">
        </div>
        <div clas="form-group">
            <label>Usuario para Contato</label>
            <input type="text" class="form-control" name="contact_user" value="<?php echo $job->contact_user; ?>">
        </div>
        <div clas="form-group">
            <label>Email para Contato</label>
            <input type="text" class="form-control" name="contact_email" value="<?php echo $job->contact_email; ?>">
        </div>
        <br>
        <input type="submit" class="btn btn-primary" value="Submit" name="submit">
    </form>
  
    <br><br>
</div> <!-- /container -->
<?php include 'includes/footer.php';?>
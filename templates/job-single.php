
<?php include 'includes/header.php';?>

<div class="container" style="margin-top:80px;">
    <h2 class="page-header"><?php echo $job->job_title;?> (<?php echo $job->location;?>)</h2>
    <small>Publicado por <?php echo $job->contact_user;?> em <?php echo $job->post_date;?></small>
    <hr>
    <p class="lead"><?php echo $job->description;?></p>
    <ul class="list-group">
        <li class="list-group-item"><strong>Empresa:</strong> <?php echo $job->company;?></li>
        <li class="list-group-item"><strong>Salario:</strong> <?php echo $job->salary;?></li>
        <li class="list-group-item"><strong>Email para Contato:</strong> <?php echo $job->contact_email;?></li>
    </ul> 
    <br><br>
    <a href="index.php">Voltar</a>
    <br><br>
</div> <!-- /container -->
<?php include 'includes/footer.php';?>
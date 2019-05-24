<?php
//parametros da base de dados
include_once 'config/init.php'; ?>

<?php
$job = new Job;

//Deletar
if(isset($_POST['del_id'])){
    $del_id = $_POST['del_id'];
    if($job->delete($del_id)){
        redirect('index.php', 'Job Delete', 'success');
    } else {
        redirect('index.php', 'Job Not Delete', 'error');

    }
}

$template = new Template('templates/job-single.php');

//condicional se tiver escolhido uma categoria atribiu senao deixa null
$job_id = isset($_GET['id']) ? $_GET['id'] : null;


$template->job = $job->getJob($job_id);

echo $template;
?>
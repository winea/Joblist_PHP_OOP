<?php
//parametros da base de dados
include_once 'config/init.php'; ?>

<?php
$job = new Job;

$template = new Template('templates/job-single.php');

//condicional se tiver escolhido uma categoria atribiu senao deixa null
$job_id = isset($_GET['id']) ? $_GET['id'] : null;


$template->job = $job->getJob($job_id);

echo $template;
?>
<?php
//parametros da base de dados
include_once 'config/init.php'; ?>

<?php
$job = new Job;

$job_id = isset($_GET['id']) ? $_GET['id'] : null;

//verificar se recebe dados do formulario
if(isset($_POST['submit'])){
    //Criar array de dados
    $data = array();
    $data['job_title'] = $_POST['job_title'];
    $data['company'] = $_POST['company'];
    $data['id_categ'] = $_POST['category'];
    $data['description'] = $_POST['description'];
    $data['location'] = $_POST['location'];
    $data['salary'] = $_POST['salary'];
    $data['contact_user'] = $_POST['contact_user'];
    $data['contact_email'] = $_POST['contact_email'];

    //echo $data['id_categ'];
    //a fç esta no helpers
    if($job->update($job_id, $data)){
        redirect('index.php', 'Vaga editada com sucesso', 'success');
    } else {
        redirect('index.php', 'Algo esta errado', 'error');
    }

}
$template = new Template('templates/job-edit.php');

$template->job = $job->getJob($job_id);

$template->categories = $job->getCategories();

echo $template;
?>
<?php
//parametros da base de dados
include_once 'config/init.php'; ?>

<?php
$job = new Job;

$template = new Template('templates/frontpage.php');

//condicional se tiver escolhido uma categoria atribiu senao deixa null
$category = isset($_GET['category']) ? $_GET['category'] : null;

if($category){
    $template->jobs = $job->getByCategory($category);
    $template->title = 'Trabalhos em ' . $job->getCategory($category)->name;
} else {
    $template->title = 'Latest Jobs';
    $template->jobs = $job->getAllJobs();
}


$template->categories = $job->getCategories();

echo $template;
?>
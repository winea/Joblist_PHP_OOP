<!--site https://getbootstrap.com/docs/4.3/examples/jumbotron/ copia do tema -->

<?php include 'includes/header.php'?>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
 
    <div class="jumbotron" style="width:80%;margin:auto;text-align:center;margin-top:80px;">
        <div class="container" >
        <h1 class="display-3">Encontre um trabalho</h1>
            <form method="GET" action="index.php">
            <select name="category" class="form-control">
                <option value="0">Escolha a Categoria</option>
                    <?php foreach($categories as $category): ?>
                        <option value="<?php echo $category->id_categ; ?>">
                        <?php echo $category->name; ?></option>  
                    <?php endforeach ?>     
            </select>
            <br>
            <input type="submit" class="btn btn-lg btn-success" value="PROCURAR">
            </form>
        </div> <!-- /container -->
    </div> <!-- /jumbotron -->

  <h2 style="text-align:center;"><?php echo $title ?></h2>
  <?php foreach($jobs as $job): ?>
  <div class="container" style="margin-top:30px;">
    <div class="row">
        <div class="col-md-10">
            <h3><?php echo $job->job_title; ?></h3>
            <p><?php echo $job->description; ?></p>
        </div>
        <div class="col-md-2">
            <a class="btn btn-primary" href="job.php?id=<?php echo $job->id_job; ?>">Detalhes</a>
        </div>
    </div>
  </div> <!-- /container -->
<?php endforeach; ?>

</main>


<?php include 'includes/footer.php';?>

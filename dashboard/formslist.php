<h1>Forms<span  class="float-right">⊞</span></h1>
<div class="bg-light rounded-top text-rose p-2">
    <form method="post" class="input-group-sm form-inline" action="index.php?form=create">
        <input type="text" class="form-control col-6" name="title" placeholder="Titre du formulaire...">
        <input type="submit" class="form-control btn bg-rose btn-rose text-white col-6" value="Créer !">
    </form>
</div>
<table class="table table-light text-rose rounded text-center no-top">
    <thead class="">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Steps</th>
        <th class="text-right">Del</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $count = 0;
    foreach (getAllForms($sql_connect) as $form) {
        ?>
        <tr>
            <th><?php echo $form['id'] ?></th>
            <th><a href="index.php?form=<?php echo $form['id'] ?>&view"><?php echo $form['title'] ?></a></th>
            <th><?php
               echo getStepsByFormId($sql_connect, $form['id'])->num_rows;
                ?></th>
            <th class="text-right"><a  class="btn btn-danger btn-sm" href="index.php?form=<?php echo $form['id'] ?>&delete">×</a></th>
        </tr>
        <?php
        $count++;
    }
    ?>
    </tbody>
</table>
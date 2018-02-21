<h1>Users<span class="float-right">⊞</span></h1>
<div class="bg-light rounded-top text-rose p-2">
<form method="post" class="input-group-sm form-inline" action="index.php?user=create">
    <input type="text" class="form-control col-6 " name="firstname" placeholder="Prénom..." required>
    <input type="text" class="form-control col-6" name="lastname" placeholder="Nom..." required>
    <input type="tel" class="form-control col-6" name="phone" placeholder="Numéro de télephone...">
    <input type="email" class="form-control col-6" name="email" placeholder="Adresse e-mail..." required>
    <input type="password" class="form-control col-6" name="password" placeholder="Mot de passe..." required>
    <input type="text" class="form-control col-6" name="society" placeholder="Sociéte...">
    <input type="text" class="form-control col-6" name="city" placeholder="Ville..." required>
    <input type="submit" class="form-control btn btn-rose bg-rose text-white col-6" value="Ajouter">
</form>
</div>
<table class="table table-light text-rose rounded text-center no-top">
    <thead class="">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Society</th>
        <th>City</th>
        <th class="text-right">Del</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $count = 0;
    foreach (getAllUsers($sql_connect) as $user) {
        ?>
        <tr>
            <th><?php echo $user['id'] ?></th>
            <th><?php echo $user['lastname'] . ' ' . $user['firstname'] ?></th>
            <th><?php echo $user['society'] ?></th>
            <th><?php echo $user['city'] ?></th>
            <th class="text-right"><a class="btn btn-danger btn-sm"
                                      href="index.php?user=<?php echo $user['id'] ?>&delete">×</a></th>
        </tr>
        <?php
        $count++;
    }
    ?>
    </tbody>
</table>
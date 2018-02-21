<?php

//Navbar not logged
if (!isset($_SESSION['email'])) { ?>
<nav class="navbar navbar-expand-sm bg-light fixed-top shadow">
    <a class="navbar-brand" href="#">
        <a class="logocci">&nbsp;</a>
    </a>
    <ul class="navbar-nav ml-auto">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-inline input-group-sm">
            <input type="email" name="email" required placeholder="Votre e-mail...." class="form-control mr-1">


            <input type="password" name="password" required placeholder="Votre mot de passe..." class="form-control mr-1">

            <button type="submit" name="submit" class="btn bg-rose text-white btn-sm">S'identifier</button>


        </form>
    </ul>
</nav>
<?php
} else if(isset($_SESSION))
    //Navbar logged
    {?>
<nav class="navbar navbar-expand-sm bg-light fixed-top">
    <a class="navbar-brand" href="#">
        <a class="logocci">&nbsp;</a>
    </a>
    <ul class="navbar-nav ml-auto">
        <a href="../logout.php?logout=true" class="btn bg-rose text-white">Logout</a>
    </ul>
</nav>
<?php }
<div class="rounded bg-light text-rose p-0 text-center mb-4" id="formblock">
    <?php $form = getFormById($sql_connect, $_GET['form'])->fetch_assoc();
    echo '<h1 class="text-center text-white bg-rose rounded-top p-3">' . $form['title'] . '<a class="float-right btn btn-danger btn" href="index.php?form=' . $form["id"] . '&delete">×</a>';
    echo '<form method="post" class="form-inline col-12 input-group-sm m-auto" action="index.php?formid=' . $form["id"] . '&step=create">';
    echo '<input type="text" name="step" class="form-control col-11" placeholder="Nouvelle étape....">';
    echo '<input type="submit" class="form-control col-1 text-white bg-success btn" value="+">';
    echo '</form>';
    echo '</h1>';
    echo '<div class="contrainer">';
    echo '<div class="row">';
    echo '<div class=col-12>';
    ?>
    <div id="step" class="carousel slide" data-ride="carousel" data-interval="false">

        <!-- The slideshow -->
        <div class="carousel-inner">
            <?php
            $count = 1;
            foreach (getStepsByFormId($sql_connect, $_GET['form']) as $step) {

                if ($count === 1) {
                    echo '<div class="col-md-11 ml-auto mr-auto m-5 p-0 carousel-item active" id="stepbox">';
                } else {
                    echo '<div class="col-md-11 ml-auto mr-auto m-5 p-0 carousel-item">';
                }
                echo '<h1 class="text-left text-rose p-3">' . $step['title'] . '  <a class="btn btn-danger btn-tiny mt-1" href="index.php?formid=' . $form["id"] . '&step=' . $step['id'] . '&delete">×</a></h1>';
                echo '<hr>';
                echo '<ul class="list-unstyled">';
                foreach (getQuestionsByStepId($sql_connect, $step['id']) as $question) {
                    echo '<li class=""><h3>' . $question['content'] . '  <a class="btn btn-danger btn-tiny" href="index.php?formid=' . $form["id"] . '&question=' . $question['id'] . '&delete">×</a></h3></li>';
                }
                echo '<hr>';
                echo '<form method="post" class="pb-3 form-inline col-12 input-group-sm" action="index.php?formid=' . $form["id"] . '&stepid=' . $step["id"] . '&question=create">';
                echo '<input type="text" name="question" class="form-control col-11" placeholder="Ajouter une nouvelle question...">';
                echo '<input type="submit" class="form-control col-1 text-white bg-success btn" value="+">';
                echo '</form>';
                echo '</ul>';
                echo '</div>';
                $count++;
            } ?>
        </div>

        <!-- Left and right controls -->

    </div>
    <?php
    echo '</div>';
    echo '</div>';
    ?>
</div>



<?php include('crud.php') ?>
<div class="rounded bg-light text-rose p-0 text-center mb-4" id="formblock">
    <?php $form = getFormById($sql_connect, $id)->fetch_assoc();
    echo '<h1 class="text-center text-white bg-rose rounded-top p-3">' . $form['title'].'</h1>';
    echo '<div class="contrainer">';
    echo '<div class="row">';
    echo '<div class=col-12>';
    ?>
    <div id="step" class="carousel slide" data-ride="carousel" data-interval="false">

        <!-- The slideshow -->
        <div class="carousel-inner">
            <?php
            $count = 1;
            foreach (getStepsByFormId($sql_connect,$id) as $step) {

                if ($count === 1) {
                    echo '<div class="col-md-11 ml-auto mr-auto m-5 p-0 carousel-item active" id="stepbox">';
                } else {
                    echo '<div class="col-md-11 ml-auto mr-auto m-5 p-0 carousel-item">';
                }
                echo '<h1 class="text-left text-rose p-3">' . $step['title'] . '</h1>';
                echo '<hr>';
                echo '<ul class="list-unstyled" id="questions">';
                foreach (getQuestionsByStepId($sql_connect, $step['id']) as $question) {
                    echo '<li class=""><h3>' . $question['content'] . '</h3><br><div class="m-auto pb-4 rateYo"></div></li>';
                }
                echo '<hr>';
                echo '</ul>';
                echo '</div>';
                $count++;
            } ?>
        </div>
    </div>
</div>
</div>

</div>



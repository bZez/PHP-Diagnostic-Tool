<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>
<body class="bg-bleu">
<?php include('navbar.php'); ?>
<main class="text-white p-5">
    <?php if (isset($_GET['form'])){
        $id = $_GET['form'];
      include ('display/form.php');
    } ?>
</main>
<footer class="footer shadow fixed-bottom position-fixed">
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col-sm-1 bg-rose text-white">
                <a class="carousel-control-prev" href="#step" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
            </div>
            <div class="col-sm-10 text-rose">
                {{ STATE }}
            </div>
            <div class="col-sm-1 bg-rose text-white" id="nav">
                <a class="carousel-control-next" href="#step" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </div>
</footer>

<!-- SCRIPTS -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.rateyo.min.js"></script>
<script>
    $(function () {contsize();
        $(".rateYo").rateYo({
            onSet: function(rating, rateYoInstance) {
                $(this).next().val(rating);
            },
            rating: 0,
            starWidth: "50px",
            numStars: 10,
            fullStar: true,
            ratedFill: "#ED164F"
        });
    });
    $(window).bind("resize",function(){contsize();});
    function contsize() {
        w = $(window).height();
        $('#formblock').css('min-height',''+ (w-230) +'px');
        $('#stepbox').css('min-height',''+ (w-430) +'px');
    }
    $('#nav').bind("click",function(){
        contsize();
    });
</script>
</body>
</html>
<?php include('login.php'); ?>
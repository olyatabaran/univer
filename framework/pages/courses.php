<?php

$connect = get_connection();

$result = mysqli_query($connect, "SELECT * FROM `courses`");
if (!$result) {
    printf("Сообщение ошибки: %s\n", mysqli_error($connect));
    exit();
}


$courses = [];
while ($row = mysqli_fetch_assoc($result)) {
    $row ['ultimateTime'] = getSeconds($row['updateTime']);
    $courses[] = $row;
}


mysqli_free_result($result);
mysqli_close($connect);
?>


<div class="row">
    <div class="col-8">
        <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/4.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/4.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/4.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-4">
        <h2>Information</h2>
        <hr>
        <ul class="list-group">
            <li class="list-group-item disabled" aria-disabled="true">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
        </ul>
    </div>
</div>
<br>
<h2>Courses</h2>
<hr>
<div class="row">
    <?php foreach ($courses as $index => $cours) { ?>
        <div class="col-6">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src=<?= $cours['image'] ?> class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $cours['name'] ?></h5>
                            <p class="card-text"><?= $cours['description'] ?></p>
                            <p class="card-text">
                                <small class="text-muted"><?= $cours['ultimateTime'] ?></small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

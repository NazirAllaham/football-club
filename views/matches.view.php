<!DOCTYPE html>
<html lang="es">
<head>
    <?php 
    $title = 'Real Madrid &copy;';
    require 'partials\head.view.php';
    ?>
</head>
<body>
    <?php include('partials\header.view.php') ?>

    <div class="container">
        <div class="col-md-8 mx-auto mt-2 mb-4 bg-black-50 border px-0">
            <div class="dropdown my-4 ml-4">
                <label for="dropdownMenuButton" class="mr-2 bold">Competition</label>
                <button class="btn btn-light border dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $championship ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item champion-option" onclick="onChampionChanged(0)">La Liga</button>
                    <button class="dropdown-item champion-option" onclick="onChampionChanged(1)">Champions League</button>
                    <button class="dropdown-item champion-option" onclick="onChampionChanged(2)">Copa Del Rey</button>
                </div>
            </div>
            <nav class=" text-white">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <?php foreach($archives as $index => $archive): ?>
                <a href="#nav-<?= $archive->name ?>" class="nav-item nav-link text-info <?= isset($_COOKIE['archive_name']) && ($archive->name === $_COOKIE['archive_name']) ? "active": "" ?>" id="nav-<?= $archive->name ?>-tab" data-toggle="tab" onclick="onArchiveChanged('<?= $archive->name; ?>')" role="tab" aria-controls="nav-<?= $archive->name ?>" aria-selected="false">
                    <?= $archive->name ?>
                </a>
                <?php endforeach; ?>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
            <?php foreach($archives as $archive): ?>
                <div class="tab-pane fade <?= isset($_COOKIE['archive_name']) && ($archive->name === $_COOKIE['archive_name']) ? "show active": "" ?>" id="nav-<?= $archive->name ?>" role="tabpanel" aria-labelledby="nav-<?= $archive->name ?>-tab">
                    <?php foreach ($matches[$archive->name] as $index => $match): ?>
                    <?php if (time() - strtotime($match->time) < 0): ?>
                    <div class="match border">
                        <div class="row px-4">
                            <div class="col-4">
                                <h6 class="text-secondary"><?= $match->day . ' ' . $match->day_name ?> | <?= $match->hour . ':' . $match->minute ?></h6>
                                <h6 class="text-highlight"><?= $match->month_name . ' ' . $match->year ?></h6>
                            </div>
                            <div class="col-5 divider">
                                <h4><?= $match->club_name ?></h4>
                                <h4>Real Madrid</h4>

                                <h6 class="text-muted"><?= $match->championship_name ?></h6>
                            </div>
                            <div class="col-3" style="text-align:right">
                                <button class="btn btn-info btn-sm">BUY TICKETS</button>
                                <button class="btn btn-secondary btn-sm mt-2">SEE DETAILS</button>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php endforeach; ?>
                
                    <div class="mt-4">
                    <h6 class="pt-4 pl-2 mb-0 pb-2" style="background-color:#eee">Previous matches</h6>
                    <?php foreach ($matches[$archive->name] as $index => $match): ?>
                    <?php if (time() - strtotime($match->time) > 0): ?>
                    <div class="match border">
                        <div class="row px-4">
                            <div class="col-4">
                                <h6 class="text-secondary"><?= $match->day . ' ' . $match->day_name ?> | <?= $match->hour . ':' . $match->minute ?></h6>
                                <h6 class="text-highlight"><?= $match->month_name . ' ' . $match->year ?></h6>
                            </div>
                            <div class="col-1 mr-0" style="text-align:right">
                                <h4><?= goals($match->id, 0, $app); ?></h4>
                                <h4><?= goals($match->id, 1, $app); ?></h4>
                            </div>
                            <div class="col-4 ml-0 divider">
                                <h4><?= $match->club_name ?></h4>
                                <h4>Real Madrid</h4>

                                <h6 class="text-muted"><?= $match->championship_name ?></h6>
                            </div>
                            <div class="col-3" style="text-align:right">
                                <button class="btn btn-secondary btn-sm mt-2">SEE DETAILS</button>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php endforeach; ?>                
                    </div>
                </div>
            <?php endforeach;?>
            </div>
        </div>
    </div>
<script>

function onChampionChanged(id)
{
    document.cookie = "championship_id=" + (id + 1);
    window.location.reload();
    //document.getElementById('dropdownMenuButton').innerHTML = document.getElementsByClassName('filter-option')[id].innerHTML;
}

function onArchiveChanged(name) 
{
    document.cookie = "archive_name=" + name;
    window.location.reload();
}

$('.nav-item:first-of-type').addClass("ml-2");
$('.nav-item:last-of-type').addClass("mr-2");

</script>
    <?php include('partials\footer.view.php') ?>
</body>
</html>
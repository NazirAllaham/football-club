<!DOCTYPE html>
<html>
<head>
    <?php 
    $title = 'Real Madrid &copy;';
    require 'partials\head.view.php';
    ?>
</head>
<body>
    <?php include('partials\header.view.php') ?>
    
    <div class="container">
        <div class="row my-4">
            <div class="d-flex mr-auto" id="leftCtrl">
                <button class="btn btn-light"><span class="fa fa-arrow-left"></span></button>
            </div>   
            
            <div class="col-8 d-flex" id="adapter">
                <?php foreach ($players as $index => $player): ?>
                <div class="card bd-highlight text-dark mx-2 pb-0 player">
                    <div class="left">
                        <img class="card-img-top img-fluid"  src="<?= $player->thumbnail ?>" alt="<?= $player->name ?>" />
                        <ul class="mt-2 mb-0 list-inline d-flex justify-content-center" style="list-style-type: none;">
                            <li class="p-0 mt-1 mx-auto text-dark list-inline-item h3">
                                <?= $player->number ?>
                            </li>
                            <ul class="p-0 ml-1 mr-auto list-inline-item" style="list-style-type: none;">
                                <li class="p-0 mt-1 mr-auto text-dark">
                                    <?= $player->name ?>
                                </li>
                                <li class="p-0 mt-1 mr-auto text-muted">
                                    <?= $player->position ?>
                                </li>
                            </ul>
                        </ul>
                    </div>
                    <div class="right pb-0" hidden>
                        <img class="card-img-top img-fluid"  src="<?= $player->avatar ?>" alt="<?= $player->name ?>" onclick="">
                        <ul class="mt-2 mb-0" style="list-style-position: inside; list-style-type: square;">
                            <li class="p-0 mt-1 mx-auto text-dark">
                                <?= $player->name ?>
                                <br><label class="ml-4 text-muted">Name</label>
                            </li>
                            <li class="p-0 mt-1 mx-auto text-dark">
                                <?= $player->weight ?>
                                <br><label class="ml-4 text-muted">Weight</label>
                            </li>
                            <li class="p-0 mt-1 mx-auto text-dark">
                                <?= $player->height ?>
                                <br><label class="ml-4 text-muted">Height</label>
                            </li>
                            <li class="p-0 mt-1 mx-auto text-dark">
                                <?= $player->placeOfBirth ?>
                                <br><label class="ml-4 text-muted">Place of birth</label>
                            </li>
                            <li class="p-0 mt-1 mx-auto text-dark">
                                <?= $player->dateOfBirth ?>
                                <br><label class="ml-4 text-muted">Date of birth</label>
                            </li>
                            <li class="p-0 mt-1 mb-0 mx-auto text-dark">
                                <?= $player->position ?>
                                <br><label class="ml-4 text-muted">Position</label>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php endforeach;?>
            </div>

            <div class="d-flex ml-auto" id="rightCtrl">
                <button class="btn btn-light"><span class="fa fa-arrow-right"></span></button>
            </div>
        </div>    
    </div>
<script>
    class Adapter {
        constructor(size, model, leftCtrl, rightCtrl) {
            this.size = size;
            this.model = model;

            this.left = 0;
            this.right = size-1;

            for(let i=size ; i<model.children.length ; i++)
            {
                model.children[i].hidden = true;
            }

            $(leftCtrl).click(() => {
                this.shift(-1);
            });

            $(rightCtrl).click(() => {
                this.shift(1);
            });
        }

        shift(off) {
            console.log(off);
            if(off === -1)
            {
                this.model.children[this.left + 1].classList.remove('w-50');
                this.model.children[this.left + 1].getElementsByClassName('right')[0].hidden = true;
                this.model.children[this.left + 1].getElementsByClassName('left')[0].hidden = false;

                if(this.left > 0)
                {
                    this.model.children[this.right].hidden = true;
                    this.model.children[this.left-1].hidden = false;

                    this.model.children[this.left].classList.add('w-50');
                    this.model.children[this.left].getElementsByClassName('right')[0].hidden = false;
                    this.model.children[this.left].getElementsByClassName('left')[0].hidden = true;

                    this.right -= 1;
                    this.left -= 1;
                }
            }
            else
            {
                this.model.children[this.left + 1].classList.remove('w-50');
                this.model.children[this.left + 1].getElementsByClassName('right')[0].hidden = true;
                this.model.children[this.left + 1].getElementsByClassName('left')[0].hidden = false;

                if(this.right < this.model.children.length - 1)
                {
                    this.model.children[this.left].hidden = true;
                    this.model.children[this.right + 1].hidden = false;

                    this.model.children[this.left + 2].classList.add('w-50');
                    this.model.children[this.left + 2].getElementsByClassName('right')[0].hidden = false;
                    this.model.children[this.left + 2].getElementsByClassName('left')[0].hidden = true;

                    this.right += 1;
                    this.left += 1;
                }
            }

        }
    }

    var adapter;
    $('#adapter').ready(function() {
        console.log('ready');
        adapter = new Adapter(3, 
            document.getElementById('adapter'),
            document.getElementById('leftCtrl'),
            document.getElementById('rightCtrl'));
    });
</script>
    <?php include('partials\footer.view.php') ?>
</body>
</html>
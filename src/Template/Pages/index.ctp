<?php 
    $webroot = $this->request->webroot;
?>
<section class="filter-searcher">
    <?= $this->Form->create(null, [
        'class' => '',
        'url' => [
            'controller' => 'Pages',
            'action' => "createOrder",
        ]
    ]) ?>
        <div class="col-auto">
        <label class="sr-only" for="inlineFormInputGroup">Username</label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
            <div class="input-group-text">@</div>
            </div>
            <!-- <?= $this->Form->control('user') ?> -->
            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
        </div>
        </div>
    <?= $this->Form->end() ?>   
</section>
<section class="product-list-section">
    <div class="row">  
        <div class="item">
            <div class="col-sm-3">
                <div class="single-feature">
                    <div class="product-img">
                        <img src= <?= $webroot . 'img_db/clients/p1.png' ?> alt="feature image">
                    </div>
                    <div class="single-feature-txt text-center">
                        <!-- <p>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
                            <span class="feature-review">(45 review)</span>
                        </p> -->
                        <h3><a href="<?= $this->Url->build([
                            'controller' => 'Pages',
                            'action' => 'product',
                        ])?>">Nombre </a></h3>
                        <h5>$ 100</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="col-sm-3">
                <div class="single-feature">
                    <div class="product-img">
                        <img src= <?= $webroot . 'img_db/clients/p1.png' ?> alt="feature image">
                    </div>
                    <div class="single-feature-txt text-center">
                        <!-- <p>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
                            <span class="feature-review">(45 review)</span>
                        </p> -->
                        <h3><a href="<?= $this->Url->build([
                            'controller' => 'Pages',
                            'action' => 'product',
                        ])?>">Nombre </a></h3>
                        <h5>$ 100</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="col-sm-3">
                <div class="single-feature">
                    <div class="product-img">
                        <img src= <?= $webroot . 'img_db/clients/p1.png' ?> alt="feature image">
                    </div>
                    <div class="single-feature-txt text-center">
                        <!-- <p>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
                            <span class="feature-review">(45 review)</span>
                        </p> -->
                        <h3><a href="<?= $this->Url->build([
                            'controller' => 'Pages',
                            'action' => 'product',
                        ])?>">Nombre </a></h3>
                        <h5>$ 100</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="col-sm-3">
                <div class="single-feature">
                    <div class="product-img">
                        <img src= <?= $webroot . 'img_db/clients/p1.png' ?> alt="feature image">
                    </div>
                    <div class="single-feature-txt text-center">
                        <!-- <p>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
                            <span class="feature-review">(45 review)</span>
                        </p> -->
                        <h3><a href="<?= $this->Url->build([
                            'controller' => 'Pages',
                            'action' => 'product',
                        ])?>">Nombre </a></h3>
                        <h5>$ 100</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="col-sm-3">
                <div class="single-feature">
                    <div class="product-img">
                        <img src= <?= $webroot . 'img_db/clients/p1.png' ?> alt="feature image">
                    </div>
                    <div class="single-feature-txt text-center">
                        <!-- <p>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
                            <span class="feature-review">(45 review)</span>
                        </p> -->
                        <h3><a href="<?= $this->Url->build([
                            'controller' => 'Pages',
                            'action' => 'product',
                        ])?>">Nombre </a></h3>
                        <h5>$ 100</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="col-sm-3">
                <div class="single-feature">
                    <div class="product-img">
                        <img src= <?= $webroot . 'img_db/clients/p1.png' ?> alt="feature image">
                    </div>
                    <div class="single-feature-txt text-center">
                        <!-- <p>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
                            <span class="feature-review">(45 review)</span>
                        </p> -->
                        <h3><a href="<?= $this->Url->build([
                            'controller' => 'Pages',
                            'action' => 'product',
                        ])?>">Nombre </a></h3>
                        <h5>$ 100</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="col-sm-3">
                <div class="single-feature">
                    <div class="product-img">
                        <img src= <?= $webroot . 'img_db/clients/p1.png' ?> alt="feature image">
                    </div>
                    <div class="single-feature-txt text-center">
                        <!-- <p>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
                            <span class="feature-review">(45 review)</span>
                        </p> -->
                        <h3><a href="<?= $this->Url->build([
                            'controller' => 'Pages',
                            'action' => 'product',
                        ])?>">Nombre </a></h3>
                        <h5>$ 100</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="col-sm-3">
                <div class="single-feature">
                    <div class="product-img">
                        <img src= <?= $webroot . 'img_db/clients/p1.png' ?> alt="feature image">
                    </div>
                    <div class="single-feature-txt text-center">
                        <!-- <p>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
                            <span class="feature-review">(45 review)</span>
                        </p> -->
                        <h3><a href="<?= $this->Url->build([
                            'controller' => 'Pages',
                            'action' => 'product',
                        ])?>">Nombre </a></h3>
                        <h5>$ 100</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="col-sm-3">
                <div class="single-feature">
                    <div class="product-img">
                        <img src= <?= $webroot . 'img_db/clients/p1.png' ?> alt="feature image">
                    </div>
                    <div class="single-feature-txt text-center">
                        <!-- <p>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
                            <span class="feature-review">(45 review)</span>
                        </p> -->
                        <h3><a href="<?= $this->Url->build([
                            'controller' => 'Pages',
                            'action' => 'product',
                        ])?>">Nombre </a></h3>
                        <h5>$ 100</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="col-sm-3">
                <div class="single-feature">
                    <div class="product-img">
                        <img src= <?= $webroot . 'img_db/clients/p1.png' ?> alt="feature image">
                    </div>
                    <div class="single-feature-txt text-center">
                        <!-- <p>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
                            <span class="feature-review">(45 review)</span>
                        </p> -->
                        <h3><a href="<?= $this->Url->build([
                            'controller' => 'Pages',
                            'action' => 'product',
                        ])?>">Nombre </a></h3>
                        <h5>$ 100</h5>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>
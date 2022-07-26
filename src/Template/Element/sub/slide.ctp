<?php
    $webroot = $this->request->webroot;
    $num = 0;
?>
<?php if($slide):?>
    <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <!--/.carousel-indicator -->
        <ol class="carousel-indicators">
            <li data-target="#header-carousel" data-slide-to="0" class="active"><span class="small-circle"></span></li>
            <li data-target="#header-carousel" data-slide-to="1"><span class="small-circle"></span></li>
            <li data-target="#header-carousel" data-slide-to="2"><span class="small-circle"></span></li>

        </ol><!-- /ol-->
        <!--/.carousel-indicator -->
        <!--/.carousel-inner -->
        <div class="carousel-inner" role="listbox">
            <!-- Slider items -->
            <?php foreach($query as $product):?> 
                <?php
                    $num = $num + 1;
                ?>
                <?php if($num == 1): ?>
                    <div class= "item active">
                        <div class="single-slide-item slide<?= $num?>">
                            <div class="container">
                                <div class="welcome-hero-content">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="single-welcome-hero">
                                                <div class="welcome-hero-txt">
                                                    <h4>great design collection</h4>
                                                    <h2><?= $product->name?></h2>
                                                    <p>
                                                        <?= $product->description ?>
                                                    </p>
                                                    <div class="packages-price">
                                                        <p>
                                                            $ <?= $product->price ?>
                                                            <del>$ <?= intval($product->price) + 0.30 * intval($product->price) ?></del>
                                                        </p>
                                                    </div>
                                                    <button class="btn-cart welcome-add-cart" onclick="window.location.href='#'">
                                                        <span class="lnr lnr-plus-circle"></span>
                                                        add <span>to</span> cart
                                                    </button>
                                                    <button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='#'">
                                                        more info
                                                    </button>
                                                </div><!--/.welcome-hero-txt-->
                                            </div><!--/.single-welcome-hero-->
                                        </div><!--/.col-->
                                        <div class="col-sm-5">
                                            <div class="single-welcome-hero">
                                                <div class="welcome-hero-img">
                                                    <img src= <?= $webroot . "img_db/products/mesa_parent.png" ?> alt="slider image">
                                                </div><!--/.welcome-hero-txt-->
                                            </div><!--/.single-welcome-hero-->
                                        </div><!--/.col-->
                                    </div><!--/.row-->
                                </div><!--/.welcome-hero-content-->
                            </div><!-- /.container-->
                        </div><!-- /.single-slide-item-->
                    </div><!-- /.item .active-->

                <?php else:?>
                    
                    <div class= "item">
                        <div class="single-slide-item slide<?= $num?>">
                            <div class="container">
                                <div class="welcome-hero-content">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="single-welcome-hero">
                                                <div class="welcome-hero-txt">
                                                    <h4>great design collection</h4>
                                                    <h2><?= $product->name?></h2>
                                                    <p>
                                                        <?= $product->description ?>
                                                    </p>
                                                    <div class="packages-price">
                                                        <p>
                                                            $ <?= $product->price ?>
                                                            <del>$ <?= intval($product->price) + 0.30 * intval($product->price) ?></del>
                                                        </p>
                                                    </div>
                                                    <button class="btn-cart welcome-add-cart" onclick="window.location.href='#'">
                                                        <span class="lnr lnr-plus-circle"></span>
                                                        add <span>to</span> cart
                                                    </button>
                                                    <button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='#'">
                                                        more info
                                                    </button>
                                                </div><!--/.welcome-hero-txt-->
                                            </div><!--/.single-welcome-hero-->
                                        </div><!--/.col-->
                                        <div class="col-sm-5">
                                            <div class="single-welcome-hero">
                                                <div class="welcome-hero-img">
                                                    <img src= <?= $webroot . $product->main_image ?> alt="slider image">
                                                </div><!--/.welcome-hero-txt-->
                                            </div><!--/.single-welcome-hero-->
                                        </div><!--/.col-->
                                    </div><!--/.row-->
                                </div><!--/.welcome-hero-content-->
                            </div><!-- /.container-->
                        </div><!-- /.single-slide-item-->
                    </div><!-- /.item .active-->

                <?php endif;?>
            <?php endforeach; ?>
        </div>
    </div><!--/#header-carousel-->
<?php endif; ?>

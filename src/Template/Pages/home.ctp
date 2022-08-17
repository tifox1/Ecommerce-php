<?php
    $webroot = $this->request->webroot;
?>
<!--new-arrivals start -->
<section id="new-arrivals" class="new-arrivals">
    
    <div class="container">
        <div class="section-header">
            <h2>new arrivals</h2>
        </div><!--/.section-header-->
        <div class="new-arrivals-content">
            <div class="row">
                <?php foreach($arrivals as $product):?>
                    <div class="col-md-3 col-sm-4">
                        <div class="single-new-arrival">
                            <div class="single-new-arrival-bg">
                                <img src= <?= $webroot . $product->product->main_image?> alt="new-arrivals images">
                                <div class="single-new-arrival-bg-overlay"></div>
                                <div class="sale bg-2">
                                    <p>sale</p>
                                </div>
                                <div class="new-arrival-cart">
                                    <p>
                                        <span class="lnr lnr-cart"></span>
                                        <a href="<?= $this->Url->build([
                                            'controller' => 'Pages',
                                            'action' => 'product',
                                            $product->product->slug
                                        ])?>">add <span>to </span> cart</a>
                                    </p>
                                    <p class="arrival-review pull-right">
                                        <span class="lnr lnr-heart"></span>
                                        <span class="lnr lnr-frame-expand"></span>
                                    </p>
                                </div>
                            </div>
                            <h4><a href="<?= $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'product',
                                $product->product->slug
                            ])?>"><?= $product->product->name ?></a></h4>
                            <p class="arrival-product-price">$<?= $product->product->price ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- End products -->
            </div>
        </div>
    </div><!--/.container-->

</section><!--/.new-arrivals-->
<!--new-arrivals end -->


<!--feature start -->
<section id="feature" class="feature">
    <div class="container">
        <div class="section-header">
            <h2>featured products</h2>
        </div><!--/.section-header-->
        <div class="feature-content">
            <div class="row">
                <?php foreach($query as $product):?>
                    <div class="col-sm-3">
                        <div class="single-feature">
                            <img src= <?= $webroot . $product->main_image ?> alt="feature image">
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
                                    $product->slug
                                ])?>"><?= $product->name ?></a></h3>
                                <h5>$ <?= $product->price ?></h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div><!--/.container-->

</section><!--/.feature-->
<!--feature end -->

<!--blog start -->
<section id="blog" class="blog">
    <div class="container">
        <div class="section-header">
            <h2>latest blog</h2>
        </div><!--/.section-header-->
        <div class="blog-content">
            <div class="row">
                <?php foreach($articles as $article):?>
                    <div class="col-sm-4">
                        <div class="single-blog">
                            <div class="single-blog-img">
                                <img src= <?= $webroot . $article->main_image ?>  alt="blog image">
                                <div class="single-blog-img-overlay"></div>
                            </div>
                            <div class="single-blog-txt">
                                <h2><a href="<?= $this->Url->build([
                                    'controller' => 'Pages',
                                    'action' => 'article',
                                    $article->slug
                                ])?>"><?= $article->title ?></a></h2>
                                <h3>By <a href="<?= $this->Url->build([
                                    'controller' => 'Pages',
                                    'action' => 'article',
                                    $article->slug
                                ])?>"><?= $article->autor ?></a> / <?= $article->created_time ?></h3>
                                <p>
                                    <?= $article->subtitle ?>...
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div><!--/.container--> 
    
</section><!--/.blog-->
<!--blog end -->

<!-- clients strat -->
<section id="clients"  class="clients">
    <div class="container">
        <div class="owl-carousel owl-theme" id="client">
                <div class="item">
                    <a href="#">
                        <img src=<?= $webroot . "img_db/clients/c1.png"?> alt="brand-image" />
                    </a>
                </div><!--/.item-->
                <div class="item">
                    <a href="#">
                        <img src= <?= $webroot . "img_db/clients/c2.png"?> alt="brand-image" />
                    </a>
                </div><!--/.item-->
                <div class="item">
                    <a href="#">
                        <img src= <?= $webroot . "img_db/clients/c3.png"?> alt="brand-image" />
                    </a>
                </div><!--/.item-->
                <div class="item">
                    <a href="#">
                        <img src= <?= $webroot . "img_db/clients/c4.png"?> alt="brand-image" />
                    </a>
                </div><!--/.item-->
                <div class="item">
                    <a href="#">
                        <img src= <?= $webroot . "img_db/clients/c5.png"?> alt="brand-image" />
                    </a>
                </div><!--/.item-->
            </div><!--/.owl-carousel-->

    </div><!--/.container-->

</section><!--/.clients-->	
<!-- clients end -->


<!--footer start-->
<footer id="footer"  class="footer">
    <div class="container">
        <div class="hm-footer-copyright text-center">
            <div class="footer-social">
                <a href="#"><i class="fa fa-facebook"></i></a>	
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
                <a href="#"><i class="fa fa-behance"></i></a>	
            </div>
            <p>
                &copy;copyright. designed and developed by <a href="https://www.themesine.com/">themesine</a>
            </p><!--/p-->
        </div><!--/.text-center-->
    </div><!--/.container-->

    <div id="scroll-Top">
        <div class="return-to-top">
            <i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
        </div>
        
    </div><!--/.scroll-Top-->
    
</footer><!--/.footer-->
<!--footer end-->
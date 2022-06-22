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
                <div class="col-md-3 col-sm-4">
                    <div class="single-new-arrival">
                        <div class="single-new-arrival-bg">
                            <img src="assets/images/collection/arrivals1.png" alt="new-arrivals images">
                            <div class="single-new-arrival-bg-overlay"></div>
                            <div class="sale bg-1">
                                <p>sale</p>
                            </div>
                            <div class="new-arrival-cart">
                                <p>
                                    <span class="lnr lnr-cart"></span>
                                    <a href="#">add <span>to </span> cart</a>
                                </p>
                                <p class="arrival-review pull-right">
                                    <span class="lnr lnr-heart"></span>
                                    <span class="lnr lnr-frame-expand"></span>
                                </p>
                            </div>
                        </div>
                        <h4><a href="#">wooden chair</a></h4>
                        <p class="arrival-product-price">$65.00</p>
                    </div>
                </div>
                <?php foreach($query as $product):?>
                    <div class="col-md-3 col-sm-4">
                        <div class="single-new-arrival">
                            <div class="single-new-arrival-bg">
                                <img src= <?= $webroot . $product->main_image?> alt="new-arrivals images">
                                <div class="single-new-arrival-bg-overlay"></div>
                                <div class="sale bg-2">
                                    <p></p>
                                </div>
                                <div class="new-arrival-cart">
                                    <p>
                                        <span class="lnr lnr-cart"></span>
                                        <a href="#">add <span>to </span> cart</a>
                                    </p>
                                    <p class="arrival-review pull-right">
                                        <span class="lnr lnr-heart"></span>
                                        <span class="lnr lnr-frame-expand"></span>
                                    </p>
                                </div>
                            </div>
                            <h4><a href="#"><?= $product->name ?></a></h4>
                            <p class="arrival-product-price">$<?= $product->price ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- End products -->
            </div>
        </div>
    </div><!--/.container-->

</section><!--/.new-arrivals-->
<!--new-arrivals end -->

<!--sofa-collection start -->
<section id="sofa-collection">
    <div class="owl-carousel owl-theme" id="collection-carousel">
        <div class="sofa-collection collectionbg1">
            <div class="container">
                <div class="sofa-collection-txt">
                    <h2>unlimited sofa collection</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    </p>
                    <div class="sofa-collection-price">
                        <h4>strting from <span>$ 199</span></h4>
                    </div>
                    <button class="btn-cart welcome-add-cart sofa-collection-btn" onclick="window.location.href='#'">
                        view more
                    </button>
                </div>
            </div>	
        </div><!--/.sofa-collection-->
        <div class="sofa-collection collectionbg2">
            <div class="container">
                <div class="sofa-collection-txt">
                    <h2>unlimited dainning table collection</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    </p>
                    <div class="sofa-collection-price">
                        <h4>strting from <span>$ 299</span></h4>
                    </div>
                    <button class="btn-cart welcome-add-cart sofa-collection-btn" onclick="window.location.href='#'">
                        view more
                    </button>
                </div>
            </div>
        </div><!--/.sofa-collection-->
    </div><!--/.collection-carousel-->

</section><!--/.sofa-collection-->
<!--sofa-collection end -->

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
                                <p>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
                                    <span class="feature-review">(45 review)</span>
                                </p>
                                <h3><a href="#"><?= $product->name ?></a></h3>
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
                <div class="col-sm-4">
                    <div class="single-blog">
                        <div class="single-blog-img">
                            <img src="assets/images/blog/b1.jpg" alt="blog image">
                            <div class="single-blog-img-overlay"></div>
                        </div>
                        <div class="single-blog-txt">
                            <h2><a href="#">Why Brands are Looking at Local Language</a></h2>
                            <h3>By <a href="#">Robert Norby</a> / 18th March 2018</h3>
                            <p>
                                Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.... 
                            </p>
                        </div>
                    </div>
                    
                </div>
                <div class="col-sm-4">
                    <div class="single-blog">
                        <div class="single-blog-img">
                            <img src="assets/images/blog/b2.jpg" alt="blog image">
                            <div class="single-blog-img-overlay"></div>
                        </div>
                        <div class="single-blog-txt">
                            <h2><a href="#">Why Brands are Looking at Local Language</a></h2>
                            <h3>By <a href="#">Robert Norby</a> / 18th March 2018</h3>
                            <p>
                                Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.... 
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="single-blog">
                        <div class="single-blog-img">
                            <img src="assets/images/blog/b3.jpg" alt="blog image">
                            <div class="single-blog-img-overlay"></div>
                        </div>
                        <div class="single-blog-txt">
                            <h2><a href="#">Why Brands are Looking at Local Language</a></h2>
                            <h3>By <a href="#">Robert Norby</a> / 18th March 2018</h3>
                            <p>
                                Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.... 
                            </p>
                        </div>
                    </div>
                </div>
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
                        <img src="assets/images/clients/c1.png" alt="brand-image" />
                    </a>
                </div><!--/.item-->
                <div class="item">
                    <a href="#">
                        <img src="assets/images/clients/c2.png" alt="brand-image" />
                    </a>
                </div><!--/.item-->
                <div class="item">
                    <a href="#">
                        <img src="assets/images/clients/c3.png" alt="brand-image" />
                    </a>
                </div><!--/.item-->
                <div class="item">
                    <a href="#">
                        <img src="assets/images/clients/c4.png" alt="brand-image" />
                    </a>
                </div><!--/.item-->
                <div class="item">
                    <a href="#">
                        <img src="assets/images/clients/c5.png" alt="brand-image" />
                    </a>
                </div><!--/.item-->
            </div><!--/.owl-carousel-->

    </div><!--/.container-->

</section><!--/.clients-->	
<!-- clients end -->

<!--newsletter strat -->
<section id="newsletter"  class="newsletter">
    <div class="container">
        <div class="hm-footer-details">
            <div class="row">
                <div class=" col-md-3 col-sm-6 col-xs-12">
                    <div class="hm-footer-widget">
                        <div class="hm-foot-title">
                            <h4>information</h4>
                        </div><!--/.hm-foot-title-->
                        <div class="hm-foot-menu">
                            <ul>
                                <li><a href="#">about us</a></li><!--/li-->
                                <li><a href="#">contact us</a></li><!--/li-->
                                <li><a href="#">news</a></li><!--/li-->
                                <li><a href="#">store</a></li><!--/li-->
                            </ul><!--/ul-->
                        </div><!--/.hm-foot-menu-->
                    </div><!--/.hm-footer-widget-->
                </div><!--/.col-->
                <div class=" col-md-3 col-sm-6 col-xs-12">
                    <div class="hm-footer-widget">
                        <div class="hm-foot-title">
                            <h4>collections</h4>
                        </div><!--/.hm-foot-title-->
                        <div class="hm-foot-menu">
                            <ul>
                                <li><a href="#">wooden chair</a></li><!--/li-->
                                <li><a href="#">royal cloth sofa</a></li><!--/li-->
                                <li><a href="#">accent chair</a></li><!--/li-->
                                <li><a href="#">bed</a></li><!--/li-->
                                <li><a href="#">hanging lamp</a></li><!--/li-->
                            </ul><!--/ul-->
                        </div><!--/.hm-foot-menu-->
                    </div><!--/.hm-footer-widget-->
                </div><!--/.col-->
                <div class=" col-md-3 col-sm-6 col-xs-12">
                    <div class="hm-footer-widget">
                        <div class="hm-foot-title">
                            <h4>my accounts</h4>
                        </div><!--/.hm-foot-title-->
                        <div class="hm-foot-menu">
                            <ul>
                                <li><a href="#">my account</a></li><!--/li-->
                                <li><a href="#">wishlist</a></li><!--/li-->
                                <li><a href="#">Community</a></li><!--/li-->
                                <li><a href="#">order history</a></li><!--/li-->
                                <li><a href="#">my cart</a></li><!--/li-->
                            </ul><!--/ul-->
                        </div><!--/.hm-foot-menu-->
                    </div><!--/.hm-footer-widget-->
                </div><!--/.col-->
                <div class=" col-md-3 col-sm-6  col-xs-12">
                    <div class="hm-footer-widget">
                        <div class="hm-foot-title">
                            <h4>newsletter</h4>
                        </div><!--/.hm-foot-title-->
                        <div class="hm-foot-para">
                            <p>
                                Subscribe  to get latest news,update and information.
                            </p>
                        </div><!--/.hm-foot-para-->
                        <div class="hm-foot-email">
                            <div class="foot-email-box">
                                <input type="text" class="form-control" placeholder="Enter Email Here....">
                            </div><!--/.foot-email-box-->
                            <div class="foot-email-subscribe">
                                <span><i class="fa fa-location-arrow"></i></span>
                            </div><!--/.foot-email-icon-->
                        </div><!--/.hm-foot-email-->
                    </div><!--/.hm-footer-widget-->
                </div><!--/.col-->
            </div><!--/.row-->
        </div><!--/.hm-footer-details-->

    </div><!--/.container-->

</section><!--/newsletter-->	
<!--newsletter end -->

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
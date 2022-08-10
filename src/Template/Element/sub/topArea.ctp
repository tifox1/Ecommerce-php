<?php 
    $webroot = $this->request->webroot;
?>
<!-- top-area Start -->
<div class="top-area">
    <div class="header-area">
        <!-- Start Navigation -->
        <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

            <!-- Start Top Search -->
            <div class="top-search">
                <div class="container">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                    </div>
                </div>
            </div>
            <!-- End Top Search -->

            <div class="container">           
                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search">
                            <a href="#"><span class="lnr lnr-magnifier"></span></a>
                        </li><!--/.search-->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                                <span class="lnr lnr-cart"></span>
                                <span class="badge badge-bg-1"><?php echo count($order_line);?></span>
                            </a>

                            <ul class="dropdown-menu cart-list s-cate">
                                <?php foreach($order_line as $product):?>
                                    <li class="single-cart-list">
                                        <a href="#" class="photo"><img src="<?= $webroot . $product['main_image'] ?>" class="cart-thumb" alt="image" /></a>
                                        <div class="cart-list-txt">
                                            <h6><?= $product['name']?></h6>
                                            <p><?= $product['quantity']?> x - <span class="price">$<?= $product['price'] ?></span></p>
                                        </div><!--/.cart-list-txt-->
                                        <div class="cart-close" onclick="window.location.replace('http://localhost:8765/pages/delete_product/<?= $product['slug']?>')">
                                            <span class="lnr lnr-cross"></span>
                                        </div>
                                    </li><!--/.single-cart-list -->
                                <?php endforeach;?>
                                <?php if (count($order_line)!= 0):?>
                                    <li class="single-cart-list">
                                        <?php echo $this->Form->create(null, [
                                            'class' => 'order-form',
                                            'url' => [
                                                'controller' => 'Pages',
                                                'action' => "createOrder",
                                            ]
                                        ]); ?>
                                            <div class="order-price">
                                                <p>Total: <?= $total_price?></p>
                                            </div>
                                            <div class="order-button">
                                                <button class="btn-cart welcome-add-cart animated fadeInDown" formaction="/pages/createOrder" type="submit" style="opacity: 0;">
                                                    Hacer <span>pedido</span> 
                                                </button>
                                            </div>    
                                        <?php echo $this->Form->end();?>
                            
                                    </li><!--/.single-cart-list -->
                                <?php endif;?>
                            </ul>
                        </li><!--/.dropdown-->
                        <li class="nav-setting">
                            <a href="<?= $this->Url->build([
                                'controller' => 'Customer',
                                'action' => 'logout',
                            ])?>"><i class="bi bi-box-arrow-right"></i></a>
                        </li><!--/.search-->
                    </ul>
                </div><!--/.attr-nav-->
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="<?= $this->Url->build([
                        'controller' => 'Pages',
                        'action' => 'home',
                    ])?>">sine<span>mkt</span>.</a>

                </div><!--/.navbar-header-->
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class=" scroll active"><a href="#home">home</a></li>
                        <li class="scroll"><a href="#new-arrivals">new arrival</a></li>
                        <li class="scroll"><a href="#feature">features</a></li>
                        <li class="scroll"><a href="#blog">blog</a></li>
                        <li class="scroll"><a href="#newsletter">contact</a></li>
                    </ul><!--/.nav -->
                </div><!-- /.navbar-collapse -->
            </div><!--/.container-->
        </nav><!--/nav-->
        <!-- End Navigation -->

        
    </div><!--/.header-area-->
    <div class="clearfix"></div>

</div><!-- /.top-area-->
<!-- top-area End -->

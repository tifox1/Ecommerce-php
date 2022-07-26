    <?php 
    $webroot = $this->request->webroot;
    $count = 1
?>
<section class="product-detail">
    <div class="container">
        <div class="row">
            <div class="title">
                <div class="col-md-12">
                    <h1><span class="title" ><h1><?= $product->name?></span></h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product-detail-div">
                <!--Slider div-->
                <div class="col-md-6" >
                    <div class="carousel-div">
                        <div class="swiper">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <?php foreach($images as $image):?>
                                    <div class="swiper-slide">
                                        <img src=<?=$webroot . $image->url?> alt=<?= $image->url?>>
                                    </div>
                                <?php endforeach;?>
                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>
                        
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        
                            <!-- If we need scrollbar -->
                            <div class="swiper-scrollbar"></div>
                        </div>
                    </div>
                </div>
                <!--End Slider div-->
                <!--Product Detail div-->
                <div class="col-md-6">
                    <!-- Price-->
                    <div class="row">
                        <div class="col">
                            <h2>Gs: <span><?= $product->price?></span></h2>
                        </div>
                    </div>
                    <!-- End Price-->

                    <!--Description-->
                    <div class="description-container">
                        <div class="row">
                            <div class="col">
                                <div class="paragraph">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed natus provident nulla magnam est corporis quae, sint aliquid expedita sunt enim amet nemo. Fugit fuga ipsa tempora, aspernatur sequi quod?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End description-->
                    
                    <!--Add cart form-->
                    <div class="row">
                        <div class="button-container">
                            <div class="col-md-12">
                                <div class="cart">
                                    <?php echo $this->Form->create(null, [
                                        'class' => 'form-tag',
                                        'url' => [
                                            'controller' => 'Pages',
                                            'action' => "product/",
                                            urlencode($product->slug)
                                        ]
                                    ]); ?>
                                        <div class="cart-quantity-input">
                                            <!-- <div class="quantity"> -->
                                                <div class="input-group">

                                                    <?php echo $this->Form->control('quantity', [
                                                        'type' => 'range',
                                                        'class' => 'form-range',
                                                        'id' => 'customRange1'
                                                    ]);?>

                                                </div>
                                            <!-- </div> -->
                                        </div>
                                        <div class="cart-add">
                                            <button class="btn-cart welcome-add-cart animated fadeInDown" type="submit" style="opacity: 0;">
                                                <span class="lnr lnr-plus-circle"></span>
                                                add <span>to</span> cart
                                            </button>
                                        </div>
                                        <!-- <?= $this->Form->button('enviar')?> -->
                                    <?php echo $this->Form->end();?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End add cart form-->
                </div>
                <!--end Product Detail div-->
            </div>
        </div>
    </div>
</section>


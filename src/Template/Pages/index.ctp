<?php 
    $webroot = $this->request->webroot;
?>
<section class="filter-searcher">
    <?= $this->Form->create(null, [
        'url' => [
            'controller' => 'Pages',
            'action' => 'index',
        ]
    ]) ?>
        <div class="search-grid">
            <div class="search-container">
                <div class="search-icon-container">
                    <button type="submit"><span class="lnr lnr-magnifier"></span></button>
                </div>
                <?php echo $this->Form->input('name', [
                    'label' => false,
                    'class' => 'form-control',
                ]);?>
            </div>
            <div class="select-container">
                <?= $this->Form->input('category', [
                    'empty' => ['0' => ''],
                    'label' => false,
                    'class' => 'form-control',
                    'options' => $categories
                ]) ?> 
            </div>
        </div>    
    <?= $this->Form->end() ?>   
</section>
<section class="product-list-section">
    <div class="row">  
        <?php if($products_qty != 0): ?>
            <?php foreach($products as $product):?>
                <div class="item">
                    <div class="col-sm-3">
                        <div class="single-feature">
                            <div class="product-img">
                                <img src= <?= $webroot . $product->main_image?> alt="feature image">
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
                                    $product->slug
                                ])?>"><?= $product->name ?></a></h3>
                                <h5>$ <?= $product->price ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="error-finding-product">
                <div>
                    <p>Lo sentimos. El producto que fue buscado no existe</p>
                </div>
            </div>
        <?php endif;?>
    </div>

</section>
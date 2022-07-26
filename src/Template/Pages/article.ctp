<section class="article">
    <div class="container">
        <div class="article-detail">
            <div class="article-header">
                <div class="type">
                    <div class="row">
                        <div class="col-md-12">
                            <h3><b>Articulo</b></h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title"><?= $article->title ?></h1>
                    </div>
                </div>
                <!--Subtitulo-->
                <div class="subtitle">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <b>
                                    <?= $article->subtitle?>
                                </b>
                            </p>
                        </div>
                    </div>  
                </div>
                <!---->
            </div>
            <!--Articulo-->

            <div class="row">
                <div class="article">
                    <div class="col-md-12">
                        <?php foreach($paragraphs as $paragraph):?>
                            <p>
                                <?= $paragraph?>
                            </p>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <!---->
        </div>
    </div>
</section>
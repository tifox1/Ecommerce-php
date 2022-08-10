<?php
    $webroot = $this->request->webroot;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        // $this->start('sidebar');
        echo $this->element('style');
        // $this->end();
    ?>
</head>
    <body>
        <?= $this->element('navBar') ?>
        <?= $this->fetch('content') ?>
        <?= $this->element('scripts') ?>
    </body>
</html>

<?= $this->Flash->render() ?>
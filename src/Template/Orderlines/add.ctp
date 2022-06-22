<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Orderline $orderline
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Orderlines'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orderlines form large-9 medium-8 columns content">
    <?= $this->Form->create($orderline) ?>
    <fieldset>
        <legend><?= __('Add Orderline') ?></legend>
        <?php
            echo $this->Form->control('orders_id', ['options' => $orders]);
            echo $this->Form->control('quantity');
            echo $this->Form->control('line_price');
            echo $this->Form->control('products_id', ['options' => $products]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

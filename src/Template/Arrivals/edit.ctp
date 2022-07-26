<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Arrival $arrival
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $arrival->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $arrival->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Arrivals'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="arrivals form large-9 medium-8 columns content">
    <?= $this->Form->create($arrival) ?>
    <fieldset>
        <legend><?= __('Edit Arrival') ?></legend>
        <?php
            echo $this->Form->control('product_id', ['options' => $products]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

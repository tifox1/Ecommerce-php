<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Arrival $arrival
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Arrival'), ['action' => 'edit', $arrival->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Arrival'), ['action' => 'delete', $arrival->id], ['confirm' => __('Are you sure you want to delete # {0}?', $arrival->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Arrivals'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Arrival'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="arrivals view large-9 medium-8 columns content">
    <h3><?= h($arrival->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $arrival->has('product') ? $this->Html->link($arrival->product->name, ['controller' => 'Products', 'action' => 'view', $arrival->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($arrival->id) ?></td>
        </tr>
    </table>
</div>

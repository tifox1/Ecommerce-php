<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Orderline $orderline
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Orderline'), ['action' => 'edit', $orderline->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Orderline'), ['action' => 'delete', $orderline->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderline->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Orderlines'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orderline'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orderlines view large-9 medium-8 columns content">
    <h3><?= h($orderline->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Order') ?></th>
            <td><?= $orderline->has('order') ? $this->Html->link($orderline->order->id, ['controller' => 'Orders', 'action' => 'view', $orderline->order->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $orderline->has('product') ? $this->Html->link($orderline->product->name, ['controller' => 'Products', 'action' => 'view', $orderline->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($orderline->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Line Price') ?></th>
            <td><?= $this->Number->format($orderline->line_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($orderline->id) ?></td>
        </tr>
    </table>
</div>

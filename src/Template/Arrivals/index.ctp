<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Arrival[]|\Cake\Collection\CollectionInterface $arrivals
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Arrival'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="arrivals index large-9 medium-8 columns content">
    <h3><?= __('Arrivals') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($arrivals as $arrival): ?>
            <tr>
                <td><?= $this->Number->format($arrival->id) ?></td>
                <td><?= $arrival->has('product') ? $this->Html->link($arrival->product->name, ['controller' => 'Products', 'action' => 'view', $arrival->product->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $arrival->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $arrival->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $arrival->id], ['confirm' => __('Are you sure you want to delete # {0}?', $arrival->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

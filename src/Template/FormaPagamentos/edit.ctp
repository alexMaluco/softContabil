<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $formaPagamento->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $formaPagamento->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Forma Pagamentos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Contas A Pagar'), ['controller' => 'ContasAPagar', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contas A Pagar'), ['controller' => 'ContasAPagar', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="formaPagamentos form large-10 medium-9 columns">
    <?= $this->Form->create($formaPagamento) ?>
    <fieldset>
        <legend><?= __('Edit Forma Pagamento') ?></legend>
        <?php
            echo $this->Form->input('descricao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

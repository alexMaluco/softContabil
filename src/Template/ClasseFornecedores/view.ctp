<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Classe Fornecedore'), ['action' => 'edit', $classeFornecedore->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Classe Fornecedore'), ['action' => 'delete', $classeFornecedore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classeFornecedore->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Classe Fornecedores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Classe Fornecedore'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="classeFornecedores view large-10 medium-9 columns">
    <h2><?= h($classeFornecedore->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Descricao') ?></h6>
            <p><?= h($classeFornecedore->descricao) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($classeFornecedore->id) ?></p>
        </div>
    </div>
</div>

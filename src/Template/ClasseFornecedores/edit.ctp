<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $classeFornecedore->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $classeFornecedore->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Classe Fornecedores'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="classeFornecedores form large-10 medium-9 columns">
    <?= $this->Form->create($classeFornecedore) ?>
    <fieldset>
        <legend><?= __('Edit Classe Fornecedore') ?></legend>
        <?php
            echo $this->Form->input('descricao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
namespace App\Model\Table;

use App\Model\Entity\Empresa;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Empresas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $AtividadeEmpresas
 * @property \Cake\ORM\Association\BelongsTo $EmpresasTipos
 * @property \Cake\ORM\Association\BelongsTo $EmpresasFormaTributacoes
 * @property \Cake\ORM\Association\HasMany $Clientes
 * @property \Cake\ORM\Association\HasMany $Diretorias
 * @property \Cake\ORM\Association\HasMany $Fornecedores
 * @property \Cake\ORM\Association\BelongsToMany $FormaTrabalhos
 */
class EmpresasTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('empresas');
        $this->displayField('nome_empresa');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('AtividadeEmpresas', [
            'foreignKey' => 'atividade_empresa_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('FormaTrabalhos', [
            'foreignKey' => 'forma_trabalhos_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('EmpresasTipos', [
            'foreignKey' => 'empresas_tipos_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('EmpresasFormaTributacoes', [
            'foreignKey' => 'empresas_forma_tributacao_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Clientes', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('ContaEmpresas', [
            'foreignKey' => 'empresa_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Fornecedores', [
            'foreignKey' => 'empresa_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('cnpj', 'valid', ['rule' => 'decimal'])
            ->requirePresence('cnpj', 'create')
            ->notEmpty('cnpj');

        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('nome_empresa', 'create')
            ->notEmpty('nome_empresa');

        $validator
            ->add('percentual_juros', 'valid', ['rule' => 'decimal'])
            ->requirePresence('percentual_juros', 'create')
            ->notEmpty('percentual_juros');

        $validator
            ->add('percentual_multa', 'valid', ['rule' => 'decimal'])
            ->requirePresence('percentual_multa', 'create')
            ->notEmpty('percentual_multa');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['atividade_empresa_id'], 'atividadeEmpresas'));
        $rules->add($rules->existsIn(['empresas_tipos_id'], 'empresasTipos'));
        $rules->add($rules->existsIn(['empresas_forma_tributacao_id'], 'empresasFormaTributacoes'));
        $rules->add($rules->existsIn(['forma_trabalhos_id'], 'formaTrabalhos'));
        return $rules;
    }
}

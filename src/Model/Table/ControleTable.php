<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Controle Model
 *
 * @property \App\Model\Table\BancosTable&\Cake\ORM\Association\BelongsTo $Bancos
 * @property \App\Model\Table\ContasTable&\Cake\ORM\Association\BelongsTo $Contas
 *
 * @method \App\Model\Entity\Controle get($primaryKey, $options = [])
 * @method \App\Model\Entity\Controle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Controle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Controle|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Controle saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Controle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Controle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Controle findOrCreate($search, callable $callback = null, $options = [])
 */
class ControleTable extends Table
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

        $this->setTable('controle');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Bancos', [
            'foreignKey' => 'bancos_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Contas', [
            'foreignKey' => 'contas_id',
            'joinType' => 'INNER',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 30)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('valor')
            ->maxLength('valor', 20)
            ->requirePresence('valor', 'create')
            ->notEmptyString('valor');

        $validator
            ->dateTime('data')
            ->requirePresence('data', 'create')
            ->notEmptyDateTime('data');

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
        $rules->add($rules->existsIn(['bancos_id'], 'Bancos'));
        $rules->add($rules->existsIn(['contas_id'], 'Contas'));

        return $rules;
    }
}

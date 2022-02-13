<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ControleTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ControleTable Test Case
 */
class ControleTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ControleTable
     */
    public $Controle;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Controle',
        'app.Bancos',
        'app.Contas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Controle') ? [] : ['className' => ControleTable::class];
        $this->Controle = TableRegistry::getTableLocator()->get('Controle', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Controle);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

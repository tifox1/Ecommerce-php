<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrderlinesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrderlinesTable Test Case
 */
class OrderlinesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrderlinesTable
     */
    public $Orderlines;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Orderlines',
        'app.Orders',
        'app.Products',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Orderlines') ? [] : ['className' => OrderlinesTable::class];
        $this->Orderlines = TableRegistry::getTableLocator()->get('Orderlines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Orderlines);

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

<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RepairFormsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RepairFormsTable Test Case
 */
class RepairFormsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RepairFormsTable
     */
    protected $RepairForms;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.RepairForms',
        'app.ServiceForms',
        'app.Items',
        'app.Departments',
        'app.Statuses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('RepairForms') ? [] : ['className' => RepairFormsTable::class];
        $this->RepairForms = $this->getTableLocator()->get('RepairForms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->RepairForms);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RepairFormsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\RepairFormsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

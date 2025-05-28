<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FeedbackFormsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FeedbackFormsTable Test Case
 */
class FeedbackFormsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FeedbackFormsTable
     */
    protected $FeedbackForms;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.FeedbackForms',
        'app.Users',
        'app.RepairForms',
        'app.ServiceForms',
        'app.Items',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('FeedbackForms') ? [] : ['className' => FeedbackFormsTable::class];
        $this->FeedbackForms = $this->getTableLocator()->get('FeedbackForms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->FeedbackForms);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FeedbackFormsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FeedbackFormsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

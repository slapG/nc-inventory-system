<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Staff;

use App\Controller\Staff\ServiceFormsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Staff\ServiceFormsController Test Case
 *
 * @uses \App\Controller\Staff\ServiceFormsController
 */
class ServiceFormsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ServiceForms',
        'app.Users',
        'app.Statuses',
        'app.User',
        'app.EndorsedUser',
        'app.RepairForms',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\Staff\ServiceFormsController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\Staff\ServiceFormsController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\Staff\ServiceFormsController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\Staff\ServiceFormsController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\Staff\ServiceFormsController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

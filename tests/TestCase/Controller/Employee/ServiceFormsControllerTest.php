<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Employee;

use App\Controller\Employee\ServiceFormsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Employee\ServiceFormsController Test Case
 *
 * @uses \App\Controller\Employee\ServiceFormsController
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
        'app.RepairForms',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\Employee\ServiceFormsController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\Employee\ServiceFormsController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\Employee\ServiceFormsController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\Employee\ServiceFormsController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\Employee\ServiceFormsController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Tech;

use App\Controller\Tech\ServiceFormsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Tech\ServiceFormsController Test Case
 *
 * @uses \App\Controller\Tech\ServiceFormsController
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
     * @uses \App\Controller\Tech\ServiceFormsController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\Tech\ServiceFormsController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\Tech\ServiceFormsController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\Tech\ServiceFormsController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\Tech\ServiceFormsController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

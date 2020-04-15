<?php
namespace CodersStudio\SmsRu\Tests;

use App\User;
use CodersStudio\SmsRu\Facades\SmsRu;
use CodersStudio\SmsRu\Notifications\SmsRu as SmsRuNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
use Illuminate\Support\Facades\Notification;

class Test extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Send sms.
     *
     * .env.testing should have SMS_RU_API_KEY
     * @return void
     */
    public function testSendSms()
    {
        $result = SmsRu::send('89881234567', 'test');
        $this->assertTrue($result);
    }


    /**
     * Test notification.
     *
     * .env.testing should have SMS_RU_API_KEY
     * @return void
     */
    public function testNotification()
    {
        Notification::fake();
        $user = User::first();
        $user->notify(new SmsRuNotification('test'));
        Notification::assertSentTo(
            $user,
            SmsRuNotification::class
        );
    }



}

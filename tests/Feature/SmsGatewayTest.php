<?php

use PHPUnit\Framework\TestCase;
use Xenon\LaravelBDSms\Provider\CustomGateway;
use Xenon\LaravelBDSms\Sender;

class SmsGatewayTest extends TestCase
{
    /**
     * A basic test example.
     * @throws \Xenon\LaravelBDSms\Handler\RenderException
     * @throws Exception
     */
    public function test_sms_sending(): void
    {
        $sender = Sender::getInstance();
        $sender->setProvider(CustomGateway::class);
        $sender->setUrl('https://sysadmin.muthobarta.com/api/v1/send-sms');
        //$sender->setMobile('017XXYYZZAA');
       // $sender->setMessage('helloooooooo boss!');
        $sender->setQueue(false);
        $sender->setConfig(
            [
                'api_token' => 'api token goes here',
                'sid' => 'text',
                'csms_id' => 'sender_id'
            ]
        );

        $status = $sender->send();
    }
}

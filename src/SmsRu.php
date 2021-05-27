<?php

namespace CodersStudio\SmsRu;
use CodersStudio\SmsRu\Vendor\SmsRu AS SmsRuClient;
use CodersStudio\SmsRu\Classes\SMS;
use stdClass;

class SmsRu
{
    /**
     * SMSRU class http://sms.ru/php
     * @var SmsRuClient
     */
    private SmsRuClient $_client;

    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->_client = app('SmsRuClient');
    }

    /**
     * Send sms
     * @param string $phone
     * @param string $text
     * @return bool
     */
    public function send(string $phone,string $text):bool
    {
        $data = new SMS;
        $data->to = $phone;
        $data->text = $text;
        $data->from = config('sms-ru.from');
        $data->translit = config('sms-ru.translit');
        $data->test = config('sms-ru.test');
        $data->partner_id = config('sms-ru.partner_id');
        $sms = $this->_client->send_one($data);
        return $sms->status === "OK";
    }
}

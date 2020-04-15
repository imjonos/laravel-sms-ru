<?php
namespace CodersStudio\SmsRu\Classes;

class SMS
{
    /**
     * Номер получателя
     * @var string
     */
    public string $to;

    /**
     * Текст сообщения
     * @var string
     */
    public string $text;

    /**
     *  Если у вас уже одобрен буквенный отправитель, его можно указать здесь, в противном случае будет использоваться ваш отправитель по умолчанию
     * @var string
     */
    public string $from;

    /**
     * Перевести все русские символы в латиницу (позволяет сэкономить на длине СМС)
     * @var int
     */
    public int $translit;

    /**
     * Позволяет выполнить запрос в тестовом режиме без реальной отправки сообщения
     * @var int
     */
    public int $test;

    /**
     * Можно указать ваш ID партнера, если вы интегрируете код в чужую систему
     * @var int
     */
    public int $partner_id;


}

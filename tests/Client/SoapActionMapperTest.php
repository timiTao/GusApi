<?php

namespace GusApi\Tests\Client;

use GusApi\Client\SoapActionMapper;
use PHPUnit\Framework\TestCase;

class SoapActionMapperTest extends TestCase
{
    /**
     * @dataProvider actionProvider
     *
     * @param mixed $expected
     * @param mixed $functionName
     */
    public function testGetActionWithValidName($expected, $functionName)
    {
        $action = SoapActionMapper::getAction($functionName);
        $this->assertSame($expected, $action);
    }

    /**
     * @expectedException \GusApi\Exception\InvalidActionNameException
     */
    public function testGetActionWithInvalidName()
    {
        SoapActionMapper::getAction('BadFunctionName');
    }

    public function actionProvider()
    {
        return [
            [
                'http://CIS/BIR/2014/07/IUslugaBIR/PobierzCaptcha', 'PobierzCaptcha',
            ],
            [
                'http://CIS/BIR/2014/07/IUslugaBIR/SprawdzCaptcha', 'SprawdzCaptcha',
            ],
            [
                'http://CIS/BIR/2014/07/IUslugaBIR/GetValue', 'GetValue',
            ],
            [
                'http://CIS/BIR/2014/07/IUslugaBIR/SetValue', 'SetValue',
            ],
            [
                'http://CIS/BIR/PUBL/2014/07/IUslugaBIRzewnPubl/Zaloguj', 'Zaloguj',
            ],
            [
                'http://CIS/BIR/PUBL/2014/07/IUslugaBIRzewnPubl/Wyloguj', 'Wyloguj',
            ],
            [
                'http://CIS/BIR/PUBL/2014/07/IUslugaBIRzewnPubl/DaneSzukaj', 'DaneSzukaj',
            ],
            [
                'http://CIS/BIR/PUBL/2014/07/IUslugaBIRzewnPubl/DanePobierzPelnyRaport', 'DanePobierzPelnyRaport',
            ],
            [
                'http://CIS/BIR/PUBL/2014/07/IUslugaBIRzewnPubl/DaneKomunikat', 'DaneKomunikat',
            ],
        ];
    }
}

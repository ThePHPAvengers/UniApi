<?php

    /**
     * Created by PhpStorm.
     * User: jkirkby91
     * Date: 10/03/2016
     * Time: 19:22
     */

    class UniApiClientTest extends PHPUnit_Framework_TestCase {

        /**
         * @test
         */
        function test()
        {
            $gateway = new UniApiClient\GateWay;

            $this->assertTrue($gateway->func());
        }
    }
 
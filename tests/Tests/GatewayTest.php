<?php

    /**
     * Created by PhpStorm.
     * User: jkirkby91
     * Date: 10/03/2016
     * Time: 19:22
     */

    namespace UniApiClient;

    use UniApiClient\Gateway;

    class GatewayTest extends \PHPUnit_Framework_TestCase {

        /**
         * @test
         */
        function test()
        {
            $gateway = new Gateway;
            assertTrue($gateway->func());
        }
    }
 
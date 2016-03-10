<?php

    namespace Tests;

    use UniApiClient\Gateway;

    /**
     * @author jkirkby91
     */
    class SampleTest extends \PHPUnit_Framework_TestCase
    {
        /**
         * @test
         */
        function test()
        {
            $gateway = new Gateway();
            assertTrue($gateway->func());
        }
    }

<?php

    /**
     * Created by PhpStorm.
     * User: jkirkby91
     * Date: 10/03/2016
     * Time: 19:22
     */

    class UniApiClientTest extends PHPUnit_Framework_TestCase {

        protected $obj = NULL;

        /**
         * Set up test
         */
        protected function setUp() {
            $this->obj = new UniApiClient\UniApiClient;
        }

        /**
         * @test
         */
        function test()
        {
            $this->assertTrue($this->obj->func());
        }
    }
 
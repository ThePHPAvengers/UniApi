<?php

    /**
     * Created by PhpStorm.
     * User: jkirkby91
     * Date: 11/03/2016
     * Time: 14:37
     */

    class HttpTransportClientTest extends PHPUnit_Framework_TestCase {

        public $safe_methods = array('HEAD','GET','OPTIONS','TRACE');
        public $unsafe_methods = array('POST','PUT','DELETE','PATCH','4r4r4r');

        /**
         * Set up test
         */
        protected function setUp() {
            $this->obj = new UniApiClient\HttpTransportClient;
        }

        /**
         * Check safe methods correct
         * @test
         */
        public function checkSafeMethods()
        {

            $safe_methods = $this->obj->safeMethods();

            foreach($safe_methods as $key => $value)
            {
                $this->assertEquals($safe_methods[$key],$this->safe_methods[$key]);
            }
        }

    }
 
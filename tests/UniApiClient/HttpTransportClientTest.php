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
            $this->obj = new UniApi\HttpTransportClient;
        }

        /**
         * Check safe methods correct
         * @test
         */
        public function checkSafeMethods()
        {

            $this->obj = new UniApi\HttpTransportClient;

            $safe_methods = $this->obj->safeMethods();

            foreach($safe_methods as $key => $value)
            {
                $this->assertEquals($safe_methods[$key],$this->safe_methods[$key]);
            }
        }

        /**
         * Check unsafe methods
         * @test
         */
        public function checkUnSafeMethods()
        {
            $this->obj = new UniApi\HttpTransportClient;

            $safe_methods = $this->obj->safeMethods();

            foreach($this->unsafe_methods as $key => $value){
                $this->unsafe_methods[$value] = $value;
                unset($this->unsafe_methods[$key]);
            }

            foreach($this->unsafe_methods as $key => $value)
            {
                var_dump($this->unsafe_methods[$key]);
                var_dump($this->obj->isUnsafeMethod($this->unsafe_methods[$key]));
               // $this->assertEquals('true',$this->obj->isUnsafeMethod($this->unsafe_methods[$key]));
            }
        }

    }
 
<?php

    /**
     * Created by PhpStorm.
     * User: jkirkby91
     * Date: 10/03/2016
     * Time: 21:01
     */

    class HttpErrorCodeTest extends PHPUnit_Framework_TestCase {

        protected $obj = NULL;

        /**
         * Set up test
         */
        protected function setUp() {
            $this->obj = new UniApiClient\Enum\HttpErrorCode;
        }

        public function test()
        {
            $this->assertInstanceOf(get_class($this->obj),new UniApiClient\Enum\HttpErrorCode);
        }
    }
 
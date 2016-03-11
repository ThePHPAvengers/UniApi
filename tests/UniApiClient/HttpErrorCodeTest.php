<?php

    /**
     * Created by PhpStorm.
     * User: jkirkby91
     * Date: 11/03/2016
     * Time: 02:52
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
 
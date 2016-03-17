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
         * HttpErrorCodeTest
         * 
         * @test
         */
        public function testErrorEnum()
        {
            $this->obj = new UniApi\Enum\HttpErrorCode;

            $this->assertInstanceOf(get_class($this->obj),new UniApi\Enum\HttpErrorCode);
        }
    }
 
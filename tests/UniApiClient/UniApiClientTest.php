<?php

    /**
     * Created by PhpStorm.
     * User: jkirkby91
     * Date: 10/03/2016
     * Time: 19:22
     */

    class UniApiTest extends PHPUnit_Framework_TestCase {

        public $ExampleMockClass = null;

        protected $obj = NULL;

        /**
         * Set up test
         */
        protected function setUp() {

            $this->ExampleMockClass = $this->getMock(
                $originalClassName='ExampleClient',
                $methods = array(
                    'postJsonEndpoint',
                    'postQueryStringEndpoint',
                    'postCsvEndpoint',
                    'postXmlEndpoint',
                    'getJsonEndpoint',
                    'getCsvEndpoint',
                    'getXmlEndpoint'
                ),
                $arguments = array(),
                $mockClassName = '',
                $callOriginalConstructor = false,
                $callOriginalClone = false,
                $callAutoload = false,
                $cloneArguments = false,
                $callOriginalMethods = false);

            $this->obj = new UniApi\Gateway($this->ExampleMockClass);
        }

        /**
         * @test
         */
        public function classIsInstanceOfClass()
        {
            $this->assertInstanceOf(get_class($this->obj),new UniApi\Gateway($this->ExampleMockClass));
        }

        /**
         * @test
         */
        public function classHasStaticAttributes()
        {
            $this->assertClassHasAttribute('registered','UniApi\Gateway');
            $this->assertClassHasAttribute('mimeRegistrar','UniApi\Gateway');

        }
    }
 
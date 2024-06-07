<?php

namespace Addressable\Bundle\Tests\Unit\Validator\Constraints;

use Addressable\Bundle\Validator\Constraints\Latitude;
use Addressable\Bundle\Validator\Constraints\LatitudeValidator;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Ensures correct behaviour of LatitudeValidator
 */
class LatitudeValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test submitting valid data
     *
     * @test
     * @dataProvider getValidTestData
     */
    public function testNoViolationWhenValidLatitude($data)
    {
        $constraint = new Latitude();
        $validator = new LatitudeValidator();
        $context = $this->getMockBuilder(ExecutionContextInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $context->expects($this->never())
            ->method('addViolation');

        $validator->initialize($context);
        $validator->validate($data, $constraint);
    }

    /**
     * Test submitting invvalid data
     *
     * @test
     * @dataProvider getInvalidTestData
     */
    public function testViolationWhenValidLatitude($data)
    {
        $constraint = new Latitude();
        $validator = new LatitudeValidator();
        $context = $this->getMockBuilder(ExecutionContextInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $context->expects($this->once())
            ->method('addViolation')
            ->with('The value %value% is not a valid latitude.');

        $validator->initialize($context);
        $validator->validate($data, $constraint);
    }

    /**
     * Returns sets of valid form data
     *
     * @return array
     */
    public function getValidTestData()
    {
        return array(
            array('90'),
            array('-90'),
            array('0'),
            array('45.11112121'),
            array('-45.11112121')
        );
    }

    /**
     * Returns sets of valid form data
     *
     * @return array
     */
    public function getInvalidTestData()
    {
        return array(
            array('91'),
            array('-91'),
            array('111111'),
            array('-4000')
        );
    }
}

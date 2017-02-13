<?php
/*
 *  declare(strict_types = 1); does not work with phpspec
 *  https://github.com/phpspec/phpspec/issues/898
 */

namespace spec\App\Components;

use App\Components\Calculator;
use PhpSpec\ObjectBehavior;

/**
 * Spec for Calculator class.
 *
 * Casting input to (float) due to PHP 7.1 allowing integers to act as
 * floats. This is inconsistent as is_float(1) will return false.
 *
 * Class CalculatorSpec
 * @package spec\App\Components
 */
class CalculatorSpec extends ObjectBehavior
{

    //general
    function it_is_initialisable()
    {
        $this->shouldHaveType(Calculator::class);
    }

    //add
    function it_should_return_a_float_when_calling_add()
    {
        $this->add((float)2, (float)3)->shouldBeFloat();
    }

    function it_should_throw_a_type_error_when_invalid_arguments_used_for_add()
    {
        $this->shouldThrow('\TypeError')->during('add', array('One', (float)5));
    }

    function it_should_sum_two_numbers_together()
    {
        $this->add((float)1, (float)2)->shouldEqual((float)3);
    }

    //subtract
    function it_should_return_a_float_when_calling_subtract()
    {
        $this->subtract((float)3, (float)2)->shouldBeFloat();
    }

    function it_should_throw_a_type_error_when_invalid_arguments_used_for_subtract()
    {
        $this->shouldThrow('\TypeError')->during('subtract', array('four', (float)5));
    }

    function it_should_subtract_argument2_from_argument1()
    {
        $this->subtract((float)3, (float)2)->shouldEqual((float)1);
    }

    //divide
    function it_should_return_a_float_when_calling_divide()
    {
        $this->divide((float)10, (float)2)->shouldBeFloat();
    }

    function it_should_throw_a_type_error_when_invalid_arguments_used_for_divide()
    {
        $this->shouldThrow('\TypeError')->during('divide', array('four', (float)5));

    }

    function it_should_throw_an_exception_when_zero_used_as_divisor()
    {
        // this should actually throw a DivisionByZeroError Error but phpspec detects and throws ErrorException
        $this->shouldThrow('\Exception')->during('divide', array((float)10, 0));
    }

    function it_should_divide_argument1_by_argument2()
    {
        $this->divide((float)10, (float)2)->shouldEqual((float)5);
    }

    //multiply
    function it_should_return_a_float_when_calling_multiply()
    {
        $this->multiply((float)3, (float)2)->shouldBeFloat();
    }

    function it_should_throw_an_type_error_when_invalid_arguments_used_for_multiply()
    {
        $this->shouldThrow('\TypeError')->during('multiply', array('four', (float)5));
    }

    function it_should_multiply_argument1_by_argument2()
    {
        $this->multiply((float)3, (float)2)->shouldEqual((float)6);
    }

}

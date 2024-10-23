<?php

namespace spec\App\Entity;

use App\Entity\Dinosaur;
use \Exception; // Eccezione standard di PHP
use PhpSpec\ObjectBehavior;

class DinosaurSpec extends ObjectBehavior
{
    public function getMatchers(): array
    {
        return [
            'returnZero' => function ($subject) {
                if ($subject !== 0) {
                    throw new Exception(sprintf(
                        'Returned value should be zero, got "%s"',
                        $subject
                    ));
                }
                return true;
            }
        ];
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Dinosaur::class);
    }

    function it_should_be_zero()
    {
        $this->getLength()->shouldReturnZero(); #o shouldReturns(0)
    }

    function it_should_be_zero_length()
    {
        $this->getLength()->shouldNotReturnZero();
    }

    function it_should_allow_to_set_length()
    {
        $this->setLength(9);
        $this->getLength()->shouldReturn(9);
    }
    function it_should_not_shrink(){
        $this->setLength(12);
        $this->getLength()->shouldBeGreaterThan(12);
    }
}

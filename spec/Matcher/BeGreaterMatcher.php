<?php
namespace spec\Matcher;

use PhpSpec\Matcher\BasicMatcher;
use PhpSpec\Exception\Example\FailureException;

final class BeGreaterMatcher extends BasicMatcher
{
    public function supports(string $name, $subject, array $arguments): bool
    {
        // Il matcher supporta il metodo 'beGreater' con un solo argomento.
        return $name === 'beGreater' && count($arguments) === 1;
    }

    protected function matches($subject, array $arguments): bool
    {
        // Verifica se il soggetto è maggiore dell'argomento passato.
        return $subject > $arguments[0];
    }

    protected function getFailureException(string $name, $subject, array $arguments): FailureException
    {
        // Eccezione lanciata in caso di fallimento della condizione.
        return new FailureException(sprintf(
            'Expected %s to be greater than %s',
            $subject,
            $arguments[0]
        ));
    }

    protected function getNegativeFailureException(string $name, $subject, array $arguments): FailureException
    {
        // Eccezione lanciata quando la condizione negativa (non maggiore) fallisce.
        return new FailureException(sprintf(
            'Expected %s not to be greater than %s',
            $subject,
            $arguments[0]
        ));
    }
}

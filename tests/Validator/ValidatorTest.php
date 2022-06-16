<?php

namespace Tests\Validator;

use Abtswath\Validator\Exceptions\ValidationException;
use Abtswath\Validator\Validator;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase {

    public function testValidate(): void {
        $user = new User(
            'abtswath',
            'abcd11234.',
            'sdfa@kl.com',
            19,
            3,
            null
        );
        $validator = new Validator($user);
        $validator->validate();
        $this->expectException(ValidationException::class);
    }

}

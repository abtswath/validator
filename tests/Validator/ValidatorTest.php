<?php

namespace Tests\Validator;

use Abtswath\Validator\Contracts\Rules\Attributes\NotNull;

class ValidatorTest {

    public function testCreateValidator(): void {


    }

    public function testClass() {
        return new class {
            #[NotNull()]
            private string $name;

            private int $age;

            private int $gender;
        };
    }

}

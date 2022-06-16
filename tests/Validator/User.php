<?php

namespace Tests\Validator;

use Abtswath\Validator\Attributes\Between;
use Abtswath\Validator\Attributes\Email;
use Abtswath\Validator\Attributes\Enum;
use Abtswath\Validator\Attributes\Max;
use Abtswath\Validator\Attributes\Min;
use Abtswath\Validator\Attributes\RegExp;
use Abtswath\Validator\Attributes\Required;
use Abtswath\Validator\Attributes\StringValue;

class User {

    #[Required]
    #[Between(3, 10)]
    private string $username;

    #[Required]
    #[Min(8)]
    #[RegExp('#^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$#')]
    private string $password;

    #[Required]
    #[Email]
    private string $email;

    #[Required]
    #[Min(0)]
    #[Max(150)]
    private int $age;

    #[Required]
    #[Enum([1, 2])]
    private int $gender;

    #[Required]
    private ?string $address;

    /**
     * @param string $username
     * @param string $password
     * @param string $email
     * @param int $age
     * @param int $gender
     * @param ?string $address
     */
    public function __construct(string $username, string $password, string $email, int $age, int $gender, ?string $address) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->age = $age;
        $this->gender = $gender;
        $this->address = $address;
    }

}

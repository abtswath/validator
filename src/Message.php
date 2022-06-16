<?php

namespace Abtswath\Validator;

class Message {

    protected array $messages;

    public function __construct() {
    }

    public function add(string $key, string $rule, string $message): void {
        $this->messages[$key][$rule] = $message;
    }

    public function isEmpty(): bool {
        return empty($this->messages);
    }

    public function messages(): array {
        return $this->messages;
    }

    public function first(): string {
        foreach ($this->messages as $message) {
            if (!empty($message)) {
                return $message[array_key_first($message)];
            }
        }
        return 'The given data was invalid.';
    }

}

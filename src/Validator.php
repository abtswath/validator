<?php

namespace Abtswath\Validator;

use Abtswath\Validator\Contracts\Attribute;
use Abtswath\Validator\Exceptions\RuleDoesNotExistException;
use Abtswath\Validator\Exceptions\ValidationException;
use ReflectionAttribute;
use ReflectionObject;
use ReflectionProperty;

class Validator {

    protected object $object;

    protected array $attributes;

    protected array $data;

    protected bool $stopOnFailure = false;

    protected Message $message;

    protected array $failedRules;

    protected array $extensions = [];

    protected array $rules = [
        \Abtswath\Validator\Attributes\Accepted::class => \Abtswath\Validator\Rules\Accepted::class,
        \Abtswath\Validator\Attributes\AcceptedIf::class => \Abtswath\Validator\Rules\AcceptedIf::class,
        \Abtswath\Validator\Attributes\ActiveURL::class => \Abtswath\Validator\Rules\ActiveURL::class,
        \Abtswath\Validator\Attributes\After::class => \Abtswath\Validator\Rules\After::class,
        \Abtswath\Validator\Attributes\AfterOrEqual::class => \Abtswath\Validator\Rules\AfterOrEqual::class,
        \Abtswath\Validator\Attributes\Alpha::class => \Abtswath\Validator\Rules\Alpha::class,
        \Abtswath\Validator\Attributes\AlphaDash::class => \Abtswath\Validator\Rules\AlphaDash::class,
        \Abtswath\Validator\Attributes\AlphaNum::class => \Abtswath\Validator\Rules\AlphaNum::class,
        \Abtswath\Validator\Attributes\ArrayValue::class => \Abtswath\Validator\Rules\ArrayValue::class,
        \Abtswath\Validator\Attributes\Before::class => \Abtswath\Validator\Rules\Before::class,
        \Abtswath\Validator\Attributes\BeforeOrEqual::class => \Abtswath\Validator\Rules\BeforeOrEqual::class,
        \Abtswath\Validator\Attributes\Between::class => \Abtswath\Validator\Rules\Between::class,
        \Abtswath\Validator\Attributes\Boolean::class => \Abtswath\Validator\Rules\Boolean::class,
        \Abtswath\Validator\Attributes\Confirmed::class => \Abtswath\Validator\Rules\Confirmed::class,
        \Abtswath\Validator\Attributes\Date::class => \Abtswath\Validator\Rules\Date::class,
        \Abtswath\Validator\Attributes\DateEquals::class => \Abtswath\Validator\Rules\DateEquals::class,
        \Abtswath\Validator\Attributes\DateFormat::class => \Abtswath\Validator\Rules\DateFormat::class,
        \Abtswath\Validator\Attributes\Declined::class => \Abtswath\Validator\Rules\Declined::class,
        \Abtswath\Validator\Attributes\DeclinedIf::class => \Abtswath\Validator\Rules\DeclinedIf::class,
        \Abtswath\Validator\Attributes\Different::class => \Abtswath\Validator\Rules\Different::class,
        \Abtswath\Validator\Attributes\Digits::class => \Abtswath\Validator\Rules\Digits::class,
        \Abtswath\Validator\Attributes\DigitsBetween::class => \Abtswath\Validator\Rules\DigitsBetween::class,
        \Abtswath\Validator\Attributes\Dimensions::class => \Abtswath\Validator\Rules\Dimensions::class,
        \Abtswath\Validator\Attributes\Distinct::class => \Abtswath\Validator\Rules\Distinct::class,
        \Abtswath\Validator\Attributes\Email::class => \Abtswath\Validator\Rules\Email::class,
        \Abtswath\Validator\Attributes\EndsWith::class => \Abtswath\Validator\Rules\EndsWith::class,
        \Abtswath\Validator\Attributes\Enum::class => \Abtswath\Validator\Rules\Enum::class,
        \Abtswath\Validator\Attributes\Exclude::class => \Abtswath\Validator\Rules\Exclude::class,
        \Abtswath\Validator\Attributes\ExcludeIf::class => \Abtswath\Validator\Rules\ExcludeIf::class,
        \Abtswath\Validator\Attributes\ExcludeUnless::class => \Abtswath\Validator\Rules\ExcludeUnless::class,
        \Abtswath\Validator\Attributes\ExcludeWithout::class => \Abtswath\Validator\Rules\ExcludeWithout::class,
        \Abtswath\Validator\Attributes\Extension::class => \Abtswath\Validator\Rules\Extension::class,
        \Abtswath\Validator\Attributes\File::class => \Abtswath\Validator\Rules\File::class,
        \Abtswath\Validator\Attributes\Gt::class => \Abtswath\Validator\Rules\Gt::class,
        \Abtswath\Validator\Attributes\Gte::class => \Abtswath\Validator\Rules\Gte::class,
        \Abtswath\Validator\Attributes\IP::class => \Abtswath\Validator\Rules\IP::class,
        \Abtswath\Validator\Attributes\IPv4::class => \Abtswath\Validator\Rules\IPv4::class,
        \Abtswath\Validator\Attributes\IPv6::class => \Abtswath\Validator\Rules\IPv6::class,
        \Abtswath\Validator\Attributes\Image::class => \Abtswath\Validator\Rules\Image::class,
        \Abtswath\Validator\Attributes\In::class => \Abtswath\Validator\Rules\In::class,
        \Abtswath\Validator\Attributes\InArray::class => \Abtswath\Validator\Rules\InArray::class,
        \Abtswath\Validator\Attributes\Integer::class => \Abtswath\Validator\Rules\Integer::class,
        \Abtswath\Validator\Attributes\Json::class => \Abtswath\Validator\Rules\Json::class,
        \Abtswath\Validator\Attributes\Lt::class => \Abtswath\Validator\Rules\Lt::class,
        \Abtswath\Validator\Attributes\Lte::class => \Abtswath\Validator\Rules\Lte::class,
        \Abtswath\Validator\Attributes\MacAddress::class => \Abtswath\Validator\Rules\MacAddress::class,
        \Abtswath\Validator\Attributes\Max::class => \Abtswath\Validator\Rules\Max::class,
        \Abtswath\Validator\Attributes\MimeType::class => \Abtswath\Validator\Rules\MimeType::class,
        \Abtswath\Validator\Attributes\Min::class => \Abtswath\Validator\Rules\Min::class,
        \Abtswath\Validator\Attributes\MultipleOf::class => \Abtswath\Validator\Rules\MultipleOf::class,
        \Abtswath\Validator\Attributes\NotIn::class => \Abtswath\Validator\Rules\NotIn::class,
        \Abtswath\Validator\Attributes\NotRegExp::class => \Abtswath\Validator\Rules\NotRegExp::class,
        \Abtswath\Validator\Attributes\Nullable::class => \Abtswath\Validator\Rules\Nullable::class,
        \Abtswath\Validator\Attributes\Numeric::class => \Abtswath\Validator\Rules\Numeric::class,
        \Abtswath\Validator\Attributes\Present::class => \Abtswath\Validator\Rules\Present::class,
        \Abtswath\Validator\Attributes\Prohibited::class => \Abtswath\Validator\Rules\Prohibited::class,
        \Abtswath\Validator\Attributes\ProhibitedIf::class => \Abtswath\Validator\Rules\ProhibitedIf::class,
        \Abtswath\Validator\Attributes\ProhibitedUnless::class => \Abtswath\Validator\Rules\ProhibitedUnless::class,
        \Abtswath\Validator\Attributes\Prohibits::class => \Abtswath\Validator\Rules\Prohibits::class,
        \Abtswath\Validator\Attributes\RegExp::class => \Abtswath\Validator\Rules\RegExp::class,
        \Abtswath\Validator\Attributes\Required::class => \Abtswath\Validator\Rules\Required::class,
        \Abtswath\Validator\Attributes\RequiredArrayKeys::class => \Abtswath\Validator\Rules\RequiredArrayKeys::class,
        \Abtswath\Validator\Attributes\RequiredIf::class => \Abtswath\Validator\Rules\RequiredIf::class,
        \Abtswath\Validator\Attributes\RequiredUnless::class => \Abtswath\Validator\Rules\RequiredUnless::class,
        \Abtswath\Validator\Attributes\RequiredWith::class => \Abtswath\Validator\Rules\RequiredWith::class,
        \Abtswath\Validator\Attributes\RequiredWithAll::class => \Abtswath\Validator\Rules\RequiredWithAll::class,
        \Abtswath\Validator\Attributes\RequiredWithout::class => \Abtswath\Validator\Rules\RequiredWithout::class,
        \Abtswath\Validator\Attributes\RequiredWithoutAll::class => \Abtswath\Validator\Rules\RequiredWithoutAll::class,
        \Abtswath\Validator\Attributes\Same::class => \Abtswath\Validator\Rules\Same::class,
        \Abtswath\Validator\Attributes\Size::class => \Abtswath\Validator\Rules\Size::class,
        \Abtswath\Validator\Attributes\Sometimes::class => \Abtswath\Validator\Rules\Sometimes::class,
        \Abtswath\Validator\Attributes\StartsWith::class => \Abtswath\Validator\Rules\StartsWith::class,
        \Abtswath\Validator\Attributes\StringValue::class => \Abtswath\Validator\Rules\StringValue::class,
        \Abtswath\Validator\Attributes\Timezone::class => \Abtswath\Validator\Rules\Timezone::class,
        \Abtswath\Validator\Attributes\URL::class => \Abtswath\Validator\Rules\URL::class,
        \Abtswath\Validator\Attributes\UUID::class => \Abtswath\Validator\Rules\UUID::class,
    ];

    public function __construct(object $object) {
        $this->object = $object;
        $this->message = new Message();
        $this->initialize();
    }

    protected function initialize(): void {
        foreach ($this->getProperties() as $property) {
            if (empty($attributes = $this->getAttributes($property))) {
                continue;
            }
            $name = $property->getName();
            $this->data[$name] = $this->getPropertyValue($property);
            $this->attributes[$name] = [];
            foreach ($attributes as $attribute) {
                $this->attributes[$name][] = $attribute;
            }
        }
    }

    public function stopOnFailure(): static {
        $this->stopOnFailure = true;
        return $this;
    }

    /**
     * @throws ValidationException
     * @throws RuleDoesNotExistException
     */
    public function validate(): void {
        if ($this->fail()) {
            throw new ValidationException($this);
        }
    }

    /**
     * @throws RuleDoesNotExistException
     */
    public function fail(): bool {
        return !$this->passes();
    }

    /**
     * @throws RuleDoesNotExistException
     */
    public function passes(): bool {
        foreach ($this->attributes as $property => $rules) {
            if ($this->stopOnFailure) {
                break;
            }
            foreach ($rules as $rule) {
                $this->validateProperty($property, $rule);
            }
        }
        return $this->message->isEmpty();
    }

    /**
     * @param ReflectionProperty $property
     * @return ReflectionAttribute[]
     */
    protected function getAttributes(ReflectionProperty $property): array {
        return $property->getAttributes(Attribute::class, ReflectionAttribute::IS_INSTANCEOF);
    }

    protected function getPropertyValue(ReflectionProperty $property): mixed {
        $property->setAccessible(true);
        return $property->getValue($this->object);
    }

    public function getValue(string $property): mixed {
        return $this->data[$property] ?? null;
    }

    public function message(): Message {
        return $this->message;
    }

    /**
     * @throws RuleDoesNotExistException
     */
    public function validateProperty(string $property, ReflectionAttribute $attribute): void {
        $rule = $this->resolve($attribute->getName());
        $value = $this->getValue($property);
        $instance = $attribute->newInstance();
        if (!$rule::validate($property, $value, $instance, $this)) {
            $this->addFailure($property, $attribute->getName(), $instance);
        }
    }

    public function addFailure(string $property, string $rule, MessageProvider $attribute): void {
        $this->message->add(
            $property,
            $rule,
            $attribute->getMessage()
        );
        $this->failedRules[$property][$rule] = $attribute;
    }

    /**
     * @return ReflectionProperty[]
     */
    protected function getProperties(): array {
        $reflection = new ReflectionObject($this->object);
        return $reflection->getProperties();
    }

    /**
     * @throws RuleDoesNotExistException
     */
    public function resolve(string $name): string {
        return $this->rules[$name] ?? throw new RuleDoesNotExistException($name);;
    }

}

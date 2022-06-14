<?php

namespace Abtswath\Validator\Contracts\Rules\Attributes;

use Abtswath\Validator\MessageProvider;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Dimensions extends MessageProvider {

    private int $minWidth;

    private int $minHeight;

    private int $maxWidth;

    private int $maxHeight;

    private int $width;

    private int $height;

    private float $ratio;

    //TODO. default message...
    public function __construct(int $minWidth, int $minHeight, int $maxWidth, int $maxHeight, int $width, int $height, float $ratio, string $message = '') {
        parent::__construct($message);
        $this->minWidth = $minWidth;
        $this->minHeight = $minHeight;
        $this->maxWidth = $maxWidth;
        $this->maxHeight = $maxHeight;
        $this->width = $width;
        $this->height = $height;
        $this->ratio = $ratio;
    }

    /**
     * @return int
     */
    public function getMinWidth(): int {
        return $this->minWidth;
    }

    /**
     * @return int
     */
    public function getMinHeight(): int {
        return $this->minHeight;
    }

    /**
     * @return int
     */
    public function getMaxWidth(): int {
        return $this->maxWidth;
    }

    /**
     * @return int
     */
    public function getMaxHeight(): int {
        return $this->maxHeight;
    }

    /**
     * @return int
     */
    public function getWidth(): int {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight(): int {
        return $this->height;
    }

    /**
     * @return float
     */
    public function getRatio(): float {
        return $this->ratio;
    }

}

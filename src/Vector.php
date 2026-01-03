<?php

namespace App;

class Vector
{
    private float $x;
    private float $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): float
    {
        return $this->x;
    }

    public function getY(): float
    {
        return $this->y;
    }

    public function length(): float
    {
        return sqrt($this->x * $this->x + $this->y * $this->y);
    }

    public function isZero(float $eps = 1e-9): bool
    {
        return abs($this->x) < $eps && abs($this->y) < $eps;
    }

    public function isPerpendicularTo(Vector $other, float $eps = 1e-9): bool
    {
        // Скалярное произведение равно 0 => перпендикулярность
        $dot = $this->x * $other->x + $this->y * $other->y;
        return abs($dot) < $eps;
    }

    public function __toString(): string
    {
        return sprintf("Vector(x=%.3f, y=%.3f)", $this->x, $this->y);
    }
}

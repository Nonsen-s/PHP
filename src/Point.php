<?php

namespace App;

class Point
{
    private float $x;
    private float $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function moveX(float $dx): void
    {
        $this->x += $dx;
    }

    public function moveY(float $dy): void
    {
        $this->y += $dy;
    }

    public function moveByVector(Vector $v): void
    {
        $this->moveX($v->getX());
        $this->moveY($v->getY());
    }

    public function getX(): float
    {
        return $this->x;
    }

    public function getY(): float
    {
        return $this->y;
    }

    public function __toString(): string
    {
        return sprintf("Point(x=%.3f, y=%.3f)", $this->x, $this->y);
    }
}

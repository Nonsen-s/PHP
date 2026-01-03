<?php

namespace App;

class MagicClass
{
    private array $data = [];

    public function __construct(mixed $initial = null)
    {
        echo __METHOD__ . PHP_EOL;
        $this->data['initial'] = $initial;
    }

    public function __destruct()
    {
        echo __METHOD__ . PHP_EOL;
    }

    public function __call(string $name, array $arguments): mixed
    {
        echo __METHOD__ . " -> {$name}" . PHP_EOL;
        return null;
    }

    public static function __callStatic(string $name, array $arguments): mixed
    {
        echo __METHOD__ . " -> {$name}" . PHP_EOL;
        return null;
    }

    public function __get(string $name): mixed
    {
        echo __METHOD__ . " -> {$name}" . PHP_EOL;
        return $this->data[$name] ?? null;
    }

    public function __set(string $name, mixed $value): void
    {
        echo __METHOD__ . " -> {$name}" . PHP_EOL;
        $this->data[$name] = $value;
    }

    public function __isset(string $name): bool
    {
        echo __METHOD__ . " -> {$name}" . PHP_EOL;
        return isset($this->data[$name]);
    }

    public function __unset(string $name): void
    {
        echo __METHOD__ . " -> {$name}" . PHP_EOL;
        unset($this->data[$name]);
    }

    public function __sleep(): array
    {
        echo __METHOD__ . PHP_EOL;
        // Должен вернуть список свойств, которые будут сериализованы
        return ['data'];
    }

    public function __wakeup(): void
    {
        echo __METHOD__ . PHP_EOL;
    }

    public function __serialize(): array
    {
        echo __METHOD__ . PHP_EOL;
        return ['data' => $this->data];
    }

    public function __unserialize(array $data): void
    {
        echo __METHOD__ . PHP_EOL;
        $this->data = $data['data'] ?? [];
    }

    public function __toString(): string
    {
        // __toString обязан возвращать строку
        return __METHOD__;
    }

    public function __invoke(): mixed
    {
        echo __METHOD__ . PHP_EOL;
        return null;
    }

    public static function __set_state(array $an_array): self
    {
        echo __METHOD__ . PHP_EOL;
        $obj = new self();
        $obj->data = $an_array['data'] ?? [];
        return $obj;
    }

    public function __clone()
    {
        echo __METHOD__ . PHP_EOL;
    }

    public function __debugInfo(): ?array
    {
        echo __METHOD__ . PHP_EOL;
        return [
            'data' => $this->data,
        ];
    }
}

<?php

require_once __DIR__ . '/vendor/autoload.php';

echo "<pre>";

use App\MagicClass;
use App\Point;
use App\Vector;

echo "=== Magic methods demo ===\n";

$obj = new MagicClass("init");                   // __construct
$obj->unknownMethod(1, 2, 3);                    // __call
MagicClass::unknownStaticMethod("a");            // __callStatic

$obj->prop = 123;                                // __set
echo "prop = " . $obj->prop . "\n";             // __get
var_dump(isset($obj->prop));                     // __isset
unset($obj->prop);                               // __unset

echo "toString: " . $obj . "\n";                // __toString
$obj();                                          // __invoke

$clone = clone $obj;                             // __clone

// __debugInfo будет вызван при var_dump
var_dump($obj);

// Сериализация: если определен __serialize, он будет вызван вместо __sleep
$serialized = serialize($obj);                   // __serialize (или __sleep)
$restored = unserialize($serialized);            // __unserialize (или __wakeup)

// Чтобы явно показать __sleep / __wakeup (при наличии __serialize PHP их не вызывает)
$obj->__sleep();
$obj->__wakeup();

// __set_state обычно вызывается через var_export + eval
$export = var_export($obj, true);
eval('$stateObj = ' . $export . ';');            // __set_state

unset($obj);                                     // __destruct

echo "\n=== Geometry demo ===\n";

$t1 = new Point(2, 3);

$v1 = new Vector(4, 1);
$v2 = new Vector(0, 0);
$v3 = new Vector(-$v1->getY(), $v1->getX());     // гарантированно перпендикулярен v1

echo "T1 before: {$t1}\n";
echo "V1 = {$v1}, len = " . $v1->length() . "\n";
echo "V2 = {$v2}, len = " . $v2->length() . "\n";
echo "V3 = {$v3}, len = " . $v3->length() . "\n";

echo "V2 isZero? " . ($v2->isZero() ? "yes" : "no") . "\n";
echo "V1 ⟂ V3 ? " . ($v1->isPerpendicularTo($v3) ? "yes" : "no") . "\n";

$t1->moveByVector($v1);
echo "T1 after moving by V1: {$t1}\n";
echo "</pre>";

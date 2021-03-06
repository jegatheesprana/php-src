--TEST--
gmp_jacobi() basic tests
--SKIPIF--
<?php if (!extension_loaded("gmp")) print "skip"; ?>
--FILE--
<?php

for ($i = -1; $i < 10; $i++) {
    var_dump(gmp_strval(gmp_jacobi(($i*$i)-1, 3)));
}

var_dump(gmp_strval(gmp_jacobi(7, 23)));
var_dump(gmp_strval(gmp_jacobi("733535124", "1234123423434535623")));
var_dump(gmp_strval(gmp_jacobi(3, "1234123423434535623")));

$n = "123123";
$n1 = "1231231";

var_dump(gmp_strval(gmp_jacobi($n, $n1)));
var_dump(gmp_strval(gmp_jacobi($n, 3)));
var_dump(gmp_strval(gmp_jacobi(3, $n1)));

try {
    var_dump(gmp_jacobi(3, array()));
} catch (\TypeError $e) {
    echo $e->getMessage() . \PHP_EOL;
}
try {
    var_dump(gmp_jacobi(array(), 3));
} catch (\TypeError $e) {
    echo $e->getMessage() . \PHP_EOL;
}
try {
    var_dump(gmp_jacobi(array(), array()));
} catch (\TypeError $e) {
    echo $e->getMessage() . \PHP_EOL;
}

echo "Done\n";
?>
--EXPECT--
string(1) "0"
string(2) "-1"
string(1) "0"
string(1) "0"
string(2) "-1"
string(1) "0"
string(1) "0"
string(2) "-1"
string(1) "0"
string(1) "0"
string(2) "-1"
string(2) "-1"
string(1) "0"
string(1) "0"
string(2) "-1"
string(1) "0"
string(2) "-1"
gmp_jacobi(): Argument #2 ($b) must be of type GMP|string|int|bool, array given
gmp_jacobi(): Argument #1 ($a) must be of type GMP|string|int|bool, array given
gmp_jacobi(): Argument #1 ($a) must be of type GMP|string|int|bool, array given
Done

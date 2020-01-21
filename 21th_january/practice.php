<?php
// $foo = 'Bob';              // Assign the value 'Bob' to $foo
// $bar = &$foo;
// echo $bar."<br>";              // Reference $foo via $bar.
// $bar = "My name is $bar";  // Alter $bar...
// echo $bar."<br>";
// echo $foo;                 // $foo is altered too.

// function test()
// {
//     static $a = 0;
//     echo $a;
//     $a++;
// }
//  test();
// function test()
// {
//     static $count = 0;

//     $count++;
//     echo $count;
//     if ($count < 10) {
//         test();
//     }
//     $count--;
// }
// $a = 'hello';
// $$a = 'world';
// echo $a." ".$$a;
// echo "<br>";
// echo "$a ${$a}";
// echo "<br>";
// echo "$a $hello";
//  class foo {
//      var $bar = 'I am bar.';
//      var $arr = array('I am A.', 'I am B.', 'I am C.');
//      var $r   = 'I am r.';
//  }

//  $foo = new foo();
//  $bar = 'bar';
//  $baz = array('foo', 'bar', 'baz', 'quux');
//  echo $foo->$bar . "\n";
//  echo $foo->{$baz[1]} . "\n";
//  echo __LINE__;
//  $start = 'b';
//  $end   = 'ar';
//  echo $foo->{$start . $end} . "\n";

//  $arr = 'arr';
//  echo $foo->{$arr[1]} . "\n";
// echo __LINE__;
// function double($i)
// {
//     return $i*2;
// }
// $b = $a = 5;        /* assign the value five into the variable $a and $b */
// $c = $a++;          /* post-increment, assign original value of $a 
//                        (5) to $c */
// $e = $d = ++$b;     /* pre-increment, assign the incremented value of 
//                        $b (6) to $d and $e */

// /* at this point, both $d and $e are equal to 6 */

// $f = double($d++);  /* assign twice the value of $d before
//                        the increment, 2*6 = 12 to $f */
// $g = double(++$e);  /* assign twice the value of $e after
//                        the increment, 2*7 = 14 to $g */
// $h = $g += 10;      /* first, $g is incremented by 10 and ends with the 
//                        value of 24. the value of the assignment (24) is 
//                        then assigned into $h, and $h ends with the value 
//                        of 24 as well. */
// function getArray() {
//     return array(1, 2, 3);
// }

// // on PHP 5.4
// $secondElement = getArray()[0];
// var_dump($secondElement);

// // previously
// $tmp = getArray();
// $secondElement = $tmp[1];
// var_dump($secondElement);
// // or
// list(, $secondElement) = getArray();
// var_dump($secondElement);
// Create a simple array.
// $array = array(1, 2, 3, 4, 5);
// print_r($array);
// echo "<br>";

// // Now delete every item, but leave the array itself intact:
// foreach ($array as $i => $value) {
//     unset($array[$i]);
// }
// print_r($array);
// echo "calling <br>";

// // Append an item (note that the new key is 5, instead of 0).
// $array[] = 6;
// print_r($array);

// // Re-index:
// $array = array_values($array);
// $array[] = 7;
// print_r($array);

// $foo[bar] = 'enemy'; //wrong 
// echo $foo['bar'];

?>
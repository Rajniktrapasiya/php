<?php

$array = ['Rajnik','Kishan','Tej'];
var_dump($array);
echo "<br>";
$array2 = [
    'Rajnik' => 'Chess',
    'Kishan' => 'Carom',
    'Tej' => 'Criket',
];
var_dump($array2);
echo "<br>";

$array3 = array(
    'Rajnik' => 'Chess',
    'SecondArray' => $inner_array = array(
                        'kishan' => 'Carom',
                        'ThierdArray' => $multi_dimention = array(
                                            'tej' => 'cricket',
                                         )
    )
);
echo "<br>";
var_dump($array3);
echo "<br>";
$array3 = [
    'Rajnik' => 'Chess',
    'SecondArray' => $inner_array = [
                        'kishan' => 'Carom',
                        'ThierdArray' => $multi_dimention = [
                                            'tej' => 'cricket',
                                        ]
    ]

];
echo "<br>";
var_dump($array3);
echo "<br>";
//--------------------------------------------------------foreach loop printing-----------------------------

// foreach($array3 as $element => $item) {
//     echo "<strong>".$element."<br>";
//     foreach($item as $item) {
//         echo $item."<br>";
//     }
// }
?>
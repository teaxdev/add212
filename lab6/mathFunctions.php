<?php 
function areaOfRectangle($width, $height) {
    $area = $height * $width;
    return $area;
}
echo "The area of a 5 x 3 rectangle is: ";
echo areaOfRectangle(5, 3);

function perimeterOfRectangle($width, $height) {
    return 2 * $height * $width;
}
echo "The perimeter of a 5 x 3 rectangle is: ";
echo perimeterOfRectangle(5, 3);

function doubleValue($number, $factor) { 
    // this is supposed to double the value but I'm going to factor it
    return $number ** $factor;
} 
echo "Factor 5 ** 2: ";
echo doubleValue(5, 2);
?>
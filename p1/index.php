<?php

#example inputs for palindrome and expected returns
$input1 = "racecar"; # Yes
$input2 = "Racecar"; # Yes
$input3 = "racecar!"; # Yes
$input4 = "!racecar!"; # Yes
$input5 = "Hello World"; #No
#example inputs for vowel counts and expected returns
$input6 = "the quick brown fox jumps over the lazy dog"; #11 vowels
$input7 = "Hll Wrld"; //0 vowels
$input8 = "AeIoU"; //5 vowels
#example inputs for letter shift and expected returns
$input9 = "The zoo is open"; // "Uif app jt pqfo"
$input10 = "foobar@1"; // "gppcbs@1"
$input11 = "aAb"; // "bBc"


#function to check if palindrome
function isPalindrome($inputString)
{
//take the string, remove all special characters, assign it as temporary variable x
    $x = preg_replace('%\W%',"", $inputString); //see references in README.md for this function
//make the string lowercase
    $x = strtolower($x);
//reverse the string and assign it to a second temporary variable y
    $y = strrev($x);
//compare x and y to see if the string is a palindrome.
    if ($x === $y){
        return "";
    } else {
        return "not ";
    }
}


#function to count vowels
function countVowels($inputString) 
{
//initialize a vowel count to keep track of count total
    $vowelCount = 0;
//make the string lowercase to keep the loop shorter
    $inputString = strtolower($inputString);
//create array of lowercase vowels
    $vowels = ['a','e','i','o','u'];
//loop - for each vowel in $vowels
    foreach($vowels as $x)
    {
    //get the count of times it was used
        $count = substr_count($inputString, $x);
    //and add it to the total
        $vowelCount += $count;
    }
//then return the total.  
    return $vowelCount;
}





require 'index-view.php';
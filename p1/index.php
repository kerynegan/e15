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
#example inputs for the name game
$input12 = "Keryn";


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

function shiftLetters($inputString) 
{
    echo "My input is '<span id='result'>" . $inputString . "</span>.' Shifted by one letter, my result is now '";
    $shift = str_split($inputString);
    foreach($shift as $key => $value)
    {
        $s = ord($value);
        if(($s>=65 and $s<90) || ($s>=97 and $s<122)) {
            $shift[$key] = chr($s+1);
        } else if ($s === 90) {
            $shift[$key] = chr(65);
        } else if ($s === 122) {
            $shift[$key] = chr(97);
        }

    }
    $shift = implode('',$shift);
    echo "<span id='result'>" . $shift . "</span>.' <br />";

}

function nameGame($inputString) {
    //split off first letter of string, assign to variable, and check it
    //if first letter is a vowel, use $first + trimmed input together througout
    //else if first letter is a B/b, don't add b before trimmed input in first line
    //else if first letter is a F/f, don't add f before trimmed input in second line
    //else if first letter is an M/m, don't add m before trimmed input in third line
    
    /* echo: The Name Game!:
    $inputString, $inputString, bo-([B].($trimmed or $inputString))
    Bonana-fanna fo-([F] ($trimmed or $inputString))
    Fee fi mo-([M] . ($trimmed or $inputString))
    $inputString!
    */
}

// 

require 'index-view.php';
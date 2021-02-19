<?php
session_start();

$answer = $_POST['answer'];

$results = null;
$palindrome = null;
$vowelCount = null;
$shit = null;

#function to check if palindrome
function isPalindrome($inputString)
{
    $palindrome = null;
//take the string, remove all special characters, assign it as temporary variable x
    $x = preg_replace('%\W%',"", $inputString); //see references in README.md for this function
//make the string lowercase
    $x = strtolower($x);
//reverse the string and assign it to a second temporary variable y
    $y = strrev($x);
//compare x and y to see if the string is a palindrome.
    if ($x === $y){
        $palindrome = "Yes, it is a palindrome.";
    } else {
        $palindrome = "No, it is not a palindrome.";
    }
    return $palindrome;
}


#function to count vowels
function countVowels($inputString) 
{
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

    if($vowelCount == 0) {
        $vowelCount = "no ";
    } 

    return $vowelCount;
}

function shiftLetters($inputString) 
{
    // echo "My input is '<span id='result'>" . $inputString . "</span>.' Shifted by one letter, my result is now '";
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
    return $shift;
    // echo "<span id='result'>" . $shift . "</span>.' <br />";

}

$palindrome = isPalindrome($answer);
$vowelCount = countVowels($answer);
$shift = shiftLetters($answer);

$results['answer'] = $answer;
$results["palindrome"] = $palindrome;
$results["vowelCount"] = $vowelCount;
$results["shift"] = $shift;



$_SESSION['results'] = $results;

// #Redirect back to index
header('Location: index.php');
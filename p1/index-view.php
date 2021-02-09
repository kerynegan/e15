<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E15 Project 1</title>
</head>
<body>
    <h1>E15 Project 1</h1>
    <h2>String Processor</h2>

    <p>What are my inputs? Are they Palindromes?</p>
    <?php 
    echo "Input 1 is \"" . $input1 . "\" and it is " . isPalindrome($input1) . "a Palindrome.<br />" ;
    echo "Input 2 is \"" . $input2 . "\" and it is " . isPalindrome($input2) . "a Palindrome.<br />" ;
    echo "Input 3 is \"" . $input3 . "\" and it is " . isPalindrome($input3) . "a Palindrome.<br />" ;
    echo "Input 4 is \"" . $input4 . "\" and it is " . isPalindrome($input4) . "a Palindrome.<br />" ;
    echo "Input 5 is \"" . $input5 . "\" and it is " . isPalindrome($input5) . "a Palindrome.<br />" ;
    ?>
    <p>What are my inputs? How many vowels do they have?</p>
    <?php 
    echo "Input 6 is \"" . $input6 . "\" and it has " . countVowels($input6) . " vowels.<br />" ;
    echo "Input 7 is \"" . $input7 . "\" and it has " . countVowels($input7) . " vowels.<br />" ;
    echo "Input 8 is \"" . $input8 . "\" and it has " . countVowels($input8) . " vowels.<br />" ;
    ?>

</body>
</html>
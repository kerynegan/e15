<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>E15 Project 1</title>
</head>
<body>
    <h1>E15 Project 1</h1>
    <h2>String Processor</h2>

    <p>What are my inputs? Are they Palindromes?</p>
    <?php 
    echo "Input 1 is \"<span id='result'>" . $input1 . "</span>\" and it is <span id='result'>" . isPalindrome($input1) . "</span>a Palindrome.<br />" ;
    echo "Input 2 is \"<span id='result'>" . $input2 . "</span>\" and it is <span id='result'>" . isPalindrome($input2) . "</span>a Palindrome.<br />" ;
    echo "Input 3 is \"<span id='result'>" . $input3 . "</span>\" and it is <span id='result'>" . isPalindrome($input3) . "</span>a Palindrome.<br />" ;
    echo "Input 4 is \"<span id='result'>" . $input4 . "</span>\" and it is <span id='result'>" . isPalindrome($input4) . "</span>a Palindrome.<br />" ;
    echo "Input 5 is \"<span id='result'>" . $input5 . "</span>\" and it is <span id='result'>" . isPalindrome($input5) . "</span>a Palindrome.<br />" ;
    ?>
    <p>What are my inputs? How many vowels do they have?</p>
    <?php 
    echo "Input 6 is \"<span id='result'>" . $input6 . "</span>\" and it has <span id='result'>" . countVowels($input6) . "</span> vowels.<br />" ;
    echo "Input 7 is \"<span id='result'>" . $input7 . "</span>\" and it has <span id='result'>" . countVowels($input7) . "</span> vowels.<br />" ;
    echo "Input 8 is \"<span id='result'>" . $input8 . "</span>\" and it has <span id='result'>" . countVowels($input8) . "</span> vowels.<br />" ;
    ?>
    <p>What are my inputs? Cool. Now shift them by one letter.</p>
    <?php echo shiftLetters($input9);
    echo shiftLetters($input10);
    echo shiftLetters($input11); ?>
</body>
</html>
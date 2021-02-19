<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>E15 Project 1</title>
</head>
<body>
    <form method='POST' action='process.php'>

        <h1>E15 Project 1</h1>
        <h2>String Processor</h2>
        
        <label for='answer'>Please enter a word, phrase, or name:</label>
        <input type='text' name='answer' id='answer'>

        <button type='submit'>Submit</button>

    </form>
    <?php  if($results) {?> 
        <h2>Results:</h2>

        <p> Your entry:</p>
        <?php  echo  $answer . "<br />";?>
 
        <p> Is it a palindrome?</p>
        <?php  echo  $palindrome . "<br />";?>

        <p> How many vowels are there?</p>
        <?php  echo "There are <span id='result'>" . $vowelCount . "</span> vowels!<br />";?>

        <p> What happens if you shift the letters each by one?</p>
        <?php  echo "You get <span id='result'>" . $shift . "</span>! Cool, huh?<br />";?>
    
    

    <?php } ?>
</body>
</html>
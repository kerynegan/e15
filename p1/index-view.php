<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@700&family=Merriweather&display=swap" rel="stylesheet">
    <title>E15 Project 1</title>
</head>
<body>
    <form method='POST' action='process.php'>

        <h1>E15 Project 1</h1>
        <h2>String Processor</h2>
        
        <label for='answer'>Please enter a word or phrase:</label>
        <input type='text' name='answer' id='answer'>

        <button type='submit'>Submit</button>

    </form>
    <?php  if($results) {?> 

        <div id="resultsDiv">
            <h2>Results:</h2>

            <p class="heavier"> Your entry:</p>
            <?php  echo  $answer . "<br />";?>
    
            <p class="heavier">  Is it a palindrome?</p>
            <?php  echo  $palindrome . "<br />";?>

            <p class="heavier">  How many vowels are there?</p>
            <?php  echo "There are " . $vowelCount . " vowels!<br />";?>

            <p class="heavier"> What happens if you shift the letters each by one?</p>
            <?php  echo "You get " . $shift . "! Cool, huh?<br />";?>
        </div>
    

    <?php } ?>
</body>
</html>
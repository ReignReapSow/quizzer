<?php
/**
 * Created by IntelliJ IDEA.
 * User: Reign
 * Date: 4/16/2017
 * Time: 6:14 PM
 */
/** @noinspection UntrustedInclusionInspection */
include ('database.php'); ?>
<?php

    //**Get total number of questions
    $query = "SELECT * FROM questions";
    //get results
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Quizzer</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <div class="container">
                <h1>PHP QUIZZER</h1>
            </div>
        </header>
        <main>
            <div class="container">
                <h2>Test Your PHP Knowledge</h2>
                <p>This is a multiple choice quiz to test your knowledge of php.</p>
                <ul>
                    <li><strong>Number of Questions: </strong><?php echo $total ; ?></li>
                    <li><strong>Type of Questions: </strong>Multiple Choice</li>
                    <li><strong>Estimated Time: </strong><?php echo $total *.5.'min' ; ?></li>
                </ul>
                <a href="question.php?n=1" class="start">Start Quiz</a>
            </div>
        </main>
        <footer>
            <div class="container">
                Copyright &copy; 2017, Reign W. - Reign Designs, Inc.
            </div>
        </footer>
    </body>
</html>

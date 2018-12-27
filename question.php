<?php
/**
 * Created by IntelliJ IDEA.
 * User: Reign
 * Date: 4/16/2017
 * Time: 6:14 PM
 */
    include ('database.php');
?>
<?php

    //Set question number
    //gets the n in the address
    //(int) sets it as a integer
    $number = (int)$_GET['n'];
    
    //  Get Question
     
    $query = "SELECT * FROM `questions`
            WHERE question_number = $number";

    //Run and store query or die - pass in error and _LINE_ number
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    
    //puts data in associative array
    $question = $result->fetch_assoc();
    //  Get Question
    
    $query = "SELECT * FROM `choices`
            WHERE question_number = $number";

    //Run and store query or die - pass in error and _LINE_ number
    $choices = $mysqli->query($query) or die($mysqli->error.__LINE__);
    
    //puts data in associative array
    $choices = $choices->fetch_assoc();
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
		
		<div class="current">Question 1 of 5</div>
		<!--p class="question">What does PHP stand for?</p-->
        <p class="question">
            <?php echo $question['text']; ?>
        </p>
			<form method="post" action="process.php">
				<ul class="choices">
                    <!-- : Colon ends the php line  -->
                    <?php while($row = $choices->fetch_assoc()): ?>
                        <li>
                            <input name="choice" type="radio" value="<?php echo $row['id']; ?>">
                                <?php echo $row['text']; ?>
                        </li>
    
                    <?php endwhile; ?>
					
					<!--li><input name="choice" type="radio" value="1">PHP: Hypertext Preprocessor</li>
					<li><input name="choice" type="radio" value="1">Private Home Page</li>
					<li><input name="choice" type="radio" value="1">Personal Home Page</li>
					<li><input name="choice" type="radio" value="1">Personal Hypertext Processor</li-->
				</ul>
				<input type="submit" value="Submit">
			</form>
			
			
		
	</div>
</main>
<footer>
	<div class="container">
		Copyright &copy; 2017, PHP Quizzer
	</div>
</footer>
</body>
</html>

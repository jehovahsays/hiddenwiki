<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title>BotQuiz</title>
	
	<link rel="stylesheet" type="text/css" href="css/style.css" />

	
</head>

<body>

	<div id="page-wrap">
	<br>
	Thank you

		<h1>Here are your results for BotQuiz </h1>
		<br> I you do not see the start button below this message and you are human <br><br>
		<a href="https://www.jehovahsays.net">Click here</a> to try the test again.
        <?php
            
            $answer1 = $_POST['question-1-answers'];
 //           $answer2 = $_POST['question-2-answers'];
        
            $totalCorrect = 0;
            
            if ($answer1 == "A") echo "
	<br>
	<button onclick=\"JavaScript:alert('If you are human click the OK button.')\">
	<a href=\"http://jehovahsays.net/index.html\">
	<br>PRESS START
</button></a>
<br>\n"; { $totalCorrect++; }
 //           if ($answer2 == "B") { $totalCorrect++; }
            
            echo "<br><div id='results'>$totalCorrect / 5 correct</div>";
            
        ?>
	
	</div>

</body>

</html>
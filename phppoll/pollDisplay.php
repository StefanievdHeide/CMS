<?php 
require_once 'app/init.php';

$pollsQuery = $db->query("
	SELECT id, question
	FROM polls
	WHERE DATE(NOW()) BETWEEN starts AND ends
");

while($row = $pollsQuery->fetchObject()) {
	$polls[] = $row;
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="css/mainPage.css">
		<link rel="stylesheet" href="css/pollAnswers.css">
		<link rel="stylesheet" href="css/pollDisplayCSS.css">
	</head>
	<body>
		<div class="topnav">
			<a href="index.php">Home</a>
			<a class="active" href="pollDisplay.php">Polls</a>
			<a href="#createPoll">Create a Poll</a>
			<a id="rightButtons" href="#login">Login</a>
			<a id="rightButtons" href="#contact">Contact</a>
		</div>

		<div class="mainFill">
			<h1>The polls you can choose from :</h2>
			<?php if(!empty($polls)):?>
				<ul>
					<?php foreach ($polls as $poll): ?>
						<li><a href="poll.php?poll=<?php echo $poll->id; ?>"><?php echo $poll->question; ?></a></li>
					<?php endforeach; ?>
				</ul>
			<?php else: ?>
				<p>Sorry, no polls available right now.</p>
			<?php endif; ?>
		</div>

			    
	    
	</body>
</html>
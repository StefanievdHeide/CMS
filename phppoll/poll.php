<?php

require_once 'app/init.php';

if(!isset($_GET['poll'])) {
	header('Location: index.php');
} else {

	$id = (int)$_GET['poll'];

	//Get general poll information
	$pollQuery = $db->prepare("
		SELECT id, question
		FROM polls
		WHERE id = :poll
		AND DATE(NOW()) BETWEEN starts AND ends
		");

		$pollQuery->execute([
			'poll' => $id
		]);

		$poll = $pollQuery->fetchObject();

		// Get the user answer for this poll
		$answerQuery = $db->prepare("
			SELECT polls_choices.id AS choice_id, polls_choices.name AS choice_name
			FROM polls_answers
			JOIN polls_choices
			ON polls_answers.choice = polls_choices.id
			WHERE polls_answers.user = :user
			AND polls_answers.poll = :poll
			");

		$answerQuery->execute([
			'user' => $_SESSION['user_id'],
			'poll' => $id
		]);

		// Has the user completed the poll?
		$completed =  $answerQuery->rowCount() ? true : false;

		if($completed) {
			// Get all answers
			$answersQuery = $db->prepare("
				SELECT 
				polls_choices.name,  #Selecting choices by name
				COUNT(polls_answers.id) * 100 / (		#Calculates the
					SELECT COUNT(*)						#total percentage
					FROM polls_answers					
					WHERE polls_answers.poll = :poll) AS percentage 	
				FROM polls_choices			
				LEFT JOIN polls_answers		#Joining the tables for formatting
				ON polls_choices.id = polls_answers.choice
				WHERE polls_choices.poll = :poll
				GROUP BY polls_choices.id
			");

			$answersQuery->execute([
				'poll' => $id
			]);

			//Extract answers
			while($row = $answersQuery->fetchObject()){
				$answers[] = $row;
			}

		} else {
			//Get poll choices
			$choicesQuery  = $db->prepare("
				SELECT polls.id, polls_choices.id AS choice_id, polls_choices.name
				FROM polls
				JOIN polls_choices
				ON polls.id = polls_choices.poll
				WHERE polls.id = :poll
				AND DATE(NOW()) BETWEEN polls.starts AND polls.ends
			");

			$choicesQuery->execute([
				'poll' => $id
			]);

			//Extract choices and place in array
			while($row = $choicesQuery->fetchObject()) {
				$choices[] = $row;
			}
		}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/mainPage.css">
	<link rel="stylesheet" href="css/pollAnswers.css">
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
		<?php if(!$poll): ?>
			<p>That poll doesn't exist!</p>
		<?php else: ?>
			<div class="poll">
				<div class="poll-question">
					<?php echo $poll->question?>
				</div>

				<?php if($completed): ?>
					<p id="pollCompletion">You have completed this poll, thanks.</p>
					<ul>
						<?php foreach($answers as $answer): ?>
							<li class="completedAnswers"><?php echo $answer-> name; ?> <?php echo number_format($answer -> percentage, 2); ?>%</li>
						<?php endforeach; ?>
					</ul>
				<?php else: ?>
					<?php if(!empty($choices)): ?>
						<form action="vote.php" method="post">
							<div class="poll-options">
								<?php foreach($choices as $index => $choice): ?>
									<div class="poll-option">
										<input type="radio" name="choice" value="<?php echo $choice->choice_id?>" id="c<?php echo $index; ?>">
										<label for="c<?php echo $index; ?>"> <?php echo $choice->name; ?></label>
									</div>
								<?php endforeach; ?>
							</div>
							<input type="submit" value="Submit answer" name="test" id="sendButton">
							<input type="hidden" name="poll" value="<?php echo $id; ?>">
						</form>
					<?php else: ?>
						<p>There are no choices right now.</p>
					<?php endif; ?>
				<?php endif; ?>
				
			</div>
		<?php endif; ?>
	</div>
</body>
</html>
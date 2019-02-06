INSERT INTO polls_answers (user, poll, choice)
			SELECT 3, 2, 5
			FROM polls
			WHERE EXISTS (
				SELECT id
				FROM polls
				WHERE id = 2)
				AND DATE(NOW()) BETWEEN starts AND ends
			AND EXISTS (
				SELECT id
				FROM polls_choices
				WHERE id = 5)
			AND NOT EXISTS (
				SELECT id
				FROM polls_answers
				WHERE user = 3
				AND poll = 2)
			LIMIT 1
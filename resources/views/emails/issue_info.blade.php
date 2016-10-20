<!DOCTYPE Html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Maintenance Report Information</title>
	</head>
	<body>
		<p>
			 {{ ucfirst($user->name) }} has reported an issue.
		</p>
		<p>ID: {{ $issue->issue_id }}</p>
		<p>Title: {{ $issue->title }}</p>
		<p>Priority: {{ $issue->priority }}</p>
		<p>Status: {{ $issue->status }}</p>

	</body>
</html>
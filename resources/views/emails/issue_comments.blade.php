<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Maintenance Report</title>
</head>
<body>
    <p>{{ $comment->comment }}</p>
    <p>Replied by: {{ $user->name }}</p>
    <p>Title: {{ $issue->title }}</p>
    <p>Title: {{ $issue->issue_id }}</p>
    <p>Status: {{ $issue->status }}</p>
    <p> View your issue details on {{ url('issues/'. $issue->issue_id) }}</p>

</body>
</html>
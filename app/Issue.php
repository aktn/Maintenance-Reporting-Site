<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
	protected $fillable = [
		'user_id', 'category_id', 'issue_id', 'title', 'priority', 'message', 'status'
	];   
}

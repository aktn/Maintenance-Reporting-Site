<?php

namespace App\Mailers;

use App\Issue;
use Illuminate\Contracts\Mail\Mailer;

class AppMailer{
	protected $mailer;
	protected $fromAddress = 'theaungkhant@gmail.com'; //app email
	protected $fromName = 'Maintenance Report';
	protected $to;
	protected $subject;
	protected $view;
	protected $data = [];

	public function __construct(Mailer $mailer)
	{
		$this->mailer = $mailer;
	}

	public function sendIssueInformation($user, Issue $issue)
	{
		$this->to = $user->email; // admin email here
		$this->subject = "[Issue ID: $issue->issue_id] $issue->title";
		$this->view = 'emails.issue_info';
		$this->data = compact('user','issue');

		return $this->deliver();
	}

	public function deliver()
	{
		$this->mailer->send($this->view, $this->data, function($message){
			$message->from($this->fromAddress, $this->fromName)
					->to($this->to)->subject($this->subject);
		});
	}
}
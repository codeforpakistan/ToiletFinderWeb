<?php

namespace App\Mail;

use App\ApiResource;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class ApiRequest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The Api Request instance.
     *
     * @var Api Request
     */
    public $apirequest;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->apirequest = $apirequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->apirequest->name, $this->apirequest->email , $this->apirequest->api_token , $this->apirequest->purpose )->view('emails.apirequest');
    }

}

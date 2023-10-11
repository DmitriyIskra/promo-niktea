<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class MailReport extends Mailable
{
    use Queueable, SerializesModels;
    public $testMailData;
    public $path;
    public $date_start;
    public $date_end;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($date_start, $date_end, $path)
    {
        $this->date_start = $date_start;
        $this->date_end = $date_end;
        $this->path = $path;

    }

    public function attachments(): array
    {
        return [
            Attachment::fromPath($this->path),
        ];
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Отчет по регистрациям кодов за период с $this->date_start по $this->date_end")
            ->view("empty");
    }
}

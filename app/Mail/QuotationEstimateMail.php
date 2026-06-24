<?php

namespace App\Mail;

use App\Models\QuotationEstimate;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuotationEstimateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $estimate;

    public function __construct(QuotationEstimate $estimate)
    {
        $this->estimate = $estimate;
    }

    public function build()
    {
        return $this->subject('Quotation Estimate from HSBLCO')
            ->view('emails.quotation-estimate');
    }
}

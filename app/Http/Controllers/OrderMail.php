<?
namespace App\Http\Controllers;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $total = 30;

    public function __construct()
    {
        //
    }

    public function build()
    {
        return $this->view('email.newOrder');
    }
}
?>

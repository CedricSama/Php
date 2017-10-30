<?php
    namespace App\Mail;
    use App\Commande;
    use Illuminate\Bus\Queueable;
    use Illuminate\Mail\Mailable;
    use Illuminate\Queue\SerializesModels;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Support\Facades\Request;
    class OrderNew extends Mailable{
            public $commande;
        use Queueable, SerializesModels;
        /**
         * Create a new message instance.
         *
         * @return void
         */
        public function __construct(Commande $commande){
            $this->commande = $commande;
        }
        /**
         * Build the message.
         *
         * @return $this
         */
        public function build(){
            $this->view('emails.orderNew');
            //pour créer un entete ou je sais pas trop quoi
            $this->withSwiftMessage(function ($message) {
                $message->getHeaders()
                    ->addTextHeader('Custom-Header_Blabla', 'HeaderValue');
            });
                return $this;
        }
        public function ship(Request $request, $commande_id){
            $order = Commande::findOrFail($commande_id);
        }
    }

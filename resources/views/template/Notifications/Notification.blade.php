namespace {{ $namespace }}\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * Class {{ucfirst($parser->singular())}}{{ $event_type }}Notification.
 */
class {{ucfirst($parser->singular())}}{{ $event_type }}Notification extends Notification
{

    /**
     * Create a notification instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return [];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

    }
}

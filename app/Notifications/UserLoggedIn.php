<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserLoggedIn extends Notification
{
    use Queueable;

    private $userLoggedIn;

    /**
     * Creamos una nueva instancia de una notificacion
     *
     * @return void
     */
    public function __construct(User $userLoggedIn)
    {
        $this->userLoggedIn = $userLoggedIn;
    }

    /**
     * Obtenemos los canales por donde enviamos las notificaciones.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Obtenemos la representacion del email de notificacion.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("Nuevo login en GestGym")
            ->greeting("Un usuario ha accedido a la aplicación")
                    ->line("{$this->userLoggedIn->username} se acaba de loguear")
                    ->action('Notification Action', url('/'.$this->userLoggedIn->username))
                    ->line('¡Gracias por utilizar la aplicación, Un saludo!')
            ->salutation("Departamento de GestGym");
    }

    /**
     * Obtenemos la representacion del array de la notificaion
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [

        ];
    }
}

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserPasswordNotification extends Notification
{
    use Queueable;

    public $email;
    public $password;
    public $name;
    public $last_name;

    /**
     * el constructor recibe la contraseña
     *
     * @return void
     */
    public function __construct($password, $email, $name, $last_name)
    {
        $this->password = $password;
        $this->email = $email;
        $this->name = $name;
        $this->last_name = $last_name;
    }

    /**
     * 
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * contenido del mensaje
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject('¡Bienvenido al Sistema de Gestión de Estadías, ' . $this->name . ' ' . $this->last_name . '!')
        ->line('Puedes acceder al sistema con el siguiente correo electrónico y contraseña:')
        ->line('Correo electrónico: ' . $this->email)
        ->line('Contraseña: ' . $this->password)
        ->line('Por favor, cambia tu contraseña después de iniciar sesión.')
        ->action('Iniciar sesión', url('/login'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

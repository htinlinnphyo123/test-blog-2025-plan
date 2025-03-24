<?php
namespace App\Notifications\Article;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramFile;

class CreateNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public string $title,
        public string $articleID,
        public string $thumbnail,
        public array $categories
    ) {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['telegram'];
    }

    public function toTelegram()
    {
        $chatId     = config('services.telegram-bot-api.chat_id');
        return TelegramFile::create()
            ->to($chatId)
            ->view('admin.article.description_template', ['title' => $this->title, 'articleID' => $this->articleID, "categories" => $this->categories])
            ->photo($this->thumbnail);
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

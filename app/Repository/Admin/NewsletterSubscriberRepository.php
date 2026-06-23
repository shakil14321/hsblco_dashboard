<?php

namespace App\Repository\Admin;

use App\Models\NewsletterSubscriber;

class NewsletterSubscriberRepository
{
    public function all()
    {
        return NewsletterSubscriber::latest()->get();
    }

    public function delete(NewsletterSubscriber $subscriber)
    {
        return $subscriber->delete();
    }

    public function activate(NewsletterSubscriber $subscriber)
    {
        return $subscriber->update([
            'status' => 1,
        ]);
    }

    public function deactivate(NewsletterSubscriber $subscriber)
    {
        return $subscriber->update([
            'status' => 0,
        ]);
    }
}

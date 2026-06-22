<?php

namespace App\Http\Repository\Admin;

use App\Models\ContactMessage;

class ContactMessageRepository
{
    public function all()
    {
        return ContactMessage::latest()->get();
    }

    public function markAsRead(ContactMessage $contactMessage)
    {
        return $contactMessage->update([
            'status' => 'read',
        ]);
    }

    public function markAsUnread(ContactMessage $contactMessage)
    {
        return $contactMessage->update([
            'status' => 'unread',
        ]);
    }

    public function delete(ContactMessage $contactMessage)
    {
        return $contactMessage->delete();
    }
}

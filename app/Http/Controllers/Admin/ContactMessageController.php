<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repository\Admin\ContactMessageRepository;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function __construct(
        protected ContactMessageRepository $contactMessageRepository
    ) {}

    public function index()
    {
        $messages = $this->contactMessageRepository->all();

        return view('admin.contact-messages.index', compact('messages'));
    }

    public function show(ContactMessage $contactMessage)
    {
        $this->contactMessageRepository->markAsRead($contactMessage);

        return view('admin.contact-messages.show', compact('contactMessage'));
    }

    public function markAsRead(ContactMessage $contactMessage)
    {
        $this->contactMessageRepository->markAsRead($contactMessage);

        return back()->with('success', 'Message marked as read.');
    }

    public function markAsUnread(ContactMessage $contactMessage)
    {
        $this->contactMessageRepository->markAsUnread($contactMessage);

        return back()->with('success', 'Message marked as unread.');
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $this->contactMessageRepository->delete($contactMessage);

        return redirect()
            ->route('admin.contact-messages.index')
            ->with('success', 'Message deleted successfully.');
    }
}

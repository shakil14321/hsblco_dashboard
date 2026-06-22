<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repository\Admin\NewsletterSubscriberRepository;
use App\Models\NewsletterSubscriber;

class NewsletterSubscriberController extends Controller
{
    public function __construct(
        protected NewsletterSubscriberRepository $repository
    ) {}

    public function index()
    {
        $subscribers = $this->repository->all();

        return view(
            'admin.newsletter-subscribers.index',
            compact('subscribers')
        );
    }

    public function show(NewsletterSubscriber $newsletterSubscriber)
    {
        return view(
            'admin.newsletter-subscribers.show',
            compact('newsletterSubscriber')
        );
    }

    public function activate(NewsletterSubscriber $newsletterSubscriber)
    {
        $this->repository->activate($newsletterSubscriber);

        return back();
    }

    public function deactivate(NewsletterSubscriber $newsletterSubscriber)
    {
        $this->repository->deactivate($newsletterSubscriber);

        return back();
    }

    public function destroy(NewsletterSubscriber $newsletterSubscriber)
    {
        $this->repository->delete($newsletterSubscriber);

        return redirect()
            ->route('admin.newsletter-subscribers.index');
    }
}

<?php

namespace Suth\LaravelSift\ViewComposers;

use Illuminate\View\View;
use Suth\LaravelSift\SiftScience;
use Illuminate\Contracts\Auth\Guard;

class SnippetComposer
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $guard;

    /**
     * Create a new snippet composer.
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $guard
     * @return void
     */
    public function __construct(Guard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'sift_session_id' => SiftScience::getSessionId(),
            'sift_user_id' => $this->getSiftUserId(),
            'sift_javascript_key' => config('sift.javascript_key'),
        ]);
    }

    protected function getSiftUserId()
    {
        return ($this->guard->user()) ? SiftScience::getUserId($this->guard->user()) : '';
    }
}

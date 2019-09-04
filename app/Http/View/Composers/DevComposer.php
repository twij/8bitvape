<?php namespace App\Http\View\Composers;

use Illuminate\View\View;

class DevComposer
{

    /**
     * Bind data to the view.
     *
     * @param View $view View template
     *
     * @return void
     */
    public function compose(View $view)
    {
        $dev_branch = env('APP_DEV') ? true : false;

        $view->with('dev_branch', $dev_branch);
    }
}

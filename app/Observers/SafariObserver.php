<?php

namespace App\Observers;

use App\Safari;
use DB;
use Storage;

class SafariObserver
{
    /**
     * Handle the safari "created" event.
     *
     * @param  \App\Safari  $safari
     * @return void
     */
    public function created(Safari $safari)
    {
        //
    }

    /**
     * Handle the safari "updated" event.
     *
     * @param  \App\Safari  $safari
     * @return void
     */
    public function updated(Safari $safari)
    {
        //
    }

    /**
     * Handle the safari "deleted" event.
     *
     * @param  \App\Safari  $safari
     * @return void
     */
    public function deleted(Safari $safari)
    {
        $images = [

            str_replace('public/uploads/', '', $safari->cover)
            
        ] + explode('|', $safari->gallery);

        array_walk($images, function ($image) {

            Storage::delete(str_replace('public/uploads/', '', $image));
        });

        DB::table('seos')->where('seoable_id', $safari->id)->delete();
    }

    /**
     * Handle the safari "restored" event.
     *
     * @param  \App\Safari  $safari
     * @return void
     */
    public function restored(Safari $safari)
    {
        //
    }

    /**
     * Handle the safari "force deleted" event.
     *
     * @param  \App\Safari  $safari
     * @return void
     */
    public function forceDeleted(Safari $safari)
    {
        //
    }
}

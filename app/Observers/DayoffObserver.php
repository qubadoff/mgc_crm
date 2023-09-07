<?php

namespace App\Observers;

use App\Mail\DayoffMail;
use App\Models\Dayoff;
use App\Models\User;

class DayoffObserver
{
    /**
     * Handle the Dayoff "created" event.
     */
    public function created(Dayoff $dayoff): void
    {
        $this->sendMailable($dayoff, DayoffMail::class);
    }

    /**
     * Handle the Dayoff "updated" event.
     */
    public function updated(Dayoff $dayoff): void
    {
        //
    }

    /**
     * Handle the Dayoff "deleted" event.
     */
    public function deleted(Dayoff $dayoff): void
    {
        //
    }

    /**
     * Handle the Dayoff "restored" event.
     */
    public function restored(Dayoff $dayoff): void
    {
        //
    }

    /**
     * Handle the Dayoff "force deleted" event.
     */
    public function forceDeleted(Dayoff $dayoff): void
    {
        //
    }

    protected function sendMailable(Dayoff $dayoff)
    {
        $employee = User::where('id', $dayoff->employee_id)->first();

        $emails = array(
            'director@mgc.az',
            'finance@mgc.az'
        );

        $data = array(
            'id' => $employee->id,
            'name' => $employee->name,
            'desc' => $dayoff->description,
            'dayoff_type' => $dayoff->dayoff_type,
            'start_date' => $dayoff->start_date,
            'end_date' => $dayoff->end_date,
            'total_of_days' => $dayoff->total_of_days,
            'status' =>$dayoff->status,
            'created_at' => $dayoff->created_at,
        );

        foreach ($emails as $key => $email)
        {
            \Mail::to($email)->send(new DayoffMail($data));
        }
    }
}

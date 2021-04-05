<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Leave;

class LeaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $leave = new Leave;
        // $leave->user_id = 2;
        // $leave->type = "multiple_days";
        // $leave->leave_date_from = date("Y-m-d", strtotime("15 Jan 2021"));
        // $leave->leave_date_to = date("Y-m-d", strtotime("17 Jan 2021"));
        // $leave->reason = "I want 3 days leave. it's my brother wedding.";
        // $leave->status = "accepted";
        // $leave->created_at = date("Y-m-d", strtotime("14 Jan 2021"));
        // $leave->save();

        // $leave = new Leave;
        // $leave->user_id = 2;
        // $leave->type = "full_day";
        // $leave->leave_date = date("Y-m-d", strtotime("1 Feb 2021"));
        // $leave->reason = "I want one day leave. i am going to home urgently.";
        // $leave->status = "rejected";
        // $leave->created_at = date("Y-m-d", strtotime("28 Jan 2021"));
        // $leave->save();

        // $leave = new Leave;
        // $leave->user_id = 2;
        // $leave->type = "half_day";
        // $leave->leave_date = date("Y-m-d", strtotime("12 Feb 2021"));
        // $leave->leave_time_from = date("H:i", strtotime("9:00 AM"));
        // $leave->leave_time_to = date("H:i", strtotime("2:00 PM"));
        // $leave->reason = "I want half day leave. i am going with guests.";
        // $leave->status = "accepted";
        // $leave->created_at = date("Y-m-d", strtotime("11 Feb 2021"));
        // $leave->save();

        // $leave = new Leave;
        // $leave->user_id = 2;
        // $leave->type = "short_leave";
        // $leave->leave_date = date("Y-m-d", strtotime("15 Feb 2021"));
        // $leave->leave_time_from = date("H:i", strtotime("11:00 AM"));
        // $leave->leave_time_to = date("H:i", strtotime("12:45 PM"));
        // $leave->reason = "I want short leave. i am going to receive a courier.";
        // $leave->status = "pending";
        // $leave->created_at = date("Y-m-d", strtotime("14 Feb 2021"));
        // $leave->save();
    }
}

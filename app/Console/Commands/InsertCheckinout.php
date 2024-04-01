<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Checkinout;
use App\Models\Student;

class InsertCheckinout extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:checkinout';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert data into the checkinout table';

    /**
     * Execute the console command.
     *
     * @return int
     */ 
    public function handle()
    { 
        $students = Student::whereDoesntHave('checkinout', function ($query) {
            $query->where('created_at', '>=', now()->toDateString() . ' 16:45:00');
        })->get();
    
        // Insert check-in data for each student
        foreach ($students as $student) {
            Checkinout::create([
                'student_id' => $student->id,
                'state' => 2, // Replace with desired state value
            ]);
        }
    
        $count = count($students);
        if ($count > 0) {
            $this->info("Inserted data for $count student(s) successfully into the checkinouts table.");
        } else {
            $this->info('No students need to be inserted into the checkinouts table.');
        }
    
        return Command::SUCCESS;
    }
}

<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('id_ID');
        // $this->call(UsersTableSeeder::class)

        // Generate Admin
        $admin = [
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'role' => 1
        ];

        \App\User::create($admin);

        // Generate Teacher
        $user = [
            'username' => 'teacher',
            'password' => bcrypt('teacher'),
            'role' => 2
        ];
        $user = \App\User::create($user);
        $teacher = \App\Teacher::create([
            'name' => $faker->name,
            'user_id' => $user->id,
            'nip' => $faker->numerify('##########'),
        ]);

        // Generate Course
        $course = \App\Course::create([
            'name' => 'Web Programming',
            'teacher_id' => $teacher->id,
        ]);
        $course = \App\Course::create([
            'name' => 'Object Oriented Programming',
            'teacher_id' => $teacher->id,
        ]);

        $classrooms = ['A', 'B', 'C'];

        $st = 1;

        foreach ($classrooms as $key => $c) {

            foreach (range(1, 5) as $item) {

                // Generate Classroom
                $classroom = \App\Classroom::create([
                    'name' => $c . $item,
                ]);

                // Generate Student
                foreach (range(1, 20) as $item) {
                    $user = [
                        'username' => 'student' . $st,
                        'password' => bcrypt('student'),
                        'role' => 3
                    ];

                    $user = \App\User::create($user);
                    $student = \App\Student::create([
                        'name' => $faker->name,
                        'user_id' => $user->id,
                        'nim' => $faker->numerify('##########'),
                        'classroom_id' => $classroom->id,
                    ]);

                    $st++;
                }

            }

        }

        $agencies = [
            'Jakarta Hospital',
            'West Java Hospital',
            'Central Java Hospital',
            'East Java Hospital',
        ];

        foreach ($agencies as $agency) {
            \App\Agency::create([
                'name' => $agency,
                'address' => $faker->country,
                'phone' => $faker->phoneNumber,
            ]);
        }

        $skill = \App\Skill::create(['name' => 'Keperawatan']);

        // caldendar academic
        $calendars = ['Gasal', 'Genap', 'Khusus'];
        $starts = ['2021-01-01', '2021-04-01', '2021-07-01'];
        $ends = ['2021-03-01', '2021-06-01', '2021-10-01'];

        foreach ($calendars as $i => $calendar) {
            $calendar = \App\CalendarAcademic::create([
                'semester' => $calendar,
                'year' => 2021,
            ]);

            foreach (range(1, 15) as $item) {
                \App\CalendarAcademicEvent::create([
                    'calendar_academic_id' => $calendar->id,
                    'start' => $faker->dateTimeBetween($starts[$i], $ends[$i], 'Asia/Jakarta'),
                    'end' => $faker->dateTimeBetween($starts[$i], $ends[$i], 'Asia/Jakarta'),
                    'event' => $faker->realText($maxNbChars = 20, $indexSize = 2)
                ]);
            }
        }

    }
}

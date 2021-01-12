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
        // $this->call(UsersTableSeeder::class);

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

        // Generate Classroom
        $classroom = \App\Classroom::create([
            'name' => 'Teknik Komputer dan Informatika',
        ]);

        // Generate Student
        foreach (range(1, 20) as $item) {
            $user = [
                'username' => 'student' . $item,
                'password' => bcrypt('student'),
                'role' => 3
            ];

            $user = \App\User::create($user);
            $student = \App\Student::create([
                'name' => $faker->name,
                'user_id' => $user->id,
                'classroom_id' => $classroom->id,
            ]);
        }
    }
}

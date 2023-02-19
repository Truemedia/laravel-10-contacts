<?php namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\{Contact, Name, Persona};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $firstName = 'Wade';
        $lastName = 'Penistone';
        $email = 'john.doe@website.com';
        $phone = '1234567890';

        $contact = Contact::make( compact('email', 'phone'));
        $names = collect([
            Name::firstName($firstName), Name::lastName($lastName)
        ]);

        $persona = Persona::create();
        $persona->contact()->save($contact);
        $persona->names()->saveMany($names);
    }
}

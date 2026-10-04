<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUserCommand extends Command
{
    protected $signature = 'admin:user {email? : The admin email} {--password= : The admin password} {--name= : The admin name}';
    protected $description = 'Create or update an admin user for the backoffice';

    public function handle()
    {
        $email = $this->argument('email') ?? $this->ask('Enter admin email', 'me@gianandreasechi.com');
        $name = $this->option('name') ?? $this->ask('Enter admin name', 'Gian Andrea Sechi');
        $password = $this->option('password') ?? $this->secret('Enter admin password');

        if (!$password) {
            $this->error('Password cannot be empty.');
            return 1;
        }

        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => Hash::make($password),
            ]
        );

        $this->info("Admin user '{$user->email}' created/updated successfully!");
        return 0;
    }
}

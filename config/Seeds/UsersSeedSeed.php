<?php
declare(strict_types=1);

use Migrations\BaseSeed;

/**
 * UsersSeed seed.
 */
class UsersSeedSeed extends BaseSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/migrations/4/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Admin User',
                'email' => 'bondn@gmail.com',
                'password' => password_hash('password123', PASSWORD_BCRYPT),
            ]
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}

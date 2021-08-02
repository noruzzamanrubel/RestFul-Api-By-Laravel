<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // DB::statement( 'SET FOREIGN_KEY_CHECKS = 0' );

        // User::truncate();
        // Category::truncate();
        // Product::truncate();
        // Transaction::truncate();
        // DB::table( 'category_product' )->truncate();

        // $usersQuantity       = 200;
        // $categoriesQuantity  = 30;
        // $productsQuantity    = 1000;
        // $transactionQuantity = 1000;

        // factory(User::class, $usersQuantity)->create();

        $this->call( [
            UserSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            TransactionSeeder::class,
        ] );
    }
}

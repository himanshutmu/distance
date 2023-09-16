<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            [
                'address' => "Adchieve HQ - Sint Janssingel 92, 5211 DA 's-Hertogenbosch, The Netherlands",
                'is_headquarter' => 1,
            ],
            [
                'address' => "Eastern Enterprise B.V. - Deldenerstraat 70, 7551AH Hengelo, The Netherlands",
                'is_headquarter' => 0,
            ],
            [
                'address' => "Eastern Enterprise - 46/1 Office no 1 Ground Floor , Dada House , Inside dada silk mills
                compound, Udhana Main Rd, near Chhaydo Hospital, Surat, 394210, India",
                'is_headquarter' => 0,
            ],
            [
                'address' => "Adchieve Rotterdam - Weena 505, 3013 AL Rotterdam, The Netherlands",
                'is_headquarter' => 0,
            ],
            [
                'address' => "Sherlock Holmes - 221B Baker St., London, United Kingdom",
                'is_headquarter' => 0,
            ],
            [
                'address' => "The White House - 1600 Pennsylvania Avenue, Washington, D.C., USA",
                'is_headquarter' => 0,
            ],
            [
                'address' => "The Empire State Building - 350 Fifth Avenue, New York City, NY 10118",
                'is_headquarter' => 0,
            ],
            [
                'address' => "The Pope - Saint Martha House, 00120 Citta del Vaticano, Vatican City",
                'is_headquarter' => 0,
            ],
            [
                'address' => "Neverland - 5225 Figueroa Mountain Road, Los Olivos, Calif. 93441, USA",
                'is_headquarter' => 0,
            ]
        ]);
    }
}

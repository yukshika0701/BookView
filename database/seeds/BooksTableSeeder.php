<?php

use Illuminate\Database\Seeder;

use Carbon\carbon;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        DB::table('book')->insert([
            'title' => 'すずめの戸締り',
            'author' => '新海誠',
            'publisher' => '角川文庫',
            'genre' => 'ファンタジー',
            'photo' => 'no1.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
            DB::table('book')->insert([
            'title' => '君の膵臓を食べたい',
            'author' => '住野よる',
            'publisher' => '双葉社',
            'genre' => 'ラブストーリー',
            'photo' => 'no2.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
            DB::table('book')->insert([
            'title' => '真夏の方程式',
            'author' => '東野圭吾',
            'publisher' => '文春文庫',
            'genre' => 'ファンタジー',
            'photo' => 'no3.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
            DB::table('book')->insert([
            'title' => '人間失格',
            'author' => '太宰治',
            'publisher' => '新潮社',
            'genre' => 'サスペンス',
            'photo' => 'no4.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
            DB::table('book')->insert([
            'title' => '吾輩は猫である',
            'author' => '夏目漱石',
            'publisher' => '講談社',
            'genre' => 'コメディ',
            'photo' => 'no5.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
            DB::table('book')->insert([
            'title' => 'ONEPIECE',
            'author' => '尾田栄一郎',
            'publisher' => '集英社',
            'genre' => 'アクション',
            'photo' => 'no6.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}

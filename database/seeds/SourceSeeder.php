<?php

use App\Source;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = with(new Source())->getTable();
        for ($i = 0; $i < 1000; $i++) {
            $data = factory(Source::class, 1000)->make()->toArray();
            DB::table($table)->insert($data);
        }
    }
}

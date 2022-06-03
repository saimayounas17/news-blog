<?php

use Illuminate\Database\Seeder;
use App\post;
class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = new post();
        $posts->title = 'Why Shehbaz Sharif should dissolve the assemblies and cede to a caretaker setup';
        $posts->body = 'A few days ago, after more than a month of decision-making paralysis, the Shehbaz A few days ago, after more than a month of decision-making paralysis, the Shehbaz
        A few days ago, after more than a month of decision-making paralysis, the Shehbaz A few days ago, after more than a month of decision-making paralysis, the Shehbaz
        A few days ago, after more than a month of decision-making paralysis, the Shehbaz A few days ago, after more than a month of decision-making paralysis, the Shehbaz
        A few days ago, after more than a month of decision-making paralysis, the Shehbaz A few days ago, after more than a month of decision-making paralysis, the Shehbaz
        A few days ago, after more than a month of decision-making paralysis, the Shehbaz A few days ago, after more than a month of decision-making paralysis, the Shehbaz
        A few days ago, after more than a month of decision-making paralysis, the Shehbaz A few days ago, after more than a month of decision-making paralysis, the Shehbaz
        A few days ago, after more than a month of decision-making paralysis, the Shehbaz A few days ago, after more than a month of decision-making paralysis, the Shehbaz
        A few days ago, after more than a month of decision-making paralysis, the Shehbaz A few days ago, after more than a month of decision-making paralysis, the Shehbaz
        A few days ago, after more than a month of decision-making paralysis, the Shehbaz A few days ago, after more than a month of decision-making paralysis, the Shehbaz
        A few days ago, after more than a month of decision-making paralysis, the Shehbaz A few days ago, after more than a month of decision-making paralysis, the Shehbaz';
        $posts->cover_image = 'Shehbaz-41630313451-0_1654253893.jpg';
        $posts->tags = '#showbaz#green#bm';
        $posts->user_id = '1';
      
        $posts->save();
    }
}
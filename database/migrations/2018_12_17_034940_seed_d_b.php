<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedDB extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        /*
            INSERT INTO `categories`(`name`, `img_url`) VALUES ('Fitness','https://www.mensjournal.com/wp-content/uploads/mf/_crop_mf0217_ot_fitness_01_1.jpg?w=1200&h=630&crop=1');
            INSERT INTO `categories`(`name`, `img_url`) VALUES ('Health','https://myblue.bluecrossma.com/sites/g/files/csphws1086/files/inline-images/Doctor%20Image%20Desktop.png');
            INSERT INTO `categories`(`name`, `img_url`) VALUES ('Sports','https://ichef.bbci.co.uk/onesport/cps/480/cpsprodpb/11A54/production/_104767227_virat_kohli_getty.jpg');
            INSERT INTO `categories`(`name`, `img_url`) VALUES ('Technology','https://www.adobe.com/content/dam/acom/en/careers/images/careers-engineer02-800x480px.jpg')
        */

        //INSERT INTO `users`(`name`, `email`, `password`) VALUES ('Omar Farrag','omar.alaa.farrag@gmail.com','password') 
        

        //INSERT INTO `posts`(`title`, `body`, `pic_url`, `category_id`, `author_id`) VALUES ('Title 1','Body 1','https://www.mensjournal.com/wp-content/uploads/mf/_crop_mf0217_ot_fitness_01_1.jpg?w=1200&h=630&crop=1','1','1') 
        //INSERT INTO `posts`(`title`, `body`, `pic_url`, `category_id`, `author_id`) VALUES ('Title 2','Body 2','https://www.mensjournal.com/wp-content/uploads/mf/_crop_mf0217_ot_fitness_01_1.jpg?w=1200&h=630&crop=1','1','1') 
        //INSERT INTO `comments`(`commenter_id`, `post_id`, `body`) VALUES (1,3,'Comment by 1 on 3') 
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

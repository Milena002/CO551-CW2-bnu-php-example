<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

   //faker library
   require_once 'vendor/autoload.php';

   //declaring new instance of Faker Library
   $faker = Faker\Factory::create();

   //db connection
   $db = new mysqli("localhost", "root", "", "oss-cw2");

   //inserting manually
   
   //$db->query("INSERT INTO student(studentid, password, dob, firstname, lastname, house, town, county, country, postcode) 
   //VALUES ('2000000','$2y$10$.LJBO164nZWEVVE/v5mgNuzR01zx1zoyXuGJUa/zp2U.MQxkps3LS','1974-11-10','Jon','Smith','23 Victoria Road',
   //'High Wycombe', 'Bucks', 'UK', 'HP11 1RT');");

   // Insert 5 student records into the database using faker library
  
   for ($i = 0; $i < 5; $i++) {
      $studentid = $faker->unique()->numberBetween(2000001, 2999999);
      $password = $faker->password();
      $dob = $faker->date();
      $firstname = $faker->firstName();
      $lastname = $faker->lastName();
      $house = $faker->buildingNumber();
      $town = $faker->city();
      $county = $faker->state();
      $country = $faker->country();
      $postcode = $faker->postcode();
  
      $sql = "INSERT INTO student (studentid, password, dob, firstname, lastname, house, town, county, country, postcode)
              VALUES ('$studentid', '$password', '$dob', '$firstname', '$lastname', '$house', '$town', '$county', '$country', '$postcode')";

      $db->query($sql);
  }

  // if my query is correct this message should be displayed:
  echo "Inserted 5 student records into the database.";

?>

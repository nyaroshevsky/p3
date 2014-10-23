<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::get('/lorumipsum', function()
{
	$paragraphs = "";
	return View::make('lorumipsum')->with('ipsumtext', $paragraphs);
});

Route::post('/lorumipsum', function() {
    
    $nParagraphs = intval(Input::get('paragraphs'));
    $generator = new Badcow\LoremIpsum\Generator();
    $paragraphs = $generator->getParagraphs($nParagraphs);

    $paragraphs = implode('<p>', $paragraphs);
    return View::make('lorumipsum')->with('ipsumtext', $paragraphs);
});

Route::get('/randomusers', function()
{
	$randomUsersText = "";
	return View::make('randomuser')->with('randomusers', $randomUsersText);
});

Route::post('/randomusers', function() {

	//collect and initialize post variables

	$randomUsersText = "";
	$nUsers = intval(Input::get('users'));
	if ($nUsers == 0)
		return View::make('randomuser')->with('randomusers', $randomUsersText);
    

    $birthdate = FALSE;
    $profile = FALSE;


    if(Input::get('birthdate') == 'yes')
   	{
   		$birthdate = TRUE;	
   	}
    
    if (Input::get('profile') == 'yes')
    {
    	$profile =  TRUE;
    }

    
    //generate data

   	$faker = Faker\Factory::create();
   	$generator = "";
   	if($profile == 1)
   	{
   		$generator = new Badcow\LoremIpsum\Generator();
   	}

   	for ($i=0; $i < $nUsers; $i++) { 
   		$tmpUser = $faker->name ."<br>";
   		if($birthdate == TRUE)
	   	{
	    	$tmpUser =  $tmpUser . $faker->dateTimeThisCentury->format('Y-m-d')  . "<br>";
	   	}
  		if($profile == TRUE)
	   	{
	    	$tmpUser = $tmpUser . implode('.', $generator->getSentences(1)) ."<br>";
	   	}
	   	if ($i == 0)
	   		$randomUsersText = $tmpUser;
	   	else
	   		$randomUsersText = $randomUsersText . "<br>" . $tmpUser;
	}

    return View::make('randomuser')->with('randomusers', $randomUsersText);
});

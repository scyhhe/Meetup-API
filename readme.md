<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Laravel Meetup API

<h1><a href="#">#Installation</a></h1>

<ol>

<li>First download or clone this repo </li>

  <code>
    git clone  https://github.com/scyhhe/Meetup-API.git
  </code>

<li> Then cd to the folder & run composer install to install composer dependencies</li>

  <code>
    composer install
  </code>

<li>Copy .env.example to .env</li>

  <code>
    cp .env.example .env
  </code>
 
<li> Replace DB_* values in .env file to your preferences </li>

<li> Generate the application key via artisan </li>
  <code>
    php artisan key:generate
  </code>
  
<li> Run migrations </li>

  <code>
    php artisan migrate
  </code>

<li> Seed your database with dummy data</li>
    <code>
        php artisan db:seed
    </code>
</ol>

<hr>

<h1><a href="#">#API Endpoint reference</a></h1>

<h2><em>Base path: <code>/api</code></em></h2>

The API is divided into <strong>Users</strong> and <strong>Meetups</strong>

<h3>Meetups</h3>
<hr>
<ul>
	<li>
		<code>
		GET /meetups
		</code>
        <br/>
		<small>
			Get all meetups
		</small>
	</li>
    <li>
		<code>
		GET /meetups/{id}
		</code>
        <br/>
		<small>
			Get a specific meetup
		</small>
	</li>
    <li>
		<code>
		POST /meetups
		</code>
        <br/>
		<small>
			Create a new meetup.
		</small>
        <br/>
        <em>Body parameters:</em>
        <ul>
            <li><em>$string</em> title</li>
            <li><em>$string</em> about</li>
            <li><em>$string</em> where</li>
            <li><em>$string</em> when</li>
        </ul>
        <em> Returns the meetup if successful, otherwise returns an HTTP Exception.
	</li>
</ul>


<h3>Users</h3>
<hr>
<ul>
	<li>
		<code>
			GET /users
		</code>
		<br>
		<small>
			Get all users
		</small>
	</li>
	<li>
		<code>
			GET /user/{id}
		</code>
		<br>
		<small>
			Get a specific user with any meetups he is attending
		</small>
	</li>
	<li>
		<code>
			POST /user/{user}/meetups/{meetup}/attend
		</code>
		<br>
		<small>
			Register a user with an id {user} to attend a specific meetup {meetup}.
			Returns the user if succesful, otherwise returns an HTTP Exception.
		</small>
	</li>
	<li>
		<code>
			POST /user/{user}/meetups/{meetup}/unattend
		</code>
		<br>
		<small>
			Makes the user with an id {user} unnatend a specific meetup {meetup}.
			Returns the user if succesful, otherwise returns an HTTP Exception.
		</small>
	</li>
</ul>


<h1><a href="#">#Error status codes</a></h1>

<p>All error responses will be returned as JSON. There will be additional information on some responses. To see more please refer to the <code> App/Exceptions/Handler.php</code> file, where the error handling logic lies.
    
 **Also, every query gets logged in the laravel.log file, which u can find at <code>app/storage/logs/laravel.log</code> <br>
 **If you want to disable this, comment it out in the <code>App/Providers/ApiServiceProvider.php</code> file. If, however, you decide to keep it, there is a handy artisan command for clearing the log as it can get messy. You can run it via
 <code>php artisan log:clear</code>
 
 Still needs a few tweaks here and there. As always, any feedback is greatly appreciated!


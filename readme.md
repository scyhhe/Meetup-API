<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Laravel Meetup API

#Installation

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

<hr>

#API Endpoint reference

<em>Base path: <code>/api</code></em>

The API is divided into <strong>Users</strong> and <strong>Meetups</strong>

<h3>Meetups</h3>
<hr>
<ul>
	<li>
		<code>
		GET
		</code>
		<br>
		<span>
			/meetups
		</span>
		<small>
			Get all meetups
		</small>
	</li>
</ul>





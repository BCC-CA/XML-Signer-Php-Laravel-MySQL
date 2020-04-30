# XML Signer Web Example - PHP Laravel 7.x

## Commands

Clear all DB with new data-

	php artisan key:generate && php artisan migrate:fresh --seed

Clear Cace-

	php artisan cache:clear
	php artisan route:clear
	php artisan config:clear
	php artisan view:clear

	Route::get('/clear-cache', function() {
	    Artisan::call('cache:clear');
	    return "Cache is cleared";
	});

## Library-

Model to XML

1. https://github.com/spatie/array-to-xml

2. https://stackoverflow.com/q/27676828/2193439

3. Downloader - https://laravel.io/forum/02-14-2014-how-to-save-xml-response-output-to-file-for-uploading-with-sshinto

	return Response::download(

4. XML to array - https://github.com/mtownsend5512/xml-to-array



------------------

Run with global server-

	php artisan serve
	ngrok http 8000

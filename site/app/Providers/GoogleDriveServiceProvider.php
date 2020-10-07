<?php

namespace App\Providers;

use Google_Client;
use Google_Service_Drive;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class GoogleDriveServiceProvider extends ServiceProvider {
	public static string $MINIS_FOLDER_PATH = '/1vehWavMl47UX3lm4yFklQ0PIw9VWTbpD';
	public static string $PATREONS_FOLDER_PATH = '/14-ReHrOSBM297uUr29Uk0Uq9z76FlONL';
	public static string $SOLO_MINIS_FOLDER_PATH = '/1nZ4ZNE0Wr7YQb8ec5EXdtaDqEU1V4QiR';
	public static string $HUMBLE_BUNDLE_FOLDER_PATH = '/1tNHAPdOFO6lOghMWvd5e3JaNWS3fJcij';

	public static function getMinisFolderPath(): string {
		return self::$MINIS_FOLDER_PATH;
	}

	public static function getPatreonsFolderPath(): string {
		return self::getMinisFolderPath() . self::$PATREONS_FOLDER_PATH;
	}

	public static function getSoloMinisFolderPath(): string {
		return self::getMinisFolderPath() . self::$SOLO_MINIS_FOLDER_PATH;
	}

	public static function getHumbleBundleFolderPath(): string {
		return self::getMinisFolderPath() . self::$HUMBLE_BUNDLE_FOLDER_PATH;
	}

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {
		Storage::extend( 'google',
			function ( $app, $config ) {
				$client = new Google_Client();
				$client->setClientId( $config['clientId'] );
				$client->setClientSecret( $config['clientSecret'] );
				$client->refreshToken( $config['refreshToken'] );
				$service = new Google_Service_Drive( $client );
				$adapter = new GoogleDriveAdapter( $service, $config['folderId'] );

				return new Filesystem( $adapter );
			} );
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}
}

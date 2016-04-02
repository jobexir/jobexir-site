<?php

return [

	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session',

	/**
	 * Consumers
	 */
	'consumers' => [

		'Facebook' => [
			'client_id'     => '',
			'client_secret' => '',
			'scope'         => [],
		],

		'Google' => [
			'client_id' => '1094541323883-7ebd5pr8bpkabbi5ii1ve35flvonhm54.apps.googleusercontent.com',
			'client_secret' => 'Ss7vKMrxdmnQEKA-o6cIx5ep',
			'redirect' => 'http://chic-cheap.ir/contact/import/google/callback',
			'scope'         => ['userinfo_email', 'userinfo_profile', 'https://www.google.com/m8/feeds/'],
		],
	]

];
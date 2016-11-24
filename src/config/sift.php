<?php

return [
	'api_key' => function_exists('env') ? env('SIFT_API_KEY', '') : '',
	'account_id' => function_exists('env') ? env('SIFT_ACCOUNT_ID', '') : '',
	'javascript_key' => function_exists('env') ? env('SIFT_JAVASCRIPT_KEY', '') : '',
];

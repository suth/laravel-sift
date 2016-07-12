<?php

return [
	'api_key' => function_exists('env') ? env('SIFT_API_KEY', '') : '',
	'javascript_key' => function_exists('env') ? env('SIFT_JAVASCRIPT_KEY', '') : '',
];

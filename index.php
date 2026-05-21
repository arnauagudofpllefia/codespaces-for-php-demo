<?php
require_once __DIR__ . '/bootstrap.php';

$slug = trim((string) ($_GET['page'] ?? ''));

if ($slug === '') {
	$slug = 'inicio';
}

render_page($slug);

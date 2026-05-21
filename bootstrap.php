<?php
declare(strict_types=1);

function load_env_file(string $filePath): void
{
    if (!is_file($filePath) || !is_readable($filePath)) {
        return;
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) {
        return;
    }

    foreach ($lines as $line) {
        $trimmed = trim($line);
        if ($trimmed === "" || substr($trimmed, 0, 1) === "#") {
            continue;
        }

        $parts = explode("=", $trimmed, 2);
        if (count($parts) !== 2) {
            continue;
        }

        $key = trim($parts[0]);
        if ($key === "") {
            continue;
        }

        $value = trim($parts[1]);
        $length = strlen($value);
        if ($length >= 2) {
            $first = $value[0];
            $last = $value[$length - 1];
            if (($first === '"' && $last === '"') || ($first === "'" && $last === "'")) {
                $value = substr($value, 1, -1);
            }
        }

        if (getenv($key) !== false) {
            continue;
        }

        putenv($key . "=" . $value);
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
    }
}

load_env_file(__DIR__ . "/.env");

function h(string $text): string
{
    return htmlspecialchars($text, ENT_QUOTES, "UTF-8");
}

function db(): PDO
{
    static $pdo = null;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $host = getenv("DB_HOST") ?: "127.0.0.1";
    $port = (int) (getenv("DB_PORT") ?: "3306");
    $name = getenv("DB_NAME") ?: "shopify_docs";
    $user = getenv("DB_USER") ?: "root";
    $pass = getenv("DB_PASS") ?: "";

    $dsn = sprintf("mysql:host=%s;port=%d;dbname=%s;charset=utf8mb4", $host, $port, $name);

    try {
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
    } catch (PDOException $exception) {
        http_response_code(500);
        echo "No se pudo conectar a MySQL. Configura DB_HOST, DB_PORT, DB_NAME, DB_USER y DB_PASS.";
        exit;
    }

    return $pdo;
}

function get_site_settings(PDO $pdo): array
{
    $stmt = $pdo->query("SELECT setting_key, setting_value FROM site_settings");
    $settings = [];

    foreach ($stmt as $row) {
        $settings[$row["setting_key"]] = $row["setting_value"];
    }

    return $settings;
}

function get_nav_pages(PDO $pdo, string $searchQuery): array
{
    if ($searchQuery === "") {
        $stmt = $pdo->query("SELECT slug, label, file_name FROM pages ORDER BY nav_order ASC");
        return $stmt->fetchAll();
    }

    $stmt = $pdo->prepare("SELECT slug, label, file_name FROM pages WHERE label LIKE :query ORDER BY nav_order ASC");
    $stmt->execute(["query" => "%" . $searchQuery . "%"]);

    return $stmt->fetchAll();
}

function get_page_content(PDO $pdo, string $slug): ?array
{
    $stmt = $pdo->prepare("SELECT * FROM pages WHERE slug = :slug LIMIT 1");
    $stmt->execute(["slug" => $slug]);
    $row = $stmt->fetch();

    return $row === false ? null : $row;
}

function sim_get(array $data, string $path)
{
    $keys = array_values(array_filter(explode(".", $path)));
    $value = $data;

    foreach ($keys as $key) {
        if (!is_array($value) || !array_key_exists($key, $value)) {
            return "";
        }

        $value = $value[$key];
    }

    return $value;
}

function sim_filter($value, string $filter)
{
    $text = (string) $value;

    if ($filter === "upcase") {
        return mb_strtoupper($text, "UTF-8");
    }

    if ($filter === "downcase") {
        return mb_strtolower($text, "UTF-8");
    }

    if ($filter === "capitalize") {
        return mb_strtoupper(mb_substr($text, 0, 1, "UTF-8"), "UTF-8") . mb_strtolower(mb_substr($text, 1, null, "UTF-8"), "UTF-8");
    }

    if ($filter === "money") {
        $amount = is_numeric($value) ? (float) $value : 0;
        return "$" . number_format($amount / 100, 2, ".", "");
    }

    return $value;
}

function sim_render(string $template, array $data): string
{
    $output = $template;

    $output = preg_replace_callback('/\{%\s*if\s+([a-zA-Z0-9_.]+)\s*%\}([\s\S]*?)\{%\s*endif\s*%\}/', static function (array $matches) use ($data): string {
        $condition = sim_get($data, $matches[1]);
        return $condition ? $matches[2] : "";
    }, $output) ?? $output;

    $output = preg_replace_callback('/\{\{\s*([^}]+?)\s*\}\}/', static function (array $matches) use ($data): string {
        $parts = array_values(array_filter(array_map("trim", explode("|", $matches[1]))));
        $base = $parts[0] ?? "";
        $value = sim_get($data, $base);

        for ($i = 1; $i < count($parts); $i++) {
            $name = trim((string) explode(":", $parts[$i])[0]);
            $value = sim_filter($value, $name);
        }

        return (string) $value;
    }, $output) ?? $output;

    return $output;
}

function render_page(string $currentSlug): void
{
    $pdo = db();
    $year = date("Y");
    $searchQuery = trim((string) ($_GET["q"] ?? ""));

    $settings = get_site_settings($pdo);
    $pages = get_nav_pages($pdo, $searchQuery);
    $page = get_page_content($pdo, $currentSlug);

    if ($page === null) {
        http_response_code(404);
        echo "No existe contenido para el slug solicitado.";
        exit;
    }

    $heroTitle = (string) $page["hero_title"];
    $heroSubtitle = (string) $page["hero_subtitle"];
    $card1Title = (string) $page["card1_title"];
    $card1Body = (string) $page["card1_body"];
    $card2Title = (string) $page["card2_title"];
    $card2Body = (string) $page["card2_body"];
    $card3Title = (string) $page["card3_title"];
    $card3Body = (string) $page["card3_body"];
    $codeSnippet = (string) $page["code_snippet"];

    $playgroundDefaultTemplate = (string) ($settings["playground_default_template"] ?? "<h2>{{ product.title | upcase }}</h2>");
    $playgroundDefaultData = (string) ($settings["playground_default_data"] ?? "{\"product\":{\"title\":\"Demo\"}} ");
    $playgroundOutput = "";
    $playgroundStatus = "Listo";
    $playgroundStatusClass = "";
    $playgroundTemplate = (string) ($_POST["template"] ?? $playgroundDefaultTemplate);
    $playgroundData = (string) ($_POST["data"] ?? $playgroundDefaultData);

    if ($currentSlug === "playground" && $_SERVER["REQUEST_METHOD"] === "POST") {
        $decoded = json_decode($playgroundData, true);

        if (is_array($decoded)) {
            $playgroundOutput = sim_render($playgroundTemplate, $decoded);
            $playgroundStatus = "Render correcto";
            $playgroundStatusClass = "status-good";
        } else {
            $playgroundStatus = "JSON invalido";
            $playgroundStatusClass = "status-warn";
        }
    }

    require __DIR__ . "/page-template.php";
}

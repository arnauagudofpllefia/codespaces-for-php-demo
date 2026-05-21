<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo h((string) ($settings["site_title"] ?? "Shopify Dev Docs")); ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg: #070908;
      --bg-2: #0d1210;
      --panel: rgba(18, 24, 22, 0.72);
      --line: rgba(117, 131, 126, 0.24);
      --text: #e9f1ed;
      --muted: #9caea5;
      --accent: #1ed760;
      --radius: 18px;
      --radius-sm: 12px;
      --shadow: 0 14px 36px rgba(0, 0, 0, 0.35);
      --sidebar-w: 292px;
      --sidebar-collapsed: 86px;
      --transition: 280ms cubic-bezier(0.2, 0.8, 0.2, 1);
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    html, body {
      min-height: 100%;
      background: radial-gradient(circle at 22% -8%, rgba(30, 215, 96, 0.26), transparent 34%), radial-gradient(circle at 102% 4%, rgba(75, 209, 143, 0.14), transparent 32%), linear-gradient(180deg, var(--bg-2), var(--bg));
      color: var(--text);
      font-family: "Space Grotesk", "Segoe UI", sans-serif;
    }

    .toggle-input,
    .menu-input {
      position: absolute;
      width: 1px;
      height: 1px;
      margin: -1px;
      border: 0;
      padding: 0;
      clip: rect(0 0 0 0);
      overflow: hidden;
    }

    .app-shell {
      display: grid;
      grid-template-columns: var(--sidebar-w) minmax(0, 1fr);
      transition: grid-template-columns var(--transition);
      min-height: 100vh;
    }

    .toggle-input:checked ~ .app-shell { grid-template-columns: var(--sidebar-collapsed) minmax(0, 1fr); }

    .sidebar {
      position: sticky;
      top: 0;
      height: 100vh;
      padding: 20px 16px 16px;
      border-right: 1px solid var(--line);
      backdrop-filter: blur(10px);
      background: linear-gradient(180deg, rgba(9, 13, 12, 0.84), rgba(9, 12, 11, 0.58));
      display: flex;
      flex-direction: column;
      gap: 14px;
      z-index: 10;
    }

    .sidebar-top { display: flex; align-items: center; justify-content: flex-start; gap: 8px; }

    .brand {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 8px;
      border-radius: var(--radius-sm);
      background: rgba(255, 255, 255, 0.02);
      border: 1px solid rgba(255, 255, 255, 0.05);
    }

    .logo {
      width: 32px;
      height: 32px;
      border-radius: 10px;
      background: conic-gradient(from 120deg, #1ed760, #119e46, #8cf6b5, #1ed760);
      box-shadow: 0 0 0 4px rgba(30, 215, 96, 0.1), 0 0 24px rgba(30, 215, 96, 0.35);
      flex: 0 0 auto;
    }

    .brand-copy { transition: opacity var(--transition), transform var(--transition); transform-origin: left center; }
    .brand h1 { font-size: 0.94rem; font-weight: 700; }
    .brand p { font-size: 0.74rem; color: var(--muted); }

    .icon-btn {
      border: 1px solid rgba(255, 255, 255, 0.11);
      background: rgba(255, 255, 255, 0.03);
      color: var(--text);
      width: 34px;
      height: 34px;
      border-radius: 10px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: transform 220ms ease, border-color 220ms ease, background 220ms ease;
    }

    .icon-btn:hover { transform: translateY(-1px); border-color: rgba(30, 215, 96, 0.5); background: rgba(30, 215, 96, 0.08); }

    .search-form { display: grid; gap: 8px; }

    .search-wrap { position: relative; }
    .search-wrap svg { position: absolute; left: 11px; top: 50%; transform: translateY(-50%); color: #84918a; }

    .search {
      width: 100%;
      border: 1px solid rgba(255, 255, 255, 0.09);
      background: rgba(255, 255, 255, 0.03);
      color: var(--text);
      border-radius: 12px;
      padding: 9px 12px 9px 36px;
      font-family: inherit;
      font-size: 0.85rem;
    }

    .search-btn {
      border: 1px solid rgba(255, 255, 255, 0.14);
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.04);
      color: var(--text);
      padding: 7px 10px;
      font-size: 0.8rem;
      cursor: pointer;
    }

    .search-btn:hover { border-color: rgba(30, 215, 96, 0.5); background: rgba(30, 215, 96, 0.08); }

    .nav { list-style: none; overflow: auto; padding-right: 4px; display: flex; flex-direction: column; gap: 5px; }
    .nav-item { width: 100%; }

    .nav {
      scrollbar-width: thin;
      scrollbar-color: rgba(30, 215, 96, 0.55) rgba(255, 255, 255, 0.06);
    }

    .nav::-webkit-scrollbar {
      width: 10px;
    }

    .nav::-webkit-scrollbar-track {
      background: rgba(255, 255, 255, 0.06);
      border-radius: 999px;
    }

    .nav::-webkit-scrollbar-thumb {
      background: linear-gradient(180deg, rgba(30, 215, 96, 0.9), rgba(17, 158, 70, 0.9));
      border-radius: 999px;
      border: 2px solid rgba(9, 13, 12, 0.9);
    }

    .nav::-webkit-scrollbar-thumb:hover {
      background: linear-gradient(180deg, rgba(72, 236, 126, 0.95), rgba(22, 182, 81, 0.95));
    }

    .nav-link {
      width: 100%;
      text-align: left;
      text-decoration: none;
      border: 1px solid transparent;
      border-radius: 12px;
      color: #cfdbd5;
      background: transparent;
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 9px 10px;
      transition: background 220ms ease, border-color 220ms ease, color 220ms ease, transform 220ms ease;
      font-size: 0.86rem;
    }

    .nav-link:hover { background: rgba(255, 255, 255, 0.04); border-color: rgba(255, 255, 255, 0.08); transform: translateX(2px); }

    .nav-link.active {
      color: #f2fff6;
      border-color: rgba(30, 215, 96, 0.45);
      background: linear-gradient(100deg, rgba(30, 215, 96, 0.24), rgba(30, 215, 96, 0.06));
      box-shadow: inset 0 0 0 1px rgba(30, 215, 96, 0.14), 0 0 20px rgba(30, 215, 96, 0.16);
    }

    .sidebar-foot {
      margin-top: auto;
      border: 1px solid rgba(255, 255, 255, 0.09);
      border-radius: 12px;
      background: rgba(255, 255, 255, 0.02);
      padding: 10px;
      font-size: 0.76rem;
      color: #a9b8b1;
      transition: opacity var(--transition), transform var(--transition);
    }

    .toggle-input:checked ~ .app-shell .brand-copy,
    .toggle-input:checked ~ .app-shell .search-form,
    .toggle-input:checked ~ .app-shell .nav-label,
    .toggle-input:checked ~ .app-shell .sidebar-foot {
      opacity: 0;
      pointer-events: none;
      transform: scale(0.96);
      width: 0;
      height: 0;
      overflow: hidden;
    }

    .main { min-height: 100vh; padding: 28px 34px 38px; animation: fade-in 380ms ease; }

    .hero {
      border: 1px solid var(--line);
      background: linear-gradient(140deg, rgba(17, 26, 22, 0.88), rgba(14, 17, 16, 0.84));
      border-radius: 22px;
      padding: 26px;
      box-shadow: 0 14px 36px rgba(0, 0, 0, 0.35);
      position: relative;
      overflow: hidden;
      margin-bottom: 20px;
    }

    .hero::before {
      content: "";
      position: absolute;
      inset: -40% auto auto -20%;
      width: 360px;
      height: 360px;
      background: radial-gradient(circle, rgba(30, 215, 96, 0.26), transparent 62%);
      filter: blur(12px);
    }

    .badge { display: inline-flex; border-radius: 999px; border: 1px solid rgba(30, 215, 96, 0.43); padding: 6px 12px; font-size: 0.75rem; background: rgba(30, 215, 96, 0.1); margin-bottom: 12px; }
    .hero h2 { font-size: clamp(1.35rem, 2vw + 0.8rem, 2.2rem); line-height: 1.2; margin-bottom: 12px; max-width: 760px; }
    .hero p { color: #b7c8c1; max-width: 860px; font-size: 0.96rem; line-height: 1.65; }

    .section-grid { display: grid; gap: 14px; grid-template-columns: repeat(12, minmax(0, 1fr)); }
    .card {
      grid-column: span 4;
      border: 1px solid var(--line);
      border-radius: 18px;
      background: rgba(18, 24, 22, 0.72);
      backdrop-filter: blur(8px);
      box-shadow: 0 14px 36px rgba(0, 0, 0, 0.35);
      padding: 18px;
    }

    .card-wide { grid-column: span 12; }
    .card h3 { font-size: 1rem; margin-bottom: 8px; }
    .card p { color: #b2c2bc; line-height: 1.6; font-size: 0.9rem; }

    pre.code {
      margin-top: 12px;
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 14px;
      overflow: auto;
      background: #0a0f0d;
      padding: 14px;
      color: #dff8e8;
      line-height: 1.55;
      font-family: "IBM Plex Mono", "Consolas", monospace;
      font-size: 0.82rem;
      white-space: pre-wrap;
    }

    .playground { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-top: 12px; }
    textarea, .output {
      width: 100%;
      min-height: 220px;
      border-radius: 12px;
      border: 1px solid rgba(255, 255, 255, 0.1);
      background: #0a0f0d;
      color: #dbede5;
      padding: 12px;
      font-family: "IBM Plex Mono", "Consolas", monospace;
      font-size: 0.82rem;
      line-height: 1.5;
      resize: vertical;
    }

    .output { min-height: 120px; white-space: pre-wrap; }
    .row { display: flex; align-items: center; justify-content: space-between; gap: 10px; margin-top: 12px; }
    .btn {
      border: 1px solid rgba(30, 215, 96, 0.52);
      color: #ebfff3;
      background: linear-gradient(180deg, rgba(30, 215, 96, 0.31), rgba(24, 131, 63, 0.38));
      border-radius: 10px;
      padding: 8px 13px;
      font-size: 0.84rem;
      cursor: pointer;
    }

    .status-good { color: #c9ffd9; }
    .status-warn { color: #ffb4b4; }

    .footer {
      margin-top: 22px;
      border-top: 1px solid var(--line);
      padding-top: 14px;
      color: #8b9a94;
      font-size: 0.8rem;
      display: flex;
      justify-content: space-between;
      gap: 10px;
      flex-wrap: wrap;
    }

    .mobile-nav {
      display: none;
      align-items: center;
      justify-content: space-between;
      border: 1px solid var(--line);
      border-radius: 12px;
      background: rgba(13, 18, 16, 0.84);
      padding: 10px;
      margin-bottom: 12px;
    }

    .mobile-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.45);
      z-index: 8;
    }

    @media (max-width: 1100px) {
      .card { grid-column: span 12; }
      .playground { grid-template-columns: 1fr; }
    }

    @media (max-width: 860px) {
      .app-shell,
      .toggle-input:checked ~ .app-shell {
        grid-template-columns: 1fr;
      }

      .sidebar {
        position: fixed;
        left: 10px;
        top: 10px;
        height: calc(100vh - 20px);
        width: min(84vw, 320px);
        border: 1px solid var(--line);
        border-radius: 16px;
        transform: translateX(-120%);
        transition: transform var(--transition);
        z-index: 9;
      }

      .menu-input:checked ~ .app-shell .sidebar { transform: translateX(0); }
      .menu-input:checked ~ .mobile-overlay { display: block; }
      .main { padding: 18px 16px 26px; }
      .mobile-nav { display: flex; }

      .toggle-input:checked ~ .app-shell .brand-copy,
      .toggle-input:checked ~ .app-shell .search-form,
      .toggle-input:checked ~ .app-shell .nav-label,
      .toggle-input:checked ~ .app-shell .sidebar-foot {
        opacity: 1;
        pointer-events: auto;
        transform: none;
        width: auto;
        height: auto;
        overflow: visible;
      }
    }

    @keyframes fade-in {
      from { opacity: 0.7; }
      to { opacity: 1; }
    }
  </style>
</head>
<body>
  <input class="toggle-input" type="checkbox" id="collapseToggle">
  <input class="menu-input" type="checkbox" id="menuToggle">

  <div class="app-shell">
    <aside class="sidebar" aria-label="Navegacion principal">
      <div class="sidebar-top">
        <div class="brand">
          <div class="logo" aria-hidden="true"></div>
          <div class="brand-copy">
            <h1><?php echo h((string) ($settings["brand_title"] ?? "Shopify Dev Docs")); ?></h1>
            <p><?php echo h((string) ($settings["brand_subtitle"] ?? "Shopify + Liquid en castellano")); ?></p>
          </div>
        </div>
      </div>

      <form class="search-form" method="get" action="">
        <div class="search-wrap">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="m21 21-4.35-4.35"></path>
          </svg>
          <input class="search" type="search" name="q" value="<?php echo h($searchQuery); ?>" placeholder="<?php echo h((string) ($settings["search_placeholder"] ?? "Buscar seccion...")); ?>" autocomplete="off">
        </div>
        <button type="submit" class="search-btn"><?php echo h((string) ($settings["search_button_label"] ?? "Buscar")); ?></button>
      </form>

      <ul class="nav" role="list">
        <?php if (empty($pages)): ?>
          <li class="nav-item"><span class="nav-link"><?php echo h((string) ($settings["no_results_label"] ?? "Sin resultados")); ?></span></li>
        <?php else: ?>
          <?php foreach ($pages as $pageItem): ?>
            <?php $active = ($pageItem["slug"] === $currentSlug) ? "active" : ""; ?>
            <li class="nav-item">
              <a class="nav-link <?php echo $active; ?>" href="<?php echo h('/?page=' . (string) $pageItem["slug"]); ?>">
                <span class="nav-label"><?php echo h((string) $pageItem["label"]); ?></span>
              </a>
            </li>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>

      <div class="sidebar-foot">
        <?php echo h((string) ($settings["sidebar_foot"] ?? "Documentacion visual y profesional del ecosistema Shopify.")); ?>
      </div>
    </aside>

    <main class="main">
      <div class="mobile-nav">
        <strong><?php echo h($heroTitle); ?></strong>
        <label class="icon-btn" for="menuToggle" aria-label="Abrir menu">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path d="M3 6h18"></path>
            <path d="M3 12h18"></path>
            <path d="M3 18h18"></path>
          </svg>
        </label>
      </div>

      <article class="hero">
        <span class="badge"><?php echo h((string) ($settings["hero_badge_text"] ?? "Shopify Dev Docs")); ?></span>
        <h2><?php echo h($heroTitle); ?></h2>
        <p><?php echo h($heroSubtitle); ?></p>
      </article>

      <section class="section-grid">
        <article class="card">
          <h3><?php echo h($card1Title); ?></h3>
          <p><?php echo h($card1Body); ?></p>
        </article>

        <article class="card">
          <h3><?php echo h($card2Title); ?></h3>
          <p><?php echo h($card2Body); ?></p>
          <?php if ($codeSnippet !== ""): ?>
            <pre class="code"><?php echo h($codeSnippet); ?></pre>
          <?php endif; ?>
        </article>

        <article class="card">
          <h3><?php echo h($card3Title); ?></h3>
          <p><?php echo h($card3Body); ?></p>
        </article>
      </section>

      <?php if ($currentSlug === "playground"): ?>
        <section class="section-grid" style="margin-top:14px;">
          <article class="card card-wide">
            <h3><?php echo h((string) ($settings["playground_title"] ?? "Simulador server-side")); ?></h3>
            <p><?php echo h((string) ($settings["playground_description"] ?? "Procesa template y JSON en PHP, sin JavaScript.")); ?></p>
            <form method="post" action="playground.php">
              <div class="playground">
                <div>
                  <label for="templateInput"><?php echo h((string) ($settings["playground_template_label"] ?? "Template")); ?></label>
                  <textarea id="templateInput" name="template"><?php echo h($playgroundTemplate); ?></textarea>
                </div>
                <div>
                  <label for="dataInput"><?php echo h((string) ($settings["playground_data_label"] ?? "Datos JSON")); ?></label>
                  <textarea id="dataInput" name="data"><?php echo h($playgroundData); ?></textarea>
                </div>
              </div>
              <div class="row">
                <button class="btn" type="submit"><?php echo h((string) ($settings["playground_button_label"] ?? "Ejecutar simulacion")); ?></button>
                <span class="<?php echo h($playgroundStatusClass); ?>"><?php echo h($playgroundStatus); ?></span>
              </div>
            </form>
            <div class="row" style="display:block;">
              <div style="margin-bottom:8px; color:#a8b9b2;"><?php echo h((string) ($settings["playground_output_label"] ?? "Salida")); ?></div>
              <div class="output"><?php echo h($playgroundOutput); ?></div>
            </div>
          </article>
        </section>
      <?php endif; ?>

      <footer class="footer">
        <span><?php echo h((string) ($settings["footer_left"] ?? "Shopify Dev Docs")); ?></span>
        <span><?php echo h((string) ($settings["footer_right_prefix"] ?? "Contenido en MySQL")); ?> · <?php echo h((string) $year); ?></span>
      </footer>
    </main>
  </div>

  <label class="mobile-overlay" for="menuToggle" aria-label="Cerrar menu"></label>
</body>
</html>

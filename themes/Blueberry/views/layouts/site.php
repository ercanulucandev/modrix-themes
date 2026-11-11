<?php
// Blueberry tema: site layoutu. Mor üst kısım ve alt kısım, açık lavanta gövde, beyaz yuvarlak kartlar.
// Ana sayfa tam genişlik (bölümler kendi zeminini çizer), diğer sayfalar ortalanmış.
$siteName = Setting::get('site_name', Config::get('app.name'));
$logo     = Setting::url('logo');
$berry     = Theme::color('berry_color', '#3b2f9e');
$accent   = Theme::color('accent_color', '#c9b8ff');
$fonts    = [
    'outfit'  => ['Outfit:wght@300;400;500;600;700', '"Outfit"'],
    'jakarta' => ['Plus+Jakarta+Sans:wght@400;500;600;700', '"Plus Jakarta Sans"'],
    'inter'   => ['Inter:wght@400;500;600;700', '"Inter"'],
    'lexend'  => ['Lexend:wght@300;400;500;600;700', '"Lexend"'],
];
[$fontFamily, $fontName] = $fonts[Theme::get('font')] ?? $fonts['outfit'];

$isHome  = trim(Request::path(), '/') === '';
$phone   = Setting::get('contact_phone');
$email   = Setting::get('contact_email');
$address = Setting::get('contact_address');
$social  = array_filter([
    'instagram' => Setting::get('social_instagram'),
    'x'         => Setting::get('social_x'),
    'facebook'  => Setting::get('social_facebook'),
    'linkedin'  => Setting::get('social_linkedin'),
    'youtube'   => Setting::get('social_youtube'),
]);
$socialIcons = [
    'instagram' => '<rect width="20" height="20" x="2" y="2" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>',
    'x'         => '<path d="M4 4l11.7 16H20L8.3 4z"/><path d="M4 20l6.8-6.8M13.2 10.8 20 4"/>',
    'facebook'  => '<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>',
    'linkedin'  => '<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/>',
    'youtube'   => '<path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"/><path d="m10 15 5-3-5-3z"/>',
];
// #çapa bağlantıları ana sayfa dışında ana sayfaya gitsin
$link = fn(string $url) => str_starts_with($url, '#') && !$isHome ? Request::url('/') . $url : Menu::href($url);
$button = function (string $textKey, string $urlKey, string $class) use ($link) {
    $text = Theme::get($textKey);
    $url = (string) Theme::get($urlKey);
    return $text && Menu::validUrl($url) ? '<a ' . Theme::editable('header', $textKey) . ' href="' . View::e($link($url)) . '" class="' . $class . '">' . View::e($text) . '</a>' : '';
};
?>
<!doctype html>
<html lang="<?= Lang::current() ?>" dir="<?= Lang::rtl() ? 'rtl' : 'ltr' ?>" class="scroll-smooth">
<head>
<?= Theme::head($title ?? null, $metaDescription ?? null, $metaImage ?? null) ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=<?= $fontFamily ?>&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4.1.13"></script>
  <style type="text/tailwindcss">
    @theme {
      --font-sans: <?= $fontName ?>, ui-sans-serif, system-ui, sans-serif;
      --color-background: #fbfaff;
      --color-foreground: #17123a;
      --color-card: #ffffff;
      --color-muted: #f4f2fb;
      --color-muted-foreground: #6b6688;
      --color-accent: #efecfb;
      --color-accent-foreground: #17123a;
      --color-border: #e6e2f3;
      --color-input: #ddd8ef;
      --color-primary: <?= $berry ?>;
      --color-primary-foreground: <?= Theme::contrast($berry) ?>;
      --color-berry: <?= $berry ?>;
      --color-berry-foreground: <?= Theme::contrast($berry) ?>;
      --color-highlight: <?= $accent ?>;
      --color-destructive: #dc2626;
      --color-ring: <?= $berry ?>;
      --radius-sm: 6px;
      --radius-md: 8px;
      --radius-lg: 10px;
      --radius-xl: 14px;
    }
  </style>
<?= View::render('partials/ui-styles') ?>
  <style type="text/tailwindcss">
    @layer components {
      .wrap { @apply mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8; }
      /* Ana rengin biraz açığı (giriş ve rakamlar bandı) */
      .bg-berry-soft { background-color: color-mix(in oklab, var(--color-berry) 88%, white); }
      .section-title { @apply text-2xl font-semibold tracking-tight sm:text-3xl; }
      .section-text { @apply mt-2 text-muted-foreground; }
      .btn-dark-outline { @apply border border-white/15 bg-white/5 text-white hover:bg-white/10; }
      .btn-light { @apply bg-white text-berry shadow-sm hover:bg-white/90; }
      .tile { @apply rounded-xl border bg-card shadow-[0_1px_2px_rgb(23_18_58/0.05)]; }
      .icon-box { @apply flex size-11 shrink-0 items-center justify-center rounded-lg border bg-accent text-berry; }
    }
  </style>
</head>
<body class="flex min-h-screen flex-col">
  <header <?= Theme::editable('header') ?> class="sticky top-0 z-40 bg-berry text-berry-foreground shadow-[0_1px_0_rgb(255_255_255/0.06)]">
    <div class="wrap flex h-16 items-center gap-6">
      <a <?= Theme::editable('identity', 'logo') ?> href="<?= Request::url('/') ?>" class="flex shrink-0 items-center gap-2">
        <?php if ($logo): ?>
          <img src="<?= View::e($logo) ?>" alt="<?= View::e($siteName) ?>" class="h-8 w-auto">
        <?php else: ?>
          <span class="text-xl font-semibold tracking-tight"><?= View::e($siteName) ?></span>
        <?php endif ?>
        <?php if ($badge = Theme::get('badge')): ?>
          <span <?= Theme::editable('header', 'badge') ?> class="rounded bg-highlight/25 px-1.5 py-0.5 text-[10px] font-semibold leading-none text-highlight"><?= View::e($badge) ?></span>
        <?php endif ?>
      </a>

      <input type="checkbox" id="site-nav" class="peer hidden">
      <label for="site-nav" class="btn ml-auto size-9 p-0 text-white hover:bg-white/10 md:hidden" aria-label="Menü">
        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
      </label>
      <div class="absolute inset-x-0 top-16 hidden max-h-[calc(100vh-4rem)] flex-col gap-4 overflow-y-auto border-t border-white/10 bg-berry p-4 peer-checked:flex
                  md:static md:flex md:max-h-none md:flex-1 md:flex-row md:items-center md:justify-between md:overflow-visible md:border-0 md:p-0">
        <nav class="flex flex-col gap-1 md:flex-row md:items-center"><?= View::render('partials/nav', ['items' => Menu::location('header')]) ?></nav>
        <div class="flex flex-col gap-2 md:flex-row md:items-center">
          <?= implode('', Hook::filter('site.header_actions', [])) ?>
          <?php if (Theme::bool('header_search')): ?>
            <a href="<?= Router::url('search') ?>" class="btn btn-sm h-9 justify-start gap-2 text-white/85 hover:bg-white/10 hover:text-white md:w-9 md:justify-center md:p-0" aria-label="Ara" title="Ara"><svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg><span class="md:sr-only">Ara</span></a>
          <?php endif ?>
          <?= $button('header_btn1', 'header_btn1_url', 'btn btn-sm h-9 text-white/85 hover:bg-white/10 hover:text-white') ?>
          <?= $button('header_btn2', 'header_btn2_url', 'btn btn-sm btn-light h-9 px-4') ?>
        </div>
      </div>
    </div>
  </header>

  <main class="flex-1 <?= $isHome ? '' : 'wrap py-12 lg:py-16' ?>">
    <?php if ($isHome): ?><div class="wrap empty:hidden"><?= View::render('partials/flash') ?></div><?php else: ?><?= View::render('partials/flash') ?><?php endif ?>
    <?= $content ?>
  </main>

  <footer <?= Theme::editable('footer') ?> class="bg-berry text-berry-foreground/75">
    <div class="wrap grid gap-10 py-14 sm:grid-cols-2 lg:grid-cols-12">
      <div class="lg:col-span-4">
        <p class="text-xl font-semibold tracking-tight text-berry-foreground"><?= View::e($siteName) ?></p>
        <?php if ($tagline = Theme::get('footer_tagline') ?: Setting::get('site_tagline')): ?>
          <p <?= Theme::editable('footer', 'footer_tagline') ?> class="mt-1 text-sm text-highlight"><?= View::e($tagline) ?></p>
        <?php endif ?>
        <?php if ($about = Theme::get('footer_about') ?: Setting::get('site_description')): ?>
          <p <?= Theme::editable('footer', 'footer_about') ?> class="mt-4 max-w-sm text-sm leading-6"><?= View::e($about) ?></p>
        <?php endif ?>
        <?php if ($social): ?>
          <div class="mt-5 flex gap-2">
            <?php foreach ($social as $name => $url): ?>
              <a href="<?= View::e($url) ?>" target="_blank" rel="noopener" aria-label="<?= ucfirst($name) ?>"
                 class="flex size-9 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-white/20">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?= $socialIcons[$name] ?></svg>
              </a>
            <?php endforeach ?>
          </div>
        <?php endif ?>
      </div>

      <?php foreach (['footer' => ['grid', 'Menü'], 'footer_legal' => ['doc', 'Sözleşmeler']] as $location => [$icon, $heading]): if (!($items = Menu::location($location))) continue; ?>
        <nav class="text-sm lg:col-span-2">
          <p class="flex items-center gap-2 font-semibold text-berry-foreground"><?= View::render('partials/icon', ['name' => $icon, 'class' => 'size-4 text-highlight']) ?><?= $heading ?></p>
          <ul class="mt-4 space-y-2.5">
            <?php foreach ($items as $item): ?>
              <li><a href="<?= View::e($link($item['url'])) ?>" <?= $item['new_tab'] ? 'target="_blank" rel="noopener"' : '' ?> class="transition hover:text-berry-foreground"><?= View::e($item['label']) ?></a></li>
            <?php endforeach ?>
          </ul>
        </nav>
      <?php endforeach ?>

      <?php if ($phone || $email || $address): ?>
        <div class="text-sm lg:col-span-3 lg:col-start-10">
          <p class="flex items-center gap-2 font-semibold text-berry-foreground"><?= View::render('partials/icon', ['name' => 'message', 'class' => 'size-4 text-highlight']) ?>İletişim</p>
          <ul class="mt-4 space-y-2.5">
            <?php if ($phone): ?><li><a href="tel:<?= View::e(preg_replace('/[^0-9+]/', '', $phone)) ?>" class="transition hover:text-berry-foreground"><?= View::e($phone) ?></a></li><?php endif ?>
            <?php if ($email): ?><li><a href="mailto:<?= View::e($email) ?>" class="break-all transition hover:text-berry-foreground"><?= View::e($email) ?></a></li><?php endif ?>
            <?php if ($address): ?><li><?= nl2br(View::e($address)) ?></li><?php endif ?>
          </ul>
        </div>
      <?php endif ?>
    </div>
    <div class="bg-black/15">
      <p class="wrap py-4 text-center text-xs"><?= View::e(Setting::get('footer_text') ?: '© ' . date('Y') . ' ' . $siteName . ' · Tüm hakları saklıdır.') ?></p>
    </div>
  </footer>

<?= Theme::footer() ?>
</body>
</html>

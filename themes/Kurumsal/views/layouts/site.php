<?php
// Kurumsal tema: site layout'u. Ana sayfa tam genişlik (bölümler kendi kabını çizer), diğer sayfalar ortalanmış.
// Menü (alt menülü) Default temanın partials/nav.php'sinden gelir; bu tema ezmiyor.
$siteName = Setting::get('site_name', Config::get('app.name'));
$logo     = Setting::url('logo');
$primary  = Theme::color('primary_color', '#1d4ed8');
$dark     = Theme::color('dark_color', '#0f172a');
$radius   = ['none' => 0, 'small' => 4, 'medium' => 8, 'large' => 14][Theme::get('radius')] ?? 8;
$fonts    = [
    'inter'   => ['Inter:wght@400;500;600;700;800', '"Inter", ui-sans-serif, system-ui, sans-serif'],
    'manrope' => ['Manrope:wght@400;500;600;700;800', '"Manrope", ui-sans-serif, system-ui, sans-serif'],
    'dmsans'  => ['DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,600;9..40,700;9..40,800', '"DM Sans", ui-sans-serif, system-ui, sans-serif'],
    'lora'    => ['Lora:wght@400;500;600;700', '"Lora", ui-serif, Georgia, serif'],
];
[$fontFamily, $fontStack] = $fonts[Theme::get('font')] ?? $fonts['manrope'];

$isHome   = trim(Request::path(), '/') === '';
$phone    = Setting::get('contact_phone');
$email    = Setting::get('contact_email');
$address  = Setting::get('contact_address');
$ctaText  = Theme::get('header_cta_text');
$ctaUrl   = (string) Theme::get('header_cta_url');
$social   = array_filter([
    'Instagram' => Setting::get('social_instagram'),
    'X'         => Setting::get('social_x'),
    'Facebook'  => Setting::get('social_facebook'),
    'LinkedIn'  => Setting::get('social_linkedin'),
    'YouTube'   => Setting::get('social_youtube'),
]);
// #iletisim gibi çapalar ana sayfa dışında ana sayfaya gitsin
$anchor = fn(string $url) => str_starts_with($url, '#') && !$isHome ? Request::url('/') . $url : Menu::href($url);
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
      --font-sans: <?= $fontStack ?>;
      --color-background: #ffffff;
      --color-foreground: #0f172a;
      --color-card: #ffffff;
      --color-muted: #f1f5f9;
      --color-muted-foreground: #64748b;
      --color-accent: #f1f5f9;
      --color-accent-foreground: #0f172a;
      --color-border: #e2e8f0;
      --color-input: #e2e8f0;
      --color-primary: <?= $primary ?>;
      --color-primary-foreground: <?= Theme::contrast($primary) ?>;
      --color-dark: <?= $dark ?>;
      --color-dark-foreground: <?= Theme::contrast($dark) ?>;
      --color-destructive: #dc2626;
      --color-ring: <?= $primary ?>;
      --radius-sm: <?= max(0, $radius - 4) ?>px;
      --radius-md: <?= $radius ?>px;
      --radius-lg: <?= $radius ? $radius + 4 : 0 ?>px;
      --radius-xl: <?= $radius ? $radius + 8 : 0 ?>px;
    }
  </style>
<?= View::render('partials/ui-styles') ?>
  <style type="text/tailwindcss">
    @layer components {
      .wrap { @apply mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8; }
      .section-badge { @apply inline-flex items-center gap-2 rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-primary; }
    }
  </style>
</head>
<body class="flex min-h-screen flex-col">
  <?php if (Theme::bool('topbar_enabled') && ($phone || $email || Theme::get('topbar_text'))): ?>
    <div <?= Theme::editable('header') ?> class="hidden bg-dark text-dark-foreground/80 md:block">
      <div class="wrap flex h-10 items-center justify-between gap-6 text-xs">
        <div class="flex items-center gap-6">
          <?php if ($phone): ?><a href="tel:<?= View::e(preg_replace('/[^0-9+]/', '', $phone)) ?>" class="flex items-center gap-2 hover:text-dark-foreground"><?= View::render('partials/icon', ['name' => 'phone', 'class' => 'size-3.5']) ?><?= View::e($phone) ?></a><?php endif ?>
          <?php if ($email): ?><a href="mailto:<?= View::e($email) ?>" class="flex items-center gap-2 hover:text-dark-foreground"><?= View::render('partials/icon', ['name' => 'mail', 'class' => 'size-3.5']) ?><?= View::e($email) ?></a><?php endif ?>
        </div>
        <div class="flex items-center gap-5">
          <?php if ($text = Theme::get('topbar_text')): ?><span <?= Theme::editable('header', 'topbar_text') ?> class="flex items-center gap-2"><?= View::render('partials/icon', ['name' => 'clock', 'class' => 'size-3.5']) ?><?= View::e($text) ?></span><?php endif ?>
          <?php foreach ($social as $name => $url): ?>
            <a href="<?= View::e($url) ?>" target="_blank" rel="noopener" class="hover:text-dark-foreground"><?= $name ?></a>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  <?php endif ?>

  <header <?= Theme::editable('header') ?> class="sticky top-0 z-40 border-b bg-background/95 backdrop-blur supports-[backdrop-filter]:bg-background/85">
    <div class="wrap flex h-18 items-center justify-between gap-8">
      <a <?= Theme::editable('identity', 'logo') ?> href="<?= Request::url('/') ?>" class="flex shrink-0 items-center gap-2.5 text-lg font-bold tracking-tight">
        <?php if ($logo): ?>
          <img src="<?= View::e($logo) ?>" alt="<?= View::e($siteName) ?>" class="h-9 w-auto">
        <?php else: ?>
          <span class="flex size-9 items-center justify-center rounded-md bg-primary text-sm font-extrabold text-primary-foreground"><?= View::e(mb_strtoupper(mb_substr($siteName, 0, 1))) ?></span>
          <span><?= View::e($siteName) ?></span>
        <?php endif ?>
      </a>

      <input type="checkbox" id="site-nav" class="peer hidden">
      <label for="site-nav" class="btn btn-ghost btn-sm md:hidden" aria-label="Menü">
        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
      </label>
      <?php // Menü öğeleri Default temanın partials/nav.php'sinden (md kırılımında masaüstü görünümü) ?>
      <nav class="absolute inset-x-0 top-full hidden max-h-[calc(100vh-4.5rem)] flex-col gap-1 overflow-y-auto border-b bg-background p-4 font-medium peer-checked:flex
                  md:static md:flex md:max-h-none md:flex-row md:items-center md:gap-7 md:overflow-visible md:border-0 md:bg-transparent md:p-0">
        <?= View::render('partials/nav', ['items' => Menu::location('header')]) ?>
        <?= implode('', Hook::filter('site.header_actions', [])) ?>
        <?php if (Theme::bool('header_search')): ?>
          <a href="<?= Router::url('search') ?>" class="flex items-center gap-2 text-muted-foreground hover:text-primary" aria-label="Ara" title="Ara"><svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg><span class="md:sr-only">Ara</span></a>
        <?php endif ?>
        <?php if ($ctaText && Menu::validUrl($ctaUrl)): ?>
          <a <?= Theme::editable('header', 'header_cta_text') ?> href="<?= View::e($anchor($ctaUrl)) ?>" class="btn btn-primary mt-2 h-10 px-5 md:mt-0"><?= View::e($ctaText) ?></a>
        <?php endif ?>
      </nav>
    </div>
  </header>

  <main class="flex-1 <?= $isHome ? '' : 'wrap py-12 lg:py-16' ?>">
    <?php if ($isHome): ?><div class="wrap"><?= View::render('partials/flash') ?></div><?php else: ?><?= View::render('partials/flash') ?><?php endif ?>
    <?= $content ?>
  </main>

  <footer <?= Theme::editable('footer') ?> class="bg-dark text-dark-foreground/70">
    <div class="wrap grid gap-10 py-16 sm:grid-cols-2 lg:grid-cols-4">
      <div>
        <p class="text-lg font-bold text-dark-foreground"><?= View::e($siteName) ?></p>
        <?php if ($about = Theme::get('footer_about') ?: Setting::get('site_description')): ?>
          <p <?= Theme::editable('footer', 'footer_about') ?> class="mt-4 text-sm leading-6"><?= View::e($about) ?></p>
        <?php endif ?>
        <?php if ($social): ?>
          <div class="mt-5 flex flex-wrap gap-x-4 gap-y-2 text-sm">
            <?php foreach ($social as $name => $url): ?>
              <a href="<?= View::e($url) ?>" target="_blank" rel="noopener" class="hover:text-dark-foreground"><?= $name ?></a>
            <?php endforeach ?>
          </div>
        <?php endif ?>
      </div>

      <?php foreach (Theme::manifest(Theme::active())['menus'] as $location => $label): if ($location === 'header' || !($items = Menu::location($location))) continue; ?>
        <nav class="text-sm">
          <p class="font-semibold text-dark-foreground"><?= View::e(preg_replace('/^Alt menü \((.+)\)$/u', '$1', $label)) ?></p>
          <ul class="mt-4 space-y-2.5">
            <?php foreach ($items as $item): ?>
              <li><a href="<?= View::e($anchor($item['url'])) ?>" <?= $item['new_tab'] ? 'target="_blank" rel="noopener"' : '' ?> class="hover:text-dark-foreground"><?= View::e($item['label']) ?></a></li>
            <?php endforeach ?>
          </ul>
        </nav>
      <?php endforeach ?>

      <?php if ($phone || $email || $address): ?>
        <div class="space-y-3 text-sm">
          <p class="font-semibold text-dark-foreground">İletişim</p>
          <?php if ($phone): ?><a href="tel:<?= View::e(preg_replace('/[^0-9+]/', '', $phone)) ?>" class="flex items-center gap-2.5 hover:text-dark-foreground"><?= View::render('partials/icon', ['name' => 'phone', 'class' => 'size-4 shrink-0']) ?><?= View::e($phone) ?></a><?php endif ?>
          <?php if ($email): ?><a href="mailto:<?= View::e($email) ?>" class="flex items-center gap-2.5 hover:text-dark-foreground"><?= View::render('partials/icon', ['name' => 'mail', 'class' => 'size-4 shrink-0']) ?><?= View::e($email) ?></a><?php endif ?>
          <?php if ($address): ?><p class="flex gap-2.5"><?= View::render('partials/icon', ['name' => 'pin', 'class' => 'mt-0.5 size-4 shrink-0']) ?><span><?= nl2br(View::e($address)) ?></span></p><?php endif ?>
        </div>
      <?php endif ?>
    </div>
    <div class="border-t border-white/10">
      <p class="wrap py-6 text-xs"><?= View::e(Setting::get('footer_text') ?: '© ' . date('Y') . ' ' . $siteName . '. Tüm hakları saklıdır.') ?></p>
    </div>
  </footer>

<?= Theme::footer() ?>
</body>
</html>

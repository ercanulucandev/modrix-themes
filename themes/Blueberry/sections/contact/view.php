<?php
// Blueberry: iletişim kartları
$hl  = fn(?string $t, string $c = 'text-highlight') => preg_replace('/\*(.+?)\*/u', '<span class="' . $c . '">$1</span>', View::e((string) $t));
$btn = fn(string $text, string $link, string $class, ?string $icon = null, string $attr = '') => $text !== '' && $link !== ''
    ? '<a ' . $attr . ' href="' . View::e(Menu::href($link)) . '" class="' . $class . '">' . ($icon ? Icon::svg($icon, 'size-4') : '') . View::e($text) . '</a>' : '';
$contact = array_filter([
    ['phone', 'Telefon', Setting::get('contact_phone'), fn($v) => 'tel:' . preg_replace('/[^0-9+]/', '', $v)],
    ['mail', 'E-posta', Setting::get('contact_email'), fn($v) => 'mailto:' . $v],
    ['pin', 'Adres', Setting::get('contact_address'), null],
], fn($c) => $c[2]);
?>
<section <?= $s['anchor'] !== '' ? 'id="' . View::e($s['anchor']) . '"' : '' ?> class="scroll-mt-20 py-16 lg:py-20">
  <div class="wrap">
    <div>
        <h2 class="section-title" <?= $edit('title') ?>><?= $hl($s['title'], 'text-berry') ?></h2>
        <?php if ($s['text'] !== ''): ?><p class="section-text" <?= $edit('text') ?>><?= View::e($s['text']) ?></p><?php endif ?>
      </div>
    <?php if ($contact): ?>
      <div class="mt-8 grid gap-4 md:grid-cols-3">
        <?php foreach ($contact as [$icon, $label, $value, $href]): ?>
          <<?= $href ? 'a href="' . View::e($href($value)) . '"' : 'div' ?> class="tile flex items-center gap-4 p-5 transition <?= $href ? 'hover:border-berry/25 hover:shadow-lg hover:shadow-berry/5' : '' ?>">
            <span class="icon-box"><?= Icon::svg($icon) ?></span>
            <span class="min-w-0"><span class="block text-xs text-muted-foreground"><?= $label ?></span><span class="mt-0.5 block break-words font-medium"><?= nl2br(View::e($value)) ?></span></span>
          </<?= $href ? 'a' : 'div' ?>>
        <?php endforeach ?>
      </div>
    <?php else: ?>
      <p class="mt-6 text-sm text-muted-foreground">İletişim bilgileri Ayarlar &gt; İletişim'den eklenir.</p>
    <?php endif ?>
  </div>
</section>

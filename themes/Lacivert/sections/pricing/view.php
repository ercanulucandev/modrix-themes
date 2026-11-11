<?php
// Lacivert: fiyat paketleri
$hl  = fn(?string $t, string $c = 'text-highlight') => preg_replace('/\*(.+?)\*/u', '<span class="' . $c . '">$1</span>', View::e((string) $t));
$btn = fn(string $text, string $link, string $class, ?string $icon = null, string $attr = '') => $text !== '' && $link !== ''
    ? '<a ' . $attr . ' href="' . View::e(Menu::href($link)) . '" class="' . $class . '">' . ($icon ? Icon::svg($icon, 'size-4') : '') . View::e($text) . '</a>' : '';
$cols = ['', 'md:grid-cols-1 max-w-md', 'md:grid-cols-2', 'md:grid-cols-3', 'md:grid-cols-2 lg:grid-cols-4', 'md:grid-cols-3', 'md:grid-cols-3'][count($s['plans'])] ?? 'md:grid-cols-3';
?>
<section <?= $s['anchor'] !== '' ? 'id="' . View::e($s['anchor']) . '"' : '' ?> class="scroll-mt-20 bg-muted py-16 lg:py-24">
  <div class="wrap">
    <div>
        <h2 class="section-title" <?= $edit('title') ?>><?= $hl($s['title'], 'text-navy') ?></h2>
        <?php if ($s['text'] !== ''): ?><p class="section-text" <?= $edit('text') ?>><?= View::e($s['text']) ?></p><?php endif ?>
      </div>
    <div class="mt-10 grid gap-5 <?= $cols ?>">
      <?php foreach ($s['plans'] as $i => $plan): $hot = (int) $s['highlight'] === $i + 1; ?>
        <div class="tile relative flex flex-col p-6 <?= $hot ? 'border-navy ring-2 ring-navy/15' : '' ?>">
          <?php if ($hot): ?><span class="absolute -top-3 left-1/2 -translate-x-1/2 rounded-full bg-navy px-3 py-1 text-xs font-medium text-navy-foreground">Önerilen</span><?php endif ?>
          <div class="text-center">
            <h3 class="text-lg font-semibold" <?= $edit("plans.$i.name") ?>><?= View::e($plan['name']) ?></h3>
            <?php if ($plan['subtitle'] !== ''): ?><p class="mt-0.5 text-sm text-muted-foreground" <?= $edit("plans.$i.subtitle") ?>><?= View::e($plan['subtitle']) ?></p><?php endif ?>
            <?php if ($plan['price'] !== ''): ?><p class="mt-4 text-3xl font-semibold tracking-tight text-navy" <?= $edit("plans.$i.price") ?>><?= View::e($plan['price']) ?></p><?php endif ?>
          </div>
          <ul class="mt-6 flex-1 space-y-2.5 border-t pt-6 text-sm" <?= $edit("plans.$i.features") ?>>
            <?php foreach (array_filter(array_map('trim', preg_split('/\R/', $plan['features']))) as $line): ?>
              <?php [$value, $label] = str_contains($line, '|') ? array_map('trim', explode('|', $line, 2)) : [null, $line]; ?>
              <li class="flex items-center gap-3">
                <?php if ($value !== null): ?>
                  <span class="min-w-20 shrink-0 rounded-md bg-accent px-2 py-1 text-center text-xs font-semibold text-navy"><?= View::e($value) ?></span>
                <?php else: ?>
                  <span class="flex size-5 shrink-0 items-center justify-center rounded-full bg-accent text-navy"><?= Icon::svg('check', 'size-3') ?></span>
                <?php endif ?>
                <span class="text-muted-foreground"><?= View::e($label) ?></span>
              </li>
            <?php endforeach ?>
          </ul>
          <?= $btn($plan['button_text'], $plan['button_link'], 'btn mt-6 h-11 w-full ' . ($hot ? 'btn-primary' : 'btn-secondary'), 'cart', $edit("plans.$i.button_text")) ?>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>

<?php
// Blueberry: rakamlar bandı
$hl  = fn(?string $t, string $c = 'text-highlight') => preg_replace('/\*(.+?)\*/u', '<span class="' . $c . '">$1</span>', View::e((string) $t));
$btn = fn(string $text, string $link, string $class, ?string $icon = null, string $attr = '') => $text !== '' && $link !== ''
    ? '<a ' . $attr . ' href="' . View::e(Menu::href($link)) . '" class="' . $class . '">' . ($icon ? Icon::svg($icon, 'size-4') : '') . View::e($text) . '</a>' : '';
?>
<section class="bg-berry-soft py-16 text-berry-foreground lg:py-20">
  <div class="wrap grid items-center gap-10 lg:grid-cols-2">
    <div>
      <h2 class="section-title" <?= $edit('title') ?>><?= $hl($s['title']) ?></h2>
      <?php if ($s['text'] !== ''): ?><p class="mt-3 max-w-lg leading-7 text-berry-foreground/70" <?= $edit('text') ?>><?= nl2br(View::e($s['text'])) ?></p><?php endif ?>
    </div>
    <?php if ($s['items']): ?>
      <div class="grid gap-3 rounded-xl border border-white/10 bg-berry/60 p-3 sm:grid-cols-2">
        <?php foreach ($s['items'] as $i => $item): ?>
          <div class="flex items-center justify-between gap-3 rounded-lg bg-white/5 px-4 py-4" <?= $edit("items.$i.value") ?>>
            <span class="text-sm text-berry-foreground/75"><?= View::e($item['label']) ?></span>
            <span class="rounded-md bg-berry px-2.5 py-1 font-semibold tabular-nums text-highlight"><?= View::e($item['value']) ?></span>
          </div>
        <?php endforeach ?>
      </div>
    <?php endif ?>
  </div>
</section>

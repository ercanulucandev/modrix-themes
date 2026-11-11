<?php
// Lacivert: özellik kartları
$hl  = fn(?string $t, string $c = 'text-highlight') => preg_replace('/\*(.+?)\*/u', '<span class="' . $c . '">$1</span>', View::e((string) $t));
$btn = fn(string $text, string $link, string $class, ?string $icon = null, string $attr = '') => $text !== '' && $link !== ''
    ? '<a ' . $attr . ' href="' . View::e(Menu::href($link)) . '" class="' . $class . '">' . ($icon ? Icon::svg($icon, 'size-4') : '') . View::e($text) . '</a>' : '';
?>
<section <?= $s['anchor'] !== '' ? 'id="' . View::e($s['anchor']) . '"' : '' ?> class="scroll-mt-20 py-16 lg:py-24">
  <div class="wrap">
    <div>
        <h2 class="section-title" <?= $edit('title') ?>><?= $hl($s['title'], 'text-navy') ?></h2>
        <?php if ($s['text'] !== ''): ?><p class="section-text" <?= $edit('text') ?>><?= View::e($s['text']) ?></p><?php endif ?>
      </div>
    <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
      <?php if ($s['image']): ?>
        <div class="tile overflow-hidden sm:row-span-2" <?= $edit('image') ?>><img src="<?= View::e(Request::url('media/' . $s['image'])) ?>" alt="" class="size-full min-h-56 object-cover"></div>
      <?php endif ?>
      <?php foreach ($s['items'] as $i => $item): ?>
        <div class="tile group p-6 transition hover:-translate-y-0.5 hover:border-navy/25 hover:shadow-lg hover:shadow-navy/5">
          <div class="flex items-center gap-4">
            <span class="icon-box transition group-hover:bg-navy group-hover:text-navy-foreground" <?= $edit("items.$i.icon") ?>><?= Icon::svg($item['icon']) ?></span>
            <h3 class="font-semibold" <?= $edit("items.$i.title") ?>><?= View::e($item['title']) ?></h3>
          </div>
          <?php if ($item['text'] !== ''): ?><p class="mt-4 text-sm leading-6 text-muted-foreground" <?= $edit("items.$i.text") ?>><?= View::e($item['text']) ?></p><?php endif ?>
        </div>
      <?php endforeach ?>
    </div>
    <?= $btn($s['button_text'], $s['button_link'], 'tile mt-4 flex h-12 items-center justify-center gap-2 text-sm font-medium text-muted-foreground transition hover:border-navy/25 hover:text-navy', 'external', $edit('button_text')) ?>
  </div>
</section>

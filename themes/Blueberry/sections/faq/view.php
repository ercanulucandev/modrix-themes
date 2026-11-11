<?php
// Blueberry: sıkça sorulanlar
$hl  = fn(?string $t, string $c = 'text-highlight') => preg_replace('/\*(.+?)\*/u', '<span class="' . $c . '">$1</span>', View::e((string) $t));
$btn = fn(string $text, string $link, string $class, ?string $icon = null, string $attr = '') => $text !== '' && $link !== ''
    ? '<a ' . $attr . ' href="' . View::e(Menu::href($link)) . '" class="' . $class . '">' . ($icon ? Icon::svg($icon, 'size-4') : '') . View::e($text) . '</a>' : '';
if (!$s['items']) return;
?>
<section <?= $s['anchor'] !== '' ? 'id="' . View::e($s['anchor']) . '"' : '' ?> class="scroll-mt-20 bg-muted py-16 lg:py-24">
  <div class="wrap">
    <div>
        <h2 class="section-title" <?= $edit('title') ?>><?= $hl($s['title'], 'text-berry') ?></h2>
        <?php if ($s['text'] !== ''): ?><p class="section-text" <?= $edit('text') ?>><?= View::e($s['text']) ?></p><?php endif ?>
      </div>
    <div class="mt-10 grid gap-6 <?= $s['image'] ? 'lg:grid-cols-[5fr_7fr]' : '' ?>">
      <?php if ($s['image']): ?><img src="<?= View::e(Request::url('media/' . $s['image'])) ?>" alt="" class="tile aspect-[4/3] w-full object-cover lg:aspect-auto lg:h-full" <?= $edit('image') ?>><?php endif ?>
      <div class="space-y-3">
        <?php foreach ($s['items'] as $i => $item): ?>
          <details class="tile group open:border-berry/25" <?= $i === 0 ? 'open' : '' ?>>
            <summary class="flex cursor-pointer list-none items-center gap-3 px-5 py-4 font-medium [&::-webkit-details-marker]:hidden">
              <span class="icon-box size-8"><?= Icon::svg('message', 'size-4') ?></span>
              <span class="flex-1"><?= View::e($item['question']) ?></span>
              <?= Icon::svg('chevron', 'size-5 text-muted-foreground transition group-open:rotate-180') ?>
            </summary>
            <p class="px-5 pb-5 pl-16 leading-7 text-muted-foreground" <?= $edit("items.$i.answer") ?>><?= nl2br(View::e($item['answer'])) ?></p>
          </details>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</section>

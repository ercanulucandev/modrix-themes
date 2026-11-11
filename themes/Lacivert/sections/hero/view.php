<?php
// Lacivert: giriş bölümü
$hl  = fn(?string $t, string $c = 'text-highlight') => preg_replace('/\*(.+?)\*/u', '<span class="' . $c . '">$1</span>', View::e((string) $t));
$btn = fn(string $text, string $link, string $class, ?string $icon = null, string $attr = '') => $text !== '' && $link !== ''
    ? '<a ' . $attr . ' href="' . View::e(Menu::href($link)) . '" class="' . $class . '">' . ($icon ? Icon::svg($icon, 'size-4') : '') . View::e($text) . '</a>' : '';
?>
<section class="relative overflow-hidden bg-navy text-navy-foreground">
  <div class="pointer-events-none absolute -right-40 -top-40 size-[34rem] rounded-full bg-highlight/10 blur-3xl"></div>
  <div class="wrap relative grid items-center gap-12 py-16 sm:py-20 lg:grid-cols-2 lg:py-28">
    <div>
      <h1 class="text-4xl font-semibold leading-tight tracking-tight sm:text-5xl" <?= $edit('title') ?>><?= $hl($s['title'] ?: Setting::get('site_name')) ?></h1>
      <?php if ($s['text'] !== ''): ?><p class="mt-6 max-w-xl text-lg leading-8 text-navy-foreground/70" <?= $edit('text') ?>><?= nl2br(View::e($s['text'])) ?></p><?php endif ?>
      <div class="mt-10 grid max-w-md gap-3">
        <?= $btn($s['btn1_text'], $s['btn1_link'], 'btn btn-dark-outline h-12 text-[15px]', 'rocket', $edit('btn1_text')) ?>
        <?= $btn($s['btn2_text'], $s['btn2_link'], 'btn h-12 bg-black/15 text-[15px] text-white hover:bg-black/25', 'play', $edit('btn2_text')) ?>
      </div>
    </div>

    <div class="relative mx-auto w-full max-w-lg lg:mr-0">
      <div class="rotate-2 overflow-hidden rounded-2xl border border-white/10 bg-white/5 shadow-2xl shadow-black/30 transition duration-500 hover:rotate-0" <?= $edit('image') ?>>
        <?php if ($s['image']): ?>
          <img src="<?= View::e(Request::url('media/' . $s['image'])) ?>" alt="" class="aspect-[4/3] w-full object-cover">
        <?php else: ?>
          <svg viewBox="0 0 480 360" class="aspect-[4/3] w-full" aria-hidden="true">
            <rect width="480" height="360" fill="currentColor" class="text-white/5"/>
            <rect x="24" y="24" width="432" height="36" rx="8" fill="currentColor" class="text-white/10"/>
            <circle cx="46" cy="42" r="6" fill="currentColor" class="text-highlight"/>
            <rect x="62" y="37" width="90" height="10" rx="5" fill="currentColor" class="text-white/30"/>
            <rect x="24" y="76" width="140" height="260" rx="10" fill="currentColor" class="text-white/10"/>
            <?php foreach ([100, 80, 92, 70, 86] as $i => $w): ?><rect x="40" y="<?= 96 + $i * 34 ?>" width="<?= $w ?>" height="12" rx="6" fill="currentColor" class="<?= $i === 0 ? 'text-highlight' : 'text-white/25' ?>"/><?php endforeach ?>
            <rect x="180" y="76" width="276" height="150" rx="10" fill="currentColor" class="text-white/10"/>
            <polyline points="200,200 240,170 280,182 320,140 360,154 400,112 436,124" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" class="text-highlight"/>
            <rect x="180" y="242" width="130" height="94" rx="10" fill="currentColor" class="text-white/10"/>
            <rect x="326" y="242" width="130" height="94" rx="10" fill="currentColor" class="text-white/10"/>
            <rect x="198" y="262" width="60" height="10" rx="5" fill="currentColor" class="text-white/30"/>
            <rect x="198" y="284" width="90" height="22" rx="6" fill="currentColor" class="text-white/60"/>
            <rect x="344" y="262" width="60" height="10" rx="5" fill="currentColor" class="text-white/30"/>
            <rect x="344" y="284" width="76" height="22" rx="6" fill="currentColor" class="text-highlight"/>
          </svg>
        <?php endif ?>
      </div>
      <?php if ($s['card_title'] !== ''): ?>
        <div class="absolute -bottom-6 -left-4 min-w-44 rounded-xl bg-white px-4 py-3 text-navy shadow-xl sm:-left-8" <?= $edit('card_title') ?>>
          <p class="font-semibold"><?= View::e($s['card_title']) ?></p>
          <?php if ($s['card_text'] !== ''): ?><p class="mt-1 flex items-center gap-1 text-sm text-muted-foreground"><?= Icon::svg('chevrons', 'size-3.5 text-navy') ?><?= View::e($s['card_text']) ?></p><?php endif ?>
        </div>
      <?php endif ?>
    </div>
  </div>
</section>

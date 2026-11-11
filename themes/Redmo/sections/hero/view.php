<?php
// Redmo: görselli giriş
$btn = fn(string $text, string $link, string $class, string $attr = '') => $text !== '' && $link !== ''
    ? '<a ' . $attr . ' href="' . View::e(Menu::href($link)) . '" class="' . $class . '">' . View::e($text) . '</a>' : '';
?>
<section class="relative isolate overflow-hidden bg-dark text-dark-foreground">
  <?php if ($s['image']): ?>
    <img src="<?= View::e(Request::url('media/' . $s['image'])) ?>" alt="" class="absolute inset-0 -z-20 size-full object-cover" <?= $edit('image') ?>>
    <div class="absolute inset-0 -z-10 bg-dark" style="opacity: <?= (int) $s['overlay'] / 100 ?>"></div>
  <?php else: ?>
    <div class="absolute inset-0 -z-10 bg-[radial-gradient(ellipse_at_top_right,var(--color-primary),transparent_60%)] opacity-60"></div>
  <?php endif ?>
  <div class="wrap py-24 sm:py-32 lg:py-40">
    <div class="max-w-3xl">
      <?php if ($s['badge'] !== ''): ?>
        <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-1 text-xs font-semibold uppercase tracking-wider backdrop-blur" <?= $edit('badge') ?>>
          <span class="size-1.5 rounded-full bg-primary"></span><?= View::e($s['badge']) ?>
        </span>
      <?php endif ?>
      <h1 class="mt-6 text-4xl font-extrabold leading-[1.1] tracking-tight sm:text-5xl lg:text-6xl" <?= $edit('title') ?>><?= View::e($s['title'] ?: Setting::get('site_name')) ?></h1>
      <?php if ($s['text'] !== ''): ?><p class="mt-6 max-w-2xl text-lg leading-8 text-dark-foreground/75" <?= $edit('text') ?>><?= nl2br(View::e($s['text'])) ?></p><?php endif ?>
      <div class="mt-10 flex flex-wrap gap-3">
        <?= $btn($s['btn1_text'], $s['btn1_link'], 'btn btn-primary h-12 px-7 text-base', $edit('btn1_text')) ?>
        <?= $btn($s['btn2_text'], $s['btn2_link'], 'btn h-12 border border-white/30 px-7 text-base text-dark-foreground hover:bg-white/10', $edit('btn2_text')) ?>
      </div>
    </div>
  </div>
</section>

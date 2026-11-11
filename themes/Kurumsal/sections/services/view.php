<?php // Kurumsal: hizmetler ?>
<section <?= $s['anchor'] !== '' ? 'id="' . View::e($s['anchor']) . '"' : '' ?> class="scroll-mt-20 py-20 lg:py-28">
  <div class="wrap">
    <div class="mx-auto max-w-2xl text-center">
      <?php if ($s['badge'] !== ''): ?><span class="section-badge" <?= $edit('badge') ?>><?= View::e($s['badge']) ?></span><?php endif ?>
      <h2 class="mt-4 text-3xl font-bold tracking-tight sm:text-4xl" <?= $edit('title') ?>><?= View::e($s['title']) ?></h2>
      <?php if ($s['text'] !== ''): ?><p class="mt-4 text-lg leading-8 text-muted-foreground" <?= $edit('text') ?>><?= View::e($s['text']) ?></p><?php endif ?>
    </div>
    <div class="mt-14 grid gap-6 md:grid-cols-3">
      <?php foreach ($s['items'] as $i => $item): ?>
        <div class="group rounded-xl border bg-card p-8 transition hover:-translate-y-1 hover:border-primary/30 hover:shadow-xl hover:shadow-primary/5">
          <span class="flex size-12 items-center justify-center rounded-lg bg-primary/10 text-primary transition group-hover:bg-primary group-hover:text-primary-foreground" <?= $edit("items.$i.icon") ?>><?= Icon::svg($item['icon'], 'size-6') ?></span>
          <h3 class="mt-6 text-lg font-bold" <?= $edit("items.$i.title") ?>><?= View::e($item['title']) ?></h3>
          <?php if ($item['text'] !== ''): ?><p class="mt-3 leading-7 text-muted-foreground" <?= $edit("items.$i.text") ?>><?= View::e($item['text']) ?></p><?php endif ?>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>

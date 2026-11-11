<?php // Kurumsal: hakkımızda ve rakamlar ?>
<section <?= $s['anchor'] !== '' ? 'id="' . View::e($s['anchor']) . '"' : '' ?> class="scroll-mt-20 bg-muted/60 py-20 lg:py-28">
  <div class="wrap grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
    <div>
      <?php if ($s['badge'] !== ''): ?><span class="section-badge" <?= $edit('badge') ?>><?= View::e($s['badge']) ?></span><?php endif ?>
      <h2 class="mt-4 text-3xl font-bold tracking-tight sm:text-4xl" <?= $edit('title') ?>><?= View::e($s['title']) ?></h2>
      <?php if ($s['text'] !== ''): ?>
        <div class="mt-6 space-y-4 text-lg leading-8 text-muted-foreground" <?= $edit('text') ?>>
          <?php foreach (preg_split('/\R+/', $s['text']) as $p): ?><p><?= View::e($p) ?></p><?php endforeach ?>
        </div>
      <?php endif ?>
      <?php if ($s['image'] && $s['stats']): ?>
        <dl class="mt-10 grid grid-cols-3 gap-6 border-t pt-8">
          <?php foreach ($s['stats'] as $i => $stat): ?>
            <div <?= $edit("stats.$i.value") ?>><dt class="text-sm text-muted-foreground"><?= View::e($stat['label']) ?></dt><dd class="mt-1 text-3xl font-extrabold tracking-tight text-primary"><?= View::e($stat['value']) ?></dd></div>
          <?php endforeach ?>
        </dl>
      <?php endif ?>
    </div>
    <?php if ($s['image']): ?>
      <img src="<?= View::e(Request::url('media/' . $s['image'])) ?>" alt="" class="aspect-[4/3] w-full rounded-xl object-cover shadow-2xl" <?= $edit('image') ?>>
    <?php else: ?>
      <dl class="grid gap-4 sm:grid-cols-3 lg:grid-cols-1">
        <?php foreach ($s['stats'] as $i => $stat): ?>
          <div class="rounded-xl border bg-card p-8" <?= $edit("stats.$i.value") ?>>
            <dd class="text-4xl font-extrabold tracking-tight text-primary lg:text-5xl"><?= View::e($stat['value']) ?></dd>
            <dt class="mt-2 text-muted-foreground"><?= View::e($stat['label']) ?></dt>
          </div>
        <?php endforeach ?>
      </dl>
    <?php endif ?>
  </div>
</section>

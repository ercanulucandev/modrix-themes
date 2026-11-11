<?php
// Lacivert tema: üst menü. Lacivert zeminde hap biçiminde bağlantılar; alt menüler beyaz açılır kutuda.
// Değişkenler: $items (Menu::location()), $depth (iç içe çağrıda)
$depth ??= 0;
?>
<?php foreach ($items as $item): $target = $item['new_tab'] ? ' target="_blank" rel="noopener"' : ''; ?>
  <?php if ($depth === 0): ?>
    <div class="group/nav relative">
      <a href="<?= View::e($item['href']) ?>"<?= $target ?>
         class="flex items-center gap-1.5 rounded-lg px-3 py-2 text-sm font-medium transition-colors
                <?= $item['active'] ? 'bg-white/15 text-white' : 'text-white/75 hover:bg-white/10 hover:text-white' ?>">
        <?= View::e($item['label']) ?>
        <?php if ($item['children']): ?><?= View::render('partials/icon', ['name' => 'chevron', 'class' => 'size-3.5 opacity-70']) ?><?php endif ?>
      </a>
      <?php if ($item['children']): ?>
        <div class="ml-3 mt-1 border-l border-white/15 pl-2 md:invisible md:absolute md:left-0 md:top-full md:z-50 md:ml-0 md:mt-0 md:border-0 md:pl-0 md:pt-2 md:opacity-0 md:transition
                    md:group-hover/nav:visible md:group-hover/nav:opacity-100 md:group-focus-within/nav:visible md:group-focus-within/nav:opacity-100">
          <div class="md:min-w-52 md:rounded-xl md:border md:border-slate-200 md:bg-white md:p-1.5 md:shadow-xl">
            <?= View::render('partials/nav', ['items' => $item['children'], 'depth' => 1]) ?>
          </div>
        </div>
      <?php endif ?>
    </div>
  <?php else: ?>
    <a href="<?= View::e($item['href']) ?>"<?= $target ?>
       class="block rounded-lg px-3 py-2 text-sm transition-colors md:whitespace-nowrap
              <?= $item['active'] ? 'font-medium text-white md:bg-slate-100 md:text-navy' : 'text-white/75 hover:text-white md:text-slate-600 md:hover:bg-slate-100 md:hover:text-navy' ?>">
      <?= View::e($item['label']) ?>
    </a>
    <?php if ($item['children']): ?>
      <div class="ml-3 border-l border-white/15 pl-2 md:border-slate-200"><?= View::render('partials/nav', ['items' => $item['children'], 'depth' => 2]) ?></div>
    <?php endif ?>
  <?php endif ?>
<?php endforeach ?>

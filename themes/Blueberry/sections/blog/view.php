<?php
// Blueberry: blog (dergi düzeni)
use App\Modules\Blog\Models\Post;

$hl  = fn(?string $t, string $c = 'text-highlight') => preg_replace('/\*(.+?)\*/u', '<span class="' . $c . '">$1</span>', View::e((string) $t));
$btn = fn(string $text, string $link, string $class, ?string $icon = null, string $attr = '') => $text !== '' && $link !== ''
    ? '<a ' . $attr . ' href="' . View::e(Menu::href($link)) . '" class="' . $class . '">' . ($icon ? Icon::svg($icon, 'size-4') : '') . View::e($text) . '</a>' : '';
$posts = Post::published(5);
if (!$posts) return;
foreach ($posts as &$post) {
    $post['cover'] = App\Modules\Blog\Models\Post::cover($post);
    $post['url'] = Router::url('blog.show', ['slug' => $post['slug']]);
}
unset($post);
[$lead, $rest] = [$posts[0], array_slice($posts, 1, 4)];
?>
<section class="py-16 lg:py-24">
  <div class="wrap">
    <div class="flex flex-wrap items-end justify-between gap-4">
      <div>
        <h2 class="section-title" <?= $edit('title') ?>><?= $hl($s['title'], 'text-berry') ?></h2>
        <?php if ($s['text'] !== ''): ?><p class="section-text" <?= $edit('text') ?>><?= View::e($s['text']) ?></p><?php endif ?>
      </div>
      <?php if ($s['link_text'] !== ''): ?>
        <a href="<?= Router::url('blog.index') ?>" class="inline-flex items-center gap-1.5 text-sm font-medium text-berry hover:underline" <?= $edit('link_text') ?>><?= View::e($s['link_text']) ?> <?= Icon::svg('arrow', 'size-4') ?></a>
      <?php endif ?>
    </div>
    <div class="mt-10 grid gap-4 lg:grid-cols-2">
      <a href="<?= $lead['url'] ?>" class="group relative flex min-h-80 flex-col justify-end overflow-hidden rounded-xl bg-berry text-white">
        <?php if ($lead['cover']): ?><img src="<?= View::e($lead['cover']) ?>" alt="" class="absolute inset-0 size-full object-cover transition duration-500 group-hover:scale-105"><?php endif ?>
        <div class="absolute inset-0 bg-gradient-to-t from-berry via-berry/60 to-transparent"></div>
        <div class="relative p-6 sm:p-8">
          <span class="rounded-md bg-berry-soft px-2 py-1 text-xs font-medium text-highlight"><?= View::date($lead['published_at'] ?? $lead['created_at']) ?></span>
          <h3 class="mt-3 text-2xl font-semibold leading-snug"><?= View::e($lead['title']) ?></h3>
          <p class="mt-2 line-clamp-2 text-sm leading-6 text-white/75"><?= View::e(Html::text($lead['body'], 180)) ?></p>
        </div>
      </a>
      <?php if ($rest): ?>
        <div class="grid gap-4 sm:grid-cols-2">
          <?php foreach ($rest as $post): ?>
            <a href="<?= $post['url'] ?>" class="group relative flex min-h-40 flex-col justify-end overflow-hidden rounded-xl bg-berry-soft text-white">
              <?php if ($post['cover']): ?><img src="<?= View::e($post['cover']) ?>" alt="" class="absolute inset-0 size-full object-cover transition duration-500 group-hover:scale-105"><?php endif ?>
              <div class="absolute inset-0 bg-gradient-to-t from-berry/95 via-berry/40 to-transparent"></div>
              <div class="relative p-4">
                <span class="rounded bg-berry px-1.5 py-0.5 text-[11px] font-medium text-highlight"><?= View::date($post['published_at'] ?? $post['created_at']) ?></span>
                <h3 class="mt-2 line-clamp-2 font-semibold leading-snug"><?= View::e($post['title']) ?></h3>
              </div>
            </a>
          <?php endforeach ?>
        </div>
      <?php endif ?>
    </div>
  </div>
</section>

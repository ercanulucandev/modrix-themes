<?php
// Lacivert tema, Blog modülünün liste sayfasını ezer (Blog::index -> bu dosya).
// Değişkenler modülden: $title, $metaDescription, $posts (sayfalı; category_name, category_slug ile), $categories, $category, $tag
?>
<div class="max-w-2xl">
  <?php if ($category || $tag): ?><a href="<?= Router::url('blog.index') ?>" class="text-sm font-medium text-muted-foreground hover:text-navy"><?= Lang::t('← Tüm yazılar') ?></a><?php endif ?>
  <h1 class="mt-1 text-3xl font-semibold tracking-tight sm:text-4xl"><?= $tag ? '#' : '' ?><?= View::e($title) ?></h1>
  <?php if ($metaDescription): ?><p class="mt-3 text-lg leading-8 text-muted-foreground"><?= View::e($metaDescription) ?></p><?php endif ?>
</div>

<?php if ($categories): ?>
  <nav class="mt-6 flex flex-wrap gap-2 text-sm" aria-label="<?= View::e(Lang::t('Kategoriler')) ?>">
    <a href="<?= Router::url('blog.index') ?>" class="rounded-md border px-3 py-1.5 font-medium transition <?= !$category && !$tag ? 'border-navy bg-navy text-white' : 'bg-card hover:border-navy/40' ?>"><?= Lang::t('Tümü') ?></a>
    <?php foreach ($categories as $c): ?>
      <a href="<?= Router::url('blog.category', ['slug' => $c['slug']]) ?>" class="rounded-md border px-3 py-1.5 font-medium transition <?= ($category['id'] ?? 0) === $c['id'] ? 'border-navy bg-navy text-white' : 'bg-card hover:border-navy/40' ?>"><?= View::e($c['name']) ?></a>
    <?php endforeach ?>
  </nav>
<?php endif ?>

<?php if (!$posts['data']): ?>
  <div class="tile mt-10 border-dashed px-6 py-20 text-center text-muted-foreground"><?= Lang::t('Henüz yazı yok.') ?></div>
<?php else: ?>
  <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
    <?php foreach ($posts['data'] as $post):
      $url = Router::url('blog.show', ['slug' => $post['slug']]);
      $cover = App\Modules\Blog\Models\Post::cover($post);
    ?>
      <article class="tile group relative flex flex-col overflow-hidden transition hover:-translate-y-0.5 hover:border-navy/25 hover:shadow-lg hover:shadow-navy/5">
        <div class="relative aspect-[16/9] overflow-hidden bg-navy">
          <?php if ($cover): ?>
            <img src="<?= View::e($cover) ?>"<?= App\Services\ResponsiveImages::attrs($cover, '(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 33vw') ?> alt="" loading="lazy" class="size-full object-cover transition duration-500 group-hover:scale-105">
          <?php else: ?>
            <div class="flex size-full items-center justify-center bg-navy-soft text-5xl font-semibold text-white/20"><?= View::e(mb_strtoupper(mb_substr($post['title'], 0, 1))) ?></div>
          <?php endif ?>
          <span class="absolute left-3 top-3 rounded-md bg-navy/90 px-2 py-1 text-xs font-medium text-highlight"><?= View::date($post['published_at'] ?? $post['created_at']) ?></span>
        </div>
        <div class="flex flex-1 flex-col p-5">
          <?php if ($post['category_name']): ?>
            <a href="<?= Router::url('blog.category', ['slug' => $post['category_slug']]) ?>" class="relative z-10 mb-2 self-start text-xs font-semibold uppercase tracking-wider text-navy hover:underline"><?= View::e($post['category_name']) ?></a>
          <?php endif ?>
          <h2 class="text-lg font-semibold leading-snug">
            <a href="<?= $url ?>" class="after:absolute after:inset-0"><?= View::e($post['title']) ?></a>
          </h2>
          <p class="mt-2 line-clamp-3 flex-1 text-sm leading-6 text-muted-foreground"><?= View::e($post['excerpt'] ?: Html::text($post['body'], 180)) ?></p>
          <p class="mt-4 flex items-center justify-between text-sm">
            <span class="inline-flex items-center gap-1.5 font-medium text-navy">Devamını oku <?= View::render('partials/icon', ['name' => 'arrow', 'class' => 'size-4 transition group-hover:translate-x-1']) ?></span>
            <?php if (Setting::bool('blog_show_views')): ?><span class="text-xs text-muted-foreground"><?= (int) $post['views'] ?> okunma</span><?php endif ?>
          </p>
        </div>
      </article>
    <?php endforeach ?>
  </div>
  <div class="mt-10"><?= View::render('partials/pagination', ['page' => $posts]) ?></div>
<?php endif ?>

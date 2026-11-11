<?php
// Redmo tema, Blog modülünün liste sayfasını ezer (Blog::index -> bu dosya).
// Modülün verdiği değişkenler aynı: $title, $metaDescription, $posts (sayfalı; category_name, category_slug ile), $categories, $category, $tag
?>
<div class="mx-auto max-w-2xl text-center">
  <?php if ($category || $tag): ?>
    <a href="<?= Router::url('blog.index') ?>" class="section-badge"><?= Lang::t('← Tüm yazılar') ?></a>
  <?php else: ?><span class="section-badge"><?= Lang::t('Blog') ?></span><?php endif ?>
  <h1 class="mt-4 text-4xl font-bold tracking-tight sm:text-5xl"><?= $tag ? '#' : '' ?><?= View::e($title) ?></h1>
  <?php if ($metaDescription): ?><p class="mt-4 text-lg leading-8 text-muted-foreground"><?= View::e($metaDescription) ?></p><?php endif ?>
</div>

<?php if ($categories): ?>
  <nav class="mt-8 flex flex-wrap justify-center gap-2 text-sm" aria-label="<?= View::e(Lang::t('Kategoriler')) ?>">
    <a href="<?= Router::url('blog.index') ?>" class="rounded-full border px-4 py-1.5 font-medium transition <?= !$category && !$tag ? 'border-primary bg-primary text-primary-foreground' : 'hover:border-primary/40' ?>"><?= Lang::t('Tümü') ?></a>
    <?php foreach ($categories as $c): ?>
      <a href="<?= Router::url('blog.category', ['slug' => $c['slug']]) ?>" class="rounded-full border px-4 py-1.5 font-medium transition <?= ($category['id'] ?? 0) === $c['id'] ? 'border-primary bg-primary text-primary-foreground' : 'hover:border-primary/40' ?>"><?= View::e($c['name']) ?></a>
    <?php endforeach ?>
  </nav>
<?php endif ?>

<?php if (!$posts['data']): ?>
  <div class="mt-14 rounded-xl border border-dashed px-6 py-20 text-center text-muted-foreground"><?= Lang::t('Henüz yazı yok.') ?></div>
<?php else: ?>
  <div class="mt-14 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
    <?php foreach ($posts['data'] as $post): $url = Router::url('blog.show', ['slug' => $post['slug']]); ?>
      <article class="group relative flex flex-col rounded-xl border bg-card p-7 transition hover:-translate-y-1 hover:border-primary/30 hover:shadow-xl hover:shadow-primary/5">
        <p class="text-xs font-medium uppercase tracking-wider text-primary">
          <?php if ($post['category_name']): ?><a href="<?= Router::url('blog.category', ['slug' => $post['category_slug']]) ?>" class="relative z-10 font-semibold hover:underline"><?= View::e($post['category_name']) ?></a> · <?php endif ?>
          <?= View::date($post['published_at'] ?? $post['created_at']) ?><?= Setting::bool('blog_show_views') ? ' · ' . (int) $post['views'] . ' okunma' : '' ?>
        </p>
        <h2 class="mt-3 text-xl font-bold leading-snug tracking-tight">
          <a href="<?= $url ?>" class="after:absolute after:inset-0"><?= View::e($post['title']) ?></a>
        </h2>
        <p class="mt-3 line-clamp-3 flex-1 leading-7 text-muted-foreground"><?= View::e($post['excerpt'] ?: Html::text($post['body'], 200)) ?></p>
        <span class="mt-6 inline-flex items-center gap-1.5 text-sm font-semibold text-primary">
          Devamını oku <?= View::render('partials/icon', ['name' => 'arrow', 'class' => 'size-4 transition group-hover:translate-x-1']) ?>
        </span>
      </article>
    <?php endforeach ?>
  </div>
  <div class="mt-12"><?= View::render('partials/pagination', ['page' => $posts]) ?></div>
<?php endif ?>

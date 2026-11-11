<?php
// Redmo: koyu iletişim bandı
$phone = Setting::get('contact_phone');
$email = Setting::get('contact_email');
$address = Setting::get('contact_address');
?>
<section <?= $s['anchor'] !== '' ? 'id="' . View::e($s['anchor']) . '"' : '' ?> class="scroll-mt-20 bg-dark py-20 text-dark-foreground lg:py-24">
  <div class="wrap grid gap-12 lg:grid-cols-2 lg:items-center">
    <div>
      <h2 class="text-3xl font-bold tracking-tight sm:text-4xl" <?= $edit('title') ?>><?= View::e($s['title']) ?></h2>
      <?php if ($s['text'] !== ''): ?><p class="mt-4 max-w-xl text-lg leading-8 text-dark-foreground/70" <?= $edit('text') ?>><?= View::e($s['text']) ?></p><?php endif ?>
    </div>
    <div class="grid gap-4 sm:grid-cols-2">
      <?php foreach (array_filter([
          ['phone', 'Telefon', $phone, $phone ? 'tel:' . preg_replace('/[^0-9+]/', '', $phone) : null],
          ['mail', 'E-posta', $email, $email ? 'mailto:' . $email : null],
          ['pin', 'Adres', $address, null],
      ], fn($c) => $c[2]) as [$icon, $label, $value, $href]): ?>
        <<?= $href ? 'a href="' . View::e($href) . '"' : 'div' ?> class="flex gap-4 rounded-xl border border-white/10 bg-white/5 p-6 transition <?= $href ? 'hover:bg-white/10' : 'sm:col-span-2' ?>">
          <span class="flex size-11 shrink-0 items-center justify-center rounded-lg bg-primary text-primary-foreground"><?= Icon::svg($icon) ?></span>
          <span class="min-w-0">
            <span class="block text-sm text-dark-foreground/60"><?= $label ?></span>
            <span class="mt-0.5 block break-words font-semibold"><?= nl2br(View::e($value)) ?></span>
          </span>
        </<?= $href ? 'a' : 'div' ?>>
      <?php endforeach ?>
      <?php if (!$phone && !$email && !$address): ?>
        <p class="text-sm text-dark-foreground/60 sm:col-span-2">İletişim bilgileri Ayarlar &gt; İletişim'den eklenir.</p>
      <?php endif ?>
    </div>
  </div>
</section>

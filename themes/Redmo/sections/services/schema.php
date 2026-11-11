<?php
return [
    'name'        => 'Hizmetler',
    'description' => 'Ortalanmış başlık ve simgeli hizmet kartları.',
    'icon'        => 'briefcase',
    'fields'      => [
        'anchor' => ['label' => 'Bölüm adresi (#)', 'type' => 'text', 'default' => 'hizmetler'],
        'badge'  => ['label' => 'Üst etiket', 'type' => 'text', 'default' => 'Ne yapıyoruz'],
        'title'  => ['label' => 'Başlık', 'type' => 'text', 'default' => 'Hizmetlerimiz'],
        'text'   => ['label' => 'Açıklama', 'type' => 'textarea', 'default' => 'İhtiyacınızı dinliyor, size en uygun çözümü birlikte planlıyoruz.'],
        'items'  => ['label' => 'Hizmetler', 'type' => 'repeater', 'item_name' => 'Hizmet', 'item_label' => 'title', 'max' => 12,
            'fields' => [
                'icon'  => ['label' => 'Simge', 'type' => 'icon', 'default' => 'briefcase'],
                'title' => ['label' => 'Başlık', 'type' => 'text', 'default' => 'Yeni hizmet'],
                'text'  => ['label' => 'Açıklama', 'type' => 'textarea', 'default' => 'Kısa açıklama.'],
            ],
            'default' => [
                ['icon' => 'briefcase', 'title' => 'Danışmanlık', 'text' => 'İşletmenizin ihtiyaçlarını analiz edip yol haritası çıkarıyoruz.'],
                ['icon' => 'rocket', 'title' => 'Uygulama', 'text' => 'Planlanan çözümü zamanında ve bütçesinde hayata geçiriyoruz.'],
                ['icon' => 'shield', 'title' => 'Destek', 'text' => 'Proje sonrası bakım ve destekle her zaman yanınızdayız.'],
            ]],
    ],
];

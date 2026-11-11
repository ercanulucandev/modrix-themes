<?php
// Kurumsal tema: Görünüm > Özelleştir > genel ayarlar. Ana sayfanın içeriği bölümlerdedir (sections/).
return [
    'colors' => [
        'label'  => 'Renk ve yazı',
        'fields' => [
            'primary_color' => ['label' => 'Ana renk', 'type' => 'color', 'rules' => 'required|regex:/^#[0-9a-fA-F]{6}$/', 'default' => '#1d4ed8'],
            'dark_color'    => ['label' => 'Koyu renk', 'type' => 'color', 'rules' => 'required|regex:/^#[0-9a-fA-F]{6}$/', 'default' => '#0f172a',
                                'help' => 'Üst bilgi çubuğu, alt kısım ve iletişim bölümü.'],
            'radius'        => ['label' => 'Köşeler', 'type' => 'select', 'rules' => 'required|in:none,small,medium,large', 'default' => 'medium',
                                'options' => ['none' => 'Keskin', 'small' => 'Hafif yuvarlak', 'medium' => 'Yuvarlak', 'large' => 'Çok yuvarlak']],
            'font'          => ['label' => 'Yazı tipi', 'type' => 'select', 'rules' => 'required|in:inter,manrope,dmsans,lora', 'default' => 'manrope',
                                'options' => ['inter' => 'Inter', 'manrope' => 'Manrope', 'dmsans' => 'DM Sans', 'lora' => 'Lora (tırnaklı)']],
        ],
    ],
    'header' => [
        'label'  => 'Üst kısım',
        'fields' => [
            'header_search'   => ['label' => 'Arama simgesi', 'type' => 'checkbox', 'default' => '1', 'help' => 'Menünün yanında site içi arama (/search).'],
            'topbar_enabled'  => ['label' => 'Üst bilgi çubuğu', 'type' => 'checkbox', 'default' => '1', 'help' => 'Telefon, e-posta (Ayarlar > İletişim) ve aşağıdaki yazı.'],
            'topbar_text'     => ['label' => 'Çubuktaki yazı', 'type' => 'text', 'rules' => 'nullable|max:80', 'default' => 'Hafta içi 09:00 – 18:00'],
            'header_cta_text' => ['label' => 'Düğme yazısı', 'type' => 'text', 'rules' => 'nullable|max:40', 'default' => 'Teklif alın'],
            'header_cta_url'  => ['label' => 'Düğme bağlantısı', 'type' => 'text', 'rules' => 'nullable|max:255', 'default' => '#iletisim'],
        ],
    ],
    'footer' => [
        'label'  => 'Alt kısım',
        'fields' => [
            'footer_about'  => ['label' => 'Tanıtım yazısı', 'type' => 'textarea', 'rules' => 'nullable|max:300', 'help' => 'Boşsa Ayarlar > Genel\'deki kısa tanıtım.'],
        ],
    ],
];

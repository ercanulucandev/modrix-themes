<?php
// Lacivert tema: Görünüm > Özelleştir > genel ayarlar. Ana sayfanın içeriği bölümlerdedir (sections/).
// Okuma: Theme::get('navy_color') vb.
return [
    'colors' => [
        'label'  => 'Renk ve yazı',
        'fields' => [
            'navy_color'   => ['label' => 'Lacivert', 'type' => 'color', 'rules' => 'required|regex:/^#[0-9a-fA-F]{6}$/', 'default' => '#143478',
                               'help' => 'Üst kısım, giriş, rakamlar bandı, alt kısım ve düğmeler.'],
            'accent_color' => ['label' => 'Vurgu rengi', 'type' => 'color', 'rules' => 'required|regex:/^#[0-9a-fA-F]{6}$/', 'default' => '#9ebeff',
                               'help' => 'Koyu zemindeki *vurgulu* kelimeler ve küçük ayrıntılar.'],
            'font'         => ['label' => 'Yazı tipi', 'type' => 'select', 'rules' => 'required|in:outfit,jakarta,inter,lexend', 'default' => 'outfit',
                               'options' => ['outfit' => 'Outfit (geometrik)', 'jakarta' => 'Plus Jakarta Sans', 'inter' => 'Inter', 'lexend' => 'Lexend']],
        ],
    ],
    'header' => [
        'label'  => 'Üst kısım',
        'fields' => [
            'header_search'   => ['label' => 'Arama simgesi', 'type' => 'checkbox', 'default' => '1', 'help' => 'Menünün yanında site içi arama (/search).'],
            'badge'           => ['label' => 'Logonun yanındaki etiket', 'type' => 'text', 'rules' => 'nullable|max:12', 'default' => '', 'placeholder' => 'v2.0', 'help' => 'Sürüm ya da kısa not. Boşsa gösterilmez.'],
            'header_btn1'     => ['label' => '1. düğme yazısı', 'type' => 'text', 'rules' => 'nullable|max:30', 'default' => 'İletişim'],
            'header_btn1_url' => ['label' => '1. düğme bağlantısı', 'type' => 'text', 'rules' => 'nullable|max:255', 'default' => '#iletisim'],
            'header_btn2'     => ['label' => '2. düğme yazısı', 'type' => 'text', 'rules' => 'nullable|max:30', 'default' => 'Hemen başla', 'help' => 'Daha belirgin düğme.'],
            'header_btn2_url' => ['label' => '2. düğme bağlantısı', 'type' => 'text', 'rules' => 'nullable|max:255', 'default' => '#paketler'],
        ],
    ],
    'footer' => [
        'label'  => 'Alt kısım',
        'fields' => [
            'footer_tagline' => ['label' => 'Logonun altındaki yazı', 'type' => 'text', 'rules' => 'nullable|max:80', 'default' => '', 'help' => 'Boşsa Ayarlar > Genel\'deki slogan.'],
            'footer_about'   => ['label' => 'Tanıtım yazısı', 'type' => 'textarea', 'rules' => 'nullable|max:300', 'help' => 'Boşsa Ayarlar > Genel\'deki kısa tanıtım.'],
        ],
    ],
];

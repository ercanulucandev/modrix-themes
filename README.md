# Modrix temaları

[Modrix](https://github.com/ercanulucandev/modrix) için temalar. Sitelerde **Sistem > Mağaza > Temalar**'dan tek tıkla kurulur,
**Görünüm**'den önizlenip etkinleştirilir. Her paket SHA-256 özetiyle doğrulanır. Çekirdekle sade bir başlangıç teması
(**Başlangıç**) gelir; buradaki temalar onun üzerine kurulur, olmayan dosyaları ondan alır. Hepsi tüm modüllerle
(blog, sayfalar, formlar, mağaza, randevu, SSS, ekip, referanslar, portfolyo, bülten...) uyumludur.

| Tema | |
|---|---|
| **Blueberry** | Yazılım, SaaS ve dijital ürünler: yaban mersini moru üst kısım, ikonlu özellik kartları, fiyat paketleri, rakamlar, SSS, dergi düzeninde blog |
| **Redmo** | Şirket, ajans ve hizmet siteleri: kırmızı vurgulu kimlik, üst bilgi çubuğu, hizmet kartları, hakkımızda, iletişim bölümleri |

## Depo düzeni

| | |
|---|---|
| `catalog.json` | Sitelerin okuduğu katalog |
| `packages/` | Kurulum paketleri (ZIP) |
| `themes/` | Okunabilir kaynak (tema klasörleri) |
| `screenshots/` | Mağazada görünen ekran görüntüleri |

Tema geliştirmek: [Tema yazma rehberi](https://github.com/ercanulucandev/modrix/blob/main/docs/theme-tutorial.md) ·
yayınlamak: çekirdeğin yanında bu depo `modrix-themes` adıyla dururken `php modrix store:build --themes`

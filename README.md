# Modrix temaları

[Modrix](https://github.com/ercanulucandev/modrix) için temalar. Sitelerde **Sistem > Mağaza > Temalar**'dan tek tıkla kurulur,
**Görünüm**'den önizlenip etkinleştirilir. Her paket SHA-256 özetiyle doğrulanır. Çekirdekle sade bir başlangıç teması
(Default) gelir; buradaki temalar onun üzerine kurulur.

| Tema | |
|---|---|
| **Kurumsal** | Şirket ve hizmet siteleri: üst bilgi çubuğu, hizmetler, hakkımızda, iletişim bölümleri |
| **Lacivert** | Teknoloji / SaaS: lacivert üst kısım, özellikler, fiyatlar, SSS, istatistik bölümleri |

## Depo düzeni

| | |
|---|---|
| `catalog.json` | Sitelerin okuduğu katalog |
| `packages/` | Kurulum paketleri (ZIP) |
| `themes/` | Okunabilir kaynak (tema klasörleri) |
| `screenshots/` | Mağazada görünen ekran görüntüleri |

Tema geliştirmek: [Tema yazma rehberi](https://github.com/ercanulucandev/modrix/blob/main/docs/theme-tutorial.md) ·
yayınlamak: `php modrix store:build --themes --base=https://raw.githubusercontent.com/ercanulucandev/modrix-themes/main/`

# Naprawa problemu z logo w WPML - Instrukcja krok po kroku

## Problem

Logo nie pokazuje się w wersji angielskiej (lub innych językach).

## Przyczyna

W WordPress Customizer ustawienia są często zapisywane per-język przez WPML. To oznacza, że musisz ustawić logo osobno dla każdego języka.

---

## ROZWIĄZANIE - Krok po kroku

### Krok 1: Sprawdź ustawienia WPML Media

1. Przejdź do **WPML → Settings** (WPML → Ustawienia)
2. Przewiń do sekcji **Media translation** (Tłumaczenie mediów)
3. Zaznacz opcję: **"Translate media library items"** lub **"Duplicate media"**
4. **Zapisz ustawienia**

---

### Krok 2: Ustaw logo dla języka polskiego

1. Upewnij się, że jesteś w **polskiej wersji** panelu administracyjnego
2. Przejdź do **Wygląd → Dostosuj → Tożsamość witryny**
3. Ustaw **Logo** (jeśli jeszcze nie jest ustawione)
4. Kliknij **Opublikuj**

---

### Krok 3: Ustaw logo dla języka angielskiego

1. **W GÓRNYM PASKU** panelu Customizer znajdź **przełącznik języka** (flagi)
2. **Przełącz na angielski**
3. Zobaczysz, że pole logo jest puste
4. **Kliknij "Wybierz logo"**
5. **Wybierz to samo logo** (lub inne, jeśli chcesz inne logo dla angielskiego)
6. **Kliknij "Opublikuj"**

---

### Krok 4: Powtórz dla footer logo (jeśli używasz)

1. W **Wygląd → Dostosuj → Footer Brand**
2. **Przełącz na angielski** w górnym pasku
3. **Ustaw Footer Logo** dla wersji angielskiej
4. **Kliknij "Opublikuj"**

---

### Krok 5: Wyczyść cache

1. Wyczyść cache strony (jeśli używasz wtyczki cache)
2. Wyczyść cache przeglądarki: **Ctrl+Shift+R** (Windows) lub **Cmd+Shift+R** (Mac)

---

### Krok 6: Sprawdź wynik

1. Odwiedź **stronę główną w wersji polskiej** - logo powinno być widoczne
2. **Przełącz na angielski** - logo powinno być widoczne
3. **Gotowe!** ✅

---

## Alternatywne rozwiązanie (jeśli powyższe nie działa)

Jeśli nadal nie działa, możliwe że WPML Media nie jest poprawnie skonfigurowany. W takim przypadku:

### Rozwiązanie: Współdzielone logo dla wszystkich języków

Dodaj ten kod do pliku `functions.php` (na końcu, przed zamykającym `?>` jeśli istnieje):

```php
// Force same logo for all languages
add_filter('theme_mod_custom_logo', 'avsec_force_same_logo_all_languages', 10, 1);
function avsec_force_same_logo_all_languages($value) {
    // Get default language
    if (function_exists('icl_get_default_language')) {
        $default_lang = icl_get_default_language();
        $current_lang = ICL_LANGUAGE_CODE;

        // If we're not in default language and logo is empty
        if ($current_lang !== $default_lang && empty($value)) {
            // Switch to default language temporarily
            global $sitepress;
            $original_lang = $sitepress->get_current_language();
            $sitepress->switch_lang($default_lang);

            // Get logo from default language
            $value = get_option('theme_mods_' . get_option('stylesheet'))['custom_logo'] ?? '';

            // Switch back
            $sitepress->switch_lang($original_lang);
        }
    }

    return $value;
}
```

**To sprawi, że logo z języka domyślnego (polskiego) będzie używane we wszystkich językach.**

---

## Jeśli nic nie pomaga - Kontakt

Jeśli problem nadal występuje, sprawdź:

1. **Czy WPML jest w pełni aktywny?**
   - Przejdź do **Wtyczki** - WPML powinien być aktywny
2. **Czy jest zainstalowany WPML Media Translation?**
   - Przejdź do **WPML → Downloads**
   - Sprawdź czy jest zainstalowany **WPML Media Translation**
3. **Wyślij screenshot** konsoli błędów przeglądarki:
   - F12 → zakładka "Console"
   - Zrób screenshot ewentualnych błędów

---

## Podsumowanie

**Najczęstsza przyczyna:** Logo musi być ustawione osobno dla każdego języka w Customizerze, ponieważ WPML przechowuje ustawienia Customizera per-język.

**Najszybsze rozwiązanie:** Przejdź do Customizera, przełącz na angielski i ustaw logo ponownie.

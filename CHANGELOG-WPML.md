# Changelog - Integracja WPML

## [Poprawka 2] - 2025-11-27 (późniejsza wersja)

### Naprawiono obsługę Customizera i usuwanie stringów

**Problem:**
- Przy usuwaniu tekstu w Customizerze, tłumaczenia nadal się pokazywały na innych językach
- W Customizerze przy wybranym języku angielskim w WPML, pokazywały się tłumaczenia zamiast oryginalnych wartości
- To powodowało zamieszanie - admin nie mógł edytować oryginalnych wartości

**Rozwiązanie:**
1. **Customizer zawsze pokazuje język domyślny:**
   - Zmodyfikowano `avsec_get_translated_theme_mod()` aby w Customizerze zawsze zwracać wartość z języka domyślnego
   - Dodano detekcję `is_customize_preview()` i sprawdzanie `customize.php` w URL
   - Teraz niezależnie od wybranego języka w WPML, Customizer edytuje wartości podstawowe

2. **Automatyczne usuwanie tłumaczeń:**
   - Gdy tekst jest usuwany w Customizerze, system automatycznie usuwa wszystkie tłumaczenia
   - Dodano logikę do `avsec_wpml_update_strings_on_save()` która usuwa tłumaczenia dla pustych wartości
   - Puste stringi nie są już zwracane z tłumaczeń

**Zmienione pliki:**
- `functions.php` (linie 315-390) - funkcja `avsec_get_translated_theme_mod()`
- `functions.php` (linie 248-291) - funkcja `avsec_wpml_update_strings_on_save()`
- `WPML-INSTRUKCJE.md` - rozszerzona sekcja "Jak to działa" i dodane nowe sekcje troubleshooting

**Jak to teraz działa:**
1. Otwórz **Wygląd → Dostosuj** (niezależnie od wybranego języka w WPML)
2. Edytuj teksty - zawsze edytujesz wartości w języku domyślnym
3. Aby usunąć tekst - wyczyść pole i kliknij "Opublikuj"
4. Tłumaczenia zostaną automatycznie usunięte
5. Zarządzaj tłumaczeniami w **WPML → String Translation**

---

## [Poprawka 1] - 2025-11-27

### Naprawiono aktualizację stringów w WPML String Translation

**Problem:**
- Po zmianie tekstów w Customizerze (np. Footer Description), w WPML String Translation pokazywał się nadal stary tekst
- Funkcja `icl_register_string()` nie aktualizowała wartości istniejących stringów

**Rozwiązanie:**
- Zmodyfikowano funkcję `avsec_wpml_update_strings_on_save()` w `functions.php`
- Dodano bezpośrednie operacje na bazie danych WPML do aktualizacji wartości stringów
- System teraz:
  1. Sprawdza czy string już istnieje w bazie WPML
  2. Jeśli istnieje - aktualizuje jego wartość
  3. Oznacza istniejące tłumaczenia jako "wymagające aktualizacji"
  4. Jeśli nie istnieje - rejestruje nowy string

**Zmienione pliki:**
- `functions.php` (linie 232-280) - funkcja `avsec_wpml_update_strings_on_save()`
- `WPML-INSTRUKCJE.md` - zaktualizowano sekcję "Tłumaczenie stringów z Customizera" i "Troubleshooting"

**Jak to teraz działa:**
1. Zmień tekst w Customizerze (w języku domyślnym)
2. Kliknij "Opublikuj"
3. Wartość w WPML String Translation zostanie automatycznie zaktualizowana
4. Istniejące tłumaczenia zostaną oznaczone jako "wymagające aktualizacji"
5. Zaktualizuj tłumaczenia w WPML → String Translation

---

## Dodane pliki

### 1. wpml-config.xml

Plik konfiguracyjny WPML definiujący:

- Pola do tłumaczenia (translate)
- Pola do kopiowania (copy)
- Niestandardowe typy postów (szkolenia)
- Taksonomie (category, post_tag)
- Teksty z panelu admina (customizer)

### 2. WPML-INSTRUKCJE.md

Kompletna dokumentacja obsługi WPML w języku polskim:

- Instrukcje konfiguracji
- Tłumaczenie stringów
- Funkcje pomocnicze
- Troubleshooting

## Zmodyfikowane pliki

### 1. functions.php

**Dodane funkcje:**

- `avsec_wpml_setup()` - Automatyczna rejestracja stringów z customizera w WPML String Translation
- `avsec_get_translated_theme_mod()` - Pobieranie przetłumaczonych wartości z customizera
- `avsec_get_current_language()` - Pobieranie kodu aktualnego języka
- `avsec_get_home_url()` - Pobieranie URL strony głównej dla aktualnego języka
- `avsec_is_wpml_active()` - Sprawdzanie czy WPML jest aktywny
- `avsec_get_translated_attachment_id()` - Pobieranie przetłumaczonego ID załącznika (dla logo, obrazków)
- `avsec_get_custom_logo_id()` - Pobieranie ID logo z obsługą WPML

**Rejestrowane stringi:**

- Footer Description
- Footer Menu 1/2/3 Title
- Contact Button Text
- Platform Button Text
- Szkolenia Archive Subtitle

### 2. template-parts/footer/footer-brand.php

**Zmiany:**

- Linia 53: Używa `avsec_get_translated_theme_mod()` dla footer_description
- Linia 108: Używa `avsec_get_translated_theme_mod()` dla contact_button_text

### 3. template-parts/footer/footer-menus.php

**Zmiany:**

- Linia 19: Używa `avsec_get_translated_theme_mod()` dla footer_menu_1_title
- Linia 39: Używa `avsec_get_translated_theme_mod()` dla footer_menu_2_title
- Linia 59: Używa `avsec_get_translated_theme_mod()` dla footer_menu_3_title

### 4. template-parts/header/header-extras.php

**Zmiany:**

- Linia 15: Używa `avsec_get_translated_theme_mod()` dla platform_button_text
- Linia 21: Zawiera już `do_action('wpml_add_language_selector')` - przełącznik języków

### 5. template-parts/header/header-title.php

**Zmiany:**

- Linia 80: Używa `avsec_get_translated_theme_mod()` dla szkolenia_archive_subtitle

### 6. template-parts/header/header-brand.php

**Zmiany:**

- Linia 18: Używa `avsec_get_custom_logo_id()` dla pobrania logo z obsługą WPML
- Linia 27: Używa `avsec_get_home_url()` dla wielojęzycznych linków
- Logo automatycznie pobiera przetłumaczoną wersję załącznika

### 7. template-parts/footer/footer-brand.php (dodatkowa aktualizacja)

**Zmiany:**

- Linia 21: Używa `avsec_get_translated_attachment_id()` dla footer logo
- Linia 28, 41, 51: Używa `avsec_get_home_url()` dla wielojęzycznych linków
- Footer logo fallback do header logo jeśli nie jest ustawiony

## Instrukcje dla developera

### Dodawanie nowych stringów do tłumaczenia

1. **W functions.php** (w funkcji `avsec_wpml_setup()`):

```php
$nowy_string = get_theme_mod('nowy_string_key');
if (!empty($nowy_string)) {
    icl_register_string('avsec', 'Nowy String Name', $nowy_string);
}
```

2. **W wpml-config.xml** (w sekcji `<custom-fields>`):

```xml
<custom-field action="translate">nowy_string_key</custom-field>
```

3. **W wpml-config.xml** (w sekcji `<admin-texts>`):

```xml
<key name="nowy_string_key">
    <key name="*" />
</key>
```

4. **W szablonie** (zamiast `get_theme_mod()`):

```php
$value = avsec_get_translated_theme_mod('nowy_string_key', 'Nowy String Name', 'Domyślna wartość');
```

### Testowanie integracji

1. Upewnij się, że WPML i WPML String Translation są zainstalowane
2. Skonfiguruj co najmniej 2 języki w WPML
3. Wypełnij wartości w WordPress Customizer
4. Odśwież stronę frontową
5. Przejdź do WPML → String Translation
6. Wyszukaj domenę "avsec" i przetłumacz stringi
7. Przełącz język i sprawdź czy tłumaczenia działają

### Kompatybilność

- WordPress: 5.0+
- PHP: 7.4+
- WPML: 4.0+
- WPML String Translation: wymagany

### Uwagi techniczne

- Wszystkie stringi są rejestrowane w domenie 'avsec'
- Funkcja `avsec_wpml_setup()` uruchamia się na akcji 'init'
- Pola ACF są automatycznie synchronizowane przez wpml-config.xml
- Niestandardowy typ wpisu 'szkolenia' jest oznaczony jako tłumaczalny
- Menu są synchronizowane automatycznie przez WPML

## Backward Compatibility

Wszystkie zmiany są w pełni kompatybilne wstecz. Jeśli WPML nie jest zainstalowany:

- Funkcje pomocnicze zwracają standardowe wartości
- `avsec_get_translated_theme_mod()` działa jak `get_theme_mod()`
- Brak błędów PHP
- Strona działa normalnie w jednym języku

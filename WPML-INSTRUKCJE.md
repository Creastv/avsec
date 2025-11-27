# Instrukcje obsługi WPML w motywie AvSec

## Wprowadzenie

Motyw AvSec został przygotowany do współpracy z wtyczką WPML (WordPress Multilingual Plugin). Ten dokument zawiera instrukcje dotyczące konfiguracji i korzystania z funkcji wielojęzyczności.

## Wymagania

- WordPress 5.0 lub nowszy
- WPML 4.0 lub nowszy
- WPML String Translation (addon do WPML)

## Konfiguracja WPML

### 1. Instalacja WPML

1. Zainstaluj i aktywuj wtyczkę WPML
2. Zainstaluj dodatek WPML String Translation
3. Przejdź do **WPML → Languages** i skonfiguruj języki

### 2. Konfiguracja języków

1. W panelu **WPML → Languages** dodaj języki, które chcesz obsługiwać
2. Wybierz domyślny język strony
3. Skonfiguruj sposób przełączania języków (flagi, nazwy języków itp.)

### 3. Tłumaczenie stringów z Customizera

Wszystkie teksty z WordPress Customizer są automatycznie rejestrowane do tłumaczenia.

#### Jak to działa:

**Automatyczna aktualizacja stringów:**

- W Customizerze **zawsze edytujesz wartości w języku domyślnym** - niezależnie od aktualnie wybranego języka w WPML
- Gdy zmienisz tekst w Customizerze (Wygląd → Dostosuj), wartość jest **automatycznie aktualizowana** w WPML String Translation
- System automatycznie oznacza tłumaczenia jako "wymagające aktualizacji" po zmianie oryginalnego tekstu
- Gdy **usuniesz tekst** w Customizerze, wszystkie tłumaczenia tego tekstu są **automatycznie usuwane**
- **Ważne:** Customizer edytuje tylko język domyślny - tłumaczenia zarządzasz w WPML → String Translation

#### Aby przetłumaczyć stringi:

1. Przejdź do **WPML → String Translation**
2. Wyszukaj domenę **avsec**
3. Znajdź stringi do tłumaczenia:

   - Footer Description
   - Footer Menu 1 Title
   - Footer Menu 2 Title
   - Footer Menu 3 Title
   - Contact Button Text
   - Platform Button Text
   - Szkolenia Archive Subtitle

4. Kliknij na każdy string i dodaj tłumaczenia dla wybranych języków

**Ważne:** Po zmianie tekstu w języku domyślnym, będziesz musiał zaktualizować tłumaczenia w innych językach.

### 4. Tłumaczenie treści

#### Strony i wpisy

1. Otwórz stronę lub wpis do edycji
2. W prawym górnym rogu zobaczysz opcje WPML
3. Kliknij ikonę + obok języka, aby utworzyć tłumaczenie
4. Wypełnij treść w wybranym języku

#### Niestandardowy typ wpisu "Szkolenia"

Typ wpisu "szkolenia" jest automatycznie skonfigurowany do tłumaczenia:

1. Przejdź do listy szkoleń
2. Kliknij ikonę + obok szkolenia, aby dodać tłumaczenie
3. Wypełnij wszystkie pola w wybranym języku

#### Menu

1. Przejdź do **Wygląd → Menu**
2. Przy każdym menu zobaczysz opcje wyboru języka
3. Utwórz osobne menu dla każdego języka

### 5. Tłumaczenie logo

Logo jest automatycznie synchronizowane między językami. Jeśli chcesz mieć **różne logo dla różnych języków**:

#### Logo w nagłówku (Header Logo)

1. Przejdź do **Media** w panelu administracyjnym
2. Znajdź plik logo, który chcesz użyć dla angielskiej wersji
3. Kliknij edycję pliku
4. W prawym górnym rogu zobaczysz opcje WPML
5. Kliknij **+** przy języku (np. angielski), aby dodać tłumaczenie
6. Prześlij nową wersję logo dla tego języka
7. Następnie w **Wygląd → Dostosuj → Tożsamość witryny**:
   - Przełącz język na angielski (góra panelu)
   - Ustaw logo angielskie
8. Powtórz dla każdego języka

#### Logo w stopce (Footer Logo)

Ten sam proces co dla logo w nagłówku, ale ustawiasz w:
**Wygląd → Dostosuj → Footer Brand → Footer Logo**

**Ważne:** Po zmianie logo, wyczyść cache strony!

### 6. Pola ACF (Advanced Custom Fields)

Motyw zawiera plik `wpml-config.xml`, który automatycznie konfiguruje, które pola ACF powinny być tłumaczone:

**Pola do tłumaczenia:**

- desc (dodatkowy opis pod tytułem)
- Wszystkie teksty z customizera

**Pola kopiowane (nie tłumaczone):**

- display_header
- bg_img
- Wszystkie obrazki i URLe
- Wszystkie ID menu
- Social media URLs

## Funkcje pomocnicze

Motyw zawiera pomocnicze funkcje PHP do obsługi WPML:

### avsec_get_translated_theme_mod()

Pobiera przetłumaczony string z WordPress Customizer:

```php
$text = avsec_get_translated_theme_mod(
    'footer_description',           // Nazwa opcji w customizer
    'Footer Description',            // Nazwa kontekstu dla WPML
    'Domyślna wartość'              // Opcjonalna wartość domyślna
);
```

### avsec_get_current_language()

Pobiera kod aktualnego języka:

```php
$lang = avsec_get_current_language();
// Zwraca np. 'pl', 'en', 'de'
```

### avsec_get_home_url()

Pobiera URL strony głównej dla aktualnego języka:

```php
$home_url = avsec_get_home_url();
```

### avsec_is_wpml_active()

Sprawdza czy WPML jest aktywny:

```php
if (avsec_is_wpml_active()) {
    // WPML jest aktywny
}
```

## Przełącznik języków

Przełącznik języków jest już dodany w nagłówku strony (plik `header-extras.php`):

```php
<?php do_action('wpml_add_language_selector'); ?>
```

Możesz dostosować wygląd przełącznika w panelu **WPML → Languages → Language switcher options**.

## Selektor języka w stopce

Jeśli chcesz dodać przełącznik języków w stopce, dodaj w pliku stopki:

```php
<?php do_action('wpml_add_language_selector'); ?>
```

## Konfiguracja wpml-config.xml

Plik `wpml-config.xml` w głównym katalogu motywu zawiera automatyczną konfigurację dla WPML. Możesz go edytować, jeśli chcesz dodać więcej pól do tłumaczenia.

### Dodawanie nowego pola do tłumaczenia

W sekcji `<custom-fields>`:

```xml
<custom-field action="translate">nazwa_pola</custom-field>
```

### Dodawanie pola, które ma być kopiowane

```xml
<custom-field action="copy">nazwa_pola</custom-field>
```

## Troubleshooting

### Stringi z Customizera nie pojawiają się w String Translation

1. Upewnij się, że zapisałeś wartości w Customizerze
2. Odśwież stronę frontową witryny (aby uruchomić funkcję `avsec_wpml_setup()`)
3. Przejdź do **WPML → String Translation** i kliknij "Scan strings"

### Po zmianie tekstu w Customizerze, w WPML String Translation pokazuje się stary tekst

**Rozwiązanie:**

- System automatycznie aktualizuje wartości stringów po zapisaniu Customizera
- Jeśli widzisz stary tekst:
  1. Odśwież stronę **WPML → String Translation** (Ctrl+R / Cmd+R)
  2. Upewnij się, że zmiany były dokonane w **języku domyślnym** strony
  3. Sprawdź czy tłumaczenia nie są oznaczone jako "wymagające aktualizacji" (pomarańczowy status)
  4. Jeśli problem nadal występuje, wyczyść cache strony i przeglądarki

**Ważne:** Po aktualizacji oryginalnego tekstu, istniejące tłumaczenia są oznaczane jako "wymagające aktualizacji" - musisz je zaktualizować ręcznie w WPML String Translation.

### Usunąłem tekst w Customizerze, ale na angielskiej wersji strony nadal się pokazuje

**Przyczyna:**

- Gdy usuniesz tekst w Customizerze, system usuwa oryginalny tekst z języka domyślnego
- Jednocześnie automatycznie usuwa wszystkie tłumaczenia tego tekstu z WPML String Translation

**Rozwiązanie:**

- Wyczyść cache strony i przeglądarki
- Sprawdź **WPML → String Translation** - tłumaczenia powinny być usunięte
- Jeśli tłumaczenia nadal istnieją, usuń je ręcznie w WPML String Translation

### W Customizerze widzę tekst w języku angielskim zamiast polskiego

**Wyjaśnienie:**

- To jest **poprawne zachowanie** - Customizer zawsze pokazuje i edytuje teksty w języku domyślnym (polskim)
- Niezależnie od tego, jaki język jest aktualnie wybrany w WPML, Customizer zawsze edytuje wartości podstawowe
- Nie możesz edytować tłumaczeń w Customizerze - to jest ograniczenie WordPress + WPML

**Dlaczego tak jest:**

- WordPress Customizer nie obsługuje natywnie wielojęzyczności
- Wartości są przechowywane raz (w języku domyślnym)
- Tłumaczenia są zarządzane osobno w **WPML → String Translation**

**Jak zarządzać tłumaczeniami:**

1. Edytuj oryginalny tekst w **Wygląd → Dostosuj**
2. Dodaj/edytuj tłumaczenia w **WPML → String Translation**

### Tłumaczenia nie są widoczne na stronie

1. Sprawdź czy wybrałeś właściwy język w przełączniku
2. Upewnij się, że stringi są przetłumaczone w **WPML → String Translation**
3. Wyczyść cache strony (jeśli używasz wtyczki do cache)
4. Sprawdź czy status tłumaczenia nie jest "wymagające aktualizacji" - jeśli tak, zaktualizuj tłumaczenie

### Przełącznik języków nie jest widoczny

1. Sprawdź czy WPML jest aktywny
2. Przejdź do **WPML → Languages → Language switcher options**
3. Upewnij się, że przełącznik jest włączony

## Wsparcie

W przypadku problemów z WPML:

- Dokumentacja WPML: https://wpml.org/documentation/
- Forum wsparcia WPML: https://wpml.org/forums/

W przypadku problemów z motywem:

- Skontaktuj się z deweloperem motywu

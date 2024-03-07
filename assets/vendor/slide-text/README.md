# jQuery.SlideText

Плагин прокрутки текста при наведении курсора мыши

## Требования
1. jQuery v2+

## Установка
```bash
npm i jquery-slidetext
```

## Подключение
```javascript
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script type="text/javascript" src="dist/jquery.slidetext.min.js"></script>
```

## Использование
CSS
```css
.slidetext {
    width: 300px;
    white-space: nowrap;
    overflow: hidden;
}

.slidetext__content {
    font-family: 'Open Sans', sans-serif;
    font-weight: 700;
}
```

HTML
```html
<div class="container-example slidetext">
    <span class="slidetext__content">
        Не слишком длинный текст, буквально немного прокрутки.
    </span>
</div>
```

JavaScript
```javascript
SlideText({
    'elbox'    : '.slidetext',
    'elcontent': '.slidetext__content',
    'speed'    : 177
});
```
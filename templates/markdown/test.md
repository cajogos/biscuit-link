# Markdown Element Test

Thanks for taking an interesting in checking out this special Biscuit Link element.

This shows the real potential of these Elements as it converts any .md file into Markdown using Parsedown by http://parsedown.org/

All you have to do is write your Markdown files and add them to your template's controller:

```php
public static function markdown()
{
    $tpl = Template::create('pages/markdown-test.tpl');

    $markdown_el = MarkdownElement::get();
    $markdown_el->setFile('test');
    $tpl->addElement('markdown_element', $markdown_el);

    $tpl->display();
}
```

This page has been generated using GitHub flavoured Markdown provided by https://sindresorhus.com

## Easy!
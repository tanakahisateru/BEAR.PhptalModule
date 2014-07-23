BEAR.PhptalModule
=============================

Introduction
------------
BEAR.PhptalModule is [PHPTAL](https://github.com/pornel/PHPTAL) adaptor extension for [BEAR.Sunday](https://github.com/koriym/BEAR.Sunday) framework.

Installation
------------
Add the package name to your `composer.json`.

```json
{
    "require": {
        "bear/phptal-module": "~0.2"
    }
}
```

Usage
------------

For example you are using [BEAR.Package](https://github.com/koriym/BEAR.Package) ...

At first install the module by modifying `YourApp\Module\App\AppModule` as:

```php
namespace YourApp\Module\App;

use BEAR\PhptalModule\Provide\TemplateEngine\Phptal\PhptalModule;

class AppModule extends AbstractModule
{
    protected function configure()
    {
        // (Existing configurations here)

        $this->install(new PhptalModule($this));
    }
}
```

Place TAL syntax mixed XHTML file into `YourApp/src/Resource/Page` directory.

### src/Resource/Page/Index.xhtml

```xhtml
<!DOCTYPE html>
<html lang="ja" metal:use-macro="layout/default.xhtml/html">
<head>
    <meta charset="utf-8" />
    <title metal:fill-slot="title">Index</title>
</head>
<body>
    <div class="container" metal:fill-slot="page">
        <h1><span tal:content="greeting" tal:omit-tag="">Some greeting message</span></h1>
        <p>template engine: PHPTAL</p>
    </div>
</body>
</html>
```

To define shared PHPTAL's macro, place another template file into `YourApp/var/lib/phptal/template/layout`.

### var/lib/phptal/template/layout/default.xhtml

```xhtml
<!DOCTYPE html>
<html lang="ja" metal:define-macro="html">
<head>
    <meta charset="utf-8" />
    <title metal:define-slot="title">title</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet" />
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container" metal:define-slot="page">page</div>
</body>
</html>
```

Run your app, enjoy!

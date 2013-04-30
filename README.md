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
        "bear/phptal-module": "*"
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

Place TAL syntax mixed XHTML file into `YourApp/Resource/Page` directory.

### Resource/Page/Index.xhtml

```xhtml
<!DOCTYPE html>
<html lang="ja" metal:use-macro="layout/default.xhtml/html">
<head>
    <meta charset="utf-8" />
    <title metal:fill-slot="title">Index</title>
</head>
<body>
    <div class="container" metal:fill-slot="page">
        <h1><span tal:content="greeting" tal:omit-tag="">Some greeting message</span> (PHPTAL)</h1>
    </div>
</body>
</html>
```

To define shared PHPTAL's macro, place another template file into `YourApp/Resource/View/layout`.

### Resource/View/layout/default.xhtml

```xhtml
<!DOCTYPE html>
<html lang="ja" metal:define-macro="html">
<head>
    <meta charset="utf-8" />
    <title metal:define-slot="title">title</title>
    <link href="/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="/assets/css/bootstrap-responsive.css" rel="stylesheet" />
    <script src="/assets/js/jquery.js"></script>
</head>
<body>
    <div class="container" metal:define-slot="page">page</div>
</body>
</html>
```

Run your app, enjoy!

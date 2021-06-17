# CodeIgniter-Templates
Template library for the CodeIgniter framework.

How to use
----------

* Load the library in aotoload.file
```php
$autoload['libraries'] = array('template');
```

* Render the view in your controller
```php
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $template->view('main_template', 'pages/main');
    }
}

/* End of file Home.php */

```

NOTE
----

PLEASE MAKE FOLDER ***PAGES*** IN FOLDER VIEWS, AND ENTER YOUR PAGE / FILE IN IT.

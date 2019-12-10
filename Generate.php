<?php


namespace base;


class Generate
{
    private $page;
    private $render = false;

    /**
     * Generate constructor.
     * @param $page Page;
     */
    public function __construct($page)
    {
        if ($page->api === false) {
            if ($page->module == 'admin') {
                $file = ADMIN_LAYOUTS . "main.php";
            } else {
                $file = COMMON_LAYOUTS . "main.php";
            }

            if (file_exists($file)) {
                $this->render = $file;
            } else {
                echo "Error in Generate class!";
                return;
            }
        }

        $this->page['page'] = $page;
    }

    public function __destruct()
    {
        if ($this->render) {
            extract($this->page);
            include $this->render;
        }
    }
}
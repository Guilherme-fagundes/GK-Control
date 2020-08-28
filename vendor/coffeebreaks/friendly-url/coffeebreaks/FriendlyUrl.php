<?php


namespace coffeebreaks;


/**
 * Class FriendlyUrl
 * @package coffeebreaks
 */
class FriendlyUrl
{
    /**
     * @var array
     */
    private $url;
    /**
     * @var
     */
    private $folder;
    /**
     * @var
     */
    private $file;

    /**
     * @var
     */
    private $route;

    /**
     * FriendlyUrl constructor.
     */
    public function __construct()
    {
        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_STRIPPED);

        $this->url = explode('/', $url);

         $this->url[0] = ($this->url[0] == '' ? 'index' : $this->url[0]);
         @$this->url[1] = ($this->url[1] ? $this->url[1] : null);

         $this->folder = $this->url[0];
         $this->file = $this->url[1];


    }

    /**
     * @return mixed
     */
    public function getFolder()
    {
        return $this->folder;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @return mixed
     */
    public function getRoute()
    {
        $this->set();
        return $this->route;
    }




    /**
     *
     */
    private function set()
    {

        if (file_exists(INCLUDE_PATH.DIRECTORY_SEPARATOR. $this->folder.'.php')){
             $this->route = INCLUDE_PATH.DIRECTORY_SEPARATOR. $this->folder.'.php';

        }elseif(file_exists(INCLUDE_PATH.DIRECTORY_SEPARATOR. $this->folder.DIRECTORY_SEPARATOR.$this->file.'.php')){
             $this->route = INCLUDE_PATH.DIRECTORY_SEPARATOR. $this->folder.DIRECTORY_SEPARATOR.$this->file.'.php';

        }else{
             $this->route = INCLUDE_PATH.DIRECTORY_SEPARATOR.'404.php';
        }

    }

}
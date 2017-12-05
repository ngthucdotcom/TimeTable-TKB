<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

/**
 * @package     FT_Framework
 * @author      Freetuts Dev Team
 * @email       freetuts.net@gmail.com
 * @copyright   Copyright (c) 2015
 * @since       Version 1.0
 * @filesource  system/core/FT_Controller.php
 */
class EX_Controller
{
    // Đối tượng view
    protected $view     = NULL;

    // Đối tượng model
    protected $model    = NULL;

    // Đối tượng library
    protected $library  = NULL;

    // Đối tượng helper
    protected $helper   = NULL;

    // Đối tượng config
    protected $config   = NULL;

    /**
     * Hàm khởi tạo
     *
     * @desc    Load các thư viện cần thiết
     */
    public function __construct()
    {
        // Loader cho config
        require_once PATH_SYSTEM . '/core/loader/EX_Config_Loader.php';
        $this->config   = new EX_Config_Loader();
        $this->config->load('config');

        // Loader Library
        require_once PATH_SYSTEM . '/core/loader/EX_Library_Loader.php';
        $this->library = new EX_Library_Loader();

        // Load Helper
        require_once PATH_SYSTEM . '/core/loader/EX_Helper_Loader.php';
        $this->helper = new EX_Helper_Loader();

        // Load View
        require_once PATH_SYSTEM . '/core/loader/EX_View_Loader.php';
        $this->view = new EX_View_Loader();
    }

    /**
     * Hàm chạy ứng dụng
     *
     * @desc    tham số truyền vào gồm controller và action
     */
}

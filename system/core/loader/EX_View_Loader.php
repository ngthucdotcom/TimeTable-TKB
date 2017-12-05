<?php
/**
 * @package     EX_Framework
 * @author      Freetuts Dev Team
 * @email       ngthuc.com@gmail.com
 * @copyright   Copyright (c) 2015
 * @since       Version 1.0
 * @filesource  system/core/loader/EX_View_Loader.php
 */

class EX_View_Loader
{
    /**
     * @desc biến lưu trữ các view đã load
     */
    private $__content = array();

    /**
     * Load view
     *
     * @param   string
     * @param   array
     * @desc    hàm load view, tham số truyền vào là tên của view và dữ liệu truyền qua view
     */
    public function load($view, $data = array())
    {
        // Chuyển mảng dữ liệu thành từng biến
        extract($data);

        // Chuyển nội dung view thành biến thay vì in ra bằng cách dùng ab_start()
        ob_start();
        require_once PATH_APPLICATION . '/views/' . $view . '.php';
        $content = ob_get_contents();
        ob_end_clean();

        // Gán nội dung vào danh sách view đã load
        $this->__content[] = $content;

        // Hiển thị toàn bộ view đã load, được dùng ở controller
        foreach ($this->__content as $html){
            echo $html;
        }
    }

    /**
     * Show view
     *
     * @desc    Hàm hiển thị toàn bộ view đã load, được dùng ở controller
     */
    // public function show()
    // {
    //     foreach ($this->__content as $html){
    //         echo $html;
    //     }
    // }
}

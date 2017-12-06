<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
/**
 * Hàm chạy ứng dụng
 */
 class EX_Model_Loader
 {
    // Đối tượng view
    protected $model     = NULL;

    // Đối tượng view
    protected $object     = NULL;


    // Hàm load model
    public function model($model, $name = '', $db_conn = FALSE)
  	{
  		if (empty($model))
  		{
  			return $this;
  		}
  		elseif (is_array($model))
  		{
  			foreach ($model as $key => $value)
  			{
  				is_int($key) ? $this->model($value, '', $db_conn) : $this->model($key, $value, $db_conn);
  			}

  			return $this;
  		}

  		$path = '';

  		// Is the model in a sub-folder? If so, parse out the filename and path.
  		if (($last_slash = strrpos($model, '/')) !== FALSE)
  		{
  			// The path is in front of the last slash
  			$path = substr($model, 0, ++$last_slash);

  			// And the model name behind it
  			$model = substr($model, $last_slash);
  		}

  		if (empty($name))
  		{
  			$name = $model;
  		}

  		if (in_array($name, $this->_EX_Models, TRUE))
  		{
  			return $this;
  		}

  		$CI =& get_instance();
  		if (isset($CI->$name))
  		{
  			throw new RuntimeException('The model name you are loading is the name of a resource that is already being used: '.$name);
  		}

  		if ($db_conn !== FALSE && ! class_exists('CI_DB', FALSE))
  		{
  			if ($db_conn === TRUE)
  			{
  				$db_conn = '';
  			}

  			$this->database($db_conn, FALSE, TRUE);
  		}

  		// Note: All of the code under this condition used to be just:
  		//
  		//       load_class('Model', 'core');
  		//
  		//       However, load_class() instantiates classes
  		//       to cache them for later use and that prevents
  		//       MY_Model from being an abstract class and is
  		//       sub-optimal otherwise anyway.
  		if ( ! class_exists('EX_Model', FALSE))
  		{
  			$app_path = APPPATH.'core'.DIRECTORY_SEPARATOR;
  			if (file_exists($app_path.'Model.php'))
  			{
  				require_once($app_path.'Model.php');
  				if ( ! class_exists('EX_Model', FALSE))
  				{
  					throw new RuntimeException($app_path."Model.php exists, but doesn't declare class EX_Model");
  				}
  			}
  			elseif ( ! class_exists('EX_Model', FALSE))
  			{
  				require_once(BASEPATH.'core'.DIRECTORY_SEPARATOR.'Model.php');
  			}

  			$class = config_item('subclass_prefix').'Model';
  			if (file_exists($app_path.$class.'.php'))
  			{
  				require_once($app_path.$class.'.php');
  				if ( ! class_exists($class, FALSE))
  				{
  					throw new RuntimeException($app_path.$class.".php exists, but doesn't declare class ".$class);
  				}
  			}
  		}

  		$model = ucfirst($model);
  		if ( ! class_exists($model, FALSE))
  		{
  			foreach ($this->_EX_Model_paths as $mod_path)
  			{
  				if ( ! file_exists($mod_path.'models/'.$path.$model.'.php'))
  				{
  					continue;
  				}

  				require_once($mod_path.'models/'.$path.$model.'.php');
  				if ( ! class_exists($model, FALSE))
  				{
  					throw new RuntimeException($mod_path."models/".$path.$model.".php exists, but doesn't declare class ".$model);
  				}

  				break;
  			}

  			if ( ! class_exists($model, FALSE))
  			{
  				throw new RuntimeException('Unable to locate the model you have specified: '.$model);
  			}
  		}
  		elseif ( ! is_subclass_of($model, 'EX_Model'))
  		{
  			throw new RuntimeException("Class ".$model." already exists and doesn't extend EX_Model");
  		}

  		$this->_EX_Models[] = $name;
  		$CI->$name = new $model();
  		return $this;
  	}

    public function load($model, $data = array())
    {
      // Chuyển đổi tên controller vì nó có định dạng là {Name}_Controller
      $model = ucfirst(strtolower($controller));

      // chuyển đổi tên action vì nó có định dạng {name}Action
      $object = strtolower($object);

      // Kiểm tra file controller có tồn tại hay không
      if (!file_exists(PATH_APPLICATION . '/controllers/' . $controller . '.php')){
          die ('Không tìm thấy controller');
      }

      // Include controller chính để các controller con nó kế thừa
      include_once PATH_SYSTEM . '/core/EX_Controller.php';

      // Load Base_Controller
      if (file_exists(PATH_APPLICATION . '/core/Base_Controller.php')){
          include_once PATH_APPLICATION . '/core/Base_Controller.php';
      }

      // Gọi file controller vào
      require_once PATH_APPLICATION . '/controllers/' . $controller . '.php';

      // Kiểm tra class controller có tồn tại hay không
      if (!class_exists($controller)){
          die ('Không tìm thấy controller');
      }

      // Khởi tạo controller
      $controllerObject = new $controller();

      // Kiểm tra action có tồn tại hay không
      if ( !method_exists($controllerObject, $object)){
          die ('Không tìm thấy object');
      }

      // Chạy ứng dụng
      $controllerObject->{$action}();
    }
}

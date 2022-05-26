<?php
class Task extends DatabaseObject
{

	protected static $table_name = "task";
    protected static $db_columns = ['id','admin_id','request_id','created_at', 'updated_at','deleted'];

    public $id;
    public $admin_id;
	public $request_id;
    public $created_at;
	public $updated_at;
	public $deleted;
 
    public $counts;

    public function __construct($args=[])
    {

        $this->admin_id         = $args['admin_id'] ?? '';
		$this->request_id 		= $args['request_id'] ?? '';
        $this->created_at       = $args['created_at'] ?? date('Y-m-d H:i:s');
		$this->updated_at 	    = $args['updated_at'] ?? '';
		$this->deleted 		    = $args['deleted'] ?? '';
    }

    

    public static function find_by_admin_id($admin_id)
    {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE admin_id='" . self::$database->escape_string($admin_id) . "'";
        $obj_array = static::find_by_sql($sql);
        if (!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }



}
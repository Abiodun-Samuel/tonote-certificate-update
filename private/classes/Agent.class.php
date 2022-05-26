<?php
class Agent extends DatabaseObject
{
    protected static $table_name = "agent";
    protected static $db_columns = ['id','agent_id','agent_type','first_name','last_name','email','phone', 'accum_point', 'discount','profile_img','account_status', 'location', 'bank_name','account_number','created_at','updated_at','created_by','deleted'];

    public $id;
    public $agent_id;
    public $agent_type;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $accum_point;
    public $discount;
    public $profile_img;
    public $account_status;
    public $location;
    public $bank_name;
    public $account_number;
    public $created_at;
    public $updated_at;
    public $created_by;
    public $deleted;

 
    public $counts; 

    const AGENT_TYPE = [
        1 => 'Court Agent',
        2 => 'Online Affiliate',
    ];
   
    const ACCOUNT_STATUS = [
      1 => 'Active',
      0 => 'Inactive',
    ];

    const LOCATION = [
      1 => 'Ikeja',
      2 => 'Igbosere',
    ];
    
    public function __construct($args=[])
    {
        $this->agent_id = $args['agent_id'] ?? '';
        $this->agent_type = $args['agent_type'] ?? 1;
        $this->first_name = $args['first_name'] ?? '';
        $this->last_name = $args['last_name'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->phone = $args['phone'] ?? '';
        $this->accum_point = $args['accum_point'] ?? '';
        $this->discount = $args['discount'] ?? '';
        $this->profile_img = $args['profile_img'] ?? '';
        $this->account_status = $args['account_status'] ?? 1;
        $this->location = $args['location'] ?? '';
        $this->bank_name = $args['bank_name'] ?? '';
        $this->account_number = $args['account_number'] ?? '';
        $this->created_at = $args['created_at'] ?? date('Y-m-d H:i:s');
        $this->updated_at = $args['updated_at'] ?? '';
        $this->created_by = $args['created_by'] ?? '';
        $this->deleted = $args['deleted'] ?? '';
    }

     

    public function full_name()
    {
        return $this->first_name . " " . $this->last_name;
    }


    
    protected function validate()
    {
        $this->errors = [];

        if (is_blank($this->first_name)) {
            $this->errors[] = "First name cannot be blank.";
        } elseif (!has_length($this->first_name, array('min' => 2, 'max' => 255))) {
            $this->errors[] = "First name must be between 2 and 255 characters.";
        }

        if (is_blank($this->last_name)) {
            $this->errors[] = "Last name cannot be blank.";
        } elseif (!has_length($this->last_name, array('min' => 2, 'max' => 255))) {
            $this->errors[] = "Last name must be between 2 and 255 characters.";
        }
    
        // if(is_blank($this->image)) {
        //    $this->errors[] = "Kindly Select a image.";
        // }

        if (is_blank($this->email)) {
            $this->errors[] = "Email cannot be blank.";
        }  elseif (!has_valid_email_format($this->email)) {
            $this->errors[] = "Email must be a valid format.";
        }elseif (!has_unique_email_agent($this->email, $this->id ?? 0)) {
          $this->errors[] = "Email already exist. Try another.";
        }

        if (is_blank($this->phone)) {
            $this->errors[] = "Phone number cannot be blank.";
        } 

        

        return $this->errors;
    }

    public static function find_by_email($email)
    {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE email='" . self::$database->escape_string($email) . "'";
        $obj_array = static::find_by_sql($sql);
        if (!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }

    public static function find_by_agent_id($agent_id)
    {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE agent_id='" . self::$database->escape_string($agent_id) . "'";
        $obj_array = static::find_by_sql($sql);
        if (!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }

    // public static function find_by_acctount_type($account_status)
    // {
    //     $sql = "SELECT * FROM " . static::$table_name . " ";
    //     $sql .= "WHERE account_status ='" . self::$database->escape_string($account_status) . "'";
    //     $sql .= " AND (deleted IS NULL OR deleted = 0 OR deleted = '') ";
    //     $sql .= " ORDER BY id DESC ";
    //     $obj_array = static::find_by_sql($sql);
    //     if (!empty($obj_array)) {
    //         return $obj_array;
    //     } else {
    //         return false;
    //     }
    // }
}

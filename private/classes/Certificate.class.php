<?php
class Certificate extends DatabaseObject
{
    protected static $table_name = "certificate";
    protected static $db_columns = ['id','fullname','email','commission_no','certificate_no', 'score','created_at','deleted'];

    public $id;
    public $fullname;
    public $email;
    public $commission_no;
    public $certificate_no;
    public $score;
    public $created_at;
    public $deleted;

 
    public $counts;



    public function __construct($args=[])
    {
        $this->fullname = $args['fullname'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->commission_no = $args['commission_no'] ?? '';
        $this->certificate_no = $args['certificate_no'] ?? '';
        $this->score = $args['score'] ?? '';
        $this->created_at = $args['created_at'] ?? date('Y-m-d H:i:s');
        $this->deleted = $args['deleted'] ?? '';
    }


    protected function validate()
    {
        $this->errors = [];

        if (is_blank($this->fullname)) {
            $this->errors[] = "Fullname cannot be blank.";
        }

        if (is_blank($this->email)) {
            $this->errors[] = "Email cannot be blank.";
        }elseif (!has_unique_email_cert($this->email, $this->id ?? 0)) {
          $this->errors[] = "Email address must be unique.";
        }

        if (is_blank($this->commission_no)) {
            $this->errors[] = "Commission Number cannot be blank.";
        } elseif (!has_length($this->commission_no, array('min' => 6, 'max' => 6))) {
            $this->errors[] = "Commission Number must be up to 6 digit.";
        }elseif (!has_unique_commission_no($this->commission_no, $this->id ?? 0)) {
          $this->errors[] = "You have already taken this assessment.";
        }
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

    public static function find_by_certificate_no($certificate_no)
    {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE certificate_no='" . self::$database->escape_string($certificate_no) . "'";
        $obj_array = static::find_by_sql($sql);
        if (!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }

     public static function find_by_commission_no($commission_no)
    {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE commission_no='" . self::$database->escape_string($commission_no) . "'";
        $obj_array = static::find_by_sql($sql);
        if (!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }

    

    
}

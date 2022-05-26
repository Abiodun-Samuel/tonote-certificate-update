<?php
class Blog extends DatabaseObject
{
   protected static $table_name = "blog";
   protected static $db_columns = ['id', 'title', 'slug', 'image', 'summary', 'created_at', 'updated_at', 'created_by', 'deleted'];

   public $id;
   public $title;
   public $slug;
   public $image;
   public $summary;
   public $created_at;
   public $updated_at;
   public $created_by;
   public $deleted;

   public $counts;


   public function __construct($args = [])
   {
      $this->title = $args['title'] ?? '';
      $this->summary = $args['summary'] ?? '';
      $this->slug = $args['slug'] ?? '';
      $this->created_by = $args['created_by'] ?? '';
      $this->updated_at = $args['updated_at'] ?? '';
      $this->created_at = $args['created_at'] ?? date('Y-m-d H:i:s');
      $this->deleted = $args['deleted'] ?? '';
      $this->image = $args['image'] ?? 'default.jpg';
   }


   protected function validate()
   {
      $this->errors = [];

      if (is_blank($this->title)) {
         $this->errors[] = "Title cannot be blank.";
      }
      if (is_blank($this->summary)) {
         $this->errors[] = "Summary cannot be blank.";
      }

      return $this->errors;
   }
}

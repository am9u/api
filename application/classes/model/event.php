<?php defined('SYSPATH') or die('No direct script access.');

class Model_Event extends Mongo_Document
{
   protected $name = 'events';
   protected $db = 'event_store'; 
}

/**
 * @TODO: add timezone support
 * @TODO: refactor Model_Event::check(), Model_Event::values() and Model_Event::save() to match functionality in Model_Venue
 */
// class Model_Event extends CacheORM 
// {
//     protected $_db = 'event_warehouse';
// 
//     // relationships
//     protected $_belongs_to = array('venue' => array());
// 
//     protected $_has_many = array(
// 
//         // experimental tag mapping
//         'tags' => array('through' => 'tagmaps'),
//     );
// 
//     // validation
//     protected $_rules = array(
//         'name' => array('not_empty' => array()),
//         'datetime' => array('not_empty' => array()),
//         'venue_id' => array('not_empty' => array()),
//     );
// 
//     // placeholder for establishing has_many relationship to tags
//     private $_tags = null;
// 
//     /**
//      * Creates tag relationships and sets values
//      */
//     public function values($values)
//     {
// 
//         //print_r($values);
//         //Kohana::$log->add('event->create() tags size', count($values['tags'])); 
//         // Kohana::$log->add('event->create() tags is array', is_array($values->tags));
// 
//         if(isset($values['tags']) AND is_array($values['tags']))
//         {
//            Kohana::$log->add('event->create()', '$values has tags array');
//            foreach($values['tags'] as $tag)
//            {
//                 if(is_numeric($tag))
//                 {
//                     $model = ORM::factory('tag', intval($tag));
//                     if($model->loaded())
//                     {
//                         if($this->_tags === NULL)
//                         {
//                             $this->_tags = array();
//                         }
//                         array_push($this->_tags, $model);
//                     }
//                 }
//                 else
//                 {
//                     $model = ORM::factory('tag', array('name' => $tag));
//                     if( ! $model->loaded())
//                     {
//                         $model = ORM::factory('tag')->values(array('name' => $tag))->save();
//                     }
//                     if($this->_tags === NULL)
//                     {
//                         $this->_tags = array();
//                     }
//                     array_push($this->_tags, $model);
//                 }
//            }
//         }
//         return parent::values($values);
//     }
// 
//     /**
//      * Creates and associates a unique event tag for this event
//      */
//     public function save()
//     {
//         parent::save();
// 
//         // if event is created (not updated), generate it's unique event tag
//         if($this->tags->where('name', '=', $this->name.': '.$this->id)->count_all() < 1) {
//             $core_tag_name = ucfirst($this->_object_name);
// 
//             $event_parent_tag = ORM::factory('tag')
//                                     ->core_tag($core_tag_name)
//                                     ->find();
// 
//             // autocreate internal tag for this event. eventually we should tagname to be event.name_event.date, ie: A Fan Ti_2010.11.01... or something like that
//             $event_tag = ORM::factory('tag')
//                             ->values(array('name' => $this->name.': '.$this->datetime, 'parent_id' => $event_parent_tag->id))
//                             ->save();
// 
//             // associate autogenerated tag to event
//             // $this->add('tags', $event_parent_tag); 
//             $this->add('tags', $event_tag); 
//         }
// 
//         // associate tags
//         if($this->_tags !== NULL)
//         {
//             foreach($this->_tags as $tag)
//             {
//                 $this->add('tags', $tag);
//             }
//             $this->_tags = null;
//         }
//     }
// }



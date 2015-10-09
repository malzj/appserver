<?php
namespace Album\Model;
use Think\Model;
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 2015/10/9
 * Time: 10:40
 */
class ReplysModel extends RelationModel
{
    protected $_link = array(
        'Picture' => array(
            'mapping_type'  => self::BELONGS_TO,
            'class_name'    => 'Replys',
            'foreign_key'   => 'picture_id',
            'mapping_name'  => 'Picture',
            'mapping_order' => 'add_date desc'
        ),

    );
}
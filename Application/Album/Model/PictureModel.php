<?php
namespace Album\Model;
use Think\Model;
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 2015/10/9
 * Time: 10:08
 */
class PictureModel extends RelationModel
{
    protected $_link = array(
        'Picture' => array(
            'mapping_type'  => self::BELONGS_TO,
            'class_name'    => 'Picture',
            'foreign_key'   => 'album_id',
            'mapping_name'  => 'Album',
            'mapping_order' => 'add_date desc'
        ),
        'Picture' => array(
            'mapping_type'  => self::HAS_MANY,
            'class_name'    => 'Picture',
            'mapping_name'  => 'Replys',
            'mapping_order' => 'add_date desc'
        ),
    );
}
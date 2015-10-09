<?php
namespace Album\Model;
use Think\Model;
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 2015/10/9
 * Time: 9:46
 */
class AlbumModel extends RelationModel
{
    protected $_link = array(
        'Album' => array(
            'mapping_type'  => self::HAS_MANY,
            'class_name'    => 'Album',
            'mapping_name'  => 'Picture',
            'mapping_order' => 'add_date desc'
        ),
    );
}
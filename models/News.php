<?php

namespace App\Models;

/**
 * Class News
 * @author iworkshop84
 *
 * @property integer $id;
 * @property string $title;
 * @property string $text;
 * @property string posttime;
 * @property string updatetime;
 *
 */
class News
    extends AbstractModel
{
    protected static $allowedColls = ['id','title','text','posttime','updatetime'];
    protected static $table = 'posts';









}
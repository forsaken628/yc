<?php
/**
 * Created by PhpStorm.
 * User: dt.thxopen.com
 * Date: 2014/12/7
 * Time: 11:13
 */
namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\BadRequestHttpException;

/**
 *
 *
 */
class OrganTable extends Model
{
    public
        $offset, $limit,
        $sort = 'id', $order,
        $search;

    public function rules()
    {
        return [
            [['offset', 'limit'], 'integer'],
            ['search', 'safe'],
            [['sort', 'order', 'search'], 'string'],
        ];
    }

    public function run()
    {
        if (!$this->validate()) {
            throw new BadRequestHttpException;
        }
        $query = Organ::find()
            ->select(['id', 'org_name', 'org_app_name'])
            ->asArray();

        if ($this->limit != null) {
            $query->limit($this->limit);
            if ($this->offset > 0) {
                $query->offset($this->offset);
            }
        }

        $order = $this->order == 'desc' ? SORT_DESC : SORT_ASC;

        if ($this->sort == 'org_name') {
            $query->orderBy(["CONVERT(org_name USING gbk)" => $order]);
        } else {
            $query->orderBy([$this->sort => $order]);
        }

        if ($this->search != null) {
            $query->where(['like', 'org_name', $this->search]);
        }

        return [
            'total' => $query->count(),
            "rows" => $query->all()
        ];
    }
}
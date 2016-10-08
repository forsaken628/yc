<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\BadRequestHttpException;

/**
 *
 *
 */
class LogTable extends Model
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
        $query = Log::find()
            ->with('user');
//            ->select(['id', 'username', 'type'])
        //->asArray();

        if ($this->limit != null) {
            $query->limit($this->limit);
            if ($this->offset > 0) {
                $query->offset($this->offset);
            }
        }

        $order = $this->order == 'desc' ? SORT_DESC : SORT_ASC;

//        if ($this->sort == 'org_name') {
//            $query->orderBy(["CONVERT(org_name USING gbk)" => $order]);
//        } else {
        $query->orderBy([$this->sort => $order]);
        //}

//        if ($this->search != null) {
//            $query->where(['like', 'org_name', $this->search]);
//        }

        $logs = $query->all();
        foreach ($logs as $index => $log) {
            $logs[$index]->prefix = $log->user->username . '(' . $log->user->getUserType() . ')';
            $logs[$index]->log_time=Yii::$app->formatter->asDateTime(intval($logs[$index]->log_time));
        }
        return [
            'total' => $query->count(),
            "rows" => $logs
        ];
    }
}
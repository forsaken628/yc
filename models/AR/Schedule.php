<?php

namespace app\models\AR;

use Yii;
use Carbon\Carbon;

/**
 * This is the model class for table "{{%schedule}}".
 *
 * @property integer $id
 * @property integer $teacher_id
 * @property integer $course_id
 * @property integer $venue_id
 * @property string $start_at
 * @property integer $duration
 * @property integer $has_repeat
 * @property integer $weekly 0x40=SUNDAY 0x20=MONDAY 0x01=SATURDAY
 * @property integer $biweekly
 * @property integer $month
 * @property integer $has_end
 * @property integer $end_on
 * @property string $end_at
 *
 * @property Period[] $periods
 * @property Course $course
 * @property Teacher $teacher
 * @property Venue $venue
 * @property array $periodPlans
 * @property string $description
 *
 */
class Schedule extends \yii\db\ActiveRecord
{
    const NO_REPEAT = 0;
    const DAILY_REPEAT = 1;
    const WEEKLY_REPEAT = 2;
    const BIWEEKLY_REPEAT = 3;
    const MONTH_REPEAT = 4;
    const NEVER_END = 0;
    const END_ON_COUNT = 1;
    const END_AT_TIME = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%schedule}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teacher_id', 'course_id', 'venue_id'], 'required'],
            [['teacher_id', 'course_id', 'venue_id', 'duration', 'has_repeat', 'weekly', 'biweekly', 'month', 'has_end', 'end_on'], 'integer'],
            [['start_at', 'end_at'], 'safe'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::className(), 'targetAttribute' => ['teacher_id' => 'id']],
            [['venue_id'], 'exist', 'skipOnError' => true, 'targetClass' => Venue::className(), 'targetAttribute' => ['venue_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'teacher_id' => 'Teacher ID',
            'course_id' => 'Course ID',
            'venue_id' => 'Venue ID',
            'start_at' => 'Start At',
            'duration' => 'Duration',
            'has_repeat' => 'Has Repeat',
            'weekly' => 'Weekly',
            'biweekly' => 'Biweekly',
            'month' => 'Month',
            'has_end' => 'Has End',
            'end_on' => 'End On',
            'end_at' => 'End At',
        ];
    }

    public function getDescription()
    {
        $d = date('Y-m-d起,', $this->start_at);
        switch ($this->has_repeat) {
            case Schedule::NO_REPEAT:
                $d = date('Y-m-d H:i:s', $this->start_at);
                break;
            case Schedule::DAILY_REPEAT:
                $d .= '每天' . date('H:i:s', $this->start_at);
                break;
            case Schedule::WEEKLY_REPEAT:
                $a = [];
                $b = ['日', '一', '二', '三', '四', '五', '六'];
                for ($i = 1; $i < 7; $i++) {
                    if (0x40 >> $i & $this->weekly) {
                        $a[] = $b[$i];
                    }
                }
                if (0x40 & $this->weekly) {
                    $a[] = $b[0];
                }
                $d .= '每周星期' . implode('，', $a) . date('H:i:s', $this->start_at);
                break;
            case Schedule::BIWEEKLY_REPEAT:
                $a = [];
                $b = ['日', '一', '二', '三', '四', '五', '六'];
                for ($i = 1; $i < 7; $i++) {
                    if (0x40 >> $i & $this->biweekly) {
                        $a[] = $b[$i];
                    }
                }
                if (0x40 & $this->biweekly) {
                    $a[] = $b[0];
                }
                $d .= '每两周的星期' . implode('，', $a) . date('H:i:s', $this->start_at);
                break;
            case Schedule::MONTH_REPEAT:
                $d .= '每月' . date('d日 H:i:s', $this->start_at);
                break;
        }
        if ($this->has_repeat && $this->has_end) {
            switch ($this->has_end) {
                case Schedule::END_ON_COUNT:
                    $d .= "(共{$this->end_on}次)";
                    break;
                case Schedule::END_AT_TIME:
                    $d .= '(至' . date('Y-m-d H:i:s', $this->end_at) . '止)';
                    break;
            }
        }
        return $d;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriods()
    {
        return $this->hasMany(Period::className(), ['schedule_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::className(), ['id' => 'teacher_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVenue()
    {
        return $this->hasOne(Venue::className(), ['id' => 'venue_id']);
    }

    /**
     * @param $upperLim
     * @param $lowerLim
     * @return array
     * @throws \Exception
     */
    public function getPeriodPlans($upperLim, $lowerLim)
    {
        //所有时间戳范围均为左闭右开区间。
        $upperLim = Carbon::parse($upperLim);
        $lowerLim = Carbon::parse($lowerLim);
        $startAt = Carbon::createFromTimestamp($this->start_at);
        $endAt = $startAt->copy()->addSeconds($this->duration);
        $lastEnd = Carbon::createFromTimestamp($this->end_at);
        $re = [];
        switch ($this->has_repeat) {
            case Schedule::NO_REPEAT:
                if ($startAt < $lowerLim && $endAt > $upperLim) {
                    $re[] = [$startAt, $endAt];
                }
                return $re;
                break;
            case Schedule::DAILY_REPEAT:
                if ($endAt <= $upperLim) {
                    $m = $startAt->copy()->addDays($upperLim->diffInDays($endAt));//名义最近结束
                    $n = $m->copy()->subSeconds($this->duration);
                } elseif ($startAt < $lowerLim && $endAt > $upperLim) {
                    $n = $startAt;
                    $m = $n->copy()->addSeconds($this->duration);
                } else {
                    return $re;
                }
                if ($this->has_end == Schedule::END_ON_COUNT) {
                    if (!$this->end_on) {
                        throw new \Exception("Null Value");
                    }
                    $lastEnd = $endAt->copy()->addDays($this->end_on - 1);
                }
                while ($n <= $lowerLim) {
                    if ($this->has_end != Schedule::NEVER_END && $m > $lastEnd) {
                        break;
                    }
                    if ($n > $upperLim) {
                        $re[] = [$n->copy(), $m->copy()];
                    }
                    $n->addDay();
                    $m->addDay();
                }
                return $re;
                break;
            case Schedule::WEEKLY_REPEAT:
                if (!$this->weekly) {
                    throw new \Exception("Error Value");
                }
                if ($endAt <= $upperLim) {
                    $m = $endAt->copy()->addWeeks($upperLim->diffInWeeks($endAt));//名义最近结束
                    $n = $m->copy()->subSeconds($this->duration);
                } elseif ($startAt < $lowerLim && $endAt > $upperLim) {
                    $n = $startAt;
                    $m = $n->copy()->addSeconds($this->duration);
                } else {
                    return $re;
                }
                if ($this->has_end == Schedule::END_ON_COUNT) {
                    if (!$this->end_on) {
                        throw new \Exception("Null Value");
                    }
                    $c = 0;
                    for ($i = 0; $i < 7; $i++) {
                        if ($this->weekly & (0x40 >> $i)) {
                            $c++;//每周次数
                        }
                    }
                    if ($endAt <= $upperLim) {
                        $count = $this->end_on - $upperLim->diffInWeeks($endAt) * $c;
                    } else {
                        $count = $this->end_on;
                    }
                }
                while ($n <= $lowerLim) {
                    if ($this->has_end == Schedule::END_AT_TIME && $m > $lastEnd) {
                        break;
                    }
                    if (0x40 >> $n->dayOfWeek & $this->weekly) {
                        if ($this->has_end == Schedule::END_ON_COUNT) {
                            if ($count <= 0) {
                                break;
                            } else {
                                $count--;
                            }
                        }
                        if ($n >= $upperLim) {
                            $re[] = [$n->copy(), $m->copy()];
                        }
                    }
                    $n->addDay();
                    $m->addDay();
                }
                return $re;
                break;
            case Schedule::BIWEEKLY_REPEAT:
                if (!$this->biweekly) {
                    throw new \Exception("Error Value");
                }
                if ($endAt <= $upperLim) {
                    $m = $endAt->copy()->addWeeks(intval($upperLim->diffInWeeks($endAt) / 2) * 2);//名义最近结束
                    $n = $m->copy()->subSeconds($this->duration);
                } elseif ($startAt < $lowerLim && $endAt > $upperLim) {
                    $n = $startAt->copy();
                    $m = $n->copy()->addSeconds($this->duration);
                } else {
                    return $re;
                }
                if ($this->has_end == Schedule::END_ON_COUNT) {
                    if (!$this->end_on) {
                        throw new \Exception("Null Value");
                    }
                    $c = 0;
                    for ($i = 0; $i < 7; $i++) {
                        if ($this->biweekly & (0x40 >> $i)) {
                            $c++;//每周次数
                        }
                    }
                    if ($endAt <= $upperLim) {
                        $count = $this->end_on - intval($upperLim->diffInWeeks($endAt) / 2) * $c;
                    } else {
                        $count = $this->end_on;
                    }
                }
                while ($n <= $lowerLim) {
                    if ($this->has_end == Schedule::END_AT_TIME && $m > $lastEnd) {
                        break;
                    }
                    if (($n->weekOfYear % 2 == $startAt->weekOfYear % 2)
                        && 0x40 >> $n->dayOfWeek & $this->biweekly
                    ) {
                        if ($this->has_end == Schedule::END_ON_COUNT) {
                            if ($count <= 0) {
                                break;
                            } else {
                                $count--;
                            }
                        }
                        if ($n >= $upperLim) {
                            $re[] = [$n->copy(), $m->copy()];
                        }
                    }
                    $n->addDay();
                    $m->addDay();
                }
                return $re;
                break;
            case Schedule::MONTH_REPEAT:
                if ($startAt >= $lowerLim) {
                    return $re;
                }
                if ($this->has_end == Schedule::END_ON_COUNT) {
                    $count = $this->end_on;
                }
                for ($i = 0; ; $i++) {
                    $n = $startAt->copy()->addMonths($i);
                    if ($n->day != $startAt->day) {
                        $n->subMonth()->day = $n->daysInMonth;
                    }
                    $m = $n->copy()->addSeconds($this->duration);
                    if ($n > $lowerLim) {
                        break;
                    }
                    if ($this->has_end == Schedule::END_AT_TIME && $m > $lastEnd) {
                        break;
                    }
                    if ($this->has_end == Schedule::END_ON_COUNT) {
                        if ($count <= 0) {
                            break;
                        } else {
                            $count--;
                        }
                    }
                    if ($n >= $upperLim) {
                        $re[] = [$n->copy(), $m->copy()];
                    }
                }
                break;
            default:
                throw new \Exception("Error Value");
        }
        return $re;
    }
}

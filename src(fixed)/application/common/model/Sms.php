<?php

namespace app\common\model;

use \think\Model;

class Sms extends Model
{
    protected $auto = ['ip'];

    public function setIpAttr($value)
    {
        return request()->ip();
    }
    /**
     * 验证码有效时长
     * @var int
     */
    protected $expire = 120;

    /**
     * 最大允许检测的次数
     * @var int
     */
    protected $maxCheckNums = 10;

    /**
     * 获取最后一次手机发送的数据
     *
     * @param   int    $mobile 手机号
     * @param   string $event  事件
     * @return  Sms
     */
    public function get($mobile, $event = 'default')
    {
        $sms = self::where(['mobile' => $mobile, 'event' => $event])
            ->order('id', 'DESC')
            ->find();
        hook('smsGet', $sms);
        return $sms ? $sms : null;
    }

    /**
     * 发送验证码
     *
     * @param   int    $mobile 手机号
     * @param   int    $code   验证码,为空时将自动生成4位数字
     * @param   string $event  事件
     * @return  boolean
     */
    public function send($mobile, $code = null, $event = 'default')
    {
        $code = is_null($code) ? mt_rand(1000, 9999) : $code;
        $time = time();
        $sms = self::create(['event' => $event, 'mobile' => $mobile, 'code' => $code, 'create_time' => $time]);
        $result = hook('smsSend', $sms, true, true);
        if (!$result) {
            $sms->delete();
            return false;
        }
        return true;
    }

    /**
     * 校验验证码
     *
     * @param   int    $mobile 手机号
     * @param   int    $code   验证码
     * @param   string $event  事件
     * @return  boolean
     */
    public function check($mobile, $code, $event = 'default')
    {
        $time = time() - $this->expire;
        $sms = self::where(['mobile' => $mobile, 'event' => $event])
            ->order('id', 'DESC')
            ->find();
        if ($sms) {
            if ($sms['create_time'] > $time && $sms['times'] <= $this->maxCheckNums) {
                $correct = $code == $sms['code'];
                if (!$correct) {
                    $sms->times = $sms->times + 1;
                    $sms->save();
                    return false;
                } else {
                    $result = hook('smsCheck', $sms);
                    return $result;
                }
            } else {
                // 过期则清空该手机验证码
                $this->flush($mobile, $event);
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * 清空指定手机号验证码
     *
     * @param   int    $mobile 手机号
     * @param   string $event  事件
     * @return  boolean
     */
    public function flush($mobile, $event = 'default')
    {
        self::where(['mobile' => $mobile, 'event' => $event])
            ->delete();
        hook('smsFlush');
        return true;
    }
}

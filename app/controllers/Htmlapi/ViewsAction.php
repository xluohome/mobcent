<?php
/**
 * Created by PhpStorm.
 * User: congjie
 * Date: 16/9/21
 * Time: 下午3:30
 */

class ViewsAction extends MobcentAction
{
    public function run($tid, $count = 1)
    {
        $res   = $this->initWebApiArray();
        $views = DzForumThread::getThreadView($tid, $count);
        if(!$views) {
            echo WebUtils::outputWebApi(WebUtils::makeErrorInfo_oldVersion($res, '帖子不存在'));
        }
        $res['body']['hits'] = $views;
        echo WebUtils::outputWebApi($res, '', false);
    }
}
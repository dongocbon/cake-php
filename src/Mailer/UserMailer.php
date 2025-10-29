<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
    public function welcome($user)
    {
        $this
            ->setTo($user->email)
            ->setSubject('Chào mừng bạn!')
            ->setEmailFormat('html')
            ->setViewVars(['user' => $user])
            ->viewBuilder()
            ->setTemplate('welcome');
    }
}

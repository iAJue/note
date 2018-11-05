<?php
namespace App\libraries\phpmail;
/**
 * 邮箱发信类
 */
final class Mail{

	private $host = 'smtp.163.com'; // QQ 邮箱的服务器地址
    private $port = 25; // smtp 服务器的远程服务器端口号
    private $smtp = 'tls'; // 使用 ssl 加密方式登录
    private $chaeset = 'UTF-8'; // 设置发送的邮件的编码
    private $mailer = '';

    private $username = ''; // 授权登录的账号
    private $password = ''; // 授权登录的密码
    private $nickname = '萌音云笔记'; // 发件人的昵称

    /**
     * 初始化
     * @param [type]  $username 账号
     * @param [type]  $password 密码
     * @param [type]  $nickname 昵称
     * @param boolean $debug    调试模式
     */
    public function __construct($username,$password,$nickname,$debug = false)
    {
    	$this->username = $username;
    	$this->password = $password;
    	$this->nickname = $nickname;
        $this->mailer = new PHPMailer();
        $this->mailer->SMTPDebug = $debug ? 1 : 0;
        $this->mailer->isSMTP(); // 使用 SMTP 方式发送邮件
    }

    private function loadConfig()
    {
        /* Server Settings  */
        $this->mailer->SMTPAuth = true; // 开启 SMTP 认证
        $this->mailer->Host = $this->host; // SMTP 服务器地址
        $this->mailer->Port = $this->port; // 远程服务器端口号
        $this->mailer->SMTPSecure = $this->smtp; // 登录认证方式
        /* Account Settings */
        $this->mailer->Username = $this->username; // SMTP 登录账号
        $this->mailer->Password = $this->password; // SMTP 登录密码
        $this->mailer->From = $this->username; // 发件人邮箱地址
        $this->mailer->FromName = $this->nickname; // 发件人昵称（任意内容）
        /* Content Setting  */
        $this->mailer->isHTML(true); // 邮件正文是否为 HTML
        $this->mailer->CharSet = $this->chaeset; // 发送的邮件的编码
    }


    /**
     * Send Email
     * @param $email [收件人]
     * @param $title [主题]
     * @param $content [正文]
     * @return bool [发送状态]
     */
    public function send($email, $title, $content)
    {
        $this->loadConfig();
        $this->mailer->addAddress($email); // 收件人邮箱
        $this->mailer->Subject = $title; // 邮件主题
        $this->mailer->Body = $content; // 邮件信息
        return (bool)$this->mailer->send(); // 发送邮件
    }
}

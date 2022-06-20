# sc-site-manager

“|简·陋| - 网站配置快捷工具” 是一个可以轻松管理网站各项事务的工具。

本工具需要登录后才能进行管理。默认账号`admin`，密码`123456`。你可以在`index.php`的文件开头中进行修改。

通过使用本工具，您可以：
- 管理子域名

要使用此工具，您需要：
1. 将此仓库克隆到您的网站下，例如如果您的网站在`/var/www`下，您可以克隆到`/var/www/mamager`
2. 修改目录下的`config.default.php`为`config.php`并配置
3. 在apache的配置文件中添加一行类似`IncludeOptional /var/www/manager/--file/cfg/*.conf`的语句，来包含所有`--file/`下的配置文件
4. 只要别在文件夹中访问您的网站（比如`www.xxx.com/manager`是在文件夹中，`manager.xxx.com`就不是），您就可以愉快的进行管理了

# sc-site-manager

*{ \~✨Simple & Crude✨\~ } - Site Manager* is a tool used for manage your website easily.

If you want to manage, you need to login first. The default username is `admin`, password is `123456`. You can change at the top of `index.php`.

Through this tool, you can:
- manage sub domain

To use this tool, you need:
1. clone this repository to your website. For example, if your website is `/var/www`, you can clone to `/var/www/manager`.
2. Rename `config.default.php` to `config.php` and configure it.
3. Add a command like `IncludeOptional /var/www/manager/--file/cfg/*.conf` to apache.conf to include all the configuration file in `--file/`.
4. There is one thing need attention : do not visit in folder (For example, `www.xxx.com/manager` is in folder, `manager.xxx.com` is not). Then you can visit your website to manage.

<?php

/**用户数组 */
const USER = array(
	'admin' => '123456'
);

/**默认端口 */
const PORT = 8081;

/**默认根目录 */
const ROOT = '/mnt';

/**子域名设置相关配置 */
const F_HOST = array(
	// 在每个子域名配置文件末尾附加的规则
	'ADDI' => <<<ADDI_END

	ADDI_END,
	// 默认访问目录
	'DEF_DIR' => '/wwwroot',
);

pre-commit hook
==================
by dushengchen@gmail.com


功能简述
========
1、在提交代码（git commit）到git库时，本钩子被触发。  
2、调用phpcbf和phpcs，来做代码检查并尝试自动修复代码样式。  
3、将修复后的代码提交到git库中。  



安装步骤
========
假设目录结构：

    YOUR_PROJECT_ROOT/
      |—— pre-commit
      |——ruleset.xml
      |—— vend0r/
            |——bin/
                |——phpcs
                |——phpcbf

1、安装依赖PHP_CodeSniffer，定义代码样式，本例中使用[FunPlus-Coding-Standards](https://github.com/funplus/FunPlus-Coding-Standards)。  
2、配置钩子，参考如下配置。  
3、git中注册钩子。

    cd YOUR_PROJECT_ROOT/.git/hook/
    ln -s ../../pre-commit .



钩子的配置参考
==============
环境相关

    define('PROJECT_ROOT', YOUR_PROJECT_ROOT); //项目的路径
    define('PHP_CS_CHECK_CMD', PROJECT_ROOT.'/vendor/bin/phpcs'); //执行检查的命令
    define('PHP_CS_RULESET', PROJECT_ROOT.'ruleset.xml');         //检查和修复使用的rule set，可以为""
    define('PHP_CS_FIX_CMD', PROJECT_ROOT.'/vendor/bin/phpcbf');  //修复的命令
流程相关

    define('AUTO_FIX_CS', TRUE);    //是否自动修复文件
    define('CI_WHEN_ERROR', TRUE);  //修复后，依然有问题，是否依然提交
    define('SHOW_DETAIL', TRUE);    //是否显示详细
    define('SHOW_NOTICE', TRUE);    //是否给出notice


关于代码检查与修复
==================
可以参考[PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)，自行定义代码样式的要求。  
本钩子使用PHP_CodeSniffer做代码检查，请提前配置好PHP_CodeSniffer和PHP_CodeSniffer所需的rule set
配置好环境后，参考上面的钩子配置部分，配置钩子



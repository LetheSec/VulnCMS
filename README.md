开发流程可见：https://lethe.site/2020/06/09/YXJCMS/

### Usage

（1）ubuntu下安装docker

```bash
# step 1: 安装必要的一些系统工具
sudo apt-get update
sudo apt-get -y install apt-transport-https ca-certificates curl software-
properties-common
# step 2: 安装 GPG 证书
curl -fsSL http://mirrors.aliyun.com/docker-ce/linux/ubuntu/gpg | sudo apt-
key add -
# Step 3: 写入软件源信息
sudo add-apt-repository "deb [arch=amd64] http://mirrors.aliyun.com/docker-
ce/linux/ubuntu $(lsb_release -cs) stable"
# Step 4: 更新并安装 Docker-CE
sudo apt-get -y update
sudo apt-get -y install docker-ce
```

（2）安装docker-compose

```bash
# 安装 docker-compose
sudo curl -L
https://github.com/docker/compose/releases/download/1.25.5/docker-compose-
`uname -s`-`uname -m` -o /usr/local/bin/docker-compose
# 赋予执行权限
sudo chmod +x /usr/local/bin/docker-compose
```

（3）部署：在docker-compose.yml同目录执行如下命令：

```bash
sudo docker-compose up
```

（4）默认为漏洞集成环境，若需要修复环境，可用src(fixed)目录改src并替换原src目录。

（5）可能出现的问题及解决

- 若部署后访问失败，可尝试：删除YXJCMS\src\runtime\cache下缓存文件重新部署。
- XSS漏洞若出现无投稿权限，需要在管理员后台的“栏目列表”设置终，编辑“网站知识”的权限，设置相应会员组为允许投稿。
- 文件上传漏洞，若出现无上传权限，则需要在管理员后台会员模块的“会员组管理”功能，设置相应的投稿权限。

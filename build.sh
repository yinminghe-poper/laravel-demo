#!/usr/bin/env bash

# ./build <code-dir> <stack> <buildpack-url>
# code-dir: 代码目录
# stack: stack版本，默认22，可选：18，20，22
# buildpack-url: buildpack git仓库地址，默认使用官方php的构建库：https://github.com/heroku/heroku-buildpack-php
# 举例，构建一个php项目，并且使用stack的20版本：./build /var/html/www 20

# 环境依赖：
# 1. docker
# 2. .env文件。如果代码目录中有.env文件（$code-dir/.env），需要提前复制到代码根目录下，构建和运行是会自动注入为环境变量

# 脚本初始化设定
set -o pipefail
set -eu
shopt -s dotglob

code_dir=$1
stack=${2:-"22"}
buildpack_url=${3:-"https://github.com/heroku/heroku-buildpack-php"}

# 清除旧的构建文件
rm -rf $code_dir/.composer $code_dir/.heroku $code_dir/.profile.d $code_dir/vendor
rm -rf $code_dir/.bash_history $code_dir/.heroku/ $code_dir/.profile.d/ $code_dir/.composer/ $code_dir/.cache/ $code_dir/.config/ $code_dir/.local/  

# 加载代码.env文件
if [ -f $code_dir/.env ]; then
  env_cmd="--env-file $code_dir/.env"
else
  env_cmd=""
fi

# buildpack编译
docker run --rm \
  $env_cmd \
  -v $code_dir:/app \
  -e STACK=heroku-$stack \
  heroku/heroku:$stack-build \
  sh -c "git clone $buildpack_url /tmp/buildpack && /tmp/buildpack/bin/compile /app /tmp/cache"
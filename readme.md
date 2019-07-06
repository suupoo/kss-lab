# KSS Lab
kss-lab
- /  application(Laravel)
- /  Homestead (Vagrant)
 - /  .gitignore
 - /  Homestead.yaml
# require 
- composer
- npm
- vagrant(or Xampp)

## Project Install
1. 下記のコマンドでGitHubからプロジェクトをクローンする

    ``$ git clone https://github.com/suupoo/kss-lab.git``
    
2. Laravelのプロジェクトファイル一式をダウンロードする
    
    1. ``cd application``
    2. ``composer install``

3. (今は未使用)JavaScriptのライブラリをインストール
    1. ``npm install``    


#Vagrant
基本的には下記のリンクを参照してたら出来た．

※yamlファイルは直下のものをHomesteadにコピーして適宜編集して．

1. [VagrantでLaravelの開発環境を作った](http://yuki10.hatenablog.com/entry/2016/12/25/195021)

2. [Vagrantとdockerを使って快適な開発環境を作る（サンプルあり）](https://qiita.com/htanaka0828/items/57204c89bb6976312bb5)

3. [【Laravel】Windows10Homeで環境構築（Homestead・VirtualBox・Vagrant・Composer）](https://www.excel-prog.com/entry/laravel-homestead)
## Error Example
There was an error while executing `VBoxManage`, a CLI used by Vagrant
for controlling VirtualBox. The command and stderr is shown below.

Command: ["startvm", "

", "--type", "headless"]

Stderr: VBoxManage.exe: error: VT-x is not available (VERR_VMX_NO_VMX)
VBoxManage.exe: error: Details: code E_FAIL (0x80004005), component ConsoleWrap, interface IConsole

https://skworkspace.net/archives/407

##vagrant Command

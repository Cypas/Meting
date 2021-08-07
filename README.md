### 引用

基于[原项目](https://github.com/metowolf/Meting)添加了get的调用方式

### 接口说明

接口地址:
你自己域名/index.php

返回格式:
json

请求方式:
GET

请求示例:
你自己域名/index.php?api=search&music=netease&search=%E6%99%9A%E5%AE%89%E5%96%B5

参数说明

|<font color=DeepSkyBlue>参数<font>|<font color=DeepSkyBlue>必填<font>|<font color=DeepSkyBlue>默认值<font>|<font color=DeepSkyBlue>可选值<font>|<font color=DeepSkyBlue>说明<font>|
|--|--|--|--|--|
|api|是|null|'search', 'url', 'lyric', 'pic'|接口功能，search搜索歌曲来获取歌曲的url_id,pic_id,lyric_id(index.php内代码的limit可以控制返回结果数量，默认为1)，后面三个url(直链地址)，lyric(歌词)，pic(封面)则需要search获取的对应id进行二次查询|
|music|是|netease|'netease', 'tencent', 'xiami', 'kugou', 'baidu'|搜索引擎|
|id|api为url，lyric，pic时需要该参数|null||id，通过search接口获得，用于api为url，lyric，pic时的二次查询|
|search|api为search时需要该参数|null||需要搜索的歌名，提交时需要进行url编码|

api为search时返回(netease搜索晚安喵为例，未进行转义):

```json
[
    {
        "id":28875230,
        "name":"\u665a\u5b89\u55b5",
        "artist":[
            "\u827e\u7d22"
        ],
        "album":"\u7f57\u5c0f\u9ed1\u6218\u8bb0",
        "pic_id":"14402502812253006",
        "url_id":28875230,
        "lyric_id":28875230,
        "source":"netease"
    }
]
```

api为url时返回:

```json
{
    "url":"http://m8.music.126.net/20210807124004/3ee1af36317b05e29ea57a99ec3339f3/ymusic/3fd7/68f1/ac35/5edb90855cb34a0618e43b0ee4687c0c.mp3",
    "size":4802394,
    "br":320
}
```

api为lyric时返回:

```json
{
    "lyric":"[00:00.000] 作词 : 薄荷映像\n[00:00.405] 作曲 : 薄荷映像\n[00:00.810]早安喵 午安喵 晚安喵 喵 喵\n[00:05.820]早安喵 午安喵 晚安喵 喵 喵\n[00:20.940]喜欢你的微笑和调皮的嘴角\n[00:26.140]那午后的阳光穿过你的发梢\n[00:30.980]想让全世界停在这一秒\n[00:36.430]陪着你把世界都忘掉\n[00:41.490]早安喵 午安喵 晚安喵 喵 喵\n[00:46.300]早安喵 午安喵 晚安喵 喵 喵\n[01:11.250]喜欢你的微笑和调皮的嘴角\n[01:16.190]喜欢你的拥抱和黄色外套\n[01:21.060]这甜蜜的感觉只有我知道\n[01:27.140]就是喜欢你的味道\n[01:31.990]早安喵 午安喵 晚安喵 喵 喵\n[01:36.790]早安喵 午安喵 晚安喵 喵 喵\n[01:45.940]嘿咻嘿咻~\n",
    "tlyric":""
}
```

api为pic时返回:

```json
{
    "url":"https:\/\/p3.music.126.net\/aQhLC9kR4Z7iiwIuynXnQA==\/14402502812253006.jpg?param=300y300"
}
```


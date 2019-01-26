# express
简单的快递查询接口。

## 安装
```
$ composer require wtdl/express:dev-master
```

## 使用

1. 查询快递
```php
$result = Express::query('253088580082');
print_r($result);
```
> 支持自动判断快递类型和手动指定快递类型，不传第二个参数代表自动判断快递类型。快递单号用字符串！！！

2. 查询快递类型
```php
$result = Express::queryType('253088580082');
print_r($result);
```






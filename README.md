AXDBTool
=======
The simply MYSQL operator without (or less) sql string.

这是一个简单却非常实用的mysql操作工具，在进行简单的增删改查操作时，可以使用该工具进行快速开发，该工具能智能组装sql语句和处理查询结果为数组，开发者甚至只需一行代码就能迅速获得想要的数据库操作。



另外，我还在其中实现了一些非常实用的数据库操作技巧，如：

*分页查询的page和size，大家很熟悉吧？使用AXDBTool，你还可以用page=-1，来查询倒数第一页的数据，厉害吧：）

*同样是分页查询，在AXDBTool这款工具里，在分页查询后，你还能通过countAll()方法来获得符合本次查询的所有数据的总数，这样就可以轻松的了解了解到分页的可用最大值了哦。

*缓存功能，AXDBTool支持请求级缓存，同样的查询条件，第二次以后的查询都会直接使用缓存，而不会再次请求数据库。比如做一个留言板的功能，输出每条留言的时候，也许你需要同步输出该留言者的相关数据，使用AXDBTool，你就无需考虑重复连接的效率问题，无脑的在留言板循环里不断调用AXDBTool查询对应留言者的信息就好了，AXDBTool会自动返回缓存数据给你。（注：你也可以在查询的时候，约束isUseCache(false)来跳过缓存）。



=======
The table of example in below is named 'tbl_user';
```html
<?php

include __dir__.'/DBTool/DBModel.php';

//insert
//插入新数据，直接使用insert方法处理以表结构为key的字典数组即可。
DBModel::instance('tbl_user')->insert(array('name'=>'wanyaxing','note'=>'Hello world, my name is wanyaxing.','age'=>28));

//update
//更新数据，调用where方法约束更新范围后，使用update方法处理以表结构为key的字典数组即可。
DBModel::instance('tbl_user')->where(array('name'=>'wanyaxing'))->update(array('note'=>'too lazy no note','age'=>29));

//find the results with list(array)
//筛选并获得结果为数组：五星级功能，日常工作里最常用的就是各种筛选操作了：）
//where (array(string,key=>value)): 该方法可以接受一个数组作为参数，该数组支持以下多种格式的值，array('id=0' , 'id'=>0, 'id > %d'=>0 , 'id > '=>0);
//order (string)                  : 排序方式 如果倒序，则追加desc
//limit (int page,int size)       : 分页和每页大小，起始页为1，即第一页为1，第二页为2。也支持倒数分页，如倒数第一页为-1，倒数第二页为-2。
//isCountAll(bool)                : 筛选时，是否同时标记结果总数，如果为是，则，可以在查询结果输出后，调用->countAll()方法获得复合条件的页面总数
//isUseCache(bool)                : 是否使用请求级缓存，所谓请求级缓存就是该缓存只针对当前请求有效。
//field(string)                   : 查询字段，默认是*，也可以设置'name,age'这样的多个字段。
$userFactroy = DBModel::instance('tbl_user')->where(array('name'=>'wanyaxing'))->order('age desc')->limit(1,1)->isUseCache(false)->field('name')->isCountAll(true);
$userModelList = $userFactroy->select();
$userModelListCountTotal = $userFactroy->countAll();

//find the first result in the list
//筛选并获得结果数组中的第一条数据。
$userModel = DBModel::instance('tbl_user')->where(array('name'=>'wanyaxing'))->limit(1)->selectSingle();

//search the keyword in many fields and order the results with score.
//高级搜索技巧，模糊查询，支持在多个字段中进行关键字查询，并且支持给不同字段赋予不同的分值，最后按总分排序。
$userModelList = DBModel::instance('tbl_user')->search('wanyaxing',array('name'=>3,'note'=>1));


//...


```

#AXDBTool适合有一定mysql基础的开发者

*本工具只以提高开发效率为目标，

*建表、改表、视图、索引、权限、配置等基础功能请大家使用对应工具自行处理，

*如存储过程、关联查询、索引优化、导入导出等高级功能也需要高手各出奇招，

*甚至安全性和稳定性也还是需要各位开发者自行把控。

*总之，AXDBTool的目标是最急速地实现无脑地最基础却又最频繁的数据库操作和查询，简单、简单、再简单，就是我的目标。

（QQ:340014824  mail:wanyaxing@gmail.com）

